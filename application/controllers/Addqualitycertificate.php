<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addqualitycertificate extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{


		if (!isset($_SESSION['userId'])) {
          $login = BASE_PATH."login/";
          redirect($login);
        }

    	#print_r($_SESSION);exit;
        #print_r($_POST);exit;
		$this->load->library('form_validation');
		$this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Certificate_master');
        $this->load->model('File_master');
        $this->load->model('Unit_master');
        $this->load->model('Client_master');
        $this->load->model('Lab_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

      
        $result = $this->Certificate_master->getQCertificatedata($id);
        //print_r($result);exit;

        $parameters = $this->Lab_master->getlabParameters();
        //print_r($parameters);exit;

        $specifications = $this->Certificate_master->getlabspecificationgroup();

        $labmin = $this->Certificate_master->getlabminByBranchId();
        $labmax = $this->Certificate_master->getlabmaxByBranchId();
        //print_r($labmin);exit;

        $labmethods = $this->Certificate_master->getlabmethodByBranchId();
        //print_r($labmethods);exit;
        $cargo_details = $this->Certificate_master->editFileCargoDetailsByIdMult($id);
        //print_r($cargo_details);exit;
        $commodity = implode(',', array_column($cargo_details, 'commodity_name'));
        $load_port = implode(',', array_column($cargo_details, 'load_port'));
        $discharge_port = implode(',', array_column($cargo_details, 'discharge_port'));
        $approx_qty_unit = implode(',', array_column($cargo_details, 'approx_qty_unit'));

        $units = $this->Unit_master->getUnitdata();
        //print_r($units);exit;

        /*$tot_quantity = 0;
        foreach($cargo_details as $key=>$value)
        {
           $tot_quantity+= $value['approx_qty'];
        }*/

        if ($_POST) {
        	//print_r($_POST);exit;

        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];

            /*if (!empty(@$_POST['file_id'])) {
                $filedata = $this->Certificate_master->getQCertFileData($_POST['file_id']);
               if (!empty($filedata)) { 
                    $viewinvoice = BASE_PATH."Viewqualitycertificate?msg=5";
                    redirect($viewinvoice); 
               } 
            }*/

            if ($_POST['cert_action']!='update') {
        	$resultdata = $this->Certificate_master->addQCertData($this->input->post());
            $_POST['certificate_no'] = $resultdata;
            }


        	$invoicedata = $this->Certificate_master->addQCertDetails($this->input->post());

            if (!empty($_POST['certificate_no'])) {
                $get_holds = $this->Certificate_master->getQCertificateHolds($_POST['certificate_no']);
                $hold_details = implode(',', array_column($get_holds, 'hold_no'));
                #echo $hold_details;exit;
            }

            if (@$_POST['check_min']==1) {
              $check_min = 1;     
            } 

            if (@$_POST['check_max']==1) {
              $check_max = 1;     
            }

            if (@$_POST['check_specs']==1) {
              $check_specs = 1;     
            }

            if (@$_POST['cert_check_min']==1) {
              $check_min = 1;     
            } 

            if (@$_POST['cert_check_max']==1) {
              $check_max = 1;     
            }

            if (@$_POST['cert_check_specs']==1) {
              $check_specs = 1;     
            }

            if (!empty($_POST['hold_type'])) {
                $viewinvoice = BASE_PATH."addqualitycertificate?id=".base64_encode($id)."&msg=1&action=update&hold=".$_POST['hold_type']."&cert_no=".$_POST['certificate_no']."&det=".base64_encode(@$hold_details)."&check_min=".@$check_min."&check_max=".@$check_max."&check_specs=".@$check_specs;
                redirect($viewinvoice);
            } else {
                $viewinvoice = BASE_PATH."Viewqualitycertificate?msg=1";
                redirect($viewinvoice);   
            }


        } else { 

			$this->data['title'] = 'ACI - Addqualitycertificate'; 
			$this->data['certificate_data'] = @$result;
            $this->data['specifications'] = $specifications;
            $this->data['labmin'] = $labmin;
            $this->data['labmax'] = $labmax;
            $this->data['labmethods'] = $labmethods;
            $this->data['parameters'] = $parameters;
            $this->data['commodity'] = $commodity;
            $this->data['load_port'] = $load_port;
            $this->data['discharge_port'] = $discharge_port;
            #$this->data['approx_qty'] = $tot_quantity;
            $this->data['approx_qty_unit'] = $approx_qty_unit;
            $this->data['units']=$units;



            $this->data['layout_body']='addqualitycertificate';

	 		$this->load->view('admin/layout/main_app_qcert', $this->data);

			#$this->load->view('file_register_new');
	  }		
	
	}

    public function fetch_labspecifications()
    {
        $this->load->model('Lab_master'); 
        
        echo $this ->Lab_master->fetch_labspecifications($this->input->post('branch_id'));
    }

    public function fetch_labmethods()
    {
        $this->load->model('Lab_master'); 
        
        echo $this ->Lab_master->fetch_labmethods($this->input->post('branch_id'));
    }

    public function fetch_labmins()
    {
        $this->load->model('Lab_master'); 
        
        echo $this ->Lab_master->fetch_labmins($this->input->post('branch_id'));
    }

    public function fetch_labmaxs()
    {
        $this->load->model('Lab_master'); 
        
        echo $this ->Lab_master->fetch_labmaxs($this->input->post('branch_id'));
    }

    public function fetch_labparammin()
    {
        $this->load->model('Lab_master'); 
        
        echo $this ->Lab_master->fetch_labparammin($this->input->post('params'));

    }

    public function fetch_labparammax()
    {
        $this->load->model('Lab_master'); 
        
        echo $this ->Lab_master->fetch_labparammax($this->input->post('params'));

    }

    public function fetch_labparammethod()
    {
        $this->load->model('Lab_master'); 
        
        echo $this ->Lab_master->fetch_labparammethod($this->input->post('params'));

    }


}

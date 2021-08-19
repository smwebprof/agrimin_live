<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addweightqualitycertificate extends CI_Controller {

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
        $this->load->model('Weight_Quality_master');
        $this->load->model('File_master');
        $this->load->model('Unit_master');
        $this->load->model('Client_master');
        $this->load->model('Lab_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

      
        $result = $this->Weight_Quality_master->getQCertificatedata($id);
        //print_r($result);exit;

        $cargo_details = $this->Certificate_master->editFileCargoDetailsByIdMult($id);
        //print_r($cargo_details);exit;
        $commodity = implode(',', array_column($cargo_details, 'commodity_name'));
        $load_port = implode(',', array_column($cargo_details, 'load_port'));
        $discharge_port = implode(',', array_column($cargo_details, 'discharge_port'));
        $approx_qty_unit = implode(',', array_column($cargo_details, 'approx_qty_unit'));
        //$total_qty = implode(',', array_column($cargo_details, 'approx_qty'));

        $units = $this->Unit_master->getUnitdata();
        //print_r($units);exit;

        $specifications = $this->Certificate_master->getlabspecificationgroup();

        $total_qty = 0;
        foreach($cargo_details as $key=>$value)
        {
           $total_qty+= $value['approx_qty'];
        }
        //echo $total_qty;exit;

        if ($_POST) {
        	//print_r($_POST);exit;

            $tot_quantity = 0;
            $tot_quantity+= $_POST['bill_lading_qty']+$_POST['bill_lading_qty1']+$_POST['bill_lading_qty2'];           
            
            if ($tot_quantity > $_POST['total_qty']) {
                $viewinvoice = BASE_PATH."Addweightqualitycertificate?id=".base64_encode($id)."&msg=1";
                redirect($viewinvoice);
            }
            //echo $_POST['total_qty']."===".$tot_quantity;exit;

        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];
            $_POST['total_net_weight'] = $tot_quantity;

            /*if (!empty(@$_POST['file_id'])) {
                $filedata = $this->Certificate_master->getQCertFileData($_POST['file_id']);
               if (!empty($filedata)) { 
                    $viewinvoice = BASE_PATH."Viewqualitycertificate?msg=5";
                    redirect($viewinvoice); 
               } 
            }*/

        	$resultdata = $this->Weight_Quality_master->addWQCertData($this->input->post());
            $_POST['certificate_no'] = $resultdata;

            $invoicedata = $this->Weight_Quality_master->addWQCertDetails($this->input->post());

            $viewinvoice = BASE_PATH."Viewweightqualitycertificate?msg=1";
            redirect($viewinvoice);   

        } else { 

			$this->data['title'] = 'ACI - Addweightqualitycertificate'; 
			$this->data['certificate_data'] = @$result; 
            $this->data['specifications'] = $specifications;           
            $this->data['commodity'] = $commodity;
            $this->data['load_port'] = $load_port;
            $this->data['discharge_port'] = $discharge_port; 
            #$this->data['approx_qty'] = $tot_quantity;
            $this->data['approx_qty_unit'] = $approx_qty_unit;
            $this->data['total_qty'] = $total_qty;
            $this->data['units']=$units;



            $this->data['layout_body']='addweightqualitycertificate';

	 		$this->load->view('admin/layout/main_app_wqcert', $this->data);

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

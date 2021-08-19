<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editqualitycertificate extends CI_Controller {

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
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

      
        $result = $this->Certificate_master->getQCertificateEditdata($id);
        //print_r($result);exit;
        $hold_details = $this->Certificate_master->getQCertificateDetailsdata($id);
        //print_r($hold_details);exit;
        $hold_data = implode(',', array_column($hold_details, 'hold_no'));
        $hold_data1 = explode(',', $hold_data);
        $hold_data2 = array_unique($hold_data1);        

        $specifications = $this->Certificate_master->getlabspecificationgroup();

        $labmin = $this->Certificate_master->getlabminByBranchId();
        $labmax = $this->Certificate_master->getlabmaxByBranchId();
        //print_r($labmin);exit;

        $labmethods = $this->Certificate_master->getlabmethodByBranchId();
        //print_r($labmethods);exit;
        if ($_POST) {
        	//print_r($_POST);exit;

        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];

        	$resultdata = $this->Certificate_master->updateEditQCertData($this->input->post());

            if ($_POST['certificate_type']=='Final') {
                $getQCertId = $this->Certificate_master->getQCertIdByBranch();
                //print_r($getInvoiceId);exit;
                if (isset($getQCertId) && !empty($getQCertId)) {
                    $QCertId = @$getQCertId[0]['certificate_id']+1;
                    $QCertId = str_pad($QCertId, 3, '0', STR_PAD_LEFT);
                    #$_POST['invoice_id'] = $invoiceId;
                } else { 
                    $QCertId = 1;
                    $QCertId = str_pad($QCertId, 3, '0', STR_PAD_LEFT);
                    #$_POST['invoice_id'] = $invoiceId;
                }

                #echo $QCertId;exit;
                $updateqcertno['certificate_no'] = 'ACI/'.$_POST['file_no']."-QC".$QCertId;
                $updateqcertno['id'] = $_POST['certificate_no'];
                $updateqcertno['certificate_id'] = $QCertId;
                #print_r($updateinvoiceno);exit;
                $updateQCertIdData = $this->Certificate_master->updateQCertId($updateqcertno);

                #$UpdateFileData = $this->Certificate_master->UpdateFileDataByInvoice($this->input->post());

            }
            

        	#$viewinvoice = BASE_PATH."Viewqualitycertificate?msg=1";
            #redirect($viewinvoice);

            $viewinvoice = BASE_PATH."editqualitycertificate?id=".$_GET['id']."&msg=1";
                redirect($viewinvoice);


        } else { 

			$this->data['title'] = 'ACI - Editqualitycertificate'; 
			$this->data['certificate_data'] = @$result;
            $this->data['specifications'] = $specifications;
            $this->data['labmin'] = $labmin;
            $this->data['labmax'] = $labmax;
            $this->data['labmethods'] = $labmethods;
            $this->data['hold_details'] = $hold_details;
            $this->data['hold_data'] = $hold_data2;


            $this->data['layout_body']='editqualitycertificate';

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


}

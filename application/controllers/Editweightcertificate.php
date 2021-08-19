<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editweightcertificate extends CI_Controller {

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
        $this->load->model('Weight_master');
        $this->load->model('File_master');
        $this->load->model('Unit_master');
        $this->load->model('Client_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

      
        $result = $this->Weight_master->getWCertificateEditdata($id);
        //print_r($result);exit;

        $params_details = $this->Weight_master->getWCertificateDetailsdataBySpec($id);
        //print_r($params_details);exit;

        $specifications = $this->Certificate_master->getlabspecificationgroup();
        
        if ($_POST) {
        	//print_r($_POST);exit;

        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];

        	$resultdata = $this->Weight_master->updateEditWCertData($this->input->post());

            $invoicedata = $this->Weight_master->updateEditWCertDetails($this->input->post());

            if ($_POST['certificate_type']=='Final') {
                $getQCertId = $this->Weight_master->getWCertIdByBranch();
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
                $updateqcertno['certificate_no'] = 'ACI/'.$_POST['file_no']."-WT".$QCertId;
                $updateqcertno['id'] = $_POST['certificate_no'];
                $updateqcertno['certificate_id'] = $QCertId;
                #print_r($updateinvoiceno);exit;
                $updateQCertIdData = $this->Weight_master->updateWCertId($updateqcertno);

                #$UpdateFileData = $this->Certificate_master->UpdateFileDataByInvoice($this->input->post());

            }
            

        	$viewinvoice = BASE_PATH."Viewweightcertificate?msg=1";
            redirect($viewinvoice);

            #$viewinvoice = BASE_PATH."editweightcertificate?id=".$_GET['id']."&msg=1";
                #redirect($viewinvoice);


        } else { 

			$this->data['title'] = 'ACI - Editweightcertificate'; 
			$this->data['certificate_data'] = @$result;
            $this->data['params_details'] = $params_details;
            $this->data['specifications'] = $specifications;

            $this->data['layout_body']='editweightcertificate';

	 		$this->load->view('admin/layout/main_app_wcert', $this->data);

			#$this->load->view('file_register_new');
	  }		
	
	}


}

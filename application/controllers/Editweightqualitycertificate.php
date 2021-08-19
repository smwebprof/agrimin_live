<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editweightqualitycertificate extends CI_Controller {

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
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

      
        $result = $this->Weight_Quality_master->getWQCertificateEditdata($id);
        //print_r($result);exit;

        $params_details = $this->Weight_Quality_master->getWQCertificateDetailsdataBySpec($id);
        //print_r($params_details);exit;

        $specifications = $this->Certificate_master->getlabspecificationgroup();

        $units = $this->Unit_master->getUnitdata();
        //print_r($units);exit;
        
        if ($_POST) {
        	//print_r($_POST);exit;

            $tot_quantity = 0;
            $tot_quantity+= $_POST['bill_lading_qty']+$_POST['bill_lading_qty1']+$_POST['bill_lading_qty2'];

            //echo $tot_quantity."==".$_POST['invoice_curr_bal'];exit;

        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];
            $_POST['total_net_weight'] = $tot_quantity;
            
            if ($_POST['certificate_type']=='Draft') {
                if ($tot_quantity > $_POST['invoice_curr_bal']) {
                    $redirect_url = BASE_PATH."Editweightqualitycertificate?id=".base64_encode($id)."&msg=2";
                    redirect($redirect_url);
                }

                $resultdata = $this->Weight_Quality_master->updateEditWQCertData($this->input->post());

                $invoicedata = $this->Weight_Quality_master->updateEditWQCertDetails($this->input->post());

            }

            if ($_POST['certificate_type']=='Final') {
                if ($tot_quantity > $_POST['invoice_curr_bal']) {
                    $redirect_url = BASE_PATH."Editweightqualitycertificate?id=".base64_encode($id)."&msg=2";
                    redirect($redirect_url);
                }

                $getQCertId = $this->Weight_Quality_master->getWQCertIdByBranch();
                //print_r($getQCertId);exit;

                if ($tot_quantity == $_POST['invoice_curr_bal']) {
                    //$QCertId = $this->Weight_Quality_master->getCertificateIdMultiByBranchNew($_POST['file_id']);
                    //print_r($QCertId);exit; 
                    //$str = explode('-',$QCertId[0]['certificate_no']); //$getQCertId
                    //print_r($str);exit;
                    $getQCertId = $this->Weight_Quality_master->getCertificateIdMultiByBranchNew($_POST['file_id']);
                    //print_r($getQCertId);exit;
                    if (!empty(count($getQCertId))) {
                        $str = explode('-',$getQCertId[0]['certificate_no']);
                        //print_r($str);exit;
                    } else {
                        $str = 0;
                    }
                    //print_r($str);exit;
                    if (count($str)>1) {  
                    $x = $str[1];
                    $x++;
                    $QCertId = @$getQCertId[0]['certificate_id'];
                    $QCertId = str_pad($QCertId, 3, '0', STR_PAD_LEFT)."-".$x;
                    //echo $QCertId; exit;
                    $_POST['total_qty'] = $_POST['invoice_curr_bal'] - $tot_quantity;
                    $_POST['invtotitems_quantity'] = $tot_quantity;

                    $updateqcertno['certificate_no'] = 'ACI/'.$_POST['file_no']."/WQ/".$QCertId;
                    $updateqcertno['id'] = $_POST['certificate_no'];
                    $updateqcertno['certificate_id'] = $QCertId;
                    //print_r($updateqcertno);exit;
                    //print_r($_POST);exit;
                    $resultdata = $this->Weight_Quality_master->updateEditWQCertData($this->input->post());

                    $invoicedata = $this->Weight_Quality_master->updateEditWQCertDetails($this->input->post());

                    $updateQCertIdData = $this->Weight_Quality_master->updateWQCertId($updateqcertno);
                    } else {  
                    $x = 'A';
                    $QCertId = @$getQCertId[0]['certificate_id']+1;
                    $QCertId = str_pad($QCertId, 3, '0', STR_PAD_LEFT)."-".$x;
                    //echo $QCertId; exit;
                    $_POST['total_qty'] = $_POST['invoice_curr_bal'] - $tot_quantity;
                    $_POST['invtotitems_quantity'] = $tot_quantity;

                    $updateqcertno['certificate_no'] = 'ACI/'.$_POST['file_no']."/WQ/".$QCertId;
                    $updateqcertno['id'] = $_POST['certificate_no'];
                    $updateqcertno['certificate_id'] = $QCertId;
                    //print_r($updateqcertno);exit;
                    //print_r($_POST);exit;
                    $resultdata = $this->Weight_Quality_master->updateEditWQCertData($this->input->post());

                    $invoicedata = $this->Weight_Quality_master->updateEditWQCertDetails($this->input->post());

                    $updateQCertIdData = $this->Weight_Quality_master->updateWQCertId($updateqcertno);
                    }
                   } else {
                    //print_r($_POST);exit; 
                    //print_r($getQCertId);exit;

                    if (!empty($getQCertId[0]['certificate_id'])) { 
                    //$getQCertId = $this->Weight_Quality_master->getCertificateIdMultiByBranch($getQCertId[0]['certificate_id']);
                    $getQCertId = $this->Weight_Quality_master->getCertificateIdMultiByBranchNew($_POST['file_id']);
                    //print_r($getQCertId);exit;
                    if (!empty(count($getQCertId))) {
                        $str = explode('-',$getQCertId[0]['certificate_no']);
                        //print_r($str);exit;
                    } else {
                        $str = 0;
                    }
                    /*if ($getQCertId[0]['invoice_curr_bal']>0) {
                    $str = explode('-',$getQCertId[0]['certificate_no']);
                    //print_r($str);exit;
                    } else {
                    $str = explode('-',$getQCertId[0]['certificate_id']);
                    //print_r($str);exit;
                    }*/             
                    } else {  
                    $getInvoiceId = $this->Weight_Quality_master->getWQCertIdByBranch();
                    //print_r($getInvoiceId);exit;
                    $str = explode('-',$getQCertId[0]['certificate_id']);
                    //print_r($str);exit;
                    }
                    //print_r($str);exit;
                    if (count($str)>1) { 
                    $x = $str[1];
                    $x++;
                    $QCertId = @$getQCertId[0]['certificate_id'];
                    $QCertId = str_pad($QCertId, 3, '0', STR_PAD_LEFT)."-".$x;
                    //echo $QCertId; exit;
                    $_POST['total_qty'] = $_POST['invoice_curr_bal'] - $tot_quantity;
                    $_POST['invtotitems_quantity'] = $tot_quantity;

                    $updateqcertno['certificate_no'] = 'ACI/'.$_POST['file_no']."/WQ/".$QCertId;
                    $updateqcertno['id'] = $_POST['certificate_no'];
                    $updateqcertno['certificate_id'] = $QCertId;
                    //print_r($updateqcertno);exit;
                    $resultdata = $this->Weight_Quality_master->updateEditWQCertData($this->input->post());

                    $invoicedata = $this->Weight_Quality_master->updateEditWQCertDetails($this->input->post());

                    $updateQCertIdData = $this->Weight_Quality_master->updateWQCertId($updateqcertno);

                    sleep(2);
                    $resultdata1 = $this->Weight_Quality_master->addWQCertData($this->input->post());
                    $_POST['certificate_no'] = $resultdata1;

                    $invoicedata1 = $this->Weight_Quality_master->addWQCertDetails($this->input->post());    
                    } else { 
                    $x = 'A';
                    $QCertId = @$getQCertId[0]['certificate_id']+1;
                    $QCertId = str_pad($QCertId, 3, '0', STR_PAD_LEFT)."-".$x;
                    //echo $QCertId; exit;
                    $_POST['total_qty'] = $_POST['invoice_curr_bal'] - $tot_quantity;

                    $updateqcertno['certificate_no'] = 'ACI/'.$_POST['file_no']."/WQ/".$QCertId;
                    $updateqcertno['id'] = $_POST['certificate_no'];
                    $updateqcertno['certificate_id'] = $QCertId;
                    //print_r($updateqcertno);exit;
                    $resultdata = $this->Weight_Quality_master->updateEditWQCertData($this->input->post());

                    $invoicedata = $this->Weight_Quality_master->updateEditWQCertDetails($this->input->post());

                    $updateQCertIdData = $this->Weight_Quality_master->updateWQCertId($updateqcertno);

                    sleep(2);
                    $resultdata1 = $this->Weight_Quality_master->addWQCertData($this->input->post());
                    $_POST['certificate_no'] = $resultdata1;

                    $invoicedata1 = $this->Weight_Quality_master->addWQCertDetails($this->input->post());
                    }                    
                }    
            }

        	$viewinvoice = BASE_PATH."Viewweightqualitycertificate?msg=1";
            redirect($viewinvoice);

            #$viewinvoice = BASE_PATH."editweightcertificate?id=".$_GET['id']."&msg=1";
                #redirect($viewinvoice);


        } else { 

			$this->data['title'] = 'ACI - Editweightqualitycertificate'; 
			$this->data['certificate_data'] = @$result;
            $this->data['params_details'] = $params_details;
            $this->data['specifications'] = $specifications;
            $this->data['units']=$units;

            $this->data['layout_body']='editweightqualitycertificate';

	 		$this->load->view('admin/layout/main_app_wqcert', $this->data);

			#$this->load->view('file_register_new');
	  }		
	
	}


}

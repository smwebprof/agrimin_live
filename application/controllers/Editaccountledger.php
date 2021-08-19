<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editaccountledger extends CI_Controller {

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
		
        $this->load->library('form_validation');
        $this->load->model('company_master'); 
        $this->load->model('user_master');
        $this->load->model('client_master');
        $this->load->model('Vendor_master');
        $this->load->model('Invoice_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];
        //$t = $_GET['t'];

    	//$companies = $this->company_master->getRows();

        //$result = $this->company_master->getCountries();

        $getledgerno = $this->Vendor_master->getAccountledgerByIdType($id,'Credit');
        //print_r($getledgerno);exit;

        $result = $this->Vendor_master->getAccountledgerByIdLast($id);
        //print_r($result);exit;

        $vendor_details = $this->Vendor_master->getVendorById($result[0]['vendor_name']);
        //print_r($vendor_details);exit;

        $invoice_data = $this->Invoice_master->getInvoiceByFinalStatus();
        //print_r($invoice_data);exit;

        if (@$_POST) {
        	//print_r($_POST);exit;

        	if ($_POST['ledger_amount'] > $result[0]['balance_amount']) {
                $redirect_url = BASE_PATH."Editaccountledger?id=".base64_encode($id)."&msg=1";
                redirect($redirect_url);
            }
            
        	$params['user_id'] = @$_SESSION['userId'];
        	$params['user_comp_id'] = @$_SESSION['comp_id']; 
        	$params['user_branch_id'] = @$_SESSION['branch_id']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$params['dt'] = $dt;

        	//$resultcredit = $this->Vendor_master->getAccountledgerByIdType($id,'Credit');
        	//print_r($resultcredit);exit;
        	if (count($result)>0) {
        		$params['balance_amount'] = $result[0]['balance_amount'] - $_POST['ledger_amount'];
        	} else {
        		$params['balance_amount'] = $_POST['result'];
        	}
        	
        	$params['vendor_name'] = $_POST['vendor_id'];
	        $params['ledger_narration'] = $_POST['ledger_narration'];
	        $params['ledger_type'] = $_POST['ledger_type'];
	        $params['debit_amount'] = $_POST['ledger_amount'];
	        /*if ($_POST['ledger_type']=='Credit') {
	        	$params['credit_amount'] = $_POST['ledger_amount'];
	        	$params['balance_amount'] = $_POST['ledger_amount'];
	        }
	        if ($_POST['ledger_type']=='Debit') {
	        	$params['debit_amount'] = $_POST['ledger_amount'];
	        	$params['balance_amount'] = $_POST['ledger_amount'];
	        }*/
	        $params['ledger_amount'] = $_POST['ledger_amount'];
	        $params['ledger_date'] = date('Y-m-d H:i:s',strtotime($_POST['ledger_date']));
	        $params['ledger_number'] = $_POST['ledger_number'];
	        $params['invoice_no'] = $_POST['invoice_no'];
	        $params['invoice_amt'] = $_POST['invoice_amt'];
	        $params['vendor_id'] = $id;
	        //print_r($params);exit;
	        $resultdata = $this->Vendor_master->addAccountledger($params);

	        if ($_POST['ledger_amount']==$result[0]['balance_amount']) {
	        	$updatedata = $this->Vendor_master->updateLedgerDataStatus($id);
	        }

        	//$resultdata = $this->Vendor_master->updateLedgerData($this->input->post());

        	########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'updateLedgerData';
            $params['date_time'] = $dt;
            $params['action'] = 'Update';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################  

	        if ($resultdata) {
	        	$redirecturl = BASE_PATH."Viewaccountledger?msg=1";
	            redirect($redirecturl); 
	        }	

        } else {
        	$this->data['title'] = 'ACI - Editaccountledger';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='editaccountledger';
			$this->data['countries'] = $result;
			//$this->data['company_data'] = $companies;
			$this->data['ledger_data'] = $result;
			$this->data['vendor_details']=$vendor_details;
			$this->data['ledger_num']=$getledgerno[0]['ledger_number'];
			$this->data['invoice_data'] = $invoice_data;
 	

 			$this->load->view('admin/layout/main_app_ledger', $this->data);
        }

	}

	public function fetch_inv_amt()
	{
		$this->load->model('Invoice_master'); 
		
		echo $this ->Invoice_master->getInvoiceDetailsByInvno($this->input->post('inv_no'));

	}
}

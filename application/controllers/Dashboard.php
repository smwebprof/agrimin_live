<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	 *
	 * Author : Shivaji M Dalvi
	 * Date : 15/01/2020
	 *
	 */
	public function index()
	{
		
		if (!isset($_SESSION['userId'])) {
			$login = BASE_PATH."login/";
			redirect($login);
		}

		$this->load->model('Branch_master'); 
		$this->load->model('User_master');
		$this->load->model('Dashboard_master');
		$this->load->model('Invoice_master');
		$this->load->model('Company_master');
		$this->load->model('Vendor_master');
		
	    //print_r($_SESSION);exit;
		
		if (@$_POST['current_branch_form']=='current_branch_form') {
			#$this->session->unset_userdata('logged_in');
    		#$this->session->sess_destroy();

			$checkBranch = $this->Branch_master->getBranchdataById($_POST['current_branch']);

			$checkLogin = $this->User_master->getUserbyId($_SESSION['userId']);

			$checkOpYear = $this->User_master->fetch_op_year($checkBranch['comp_id']);
			#print_r($checkOpYear);exit;
    		
			$this->session->set_userdata('isUserLoggedIn', TRUE); 
	        $this->session->set_userdata('userId', $checkLogin[0]['id']); 
	        $this->session->set_userdata('fname', $checkLogin[0]['first_name']);
	        $this->session->set_userdata('lname', $checkLogin[0]['last_name']);
	        $this->session->set_userdata('user_email', $checkLogin[0]['office_email']);
	        $this->session->set_userdata('primary_email', $checkBranch['primary_email_id']);
	        $this->session->set_userdata('secondary_email', $checkBranch['secondary_email_id']);
	        $this->session->set_userdata('employee_staff', $checkLogin[0]['employee_staff']);
	        $this->session->set_userdata('branch_name', $checkBranch['branch_name']);
	        $this->session->set_userdata('country_code', $checkBranch['sortname']);
	        $this->session->set_userdata('currency', $checkBranch['currency']);
	        $this->session->set_userdata('comp_id', $checkBranch['comp_id']);
	        $this->session->set_userdata('branch_id', $checkBranch['id']);
	        $this->session->set_userdata('default_branch_id', $checkBranch['id']);
	        $this->session->set_userdata('operatingyear', $checkOpYear[0]['year']);  

		}
		
		$fileCount = $this->Dashboard_master->getAllFiledata();
		//print_r($fileCount);exit;

		$fileCompleteCount = $this->Dashboard_master->getAllFileCompletedata();
		//print_r($fileCompleteCount);exit;

		$filePendingCount = $this->Dashboard_master->getAllFilePendingdata();
		//print_r($filePendingCount);exit;

		$fileInvoicedCount = $this->Dashboard_master->getAllFileInvoiceddata();
		//print_r($fileInvoicedCount);exit;

		$fileCancelledCount = $this->Dashboard_master->getAllFileCancelledddata();
		//print_r($fileCancelledCount);exit;

		$fileRunningCount = $this->Dashboard_master->getAllFileRunningdata();
		//print_r($fileRunningCount);exit;

		$invoiceCount = $this->Dashboard_master->getAllInvoicedata();
		//print_r($invoiceCount);exit;

		$result = $this->Invoice_master->getAllInvoicePaymentdataByStatus();
		//print_r($result);exit;

		$tot_inv_amt = 0;
		$tot_inv_rec_amt = 0;
        foreach($result as $key=>$value)
        {
           	$tot_inv_amt+= @(float)$value['invoice_amt'];
           	$tot_inv_rec_amt+= @(float)$value['invoice_rec_amt'];
        }
        //echo $tot_inv_amt."====".$tot_inv_rec_amt;exit;

        $clientCount = $this->Dashboard_master->getAllClientdata();
		//print_r($clientCount);exit;

		$cargos = $this->Dashboard_master->getCargoClientReportdata();
		//print_r($cargos);exit;

		$fin_data = $this->Company_master->get_fin_year($_SESSION['comp_id']);
		//print_r($fin_data);exit;
		if($fin_data['fin_month'] == 4)
		{
		   $fin_yr = $_SESSION['operatingyear'] + 1;
		   $fin_date['fin_from_date'] = "01-04-".$_SESSION['operatingyear'];
		   $fin_date['fin_to_date'] = "31-03-".$fin_yr;	

		} else {
		   $fin_yr = $_SESSION['operatingyear'];
		   $fin_date['fin_from_date'] = "01-01-".$_SESSION['operatingyear'];
		   $fin_date['fin_to_date'] = "31-12-".$fin_yr;	
		}
		//echo $fin_from_date."===".$fin_to_date;exit;

		$result1 = $this->Dashboard_master->getAllAccountledger($fin_date);
		//print_r($result1);exit;
		$vendor_details = $this->Vendor_master->getAllVendordata();
		//print_r($vendor_details);exit;

		$vendor_info = $this->Dashboard_master->getVendorDetails();
		//print_r($vendor_info);exit;

		$cargo_details = $this->Dashboard_master->getCargoDetails();
		//print_r($cargo_details);exit;

		$client_interactions = $this->Dashboard_master->getClientInteractions();
		//print_r($client_interactions);exit;

		/*if ($_SESSION['employee_staff']=='Admin') {
			$recent_files = $this->Dashboard_master->getAllFileRecentPendingdata();
		} else {
			$recent_files = $this->Dashboard_master->getAllFileRecentUserPendingdata();
		}*/
		$recent_files = $this->Dashboard_master->getAllFileRecentUserPendingdata();	
		//print_r($recent_files);exit;

		/*if ($_SESSION['employee_staff']=='Admin') {
			$recent_invoices = $this->Dashboard_master->getAllInvoiceRecentPendingdata();
		} else {
			$recent_invoices = $this->Dashboard_master->getAllInvoiceRecentUserPendingdata();
		}*/	
		$recent_invoices = $this->Dashboard_master->getAllInvoiceRecentUserPendingdata();
		//print_r($recent_files);exit;

		$ledger_details = array();
		foreach ($result1 as $key => $value) {
			@$ledger_details[$value['vendor_id']]['vendor_name'] = $value['vendor'];
			if ($value['ledger_type']=='Credit') {;
				@$ledger_details[$value['vendor_id']]['credit_amount']+= @$value['ledger_amount'];
			}
			if ($value['ledger_type']=='Debit') {
				@$ledger_details[$value['vendor_id']]['debit_amount']+= @$value['ledger_amount'];
			}
			@$ledger_details[$value['vendor_id']]['balance_amount'] = abs(@$ledger_details[$value['vendor_id']]['credit_amount'] - @$ledger_details[$value['vendor_id']]['debit_amount']);

		}

		//print_r($ledger_details);exit;
		
		$this->data['title'] = 'Login';
		$this->data['fileCount'] = $fileCount[0]['filecount'];
		$this->data['invoiceCount'] = $invoiceCount[0]['invoicecount'];
		$this->data['invoice_amt'] = $tot_inv_amt;
		$this->data['invoice_rec_amt'] = $tot_inv_rec_amt;
		$this->data['clientCount'] = $clientCount[0]['clientcount'];
		$this->data['cargos'] = $cargos;
		$this->data['ledgerdata'] = $ledger_details;
		$this->data['fileCompleteCount'] = $fileCompleteCount[0]['filecount'];
		$this->data['filePendingCount'] = $filePendingCount[0]['filecount'];
		$this->data['fileInvoicedCount'] = $fileInvoicedCount[0]['filecount'];
		$this->data['fileCancelledCount'] = $fileCancelledCount[0]['filecount'];
		$this->data['fileRunningCount'] = $fileRunningCount[0]['filecount'];
		$this->data['VendorCount'] = $vendor_info[0]['vendors'];
		$this->data['CargoCount'] = $cargo_details[0]['cargos'];
		$this->data['ClientInteractionCount'] = $client_interactions[0]['interactions'];
		$this->data['recent_files'] = $recent_files;
		$this->data['recent_invoices'] = $recent_invoices;
		#$this -> load -> model('campaign_model');
		
		$this->data['layout_body']='dashboard';
 	

 		$this->load->view('admin/layout/main_dashboard', $this->data);

		#$this->load->view('file_register_new');
	}
}

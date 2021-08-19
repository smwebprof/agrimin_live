<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addaccountledger extends CI_Controller {

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

    	$companies = $this->company_master->getRows();

        $result = $this->company_master->getCountries();

        $vendor_details = $this->Vendor_master->getAllVendordata();
        //print_r($vendor_details);exit;

        $invoice_data = $this->Invoice_master->getInvoiceByFinalStatus();
        //print_r($invoice_data);exit;

        if (@$_POST) {
        	//print_r($_POST);exit;

        	$params['user_id'] = @$_SESSION['userId'];
        	$params['user_comp_id'] = @$_SESSION['comp_id']; 
        	$params['user_branch_id'] = @$_SESSION['branch_id']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$params['dt'] = $dt;
        	
        	$params['vendor_name'] = $_POST['vendor_name'];
	        $params['ledger_narration'] = $_POST['ledger_narration'];
	        $params['ledger_type'] = $_POST['ledger_type'];
	        if ($_POST['ledger_type']=='Credit') {
	        	$params['credit_amount'] = $_POST['ledger_amount'];
	        	$params['balance_amount'] = $_POST['ledger_amount'];
	        }
	        if ($_POST['ledger_type']=='Debit') {
	        	$params['debit_amount'] = $_POST['ledger_amount'];
	        	$params['balance_amount'] = $_POST['ledger_amount'];
	        }
	        $params['ledger_amount'] = $_POST['ledger_amount'];
	        $params['ledger_date'] = date('Y-m-d H:i:s',strtotime($_POST['ledger_date']));
	        $params['ledger_number'] = $_POST['ledger_number'];
	        $params['invoice_no'] = $_POST['invoice_no'];
	        $params['invoice_amt'] = $_POST['invoice_amt'];
	        //print_r($params);exit;
	        $resultdata = $this->Vendor_master->addAccountledger($params);

	        ########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'addAccountledger';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################

	        /*if ($resultdata) {
	        	$redirecturl = BASE_PATH."Viewaccountledger?msg=1";
	            redirect($redirecturl); 
	        }*/

	        $this->data['title'] = 'ACI - Addaccountledger';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='addaccountledger';
			$this->data['countries'] = $result;
			$this->data['company_data'] = $companies;
			$this->data['vendor_details']=$vendor_details;
			$this->data['invoice_data'] = $invoice_data;

			if ($_POST['invoice_no']) {
				$this->data['post_invoice_no'] = $_POST['invoice_no'];
				$this->data['post_invoice_amt'] = $_POST['invoice_amt'];
			}
 	

 			$this->load->view('admin/layout/main_app_ledger', $this->data);	

        } else {
        	$this->data['title'] = 'ACI - Addaccountledger';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='addaccountledger';
			$this->data['countries'] = $result;
			$this->data['company_data'] = $companies;
			$this->data['vendor_details']=$vendor_details;
			$this->data['invoice_data'] = $invoice_data;
 	

 			$this->load->view('admin/layout/main_app_ledger', $this->data);
        }

	}	

	public function index1111()
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
        $this->load->helper('form');

    	$companies = $this->company_master->getRows();

        $result = $this->company_master->getCountries();

        $vendor_details = $this->Vendor_master->getAllVendordata();
        //print_r($vendor_details);exit;
      
        if (@$_POST) {
        	//print_r($_POST);exit;	
        	$params['user_id'] = @$_SESSION['userId'];
        	$params['user_comp_id'] = @$_SESSION['comp_id']; 
        	$params['user_branch_id'] = @$_SESSION['branch_id']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$params['dt'] = $dt;

        	$params1['user_id'] = @$_SESSION['userId'];
        	$params1['user_comp_id'] = @$_SESSION['comp_id']; 
        	$params1['user_branch_id'] = @$_SESSION['branch_id']; 
        	$params1['dt'] = $dt;

        	//print_r($this->input->post());exit;
        	if (!empty($_POST['vendor_name'])) {
        		$vendor_details = $this->Vendor_master->getAccountledgerById(@$_POST['vendor_name']);
        		//print_r($vendor_details);exit;
        		if (!empty($vendor_details)) {
        			if ($_POST['ledger_type']=='Credit') {
        				$vendor_closingbl = $this->Vendor_master->getAccountledgerByClosingBal(@$_POST['vendor_name']);
        				//print_r($vendor_closingbl);exit;

       					$params1['vendor_name'] = $_POST['vendor_name'];
	        			$params1['ledger_narration'] = $_POST['ledger_narration'];
	        			$params1['ledger_type'] = $_POST['ledger_type'];
	        			$params1['ledger_amount'] = $_POST['ledger_amount'];
	        			$params1['balance_amount'] = $vendor_closingbl[0]['balance_amount']+$_POST['ledger_amount'];
	        			$params1['ledger_date'] = $_POST['ledger_date'];
	        			$params1['ledger_number'] = $_POST['ledger_number'];

	        			$resultdata1 = $this->Vendor_master->addAccountledger($params1);
	        			//$resultdata1 = 1;

	        			$params['vendor_name'] = $_POST['vendor_name'];
	        			$params['ledger_narration'] = 'Total Closing Balance';
	        			$params['ledger_type'] = 'Closing Balance';
	        			//$params['ledger_amount'] = $_POST['ledger_amount'];
	        			$params['credit_amount'] = $vendor_closingbl[0]['credit_amount']+$_POST['ledger_amount'];
	        			$params['debit_amount'] = $vendor_closingbl[0]['debit_amount'];
	        			$params['balance_amount'] = $vendor_closingbl[0]['balance_amount']+$_POST['ledger_amount'];
	        			$params['ledger_date'] = $_POST['ledger_date'];
	        			#$params['ledger_number'] = $_POST['ledger_number'];

	        			$resultdata = $this->Vendor_master->addAccountledger($params);

	        			$delaccountledger = $this->Vendor_master->delledgerclosingbl($vendor_closingbl[0]['id']);

		        			if ($resultdata) {
	        					$redirecturl = BASE_PATH."Viewaccountledger?msg=1";
	                			redirect($redirecturl); 
	        				}

	        			}	

        			if ($_POST['ledger_type']=='Debit') {
        				$vendor_closingbl = $this->Vendor_master->getAccountledgerByClosingBal(@$_POST['vendor_name']);
        				//print_r($vendor_closingbl);exit;

       					$params1['vendor_name'] = $_POST['vendor_name'];
	        			$params1['ledger_narration'] = $_POST['ledger_narration'];
	        			$params1['ledger_type'] = $_POST['ledger_type'];
	        			$params1['ledger_amount'] = $_POST['ledger_amount'];
	        			$params1['balance_amount'] = $vendor_closingbl[0]['balance_amount']-$_POST['ledger_amount'];
	        			$params1['ledger_date'] = $_POST['ledger_date'];
	        			$params1['ledger_number'] = $_POST['ledger_number'];

	        			$resultdata1 = $this->Vendor_master->addAccountledger($params1);
	        			//$resultdata1 = 1;

	        			$params['vendor_name'] = $_POST['vendor_name'];
	        			$params['ledger_narration'] = 'Total Closing Balance';
	        			$params['ledger_type'] = 'Closing Balance';
	        			//$params['ledger_amount'] = $_POST['ledger_amount'];
	        			$params['credit_amount'] = $vendor_closingbl[0]['credit_amount'];
	        			$params['debit_amount'] = $vendor_closingbl[0]['debit_amount']+$_POST['ledger_amount'];
	        			$params['balance_amount'] = $vendor_closingbl[0]['balance_amount']-$_POST['ledger_amount'];
	        			$params['ledger_date'] = $_POST['ledger_date'];
	        			#$params['ledger_number'] = $_POST['ledger_number'];

	        			$resultdata = $this->Vendor_master->addAccountledger($params);

	        			$delaccountledger = $this->Vendor_master->delledgerclosingbl($vendor_closingbl[0]['id']);

		        			if ($resultdata) {
	        					$redirecturl = BASE_PATH."Viewaccountledger?msg=1";
	                			redirect($redirecturl); 
	        				}

	        			}

        		} else {
        			if ($_POST['ledger_type']=='Credit') {
	        			$params['vendor_name'] = $_POST['vendor_name'];
	        			$params['ledger_narration'] = 'Opening Balance';
	        			$params['ledger_type'] = 'Opening Balance';
	        			$params['ledger_amount'] = 0.00;
	        			$params['balance_amount'] = 0.00;
	        			$params['ledger_date'] = $_POST['ledger_date'];
	        			#$params['ledger_number'] = $_POST['ledger_number'];

	        			$resultdata = $this->Vendor_master->addAccountledger($params);
	        			//$resultdata = 1;

	        			$params1['vendor_name'] = $_POST['vendor_name'];
	        			$params1['ledger_narration'] = $_POST['ledger_narration'];
	        			$params1['ledger_type'] = $_POST['ledger_type'];
	        			$params1['ledger_amount'] = $_POST['ledger_amount'];
	        			$params1['balance_amount'] = $_POST['ledger_amount'];
	        			$params1['ledger_date'] = $_POST['ledger_date'];
	        			$params1['ledger_number'] = $_POST['ledger_number'];

	        			$resultdata1 = $this->Vendor_master->addAccountledger($params1);
	        			//$resultdata1 = 1;
	        			if ($resultdata1) {
        					$redirecturl = BASE_PATH."Viewaccountledger?msg=1";
                			redirect($redirecturl); 
        				}
        			}

        			if ($_POST['ledger_type']=='Debit') {
	        			$params['vendor_name'] = $_POST['vendor_name'];
	        			$params['ledger_narration'] = 'Opening Balance';
	        			$params['ledger_type'] = 'Opening Balance';
	        			$params['ledger_amount'] = 0.00;
	        			$params['balance_amount'] = 0.00;
	        			$params['ledger_date'] = $_POST['ledger_date'];
	        			#$params['ledger_number'] = $_POST['ledger_number'];

	        			$resultdata = $this->Vendor_master->addAccountledger($params);
	        			//$resultdata = 1;

	        			$params1['vendor_name'] = $_POST['vendor_name'];
	        			$params1['ledger_narration'] = $_POST['ledger_narration'];
	        			$params1['ledger_type'] = $_POST['ledger_type'];
	        			$params1['ledger_amount'] = $_POST['ledger_amount'];
	        			$params1['balance_amount'] = $_POST['ledger_amount'];
	        			$params1['ledger_date'] = $_POST['ledger_date'];
	        			$params1['ledger_number'] = $_POST['ledger_number'];

	        			$resultdata1 = $this->Vendor_master->addAccountledger($params1);
	        			//$resultdata1 = 1;
	        			if ($resultdata1) {
        					$redirecturl = BASE_PATH."Viewaccountledger?msg=1";
                			redirect($redirecturl); 
        				}
        			}
        		}

        	} 

            ########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'addAccountledger';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################        	

        	/*if ($resultdata) {
        		$redirecturl = BASE_PATH."Viewaccountledger?msg=1";
                redirect($redirecturl); 
        	}*/

        } else {
   			$this->data['title'] = 'ACI - Addaccountledger';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='addaccountledger';
			$this->data['countries'] = $result;
			$this->data['company_data'] = $companies;
			$this->data['vendor_details']=$vendor_details;
 	

 			$this->load->view('admin/layout/main_app', $this->data);     	
        }       




		#$this->load->view('file_register_new');
	}


	public function fetch_states()
	{
		$this->load->model('company_master'); 
		
		echo $this ->company_master->fetch_states($this->input->post('country_id'));

	}

	public function fetch_city()
	{
		$this->load->model('company_master'); 
		
		echo $this ->company_master->fetch_city($this->input->post('state_id'));

	}

	public function fetch_inv_amt()
	{
		$this->load->model('Invoice_master'); 
		
		echo $this ->Invoice_master->getInvoiceDetailsByInvno($this->input->post('inv_no'));

	}
}

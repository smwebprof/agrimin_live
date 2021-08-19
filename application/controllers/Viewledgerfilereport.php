<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewledgerfilereport extends CI_Controller {

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

		$this->load->model('Vendor_master');
		$this->load->model('User_master');
		$this->load->model('Company_master');

		if (@$_POST) {
		//print_r(@$_POST);exit;

		if (@$_POST['submit']=='pdf') {
			$redirecturl = BASE_PATH."Viewpdfledgereport?ledger_from_date=".@$_POST['ledger_from_date']."&ledger_to_date=".@$_POST['ledger_to_date']."&vendor_name=".@$_POST['vendor_name'];
	        redirect($redirecturl);
		}

		if (@$_POST['submit']=='excel') {
			$redirecturl = BASE_PATH."Viewexcelledgerreport?msg=1";
			$redirecturl = BASE_PATH."Viewexcelledgerreport?ledger_from_date=".@$_POST['ledger_from_date']."&ledger_to_date=".@$_POST['ledger_to_date']."&vendor_name=".@$_POST['vendor_name'];
	        redirect($redirecturl);
		}	

		$mainmodule_id = 9;
		$submodule_id = 45;
		
		$this->data['title'] = 'ACI - Viewledgerfilereport';
		#$this -> load -> model('campaign_model');
		
		$this->data['layout_body']='viewledgerfilereport';

		$result = $this->Vendor_master->getAllAccountledgerSearch($_POST);
		//print_r($result);exit;

		$vendor_details = $this->Vendor_master->getAllVendordata();
		//print_r($vendor_details);exit;

		$ledger_details = array();
		foreach ($result as $key => $value) {
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
		$params['main_menus'] = $mainmodule_id;
        $params['sub_menus'] = $submodule_id;
        $params['user_access_id'] = $_SESSION['userId'];

		$rights = $this->User_master->getAccessforUserId($params);
     
 		$this->data['ledger_data'] = $ledger_details;
 		$this->data['vendor_data'] = $vendor_details;
 		$this->data['access_right'] = $rights;
 		$this->data['ledger_from_date'] = @$_POST['ledger_from_date'];
 		$this->data['ledger_to_date'] = @$_POST['ledger_to_date'];
 		$this->data['vendor_name'] = @$_POST['vendor_name'];

 		$this->load->view('admin/layout/main_app_view', $this->data);

		#$this->load->view('viewcompanymaster');


		} else {	
		
        //print_r($_SESSION);exit;


		$mainmodule_id = 9;
		$submodule_id = 45;
		
		$this->data['title'] = 'ACI - Viewledgerfilereport';
		#$this -> load -> model('campaign_model');
		
		$this->data['layout_body']='viewledgerfilereport';

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

		$result = $this->Vendor_master->getAllAccountledger($fin_date);
		//print_r($result);exit;

		$vendor_details = $this->Vendor_master->getAllVendordata();
		//print_r($vendor_details);exit;

		$ledger_details = array();
		foreach ($result as $key => $value) {
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
		
		$params['main_menus'] = $mainmodule_id;
        $params['sub_menus'] = $submodule_id;
        $params['user_access_id'] = $_SESSION['userId'];

		$rights = $this->User_master->getAccessforUserId($params);
     
 		$this->data['ledger_data'] = $ledger_details;
 		$this->data['vendor_data'] = $vendor_details;
 		$this->data['access_right'] = $rights;

 		$this->load->view('admin/layout/main_app_view', $this->data);

		#$this->load->view('viewcompanymaster');
 		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewinvoicefileregister extends CI_Controller {

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

		$this->load->model('Client_master');
		$this->load->model('User_master');
		$this->load->model('Invoice_master');
		$this->load->model('Branch_master');

        $invoice_info = "Single";

        if (@$_POST['submit']=='excel') {
        	//print_r($_POST);exit;
			$redirecturl = BASE_PATH."Viewexcelinvoicefileregister?invoice_from_date=".@$_POST['invoice_from_date']."&invoice_to_date=".@$_POST['invoice_to_date']."&invoice_type=".@$_POST['invoice_type']."&status=".@$_POST['status']."&clients_name=".@$_POST['clients_name']."&file_no_type=".@$_POST['file_no_type']."&invoice_currency=".@$_POST['invoice_currency'];
	        redirect($redirecturl);
		}
		
		if (@$_POST) {
			//print_r($_POST);exit;
			$mainmodule_id = 3;
			$submodule_id = 51;

			$_POST['invoice_info'] = $invoice_info;
			
			$status = isset($_GET['a']) ? $_GET['a'] : '1';

			$this->data['title'] = 'ACI - viewinvoicefileregister';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='viewinvoicefileregister';

			$result = $this->Invoice_master->getAllInvoicedataSearch($_POST);
			//print_r($result);exit;
			$clients = $this->Client_master->getClientdataByBranchid($_SESSION['branch_id']);

			$currency = $this->Invoice_master->getCurrency();
			//print_r($currency);exit;

			$tot_inv_amt = 0;
        	foreach($result as $key=>$value)
        	{
           		$tot_inv_amt+= $value['invoice_amt'];
        	}

			$params['main_menus'] = $mainmodule_id;
	        $params['sub_menus'] = $submodule_id;
	        $params['user_access_id'] = $_SESSION['userId'];

			$rights = $this->User_master->getAccessforUserId($params);
	     
	 		$this->data['invoice_data'] = $result;
	 		$this->data['access_right'] = $rights;
	 		$this->data['invoice_from_date']=@$_POST['invoice_from_date'];
	 		$this->data['invoice_to_date']=@$_POST['invoice_to_date'];
	 		$this->data['invoice_type']= @$_POST['invoice_type'];
	 		$this->data['status']= @$_POST['status'];
	 		$this->data['file_no_type']=@$_POST['file_no_type'];
	 		$this->data['clients_data']=$clients;
	 		$this->data['clients_name']=@$_POST['clients_name'];
	 		$this->data['total_inv_amt']=$tot_inv_amt;
	 		$this->data['currency'] = $currency;

	 		$this->load->view('admin/layout/main_app_view', $this->data);

			#$this->load->view('viewcompanymaster');
		} else {

			$mainmodule_id = 3;
			$submodule_id = 51;
			
			$status = isset($_GET['a']) ? $_GET['a'] : '1';

			$this->data['title'] = 'ACI - viewinvoicefileregister';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='viewinvoicefileregister';

			//$result = $this->Invoice_master->getAllInvoicedata($invoice_info);
			$result = $this->Invoice_master->getAllInvoicedata();
			//print_r($result);exit;
			$clients = $this->Client_master->getClientdataByBranchid($_SESSION['branch_id']);

			$currency = $this->Invoice_master->getCurrency();
			//print_r($currency);exit;

			$tot_inv_amt = 0;
        	foreach($result as $key=>$value)
        	{
           		$tot_inv_amt+= $value['invoice_amt'];
        	}
        	#echo $tot_quantity;exit;

			$params['main_menus'] = $mainmodule_id;
	        $params['sub_menus'] = $submodule_id;
	        $params['user_access_id'] = $_SESSION['userId'];

			$rights = $this->User_master->getAccessforUserId($params);
	     
	 		$this->data['invoice_data'] = $result;
	 		$this->data['access_right'] = $rights;
	 		$this->data['clients_data']=$clients;
	 		$this->data['total_inv_amt']=$tot_inv_amt;
	 		$this->data['currency'] = $currency;

	 		$this->load->view('admin/layout/main_app_view', $this->data);

			#$this->load->view('viewcompanymaster');
		
		}	
		
	}
}

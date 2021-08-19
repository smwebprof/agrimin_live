<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewfileinvoicepayment extends CI_Controller {

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
		$this->load->model('File_master');
		$this->load->model('Branch_master');

		if (@$_POST) {
			$mainmodule_id = 3;
			$submodule_id = 51;
			
			$status = isset($_GET['a']) ? $_GET['a'] : '1';

			$this->data['title'] = 'ACI - viewinvoicepayment';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='viewinvoicepayment';

			//$result = $this->Invoice_master->getAllInvoicePaymentdata();
			$result = $this->Invoice_master->getAllInvoicePaymentdataByStatusSearch($_POST);
			//print_r($result);exit;
			$clients = $this->Client_master->getClientdataByBranchid($_SESSION['branch_id']);

			$tot_inv_amt = 0;
			$tot_inv_rec_amt = 0;
        	foreach($result as $key=>$value)
        	{
           		$tot_inv_amt+= @(float)$value['invoice_amt'];
           		$tot_inv_rec_amt+= @(float)$value['invoice_rec_amt'];
        	}
        	//echo $tot_inv_amt."====".$tot_inv_rec_amt;exit;

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
	 		$this->data['total_inv_amt']=@$tot_inv_amt;
	 		$this->data['tot_inv_rec_amt']=@$tot_inv_rec_amt;

	 		$this->load->view('admin/layout/main_app_view', $this->data);

			#$this->load->view('viewcompanymaster');

		} else {
			$mainmodule_id = 3;
			$submodule_id = 51;
			
			$status = isset($_GET['a']) ? $_GET['a'] : '1';

			$this->data['title'] = 'ACI - viewinvoicepayment';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='viewinvoicepayment';

			//$result = $this->Invoice_master->getAllInvoicePaymentdata();
			$result = $this->Invoice_master->getAllInvoicePaymentdataByStatus();
			//print_r($result);exit;
			$clients = $this->Client_master->getClientdataByBranchid($_SESSION['branch_id']);

			$tot_inv_amt = 0;
			$tot_inv_rec_amt = 0;
        	foreach($result as $key=>$value)
        	{
           		$tot_inv_amt+= @(float)$value['invoice_amt'];
           		$tot_inv_rec_amt+= @(float)$value['invoice_rec_amt'];
        	}
        	//echo $tot_inv_amt."====".$tot_inv_rec_amt;exit;

			$params['main_menus'] = $mainmodule_id;
	        $params['sub_menus'] = $submodule_id;
	        $params['user_access_id'] = $_SESSION['userId'];

			$rights = $this->User_master->getAccessforUserId($params);
	     
	 		$this->data['invoice_data'] = $result;
	 		$this->data['access_right'] = $rights;
	 		$this->data['clients_data']=$clients;
	 		$this->data['total_inv_amt']=@$tot_inv_amt;
	 		$this->data['tot_inv_rec_amt']=@$tot_inv_rec_amt;

	 		$this->load->view('admin/layout/main_app_view', $this->data);

			#$this->load->view('viewcompanymaster');
		}	
	}
}

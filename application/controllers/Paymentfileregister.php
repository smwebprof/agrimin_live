<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paymentfileregister extends CI_Controller {

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

		#print_r($_POST);exit;
		$this->load->library('form_validation');
		$this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Invoice_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $result = $this->Invoice_master->getInvoicedata($id);
        //print_r($result);exit;
        $countries = $this->company_master->getCountries();

        $states = $this->company_master->getStates($result[0]['country_id']);
        $cities = $this->company_master->getCities($result[0]['state_id']);

        if ($_POST) {
        	//print_r($_POST);exit;
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];

        	$resultdata = $this->Invoice_master->addInvoiceData($this->input->post());

        	$this->data['success'] = "Data saved successfully!!!. Invoice No is: ".$resultdata;

        	$this->data['title'] = 'ACI - Invoicefileregister';
			$this->data['invoice_data'] = @$result;
			$this->data['countries'] = $countries;
			$this->data['states'] = $states;
	        $this->data['cities'] = $cities;
			$this->data['layout_body']='paymentfileregister';
	 	

	 		$this->load->view('admin/layout/main_app', $this->data);

        } else {

			$this->data['title'] = 'ACI - Invoicefileregister';
			$this->data['invoice_data'] = @$result;
			$this->data['countries'] = $countries;
			$this->data['states'] = $states;
	        $this->data['cities'] = $cities;
			$this->data['layout_body']='paymentfileregister';
	 	

	 		$this->load->view('admin/layout/main_app', $this->data);

			#$this->load->view('file_register_new');
	  }		
	
	}

	public function fetch_branch()
	{
		$this->load->model('branch_master'); 
		
		echo $this ->branch_master->fetch_branch($this->input->post('branch_id'));

	}
}

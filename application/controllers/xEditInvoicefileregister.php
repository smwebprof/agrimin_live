<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditInvoicefileregister extends CI_Controller {

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
		
		#print_r($_POST);exit;
		$this->load->library('form_validation');
		$this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Invoice_master');
        $this->load->model('File_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        
        $result = $this->Invoice_master->getInvoicedataById($id);
        $file_data = $this->File_master->getAllFiledata();
        //print_r($result);exit;

        if ($_POST) {
        	//print_r($_POST);exit;
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;

        	$resultdata = $this->Invoice_master->updateInvoiceData($this->input->post());

        	$this->data['success'] = "Data updated successfully!!!.";

        	$this->data['title'] = 'ACI - Invoicefileregister';
			$this->data['file_data'] = @$file_data;
			$this->data['invoice_data'] = @$result;
			$this->data['layout_body']='editinvoicefileregister';
	 	

	 		$this->load->view('admin/layout/main_app', $this->data);

        } else {

			$this->data['title'] = 'ACI - Invoicefileregister';
			$this->data['file_data'] = @$file_data;
			$this->data['invoice_data'] = @$result;
			$this->data['layout_body']='editinvoicefileregister';
	 	

	 		$this->load->view('admin/layout/main_app', $this->data);

			#$this->load->view('file_register_new');
	  }		
	
	}

	public function fetch_branch()
	{
		$this->load->model('branch_master'); 
		
		echo $this ->branch_master->fetch_branch($this->input->post('branch_id'));

	}

	public function fetch_filedata()
    {
        $this->load->model('File_master'); 
        
        $result = $this ->File_master->getFileInvdataById($this->input->post('id'));
        echo $result['file_creation_date']."|".$result['client_name']."|".$result['address']."|".$result['country']."|".$result['state']."|".$result['city']."|".$result['countryid']."|".$result['stateid']."|".$result['cityid'];
        #echo $result['address']."|".$result['tel_no']."|".$result['company_web_page']."|".$result['country']."|".$result['state']."|".$result['city']."|".$result['countryid']."|".$result['stateid']."|".$result['cityid']."|".$result['tel_prefix'];
    }
}

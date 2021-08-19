<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SelectInvoicefileregister extends CI_Controller {

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
        $this->load->model('unit_master');
        $this->load->helper('form');
        $this->load->model('Invoice_master');
        $id = base64_decode($_GET['id']);
        #$result = $this->company_master->getRows();

        $result = $this->Invoice_master->getMultInvoiceByFileNo($id);
        //print_r($result);exit;
        $getInvoiceByFileNo = $this->Invoice_master->getInvoiceByFileNo($id);
        $draft_file_id = @$getInvoiceByFileNo[0]['file_no'];

        $getInvoiceAccess = $this->Invoice_master->getInvoicedata($id);
        //print_r($result);exit;
        
        if ($_POST) {
        	//print_r($_POST);exit;
        	if ($_POST['select_inv_type']=='Single') {
        		$redirect_url = BASE_PATH."Invoicefileregister?id=".base64_encode($id);
                redirect($redirect_url);
        	}

        	if ($_POST['select_inv_type']=='Multiple') {
        		$redirect_url = BASE_PATH."Invoicemultifileregister?id=".base64_encode($id);
                redirect($redirect_url);
        	}

        } else {
			$this->data['title'] = 'ACI - SelectInvoicefileregister';
			#$this->data['company_data'] = $result;
			$this->data['draft_file_id'] = @$draft_file_id;

			#if ($_SESSION['branch_id']!=$getInvoiceAccess[0]['invoice_by_branch'] || @$this->data['draft_file_id']) {

			if ($_SESSION['branch_id']!=$getInvoiceAccess[0]['invoice_by_branch']) {
                $this->data['layout_body']='accesserror';
            }

			if (@$this->data['draft_file_id']) {
                $this->data['layout_body']='accesserror';
            } else {
                $this->data['layout_body']='selectinvoicefileregister'; 
            }

			$this->data['invoice_data'] = @$result; 	

 			$this->load->view('admin/layout/main_app', $this->data);

			#$this->load->view('file_register_new');

		}	
		
	}
}

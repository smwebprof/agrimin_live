<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddInvoicefileregister extends CI_Controller {

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
        $this->load->model('File_master');
        $this->load->helper('form');
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $result = $this->File_master->getAllFiledata();
        //print_r($result);exit;

        if ($_POST) {
        	//print_r($_POST);exit;
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];
        	$_POST['file_date'] = date('d-m-Y',strtotime($_POST['file_date']));

        	$resultdata = $this->Invoice_master->addInvoiceData($this->input->post());

        	$UpdateFileData = $this->Invoice_master->UpdateFileDataByInvoice($this->input->post());

        	$this->data['success'] = "Data saved successfully!!!. Invoice No is: ".$resultdata;

        	$this->data['title'] = 'ACI - Invoicefileregister';
			$this->data['invoice_data'] = @$result;
			$this->data['layout_body']='addinvoicefileregister';
	 	

	 		$this->load->view('admin/layout/main_app', $this->data);

        } else {

			$this->data['title'] = 'ACI - Invoicefileregister';
			$this->data['file_data'] = @$result;
			$this->data['layout_body']='addinvoicefileregister';
	 	

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
        echo $result['file_creation_date']."|".$result['client_name']."|".$result['address']."|".$result['country']."|".$result['state']."|".$result['city']."|".$result['countryid']."|".$result['stateid']."|".$result['cityid']."|".$result['client_id']."|".$result['vessel_name']."|".$result['voyage_no']."|".$result['cargo_group_name']."|".$result['commodity_name']."|".$result['paking_name']."|".$result['packing_desc']."|".$result['approx_qty']."|".$result['unit_name']."|".$result['description']."|".$result['attendance_placed']."|".$result['origin']."|".$result['load_port']."|".$result['discharge_port'];

    }
}

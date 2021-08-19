<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoicefileregister extends CI_Controller {

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

    	#print_r($_SESSION);exit;
        #print_r($_POST);exit;
		$this->load->library('form_validation');
		$this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Invoice_master');
        $this->load->model('File_master');
        $this->load->model('Unit_master');
        $this->load->model('Client_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $getInvoiceByFileNo = $this->Invoice_master->getInvoiceByFileNo($id);
        $draft_file_id = @$getInvoiceByFileNo[0]['file_no'];
        
        $result = $this->Invoice_master->getInvoicedata($id);
        //print_r($result);exit;
        $countries = $this->company_master->getCountries();

        $file_options = $this->File_master->getFileOptions();

        $units = $this->Unit_master->getAllUnitdata();

        $contact = $this->Client_master->getClientAttentiondetails($result[0]['client_id']);
        
        $currency = $this->Invoice_master->getCurrency();

        $states = $this->company_master->getStates($result[0]['countryid']);
        $cities = $this->company_master->getCities($result[0]['stateid']);

        $cargo_details = $this->File_master->editFileCargoDetailsByIdMult($result[0]['id']);
        #print_r($cargo_details);exit;

        $cargo_group_details = implode(',', array_column($cargo_details, 'cargo_group_name'));
        #echo $cargo_group_details;exit;
        $cargo_group_arr = explode(",", $cargo_group_details);
        $cargo_group_arr = array_unique($cargo_group_arr);
        #print_r($cargo_group_arr);exit;
        $cargo_group_name = implode(',', $cargo_group_arr);
        #echo $cargo_group_name;exit;

        $commodity_name = implode(',', array_column($cargo_details, 'commodity_name'));
        #echo $commodity_name;exit;
        $commodity_arr = explode(",", $commodity_name);
        #print_r($commodity_arr);exit;
        $load_port = implode(',', array_column($cargo_details, 'load_port'));
        $discharge_port = implode(',', array_column($cargo_details, 'discharge_port'));

        $approx_units = @$this->Unit_master->getUnitById($cargo_details[0]['approx_unit']);
        //print_r($approx_units);exit;

        $tot_quantity = 0;
        foreach($cargo_details as $key=>$value)
        {
           $tot_quantity+= $value['approx_qty'];
        }

        if ($_POST) {
        	//print_r($_POST);exit;
        	#echo count($_POST['div_work_type']);exit;
             if (strtotime(@$_POST['inspection_end_date']) < strtotime(@$_POST['inspection_start_date'])) {
                $redirect_url = BASE_PATH."Invoicefileregister?id=".base64_encode($id)."&msg=1";
                redirect($redirect_url);
            }
        

        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];

        	########################### getInvoiceId by login branch ######################################
    		/*****$getInvoiceId = $this->Invoice_master->getInvoiceIdByBranch();
    		//print_r($getInvoiceId);exit;
    		if (isset($getInvoiceId) && !empty($getInvoiceId)) {
        		$invoiceId = @$getInvoiceId[0]['invoice_id']+1;
                $invoiceId = str_pad($invoiceId, 3, '0', STR_PAD_LEFT);
        		$_POST['invoice_id'] = $invoiceId;
        	} else { 
        		$invoiceId = 1;
                $invoiceId = str_pad($invoiceId, 3, '0', STR_PAD_LEFT);
        		$_POST['invoice_id'] = $invoiceId;
        	}
        	#print_r($_POST['invoice_id']);exit;*****/
    		########################### getInvoiceId by login branch ######################################

        	$resultdata = $this->Invoice_master->addInvoiceDataNew($this->input->post()); 
          
        	// update invoice no
        	#$updateinvoiceno['invoice_no'] = 'ACI/'.$_SESSION['country_code']."/".$_SESSION['operatingyear']."/".$_POST['file_id']."/".$invoiceId;
            /*****$updateinvoiceno['invoice_no'] = 'ACI/'.$_POST['file_no']."/".$invoiceId;
        	$updateinvoiceno['id'] = $resultdata;
            $updateInvoiceNoData = $this->Invoice_master->updateInvoiceNo($updateinvoiceno);*****/
            //$resultdata = 111;
        	$_POST['invoice_no'] = $resultdata;
        	$invoicedata = $this->Invoice_master->addInvoiceDetailsNew($this->input->post());
            //exit;
        	//$UpdateFileData = $this->Invoice_master->UpdateFileDataByInvoice($this->input->post());

        	$viewinvoice = BASE_PATH."Viewinvoicefileregister?msg=1";
            redirect($viewinvoice);

        	/*$this->data['success'] = "Data saved successfully!!!. Invoice No is: ".$resultdata;

        	$this->data['title'] = 'ACI - Invoicefileregister';
			$this->data['invoice_data'] = @$result;
			$this->data['file_options'] = $file_options;
			$this->data['units'] = $units;
			$this->data['countries'] = $countries;
			$this->data['states'] = $states;
	        $this->data['cities'] = $cities;
	        $this->data['currency'] = $currency;
			$this->data['layout_body']='invoicefileregister';
	 	

	 		$this->load->view('admin/layout/main_app', $this->data);*/

        } else { 

			$this->data['title'] = 'ACI - Invoicefileregister'; 
			$this->data['invoice_data'] = @$result;
			$this->data['file_options'] = $file_options;
			$this->data['units'] = $units;
			$this->data['countries'] = $countries;
			$this->data['states'] = $states;
	        $this->data['cities'] = $cities;
	        $this->data['contact'] = $contact;
	        $this->data['currency'] = $currency;
            $this->data['cargo_details'] = $cargo_details;
            $this->data['commodity_name'] = $commodity_name;
            $this->data['tot_quantity'] = $tot_quantity;
            $this->data['tot_unit'] = @$approx_units[0]['unit_name'];
            $this->data['load_port'] = $load_port;
            $this->data['discharge_port'] = $discharge_port;
            $this->data['draft_file_id'] = @$draft_file_id;
            $this->data['cargo_group_name'] = @$cargo_group_name;
			if ($_SESSION['branch_id']!=$result[0]['invoice_by_branch'] || @$this->data['draft_file_id']) { 
                $this->data['layout_body']='accesserror';
            } else {
                $this->data['layout_body']='invoicefileregister'; 
            }

	 		$this->load->view('admin/layout/main_app_inv', $this->data);

			#$this->load->view('file_register_new');
	  }		
	
	}

	public function fetch_branch()
	{
		$this->load->model('branch_master'); 
		
		echo $this ->branch_master->fetch_branch($this->input->post('branch_id'));

	}
}

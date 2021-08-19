<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addproformainvoice extends CI_Controller {

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
        $this->load->model('Invoice_master');
        $this->load->model('File_master');
        $this->load->model('Client_master');
        $this->load->model('Cargo_Group_master');
        $this->load->model('Cargo_master');
        $this->load->model('Packing_master');
        $this->load->model('user_master');
        $this->load->model('Unit_master');
        $this->load->helper('form');
        #$id = base64_decode($_GET['id']);
        $id = base64_decode('ODQ=');
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $getInvoiceByFileNo = $this->Invoice_master->getInvoiceByFileNo($id);
        $draft_file_id = @$getInvoiceByFileNo[0]['file_no'];
        
        $result = $this->Invoice_master->getInvoicedata($id);
        //print_r($result);exit;
        $countries = $this->company_master->getCountries();
        $clients = $this->Client_master->getClientdata();
        $file_options = $this->File_master->getFileOptions();
        $file_instructions = $this->File_master->getInstructions();
        $cargogroup = $this->Cargo_Group_master->getCargoGroup();
        $units = $this->Unit_master->getAllUnitdata();
        $contact = $this->Client_master->getClientAttentiondetails($result[0]['client_id']);    
        $currency = $this->Invoice_master->getCurrency();
        $states = $this->company_master->getStates($result[0]['countryid']);
        $cities = $this->company_master->getCities($result[0]['stateid']);
        $cargo_details = $this->File_master->editFileCargoDetailsById($result[0]['id']);
        #print_r($cargo_details);exit;
        $commodity_name = implode(', ', array_column($cargo_details, 'commodity_name'));
        $commodity_arr = explode(",", $commodity_name);
        #print_r($commodity_arr);exit;
        $load_port = implode(', ', array_column($cargo_details, 'load_port'));
        $discharge_port = implode(', ', array_column($cargo_details, 'discharge_port'));

        $tot_quantity = 0;
        foreach($cargo_details as $key=>$value)
        {
           $tot_quantity+= $value['approx_qty'];
        }

        if ($_POST) {
        	//print_r($_POST);exit;
        	#echo count($_POST['div_work_type']);exit;
             if (strtotime($_POST['inspection_end_date']) < strtotime($_POST['inspection_start_date'])) {
                $redirect_url = BASE_PATH."Addproformainvoice?id=".base64_encode($id)."&msg=1";
                redirect($redirect_url);
            }

            if (empty($_POST['cargo'][0])) { 
                $redirect_url = BASE_PATH."Addproformainvoice?msg=2";
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

        	$resultdata = $this->Invoice_master->addProformaInvoiceDataNew($this->input->post()); 
            
        	// update invoice no
        	#$updateinvoiceno['invoice_no'] = 'ACI/'.$_SESSION['country_code']."/".$_SESSION['operatingyear']."/".$_POST['file_id']."/".$invoiceId;
            /*****$updateinvoiceno['invoice_no'] = 'ACI/'.$_POST['file_no']."/".$invoiceId;
        	$updateinvoiceno['id'] = $resultdata;
            $updateInvoiceNoData = $this->Invoice_master->updateInvoiceNo($updateinvoiceno);*****/
            //$resultdata = 111;
        	$_POST['invoice_no'] = $resultdata;
        	$invoicedata = $this->Invoice_master->addProformaInvoiceDetailsNew($this->input->post());
            //exit;
        	#$UpdateFileData = $this->Invoice_master->UpdateFileDataByInvoice($this->input->post());

        	$viewinvoice = BASE_PATH."Viewproformainvoice?msg=1";
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
            $this->data['clients_data']=$clients;
			$this->data['file_options'] = $file_options;
            $this->data['instructions']=$file_instructions;
            $this->data['cargogroup']=$cargogroup;
			$this->data['units'] = $units;
			$this->data['countries'] = $countries;
			$this->data['states'] = $states;
	        $this->data['cities'] = $cities;
	        $this->data['contact'] = $contact;
	        $this->data['currency'] = $currency;
            $this->data['cargo_details'] = $cargo_details;
            $this->data['commodity_name'] = $commodity_name;
            $this->data['tot_quantity'] = $tot_quantity;
            $this->data['load_port'] = $load_port;
            $this->data['discharge_port'] = $discharge_port;
            $this->data['draft_file_id'] = @$draft_file_id;
			
            $this->data['layout_body']='addproformainvoice';

	 		$this->load->view('admin/layout/main_app_profinv', $this->data);

			#$this->load->view('file_register_new');
	  }		
	
	}

	public function fetch_branch()
	{
		$this->load->model('branch_master'); 
		
		echo $this ->branch_master->fetch_branch($this->input->post('branch_id'));

	}

    public function fetch_clientdata()
    {
        $this->load->model('Interaction_master'); 
        
        $result = $this ->Interaction_master->fetch_clientdata($this->input->post('id'));
        echo $result['address']."|".$result['zip_pin_code']."|".$result['tel_no']."|".$result['company_web_page']."|".$result['country']."|".$result['state']."|".$result['city']."|".$result['countryid']."|".$result['stateid']."|".$result['cityid']."|".$result['country_code'];
    }

    public function fetch_cargo()
    {
        $this->load->model('Invoice_master'); 
        
        echo $this ->Invoice_master->fetch_cargo($this->input->post('cargo_group'));

    }

    public function fetch_packing()
    {
        $this->load->model('Invoice_master'); 
        
        echo $this ->Invoice_master->fetch_packing();

    }

    public function fetch_unit()
    {
        $this->load->model('Invoice_master'); 
        
        echo $this ->Invoice_master->fetch_unit();

    }

}

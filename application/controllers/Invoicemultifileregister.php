<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoicemultifileregister extends CI_Controller {

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

        $getInvoiceNoByFileNo = @$this->Invoice_master->getMultInvoiceIdByFileNo($id);
        //print_r($getInvoiceNoByFileNo);exit;

        $getInvoiceTotalQuantByFileNo = @$this->Invoice_master->getInvoiceTotalQuantByFileNo($id);
        //print_r($getInvoiceTotalQuantByFileNo);exit;
        if (count($getInvoiceTotalQuantByFileNo)>0) {
            foreach ($getInvoiceTotalQuantByFileNo as $a=>$b) {
                $cargo_qty_total[$b['file_cargo_id']] = $b;
            }
            //print_r($cargo_qty_total);exit;
        }
            
        if (!empty(@$getInvoiceNoByFileNo[0]['id'])) {
            $getInvoiceDetailsByFileNo = @$this->Invoice_master->getInvoiceDetailsByFileNo($id,@$getInvoiceNoByFileNo[0]['id']);
            //print_r($getInvoiceDetailsByFileNo);exit;
            if (count($getInvoiceDetailsByFileNo)>0) {
                foreach ($getInvoiceDetailsByFileNo as $k=>$v) {
                    $cargo_info[$v['file_cargo_id']] = $v;
            }
            //print_r($cargo_info);exit;
            }
        }

        $getInvoiceByFileNo = $this->Invoice_master->getInvoiceByFileNo($id);
        //print_r($getInvoiceByFileNo);exit;
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
        //print_r($cargo_details);exit;
        foreach ($cargo_details as $p=>$q) {
            /*if (count(@$cargo_info)>0) {
                $cargo_details_info[$q['id']] = $q;
                $cargo_details_info[$q['id']]['approx_qty'] = $cargo_info[$q['id']]['approx_qty'];
            } else {
                $cargo_details_info[$q['id']] = $q;
            }*/
            $cargo_details_info[$q['id']] = $q;
        }
        //print_r($cargo_details_info);exit;
        #echo $cargo_details_info['114']['approx_qty'];exit;
        #echo $cargo_qty_total['116']['approx_qty'];exit;
        foreach ($cargo_details_info as $x=>$y) { 
            
            if ((int)$cargo_details_info[$x]['approx_qty']!=@(int)$cargo_qty_total[$x]['approx_qty']) { 
                if (!empty(@$cargo_info)) {
                    if (count(@$cargo_info)>0) { 
                        $y['approx_qty'] = @(int)$y['approx_qty']-@(int)$cargo_info[$x]['approx_qty'];
                        $cargo_details_mult[] = $y; 
                    } else { 
                        $cargo_details_mult[] = $y;  
                    }
                } else {
                   $cargo_details_mult[] = $y; 
                }
            } /* else { 
                $cargo_details_mult[] = $y;
            }*/             
        }
        //print_r($cargo_details_mult);exit; 


        $cargo_group_details = implode(',', array_column($cargo_details_mult, 'cargo_group_name'));
        #echo $cargo_group_details;exit;
        $cargo_group_arr = explode(",", $cargo_group_details);
        $cargo_group_arr = array_unique($cargo_group_arr);
        #print_r($cargo_group_arr);exit;
        $cargo_group_name = implode(',', $cargo_group_arr);
        #echo $cargo_group_name;exit;

        $commodity_name = implode(',', array_column($cargo_details_mult, 'commodity_name'));
        #echo $commodity_name;exit;
        $commodity_arr = explode(",", $commodity_name);
        #print_r($commodity_arr);exit;
        $load_port = implode(',', array_column($cargo_details_mult, 'load_port'));
        $discharge_port = implode(',', array_column($cargo_details_mult, 'discharge_port'));

        $approx_units = @$this->Unit_master->getUnitById($cargo_details_mult[0]['approx_unit']);
        //print_r($approx_units);exit;

        $getInvCurrBal = @$this->Invoice_master->getMultInvoiceByFileNo($id);
        //print_r($getInvCurrBal);exit;

        $tot_quantity = 0;
        $tot_quantity_org = 0;
        foreach($cargo_details as $key=>$value)
        {
           $tot_quantity+= $value['approx_qty'];
           $tot_quantity_org+= $value['approx_qty'];
        }

        if (isset($getInvCurrBal[0]['invoice_curr_bal'])) {
            $tot_quantity = $getInvCurrBal[0]['invoice_curr_bal'];
        } 

        if ($_POST) {
        	//print_r($_POST);exit;
        	#echo count($_POST['div_work_type']);exit;

            $invtot_quantity = 0;
            foreach($_POST['invitems_quantity'] as $key=>$value)
            {
                if (@$_POST['invitems_cargo_group'][$key] !== "Other") {
                    @$invtot_quantity+= @$value;
                    $_POST['invtotitems_quantity'] = @$invtot_quantity;
                }

            }
            //echo $invtot_quantity."===".$_POST['inv_quantity']."===".$_POST['invoice_curr_bal'];exit;
            if ($invtot_quantity > $_POST['invoice_curr_bal']) {
                $redirect_url = BASE_PATH."Invoicemultifileregister?id=".base64_encode($id)."&msg=2";
                redirect($redirect_url);
            }

            if (strtotime(@$_POST['inspection_end_date']) < strtotime(@$_POST['inspection_start_date'])) {
                $redirect_url = BASE_PATH."Invoicemultifileregister?id=".base64_encode($id)."&msg=1";
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

        	$resultdata = $this->Invoice_master->addInvoiceDataMultNew($this->input->post()); 
          
        	// update invoice no
        	#$updateinvoiceno['invoice_no'] = 'ACI/'.$_SESSION['country_code']."/".$_SESSION['operatingyear']."/".$_POST['file_id']."/".$invoiceId;
            /*****$updateinvoiceno['invoice_no'] = 'ACI/'.$_POST['file_no']."/".$invoiceId;
        	$updateinvoiceno['id'] = $resultdata;
            $updateInvoiceNoData = $this->Invoice_master->updateInvoiceNo($updateinvoiceno);*****/
            //$resultdata = 111;
        	$_POST['invoice_no'] = $resultdata;
        	$invoicedata = $this->Invoice_master->addInvoiceDetailsNew2($this->input->post());
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

			$this->data['title'] = 'ACI - Invoicemultifileregister'; 
			$this->data['invoice_data'] = @$result;
			$this->data['file_options'] = $file_options;
			$this->data['units'] = $units;
			$this->data['countries'] = $countries;
			$this->data['states'] = $states;
	        $this->data['cities'] = $cities;
	        $this->data['contact'] = $contact;
	        $this->data['currency'] = $currency;
            $this->data['cargo_details'] = $cargo_details_mult;
            $this->data['commodity_name'] = $commodity_name;
            $this->data['tot_quantity'] = $tot_quantity;
            $this->data['tot_quantity_org'] = $tot_quantity_org;
            $this->data['tot_unit'] = @$approx_units[0]['unit_name'];
            $this->data['load_port'] = $load_port;
            $this->data['discharge_port'] = $discharge_port;
            $this->data['draft_file_id'] = @$draft_file_id;
            $this->data['cargo_group_name'] = @$cargo_group_name;
			if ($_SESSION['branch_id']!=$result[0]['invoice_by_branch'] || @$this->data['draft_file_id']) { 
                $this->data['layout_body']='accesserror';
            } else {
                $this->data['layout_body']='invoicemultifileregister'; 
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

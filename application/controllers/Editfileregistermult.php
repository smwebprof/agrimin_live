<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editfileregistermult extends CI_Controller {

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
	 *  Author : Shivaji M Dalvi
	 *
	 */ 
	public function index()
	{
	
		if (!isset($_SESSION['userId'])) {
			$login = BASE_PATH."login/";
			redirect($login);
		}
		
		#print_r($_SESSION);exit;
		
		$this->load->model('Client_master'); 
		$this->load->model('Branch_master'); 
		$this->load->model('File_master');
		$this->load->model('Cargo_Group_master');
		$this->load->model('Cargo_master');
		$this->load->model('Packing_master');
		$this->load->model('user_master');
		$this->load->model('Unit_master');
		$this->load->model('Invoice_master');
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];
        $id = base64_decode($_GET['id']);


        if ($_POST) {
	        //print_r($_POST);exit;
        	#echo count($_POST['option_type']);exit;
        	if(!isset($_POST['option_type'])) {
        		$redirect_url = BASE_PATH."Editfileregistermult?id=".base64_encode($id)."&msg=1";
                redirect($redirect_url);	
        	}

        	if (empty($_POST['cargo'][0])) { 
        		$redirect_url = BASE_PATH."Editfileregistermult?id=".base64_encode($id)."&msg=2";
                redirect($redirect_url);	
        	} 

        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];
        	$_POST['nomination_date'] = date('Y-m-d H:i:s',strtotime($_POST['nomination_date']));
        	#print_r($this->input->post());exit;

        	$config['upload_path'] = './file_uploads/';
        	$config['allowed_types'] = 'xls|pdf|doc|xlsx|docx'; //xls|pdf|doc //*
        	$config['max_size'] = 512000;

        	$this->load->library('upload', $config);
        	$this->upload->initialize($config);

        	if (!$this->upload->do_upload('upl_nomination')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
            #echo '11111';exit;
            $_POST['upl_nomination_path'] = @$_POST['hid_upload_nomination_path'];
       		 } else {
            $data = array('upl_nomination_path' => $this->upload->data());
            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
            #print_r($data);exit;
            #echo $data['upl_purpose_path']['file_name'];exit;
            $_POST['upl_nomination_path'] = $data['upl_nomination_path']['file_name'];
            if (!$_POST['upl_nomination_path']) { $_POST['upl_nomination_path'] = '';}
          	#echo '22222';exit;
        	}

        	if (!$this->upload->do_upload('upl_rate')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
            #echo '11111';exit;
            $_POST['upl_rate_path'] = @$_POST['hid_upload_rate_path'];
       		 } else {
            $data = array('upl_rate_path' => $this->upload->data());
            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
            #print_r($data);exit;
            #echo $data['upl_purpose_path']['file_name'];exit;
            $_POST['upl_rate_path'] = $data['upl_rate_path']['file_name'];
            if (!$_POST['upl_rate_path']) { $_POST['upl_rate_path'] = '';}
          	#echo '22222';exit;
        	}

        	if (!$this->upload->do_upload('upl_additional_docs')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
            #echo '11111';exit;
            $_POST['upload_additional_docs_path'] = @$_POST['hid_upload_additional_docs_path'];
       		 } else {
            $data = array('upload_additional_docs_path' => $this->upload->data());
            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
            #print_r($data);exit;
            #echo $data['upl_purpose_path']['file_name'];exit;
            $_POST['upload_additional_docs_path'] = $data['upload_additional_docs_path']['file_name'];
            if (!$_POST['upload_additional_docs_path']) { $_POST['upload_additional_docs_path'] = '';}
          	#echo '22222';exit;
        	}


        	if ($_POST['status']=='Cancelled') {
        		$invoice_status = @$this->File_master->getInvoiceStatusByFileId($this->input->post());
        		if ($invoice_status) { 
        			$redirecturl = BASE_PATH."Viewfileregister?msg=2";
               		redirect($redirecturl);
            	}
        	}

        	$invoice_details = @$this->File_master->getInvoiceByFileId($this->input->post());
        	//print_r($invoice_details);exit;
        	$invoice_details_qty = implode(',', array_column($invoice_details, 'id'));
        	//echo $invoice_details_qty;exit;
        	if (!empty($invoice_details_qty)) { 
        	$invoice_details_info = @$this->File_master->getInvoiceDetailsByInvId($invoice_details_qty);
        	//print_r($invoice_details_info);exit;

        	$inv_tot_quantity = 0;
        	foreach($invoice_details_info as $key=>$value)
        	{
           		$inv_tot_quantity+= $value['approx_qty'];
        	}
        	//echo $inv_tot_quantity;exit;

        	#echo count($invoice_details);exit;
        	if (count(@$invoice_details)>0) {
        		$tot_quantity = 0;
        		foreach($_POST['div_quantity'] as $key=>$value)
        		{
           			$tot_quantity+= $value;
        		}
        		//echo $tot_quantity;exit;
        		if ($invoice_details[0]['invoice_type']=='Draft') {
        			@$invoice_curr_bal = $tot_quantity;
        		} else {
	        		if ($tot_quantity>@$invoice_details[0]['approx_qty']) {
	        			//$invoice_curr_bal = $tot_quantity - $invoice_details[0]['approx_qty'] + $invoice_details[0]['invoice_curr_bal'];
	        			$invoice_curr_bal = $tot_quantity - $inv_tot_quantity;
	        			//echo $invoice_curr_bal;exit;
	        		}
	        		if ($tot_quantity<@$invoice_details[0]['approx_qty']) {
	        			//$invoice_curr_bal = $invoice_details[0]['invoice_curr_bal'] - ($invoice_details[0]['approx_qty'] - $tot_quantity);
	        			$invoice_curr_bal = $inv_tot_quantity - $tot_quantity;
	        			//echo $invoice_curr_bal;exit;
	        		}
        		}
        		//echo $invoice_curr_bal;exit;
        		$update_inv_qty = $this->File_master->updateInvoiceQtyByFileId($tot_quantity,$this->input->post(),@$invoice_curr_bal);
        	}
        	} // invoice_details_qty end	
        	
        	$resultdata = $this->File_master->updateFilemaster($this->input->post());

        	#$cargo_details = $this->File_master->updateCargoDetailsById($this->input->post());
        	$cargo_details = $this->File_master->updateCargoDetailsByIdNewMult2($this->input->post());

        	if ($_POST['tax_options']=='N/A') {
        		$update_invoice = @$this->File_master->updateInvoiceByFileId($this->input->post());
        	}

        	########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'Editfileregister';
            $params['date_time'] = $dt;
            $params['action'] = 'Update';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################

        	if ($resultdata) {

        		$redirecturl = BASE_PATH."Viewfileregistermult?msg=1";
                redirect($redirecturl);

        		/*$this->data['title'] = 'ACI - Editfileregister';

        		$result = $this->File_master->getFiledataById($id);
        		//print_r($result);exit;

        		$clients = $this->Client_master->getClientdata();
				$branchs = $this->Branch_master->getBranchdata();
				$users = $this->user_master->getUsers($_SESSION['branch_id']);
				$importexport = $this->File_master->getImportExportdata();
				$filetype = $this->File_master->getFiletypedata();
				$filesuboptions = $this->File_master->getSubOptionsData();
				$cargogroup = $this->Cargo_Group_master->getCargoGroup();
				$cargo = $this->Cargo_master->getCargodata();
				$packing = $this->Packing_master->getPackingdata();
				$file_instructions = $this->File_master->getInstructions();
				$units = $this->Unit_master->getUnitdata();

				$this->data['success'] = "Data updated successfully!!!";
				$this->data['layout_body']='editfileregister';
				$this->data['file_data']=$result;
				$this->data['clients_data']=$clients;
				$this->data['branchs_data']=$branchs;
				$this->data['user_data']=$users;
				$this->data['importexport']=$importexport;
				$this->data['filetype']=$filetype;
				$this->data['filesuboptions']=$filesuboptions;
				$this->data['cargogroup']=$cargogroup;
				$this->data['cargo']=$cargo;
				$this->data['packing']=$packing;
				$this->data['instructions']=$file_instructions;
				$this->data['units']=$units;
	 			$this->load->view('admin/layout/main_app_editfile', $this->data);*/
 	
        	} else {
        		$redirecturl = BASE_PATH."Viewfileregistermult";
                redirect($redirecturl);
        	}

        } else {	

			$this->data['title'] = 'ACI - Editfileregister';

			$result = $this->File_master->getFiledataById($id);
			//print_r($result);exit;
			$params['file_options_id'] = $result[0]['file_options_id']; 
			$params['file_sub_type_id'] = $result[0]['file_sub_type_id'];

			$get_other_options = $this->File_master->getOtherFiledataById($params);	
			#print_r($get_other_options);exit;

			$cargo_details = $this->File_master->editFileCargoDetailsByIdMult($id);
			//print_r($cargo_details);exit;
			$commodity_name = implode(', ', array_column($cargo_details, 'cargo_group_id'));
			//print_r($commodity_name);exit;

			#$clients = $this->Client_master->getClientdataById($result[0]['client_id']);
			$clients = $this->Client_master->getClientdata();
			//print_r($clients);exit;
			$branchs = $this->Branch_master->getBranchdata();
			$users = $this->user_master->getUsersAll($_SESSION['branch_id']);
			$importexport = $this->File_master->getImportExportdata();
			$filetype = $this->File_master->getEditFiletypedata();
			$filesuboptions = $this->File_master->getSubOptionsData();
			$cargogroup = $this->Cargo_Group_master->getCargoGroup();
			#$cargo = $this->Cargo_master->getCargodata();
			$cargo = $this->Cargo_master->getCargodataByCargoGroupMult($commodity_name);
            foreach ($cargo as $k => $v) {
            	$cargo_names[$v['cargo_group_id']][$k] = $v;
            }
			//print_r($cargo_names);exit;
			$packing = $this->Packing_master->getPackingdata();
			$file_instructions = $this->File_master->getInstructions();
			$field_parameters = $this->File_master->fetch_field_parameters($result[0]['cargo_id']);
			$units = $this->Unit_master->getUnitdata();
			//print_r($file_parameters);exit;

			// check Inoice exist so user cannot edit quanity.
			$chkInvoice = @$this->Invoice_master->getMultInvoiceByFileNo($id);

			$user_details = explode(',',$result[0]['user_id']);

	////////////////////////////////////////////////////////////////////////////
			/*$this->load->model('user_master');
			$menus = $this->user_master->getMainmenus();
			$this->data['menus']=$menus;	
			$submenus = $this->user_master->getSubmenus();
			$arr= array();
			$arr1= array();
			$i=0;
			foreach ($submenus as $key=>$value)
			{  
				$arr[$value['menu_master_id']][$i] = $value['submenu_name'];
				$arr1[$value['menu_master_id']][$i] = $value['url'];
				$i++;
	        }
	        #print_r($arr1);exit;
			$this->data['submenus']=$arr;
			$this->data['urlmenus']=$arr1;*/
	///////////////////////////////////////////////////////////////////////////////
			$this->data['layout_body']='editfileregistermult';
			$this->data['file_data']=$result;
			$this->data['clients_data']=$clients;
			$this->data['branchs_data']=$branchs;
			$this->data['user_data']=$users;
			$this->data['importexport']=$importexport;
			$this->data['filetype']=$filetype;
			$this->data['filesuboptions']=$filesuboptions;
			$this->data['cargogroup']=$cargogroup;
			$this->data['cargo']=$cargo_names;
			$this->data['packing']=$packing;
			$this->data['instructions']=$file_instructions;
			$this->data['field_parameters']=$field_parameters;
			$this->data['user_details']=$user_details;
			$this->data['units']=$units;
			$this->data['other_file_sub_type']=$get_other_options;
			$this->data['cargo_details']=$cargo_details;
			if (!empty(@$chkInvoice[0])) {
				$this->data['invoice_flag']= 1;
			} 
	 		$this->load->view('admin/layout/main_app_editfile_mult', $this->data);

			#$this->load->view('file_register_new');
	 		}
	}

	public function fetch_cargo()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_cargo($this->input->post('cargo_group'));

	}
}

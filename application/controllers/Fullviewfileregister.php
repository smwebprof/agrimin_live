<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fullviewfileregister extends CI_Controller {

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
		
		//print_r($_SESSION);exit;
		if (empty(@$_SESSION['fname'])) {
			$login = BASE_PATH."login/";
			redirect($login);
		}
		
		
		#print_r($_SESSION);exit;
		$this->load->helper('url');
		$this->load->model('Client_master'); 
		$this->load->model('Branch_master'); 
		$this->load->model('File_master');
		$this->load->model('Cargo_Group_master');
		$this->load->model('Cargo_master');
		$this->load->model('Packing_master');
		$this->load->model('Unit_master');
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];
        $id = base64_decode($_GET['id']);


        if ($_POST) {
        	#print_r($_POST);exit;
        	#echo count($_POST['option_type']);exit;
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
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
       		 } else {
            $data = array('upl_rate_path' => $this->upload->data());
            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
            #print_r($data);exit;
            #echo $data['upl_purpose_path']['file_name'];exit;
            $_POST['upl_rate_path'] = $data['upl_rate_path']['file_name'];
            if (!$_POST['upl_rate_path']) { $_POST['upl_rate_path'] = '';}
          	#echo '22222';exit;
        	}

        	$resultdata = $this->File_master->updateFilemaster($this->input->post());

        	if ($resultdata) {
        		$this->data['title'] = 'ACI - Fileregister';

        		$result = $this->File_master->getFiledataById($id);
				
        		$clients = $this->Client_master->getClientdata();
				$branchs = $this->Branch_master->getBranchdata();
				$importexport = $this->File_master->getImportExportdata();
				$filetype = $this->File_master->getFiletypedata();
				$filesuboptions = $this->File_master->getSubOptionsData();
				$cargogroup = $this->Cargo_Group_master->getCargoGroup();
				#$cargo = $this->Cargo_master->getCargodata();
				#$packing = $this->Packing_master->getPackingdata();
				$instructions = $this->File_master->getInstructions();

				$this->data['success'] = "Your data is inserted successfully!!!";
				$this->data['layout_body']='fullviewfileregister';
				$this->data['file_data']=$result;
				$this->data['clients_data']=$clients;
				$this->data['branchs_data']=$branchs;
				$this->data['importexport']=$importexport;
				$this->data['filetype']=$filetype;
				$this->data['filesuboptions']=$filesuboptions;
				$this->data['cargogroup']=$cargogroup;
				#$this->data['cargo']=$cargo;
				#$this->data['packing']=$packing;
				$this->data['instructions']=$instructions;
	 			$this->load->view('admin/layout/main_app_editfile', $this->data);
 	
        	}

        } else {	
        	#print_r($_SESSION);exit;
			$this->data['title'] = 'ACI - Fileregister';

			$result = $this->File_master->getFiledataById($id);
			//print_r($result);exit;

			if($result[0]['file_no_type']=='Multiple') {
        		$redirect_url = BASE_PATH."Fullviewfileregistermult?id=".$_GET['id'];
                redirect($redirect_url);	
        	}


            if($result[0]['file_no_type']=='Inspection') {
        		$redirect_url = BASE_PATH."Fullviewfileregisterinsp?id=".$_GET['id'];
                redirect($redirect_url);	
        	}

			$params['file_options_id'] = $result[0]['file_options_id']; 
			$params['file_sub_type_id'] = $result[0]['file_sub_type_id'];

			$get_other_options = $this->File_master->getOtherFiledataById($params);	
			//print_r($get_other_options);exit;
            
			$cargo_details = $this->File_master->editFileCargoDetailsById($id);
			//print_r($cargo_details);exit;

			$clients = $this->Client_master->getClientdataById($result[0]['client_id']);
			if (isset($result[0]['branch_id'])) {
			$branchs = $this->Branch_master->getBranchdataById($result[0]['branch_id']);
			}
			$importexport = $this->File_master->getImportExportdataById($result[0]['import_export']);
			$filetype = $this->File_master->getFiletypedataById($result[0]['file_type_id']);
			$filesuboptions = $this->File_master->getSubOptionsData();
			$cargogroup = $this->Cargo_Group_master->getCargoGroupByIdMult($result[0]['cargo_group_id']);
			//print_r($cargogroup);exit;
			#$cargo = $this->Cargo_master->getCargodataById($result[0]['cargo_id']);
			#$packing = $this->Packing_master->getPackingdataById($result[0]['packing_id']);
			$file_instructions = $this->File_master->getInstructionsById($result[0]['special_instruction']);
			$invoice_by = $this->Branch_master->getBranchdataById($result[0]['invoice_by_branch']);
			$units = $this->Unit_master->getUnitById($result[0]['approx_unit']);
			//print_r($units);exit;
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
			$this->data['layout_body']='fullviewfileregister';
			$this->data['file_data']=$result;
			$this->data['clients_data']=$clients;
			if (isset($result[0]['branch_id'])) {
			$this->data['branchs_data']=$branchs;
			}
			$this->data['importexport']=$importexport;
			$this->data['filetype']=$filetype;
			$this->data['filesuboptions']=$filesuboptions;
			$this->data['cargogroup']=$cargogroup;
			#$this->data['cargo']=$cargo;
			#$this->data['packing']=$packing;
			$this->data['instructions']=$file_instructions;
			$this->data['invoice_by']=$invoice_by;
			$this->data['approx_unit']=$units;

			$this->data['cargo_details']=$cargo_details;

			$this->data['other_file_sub_type']=$get_other_options;
	 		$this->load->view('admin/layout/main_app_editfile', $this->data);

			#$this->load->view('file_register_new');
	 		}
	}

	public function fetch_cargo()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_cargo($this->input->post('cargo_group'));

	}
}

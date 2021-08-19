<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addfileregister extends CI_Controller {

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
		if ($_SESSION['userId']=='') {
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
		$this->load->helper('form');
		$this->load->library('form_validation');
        $dt = gmdate('Y-m-d H:i:s');
        $file_dt = gmdate('dmYHis');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];


        if ($_POST) {
        	#print_r($_POST);exit;
        	#echo count($_POST['option_type']);exit;
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	#print_r($this->input->post());exit;

        	if (@$this->input->post('sub_type') == '' || @$this->input->post('option_type') == '' ) { 
        		$this->data['errors'] = '<font size="3" color="red">Please select File Options</font>'; 

        		$this->data['title'] = 'ACI - Fileregister';
				
        		$clients = $this->Client_master->getClientdata();
				$branchs = $this->Branch_master->getBranchdata();
				$users = $this->user_master->getUsers();
				$importexport = $this->File_master->getImportExportdata();
				$filetype = $this->File_master->getFiletypedata();
				$filesuboptions = $this->File_master->getSubOptionsData();
				$cargogroup = $this->Cargo_Group_master->getCargoGroup();
				$cargo = $this->Cargo_master->getCargodata();
				$packing = $this->Packing_master->getPackingdata();
				$instructions = $this->File_master->getInstructions();

				//$this->data['success'] = "Data saved successfully!!!";
				$this->data['layout_body']='addfileregister';

				$this->data['clients_data']=$clients;
				$this->data['branchs_data']=$branchs;
				$this->data['user_data']=$users;
				$this->data['importexport']=$importexport;
				$this->data['filetype']=$filetype;
				$this->data['filesuboptions']=$filesuboptions;
				$this->data['cargogroup']=$cargogroup;
				$this->data['packing']=$packing;
				$this->data['instructions']=$instructions;
	 			$this->load->view('admin/layout/main_app_file', $this->data);

        	} else {	
        	
        	$config['upload_path'] = './file_uploads/';
        	$config['allowed_types'] = 'xls|pdf|doc|xlsx|docx'; //xls|pdf|doc //*
        	$config['max_size'] = 2000;

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

        	// For file password generation
        	$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    		$pass = array(); //remember to declare $pass as an array
    		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    		for ($i = 0; $i < 8; $i++) {
        		$n = rand(0, $alphaLength);
        		$pass[] = $alphabet[$n];
    		}

    		$_POST['file_password'] = implode($pass);

    		#print_r($_POST);exit;


        	$resultdata = $this->File_master->addFilemaster($this->input->post());

        	########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'Addfileregister';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################

        	if ($resultdata) {
        		$this->data['title'] = 'ACI - Fileregister';
				
        		$clients = $this->Client_master->getClientdata();
				$branchs = $this->Branch_master->getBranchdata();
				$users = $this->user_master->getUsers();
				$importexport = $this->File_master->getImportExportdata();
				$filetype = $this->File_master->getFiletypedata();
				$filesuboptions = $this->File_master->getSubOptionsData();
				$cargogroup = $this->Cargo_Group_master->getCargoGroup();
				$cargo = $this->Cargo_master->getCargodata();
				$packing = $this->Packing_master->getPackingdata();
				$instructions = $this->File_master->getInstructions();

				$this->data['success'] = "Data saved successfully!!!. File No is: ".$resultdata;
				$this->data['layout_body']='addfileregister';

				$this->data['clients_data']=$clients;
				$this->data['branchs_data']=$branchs;
				$this->data['user_data']=$users;
				$this->data['importexport']=$importexport;
				$this->data['filetype']=$filetype;
				$this->data['filesuboptions']=$filesuboptions;
				$this->data['cargogroup']=$cargogroup;
				$this->data['packing']=$packing;
				$this->data['instructions']=$instructions;
	 			$this->load->view('admin/layout/main_app_file', $this->data);

	 			}
 	
        	}

        } else {	

			$this->data['title'] = 'ACI - Fileregister';

			$clients = $this->Client_master->getClientdata();
			$branchs = $this->Branch_master->getBranchdata();
			$users = $this->user_master->getUsers();
			$importexport = $this->File_master->getImportExportdata();
			$filetype = $this->File_master->getFiletypedata();
			$filesuboptions = $this->File_master->getSubOptionsData();
			$cargogroup = $this->Cargo_Group_master->getCargoGroup();
			$cargo = $this->Cargo_master->getCargodata();
			$packing = $this->Packing_master->getPackingdata();
			$instructions = $this->File_master->getInstructions();
			#print_r($instructions);exit;
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
			$this->data['layout_body']='addfileregister';

			$this->data['clients_data']=$clients;
			$this->data['branchs_data']=$branchs;
			$this->data['user_data']=$users;
			$this->data['importexport']=$importexport;
			$this->data['filetype']=$filetype;
			$this->data['filesuboptions']=$filesuboptions;
			$this->data['cargogroup']=$cargogroup;
			$this->data['packing']=$packing;
			$this->data['instructions']=$instructions;
	 		$this->load->view('admin/layout/main_app_file', $this->data);

			#$this->load->view('file_register_new');
	 		}
	}

	public function fetch_cargo()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_cargo($this->input->post('cargo_group'));

	}

	public function fetch_field_parameters()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_field_parameters($this->input->post('cargo_id'));

	}

	public function fetch_lab_parameters()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_lab_parameters($this->input->post('cargo_id'));

	}

	
}

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
		
		#print_r($_SESSION);exit;
		if ($_SESSION['userId']=='') {
			$login = BASE_PATH."login/";
			redirect($login);
		}

			
		$this->load->model('Client_master'); 
		$this->load->model('Branch_master'); 
		$this->load->model('File_master');
		$this->load->model('Cargo_Group_master');
		$this->load->model('Cargo_master');
		$this->load->model('Packing_master');
		$this->load->model('user_master');
		$this->load->model('Unit_master');
		$this->load->helper('form');
		$this->load->library('form_validation');

        $dt = gmdate('Y-m-d H:i:s');
        $file_dt = gmdate('dmYHis');

        //print_r($_SESSION);exit;

        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        if ($_POST) {

        	if(!isset($_POST['option_type'])) {
        		$redirect_url = BASE_PATH."Addfileregister?msg=1";
                redirect($redirect_url);	
        	}

        	#echo count($_POST['option_type']);exit;
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];
        	$_POST['nomination_date'] = date('Y-m-d H:i:s',strtotime($_POST['nomination_date']));
        	#echo $_POST['user_data'][0];exit;
        	// include assigned user emails
        	if (isset($_POST['user_data'])) {
        		$assigned_user_id = $this->user_master->getUsersAllById($_POST['user_data']);

        		foreach ($assigned_user_id as $email_ids) {
        			$email_cc[] = $email_ids['office_email'];
        		}
        	} 

            #print_r($email_cc);exit;
        	#print_r($_POST);exit; 
        	#print_r($this->input->post());exit;

        	/*if (@$this->input->post('sub_type') == '' || @$this->input->post('option_type') == '' ) { 
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

        	} else {	*/
        	
        	
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

        	if (!$this->upload->do_upload('upl_additional_docs')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
            #echo '11111';exit;
       		 } else {
            $data = array('upl_additional_docs_path' => $this->upload->data());
            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
            #print_r($data);exit;
            #echo $data['upl_purpose_path']['file_name'];exit;

            $_POST['upl_additional_docs_path'] = $data['upl_additional_docs_path']['file_name'];
            if (!$_POST['upl_additional_docs_path']) { $_POST['upl_additional_docs_path'] = '';}
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
    		$_POST['status'] = 'Pending';

    		#print_r($_POST);exit;
    		########################### getFileId by login branch ######################################
    		$getFileId = $this->File_master->getFileIdByBranch();
    		//print_r($getFileId);exit;
    		if (isset($getFileId) && !empty($getFileId)) {
        		$fileId = @$getFileId[0]['file_id']+1;
        		$fileId = str_pad($fileId, 3, '0', STR_PAD_LEFT);
        		$_POST['file_id'] = $fileId;
        	} else { 
        		$fileId = 1;
				$fileId = str_pad($fileId, 3, '0', STR_PAD_LEFT);
        		$_POST['file_id'] = $fileId;
        	}
    		########################### getFileId by login branch ######################################

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


            #$updatefileno['file_no'] = $_SESSION['country_code']."/".$_SESSION['operatingyear']."/".$resultdata;
            $updatefileno['file_no'] = $_SESSION['country_code']."/".$_SESSION['operatingyear']."/".$fileId;
            $updatefileno['id'] = $resultdata;
            //print_r($updatefileno);exit;

            $updateFileNoData = $this->File_master->updateFileNo($updatefileno);

            $_POST['fileregister_transaction_id'] = $resultdata;
            // Add File Cargo Details
            $addFileCargoDetails = $this->File_master->addFileCargoDetails($this->input->post());

        	if ($resultdata) {

        		$file_details = $this->File_master->getFiledataById($resultdata);
        		$importexport = $this->File_master->getImportExportdataById($file_details[0]['import_export']);
        		$cargo_details = $this->File_master->getFileCargoDetailsById($resultdata);
        		#print_r($file_details);exit;
        		//////// send email notification ///////////////
        		$email_file_no = $updatefileno['file_no'];
        		$email_file_date = date('d-m-Y',strtotime($_POST['file_date']));
        		$email_file_user = $user;
        		$email_client_name = $file_details[0]['client_name'];
        		$email_commodity = $file_details[0]['commodity_name'];
        		$email_qty = $file_details[0]['approx_qty'];
        		$email_unit = $file_details[0]['unit_name'];
        		$email_vessel = $file_details[0]['vessel_name'];
        		$email_jobtype = $importexport[0]['name'];

        		$this->load->library('email');

		        $this->email->set_newline("\r\n");

		        $config['protocol'] = 'smtp';
		        $config['smtp_host'] = 'agrimincontrol.com';
		        $config['smtp_port'] = '587';
		        $config['smtp_user'] = 'admin@agrimincontrol.com';
		        $config['smtp_from_name'] = 'AGRIMIN Admin (Do_Not_Reply)';
		        $config['smtp_pass'] = '~Iec,=0v~iAk';
		        $config['wordwrap'] = TRUE;
		        $config['newline'] = "\r\n";
		        $config['mailtype'] = 'html';
		        //$config['smtp_crypto'] = 'ssl';

		        $subject = 'NEW FILE ALERT - '.$email_file_no;

		        $file_email_report = 'Dear User,<br><br>';
				$file_email_report .= 'A new file has been generated – please find the details below :<br><br>';

				$file_email_report .= '<table width="100%" cellpadding="0" border="1">
		          		 <tr><td align="center"><b>FILE NO</b></td><td align="center"><b>CREATED ON</b></td><td align="center"><b>CREATED BY</b></td><td align="center"><b>CLIENT NAME</b></td><td align="center"><b>VESSEL NAME</b></td><td align="center"><b>TYPE OF JOB</b></td></tr>
		          		 <tr><td align="center">'.$email_file_no.'</td><td align="center">'.$email_file_date.'</td><td align="center">'.$email_file_user.'</td><td align="center">'.$email_client_name.'</td><td align="center">'.$email_vessel.'</td><td align="center">'.$email_jobtype.'</td>
		          		 </tr></table>';

		        $file_email_report .= '<br><br><b>Cargo Details :</b><br><br>';
        		$file_email_report .= '<table width="100%" cellpadding="0" border="1">'; 
        		$file_email_report .= '<tr><td align="center"><b>CARGO</b></td><td align="center"><b>QUANTITY</b></td><td align="center"><b>UNIT</b></td></tr>';
        		foreach ($cargo_details as $k=>$v) {
        	 		 
		    	$file_email_report .= '<tr><td align="center">'.$v["commodity_name"].'</td><td align="center">'.$v["approx_qty"].'</td><td align="center">'.$v["unit_name"].'</td>
		          		 </tr>';
		    	}
		    	$file_email_report .= '</table>';  		 

		        $file_email_report .= '<br><br>From,<br>'; 
		        $file_email_report .= '<br>ACI Admin<br><br>'; 

		        $file_email_report .= '<br><b>NOTE: This is a system generated mail. Please do not reply</b><br><br>'; 
		                     
		        
		        $this->email->initialize($config);

		        $this->email->from($config['smtp_user'], $config['smtp_from_name']);
		        $this->email->to($_SESSION['user_email']);

        		$email_cc[] = 'siddharth.amin@agrimincontrol.com';
				$email_cc[] = 'vikram.amin@agrimincontrol.com';
				$email_cc[] = 'ayushi@rcaindia.net';
				$email_cc[] = 'dharams@rcaindia.net';
				if ($_SESSION['user_email']!=$_SESSION['primary_email']) {
					$email_cc[] = $_SESSION['primary_email'];
				}
				if ($_SESSION['user_email']!=$_SESSION['secondary_email'] && !empty($_SESSION['secondary_email'])) {
					$email_cc[] = $_SESSION['secondary_email'];
				}		        
				$this->email->cc($email_cc);

		        #$this->email->to('prashant.joshi@rcaindia.net,namrata@rcaindia.net'); // siddharth.amin@agrimincontrol.com,vikram.amin@agrimincontrol.com,ayushi@rcaindia.net
		        #$this->email->cc('shivaji.dalvi@rcaindia.com');
		        #$this->email->cc($email_cc);
		        $this->email->bcc('shivaji.dalvi@rcaindia.com,prashant.joshi@rcaindia.net,namrata@rcaindia.net');

		        $this->email->subject($subject);

		        $this->email->message($file_email_report);

		        if($this->email->send()) { 
		        	$redirecturl = BASE_PATH."Viewfileregister?msg=1";
                	redirect($redirecturl);
		            //return true;        
		        } else { 
		            $redirecturl = BASE_PATH."Viewfileregister";
                	redirect($redirecturl);
		        } 

		        $redirecturl = BASE_PATH."Viewfileregister?msg=1";
                redirect($redirecturl);


        		////////////////////////////////////////////////
        		

        		/*$this->data['title'] = 'ACI - Fileregister';
				
        		$clients = $this->Client_master->getClientdataByBranchid(@$_SESSION['branch_id']);
				$branchs = $this->Branch_master->getBranchdata();
				$users = $this->user_master->getUsers();
				$importexport = $this->File_master->getImportExportdata();
				$filetype = $this->File_master->getFiletypedata();
				$filesuboptions = $this->File_master->getSubOptionsData();
				$cargogroup = $this->Cargo_Group_master->getCargoGroup();
				$cargo = $this->Cargo_master->getCargodata();
				$packing = $this->Packing_master->getPackingdata();
				$instructions = $this->File_master->getInstructions();
				$units = $this->Unit_master->getUnitdata();

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
				$this->data['units']=$units;
	 			$this->load->view('admin/layout/main_app_file', $this->data);*/

	 			}
 	
        	#}

        } else {	

			$this->data['title'] = 'ACI - Fileregister';

			$clients = $this->Client_master->getClientdataByBranchid(@$_SESSION['branch_id']);
			$branchs = $this->Branch_master->getBranchdata();
			$users = $this->user_master->getUsersAll();
			$importexport = $this->File_master->getImportExportdata();
			$filetype = $this->File_master->getFiletypedata();
			$filesuboptions = $this->File_master->getSubOptionsData();
			$cargogroup = $this->Cargo_Group_master->getCargoGroup();
			$cargo = $this->Cargo_master->getCargodata();
			$packing = $this->Packing_master->getPackingdata();
			$instructions = $this->File_master->getInstructions();
			$units = $this->Unit_master->getUnitdata();
			$createinvoice = $this->Branch_master->getBranchInvoicesdata();
			#print_r($createinvoice);exit;
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
			$this->data['units']=$units;
			$this->data['createinvoice']=$createinvoice;
	 		$this->load->view('admin/layout/main_app_file', $this->data);

			#$this->load->view('file_register_new');
	 		}
	}

	public function fetch_cargo()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_cargo($this->input->post('cargo_group'));

	}

	public function fetch_packing()
	{
		$this->load->model('Packing_master'); 
		
		echo $this ->Packing_master->fetch_packing();

	}

	public function fetch_unit()
	{
		$this->load->model('Unit_master'); 
		
		echo $this ->Unit_master->fetch_unit();

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

	public function fetch_labparameters()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_labparameters($this->input->post('params'));

	}

	public function fetch_labmethods()
	{
		$this->load->model('File_master'); 
		
		echo $this ->File_master->fetch_labmethods($this->input->post('method_params'));

	}

	
}

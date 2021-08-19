<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edituserinfo extends CI_Controller {

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
		
        $this->load->library('form_validation');
        $this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Designation_master');
       	$this->load->helper(array('form', 'url'));
        $this->load->library ('common');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

    	$userdata = $this->user_master->getUserbyId($id);
    	//print_r($userdata);exit;
    	$companies = $this->company_master->getRows();
    	//print_r($companies);exit;
        $countries = $this->company_master->getCountries();
        $departments = $this->user_master->getDepartments();
        $qualifications = $this->user_master->getQualificationtype();
        $designations = $this->Designation_master->getDesignationdata();
    	//print_r($designations);exit;

        if (@$_POST) {
        	//print_r($_POST);exit;
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	//print_r($this->input->post());exit;
            $_POST['user_pass'] = @$this->common->encrypt_decrypt('encrypt',$_POST['user_pass']);

        	$resultdata = $this->user_master->updateUserInfo($this->input->post());

            ########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'Edituserinfo';
            $params['date_time'] = $dt;
            $params['action'] = 'Update';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################        	

        	if ($resultdata) {
        		/*$this->data['title'] = 'Login';
				#$this -> load -> model('campaign_model');
				$this->data['success'] = "Your data is inserted successfully!!!";
				$this->data['layout_body']='addclientmaster';
				$this->data['countries'] = $result;
 	

 				$this->load->view('admin/layout/main_app', $this->data); */

 				$module = BASE_PATH."viewusermanagement";
                redirect($module);
        	}

        } else {
            $states = $this->company_master->getStates($userdata[0]['country_id']);
            $cities = $this->company_master->getCities($userdata[0]['state_id']);
        	$branchs = $this->branch_master->getBranchByCompanyId($userdata[0]['company_id']);

            $user_pass = @$this->common->encrypt_decrypt('decrypt',$userdata[0]['password']);

   			$this->data['title'] = 'ACI - Edituserinfo';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='edituserinfo';
			//$this->data['countries'] = $result;
			$this->data['user_data'] = $userdata;
			$this->data['company_data'] = $companies;
			$this->data['countries'] = $countries;
            $this->data['states'] = $states;
            $this->data['cities'] = $cities;
			$this->data['departments_data'] = $departments;
			$this->data['qualifications_data'] = $qualifications;
            $this->data['designation_data'] = $designations;
			$this->data['branchs_data']=$branchs;
            $this->data['user_pass']=trim($user_pass);
	

 			$this->load->view('admin/layout/main_app', $this->data);     	
        }       


	}


	
}

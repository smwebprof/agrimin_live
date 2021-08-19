<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edituserdetails extends CI_Controller {

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
        //$this->load->model('user_master');
        $this->load->model('User_master');
        $this->load->model('Branch_master');
       	$this->load->helper(array('form', 'url'));
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

    	$userdata = $this->User_master->getUserDetailsbyId($id);
    	$qualifications = $this->User_master->getQualificationtype();
    	$countries = $this->company_master->getCountries();
    	$departments = $this->User_master->getDepartments();
    	$users = $this->User_master->getUsers();
    	//print_r($users);exit;

        if (@$_POST) {
        	//print_r($_POST);exit;
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	//print_r($this->input->post());exit;
        	$resultdata = $this->User_master->updateUserDetails($this->input->post());

            ########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'Edituserdetails';
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

 				$module = BASE_PATH."Viewusermanagement";
                redirect($module);
        	}

        } else {

        	if (empty($userdata)) {
        		#$this->data['errors'] = "Please Add Data To User Details Form.No Data Exists!!!";
                $module = BASE_PATH."Adduseremployeedetails";
                redirect($module);
        	}

   			$this->data['title'] = 'ACI - Edituserdetails';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='edituserdetails';
			//$this->data['countries'] = $result;
			$this->data['user_data'] = $userdata;
			$this->data['qualifications_data'] = $qualifications;
			$this->data['countries'] = $countries;
			$this->data['departments_data'] = $departments;	
			$this->data['users'] = $users;

 			$this->load->view('admin/layout/main_app', $this->data);     	
        }       


	}


	
}

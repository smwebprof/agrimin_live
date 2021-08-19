<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editlabparametermaster extends CI_Controller {

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
        $this->load->model('Lab_master'); 
        $this->load->model('user_master');
        $this->load->model('Branch_master');
        $this->load->helper('form');

        $id = base64_decode($_GET['id']);
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        if (@$_POST) {
        	//print_r($_POST);exit;
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	#print_r($this->input->post());exit;
        	$resultdata = $this->Lab_master->updatelabparameters($this->input->post());

			########################### Log Activity ###################################
            $this->load->model('Activity_master');
            $params['module'] = 'editlabparametermaster';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################        	

        	if ($resultdata) {

        		$redirecturl = BASE_PATH."Viewlabparametermaster?msg=1";
                redirect($redirecturl);
        		
        		/*$this->data['title'] = 'ACI - CompanyMaster';
				#$this -> load -> model('campaign_model');
				$this->data['success'] = "Your data is inserted successfully!!!";
				$this->data['layout_body']='addcompanymaster';
				$this->data['countries'] = $result;
 	

 				$this->load->view('admin/layout/main_app', $this->data); */
        	}

        } else {
        	$result = $this->Lab_master->geteditlabParameters($id);
        	//print_r($result);exit;
        	$branchs = $this->Branch_master->getBranchdata();
        	#print_r($branchs);exit;
        	$methods = $this->Lab_master->getlabMethods();
        	//print_r($methods);exit;
        	$specifications = $this->Lab_master->getlabspecificationslist();
        	//print_r($specifications);exit;

            $method_details = explode(',',$result[0]['lab_method_id']);
            //print_r($method_details);exit;

   			$this->data['title'] = 'ACI - Editlabparametermaster';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='editlabparametermaster';
			$this->data['parameters_data'] = $result;
			$this->data['branchs'] = $branchs;
			$this->data['methods'] = $methods;
			$this->data['specifications'] = $specifications;
            $this->data['method_details'] = $method_details; 	

 			$this->load->view('admin/layout/main_app', $this->data);     	
        }       




		#$this->load->view('file_register_new');
	}
}

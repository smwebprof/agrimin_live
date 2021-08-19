<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addspecificationmaster extends CI_Controller {

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


        if (@$_POST) {
        	#print_r($_POST);exit;
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	#print_r($this->input->post());exit;
        	$getlabspecifications = $this->Lab_master->getBylabSpecifications($this->input->post());
            if ($getlabspecifications) {
            	$redirecturl = BASE_PATH."Addspecificationmaster?msg=1";
                redirect($redirecturl);
            } else {
            		$resultdata = $this->Lab_master->addlabspecifications($this->input->post());
            }

			########################### Log Activity ###################################
            $this->load->model('Activity_master');
            $params['module'] = 'addlabspecifications';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################        	

        	if ($resultdata) {

        		$redirecturl = BASE_PATH."Viewspecificationmaster?msg=1";
                redirect($redirecturl);
        		
        		/*$this->data['title'] = 'ACI - CompanyMaster';
				#$this -> load -> model('campaign_model');
				$this->data['success'] = "Your data is inserted successfully!!!";
				$this->data['layout_body']='addcompanymaster';
				$this->data['countries'] = $result;
 	

 				$this->load->view('admin/layout/main_app', $this->data); */
        	}

        } else {
        	$branchs = $this->Branch_master->getBranchdata();
        	#print_r($branchs);exit;

   			$this->data['title'] = 'ACI - Addspecificationmaster';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='addspecificationmaster';
			$this->data['branchs'] = $branchs;
 	

 			$this->load->view('admin/layout/main_app', $this->data);     	
        }       




		#$this->load->view('file_register_new');
	}


	public function fetch_states()
	{
		$this->load->model('company_master'); 
		
		echo $this ->company_master->fetch_states($this->input->post('country_id'));

	}

	public function fetch_city()
	{
		$this->load->model('company_master'); 
		
		echo $this ->company_master->fetch_city($this->input->post('state_id'));

	}

	public function fetch_countrycode()
	{
		$this->load->model('company_master'); 
		
		echo $this ->company_master->fetch_countrycode($this->input->post('country_id'));

	}

	public function fetch_phonecode()
	{
		$this->load->model('company_master'); 
		
		echo $this ->company_master->fetch_phonecode($this->input->post('country_id'));

	}

	public function fetch_clientdata()
	{
		
		$this->load->model('company_master'); 
		
		echo $this->company_master->fetch_clientdata($this->input->post('id'));

	}
}

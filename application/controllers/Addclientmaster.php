<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addclientmaster extends CI_Controller {

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
        $this->load->model('user_master');
        $this->load->model('client_master');
        $this->load->model('Branch_master');
        $this->load->helper('form');

    	$companies = $this->company_master->getRows();

        $result = $this->company_master->getCountries();

        $branchs = $this->Branch_master->getBranchdata();

      
        if (@$_POST) {
        	//print_r($_POST);exit;	
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	//print_r($this->input->post());exit;
        	$resultdata = $this->client_master->addClientmaster($this->input->post());
        	//$resultdata = 1;

        	$_POST['client_id'] = $resultdata;
        	$clientdata = $this->client_master->addClientDetails($this->input->post());

            ########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'addclientmaster';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################        	

        	if ($resultdata) {
        		$this->data['title'] = 'ACI - Client Master';
				#$this -> load -> model('campaign_model');
				$this->data['success'] = "Data is inserted successfully!!!";
				$this->data['layout_body']='addclientmaster';
				$this->data['countries'] = $result;
				$this->data['company_data'] = $companies;
				$this->data['branchs_data']=$branchs;
 	
 	

 				$this->load->view('admin/layout/main_app', $this->data); 
        	}

        } else {
   			$this->data['title'] = 'ACI - Client Master';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='addclientmaster';
			$this->data['countries'] = $result;
			$this->data['company_data'] = $companies;
			$this->data['branchs_data']=$branchs;
 	

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
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editvendormaster extends CI_Controller {

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
        $this->load->model('client_master');
        $this->load->model('Branch_master');
        $this->load->model('Vendor_master');
       	$this->load->helper(array('form', 'url'));
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

    	$companies = $this->company_master->getRows();
    	//$branchs = $this->Branch_master->getBranchdata();
        $countries = $this->company_master->getCountries();
        $result = $this->Vendor_master->getVendorById($id);
        //print_r($result);exit;

        $vendor_type = $this->Vendor_master->getVendortype();
        //print_r($vendor_type);exit;

        if (@$_POST) {
        	//print_r($_POST);exit;
        	$_POST['user_id'] = @$_SESSION['userId'];
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	//print_r($this->input->post());exit;
        	$resultdata = $this->Vendor_master->updateVendorData($this->input->post());

            ########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'updateVendorData';
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

 				$module = BASE_PATH."Viewvendormaster?msg=1";
                redirect($module);
        	}

        } else {
        	$states = $this->company_master->getStates($result[0]['country_id']);
            $cities = $this->company_master->getCities($result[0]['state_id']);
            //print_r($result);exit;

   			$this->data['title'] = 'ACI - Editvendormaster';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='editvendormaster';
			//$this->data['countries'] = $result;
			$this->data['company_data'] = $companies;
			$this->data['vendor_data'] = $result;
			$this->data['vendor_type']=$vendor_type;
			$this->data['countries'] = $countries;
            $this->data['states'] = $states;
            $this->data['cities'] = $cities;
 	

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

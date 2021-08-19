<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	 *
	 * Author : Shivaji M Dalvi
	 * Date : 15/01/2020
	 *
	 */
	public function index()
	{
		
		if (!isset($_SESSION['userId'])) {
			$login = BASE_PATH."login/";
			redirect($login);
		}

		$this->load->model('Branch_master'); 
		$this->load->model('User_master'); 
		
	    #print_r($_SESSION);exit;
		
		if (@$_POST['current_branch_form']=='current_branch_form') {
			#$this->session->unset_userdata('logged_in');
    		#$this->session->sess_destroy();

			$checkBranch = $this->Branch_master->getBranchdataById($_POST['current_branch']);

			$checkLogin = $this->User_master->getUserbyId($_SESSION['userId']);

			$checkOpYear = $this->User_master->fetch_op_year($checkBranch['comp_id']);
			#print_r($checkOpYear);exit;
    		
			$this->session->set_userdata('isUserLoggedIn', TRUE); 
	        $this->session->set_userdata('userId', $checkLogin[0]['id']); 
	        $this->session->set_userdata('fname', $checkLogin[0]['first_name']);
	        $this->session->set_userdata('lname', $checkLogin[0]['last_name']);
	        $this->session->set_userdata('user_email', $checkLogin[0]['office_email']);
	        $this->session->set_userdata('primary_email', $checkBranch['primary_email_id']);
	        $this->session->set_userdata('secondary_email', $checkBranch['secondary_email_id']);
	        $this->session->set_userdata('employee_staff', $checkLogin[0]['employee_staff']);
	        $this->session->set_userdata('branch_name', $checkBranch['branch_name']);
	        $this->session->set_userdata('country_code', $checkBranch['sortname']);
	        $this->session->set_userdata('currency', $checkBranch['currency']);
	        $this->session->set_userdata('comp_id', $checkBranch['comp_id']);
	        $this->session->set_userdata('branch_id', $checkBranch['id']);
	        $this->session->set_userdata('default_branch_id', $checkBranch['id']);
	        $this->session->set_userdata('operatingyear', $checkOpYear[0]['year']);  

		}		

		//print_r($_SESSION);exit;
		$this->data['title'] = 'Login';
		#$this -> load -> model('campaign_model');
		
		$this->data['layout_body']='dashboard';
 	

 		$this->load->view('admin/layout/main_dashboard', $this->data);

		#$this->load->view('file_register_new');
	}
}

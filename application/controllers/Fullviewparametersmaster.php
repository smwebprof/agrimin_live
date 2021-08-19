<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fullviewparametersmaster extends CI_Controller {

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
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

		$result = $this->Lab_master->geteditlabParameters($id);
		//print_r($result);exit;
		$branchs = $this->Branch_master->getBranchdata();
        #print_r($branchs);exit;
        $methods = $this->Lab_master->getlabMethods();
        //print_r($methods);exit;
        $specifications = $this->Lab_master->getlabspecifications();

	    $this->data['title'] = 'ACI - Fullviewparametersmaster';
		#$this -> load -> model('campaign_model');
				
		$this->data['layout_body']='fullviewparametersmaster';
		$this->data['parameters_data'] = $result;
		$this->data['branchs'] = $branchs;
		$this->data['methods'] = $methods;
		$this->data['specifications'] = $specifications;


		$this->load->view('admin/layout/main_app', $this->data);        
	}
}

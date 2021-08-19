<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fullviewcompanymaster extends CI_Controller {

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
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

		$result = $this->company_master->getCountries();
	
	    $companyids = $this->company_master->getCompanydatabyid($id);
	    #print_r($companyids);exit; 
	    $states = $this->company_master->getStates($companyids[0]['countryid']);  
	    #print_r($states);exit; 
        $cities = $this->company_master->getCities($companyids[0]['stateid']);

	    $this->data['title'] = 'ACI - Company Master';
		#$this -> load -> model('campaign_model');
				
		$this->data['layout_body']='fullviewcompanymaster';
		$this->data['countries'] = $result;
		$this->data['company_data'] = $companyids;
		$this->data['states'] = $states;
        $this->data['cities'] = $cities;	 	

		$this->load->view('admin/layout/main_app', $this->data);        
	}
}

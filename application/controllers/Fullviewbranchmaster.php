<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fullviewbranchmaster extends CI_Controller {

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
	 * Author : Shivaji M Dalvi | Date : 15/10/2019
	 */



    public function index()
    {
        
        if (!isset($_SESSION['userId'])) {
            $login = BASE_PATH."login/";
            redirect($login);
        }

        
        #print_r($_POST);exit;
        $this->load->library('form_validation');
        $this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->helper('form');
        $this->load->helper(array('form', 'url'));
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];


        $result = $this->branch_master->getBranchById($id);
        //print_r($result);exit;
        $countries = $this->company_master->getCountries();
        $companies = $this->company_master->getRows();

        $states = $this->company_master->getStates($result[0]['countryid']);
        $cities = $this->company_master->getCities($result[0]['stateid']);  

        $this->data['title'] = 'ACI - fullviewbranchmaster';
        $this->data['branch_data'] = $result;
        $this->data['company_data'] = $companies;
        $this->data['countries'] = $countries;
        $this->data['states'] = $states;
        $this->data['cities'] = $cities;
        $this->data['layout_body']='fullviewbranchmaster';
        
        $this->load->view('admin/layout/main_app', $this->data);                 


    
    }

}

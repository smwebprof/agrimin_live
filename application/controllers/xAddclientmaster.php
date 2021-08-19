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
		
		#print_r($_POST);exit;
		$this->load->library('form_validation');
		$this->load->model('company_master'); 
        $this->load->model('client_master');
        $this->load->model('user_master');
        $this->load->helper('form');

        $result = $this->company_master->getRows();

        $countries = $this->company_master->getCountries();

		if (@$_POST['client_name']) {

			$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	#print_r($this->input->post());exit;
        	$resultdata = $this->client_master->addClientmaster($this->input->post());

        	if ($resultdata) {  
 				$this->data['title'] = 'Login';
 				$this->data['success'] = "Your data is inserted successfully!!!";
				$this->data['company_data'] = $result;
				$this->data['layout_body']='addclientmaster';

 				$this->load->view('admin/layout/main', $this->data);

				#$this->load->view('file_register_new');
 
            }

		} else {
			$this->data['title'] = 'Login';
			$this->data['company_data'] = $result;
			$this->data['layout_body']='addclientmaster';
 	
 			$this->data['countries'] = $countries;

 			$this->load->view('admin/layout/main', $this->data);

			#$this->load->view('file_register_new');

		}	
		
	}


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employeemaster extends CI_Controller {

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
		
		$this->data['title'] = 'Login';
		#$this -> load -> model('campaign_model');
		
		$this->data['layout_body']='employeemaster';
 	

 		$this->load->view('admin/layout/main_emp', $this->data);

		#$this->load->view('employeemaster');
	}
}

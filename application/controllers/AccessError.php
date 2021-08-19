<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccessError extends CI_Controller {

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
		
		
		//print_r($_SESSION);exit;
		$this->data['title'] = 'Login';
		#$this -> load -> model('campaign_model');
		
		$this->data['layout_body']='dashboard';
 	

 		$this->load->view('admin/layout/main_dashboard', $this->data);

		#$this->load->view('file_register_new');
	}
}

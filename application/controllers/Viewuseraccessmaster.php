<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewuseraccessmaster extends CI_Controller {

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
	 * Author : Shivaji Dalvi Date : 14/11/2019
	 */
	public function index()
	{
		
		if (!isset($_SESSION['userId'])) {
          $login = BASE_PATH."login/";
          redirect($login);
        }

		$this->load->model('user_master');
		
		$this->data['title'] = 'ACI - Viewuseraccessmaster';
		
		$this->data['layout_body']='viewuseraccessmaster';

		$result = $this->user_master->viewUseraccessmaster();
     
 		$this->data['user_data'] = $result;

 		$this->load->view('admin/layout/main_app_view', $this->data);

		#$this->load->view('viewcompanymaster');
	}
}

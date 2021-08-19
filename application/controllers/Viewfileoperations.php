<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewfileoperations extends CI_Controller {

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
		
		$this->load->model('Client_master');
		#$this->load->model('User_master');
		$this->load->model('File_master');
		$this->load->model('User_master');
		$this->load->model('Branch_master');

		#print_r($_SESSION);exit;

			
			$mainmodule_id = 2;
			$submodule_id = 1;
			
			$status = isset($_GET['a']) ? $_GET['a'] : '1';

			$this->data['title'] = 'ACI - Viewfileoperations';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='viewfileoperations';

			$result = $this->File_master->getAllFileOperationsdata();
			//print_r($result);exit;
			$clients = $this->Client_master->getClientdataByBranchid($_SESSION['branch_id']);

			$file_nos = $this->File_master->getFileNosByBranchId($_SESSION['branch_id'],'');
			//print_r($file_nos);exit;
			$params['main_menus'] = $mainmodule_id;
	        $params['sub_menus'] = $submodule_id;
	        $params['user_access_id'] = $_SESSION['userId'];

			$rights = $this->User_master->getAccessforUserId($params);
	     
	 		$this->data['file_data'] = $result;
	 		$this->data['access_right'] = $rights;
	 		$this->data['clients_data']=$clients;
	 		$this->data['file_nos']=$file_nos;

	 		$this->load->view('admin/layout/main_app_view', $this->data);

	}
}

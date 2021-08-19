<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewfileregister extends CI_Controller {

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

		if (@$_POST['viewfileregister']) {
			#print_r($_POST);exit;
			//print_r($_SESSION);exit;
			$mainmodule_id = 2;
			$submodule_id = 1;
			
			$status = isset($_GET['a']) ? $_GET['a'] : '1';

			$this->data['title'] = 'ACI - Fileregister';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='viewfileregister';

			$result = $this->File_master->getAllFiledataSearch($_POST);
			#print_r($result);exit;
			$clients = $this->Client_master->getClientdataByBranchid($_SESSION['branch_id']);

			$file_no_type = 'Single';
			$file_nos = $this->File_master->getFileNosByBranchId($_SESSION['branch_id'],$file_no_type);
			//print_r($file_nos);exit;

			$vessel_name = $this->File_master->getFileNosByVesselName();
			
			$params['main_menus'] = $mainmodule_id;
	        $params['sub_menus'] = $submodule_id;
	        $params['user_access_id'] = $_SESSION['userId'];

			$rights = $this->User_master->getAccessforUserId($params);
	     
	 		$this->data['file_data'] = $result;
	 		$this->data['access_right'] = $rights;
	 		$this->data['file_from_date']=@$_POST['file_from_date'];
	 		$this->data['file_To_date']=@$_POST['file_To_date'];
	 		$this->data['status']= @$_POST['status'];
	 		$this->data['file_nos']=@$file_nos;
	 		$this->data['clients_data']=$clients;
	 		$this->data['vessel_name']=$vessel_name;

	 		$this->load->view('admin/layout/main_app_view', $this->data);
		} else {
		
			$mainmodule_id = 2;
			$submodule_id = 1;
			
			$status = isset($_GET['a']) ? $_GET['a'] : '1';

			$this->data['title'] = 'ACI - Fileregister';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='viewfileregister';

			$result = $this->File_master->getAllFiledata();
			//print_r($result);exit;
			$clients = $this->Client_master->getClientdataByBranchid($_SESSION['branch_id']);

			$file_no_type = 'Single';
			$file_nos = $this->File_master->getFileNosByBranchId($_SESSION['branch_id'],$file_no_type);
			//print_r($file_nos);exit;

			$vessel_name = $this->File_master->getFileNosByVesselName();
			
			$params['main_menus'] = $mainmodule_id;
	        $params['sub_menus'] = $submodule_id;
	        $params['user_access_id'] = $_SESSION['userId'];

			$rights = $this->User_master->getAccessforUserId($params);
	     
	 		$this->data['file_data'] = $result;
	 		$this->data['access_right'] = $rights;
	 		$this->data['clients_data']=$clients;
	 		$this->data['file_nos']=$file_nos;
	 		$this->data['vessel_name']=$vessel_name;

	 		$this->load->view('admin/layout/main_app_view', $this->data);
 		}
		#$this->load->view('viewcompanymaster');
	}
}

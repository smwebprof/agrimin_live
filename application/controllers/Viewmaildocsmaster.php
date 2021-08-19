<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewmaildocsmaster extends CI_Controller {

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

		$this->load->model('Document_master');
		$this->load->model('User_master');
		
		$mainmodule_id = 9;
		$submodule_id = 45;
		
		$this->data['title'] = 'ACI - Viewmaildocsmaster';
		#$this -> load -> model('campaign_model');
		
		$this->data['layout_body']='viewmaildocsmaster';

		$result = $this->Document_master->getmaildocsdata();
		//print_r($result);exit;
		$params['main_menus'] = $mainmodule_id;
        $params['sub_menus'] = $submodule_id;
        $params['user_access_id'] = $_SESSION['userId'];

		$rights = $this->User_master->getAccessforUserId($params);
     
 		$this->data['maildocs_data'] = $result;
 		$this->data['access_right'] = $rights;

 		$this->load->view('admin/layout/main_app_view', $this->data);

		#$this->load->view('viewcompanymaster');
	}
}

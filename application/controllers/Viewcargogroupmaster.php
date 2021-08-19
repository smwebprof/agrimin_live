<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewcargogroupmaster extends CI_Controller {

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


		$this->load->model('Cargo_Group_master');
		$this->load->model('User_master');
		
		//$mainmodule_id = 9;
		//$submodule_id = 41;
		if ($_SESSION['employee_staff']=='Admin') {
			$mainmodule_id = 9;
			$submodule_id = 41;
		} else {
			$mainmodule_id = 12;
			$submodule_id = 61;
		}
		
		$this->data['title'] = 'ACI - viewcargogroupmaster';
		#$this -> load -> model('campaign_model');
		
		$this->data['layout_body']='viewcargogroupmaster';

		$result = $this->Cargo_Group_master->getCargoGroupdata();

		$params['main_menus'] = $mainmodule_id;
        $params['sub_menus'] = $submodule_id;
        $params['user_access_id'] = $_SESSION['userId'];

		$rights = $this->User_master->getAccessforUserId($params);
     
 		$this->data['cargo_group_data'] = $result;
 		$this->data['access_right'] = $rights;

 		$this->load->view('admin/layout/main_app_view', $this->data);

		#$this->load->view('viewcompanymaster');
	}
}

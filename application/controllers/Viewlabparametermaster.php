<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewlabparametermaster extends CI_Controller {

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

		$this->load->model('Lab_master');
		$this->load->model('User_master');
		
		if ($_SESSION['employee_staff']=='Admin') {
			$mainmodule_id = 9;
			$submodule_id = 44;
		} else {
			$mainmodule_id = 12;
			$submodule_id = 64;
		}
		
		$this->data['title'] = 'ACI - Viewlabparametermaster';
		#$this -> load -> model('campaign_model');
		
		$this->data['layout_body']='viewlabparametermaster';

		$result = $this->Lab_master->getlabParameters();
		//print_r($result);exit;

		foreach($result as $row)
        {
        	#echo $row['lab_method_id'];
        	if( strpos( $row['lab_method_id'], ',' ) !== false) {
        		$lab_method_arr = explode(",", $row['lab_method_id']);
        		#print_r($lab_method_arr);exit;
        		foreach($lab_method_arr as $labrow) {
        			$getmethods = $this->Lab_master->geteditlabMethods($labrow);
        			#print_r($getmethods);exit;
        			$row['method_name'] = $getmethods[0]['method_name'];
        			$lab_method[] = $row;	
        		}        		
        	} else {
        		$lab_method[] = $row;
        	}
        	
        }	
        #print_r($lab_method);exit;
		//$lab_params = $this->Lab_master->getlabParametersMethod();
		//print_r($lab_params);exit;

		$params['main_menus'] = $mainmodule_id;
        $params['sub_menus'] = $submodule_id;
        $params['user_access_id'] = $_SESSION['userId'];

		$rights = $this->User_master->getAccessforUserId($params);

		
 		$this->data['parameters_data'] = @$lab_method;
 		//$this->data['lab_params'] = $lab_params;
 		$this->data['access_right'] = $rights;

 		$this->load->view('admin/layout/main_app_view', $this->data);

		#$this->load->view('viewcompanymaster');
	}
}

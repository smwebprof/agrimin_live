<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewloginlogoutreport extends CI_Controller {

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

		#$this->load->model('Vendor_master');
		$this->load->model('User_master');
		$this->load->model('Company_master');

		if (@$_POST) {
		//print_r(@$_POST);exit;

		if (@$_POST['submit']=='excel') {
			$redirecturl = BASE_PATH."Viewexcelloginlogoutreport?msg=1";
			$redirecturl = BASE_PATH."Viewexcelloginlogoutreport?login_from_date=".@$_POST['login_from_date']."&login_to_date=".@$_POST['login_to_date']."&user_name=".@$_POST['user_name'];
	        redirect($redirecturl);
		}	

		$mainmodule_id = 9;
		$submodule_id = 45;
		
		$this->data['title'] = 'ACI - Viewloginlogoutreport';
		#$this -> load -> model('campaign_model');
		
		$this->data['layout_body']='viewloginlogoutreport';

		$result = $this->User_master->getAllLogindataSearch($_POST);
		//print_r($result);exit;

		$User_details = $this->User_master->getAllLoginEmp();
		//print_r($User_details);exit;

		$params['main_menus'] = $mainmodule_id;
        $params['sub_menus'] = $submodule_id;
        $params['user_access_id'] = $_SESSION['userId'];

		$rights = $this->User_master->getAccessforUserId($params);
     
 		$this->data['user_data'] = $result;
 		$this->data['User_details'] = $User_details;
 		$this->data['access_right'] = $rights;
 		$this->data['login_from_date']=@$_POST['login_from_date'];
	 	$this->data['login_to_date']=@$_POST['login_to_date'];
	 	$this->data['user_name']=@$_POST['user_name'];

 		$this->load->view('admin/layout/main_app_view', $this->data);

		#$this->load->view('viewcompanymaster');


		} else {	
		
        //print_r($_SESSION);exit;


		$mainmodule_id = 9;
		$submodule_id = 45;
		
		$this->data['title'] = 'ACI - Viewloginlogoutreport';
		#$this -> load -> model('campaign_model');
		
		$this->data['layout_body']='viewloginlogoutreport';

		$pt = date('d-m-Y', strtotime('-1 month'));
		$login_yr = $_SESSION['operatingyear'];
		$login_date['login_from_date'] = date('d-m-Y');
		$login_date['login_to_date'] = $pt;
		//print_r($login_date);exit;

		$result = $this->User_master->getAllLogindata($login_date);
		//print_r($result);exit;

		$User_details = $this->User_master->getAllLoginEmp();
		//print_r($User_details);exit;
		
		$params['main_menus'] = $mainmodule_id;
        $params['sub_menus'] = $submodule_id;
        $params['user_access_id'] = $_SESSION['userId'];

		$rights = $this->User_master->getAccessforUserId($params);
     
 		$this->data['user_data'] = $result;
 		$this->data['User_details'] = $User_details;
 		$this->data['access_right'] = $rights;

 		$this->load->view('admin/layout/main_app_view', $this->data);

		#$this->load->view('viewcompanymaster');
 		}
	}
}

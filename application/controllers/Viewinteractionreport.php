<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewinteractionreport extends CI_Controller {

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
	 * Author : Shivaji M Dalvi | Date : 15/10/2019
	 */
	public function index()
	{
		
		if (!isset($_SESSION['userId'])) {
          $login = BASE_PATH."login/";
          redirect($login);
        }

		$this->load->model('Interaction_master');
		$this->load->model('User_master');
		$this->load->model('Client_master');
		$this->load->model('Branch_master');

		if ($_POST) {
			$mainmodule_id = 8;
			$submodule_id = 30;
			
			$this->data['title'] = 'ACI - Client Interaction Report';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='viewinteractionreport';

			$result = $this->Interaction_master->getInteractiondatSearch($_POST);

			$clients = $this->Client_master->getClientdata();

			$params['main_menus'] = $mainmodule_id;
	        $params['sub_menus'] = $submodule_id;
	        $params['user_access_id'] = $_SESSION['userId'];

	        $rights = $this->User_master->getAccessforUserId($params);
	     
	 		$this->data['interaction_data'] = $result;
	 		$this->data['access_right'] = $rights;
	 		$this->data['clients_data']=$clients;
	 		$this->data['file_from_date']=@$_POST['file_from_date'];
	 		$this->data['file_To_date']=@$_POST['file_To_date'];
	 		$this->data['clients_name']=@$_POST['clients_name'];

	 		$this->load->view('admin/layout/main_app_view', $this->data);

		} else {

			$mainmodule_id = 8;
			$submodule_id = 30;
			
			$this->data['title'] = 'ACI - Client Interaction Report';
			#$this -> load -> model('campaign_model');
			
			$this->data['layout_body']='viewinteractionreport';

			$result = $this->Interaction_master->getInteractiondata();

			$clients = $this->Client_master->getClientdata();

			$params['main_menus'] = $mainmodule_id;
	        $params['sub_menus'] = $submodule_id;
	        $params['user_access_id'] = $_SESSION['userId'];

	        $rights = $this->User_master->getAccessforUserId($params);
	     
	 		$this->data['interaction_data'] = $result;
	 		$this->data['access_right'] = $rights;
	 		$this->data['clients_data']=$clients;

	 		$this->load->view('admin/layout/main_app_view', $this->data);

			#$this->load->view('viewcompanymaster');
 		}
	}
}

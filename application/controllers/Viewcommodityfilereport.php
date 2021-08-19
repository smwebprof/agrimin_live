<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewcommodityfilereport extends CI_Controller {

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
		$this->load->model('User_master');
		$this->load->model('Report_master');
		$this->load->model('Cargo_Group_master');

		if ($_POST) {
			//print_r($_POST);exit;
			
			$result = $this->Report_master->getCargoClientReportSearch($_POST);
			//print_r($result);exit;
			$cargogroup = $this->Cargo_Group_master->getCargoGroup();

			$clients = $this->Client_master->getClientdataByBranchid($_SESSION['branch_id']);
			//print_r($clients);exit;

			$load_port = $this->Report_master->getCargoLoadportdata();
			//print_r($load_port);exit;

			$discharge_port = $this->Report_master->getCargoDischargeportdata();
			//print_r($discharge_port);exit;
			$commodity_data = $this->Report_master->fetch_cargo2($_POST['cargo_group_view']);		
			//print_r($commodity_data);exit;	

			$tot_approx_unit = 0;
	        foreach($result as $key=>$value)
	        {
	           	$tot_approx_unit+= @(float)$value['approx_qty'];
	        }
	        //echo $tot_approx_unit;exit;

	        if (@$_POST['submit']=='excel') { 
			$redirecturl = BASE_PATH."Viewexcelcargoclientreport?msg=1";
			$redirecturl = BASE_PATH."Viewexcelcargoclientreport?clients_name=".@$_POST['clients_name']."&cargo_group_view=".@$_POST['cargo_group_view']."&commodity=".@$_POST['commodity']."&load_port=".@$_POST['load_port']."&discharge_port=".@$_POST['discharge_port'];
	        redirect($redirecturl);
		}	

	        $mainmodule_id = 3;
			$submodule_id = 51;

			$status = isset($_GET['a']) ? $_GET['a'] : '1';

			$this->data['title'] = 'ACI - Viewcommodityfilereport';
			#$this -> load -> model('campaign_model');
		
			$this->data['layout_body']='viewcommodityfilereport';


			$params['main_menus'] = $mainmodule_id;
	        $params['sub_menus'] = $submodule_id;
	        $params['user_access_id'] = $_SESSION['userId'];

			$rights = $this->User_master->getAccessforUserId($params);
	     
	 		$this->data['invoice_data'] = $result;
	 		$this->data['access_right'] = $rights;
	 		$this->data['tot_approx_unit']=@$tot_approx_unit;
	 		$this->data['cargogroup']=$cargogroup;
	 		$this->data['clients_data']=$clients;
	 		$this->data['load_port']=$load_port;
	 		$this->data['discharge_port']=$discharge_port;
	 		$this->data['commodity_data']=$commodity_data;

	 		$this->data['post_cargo_group'] = @$_POST['cargo_group_view'];
	 		$this->data['post_clients_name'] = @$_POST['clients_name'];
	 		$this->data['post_load_port'] = @$_POST['load_port'];
 			$this->data['post_discharge_port'] = @$_POST['discharge_port'];
 			$this->data['post_commodity'] = @$_POST['commodity'];

	 		$this->load->view('admin/layout/main_app_view', $this->data);

		} else {
		
		$mainmodule_id = 3;
		$submodule_id = 51;
		
		$status = isset($_GET['a']) ? $_GET['a'] : '1';

		$this->data['title'] = 'ACI - Viewcommodityfilereport';
		#$this -> load -> model('campaign_model');
		
		$this->data['layout_body']='viewcommodityfilereport';

		$result = $this->Report_master->getCargoClientReportdata();
		//print_r($result);exit;
		$cargogroup = $this->Cargo_Group_master->getCargoGroup();

		$clients = $this->Client_master->getClientdataByBranchid($_SESSION['branch_id']);
		//print_r($clients);exit;

		$load_port = $this->Report_master->getCargoLoadportdata();
		//print_r($load_port);exit;

		$discharge_port = $this->Report_master->getCargoDischargeportdata();
		//print_r($discharge_port);exit;

		$tot_approx_unit = 0;
        foreach($result as $key=>$value)
        {
           	$tot_approx_unit+= @(float)$value['approx_qty'];
        }
        //echo $tot_approx_unit;exit;


		$params['main_menus'] = $mainmodule_id;
        $params['sub_menus'] = $submodule_id;
        $params['user_access_id'] = $_SESSION['userId'];

		$rights = $this->User_master->getAccessforUserId($params);
     
 		$this->data['invoice_data'] = $result;
 		$this->data['access_right'] = $rights;
 		$this->data['tot_approx_unit']=@$tot_approx_unit;
 		$this->data['cargogroup']=$cargogroup;
 		$this->data['clients_data']=$clients;
 		$this->data['load_port']=$load_port;
 		$this->data['discharge_port']=$discharge_port;

 		$this->load->view('admin/layout/main_app_view', $this->data);

		#$this->load->view('viewcompanymaster');
 		}
	}

	public function fetch_cargo()
	{
		$this->load->model('Report_master'); 
		
		echo $this ->Report_master->fetch_cargo($this->input->post('cargo_group'));

	}
}

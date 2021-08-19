<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editbranchmaster extends CI_Controller {

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

		
		#print_r($_POST);exit;
		$this->load->library('form_validation');
		$this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->helper('form');
        $this->load->helper(array('form', 'url'));
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];


        $result = $this->branch_master->getBranchById($id);
        $companies = $this->company_master->getRows();

        if (@$_POST) {
        	#print_r($_POST);exit;
        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	#print_r($this->input->post());exit;
        	$resultdata = $this->branch_master->updateBranchData($this->input->post());

        	########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'Editbranchmaster';
            $params['date_time'] = $dt;
            $params['action'] = 'Update';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################   

        	if ($resultdata) {
        		#$this->data['title'] = 'ACI - Branchmaster';
				#$this->data['branch_data'] = $result;
				#$this->data['company_data'] = $companies;
				#$this->data['layout_body']='editbranchmaster';
	 	

	 			#$this->load->view('admin/layout/main_app', $this->data);

	 			$module = BASE_PATH."viewbranchmaster/";
                redirect($module);
        	}

        } else {	

	        $this->data['title'] = 'ACI - Branchmaster';
			$this->data['branch_data'] = $result;
			$this->data['company_data'] = $companies;
			$this->data['layout_body']='editbranchmaster';
	 	

	 		$this->load->view('admin/layout/main_app', $this->data);

 		}
		
	}

	public function fetch_branch()
	{
		$this->load->model('branch_master'); 
		
		echo $this ->branch_master->fetch_branch($this->input->post('branch_id'));

	}
}

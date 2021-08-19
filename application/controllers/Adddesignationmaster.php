<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adddesignationmaster extends CI_Controller {

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
        $this->load->model('designation_master');
        $this->load->helper('form');

        #$result = $this->company_master->getRows();

		if (@$_POST) {
			#print_r($_POST);exit;
			$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	#print_r($this->input->post());exit;
        	$resultdata = $this->designation_master->addDesignationmaster($this->input->post());

        	########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'adddesignationmaster';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################

        	if ($resultdata) {  
 				$this->data['title'] = 'ACI - Designation Master';
 				$this->data['success'] = "Data is inserted successfully!!!";
				#$this->data['company_data'] = $result;
				$this->data['layout_body']='adddesignationmaster';

 				$this->load->view('admin/layout/main_app', $this->data);

				#$this->load->view('file_register_new');
 
            }

		} else {
			$this->data['title'] = 'ACI - Designation Master';
			#$this->data['company_data'] = $result;
			$this->data['layout_body']='adddesignationmaster';
 	

 			$this->load->view('admin/layout/main_app', $this->data);

			#$this->load->view('file_register_new');

		}	
		
	}
}

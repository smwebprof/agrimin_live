<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editmaildocsmaster extends CI_Controller {

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
        $this->load->model('Document_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $result = $this->Document_master->getMailDocsmasterbyId($id);
        //print_r($result);exit;

		if (@$_POST) {
			//print_r($_POST);exit;
			$_POST['user_id'] = @$_SESSION['userId'];
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	//print_r($this->input->post());exit;
        	$resultdata = $this->Document_master->updateMailDocsData($this->input->post());

        	########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'editmaildocsmaster';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################

        	if ($resultdata) {  
 				$module = BASE_PATH."Viewmaildocsmaster?msg=1";
                redirect($module);
            }

		} else {
			$this->data['title'] = 'ACI - Mail Docs Master';
			$this->data['maildocs_data'] = $result;
			$this->data['layout_body']='editmaildocsmaster';
 	

 			$this->load->view('admin/layout/main_app', $this->data);

			#$this->load->view('file_register_new');

		}	
		
	}
}

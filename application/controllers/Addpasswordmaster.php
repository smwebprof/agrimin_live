<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addpasswordmaster extends CI_Controller {

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
        $this->load->model('user_master');
        $this->load->helper('form');
        $this->load->library ('common');

        #$result = $this->company_master->getRows();

		if (@$_POST) {
			#print_r($_POST);exit;
			$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	#print_r($this->input->post());exit;

        	$getUserPass = $this->user_master->getUserPass($this->input->post());

        	#$userPass = $this->common->encrypt_decrypt('decrypt',$getUserPass['password']);
        	$userPass = @$this->common->encrypt_decrypt('encrypt',$_POST['current_password']);
        	#echo $userPass."|||||".$_POST['current_password'];exit;
        	#echo $getUserPass['password']."|||||".$userPass;exit;
        	#if ($getUserPass) {
        	if($userPass==$getUserPass['password']) {	
        		if($_POST['new_password']==$_POST['confirm_password']) {
        			$newPass = $this->common->encrypt_decrypt('encrypt',$_POST['new_password']);	
        			$_POST['new_password'] = $newPass;
        			$updateUserPass = $this->user_master->updateUserPass($this->input->post());

        			if ($updateUserPass) {
        				$this->data['title'] = 'ACI - Changepassword';
	 					$this->data['success'] = "Your Password Updated Successfully!!!";
						$this->data['layout_body']='changepassword';

	 					$this->load->view('admin/layout/main_app', $this->data);
        			} else {
        				$this->data['title'] = 'ACI - Changepassword';
 						$this->data['errors'] = "OOps, some issue occured!!!";
						$this->data['layout_body']='changepassword';

 						$this->load->view('admin/layout/main_app', $this->data);
        			}
        		} else {
        			$this->data['title'] = 'ACI - Changepassword';
 					$this->data['errors'] = "Your New Password & Confirm Password is not matching!!!";
					$this->data['layout_body']='changepassword';

 					$this->load->view('admin/layout/main_app', $this->data);
        		}
        	} else {
        		$this->data['title'] = 'ACI - Changepassword';
 				$this->data['errors'] = "Your Current Password is Wrong!!!";
				$this->data['layout_body']='changepassword';

 				$this->load->view('admin/layout/main_app', $this->data);
        	}


	       	########################### Log Activity ######################################
            /*$this->load->model('Activity_master');
            $params['module'] = 'addunitmaster';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);*/

            ##################################################################

		} else {
			$this->data['title'] = 'ACI - Changepassword';
			#$this->data['company_data'] = $result;
			$this->data['layout_body']='changepassword';
 	

 			$this->load->view('admin/layout/main_app', $this->data);

			#$this->load->view('file_register_new');

		}	
		
	}
}

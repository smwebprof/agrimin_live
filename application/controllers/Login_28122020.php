<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		#print_r($_POST);exit;

        $this->load->library('form_validation');
        $this->load->model('company_master'); 
        $this->load->model('user_master');
        $this->load->model('branch_master');
        $this->load->helper('form');
        $this->load->library ('common');

        #echo "<h3>This system is under maintainance...</h3>";exit;

        $result = $this->company_master->getRows();

        if (@$this->input->post('userfileno') != '') { 

	    	$this->form_validation->set_rules('userfileno', 'File No', 'required');
	    	$this->form_validation->set_rules('filepassword', 'Password', 'required|min_length[6]|max_length[15]');
        }

        if (@$this->input->post('useremail') != '') { 
        	#$this->form_validation->set_rules('useremail', 'Email', 'required|valid_email|callback_check_customer');
        	$this->form_validation->set_rules('useremail', 'Email', 'trim|required|valid_email');
	    	$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');
	    	$this->form_validation->set_rules('companyname', 'Company Name', 'required');
	    	$this->form_validation->set_rules('branchname', 'Branch Name', 'required');
	    	$this->form_validation->set_rules('operatingyear', 'Operating Year', 'required');
	    	$this->form_validation->set_rules('financialyear', 'Financial Year', 'required');
        }


	    if ($this->form_validation->run() == FALSE) { 
            #$this->load->view('reg_form');
            $this->data['title'] = 'ACI - Login';
			#$this -> load -> model('campaign_model');

			$this->data['company_data'] = $result;
			
			$this->data['layout_body']='login';
	 		$this->load->view('admin/layout/main_login', $this->data); 

         } else {


         	if (@$this->input->post('userfileno') != '') { 
         		#$this->session->set_userdata('isUserLoggedIn', TRUE); 
                #$this->session->set_userdata('userId', $checkLogin[0]['id']); 
                #$this->session->set_userdata('fname', $checkLogin[0]['first_name']);
                #$this->session->set_userdata('lname', $checkLogin[0]['last_name']);

         		$checkLogin = $this->user_master->getFilePass($_POST);
         		#print_r($checkLogin);exit;
                if($checkLogin){ 
                	$id = base64_encode($checkLogin[0]['id']);	


                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    #$this->session->set_userdata('userId', $checkLogin[0]['id']); 
                    $this->session->set_userdata('fname', 'Guest');
                    $this->session->set_userdata('lname', 'User');
                    $this->session->set_userdata('employee_staff', 'Guest');
                    #$this->session->set_userdata('employee_staff', $checkLogin[0]['employee_staff']);
                    #redirect('http://localhost/agrimin/filenew/'); 

                    $filenew = BASE_PATH."fullviewfileregister?id=".$id;
                    redirect($filenew);

                }else{ 
                    $this->data['errors'] = 'Wrong fileno or password, please try again.'; 

                    $this->data['title'] = 'ACI - Login';
					#$this -> load -> model('campaign_model');

					$this->data['company_data'] = $result;
			
					$this->data['layout_body']='login';
	 				$this->load->view('admin/layout/main_login', $this->data); 
                } 

         	}	

         	if (@$this->input->post('useremail') != '') { 
         		
         		//print_r($_POST);exit;
         		$checkBranch = $this->branch_master->getBranchdataById($_POST['branchname']); 
         		//print_r($checkBranch);exit;

         		$userPass = $this->common->encrypt_decrypt('encrypt',$_POST['password']);
         		$_POST['password'] = $userPass;
                $checkLogin = $this->user_master->getRows($_POST); 
                //print_r($checkLogin);exit;

                if($checkLogin){ 

                	$checkCompLogin = $this->user_master->getRowsByComp($_POST); 

                	if ($checkCompLogin) {

                		$this->session->set_userdata('isUserLoggedIn', TRUE); 
	                    $this->session->set_userdata('userId', $checkLogin[0]['id']); 
	                    $this->session->set_userdata('fname', $checkLogin[0]['first_name']);
	                    $this->session->set_userdata('lname', $checkLogin[0]['last_name']);
	                    $this->session->set_userdata('user_email', $checkLogin[0]['office_email']);
	                    $this->session->set_userdata('primary_email', $checkBranch['primary_email_id']);
	                    $this->session->set_userdata('secondary_email', $checkBranch['secondary_email_id']);
	                    $this->session->set_userdata('employee_staff', $checkLogin[0]['employee_staff']);
	                    $this->session->set_userdata('branch_name', $checkBranch['branch_name']);
	                    $this->session->set_userdata('country_code', $checkBranch['sortname']);
	                    $this->session->set_userdata('currency', $checkBranch['currency']);
	                    $this->session->set_userdata('comp_id', $_POST['companyname']);
	                    $this->session->set_userdata('branch_id', $_POST['branchname']);
	                    $this->session->set_userdata('default_branch_id', $_POST['branchname']);
	                    $this->session->set_userdata('operatingyear', $_POST['operatingyear']);
	                    #redirect('http://localhost/agrimin/filenew/'); 

	                    $dashboard = BASE_PATH."dashboard/";
	                    redirect($dashboard);
	                    //$filenew = BASE_PATH."filenew/";
	                    //redirect($filenew);

                	} else {
                		$this->data['errors'] = 'Please select correct Company/Branch!!!'; 

                    	$this->data['title'] = 'ACI - Login';
						#$this -> load -> model('campaign_model');

						$this->data['company_data'] = $result;
			
						$this->data['layout_body']='login';
	 					$this->load->view('admin/layout/main_login', $this->data);
	                   
                	}
                }else{ 
                    $this->data['errors'] = 'Wrong email or password, please try again.'; 

                    $this->data['title'] = 'ACI - Login';
					#$this -> load -> model('campaign_model');

					$this->data['company_data'] = $result;
			
					$this->data['layout_body']='login';
	 				$this->load->view('admin/layout/main_login', $this->data); 
                } 

            }

 	   }

		#$this->load->view('user_login');
	}


	public function fetch_branch()
	{
		$this->load->model('company_master'); 
		
		echo $this -> company_master -> fetch_branch($this->input->post('id'));

	}	

	public function fetch_op_year()
	{
		$this->load->model('company_master'); 
		
		echo $this -> company_master -> fetch_op_year($this->input->post('id'));

	}	

	public function fetch_fin_year()
	{
		$this->load->model('company_master'); 
		
		echo $this -> company_master -> fetch_fin_year($this->input->post('id'));

	}

	public function logout()
	{
    	$this->session->unset_userdata('logged_in');

   		// session_destroy();
    	$this->session->sess_destroy();

    	$login = BASE_PATH."login/";
        redirect($login); 

	}
}

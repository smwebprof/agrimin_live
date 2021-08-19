<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addclientinteraction extends CI_Controller {

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


        $this->load->model('company_master'); 
        $this->load->model('Branch_master');
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $countries = $this->company_master->getCountries();
        
        if (@$_POST['addclientinteraction']) 
        {
            #print_r($_POST);exit;
            $this -> load -> model('Interaction_master');

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'xls|pdf|doc|xlsx|docx'; //xls|pdf|doc //*
            $config['max_size'] = 512000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('upl_items_discussed')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
            #echo '11111';exit;
        } else {
            $data = array('upl_items_discussed_path' => $this->upload->data());
            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
            #print_r($data);exit;
            #echo $data['upl_purpose_path']['file_name'];exit;

            $interactiondata['upl_items_discussed_path'] = $data['upl_items_discussed_path']['file_name'];
            if (!$interactiondata['upl_items_discussed_path']) { $interactiondata['upl_items_discussed_path'] = '';}
          #echo '22222';exit;
        }

        if (!$this->upload->do_upload('upl_action_points')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
            #echo '11111';exit;
        } else {
            $data = array('upl_action_points_path' => $this->upload->data());
            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
            #print_r($data);exit;
            #echo $data['upl_purpose_path']['file_name'];exit;

            $interactiondata['upl_action_points_path'] = $data['upl_action_points_path']['file_name'];
            if (!$interactiondata['upl_action_points_path']) { $interactiondata['upl_action_points_path'] = '';}
          #echo '22222';exit;
        }

            if (!$this->upload->do_upload('upl_purpose')) {
                $error = array('error' => $this->upload->display_errors());
                #print_r($error);exit;
                #echo '11111';exit;
            } else {
                $data = array('upl_purpose_path' => $this->upload->data());
                // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
                #print_r($data);exit;
                #echo $data['upl_purpose_path']['file_name'];exit;

                $interactiondata['upl_purpose_file_path'] = $data['upl_purpose_path']['file_name'];
                if (!$interactiondata['upl_purpose_file_path']) { $interactiondata['upl_purpose_file_path'] = '';}

                
                #echo '22222';exit;
            }   
        

            if (!$this->upload->do_upload('upl_action')) {
                $error = array('error' => $this->upload->display_errors());
                #print_r($error);exit;
                #echo '11111';exit;
            } else {
                $data = array('upl_action_path' => $this->upload->data());
                // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
                #print_r($data);exit;
                #echo '22222';exit;
                $interactiondata['upl_action_file_path'] = $data['upl_action_path']['file_name'];
                if (!$interactiondata['upl_action_file_path']) { $interactiondata['upl_action_file_path'] = '';}

            }

            if (!$this->upload->do_upload('upl_acifollow')) {
                $error = array('error' => $this->upload->display_errors());
                #print_r($error);exit;
                #echo '11111';exit;
            } else {
                $data = array('upl_acifollow_path' => $this->upload->data());
                // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
                #print_r($data);exit;
                #echo '22222';exit;
                $interactiondata['upl_acifollow_file_path'] = $data['upl_acifollow_path']['file_name'];
                if (!$interactiondata['upl_acifollow_file_path']) { $interactiondata['upl_acifollow_file_path'] = '';}
            }


            $_POST['user_id'] = @$_SESSION['userId']; 
            $_POST['dt'] = $dt;

            $clientsdata['client_id'] = $_POST['clients_interacted'];
            $clientsdata['int_office_address'] = $_POST['office_address'];
            $clientsdata['int_office_prefix'] = $_POST['office_prefix'];
            $clientsdata['int_office_no'] = $_POST['office_no'];
            $clientsdata['int_company_web'] = $_POST['company_web'];
            $clientsdata['entry_date'] = $_POST['dt'];
            $clientsdata['entry_user_id'] = $_POST['user_id'];
            $clientsdata['modify_date'] = $_POST['dt'];
            $clientsdata['modify_user_id'] = $_POST['user_id'];
            $clientsdata['company_country'] = $_POST['company_country'];
            $clientsdata['company_state'] = $_POST['company_state'];
            $clientsdata['company_city'] = $_POST['company_city'];
            //print_r($clientsdata);exit;
            $result = $this->Interaction_master->updateClientData($clientsdata);
    

            $interaction_date = strtotime($_POST['interaction_date']);
            $interaction_date = date('Y-m-d',$interaction_date);

            // insert into agrimin_client_interaction_report
            $interactiondata['client_id'] = $_POST['clients_interacted'];
            $interactiondata['int_full_name'] = $_POST['full_name'];
            $interactiondata['int_job_title'] = $_POST['job_title'];
            $interactiondata['int_mobile_prefix'] = $_POST['mobile_prefix'];
            $interactiondata['int_mobile_no'] = $_POST['mobile_no'];
            $interactiondata['int_email_address'] = $_POST['email_address'];
            $interactiondata['int_alt_prefix'] = $_POST['alt_prefix'];
            $interactiondata['int_alt_no'] = $_POST['alt_no'];
            //$interactiondata['int_company_web'] = $_POST['int_company_web'];


            $interactiondata['interaction_date'] = $interaction_date;
            $interactiondata['location_interaction'] = @$_POST['location_interaction'];
            $interactiondata['phone_interaction'] = @$_POST['phone_interaction'];
            $interactiondata['client_attendees'] = $_POST['client_attendees'];
            $interactiondata['aci_attendees'] = $_POST['aci_attendees'];
            $interactiondata['purpose_meeting'] = $_POST['purpose_meeting'];
            $interactiondata['sales_target'] = $_POST['sales_target'];
            $interactiondata['specific_issue'] = $_POST['specific_issue'];
            $interactiondata['client_complaint'] = $_POST['client_complaint'];
            $interactiondata['items_discussed'] = $_POST['items_discussed'];
            $interactiondata['action_points'] = $_POST['action_points'];
            $interactiondata['purpose_acheived'] = $_POST['purpose_acheived'];
            $interactiondata['action_acheived'] = $_POST['action_acheived'];
            $interactiondata['aci_followup'] = $_POST['aci_followup'];
            $interactiondata['entry_date'] = $_POST['dt'];
            $interactiondata['entry_user_id'] = $_POST['user_id'];
            $interactiondata['modify_date'] = $_POST['dt'];
            $interactiondata['modify_user_id'] = $_POST['user_id'];
            
            
            $interactions = $this->Interaction_master->newInteractiondata($interactiondata);   


            ########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'addclientinteraction';
            $params['date_time'] = $dt;
            $params['action'] = 'Create';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

            ##################################################################
                     

            $this->data['title'] = 'ACI - Client Interaction';
            $this -> load -> model('Client_master');
            #$id = 1;
            $result = $this->Client_master->getClientdata(); //getClientdata($id);
            
            $this->data['layout_body']='addclientinteraction';
            $this->data['clients_data']=$result;  
            $this->data['report_date'] = $dt;
            $this->data['report_user'] = $user;
            $this->data['countries'] = $countries;
            $this->data['success'] = 'Changes are Updated Successfully';

            $this->load->view('admin/layout/main_app', $this->data);

        } else {
            
            $this->data['title'] = 'ACI - Client Interaction';
            $this -> load -> model('Client_master');
            #$id = 1;
            $result = $this->Client_master->getClientdata(); //getClientdata($id);
            //print_r($result);exit;
            $this->data['layout_body']='addclientinteraction';
            $this->data['clients_data']=$result;  
            $this->data['report_date'] = $dt;
            $this->data['report_user'] = $user;
            $this->data['countries'] = $countries;

            $this->load->view('admin/layout/main_app', $this->data);

    
        }
        
    }

    public function fetch_clientdata()
    {
        $this->load->model('Interaction_master'); 
        
        $result = $this ->Interaction_master->fetch_clientdata($this->input->post('id'));
        echo $result['address']."|".$result['tel_no']."|".$result['company_web_page']."|".$result['country']."|".$result['state']."|".$result['city']."|".$result['countryid']."|".$result['stateid']."|".$result['cityid']."|".$result['country_code'];
    }



	public function index123()
	{
		
		#print_r($_SESSION);exit;
		#print_r($_POST);exit;
		#print_r($_FILES);exit;
        $this->load->model('company_master'); 

		
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*'; //jpg|pdf|doc
        $config['max_size'] = 2000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('upl_purpose')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
            #echo '11111';exit;
        } else {
            $data = array('image_metadata' => $this->upload->data());
            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
            #print_r($data);exit;
            #echo '22222';exit;
        }	
	

        if (!$this->upload->do_upload('upl_action')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
            #echo '11111';exit;
        } else {
            $data = array('image_metadata' => $this->upload->data());
            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
            #print_r($data);exit;
            #echo '22222';exit;
        }

        if (!$this->upload->do_upload('upl_acifollow')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
            #echo '11111';exit;
        } else {
            $data = array('image_metadata' => $this->upload->data());
            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
            #print_r($data);exit;
            #echo '22222';exit;
        }		
		

		$this -> load -> model('Interaction_master');

		$dt = gmdate('Y-m-d H:i:s');
		$user = $_SESSION['fname']." ".$_SESSION['lname'];

		
        if ($_POST) {

        	$_POST['user_id'] = @$_SESSION['userId']; 
		 	$_POST['dt'] = $dt;

        	// insert into client master
        	$clientsdata['full_name'] = $_POST['full_name'];
        	$clientsdata['job_title'] = $_POST['job_title'];
        	
            $clientsdata['company'] = $_POST['company'];
            $clientsdata['country_id'] = $_POST['company_country'];
            $clientsdata['state_id'] = $_POST['company_state'];
            $clientsdata['city_id'] = $_POST['company_city'];

        	$clientsdata['office_address'] = $_POST['office_address'];
        	$clientsdata['mobile_no'] = $_POST['mobile_no'];
        	$clientsdata['email_address'] = $_POST['email_address'];
        	$clientsdata['alt_no'] = $_POST['alt_no'];
        	$clientsdata['company_web'] = $_POST['company_web'];
        	$clientsdata['entry_date'] = $_POST['dt'];
        	$clientsdata['entry_user_id'] = $_POST['user_id'];
        	$clientsdata['modify_date'] = $_POST['dt'];
        	$clientsdata['modify_user_id'] = $_POST['user_id'];



        	$clients = $this->Interaction_master->addClientmaster($clientsdata);
            
            $interaction_date = strtotime($_POST['interaction_date']);
            $interaction_date = date('Y-m-d',$interaction_date);

        	// insert into agrimin_client_interaction_report
        	$interactiondata['client_id'] = $clients; //$clients['id']
        	$interactiondata['interaction_date'] = $interaction_date;
        	$interactiondata['location_interaction'] = $_POST['location_interaction'];
        	$interactiondata['phone_interaction'] = $_POST['phone_interaction'];
        	$interactiondata['client_attendees'] = $_POST['client_attendees'];
        	$interactiondata['aci_attendees'] = $_POST['aci_attendees'];
        	$interactiondata['purpose_meeting'] = $_POST['purpose_meeting'];
        	$interactiondata['sales_target'] = $_POST['sales_target'];
        	$interactiondata['specific_issue'] = $_POST['specific_issue'];
        	$interactiondata['client_complaint'] = $_POST['client_complaint'];
        	$interactiondata['items_discussed'] = $_POST['items_discussed'];
        	$interactiondata['action_points'] = $_POST['action_points'];
        	$interactiondata['purpose_acheived'] = $_POST['purpose_acheived'];
        	$interactiondata['action_acheived'] = $_POST['action_acheived'];
        	$interactiondata['aci_followup'] = $_POST['aci_followup'];
        	$interactiondata['entry_date'] = $_POST['dt'];
        	$interactiondata['entry_user_id'] = $_POST['user_id'];
        	$interactiondata['modify_date'] = $_POST['dt'];
        	$interactiondata['modify_user_id'] = $_POST['user_id'];
            
        	
        	$interactions = $this->Interaction_master->addInteractiondata($interactiondata);
        }


		$this->data['title'] = 'Login';
		$this -> load -> model('Client_master');
		$result = $this->Client_master->getClientdata();
        $countriesdata = $this->company_master->getCountries();
		
		$this->data['layout_body']='addclientinteraction';
		$this->data['clients_data']=$result;  
		$this->data['report_date'] = $dt;
		$this->data['report_user'] = $user;
        $this->data['countries'] = $countriesdata;
 	

 		$this->load->view('admin/layout/main_app', $this->data);

		#$this->load->view('file_register_new');
	}


}

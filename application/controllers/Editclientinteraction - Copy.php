<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editclientinteraction extends CI_Controller {

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
        

        $this -> load -> model('Interaction_master');
        $this->load->model('company_master'); 
        $this->load->helper(array('form', 'url'));
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $countries = $this->company_master->getCountries();
        #$states = $this->company_master->getStates();
        #$cities = $this->company_master->getCities();

        if ($_POST) 
        {
            #print_r($_POST);
            #print_r($_FILES);exit;

            $_POST['user_id'] = @$_SESSION['userId']; 
            $_POST['dt'] = $dt;

            $interaction_date = strtotime($_POST['interaction_date']);
            $interaction_date = date('Y-m-d',$interaction_date);


            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'xls|pdf|doc|xlsx|docx'; //xls|pdf|doc //*
            $config['max_size'] = 2000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('upl_items_discussed')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
            #echo '11111';exit;
            $interactiondata['upl_items_discussed_path'] = @$_POST['hid_summary_of_items_discussed_path'];
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
            $interactiondata['upl_action_points_path'] = @$_POST['hid_summary_of_action_points_path'];
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
                #if (!$interactiondata['upl_purpose_file_path']) { $interactiondata['upl_purpose_file_path'] = $_POST['hid_purpose_of_meeting_achieved_path'];}
                $interactiondata['upl_purpose_file_path'] = @$_POST['hid_purpose_of_meeting_achieved_path'];
            } else {
                $data = array('upl_purpose_path' => $this->upload->data());
                // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
                #print_r($data);exit;
                #echo $data['upl_purpose_path']['file_name'];exit;
                #echo '22222';exit;
                $interactiondata['upl_purpose_file_path'] = $data['upl_purpose_path']['file_name'];
                if (!$interactiondata['upl_purpose_file_path']) { $interactiondata['upl_purpose_file_path'] = '';}

                
                #echo '22222';exit;
            }   
        

            if (!$this->upload->do_upload('upl_action')) {
                $error = array('error' => $this->upload->display_errors());
                #print_r($error);exit;
                #echo '11111';exit;
                $interactiondata['upl_action_file_path'] = @$_POST['hid_action_tobe_taken_to_achieve_said_purpose_path'];
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
                $interactiondata['upl_acifollow_file_path'] = @$_POST['hid_team_aci_followup_with_client_path'];
            } else {
                $data = array('upl_acifollow_path' => $this->upload->data());
                // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
                #print_r($data);exit;
                #echo '22222';exit;
                $interactiondata['upl_acifollow_file_path'] = $data['upl_acifollow_path']['file_name'];
                if (!$interactiondata['upl_acifollow_file_path']) { $interactiondata['upl_acifollow_file_path'] = '';}
            }


            $clientsdata['client_id'] = $_POST['client_id'];
            $clientsdata['int_office_address'] = $_POST['int_office_address'];
            $clientsdata['int_office_no'] = $_POST['int_mobile_no'];
            $clientsdata['int_company_web'] = $_POST['int_company_web'];
            $clientsdata['modify_date'] = $_POST['dt'];
            $clientsdata['modify_user_id'] = $_POST['user_id'];
            $clientsdata['company_country'] = $_POST['company_country'];
            $clientsdata['company_state'] = $_POST['company_state'];
            $clientsdata['company_city'] = $_POST['company_city'];
            #print_r($clientsdata);exit;

            $result = $this->Interaction_master->updateClientEditData($clientsdata);


            // insert into agrimin_client_interaction_report
            $interactiondata['id'] = $_POST['id'];
            $interactiondata['client_id'] = $_POST['client_id']; //$clients['id']

            $interactiondata['int_full_name'] = $_POST['int_full_name'];
            $interactiondata['int_job_title'] = $_POST['int_job_title'];
            //$interactiondata['int_company'] = $_POST['int_company'];
            //$interactiondata['int_office_address'] = $_POST['int_office_address'];
            $interactiondata['int_mobile_no'] = $_POST['int_mobile_no'];
            $interactiondata['int_email_address'] = $_POST['int_email_address'];
            $interactiondata['int_alt_no'] = $_POST['int_alt_no'];
            //$interactiondata['int_company_web'] = $_POST['int_company_web'];


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
            
            
            $interactions = $this->Interaction_master->updateInteractiondata($interactiondata); 

            $result = $this->Interaction_master->getInteractiondatabyid($id); 
            $states = $this->company_master->getStates($result[0]['country_id']);
            $cities = $this->company_master->getCities($result[0]['state_id']);

            $this->data['title'] = 'editclientinteraction - ACI';
            
            $this->data['layout_body']='editclientinteraction';
            $this->data['report_date'] = $dt;
            $this->data['report_user'] = $user;
            $this->data['success'] = 'Changes are Updated Successfully';
            $this->data['interaction_data'] = $result;
            $this->data['countries'] = $countries;
            $this->data['states'] = $states;
            $this->data['cities'] = $cities;

            $this->load->view('admin/layout/main_app', $this->data);          
        
    
        } else {
            $result = $this->Interaction_master->getInteractiondatabyid($id);
            #echo $result[0]['country_id'];exit;
            $states = $this->company_master->getStates($result[0]['country_id']);
            $cities = $this->company_master->getCities($result[0]['state_id']);
           
            $this->data['title'] = 'editclientinteraction - ACI';
            
            $this->data['layout_body']='editclientinteraction';
            $this->data['report_date'] = $dt;
            $this->data['report_user'] = $user;
            $this->data['interaction_data'] = $result; 
            $this->data['countries'] = $countries;
            $this->data['states'] = $states;
            $this->data['cities'] = $cities;
            


            $this->load->view('admin/layout/main_app', $this->data); 
        }
     
    }


}

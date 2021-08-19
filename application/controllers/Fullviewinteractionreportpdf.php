<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fullviewinteractionreportpdf extends CI_Controller {

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


        $this -> load -> model('Interaction_master');
        $this -> load -> model('User_master');

        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $result = $this->Interaction_master->getInteractiondatabyid($id);
        
        $getUser = $this->User_master->getUserbyId($result[0]['entry_user_id']);
        #print_r($getUser);exit;
        $report_date = date("d-m-Y H:i:s", strtotime($result[0]['entry_date']));
        $report_user = $getUser[0]['first_name']." ".$getUser[0]['last_name'];


        $rows = $result;

        $logo = ASSETS_PATH.'img/logo-big.jpg';

        $pdf = '';
        $pdf2 = '';
        $pdf3 = '';
        $pdf4 = '';
        $pdf5 = '';
        $pdf6 = '';
        #$pdf .= '<table border="1" cellspacing="0" cellpadding="5">';
        foreach($rows as $interaction_data){
            $full_name  = $interaction_data['full_name'];
            $job_title  = $interaction_data['job_title'];

            $client_name  = $interaction_data['client_name'];
            $address  = $interaction_data['address'].",".$interaction_data['city'].",".$interaction_data['state'].",".$interaction_data['country'];
            $tel_no  = $interaction_data['country_code']." ".$interaction_data['tel_no'];
            $mobile_office_number  = $interaction_data['country_code']." ".$interaction_data['mobile_office_number'];
            $email_address  = $interaction_data['email_address'];
            $alternate_contact  = $interaction_data['country_code']." ".$interaction_data['alternate_contact'];
            $company_web_page  = $interaction_data['company_web_page'];

            $Date  = date("d-m-Y", strtotime($interaction_data['interaction_date']));

            if ($interaction_data['location_interaction']=='on') { $location_interaction  = 'Yes'; } else { $location_interaction  = 'No'; }

            if ($interaction_data['phone_interaction']=='on') { $phone_interaction  = 'Yes'; } else { $phone_interaction  = 'No'; }

            #$location_interaction  = $interaction_data['location_interaction'];
            #$phone_interaction  = $interaction_data['phone_interaction'];
            $attendees_client_side  = $interaction_data['attendees_client_side']; 
            $attendees_agrimin  = $interaction_data['attendees_agrimin'];
            $purpose_of_meeting  = $interaction_data['purpose_of_meeting'];
            $sales_target  = $interaction_data['sales_target'];
            $specific_issue  = $interaction_data['specific_issue'];
            $client_complant  = $interaction_data['client_complant'];

            $items_discussed  = $interaction_data['summary_of_items_discussed'];

            $action_points  = $interaction_data['summary_of_action_points'];

            $purpose_of_meeting_achieved  = $interaction_data['purpose_of_meeting_achieved'];
            $action_tobe_taken_to_achieve_said_purpose  = $interaction_data['action_tobe_taken_to_achieve_said_purpose'];
            $team_aci_followup_with_client  = $interaction_data['team_aci_followup_with_client'];

            $pdf .= '<tr><th><b>Full Name</b></th><th>'.$full_name.'</th></tr>';
            $pdf .= '<tr><th><b>Job Title</b></th><th>'.$job_title.'</th></tr>';
            $pdf .= '<tr><th><b>Company</b></th><th>'.$client_name.'</th></tr>';
            $pdf .= '<tr><th><b>Office Address</b></th><th>'.$address.'</th></tr>';
            $pdf .= '<tr><th><b>Office Number</b></th><th>'.$tel_no.'</th></tr>';
            $pdf .= '<tr><th><b>Mobile Number</b></th><th>'.$mobile_office_number.'</th></tr>';
            $pdf .= '<tr><th><b>Email Address</b></th><th>'.$email_address.'</th></tr>';
            $pdf .= '<tr><th><b>Alternate Contact</b></th><th>'.$alternate_contact.'</th></tr>';
            $pdf .= '<tr><th><b>Company Web page</b></th><th>'.$company_web_page.'</th></tr>';

            $pdf2 .= '<tr><th><b>Date</b></th><th>'.$Date.'</th></tr>';
            $pdf2 .= '<tr><th><b>Location Interaction</b></th><th>'.$location_interaction.'</th></tr>';
            $pdf2 .= '<tr><th><b>Phone Interaction</b></th><th>'.$phone_interaction.'</th></tr>';
            $pdf2 .= '<tr><th><b>Attendees (Clientside)</b></th><th>'.$attendees_client_side.'</th></tr>';
            $pdf2 .= '<tr><th><b>Attendees (ACI)</b></th><th>'.$attendees_agrimin.'</th></tr>';
            $pdf2 .= '<tr><th><b>Purpose Meeting</b></th><th>'.$purpose_of_meeting.'</th></tr>';
            $pdf2 .= '<tr><th><b>Sales Target</b></th><th>'.$sales_target.'</th></tr>';
            $pdf2 .= '<tr><th><b>Specific Issue</b></th><th>'.$specific_issue.'</th></tr>';
            $pdf2 .= '<tr><th><b>Client Complaint</b></th><th>'.$client_complant.'</th></tr>';

            #$pdf3 .= '<tr><th><b>Items Discussed</b></th><th>'.$items_discussed.'</th></tr>';
            $pdf3 .= '<tr><th>'.$items_discussed.'</th></tr>';


            #$pdf4 .= '<tr><th><b>Client Complaint</b></th><th>'.$action_points.'</th></tr>';
            $pdf4 .= '<tr><th>'.$action_points.'</th></tr>';

            $pdf5 .= '<tr><th><b>Was the purpose of the meeting achieved?</b></th><th>'.$purpose_of_meeting_achieved.'</th></tr>';
            $pdf5 .= '<tr><th><b>What action to be taken to achieve said purpose/target?</b></th><th>'.$action_tobe_taken_to_achieve_said_purpose.'</th></tr>';
            $pdf5 .= '<tr><th><b>When will Team ACI follow up with client?</b></th><th>'.$team_aci_followup_with_client.'</th></tr>';

            $pdf6 .= '<tr><th><b>Date of Report Filing</b></th><th>'.$report_date.'</th></tr>';
            $pdf6 .= '<tr><th><b>Report Filed By</b></th><th>'.$report_user.'</th></tr>';

        }  
        #$pdf .= '<table>';


        
        require('tcpdf/tcpdf.php');
          $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
          $obj_pdf->SetCreator(PDF_CREATOR);  
          $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
          $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
          $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
          $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
          $obj_pdf->SetDefaultMonospacedFont('helvetica');  
          $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
          $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
          $obj_pdf->setPrintHeader(false);  
          $obj_pdf->setPrintFooter(false);  
          $obj_pdf->SetAutoPageBreak(TRUE, 10);  
          $obj_pdf->SetFont('helvetica', '', 12);  
          $obj_pdf->AddPage();  
          $content = ''; 
          $content .= '<center><img src="'.$logo.'" alt=""></center>'; 
          $content .= '  
          <h3 align="center">Client Interaction Report</h3><br /><br />  
          <table border="1" cellspacing="0" cellpadding="5">';  
          #$content .= fetch_data();  
          $content .= $pdf;
          $content .= '</table>';
          $content .= '  
          <h3 align="center">Interaction Details</h3><br /><br />  
          <table border="1" cellspacing="0" cellpadding="5">';  
          #$content .= fetch_data();  
          $content .= $pdf2;
          $content .= '</table>';
          $content .= '  
          <h3 align="center">Summary Of Items Discussed</h3><br /><br />  
          <table border="1" cellspacing="0" cellpadding="5">';  
          #$content .= fetch_data();  
          $content .= $pdf3;
          $content .= '</table>';
          $content .= '  
          <h3 align="center">Summary Of Action Points</h3><br /><br />  
          <table border="1" cellspacing="0" cellpadding="5">';  
          #$content .= fetch_data();  
          $content .= $pdf4;
          $content .= '</table>';

          $content .= '<br />';

          $content .= '  
          <h3 align="center">Outlook (ACI)</h3><br /><br />  
          <table border="1" cellspacing="0" cellpadding="5">';  
          #$content .= fetch_data();  
          $content .= $pdf5;
          $content .= '</table>';

          $content .= '  
          <h3 align="center">Report Generated  By</h3><br /><br />  
          <table border="1" cellspacing="0" cellpadding="5">';  
          #$content .= fetch_data();  
          $content .= $pdf6;
          $content .= '</table>';

   

          $obj_pdf->writeHTML($content);  
          $obj_pdf->Output('Interaction_Reports.pdf', 'I'); 
    
    }

}

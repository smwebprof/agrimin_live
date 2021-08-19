<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getfiledocsbymail extends CI_Controller {

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
	 * Author : Shivaji M Dalvi 
	 * Date : 09.08.2021
	 */
	public function index()
	{
		 
		//set_time_limit(4000); 
		$this->load->model('Document_master');

       /*imap_open("{imap.gmail.com:993/imap/ssl/novalidate-cert}", 'agrimindocs@gmail.com', 'agrimin#4321') or die('Cannot connect: ' . print_r(imap_errors(), true));*/

       /* connect to gmail with your credentials */
		$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}';//INBOX
		$username = 'agrimindocs'; 
		$password = 'agrimin#4321';

		/* try to connect */
		$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

		//$headers = imap_search($inbox, 'SUBJECT "AgriMinFileDocs*SG/2020/079"', SE_UID);
		//print_r($headers);exit;
		
		$get_email_address = $this->Document_master->getmaildocsactivedata();
		//echo count($get_email_address);exit;

		foreach($get_email_address as $email_address) 
		{

		$mail_id = $email_address['mail_name']; //shivaji.dalvi@rcaindia.com
		$emails = imap_search($inbox, 'FROM "'.$mail_id.'"'); 
		//print_r($emails);exit;

	
		/* if any emails found, iterate through each email */
		if($emails) {

		    $count = 1;

		    /* put the newest emails on top */
		    rsort($emails);

		    /* for every email... */
		    foreach($emails as $email_number) 
		    {

		    	// Get header details from email headers
		        $headers = imap_headerinfo($inbox, $email_number);
		        //$MailDate = '6-Aug-2021 06:49:08 +0000';
       			$utc_date = date('Y-m-d',strtotime($headers->MailDate));
       			$local_date = gmdate('Y-m-d');
       			//echo strtotime($utc_date)."===".strtotime($local_date);exit;

       			// check if system date matches with mail send date
       			if (strtotime($utc_date)==strtotime($local_date)) {

       			$check_email_number_exists = $this->Document_master->getMailDocsmasterbyDate($email_number,$utc_date);

       			if (empty($check_email_number_exists[0]['email_count'])) {

			        $email_subject = $headers->Subject;
			        $email_subject_part = explode('*', $email_subject);
			        $file_no = $email_subject_part[1];
					$result = $this->Document_master->getDocumentDetailsByFileNo($file_no);
					$file_id = $result[0]['id'];

			        /* get information specific to this email */
			        $overview = imap_fetch_overview($inbox,$email_number,0);

			        $message = imap_fetchbody($inbox,$email_number,2);

			        /* get mail structure */
			        $structure = imap_fetchstructure($inbox, $email_number);

			        $attachments = array();

			        /* if any attachments found... */
			        if(isset($structure->parts) && count($structure->parts)) 
			        {
			            for($i = 0; $i < count($structure->parts); $i++) 
			            {
			                $attachments[$i] = array(
			                    'is_attachment' => false,
			                    'filename' => '',
			                    'name' => '',
			                    'attachment' => ''
			                );

			                if($structure->parts[$i]->ifdparameters) 
			                {
			                    foreach($structure->parts[$i]->dparameters as $object) 
			                    {
			                        if(strtolower($object->attribute) == 'filename') 
			                        {
			                            $attachments[$i]['is_attachment'] = true;
			                            $attachments[$i]['filename'] = $object->value;
			                        }
			                    }
			                }

			                if($structure->parts[$i]->ifparameters) 
			                {
			                    foreach($structure->parts[$i]->parameters as $object) 
			                    {
			                        if(strtolower($object->attribute) == 'name') 
			                        {
			                            $attachments[$i]['is_attachment'] = true;
			                            $attachments[$i]['name'] = $object->value;
			                        }
			                    }
			                }

			                if($attachments[$i]['is_attachment']) 
			                {
			                    $attachments[$i]['attachment'] = imap_fetchbody($inbox, $email_number, $i+1);

			                    /* 3 = BASE64 encoding */
			                    if($structure->parts[$i]->encoding == 3) 
			                    { 
			                        $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
			                    }
			                    /* 4 = QUOTED-PRINTABLE encoding */
			                    elseif($structure->parts[$i]->encoding == 4) 
			                    { 
			                        $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
			                    }
			                }
			            } // line 83 end
			        } // line 82 end

			        /* iterate through each attachment and save it */
			        foreach($attachments as $attachment)
			        {
			            if($attachment['is_attachment'] == 1)
			            {
			                $filename = $attachment['name'];
			                if(empty($filename)) $filename = $attachment['filename'];

			                if(empty($filename)) $filename = time() . ".dat";
			                $folder = "mail_docs";
			                if(!is_dir($folder))
			                {
			                     mkdir($folder);
			                }
			                $fp = fopen("./". $folder ."/". $email_number . "_" . $filename, "w+");
			                fwrite($fp, $attachment['attachment']);
			                fclose($fp);

			                $file_path = BASE_PATH. $folder ."/". $email_number . "_" . $filename;

			                $file_email[] = $filename;

			                $file_name = explode(".",$filename);

			                $params['file_id'] = $file_id;
			                $params['document_no'] = $file_name[0];
			                $params['doc_types'] = 66;
			                //$params['file_path'] = $file_path;
			                $params['upl_document_path'] = $email_number . "_" . $filename;
			                $params['from_address'] = $headers->from[0]->mailbox."@".$headers->from[0]->host;
			                $params['subject'] = $email_subject;
			                $params['email_number'] = $email_number;
			                $params['email_utc_date'] = $utc_date;
			                $params['entry_user_id'] = '1'; // from mail document master
			                $params['entry_date'] = $local_date;
							$params['user_comp_id'] = $result[0]['user_comp_id'];
							$params['user_branch_id'] = $result[0]['user_branch_id'];
							//print_r($params);exit;

			                //Save the data into table  
			                //$insert_maildocs = $this->Document_master->addFileDocsByMail($params);

			                $insert_maildocs = $this->Document_master->addDocumentTypes($params);

			            } // line 140 end
			        } // line 138 end

			        // send reply to sender - Shivaji Dalvi
			        $this->load->library('email');

        			$this->email->set_newline("\r\n");

			        $config['protocol'] = 'smtp';
			        $config['smtp_host'] = 'agrimincontrol.com';
			        $config['smtp_port'] = '587';
			        $config['smtp_user'] = 'admin@agrimincontrol.com';
			        $config['smtp_from_name'] = 'AGRIMIN Admin (Do_Not_Reply)';
			        $config['smtp_pass'] = '~Iec,=0v~iAk';
			        $config['wordwrap'] = TRUE;
			        $config['newline'] = "\r\n";
			        $config['mailtype'] = 'html';
			        //$config['smtp_crypto'] = 'ssl';

			        $subject = 'Re : '.$email_subject;

			        $file_email_report = 'Dear User,<br><br>';

			        $file_email_report .= 'Date : '.date('d-m-Y',strtotime($local_date)).'<br><br>';

			        foreach ($file_email as $k => $v) {
			        $file_email_report .= 'Attachment '.$v.' is uploaded Succesfully!!!<br>';
			    	}

			        $file_email_report .= '<br><br>From,<br>'; 
			        $file_email_report .= '<br>ACI Admin<br><br>'; 

			        $file_email_report .= '<br><b>NOTE: This is a system generated mail. Please do not reply</b><br><br>'; 
			                         
			            
			        $this->email->initialize($config);

			        $this->email->from($config['smtp_user'], $config['smtp_from_name']);
			        $this->email->to($params['from_address']);

			        $this->email->subject($subject);

			        $this->email->message($file_email_report);  

			        if($this->email->send()) { 
			          echo 'Mail Send Succesfully!!!';//exit;
			        } else {
			          echo 'OOPs No Email Sent!!!';//exit;
			        }

		       } // email_count 
		      } //if (strtotime($utc_date)==strtotime($local_date)) { Line 65 
		    } // line 55 end
		}  // line 47 end

		}  // foreach($get_email_address as $email_address)

		/* close the connection */
		imap_close($inbox);

		echo "all attachment Downloaded";    
        
	}    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Showpwd extends CI_Controller {

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
	 * Date : 15.01.2020
	 */
	public function index()
	{
		
		echo date('d-m-Y H:i:s');exit;
		$this->load->library ('common');

		$pwd = 'jT84yCetBQkoyeeUw2LdNzKbSG+LIA09JheSFXqUQww=';
		$action = 'decrypt'; // encrypt  decrypt

    	echo @$this->common->encrypt_decrypt($action,$pwd);	
		
	}
	
	public function testemail()
	{
	    //////// send email notification ///////////////
        		$email_file_no = '1234656';
        		$email_file_date = date('d-m-Y');
        		$email_file_user = 'test';

        		$this->load->library('email');

		        $this->email->set_newline("\r\n");

		        $config['protocol'] = 'smtp';
		        $config['smtp_host'] = 'smtp.gmail.com';
		        $config['smtp_port'] = '465';
		        #$config['smtp_user'] = 'rcaindia635@gmail.com';
		        #$config['smtp_from_name'] = 'AGRIMIN Admin';
		        $config['smtp_user'] = 'agrimincontrol21@gmail.com';
		        $config['smtp_from_name'] = 'AGRIMIN Admin (Do_Not_Reply)';
		        $config['smtp_pass'] = 'Agri$rv21';
		        $config['wordwrap'] = TRUE;
		        $config['newline'] = "\r\n";
		        $config['mailtype'] = 'html';
		        $config['smtp_crypto'] = 'ssl';


		        $file_email_report = 'Dear Sir,<br><br>';
				$file_email_report .= 'New File is created with details as below  :<br><br>';

				$file_email_report .= '<table width="60%" cellpadding="0" border="1">
		          		 <tr><td align="center">File No</td><td align="center">File Creation Date</td><td align="center">File Created By</td>
		          		 <tr><td align="center">'.$email_file_no.'</td><td align="center">'.$email_file_date.'</td><td align="center">'.$email_file_user.'</td>
		          		 </tr></table>';

		        $file_email_report .= '<br><br>Thanking you,<br>'; 
		        $file_email_report .= '<br>Agrimin Control Admin<br><br>'; 

		        $file_email_report .= '<br><b>NOTE: This is a system generated mail. Please do not reply</b><br><br>'; 
		                     

		        $this->email->initialize($config);

		        $this->email->from($config['smtp_user'], $config['smtp_from_name']);
		        $this->email->to('shivdalvi@gmail.com');
		        $this->email->cc('smwebprof@gmail.com');
		        #$this->email->bcc($attributes['cc']);
		        $this->email->subject('[Agrimin Control] New File Created');

		        $this->email->message($file_email_report);
		        
		        if($this->email->send()) { 
		        	echo 'Yes';exit;      
		        } else { echo 'no';exit;
		            echo 'No';exit;
		        } 
		        
	}  
	
	
	public function testemail2()
	{
	    
	    //////// send email notification ///////////////
        		$email_file_no = '1234656';
        		$email_file_date = date('d-m-Y');
        		$email_file_user = 'test';
        		
        		$email_attachment = '/home/agrimn8f/public_html/agrimin/uploads/agrimin_user_manual_version_I.pdf';

        		$this->load->library('email');

		        $this->email->set_newline("\r\n");

		        $config['protocol'] = 'smtp';
		        $config['smtp_host'] = 'agrimincontrol.com';
		        $config['smtp_port'] = '587';
		        #$config['smtp_user'] = 'rcaindia635@gmail.com';
		        #$config['smtp_from_name'] = 'AGRIMIN Admin';
		        $config['smtp_user'] = 'admin@agrimincontrol.com';
		        $config['smtp_from_name'] = 'AGRIMIN Admin (Do_Not_Reply)';
		        $config['smtp_pass'] = '~Iec,=0v~iAk';
		        $config['wordwrap'] = TRUE;
		        $config['newline'] = "\r\n";
		        $config['mailtype'] = 'html';
		        //$config['smtp_crypto'] = 'ssl';


		        $file_email_report = 'Dear Sir,<br><br>';
				$file_email_report .= 'From Admin New File is created with details as below  :<br><br>';

				$file_email_report .= '<table width="60%" cellpadding="0" border="1">
		          		 <tr><td align="center">File No</td><td align="center">File Creation Date</td><td align="center">File Created By</td>
		          		 <tr><td align="center">'.$email_file_no.'</td><td align="center">'.$email_file_date.'</td><td align="center">'.$email_file_user.'</td>
		          		 </tr></table>';

		        $file_email_report .= '<br><br>Thanking you,<br>'; 
		        $file_email_report .= '<br>Agrimin Control Admin<br><br>'; 

		        $file_email_report .= '<br><b>NOTE: This is a system generated mail. Please do not reply</b><br><br>'; 
		                     

		        $this->email->initialize($config);

		        $this->email->from($config['smtp_user'], $config['smtp_from_name']);
		        $this->email->to('shivdalvi@gmail.com,shivaji.dalvi@rcaindia.com');
		        #$this->email->cc('smwebprof@gmail.com');
		        #$this->email->bcc($attributes['cc']);
		        $this->email->subject('[Agrimin Control] New File Created');

		        $this->email->message($file_email_report);
		        
		        $this->email->attach($email_attachment);
		        
		        if($this->email->send()) { 
		        	echo 'Yes';exit;      
		        } else { echo 'no';exit;
		            echo 'No';exit;
		        } 
	    
	    
	}    
}

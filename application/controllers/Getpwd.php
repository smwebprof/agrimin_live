<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getpwd extends CI_Controller {

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
		
		$this->load->library ('common');
		$this->load->model('User_master');

		#$pwd = 'gN25ItItDHnNDwN9ackG3BbnvRRUo72E/Q2c2Hpk9Ac=';
		$action = 'decrypt'; // encrypt  decrypt

    	#echo @$this->common->encrypt_decrypt($action,$pwd);
    	$result = $this->User_master->getAllEmp();
    	//print_r($result);exit;	
    	
    	echo '<table border="1">';
    	echo '<tr><td>emp_code</td><td>company_id</td><td>company_name</td><td>branch_id</td><td>branch_name</td><td>first_name</td><td>middle_name</td><td>last_name</td><td>office_email</td><td>personal_email</td><td>password</td></tr>';
    	foreach ($result as $user_data) {
    		echo '<tr><td>'.$user_data['emp_code'].'</td><td>'.$user_data['company_id'].'</td><td>'.$user_data['company_name'].'</td><td>'.$user_data['branch_id'].'</td><td>'.$user_data['branch_name'].'</td><td>'.$user_data['first_name'].'</td><td>'.$user_data['middle_name'].'</td><td>'.$user_data['last_name'].'</td><td>'.$user_data['office_email'].'</td><td>'.$user_data['personal_email'].'</td><td>'.@$this->common->encrypt_decrypt($action,$user_data['password']).'</td></tr>';
    	}
    	echo '</table>';
		
	}
}

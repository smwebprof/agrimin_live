<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fullviewusermanagement extends CI_Controller {

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

        $this -> load -> model('user_master');
        $this->load->library ('common');
   
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $result = $this->user_master->getUserInfobyId($id);
        //print_r($result);exit;
        $user_details = $this->user_master->getUserFullDetailsbyId($id);
        //print_r($user_details);exit;

        $user_pass = @$this->common->encrypt_decrypt('decrypt',$result[0]['password']);
        
        $this->data['title']='ACI - Fullviewusermanagement';    
        $this->data['layout_body']='fullviewusermanagement';
        $this->data['report_date'] = $dt;
        $this->data['report_user'] = $user;
        $this->data['user_data'] = $result;
        $this->data['user_details'] = $user_details;
        $this->data['user_pass'] = $user_pass;

        $this->load->view('admin/layout/main_app', $this->data);
    
    }

}

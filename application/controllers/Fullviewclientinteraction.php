<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fullviewclientinteraction extends CI_Controller {

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
        #print_r($result);exit;
        $this->data['title']='ACI - Client Interaction';    
        $this->data['layout_body']='fullviewclientinteraction';
        $this->data['report_date'] = $result[0]['entry_date'];
        $this->data['report_user'] = $getUser[0]['first_name']." ".$getUser[0]['last_name'];
        $this->data['interaction_data'] = $result;

        $this->load->view('admin/layout/main_app', $this->data);
    
    }

}

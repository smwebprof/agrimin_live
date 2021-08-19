<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RedirectInvoicefileregister extends CI_Controller {

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
		$this->load->library('form_validation');
		$this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('unit_master');
        $this->load->helper('form');
        $this->load->model('Invoice_master');
        $id = base64_decode($_GET['id']);

        $result = $this->Invoice_master->getMultInvoiceByFileNo($id);
        //print_r($result);exit;
        $redirect_url = BASE_PATH."Fullviewinvoiceregister?id=".base64_encode($result[0]['id']);
        redirect($redirect_url);
	}
}

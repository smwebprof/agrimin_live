<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delproformainvoice extends CI_Controller {

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
		
		$this->load->model('Invoice_master');
		
		$id = base64_decode($_GET['id']);
		$dt = gmdate('Y-m-d H:i:s');

		$this->data['title'] = 'ACI - Invoice File Register';
		#$this -> load -> model('campaign_model');
		
		$this->data['layout_body']='delinvoicefileregister';

		$invoice_data = $this->Invoice_master->getProformaInvoicedata($id);
		#print_r($invoice_data);exit;
		/*if ($invoice_data[0]['invoice_type']=='Draft')  {
			$viewinteractions = BASE_PATH."Viewinvoicefileregister?msg=4";
       		redirect($viewinteractions);
		}*/


		$data['user_id'] = @$_SESSION['userId']; 
		$data['dt'] = $dt;
		$result = $this->Invoice_master->delproformainvoice($id,$dt,$data);

		########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'delproformainvoice';
            $params['date_time'] = $dt;
            $params['action'] = 'Delete';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

        ##################################################################
     
 		$viewinteractions = BASE_PATH."Viewproformainvoice?msg=2";
        redirect($viewinteractions);
		#$this->load->view('viewcompanymaster');
	}
}

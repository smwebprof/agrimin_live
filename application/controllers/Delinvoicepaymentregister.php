<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delinvoicepaymentregister extends CI_Controller {

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

		$this->data['title'] = 'ACI - Invoice Payment Register';
		#$this -> load -> model('campaign_model');
		
		$this->data['layout_body']='delinvoicepaymentregister';

		$invoice_data = $this->Invoice_master->getPaymentInvoiceById($id);
		//print_r($invoice_data);exit;

        $invoice_details = $this->Invoice_master->getFileInvoicedata($invoice_data[0]['invoice_no']); 
        $data['invoice_rec_amt'] = $invoice_details[0]['invoice_rec_amt'];
        $data['invoice_recd_amt'] = $invoice_data[0]['invoice_rec_amt'];
        $data['invoice_balane_amt'] = $invoice_details[0]['invoice_balane_amt'];
        $data['invoice_balaned_amt'] = $invoice_data[0]['invoice_rec_amt'];
        $data['invoice_id'] = $invoice_data[0]['invoice_no'];
        //print_r($data);exit;

		$invoice_no = $invoice_data[0]['invoice_no'];

		$data['user_id'] = @$_SESSION['userId']; 
		$data['dt'] = $dt;
		$data['invoice_no'] = $invoice_no;

		$result = $this->Invoice_master->delinvoicepaymentregister($id,$dt,$data);

		if ($result) {
			$UpdateInvoiceData = $this->Invoice_master->UpdateInvoicePaymentBalance($data);
		}

		########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'delinvoicepaymentregister';
            $params['date_time'] = $dt;
            $params['action'] = 'Delete';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

        ##################################################################
     
 		$viewinteractions = BASE_PATH."Viewfileinvoicepayment?msg=2";
        redirect($viewinteractions);
		#$this->load->view('viewcompanymaster');
	}
}

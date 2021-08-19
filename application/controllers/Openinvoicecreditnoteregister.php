<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Openinvoicecreditnoteregister extends CI_Controller {

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
		$this->load->model('Credit_master');
		
		$id = base64_decode($_GET['id']);
		$dt = gmdate('Y-m-d H:i:s');

		$this->data['title'] = 'ACI - Openinvoicecreditnoteregister';
		#$this -> load -> model('campaign_model');
		
		$this->data['layout_body']='openinvoicecreditnoteregister';

		$data['user_id'] = @$_SESSION['userId']; 
		$data['dt'] = $dt;
		$data['credit_id'] = $id;

		$resultdata = $this->Credit_master->updateEditCreditDate($data);

		$result = $this->Credit_master->openinvoicecreditnoteregister($id,$dt);


		########################### Log Activity ######################################
            $this->load->model('Activity_master');
            $params['module'] = 'openinvoicecreditnoteregister';
            $params['date_time'] = $dt;
            $params['action'] = 'Open';
            $params['user_activity_id'] = $_SESSION['userId'];
            $params['ip_address'] = $_SERVER['REMOTE_ADDR'];

            $activity = $this->Activity_master->addActivitylog($params);

        ##################################################################
     
 		$viewinteractions = BASE_PATH."Viewinvoicecreditnoteregister?msg=1";
        redirect($viewinteractions);
		#$this->load->view('viewcompanymaster');
	}
}

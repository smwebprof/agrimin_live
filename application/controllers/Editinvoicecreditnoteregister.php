<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editinvoicecreditnoteregister extends CI_Controller {

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
		$this->load->model('Invoice_master');
        $this->load->model('Credit_master');
        $this->load->model('Unit_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        if (@$_POST) {
        	//print_r($_POST);exit;

        	if ($_POST['invoice_total_full_amt'] > $_POST['invoice_tot_amt']) {
                	$redirect_url = BASE_PATH."Editinvoicecreditnoteregister?id=".base64_encode($id)."&msg=2";
                	redirect($redirect_url);
            }

	        $_POST['user_id'] = @$_SESSION['userId']; 
	        $dt = gmdate('Y-m-d H:i:s');
	        $_POST['dt'] = $dt;
	        $_POST['user_comp_id'] = @$_SESSION['comp_id']; 
	        $_POST['user_branch_id'] = @$_SESSION['branch_id'];

	        $resultdata = $this->Credit_master->updateEditCreditData($this->input->post()); 
          
        	$_POST['invoice_no'] = $resultdata;
        	#$_POST['invoice_no'] = 111;
        	$invoicedata = $this->Credit_master->updateCreditDetailsNew($this->input->post());

        	$viewinvoice = BASE_PATH."Viewinvoicecreditnoteregister?msg=1";
            redirect($viewinvoice);
        } else {
        	$resultdata = $this->Credit_master->getCreditdataById($id);
		    //print_r($resultdata);exit;

		    $resultdetails = $this->Credit_master->getCreditdetailsById($id);
		    //print_r($resultdetails);exit;
			$units = $this->Unit_master->getAllUnitdata();
			//print_r($units);exit;

			$this->data['title'] = 'ACI - Editinvoicecreditnoteregister';
			#$this->data['company_data'] = $result;
			$this->data['layout_body']='editinvoicecreditnoteregister';
			$this->data['credit_details']=$resultdata;
			$this->data['credit_work_details']=$resultdetails;
			$this->data['units'] = $units;
		 	

		 	$this->load->view('admin/layout/main_app_credit', $this->data);
        }	


		/*if (@$_POST) {
			//print_r($_POST);exit;

			if (@$_POST['invoice_info']=='Info') {
				//print_r($_POST);exit;
				$_POST['user_id'] = @$_SESSION['userId']; 
	        	$dt = gmdate('Y-m-d H:i:s');
	        	$_POST['dt'] = $dt;
	        	//print_r($this->input->post());exit;
	        	$resultdata = $this->Credit_master->getCreditdataById($_POST['credit_no']);
	        	//print_r($resultdata);exit;

	        	$resultdetails = $this->Credit_master->getCreditdetailsById($_POST['credit_no']);
	        	//print_r($resultdetails);exit;

	        	$results = $this->Credit_master->getCreditByFinalStatus();
				//print_r($results);exit;
				$units = $this->Unit_master->getAllUnitdata();
				//print_r($units);exit;

				$this->data['title'] = 'ACI - Editcreditnoteregister';
				#$this->data['company_data'] = $result;
				$this->data['layout_body']='editcreditnoteregister';
				$this->data['credit_data']=$results;
				$this->data['credit_details']=$resultdata;
				$this->data['credit_work_details']=$resultdetails;
				$this->data['units'] = $units;
	 	

	 			$this->load->view('admin/layout/main_app_credit', $this->data);
        
        	} 

        	if (@$_POST['invoice_add']=='Edit') {
        		//print_r($_POST);exit;

        		$_POST['user_id'] = @$_SESSION['userId']; 
	        	$dt = gmdate('Y-m-d H:i:s');
	        	$_POST['dt'] = $dt;
	        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
	        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];

	        	$resultdata = $this->Credit_master->updateEditCreditData($this->input->post()); 
          
        	    $_POST['invoice_no'] = $resultdata;
        	    #$_POST['invoice_no'] = 111;
        		$invoicedata = $this->Credit_master->updateCreditDetailsNew($this->input->post());

        		$viewinvoice = BASE_PATH."Editcreditnoteregister?msg=1";
            	redirect($viewinvoice);

			}			

		} else {
			$results = $this->Credit_master->getCreditByFinalStatus();
			//print_r($results);exit;
			$units = $this->Unit_master->getAllUnitdata();

			$this->data['title'] = 'ACI - Editinvoicecreditnoteregister';
			#$this->data['company_data'] = $result;
			$this->data['layout_body']='editinvoicecreditnoteregister';
			$this->data['credit_data']=$results;
			$this->data['units'] = $units;
 	

 			$this->load->view('admin/layout/main_app_credit', $this->data);

			#$this->load->view('file_register_new');

		}	*/
		
	}
}

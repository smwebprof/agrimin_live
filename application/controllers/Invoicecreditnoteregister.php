<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoicecreditnoteregister extends CI_Controller {

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

        #$result = $this->company_master->getRows();

        if (@$_POST) {
        		//print_r($_POST);exit;

        	    if (!empty($_POST['invoice_bal_amt'])) { 
	        	    if ($_POST['invoice_total_full_amt'] > $_POST['invoice_bal_amt']) {
	                	$redirect_url = BASE_PATH."Invoicecreditnoteregister?id=".base64_encode($id)."&msg=2";
	                	redirect($redirect_url);
	            	}
	            } else {
	            	if ($_POST['invoice_total_full_amt'] > $_POST['invoice_amt']) {
	                	$redirect_url = BASE_PATH."Invoicecreditnoteregister?id=".base64_encode($id)."&msg=3";
	                	redirect($redirect_url);
	            	}
	            }
	            
            	if (!empty($_POST['invoice_total_full_amt'])) { 
            		if (!empty($_POST['invoice_bal_amt'])) { 
            			$invoice_credit_amt = (float)$_POST['invoice_bal_amt'] - (float)$_POST['invoice_total_full_amt'];	
            		} else {
            			$invoice_credit_amt = (float)$_POST['invoice_amt'] - (float)$_POST['invoice_total_full_amt'];	
            		}	        			
        		} else { 
        			$invoice_credit_amt = (float)$_POST['invoice_total_full_amt'];
        		}
        		//echo $invoice_credit_amt;exit;


        		$_POST['user_id'] = @$_SESSION['userId']; 
	        	$dt = gmdate('Y-m-d H:i:s');
	        	$_POST['dt'] = $dt;
	        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
	        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];
	        	$_POST['invoice_credit_amt'] = @$invoice_credit_amt;        		

	        	$resultdata = $this->Credit_master->addCreditDataNew($this->input->post()); 
          
        	    $_POST['credit_id'] = $resultdata;

        	    //$_POST['credit_id'] = 111;
        		$invoicedata = $this->Credit_master->addCreditDetailsNew($this->input->post());

        		$getInvoiceId = $this->Credit_master->getCreditIdByBranch();
                //print_r($getInvoiceId);exit;
                if (isset($getInvoiceId[0]['credit_note_id']) && !empty($getInvoiceId[0]['credit_note_id'])) { 
                    $invoiceId = @$getInvoiceId[0]['credit_note_id']+1;
                    $invoiceId = str_pad($invoiceId, 3, '0', STR_PAD_LEFT);
                    #$_POST['invoice_id'] = $invoiceId;
                } else { 
                    $invoiceId = 1;
                    $invoiceId = str_pad($invoiceId, 3, '0', STR_PAD_LEFT);
                    #$_POST['invoice_id'] = $invoiceId;
                }
                #echo $invoiceId;exit;
                #print_r($_POST['invoice_id']);exit;
                $updateinvoiceno['credit_note_no'] = 'CN-'.$_POST['invoice_no']."/".$invoiceId;
                $updateinvoiceno['id'] = $_POST['credit_id'];
                $updateinvoiceno['credit_note_id'] = $invoiceId;
                #$updateinvoiceno['invoice_id'] = $invoiceId;
                //print_r($updateinvoiceno);exit;
                $updateInvoiceNoData = $this->Credit_master->updateCreditNo($updateinvoiceno);


                if ($invoice_credit_amt=='0.00') { 
        			// Update Invoice master table
        			$_POST['invoice_balane_amt'] = $invoice_credit_amt;
        			$_POST['invoice_credit_amt'] = $_POST['invoice_total_full_amt'];
                	$invoicedata = $this->Credit_master->UpdateInvoiceBalance($this->input->post());

                	//Update Payment master table
                	$_POST['invoice_balane_amt'] = $invoice_credit_amt;
        			$_POST['invoice_credit_amt'] = $_POST['invoice_total_full_amt'];

                	$invoicedata = $this->Credit_master->UpdatePaymentBalance($this->input->post());

                	$UpdateInvoiceData = $this->Invoice_master->UpdateInvoiceStatus($this->input->post());

                	$UpdatecredtInvoiceData = $this->Credit_master->UpdateCreditInvoiceStatus($this->input->post());

                	$invoice_status = $this->Invoice_master->getInvoiceStatusById($_POST['file_id']);

        			if ($invoice_status==1) { 
        				$_POST['invoice_file_no'] = $_POST['file_id']; 
        				$UpdateFileData = $this->Invoice_master->UpdateInvoicePaymentDataByFile($this->input->post());
        			}
        		} else {
        			$_POST['invoice_balane_amt'] = $invoice_credit_amt;
        			$_POST['invoice_credit_amt'] = $_POST['invoice_total_full_amt'];
                	$invoicedata = $this->Credit_master->UpdateInvoiceBalance($this->input->post());

                	//Update Payment master table
                	$_POST['invoice_balane_amt'] = $invoice_credit_amt;
        			$_POST['invoice_credit_amt'] = $_POST['invoice_total_full_amt'];

                	$invoicedata = $this->Credit_master->UpdatePaymentBalance($this->input->post());
        		}      

        		$viewinvoice = BASE_PATH."Viewinvoicecreditnoteregister?msg=1";
            	redirect($viewinvoice);        

	 	} else {

	 		$results = $this->Credit_master->getInvoicedataById($id);
	        //print_r($results);exit;
	        $units = $this->Unit_master->getAllUnitdata();

	        if (isset($results[0]['approx_unit1'])) {
	        $getUnit = $this->Unit_master->getUnitById($results[0]['approx_unit1']);
	        //print_r($getUnit);exit;
	    	}

			$this->data['title'] = 'ACI - Invoicecreditnoteregister';
			#$this->data['company_data'] = $result;
			$this->data['layout_body']='invoicecreditnoteregister';
			$this->data['invoice_details']=$results;
			$this->data['units'] = $units;
			$this->data['approx_unit1'] = @$getUnit[0]['unit_name'];
		 	

		 	$this->load->view('admin/layout/main_app_credit', $this->data);

	 	}
		/*if (@$_POST) {
			//print_r($_POST);exit;

			if (@$_POST['invoice_info']=='Info') {
				$_POST['user_id'] = @$_SESSION['userId']; 
	        	$dt = gmdate('Y-m-d H:i:s');
	        	$_POST['dt'] = $dt;
	        	//print_r($this->input->post());exit;
	        	$resultdata = $this->Invoice_master->getInvoicedataById($_POST['invoice_no']);
	        	//print_r($resultdata);exit;
	        	$results = $this->Invoice_master->getInvoiceByFinalStatus();
				//print_r($results);exit;
				$units = $this->Unit_master->getAllUnitdata();

				$this->data['title'] = 'ACI - Creditnoteregister';
				#$this->data['company_data'] = $result;
				$this->data['layout_body']='creditnoteregister';
				$this->data['invoice_data']=$results;
				$this->data['invoice_details']=$resultdata;
				$this->data['units'] = $units;
	 	

	 			$this->load->view('admin/layout/main_app_credit', $this->data);
        
        	} 

        	if (@$_POST['invoice_add']=='Add') {
        		//print_r($_POST);exit;

        		$_POST['user_id'] = @$_SESSION['userId']; 
	        	$dt = gmdate('Y-m-d H:i:s');
	        	$_POST['dt'] = $dt;
	        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
	        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];

	        	$resultdata = $this->Credit_master->addCreditDataNew($this->input->post()); 
          
        	    $_POST['credit_id'] = $resultdata;
        	    #$_POST['credit_id'] = 111;
        		$invoicedata = $this->Credit_master->addCreditDetailsNew($this->input->post());

        		$getInvoiceId = $this->Credit_master->getCreditIdByBranch();
                //print_r($getInvoiceId);exit;
                if (isset($getInvoiceId) && !empty($getInvoiceId)) {
                    $invoiceId = @$getInvoiceId[0]['id'];
                    $invoiceId = str_pad($invoiceId, 3, '0', STR_PAD_LEFT);
                    #$_POST['invoice_id'] = $invoiceId;
                } else { 
                    $invoiceId = 1;
                    $invoiceId = str_pad($invoiceId, 3, '0', STR_PAD_LEFT);
                    #$_POST['invoice_id'] = $invoiceId;
                }
                //echo $invoiceId;exit;
                #print_r($_POST['invoice_id']);exit;
                $updateinvoiceno['credit_note_no'] = 'CN-'.$getInvoiceId[0]['invoice_no']."/".$invoiceId;
                $updateinvoiceno['id'] = $_POST['credit_id'];
                #$updateinvoiceno['invoice_id'] = $invoiceId;
                #print_r($updateinvoiceno);exit;
                $updateInvoiceNoData = $this->Credit_master->updateCreditNo($updateinvoiceno);

        		$viewinvoice = BASE_PATH."Creditnoteregister?msg=1";
            	redirect($viewinvoice);

			}			

		} else {
			$results = $this->Invoice_master->getInvoiceByFinalStatus();
			//print_r($results);exit;
			$units = $this->Unit_master->getAllUnitdata();

			$this->data['title'] = 'ACI - Invoicecreditnoteregister';
			#$this->data['company_data'] = $result;
			$this->data['layout_body']='invoicecreditnoteregister';
			$this->data['invoice_data']=$results;
			$this->data['units'] = $units;
 	

 			$this->load->view('admin/layout/main_app_credit', $this->data);

			#$this->load->view('file_register_new');

		}*/	
		
	}
}

<?php
/* Author : Shivaji Dalvi */

defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadledgerdata extends CI_Controller {

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
        $this->load->model('Vendor_master');
        $this->load->model('Invoice_master');
        $this->load->helper('form');

        #$result = $this->company_master->getRows();               	
        //print_r($_POST);exit;
		if (@$_POST['load_ledger_csv']==1) {

			//print_r($_FILES);exit;
	        if (count($_FILES)>0) {
	        	//load our new PHPExcel library
	        	$this->load->library('excel');

	        	$allowed = array('csv');
	        	$filename = $_FILES['ledger_csv_file']['name'];
	        	$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if (!in_array($ext, $allowed)) {
    				$redirect_url = BASE_PATH."Uploadledgerdata?msg=3";
	                redirect($redirect_url);
				}

	        	$inputFileName = $_FILES['ledger_csv_file']['tmp_name'];

	        	//  Read your Excel workbook
				try {
			    	$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			    	$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			    	$objPHPExcel = $objReader->load($inputFileName);
				} catch(Exception $e) {
			    	//die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
			    	$redirect_url = BASE_PATH."Uploadledgerdata?msg=1";
	                redirect($redirect_url);
				}
			
				//  Get worksheet dimensions
				$sheet = $objPHPExcel->getSheet(0); 
				$highestRow = $sheet->getHighestRow(); 
				$highestColumn = $sheet->getHighestColumn();

				//  Loop through each row of the worksheet in turn
				for ($row = 2; $row <= $highestRow; $row++){ 
					 //  Read a row of data into an array
		    		$rowData[] = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);
					//print_r($rowData);exit;
				}
				//print_r($rowData);exit;
				if (count($rowData)>0) {
					foreach ($rowData as $key => $value) {
						//echo $value[0][1];exit;
						$vendor_details = $this->Vendor_master->getVendorByName(trim($value[0][1]));
						//print_r($vendor_details);exit;

						// Client Name Check
						if (empty($vendor_details)) {
							$redirect_url = BASE_PATH."Uploadledgerdata?msg=4";
	                		redirect($redirect_url);
						}
						// Invoice Number Check
						if (empty($value[0][3])) {
							$redirect_url = BASE_PATH."Uploadledgerdata?msg=5";
	                		redirect($redirect_url);
						}

						$invoice_amt =  $this->Invoice_master->getInvoiceDetailsByInvno($value[0][3]);

						if ($value[0][4]!=$invoice_amt) {
							$redirect_url = BASE_PATH."Uploadledgerdata?msg=9";
	                		redirect($redirect_url);	
						}
						//print_r($invoice_details);exit;

						// Ledger Number Check
						if (empty($value[0][6])) {
							$redirect_url = BASE_PATH."Uploadledgerdata?msg=6";
	                		redirect($redirect_url);
						}
						// Ledger Amount Check
						if (empty($value[0][8])) {
							$redirect_url = BASE_PATH."Uploadledgerdata?msg=7";
	                		redirect($redirect_url);
						}

                        $ledger_type_arr = array('credit','debit');
						// Ledger Type Check
						// || (strtolower($value[0][7]) != 'credit') || (strtolower($value[0][7]) != 'debit') 
						if (empty($value[0][7])) {
							$redirect_url = BASE_PATH."Uploadledgerdata?msg=8";
	                		redirect($redirect_url);
						}

						if (!in_array(strtolower($value[0][7]), $ledger_type_arr)) {
							$redirect_url = BASE_PATH."Uploadledgerdata?msg=8";
	                		redirect($redirect_url);
						}	

						
						/*$ledger_type_details = $this->Vendor_master->getAccountledgerByCreditLast($vendor_details[0]['id']);
						//print_r($ledger_type_details);exit;
						if (empty($ledger_type_details[0])) {
							$redirect_url = BASE_PATH."Uploadledgerdata?msg=10";
	                		redirect($redirect_url);
						}*/
        			}
        		}	

				//print_r($rowData);exit;
				if (count($rowData)>0) {
					foreach ($rowData as $key => $value) {
						//echo $value[0][1];exit;
						$vendor_details = $this->Vendor_master->getVendorByName(trim($value[0][1]));
        				$vendor_id = $vendor_details[0]['id'];

        				if (!empty($vendor_id)) {
        					$getLastBal = $this->Vendor_master->getAccountledgerByIdLast($vendor_id);
        					//print_r($getLastBal);exit;
        				}	

        				$params['user_id'] = @$_SESSION['userId'];
			        	$params['user_comp_id'] = @$_SESSION['comp_id']; 
			        	$params['user_branch_id'] = @$_SESSION['branch_id']; 
			        	$dt = gmdate('Y-m-d H:i:s');		        	
			        	$params['dt'] = $dt;
			        	
			        	$params['vendor_name'] = $vendor_id;
				        $params['ledger_narration'] = $value[0][5];
				        $params['ledger_type'] = $value[0][7];
				        if (strtolower($params['ledger_type'])=='credit') {
				        	$params['credit_amount'] = $value[0][8];
				        	if (!empty($getLastBal[0]['balance_amount'])){
				        			$params['balance_amount'] = $getLastBal[0]['balance_amount']+$value[0][8];
				        		} else {
				        			$params['balance_amount'] = $value[0][8];
				        		}
				        }

				        if (($value[0][8] > @$getLastBal[0]['balance_amount']) && (strtolower($value[0][7]) == 'debit')) {
							$redirect_url = BASE_PATH."Uploadledgerdata?msg=11";
	                		redirect($redirect_url);
						}

				        if (strtolower($params['ledger_type'])=='debit') {
				        	$params['debit_amount'] = $value[0][8];
				        	if (!empty($getLastBal[0]['balance_amount'])) {
				        			$params['balance_amount'] = $getLastBal[0]['balance_amount']-$value[0][8];
				        		} else {
				        			$params['balance_amount'] = $value[0][8];
				        		}       					
				        }

				        $params['ledger_amount'] = $value[0][8];

				        list($d1, $m1, $y1) = explode('-',$value[0][2]);
			        	$dt1 =  mktime(0, 0, 0, $m1, $d1, $y1);
			        	$params['ledger_date'] = date("Y-m-d",$dt1);

				        $params['ledger_number'] = $value[0][6];
				        $params['invoice_no'] = $value[0][3];
				        $params['invoice_amt'] = $value[0][4];

        				//print_r($params);exit;
	        			$resultdata = $this->Vendor_master->addAccountledger($params);

	        			if (!empty($getLastBal[0]['balance_amount']))
				        {
				        	if ($value[0][8]==$getLastBal[0]['balance_amount']) 
				        	{
				        		$updatedata = $this->Vendor_master->updateLedgerDataStatus($vendor_id);
	        				}	
				        }
					}

					$redirect_url = BASE_PATH."Uploadledgerdata?msg=2";
	                redirect($redirect_url);
					
				}
	        } 

		} else {
			$this->data['title'] = 'ACI - Upload Ledger Data';
			#$this->data['company_data'] = $result;
			$this->data['layout_body']='uploadledgerdata';
 	

 			$this->load->view('admin/layout/main_app', $this->data);

			#$this->load->view('file_register_new');

		}	
		
	}
}

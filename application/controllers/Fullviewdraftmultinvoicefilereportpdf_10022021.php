<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fullviewdraftmultinvoicefilereportpdf extends CI_Controller {

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

    function __construct()
    {
    parent::__construct();
     
    // add library of Pdf
    $this->load->library('Pdfinvoice');
    }

    public function index()
    {
        
        if (!isset($_SESSION['userId'])) {
          $login = BASE_PATH."login/";
          redirect($login);
        }

        $this->load->library('form_validation');
        $this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Invoice_master');
        $this->load->model('File_master');
        $this->load->model('Unit_master');
        $this->load->model('Client_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $result = $this->Invoice_master->getFileInvoicedata($id);
        //print_r($result);exit;

        if (($result[0]['tax_options']=='VAT') && ($result[0]['invoice_tax_amt']=='')) {
                $redirect_url = BASE_PATH."EditInvoicefileregister?id=".base64_encode($id)."&msg=3";
                redirect($redirect_url);
        }


        $invoice_details = $this->Invoice_master->getInvoiceDetailsdataNew($id);
        #print_r($invoice_details);exit;

        $cargo_group_discount = implode(',', array_column($invoice_details, 'invoice_work_discount'));
        #echo $cargo_group_discount;exit;
        $cargo_discount_arr = explode(",", $cargo_group_discount);
        #print_r($cargo_discount_arr);exit;
        $cargo_discount_flag = 0;
        /*if (in_array(null, $cargo_discount_arr, true) || in_array('', $cargo_discount_arr, true)) {
          $cargo_discount_flag = 1;
        }*/
        foreach ($cargo_discount_arr as $k => $v) {
            if (!empty($v)) {
              $cargo_discount_flag = 1;
            }
        }

        //echo $cargo_discount_flag;exit;

        $cargo_group_details = implode(',', array_column($invoice_details, 'cargo_group'));
        #echo $cargo_group_details;exit;
        $cargo_group_arr = explode(",", $cargo_group_details);
        $cargo_group_arr = array_unique($cargo_group_arr);
        #print_r($cargo_group_arr);exit;

        if (in_array("Other", $cargo_group_arr)) {
          #echo "Got Irix";
          if (($key = array_search("Other", $cargo_group_arr)) !== false) {
              unset($cargo_group_arr[$key]);
          }
        }
        //print_r($cargo_group_arr);exit;
        //exit;
        
        $approx_unit = @$invoice_details[0]['approx_unit'];
        //print_r($invoice_details);exit;

        $attention = $this->Client_master->getClientAttentiondetails($result[0]['client_id']);

        $company_details = $this->company_master->getCompanydatabyid($result[0]['user_comp_id']);
        //print_r($company_details);exit;

        $branch_details = $this->branch_master->getBranchdataById($result[0]['user_branch_id']);
        #echo $branch_details['bank_name'];exit;
        //print_r($branch_details);exit;

        $countries = $this->company_master->getCountries();

        $file_options = $this->File_master->getFileOptions();


        $units = $this->Unit_master->getAllUnitdata();

        $currency = $this->Invoice_master->getCurrency();

        $states = $this->company_master->getStates($result[0]['countryid']);
        $cities = $this->company_master->getCities($result[0]['stateid']);

        $data = $company_details;
        $rows = $result;

        $file_title = 'Invoice_'.$result[0]['invoice_no'];
        $file_name = 'Invoice_'.$result[0]['invoice_no'].'.pdf';

        foreach($rows as $invoice_data){
          if (!empty($invoice_data['zip_pin_code'])) { $zipcode = $invoice_data['zip_pin_code']; } else { $zipcode = ''; }
          if (!empty($invoice_data['email_address'])) { $email = $invoice_data['email_address']; } else { $email = ''; }
          if (!empty($invoice_data['client_vat'])) { $vat = $invoice_data['client_vat']; } else { $vat = ''; }
          if (!empty($invoice_data['country_code'])) { $ccode = $invoice_data['country_code']; } else { $ccode = ''; }
          if (!empty($invoice_data['tel_no'])) { $ttel = $invoice_data['tel_no']; } else { $ttel = ''; }
          #if (!empty($attention['contact_person_name'])) { $cperson = $attention['contact_person_name']; } else { $cperson = ''; }

        $invoice_address = wordwrap($invoice_data['address'], 35, '<br />', true);

        $pdf1 = '<table width="100%" cellpadding="0" border="0">
          <tr>

              <td width="50%">
                  <table width="100%" border="0" align="left">
                      <tr><td><b>'.$invoice_data['client_name'].'</b></td></tr>
                      <tr><td>'.$invoice_address.'</td></tr>'; //$invoice_data['address']
              if ($invoice_data['city']=='Singapore') {  } else { $pdf1 .= '<tr><td>'.$invoice_data['city'].','.$invoice_data['state'].'</td></tr>'; }
              $pdf1 .= '<tr><td>'.$invoice_data['country'].' - '.$zipcode.'</td></tr>';
              #if (!empty(@$zipcode)) { $pdf .= '<tr><td>Postal Code : '.@$zipcode.'</td></tr>'; }          
              #if (!empty(@$email)) { $pdf .= '<tr><td>Email : '.@$email.'</td></tr>'; }  
              if (!empty(@$vat)) { $pdf1 .= '<tr><td>VAT No : '.@$vat.'</td></tr>'; }  
              if (!empty(@$ttel)) { $pdf1 .= '<tr><td>Phone : +'.@$ccode.' '.@$ttel.'</td></tr>'; }         
                      
                  $pdf1 .= '<tr><td><b>Kind Attention : '.@$invoice_data['kind_attention'].'</b></td></tr>
                  </table>    
              </td>';
           if (!empty($result[0]['invoice_id'])) {   
              $pdf1 .= '<td width="50%">
                  <table width="100%" border="0" align="right">
                      <tr><td><b>Invoice No : '.$invoice_data['invoice_no'].'</b></td></tr>
                      <tr><td><b>Invoice Date : '.$invoice_data['invoice_date'].'</b></td></tr>
                  </table>   
              </td>';
          }    
          $pdf1 .= '</tr>
          </table>';

          $pdf3 = '<br>';
          if (!empty($invoice_data['file_no'])) { $pdf3 .= '<tr><th width="20%"><b>Job No</b></th><th width="80%">'.$invoice_data['file_no'].'</th></tr>'; }
          if (!empty($invoice_data['scope_work']) && ($invoice_data['file_no_type'])=='Inspection') { $pdf3 .= '<tr><th width="20%"><b>Scope Of Work</b></th><th width="80%">'.$invoice_data['scope_work'].'</th></tr>'; }
          if (!empty($invoice_data['warehouse']) && ($invoice_data['file_no_type'])=='Inspection') { $pdf3 .= '<tr><th width="20%"><b>Warehouse</b></th><th width="80%">'.$invoice_data['warehouse'].'</th></tr>'; }
          if (!empty($invoice_data['vessel_name'])) { $pdf3 .= '<tr><th width="20%"><b>Vessel</b></th><th width="80%">'.$invoice_data['vessel_name'].'</th></tr>'; }
          #if (!empty($invoice_data['voyage_no'])) { $pdf3 .= '<tr><th><b>Voyage No</b></th><th>'.$invoice_data['voyage_no'].'</th></tr>'; }
          #if (!empty($invoice_data['cargo_group'])) { $pdf3 .= '<tr><th><b>Cargo Group</b></th><th>'.$invoice_data['cargo_group'].'</th></tr>'; }
          if (!empty($invoice_data['cargo_master'])) { $pdf3 .= '<tr><th><b>Commodity</b></th><th>'.htmlspecialchars($invoice_data['cargo_master']).'</th></tr>'; }
          #if (!empty($invoice_data['packing'])) { $pdf3 .= '<tr><th><b>Packing</b></th><th>'.$invoice_data['packing'].'</th></tr>'; }
          #if (!empty($invoice_data['packing_desc'])) { $pdf3 .= '<tr><th><b>Packing Desc</b></th><th>'.$invoice_data['packing_desc'].'</th></tr>'; }
          if (!empty($invoice_data['approx_qty'])) { $pdf3 .= '<tr><th><b>Quantity / Unit</b></th><th>'.$invoice_data['approx_qty'].' '.$invoice_data['approx_unit'].'</th></tr>'; }
          #if (!empty($invoice_data['file_ins'])) { $pdf3 .= '<tr><th><b>File Instructions</b></th><th>'.$invoice_data['file_ins'].'</th></tr>'; }
          #if (!empty($invoice_data['place'])) { $pdf3 .= '<tr><th><b>Place Of Attendance</b></th><th>'.$invoice_data['place'].'</th></tr>'; }
          #if (!empty($invoice_data['origin'])) { $pdf3 .= '<tr><th><b>Origin</b></th><th>'.$invoice_data['origin'].'</th></tr>'; }
          if (!empty($invoice_data['load_port'])) { $pdf3 .= '<tr><th><b>Load Port</b></th><th>'.$invoice_data['load_port'].'</th></tr>'; }
          if (!empty($invoice_data['discharge_port'])) { $pdf3 .= '<tr><th><b>Discharge Port</b></th><th>'.$invoice_data['discharge_port'].'</th></tr>'; }
          if (!empty($invoice_data['invoice_desc'])) { $pdf3 .= '<tr><th><b>File Instructions</b></th><th>'.$invoice_data['invoice_desc'].'</th></tr>'; }
          #if (!empty($invoice_data['invoice_remarks'])) { $pdf3 .= '<tr><th><b>Subject</b></th><th>'.substr($invoice_data['invoice_remarks'],0,200).'</th></tr>'; }
          #if (!empty($invoice_data['invoice_date'])) { $pdf3 .= '<tr><th><b>Inspection Date</b></th><th>'.$invoice_data['inspection_start_date'].' To '.$invoice_data['inspection_end_date'].'</th></tr>'; }
          if (!empty($invoice_data['inspection_date'])) { $pdf3 .= '<tr><th><b>Inspection Date</b></th><th>'.$invoice_data['inspection_date'].'</th></tr>'; }
          if (!empty($invoice_data['bill_lading_no'])) { $pdf3 .= '<tr><th><b>Bill of Lading Number</b></th><th>'.$invoice_data['bill_lading_no'].'</th></tr>'; }
          if (!empty($invoice_data['bill_lading_no'])) { $pdf3 .= '<tr><th><b>Bill of Lading Date</b></th><th>'.$invoice_data['bill_lading_date'].'</th></tr>'; }


          $pdf4 = '<br>';
          $pdf4 = '<table border="1" cellspacing="0" cellpadding="5" align="center">';
          #$pdf4 .=  '<tr><td width="50%"><b>Work Item</b></td><td width="10%"><b>Quantity</b></td><td width="10%"><b>Unit</b></td><td width="10%"><b>Rate</b></td><td width="20%"><b>Amount</b></td></tr>';
          #if (!empty(@$invoice_details[0]['cargo_group'])) { 
          if (count($cargo_group_arr)>1) { 
            if ($cargo_discount_flag==0) { 
              $pdf4 .=  '<tr><td><b>Cargo Group</b></td><td width="30%"><b>Invoice Details</b></td><td width="15%"><b>Quantity</b></td><td width="15%"><b>Rate ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].')</b></td><td width="20%"><b>Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].')</b></td></tr>';
            } else { 
                $pdf4 .=  '<tr><td><b>Cargo Group</b></td><td width="30%"><b>Invoice Details</b></td><td width="11%"><b>Quantity</b></td><td width="11%"><b>Rate ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].')</b></td><td width="11%"><b>Discount (%)</b></td><td width="20%"><b>Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].')</b></td></tr>';
            }  
          } else {   
             if ($cargo_discount_flag==0) {
                $pdf4 .=  '<tr><td width="50%"><b>Invoice Details</b></td><td width="15%"><b>Quantity</b></td><td width="15%"><b>Rate ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].')</b></td><td width="20%"><b>Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].')</b></td></tr>';
             } else {
                $pdf4 .=  '<tr><td width="35%"><b>Invoice Details</b></td><td width="15%"><b>Quantity</b></td><td width="15%"><b>Rate ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].')</b></td><td width="15%"><b>Discount (%)</b></td><td width="20%"><b>Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].')</b></td></tr>';
             } 
            
          }
          

          $row_invoice = $invoice_details;
          foreach($row_invoice as $invoicedetails){  
            #print_r($invoicedetails);exit;
              #$pdf4 .=  '<tr><td>'.$invoicedetails["work_type"].'</td><td>'.$invoicedetails["approx_qty"].'</td><td>'.$invoicedetails["approx_unit"].'</td><td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>';

            #if (!empty($invoicedetails['work_prefix'])) { $pdf4 .=  '<tr><td align="left">'.$invoicedetails["work_prefix"].') '.$invoicedetails["work_type"].'</td><td>'.$invoicedetails["approx_qty"].' '.$invoicedetails["approx_unit"].'</td>
            #if (!empty($invoicedetails['cargo_group'])) { 

            if ($invoicedetails["invoice_work_rate"]=='0') { $invoicedetails["invoice_work_rate"] = ''; }
            if ($invoicedetails["approx_unit"]=='NONE') { $invoicedetails["approx_unit"] = ''; }
            
            if (count($cargo_group_arr)>1) { 
            if ($invoicedetails['cargo_group']=='Other') {$invoicedetails["cargo_group"] = '';}
            if (!empty($invoicedetails['work_prefix'])) { 
                if ($cargo_discount_flag==0) { 
                    $pdf4 .=  '<tr><td align="left">'.$invoicedetails["cargo_group"].'</td><td align="left">'.htmlspecialchars($invoicedetails["work_type"]).'</td><td>'.$invoicedetails["approx_qty"].' '.$invoicedetails["approx_unit"].'</td>
                    <td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>';
                } else { 
                    $pdf4 .=  '<tr><td align="left">'.$invoicedetails["cargo_group"].'</td><td align="left">'.htmlspecialchars($invoicedetails["work_type"]).'</td><td>'.$invoicedetails["approx_qty"].' '.$invoicedetails["approx_unit"].'</td>
                    <td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_discount"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>';
                }  
               } else { 
                      if ($cargo_discount_flag==0) {
                          $pdf4 .=  '<tr><td align="left">&nbsp;&nbsp;&nbsp;'.$invoicedetails["work_prefix"].' '.htmlspecialchars($invoicedetails["work_type"]).'</td><td>'.$invoicedetails["approx_qty"].' '.$invoicedetails["approx_unit"].'</td>
                          <td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_discount"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>';
                      } else {
                          $pdf4 .=  '<tr><td align="left">&nbsp;&nbsp;&nbsp;'.$invoicedetails["work_prefix"].' '.htmlspecialchars($invoicedetails["work_type"]).'</td><td>'.$invoicedetails["approx_qty"].' '.$invoicedetails["approx_unit"].'</td>
                            <td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_discount"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>';
                      }  
                }
            } else {  
              if (!empty($invoicedetails['work_prefix'])) { 
                  if ($cargo_discount_flag==0) {  
                  $pdf4 .=  '<tr><td align="left">'.htmlspecialchars($invoicedetails["work_type"]).'</td><td>'.$invoicedetails["approx_qty"].' '.$invoicedetails["approx_unit"].'</td>
                  <td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>';
                  } else { 
                  $pdf4 .=  '<tr><td align="left">'.htmlspecialchars($invoicedetails["work_type"]).'</td><td>'.$invoicedetails["approx_qty"].' '.$invoicedetails["approx_unit"].'</td>
                  <td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_discount"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>';  
                  } 
                } else { 
                    if ($cargo_discount_flag==0) { 
                    $pdf4 .=  '<tr><td align="left">&nbsp;&nbsp;&nbsp;'.$invoicedetails["work_prefix"].' '.htmlspecialchars($invoicedetails["work_type"]).'</td><td>'.$invoicedetails["approx_qty"].' '.$invoicedetails["approx_unit"].'</td>
                    <td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>';
                    } else { 
                    $pdf4 .=  '<tr><td align="left">&nbsp;&nbsp;&nbsp;'.$invoicedetails["work_prefix"].' '.htmlspecialchars($invoicedetails["work_type"]).'</td><td>'.$invoicedetails["approx_qty"].' '.$invoicedetails["approx_unit"].'</td>
                    <td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_discount"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>';  
                    }        
               }
            }

            /*$pdf4 .=  '<tr><td>'.$invoicedetails["work_prefix"].' '.$invoicedetails["work_type"].'</td><td>'.$invoicedetails["approx_qty"].'</td>
            <td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>';*/
          }
              
              #if (!empty(@$invoice_details[0]['cargo_group'])) {
              if (count(@$cargo_group_arr)>1) {  
                if ($cargo_discount_flag==0) { 
                   $invoice_ex_amt = $invoice_data["invoice_basic_amt"]*$invoice_data["invoice_ex_rate"];
                    if (empty($invoice_data["invoice_tax_amt"])) { $invoice_tax_amt = ''; } else { $invoice_tax_amt = $invoice_data["invoice_tax_amt"]; }
                    $pdf4 .=  '<tr><td align="left"><b>Basic Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].'):</b></td><td></td><td></td><td></td><td><b>'.$invoice_data["invoice_basic_amt"].'</b></td></tr>';
                    if (!empty($invoice_data["invoice_discount"])) {
                    $pdf4 .=  '<tr><td align="left"><b>Discount Amount (Discount '.$invoice_data["invoice_discount"].'%):</b></td><td></td><td></td><td></td><td><b>'.sprintf('%.2f', $invoice_data["invoice_discount_amt"]).'</b></td></tr>';
                    }
                    if (!empty($invoice_tax_amt)) {
                    $pdf4 .=  '<tr><td align="left"><b>Tax Amount (VAT '.$invoice_data["invoice_vat_percent"].'%) :</b></td><td></td><td></td><td></td><td><b>'.$invoice_tax_amt.'</b></td></tr>';
                    }
                    $pdf4 .=  '<tr><td align="left"><b>Total Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].'):</b></td><td></td><td></td><td></td><td><b>'.sprintf('%.2f', $invoice_data["invoice_amt"]).'</b></td></tr>';
                    $pdf4 .=  '</table>';
                    $pdf4 .= '<table border="1" cellspacing="0" cellpadding="5" align="center">';
                    #$pdf4 .=  '<tr><td><b>Conversion Rate : </b> '.$invoice_data["invoice_ex_rate"].' '.$invoice_data["currency"].' <b>Amount : </b>'.$invoice_ex_amt.'</td></tr>';
                    $pdf4 .=  '</table>';
                    $pdf4 .= '<table border="1" cellspacing="0" cellpadding="5" align="center">';
                    $pdf4 .=  '<tr><td><b>Amount : - </b> '.$invoice_data["currency"].' '.strtoupper($this->numtowords($invoice_data["invoice_amt"],$invoice_data["subunit"])).'</td></tr>';
                    $pdf4 .=  '</table>';     
                } else {  
                   $invoice_ex_amt = $invoice_data["invoice_basic_amt"]*$invoice_data["invoice_ex_rate"];
                    if (empty($invoice_data["invoice_tax_amt"])) { $invoice_tax_amt = ''; } else { $invoice_tax_amt = $invoice_data["invoice_tax_amt"]; }
                    $pdf4 .=  '<tr><td align="left"><b>Basic Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].'):</b></td><td></td><td></td><td></td><td></td><td><b>'.$invoice_data["invoice_basic_amt"].'</b></td></tr>';
                    if (!empty($invoice_data["invoice_discount"])) {
                    $pdf4 .=  '<tr><td align="left"><b>Discount Amount (Discount '.$invoice_data["invoice_discount"].'%):</b></td><td></td><td></td><td></td><td></td><td><b>'.sprintf('%.2f', $invoice_data["invoice_discount_amt"]).'</b></td></tr>';
                    }
                    if (!empty($invoice_tax_amt)) {
                    $pdf4 .=  '<tr><td align="left"><b>Tax Amount (VAT '.$invoice_data["invoice_vat_percent"].'%) :</b></td><td></td><td></td><td></td><td></td><td><b>'.$invoice_tax_amt.'</b></td></tr>';
                    }
                    $pdf4 .=  '<tr><td align="left"><b>Total Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].'):</b></td><td></td><td></td><td></td><td></td><td><b>'.sprintf('%.2f', $invoice_data["invoice_amt"]).'</b></td></tr>';
                    $pdf4 .=  '</table>';
                    $pdf4 .= '<table border="1" cellspacing="0" cellpadding="5" align="center">';
                    #$pdf4 .=  '<tr><td><b>Conversion Rate : </b> '.$invoice_data["invoice_ex_rate"].' '.$invoice_data["currency"].' <b>Amount : </b>'.$invoice_ex_amt.'</td></tr>';
                    $pdf4 .=  '</table>';
                    $pdf4 .= '<table border="1" cellspacing="0" cellpadding="5" align="center">';
                    $pdf4 .=  '<tr><td><b>Amount : - </b> '.$invoice_data["currency"].' '.strtoupper($this->numtowords($invoice_data["invoice_amt"],$invoice_data["subunit"])).'</td></tr>';
                    $pdf4 .=  '</table>'; 
                } 
             } else { 
                if ($cargo_discount_flag==0) {

                    $invoice_ex_amt = $invoice_data["invoice_basic_amt"]*$invoice_data["invoice_ex_rate"];
                    if (empty($invoice_data["invoice_tax_amt"])) { $invoice_tax_amt = ''; } else { $invoice_tax_amt = $invoice_data["invoice_tax_amt"]; }
                    $pdf4 .=  '<tr><td align="left"><b>Basic Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].'):</b></td><td></td><td></td><td><b>'.$invoice_data["invoice_basic_amt"].'</b></td></tr>';
                    if (!empty($invoice_data["invoice_discount"])) {
                    $pdf4 .=  '<tr><td align="left"><b>Discount Amount (Discount '.$invoice_data["invoice_discount"].'%):</b></td><td></td><td></td><td><b>'.sprintf('%.2f', $invoice_data["invoice_discount_amt"]).'</b></td></tr>';
                    }
                    if (!empty($invoice_tax_amt)) {
                    $pdf4 .=  '<tr><td align="left"><b>Tax Amount (VAT '.$invoice_data["invoice_vat_percent"].'%) :</b></td><td></td><td></td><td><b>'.$invoice_tax_amt.'</b></td></tr>';
                    }
                    $pdf4 .=  '<tr><td align="left"><b>Total Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].'):</b></td><td></td><td></td><td><b>'.sprintf('%.2f', $invoice_data["invoice_amt"]).'</b></td></tr>';
                    $pdf4 .=  '</table>';
                    $pdf4 .= '<table border="1" cellspacing="0" cellpadding="5" align="center">';
                    #$pdf4 .=  '<tr><td><b>Conversion Rate : </b> '.$invoice_data["invoice_ex_rate"].' '.$invoice_data["currency"].' <b>Amount : </b>'.$invoice_ex_amt.'</td></tr>';
                    $pdf4 .=  '</table>';
                    $pdf4 .= '<table border="1" cellspacing="0" cellpadding="5" align="center">';
                    $pdf4 .=  '<tr><td><b>Amount : - </b> '.$invoice_data["currency"].' '.strtoupper($this->numtowords($invoice_data["invoice_amt"],$invoice_data["subunit"])).'</td></tr>';
                    $pdf4 .=  '</table>';

                } else {

                    $invoice_ex_amt = $invoice_data["invoice_basic_amt"]*$invoice_data["invoice_ex_rate"];
                    if (empty($invoice_data["invoice_tax_amt"])) { $invoice_tax_amt = ''; } else { $invoice_tax_amt = $invoice_data["invoice_tax_amt"]; }
                    $pdf4 .=  '<tr><td align="left"><b>Basic Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].'):</b></td><td></td><td></td><td></td><td><b>'.$invoice_data["invoice_basic_amt"].'</b></td></tr>';
                    if (!empty($invoice_data["invoice_discount"])) {
                    $pdf4 .=  '<tr><td align="left"><b>Discount Amount (Discount '.$invoice_data["invoice_discount"].'%):</b></td><td></td><td></td><td></td><td><b>'.sprintf('%.2f', $invoice_data["invoice_discount_amt"]).'</b></td></tr>';
                    }
                    if (!empty($invoice_tax_amt)) {
                    $pdf4 .=  '<tr><td align="left"><b>Tax Amount (VAT '.$invoice_data["invoice_vat_percent"].'%) :</b></td><td></td><td></td><td></td><td><b>'.$invoice_tax_amt.'</b></td></tr>';
                    }
                    $pdf4 .=  '<tr><td align="left"><b>Total Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].'):</b></td><td></td><td></td><td></td><td><b>'.sprintf('%.2f', $invoice_data["invoice_amt"]).'</b></td></tr>';
                    $pdf4 .=  '</table>';
                    $pdf4 .= '<table border="1" cellspacing="0" cellpadding="5" align="center">';
                    #$pdf4 .=  '<tr><td><b>Conversion Rate : </b> '.$invoice_data["invoice_ex_rate"].' '.$invoice_data["currency"].' <b>Amount : </b>'.$invoice_ex_amt.'</td></tr>';
                    $pdf4 .=  '</table>';
                    $pdf4 .= '<table border="1" cellspacing="0" cellpadding="5" align="center">';
                    $pdf4 .=  '<tr><td><b>Amount : - </b> '.$invoice_data["currency"].' '.strtoupper($this->numtowords($invoice_data["invoice_amt"],$invoice_data["subunit"])).'</td></tr>';
                    $pdf4 .=  '</table>';

                }  
                
             } 
        }

        $pdf = new Pdfinvoice(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Shivaji Dalvi');
            $pdf->SetTitle('Draft Invoice');
            $pdf->SetSubject('Draft Invoice');
            $pdf->SetKeywords('Draft Invoice');

            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            #$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            #$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            // ---------------------------------------------------------

            // set font
            $pdf->SetFont('helvetica', 'B', 12);

            // add a page
            $pdf->AddPage(); 

            #####################################################################
            $pdf->SetLineStyle( array( 'width' => 15, 'color' => array(0,0,0)));
            $pdf->Line(0,0,$pdf->getPageWidth(),0); 
            $pdf->Line($pdf->getPageWidth(),0,$pdf->getPageWidth(),$pdf->getPageHeight());
            $pdf->Line(0,$pdf->getPageHeight(),$pdf->getPageWidth(),$pdf->getPageHeight());
            $pdf->Line(0,0,0,$pdf->getPageHeight());
            $pdf->SetLineStyle( array( 'width' => 14, 'color' => array(255,255,255)));
            $pdf->Line(0,0,$pdf->getPageWidth(),0); 
            $pdf->Line($pdf->getPageWidth(),0,$pdf->getPageWidth(),$pdf->getPageHeight());
            $pdf->Line(0,$pdf->getPageHeight(),$pdf->getPageWidth(),$pdf->getPageHeight());
            $pdf->Line(0,0,0,$pdf->getPageHeight());
            ##################################################################### 

          $pdf->SetFont('helvetica', '', 7);
          
          $content = '<br><br><br>';
          if (!empty($result[0]['invoice_id'])) {
              $content .= '<h3 align="center"><u>Tax Invoice</u></h3><br /><br />';
          } else {
              $content .= '<h3 align="center"><u>Draft Invoice</u></h3><br /><br />';
          }

          $content .= '<br><br><br>';
          $content .= $pdf1;
          
          $content .= '<br><br>';
          $content .= '  
          <h3 align="center"><u>Particulars</u></h3><br /><br />  
          <table border="1" cellspacing="0" cellpadding="5">';  
          #$content .= fetch_data();  
          $content .= $pdf3;
          $content .= '</table>';

          $content .= '<br><br />';
          $content .= $pdf4;

          $pdf->writeHTML($content);  
          $pdf->Output($file_name, 'I');

      } 

    public function index1111()
    {
        
        if (!isset($_SESSION['userId'])) {
          $login = BASE_PATH."login/";
          redirect($login);
        }

        $this->load->library('form_validation');
        $this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Invoice_master');
        $this->load->model('File_master');
        $this->load->model('Unit_master');
        $this->load->model('Client_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $result = $this->Invoice_master->getFileInvoicedata($id);
        //print_r($result);exit;

        if (($result[0]['tax_options']=='VAT') && ($result[0]['invoice_tax_amt']=='')) {
                $redirect_url = BASE_PATH."EditInvoicefileregister?id=".base64_encode($id)."&msg=3";
                redirect($redirect_url);
        }


        $invoice_details = $this->Invoice_master->getInvoiceDetailsdataNew($id);
        #print_r($invoice_details);exit;
        $cargo_group_details = implode(',', array_column($invoice_details, 'cargo_group'));
        #echo $cargo_group_details;exit;
        $cargo_group_arr = explode(",", $cargo_group_details);
        $cargo_group_arr = array_unique($cargo_group_arr);
        #print_r($cargo_group_arr);exit;

        if (in_array("Other", $cargo_group_arr)) {
          #echo "Got Irix";
          if (($key = array_search("Other", $cargo_group_arr)) !== false) {
              unset($cargo_group_arr[$key]);
          }
        }
        //print_r($cargo_group_arr);exit;
        //exit;
        
        $approx_unit = @$invoice_details[0]['approx_unit'];
        //print_r($invoice_details);exit;

        $attention = $this->Client_master->getClientAttentiondetails($result[0]['client_id']);

        $company_details = $this->company_master->getCompanydatabyid($result[0]['user_comp_id']);
        //print_r($company_details);exit;

        $branch_details = $this->branch_master->getBranchdataById($result[0]['user_branch_id']);
        #echo $branch_details['bank_name'];exit;
        //print_r($branch_details);exit;

        $countries = $this->company_master->getCountries();

        $file_options = $this->File_master->getFileOptions();


        $units = $this->Unit_master->getAllUnitdata();

        $currency = $this->Invoice_master->getCurrency();

        $states = $this->company_master->getStates($result[0]['countryid']);
        $cities = $this->company_master->getCities($result[0]['stateid']);

        $data = $company_details;
        $rows = $result;

        $file_title = 'Invoice_'.$result[0]['invoice_no'];
        $file_name = 'Invoice_'.$result[0]['invoice_no'].'.pdf';

       #$logo = ASSETS_PATH.'img/agrilogo269x74.jpg';
        $logo = ASSETS_PATH.'img/logo-big.jpg';

        $pdf = '';
        $pdf2 = '';
        $pdf3 = '';
        $pdf4 = '';
        $pdf5 = '';
        $pdf6 = '';

 
        $pdf9 = '<table width="100%" cellpadding="0" border="0">
          <tr>

              <td width="50%">
                  <table width="100%" border="0">
                      <tr><td><img src="'.$logo.'" alt=""></td></tr>
                  </table>    
              </td>';

          foreach($data as $company_address){  
            if ($result[0]['file_id']<87 && $branch_details['sortname']=='SG') {  
              $pdf9 .= '<td width="50%">
                    <table width="100%" border="0">
                        <tr><td></td></tr>
                        <tr><td></td></tr>
                        <tr><td><b>'.$company_address['name'].'</b></td></tr>
                        <tr><td>'.$branch_details['old_address'].'</td></tr>
                        <tr><td>Phone : +'.$branch_details['country_code'].' '.$branch_details['old_tel_no'].', Email : '.$branch_details['branch_email'].'</td></tr>
                        <tr><td>Registration No. '.$company_address['cin'].'</td></tr>
                    </table>   
                </td>';
            } else {
              $pdf9 .= '<td width="50%">
                    <table width="100%" border="0">
                        <tr><td></td></tr>
                        <tr><td></td></tr>
                        <tr><td><b>'.$company_address['name'].'</b></td></tr>
                        <tr><td>'.$branch_details['address'].'</td></tr>
                        <tr><td>Phone : +'.$branch_details['country_code'].' '.$branch_details['tel_no'].', Email : '.$branch_details['branch_email'].'</td></tr>
                        <tr><td>Registration No. '.$company_address['cin'].'</td></tr>
                    </table>   
                </td>';
            }      

          }    
          $pdf9 .= '</tr>
        </table>';


        $pdf7 = '<table border="0" cellspacing="0" cellpadding="5" align="center">';
        $pdf7 .=  '<tr><td><img src="'.$logo.'" alt=""></td></tr>';
        $pdf7 .=  '</table>';

        foreach($data as $company_address){
            /*$pdf1 = '<table border="0" cellspacing="0" cellpadding="5" align="right">';
            $pdf1 .=  '<tr><td>'.$company_address['name'].'</td></tr>';
            $pdf1 .=  '<tr><td>'.$company_address['address'].'</td></tr>';
            $pdf1 .=  '<tr><td>Phone : +'.$company_address['country_code'].' '.$company_address['telno'].', Email : '.$company_address['email'].'</td></tr>';
            $pdf1 .=  '</table>';*/
            $pdf1 = '<table border="0" cellspacing="0" cellpadding="5" align="center">';
            $pdf1 .=  '<tr><td>'.$company_address['name'].' '.$company_address['address'].'</td></tr>';
            $pdf1 .=  '<tr><td>Phone : +'.$company_address['country_code'].' '.$company_address['telno'].', Email : '.$company_address['email'].'</td></tr>';
            $pdf1 .=  '</table>';
        }  

        foreach($rows as $invoice_data){
          if (!empty($invoice_data['zip_pin_code'])) { $zipcode = $invoice_data['zip_pin_code']; } else { $zipcode = ''; }
          if (!empty($invoice_data['email_address'])) { $email = $invoice_data['email_address']; } else { $email = ''; }
          if (!empty($invoice_data['client_vat'])) { $vat = $invoice_data['client_vat']; } else { $vat = ''; }
          if (!empty($invoice_data['country_code'])) { $ccode = $invoice_data['country_code']; } else { $ccode = ''; }
          if (!empty($invoice_data['tel_no'])) { $ttel = $invoice_data['tel_no']; } else { $ttel = ''; }
          #if (!empty($attention['contact_person_name'])) { $cperson = $attention['contact_person_name']; } else { $cperson = ''; }

          $pdf = '<table width="100%" cellpadding="0" border="0">
          <tr>

              <td width="50%">
                  <table width="100%" border="0" align="left">
                      <tr><td><b>'.$invoice_data['client_name'].'</b></td></tr>
                      <tr><td>'.$invoice_data['address'].'</td></tr>';
              if ($invoice_data['city']=='Singapore') {  } else { $pdf .= '<tr><td>'.$invoice_data['city'].','.$invoice_data['state'].'</td></tr>'; }
              $pdf .= '<tr><td>'.$invoice_data['country'].' - '.$zipcode.'</td></tr>';
              #if (!empty(@$zipcode)) { $pdf .= '<tr><td>Postal Code : '.@$zipcode.'</td></tr>'; }          
              #if (!empty(@$email)) { $pdf .= '<tr><td>Email : '.@$email.'</td></tr>'; }  
              if (!empty(@$vat)) { $pdf .= '<tr><td>VAT No : '.@$vat.'</td></tr>'; }  
              if (!empty(@$ttel)) { $pdf .= '<tr><td>Phone : +'.@$ccode.' '.@$ttel.'</td></tr>'; }         
                      
                  $pdf .= '<tr><td><b>Kind Attention : '.@$invoice_data['kind_attention'].'</b></td></tr>
                  </table>    
              </td>';
           /*$pdf .= '<td width="50%">
                  <table width="100%" border="0" align="right">
                      <tr><td><b>Invoice No : '.$invoice_data['invoice_no'].'</b></td></tr>
                      <tr><td><b>Invoice Date : '.$invoice_data['invoice_date'].'</b></td></tr>
                  </table>   
              </td>';*/
          $pdf .= '</tr>
          </table>';        


          /*$pdf = '<table border="0" cellspacing="0" cellpadding="2" align="left">';
          $pdf .=  '<tr><td><b>'.$invoice_data['client_name'].'</b></td></tr>'; 
          $pdf .=  '<tr><td>'.$invoice_data['address'].'</td></tr>';
          $pdf .=  '<tr><td>'.$invoice_data['city'].','.$invoice_data['state'].','.$invoice_data['country'].'</td></tr>';
          $pdf .=  '<tr><td>Email : '.$invoice_data['email_address'].'</td></tr>';
          $pdf .=  '<tr><td>VAT No : '.$invoice_data['client_vat'].'</td></tr>';
          $pdf .=  '<tr><td>Phone : '.$invoice_data['country_code'].' '.$invoice_data['tel_no'].'</td></tr>';

          $pdf .=  '<tr><td><b>Kind Attention : '.$attention['contact_person_name'].'</b></td></tr>';
          $pdf .=  '</table>';*/

          /*$pdf8 = '<table border="0" cellspacing="0" cellpadding="5" align="right">';
          $pdf8 .=  '<tr><td><strong>Date : '.$invoice_data['invoice_date'].'</strong></td></tr>';
          $pdf8 .=  '</table>';

          $pdf2 = '<table border="0" cellspacing="0" cellpadding="5" align="center">';
          $pdf2 .=  '<tr><td><strong><u>Invoice No. : '.$invoice_data['invoice_no'].'</u></strong></td></tr>';
          $pdf2 .=  '</table>';*/ 

          if (!empty($invoice_data['file_no'])) { $pdf3 .= '<tr><th width="20%"><b>Job No</b></th><th width="80%">'.$invoice_data['file_no'].'</th></tr>'; }
          if (!empty($invoice_data['scope_work']) && ($invoice_data['file_no_type'])=='Inspection') { $pdf3 .= '<tr><th width="20%"><b>Scope Of Work</b></th><th width="80%">'.$invoice_data['scope_work'].'</th></tr>'; }
          if (!empty($invoice_data['warehouse']) && ($invoice_data['file_no_type'])=='Inspection') { $pdf3 .= '<tr><th width="20%"><b>Warehouse</b></th><th width="80%">'.$invoice_data['warehouse'].'</th></tr>'; }
          if (!empty($invoice_data['vessel_name'])) { $pdf3 .= '<tr><th width="20%"><b>Vessel</b></th><th width="80%">'.$invoice_data['vessel_name'].'</th></tr>'; }
          #if (!empty($invoice_data['voyage_no'])) { $pdf3 .= '<tr><th><b>Voyage No</b></th><th>'.$invoice_data['voyage_no'].'</th></tr>'; }
          #if (!empty($invoice_data['cargo_group'])) { $pdf3 .= '<tr><th><b>Cargo Group</b></th><th>'.$invoice_data['cargo_group'].'</th></tr>'; }
          if (!empty($invoice_data['cargo_master'])) { $pdf3 .= '<tr><th><b>Commodity</b></th><th>'.$invoice_data['cargo_master'].'</th></tr>'; }
          #if (!empty($invoice_data['packing'])) { $pdf3 .= '<tr><th><b>Packing</b></th><th>'.$invoice_data['packing'].'</th></tr>'; }
          #if (!empty($invoice_data['packing_desc'])) { $pdf3 .= '<tr><th><b>Packing Desc</b></th><th>'.$invoice_data['packing_desc'].'</th></tr>'; }
          if (!empty($invoice_data['approx_qty'])) { $pdf3 .= '<tr><th><b>Quantity / Unit</b></th><th>'.$invoice_data['approx_qty'].' '.$approx_unit.'</th></tr>'; }
          #if (!empty($invoice_data['file_ins'])) { $pdf3 .= '<tr><th><b>File Instructions</b></th><th>'.$invoice_data['file_ins'].'</th></tr>'; }
          #if (!empty($invoice_data['place'])) { $pdf3 .= '<tr><th><b>Place Of Attendance</b></th><th>'.$invoice_data['place'].'</th></tr>'; }
          #if (!empty($invoice_data['origin'])) { $pdf3 .= '<tr><th><b>Origin</b></th><th>'.$invoice_data['origin'].'</th></tr>'; }
          if (!empty($invoice_data['load_port'])) { $pdf3 .= '<tr><th><b>Load Port</b></th><th>'.$invoice_data['load_port'].'</th></tr>'; }
          if (!empty($invoice_data['discharge_port'])) { $pdf3 .= '<tr><th><b>Discharge Port</b></th><th>'.$invoice_data['discharge_port'].'</th></tr>'; }
          if (!empty($invoice_data['invoice_desc'])) { $pdf3 .= '<tr><th><b>File Instructions</b></th><th>'.$invoice_data['invoice_desc'].'</th></tr>'; }
          #if (!empty($invoice_data['invoice_remarks'])) { $pdf3 .= '<tr><th><b>Subject</b></th><th>'.substr($invoice_data['invoice_remarks'],0,200).'</th></tr>'; }
          #if (!empty($invoice_data['invoice_date'])) { $pdf3 .= '<tr><th><b>Inspection Date</b></th><th>'.$invoice_data['inspection_start_date'].' To '.$invoice_data['inspection_end_date'].'</th></tr>'; }
          if (!empty($invoice_data['inspection_date'])) { $pdf3 .= '<tr><th><b>Inspection Date</b></th><th>'.$invoice_data['inspection_date'].'</th></tr>'; }
          if (!empty($invoice_data['bill_lading_no'])) { $pdf3 .= '<tr><th><b>Bill of Lading Number</b></th><th>'.$invoice_data['bill_lading_no'].'</th></tr>'; }
          if (!empty($invoice_data['bill_lading_no'])) { $pdf3 .= '<tr><th><b>Bill of Lading Date</b></th><th>'.$invoice_data['bill_lading_date'].'</th></tr>'; }


          $pdf4 = '<br>';
          $pdf4 = '<table border="1" cellspacing="0" cellpadding="5" align="center">';
          #$pdf4 .=  '<tr><td width="50%"><b>Work Item</b></td><td width="10%"><b>Quantity</b></td><td width="10%"><b>Unit</b></td><td width="10%"><b>Rate</b></td><td width="20%"><b>Amount</b></td></tr>';
          #if (!empty(@$invoice_details[0]['cargo_group'])) { 
          if (count($cargo_group_arr)>1) {
          $pdf4 .=  '<tr><td><b>Cargo Group</b></td><td width="30%"><b>Invoice Details</b></td><td width="15%"><b>Quantity</b></td><td width="15%"><b>Rate ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].')</b></td><td width="20%"><b>Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].')</b></td></tr>';
          } else {
          $pdf4 .=  '<tr><td width="50%"><b>Invoice Details</b></td><td width="15%"><b>Quantity</b></td><td width="15%"><b>Rate ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].')</b></td><td width="20%"><b>Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].')</b></td></tr>';  
          }
          

          $row_invoice = $invoice_details;
          foreach($row_invoice as $invoicedetails){  
              #$pdf4 .=  '<tr><td>'.$invoicedetails["work_type"].'</td><td>'.$invoicedetails["approx_qty"].'</td><td>'.$invoicedetails["approx_unit"].'</td><td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>';

            #if (!empty($invoicedetails['work_prefix'])) { $pdf4 .=  '<tr><td align="left">'.$invoicedetails["work_prefix"].') '.$invoicedetails["work_type"].'</td><td>'.$invoicedetails["approx_qty"].' '.$invoicedetails["approx_unit"].'</td>
            #if (!empty($invoicedetails['cargo_group'])) {

            if ($invoicedetails["approx_unit"]=='NONE') { $invoicedetails["approx_unit"] = ''; }
            if (count($cargo_group_arr)>1) { 
            if ($invoicedetails['cargo_group']=='Other') {$invoicedetails["cargo_group"] = '';}
            if (!empty($invoicedetails['work_prefix'])) { $pdf4 .=  '<tr><td align="left">'.$invoicedetails["cargo_group"].'</td><td align="left">'.$invoicedetails["work_type"].'</td><td>'.$invoicedetails["approx_qty"].' '.$invoicedetails["approx_unit"].'</td>
            <td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>'; } else { $pdf4 .=  '<tr><td align="left">&nbsp;&nbsp;&nbsp;'.$invoicedetails["work_prefix"].' '.$invoicedetails["work_type"].'</td><td>'.$invoicedetails["approx_qty"].' '.$invoicedetails["approx_unit"].'</td>
            <td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>';        }
            } else {
              if (!empty($invoicedetails['work_prefix'])) { $pdf4 .=  '<tr><td align="left">'.$invoicedetails["work_type"].'</td><td>'.$invoicedetails["approx_qty"].' '.$invoicedetails["approx_unit"].'</td>
            <td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>'; } else { $pdf4 .=  '<tr><td align="left">&nbsp;&nbsp;&nbsp;'.$invoicedetails["work_prefix"].' '.$invoicedetails["work_type"].'</td><td>'.$invoicedetails["approx_qty"].' '.$invoicedetails["approx_unit"].'</td>
            <td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>';        }
            }

            /*$pdf4 .=  '<tr><td>'.$invoicedetails["work_prefix"].' '.$invoicedetails["work_type"].'</td><td>'.$invoicedetails["approx_qty"].'</td>
            <td>'.$invoicedetails["invoice_work_rate"].'</td><td>'.$invoicedetails["invoice_work_amount"].'</td></tr>';*/
          }
              
              #if (!empty(@$invoice_details[0]['cargo_group'])) {
              if (count(@$cargo_group_arr)>1) { 
              $invoice_ex_amt = $invoice_data["invoice_basic_amt"]*$invoice_data["invoice_ex_rate"];
              if (empty($invoice_data["invoice_tax_amt"])) { $invoice_tax_amt = ''; } else { $invoice_tax_amt = $invoice_data["invoice_tax_amt"]; }
              $pdf4 .=  '<tr><td align="left"><b>Basic Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].'):</b></td><td></td><td></td><td></td><td><b>'.$invoice_data["invoice_basic_amt"].'</b></td></tr>';
              if (!empty($invoice_tax_amt)) {
              $pdf4 .=  '<tr><td align="left"><b>Tax Amount (VAT '.$invoice_data["invoice_vat_percent"].'%) :</b></td><td></td><td></td><td></td><td><b>'.$invoice_tax_amt.'</b></td></tr>';
              }
              $pdf4 .=  '<tr><td align="left"><b>Total Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].'):</b></td><td></td><td></td><td></td><td><b>'.sprintf('%.2f', $invoice_data["invoice_amt"]).'</b></td></tr>';
              $pdf4 .=  '</table>';
              $pdf4 .= '<table border="1" cellspacing="0" cellpadding="5" align="center">';
              #$pdf4 .=  '<tr><td><b>Conversion Rate : </b> '.$invoice_data["invoice_ex_rate"].' '.$invoice_data["currency"].' <b>Amount : </b>'.$invoice_ex_amt.'</td></tr>';
              $pdf4 .=  '</table>';
              $pdf4 .= '<table border="1" cellspacing="0" cellpadding="5" align="center">';
              $pdf4 .=  '<tr><td><b>Amount : - </b> '.$invoice_data["currency"].' '.strtoupper($this->numtowords($invoice_data["invoice_amt"],$invoice_data["subunit"])).'</td></tr>';
              $pdf4 .=  '</table>';
             } else {
              $invoice_ex_amt = $invoice_data["invoice_basic_amt"]*$invoice_data["invoice_ex_rate"];
              if (empty($invoice_data["invoice_tax_amt"])) { $invoice_tax_amt = ''; } else { $invoice_tax_amt = $invoice_data["invoice_tax_amt"]; }
              $pdf4 .=  '<tr><td align="left"><b>Basic Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].'):</b></td><td></td><td></td><td><b>'.$invoice_data["invoice_basic_amt"].'</b></td></tr>';
              if (!empty($invoice_tax_amt)) {
              $pdf4 .=  '<tr><td align="left"><b>Tax Amount (VAT '.$invoice_data["invoice_vat_percent"].'%) :</b></td><td></td><td></td><td><b>'.$invoice_tax_amt.'</b></td></tr>';
              }
              $pdf4 .=  '<tr><td align="left"><b>Total Amount ('.$invoice_data["sortname"].' '.$invoice_data["symbol"].'):</b></td><td></td><td></td><td><b>'.sprintf('%.2f', $invoice_data["invoice_amt"]).'</b></td></tr>';
              $pdf4 .=  '</table>';
              $pdf4 .= '<table border="1" cellspacing="0" cellpadding="5" align="center">';
              #$pdf4 .=  '<tr><td><b>Conversion Rate : </b> '.$invoice_data["invoice_ex_rate"].' '.$invoice_data["currency"].' <b>Amount : </b>'.$invoice_ex_amt.'</td></tr>';
              $pdf4 .=  '</table>';
              $pdf4 .= '<table border="1" cellspacing="0" cellpadding="5" align="center">';
              $pdf4 .=  '<tr><td><b>Amount : - </b> '.$invoice_data["currency"].' '.strtoupper($this->numtowords($invoice_data["invoice_amt"],$invoice_data["subunit"])).'</td></tr>';
              $pdf4 .=  '</table>';
             }

           #echo $this->numtowords($invoice_data["invoice_amt"]);exit;    

          /*$pdf4 .= '<table border="1" cellspacing="0" cellpadding="5">
                              <thead>
                              <tr>
                                <th>
                                   Work Item
                                </th>
                                <th>
                                   Approx QTY
                                </th>
                                <th>
                                   Approx Unit
                                </th>
                                <th>
                                   Rate
                                </th>
                                <th>
                                   Amount
                                </th>
                              </tr>
                              </thead>
                              <tbody>';
              
            
             $rows1 = $invoice_details;
             foreach($rows1 as $invoicedetails){  

              $rows2 = $file_options;
              foreach($rows2 as $fileoptions){ 
                  if ($invoicedetails["work_type"] == $fileoptions["id"]) {
                    $pdf4 .= '<tr><td>'.$fileoptions["name"].'</td>';
                  }
              }

              $pdf4 .= '<td>'.$invoicedetails["approx_qty"].'</td>';

              $rows3 = $units; 
              foreach($rows3 as $units_rec){ 
                if ($invoicedetails["approx_unit"] == $units_rec["id"]) {
                  $pdf4 .= '<td>'.$units_rec["unit_name"].'</td>';
                }

              }   
              $pdf4 .= '<td>'.$invoicedetails["invoice_work_rate"].'</td>';
              $pdf4 .= '<td>'.$invoicedetails["invoice_work_amount"].'</td>';
              $pdf4 .= '</tr>';
            }
             
            $pdf4 .= '<tr><td>Tax Amount (VAT) :</td>';
            $pdf4 .= '<td></td>';
            $pdf4 .= '<td></td>';
            $pdf4 .= '<td></td>';
            $pdf4 .= '<td>'.$invoice_data["invoice_tax_amt"].'</td>'; 
            $pdf4 .= '</tr>';

            $pdf4 .= '<tr><td>Total Amount :</td>';
            $pdf4 .= '<td></td>';
            $pdf4 .= '<td></td>';
            $pdf4 .= '<td></td>';
            $pdf4 .= '<td>'.$invoice_data["invoice_amt"].'</td>'; 
            $pdf4 .= '</tr>'; 

             $pdf4 .= '</tbody>
                       </table>';*/


             $pdf5 = '<table border="0" cellspacing="0" cellpadding="2" align="left">';
             $pdf5 .=  '<tr><td><b><u>Payment Terms : Within 30 Days Upon Receipt Of Invoice</u></b></td></tr>';
             $pdf5 .=  '</table>';

             /*$pdf6 .= '<table border="0" cellspacing="0" cellpadding="2" width="75%">'; 
             $rows = $company_details;
             foreach($rows as $company_details){ 
             $pdf6 .=  '<tr><td>Account : </td><td>'.@$company_details["bank_account_name"].'</td></tr>';  
             $pdf6 .=  '<tr><td>Account No : </td><td>'.@$company_details["bank_account_no"].'</td></tr>'; 
             $pdf6 .=  '<tr><td>Address : </td><td>'.@$company_details["bank_address"].'</td></tr>';
             $pdf6 .=  '<tr><td>Beneficiary : </td><td>'.@$company_details["bank_beneficiary"].'</td></tr>';
             $pdf6 .=  '<tr><td>IBAN : </td><td>'.@$company_details["iban"].'</td></tr>';
             $pdf6 .=  '<tr><td>BIC : </td><td>'.@$company_details["bic"].'</td></tr>';
             }     
             $pdf6 .= '</table>';*/

             $pdf11 = '<table border="0" cellspacing="0" cellpadding="0" align="right">';
             $pdf11 .=  '<tr><td></td></tr>';
             $pdf11 .=  '<tr><td></td></tr>';
             $pdf11 .=  '<tr><td></td></tr>';
             $pdf11 .=  '<tr><td></td></tr>';
             $pdf11 .=  '<tr><td></td></tr>';
             $pdf11 .=  '<tr><td><b><u>Authorized signatory</u></b></td></tr>';
             $pdf11 .=  '</table>';             
             
            #$rows = $branch_details;
            #foreach($rows as $branch_details){ 
            $pdf6 = '<table width="100%" cellpadding="0" border="0">
            <tr>

              <td width="80%">
                  <table width="100%" border="0" align="left">
                      <tr><td>ACCOUNT : </td><td>'.@$branch_details['bank_name'].'</td></tr>
                      <tr><td>ACCOUNT NO : </td><td>'.@$branch_details["bank_account_no"].'</td></tr>
                      <tr><td>ADDRESS : </td><td>'.@$branch_details["bank_address"].'</td></tr>
                      <tr><td>BENEFICIARY : </td><td>'.@$branch_details['bank_beneficiary'].'</td></tr>
                      <tr><td>IBAN : </td><td>'.@$branch_details['iban'].'</td></tr>
                      <tr><td>BIC : </td><td>'.@$branch_details['bic'].'</td></tr>  
                      <tr><td>VAT No : </td><td>'.@$branch_details['vat_no'].'</td></tr> 
                      <tr><td>Clearing No : </td><td>'.@$branch_details['bank_cleaing_no'].'</td></tr>
                      <tr><td>Reference : </td><td>'.@$result[0]['file_no'].'</td></tr>';                    
                      //<tr><td>BANK BRANCH : </td><td>'.@$branch_details['bank_branch_name'].'</td></tr>
                      //<tr><td>OCBC BANK CODE : </td><td>'.@$branch_details["ifsc_code"].'</td></tr>                      
                      //<tr><td>SWIFT BIC CODE : </td><td>'.@$branch_details["bic"].'</td></tr>';
                      
                  #$pdf6 .= '<tr><td>ACCOUNT NO : </td><td>'.@$branch_details["bank_account_no"].'</td></tr>
                  $pdf6 .= '</table>    
              </td>';
           /*$pdf6 .= '<td width="70%">
                  <table width="80%" border="0" align="left">
                      <tr><td>ADDRESS : </td><td>'.@$branch_details["bank_address"].'</td></tr>
                      <tr><td>SWIFT BIC CODE : </td><td>'.@$branch_details["bic"].'</td></tr>
                  </table>   
              </td>';*/
          $pdf6 .= '</tr>
          </table>'; 
          #} 
          $pdf10 = '<table border="1" cellspacing="0" cellpadding="2" align="center">';
          $pdf10 .=  '<tr><td><font size="6">THIS COMPANY TRADES UNDER THE AGRIMIN CONTROL INTERNATIONAL, TERMS AND CONDITIONS OF BUSINESS COPIES AVAILABLE ON REQUEST</font></td></tr>';
          $pdf10 .=  '</table>';
           

   
        }  
                
        require('tcpdf/tcpdf.php');
          $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
          $obj_pdf->SetCreator(PDF_CREATOR);  
          $obj_pdf->SetTitle($file_title);  
          $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
          $obj_pdf->SetFooterData('222', 0, '111', 'Footer');
          $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
          $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
          $obj_pdf->SetDefaultMonospacedFont('helvetica');  
          $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
          $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
          $obj_pdf->setPrintHeader(false);  
          $obj_pdf->setPrintFooter(false);  
          $obj_pdf->SetAutoPageBreak(TRUE, 10);  
          $obj_pdf->SetFont('helvetica', '', 7);  
          $obj_pdf->AddPage();

          #$obj_pdf->SetLineStyle( array( 'width' => 2, 'color' => array(0,0,0)));
          #$obj_pdf->Rect(0, 0, $obj_pdf->getPageWidth(), $obj_pdf->getPageHeight());

          $obj_pdf->SetLineStyle( array( 'width' => 15, 'color' => array(0,0,0)));
          $obj_pdf->Line(0,0,$obj_pdf->getPageWidth(),0); 
          $obj_pdf->Line($obj_pdf->getPageWidth(),0,$obj_pdf->getPageWidth(),$obj_pdf->getPageHeight());
          $obj_pdf->Line(0,$obj_pdf->getPageHeight(),$obj_pdf->getPageWidth(),$obj_pdf->getPageHeight());
          $obj_pdf->Line(0,0,0,$obj_pdf->getPageHeight());
          $obj_pdf->SetLineStyle( array( 'width' => 14, 'color' => array(255,255,255)));
          $obj_pdf->Line(0,0,$obj_pdf->getPageWidth(),0); 
          $obj_pdf->Line($obj_pdf->getPageWidth(),0,$obj_pdf->getPageWidth(),$obj_pdf->getPageHeight());
          $obj_pdf->Line(0,$obj_pdf->getPageHeight(),$obj_pdf->getPageWidth(),$obj_pdf->getPageHeight());
          $obj_pdf->Line(0,0,0,$obj_pdf->getPageHeight());

          $content = ''; 

          #$content .= '<br>';
          #$content .= '<br>';
          $content .= $pdf9;
          #$content .= '<center><img src="'.$logo.'" alt=""></center>'; 
          ####$content .= $pdf7;
          $content .= '<h3 align="center"><u>Draft Invoice</u></h3><br /><br />';  


          #$content .= '<br>';
          #$content .= '<br>';
          #$content .= '<br>';
          ####$content .= $pdf1;
          
          #$content .= '<br>';
          #$content .= '<br>';
          #$content .= '<br>';
          $content .= $pdf;

          #$content .= '<br>';
          #$content .= $pdf8;

          #$content .= '<br>';
          #$content .= '<br>';
          #$content .= $pdf2;

          #$content .= '<br>';
          #$content .= '<br>';
          $content .= '  
          <h3 align="center"><u>Particulars</u></h3><br /><br />  
          <table border="1" cellspacing="0" cellpadding="5">';  
          #$content .= fetch_data();  
          $content .= $pdf3;
          $content .= '</table>';

          $content .= '<h3 align="center"><u>Invoice Details</u></h3><br /><br />';
          #$content .= '<br>';
          $content .= $pdf4;
   
          #$content .= '<br>';
          #$content .= '<br>';
          $content .= $pdf5;
          $content .= '<br>';

          #$content .= '<br>';
          #$content .= '<br>';
          $content .= $pdf11;
          $content .= '<br>';
          $content .= '<br>';
          $content .= '<h3 align="left"><u>Bank Details</u></h3><br /><br />';
          $content .= '<br>';
          $content .= $pdf6;

          $content .= '<br>';
          $content .= '<br>';
          $content .= $pdf10;

          $obj_pdf->writeHTML($content);  
          $obj_pdf->Output($file_name, 'I'); 
    
    }

    public function numtowords($number,$subunit){ 
           $no = floor($number);
           $point = round($number - $no, 2) * 100;
           $hundred = null;
           $digits_1 = strlen($no);
           $i = 0;
           $str = array();
           $words = array('0' => '', '1' => 'one', '2' => 'two',
            '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
            '7' => 'seven', '8' => 'eight', '9' => 'nine',
            '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
            '13' => 'thirteen', '14' => 'fourteen',
            '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
            '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
            '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
            '60' => 'sixty', '70' => 'seventy',
            '80' => 'eighty', '90' => 'ninety');
           $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
           while ($i < $digits_1) {
             $divider = ($i == 2) ? 10 : 100;
             $number = floor($no % $divider);
             $no = floor($no / $divider);
             $i += ($divider == 10) ? 1 : 2;
             if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                #$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' ' : null;
                $str [] = ($number < 21) ? $words[$number] .
                    " " . $digits[$counter] . $plural . " " . $hundred
                    :
                    $words[floor($number / 10) * 10]
                    . " " . $words[$number % 10] . " "
                    . $digits[$counter] . $plural . " " . $hundred;
             } else $str[] = null;
          }
          $str = array_reverse($str);
          $result = implode('', $str);
          /*$points = ($point) ?
            "." . $words[$point / 10] . " " . 
                  $words[$point = $point % 10] : '';*/
                 
            $points = ($point) ?
                  #$words[$point / 10] . " " . 
                  $words[floor($point / 10) * 10] . " " .
                  $words[$point = $point % 10] : '';      
                  
          #$result . "Rupees  " . $points . " Paise";
          if (!empty($points)) { return $result . "and  " . $points . " ".$subunit. "s Only"; } else { return $result. "Only";}        
                 

} 


    

}

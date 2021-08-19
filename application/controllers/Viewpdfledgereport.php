<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewpdfledgereport extends CI_Controller {

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

		$this->load->model('company_master');
		$this->load->model('branch_master');
		$this->load->model('Vendor_master');
		$this->load->model('User_master');

		//$ledger_from_date = '22-03-2021';
		//$ledger_to_date = '22-03-2021';
		#echo '111';exit;
		//print_r($_SESSION);exit;
		//print_r($_GET);exit;

		$company_details = $this->company_master->getCompanydatabyid($_SESSION['comp_id']);
        //print_r($company_details);exit;

    $branch_details = $this->branch_master->getBranchdataById($_SESSION['branch_id']);

		$result = $this->Vendor_master->getAllAccountledgerSearch($_GET); //getAllAccountledger
		//print_r($result);exit;

	    $count = $this->Vendor_master->getAllledgerreportCount();
        //print_r($count);exit;
        $vendortot_arr = array();
        foreach ($count as $key => $value) {
        	$vendortot_arr[$value['vendor_name']] = $value['count'];
        }
        //print_r($vendortot_arr);exit;	

		$ledger_details = array();
		foreach ($result as $key => $value) {
			@$ledger_details[$value['vendor_id']]['vendor_name'] = $value['vendor'];
			if ($value['ledger_type']=='Credit') {;
				@$ledger_details[$value['vendor_id']]['credit_amount']+= @$value['ledger_amount'];
			}
			if ($value['ledger_type']=='Debit') {
				@$ledger_details[$value['vendor_id']]['debit_amount']+= @$value['ledger_amount'];
			}
			@$ledger_details[$value['vendor_id']]['balance_amount'] = abs(@$ledger_details[$value['vendor_id']]['credit_amount'] - @$ledger_details[$value['vendor_id']]['debit_amount']);
		}
		//print_r($ledger_details);exit;
		$ledger_info = array();
		//$i = 0;
		foreach ($result as $k => $v) {
			$ledger_info[$v['vendor_name']][$k] = $v;
		}
		#$ledger_info_name = $ledger_info;	
		//print_r($ledger_info);exit;

		$pdf1 = '';
		#$pdf1 .= '<table border="1" cellspacing="0" cellpadding="5">';
		#$pdf1 .= '<tr><td>Date</td><td>Number</td><td>Narration</td><td>Credit</td><td>Debit</td><td>Running Balances</td></tr>';
		#$pdf1 .= '</table>';
		#$pdf1 .= '<table border="1" cellspacing="0" cellpadding="5">';

        //$vendortot_arr = array("1"=>3,"2"=>1);
        //print_r($vendortot_arr);exit;
		$vendor_arr = array();
		$i=0;
		#echo $ledger_info[1][0]['vendor'];exit;
		#foreach ($ledger_info as $ledger_data) {	
		foreach ($ledger_info as $ledger_key=>$ledger_data) {
			//$pdf1 .= '<table border="0" cellspacing="0" cellpadding="0">';
			//$pdf1 .= '<tr><td>cvcxvcvxc</td></tr>';
			//$pdf1 .= '</table>';
			$pdf1 .= '<table border="1" cellspacing="0" cellpadding="5">';
			$pdf1 .= '<tr><td>Date</td><td>Number</td><td>ACI-Invoice No</td><td>ACI-Invoice Amount</td><td>Narration</td><td>Credit</td><td>Debit</td><td>Running Balances</td></tr>';
			foreach ($ledger_data as $p=>$q) {
				if (!in_array(@$q["vendor"],$vendor_arr)) { $j=0;
				$pdf1 .= '<tr><td>'.@$q["vendor"].'</td><td></td><td>Opening Balance</td><td></td><td></td><td>0.00 Dr.</td></tr>';
				}
				$pdf1 .= '<tr><td>'.date('d-m-Y',strtotime($q["vendor_date"])).'</td><td>'.$q["ledger_number"].'</td><td>'.$q["invoice_no"].'</td><td>'.$q["invoice_amt"].'</td><td>'.$q["narration"].'</td><td>'.$q["credit_amount"].'</td><td>'.$q["debit_amount"].'</td><td>'.@$q["balance_amount"].'</td></tr>';
				if ($vendortot_arr[$q["vendor_id"]]==$j+1) {
				$pdf1 .= '<tr><td></td><td></td><td>Total Closing Balance</td><td>'.@$ledger_details[$q["vendor_id"]]['credit_amount'].'</td><td>'.@$ledger_details[$q["vendor_id"]]['debit_amount'].'</td><td>'.@$ledger_details[$q["vendor_id"]]['balance_amount'].' Dr.</td></tr>';
				}
				array_push($vendor_arr,@$q["vendor"]);
				$vendor_arr = array_unique($vendor_arr);
				$j++;
			}	
			$pdf1 .= '</table>';
			$pdf1 .= '<br><br><br>';
		}
		#$i=$j;		
      	#$pdf1 .= '</table>';


      	//echo $pdf1;exit;

		$pdf = new PdfLedger(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Shivaji Dalvi');
        $pdf->SetTitle('Ledger_Report');
        $pdf->SetSubject('Ledger_Report');
        $pdf->SetKeywords('Ledger_Report');

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

      if ($_SESSION['country_code']=='CH') {
      $logo = BASE_PATH.'/assets/img/logo-ch.jpg';
      $pdf9 = '<table width="100%" cellpadding="0" border="0">
          <tr><td><img src="'.$logo.'" alt=""></td></tr></table>';

      } else {  
      $logo = ASSETS_PATH.'img/logo-big.jpg';
      $pdf9 = '<table width="100%" cellpadding="0" border="0">
          <tr>

              <td width="50%">
                  <table width="100%" border="0">
                      <tr><td><img src="'.$logo.'" alt=""></td></tr>
                  </table>    
              </td>';

          foreach($company_details as $company_address){  
              $pdf9 .= '<td width="50%">
                    <table width="100%" border="0">
                        <tr><td><b>'.$company_address['name'].'</b></td></tr>
                        <tr><td>'.$branch_details['old_address'].'</td></tr>
                        <tr><td>Phone : +'.$branch_details['country_code'].' '.$branch_details['old_tel_no'].', Email : '.$branch_details['branch_email'].'</td></tr>
                        <tr><td>Registration No. '.$company_address['cin'].'</td></tr>
                    </table>   
                </td>'; 

          }    
          $pdf9 .= '</tr>
        </table>';
        }

        $pdf7 = '<table border="0" cellspacing="0" cellpadding="5" align="center">';
        $pdf7 .=  '<tr><td><img src="'.$logo.'" alt=""></td></tr>';
        $pdf7 .=  '</table>';

      $content = '';
      $content .= $pdf9;
      /*$content .= '  
          <h2 align="center"><u>Agrimin Control International</u></h2>';*/ 
      if (!empty($_GET['ledger_from_date'])|| !empty($_GET['ledger_to_date'])) { 
        $content .= '  
          <h3 align="center">Ledger for the period "'.$_GET['ledger_from_date'].'" to "'.$_GET['ledger_to_date'].'"</h3>';
      } else { 
        $content .= '  
          <h3 align="center">Ledger for the Selected All period </h3>';
      } 

      $content .= '<br><br><br><br><br><br><br /><br /><br /><br /><br /><br />';
      $content .= '<table border="0" cellspacing="0" cellpadding="5">';

      $pdf->SetFont('helvetica', '', 9);
      #$content .= '<tr><td width="20%">Group : Assets</td><td width="60%">Account Selection : Selected transacted Accounts</td><td width="20%">(All amounts in $.)</td></tr>';
      $content .= '<tr><td width="20%"></td><td width="60%"></td><td width="20%">(All amounts in $.)</td></tr>';
      $content .= '</table>';

      $content .= '<br><br>';
      #$content .= '<table border="1" cellspacing="0" cellpadding="5">';
      #$content .= '<tr><td>Date</td><td>Number</td><td>Narration</td><td>Credit</td><td>Debit</td><td>Running Balances</td></tr>';
      $content .= $pdf1;
      #$content .= '</table>';
        
      $pdf->writeHTML($content);  
      $pdf->Output('Ledger_Report.pdf', 'I');      
	}
	
}

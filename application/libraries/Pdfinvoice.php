<?php
/*
* Author: onlinecode
* start Pdf.php file
* Location: ./application/libraries/Pdf.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdfinvoice extends TCPDF
{
    protected $processId = 0;
    protected $header = '';
    protected $footer = '';
    static $errorMsg = '';
    protected $last_page_flag = false;

    function __construct()
    {
        parent::__construct();
        
    }

    public function Close() {
      $this->last_page_flag = true;
      parent::Close();
    }

    //Page header
    public function Header() {
        //print_r($_SESSION);exit;

        $CI =& get_instance();
        $CI->load->model('branch_master');
        $CI->load->model('company_master');
        $CI->load->model('Invoice_master');

        $id = base64_decode($_GET['id']);

        $result = $CI->Invoice_master->getFileInvoicedata($id);
        //print_r($result);exit;
        $company_details = $CI->company_master->getCompanydatabyid($result[0]['user_comp_id']);
        $branch_details = $CI->branch_master->getBranchdataById($_SESSION['branch_id']);
        $data = $company_details;

        // Logo
        if ($_SESSION['country_code']=='CH') {
           if ($result[0]['file_id']>778) {
              $image_file = BASE_PATH.'/assets/img/logo-ch7.jpg';
           } else if ($result[0]['file_id']>529) {
              $image_file = BASE_PATH.'/assets/img/logo-ch3.jpg';
           } else {
              $image_file = BASE_PATH.'/assets/img/logo-ch.jpg';
           }   

           //$image_file = BASE_PATH.'/assets/img/logo-ch.jpg'; 
           $this->Image($image_file, 30, 10, 151, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
                   // Set font
           $this->SetFont('helvetica', 'B', 20);
           $this->writeHTMLCell($w='', $h='', $x='', $y='', $this->header, $border=0, $ln=0, $fill=0, $reseth=true, $align='L', $autopadding=true);
        } else {
           $logo = BASE_PATH.'/assets/img/logo-big.jpg';
           #$this->Image($image_file, 15, 10, '', '', 'JPG', '', 'T', false, '', '', false, false, 0, false, false, false);
               $pdf9 = '<table width="100%" cellpadding="0" border="0">
              <tr>

                  <td width="50%">
                      <table width="100%" border="0">
                          <tr><td></td></tr>
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
            $this->SetFont('helvetica', '', 7);
            $this->writeHTMLCell($w='', $h='', $x='', $y='11', $pdf9, $border=0, $ln=0, $fill=0, $reseth=true, $align='L', $autopadding=true);
        }
        
        
        // Title
        //$this->Cell(10, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        //$this->SetTopMargin(30);

        $this->SetLineStyle( array( 'width' => 0.40, 'color' => array(0, 0, 0)));

        $this->Line(5, 5, $this->getPageWidth()-5, 5); 

        $this->Line($this->getPageWidth()-5, 5, $this->getPageWidth()-5,  $this->getPageHeight()-5);
        $this->Line(5, $this->getPageHeight()-5, $this->getPageWidth()-5, $this->getPageHeight()-5);
        $this->Line(5, 5, 5, $this->getPageHeight()-5);

    }

     public function Header222() { 
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $image_file = APP_PATH.'/assets/img/logo_bg.jpg'; 
        $this->Image($image_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }

    // Page footer
    public function Footerorg() {
        // Position at 15 mm from bottom
        //print_r($_SESSION);exit;
        $CI =& get_instance();
        $CI->load->model('branch_master');

        $terms = '<table border="0" cellspacing="0" cellpadding="2" align="center">';
        $terms .=  '<tr><td><b><u>Payment Terms : Within 30 Days Upon Receipt Of Invoice</u></b></td></tr>';
        $terms .=  '</table>';
        $this->SetY(-90);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        #$this->Cell(0, 0, $branch_address, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->writeHTML($terms, true, false, true, false, '');

        $authsign = '<table border="0" cellspacing="0" cellpadding="0" align="right">';
        $authsign .=  '<tr><td></td></tr>';
        $authsign .=  '<tr><td></td></tr>';
        $authsign .=  '<tr><td></td></tr>';
        $authsign .=  '<tr><td></td></tr>';
        $authsign .=  '<tr><td></td></tr>';
        $authsign .=  '<tr><td><b><u>Authorized signatory</u></b></td></tr>';
        $authsign .=  '</table>';
        $this->writeHTML($authsign, true, false, true, false, '');

        $branch_details = $CI->branch_master->getBranchdataById($_SESSION['branch_id']);
        $pdf6 = '<h3 align="left"><u>Bank Details</u></h3><br /><br />';

        $pdf6 .= '<table width="100%" cellpadding="0" border="0">
            <tr>

              <td width="80%">
                  <table width="100%" border="0" align="left">
                      <tr><td>ACCOUNT : </td><td>'.@$branch_details['bank_name'].'</td></tr>
                      <tr><td>ACCOUNT NO : </td><td>'.@$branch_details["bank_account_no"].'</td></tr>
                      <tr><td>ADDRESS : </td><td>'.@$branch_details["bank_address"].'</td></tr>
                      <tr><td>BENEFICIARY : </td><td>'.@$branch_details['bank_beneficiary'].'</td></tr>
                      <tr><td>IBAN : </td><td>'.@$branch_details['iban'].'</td></tr>
                      <tr><td>BIC : </td><td>'.@$branch_details['bic'].'</td></tr>';
                      if (!empty(@$branch_details['vat_no'])) {
                       $pdf6 .= '<tr><td>VAT No : </td><td>'.@$branch_details['vat_no'].'</td></tr>';
                      } 
                      if (!empty(@$branch_details['bank_cleaing_no'])) {
                       $pdf6 .= '<tr><td>Clearing No : </td><td>'.@$branch_details['bank_cleaing_no'].'</td></tr>';
                      }                      
                      
                      //<tr><td>Reference : </td><td>'.@$result[0]['file_no'].'</td></tr>';                    
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
       //print_r($branch_details);exit;
        #$branch_address = strip_tags($branch_details['address'])."        Tel No : +".$branch_details['country_code']." ".$branch_details['tel_no']."        Email :".$branch_details['primary_email_id']."         www.agrimincontrol.com";
        #$this->SetY(-65);
        // Set font
        $this->SetFont('helvetica', '', 7);
        // Page number
        #$this->Cell(0, 0, $branch_address, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->writeHTML($pdf6, true, false, true, false, '');

        $pageWidth    = $this->getPageWidth();   // Get total page width, without margins

        $footer_text = "THIS COMPANY TRADES UNDER THE AGRIMIN CONTROL INTERNATIONAL, TERMS AND CONDITIONS OF BUSINESS COPIES AVAILABLE ON REQUEST";

        #$this->Cell(0, 14, $footer_text, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        // New line for next 3 elements
        $this->writeHTML("___________________________________________________________________________________________________________________________________", true, false, false, false, '');
        $this->Ln(2);

        // Second line of 3x "sometext"
        $this->MultiCell(0, 10, $footer_text, 0, 'C');
        #$this->MultiCell(55, 10, $footer_text, 0, 'J', 0, 0, '', '', true, 0, false, true, 10, 'M');
        #$this->MultiCell(55, 10, $footer_text, 0, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
        #$this->MultiCell(55, 10, $footer_text, 0, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');

        #$this->MultiCell(80, 5, $footer_text."\n", 1, 'J', 1, 1, '' ,'', true);
    }

    // Page footer
    public function Footer123() {
        // Position at 15 mm from bottom

        $this->SetY(-25);

        $this->SetFont('helvetica', '', 7);

        $pageWidth    = $this->getPageWidth();   // Get total page width, without margins

        $footer_text = "THIS COMPANY TRADES UNDER THE AGRIMIN CONTROL INTERNATIONAL, TERMS AND CONDITIONS OF BUSINESS COPIES AVAILABLE ON REQUEST";

        $text = "Page ".$this->getAliasNumPage().'/'.$this->getAliasNbPages();
        $this->Cell(0, 0, $text, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        // New line for next 3 elements
        $this->writeHTML("___________________________________________________________________________________________________________________________________", true, false, false, false, '');
        $this->Ln(2);

        // Second line of 3x "sometext"
        $this->MultiCell(0, 10, $footer_text, 0, 'C');

    }

    public function Footer() {
        
        if ($this->last_page_flag) {
        // Position at 15 mm from bottom
        //print_r($_SESSION);exit;
        $CI =& get_instance();
        $CI->load->model('branch_master');

        $terms = '<table border="0" cellspacing="0" cellpadding="2" align="center">';
        $terms .=  '<tr><td><b><u>Payment Terms : Within 30 Days Upon Receipt Of Invoice</u></b></td></tr>';
        $terms .=  '</table>';
        if ($_SESSION['country_code']!='CH') {
        $this->SetY(-75);
        } else {
        $this->SetY(-62);  
        }
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        #$this->Cell(0, 0, $branch_address, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        #if ($_SESSION['country_code']!='CH') {
        $this->writeHTML($terms, true, false, true, false, '');
        #}

        $authsign = '<table border="0" cellspacing="0" cellpadding="0" align="right">';
        $authsign .=  '<tr><td></td></tr>';
        //$authsign .=  '<tr><td></td></tr>';
        //$authsign .=  '<tr><td></td></tr>';
        //$authsign .=  '<tr><td></td></tr>';
        //$authsign .=  '<tr><td></td></tr>';
        $authsign .=  '<tr><td><b><u>Authorized signatory</u></b></td></tr>';
        $authsign .=  '</table>';
        if ($_SESSION['country_code']!='CH') {
        $this->writeHTML($authsign, true, false, true, false, '');
        }

        $branch_details = $CI->branch_master->getBranchdataById($_SESSION['branch_id']);
        $pdf6 = '<h3 align="left"><u>Bank Details</u></h3><br /><br />';

        $pdf6 .= '<table width="100%" cellpadding="0" border="0">
            <tr>

              <td width="80%">
                  <table width="100%" border="0" align="left">
                      <tr><td>ACCOUNT : </td><td>'.@$branch_details['bank_name'].'</td></tr>
                      <tr><td>ACCOUNT NO : </td><td>'.@$branch_details["bank_account_no"].'</td></tr>
                      <tr><td>ADDRESS : </td><td>'.@$branch_details["bank_address"].'</td></tr>
                      <tr><td>BENEFICIARY : </td><td>'.@$branch_details['bank_beneficiary'].'</td></tr>
                      <tr><td>IBAN : </td><td>'.@$branch_details['iban'].'</td></tr>
                      <tr><td>BIC : </td><td>'.@$branch_details['bic'].'</td></tr>';
                      if (!empty(@$branch_details['vat_no'])) {
                       $pdf6 .= '<tr><td>VAT No : </td><td>'.@$branch_details['vat_no'].'</td></tr>';
                      } 
                      if (!empty(@$branch_details['bank_cleaing_no'])) {
                       $pdf6 .= '<tr><td>Clearing No : </td><td>'.@$branch_details['bank_cleaing_no'].'</td></tr>';
                      }                      
                      
                      //<tr><td>Reference : </td><td>'.@$result[0]['file_no'].'</td></tr>';                    
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
       //print_r($branch_details);exit;
        #$branch_address = strip_tags($branch_details['address'])."        Tel No : +".$branch_details['country_code']." ".$branch_details['tel_no']."        Email :".$branch_details['primary_email_id']."         www.agrimincontrol.com";
        #$this->SetY(-65);
        // Set font
        $this->SetFont('helvetica', '', 6.5);
        // Page number
        #$this->Cell(0, 0, $branch_address, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->writeHTML($pdf6, true, false, true, false, '');

        $pageWidth    = $this->getPageWidth();   // Get total page width, without margins


        $footer_text = "THIS COMPANY OPERATES UNDER THE AGRIMIN CONTROL INTERNATIONAL S.A., TERMS AND CONDITIONS OF BUSINESS. COPIES AVAILABLE ON REQUEST.";

        $text = "Page ".$this->getAliasNumPage().'/'.$this->getAliasNbPages();
        $this->Cell(0, 0, $text, 0, false, 'R', 0, '', 0, false, 'T', 'M');
        if ($_SESSION['country_code']!='CH') {
        $this->writeHTML("_________________________________________________________________________________________________________________________________________", true, false, false, false, '');
        } else {
        $this->writeHTML("____________________________________________________________________________________________________________________________________________", true, false, false, false, '');
        }
        $this->Ln(2);

        // Second line of 3x "sometext"
        $this->MultiCell(0, 10, $footer_text, 0, 'C');
        #$this->MultiCell(55, 10, $footer_text, 0, 'J', 0, 0, '', '', true, 0, false, true, 10, 'M');
        #$this->MultiCell(55, 10, $footer_text, 0, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
        #$this->MultiCell(55, 10, $footer_text, 0, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');

        #$this->MultiCell(80, 5, $footer_text."\n", 1, 'J', 1, 1, '' ,'', true);
        } else {
      

        $this->SetY(-25);

        $this->SetFont('helvetica', '', 6.5);

        $pageWidth    = $this->getPageWidth();   // Get total page width, without margins

        
        $footer_text = "THIS COMPANY OPERATES UNDER THE AGRIMIN CONTROL INTERNATIONAL S.A., TERMS AND CONDITIONS OF BUSINESS. COPIES AVAILABLE ON REQUEST.";

        $text = "Page ".$this->getAliasNumPage().'/'.$this->getAliasNbPages();
        $this->Cell(0, 0, $text, 0, false, 'R', 0, '', 0, false, 'T', 'M');
        $this->writeHTML("___________________________________________________________________________________________________________________________________", true, false, false, false, '');
        $this->Ln(2);

        // Second line of 3x "sometext"
        $this->MultiCell(0, 10, $footer_text, 0, 'C');
        #$this->MultiCell(55, 10, $footer_text, 0, 'J', 0, 0, '', '', true, 0, false, true, 10, 'M');
        #$this->MultiCell(55, 10, $footer_text, 0, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
        #$this->MultiCell(55, 10, $footer_text, 0, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');

        #$this->MultiCell(80, 5, $footer_text."\n", 1, 'J', 1, 1, '' ,'', true);

        }
    }

}


/* end Pdf.php file */
?>

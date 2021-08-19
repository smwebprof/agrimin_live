<?php
/*
* Author: onlinecode
* start Pdf.php file
* Location: ./application/libraries/Pdf.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf extends TCPDF
{
    protected $processId = 0;
    protected $header = '';
    protected $footer = '';
    static $errorMsg = '';

    function __construct()
    {
        parent::__construct();
        
    }

    //Page header
    public function Header() {
        #print_r($_SESSION);exit;
        // Logo
        if ($_SESSION['country_code']=='CH') {
           $image_file = APP_PATH.'/assets/img/logo_new2_sa.jpg'; 
        } else {
           $image_file = APP_PATH.'/assets/img/logo_new2.jpg';
        }
        
        #$image_file = APP_PATH.'/assets/img/2.jpg';
        $this->Image($image_file, 30, 10, 151, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        //$this->Cell(10, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        //$this->SetTopMargin(30);
        $this->writeHTMLCell($w='', $h='', $x='', $y='', $this->header, $border=0, $ln=0, $fill=0, $reseth=true, $align='L', $autopadding=true);
        $this->SetLineStyle( array( 'width' => 0.40, 'color' => array(0, 0, 0)));

        $this->Line(5, 5, $this->getPageWidth()-5, 5); 

        $this->Line($this->getPageWidth()-5, 5, $this->getPageWidth()-5,  $this->getPageHeight()-5);
        $this->Line(5, $this->getPageHeight()-5, $this->getPageWidth()-5, $this->getPageHeight()-5);
        $this->Line(5, 5, 5, $this->getPageHeight()-5);


    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        //print_r($_SESSION);exit;
        $CI =& get_instance();
        $CI->load->model('branch_master');
        $branch_details = $CI->branch_master->getBranchdataById($_SESSION['branch_id']);
       //print_r($branch_details);exit;
        $branch_address = strip_tags($branch_details['address'])."        Tel No : +".$branch_details['country_code']." ".$branch_details['tel_no']."        Email :".$branch_details['primary_email_id']."         www.agrimincontrol.com";
        $this->SetY(-30);
        // Set font
        $this->SetFont('helvetica', 'I', 6);
        // Page number
        $this->Cell(0, 0, $branch_address, 0, false, 'C', 0, '', 0, false, 'T', 'M');

        $pageWidth    = $this->getPageWidth();   // Get total page width, without margins

        $footer_text = "This certificate is issued pursuant to an inspection carried out within scope of Principal's instructions and with due care and skills in conformity with due care and skills in conformity with AgriMin Control International S.A. Terms and Conditions of Business. Claims in respect of this Certificate will be considered only if based upon failure to take due care proven by the Principal.Liability, if and when proven,shall in no circumstances whatsever exceed a total aggregate sum equal to 10/ten times the amount of the fee or commission paid for the services. This certiciate is not intended to relieve any parties from their contractual obligations. ";

        #$this->Cell(0, 14, $footer_text, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        // New line for next 3 elements
        $this->writeHTML("_______________________________________________________________________________________________________________________________________________________", true, false, false, false, '');
        $this->Ln(2);

        // Second line of 3x "sometext"
        $this->MultiCell(0, 10, $footer_text, 0, 'C');
        #$this->MultiCell(55, 10, $footer_text, 0, 'J', 0, 0, '', '', true, 0, false, true, 10, 'M');
        #$this->MultiCell(55, 10, $footer_text, 0, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
        #$this->MultiCell(55, 10, $footer_text, 0, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');

        #$this->MultiCell(80, 5, $footer_text."\n", 1, 'J', 1, 1, '' ,'', true);
    }

}


/* end Pdf.php file */
?>
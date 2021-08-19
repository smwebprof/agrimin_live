<?php
/*
* Author: onlinecode
* start Pdf.php file
* Location: ./application/libraries/Pdf.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class PdfLedger extends TCPDF
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

    /*public function Close() {
      $this->last_page_flag = true;
      parent::Close();
    }*/

    public function Header() { 
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        //$image_file = APP_PATH.'/assets/img/logo_bg.jpg'; 
       //$this->Image($image_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();

        $this->SetLineStyle( array( 'width' => 0.40, 'color' => array(0, 0, 0)));

        $this->Line(5, 5, $this->getPageWidth()-5, 5); 

        $this->Line($this->getPageWidth()-5, 5, $this->getPageWidth()-5,  $this->getPageHeight()-5);
        $this->Line(5, $this->getPageHeight()-5, $this->getPageWidth()-5, $this->getPageHeight()-5);
        $this->Line(5, 5, 5, $this->getPageHeight()-5);
    }


    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom

        $this->SetY(-25);

        $this->SetFont('helvetica', '', 6.5);

        $pageWidth    = $this->getPageWidth();   // Get total page width, without margins

        $footer_text = "THIS COMPANY TRADES UNDER THE AGRIMIN CONTROL INTERNATIONAL S.A., TERMS AND CONDITIONS OF BUSINESS COPIES AVAILABLE ON REQUEST";

        $text = "Page ".$this->getAliasNumPage().'/'.$this->getAliasNbPages();
        $this->Cell(0, 0, $text, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        // New line for next 3 elements
        $this->writeHTML("____________________________________________________________________________________________________________________________________________", true, false, false, false, '');
        $this->Ln(2);

        // Second line of 3x "sometext"
        $this->MultiCell(0, 10, $footer_text, 0, 'C');

    }

    

}


/* end Pdf.php file */
?>

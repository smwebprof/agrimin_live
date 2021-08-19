<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downloadweightqualitycertificatedraft extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     * Author : Shivaji M Dalvi 
     * Date : 15.01.2020
     */
    function __construct()
    {
    parent::__construct();
     
    // add library of Pdf
    $this->load->library('Pdfimage');
    } 

    function index111()
    {
    // coder for CodeIgniter TCPDF Integration
    $tcpdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    // Set Title
    $tcpdf->SetTitle('Pdf Example onlinecode');
    // Set Header Margin
    $tcpdf->SetHeaderMargin(30);
    // Set Top Margin
    $tcpdf->SetTopMargin(20);
    // set Footer Margin
    $tcpdf->setFooterMargin(20);
    // Set Auto Page Break
    $tcpdf->SetAutoPageBreak(true);
    // Set Author
    $tcpdf->SetAuthor('onlinecode');
    // Set Display Mode
    $tcpdf->SetDisplayMode('real', 'default');
    // Set Write text
    
    $tcpdf->Write(5, 'CodeIgniter TCPDF Integration - onlinecode');

    // Set Output and file name
    $tcpdf->Output('tcpdfexample-onlinecode.pdf', 'I');
    }

    function index222()
    {
            // create new PDF document
            $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Nicola Asuni');
            $pdf->SetTitle('TCPDF Example 003');
            $pdf->SetSubject('TCPDF Tutorial');
            $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

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
            $pdf->SetFont('times', 'BI', 12);

            // add a page
            $pdf->AddPage();

            // set some text to print
            $txt = "<<<EOD 
            TCPDF Example 003

            Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
            EOD";

            $txt .= "<<<EOD 
            TCPDF Example 003

            Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
            EOD";

            $txt .= "<<<EOD 
            TCPDF Example 003

            Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
            EOD";

            $txt .= "<<<EOD 
            TCPDF Example 003

            Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
            EOD";

            // print a block of text using Write()
            $pdf->Write(30, $txt, '', 0, 'C', true, 0, false, false, 0);

            // ---------------------------------------------------------

            //Close and output PDF document
            $pdf->Output('example_003.pdf', 'I');

    }

    function index()
    {
            
            $this->load->library('form_validation');
            $this->load->model('company_master'); 
            $this->load->model('branch_master'); 
            $this->load->model('user_master');
            $this->load->model('Certificate_master');
            $this->load->model('Weight_Quality_master');
            $this->load->model('File_master');
            $this->load->model('Unit_master');
            $this->load->model('Client_master');
            $this->load->helper('form');
            $id = base64_decode($_GET['id']);
            $dt = gmdate('Y-m-d H:i:s');
            $user = $_SESSION['fname']." ".$_SESSION['lname'];

          
            $result = $this->Weight_Quality_master->getWQCertificateEditdata($id);
            //print_r($result);exit;

            $params_details = $this->Weight_Quality_master->getWCertificateDetailsdataBySpec($id);
            //print_r($params_details);exit;

            $specifications = $this->Certificate_master->getlabspecificationgroup();
            //print_r($specifications);exit;
            foreach ($specifications as $spf) {
                $spf_items[$spf['id']] = $spf;
            }
            #print_r($spf_items);exit;
            #exit;
            $branch_details = $this->branch_master->getBranchdataById($result[0]['user_branch_id']); 
            #print_r($branch_details);exit;


            // create new PDF document
            $pdf = new Pdfimage(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Shivaji Dalvi');
            $pdf->SetTitle('Weight Certificate');
            $pdf->SetSubject('Weight Certificate');
            $pdf->SetKeywords('Weight, Certificate');

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
            /***$pdf->SetLineStyle( array( 'width' => 15, 'color' => array(0,0,0)));
            $pdf->Line(0,0,$pdf->getPageWidth(),0); 
            $pdf->Line($pdf->getPageWidth(),0,$pdf->getPageWidth(),$pdf->getPageHeight());
            $pdf->Line(0,$pdf->getPageHeight(),$pdf->getPageWidth(),$pdf->getPageHeight());
            $pdf->Line(0,0,0,$pdf->getPageHeight());
            $pdf->SetLineStyle( array( 'width' => 14, 'color' => array(255,255,255)));
            $pdf->Line(0,0,$pdf->getPageWidth(),0); 
            $pdf->Line($pdf->getPageWidth(),0,$pdf->getPageWidth(),$pdf->getPageHeight());
            $pdf->Line(0,$pdf->getPageHeight(),$pdf->getPageWidth(),$pdf->getPageHeight());
            $pdf->Line(0,0,0,$pdf->getPageHeight());***/
            #####################################################################

            $pdf->SetDrawColor(255, 127, 127);
            $pdf->SetFillColor(255, 0, 0);
            $pdf->SetTextColor(255, 0, 0);
            $pdf->Cell(174,60,'DRAFT',0,0,'R'); 
            // define style for border
            /*$border_style = array('all' => array('width' => 2, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'phase' => 0));
            $pdf->SetDrawColor(255, 127, 127);
            $pdf->SetFillColor(255, 0, 0);
            $pdf->SetTextColor(255, 0, 0);
            //$pdf->Rect(30, 110, 30, 30, 'DF', $border_style);
            $pdf->Text(30, 40, 'Red');*/

            $pdf->Multicell(0,2,"\n");

            $pdf->setTextColor(array(0,0,0));
            $html = "<br>";

            $html .= "<br>";

            #$html .= "<br><br><br><br><br><br><br><br>";

            $html .= '<br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><center>WEIGHT AND QUALITY CERTIFICATE</center></u><br>';

            // output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');

            $pdf->SetFont('helvetica', 'B', 10);

            $html1 =  '<table cellspacing="2" cellpadding="1" border="0">';
            $html1 .= '<tr><td>'.$result[0]['certificate_no'].'</td><td></td><td> Date : '.$result[0]['certificate_date'].'</td></tr>';
            $html1 .=  '</table><br><br>';

            $pdf->writeHTML($html1, true, false, true, false, '');

            $pdf->SetFont('helvetica', '', 10);

            $tbl =  '<table cellspacing="2" cellpadding="1" border="0">';
                        if (!empty($result[0]['vessel_name'])) {
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Name of the Vessel").'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['vessel_name']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['commodity'])) {
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Description Of Goods").'</b></td>
                                <td width="10%">:</td>
                                <td style="white-space: wrap;" width="60%">'.strtoupper($result[0]['commodity']).'</td>
                                </tr>';
                        }


                        /*if (!empty($result[0]['approx_qty'])) {
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Quantity").'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.$tot_quantity.' '.$approx_unit.'</td>
                                </tr>';
                        }*/

                        if (!empty($result[0]['load_port'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Loading Port").'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['load_port']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['discharge_port'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Discharge Port").'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['discharge_port']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['notify'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Notify").'</b></td>
                                <td width="10%">:</td>
                                <td style="white-space: wrap;" width="60%">'.strtoupper($result[0]['notify']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['consignee'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Consignee").'</b></td>
                                <td width="10%">:</td>
                                <td style="white-space: wrap;" width="60%">'.strtoupper($result[0]['consignee']).'</td>
                                </tr>';
                        }                        

                        if (!empty($result[0]['file_date'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Loading Date").'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.$result[0]['file_date'].'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['insurance'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Insurance")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['insurance']).'</td>
                                </tr>';
                        } 

                        if (!empty($result[0]['cb_regno'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("CB Registration No")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['cb_regno']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['shipper'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Shipper1").'</b></td>
                                <td width="10%">:</td>
                                <td style="white-space: wrap;" width="60%">'.strtoupper($result[0]['shipper']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['bill_lading_qty'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Bill Of Lading Quantity")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['bill_lading_qty'].' '.$result[0]['bill_lading_unit']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['bill_lading_numdt'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Bill Of Lading Number & Date")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['bill_lading_numdt']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['shipper1'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Shipper2").'</b></td>
                                <td width="10%">:</td>
                                <td style="white-space: wrap;" width="60%">'.strtoupper($result[0]['shipper1']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['bill_lading_qty1'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Bill Of Lading Quantity2")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['bill_lading_qty1'].' '.$result[0]['bill_lading_unit']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['bill_lading_numdt1'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Bill Of Lading Number & Date2")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['bill_lading_numdt1']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['shipper2'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Shipper3").'</b></td>
                                <td width="10%">:</td>
                                <td style="white-space: wrap;" width="60%">'.strtoupper($result[0]['shipper2']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['bill_lading_qty2'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Bill Of Lading Quantity3")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['bill_lading_qty2'].' '.$result[0]['bill_lading_unit']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['bill_lading_numdt2'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Bill Of Lading Number & Date3")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['bill_lading_numdt2']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['packaging'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Packing")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['packaging']).'</td>
                                </tr>';
                        }                                            

                        if (!empty($result[0]['stowage'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Stowage")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['stowage']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['declaration'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Additional, Declaration").'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['declaration']).'</td>
                                </tr>';
                        }

            $tbl .=  '</table>';

            $pdf->writeHTML($tbl, true, false, false, false, '');

            $title1 =  '';
            $text1 =  '';
            if (!empty($result[0]['para_title1'])) {
                #$title1 .=  $result[0]['ins_pg_break1'];
                #$title1 .=  '<br><br>';
                #$title1 .=  $result[0]['para_title1'];
                #$pdf->SetFont('helvetica', 'B', 12);
                #$pdf->writeHTML($title1, true, false, false, false, '');
                $text1 .=  '<br><br>';
                $text1 .=  strtoupper($result[0]['para_text1']);
                $pdf->SetFont('helvetica', '', 9);
                $pdf->writeHTML($text1, true, false, false, false, '');
            } 

            $title2 =  '';
            $text2 =  '';
            if (!empty($result[0]['para_title2'])) {
                #$title2 .=  $result[0]['ins_pg_break2'];
                #$title2 .=  '<br><br>';
                #$title2 .=  $result[0]['para_title2'];
                #$pdf->SetFont('helvetica', 'B', 12);
                #$pdf->writeHTML($title2, true, false, false, false, '');
                $text2 .=  '<br><br>';
                $text2 .=  strtoupper($result[0]['para_text2']);
                $pdf->SetFont('helvetica', '', 9);
                $pdf->writeHTML($text2, true, false, false, false, '');
            }

            $title3 =  '';
            $text3 =  '';
            if (!empty($result[0]['para_title3'])) {
                $title3 .=  $result[0]['ins_pg_break3'];
                $title3 .=  '<br><br>';
                $title3 .=  $result[0]['para_title3'];
                $pdf->SetFont('helvetica', 'B', 10);
                $pdf->writeHTML($title3, true, false, false, false, '');
                $text3 .=  '<br><br>';
                $text3 .=  strtoupper($result[0]['para_text3']);
                $pdf->SetFont('helvetica', '', 9);
                $pdf->writeHTML($text3, true, false, false, false, '');
            }
            
            if (!empty($result[0]['total_net_weight'])) {
            $html3 =  '<br><br><br>';
            $html3 .=  '<b><u>ACTUAL WEIGHT LOADED ON BOARD</u></b>';
            $pdf->writeHTML($html3, true, false, true, false, '');

            $tbl9 =  '<br>';
            $tbl9 .=  '<table cellspacing="2" cellpadding="1" border="0">';
            $tbl9 .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Total Net Weight")).'</b></td>
                      <td width="10%">:</td>
                      <td width="60%">'.$result[0]['total_net_weight'].' '.$result[0]['bill_lading_unit'].'</td>
                      </tr>';
            $tbl9 .= '</table>';         
            $pdf->writeHTML($tbl9, true, false, true, false, '');
            }

            $title4 =  '';
            $text4 =  '';
            if (!empty($result[0]['para_title4'])) {
                $title4 .=  $result[0]['ins_pg_break4'];
                $title4 .=  '<br><br>';
                $title4 .=  $result[0]['para_title4'];
                $pdf->SetFont('helvetica', 'B', 10);
                $pdf->writeHTML($title4, true, false, false, false, '');
                $text4 .=  '<br><br>';
                $text4 .=  strtoupper($result[0]['para_text4']);
                $pdf->SetFont('helvetica', '', 9);
                $pdf->writeHTML($text4, true, false, false, false, '');
            }

            if (!empty(count($params_details))) { 
                $spec = '<br><br><br>';
                if (!empty($params_details[0]['ins_pg_break'])) {
                    $spec .= $params_details[0]['ins_pg_break'];    
                }
                $spec .=  '<table cellspacing="2" cellpadding="1" border="1">';
                $spec .= '<tr><td> <b>PARAMETERS</b></td>';
                if ($result[0]['check_specs']!=1) {
                $spec .= '<td> <b>SPECIFICATIONS</b></td>';
                } 
                $spec .= '<td> <b>ACTUAL RESULTS</b></td></tr>';
                for ($i=0;$i<count($params_details);$i++) {
                    #foreach ($specifications as $items) {
                    $spec .= '<tr><td> '.$spf_items[$params_details[$i]['param_name']]['name'].'</td>';
                    #}
                    if ($result[0]['check_specs']!=1) {
                    $spec .= '<td> '.$params_details[$i]['specification'].'</td>';
                    }
                    $spec .= '<td> '.$params_details[$i]['results'].'</td></tr>';
                }
                $spec .= '</table>';
            }
            if (!empty($spec)) {
            $pdf->SetFont('helvetica', '', 10);
            $pdf->writeHTML($spec, true, false, false, false, '');
            }

            if ($_SESSION['country_code']=='CH') {
                $branch_details['branch_name'] = 'Geneva';
            }

            $html2 =  '<br>';
            if ($_SESSION['country_code']=='CH') {
                $html2 .=  '<table cellspacing="2" cellpadding="1" border="0">';
                $html2 .= '<tr><td width="35%">Geneva, Switzerland :  '.$result[0]['certificate_date'].'</td><td></td><td width="35%">'.$branch_details['bank_beneficiary'].'<br>'.$branch_details['branch_name'].'</td></tr>';
                $html2 .=  '</table>';
            } else {
               $html2 .=  '<table cellspacing="2" cellpadding="1" border="0">';
                $html2 .= '<tr><td width="30%">'.strtoupper($result[0]["load_port"]).' :  '.$result[0]['certificate_date'].'</td><td></td><td width="35%">'.$branch_details['bank_beneficiary'].'<br>'.$branch_details['branch_name'].'</td></tr>';
                $html2 .=  '</table>'; 
            }    
            
            $pdf->writeHTML($html2, true, false, true, false, '');

            // print a block of text using Write()
            #$pdf->Write(30, $txt, '', 0, 'C', true, 0, false, false, 0);
            #$pdf->writeHTML($txt, true, false, true, false, '');

            // ---------------------------------------------------------

            $pdf->AddPage();
            // set font
            $pdf->SetFont('helvetica', 'B', 12);
            //$pdf->copyPage(1);
            $pdf->SetDrawColor(255, 127, 127);
            $pdf->SetFillColor(255, 0, 0);
            $pdf->SetTextColor(255, 0, 0);
            $pdf->Cell(174,60,'DRAFT',0,0,'R');

            $pdf->Multicell(0,2,"\n");
            $pdf->setTextColor(array(0,0,0));            
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->SetFont('helvetica', 'B', 10);

            $pdf->writeHTML($html1, true, false, true, false, '');
            $pdf->SetFont('helvetica', '', 10);

            $tbl =  '<table cellspacing="2" cellpadding="1" border="0">';
                        if (!empty($result[0]['vessel_name'])) {
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Name of the Vessel").'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['vessel_name']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['commodity'])) {
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Description Of Goods").'</b></td>
                                <td width="10%">:</td>
                                <td style="white-space: wrap;" width="60%">'.strtoupper($result[0]['commodity']).'</td>
                                </tr>';
                        }


                        /*if (!empty($result[0]['approx_qty'])) {
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Quantity").'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.$tot_quantity.' '.$approx_unit.'</td>
                                </tr>';
                        }*/

                        if (!empty($result[0]['load_port'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Loading Port").'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['load_port']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['discharge_port'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Discharge Port").'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['discharge_port']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['notify'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Notify").'</b></td>
                                <td width="10%">:</td>
                                <td style="white-space: wrap;" width="60%">'.strtoupper($result[0]['notify']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['consignee'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Consignee").'</b></td>
                                <td width="10%">:</td>
                                <td style="white-space: wrap;" width="60%">'.strtoupper($result[0]['consignee']).'</td>
                                </tr>';
                        }                        

                        if (!empty($result[0]['file_date'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Loading Date").'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.$result[0]['file_date'].'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['insurance'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Insurance")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['insurance']).'</td>
                                </tr>';
                        } 

                        if (!empty($result[0]['cb_regno'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("CB Registration No")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['cb_regno']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['shipper'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Shipper1").'</b></td>
                                <td width="10%">:</td>
                                <td style="white-space: wrap;" width="60%">'.strtoupper($result[0]['shipper']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['bill_lading_qty'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Bill Of Lading Quantity")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['bill_lading_qty'].' '.$result[0]['bill_lading_unit']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['bill_lading_numdt'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Bill Of Lading Number & Date")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['bill_lading_numdt']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['shipper1'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Shipper2").'</b></td>
                                <td width="10%">:</td>
                                <td style="white-space: wrap;" width="60%">'.strtoupper($result[0]['shipper1']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['bill_lading_qty1'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Bill Of Lading Quantity2")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['bill_lading_qty1'].' '.$result[0]['bill_lading_unit']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['bill_lading_numdt1'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Bill Of Lading Number & Date2")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['bill_lading_numdt1']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['shipper2'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Shipper3").'</b></td>
                                <td width="10%">:</td>
                                <td style="white-space: wrap;" width="60%">'.strtoupper($result[0]['shipper2']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['bill_lading_qty2'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Bill Of Lading Quantity3")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['bill_lading_qty2'].' '.$result[0]['bill_lading_unit']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['bill_lading_numdt2'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Bill Of Lading Number & Date3")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['bill_lading_numdt2']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['packaging'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Packaging")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['packaging']).'</td>
                                </tr>';
                        }                                            

                        if (!empty($result[0]['stowage'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Stowage")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['stowage']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['declaration'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Additional, Declaration").'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['declaration']).'</td>
                                </tr>';
                        }

            $tbl .=  '</table>';

            $pdf->writeHTML($tbl, true, false, false, false, '');

            $title1 =  '';
            $text1 =  '';
            if (!empty($result[0]['para_title1'])) {
                #$title1 .=  $result[0]['ins_pg_break1'];
                #$title1 .=  '<br><br>';
                #$title1 .=  $result[0]['para_title1'];
                #$pdf->SetFont('helvetica', 'B', 12);
                #$pdf->writeHTML($title1, true, false, false, false, '');
                $text1 .=  '<br><br>';
                $text1 .=  strtoupper($result[0]['para_text1']);
                $pdf->SetFont('helvetica', '', 9);
                $pdf->writeHTML($text1, true, false, false, false, '');
            } 

            $title2 =  '';
            $text2 =  '';
            if (!empty($result[0]['para_title2'])) {
                #$title2 .=  $result[0]['ins_pg_break2'];
                #$title2 .=  '<br><br>';
                #$title2 .=  $result[0]['para_title2'];
                #$pdf->SetFont('helvetica', 'B', 12);
                #$pdf->writeHTML($title2, true, false, false, false, '');
                $text2 .=  '<br><br>';
                $text2 .=  strtoupper($result[0]['para_text2']);
                $pdf->SetFont('helvetica', '', 9);
                $pdf->writeHTML($text2, true, false, false, false, '');
            }

            $title3 =  '';
            $text3 =  '';
            if (!empty($result[0]['para_title3'])) {
                $title3 .=  $result[0]['ins_pg_break3'];
                $title3 .=  '<br><br>';
                $title3 .=  $result[0]['para_title3'];
                $pdf->SetFont('helvetica', 'B', 10);
                $pdf->writeHTML($title3, true, false, false, false, '');
                $text3 .=  '<br><br>';
                $text3 .=  strtoupper($result[0]['para_text3']);
                $pdf->SetFont('helvetica', '', 9);
                $pdf->writeHTML($text3, true, false, false, false, '');
            }
            
            if (!empty($result[0]['total_net_weight'])) {
            $html3 =  '<br><br><br>';
            $html3 .=  '<b><u>ACTUAL WEIGHT LOADED ON BOARD</u></b>';
            $pdf->writeHTML($html3, true, false, true, false, '');

            $tbl9 =  '<br>';
            $tbl9 .=  '<table cellspacing="2" cellpadding="1" border="0">';
            $tbl9 .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Total Net Weight")).'</b></td>
                      <td width="10%">:</td>
                      <td width="60%">'.$result[0]['total_net_weight'].' '.$result[0]['bill_lading_unit'].'</td>
                      </tr>';
            $tbl9 .= '</table>';         
            $pdf->writeHTML($tbl9, true, false, true, false, '');
            }

            $title4 =  '';
            $text4 =  '';
            if (!empty($result[0]['para_title4'])) {
                $title4 .=  $result[0]['ins_pg_break4'];
                $title4 .=  '<br><br>';
                $title4 .=  $result[0]['para_title4'];
                $pdf->SetFont('helvetica', 'B', 10);
                $pdf->writeHTML($title4, true, false, false, false, '');
                $text4 .=  '<br><br>';
                $text4 .=  strtoupper($result[0]['para_text4']);
                $pdf->SetFont('helvetica', '', 9);
                $pdf->writeHTML($text4, true, false, false, false, '');
            }

            if (!empty(count($params_details))) { 
                $spec = '<br><br><br>';
                if (!empty($params_details[0]['ins_pg_break'])) {
                    $spec .= $params_details[0]['ins_pg_break'];    
                }
                $spec .=  '<table cellspacing="2" cellpadding="1" border="1">';
                $spec .= '<tr><td> <b>PARAMETERS</b></td>';
                if ($result[0]['check_specs']!=1) {
                $spec .= '<td> <b>SPECIFICATIONS</b></td>';
                } 
                $spec .= '<td> <b>ACTUAL RESULTS</b></td></tr>';
                for ($i=0;$i<count($params_details);$i++) {
                    #foreach ($specifications as $items) {
                    $spec .= '<tr><td> '.$spf_items[$params_details[$i]['param_name']]['name'].'</td>';
                    #}
                    if ($result[0]['check_specs']!=1) {
                    $spec .= '<td> '.$params_details[$i]['specification'].'</td>';
                    }
                    $spec .= '<td> '.$params_details[$i]['results'].'</td></tr>';
                }
                $spec .= '</table>';
            }
            if (!empty($spec)) {
            $pdf->SetFont('helvetica', '', 10);
            $pdf->writeHTML($spec, true, false, false, false, '');
            }

            $pdf->writeHTML($html2, true, false, true, false, '');
            //Close and output PDF document
            $pdf->Output('WQCert.pdf', 'I');

    }


}


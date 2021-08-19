<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downloadqualitycertificatedraft extends CI_Controller {

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
            $this->load->model('File_master');
            $this->load->model('Unit_master');
            $this->load->model('Client_master');
            $this->load->helper('form');
            $id = base64_decode($_GET['id']);
            $dt = gmdate('Y-m-d H:i:s');
            $user = $_SESSION['fname']." ".$_SESSION['lname'];

          
            $result = $this->Certificate_master->getQCertificateEditdata($id);
            //print_r($result);exit;
            $hold_details = $this->Certificate_master->getQCertificateDetailsdataPdf($id);
            ksort($hold_details);
            //print_r($hold_details);exit;
            $hold_data = implode(',', array_column($hold_details, 'hold_no'));
            $hold_data1 = explode(',', $hold_data);
            $hold_data2 = array_unique($hold_data1);

            $branch_details = $this->branch_master->getBranchdataById($result[0]['user_branch_id']); 
            #print_r($branch_details);exit;

            // create new PDF document
            $pdf = new Pdfimage(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Shivaji Dalvi');
            $pdf->SetTitle('Quality Certificate');
            $pdf->SetSubject('Quality Certificate');
            $pdf->SetKeywords('Quality, Certificate');

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

            $html = "<br><br><br><br>";

            $html .= "<hr><br><br><br><br>";

            #$html .= "<br><br><br><br><br><br><br><br>";

            $html .= '<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><center>CERTIFICATE OF QUALITY</center></u><br>';

            // output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');

            $pdf->SetFont('helvetica', 'B', 10);

            $html1 =  '<table cellspacing="2" cellpadding="1" border="0">';
            $html1 .= '<tr><td>'.$result[0]['certificate_no'].'</td><td></td><td> Date : '.$result[0]['certificate_date'].'</td></tr>';
            $html1 .=  '</table><br><br><br><br>';

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


                        if (!empty($result[0]['approx_qty'])) {
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Quantity").'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.$result[0]['approx_qty'].'</td>
                                </tr>';
                        }

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

                        if (!empty($result[0]['shipper'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Shipper").'</b></td>
                                <td width="10%">:</td>
                                <td style="white-space: wrap;" width="60%">'.strtoupper($result[0]['shipper']).'</td>
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

                        if (!empty($result[0]['stowage'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Stowage")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['stowage']).'</td>
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

                        if (!empty($result[0]['bill_lading_qty'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper(strtoupper("Bill Lading Quantity")).'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['bill_lading_qty']).'</td>
                                </tr>';
                        }

                        if (!empty($result[0]['declaration'])) { 
                            $tbl .= '<tr width="20%"><td><b>'.strtoupper("Additional, Declaration").'</b></td>
                                <td width="10%">:</td>
                                <td width="60%">'.strtoupper($result[0]['declaration']).'</td>
                                </tr>';
                        }

            $tbl .=  '</table>';
            //echo $tbl;exit;
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $title1 =  '';
            $text1 =  '';
            if (!empty($result[0]['para_title1'])) {
                $title1 .=  $result[0]['ins_pg_break1'];
                $title1 .=  '<br><br>';
                $title1 .=  $result[0]['para_title1'];
                $pdf->SetFont('helvetica', 'B', 12);
                $pdf->writeHTML($title1, true, false, false, false, '');
                $text1 .=  '<br><br>';
                $text1 .=  strtoupper($result[0]['para_text1']);
                $pdf->SetFont('helvetica', '', 10);
                $pdf->writeHTML($text1, true, false, false, false, '');
            } 

            $title2 =  '';
            $text2 =  '';
            if (!empty($result[0]['para_title2'])) {
                $title2 .=  $result[0]['ins_pg_break2'];
                $title2 .=  '<br><br>';
                $title2 .=  $result[0]['para_title2'];
                $pdf->SetFont('helvetica', 'B', 12);
                $pdf->writeHTML($title2, true, false, false, false, '');
                $text2 .=  '<br><br>';
                $text2 .=  strtoupper($result[0]['para_text2']);
                $pdf->SetFont('helvetica', '', 10);
                $pdf->writeHTML($text2, true, false, false, false, '');
            }

            $title3 =  '';
            $text3 =  '';
            if (!empty($result[0]['para_title3'])) {
                $title3 .=  $result[0]['ins_pg_break3'];
                $title3 .=  '<br><br>';
                $title3 .=  $result[0]['para_title3'];
                $pdf->SetFont('helvetica', 'B', 12);
                $pdf->writeHTML($title3, true, false, false, false, '');
                $text3 .=  '<br><br>';
                $text3 .=  strtoupper($result[0]['para_text3']);
                $pdf->SetFont('helvetica', '', 10);
                $pdf->writeHTML($text3, true, false, false, false, '');
            }

            $title4 =  '';
            $text4 =  '';
            if (!empty($result[0]['para_title4'])) {
                $title4 .=  $result[0]['ins_pg_break4'];
                $title4 .=  '<br><br>';
                $title4 .=  $result[0]['para_title4'];
                $pdf->SetFont('helvetica', 'B', 12);
                $pdf->writeHTML($title4, true, false, false, false, '');
                $text4 .=  '<br><br>';
                $text4 .=  strtoupper($result[0]['para_text4']);
                $pdf->SetFont('helvetica', '', 10);
                $pdf->writeHTML($text4, true, false, false, false, '');
            }
            

            $spec_array = array('Test');
            #print_r(array_keys($hold_details));exit;
            $hold_names = array_keys($hold_details);
            #print_r($hold_details[$hold_names[0]][1]);exit;
            #echo $hold_details[$hold_names[0]][1][1]['hold_no'];exit;
            #echo $hold_details[$hold_names[0]][1][1]['ins_pg_break'];exit;
            if (!empty($hold_details[$hold_names[0]][1][1]['hold_no'])) { 
                $spec = '';
                for ($i=0;$i<count($hold_names);$i++) {
                    #echo count($hold_details[$hold_names[$i]]);
                   #if ($i!=0) {
                        $spec .= $hold_details[$hold_names[$i]][1][1]['ins_pg_break'];
                    #}
                    $spec .= '<br><br><br><b>'.$hold_details[$hold_names[$i]][1][1]['hold_no'].'</b><br>';
                    $spec .=  '<table cellspacing="2" cellpadding="1" border="1">';
                    /*if ($hold_details[$hold_names[0]][1][1]['min_value']==0) {
                        $spec .= '<tr><td><b>Specification</b></td><td><b>Method</b></td><td><b>Results</b></td></tr>'; 
                        } else {
                        $spec .= '<tr><td><b>Specification</b></td><td><b>Min/Max</b></td><td><b>Unit</b></td><td><b>Method</b></td><td><b>Results</b></td></tr>'; 
                        }*/

                    $spec .= '<tr><td> <b>SPECIFICATION</b></td>';
                    if ($result[0]['check_min']!=1) { $spec .= '<td> <b>MIN</b></td>'; }
                    if ($result[0]['check_max']!=1) { $spec .= '<td> <b>MAX</b></td>'; }
                    $spec .= '<td> <b>UNIT</b></td>';
                    $spec .= '<td> <b>RESULTS</b></td>'; 
                    $spec .= '<td> <b>METHOD</b></td></tr>';
                        
                    
                    for ($j=1;$j<=count($hold_details[$hold_names[$i]]);$j++) {
                        #print_r($hold_details[$hold_names[$i]][$j]);
                        for ($k=1;$k<=count($hold_details[$hold_names[$i]][$j]);$k++) {
                            #echo $hold_details[$hold_names[$i]][$j][$k]['specification_head'];
                            if (!empty($hold_details[$hold_names[$i]][$j][$k]['specification_head'])) {
                                if (!in_array($hold_details[$hold_names[$i]][$j][$k]['specification_head']."|".$hold_names[$i],$spec_array)) {
                                    $specification_head = $hold_details[$hold_names[$i]][$j][$k]['specification_head'];

                                    /*if ($hold_details[$hold_names[0]][1][1]['min_value']==0) {
                                        $spec .= '<tr><td>'.$specification_head.'</td><td></td><td></td></tr>'; 
                                    } else {
                                        $spec .= '<tr><td>'.$specification_head.'</td><td></td><td></td><td></td></tr>'; 
                                    }*/

                                    $spec .= '<tr><td> '.$specification_head.'</td>';
                                    if ($result[0]['check_min']!=1) { $spec .= '<td></td>'; }
                                    if ($result[0]['check_max']!=1) { $spec .= '<td></td>'; }
                                    $spec .= '<td></td>';
                                    $spec .= '<td></td>';
                                    $spec .= '<td></td></tr>';

                                   
                                    array_push($spec_array,$hold_details[$hold_names[$i]][$j][$k]['specification_head']."|".$hold_names[$i]);
                                }
                                }
                                /*if ($hold_details[$hold_names[0]][1][1]['min_value']==0) {
                                        $spec .= '<tr><td>'.$hold_details[$hold_names[$i]][$j][$k]['spec_name'].'</td><td>'.$hold_details[$hold_names[$i]][$j][$k]['method_name'].'</td><td>'.$hold_details[$hold_names[$i]][$j][$k]['results'].'</td></tr>'; 
                                    } else {
                                        $spec .= '<tr><td>'.$hold_details[$hold_names[$i]][$j][$k]['spec_name'].'</td><td>'.$hold_details[$hold_names[$i]][$j][$k]['min_value'].'/'.$hold_details[$hold_names[$i]][$j][$k]['max_value'].' '.$hold_details[$hold_names[$i]][$j][$k]['unit_name'].'</td><td>'.$hold_details[$hold_names[$i]][$j][$k]['unit_name'].'</td><td>'.$hold_details[$hold_names[$i]][$j][$k]['method_name'].'</td><td>'.$hold_details[$hold_names[$i]][$j][$k]['results'].'</td></tr>'; 
                                    }*/

                                $spec .= '<tr><td> '.$hold_details[$hold_names[$i]][$j][$k]['spec_name'].'</td>';
                                if ($result[0]['check_min']!=1) { $spec .= '<td> '.$hold_details[$hold_names[$i]][$j][$k]['min_value'].'</td>'; }
                                if ($result[0]['check_max']!=1) { $spec .= '<td> '.$hold_details[$hold_names[$i]][$j][$k]['max_value'].'</td>'; }
                                $spec .= '<td> '.$hold_details[$hold_names[$i]][$j][$k]['unit_name'].'</td>';                                
                                $spec .= '<td> '.$hold_details[$hold_names[$i]][$j][$k]['results'].'</td>';
                                $spec .= '<td> '.$hold_details[$hold_names[$i]][$j][$k]['method_name'].'</td></tr>';   


                        }    
                    }
                    #print_r($spec_array); 
                    $spec .= '</table>'; 
                }  
                #exit;    
            } else {  
            #echo $hold_details[1][1]['specification'];exit; 

            $spec = '<br><br><br>';
            if (!empty($hold_details[1][1]['specification'])) { $spec .= $hold_details[1][1]['ins_pg_break'];}
            $spec .=  '<table cellspacing="2" cellpadding="1" border="1">';
            /*if ($hold_details[1][1]['min_value']==0) {
                $spec .= '<tr><td>Specification</td><td>Method</td><td>Results</td></tr>';
            } else {
                $spec .= '<tr><td>Specification</td><td>Min/Max</td><td>Method</td><td>Results</td></tr>';
            }*/

            $spec .= '<tr><td> <b>SPECIFICATION</b></td>';
            if ($result[0]['check_min']!=1) { $spec .= '<td> <b>MIN</b></td>'; }
            if ($result[0]['check_max']!=1) { $spec .= '<td> <b>MAX</b></td>'; }
            $spec .= '<td> <b>UNIT</b></td>';            
            $spec .= '<td> <b>RESULTS</b></td>';
            $spec .= '<td> <b>METHOD</b></td></tr>';

            for ($i=1;$i<=count($hold_details);$i++) {
                foreach ($hold_details[$i] as $spec_details) {
                    if (!empty($spec_details['specification_head'])) {
                       if (!in_array($spec_details['specification_head'],$spec_array)) {
                                /*if ($hold_details[1][1]['min_value']==0) {
                                    $spec .= '<tr><td>'.$spec_details['specification_head'].'</td><td></td><td></td></tr>'; 
                                } else {
                                    $spec .= '<tr><td>'.$spec_details['specification_head'].'</td><td></td><td></td><td></td></tr>'; 
                                }*/

                                $spec .= '<tr><td> '.$spec_details['specification_head'].'</td>';
                                if ($result[0]['check_min']!=1) { $spec .= '<td></td>'; }
                                if ($result[0]['check_max']!=1) { $spec .= '<td></td>'; }
                                $spec .= '<td></td>';
                                $spec .= '<td></td>';
                                $spec .= '<td></td></tr>';                                 
                           } 
                       array_push($spec_array,$spec_details['specification_head']);
                    } 
                    
                    /*if ($hold_details[1][1]['min_value']==0) {
                        $spec .= '<tr><td>'.$spec_details['spec_name'].'</td><td>'.$spec_details['method_name'].'</td><td>'.$spec_details['results'].'</td></tr>'; 
                    } else {
                            $spec .= '<tr><td>'.$spec_details['spec_name'].'</td><td>'.$spec_details['min_value'].'/'.$spec_details['max_value'].' '.$spec_details['unit_name'].'</td><td>'.$spec_details['method_name'].'</td><td>'.$spec_details['results'].'</td></tr>'; 
                    }*/

                    $spec .= '<tr><td> '.$spec_details['spec_name'].'</td>';
                    if ($result[0]['check_min']!=1) { $spec .= '<td> '.$spec_details['min_value'].'</td>'; }
                    if ($result[0]['check_max']!=1) { $spec .= '<td> '.$spec_details['max_value'].'</td>'; }
                    $spec .= '<td> '.$spec_details['unit_name'].'</td>';                   
                    $spec .= '<td> '.$spec_details['results'].'</td>';
                    $spec .= '<td> '.$spec_details['method_name'].'</td></tr>';                    
                }
            }
            $spec .= '</table>';
            }
            $pdf->SetFont('helvetica', '', 10);
            $pdf->writeHTML($spec, true, false, false, false, '');

            $html2 =  '<br><br><br><br><br><br><br><br><br><br><br>';
            $html2 .=  '<table cellspacing="2" cellpadding="1" border="0">';
            $html2 .= '<tr><td width="30%">'.$branch_details['branch_name'].':'.$result[0]['certificate_date'].'</td><td></td><td width="35%">'.$branch_details['bank_beneficiary'].'<br>'.$branch_details['branch_name'].'</td></tr>';
            $html2 .=  '</table>';
            $pdf->writeHTML($html2, true, false, true, false, '');

            // print a block of text using Write()
            #$pdf->Write(30, $txt, '', 0, 'C', true, 0, false, false, 0);
            #$pdf->writeHTML($txt, true, false, true, false, '');

            // ---------------------------------------------------------

            //Close and output PDF document
            $pdf->Output('QCert.pdf', 'I');

    }


}


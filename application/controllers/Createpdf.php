<?php
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
 
    /**
     * @package Createpdf :  CodeIgniter Create PDF
     *
     * @author TechArise Team
     *
     * @email  info@techarise.com
     *   
     * Description of Createpdf Controller
     */
    
    class Createpdf extends CI_Controller {


    public function index()
    {
        /*$pdf = '
        // You can put your HTML code here
        < h1 > Lorem Ipsum... </ h1 >
        < h2 > Lorem Ipsum... </ h2 >
        < h3 > Lorem Ipsum... </ h3 >
        < h4 > Lorem Ipsum... </ h4 >
        ';*/

        $pdf = '<table>
           <tr>
              <th>Column 1</th>
              <th>Column 2</th>
              <th>Column 3</th>
              <th>Column 4</th>
           </tr>';
        foreach($result->result() as $key){
        $pdf .= '<tr>
                  <td>'.$key->column1.'</td>
                  <td>'.$key->column2.'</td>
                  <td>'.$key->column3.'</td>
                  <td>'.$key->column4.'</td>
               </tr>';
        }
        $pdf .= '</table>';

        require('TCPDF/tcpdf.php');
        $tcpdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set default monospaced font
        $tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set title of pdf
        $tcpdf->SetTitle('Bill Collection Letter');

        // set margins
        $tcpdf->SetMargins(10, 10, 10, 10);
        $tcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set header and footer in pdf
        $tcpdf->setPrintHeader(false);
        $tcpdf->setPrintFooter(false);
        $tcpdf->setListIndentWidth(3);

        // set auto page breaks
        $tcpdf->SetAutoPageBreak(TRUE, 11);

        // set image scale factor
        $tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        $tcpdf->AddPage();

        $tcpdf->SetFont('times', '', 10.5);

        $tcpdf->writeHTML($pdf, true, false, false, false, '');

        //Close and output PDF document
        $tcpdf->Output('demo.pdf', 'I');

    }


    }
    
?>
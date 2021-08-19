<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoicefileregisterreport extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
         *
         *  Author : Shivaji Dalvi    
         *       
   */
  public function index()
  {
    //load our new PHPExcel library
        $this->load->model('Invoice_master');        
        $this->load->library('excel');
        //activate worksheet number 1

        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Invoicefilereport_AGRIMIN');
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A3', 'AgriMin Control International S.A');
        //change the font size
        $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(20);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
        //merge cell A1 until D1
        $this->excel->getActiveSheet()->mergeCells('A3:M3');
        //set aligment to center for that merged cell (A1 to D1)
        $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->excel->getActiveSheet()->setCellValue('A4', 'PERIODIC INVOICE REGISTER');
        $this->excel->getActiveSheet()->mergeCells('A4:M4');
        $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->excel->getActiveSheet()->setCellValue('A7', 'INV NO');
        $this->excel->getActiveSheet()->getStyle('A7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('A7')->getFont()->setBold(true); 
        $this->excel->getActiveSheet()->setCellValue('B7', 'INV DATE');
        $this->excel->getActiveSheet()->getStyle('B7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('B7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('C7', 'CLIENT');
        $this->excel->getActiveSheet()->getStyle('C7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('C7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('D7', 'CLIENT LOCATION');
        $this->excel->getActiveSheet()->getStyle('D7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('D7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('E7', 'CLIENT STATE');
        $this->excel->getActiveSheet()->getStyle('E7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('E7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('F7', 'VAT NO');
        $this->excel->getActiveSheet()->getStyle('F7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('F7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('G7', 'CURRENCY');
        $this->excel->getActiveSheet()->getStyle('G7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('G7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('H7', 'EXCHANGE RATE');
        $this->excel->getActiveSheet()->getStyle('H7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('H7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('I7', 'BASIC AMOUNT');
        $this->excel->getActiveSheet()->getStyle('I7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('I7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('J7', 'TOTAL VAT');
        $this->excel->getActiveSheet()->getStyle('J7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('J7')->getFont()->setBold(true);        
        $this->excel->getActiveSheet()->setCellValue('K7', 'INVOICE AMOUNT');
        $this->excel->getActiveSheet()->getStyle('K7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('K7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('L7', 'USER');
        $this->excel->getActiveSheet()->getStyle('L7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('L7')->getFont()->setBold(true);

        $this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $this->excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);

        /*$BStyle = array(
          'borders' => array(
            'outline' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
            )
          )
        );*/

        #$this->excel->getActiveSheet()->getStyle('A7:K7')->applyFromArray($BStyle);
        $this->excel->getActiveSheet()->getStyle('A7:L7')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

        $i=1;
        $j = 8;
        #$k = 1;
        $from_dt =  date('d-m-Y',strtotime('last sunday'));
        #$from_dt = date('12-01-2020');
        $to_dt =  date( "d-m-Y", strtotime( "$from_dt +6 day" ) );
        $params['from_dt'] = $from_dt;
        $params['to_dt'] = $to_dt;
        $branch[] = 'Agrimin';
       #print_r($params);exit;  

        $result = $this->Invoice_master->getAllInvoicedataByDate($params);
        if (empty($result)) {
          $this->excel->getActiveSheet()->setCellValue('A8', 'NO DATA FOUND!!!');
          $this->excel->getActiveSheet()->mergeCells('A8:M8');
          $this->excel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
        $p = 0;
        $inv_arr = array();
        foreach ($result as $key => $value) {
            #print_r($value);exit;
          $inv_arr[$value['user_branch_id']][$p] = $value;
          $p++;
        }
        #echo '<pre>';  
        #print_r($inv_arr);exit;
        #echo '</pre>'; 
        #echo count($inv_arr[1]);exit;
        $k = 7;
        $branch[] = 'Agrimin';

        foreach ($inv_arr as $key => $value) {
              $k = $k+1;
              $invoice_basic_amt = 0;
              $invoice_tax_amt = 0;
              $invoice_amt = 0;
              foreach ($value as $p => $q) {
                  $user =  $q['first_name']." ".$q['last_name'];

                  if (!in_array($q['branch_name'],$branch)) {
                    $branch[] = $q['branch_name'];
                    $this->excel->getActiveSheet()->setCellValue('A'.$k, $q['branch_name']);
                    $this->excel->getActiveSheet()->getStyle('A'.$k)->getFont()->setSize(12);
                    $this->excel->getActiveSheet()->getStyle('A'.$k)->getFont()->setBold(true);   
                    $this->excel->getActiveSheet()->mergeCells('A'.$k.':L'.$k);
                    $this->excel->getActiveSheet()->getStyle('A'.$k.':L'.$k)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                    $k++;
                    #$j = $j+$total[$invoiceDetails['user_branch_id']];
                  }

                  $this->excel->getActiveSheet()->getStyle('A'.$k.':L'.$k)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                  $this->excel->getActiveSheet()->getStyle('A'.$k.':L'.$k)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

                  #print_r($q);exit;
                  #echo "===".$k."==".$q['invoice_no'];
                   $this->excel->getActiveSheet()->setCellValue('A'.$k, $q['invoice_no']);
                   $this->excel->getActiveSheet()->setCellValue('B'.$k, date('d-m-Y',strtotime($q['invoice_date'])));
                   $this->excel->getActiveSheet()->setCellValue('C'.$k, $q['client_name']);
                   $this->excel->getActiveSheet()->setCellValue('D'.$k, $q['country_name']);
                   $this->excel->getActiveSheet()->setCellValue('E'.$k, $q['state_name']);
                   $this->excel->getActiveSheet()->setCellValue('F'.$k, $q['vat_no']);
                   $this->excel->getActiveSheet()->setCellValue('G'.$k, $q['currency']);
                   $this->excel->getActiveSheet()->setCellValue('H'.$k, $q['invoice_ex_rate']);
                   $this->excel->getActiveSheet()->setCellValue('I'.$k, $q['invoice_basic_amt']);
                   $this->excel->getActiveSheet()->setCellValue('J'.$k, $q['invoice_tax_amt']);                   
                   $this->excel->getActiveSheet()->setCellValue('K'.$k, $q['invoice_amt']);
                   $this->excel->getActiveSheet()->setCellValue('L'.$k, $user);

                   $invoice_basic_amt+= $q['invoice_basic_amt'];
                   $invoice_tax_amt+= $q['invoice_tax_amt'];
                   $invoice_amt+= $q['invoice_amt'];

                  $k++; 
              }
              $this->excel->getActiveSheet()->setCellValue('H'.$k, 'TOTAL');
              $this->excel->getActiveSheet()->setCellValue('I'.$k, $invoice_basic_amt);
              $this->excel->getActiveSheet()->setCellValue('J'.$k, $invoice_tax_amt);
              $this->excel->getActiveSheet()->setCellValue('K'.$k, $invoice_amt);
              $this->excel->getActiveSheet()->getStyle('A'.$k.':L'.$k)->getFont()->setBold(true); 
              $this->excel->getActiveSheet()->getStyle('A'.$k.':L'.$k)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
              $k++; 
         }

        #print_r($result);exit;
       

        $period = "From : ".$from_dt."  To : ".$to_dt;
        $this->excel->getActiveSheet()->setCellValue('A5', $period);
        $this->excel->getActiveSheet()->mergeCells('A5:M5');
        $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
         
        $filename='Invoicefileregisterreport_AGRIMIN.xls'; //save our workbook as this file name
        #header('Content-Type: application/vnd.ms-excel'); //mime type
        #header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        #header('Cache-Control: max-age=0'); //no cache
                    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        #$objWriter->save('php://output');
        $objWriter->save(str_replace(__FILE__,'files/Invoicefileregisterreport_AGRIMIN.xls',__FILE__));

        /*sleep(10);

        $this->load->library('email');

        $this->email->set_newline("\r\n");

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'agrimincontrol.com';
        $config['smtp_port'] = '587';
        $config['smtp_user'] = 'admin@agrimincontrol.com';
        $config['smtp_from_name'] = 'AGRIMIN Admin (Do_Not_Reply)';
        $config['smtp_pass'] = '~Iec,=0v~iAk';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html';
        //$config['smtp_crypto'] = 'ssl';

        $subject = 'Invoice Register(Commodity) Weekly Report - '.$period;

        $file_email_report = 'Dear User,<br><br>';
        $file_email_report .= 'A Invoice Report has been generated – please find the details As Attached :<br><br>';


        $file_email_report .= '<br><br>From,<br>'; 
        $file_email_report .= '<br>ACI Admin<br><br>'; 

        $file_email_report .= '<br><b>NOTE: This is a system generated mail. Please do not reply</b><br><br>'; 
                         
            
        $this->email->initialize($config);

        $this->email->from($config['smtp_user'], $config['smtp_from_name']);
        $this->email->to('shivaji.dalvi@rcaindia.com');

        $this->email->subject($subject);

        $this->email->attach('/home/agrimn8f/public_html/agrimin/files/Invoicefileregisterreport_AGRIMIN.xls');

        $this->email->message($file_email_report);  

        if($this->email->send()) { 
          echo 'Mail Send Succesfully!!!';exit;
        } else {
          echo 'OOPs No Email Sent!!!';exit;
        } */

    
  }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dailyfileregisterreport extends CI_Controller {

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
         *
         *  Author : Shivaji Dalvi    
         *       
	 */
	public function index()
	{
		//load our new PHPExcel library
        $this->load->model('File_master');        
        $this->load->library('excel');
        //activate worksheet number 1

        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('DailyFileRegisterReport_AGRIMIN');
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

        $this->excel->getActiveSheet()->setCellValue('A4', 'File Register Report');
        $this->excel->getActiveSheet()->mergeCells('A4:M4');
        $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->excel->getActiveSheet()->setCellValue('A7', 'SR. No');
        $this->excel->getActiveSheet()->getStyle('A7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('A7')->getFont()->setBold(true); 
        $this->excel->getActiveSheet()->setCellValue('B7', 'FILENO');
        $this->excel->getActiveSheet()->getStyle('B7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('B7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('C7', 'CREATE DATE');
        $this->excel->getActiveSheet()->getStyle('C7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('C7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('D7', 'CLIENT NAME');
        $this->excel->getActiveSheet()->getStyle('D7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('D7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('E7', 'NOMI. DATE');
        $this->excel->getActiveSheet()->getStyle('E7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('E7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('F7', 'VESSEL');
        $this->excel->getActiveSheet()->getStyle('F7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('F7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('G7', 'CARGO');
        $this->excel->getActiveSheet()->getStyle('G7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('G7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('H7', 'QTY');
        $this->excel->getActiveSheet()->getStyle('H7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('H7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('I7', 'UNIT');
        $this->excel->getActiveSheet()->getStyle('I7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('I7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('J7', 'STATUS');
        $this->excel->getActiveSheet()->getStyle('J7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('J7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->setCellValue('K7', 'USER');
        $this->excel->getActiveSheet()->getStyle('K7')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('K7')->getFont()->setBold(true);

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

        /*$BStyle = array(
          'borders' => array(
            'outline' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
            )
          )
        );*/

        #$this->excel->getActiveSheet()->getStyle('A7:K7')->applyFromArray($BStyle);
        $this->excel->getActiveSheet()->getStyle('A7:K7')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

        $i=1;
        $j = 8;
        $dt = date('Y-m-d');
        #$dt = date('2020-01-21');
        $branch[] = 'Agrimin';
        $result = $this->File_master->getAllFiledataByDate($dt);
        if (!empty($result)) {   
        foreach ($result as $fileDetails) {
           $user =  $fileDetails['first_name']." ".$fileDetails['last_name'];
           if (!in_array($fileDetails['branch_name'],$branch)) {
                $branch[] = $fileDetails['branch_name'];
                $this->excel->getActiveSheet()->setCellValue('A'.$j, $fileDetails['branch_name']);
                $this->excel->getActiveSheet()->getStyle('A'.$j)->getFont()->setSize(12);
                $this->excel->getActiveSheet()->getStyle('A'.$j)->getFont()->setBold(true);   
                $this->excel->getActiveSheet()->mergeCells('A'.$j.':k'.$j);
                $this->excel->getActiveSheet()->getStyle('A'.$j.':k'.$j)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                $j++;
           }

           #$this->excel->getActiveSheet()->getStyle('A'.$j.':k'.$j)->applyFromArray($BStyle);
           $this->excel->getActiveSheet()->getStyle('A'.$j.':k'.$j)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

 
           $this->excel->getActiveSheet()->setCellValue('A'.$j, $i);
           $this->excel->getActiveSheet()->setCellValue('B'.$j, $fileDetails['file_no']);
           $this->excel->getActiveSheet()->setCellValue('C'.$j, date('d-m-Y',strtotime($fileDetails['file_creation_date'])));
           $this->excel->getActiveSheet()->setCellValue('D'.$j, $fileDetails['client_name']);
           $this->excel->getActiveSheet()->setCellValue('E'.$j, date('d-m-Y',strtotime($fileDetails['nomination_date'])));
           $this->excel->getActiveSheet()->setCellValue('F'.$j, $fileDetails['vessel_name']);
           $this->excel->getActiveSheet()->setCellValue('G'.$j, $fileDetails['commodity_name']);
           $this->excel->getActiveSheet()->setCellValue('H'.$j, $fileDetails['approx_qty']);
           $this->excel->getActiveSheet()->setCellValue('I'.$j, $fileDetails['unit_name']);
           $this->excel->getActiveSheet()->setCellValue('J'.$j, $fileDetails['status']);
           $this->excel->getActiveSheet()->setCellValue('K'.$j, $user);  

           $i++;
           $j++;     
        }
        } else {
   
           $this->excel->getActiveSheet()->setCellValue('A8', 'No Details Found!!!');
           $this->excel->getActiveSheet()->getStyle('A8')->getFont()->setSize(12);
           $this->excel->getActiveSheet()->getStyle('A8')->getFont()->setBold(true);   
           $this->excel->getActiveSheet()->mergeCells('A8:k8');     
        }

        $dt = date('d-m-Y');
        $period = "From : ".$dt."  To : ".$dt;
        $this->excel->getActiveSheet()->setCellValue('A5', $period);
        $this->excel->getActiveSheet()->mergeCells('A5:M5');
        $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
         
        $filename='DailyFileRegisterReport_AGRIMIN.xls'; //save our workbook as this file name
        #header('Content-Type: application/vnd.ms-excel'); //mime type
        #header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        #header('Cache-Control: max-age=0'); //no cache
                    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        #$objWriter->save('php://output');
        $objWriter->save(str_replace(__FILE__,'files/DailyFileRegisterReport_AGRIMIN.xls',__FILE__));

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

        $subject = 'Daily File Register Report For Date - '.$dt;

        $file_email_report = 'Dear User,<br><br>';
        $file_email_report .= 'A new file has been generated – please find the details  As Attached :<br><br>';


        $file_email_report .= '<br><br>From,<br>'; 
        $file_email_report .= '<br>ACI Admin<br><br>'; 

        $file_email_report .= '<br><b>NOTE: This is a system generated mail. Please do not reply</b><br><br>'; 
                         
            
        $this->email->initialize($config);

        $this->email->from($config['smtp_user'], $config['smtp_from_name']);
        $this->email->to('shivaji.dalvi@rcaindia.com');

        $this->email->subject($subject);

        $this->email->attach('/home/agrimn8f/public_html/agrimin/files/DailyFileRegisterReport_AGRIMIN.xls');

        $this->email->message($file_email_report);  

        if($this->email->send()) { 
          echo 'Mail Send Succesfully!!!';exit;
        } else {
          echo 'OOPs No Email Sent!!!';exit;
        }*/         
		
	}
}

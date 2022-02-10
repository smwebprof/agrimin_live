<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewexcelfileregistermult extends CI_Controller {

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

    $this->load->model('File_master');
    $this->load->model('User_master');
    $this->load->model('Client_master');
    $this->load->model('Branch_master'); 

    //$ledger_from_date = '22-03-2021';
    //$ledger_to_date = '22-03-2021';
    #echo '111';exit;
    //print_r($_SESSION);exit;

    $this->load->library('excel');

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
  
    $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'AgriMin Control International');
    $objPHPExcel->getActiveSheet()->getStyle('D2')->getFont()->setSize(16);
    $objPHPExcel->getActiveSheet()->getStyle('D2')->getFont()->setBold(true);
    
    if (!empty($_GET['file_from_date'])|| !empty($_GET['file_To_date'])) {
        $objPHPExcel->getActiveSheet()->SetCellValue('D3', 'File(Multiple) Report for the period "'.$_GET['file_from_date'].'" to "'.$_GET['file_To_date'].'"'); 
      } else { 
        $objPHPExcel->getActiveSheet()->SetCellValue('D3', 'File(Multiple) Report for the Selected All period'); 
      }

     $objPHPExcel->getActiveSheet()->getStyle('D3')->getFont()->setSize(12);
     $objPHPExcel->getActiveSheet()->getStyle('D3')->getFont()->setBold(true);  


     $result = $this->File_master->getAllFiledataSearch($_GET);
     //print_r($result);exit;

     
     $k=4;

     $objPHPExcel->getActiveSheet()->SetCellValue('A'.$k,'Sr.No.');
     $objPHPExcel->getActiveSheet()->SetCellValue('B'.$k,'File No');
     $objPHPExcel->getActiveSheet()->SetCellValue('C'.$k,'File Date');
     $objPHPExcel->getActiveSheet()->SetCellValue('D'.$k,'Client Name');
     $objPHPExcel->getActiveSheet()->SetCellValue('E'.$k,'Nomination Date');
     $objPHPExcel->getActiveSheet()->SetCellValue('F'.$k,'Type Of Job');
     $objPHPExcel->getActiveSheet()->SetCellValue('G'.$k,'Scope of Service');
     $objPHPExcel->getActiveSheet()->SetCellValue('H'.$k,'Cargo Group');
     $objPHPExcel->getActiveSheet()->SetCellValue('I'.$k,'Vessel Name');
     $objPHPExcel->getActiveSheet()->SetCellValue('J'.$k,'Status');
     //$objPHPExcel->getActiveSheet()->SetCellValue('J'.$k,'Status');

     $objPHPExcel->getActiveSheet()->getStyle('A'.$k.':J'.$k)->getFont()->setSize(12);
     $objPHPExcel->getActiveSheet()->getStyle('A'.$k.':J'.$k)->getFont()->setBold(true);

     $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
     $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
     $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
     $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
     $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
     $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
     $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
     $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
     $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
     $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);

     $k=$k+1;
 
    foreach ($result as $file_data) {

        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$k,$k-4);
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$k,$file_data['file_no']);

        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$k,date("d-m-Y", strtotime($file_data['file_creation_date'])));
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$k,$file_data['client_name']);
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$k,date("d-m-Y", strtotime($file_data['nomination_date'])));
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$k,$file_data['import_export']);
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$k,$file_data['scope_of_services']);
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$k,$file_data['cargo_group']);
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$k,$file_data['vessel_name']);
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$k,$file_data['status']);
        //$objPHPExcel->getActiveSheet()->SetCellValue('J'.$k,$file_data['status']);

        $k++;
    }

    $BStyle = array(
      'borders' => array(
        'allborders' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN
        )
      )
    );

    $objPHPExcel->getActiveSheet()->getStyle('A4:J'.($k-1))->applyFromArray($BStyle);
    $objPHPExcel->getActiveSheet()->getStyle('A4:J'.($k-1))->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->getStyle('A4:J'.($k-1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

    //echo $pdf1;exit;
    $filename = "File(Multiple)_Report_". date("Y-m-d-H-i-s").".xlsx";   // csv
    header('Content-Type: application/vnd.ms-excel'); 
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0'); 
    //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
    $objWriter->save('php://output');
       
  }

  
	public function index_new()
	{
		
		if (!isset($_SESSION['userId'])) {
          $login = BASE_PATH."login/";
          redirect($login);
        }

		$this->load->model('File_master');
    $this->load->model('User_master');
    $this->load->model('Client_master');
    $this->load->model('Branch_master'); 

		//$ledger_from_date = '22-03-2021';
		//$ledger_to_date = '22-03-2021';
		#echo '111';exit;
		//print_r($_SESSION);exit;

    $this->load->library('excel');

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);

    $objPHPExcel->getDefaultStyle()
    ->getBorders()
    ->getTop()
        ->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
    $objPHPExcel->getDefaultStyle()
        ->getBorders()
        ->getBottom()
            ->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
    $objPHPExcel->getDefaultStyle()
        ->getBorders()
        ->getLeft()
            ->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
    $objPHPExcel->getDefaultStyle()
        ->getBorders()
        ->getRight()
            ->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);

    
    $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'AgriMin Control International'); // 
    
    if (!empty($_GET['file_from_date'])|| !empty($_GET['file_To_date'])) {
        $objPHPExcel->getActiveSheet()->SetCellValue('C3', 'File(Multiple) Report for the period "'.$_GET['file_from_date'].'" to "'.$_GET['file_To_date'].'"'); 
      } else { 
        $objPHPExcel->getActiveSheet()->SetCellValue('C3', 'File(Multiple) Report for the Selected All period'); 
      } 


	   $result = $this->File_master->getAllFiledataSearch($_GET);
	   //print_r($result);exit;

     
     $k=4;
     $objPHPExcel->getActiveSheet()->SetCellValue('A'.$k,'Sr.No.');
     $objPHPExcel->getActiveSheet()->SetCellValue('B'.$k,'File No');
     $objPHPExcel->getActiveSheet()->SetCellValue('C'.$k,'File Date');
     $objPHPExcel->getActiveSheet()->SetCellValue('D'.$k,'Client Name');
     $objPHPExcel->getActiveSheet()->SetCellValue('E'.$k,'Nomination Date');
     $objPHPExcel->getActiveSheet()->SetCellValue('F'.$k,'Type Of Job');
     $objPHPExcel->getActiveSheet()->SetCellValue('G'.$k,'Scope of Service');
     $objPHPExcel->getActiveSheet()->SetCellValue('H'.$k,'Cargo Group');
     $objPHPExcel->getActiveSheet()->SetCellValue('I'.$k,'Vessel Name');
     $objPHPExcel->getActiveSheet()->SetCellValue('J'.$k,'Status');

     $k=$k+1;
 
    foreach ($result as $file_data) {

        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$k,$k-4);
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$k,$file_data['file_no']);

        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$k,date("d-m-Y", strtotime($file_data['file_creation_date'])));
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$k,$file_data['client_name']);
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$k,date("d-m-Y", strtotime($file_data['nomination_date'])));
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$k,$file_data['import_export']);
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$k,$file_data['scope_of_services']);
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$k,$file_data['cargo_group']);
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$k,$file_data['vessel_name']);
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$k,$file_data['status']);

        $k++;
    }  

    //echo $pdf1;exit;
    $filename = "File(Multiple)_Report_". date("Y-m-d-H-i-s").".csv";
    header('Content-Type: application/vnd.ms-excel'); 
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0'); 
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
    $objWriter->save('php://output');
		   
	}

  public function index_prev()
  {
    
    if (!isset($_SESSION['userId'])) {
          $login = BASE_PATH."login/";
          redirect($login);
        }

    $this->load->model('company_master');
    $this->load->model('branch_master');
    $this->load->model('Vendor_master');
    $this->load->model('User_master');

    $ledger_from_date = '22-03-2021';
    $ledger_to_date = '22-03-2021';
    #echo '111';exit;
    //print_r($_SESSION);exit;

    $this->load->library('excel');

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);

    $objPHPExcel->getDefaultStyle()
    ->getBorders()
    ->getTop()
        ->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
$objPHPExcel->getDefaultStyle()
    ->getBorders()
    ->getBottom()
        ->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
$objPHPExcel->getDefaultStyle()
    ->getBorders()
    ->getLeft()
        ->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
$objPHPExcel->getDefaultStyle()
    ->getBorders()
    ->getRight()
        ->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);

    
    $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'AgriMin Control International'); // 

    $objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Ledger for the period 01 Apr 2020 to 31 Mar, 2021');

    $objPHPExcel->getActiveSheet()->SetCellValue('B5', 'Group : Assets');
    $objPHPExcel->getActiveSheet()->SetCellValue('D5', 'Account Selection : Selected transacted Accounts');
    $objPHPExcel->getActiveSheet()->SetCellValue('J5', '(All amounts in $.)');

    $objPHPExcel->getActiveSheet()->getStyle('D2:J5')->getAlignment()->setWrapText(true); 

    $company_details = $this->company_master->getCompanydatabyid($_SESSION['comp_id']);
    //print_r($company_details);exit;

    $branch_details = $this->branch_master->getBranchdataById($_SESSION['branch_id']);

    $result = $this->Vendor_master->getAllAccountledger();
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
      @$ledger_details[$value['vendor_id']]['balance_amount'] = @$ledger_details[$value['vendor_id']]['credit_amount'] - @$ledger_details[$value['vendor_id']]['debit_amount'];
    }
    //print_r($ledger_details);exit;
    $ledger_info = array();
    //$i = 0;
    foreach ($result as $k => $v) {
      $ledger_info[$v['vendor_name']][$k] = $v;
    }
    #$ledger_info_name = $ledger_info;  
    //print_r($ledger_info);exit;

    //$vendortot_arr = array("1"=>3,"2"=>1);
        //print_r($vendortot_arr);exit;
    $vendor_arr = array();
    $i=7;
    //$j=1;
    #echo $ledger_info[1][0]['vendor'];exit;
    #foreach ($ledger_info as $ledger_data) { 
    foreach ($ledger_info as $ledger_key=>$ledger_data) { $k=$i;
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i,'Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i,'Number');
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i,'Narration');
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i,'Credit');
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$i,'Debit');
        $objPHPExcel->getActiveSheet()->SetCellValue('L'.$i,'Running Balances');
        $j=1;
        foreach ($ledger_data as $p=>$q) {
          if (!in_array(@$q["vendor"],$vendor_arr)) {
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.($k+$j),@$q["vendor"]);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.($k+$j),'Opening Balance');
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.($k+$j),'0.00 Dr.');
          } 
          $objPHPExcel->getActiveSheet()->SetCellValue('B'.($k+$j+1),date('d-m-Y',strtotime($q["vendor_date"])));
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.($k+$j+1),$q["ledger_number"]);
          $objPHPExcel->getActiveSheet()->SetCellValue('F'.($k+$j+1),$q["narration"]);
          $objPHPExcel->getActiveSheet()->SetCellValue('H'.($k+$j+1),$q["credit_amount"]);
          $objPHPExcel->getActiveSheet()->SetCellValue('J'.($k+$j+1),$q["debit_amount"]);
          $objPHPExcel->getActiveSheet()->SetCellValue('L'.($k+$j+1),$j);
          if ($vendortot_arr[$q["vendor_id"]]==$j) {
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.($k+$j+2),'Total Closing Balance');
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.($k+$j+2),@$ledger_details[$q["vendor_id"]]['credit_amount']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.($k+$j+2),@$ledger_details[$q["vendor_id"]]['debit_amount']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.($k+$j+2),@$ledger_details[$q["vendor_id"]]['balance_amount']);
          }  
          array_push($vendor_arr,@$q["vendor"]);
          $vendor_arr = array_unique($vendor_arr);
          $j++;  
        }  
        $i=$i+$j+4;
    }  


    

        //echo $pdf1;exit;
    $filename = "Ledger_Report_". date("Y-m-d-H-i-s").".csv";
    header('Content-Type: application/vnd.ms-excel'); 
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0'); 
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
    $objWriter->save('php://output');
       
  }
	
}

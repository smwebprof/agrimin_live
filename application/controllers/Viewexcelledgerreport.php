<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewexcelledgerreport extends CI_Controller {

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
    
    if (!empty($_GET['ledger_from_date'])|| !empty($_GET['ledger_to_date'])) {
        $objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Ledger for the period "'.$_GET['ledger_from_date'].'" to "'.$_GET['ledger_to_date'].'"'); 
      } else { 
        $objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Ledger for the Selected All period'); 
      } 

    //$objPHPExcel->getActiveSheet()->SetCellValue('B5', 'Group : Assets');
    //$objPHPExcel->getActiveSheet()->SetCellValue('D5', 'Account Selection : Selected transacted Accounts');
    //$objPHPExcel->getActiveSheet()->SetCellValue('J5', '(All amounts in $.)');

    //$objPHPExcel->getActiveSheet()->getStyle('D2:J5')->getAlignment()->setWrapText(true); 

		$company_details = $this->company_master->getCompanydatabyid($_SESSION['comp_id']);
    //print_r($company_details);exit;

    $branch_details = $this->branch_master->getBranchdataById($_SESSION['branch_id']);

		$result = $this->Vendor_master->getAllAccountledgerSearch($_GET);
    //getAllAccountledger
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

    //$vendortot_arr = array("1"=>3,"2"=>1);
        //print_r($vendortot_arr);exit;
    $vendor_arr = array();
    $i=6;
    //$j=1;
    #echo $ledger_info[1][0]['vendor'];exit;
    #foreach ($ledger_info as $ledger_data) {

    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Sr.No.');
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i,'Vendor Name');
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i,'Date');
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i,'Billing Number');
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i,'ACI-Invoice No');
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i,'ACI-Invoice Amount');
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i,'Opening Balance');
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i,'Narration');
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i,'Credit Amount');
    $objPHPExcel->getActiveSheet()->SetCellValue('J'.$i,'Debit Amount');
    $objPHPExcel->getActiveSheet()->SetCellValue('K'.$i,'Running Balances');
    $k=1;
    foreach ($ledger_info as $ledger_key=>$ledger_data) {
      $tot = 0;
      foreach ($ledger_data as $p=>$q) {
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.($k+$i),$q['vendor_name']);

        $objPHPExcel->getActiveSheet()->SetCellValue('A'.($k+$i),$k);
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.($k+$i),$q['vendor']);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.($k+$i),date('d-m-Y',strtotime($q["vendor_date"])));
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.($k+$i),$q['ledger_number']);
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.($k+$i),$q['invoice_no']);
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.($k+$i),$q['invoice_amt']);
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.($k+$i),0);
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.($k+$i),$q['narration']);
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.($k+$i),$q['credit_amount']);
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.($k+$i),$q['debit_amount']);

        if (!empty($q['credit_amount'])) {
          $tot = $q['credit_amount'] + $tot;
        }
        if (!empty($q['debit_amount'])) {
          $tot = $tot - $q['debit_amount'];
        }

        #$objPHPExcel->getActiveSheet()->SetCellValue('K'.($k+$i),abs($tot));
        $objPHPExcel->getActiveSheet()->SetCellValue('K'.($k+$i),$q['balance_amount']);
        $k++;
      }  

     
        
    }  


    

      	//echo $pdf1;exit;
    $filename = "Ledger_Report_". date("Y-m-d-H-i-s").".csv";
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

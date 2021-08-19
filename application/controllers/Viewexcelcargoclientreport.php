<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewexcelcargoclientreport extends CI_Controller {

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
		$this->load->model('Report_master');
		$this->load->model('User_master');

		//$ledger_from_date = '22-03-2021';
		//$ledger_to_date = '22-03-2021';
		#echo '111';exit;
		//print_r($_SESSION);exit;
    //print_r($_GET['cl']);exit;

    $result = $this->Report_master->getCargoClientReportSearch($_GET);
    //print_r($result);exit;
    $tot_approx_unit = 0;
    foreach($result as $key=>$value)
    {
      $tot_approx_unit+= @(float)$value['approx_qty'];
    }
    //echo $tot_approx_unit;exit;

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
		
    $i = 1;    
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Sr.No.');
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i,'Cargo Group');
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i,'Cargo');
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i,'Client Name');
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i,'Quantity');
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i,'Unit');
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i,'Load Port');
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i,'Discharge Port');
    //$objPHPExcel->getActiveSheet()->SetCellValue('I'.$i,'Running Balances');
    $k=1;
    foreach ($result as $result_key=>$result_data) {
      $tot = 0;
 
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.($k+$i),$k);
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.($k+$i),$result_data['cargo_group_name']);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.($k+$i),$result_data['commodity_name']);
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.($k+$i),$result_data['client_name']);
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.($k+$i),$result_data['approx_qty']);
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.($k+$i),$result_data['unit_name']);
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.($k+$i),$result_data['load_port']);
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.($k+$i),$result_data['discharge_port']);

        //$objPHPExcel->getActiveSheet()->SetCellValue('I'.($k+$i),abs($tot));
        $k++;    
        
    }  

        $objPHPExcel->getActiveSheet()->SetCellValue('D'.($k+1),'Total Quantity');
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.($k+1),$tot_approx_unit);


    

      	//echo $pdf1;exit;
    $filename = "Cargo_Client_Report_". date("Y-m-d-H-i-s").".csv";
    header('Content-Type: application/vnd.ms-excel'); 
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0'); 
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
    $objWriter->save('php://output');
		   
	}
  
	
}

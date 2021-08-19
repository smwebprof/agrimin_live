<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewexcelloginlogoutreport extends CI_Controller {

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

		$this->load->model('User_master');

		//print_r($_SESSION);exit;

        $this->load->library('excel');

        if (empty($_GET['login_from_date']) || empty($_GET['login_to_date'])) {
            $pt = date('d-m-Y', strtotime('-1 month'));
            $login_yr = $_SESSION['operatingyear'];
            $_GET['login_to_date'] = date('d-m-Y');
            $_GET['login_from_date'] = $pt;
            //print_r($_GET);exit;
        }    

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'AgriMin Control International'); // 

        //$objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Login Information for the period 01 Apr 2020 to 31 Mar, 2021');
        $objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Login Information As Below');

	   $result = $this->User_master->getAllLogindataSearch($_GET);
       //print_r($result);exit;    	  

       $i=6;
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Sr.No.');
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i,'User Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i,'Login Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i,'Logout Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i,'Branch');

        $k=1;
        foreach ($result as $key=>$data) {
  
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.($k+$i),$k);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.($k+$i),@$data['first_name'].' '.@$data['last_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.($k+$i),date('d-m-Y H:i:s',strtotime(@$data['login_date'])));
            if (@$data['logout_date']=='0000-00-00 00:00:00') { $objPHPExcel->getActiveSheet()->SetCellValue('D'.($k+$i),'Session Expire'); }  else { $objPHPExcel->getActiveSheet()->SetCellValue('D'.($k+$i),date('d-m-Y H:i:s',strtotime(@$data['logout_date']))); }
            /*if (!empty(strtotime(@$data['logout_date']))) {
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.($k+$i),date('d-m-Y',strtotime(@$data['logout_date'])));    
            } else {
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.($k+$i),'N.A.');   
            }*/    

            $objPHPExcel->getActiveSheet()->SetCellValue('E'.($k+$i),@$data['branch_name']);

            $k++;  
        
    }  


    

      	//echo $pdf1;exit;
    $filename = "Login_Report_". date("Y-m-d-H-i-s").".csv";
    header('Content-Type: application/vnd.ms-excel'); 
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0'); 
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
    $objWriter->save('php://output');
		   
	}
	
}

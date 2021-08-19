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
    
    class Downloadformswithxls extends CI_Controller {


    public function index()
    {
        //load our new PHPExcel library
        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('test worksheet');
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
        //change the font size
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        //merge cell A1 until D1
        $this->excel->getActiveSheet()->mergeCells('A1:D1');
        //set aligment to center for that merged cell (A1 to D1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
         
        $filename='just_some_random_name.xls'; //save our workbook as this file name
        #header('Content-Type: application/vnd.ms-excel'); //mime type
        #header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        #header('Cache-Control: max-age=0'); //no cache
                    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        #$objWriter->save('php://output');
        $objWriter->save(str_replace(__FILE__,'uploads/just_some_random_name.xls',__FILE__));

    }

    public function form_type_fosfa_niop()
    {
        
        $this->load->model('File_master');
        $this->load->model('Operation_master');
        $this->load->model('Cargo_Group_master');
        $id = base64_decode($_GET['fl_no']);
        //load our new PHPExcel library
        $this->load->library('excel');

        $result = $this->Operation_master->getOperationsdata($id);
        //print_r($result);exit;
        if ($result[0]['file_no_type']!='Inspection') {
        $cargogroup = $this->Cargo_Group_master->getCargoGroupByIdMult($result[0]['cargo_group_id']);
        //print_r($cargogroup);exit;

        $cargo_details = $this->File_master->editFileCargoDetailsById($result[0]['id']);
        //print_r($cargo_details);exit;

        $commodity_name = implode(', ', array_column($cargo_details, 'commodity_name'));
        $commodity_arr = explode(",", $commodity_name);

        $load_port = implode(', ', array_column($cargo_details, 'load_port'));
        $load_port_arr = explode(",", $load_port);

        $discharge_port = implode(', ', array_column($cargo_details, 'discharge_port'));
        $discharge_port_arr = explode(",", $discharge_port);
        }

        $fileType = 'Excel2007';
        $fileName = 'report_formats/FOSFA_NIOP_DOCS_AMI_ACI.xlsx';

        // Read the file
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel = $objReader->load($fileName);

        // Change the file
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F3', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F4', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F10', $commodity_name);            
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('J15', $load_port);
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('J16', $discharge_port);
        }            
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('J18', $result[0]['client_name']); 

        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('C2', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('C3', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('H7', $cargogroup[0]['name']); 
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('E9', $load_port);
        }
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('E10', $result[0]['client_name']);                        

        $objPHPExcel->setActiveSheetIndex(2)
                    ->setCellValue('B6', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(2)
                    ->setCellValue('N6', $result[0]['voyage_no']);  

        $objPHPExcel->setActiveSheetIndex(3)
                    ->setCellValue('D14', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(3)
                    ->setCellValue('D16', $result[0]['voyage_no']);  
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(3)
                    ->setCellValue('D18', $load_port);
        $objPHPExcel->setActiveSheetIndex(3)
                    ->setCellValue('D22', $discharge_port);
        $objPHPExcel->setActiveSheetIndex(3)
                    ->setCellValue('D26', $commodity_name);
        }            
        $objPHPExcel->setActiveSheetIndex(3)
                    ->setCellValue('H50', $result[0]['vessel_name']);

        $objPHPExcel->setActiveSheetIndex(4)
                    ->setCellValue('E6', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(4)
                    ->setCellValue('J6', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(4)
                    ->setCellValue('E12', $load_port);
        $objPHPExcel->setActiveSheetIndex(4)
                    ->setCellValue('L12', $discharge_port);
        $objPHPExcel->setActiveSheetIndex(4)
                    ->setCellValue('J10', $cargogroup[0]['name']);
        }
        $objPHPExcel->setActiveSheetIndex(4)
                    ->setCellValue('G14', $result[0]['client_name']);
         


        $objPHPExcel->setActiveSheetIndex(5)
                    ->setCellValue('E7', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(5)
                    ->setCellValue('J7', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(5)
                    ->setCellValue('E17', $load_port);
        $objPHPExcel->setActiveSheetIndex(5)
                    ->setCellValue('E19', $discharge_port);
        $objPHPExcel->setActiveSheetIndex(5)
                    ->setCellValue('E11', $cargogroup[0]['name']); 
        }                        
        $objPHPExcel->setActiveSheetIndex(5)
                    ->setCellValue('E15', $result[0]['client_name']);

        $objPHPExcel->setActiveSheetIndex(6)
                    ->setCellValue('N5', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(6)
                    ->setCellValue('N6', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {            
        $objPHPExcel->setActiveSheetIndex(6)
                    ->setCellValue('N9', $load_port);
        //$objPHPExcel->setActiveSheetIndex(6)
                    //->setCellValue('E19', $cargo_details[0]['discharge_port']);
        $objPHPExcel->setActiveSheetIndex(6)
                    ->setCellValue('W7', $cargogroup[0]['name']); 
        $objPHPExcel->setActiveSheetIndex(6)
                    ->setCellValue('G61', $cargogroup[0]['name']);
        }            
        $objPHPExcel->setActiveSheetIndex(6)
                    ->setCellValue('N10', $result[0]['client_name']);

        $objPHPExcel->setActiveSheetIndex(7)
                    ->setCellValue('C3', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(7)
                    ->setCellValue('AC3', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(7)
                    ->setCellValue('L11', $load_port);
        $objPHPExcel->setActiveSheetIndex(7)
                    ->setCellValue('AE11', $discharge_port);
        //$objPHPExcel->setActiveSheetIndex(7)
                    //->setCellValue('W7', $cargogroup[0]['name']); 
        $objPHPExcel->setActiveSheetIndex(7)
                    ->setCellValue('AC9', $cargogroup[0]['name']);
        }
        $objPHPExcel->setActiveSheetIndex(7)
                    ->setCellValue('J16', $result[0]['client_name']);


        $objPHPExcel->setActiveSheetIndex(8)
                    ->setCellValue('J4', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(8)
                    ->setCellValue('AH4', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(8)
                    ->setCellValue('J6', $load_port);
        $objPHPExcel->setActiveSheetIndex(8)
                    ->setCellValue('J14', $discharge_port);
        //$objPHPExcel->setActiveSheetIndex(8)
                    //->setCellValue('W7', $cargogroup[0]['name']); 
        $objPHPExcel->setActiveSheetIndex(8)
                    ->setCellValue('J12', $cargogroup[0]['name']);
        }
        $objPHPExcel->setActiveSheetIndex(8)
                    ->setCellValue('J16', $result[0]['client_name']);


        $objPHPExcel->setActiveSheetIndex(9)
                    ->setCellValue('F5', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(9)
                    ->setCellValue('T5', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(9)
                    ->setCellValue('J13', $load_port);
        $objPHPExcel->setActiveSheetIndex(9)
                    ->setCellValue('U13', $discharge_port);
        //$objPHPExcel->setActiveSheetIndex(9)
                    //->setCellValue('W7', $cargogroup[0]['name']); 
        $objPHPExcel->setActiveSheetIndex(9)
                    ->setCellValue('T11', $cargogroup[0]['name']);
        }
        $objPHPExcel->setActiveSheetIndex(9)
                    ->setCellValue('I18', $result[0]['client_name']);


        $objPHPExcel->setActiveSheetIndex(10)
                    ->setCellValue('G7', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(10)
                    ->setCellValue('Q7', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(10)
                    ->setCellValue('G17', $load_port);
        $objPHPExcel->setActiveSheetIndex(10)
                    ->setCellValue('G19', $discharge_port);        
        //$objPHPExcel->setActiveSheetIndex(10)
                    //->setCellValue('W7', $cargogroup[0]['name']); 
        $objPHPExcel->setActiveSheetIndex(10)
                    ->setCellValue('G11', $cargogroup[0]['name']);
        }
        $objPHPExcel->setActiveSheetIndex(10)
                    ->setCellValue('G15', $result[0]['client_name']); 


        $objPHPExcel->setActiveSheetIndex(11)
                    ->setCellValue('G6', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(11)
                    //->setCellValue('Q7', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(11)
                    ->setCellValue('M8', $load_port);
        //$objPHPExcel->setActiveSheetIndex(11)
                    //->setCellValue('G19', $cargo_details[0]['discharge_port']);
        //$objPHPExcel->setActiveSheetIndex(11)
                    //->setCellValue('G15', $result[0]['client_name']);
        //$objPHPExcel->setActiveSheetIndex(11)
                    //->setCellValue('W7', $cargogroup[0]['name']); 
        $objPHPExcel->setActiveSheetIndex(11)
                    ->setCellValue('W52', $cargogroup[0]['name']); 
        }            


        $objPHPExcel->setActiveSheetIndex(12)
                    ->setCellValue('K11', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(12)
                    ->setCellValue('Y11', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(12)
                    ->setCellValue('K15', $load_port);
        $objPHPExcel->setActiveSheetIndex(12)
                    ->setCellValue('K19', $discharge_port);        
        //$objPHPExcel->setActiveSheetIndex(12)
                    //->setCellValue('W7', $cargogroup[0]['name']); 
        $objPHPExcel->setActiveSheetIndex(12)
                    ->setCellValue('R13', $cargogroup[0]['name']);
        $objPHPExcel->setActiveSheetIndex(12)
                    ->setCellValue('G46', $load_port); 
        }
        $objPHPExcel->setActiveSheetIndex(12)
                    ->setCellValue('K23', $result[0]['client_name']); 


        $objPHPExcel->setActiveSheetIndex(13)
                    ->setCellValue('G11', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(13)
                    //->setCellValue('Y11', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(13)
                    ->setCellValue('F39', $load_port);
        //$objPHPExcel->setActiveSheetIndex(13)
                    //->setCellValue('K19', $cargo_details[0]['discharge_port']);
        //$objPHPExcel->setActiveSheetIndex(13)
                    //->setCellValue('W7', $cargogroup[0]['name']); 
        $objPHPExcel->setActiveSheetIndex(13)
                    ->setCellValue('F22', $cargogroup[0]['name']);
        }
        $objPHPExcel->setActiveSheetIndex(13)
                    ->setCellValue('B22', $result[0]['client_name']);
        $objPHPExcel->setActiveSheetIndex(13)
                    ->setCellValue('X38', $result[0]['vessel_name']);


       $objPHPExcel->setActiveSheetIndex(14)
                    ->setCellValue('E11', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(14)
                    //->setCellValue('Y11', $result[0]['voyage_no']);
        //$objPHPExcel->setActiveSheetIndex(14)
                    //->setCellValue('K15', $cargo_details[0]['load_port']);
        //$objPHPExcel->setActiveSheetIndex(14)
                    //->setCellValue('K19', $cargo_details[0]['discharge_port']);
        $objPHPExcel->setActiveSheetIndex(14)
                    ->setCellValue('E15', $result[0]['client_name']);
        //$objPHPExcel->setActiveSheetIndex(14)
                    //->setCellValue('W7', $cargogroup[0]['name']); 
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(14)
                    ->setCellValue('E13', $cargogroup[0]['name']);
        }


        $objPHPExcel->setActiveSheetIndex(15)
                    ->setCellValue('B13', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(15)
                    ->setCellValue('W13', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(15)
                    ->setCellValue('D15', $load_port);
        //$objPHPExcel->setActiveSheetIndex(15)
                    //->setCellValue('K19', $cargo_details[0]['discharge_port']);
        //$objPHPExcel->setActiveSheetIndex(15)
                    //->setCellValue('W7', $cargogroup[0]['name']); 
        $objPHPExcel->setActiveSheetIndex(15)
                    ->setCellValue('G22', $cargogroup[0]['name']); 
        }
        $objPHPExcel->setActiveSheetIndex(15)
                    ->setCellValue('P20', $result[0]['client_name']);


        $objPHPExcel->setActiveSheetIndex(16)
                    ->setCellValue('X21', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(16)
                    //->setCellValue('W13', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(16)
                    ->setCellValue('G12', $load_port);
        //$objPHPExcel->setActiveSheetIndex(16)
                    //->setCellValue('K19', $cargo_details[0]['discharge_port']);
        //$objPHPExcel->setActiveSheetIndex(16)
                    //->setCellValue('W7', $cargogroup[0]['name']); 
        $objPHPExcel->setActiveSheetIndex(16)
                    ->setCellValue('G22', $cargogroup[0]['name']); 
        }
        $objPHPExcel->setActiveSheetIndex(16)
                    ->setCellValue('G11', $result[0]['client_name']);

        // Write the file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
        $objWriter->save('uploads/FOSFA_NIOP_DOCS_AMI_ACI.xlsx');

        $file_download = APP_PATH.'/uploads/FOSFA_NIOP_DOCS_AMI_ACI.xlsx';

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file_download).'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_download));
        flush();
        readfile($file_download);
        unlink($file_download); // deletes the temporary file
        exit;


    } 

    public function form_type_fosfa()
    {

        $this->load->model('File_master');
        $this->load->model('Operation_master');
        $id = base64_decode($_GET['fl_no']);
        //load our new PHPExcel library
        $this->load->library('excel');

        $result = $this->Operation_master->getOperationsdata($id);
        //print_r($result);exit;
        $cargo_details = $this->File_master->editFileCargoDetailsById($result[0]['id']);
        //print_r($cargo_details);exit;

        $commodity_name = implode(', ', array_column($cargo_details, 'commodity_name'));
        $commodity_arr = explode(",", $commodity_name);

        $load_port = implode(', ', array_column($cargo_details, 'load_port'));
        $load_port_arr = explode(",", $load_port);

        $discharge_port = implode(', ', array_column($cargo_details, 'discharge_port'));
        $discharge_port_port_arr = explode(",", $discharge_port);

        $fileType = 'Excel2007';
        $fileName = 'report_formats/FOSFA_DOCS_AMI_ACI.xlsx';

        // Read the file
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel = $objReader->load($fileName);

        // Change the file
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F3', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F4', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F18', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F15', $load_port);
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F16', $discharge_port);  
        }          
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F20', $result[0]['client_name']);  

        $objPHPExcel->setActiveSheetIndex(11)
                    ->setCellValue('G11', $result[0]['client_name']); 
        if ($result[0]['file_no_type']!='Inspection') { 
        $objPHPExcel->setActiveSheetIndex(11)
                    ->setCellValue('G12', $discharge_port);  
        $objPHPExcel->setActiveSheetIndex(11)
                    ->setCellValue('I21', $commodity_name); 
        $objPHPExcel->setActiveSheetIndex(11)
                    ->setCellValue('P22', $load_port); 
        }  
        $objPHPExcel->setActiveSheetIndex(11)
                    ->setCellValue('AA20', $result[0]['client_name']);   


        // Write the file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
        $objWriter->save('uploads/FOSFA_DOCS_AMI_ACI.xlsx');

        $file_download = APP_PATH.'/uploads/FOSFA_DOCS_AMI_ACI.xlsx';

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file_download).'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_download));
        flush();
        readfile($file_download);
        unlink($file_download); // deletes the temporary file
        exit;


    } 

    public function form_type_pme_doc()
    {

        $this->load->model('File_master');
        $this->load->model('Operation_master');
        $this->load->model('Cargo_Group_master');
        $id = base64_decode($_GET['fl_no']);
        //load our new PHPExcel library
        $this->load->library('excel');

        $result = $this->Operation_master->getOperationsdata($id);
        //print_r($result);exit;

        //$cargogroup = $this->Cargo_Group_master->getCargoGroupById($result[0]['cargo_group_id']);
        $cargogroup = $this->Cargo_Group_master->getCargoGroupByIdMult($result[0]['cargo_group_id']);

        $cargo_details = $this->File_master->editFileCargoDetailsById($result[0]['id']);
        //print_r($cargo_details);exit;

        $commodity_name = implode(', ', array_column($cargo_details, 'commodity_name'));
        $commodity_arr = explode(",", $commodity_name);

        $load_port = implode(', ', array_column($cargo_details, 'load_port'));
        $load_port_arr = explode(",", $load_port);

        $discharge_port = implode(', ', array_column($cargo_details, 'discharge_port'));
        $discharge_port_port_arr = explode(",", $discharge_port);

        $fileType = 'Excel2007';
        $fileName = 'report_formats/PME_DOCUMENTS.xlsx';

        // Read the file
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel = $objReader->load($fileName);

        // Change the file
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F3', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F4', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F27', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('BA28', $load_port);
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('BA29', $discharge_port);           
        }            
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F26', $result[0]['client_name']);

      
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('G6', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('X6', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {            
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('H9', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('H11', $load_port);
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('AH11', $discharge_port);
        }            
        //$objPHPExcel->setActiveSheetIndex(1)
                    //->setCellValue('I19',$result[]['client_name']);


        $objPHPExcel->setActiveSheetIndex(2)
                    ->setCellValue('B11', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(2)
                    ->setCellValue('G12', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(2)
                    ->setCellValue('K19', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(2)
                    ->setCellValue('K25', $load_port);
        $objPHPExcel->setActiveSheetIndex(2)
                    ->setCellValue('K27', $discharge_port);
        }
        //$objPHPExcel->setActiveSheetIndex(2)
                    //->setCellValue('I19',$result[0]['client_name']);



        $objPHPExcel->setActiveSheetIndex(3)
                    ->setCellValue('I14', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(3)
                    //->setCellValue('S7', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(3)
                    ->setCellValue('I16', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(3)
                    ->setCellValue('I15', $load_port);
        //$objPHPExcel->setActiveSheetIndex(3)
                    //->setCellValue('G19', $cargo_details[0]['discharge_port']);
        }            
        $objPHPExcel->setActiveSheetIndex(3)
                    ->setCellValue('I19',$result[0]['client_name']);


        $objPHPExcel->setActiveSheetIndex(4)
                    ->setCellValue('G7', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(4)
                    ->setCellValue('S7', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(4)
                    ->setCellValue('G11', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(4)
                    ->setCellValue('G17', $load_port);
        $objPHPExcel->setActiveSheetIndex(4)
                    ->setCellValue('G19', $discharge_port);
        }
        $objPHPExcel->setActiveSheetIndex(4)
                    ->setCellValue('G15',$result[0]['client_name']);


        $objPHPExcel->setActiveSheetIndex(5)
                    ->setCellValue('L16', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(5)
                    ->setCellValue('L18', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        //$objPHPExcel->setActiveSheetIndex(5)
                    //->setCellValue('R14', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(5)
                    ->setCellValue('L20', $load_port);
        $objPHPExcel->setActiveSheetIndex(5)
                    ->setCellValue('L22', $discharge_port);
        }
        $objPHPExcel->setActiveSheetIndex(5)
                    ->setCellValue('L24',$result[0]['client_name']);



        $objPHPExcel->setActiveSheetIndex(6)
                    ->setCellValue('J12', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(6)
                    ->setCellValue('J13', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(6)
                    ->setCellValue('R14', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(6)
                    ->setCellValue('J16', $load_port);
        //$objPHPExcel->setActiveSheetIndex(6)
                    //->setCellValue('K21', $cargo_details[0]['discharge_port']);
        }
        $objPHPExcel->setActiveSheetIndex(6)
                    ->setCellValue('J17',$result[0]['client_name']);


        $objPHPExcel->setActiveSheetIndex(7)
                    ->setCellValue('K13', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(7)
                    ->setCellValue('Y13', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(7)
                    ->setCellValue('R15', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(7)
                    ->setCellValue('K17', $load_port);
        $objPHPExcel->setActiveSheetIndex(7)
                    ->setCellValue('K21', $discharge_port);
        }
        $objPHPExcel->setActiveSheetIndex(7)
                    ->setCellValue('K25',$result[0]['client_name']);             

       
        $objPHPExcel->setActiveSheetIndex(8)
                    ->setCellValue('K11', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(8)
                    ->setCellValue('K12', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(8)
                    ->setCellValue('K13', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(8)
                    ->setCellValue('K16', $discharge_port);
        }
        $objPHPExcel->setActiveSheetIndex(8)
                    ->setCellValue('K17', $result[0]['client_name']);
        $objPHPExcel->setActiveSheetIndex(8)
                    ->setCellValue('K18', date('d-m-Y'));



        $objPHPExcel->setActiveSheetIndex(9)
                    ->setCellValue('E14', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(9)
                    ->setCellValue('R14', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        //$objPHPExcel->setActiveSheetIndex(9)
                    //->setCellValue('F27', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(9)
                    ->setCellValue('E16', $load_port);
        }
        $objPHPExcel->setActiveSheetIndex(9)
                    ->setCellValue('F26', $result[0]['client_name']);

        
        $objPHPExcel->setActiveSheetIndex(10)
                    ->setCellValue('E11', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(10)
                    ->setCellValue('R11', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(10)
                    ->setCellValue('E13', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(10)
                    ->setCellValue('E12', $load_port);
        }
        //$objPHPExcel->setActiveSheetIndex(10)
                    //->setCellValue('K17', $result[0]['client_name']);



        $objPHPExcel->setActiveSheetIndex(11)
                    ->setCellValue('B13', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(11)
                    ->setCellValue('W13', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        //$objPHPExcel->setActiveSheetIndex(11)
                    //->setCellValue('G22', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(11)
                    ->setCellValue('D15', $load_port);        
        $objPHPExcel->setActiveSheetIndex(11)
                    ->setCellValue('G22', $commodity_name);
        }
        $objPHPExcel->setActiveSheetIndex(11)
                    ->setCellValue('Q20', $result[0]['client_name']);
        $objPHPExcel->setActiveSheetIndex(8)
                    ->setCellValue('W15', date('d-m-Y'));


        $objPHPExcel->setActiveSheetIndex(13)
                    ->setCellValue('I9', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(13)
                    //->setCellValue('W13', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        //$objPHPExcel->setActiveSheetIndex(13)
                    //->setCellValue('G22', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(13)
                    ->setCellValue('I10', $load_port);
        //$objPHPExcel->setActiveSheetIndex(13)
                    //->setCellValue('Q20', $result[0]['client_name']);
        $objPHPExcel->setActiveSheetIndex(13)
                    ->setCellValue('I11', $cargogroup[0]['name']); 
        }


        $objPHPExcel->setActiveSheetIndex(14)
                    ->setCellValue('F11', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(14)
                    //->setCellValue('R11', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(14)
                    ->setCellValue('F13', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(14)
                    ->setCellValue('F12', $load_port);
        }
        //$objPHPExcel->setActiveSheetIndex(14)
                    //->setCellValue('K17', $result[0]['client_name']);

        $objPHPExcel->setActiveSheetIndex(15)
                    ->setCellValue('E3', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(15)
                    ->setCellValue('Q3', $result[0]['voyage_no']);
        //$objPHPExcel->setActiveSheetIndex(15)
                    //->setCellValue('F13', $commodity_name);         
        //$objPHPExcel->setActiveSheetIndex(15)
                    //->setCellValue('F12', $cargo_details[0]['load_port']);
        //$objPHPExcel->setActiveSheetIndex(15)
                    //->setCellValue('K17', $result[0]['client_name']); 


        $objPHPExcel->setActiveSheetIndex(16)
                    ->setCellValue('G9', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(16)
                    //->setCellValue('Q3', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(16)
                    ->setCellValue('G11', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(16)
                    ->setCellValue('G10', $load_port);
        }
        //$objPHPExcel->setActiveSheetIndex(16)
                    //->setCellValue('K17', $result[0]['client_name']); 


        $objPHPExcel->setActiveSheetIndex(17)
                    ->setCellValue('G11', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(17)
                    //->setCellValue('Q3', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(17)
                    ->setCellValue('G13', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(17)
                    ->setCellValue('G12', $load_port);
        }
        //$objPHPExcel->setActiveSheetIndex(17)
                    //->setCellValue('K17', $result[0]['client_name']); 


        $objPHPExcel->setActiveSheetIndex(18)
                    ->setCellValue('H9', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(18)
                    //->setCellValue('Q3', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(18)
                    ->setCellValue('H11', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(18)
                    ->setCellValue('H10', $load_port);
        }
        //$objPHPExcel->setActiveSheetIndex(18)
                    //->setCellValue('K17',$result[]['client_name']);

        $objPHPExcel->setActiveSheetIndex(19)
                    ->setCellValue('G9', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(19)
                    //->setCellValue('Q3', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(19)
                    ->setCellValue('G11', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(19)
                    ->setCellValue('G10', $load_port);
        }
        //$objPHPExcel->setActiveSheetIndex(19)
                    //->setCellValue('K17',$result[]['client_name']);                                                                               



        // Write the file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
        $objWriter->save('uploads/PME_DOCUMENTS.xlsx');

        $file_download = APP_PATH.'/uploads/PME_DOCUMENTS.xlsx';

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file_download).'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_download));
        flush();
        readfile($file_download);
        unlink($file_download); // deletes the temporary file
        exit;


    }

    public function form_type_pme_shore_calc()
    {

        $this->load->model('File_master');
        $this->load->model('Operation_master');
        $id = base64_decode($_GET['fl_no']);
        //load our new PHPExcel library
        $this->load->library('excel');

        $result = $this->Operation_master->getOperationsdata($id);
        //print_r($result);exit;
        $cargo_details = $this->File_master->editFileCargoDetailsById($result[0]['id']);
        //print_r($cargo_details);exit;

        $commodity_name = implode(', ', array_column($cargo_details, 'commodity_name'));
        $commodity_arr = explode(",", $commodity_name);

        $fileType = 'Excel5';
        $fileName = 'report_formats/PME_SHORE_CALCULATION.xls';

        // Read the file
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel = $objReader->load($fileName);

        // Change the file
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('L9', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(0)
                    //->setCellValue('L10', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('L11', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('L10', $cargo_details[0]['load_port']);
        }
        //$objPHPExcel->setActiveSheetIndex(0)
                    //->setCellValue('F26', $result[0]['client_name']);            

        // Write the file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
        $objWriter->save('uploads/PME_SHORE_CALCULATION.xls');

        $file_download = APP_PATH.'/uploads/PME_SHORE_CALCULATION.xls';

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file_download).'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_download));
        flush();
        readfile($file_download);
        unlink($file_download); // deletes the temporary file
        exit;


    }

    public function form_type_sealing_report()
    {
        $this->load->model('File_master');
        $this->load->model('Operation_master');
        $id = base64_decode($_GET['fl_no']);
        //load our new PHPExcel library
        $this->load->library('excel');

        $result = $this->Operation_master->getOperationsdata($id);
        //print_r($result);exit;
        $cargo_details = $this->File_master->editFileCargoDetailsById($result[0]['id']);
        //print_r($cargo_details);exit;

        $commodity_name = implode(', ', array_column($cargo_details, 'commodity_name'));
        $commodity_arr = explode(",", $commodity_name);

        $fileType = 'Excel5';
        $fileName = 'report_formats/SEALING_REPORT_AMI_ACI.xls';

        // Read the file
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel = $objReader->load($fileName);

        // Change the file
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('C14', $result[0]['vessel_name']);
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F14', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('C16', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('C15', $cargo_details[0]['load_port']);
        }
        //$objPHPExcel->setActiveSheetIndex(0)
                    //->setCellValue('F26', $result[0]['client_name']);            

        // Write the file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
        $objWriter->save('uploads/SEALING_REPORT_AMI_ACI.xls');

        $file_download = APP_PATH.'/uploads/SEALING_REPORT_AMI_ACI.xls';

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file_download).'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_download));
        flush();
        readfile($file_download);
        unlink($file_download); // deletes the temporary file
        exit;


    }

    public function form_type_pme_ullage_report()
    {

        $this->load->model('File_master');
        $this->load->model('Operation_master');
        $id = base64_decode($_GET['fl_no']);
        //load our new PHPExcel library
        $this->load->library('excel');

        $result = $this->Operation_master->getOperationsdata($id);
        //print_r($result);exit;
        $cargo_details = $this->File_master->editFileCargoDetailsById($result[0]['id']);
        //print_r($cargo_details);exit;

        $commodity_name = implode(', ', array_column($cargo_details, 'commodity_name'));
        $commodity_arr = explode(",", $commodity_name);

        $fileType = 'Excel5';
        $fileName = 'report_formats/PME_ULLAGE_REPORT.xls';

        // Read the file
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel = $objReader->load($fileName);

        // Change the file
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('I9', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(0)
                    //->setCellValue('F14', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('I11', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('I10', $cargo_details[0]['load_port']);
        }
        //$objPHPExcel->setActiveSheetIndex(0)
                    //->setCellValue('F26', $result[0]['client_name']);            

        // Write the file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
        $objWriter->save('uploads/PME_ULLAGE_REPORT.xls');

        $file_download = APP_PATH.'/uploads/PME_ULLAGE_REPORT.xls';

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file_download).'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_download));
        flush();
        readfile($file_download);
        unlink($file_download); // deletes the temporary file
        exit;


    }

    public function form_type_ullage_report_shore()
    {

        $this->load->model('File_master');
        $this->load->model('Operation_master');
        $id = base64_decode($_GET['fl_no']);
        //load our new PHPExcel library
        $this->load->library('excel');

        $result = $this->Operation_master->getOperationsdata($id);
        //print_r($result);exit;
        $cargo_details = $this->File_master->editFileCargoDetailsById($result[0]['id']);
        //print_r($cargo_details);exit;

        $commodity_name = implode(', ', array_column($cargo_details, 'commodity_name'));
        $commodity_arr = explode(",", $commodity_name);

        $fileType = 'Excel5';
        $fileName = 'report_formats/ULLAGE_REPORT_&_SHORE_CALCULATION_AMI_ACI.xls';

        // Read the file
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel = $objReader->load($fileName);

        // Change the file
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('C12', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(0)
                    //->setCellValue('F14', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('C11', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('B49', $cargo_details[0]['load_port']);
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('C13', $cargo_details[0]['discharge_port']); 
        }           
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('C10', $result[0]['client_name']); 


        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('C10', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(0)
                    //->setCellValue('F14', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('C14', $commodity_name);         
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('C11', $cargo_details[0]['load_port']);
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('C12', $cargo_details[0]['discharge_port']); 
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('B44', $cargo_details[0]['load_port']);
        }
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('C16', $result[0]['client_name']);
                                           

        // Write the file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
        $objWriter->save('uploads/ULLAGE_REPORT_&_SHORE_CALCULATION_AMI_ACI.xls');

        $file_download = APP_PATH.'/uploads/ULLAGE_REPORT_&_SHORE_CALCULATION_AMI_ACI.xls';

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file_download).'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_download));
        flush();
        readfile($file_download);
        unlink($file_download); // deletes the temporary file
        exit;


    }

    public function form_type_vfi_ami_aci()
    {

        $this->load->model('File_master');
        $this->load->model('Operation_master');
        $this->load->model('Cargo_Group_master');
        $id = base64_decode($_GET['fl_no']);
        //load our new PHPExcel library
        $this->load->library('excel');

        $result = $this->Operation_master->getOperationsdata($id);
        //print_r($result);exit;

        $cargogroup = $this->Cargo_Group_master->getCargoGroupByIdMult($result[0]['cargo_group_id']);
        //print_r($cargogroup);exit;

        $cargo_details = $this->File_master->editFileCargoDetailsById($result[0]['id']);
        //print_r($cargo_details);exit;

        $commodity_name = implode(', ', array_column($cargo_details, 'commodity_name'));
        $commodity_arr = explode(",", $commodity_name);

        $fileType = 'Excel5';
        $fileName = 'report_formats/VEF_AMI_ACI.xls';

        // Read the file
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel = $objReader->load($fileName);

        // Change the file
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('G9', $result[0]['vessel_name']);
        //$objPHPExcel->setActiveSheetIndex(0)
                    //->setCellValue('G10', $result[0]['voyage_no']);
        if ($result[0]['file_no_type']!='Inspection') {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('G11', $cargogroup[0]['name']);         
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('G10', $cargo_details[0]['load_port']);
        }
        //$objPHPExcel->setActiveSheetIndex(0)
                    //->setCellValue('F26', $result[0]['client_name']);
        
        if ($result[0]['file_no_type']!='Inspection') {
        $i=23;
        $j=0;
        foreach ($cargo_details as $key => $value) {
                $v_col = 'A'.$i;
                $p_col = 'B'.$i;
                $c_col = 'C'.$i;
                $q_col = 'F'.$i;
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($v_col, $result[0]['voyage_no']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($p_col, $cargo_details[$j]['load_port']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($c_col, $cargo_details[$j]['commodity_name']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($q_col, $cargo_details[$j]['approx_qty']);

                $j++; 
                $i++;                   
        } 
        }                       

        // Write the file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
        $objWriter->save('uploads/VEF_AMI_ACI.xls');

        $file_download = APP_PATH.'/uploads/VEF_AMI_ACI.xls';

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file_download).'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_download));
        flush();
        readfile($file_download);
        unlink($file_download); // deletes the temporary file
        exit;


    }


    public function viewexcel()
    {
        //load our new PHPExcel library
        $this->load->library('excel');

        $fileType = 'Excel5';
        $fileName = 'uploads/FOSFA_DOCS_AMI_ACI.xls';

        // Read the file
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel = $objReader->load($fileName);

        // Change the file
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F3', 'M.V.STRAITS BAY123');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F4', 'V 061E123');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F15', 'INDONESIA,LUBUK GAUNG');                        

        // Write the file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
        $objWriter->save($fileName);


    }  

    public function viewexcel2()
    {
        //load our new PHPExcel library
        $this->load->library('excel');

        $fileType = 'Excel5';
        $fileName = 'uploads/ULLAGE_REPORT_&_SHORE_CALCULATION_AMI_ACI.xls';

        // Read the file
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel = $objReader->load($fileName);

        // Change the file
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('D11', 'M.V.STRAITS BAY123');
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('D14', 'M.V.STRAITS BAY123');            
        /*$objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F4', 'V 061E123');
        //$objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('F15', 'INDONESIA,LUBUK GAUNG'); */                      

        // Write the file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
        $objWriter->save($fileName);


    } 


    }
    
?>
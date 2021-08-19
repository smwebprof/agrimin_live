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
    
    class Downloadformswithdoc extends CI_Controller {


    public function index()
    {
        //load our new PHPExcel library
        $this->load->library('Phpword');
        
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->getCompatibility()->setOoxmlVersion(14);
        $phpWord->getCompatibility()->setOoxmlVersion(15);

        $targetFile = "./uploads/";
        $filename = 'test.docx';

        // add style settings for the title and paragraph
        foreach($news as $n){

            $section = $phpWord->addSection();
            $section->addText($n['ne_title'], array('bold' => true,'underline' => 'single','name'=> 'arial','size' => 21,'color' =>'red'),array('align' => 'center', 'spaceAfter' => 10));
            $section->addTextBreak(1);
            if(!empty($n['ne_img'])){
                $section->addImage($targetFile.$n['ne_img'], array('align' => 'center','width'=>200, 'height'=>200));
            }
            $section->addTextBreak(1);
            $section->addText($n['ne_desc'], array('name'=> 'arial','size' => 14),array('align' => 'left', 'spaceAfter' => 100));
        }
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($filename);
        // send results to browser to download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        flush();
        readfile($filename);
        unlink($filename); // deletes the temporary file
        exit;

    }

    public function view()
    {

        //load our new PHPExcel library
        $this->load->library('Phpword');
        
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->getCompatibility()->setOoxmlVersion(14);
        $phpWord->getCompatibility()->setOoxmlVersion(15);

        $targetFile = "./uploads/";
        $filename = 'test.docx';

        $section = $phpWord->addSection();
        // Adding Text element to the Section having font styled by default...
        $section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
                . 'The important thing is not to stop questioning." '
                . '(Albert Einstein)'
        );

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($filename);
        // send results to browser to download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        flush();
        readfile($filename);
        unlink($filename); // deletes the temporary file
        exit;




    }

    public function load()
    {

        //load our new PHPExcel library
        $this->load->library('Phpword');
        
        $contents = \PhpOffice\PhpWord\IOFactory::load('./uploads/Loading_update_Format.docx');
        print_r($contents);

    }   

    public function set()
    {

        //load our new PHPExcel library
        $this->load->library('Phpword');
        
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('./uploads/Loading_update_Format.docx');
        $templateProcessor->setValue('vessel_name', 'M.V.STRAITS BAY123');
        $templateProcessor->setValue('loading_port', 'V 061E123');

        $templateProcessor->saveAs('uploads/Sample_07_TemplateCloneRow.docx');


    }   


    public function download()
    {

        //load our new PHPExcel library
        $this->load->library('Phpword');

        $targetFile = "./uploads/";
        $filename = 'uploads/Sample_07_TemplateCloneRow.docx';
        
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('./uploads/Loading_update_Format.docx');
        $templateProcessor->setValue('vessel_name', 'M.V.STRAITS BAY123');
        $templateProcessor->setValue('loading_port', 'V 061E123');

        $templateProcessor->saveAs('uploads/Sample_07_TemplateCloneRow.docx');

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        flush();
        readfile($filename);
        unlink($filename); // deletes the temporary file
        exit;


    } 


    public function form_type_loading_format()
    {
        
        $this->load->model('File_master');
        $this->load->model('Operation_master');
        $id = base64_decode($_GET['fl_no']);
        //load our new PHPExcel library
        $this->load->library('Phpword');

        $result = $this->Operation_master->getOperationsdata($id);
        //print_r($result);exit;
        if ($result[0]['file_no_type']!='Inspection') {
        $cargo_details = $this->File_master->editFileCargoDetailsById($result[0]['id']);
        #print_r($cargo_details);exit;
        $commodity_name = implode(', ', array_column($cargo_details, 'commodity_name'));
        $commodity_arr = explode(",", $commodity_name);
        
        $load_port = trim(implode(', ', array_column($cargo_details, 'load_port')));
        $load_port_arr = explode(",", $load_port);
        }

        $targetFile = "./report_formats/";
        $filename = 'report_formats/Loading_update_Format.docx';

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('./report_formats/Loading_update_Format.docx');
        $templateProcessor->setValue('vessel_name', htmlspecialchars($result[0]['vessel_name']));
        if ($result[0]['file_no_type']!='Inspection') {
        $templateProcessor->setValue('loading_port', htmlspecialchars($load_port));
        }

        $templateProcessor->saveAs('uploads/Loading_update_Format.docx');

        $file_download = APP_PATH.'/uploads/Loading_update_Format.docx';

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

    public function form_type_pre_shipment_update()
    {
        $this->load->model('File_master');
        $this->load->model('Operation_master');
        $id = base64_decode($_GET['fl_no']);
        //load our new PHPExcel library
        $this->load->library('Phpword');

        $result = $this->Operation_master->getOperationsdata($id);
        //print_r($result);exit;
        if ($result[0]['file_no_type']!='Inspection') {
        $cargo_details = $this->File_master->editFileCargoDetailsById($result[0]['id']);
        //print_r($cargo_details);exit;
        $commodity_name = implode(', ', array_column($cargo_details, 'commodity_name'));
        $commodity_arr = explode(",", $commodity_name);

        $load_port = trim(implode(', ', array_column($cargo_details, 'load_port')));
        $load_port_arr = explode(",", $load_port);

        $discharge_port = implode(', ', array_column($cargo_details, 'discharge_port'));
        $discharge_port_arr = explode(",", $discharge_port);
        }

        $targetFile = "./report_formats/";
        $filename = 'report_formats/Pre-shipment_update_Format.docx';

        $download_filename = "uploads/Pre-shipment_update_Format.docx";

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('./report_formats/Pre-shipment_update_Format.docx');
        $templateProcessor->setValue('vessel_name', htmlspecialchars($result[0]['vessel_name']));
        if ($result[0]['file_no_type']!='Inspection') {
        $templateProcessor->setValue('loading_port', htmlspecialchars($load_port));
        $templateProcessor->setValue('discharge_port', htmlspecialchars($discharge_port));
        }

        $templateProcessor->saveAs('uploads/Pre-shipment_update_Format.docx');

        $file_download = APP_PATH.'/uploads/Pre-shipment_update_Format.docx';

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

    public function form_type_pre_shipment_sampling_report()
    {
        
        $this->load->model('File_master');
        $this->load->model('Operation_master');
        $id = base64_decode($_GET['fl_no']);
        //load our new PHPExcel library
        $this->load->library('Phpword');

        $result = $this->Operation_master->getOperationsdata($id);
        //print_r($result);exit;
        if ($result[0]['file_no_type']!='Inspection') {
        $cargo_details = $this->File_master->editFileCargoDetailsById($result[0]['id']);
        #print_r($cargo_details);exit;
        $commodity_name = implode(', ', array_column($cargo_details, 'commodity_name'));
        $commodity_arr = explode(",", $commodity_name);

        $load_port = trim(implode(', ', array_column($cargo_details, 'load_port')));
        $load_port_arr = explode(",", $load_port);

        $discharge_port = implode(', ', array_column($cargo_details, 'discharge_port'));
        $discharge_port_arr = explode(",", $discharge_port);
        }

        $targetFile = "./report_formats/";
        $filename = 'report_formats/PRESHIPMENT_SAMPLING_REPORT_AMI_ACI.docx';

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('./report_formats/PRESHIPMENT_SAMPLING_REPORT_AMI_ACI.docx');
        $templateProcessor->setValue('vessel_name', htmlspecialchars($result[0]['vessel_name']));
        $templateProcessor->setValue('client_name', htmlspecialchars($result[0]['client_name']));
        if ($result[0]['file_no_type']!='Inspection') {
        $templateProcessor->setValue('loading_port', htmlspecialchars($load_port));
        $templateProcessor->setValue('discharge_port', htmlspecialchars($discharge_port));
        }

        $templateProcessor->saveAs('uploads/PRESHIPMENT_SAMPLING_REPORT_AMI_ACI.docx');

        $file_download = APP_PATH.'/uploads/PRESHIPMENT_SAMPLING_REPORT_AMI_ACI.docx';

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

    public function form_type_lop_non_vef()
    {
        
        $this->load->model('File_master');
        $this->load->model('Operation_master');
        $id = base64_decode($_GET['fl_no']);
        //load our new PHPExcel library
        $this->load->library('Phpword');

        $result = $this->Operation_master->getOperationsdata($id);
        //print_r($result);exit;
        if ($result[0]['file_no_type']!='Inspection') {
        $cargo_details = $this->File_master->editFileCargoDetailsById($result[0]['id']);
        #print_r($cargo_details);exit;
        $commodity_name = implode(', ', array_column($cargo_details, 'commodity_name'));
        $commodity_arr = explode(",", $commodity_name);

        $load_port = trim(implode(', ', array_column($cargo_details, 'load_port')));
        $load_port_arr = explode(",", $load_port);

        $discharge_port = implode(', ', array_column($cargo_details, 'discharge_port'));
        $discharge_port_arr = explode(",", $discharge_port);
        }

        $targetFile = "./report_formats/";
        $filename = 'report_formats/LOP_FOR_NON_VEF_PROVIDED_ON_BOARD.docx';

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('./report_formats/LOP_FOR_NON_VEF_PROVIDED_ON_BOARD.docx');
        $templateProcessor->setValue('vessel_name', htmlspecialchars($result[0]['vessel_name']));
        if ($result[0]['file_no_type']!='Inspection') {
        $templateProcessor->setValue('loading_port', htmlspecialchars($load_port));
        $templateProcessor->setValue('commodity_name', htmlspecialchars($commodity_name));
        }

        $templateProcessor->saveAs('uploads/LOP_FOR_NON_VEF_PROVIDED_ON_BOARD.docx');

        $file_download = APP_PATH.'/uploads/LOP_FOR_NON_VEF_PROVIDED_ON_BOARD.docx';

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

     
    }
    
?>
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
    
    class Downloadweightqualitycertificateword extends CI_Controller {


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

    public function weight_quality_cert_form2()
    {
        
        $this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Certificate_master');
        $this->load->model('Weight_Quality_master');
        $this->load->model('File_master');
        $this->load->model('Unit_master');
        $this->load->model('Client_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

          
        $result = $this->Weight_Quality_master->getWQCertificateEditdata($id);
        //print_r($result);exit;

        $params_details = $this->Weight_Quality_master->getWCertificateDetailsdataBySpec($id);
        //print_r($params_details);exit;

        $specifications = $this->Certificate_master->getlabspecificationgroup();
        //print_r($specifications);exit;
        foreach ($specifications as $spf) {
            $spf_items[$spf['id']] = $spf;
        }
        #print_r($spf_items);exit;
        #exit;
        $branch_details = $this->branch_master->getBranchdataById($result[0]['user_branch_id']); 
        #print_r($branch_details);exit;


        //load our new PHPExcel library
        $this->load->library('Phpword');

        $phpWord = new PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
         
        $header = $section->addHeader();
        $header->addText('This is my fabulous header!');
        /*$section->addImage(BASE_PATH.'/assets/img/logo_bg.jpg',
        array(
            'positioning'        => 'relative',
            'marginTop'          => 0,
            'marginLeft'         => 0,
            'width'              => 640,
            'height'             => 1000,
            'wrappingStyle'      => 'behind',
            'wrapDistanceRight'  => -5,
            'wrapDistanceBottom' => -5,
        ));*/
         
        $footer = $section->addFooter();
        $footer->addText('Footer text goes here.');
         
        #$textrun = $section->addTextRun();
        #$textrun->addText('Some text. ');
        #$textrun->addText('And more Text in this Paragraph.');
         
        #$textrun = $section->addTextRun();
        #$textrun->addText('New Paragraph! ', ['bold' => true]);
        #$textrun->addText('With text...', ['italic' => true]);

        $section->addText('WEIGHT AND QUALITY CERTIFICATE - No - '.$result[0]['certificate_no'], ['size' => 16, 'bold' => true,'align'=> 'center']);

        $textrun = $section->addTextRun();
        $textrun->addText('Name of the Vessel : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['vessel_name']));

        $textrun = $section->addTextRun();
        $textrun->addText('Description Of Goods : ', ['bold' => true]);
        $textrun->addText(strtoupper(strtoupper($result[0]['commodity'])));

        $textrun = $section->addTextRun();
        $textrun->addText('Loading Port : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['load_port']));

        $textrun = $section->addTextRun();
        $textrun->addText('Discharge Port : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['discharge_port']));

        if (!empty($result[0]['notify'])) {
        $textrun = $section->addTextRun();
        $textrun->addText('Notify : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['notify']));
        }

        if (!empty($result[0]['consignee'])) {
        $textrun = $section->addTextRun();
        $textrun->addText('Consignee : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['consignee']));
        }

        $textrun = $section->addTextRun();
        $textrun->addText('Loading Date : ', ['bold' => true]);
        $textrun->addText($result[0]['file_date']);

        if (!empty($result[0]['consignee'])) {
        $textrun = $section->addTextRun();
        $textrun->addText('Insurance : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['insurance']));
        }

        if (!empty($result[0]['consignee'])) {
        $textrun = $section->addTextRun();
        $textrun->addText('CB Registration No : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['cb_regno']));
        }

        $textrun = $section->addTextRun();
        $textrun->addText('Shipper1 : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['shipper']));

        $textrun = $section->addTextRun();
        $textrun->addText('Bill Of Lading Quantity : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['bill_lading_qty'].' '.$result[0]['bill_lading_unit']));

        if (!empty($result[0]['packaging'])) {
        $textrun = $section->addTextRun();
        $textrun->addText('Packaging : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['packaging']));
        }

        if (!empty($result[0]['stowage'])) {
        $textrun = $section->addTextRun();
        $textrun->addText('Stowage : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['stowage']));
        }

        if (!empty($result[0]['declaration'])) {
        $textrun = $section->addTextRun();
        $textrun->addText('Additional, Declaration : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['declaration']));
        }

        if (!empty($result[0]['para_title1'])) {
        $textrun = $section->addTextRun();
        $textrun->addText($result[0]['para_title1'].' : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['para_text2']));
        }

        if (!empty($result[0]['para_title2'])) {
        $textrun = $section->addTextRun();
        $textrun->addText($result[0]['para_title2'].' : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['para_text2']));
        }

        if (!empty($result[0]['para_title3'])) {
        $textrun = $section->addTextRun();
        $textrun->addText($result[0]['para_title3'].' : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['para_text3']));
        }

        if (!empty($result[0]['total_net_weight'])) {
        $textrun = $section->addTextRun();
        $textrun->addText('ACTUAL WEIGHT LOADED ON BOARD : ', ['bold' => true]);
        $textrun->addText($result[0]['total_net_weight'].' '.$result[0]['bill_lading_unit']);
        }

        if (!empty($result[0]['para_title4'])) {
        $textrun = $section->addTextRun();
        $textrun->addText($result[0]['para_title4'].' : ', ['bold' => true]);
        $textrun->addText(strtoupper($result[0]['para_text4']));
        }
        
        
        $rows = 3;
        $cols = 3;
        $section->addText('Basic table', ['size' => 16, 'bold' => true]);
         
        $table = $section->addTable();

        $table->addRow('2',['borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0]);
        $table->addCell(3750)->addText("PARAMETERS");
        $table->addCell(3750)->addText("SPECIFICATIONS");
        $table->addCell(3750)->addText("ACTUAL RESULTS");

        for ($i=0;$i<count($params_details);$i++) { 
            $table->addRow();
            $table->addCell(3750)->addText($spf_items[$params_details[$i]['param_name']]['name']);
            $table->addCell(3750)->addText($params_details[$i]['specification']);
            $table->addCell(3750)->addText($params_details[$i]['results']);
        }    

        /***for ($row = 1; $row <= 3; $row++) { $table->addRow();
            for ($cell = 1; $cell <= 3; $cell++) { $table->addCell(3750)->addText("Row {$row}, Cell {$cell}");
            }
        }***/
         
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(APP_PATH.'/uploads/MyDocument.docx');
     
    }  

    public function weight_quality_cert_form5()
    {
        $this->load->library('Phpword');

        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $phpWord->getCompatibility()->setOoxmlVersion(14);
        $phpWord->getCompatibility()->setOoxmlVersion(15);

        $targetFile = "APP_PATH.'/uploads/";
        $filename = 'test.docx';

        $section = $phpWord->addSection();
        $section->getStyle()->setBreakType('continuous');
        $header = $section->addHeader();
        $header->headerTop(10);



        //$section->addImage(base_url('images/qoutlogo.jpg'), array('align'=>'center' ,'topMargin' => -5));

        $section->addTextBreak(-5);
        $center = $phpWord->addParagraphStyle('p2Style', array('align'=>'center','marginTop' => 1));
        $section->addText('this is my name',array('bold' => true,'underline'=>'single','name'=>'helvetica','size' => 14),$center);
        $section->addTextBreak(-.5);

        $section->addText('Tel:    00971-55-25553443 Fax: 00971-55- 2553443',array('name'=>'helvetica','size' => 13),$center);
        $section->addTextBreak(-.5);
        $section->addText('Quotation',array('bold' => true,'underline'=>'single','name'=>'helvetica','size' => 16),$center);
        $section->addTextBreak(-.5);
        $tableStyle = array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  );
        $styleCell = array('borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black' );
        $fontStyle = array('italic'=> true, 'size'=>11, 'name'=>'helvetica','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0 );
        $TfontStyle = array('bold'=>true, 'italic'=> true, 'size'=>11, 'name' => 'helvetica', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $cfontStyle = array('allCaps'=>true,'italic'=> true, 'size'=>11, 'name' => 'helvetica','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $noSpace = array('textBottomSpacing' => -1);
        $table = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));
        $table2 = $section->addTable('myOwnTableStyle');
        $table->addRow(-0.5, array('exactHeight' => -5));
        $countrystate = 'India';
        $table->addCell(2500,$styleCell)->addText('Date',$TfontStyle);
        $table->addCell(6000,$styleCell)->addText('111',$fontStyle);
        $table->addCell(1500,$styleCell)->addText('Cust. Ref',$TfontStyle);
        $table->addCell(2000,$styleCell)->addText('12221',$fontStyle);
        $table->addRow();
        $table->addCell(2500,$styleCell)->addText('Company Name',$TfontStyle);
        $table->addCell(6000,$styleCell)->addText('333',$cfontStyle);
        $table->addCell(1500,$styleCell)->addText('Tel',$TfontStyle);
        $table->addCell(2000,$styleCell)->addText('444',$fontStyle);
        $table->addRow();
        $table->addCell(2500,$styleCell)->addText('Country',$TfontStyle);
        $table->addCell(6000,$styleCell)->addText('444', $fontStyle);
        $table->addCell(1500,$styleCell)->addText('Fax',$TfontStyle);
        $table->addCell(2000,$styleCell)->addText('444',$fontStyle);
        $table->addRow();
        $table->addCell(2500,$styleCell)->addText('Attn.',$TfontStyle);
        $table->addCell(6000,$styleCell)->addText('444',$fontStyle);
        $table->addCell(1500,$styleCell)->addText('Email',$TfontStyle);
        $table->addCell(2000,$styleCell)->addText('444',$fontStyle);
        $table->addRow();
        $table->addCell(2500,$styleCell)->addText('Subject',$TfontStyle);
        $table->addCell(6000,$styleCell)->addText('444',$fontStyle);
        $table->addCell(1500,$styleCell)->addText('From',$TfontStyle);
        $table->addCell(2000,$styleCell)->addText('444',$fontStyle);
        $table->addRow();
        $table->addCell(2500,$styleCell)->addText('Quotation No.',$TfontStyle);
        $table->addCell(6000,$styleCell)->addText('444',$fontStyle);
        $table->addCell(1500,$styleCell)->addText('pages',$TfontStyle);
        $table->addCell(2000,$styleCell)->addText('444',$fontStyle);

        $section->addTextBreak(-1);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(APP_PATH.'/uploads/test.docx');
    }

    public function weight_quality_cert_form()
    {
        $this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Certificate_master');
        $this->load->model('Weight_Quality_master');
        $this->load->model('File_master');
        $this->load->model('Unit_master');
        $this->load->model('Client_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

          
        $result = $this->Weight_Quality_master->getWQCertificateEditdata($id);
        //print_r($result);exit;

        $params_details = $this->Weight_Quality_master->getWCertificateDetailsdataBySpec($id);
        //print_r($params_details);exit;

        $specifications = $this->Certificate_master->getlabspecificationgroup();
        //print_r($specifications);exit;
        foreach ($specifications as $spf) {
            $spf_items[$spf['id']] = $spf;
        }
        #print_r($spf_items);exit;
        #exit;
        $branch_details = $this->branch_master->getBranchdataById($result[0]['user_branch_id']); 
        #print_r($branch_details);exit;


        $this->load->library('Phpword');

        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $phpWord->getCompatibility()->setOoxmlVersion(14);
        $phpWord->getCompatibility()->setOoxmlVersion(15);


        $section = $phpWord->addSection();
        $section->getStyle()->setBreakType('continuous');
        $header = $section->addHeader();
        //$header->addText('This is my fabulous header!');
        //$header->addImage(APP_PATH.'/assets/img/logo_bg.jpg', array('align'=>'center' ,'topMargin' => -5,'width' => 500,'posHorizontal' => 'absolute','posVertical' => 'absolute',));
        $header->addWatermark(APP_PATH.'/assets/img/logo_bg.jpg', array('align'=>'center' ,'marginTop' => -30,'marginLeft' => -60,'width' => 575,'posHorizontal' => 'absolute','posVertical' => 'absolute',));
        $header->headerTop(25);

        $section->addTextBreak(4);

        $section->addText('ORIGINAL',array('bold' => true,'underline'=>'','name'=>'helvetica','size' => 14,'color' => 'red'),array('align' => 'right', 'spaceAfter' => 100));
        $section->addTextBreak(-5);

        $center = $phpWord->addParagraphStyle('p2Style', array('align'=>'left','marginTop' => 1));
        $section->addText('WEIGHT AND QUALITY CERTIFICATE - No - '.$result[0]['certificate_no'],array('bold' => true,'underline'=>'single','name'=>'helvetica','size' => 12),$center);
        $section->addTextBreak(-5);

        //$right = $section->addParagraphStyle('p2Style', array('align'=>'right','marginTop' => 1));
        $section->addText('Date :'.$result[0]['certificate_date'],array('bold' => true,'underline'=>'','name'=>'helvetica','size' => 11),array('align' => 'right', 'spaceAfter' => 100));
        $section->addTextBreak(-5);


        $styleCell2 = array();
        $styleCell1 = array('borderTopSize'=>0 ,'borderTopColor' =>'black','borderLeftSize'=>0,'borderLeftColor' =>'black','borderRightSize'=>0,'borderRightColor'=>'black','borderBottomSize' =>0,'borderBottomColor'=>'black' );
        $fontStyle1 = array('italic'=> false, 'size'=>9, 'name'=>'helvetica','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0 );
        $TfontStyle1 = array('bold'=>true, 'italic'=> false, 'size'=>9, 'name' => 'helvetica', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $TfontStyle11 = array('bold'=>false, 'italic'=> false, 'size'=>9, 'name' => 'helvetica', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $table1 = $section->addTable('myOwnTableStyle',array('borderSize' => 0, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));
        $table1->addRow(-0.5, array('exactHeight' => -5));
        $countrystate = 'India';

        if (!empty($result[0]['vessel_name'])) {
        $table1->addCell(4500,$styleCell2)->addText('Name of the Vessel',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['vessel_name']),$TfontStyle11);
        }

        if (!empty($result[0]['commodity'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Description Of Goods',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['commodity']),$TfontStyle11);
        }

        if (!empty($result[0]['load_port'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Loading Port',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['load_port']),$TfontStyle11);
        }

        if (!empty($result[0]['discharge_port'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Discharge Port',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['discharge_port']),$TfontStyle11);
        }

        if (!empty($result[0]['notify'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Notify',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['notify']),$TfontStyle11);
        }

        if (!empty($result[0]['consignee'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Consignee',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['consignee']),$TfontStyle11);
        }

        if (!empty($result[0]['file_date'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Loading Date',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['file_date']),$TfontStyle11);
        }

        if (!empty($result[0]['insurance'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Insurance',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['insurance']),$TfontStyle11);
        }

        if (!empty($result[0]['cb_regno'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('CB Registration No',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['cb_regno']),$TfontStyle11);
        }

        if (!empty($result[0]['shipper'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Shipper',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['shipper']),$TfontStyle11);
        }

        if (!empty($result[0]['bill_lading_qty'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Bill Of Lading Quantity',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['bill_lading_qty'].' '.$result[0]['bill_lading_unit']),$TfontStyle11);
        }

        if (!empty($result[0]['bill_lading_numdt'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText(htmlspecialchars('Bill Of Lading Number & Date'),$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(htmlspecialchars(strtoupper($result[0]['bill_lading_numdt'])),$TfontStyle11);
        }
           
        if (!empty($result[0]['shipper1'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Shipper',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['shipper1']),$TfontStyle11);
        }

        if (!empty($result[0]['bill_lading_qty1'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Bill Of Lading Quantity',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['bill_lading_qty1'].' '.$result[0]['bill_lading_unit1']),$TfontStyle11);
        }

        if (!empty($result[0]['bill_lading_numdt1'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText(htmlspecialchars('Bill Of Lading Number & Date'),$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['bill_lading_numdt1']),$TfontStyle11);
        }


        if (!empty($result[0]['shipper2'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Shipper',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['shipper2']),$TfontStyle11);
        }

        if (!empty($result[0]['bill_lading_qty2'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Bill Of Lading Quantity',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['bill_lading_qty2'].' '.$result[0]['bill_lading_unit2']),$TfontStyle11);
        }

        if (!empty($result[0]['bill_lading_numdt2'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText(htmlspecialchars('Bill Of Lading Number & Date'),$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['bill_lading_numdt2']),$TfontStyle11);
        }        
        
        if (!empty($result[0]['packaging'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Packing',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['packaging']),$TfontStyle11);
        }

        if (!empty($result[0]['stowage'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Stowage',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['stowage']),$TfontStyle11);
        }

        if (!empty($result[0]['declaration'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Additional, Declaration',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['declaration']),$TfontStyle11);
        }
        
        $section->addTextBreak(1);
        if (!empty($result[0]['para_text1'])) {
        $section->addText($result[0]['para_text1'],array('bold' => false,'underline'=>'','name'=>'helvetica','size' => 9),array('align' => 'left', 'spaceAfter' => 100));
        $section->addTextBreak(-5);
        }

        if (!empty($result[0]['para_text2'])) {
        $section->addText($result[0]['para_text2'],array('bold' => false,'underline'=>'','name'=>'helvetica','size' => 9),array('align' => 'left', 'spaceAfter' => 100));
        $section->addTextBreak(-5);
        }

        if (!empty($result[0]['para_title3'])) {
        $section->addText($result[0]['para_title3'],array('bold' => true,'underline'=>'','name'=>'helvetica','size' => 11),array('align' => 'left', 'spaceAfter' => 100));
        $section->addText(strtoupper($result[0]['para_text3']),array('bold' => false,'underline'=>'','name'=>'helvetica','size' => 9),array('align' => 'left', 'spaceAfter' => 100));
        $section->addTextBreak(-5);
        }

        $section->addTextBreak(1);
        if (!empty($result[0]['total_net_weight'])) {
        $section->addText('ACTUAL WEIGHT LOADED ON BOARD ',array('bold' => true,'underline'=>'single','name'=>'helvetica','size' => 11),array('align' => 'left', 'spaceAfter' => 100));
        $section->addText('Total Net Weight :'.strtoupper($result[0]['total_net_weight'].' '.$result[0]['bill_lading_unit']),array('bold' => false,'underline'=>'','name'=>'helvetica','size' => 11),array('align' => 'left', 'spaceAfter' => 100));
        $section->addTextBreak(1);
        }

        if (!empty($result[0]['para_title4'])) {
        $section->addText($result[0]['para_title4'],array('bold' => true,'underline'=>'','name'=>'helvetica','size' => 11),array('align' => 'left', 'spaceAfter' => 100));
        $section->addText(strtoupper($result[0]['para_text4']),array('bold' => false,'underline'=>'','name'=>'helvetica','size' => 9),array('align' => 'left', 'spaceAfter' => 100));
        }
        $section->addTextBreak(1);
        
        $tableStyle = array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  );
        $styleCell = array('borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black' );
        $fontStyle = array('italic'=> false, 'size'=>11, 'name'=>'helvetica','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0 );
        $TfontStyle = array('bold'=>true, 'italic'=> false, 'size'=>11, 'name' => 'helvetica', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $TfontStyle12 = array('bold'=>false, 'italic'=> false, 'size'=>11, 'name' => 'helvetica', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $cfontStyle = array('allCaps'=>true,'italic'=> false, 'size'=>11, 'name' => 'helvetica','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $noSpace = array('textBottomSpacing' => -1);
        $table = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));
        $table2 = $section->addTable('myOwnTableStyle');
        $table->addRow(-0.5, array('exactHeight' => -5));
        $countrystate = 'India';
        $table->addCell(3500,$styleCell)->addText('PARAMETERS',$TfontStyle);
        if ($result[0]['check_specs']!=1) {    
        $table->addCell(3500,$styleCell)->addText('SPECIFICATIONS',$TfontStyle);
        }
        $table->addCell(3500,$styleCell)->addText('ACTUAL RESULTS',$TfontStyle);
        
        for ($i=0;$i<count($params_details);$i++) {
        $table->addRow();
        $table->addCell(3500,$styleCell)->addText(htmlspecialchars($spf_items[$params_details[$i]['param_name']]['name']),$TfontStyle12);
        if ($result[0]['check_specs']!=1) {
        $table->addCell(3500,$styleCell)->addText($params_details[$i]['specification'],$TfontStyle12);
        }
        $table->addCell(3500,$styleCell)->addText($params_details[$i]['results'],$TfontStyle12);
        }
        
        $section->addTextBreak(1);
        
        $styleCell4 = array();
        $styleCell3 = array('borderTopSize'=>0 ,'borderTopColor' =>'black','borderLeftSize'=>0,'borderLeftColor' =>'black','borderRightSize'=>0,'borderRightColor'=>'black','borderBottomSize' =>0,'borderBottomColor'=>'black' );
        $fontStyle3 = array('italic'=> false, 'size'=>11, 'name'=>'helvetica','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0 );
        $TfontStyle3 = array('bold'=>true, 'italic'=> false, 'size'=>11, 'name' => 'helvetica', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $table3 = $section->addTable('myOwnTableStyle',array('borderSize' => 0, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));
        $table3->addRow(-0.5, array('exactHeight' => -5));
        $countrystate = 'India';
        
       
        $table3->addCell(4500,$styleCell4)->addText(ucfirst(strtolower($result[0]["load_port"])).' : '.$result[0]['certificate_date'],$TfontStyle3);
        $table3->addCell(2000,$styleCell4)->addText('',$fontStyle3);
        $table3->addCell(4500,$styleCell4)->addText($branch_details["bank_beneficiary"].': Geneva',$TfontStyle3);
        
        $section->addTextBreak(-1);

        //$footer = $section->addFooter();
        //$footer->addText('THIS COMPANY TRADES UNDER THE AGRIMIN CONTROL INTERNATIONAL S.A., TERMS AND CONDITIONS OF BUSINESS COPIES AVAILABLE ON REQUEST');

        ########### New Page Starts From Here - Shivaji Dalvi ###########
        ##########

        $section->addPageBreak();
        
        $section->addTextBreak(4);

        $section->addText('COPY',array('bold' => true,'underline'=>'','name'=>'helvetica','size' => 14,'color' => 'red'),array('align' => 'right', 'spaceAfter' => 100));
        $section->addTextBreak(-5);

        $center = $phpWord->addParagraphStyle('p2Style', array('align'=>'left','marginTop' => 1));
        $section->addText('WEIGHT AND QUALITY CERTIFICATE - No - '.$result[0]['certificate_no'],array('bold' => true,'underline'=>'single','name'=>'helvetica','size' => 12),$center);
        $section->addTextBreak(-5);

        //$right = $section->addParagraphStyle('p2Style', array('align'=>'right','marginTop' => 1));
        $section->addText('Date :'.$result[0]['certificate_date'],array('bold' => true,'underline'=>'','name'=>'helvetica','size' => 11),array('align' => 'right', 'spaceAfter' => 100));
        $section->addTextBreak(-5);


        $styleCell2 = array();
        $styleCell1 = array('borderTopSize'=>0 ,'borderTopColor' =>'black','borderLeftSize'=>0,'borderLeftColor' =>'black','borderRightSize'=>0,'borderRightColor'=>'black','borderBottomSize' =>0,'borderBottomColor'=>'black' );
        $fontStyle1 = array('italic'=> false, 'size'=>9, 'name'=>'helvetica','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0 );
        $TfontStyle1 = array('bold'=>true, 'italic'=> false, 'size'=>9, 'name' => 'helvetica', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $TfontStyle11 = array('bold'=>false, 'italic'=> false, 'size'=>9, 'name' => 'helvetica', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $table1 = $section->addTable('myOwnTableStyle',array('borderSize' => 0, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));
        $table1->addRow(-0.5, array('exactHeight' => -5));
        $countrystate = 'India';

        if (!empty($result[0]['vessel_name'])) {
        $table1->addCell(4500,$styleCell2)->addText('Name of the Vessel',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['vessel_name']),$TfontStyle11);
        }

        if (!empty($result[0]['commodity'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Description Of Goods',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['commodity']),$TfontStyle11);
        }

        if (!empty($result[0]['load_port'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Loading Port',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['load_port']),$TfontStyle11);
        }

        if (!empty($result[0]['discharge_port'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Discharge Port',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['discharge_port']),$TfontStyle11);
        }

        if (!empty($result[0]['notify'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Notify',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['notify']),$TfontStyle11);
        }

        if (!empty($result[0]['consignee'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Consignee',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['consignee']),$TfontStyle11);
        }

        if (!empty($result[0]['file_date'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Loading Date',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['file_date']),$TfontStyle11);
        }

        if (!empty($result[0]['insurance'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Insurance',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['insurance']),$TfontStyle11);
        }

        if (!empty($result[0]['cb_regno'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('CB Registration No',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['cb_regno']),$TfontStyle11);
        }

        if (!empty($result[0]['shipper'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Shipper',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['shipper']),$TfontStyle11);
        }

        if (!empty($result[0]['bill_lading_qty'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Bill Of Lading Quantity',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['bill_lading_qty'].' '.$result[0]['bill_lading_unit']),$TfontStyle11);
        }

        if (!empty($result[0]['bill_lading_numdt'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText(htmlspecialchars('Bill Of Lading Number & Date'),$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(htmlspecialchars(strtoupper($result[0]['bill_lading_numdt'])),$TfontStyle11);
        }
           
        if (!empty($result[0]['shipper1'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Shipper',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['shipper1']),$TfontStyle11);
        }

        if (!empty($result[0]['bill_lading_qty1'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Bill Of Lading Quantity',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['bill_lading_qty1'].' '.$result[0]['bill_lading_unit1']),$TfontStyle11);
        }

        if (!empty($result[0]['bill_lading_numdt1'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText(htmlspecialchars('Bill Of Lading Number & Date'),$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['bill_lading_numdt1']),$TfontStyle11);
        }


        if (!empty($result[0]['shipper2'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Shipper',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['shipper2']),$TfontStyle11);
        }

        if (!empty($result[0]['bill_lading_qty2'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Bill Of Lading Quantity',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['bill_lading_qty2'].' '.$result[0]['bill_lading_unit2']),$TfontStyle11);
        }

        if (!empty($result[0]['bill_lading_numdt2'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText(htmlspecialchars('Bill Of Lading Number & Date'),$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['bill_lading_numdt2']),$TfontStyle11);
        }        
        
        if (!empty($result[0]['packaging'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Packing',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['packaging']),$TfontStyle11);
        }

        if (!empty($result[0]['stowage'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Stowage',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['stowage']),$TfontStyle11);
        }

        if (!empty($result[0]['declaration'])) {
        $table1->addRow();
        $table1->addCell(4500,$styleCell2)->addText('Additional, Declaration',$TfontStyle1);
        $table1->addCell(2000,$styleCell2)->addText(':',$fontStyle1);
        $table1->addCell(4500,$styleCell2)->addText(strtoupper($result[0]['declaration']),$TfontStyle11);
        }

        $section->addTextBreak(1);
        if (!empty($result[0]['para_text1'])) {
        $section->addText($result[0]['para_text1'],array('bold' => false,'underline'=>'','name'=>'helvetica','size' => 9),array('align' => 'left', 'spaceAfter' => 100));
        $section->addTextBreak(-5);
        }

        if (!empty($result[0]['para_text2'])) {
        $section->addText($result[0]['para_text2'],array('bold' => false,'underline'=>'','name'=>'helvetica','size' => 9),array('align' => 'left', 'spaceAfter' => 100));
        $section->addTextBreak(-5);
        }

        if (!empty($result[0]['para_title3'])) {
        $section->addText($result[0]['para_title3'],array('bold' => true,'underline'=>'','name'=>'helvetica','size' => 11),array('align' => 'left', 'spaceAfter' => 100));
        $section->addText(strtoupper($result[0]['para_text3']),array('bold' => false,'underline'=>'','name'=>'helvetica','size' => 9),array('align' => 'left', 'spaceAfter' => 100));
        $section->addTextBreak(-5);
        }

        $section->addTextBreak(1);
        if (!empty($result[0]['total_net_weight'])) {
        $section->addText('ACTUAL WEIGHT LOADED ON BOARD ',array('bold' => true,'underline'=>'single','name'=>'helvetica','size' => 11),array('align' => 'left', 'spaceAfter' => 100));
        $section->addText('Total Net Weight :'.strtoupper($result[0]['total_net_weight'].' '.$result[0]['bill_lading_unit']),array('bold' => false,'underline'=>'','name'=>'helvetica','size' => 11),array('align' => 'left', 'spaceAfter' => 100));
        $section->addTextBreak(1);
        }

        if (!empty($result[0]['para_title4'])) {
        $section->addText($result[0]['para_title4'],array('bold' => true,'underline'=>'','name'=>'helvetica','size' => 11),array('align' => 'left', 'spaceAfter' => 100));
        $section->addText(strtoupper($result[0]['para_text4']),array('bold' => false,'underline'=>'','name'=>'helvetica','size' => 9),array('align' => 'left', 'spaceAfter' => 100));
        }
        $section->addTextBreak(1);
        
        $tableStyle = array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  );
        $styleCell = array('borderTopSize'=>1 ,'borderTopColor' =>'black','borderLeftSize'=>1,'borderLeftColor' =>'black','borderRightSize'=>1,'borderRightColor'=>'black','borderBottomSize' =>1,'borderBottomColor'=>'black' );
        $fontStyle = array('italic'=> false, 'size'=>11, 'name'=>'helvetica','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0 );
        $TfontStyle = array('bold'=>true, 'italic'=> false, 'size'=>11, 'name' => 'helvetica', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $TfontStyle12 = array('bold'=>false, 'italic'=> false, 'size'=>11, 'name' => 'helvetica', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $cfontStyle = array('allCaps'=>true,'italic'=> false, 'size'=>11, 'name' => 'helvetica','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $noSpace = array('textBottomSpacing' => -1);
        $table = $section->addTable('myOwnTableStyle',array('borderSize' => 1, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));
        $table2 = $section->addTable('myOwnTableStyle');
        $table->addRow(-0.5, array('exactHeight' => -5));
        $countrystate = 'India';
        $table->addCell(3500,$styleCell)->addText('PARAMETERS',$TfontStyle);
        if ($result[0]['check_specs']!=1) {    
        $table->addCell(3500,$styleCell)->addText('SPECIFICATIONS',$TfontStyle);
        }
        $table->addCell(3500,$styleCell)->addText('ACTUAL RESULTS',$TfontStyle);
        
        for ($i=0;$i<count($params_details);$i++) {
        $table->addRow();
        $table->addCell(3500,$styleCell)->addText(htmlspecialchars($spf_items[$params_details[$i]['param_name']]['name']),$TfontStyle12);
        if ($result[0]['check_specs']!=1) {
        $table->addCell(3500,$styleCell)->addText($params_details[$i]['specification'],$TfontStyle12);
        }
        $table->addCell(3500,$styleCell)->addText($params_details[$i]['results'],$TfontStyle12);
        }
        
        $section->addTextBreak(1);
        
        $styleCell4 = array();
        $styleCell3 = array('borderTopSize'=>0 ,'borderTopColor' =>'black','borderLeftSize'=>0,'borderLeftColor' =>'black','borderRightSize'=>0,'borderRightColor'=>'black','borderBottomSize' =>0,'borderBottomColor'=>'black' );
        $fontStyle3 = array('italic'=> false, 'size'=>11, 'name'=>'helvetica','afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0 );
        $TfontStyle3 = array('bold'=>true, 'italic'=> false, 'size'=>11, 'name' => 'helvetica', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0);
        $table3 = $section->addTable('myOwnTableStyle',array('borderSize' => 0, 'borderColor' => '999999', 'afterSpacing' => 0, 'Spacing'=> 0, 'cellMargin'=>0  ));
        $table3->addRow(-0.5, array('exactHeight' => -5));
        $countrystate = 'India';
        
       
        $table3->addCell(4500,$styleCell4)->addText(ucfirst(strtolower($result[0]["load_port"])).' : '.$result[0]['certificate_date'],$TfontStyle3);
        $table3->addCell(2000,$styleCell4)->addText('',$fontStyle3);
        $table3->addCell(4500,$styleCell4)->addText($branch_details["bank_beneficiary"].': Geneva',$TfontStyle3);
        
        $section->addTextBreak(-1);


        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(APP_PATH.'/uploads/WQCert_'.$id.'.docx');

        $file_download = APP_PATH.'/uploads/WQCert_'.$id.'.docx';

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
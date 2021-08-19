<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operationfileregister extends CI_Controller {

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
		
        /*if ($_SESSION['userId']=='') {
          $login = BASE_PATH."login/";
          redirect($login);
        }*/

		#print_r($_POST);exit;
		$this->load->library('form_validation');
		$this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Operation_master');
        $this->load->model('Document_master');
        $this->load->model('File_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        #print_r($_SESSION);exit;

        $result = $this->Operation_master->getOperationsdata($id);
        //print_r($result);exit;
        $doc_types = $this->Document_master->getDocumentTypedata();

        
        if ($_POST) {
        	//print_r($_POST);exit;

        	$_POST['user_id'] = @$_SESSION['userId']; 
        	$dt = gmdate('Y-m-d H:i:s');
        	$_POST['dt'] = $dt;
        	$_POST['user_comp_id'] = @$_SESSION['comp_id']; 
        	$_POST['user_branch_id'] = @$_SESSION['branch_id'];

        	$config['upload_path'] = './doc_uploads/';
        	$config['allowed_types'] = 'xls|pdf|doc|xlsx|docx'; //xls|pdf|doc //*
        	$config['max_size'] = 512000;

        	#$doc_type = $_POST['doc_types'];

        	$this->load->library('upload', $config);
        	$this->upload->initialize($config);

        	if (!$this->upload->do_upload('upl_document_type')) {
            $error = array('error' => $this->upload->display_errors());
            #print_r($error);exit;
            #echo '11111';exit;
       		 } else {
            $data = array('upl_document_path' => $this->upload->data());
            // path = http://localhost/agrimin/uploads/agrimin_employee_users_master.sql
            #print_r($data);exit;
            #echo $data['upl_purpose_path']['file_name'];exit;

            $_POST['upl_document_path'] = $data['upl_document_path']['file_name'];
            if (!$_POST['upl_document_path']) { $_POST['upl_document_path'] = '';}
          	#echo '22222';exit;
        	}

            $resultdata = $this->Operation_master->addDocumentTypes($this->input->post());

            $getFileStatus = $this->File_master->getFiledataById($this->input->post('file_id'));

            $file_status = array('Invoiced','Completed');

            if (!in_array($getFileStatus[0]['status'], $file_status)) {    
                $UpdateFileData = $this->Operation_master->UpdateFileData($this->input->post());
            }

        	$doc_types_id = $this->Document_master->getDocumentDetailsById($id);

        	$this->data['success'] = "File Uploaded successfully!!!.";
        	
   			$this->data['title'] = 'ACI - Operationfileregister';
			$this->data['operations_data'] = @$result;
			$this->data['doc_types'] = @$doc_types;
			$this->data['doc_types_info'] = @$doc_types_id;
			$this->data['layout_body']='operationfileregister';
	 	

	 		$this->load->view('admin/layout/main_app', $this->data);

			#$this->load->view('file_register_new');	

        } else {
        	$doc_types_id = $this->Document_master->getDocumentDetailsById($id);

			$this->data['title'] = 'ACI - Operationfileregister';
			$this->data['operations_data'] = @$result;
			$this->data['doc_types'] = @$doc_types;
			$this->data['doc_types_info'] = @$doc_types_id;
			$this->data['layout_body']='operationfileregister';
	 	

	 		$this->load->view('admin/layout/main_app', $this->data);

			#$this->load->view('file_register_new');
 		}
			
	}

	public function fetch_branch()
	{
		$this->load->model('branch_master'); 
		
		echo $this ->branch_master->fetch_branch($this->input->post('branch_id'));

	}
}

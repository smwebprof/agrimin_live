<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewreportformats extends CI_Controller {

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

        $cargo_details = $this->File_master->editFileCargoDetailsById($result[0]['id']);
        #print_r($cargo_details);exit;
        $commodity_name = implode(', ', array_column($cargo_details, 'commodity_name'));
        $commodity_arr = explode(",", $commodity_name);

               
        $doc_types_id = $this->Document_master->getDocumentDetailsById($id);

		$this->data['title'] = 'ACI - Viewreportformats';
		$this->data['operations_data'] = @$result;
		$this->data['doc_types'] = @$doc_types;
		$this->data['doc_types_info'] = @$doc_types_id;
		$this->data['commodity_name'] = $commodity_name;
		$this->data['layout_body']='viewreportformats';
	 	

	 	$this->load->view('admin/layout/main_app', $this->data);


			
	}


}

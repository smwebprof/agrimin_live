<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fullviewqualitycertificate extends CI_Controller {

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
	 * Author : Shivaji M Dalvi | Date : 15/10/2019
	 */



    public function index()
    {
        
        if (!isset($_SESSION['userId'])) {
          $login = BASE_PATH."login/";
          redirect($login);
        }

        #print_r($_SESSION);exit;
        #print_r($_POST);exit;
        $this->load->library('form_validation');
        $this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Certificate_master');
        $this->load->model('File_master');
        $this->load->model('Unit_master');
        $this->load->model('Client_master');
        $this->load->model('Lab_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

      
        $result = $this->Certificate_master->getQCertificateViewdata($id);
        //print_r($result);exit;
        $hold_details = $this->Certificate_master->getQCertificateDetailsdata($id);
        //print_r($hold_details);exit;
        $hold_data = implode(',', array_column($hold_details, 'hold_no'));
        $hold_data1 = explode(',', $hold_data);
        $hold_data2 = array_unique($hold_data1);        

        $specifications = $this->Certificate_master->getlabspecificationgroup();

        $labmin = $this->Certificate_master->getlabminByBranchId();
        $labmax = $this->Certificate_master->getlabmaxByBranchId();
        //print_r($labmin);exit;

        $labmethods = $this->Certificate_master->getlabmethodByBranchId();
        //print_r($labmethods);exit;

        $params['id'] = $id;
        #$params['hold_id'] = $hold_id;
        $spec_details = $this->Certificate_master->editQCertificateDetailsdataBySpec($params);
        //print_r($spec_details);exit;

        $parameters = $this->Lab_master->getlabParameters();

        $this->data['title'] = 'ACI - Fullviewqualitycertificate'; 
        $this->data['certificate_data'] = @$result;
        $this->data['specifications'] = $specifications;
        $this->data['labmin'] = $labmin;
        $this->data['labmax'] = $labmax;
        $this->data['labmethods'] = $labmethods;
        $this->data['hold_details'] = $hold_details;
        $this->data['hold_data'] = $hold_data2;
        $this->data['spec_details'] = $spec_details;
        $this->data['parameters'] = $parameters;


        $this->data['layout_body']='fullviewqualitycertificate';

        $this->load->view('admin/layout/main_app_qcert', $this->data);

    }

}

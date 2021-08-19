<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fullviewinvoicereport extends CI_Controller {

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

        $this->load->library('form_validation');
        $this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Invoice_master');
        $this->load->model('File_master');
        $this->load->model('Unit_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $result = $this->Invoice_master->getFileInvoicedata($id);
        //print_r($result);exit;
        $invoice_details = $this->Invoice_master->getInvoiceDetailsdata($id);
        //print_r($invoice_details);exit;
        $countries = $this->company_master->getCountries();

        $file_options = $this->File_master->getFileOptions();

        $units = $this->Unit_master->getAllUnitdata();

        $currency = $this->Invoice_master->getCurrency();

        $states = $this->company_master->getStates($result[0]['countryid']);
        $cities = $this->company_master->getCities($result[0]['stateid']);

        $this->data['title']='ACI - Fullviewinvoicereport';    
        $this->data['layout_body']='fullviewinvoicereport';
        $this->data['invoice_data'] = @$result;
        $this->data['invoice_details'] = @$invoice_details;
        $this->data['file_options'] = $file_options;
        $this->data['units'] = $units;
        $this->data['countries'] = $countries;
        $this->data['states'] = $states;
        $this->data['cities'] = $cities;
        $this->data['currency'] = $currency;
        $this->data['id'] = $id;

        $this->load->view('admin/layout/main_app', $this->data);


    
    }

}

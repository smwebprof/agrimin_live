<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fullviewproformainvoice extends CI_Controller {

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
        $this->load->library('form_validation');
        $this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Invoice_master');
        $this->load->model('File_master');
        $this->load->model('Packing_master');
        $this->load->model('Unit_master');
        $this->load->model('Cargo_Group_master');
        $this->load->model('Cargo_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $result = $this->Invoice_master->getProformaInvoicedata($id);
        //print_r($result);exit;
        #$invoice_details = $this->Invoice_master->getInvoiceDetailsdataNew($id);
        //print_r($invoice_details);exit;
        $countries = $this->company_master->getCountries();

        $file_options = $this->File_master->getFileOptions();

        $file_instructions = $this->File_master->getInstructions();

        $cargogroup = $this->Cargo_Group_master->getCargoGroup();
        $cargo = $this->Cargo_master->getCargodataByCargoGroup($result[0]['cargo_group']);

        $packing = $this->Packing_master->getPackingdata();
        $units = $this->Unit_master->getUnitdata();

        $currency = $this->Invoice_master->getCurrency();

        #$states = $this->company_master->getStates($result[0]['countryid']);
        #$cities = $this->company_master->getCities($result[0]['stateid']);

        $cargo_details = $this->Invoice_master->getProformaCargodata($id);         
        $other_details = $this->Invoice_master->getProformaOtherdata($id);
        #print_r($cargo_details);exit;

        $this->data['title']='ACI - Fullviewprofrominvoice';    
        $this->data['layout_body']='fullviewprofrominvoice';
        $this->data['invoice_data'] = @$result;
        $this->data['invoice_details'] = @$invoice_details;
        $this->data['file_options'] = $file_options;
        $this->data['instructions']=$file_instructions;
        $this->data['cargogroup']=$cargogroup;
        $this->data['cargo']=$cargo;
        $this->data['packing']=$packing;
        $this->data['units']=$units;
        $this->data['cargo_details'] = $cargo_details;
        $this->data['other_details'] = $other_details;
        $this->data['countries'] = $countries;
        #$this->data['states'] = $states;
        #$this->data['cities'] = $cities;
        $this->data['currency'] = $currency;
        $this->data['id'] = $id;

        $this->load->view('admin/layout/main_app', $this->data);


    
    }

}

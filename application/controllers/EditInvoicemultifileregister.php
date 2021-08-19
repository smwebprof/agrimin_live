<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditInvoicemultifileregister extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
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
        
        #print_r($_POST);exit;
        $this->load->library('form_validation');
        $this->load->model('company_master'); 
        $this->load->model('branch_master'); 
        $this->load->model('user_master');
        $this->load->model('Invoice_master');
        $this->load->model('File_master');
        $this->load->model('Unit_master');
        $this->load->model('Client_master');
        $this->load->helper('form');
        $id = base64_decode($_GET['id']);
        $dt = gmdate('Y-m-d H:i:s');
        $user = $_SESSION['fname']." ".$_SESSION['lname'];

        $result = $this->Invoice_master->getFileInvoicedata($id);
        //print_r($result);exit;
        $invoice_details = $this->Invoice_master->getInvoiceDetailsdata($id);
        //print_r($invoice_details);exit;
         
        $getInvoiceCurrBal = @$this->Invoice_master->getInvoiceIdMultiCurrBal($id);
        //print_r($getInvoiceCurrBal);exit;

        $getInvId = @$this->Invoice_master->getMultInvoiceIdByFileNo($result[0]['file_id']);
        //print_r($getInvId);exit;
        //echo $getInvId[0]['invoice_id'];exit;      

        foreach ($invoice_details as $k=>$v) {
            //if ($v['work_type']!='PADDY') {
                $cargo_cat[$v['work_prefix']] = $v;
            //} 
        }

        //print_r($cargo_cat);exit;

        $cargo_details = $this->Invoice_master->getInvoiceDetailsCargodata($id);
        #print_r($cargo_details);exit;
        
        foreach ($cargo_cat as $k=>$v) {
            $j=0;
            foreach ($cargo_details as $p=>$q) {
                #if ($k==$p) {
                if ($k==$q['work_prefix']) {
                    #$cargo_cat['cargo_details'][$k][$j] = $q;
                    $cargo_cat[$k]['cargo_details'][$j] = $q;
                    $j++;
                }
            }    
        }
        //print_r($cargo_cat);exit;
        #echo count($cargo_cat);exit;
        #echo count($cargo_cat[1]['cargo_details']);exit;
        #echo count($cargo_cat['cargo_details'][2]);exit; 
        /*$j=0;
        foreach ($cargo_details as $k=>$v) {
            $cargo_cat_details[$v['work_prefix']][$j] = $v;
            $j++;                                
        }*/
        #print_r($cargo_cat_details);
        #exit;

        $countries = $this->company_master->getCountries();

        $file_options = $this->File_master->getFileOptions();

        $units = $this->Unit_master->getAllUnitdata();

        $contact = $this->Client_master->getClientAttentiondetails($result[0]['client_id']);

        $clients = $this->Client_master->getClientdata();

        $currency = $this->Invoice_master->getCurrency();

        $states = $this->company_master->getStates($result[0]['countryid']);
        $cities = $this->company_master->getCities($result[0]['stateid']);

        if ($_POST) {
            //print_r($_POST);exit;

            //echo 'here';exit;
            if (strtotime(@$_POST['inspection_end_date']) < strtotime(@$_POST['inspection_start_date'])) {
                $redirect_url = BASE_PATH."EditInvoicefileregister?id=".base64_encode($id)."&msg=1";
                redirect($redirect_url);
            }

            if (empty($_POST['invitems_cargo_name'])) { 
                $redirect_url = BASE_PATH."EditInvoicefileregister?id=".base64_encode($id)."&msg=2";
                redirect($redirect_url);exit;    
            }
            #echo count($_POST['div_work_type']);exit;
            $_POST['user_id'] = @$_SESSION['userId']; 
            $dt = gmdate('Y-m-d H:i:s');
            $_POST['dt'] = $dt;
            $_POST['user_comp_id'] = @$_SESSION['comp_id']; 
            $_POST['user_branch_id'] = @$_SESSION['branch_id'];

            /*if ($_POST['invoice_type']=='Delete') {
                $delInvoiceId = $this->Invoice_master->deldraftinvoice($id);
                //print_r($getInvoiceId);exit;
                $invoice_list = BASE_PATH."Viewinvoicefileregister?msg=3";
                redirect($invoice_list);
            }*/    

            if ($_POST['invoice_type']=='Draft') {
                $invtot_quantity = 0;
                foreach($_POST['invitems_quantity'] as $key=>$value)
                {
                    if ($_POST['invitems_cargo_group'][$key] !== "Other") {
                        $invtot_quantity+= (float)$value;
                        #$_POST['invtotitems_quantity'] = $invtot_quantity;
                    }
                }
                //echo $invtot_quantity."===".@$_POST['invtotitems_quantity']."===".$_POST['invoice_curr_bal'];exit;

                if ($_POST['invoice_curr_bal'] > $_POST['approx_qty']) {
                    $redirect_url = BASE_PATH."EditInvoicemultifileregister?id=".base64_encode($id)."&msg=5";
                    redirect($redirect_url);
                }

                if ($invtot_quantity > $_POST['invoice_curr_bal']) {
                    $redirect_url = BASE_PATH."EditInvoicemultifileregister?id=".base64_encode($id)."&msg=4";
                    redirect($redirect_url);
                }
            
            }    

            if ($_POST['invoice_type']=='Final') {
                #echo 'Final';exit;

                $invtot_quantity = 0;
                foreach($_POST['invitems_quantity'] as $key=>$value)
                {
                    if ($_POST['invitems_cargo_group'][$key] !== "Other") {
                        $invtot_quantity+= (float)$value;
                        $_POST['invtotitems_quantity'] = $invtot_quantity;
                    }
                }
                //echo $invtot_quantity."===".@$_POST['invtotitems_quantity']."===".$_POST['invoice_curr_bal'];exit;
                if ($_POST['invoice_curr_bal'] > $_POST['approx_qty']) {
                    $redirect_url = BASE_PATH."EditInvoicemultifileregister?id=".base64_encode($id)."&msg=5";
                    redirect($redirect_url);
                }

                if ($invtot_quantity > $_POST['invoice_curr_bal']) {
                    $redirect_url = BASE_PATH."EditInvoicemultifileregister?id=".base64_encode($id)."&msg=4";
                    redirect($redirect_url);
                }

                /*if ($invtot_quantity == $_POST['invoice_curr_bal']) {
                    $_POST['invoice_type']='Final';
                }*/                

              if ($invtot_quantity == $_POST['invoice_curr_bal']) { 

                    if (!empty($getInvId[0]['invoice_id'])) { 
                        $invoiceId = @$getInvId[0]['invoice_id'];
                        $invoiceId = str_pad($invoiceId, 3, '0', STR_PAD_LEFT);
                        //echo $invoiceId; exit;

                        $updateinvoiceno['invoice_no'] = 'ACI/'.$_POST['file_no']."/".$invoiceId;
                        $updateinvoiceno['id'] = $_POST['invoice_no'];
                        $updateinvoiceno['invoice_id'] = @$getInvId[0]['invoice_id'];
                        //print_r($updateinvoiceno);exit;
                    } else { 
                        $getInvoiceId = $this->Invoice_master->getInvoiceIdByBranch();
                        //print_r($getInvoiceId);exit;
                        $str = explode('-',$getInvoiceId[0]['invoice_id']);
                        //print_r($str);exit;
                        $x = $str[0];
                        $x++;
                        $invoiceId = $x;
                        $invoiceId = str_pad($invoiceId, 3, '0', STR_PAD_LEFT);
                        //echo $invoiceId; exit;

                        $updateinvoiceno['invoice_no'] = 'ACI/'.$_POST['file_no']."/".$invoiceId;
                        $updateinvoiceno['id'] = $_POST['invoice_no'];
                        $updateinvoiceno['invoice_id'] = $x;
                        //print_r($updateinvoiceno);exit;

                    }  

                    $resultdata = $this->Invoice_master->updateEditMultInvoiceData($this->input->post());

                    #$updateCargoDetails = $this->Invoice_master->updateInvoiceDetailsNew($this->input->post());
                    $updateCargoDetails = $this->Invoice_master->updateInvoiceDetailsNew3($this->input->post());

                    $updateInvoiceNoData = $this->Invoice_master->updateInvoiceNo($updateinvoiceno);

                    $UpdateFileData = $this->Invoice_master->UpdateFileDataByInvoice($this->input->post()); 
                    
              } else {   
                if (!empty($getInvId[0]['invoice_id'])) { 
                    $getInvoiceId = $this->Invoice_master->getInvoiceIdMultiByBranch($getInvId[0]['invoice_id']);
                    //print_r($getInvoiceId);exit; 
                    $str = explode('-',$getInvoiceId[0]['invoice_no']);
                    //print_r($str);exit;
                } else {  
                    $getInvoiceId = $this->Invoice_master->getInvoiceIdByBranch();
                    //print_r($getInvoiceId);exit;
                    $str = explode('-',$getInvoiceId[0]['invoice_id']);
                    //print_r($str);exit;
                }   

                //$str = explode('-',$getInvoiceId[0]['invoice_no']);
                //print_r($str);exit;
                if (count($str)>1) { 

                    $x = $str[1];
                    $x++;
                    $invoiceId = @$getInvoiceId[0]['invoice_id'];
                    $invoiceId = str_pad($invoiceId, 3, '0', STR_PAD_LEFT)."-".$x;
                    //echo $invoiceId; exit;

                    $updateinvoiceno['invoice_no'] = 'ACI/'.$_POST['file_no']."/".$invoiceId;
                    $updateinvoiceno['id'] = $_POST['invoice_no'];
                    $updateinvoiceno['invoice_id'] = $getInvId[0]['invoice_id'];
                    //print_r($updateinvoiceno);exit;

                    $resultdata = $this->Invoice_master->updateEditMultInvoiceData($this->input->post());

                    #$updateCargoDetails = $this->Invoice_master->updateInvoiceDetailsNew($this->input->post());
                    $updateCargoDetails = $this->Invoice_master->updateInvoiceDetailsNew3($this->input->post());

                    $updateInvoiceNoData = $this->Invoice_master->updateInvoiceNo($updateinvoiceno); 

                } else { 
                    
                    $x = 'A';
                    $invoiceId = @$getInvoiceId[0]['invoice_id']+1;
                    $invoiceId = str_pad($invoiceId, 3, '0', STR_PAD_LEFT)."-".$x;
                    //echo $invoiceId; exit;

                    $updateinvoiceno['invoice_no'] = 'ACI/'.$_POST['file_no']."/".$invoiceId;
                    $updateinvoiceno['id'] = $_POST['invoice_no'];
                    $updateinvoiceno['invoice_id'] = $invoiceId;
                    //print_r($updateinvoiceno);exit;

                    $resultdata = $this->Invoice_master->updateEditMultInvoiceData($this->input->post());

                    #$updateCargoDetails = $this->Invoice_master->updateInvoiceDetailsNew($this->input->post());
                    $updateCargoDetails = $this->Invoice_master->updateInvoiceDetailsNew3($this->input->post());

                    $updateInvoiceNoData = $this->Invoice_master->updateInvoiceNo($updateinvoiceno);

                }
               }     
            } else { 
                //print_r($_POST);exit; 

                $resultdata = $this->Invoice_master->updateEditMultInvoiceData($this->input->post());

                #$updateCargoDetails = $this->Invoice_master->updateInvoiceDetailsNew($this->input->post());
                $updateCargoDetails = $this->Invoice_master->updateInvoiceDetailsNew3($this->input->post());

            }

            $invoice_list = BASE_PATH."Viewinvoicefileregister?msg=3";
            redirect($invoice_list);

            #$_POST['invoice_no'] = $resultdata;
            #$invoicedata = $this->Invoice_master->addInvoiceDetails($this->input->post());

            #$UpdateFileData = $this->Invoice_master->UpdateFileDataByInvoice($this->input->post());

            /*$this->data['success'] = "Data updated successfully!!!.";

            $this->data['title'] = 'ACI - Invoicefileregister';
            $this->data['invoice_data'] = @$result;
            $this->data['invoice_details'] = @$invoice_details;
            $this->data['file_options'] = $file_options;
            $this->data['units'] = $units;
            $this->data['countries'] = $countries;
            $this->data['states'] = $states;
            $this->data['cities'] = $cities;
            $this->data['currency'] = $currency;
            $this->data['layout_body']='editinvoicefileregister';
        

            $this->load->view('admin/layout/main_app', $this->data);*/

        } else {

            $this->data['title'] = 'ACI - EditInvoicemultifileregister';
            $this->data['invoice_data'] = @$result;
            $this->data['invoice_details'] = @$invoice_details;
            $this->data['file_options'] = $file_options;
            $this->data['units'] = $units;
            $this->data['countries'] = $countries;
            $this->data['states'] = $states;
            $this->data['cities'] = $cities;
            $this->data['contact'] = $contact;
            $this->data['clients_data']=$clients;
            $this->data['currency'] = $currency;
            $this->data['cargo_cat'] = $cargo_cat;
            if (!empty($getInvoiceCurrBal[0]['invoice_curr_bal'])) {
                $this->data['invoice_curr_bal'] = $getInvoiceCurrBal[0]['invoice_curr_bal'];
            } else {
                $this->data['invoice_curr_bal'] = $result[0]['approx_qty'];
            }
            

            #$this->data['cargo_cat_details'] = $cargo_cat_details;
            $this->data['layout_body']='editinvoicemultifileregister';
        

            $this->load->view('admin/layout/main_app_editinv', $this->data);

            #$this->load->view('file_register_new');
      }     
    
    }

    public function fetch_branch()
    {
        $this->load->model('branch_master'); 
        
        echo $this ->branch_master->fetch_branch($this->input->post('branch_id'));

    }
}

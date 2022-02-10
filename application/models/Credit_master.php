<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Credit_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_unit_master'; 
    } 

    public function addCreditDataNew($data){

        #$invoice_id = explode("|",@$data['invoice_id']);

        $result = array('invoice_id'=>@$data['invoice_id'],'invoice_no'=>@$data['invoice_no'],'file_id'=>$data['file_id'],'file_no'=>$data['file_no'],'invoice_date'=>@$data['invoice_date'],'client_id'=>$data['client_id'],'kind_attention'=>$data['client_contact'],'inspection_date'=>@$data['inspection_date'],'inspection_start_date'=>@$data['inspection_start_date'],'inspection_end_date'=>@$data['inspection_end_date'],'vessel_name'=>@$data['vessel_name'],'voyage_no'=>@$data['voyage_no'],'cargo_group'=>@$data['cargo_group'],'cargo_master'=>$data['cargo_master'],'approx_qty'=>$data['approx_qty'],'approx_unit'=>$data['approx_unit'],'load_port'=>$data['load_port'],'discharge_port'=>$data['discharge_port'],'credit_remarks'=>$data['credit_remarks'],'credit_note_currency'=>@$data['invoice_currency'],'credit_note_ex_rate'=>@$data['invoice_ex_rate'],'credit_note_basic_ex_amt'=>@$data['invoice_basic_ex_amt'],'credit_note_basic_amt'=>@$data['invoice_subtotal_amt'],'credit_note_vat_percent'=>@$data['invoice_total_vat_percnt'],'credit_note_tax_amt'=>@$data['invoice_total_tax_amt'],'credit_note_discount'=>@$data['invoice_total_discount'],'credit_note_discount_amt'=>@$data['invoice_total_disc_amt'],'credit_note_amt'=>@$data['invoice_total_full_amt'],'invoice_balane_amt'=>@$data['invoice_credit_amt'],'bill_lading_no'=>@$data['bill_lading_no'],'bill_lading_date'=>@$data['bill_lading_date'],'invoice_desc'=>@$data['inv_desc_details'],'invoice_tot_amt'=>@$data['invoice_amt'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'op_year'=>@$_SESSION['operatingyear']);
        //print_r($result);exit;
        $this->db->insert('agrimin_credit_note_master',$result);
        return $this->db->insert_id();

    }

    public function addCreditDetailsNew($data){

          $j=0; 
          $work_prefix_arr = array(); 
          for ($x = 0; $x < count($data['invitems_cargo_name']); $x++) {

          $result = array('credit_id'=>$data['credit_id'],'work_type'=>@$data['invitems_cargo_name'][$x],'approx_qty'=>@$data['invitems_quantity'][$x],'approx_unit'=>@$data['invitems_unit'][$x],'invoice_work_rate'=>@$data['invitems_rate'][$x],'invoice_work_discount'=>@$data['invitems_discount'][$x],'invoice_work_amount'=>@$data['invitems_amt'][$x],'work_prefix'=>@$invitems_cargo_name[1],'work_items'=>$j);
            
           $this->db->insert('agrimin_credit_note_details',$result); 
         }

          /****for ($x = 0; $x < count($data['invitems_cargo_name']); $x++) {
            #echo $data['div_approx_qty'][$x];exit;
          #$j=$x+1;
          $invitems_cargo_name = explode("|",$data['invitems_cargo_details'][$x]);
            if (!empty(@$data['invitems_cargo_name'][$x])) {
              
              if (!in_array(@$invitems_cargo_name[1],$work_prefix_arr)) { $j=0;}

              $result = array('invoice_no'=>$data['invoice_no'],'work_type'=>@$data['invitems_cargo_name'][$x],'approx_qty'=>@$data['invitems_quantity'][$x],'approx_unit'=>@$data['invitems_unit'][$x],'invoice_work_rate'=>@$data['invitems_rate'][$x],'invoice_work_discount'=>@$data['invitems_discount'][$x],'invoice_work_amount'=>@$data['invitems_amt'][$x],'work_prefix'=>@$invitems_cargo_name[1],'work_items'=>$j);
     
              $j++; 

              array_push($work_prefix_arr,@$invitems_cargo_name[1]);  
              $work_prefix_arr = array_unique($work_prefix_arr); 
              $this->db->insert('agrimin_credit_note_details',$result);
            }
            
                    
        } ****/
        #print_r($work_prefix_arr);exit;
        //print_r($result);exit;
        #echo '<pre>';print_r($result);echo '</pre>';exit;  

        return $result;

    }

    function getCreditIdByBranch() { 

        $querystring = 'SELECT credit_note_id,credit_note_no FROM agrimin_credit_note_master acnm Where acnm.user_comp_id = "'.$_SESSION['comp_id'].'" and acnm.user_branch_id = "'.$_SESSION['branch_id'].'" and acnm.op_year = "'.$_SESSION['operatingyear'].'" Order By credit_note_id desc limit 1';

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function updateCreditNo($data){
      
      // update file no agrimin_fileregister_transaction table
      $result = array('credit_note_no'=>$data['credit_note_no'],'credit_note_id'=>$data['credit_note_id']);
      //print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('agrimin_credit_note_master',$result);
      //print_r($this->db->last_query());exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   function getCreditByFinalStatus(){ 

        $querystring =  "SELECT acnm.id,acnm.credit_note_no FROM agrimin_credit_note_master acnm";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
    }

    function getCreditdataById($params){ 

        $querystring =  "SELECT acgm.*,acm.id client_id,acm.client_name,acm.address,acm.vat_no,acm.email_address,acm.zip_pin_code,acm.country_code,acm.tel_no,acnt.name country,ast.name state,act.name city,acnt.id countryid,ast.id stateid,act.id cityid,aeum1.first_name fname,aeum1.last_name lname,aeum2.first_name ename,aeum2.last_name elname,acnt1.currency,acnt1.subunit,acnt1.currency,acnt1.sortname,acnt1.symbol FROM agrimin_credit_note_master acgm left join agrimin_client_master acm ON acm.id=acgm.client_id left join agrimin_countries acnt ON acnt.id=acm.country_id left join agrimin_states ast ON ast.id=acm.state_id left join agrimin_cities act ON act.id=acm.city_id left join agrimin_employee_users_master aeum1 ON aeum1.id=acgm.entry_user_id left join agrimin_employee_users_master aeum2 ON aeum2.id=acgm.modify_user_id left join agrimin_countries acnt1 ON acnt1.id=acgm.credit_note_currency  WHERE acgm.id =  '".$params."'";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCreditdetailsById($params){ 

        $querystring =  "SELECT * FROM agrimin_credit_note_details acgd WHERE acgd.credit_id =  '".$params."'";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCreditFileInvoicedata($params){ 

          $querystring =  'SELECT acgm.*,aft.id file_id1,aft.file_no file_no1,aft.file_creation_date,aft.tax_options,acm.id client_id,acm.client_name,acm.address,acm.vat_no,acm.email_address,acm.zip_pin_code,acm.country_code,acm.tel_no,acnt.name country,ast.name state,act.name city,acnt.id countryid,ast.id stateid,act.id cityid,aeum1.first_name fname,aeum1.last_name lname,aeum2.first_name ename,aeum2.last_name elname,acnt1.currency,acnt1.subunit,acnt1.currency,acnt1.sortname,acnt1.symbol from agrimin_credit_note_master acgm left join agrimin_fileregister_transaction aft On aft.id = acgm.file_no left join agrimin_client_master acm ON acm.id=acgm.client_id left join agrimin_unit_master aunm ON aunm.id=aft.approx_unit left join agrimin_special_instruction asi ON asi.id=aft.special_instruction left join agrimin_file_options_master afom ON afom.id=aft.file_sub_type_id left join agrimin_countries acnt ON acnt.id=acm.country_id left join agrimin_states ast ON ast.id=acm.state_id left join agrimin_cities act ON act.id=acm.city_id left join agrimin_employee_users_master aeum1 ON aeum1.id=acgm.entry_user_id left join agrimin_employee_users_master aeum2 ON aeum2.id=acgm.modify_user_id left join agrimin_countries acnt1 ON acnt1.id=acgm.credit_note_currency Where acgm.id = '.$params;
          $queryforpubid = $this->db->query($querystring);

          $result = $queryforpubid->result_array();
          return $result;

   }

   public function updateEditCreditData($data){
        //print_r($data);exit;

        $result = array('kind_attention'=>$data['client_contact'],'inspection_date'=>@$data['inspection_dt'],'inspection_start_date'=>@$data['inspection_start_date'],'inspection_end_date'=>@$data['inspection_end_date'],'vessel_name'=>@$data['vessel_name'],'voyage_no'=>@$data['voyage_no'],'cargo_group'=>@$data['cargo_group'],'cargo_master'=>$data['cargo_master'],'approx_qty'=>$data['approx_qty'],'approx_unit'=>$data['approx_unit'],'load_port'=>$data['load_port'],'discharge_port'=>$data['discharge_port'],'credit_remarks'=>$data['credit_remarks'],'credit_note_currency'=>@$data['credit_note_currency'],'credit_note_ex_rate'=>@$data['credit_note_ex_rate'],'credit_note_basic_ex_amt'=>@$data['credit_note_basic_ex_amt'],'credit_note_basic_amt'=>@$data['invoice_subtotal_amt'],'credit_note_vat_percent'=>@$data['invoice_total_vat_percnt'],'credit_note_tax_amt'=>@$data['invoice_total_tax_amt'],'credit_note_discount'=>@$data['invoice_total_discount'],'credit_note_discount_amt'=>@$data['invoice_total_disc_amt'],'credit_note_amt'=>@$data['invoice_total_full_amt'],'invoice_balane_amt'=>@$data['invoice_balane_amt'],'bill_lading_no'=>@$data['bill_lading_no'],'bill_lading_date'=>@$data['bill_lading_date'],'invoice_desc'=>@$data['inv_desc_details'],'invoice_tot_amt'=>@$data['invoice_tot_amt'],'status'=>@$data['credit_status'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'op_year'=>@$_SESSION['operatingyear']);
        //print_r($result);exit;
        $this->db->where('id', $data['credit_id']);
        $this->db->limit(1);
        $this->db->update('agrimin_credit_note_master',$result);
      
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    public function updateCreditDetailsNew($data){

          $j=0; 
          $work_prefix_arr = array(); 
          for ($x = 0; $x < count($data['invitems_cargo_name']); $x++) {

          $result = array('credit_id'=>$data['credit_id'],'work_type'=>@$data['invitems_cargo_name'][$x],'approx_qty'=>@$data['invitems_quantity'][$x],'approx_unit'=>@$data['invitems_unit'][$x],'invoice_work_rate'=>@$data['invitems_rate'][$x],'invoice_work_discount'=>@$data['invitems_discount'][$x],'invoice_work_amount'=>@$data['invitems_amt'][$x],'work_prefix'=>@$invitems_cargo_name[1],'work_items'=>$j);
          //print_r($result);exit;  
          $this->db->where('id', $data['invitems_cargo_id'][$x]);
          $this->db->limit(1);
          $this->db->update('agrimin_credit_note_details',$result); 

         } 

        return $result;

    }

    function getAllCreditNotedataByStatus(){  

        $querystring =  "SELECT aim.*,acnm.id credit_note_id,acnm.credit_note_no,acnm.invoice_no credit_note_invoice_no,acnm.entry_date,acnm.modify_date credit_date,acnm.status credit_status,acnm.credit_note_amt,acnm.credit_note_tax_amt,acnm.credit_note_basic_amt FROM agrimin_invoice_master aim left join agrimin_credit_note_master acnm on aim.id=acnm.invoice_id WHERE aim.user_comp_id = '".$_SESSION['comp_id']."' and aim.user_branch_id = '".$_SESSION['branch_id']."' and aim.is_active = 1 and aim.invoice_type='Final' and aim.status!='Closed' order by aim.id desc";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        /*$resultdata = array();
        foreach ($result as $k => $v) {  
            if ($v['credit_status'] !== "Cancelled") {
                  $resultdata[] = $v;  
            }
        }*/
        //print_r($resultdata);exit;
        return @$result; //$resultdata

    }

    function getAllCreditNotedataByStatusSearch($data){

        $search = '';
        if ($data['invoice_from_date'] || $data['invoice_to_date']) {
          $search .= ' and date(aim.entry_date) >= "'.date('Y-m-d',strtotime($data['invoice_from_date'])).'" and date(aim.entry_date) <= "'.date('Y-m-d',strtotime($data['invoice_to_date'])).'"';
        }

        if ($data['status']) {
          $search .= ' and acnm.status = "'.$data['status'].'"';
        } 

        if ($data['clients_name']) {
          $search .= ' and aim.client_id = "'.$data['clients_name'].'"';
       } 

        $querystring =  "SELECT aim.*,acnm.id credit_note_id,acnm.credit_note_no,acnm.invoice_no credit_note_invoice_no,acnm.entry_date ,acnm.status credit_status,acnm.credit_note_amt,acnm.credit_note_tax_amt,acnm.credit_note_basic_amt FROM agrimin_invoice_master aim left join agrimin_credit_note_master acnm on aim.id=acnm.invoice_id WHERE aim.user_comp_id = '".$_SESSION['comp_id']."' and aim.user_branch_id = '".$_SESSION['branch_id']."' and aim.is_active = 1 and aim.invoice_type='Final' $search order by aim.id desc"; // and aim.status!='Closed' 

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        return @$result;

    }

    public function delinvoicecreditnoteregister($id,$dt)
      { 
      //print_r($data);exit;  
      $result = array('is_active'=>0,'status'=> 'Cancelled','modify_user_id'=>@$_SESSION['userId'],'modify_date'=>@$dt);
      //print_r($result);exit;
      $this->db->where('id', $id);
      $this->db->limit(1);
      $this->db->update('agrimin_credit_note_master',$result);
      //print_r($this->db->last_query());exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);
    }

    public function openinvoicecreditnoteregister($id,$dt)
      { 
      //print_r($data);exit;  
      $result = array('is_active'=>1,'status'=> 'Open','modify_user_id'=>@$_SESSION['userId'],'modify_date'=>@$dt);
      //print_r($result);exit;
      $this->db->where('id', $id);
      $this->db->limit(1);
      $this->db->update('agrimin_credit_note_master',$result);
      //print_r($this->db->last_query());exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);
    }

    function getInvoicedataById($params){ 

        $querystring =  "SELECT aim.*,aft.file_no fileno,aft.id fileid,aft.approx_unit approx_unit1 FROM agrimin_invoice_master aim left join agrimin_fileregister_transaction aft on aft.id=aim.file_no WHERE aim.id =  '".$params."'";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function updateEditCreditDate($data){
        //print_r($data);exit;

        $result = array('modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']);
        //print_r($result);exit;
        $this->db->where('id', $data['credit_id']);
        $this->db->limit(1);
        $this->db->update('agrimin_credit_note_master',$result);
      
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    function UpdateInvoiceBalance($data){
      //print_r($data);exit;
      $result = array('invoice_balane_amt'=> @$data['invoice_balane_amt'],'invoice_credit_amt'=> @$data['invoice_credit_amt'],'modify_user_id'=>@$data['user_id'],'modify_date'=>@$data['dt']);
      //print_r($result);exit;
      $this->db->where('id', @$data['invoice_id']);
      $this->db->limit(1);
      $this->db->update('agrimin_invoice_master',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   function UpdatePaymentBalance($data){
      #print_r($data);exit;
      $querystring =  "SELECT * FROM agrimin_payment_invoice_master apim WHERE apim.invoice_no =  '".@$data['invoice_id']."' order by id desc limit 1";

      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      //print_r($result);exit;

      $payment_id = $result[0]['id'];

      $result = array('invoice_balane_amt'=> @$data['invoice_balane_amt'],'invoice_credit_amt'=> @$data['invoice_credit_amt'],'modify_user_id'=>@$data['user_id'],'modify_date'=>@$data['dt']);
      //print_r($result);exit; 
      $this->db->where('id', $payment_id);
      $this->db->limit(1);
      $this->db->update('agrimin_payment_invoice_master',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   function UpdateInvoiceStatus($data){
      //print_r($data);exit;
      $result = array('status'=> 'Open','modify_user_id'=>@$data['user_id'],'modify_date'=>@$data['dt']);
      //print_r($result);exit;
      $this->db->where('id', @$data['invoice_id']);
      $this->db->limit(1);
      $this->db->update('agrimin_invoice_master',$result);
      //print_r($this->db->last_query());exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   function UpdateInvoicePaymentDataByFile($data){
      //print_r($data);exit;
      $result = array('status'=> 'Invoiced','modify_user_id'=>@$data['user_id'],'modify_date'=>@$data['dt']);
      //print_r($result);exit;
      $this->db->where('id', $data['invoice_file_no']);
      $this->db->limit(1);
      $this->db->update('agrimin_fileregister_transaction',$result);
      #print_r($this->db->last_query());exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   public function UpdateCreditInvoiceStatus($data){
        //print_r($data);exit;

        $result = array('status'=> 'Closed','modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']);
        //print_r($result);exit;
        $this->db->where('invoice_id', $data['invoice_id']);
        $this->db->limit(1);
        $this->db->update('agrimin_credit_note_master',$result);
      
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

}

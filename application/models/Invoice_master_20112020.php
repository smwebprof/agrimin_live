<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_unit_master'; 
    } 

    function getAllInvoicedata(){ 

        $querystring =  "SELECT aim.*,aft.file_no,aft.id file_id,ac.currency FROM agrimin_invoice_master aim left join agrimin_fileregister_transaction aft on aft.id=aim.file_no left join agrimin_countries ac on aim.invoice_currency=ac.id WHERE aim.user_comp_id =  '".$_SESSION['comp_id']."' and aim.user_branch_id = '".$_SESSION['branch_id']."' and aim.is_active = 1 Order by aim.id desc";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getViewAllInvoicedata(){ 

        $querystring =  "SELECT aim.*,aft.file_no,aft.id file_id,ac.currency FROM agrimin_invoice_master aim left join agrimin_fileregister_transaction aft on aft.id=aim.file_no left join agrimin_countries ac on aim.invoice_currency=ac.id WHERE aim.user_comp_id =  '".$_SESSION['comp_id']."' and aim.user_branch_id = '".$_SESSION['branch_id']."' and aim.is_active = 1 Order by aim.id desc";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        foreach ($result as $invoice_data) {
            $invoice_no[$invoice_data['file_no']] = $invoice_data['invoice_type'];
        }
        //print_r($invoice_no);exit;
        return @$invoice_no;

    }

     function getInvoicedataById($params){ 

        $querystring =  "SELECT aim.*,aft.file_no fileno,aft.id fileid FROM agrimin_invoice_master aim left join agrimin_fileregister_transaction aft on aft.id=aim.file_no WHERE aim.id =  '".$params."'";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getInvoiceById($params){ 

        $querystring =  "SELECT aim.*,acm.client_name FROM agrimin_invoice_master aim left join agrimin_client_master acm on aim.client_id=acm.id WHERE aim.id =  '".$params."'";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
    }

    function getInvoiceByFileNo($params){ 

        $querystring =  "SELECT aim.* FROM agrimin_invoice_master aim WHERE aim.file_no =  '".$params."' and aim.invoice_type = 'Draft' and aim.status = 'Open'";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
    }

    function getPaymentInvoiceById($params){ 

        $querystring =  "SELECT apim.*,aim.file_no,aim.id invoice_id,aim.invoice_no invoiceno,aim.client_id,acm.client_name,aeum1.first_name fname,aeum1.last_name lname,aeum2.first_name ename,aeum2.last_name elname FROM agrimin_payment_invoice_master apim left join agrimin_invoice_master aim on aim.id=apim.invoice_no left join agrimin_client_master acm on aim.client_id=acm.id left join agrimin_employee_users_master aeum1 ON aeum1.id=apim.entry_user_id left join agrimin_employee_users_master aeum2 ON aeum2.id=apim.modify_user_id WHERE apim.id =  '".$params."'";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
    }

    function getInvoiceStatusById($params){ 

       $querystring =  "SELECT status FROM agrimin_invoice_master WHERE file_no =  '".$params."'";

       $queryforpubid = $this->db->query($querystring);

       $result = $queryforpubid->result_array();
       
       $flag = 1;
       foreach ($result as $invoice_status) {
            if ($invoice_status['status']=='Open') {
                $flag = 0;
            }
       }
       //echo $flag;exit;
       return $flag;
    }

    function getAllInvoicedataSearch($data){  //$id

       $search = '';
       if ($data['invoice_from_date'] || $data['invoice_to_date']) {
          $search .= ' and date(aim.entry_date) >= "'.date('Y-m-d',strtotime($data['invoice_from_date'])).'" and date(aim.entry_date) <= "'.date('Y-m-d',strtotime($data['invoice_to_date'])).'"';
       }

      if ($data['invoice_type']) {
          $search .= ' and aim.invoice_type = "'.$data['invoice_type'].'"';
       } 

      if ($data['status']) {
          $search .= ' and aim.status = "'.$data['status'].'"';
       }

       if ($data['clients_name']) {
          $search .= ' and aim.client_id = "'.$data['clients_name'].'"';
       }

      if ($data['file_no_type']) {
          $search .= ' and aim.file_no_type = "'.$data['file_no_type'].'"';
       }

       $querystring =  "SELECT aim.*,aft.file_no,aft.id file_id,ac.currency FROM agrimin_invoice_master aim left join agrimin_fileregister_transaction aft on aft.id=aim.file_no left join agrimin_countries ac on aim.invoice_currency=ac.id WHERE aim.user_comp_id =  '".$_SESSION['comp_id']."' and aim.user_branch_id = '".$_SESSION['branch_id']."' and aim.is_active = 1 $search Order by aim.id desc";
       #echo $querystring;exit;

       $queryforpubid = $this->db->query($querystring);

       $result = $queryforpubid->result_array();
       return $result;

    }


    function getAllInvoicePaymentdata(){ 

        $querystring =  "SELECT aim.*,apim.id payment_id,apim.payment_date,apim.invoice_rec_amt,apim.invoice_balane_amt FROM agrimin_invoice_master aim left join agrimin_payment_invoice_master apim on aim.id=apim.invoice_no WHERE aim.user_comp_id =  '".$_SESSION['comp_id']."' and aim.user_branch_id = '".$_SESSION['branch_id']."' and aim.is_active = 1  order by apim.id desc";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }  

    function getAllInvoicePaymentdataByStatus(){ 

        $querystring =  "SELECT aim.*,apim.id payment_id,apim.invoice_no payment_invoice_no,apim.payment_date,apim.invoice_rec_amt,apim.invoice_balane_amt FROM agrimin_invoice_master aim left join agrimin_payment_invoice_master apim on aim.id=apim.invoice_no WHERE aim.user_comp_id =  '".$_SESSION['comp_id']."' and aim.user_branch_id = '".$_SESSION['branch_id']."' and aim.is_active = 1 and aim.invoice_type='Final'  order by apim.id desc";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllInvoicePaymentdataByStatusSearch($data){ 

        $search = '';
        if ($data['invoice_from_date'] || $data['invoice_to_date']) {
          $search .= ' and date(aim.entry_date) >= "'.date('Y-m-d',strtotime($data['invoice_from_date'])).'" and date(aim.entry_date) <= "'.date('Y-m-d',strtotime($data['invoice_to_date'])).'"';
       }

        if ($data['invoice_type']) {
          $search .= ' and aim.invoice_type = "'.$data['invoice_type'].'"';
        } 

        if ($data['status']) {
          $search .= ' and aim.status = "'.$data['status'].'"';
        }

        if ($data['clients_name']) {
          $search .= ' and aim.client_id = "'.$data['clients_name'].'"';
        }

        if ($data['file_no_type']) {
          $search .= ' and aim.file_no_type = "'.$data['file_no_type'].'"';
        }

        $querystring =  "SELECT aim.*,apim.id payment_id,apim.payment_date,apim.invoice_rec_amt,apim.invoice_balane_amt FROM agrimin_invoice_master aim left join agrimin_payment_invoice_master apim on aim.id=apim.invoice_no WHERE aim.user_comp_id =  '".$_SESSION['comp_id']."' and aim.user_branch_id = '".$_SESSION['branch_id']."' and aim.is_active = 1 and aim.invoice_type='Final' $search  order by apim.id desc";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    function getInvoicedata($params){ 

        $querystring =  'SELECT aft.*,acm.id client_id,acm.client_name,acm.address,acm.vat_no,acm.zip_pin_code,acnt.name country,ast.name state,act.name city,acnt.id countryid,ast.id stateid,act.id cityid,aft.vessel_name,aft.voyage_no,acgm.name cargo_group_name,accm.commodity_name,apm.paking_name,aft.packing_desc,aft.approx_qty,aunm.unit_name,asi.description,aft.attendance_placed,aft.origin,aft.load_port,aft.discharge_port,afom.name options_name FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_cargo_group_master acgm ON acgm.id=aft.cargo_group_id left join agrimin_packing_master apm ON apm.id=aft.packing_id left join agrimin_unit_master aunm ON aunm.id=aft.approx_unit left join agrimin_special_instruction asi ON asi.id=aft.special_instruction left join agrimin_file_options_master afom ON afom.id=aft.file_sub_type_id left join agrimin_countries acnt ON acnt.id=acm.country_id left join agrimin_states ast ON ast.id=acm.state_id left join agrimin_cities act ON act.id=acm.city_id Where aft.is_active = 1 and aft.id = '.$params.' order by aft.id desc';
        #echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getFileInvoicedata($params){ 

        #$querystring =  'SELECT aim.*,aft.id file_id,aft.file_no file_no,aft.file_creation_date,aft.vessel_name,aft.voyage_no,acm.id client_id,acm.client_name,acm.address,acm.vat_no,acnt.name country,ast.name state,act.name city,acnt.id countryid,ast.id stateid,act.id cityid,aft.vessel_name,aft.voyage_no,acgm.name cargo_group_name,accm.commodity_name,apm.paking_name,aft.packing_desc,aft.approx_qty,aunm.unit_name,asi.description,aft.attendance_placed,aft.origin,aft.load_port,aft.discharge_port,afom.name options_name from agrimin_invoice_master aim left join agrimin_fileregister_transaction aft On aft.id = aim.file_no left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_cargo_group_master acgm ON acgm.id=aft.cargo_group_id left join agrimin_packing_master apm ON apm.id=aft.packing_id left join agrimin_unit_master aunm ON aunm.id=aft.approx_unit left join agrimin_special_instruction asi ON asi.id=aft.special_instruction left join agrimin_file_options_master afom ON afom.id=aft.file_sub_type_id left join agrimin_countries acnt ON acnt.id=acm.country_id left join agrimin_states ast ON ast.id=acm.state_id left join agrimin_cities act ON act.id=acm.city_id Where aim.id = '.$params;

        $querystring =  'SELECT aim.*,aft.id file_id,aft.file_no file_no,aft.file_creation_date,aft.tax_options,acm.id client_id,acm.client_name,acm.address,acm.vat_no,acm.email_address,acm.zip_pin_code,acm.country_code,acm.tel_no,acnt.name country,ast.name state,act.name city,acnt.id countryid,ast.id stateid,act.id cityid,aeum1.first_name fname,aeum1.last_name lname,aeum2.first_name ename,aeum2.last_name elname,acnt1.currency,acnt1.subunit,acnt1.currency,acnt1.sortname,acnt1.symbol from agrimin_invoice_master aim left join agrimin_fileregister_transaction aft On aft.id = aim.file_no left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_cargo_group_master acgm ON acgm.id=aft.cargo_group_id left join agrimin_packing_master apm ON apm.id=aft.packing_id left join agrimin_unit_master aunm ON aunm.id=aft.approx_unit left join agrimin_special_instruction asi ON asi.id=aft.special_instruction left join agrimin_file_options_master afom ON afom.id=aft.file_sub_type_id left join agrimin_countries acnt ON acnt.id=acm.country_id left join agrimin_states ast ON ast.id=acm.state_id left join agrimin_cities act ON act.id=acm.city_id left join agrimin_employee_users_master aeum1 ON aeum1.id=aim.entry_user_id left join agrimin_employee_users_master aeum2 ON aeum2.id=aim.modify_user_id left join agrimin_countries acnt1 ON acnt1.id=aim.invoice_currency Where aim.id = '.$params;

        #echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

     function getInvoiceDetailsdata($params){ 

        #$querystring =  'SELECT * from agrimin_invoice_details Where invoice_no = '.$params.' Order by id';
        $querystring =  'SELECT * FROM agrimin_invoice_details WHERE invoice_no = '.$params.' and work_prefix != "" and work_items = "" order by id';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
     }

     function getInvoiceDetailsdataNew($params){ 

        $querystring =  'SELECT * from agrimin_invoice_details Where invoice_no = '.$params.' Order by id';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
     } 

     function getInvoiceDetailsCargodata($params){ 

        $querystring =  'SELECT * FROM agrimin_invoice_details WHERE invoice_no = '.$params.' and work_prefix != "" and work_items != "" order by id'; // and work_items != "" 
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
     }  

    public function addInvoiceData($data){

        $result = array('invoice_id'=>@$data['invoice_id'],'file_no'=>$data['file_id'],'file_date'=>$data['file_date'],'client_id'=>$data['client_id'],'invoice_date'=>@$data['invoice_date'],'invoice_to'=>@$data['client_id'],'client_vat'=>$data['client_vat'],'kind_attention'=>$data['client_contact'],'invoice_city'=>$data['invoice_city'],'vessel_name'=>@$data['vessel_name'],'voyage_no'=>@$data['voyage_no'],'cargo_group'=>@$data['cargo_group'],'cargo_master'=>@$data['cargo_master'],'packing'=>@$data['packing'],'packing_desc'=>@$data['packing_desc'],'approx_qty'=>@$data['approx_qty'],'approx_unit'=>@$data['approx_unit'],'file_ins'=>@$data['file_ins'],'place'=>@$data['place'],'origin'=>@$data['origin'],'load_port'=>@$data['load_port'],'discharge_port'=>$data['discharge_port'],'invoice_remarks'=>$data['invoice_remarks'],'invoice_currency'=>@$data['invoice_currency'],'invoice_ex_rate'=>@$data['invoice_ex_rate'],'invoice_basic_ex_amt'=>@$data['invoice_basic_ex_amt'],'invoice_basic_amt'=>@$data['invoice_subtotal_amt'],'invoice_vat_percent'=>@$data['invoice_total_vat_percnt'],'invoice_tax_amt'=>@$data['invoice_total_tax_amt'],'invoice_amt'=>@$data['invoice_total_full_amt'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
        //print_r($result);exit;
        $this->db->insert('agrimin_invoice_master',$result);
        return $this->db->insert_id();

    }


    public function addInvoiceDataNew($data){

        $result = array('invoice_id'=>@$data['invoice_id'],'file_no'=>$data['file_id'],'file_date'=>$data['file_date'],'client_id'=>$data['client_id'],'invoice_date'=>@$data['invoice_date'],'invoice_to'=>@$data['client_id'],'client_vat'=>$data['client_vat'],'kind_attention'=>$data['client_contact'],'inspection_start_date'=>$data['inspection_start_date'],'inspection_end_date'=>$data['inspection_end_date'],'vessel_name'=>@$data['vessel_name'],'voyage_no'=>@$data['voyage_no'],'cargo_group'=>@$data['cargo_group'],'cargo_master'=>$data['cargo_master'],'file_ins'=>$data['inv_desc_details'],'approx_qty'=>$data['inv_quantity'],'load_port'=>$data['inv_load_port'],'discharge_port'=>$data['inv_discharge_port'],'invoice_remarks'=>$data['invoice_remarks'],'invoice_currency'=>@$data['invoice_currency'],'invoice_ex_rate'=>@$data['invoice_ex_rate'],'invoice_basic_ex_amt'=>@$data['invoice_basic_ex_amt'],'invoice_basic_amt'=>@$data['invoice_subtotal_amt'],'invoice_vat_percent'=>@$data['invoice_total_vat_percnt'],'invoice_tax_amt'=>@$data['invoice_total_tax_amt'],'invoice_amt'=>@$data['invoice_total_full_amt'],'bill_lading_no'=>@$data['bill_lading_no'],'bill_lading_date'=>@$data['bill_lading_date'],'invoice_type'=>@$data['invoice_type'],'invoice_desc'=>@$data['inv_desc_details'],'file_no_type'=>@$data['file_no_type'],'scope_work'=>@$data['scope_work'],'warehouse'=>@$data['warehouse'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
        #print_r($result);exit;
        $this->db->insert('agrimin_invoice_master',$result);
        return $this->db->insert_id();

    }

    public function addInvoiceDetails($data){
        for ($x = 0; $x <= count($data['div_work_type']); $x++) {
            #echo $data['div_approx_qty'][$x];exit;
          if (!empty($data['div_work_type'][$x])) {
            $result = array('invoice_no'=>$data['invoice_no'],'work_type'=>$data['div_work_type'][$x],'approx_qty'=>$data['div_approx_qty'][$x],'approx_unit'=>$data['div_approx_unit'][$x],'invoice_work_rate'=>$data['div_invoice_rate'][$x],'invoice_work_amount'=>$data['div_invoice_amt'][$x]);
            #print_r($result);exit;
            $this->db->insert('agrimin_invoice_details',$result);
          }   
        }

        return $result;

    }


    public function addInvoiceDetailsNew($data){

        /*if (!empty($data['inv_desc_details'])) {
            $result1 = array('invoice_no'=>$data['invoice_no'],'work_type'=>$data['inv_desc_details']);
            #print_r($result);exit;
            $this->db->insert('agrimin_invoice_details',$result1);
        }*/ 

          $j=0; 
          $work_prefix_arr = array(); 
          for ($x = 0; $x < count($data['invitems_cargo_name']); $x++) {
            #echo $data['div_approx_qty'][$x];exit;
          #$j=$x+1;
          $invitems_cargo_name = explode("|",$data['invitems_cargo_details'][$x]);
            if (!empty(@$data['invitems_cargo_name'][$x])) {
              
              if (!in_array(@$invitems_cargo_name[1],$work_prefix_arr)) { $j=0;}

              $result = array('invoice_no'=>$data['invoice_no'],'cargo_group'=>@$data['invitems_cargo_group'][$x],'work_type'=>@$data['invitems_cargo_name'][$x],'approx_qty'=>@$data['invitems_quantity'][$x],'approx_unit'=>@$data['invitems_unit'][$x],'invoice_work_rate'=>@$data['invitems_rate'][$x],'invoice_work_amount'=>@$data['invitems_amt'][$x],'work_prefix'=>@$invitems_cargo_name[1],'work_items'=>$j);
     
              $j++; 

              array_push($work_prefix_arr,@$invitems_cargo_name[1]);  
              $work_prefix_arr = array_unique($work_prefix_arr); 
              $this->db->insert('agrimin_invoice_details',$result);
            }
            
                    
        }
        #print_r($work_prefix_arr);exit;
        #print_r($result);exit;
        #echo '<pre>';print_r($result);echo '</pre>';exit;  

        return $result;

    }

    public function updateInvoiceDetailsNew($data){

        $params = $data['invoice_no'];
        $querystring = "DELETE FROM agrimin_invoice_details where invoice_no = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        if (!empty($data['inv_desc_details'])) {
            $result1 = array('invoice_no'=>$data['invoice_no'],'work_type'=>$data['inv_desc_details']);
            #print_r($result1);exit;
            $this->db->insert('agrimin_invoice_details',$result1);
            #$this->db->where('invoice_no', $data['invoice_no']);
            #$this->db->limit(1);
            #$this->db->update('agrimin_invoice_details',$result1);
            #$rows = (($this->db->affected_rows() > 0)?TRUE:FALSE);
        }  
        
          $j=0;  
          for ($x = 0; $x < count($data['invitems_cargo_name']); $x++) {
            #echo $data['div_approx_qty'][$x];exit;
          $j=$x+1;  
          $invitems_cargo_name = explode("|",$data['invitems_cargo_details'][$x]);
            if (!empty(@$data['invitems_cargo_name'][$x])) {
              $result = array('invoice_no'=>$data['invoice_no'],'work_type'=>@$data['invitems_cargo_name'][$x],'approx_qty'=>@$data['invitems_quantity'][$x],'approx_unit'=>@$data['invitems_unit'][$x],'invoice_work_rate'=>@$data['invitems_rate'][$x],'invoice_work_amount'=>@$data['invitems_amt'][$x],'work_prefix'=>@$invitems_cargo_name[1],'work_items'=>$j);
              //print_r($result);exit;
              $this->db->insert('agrimin_invoice_details',$result);   
              #$this->db->where('invoice_no', $data['invoice_no']);
              #$this->db->limit(1);
              #$this->db->update('agrimin_invoice_details',$result);
              #$rows = (($this->db->affected_rows() > 0)?TRUE:FALSE);
            }
                    
        }
        #echo '<pre>';print_r($result);echo '</pre>';exit;  

        return $result;

    }

    public function updateInvoiceDetailsNew2($data){
        $params = $data['invoice_no'];
        $querystring = "DELETE FROM agrimin_invoice_details where invoice_no = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

          $j=0; 
          $work_prefix_arr = array(); 
          for ($x = 0; $x < count($data['invitems_cargo_name']); $x++) {
            #echo $data['div_approx_qty'][$x];exit;
          #$j=$x+1;
          $invitems_cargo_name = explode("|",$data['invitems_cargo_details'][$x]);
            if (!empty(@$data['invitems_cargo_name'][$x])) {
              
              if (!in_array(@$invitems_cargo_name[1],$work_prefix_arr)) { $j=0;}

              $result = array('invoice_no'=>$data['invoice_no'],'cargo_group'=>@$data['invitems_cargo_group'][$x],'work_type'=>@$data['invitems_cargo_name'][$x],'approx_qty'=>@$data['invitems_quantity'][$x],'approx_unit'=>@$data['invitems_unit'][$x],'invoice_work_rate'=>@$data['invitems_rate'][$x],'invoice_work_amount'=>@$data['invitems_amt'][$x],'work_prefix'=>@$invitems_cargo_name[1],'work_items'=>$j);
     
              $j++; 

              array_push($work_prefix_arr,@$invitems_cargo_name[1]);  
              $work_prefix_arr = array_unique($work_prefix_arr); 
              $this->db->insert('agrimin_invoice_details',$result);
            }
          }
          return $result;

    }


    function getInvoiceIdByBranch() { 

        $querystring = 'SELECT invoice_id FROM agrimin_invoice_master aim Where aim.user_comp_id = "'.$_SESSION['comp_id'].'" and aim.user_branch_id = "'.$_SESSION['branch_id'].'" Order By invoice_id desc limit 1';

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function updateInvoiceNo($data){
      
      // update file no agrimin_fileregister_transaction table
      $result = array('invoice_no'=>$data['invoice_no'],'invoice_id'=>$data['invoice_id']);
      
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('agrimin_invoice_master',$result);

      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }


    public function updateInvoiceData($data){

        $result = array('invoice_to'=>$data['invoice_to'],'client_vat'=>$data['client_vat'],'invoice_city'=>$data['invoice_city'],'invoice_currency'=>$data['invoice_currency'],'invoice_ex_rate'=>$data['invoice_ex_rate'],'invoice_basic_ex_amt'=>$data['invoice_basic_ex_amt'],'invoice_basic_amt'=>@$data['invoice_basic_amt'],'invoice_tax_amt'=>@$data['invoice_tax_amt'],'invoice_amt'=>$data['invoice_amt'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>1);
        //print_r($result);exit;
        $this->db->where('id', $data['invoice_no']);
        $this->db->limit(1);
        $this->db->update('agrimin_invoice_master',$result);
      
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    public function updateEditInvoiceData($data){
        //print_r($data);exit;
        #$result = array('invoice_basic_amt'=>@$data['invoice_subtotal_amt'],'invoice_tax_amt'=>@$data['invoice_total_tax_amt'],'invoice_amt'=>$data['invoice_total_full_amt'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>1);
        $result = array('invoice_date'=>@$data['invoice_date'],'vessel_name'=>@$data['vessel_name'],'voyage_no'=>@$data['voyage_no'],'cargo_group'=>@$data['cargo_group'],'cargo_master'=>@$data['cargo_master'],'packing'=>@$data['packing'],'packing_desc'=>@$data['packing_desc'],'approx_qty'=>@$data['approx_qty'],'approx_unit'=>@$data['approx_unit'],'file_ins'=>@$data['file_ins'],'place'=>@$data['place'],'origin'=>@$data['origin'],'load_port'=>@$data['load_port'],'discharge_port'=>$data['discharge_port'],'invoice_remarks'=>$data['invoice_remarks'],'invoice_currency'=>$data['invoice_currency'],'invoice_ex_rate'=>$data['invoice_ex_rate'],'invoice_basic_amt'=>$data['invoice_subtotal_amt'],'invoice_vat_percent'=>$data['invoice_total_vat_percnt'],'invoice_tax_amt'=>$data['invoice_total_tax_amt'],'invoice_amt'=>$data['invoice_total_full_amt'],'inspection_start_date'=>$data['inspection_start_date'],'inspection_end_date'=>$data['inspection_end_date'],'bill_lading_no'=>@$data['bill_lading_no'],'bill_lading_date'=>@$data['bill_lading_date'],'invoice_type'=>@$data['invoice_type'],'invoice_desc'=>@$data['inv_desc_details'],'scope_work'=>@$data['scope_work'],'warehouse'=>@$data['warehouse'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>1);
        //print_r($result);exit;
        $this->db->where('id', $data['invoice_no']);
        $this->db->limit(1);
        $this->db->update('agrimin_invoice_master',$result);
      
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    function UpdateFileDataByInvoice($data){

      $result = array('status'=> 'Invoiced','modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']);
      

      $this->db->where('id', $data['file_id']);
      $this->db->limit(1);
      $this->db->update('agrimin_fileregister_transaction',$result);
      //print_r($this->db->last_query());exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   public function updatePaymentInvoiceData($data){

        $result = array('pay_mode'=>$data['pay_mode'],'payment_date'=>$data['payment_date'],'cheque_no'=>$data['cheque_no'],'cheque_date'=>@$data['cheque_date'],'invoice_amt'=>@$data['invoice_amt'],'invoice_basic_amt'=>$data['invoice_basic_amt'],'invoice_rec_amt'=>$data['invoice_rec_amt'],'invoice_balane_amt'=>$data['invoice_balane_amt'],'vat_percent'=>$data['vat_percent'],'vat_amt'=>$data['vat_amt'],'oth_dedcut'=>$data['oth_dedcut'],'remarks'=>$data['remarks'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>1);
        //print_r($result);exit;
        $this->db->where('id', $data['payment_id']);
        $this->db->limit(1);
        $this->db->update('agrimin_payment_invoice_master',$result);
        //print_r($this->db->last_query());exit;
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

   public function delinvoicefileregister($id,$dt,$data)
      {
      //print_r($data);exit;  
      $result1 = array('status'=> 'Pending','modify_user_id'=>@$data['user_id'],'modify_date'=>@$data['dt']);      
      $this->db->where('file_no', $data['invoice_file_no']);
      $this->db->limit(1);
      $this->db->update('agrimin_fileregister_transaction',$result1);

      $result = array('is_active'=>0,'status'=> 'Cancelled','modify_user_id'=>@$_SESSION['userId'],'modify_date'=>@$dt);
      //print_r($result);exit;
      $this->db->where('id', $id);
      $this->db->limit(1);
      $this->db->update('agrimin_invoice_master',$result);
      //print_r($this->db->last_query());exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);
    }

    public function delinvoicepaymentregister($id,$dt,$data)
      { 
      //print_r($data);exit;  
      $result = array('is_active'=>0,'invoice_no'=> '','backup_invoice_no'=> $data['invoice_no'],'modify_user_id'=>@$_SESSION['userId'],'modify_date'=>@$dt);
      //print_r($result);exit;
      $this->db->where('id', $id);
      $this->db->limit(1);
      $this->db->update('agrimin_payment_invoice_master',$result);
      //print_r($this->db->last_query());exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);
    }


    function getAllPaymentInvoicedata(){ 

        $querystring =  "SELECT aim.*,acm.client_name FROM agrimin_invoice_master aim left join agrimin_client_master acm ON aim.client_id=acm.id WHERE aim.user_comp_id =  '".$_SESSION['comp_id']."' and aim.user_branch_id = '".$_SESSION['branch_id']."' and aim.is_active = 1";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getInvPaymentDetailsById($params){  //$id

        $querystring =  "SELECT aim.file_no,aim.client_id,aim.invoice_amt,aim.invoice_basic_amt,aim.invoice_ex_rate,aim.invoice_basic_ex_amt,acm.client_name FROM agrimin_invoice_master aim left join agrimin_client_master acm ON aim.client_id=acm.id Where aim.id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        #print_r($result);exit;
        return $result[0];

    }

    public function addPayementInvoiceData($data){

        $result = array('invoice_no'=>$data['invoice_id'],'file_no'=>$data['invoice_file_no'],'client_id'=>$data['client_id'],'payment_date'=>@$data['payment_date'],'pay_mode'=>@$data['pay_mode'],'cheque_no'=>@$data['cheque_no'],'cheque_date'=>$data['cheque_date'],'invoice_amt'=>$data['invoice_amt'],'invoice_basic_amt'=>$data['invoice_basic_amt'],'invoice_rec_amt'=>$data['invoice_rec_amt'],'invoice_balane_amt'=>$data['invoice_balane_amt'],'invoice_balane_amt'=>@$data['invoice_balane_amt'],'invoice_ex_rate'=>@$data['invoice_ex_rate'],'invoice_ex_amt'=>@$data['invoice_ex_amt'],'vat_percent'=>$data['vat_percent'],'vat_amt'=>$data['vat_amt'],'oth_dedcut'=>@$data['oth_dedcut'],'remarks'=>$data['remarks'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
        //print_r($result);exit;
        $this->db->insert('agrimin_payment_invoice_master',$result);
        return $this->db->insert_id();

    }

    function UpdateInvoiceBalance($data){
      #print_r($data);exit;
      $invoice_rec_amt = (float)@$data['invoice_rec_amt'] + (float)@$data['invoice_recd_amt'];
      $result = array('invoice_balane_amt'=> @$data['invoice_balane_amt'],'invoice_rec_amt'=> @$invoice_rec_amt,'modify_user_id'=>@$data['user_id'],'modify_date'=>@$data['dt']);
      
      $this->db->where('id', @$data['invoice_id']);
      $this->db->limit(1);
      $this->db->update('agrimin_invoice_master',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   function UpdateInvoicePaymentBalance($data){
      #print_r($data);exit;
      $invoice_rec_amt = (float)@$data['invoice_rec_amt'] - (float)@$data['invoice_recd_amt'];
      $invoice_balane_amt = (float)@$data['invoice_balane_amt'] + (float)@$data['invoice_balaned_amt'];
      $result = array('invoice_balane_amt'=> @$invoice_balane_amt,'invoice_rec_amt'=> @$invoice_rec_amt,'modify_user_id'=>@$data['user_id'],'modify_date'=>@$data['dt']);
      //print_r($result);exit;
      $this->db->where('id', @$data['invoice_id']);
      $this->db->limit(1);
      $this->db->update('agrimin_invoice_master',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }


    function UpdateInvoiceStatus($data){
      //print_r($data);exit;
      $result = array('status'=> 'Closed','modify_user_id'=>@$data['user_id'],'modify_date'=>@$data['dt']);
      
      $this->db->where('id', @$data['invoice_id']);
      $this->db->limit(1);
      $this->db->update('agrimin_invoice_master',$result);
      //print_r($this->db->last_query());exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }


    function UpdateInvoicePaymentDataByFile($data){
      
      $result = array('status'=> 'Completed','modify_user_id'=>@$data['user_id'],'modify_date'=>@$data['dt']);
      
      $this->db->where('id', $data['invoice_file_no']);
      $this->db->limit(1);
      $this->db->update('agrimin_fileregister_transaction',$result);
      #print_r($this->db->last_query());exit;
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   function getCurrency(){  //$id

        $querystring =  "SELECT id,currency FROM `agrimin_countries` WHERE `currency` !=''";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        #print_r($result);exit;
        return $result;

    }

    function getCurrencyById($params){  //$id

        $querystring =  "SELECT * FROM `agrimin_countries` WHERE `currency` !='' and id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        #print_r($result);exit;
        return $result;

    }

    function getAllInvoicedataByDate($params){ 

        $querystring =  "SELECT aim.*,acm.client_name,abm.branch_name,aeum.first_name,aeum.last_name,ac.name country_name,ast.name state_name, acm.vat_no, ac1.currency FROM agrimin_invoice_master aim left join agrimin_client_master acm on aim.client_id= acm.id left join agrimin_branch_master abm on abm.id= acm.user_branch_id left join agrimin_employee_users_master aeum on aeum.id= aim.entry_user_id left join agrimin_countries ac on ac.id= acm.country_id left join agrimin_states ast on ast.id= acm.state_id left join agrimin_countries ac1 on ac1.id = aim.invoice_currency where aim.invoice_date between '".$params['from_dt']."' and '".$params['to_dt']."' order by aim.invoice_no";

        #echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
    }

    function getAllInvoicedataByDateCount($params){ 

        $querystring =  "SELECT `user_branch_id`, COUNT(`user_branch_id`) count FROM agrimin_invoice_master Where invoice_date between '".$params['from_dt']."' and '".$params['to_dt']."' GROUP BY `user_branch_id`";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    } 

    public function addProformaInvoiceDataNew($data){

        $result = array('client_id'=>$data['clients_name'],'invoice_date'=>@$data['invoice_date'],'client_address'=>@$data['client_address'],'client_postal_code'=>@$data['postal_code'],'client_country'=>@$data['company_country'],'client_state'=>@$data['company_state'],'client_city'=>@$data['company_city'],'client_vat'=>$data['client_vat'],'kind_attention'=>$data['client_contact'],'inspection_start_date'=>$data['inspection_start_date'],'inspection_end_date'=>$data['inspection_end_date'],'bill_lading_no'=>@$data['bill_lading_no'],'bill_lading_date'=>@$data['bill_lading_date'],'vessel_name'=>@$data['vessel_name'],'voyage_no'=>@$data['voyage_no'],'scope_of_services'=>@$data['scope_services'],'file_instructions'=>@$data['file_ins'],'cargo_group'=>@$data['cargo_group'],'invoice_remarks'=>$data['invoice_remarks'],'invoice_currency'=>@$data['invoice_currency'],'invoice_ex_rate'=>@$data['invoice_ex_rate'],'invoice_basic_ex_amt'=>@$data['invoice_basic_ex_amt'],'invoice_basic_amt'=>@$data['invoice_subtotal_amt'],'invoice_vat_percent'=>@$data['invoice_total_vat_percnt'],'invoice_tax_amt'=>@$data['invoice_total_tax_amt'],'invoice_amt'=>@$data['invoice_total_full_amt'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
        //print_r($result);exit;
        $this->db->insert('agrimin_proforma_invoice_master',$result);
        return $this->db->insert_id();

    }

    public function addProformaInvoiceDetailsNew($data){

          $j=0; 
          $work_prefix_arr = array();

          if (!empty(count($data['cargo']))) { 
            for ($x = 0; $x < count($data['cargo']); $x++) {
                $result = array('invoice_no'=>$data['invoice_no'],'cargo_group_id'=>$data['cargo_group'],'cargo_id'=>@$data['cargo'][$x],'packing_id'=>@$data['cargo_packing'][$x],'approx_qty'=>@$data['cargo_quantity'][$x],'approx_unit'=>@$data['cargo_unit'][$x],'origin'=>@$data['cargo_origin'][$x],'load_port'=>@$data['cargo_load_port'][$x],'discharge_port'=>@$data['cargo_discharge_port'][$x],'attendance_placed'=>@$data['cargo_place_attendance'][$x],'invoice_work_rate'=>@$data['cargo_rate'][$x],'invoice_work_amount'=>@$data['cargo_amt'][$x],'work_prefix'=>$j,'work_items'=>$j);
     
              #$j++; 
              #array_push($work_prefix_arr,@$invitems_cargo_name[1]);  
              #$work_prefix_arr = array_unique($work_prefix_arr); 
              $this->db->insert('agrimin_proforma_invoice_details',$result);
            #}
            }
          }

          if (!empty(count($data['invitems_cargo_name']))) { 
            for ($x = 0; $x < count($data['invitems_cargo_name']); $x++) {
              $result1 = array('invoice_no'=>$data['invoice_no'],'cargo_group_id'=>$data['cargo_group'],'cargo_id'=>@$data['invitems_cargo_name'][$x],'approx_qty'=>@$data['invitems_quantity'][$x],'approx_unit'=>@$data['invitems_unit'][$x],'invoice_work_rate'=>@$data['invitems_rate'][$x],'invoice_work_amount'=>@$data['invitems_amt'][$x],'work_prefix'=>111,'work_items'=>111);

              $this->db->insert('agrimin_proforma_invoice_details',$result1);
            }  
          } 

        #print_r($result1);exit;
        return $result;

    }

    function fetch_cargo($params)
    {
  
      $querystring = "SELECT * FROM agrimin_cargo_master WHERE cargo_group_id = '".$params."' AND is_active = 1";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['commodity_name'].'</option>';
      };

      return $output;

    }

    function fetch_packing()
    {
  
      $querystring = "SELECT id,paking_name,description FROM agrimin_packing_master where is_active = 1 order by id desc";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['paking_name'].'</option>';
      };

      return $output;

    }

    function fetch_unit()
    {
  
      $querystring = "SELECT * FROM agrimin_unit_master Where is_active = 1 order by id asc";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['unit_name'].'</option>';
      };

      return $output;

    }

    function getAllProformaInvoicedata(){ 

        $querystring =  "SELECT apim.*,acm.client_name,acgm.name cargo_group_name FROM agrimin_proforma_invoice_master apim left join agrimin_client_master acm on apim.client_id=acm.id left join agrimin_cargo_group_master acgm on apim.cargo_group=acgm.id WHERE apim.user_comp_id =  '".$_SESSION['comp_id']."' and apim.user_branch_id = '".$_SESSION['branch_id']."' and apim.is_active = 1  order by apim.id desc";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getProformaInvoicedata($params){  

        $querystring =  'SELECT apim.*,acm.id clientid,acm.client_name,aeum1.first_name fname,aeum1.last_name lname,aeum2.first_name ename,aeum2.last_name elname FROM agrimin_proforma_invoice_master apim left join agrimin_client_master acm on apim.client_id=acm.id left join agrimin_employee_users_master aeum1 ON aeum1.id=apim.entry_user_id left join agrimin_employee_users_master aeum2 ON aeum2.id=apim.modify_user_id Where apim.is_active = 1 and apim.id = '.$params.' order by apim.id desc';
        #echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getProformaCargodata($params){  

        $querystring =  'SELECT * FROM agrimin_proforma_invoice_details apid Where apid.invoice_no = '.$params.'  and apid.work_prefix != "111" order by apid.id asc';
        #echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getProformaOtherdata($params){  

        $querystring =  'SELECT * FROM agrimin_proforma_invoice_details apid Where apid.invoice_no = '.$params.'  and apid.work_prefix = "111" order by apid.id asc';
        #echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function updateEditProformaInvoiceData($data){
        //print_r($data);exit;
        #$result = array('invoice_basic_amt'=>@$data['invoice_subtotal_amt'],'invoice_tax_amt'=>@$data['invoice_total_tax_amt'],'invoice_amt'=>$data['invoice_total_full_amt'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>1);
        $result = array('client_id'=>$data['clients_name'],'invoice_date'=>@$data['invoice_date'],'client_address'=>@$data['client_address'],'client_postal_code'=>@$data['postal_code'],'client_country'=>@$data['company_country'],'client_state'=>@$data['company_state'],'client_city'=>@$data['company_city'],'client_vat'=>$data['client_vat'],'kind_attention'=>$data['client_contact'],'status'=>$data['status'],'inspection_start_date'=>$data['inspection_start_date'],'inspection_end_date'=>$data['inspection_end_date'],'bill_lading_no'=>@$data['bill_lading_no'],'bill_lading_date'=>@$data['bill_lading_date'],'vessel_name'=>@$data['vessel_name'],'voyage_no'=>@$data['voyage_no'],'scope_of_services'=>@$data['scope_services'],'file_instructions'=>@$data['file_ins'],'cargo_group'=>@$data['cargo_group'],'invoice_remarks'=>$data['invoice_remarks'],'invoice_currency'=>@$data['invoice_currency'],'invoice_ex_rate'=>@$data['invoice_ex_rate'],'invoice_basic_ex_amt'=>@$data['invoice_basic_ex_amt'],'invoice_basic_amt'=>@$data['invoice_subtotal_amt'],'invoice_vat_percent'=>@$data['invoice_total_vat_percnt'],'invoice_tax_amt'=>@$data['invoice_total_tax_amt'],'invoice_amt'=>@$data['invoice_total_full_amt'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
        //print_r($result);exit;
        $this->db->where('id', $data['profinvoice_no']);
        $this->db->limit(1);
        $this->db->update('agrimin_proforma_invoice_master',$result);
      
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    } 


    public function updateEditProformaInvoiceDetails($data){
          //print_r($data);exit;
          $j=0; 
          $work_prefix_arr = array();

          $params = $data['profinvoice_no'];
          $querystring = "DELETE FROM agrimin_proforma_invoice_details where invoice_no = '".$params."'";
          $queryforpubid = $this->db->query($querystring);

          if (!empty(count($data['cargo']))) { 
            for ($x = 0; $x < count($data['cargo']); $x++) {
                $result = array('invoice_no'=>$data['profinvoice_no'],'cargo_group_id'=>$data['cargo_group'],'cargo_id'=>@$data['cargo'][$x],'packing_id'=>@$data['cargo_packing'][$x],'approx_qty'=>@$data['cargo_quantity'][$x],'approx_unit'=>@$data['cargo_unit'][$x],'origin'=>@$data['cargo_origin'][$x],'load_port'=>@$data['cargo_load_port'][$x],'discharge_port'=>@$data['cargo_discharge_port'][$x],'attendance_placed'=>@$data['cargo_place_attendance'][$x],'invoice_work_rate'=>@$data['cargo_rate'][$x],'invoice_work_amount'=>@$data['cargo_amt'][$x],'work_prefix'=>$j,'work_items'=>$j);
     
              #$j++; 
              #array_push($work_prefix_arr,@$invitems_cargo_name[1]);  
              #$work_prefix_arr = array_unique($work_prefix_arr); 
              $this->db->insert('agrimin_proforma_invoice_details',$result);
            #}
            }
          }

          if (!empty(count($data['invitems_cargo_name']))) { 
            for ($x = 0; $x < count($data['invitems_cargo_name']); $x++) {
              $result1 = array('invoice_no'=>$data['profinvoice_no'],'cargo_group_id'=>$data['cargo_group'],'cargo_id'=>@$data['invitems_cargo_name'][$x],'approx_qty'=>@$data['invitems_quantity'][$x],'approx_unit'=>@$data['invitems_unit'][$x],'invoice_work_rate'=>@$data['invitems_rate'][$x],'invoice_work_amount'=>@$data['invitems_amt'][$x],'work_prefix'=>111,'work_items'=>111);

              $this->db->insert('agrimin_proforma_invoice_details',$result1);
            }  
          } 

        #print_r($result1);exit;
        return $result;

    }

    public function getCargoDetailsById($params){  //$id

        $querystring =  'SELECT acm.commodity_name,aum.unit_name,apm.paking_name,apid.* from agrimin_proforma_invoice_details apid left join agrimin_cargo_master acm ON acm.id=apid.cargo_id left join agrimin_unit_master aum ON aum.id=apid.approx_unit left join agrimin_packing_master apm ON apm.id=apid.packing_id Where invoice_no = '.$params.' and apid.work_prefix != "111" order by apid.id';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function delproformainvoice($id,$dt,$data)
      {
        $result = array('is_active'=>0,'status'=> 'Cancelled','modify_user_id'=>@$_SESSION['userId'],'modify_date'=>@$dt);
        //print_r($result);exit;
        $this->db->where('id', $id);
        $this->db->limit(1);
        $this->db->update('agrimin_proforma_invoice_master',$result);
        //print_r($this->db->last_query());exit;
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);
    }


   
}

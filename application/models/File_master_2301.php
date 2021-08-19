<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_branch_master'; 
    } 

    function getImportExportdata(){ 

        $querystring = "SELECT * FROM agrimin_import_export_master where is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getImportExportdataById($params){ 

        $querystring = "SELECT * FROM agrimin_import_export_master where id = $params";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getFiletypedata(){ 

        $querystring = "SELECT * FROM agrimin_file_type_master where is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getFiletypedataById($params){ 

        $querystring = "SELECT * FROM agrimin_file_type_master where id = $params";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function fetch_branch($comp_id)
    {
  
      $querystring = "SELECT * FROM agrimin_branch_master WHERE comp_id = '".$comp_id."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select Branch Name</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['branch_name'].'</option>';
      };

      return $output;

    } 

    function getFileOptions(){ 
        
        $querystring = "SELECT * FROM agrimin_file_options_master where is_active = 1 order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        return $result;

    }

    function getFileSubOptions($params){ 
        
  
        $querystring = "SELECT * FROM agrimin_file_sub_options where file_type_id = '".$params."' and is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function getSubOptionsData()
    {
    $querystring = "SELECT so.*,om.id om_id, om.name as om_name FROM agrimin_file_sub_options so left join agrimin_file_options_master om on so.file_options_id = om.id left join agrimin_file_type_master tm on tm.id = so.file_type_id Order by so.file_type_id";

    $queryforpubid = $this->db->query($querystring);
    $result = $queryforpubid->result_array();

      $i = 0;
      foreach ($result as $key => $value) {
        #$optins_arr[$value['subtype_name']][$i] = $value['options_name'];
        #$optins_arr[$value['type_id']][$i] = $value['subtype_name'];
        #$optins_arr[$value['file_type_id']][$value['om_name']][$i] = $value['name'];
        $om_arr = $value['om_id']."|".$value['om_name'];
        ######$optins_arr[$value['file_type_id']][$value['om_name']][$value['id']] = $value['om_id'].":".$value['name'];
        $optins_arr[$value['file_type_id']][$om_arr][$value['id']] = $value['name'];
        /*foreach ($value['subtype_name'] as $k => $v) {
          $value['subtype_name'][$k] = $value['options_name'];
        }*/ 
        $i++;
      }

      #print_r($optins_arr);
      return $optins_arr;

  } 


  function fetch_cargo($params)
    {
  
      $querystring = "SELECT * FROM agrimin_cargo_master WHERE cargo_group_id = '".$params."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['commodity_name'].'</option>';
      };

      return $output;

    }

    function fetch_field_parameters($params)
    {
  
      $querystring = "SELECT name,min,max,method FROM agrimin_file_parameters WHERE cargo_master_id = '".$params."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<table class="table table-bordered table-hover"><thead><tr><th>Field Parameter</th><th>Min</th><th>Max</th><th>Method</th></tr></thead><tbody>';
      if (!empty($result)) {
      foreach($result as $row)
      {
         #$output .= '<option value="'.$row['id'].'">'.$row['commodity_name'].'</option>';
        $output .= '<tr class="active"></tr><td>'.$row['name'].'</td><td>'.$row['min'].'</td><td>'.$row['max'].'</td><td>'.$row['method'].'</td></tr>';
      };
      } else {
        $output .= '<tr class="active"></tr><td>No records to display.</td><td></td><td></td><td></td></tr>';
      }

      $output .= '</tbody></table>';
      return $output;

    }

    function fetch_lab_parameters($params)
    {
  
      $querystring = "SELECT id,name,min,max,method FROM agrimin_lab_parameters WHERE cargo_master_id = '".$params."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<table class="table table-bordered table-hover"><thead><tr><th><input type="checkbox"></th><th>Lab Parameter</th><th>Min</th><th>Max</th><th>Method</th><th>Display Seq.</th><th>Unit</th><th>Display in Certificates</th></tr></thead><tbody>';
      if (!empty($result)) {
      foreach($result as $row)
      {
         #$output .= '<option value="'.$row['id'].'">'.$row['commodity_name'].'</option>';
         $lab_master_id = $row['id'];
         echo $querystring_lab = "SELECT * FROM agrimin_lab_methods WHERE lab_master_id = '".$lab_master_id."'";exit;

         #$queryforpubid = $this->db->query($querystring);
   

          $output .= '<tr class="active"></tr><td><input type="checkbox"></td><td>'.$row['name'].'</td><td><input type="text" name= "lab_min[]" value="'.$row['min'].'"></td><td><input type="text" name= "lab_max[]" value="'.$row['min'].'"></td><td><input type="text" name= "lab_method[]" value="'.$row['method'].'"></td><td><input type="text" name= "lab_method[]" value="'.$row['method'].'"></td><td><input type="text" name= "lab_method[]" value="'.$row['method'].'"></td><td><input type="checkbox"></td></tr>';
      };
      } else {
        $output .= '<tr class="active"></tr><td>No records to display.</td><td></td><td></td><td></td><td></td></tr>';
      }

      $output .= '</tbody></table>';
      return $output;

    }

    public function updateFilemaster($data)
      {

      /*if (count(@$data['file_type']) > 1) {
        $data['file_type'] = @implode(",",$data['file_type']);
      } else {
        $data['file_type'] = @$data['file_type'][0];
      }*/

      if (is_array(@$data['sub_type'])) {
        $data['sub_type'] = @implode(",",$data['sub_type']);
      } else {
        $data['sub_type'] = @$data['sub_type'][0];
      }
    
      #if (count(@$data['option_type']) > 1) {
      if (is_array(@$data['option_type'])) {
        $data['option_type'] = @implode(",",$data['option_type']);
      } else {
        $data['option_type'] = @$data['option_type'][0];
      }

   #if (count(@$data['user_data']) > 1) {
      if (is_array(@$data['user_data'])) {
        $data['user_data'] = @implode(",",$data['user_data']);
      } else {
        $data['user_data'] = @$data['user_data'][0];
      }
      
      $result = array('file_creation_date'=>$data['dt'],'client_id'=>$data['clients_name'],'branch_id'=>@$data['branch_name'],'billing_client_id'=>@$data['billing_name'],'user_id'=>@$data['user_data'],'client_job_ref_no'=>$data['client_ref_no'],'scope_of_services'=>$data['scope_services'],'tax_options'=>$data['tax_options'],'nomination_date'=>$data['dt'],'import_export'=>$data['import_export'],'file_type_id'=>@$data['file_type'],'file_sub_type_id'=>@$data['sub_type'],'file_options_id'=>@$data['option_type'],'upload_nomination_path'=>@$data['upl_nomination_path'],'upload_rate_path'=>@$data['upl_rate_path'],'vessel_name'=>$data['vessel_name'],'voyage_no'=>$data['voyage_no'],'cargo_group_id'=>$data['cargo_group'],'cargo_id'=>$data['cargo'],'packing_id'=>$data['packing'],'packing_desc'=>$data['packing_desc'],'approx_qty'=>$data['approx_unit'],'approx_unit'=>$data['approx_unit_name'],'invoice_by_branch'=>$data['invoice_by'],'special_instruction'=>$data['file_ins'],'status'=>$data['status'],'attendance_placed'=>$data['attendance'],'origin'=>$data['origin'],'load_port'=>$data['load_port'],'discharge_port'=>$data['discharge_port'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>1);
      
      //print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('agrimin_fileregister_transaction',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }


    public function addFilemaster($data){
    if(empty($data))
      return FALSE;

    /*if (count(@$data['file_type']) > 1) {
      $data['file_type'] = @implode(",",$data['file_type']);
    } else {
      $data['file_type'] = @$data['file_type'][0];
    }*/

    #if (count(@$data['sub_type']) > 1) {
    if (is_array(@$data['sub_type'])) {
      $data['sub_type'] = @implode(",",array_unique($data['sub_type']));
    } else {
      $data['sub_type'] = @$data['sub_type'][0];
    }
    
    #if (count(@$data['option_type']) > 1) {
    if (is_array(@$data['option_type'])) {
      $data['option_type'] = @implode(",",$data['option_type']);
    } else {
      $data['option_type'] = @$data['option_type'][0];
    }

   #if (count(@$data['user_data']) > 1) {
    if (is_array(@$data['user_data'])) {
      $data['user_data'] = @implode(",",$data['user_data']);
    } else {
      $data['user_data'] = @$data['user_data'][0];
    }

    /*if (isset($data['branch_name'])) {
      $data['branch_name'] = $data['branch_name'];
    }  else {
      $data['branch_name'] = 0;  
    }*/

    $result = array('file_id'=>$data['file_id'],'file_creation_date'=>$data['dt'],'client_id'=>$data['clients_name'],'branch_id'=>@$data['branch_name'],'billing_client_id'=>@$data['billing_name'],'user_id'=>$data['user_data'],'file_password'=>$data['file_password'],'client_job_ref_no'=>$data['client_ref_no'],'scope_of_services'=>$data['scope_services'],'tax_options'=>$data['tax_options'],'nomination_date'=>$data['dt'],'import_export'=>$data['import_export'],'file_type_id'=>$data['file_type'],'file_sub_type_id'=>$data['sub_type'],'file_options_id'=>$data['option_type'],'upload_nomination_path'=>@$data['upl_nomination_path'],'upload_rate_path'=>@$data['upl_rate_path'],'vessel_name'=>$data['vessel_name'],'voyage_no'=>$data['voyage_no'],'cargo_group_id'=>$data['cargo_group'],'cargo_id'=>$data['cargo'],'packing_id'=>$data['packing'],'packing_desc'=>$data['packing_desc'],'approx_qty'=>$data['approx_unit'],'approx_unit'=>$data['approx_unit_name'],'invoice_by_branch'=>$data['invoice_by'],'special_instruction'=>$data['file_ins'],'status'=>$data['status'],'attendance_placed'=>$data['attendance'],'origin'=>$data['origin'],'load_port'=>$data['load_port'],'discharge_port'=>$data['discharge_port'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
    //print_r($result);exit;
    $this->db->insert('agrimin_fileregister_transaction',$result);
    $file_id = $this->db->insert_id();


    if ($file_id) {
        $result_new = array('fileregister_transaction_id'=>$data['file_id'],'file_creation_date'=>$data['dt'],'client_id'=>$data['clients_name'],'branch_id'=>@$data['branch_name'],'billing_client_id'=>@$data['billing_name'],'user_id'=>$data['user_data'],'file_password'=>$data['file_password'],'client_job_ref_no'=>$data['client_ref_no'],'scope_of_services'=>$data['scope_services'],'tax_options'=>$data['tax_options'],'nomination_date'=>$data['dt'],'import_export'=>$data['import_export'],'file_type_id'=>$data['file_type'],'file_sub_type_id'=>$data['sub_type'],'file_options_id'=>$data['option_type'],'upload_nomination_path'=>@$data['upl_nomination_path'],'upload_rate_path'=>@$data['upl_rate_path'],'vessel_name'=>$data['vessel_name'],'voyage_no'=>$data['voyage_no'],'cargo_group_id'=>$data['cargo_group'],'cargo_id'=>$data['cargo'],'packing_id'=>$data['packing'],'packing_desc'=>$data['packing_desc'],'approx_qty'=>$data['approx_unit'],'approx_unit'=>$data['approx_unit_name'],'invoice_by_branch'=>$data['invoice_by'],'special_instruction'=>$data['file_ins'],'status'=>$data['status'],'attendance_placed'=>$data['attendance'],'origin'=>$data['origin'],'load_port'=>$data['load_port'],'discharge_port'=>$data['discharge_port'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);

        $this->db->insert('agrimin_fileregister_transaction_log',$result_new);
    }

    return $file_id;

   }

   function getAllFiledata(){  //$id

        #$querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM agrimin_client_master where is_active = $id";
        #$querystring = "SELECT * FROM agrimin_fileregister_transaction Where is_active = 1 order by id desc";
        $querystring =  "SELECT aft.*,acm.client_name,accm.commodity_name,aum.unit_name FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_unit_master aum ON aum.id=aft.approx_unit Where aft.is_active = 1 and aft.user_comp_id = '".$_SESSION['comp_id']."' and aft.user_branch_id = '".$_SESSION['branch_id']."' OR aft.invoice_by_branch = '".$_SESSION['branch_id']."' OR find_in_set('".$_SESSION['userId']."',aft.user_id) order by aft.id desc";
        #echo $querystring ;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFiledataSearch($data){  //$id

       $search = '';
       if ($data['file_from_date'] || $data['file_To_date']) {
          $search .= ' and date(aft.file_creation_date) >= "'.date('Y-m-d',strtotime($data['file_from_date'])).'" and date(aft.file_creation_date) <= "'.date('Y-m-d',strtotime($data['file_To_date'])).'"';
       }

      if ($data['status']) {
          $search .= ' and aft.status = "'.$data['status'].'"';
       }

       if ($data['clients_name']) {
          $search .= ' and aft.client_id = "'.$data['clients_name'].'"';
       }

      if ($data['file_nos']) {
          $search .= ' and aft.file_no = "'.$data['file_nos'].'"';
       }

       #$querystring =  'SELECT aft.*,acm.client_name,accm.commodity_name,aum.unit_name FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_unit_master aum ON aum.id=aft.approx_unit Where aft.is_active = 1 and aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" '.$search.' OR aft.invoice_by_branch = "'.$_SESSION['branch_id'].'" OR find_in_set("'.$_SESSION['userId'].'",aft.user_id) order by aft.id desc';

       $querystring =  'SELECT aft.*,acm.client_name,accm.commodity_name,aum.unit_name FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_unit_master aum ON aum.id=aft.approx_unit Where aft.is_active = 1 and aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" '.$search.' order by aft.id desc';

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getFiledataById($params){  //$id

        #$querystring = "SELECT * FROM agrimin_fileregister_transaction Where id =".$params." order by id";
        $querystring =  'SELECT aft.*,acm.client_name,accm.commodity_name,aeum1.first_name fname,aeum1.last_name lname,aeum2.first_name ename,aeum2.last_name elname FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_employee_users_master aeum1 ON aeum1.id=aft.entry_user_id left join agrimin_employee_users_master aeum2 ON aeum2.id=aft.modify_user_id Where aft.is_active = 1 and aft.id = '.$params.' order by aft.id desc';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    function getFileInvdataById($params){  //$id

        #$querystring =  'SELECT aft.file_creation_date,acm.id client_id,acm.client_name,acm.address,acnt.name country,ast.name state,act.name city,acnt.id countryid,ast.id stateid,act.id cityid FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_countries acnt ON acnt.id=acm.country_id left join agrimin_states ast ON ast.id=acm.state_id left join agrimin_cities act ON act.id=acm.city_id Where aft.is_active = 1 and aft.id = '.$params.' order by aft.id desc';

        $querystring =  'SELECT aft.file_creation_date,acm.id client_id,acm.client_name,acm.address,acnt.name country,ast.name state,act.name city,acnt.id countryid,ast.id stateid,act.id cityid,aft.vessel_name,aft.voyage_no,acgm.name cargo_group_name,accm.commodity_name,apm.paking_name,aft.packing_desc,aft.approx_qty,aunm.unit_name,asi.description,aft.attendance_placed,aft.origin,aft.load_port,aft.discharge_port FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_cargo_group_master acgm ON acgm.id=aft.cargo_group_id left join agrimin_packing_master apm ON apm.id=aft.packing_id left join agrimin_unit_master aunm ON aunm.id=aft.approx_unit left join agrimin_special_instruction asi ON asi.id=aft.special_instruction left join agrimin_countries acnt ON acnt.id=acm.country_id left join agrimin_states ast ON ast.id=acm.state_id left join agrimin_cities act ON act.id=acm.city_id Where aft.is_active = 1 and aft.id = '.$params.' order by aft.id desc';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        #print_r($result);exit;
        return $result[0];

    }

     function getFileIdByBranch() { 

        $querystring = 'SELECT file_id FROM agrimin_fileregister_transaction aft Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" Order By file_id desc limit 1';

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


     function getInstructions() { 

        $querystring = "SELECT * FROM agrimin_special_instruction Where is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getInstructionsById($params) { 

        $querystring = "SELECT * FROM agrimin_special_instruction where id = $params";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function delFileid($id)
      {

      $querystring = "DELETE FROM agrimin_fileregister_transaction where id = $id";
      $queryforpubid = $this->db->query($querystring);

      if ($queryforpubid) {
        return TRUE;
      }
      return FALSE;

    }

    public function updateFileNo($data){
      
      // update file no agrimin_fileregister_transaction table
      $result = array('file_no'=>$data['file_no']);
      
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('agrimin_fileregister_transaction',$result);
      $rows = (($this->db->affected_rows() > 0)?TRUE:FALSE);

      if ($rows) {
        $result1 = array('file_no'=>$data['file_no']);
      
       $this->db->where('fileregister_transaction_id', $data['id']);
        $this->db->limit(1);
        $this->db->update('agrimin_fileregister_transaction_log',$result);
      }

      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   function getFileNosByBranchId($params) { 

        #$querystring = 'SELECT file_no FROM agrimin_fileregister_transaction where user_branch_id = "'.$params.'" OR invoice_by_branch = "'.$_SESSION['branch_id'].'" OR find_in_set("'.$_SESSION['userId'].'",user_id)';
        $querystring = 'SELECT file_no FROM agrimin_fileregister_transaction where user_branch_id = "'.$params.'"';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


}

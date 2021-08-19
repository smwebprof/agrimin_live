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
        #$querystring = "SELECT aftm.* FROM agrimin_file_type_master aftm left join agrimin_user_file_type_access aufa on aftm.id=aufa.file_type_id where aufa.user_id= '".$_SESSION['userId']."' and aufa.branch_id= '".$_SESSION['branch_id']."' and aftm.is_active = 1 order by aftm.id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getEditFiletypedata(){ 

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

      if (is_array(@$data['cargo_group'])) {
        $data['cargo_group'] = @implode(",",$data['cargo_group']);
      } else {
        $data['cargo_group'] = @$data['cargo_group'][0];
      }
      
      $result = array('file_creation_date'=>$data['dt'],'client_id'=>$data['clients_name'],'branch_id'=>@$data['branch_name'],'billing_client_id'=>@$data['billing_name'],'user_id'=>@$data['user_data'],'client_job_ref_no'=>$data['client_ref_no'],'scope_of_services'=>$data['scope_services'],'tax_options'=>$data['tax_options'],'nomination_date'=>$data['nomination_date'],'import_export'=>$data['import_export'],'file_type_id'=>@$data['file_type'],'file_sub_type_id'=>@$data['sub_type'],'file_options_id'=>@$data['option_type'],'upload_nomination_path'=>@$data['upl_nomination_path'],'upload_rate_path'=>@$data['upl_rate_path'],'upload_additional_docs_path'=>@$data['upload_additional_docs_path'],'vessel_name'=>$data['vessel_name'],'voyage_no'=>$data['voyage_no'],'cargo_group_id'=>$data['cargo_group'],'invoice_by_branch'=>$data['invoice_by'],'special_instruction'=>$data['file_ins'],'status'=>$data['status'],'cancel_remarks'=>$data['cancel_remarks'],'rate_remarks'=>@$data['rate_remarks'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>1);
      
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

    if (is_array(@$data['cargo_group'])) {
      $data['cargo_group'] = @implode(",",$data['cargo_group']);
    } else {
      $data['cargo_group'] = @$data['cargo_group'][0];
    }

    /*if (isset($data['branch_name'])) {
      $data['branch_name'] = $data['branch_name'];
    }  else {
      $data['branch_name'] = 0;  
    }*/

    $result = array('file_id'=>$data['file_id'],'file_creation_date'=>$data['dt'],'file_no_type'=>$data['file_no_type'],'client_id'=>$data['clients_name'],'branch_id'=>@$data['branch_name'],'billing_client_id'=>@$data['billing_name'],'user_id'=>$data['user_data'],'file_password'=>$data['file_password'],'client_job_ref_no'=>$data['client_ref_no'],'scope_of_services'=>$data['scope_services'],'tax_options'=>$data['tax_options'],'nomination_date'=>$data['nomination_date'],'import_export'=>$data['import_export'],'file_type_id'=>$data['file_type'],'file_sub_type_id'=>$data['sub_type'],'file_options_id'=>$data['option_type'],'upload_nomination_path'=>@$data['upl_nomination_path'],'upload_rate_path'=>@$data['upl_rate_path'],'upload_additional_docs_path'=>@$data['upl_additional_docs_path'],'vessel_name'=>$data['vessel_name'],'voyage_no'=>$data['voyage_no'],'cargo_group_id'=>$data['cargo_group'],'invoice_by_branch'=>$data['invoice_by'],'special_instruction'=>$data['file_ins'],'status'=>$data['status'],'rate_remarks'=>@$data['rate_remarks'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
    //print_r($result);exit;
    $this->db->insert('agrimin_fileregister_transaction',$result);
    $file_id = $this->db->insert_id();


    if ($file_id) {
        $result_new = array('fileregister_transaction_id'=>$data['file_id'],'file_creation_date'=>$data['dt'],'file_no_type'=>$data['file_no_type'],'client_id'=>$data['clients_name'],'branch_id'=>@$data['branch_name'],'billing_client_id'=>@$data['billing_name'],'user_id'=>$data['user_data'],'file_password'=>$data['file_password'],'client_job_ref_no'=>$data['client_ref_no'],'scope_of_services'=>$data['scope_services'],'tax_options'=>$data['tax_options'],'nomination_date'=>$data['nomination_date'],'import_export'=>$data['import_export'],'file_type_id'=>$data['file_type'],'file_sub_type_id'=>$data['sub_type'],'file_options_id'=>$data['option_type'],'upload_nomination_path'=>@$data['upl_nomination_path'],'upload_rate_path'=>@$data['upl_rate_path'],'upload_additional_docs_path'=>@$data['upl_additional_docs_path'],'vessel_name'=>$data['vessel_name'],'voyage_no'=>$data['voyage_no'],'cargo_group_id'=>$data['cargo_group'],'invoice_by_branch'=>$data['invoice_by'],'special_instruction'=>$data['file_ins'],'status'=>$data['status'],'rate_remarks'=>@$data['rate_remarks'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);

        $this->db->insert('agrimin_fileregister_transaction_log',$result_new);
    }

    return $file_id;

   }

   function getAllFiledata_old(){  //$id

        #$querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM agrimin_client_master where is_active = $id";
        #$querystring = "SELECT * FROM agrimin_fileregister_transaction Where is_active = 1 order by id desc";
        $querystring =  "SELECT aft.*,acm.client_name,accm.commodity_name,aum.unit_name, aiem.name import_export,acgm.name cargo_group  FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_unit_master aum ON aum.id=aft.approx_unit left join agrimin_import_export_master aiem ON aiem.id=aft.import_export left join agrimin_cargo_group_master acgm ON acgm.id=aft.cargo_group_id Where aft.is_active = 1 and aft.user_comp_id = '".$_SESSION['comp_id']."' and aft.user_branch_id = '".$_SESSION['branch_id']."' OR aft.invoice_by_branch = '".$_SESSION['branch_id']."' OR find_in_set('".$_SESSION['userId']."',aft.user_id) order by aft.id desc";
        #echo $querystring ;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFiledata(){  //$id

        #$querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM agrimin_client_master where is_active = $id";
        #$querystring = "SELECT * FROM agrimin_fileregister_transaction Where is_active = 1 order by id desc";
        $querystring =  "SELECT aft.*,acm.client_name,accm.commodity_name,aum.unit_name, aiem.name import_export,acgm.name cargo_group  FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_unit_master aum ON aum.id=aft.approx_unit left join agrimin_import_export_master aiem ON aiem.id=aft.import_export left join agrimin_cargo_group_master acgm ON acgm.id=aft.cargo_group_id Where aft.is_active = 1 and aft.file_no_type = 'Single' and aft.user_comp_id = '".$_SESSION['comp_id']."' and aft.user_branch_id = '".$_SESSION['branch_id']."' order by aft.id desc";
        #echo $querystring ;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFiledataMult(){  //$id

        #$querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM agrimin_client_master where is_active = $id";
        #$querystring = "SELECT * FROM agrimin_fileregister_transaction Where is_active = 1 order by id desc";
        $querystring =  "SELECT aft.*,acm.client_name,accm.commodity_name,aum.unit_name, aiem.name import_export,acgm.name cargo_group  FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_unit_master aum ON aum.id=aft.approx_unit left join agrimin_import_export_master aiem ON aiem.id=aft.import_export left join agrimin_cargo_group_master acgm ON acgm.id=aft.cargo_group_id Where aft.is_active = 1 and aft.file_no_type = 'Multiple' and aft.user_comp_id = '".$_SESSION['comp_id']."' and aft.user_branch_id = '".$_SESSION['branch_id']."' order by aft.id desc";
        #echo $querystring ;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFiledataByDate($dt){  //$id

        $querystring =  "SELECT aft.*,acm.client_name,accm.commodity_name,aum.unit_name,aeum.first_name,aeum.last_name,abm.branch_name FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_unit_master aum ON aum.id=aft.approx_unit left join agrimin_employee_users_master aeum ON aeum.id=aft.entry_user_id left join agrimin_branch_master abm ON abm.id=aft.user_branch_id Where aft.is_active = 1 and date(aft.file_creation_date) = date('".$dt."')  order by aft.file_no desc";
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

       if ($data['vessel_name']) {
          $search .= ' and aft.vessel_name = "'.$data['vessel_name'].'"';
       }

       #$querystring =  'SELECT aft.*,acm.client_name,accm.commodity_name,aum.unit_name FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_unit_master aum ON aum.id=aft.approx_unit Where aft.is_active = 1 and aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" '.$search.' OR aft.invoice_by_branch = "'.$_SESSION['branch_id'].'" OR find_in_set("'.$_SESSION['userId'].'",aft.user_id) order by aft.id desc';

       $querystring =  'SELECT aft.*,acm.client_name,accm.commodity_name,aum.unit_name,acgm.name cargo_group FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_unit_master aum ON aum.id=aft.approx_unit left join agrimin_cargo_group_master acgm ON acgm.id=aft.cargo_group_id Where aft.is_active = 1 and aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" '.$search.' order by aft.id desc';

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getOtherFiledataById($params){
        $file_opt = array();
        $file_opt_others = array();
        $file_options_arr = explode(",",$params['file_options_id']);
        $file_sub_type_arr = explode(",",$params['file_sub_type_id']);

        foreach ($file_options_arr as $file_options_id) { 
        $querystring =  'SELECT file_options_id FROM agrimin_file_sub_options Where id = "'.$file_options_id.'"';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
      
          if (!in_array($result[0]['file_options_id'],@$file_opt)) {
            $file_opt[] = $result[0]['file_options_id'];
          }  
        }

        foreach ($file_sub_type_arr as $file_sub_type) { 
           if (in_array($file_sub_type, $file_opt)) {
              unset($file_opt[array_search($file_sub_type,$file_opt)]);
           }
        }  
        
        #print_r($file_opt);exit;
        
        return $file_opt;

    }  

    function getFiledataById($params){  //$id

        #$querystring = "SELECT * FROM agrimin_fileregister_transaction Where id =".$params." order by id";
        $querystring =  'SELECT aft.*,acm.client_name,accm.commodity_name,aeum1.first_name fname,aeum1.last_name lname,aeum2.first_name ename,aeum2.last_name elname,aunm.unit_name FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_employee_users_master aeum1 ON aeum1.id=aft.entry_user_id left join agrimin_employee_users_master aeum2 ON aeum2.id=aft.modify_user_id left join agrimin_unit_master aunm ON aunm.id=aft.approx_unit Where aft.is_active = 1 and aft.id = '.$params.' order by aft.id desc';
        #echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getFiledataByCompanyId($params){ 

        $querystring =  'SELECT count(id) count FROM agrimin_fileregister_transaction aft Where aft.user_comp_id = '.$params;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result[0];
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

   public function updateInvoiceByFileId($data){
        $params = $data['id'];
        $querystring = 'SELECT invoice_vat_percent,invoice_tax_amt,invoice_amt FROM agrimin_invoice_master where file_no = "'.$params.'"';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        
        if ($result) {

          $invoice_amt = $result[0]['invoice_amt'] - $result[0]['invoice_tax_amt'];

          $result1 = array('invoice_vat_percent'=>'','invoice_tax_amt'=>'','invoice_amt'=>$invoice_amt);
          #print_r($result1);exit;
          $this->db->where('file_no', $params);
          $this->db->limit(1);
          $this->db->update('agrimin_invoice_master',$result1);
          $rows = (($this->db->affected_rows() > 0)?TRUE:FALSE);
        }  else {
          return $result;
        } 

   }

   public function getInvoiceStatusByFileId($data){
        $params = $data['id'];
        $querystring = 'SELECT * FROM agrimin_invoice_master where file_no = "'.$params.'" and invoice_type = "Draft"';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
   } 

   function getFileNosByBranchId($params) { 

        #$querystring = 'SELECT file_no FROM agrimin_fileregister_transaction where user_branch_id = "'.$params.'" OR invoice_by_branch = "'.$_SESSION['branch_id'].'" OR find_in_set("'.$_SESSION['userId'].'",user_id)';
        $querystring = 'SELECT file_no FROM agrimin_fileregister_transaction where user_branch_id = "'.$params.'"';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getFileNosByVesselName() { 

        $querystring = 'SELECT distinct(vessel_name) FROM agrimin_fileregister_transaction WHERE vessel_name != "" and user_branch_id = "'.$_SESSION['branch_id'].'"';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    function fetch_labparameters($params)
    {
  
      $querystring = "SELECT * FROM agrimin_lab_parameters WHERE cargo_master_id = '".$params."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      /*$output = '<option value="">Select</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
      };*/
      $output = '<div class="checkbox-list">';
      foreach($result as $row)
      {

          $output .= '<label><input type="checkbox">Checkbox 1 </label>';
      }
      return $output;

    } 


    function fetch_labmethods($params)
    {
  
      $querystring = "SELECT * FROM agrimin_lab_methods WHERE lab_master_id = '".$params."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '<option value="">Select Method</option>';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['method_name'].'</option>';
      };

      return $output;

    }


    function getCargolabparameters()
    {

        $querystring = 'select alp.id parameter_id,alp.name parameter_name,acm.commodity_name,acm.id cargo_id from agrimin_lab_parameters alp left join agrimin_cargo_master acm on acm.id = alp.cargo_master_id Where acm.id in (50,79)';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        foreach ($result as $k=>$v) {
            $cargo_cat[] = $v['commodity_name'];          
        }
        
        $cargo_cat_arr = array_unique($cargo_cat);
        $i=0;
        foreach ($result as $p=>$q) {
          if (in_array($q['commodity_name'],$cargo_cat_arr)) {
            $cargo_cat_arr_new[$q['commodity_name']][$i]['name'] = $q['parameter_name'];
            $cargo_cat_arr_new[$q['commodity_name']][$i]['id'] = $q['parameter_id'];
            $cargo_cat_arr_new[$q['commodity_name']][$i]['cargo_id'] = $q['cargo_id'];
            #$cargo_id_arr_new[$q['commodity_name']][$i] = $q['parameter_id'];
            $i++;
          }
        }  
        #print_r($cargo_cat_arr_new);exit;
        return $cargo_cat_arr_new;

    }

    public function addFileCargoDetails($data){
        #print_r($data);exit;
        for ($x = 0; $x <= count($data['cargo']); $x++) {
            #echo $data['div_approx_qty'][$x];exit;
          if (!empty($data['cargo'][$x])) {
            $result = array('fileregister_transaction_id'=>$data['fileregister_transaction_id'],'cargo_group_id'=>$data['cargo_group'],'cargo_id'=>$data['cargo'][$x],'packing_id'=>$data['div_packing'][$x],'approx_qty'=>$data['div_quantity'][$x],'approx_unit'=>$data['div_unit'][$x],'attendance_placed'=>$data['div_place_attendance'][$x],'origin'=>$data['div_origin'][$x],'load_port'=>$data['div_load_port'][$x],'discharge_port'=>$data['div_discharge_port'][$x],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
            #print_r($result);exit;
            $this->db->insert('agrimin_fileregister_transaction_cargo_details',$result);
          }   
        }

        return $result;

    }


    public function addFileCargoDetailsMult($data){
        #print_r($data);exit;
        for ($x = 0; $x <= count($data['cargo']); $x++) {
            #echo $data['div_approx_qty'][$x];exit;
          if (!empty($data['cargo'][$x])) {
            $result = array('fileregister_transaction_id'=>$data['fileregister_transaction_id'],'cargo_group_id'=>$data['cargo_group'][$x],'cargo_id'=>$data['cargo'][$x],'packing_id'=>$data['div_packing'][$x],'approx_qty'=>$data['div_quantity'][$x],'approx_unit'=>$data['div_unit'][$x],'attendance_placed'=>$data['div_place_attendance'][$x],'origin'=>$data['div_origin'][$x],'load_port'=>$data['div_load_port'][$x],'discharge_port'=>$data['div_discharge_port'][$x],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
            #print_r($result);exit;
            $this->db->insert('agrimin_fileregister_transaction_cargo_details',$result);
          }   
        }

        return $result;

    }



   public function getFileCargoDetailsById($params){  //$id

        #$querystring = "SELECT * FROM agrimin_fileregister_transaction Where id =".$params." order by id";
        $querystring =  'SELECT acm.commodity_name,aftcd.approx_qty,aum.unit_name from agrimin_fileregister_transaction_cargo_details aftcd left join agrimin_cargo_master acm ON acm.id=aftcd.cargo_id left join agrimin_unit_master aum ON aum.id=aftcd.approx_unit Where fileregister_transaction_id = '.$params.' order by aftcd.id';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    } 

    public function editFileCargoDetailsById($params){  //$id

        #$querystring = "SELECT * FROM agrimin_fileregister_transaction Where id =".$params." order by id";
        $querystring =  'SELECT acm.commodity_name,aum.unit_name,apm.paking_name,aftcd.* from agrimin_fileregister_transaction_cargo_details aftcd left join agrimin_cargo_master acm ON acm.id=aftcd.cargo_id left join agrimin_unit_master aum ON aum.id=aftcd.approx_unit left join agrimin_packing_master apm ON apm.id=aftcd.packing_id Where fileregister_transaction_id = '.$params.' order by aftcd.id';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function editFileCargoDetailsByIdMult($params){  //$id

        #$querystring = "SELECT * FROM agrimin_fileregister_transaction Where id =".$params." order by id";
        $querystring =  'SELECT acm.commodity_name,aum.unit_name,apm.paking_name,acgm.name cargo_group_name,aftcd.* from agrimin_fileregister_transaction_cargo_details aftcd left join agrimin_cargo_master acm ON acm.id=aftcd.cargo_id left join agrimin_unit_master aum ON aum.id=aftcd.approx_unit left join agrimin_packing_master apm ON apm.id=aftcd.packing_id  left join agrimin_cargo_group_master acgm ON aftcd.cargo_group_id=acgm.id Where fileregister_transaction_id = '.$params.' order by aftcd.id';
        #echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    public function updateCargoDetailsById($data)
      {
      #echo $data['cargo_data_id'][0];exit; 
      if (!isset($data['cargo_data_id'][0]))  { 
          for ($x = 0; $x < count($data['cargo']); $x++) {  

            $result = array('cargo_group_id'=>$data['cargo_group']);      
            $this->db->where('id', $data['id']);
            $this->db->limit(1);
            $this->db->update('agrimin_fileregister_transaction',$result);
            $rows = (($this->db->affected_rows() > 0)?TRUE:FALSE);
            
            $result = array('cargo_group_id'=>$data['cargo_group'],'cargo_id'=>$data['cargo'][$x],'packing_id'=>$data['div_packing'][$x],'approx_qty'=>$data['div_quantity'][$x],'approx_unit'=>$data['div_unit'][$x],'attendance_placed'=>@$data['div_place_attendance'][$x],'origin'=>@$data['div_origin'][$x],'load_port'=>@$data['div_load_port'][$x],'discharge_port'=>@$data['div_discharge_port'][$x],'modify_user_id'=>@$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
            #print_r($result);exit;

            $this->db->where('id', $data['div_cargo_id'][$x]);
            $this->db->limit(1);
            $this->db->update('agrimin_fileregister_transaction_cargo_details',$result);
            #echo $this->db->last_query();exit;
        }
      
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);

      } else { #echo count($data['cargo']);exit;
        $params = $data['id'];
        $querystring = "DELETE FROM agrimin_fileregister_transaction_cargo_details where fileregister_transaction_id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        for ($x = 0; $x <= count($data['cargo']); $x++) {
              #echo $data['div_approx_qty'][$x];exit;
            if (!empty($data['cargo'][$x])) {
              $result = array('fileregister_transaction_id'=>$data['id'],'cargo_group_id'=>$data['cargo_group'],'cargo_id'=>$data['cargo'][$x],'packing_id'=>$data['div_packing'][$x],'approx_qty'=>$data['div_quantity'][$x],'approx_unit'=>$data['div_unit'][$x],'attendance_placed'=>$data['div_place_attendance'][$x],'origin'=>$data['div_origin'][$x],'load_port'=>$data['div_load_port'][$x],'discharge_port'=>$data['div_discharge_port'][$x],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
              #print_r($result);exit;
              $this->db->insert('agrimin_fileregister_transaction_cargo_details',$result);
            }   
          }
      }
    }

    public function updateCargoDetailsByIdNew($data)
      {
          $params = $data['id'];
          $querystring = "DELETE FROM agrimin_fileregister_transaction_cargo_details where fileregister_transaction_id = '".$params."'";
          $queryforpubid = $this->db->query($querystring);

          for ($x = 0; $x <= count($data['cargo']); $x++) {
              #echo $data['div_approx_qty'][$x];exit;
            if (!empty($data['cargo'][$x])) {
              $result = array('fileregister_transaction_id'=>$data['id'],'cargo_group_id'=>$data['cargo_group'],'cargo_id'=>$data['cargo'][$x],'packing_id'=>$data['div_packing'][$x],'approx_qty'=>$data['div_quantity'][$x],'approx_unit'=>$data['div_unit'][$x],'attendance_placed'=>$data['div_place_attendance'][$x],'origin'=>$data['div_origin'][$x],'load_port'=>$data['div_load_port'][$x],'discharge_port'=>$data['div_discharge_port'][$x],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
              #print_r($result);exit;
              $this->db->insert('agrimin_fileregister_transaction_cargo_details',$result);
            }   
          }


      } 

      public function updateCargoDetailsByIdNewMult($data)
      {
          $params = $data['id'];
          $querystring = "DELETE FROM agrimin_fileregister_transaction_cargo_details where fileregister_transaction_id = '".$params."'";
          $queryforpubid = $this->db->query($querystring);

          for ($x = 0; $x <= count($data['cargo']); $x++) {
              #echo $data['div_approx_qty'][$x];exit;
            if (!empty($data['cargo'][$x])) {
              $result = array('fileregister_transaction_id'=>$data['id'],'cargo_group_id'=>$data['cargo_group'][$x],'cargo_id'=>$data['cargo'][$x],'packing_id'=>$data['div_packing'][$x],'approx_qty'=>$data['div_quantity'][$x],'approx_unit'=>$data['div_unit'][$x],'attendance_placed'=>$data['div_place_attendance'][$x],'origin'=>$data['div_origin'][$x],'load_port'=>$data['div_load_port'][$x],'discharge_port'=>$data['div_discharge_port'][$x],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
              #print_r($result);exit;
              $this->db->insert('agrimin_fileregister_transaction_cargo_details',$result);
            }   
          }


      } 

}

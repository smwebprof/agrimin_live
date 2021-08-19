<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operation_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_fileregister_transaction'; 
    } 

    function getOperationsdata($params){ 

        #$querystring = "SELECT aft.*, FROM agrimin_fileregister_transaction where id = '".$params."'";
        $querystring =  "SELECT aft.*,acm.client_name,acm.address,acm.vat_no,acm.city_id,acm.state_id,acm.country_id,acg.commodity_name FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON aft.client_id=acm.id left join agrimin_cargo_master acg ON aft.cargo_id=acg.id WHERE aft.id = '".$params."'";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function addDocumentTypes($data){

      if ($data['user_id'] == '') { $data['user_id'] = 13; }

      $result = array('file_no'=>$data['file_id'],'document_type_id'=>$data['doc_types'],'document_number'=>$data['document_no'],'document_path'=>@$data['upl_document_path'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
      
      //print_r($result);exit;
      $this->db->insert('agrimin_fileregister_operations',$result);
      return $this->db->insert_id();

   }

   function UpdateFileData($data){

      $result = array('status'=> 'Running','modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']);
      

      $this->db->where('id', $data['file_id']);
      $this->db->limit(1);
      $this->db->update('agrimin_fileregister_transaction',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }
   
}

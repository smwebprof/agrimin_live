<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designation_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_designation_master'; 
    } 

    public function addDesignationmaster($data){
    if(empty($data))
      return FALSE;

    $result = array('designation_name'=>$data['designation_name'],'designation_shortname'=>$data['designation_shortname'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);
    #print_r($result);exit;
    $this->db->insert('agrimin_designation_master',$result);
    return $this->db->insert_id();

   }

    function getDesignationdata(){ 

        $querystring = "SELECT * FROM agrimin_designation_master order by id desc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function updateDesignationData($data)
      {
      
      $result = array('designation_name'=>$data['designation_name'],'shortname'=>$data['designation_shortname'],'modify_user_id'=>$data['user_id'],'is_active'=>1);
      
      #print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('agrimin_designation_master',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    public function deldesignationmaster($id)
      {

      $querystring = "DELETE FROM agrimin_designation_master where id = $id";
      $queryforpubid = $this->db->query($querystring);

      if ($queryforpubid) {
        return TRUE;
      }
      return FALSE;

    }

    function getDesignationById($params){ 

        $querystring = "SELECT * FROM agrimin_designation_master WHERE id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


}

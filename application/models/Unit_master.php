<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_unit_master'; 
    } 

    public function addUnitmaster($data){
    if(empty($data))
      return FALSE;

    $result = array('unit_name'=>$data['unit_name'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1); //,'description'=>$data['description']
    #print_r($result);exit;
    $this->db->insert('agrimin_unit_master',$result);
    return $this->db->insert_id();

   }

    function getUnitdata(){ 

        $querystring = "SELECT * FROM agrimin_unit_master Where is_active = 1 order by id asc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllUnitdata(){ 

        $querystring = "SELECT * FROM agrimin_unit_master Where is_active != '-1' order by id asc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function updateUnitData($data)
      {
      
      $result = array('unit_name'=>$data['unit_name'],'modify_user_id'=>$data['user_id'],'is_active'=>1); // ,'description'=>$data['description']
      
      #print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('agrimin_unit_master',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    public function delunitmaster($id)
      {

      $querystring = "DELETE FROM agrimin_unit_master where id = $id";
      $queryforpubid = $this->db->query($querystring);

      if ($queryforpubid) {
        return TRUE;
      }
      return FALSE;

    }

    function getUnitById($params){ 

        $querystring = "SELECT * FROM agrimin_unit_master WHERE id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

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


}

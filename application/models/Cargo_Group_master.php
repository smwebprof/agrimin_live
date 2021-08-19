<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo_Group_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_cargo_group_master'; 
    } 

    public function addCargoGroupmaster($data){
    if(empty($data))
      return FALSE;

    $result = array('name'=>$data['name'],'short_name'=>$data['short_name'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);
    #print_r($result);exit;
    $this->db->insert('agrimin_cargo_group_master',$result);
    return $this->db->insert_id();

   }

    function getCargoGroupdata(){ 

        $querystring = "SELECT * FROM agrimin_cargo_group_master order by id desc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCargoGroup(){ 

        #$querystring = "SELECT id,name,short_name FROM agrimin_cargo_group_master Where is_active = 1";
        $querystring = "SELECT id,name,short_name FROM agrimin_cargo_group_master Where is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    function getCargoGroupById($params){ 

        $querystring = "SELECT id,name,short_name FROM agrimin_cargo_group_master where id = $params";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCargoGroupByIdMult($params){ 

        $querystring = "SELECT id,name,short_name FROM agrimin_cargo_group_master where id in ($params)";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function updateCargoGroupData($data)
      {
      
      $result = array('name'=>$data['name'],'short_name'=>$data['short_name'],'modify_user_id'=>$data['user_id'],'is_active'=>1);
      
      #print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('agrimin_cargo_group_master',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    public function delcargogroupmaster($id)
      {

      $querystring = "DELETE FROM agrimin_cargo_group_master where id = $id";
      $queryforpubid = $this->db->query($querystring);

      if ($queryforpubid) {
        return TRUE;
      }
      return FALSE;

    }



}

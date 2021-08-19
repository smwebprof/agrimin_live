<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_cargo_master'; 
    } 

    public function addCargomaster($data){
    if(empty($data))
      return FALSE;

    $result = array('cargo_group_id'=>$data['cargo_group_id'],'commodity_name'=>$data['commodity_name'],'parameter_name'=>$data['parameter_name'],'subparameter_name'=>$data['subparameter_name'],'test_method'=>$data['test_method'],'unit_id'=>$data['unit_id'],'fssai_applicable'=>$data['fssai_applicable'],'fosfa_applicable'=>$data['fosfa_applicable'],'gafta_applicable'=>$data['gafta_applicable'],'parameter_category'=>$data['parameter_category'],'branch_id'=>$data['branch_id'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);
    //print_r($result);exit;
    $this->db->insert('agrimin_cargo_master',$result);
    return $this->db->insert_id();

   }

    function getCargodata(){ 

        $querystring = "SELECT acm.*,acgm.name cargo_group_name FROM agrimin_cargo_master acm left join agrimin_cargo_group_master acgm on acgm.id = acm.cargo_group_id Where acm.is_active = 1  order by id desc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCargodataById($id){ 

        $querystring = "SELECT * FROM agrimin_cargo_master where id = $id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCargodataByCargoGroup($id){ 

        $querystring = "SELECT * FROM agrimin_cargo_master where cargo_group_id = $id and is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCargodataByCargoGroupMult($id){ 

        $querystring = "SELECT * FROM agrimin_cargo_master where cargo_group_id in ($id) and is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


     public function updateCargodata($data)
      {
      
      $result = array('cargo_group_id'=>$data['cargo_group_id'],'commodity_name'=>$data['commodity_name'],'modify_user_id'=>$data['user_id'],'is_active'=>1); // ,'description'=>$data['description']
      
      #print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('agrimin_cargo_master',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    public function delcargomaster($id)
      {
      
      $result = array('is_active'=>0); // ,'description'=>$data['description']
      
      #print_r($result);exit;
      $this->db->where('id', $id);
      $this->db->limit(1);
      $this->db->update('agrimin_cargo_master',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }


}

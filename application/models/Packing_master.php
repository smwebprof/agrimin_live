<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packing_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_packing_master'; 
    } 

    public function addPackingmaster($data){
    if(empty($data))
      return FALSE;

    $result = array('paking_name'=>$data['paking_name'],'description'=>$data['description'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);
    #print_r($result);exit;
    $this->db->insert('agrimin_packing_master',$result);
    return $this->db->insert_id();

   }

    function getPackingdata(){ 

        $querystring = "SELECT id,paking_name,description FROM agrimin_packing_master where is_active = 1 order by id desc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getPackingdataById($id){ 

        $querystring = "SELECT id,paking_name,description FROM agrimin_packing_master where id = $id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function updatePackingData($data)
      {
      
      $result = array('paking_name'=>$data['paking_name'],'description'=>$data['description'],'modify_user_id'=>$data['user_id'],'is_active'=>1);
      
      #print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('agrimin_packing_master',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    public function delpackingmaster($id)
      {

      $querystring = "DELETE FROM agrimin_packing_master where id = $id";
      $queryforpubid = $this->db->query($querystring);

      if ($queryforpubid) {
        return TRUE;
      }
      return FALSE;

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


}

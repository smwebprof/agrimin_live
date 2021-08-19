<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_master extends CI_Model{ 

    function getCargoClientReportdata(){ 

        $querystring = "select acm.commodity_name,acgm.name cargo_group_name,ac.client_name,aftcd.approx_qty,aum.unit_name,aftcd.load_port,aftcd.discharge_port,aft.id file_id from agrimin_fileregister_transaction_cargo_details aftcd left join agrimin_fileregister_transaction aft on aftcd.fileregister_transaction_id=aft.id left join agrimin_cargo_master acm on aftcd.cargo_id=acm.id left join  agrimin_cargo_group_master acgm on aftcd.cargo_group_id=acgm.id left join agrimin_client_master ac on aft.client_id=ac.id left join agrimin_unit_master aum on aftcd.approx_unit=aum.id Where aft.is_active = 1 and aft.user_comp_id = '".$_SESSION['comp_id']."' and aft.user_branch_id = '".$_SESSION['branch_id']."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCargoLoadportdata(){
        $querystring = "SELECT distinct(load_port) load_port FROM agrimin_fileregister_transaction_cargo_details where load_port !=''";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCargoDischargeportdata(){
        $querystring = "SELECT distinct(discharge_port) discharge_port FROM agrimin_fileregister_transaction_cargo_details where discharge_port !=''";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
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

    function fetch_cargo2($params)
    {
  
      $querystring = "SELECT * FROM agrimin_cargo_master WHERE cargo_group_id = '".$params."' AND is_active = 1";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      return $result;

    } 

    function getCargoClientReportSearch($data){  //$id

       $search = '';


      if ($data['cargo_group_view']) {
          $search .= ' and acgm.id = "'.$data['cargo_group_view'].'"';
       }

       if ($data['commodity']) {
          $search .= ' and acm.id = "'.$data['commodity'].'"';
       }

       if ($data['clients_name']) {
          $search .= ' and ac.id = "'.$data['clients_name'].'"';
       }

       if ($data['load_port']) {
          $search .= ' and aftcd.load_port = "'.$data['load_port'].'"';
       }

       if ($data['discharge_port']) {
          $search .= ' and aftcd.discharge_port = "'.$data['discharge_port'].'"';
       }

       $querystring = "select acm.commodity_name,acgm.name cargo_group_name,ac.client_name,aftcd.approx_qty,aum.unit_name,aftcd.load_port,aftcd.discharge_port,aft.id file_id from agrimin_fileregister_transaction_cargo_details aftcd left join agrimin_fileregister_transaction aft on aftcd.fileregister_transaction_id=aft.id left join agrimin_cargo_master acm on aftcd.cargo_id=acm.id left join  agrimin_cargo_group_master acgm on aftcd.cargo_group_id=acgm.id left join agrimin_client_master ac on aft.client_id=ac.id left join agrimin_unit_master aum on aftcd.approx_unit=aum.id Where aft.is_active = 1 and aft.user_comp_id = '".$_SESSION['comp_id']."' and aft.user_branch_id = '".$_SESSION['branch_id']."' ".$search."";

        //echo $querystring;exit; 
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        //print_r($result);exit;
        return $result;

    } 

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_client_master'; 
        $this->load->model('company_master');
    } 

    public function addClientmaster($data){
    if(empty($data))
      return FALSE;

    #$data['company_country'] = $this->fetchCountryById($data['company_country']);
    #$data['company_state'] = $this->fetchStateById($data['company_state']);
    #$data['company_city'] = $this->fetchCityById($data['company_city']);

    $result = array('comp_id'=>$data['company_name'],'client_type'=>$data['client_type'],'client_name'=>$data['client_name'],'address'=>$data['client_address'],'country_id'=>$data['company_country'],'state_id'=>$data['company_state'],' city_id'=>$data['company_city'],'tel_no'=>$data['client_tel'],'email_address'=>$data['client_email'],'gst_no'=>@$data['client_gst'],'vat_no'=>@$data['client_vat'],'tan_no'=>@$data['client_tan'],'client_of_branch'=>@$data['branch_name'],'mobile_no'=>$data['client_mobile'],'firm_type'=>$data['client_firm'],'tel_prefix'=>$data['client_tel_prefix'],'mobile_prefix   '=>$data['client_mobile_prefix'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);
    //print_r($result);exit;
    $this->db->insert('agrimin_client_master',$result);
    return $this->db->insert_id();

   }

    function getClientdata(){  //$id

        #$querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM agrimin_client_master where is_active = $id";
        #$querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM agrimin_client_master order by client_name";
        $querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM agrimin_client_master where (client_type = 'Client' or client_type is null)  order by client_name";
        #$querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM agrimin_client_master Where (client_type != 'Creditor' OR client_type != 'Foreign') order by client_name";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    function getClientdataById($params){  //$id

        $querystring = "SELECT * FROM agrimin_client_master Where id =".$params." order by client_name";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    function getAllClientdata($id){  //$id

        #$querystring = "SELECT id,client_name,address,city_id,state_id,country_id FROM agrimin_client_master where is_active = $id";
        $querystring = "SELECT acm.*,acnt.name country,ast.name state,act.name city FROM agrimin_client_master acm 
                            left join agrimin_countries acnt ON acnt.id=acm.country_id
                            left join agrimin_states ast ON ast.id=acm.state_id
                            left join agrimin_cities act ON act.id=acm.city_id
                            where is_active = $id order by acm.id desc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function updateClientData($data)
      {


      $result = array('comp_id'=>$data['company_name'],'address'=>$data['client_address'],'client_type'=>$data['client_type'],'client_name'=>$data['client_name'],'country_id'=>$data['company_country'],'state_id'=>$data['company_state'],'city_id'=>$data['company_city'],'tel_no'=>$data['client_tel'],'email_address'=>$data['client_email'],'gst_no'=>@$data['client_gst'],'vat_no'=>@$data['client_vat'],'tan_no'=>@$data['client_tan'],'mobile_no'=>@$data['client_mobile'],'firm_type'=>$data['client_firm'],'modify_user_id'=>$data['user_id'],'is_active'=>1);
      
      //print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('agrimin_client_master',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);  

    }

    public function delclientmaster($id)
      {

      $querystring = "DELETE FROM agrimin_client_master where id = $id";
      $queryforpubid = $this->db->query($querystring);

      if ($queryforpubid) {
        return TRUE;
      }
      return FALSE;

    }


    public function fetchCountryById($params){ 
        
        $querystring = "SELECT name FROM agrimin_countries where id =".$params;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
       
        return $result[0]['name'];

    }

    public function fetchStateById($params){ 

        
        $querystring = "SELECT name FROM agrimin_states where id =".$params;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        
        return $result[0]['name'];

    }

    public function fetchCityById($params){ 

        $querystring = "SELECT name FROM agrimin_cities where id =".$params;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        
        return $result[0]['name'];

    }

}

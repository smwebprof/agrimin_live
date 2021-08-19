<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_fileregister_transaction'; 
    } 

  function getCargoDetailsForFile(){  
        $dt = gmdate('Y-m-d H:i:s');


        $querystring =  "SELECT * FROM `agrimin_fileregister_transaction` WHERE cargo_id is not null";
        #echo $querystring ;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        #print_r($result);exit;
        $i = 1;
        foreach ($result as $k => $v) {
            #echo $v['file_no'];exit;
            $resultdata = array('fileregister_transaction_id'=>$v['id'],'cargo_group_id'=>$v['cargo_group_id'],'cargo_id'=>$v['cargo_id'],'packing_id'=>@$v['packing_id'],'approx_qty'=>@$v['approx_qty'],'approx_unit'=>$v['approx_unit'],'attendance_placed'=>$v['attendance_placed'],'origin'=>$v['origin'],'load_port'=>$v['load_port'],'discharge_port'=>$v['discharge_port'],'entry_user_id'=>$v['entry_user_id'],'entry_date'=>$v['entry_date'],'is_active'=>$v['is_active'],'user_comp_id'=>$v['user_comp_id'],'user_branch_id'=>$v['user_branch_id']);
            #print_r($resultdata);exit;
            $this->db->insert('agrimin_fileregister_transaction_cargo_details',$resultdata);
            $file_id = $this->db->insert_id();
            $i++;
        }
        echo $i." rows inserted";exit;

        return $result;

    }  


}

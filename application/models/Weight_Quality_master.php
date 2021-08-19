<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weight_Quality_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = '  agrimin_weight_quality_certificate_master'; 
    } 

    function getQCertificatedata($params){ 

        $querystring =  'SELECT aft.*,acm.id client_id,acm.client_name,acm.address,acm.vat_no,acm.zip_pin_code,acnt.name country,ast.name state,act.name city,acnt.id countryid,ast.id stateid,act.id cityid,aft.vessel_name,aft.voyage_no,acgm.name cargo_group_name,accm.commodity_name,apm.paking_name,aft.packing_desc,aft.approx_qty,aunm.unit_name,asi.description,aft.attendance_placed,aft.origin,aft.load_port,aft.discharge_port,afom.name options_name FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_cargo_group_master acgm ON acgm.id=aft.cargo_group_id left join agrimin_packing_master apm ON apm.id=aft.packing_id left join agrimin_unit_master aunm ON aunm.id=aft.approx_unit left join agrimin_special_instruction asi ON asi.id=aft.special_instruction left join agrimin_file_options_master afom ON afom.id=aft.file_sub_type_id left join agrimin_countries acnt ON acnt.id=acm.country_id left join agrimin_states ast ON ast.id=acm.state_id left join agrimin_cities act ON act.id=acm.city_id Where aft.is_active = 1 and aft.id = '.$params.' order by aft.id desc';
        #echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllWQCertificatedata(){ 
        // aft.status = 'Completed' and 
        $querystring =  "SELECT aft.file_no,aft.id,aft.file_no_type,awqcm.id cert_id,awqcm.certificate_no,awqcm.certificate_date FROM agrimin_fileregister_transaction aft left join agrimin_weight_quality_certificate_master awqcm ON awqcm.file_id=aft.id WHERE aft.user_comp_id =  '".$_SESSION['comp_id']."' and aft.user_branch_id = '".$_SESSION['branch_id']."' and aft.is_active = 1 Order by aft.id desc";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getWQCertificatedetails($data){ 

        $querystring =  "SELECT * FROM agrimin_weight_quality_certificate_master WHERE file_id in ($data)";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        foreach ($result as $rows) {
            $cert_data[$rows['file_id']][$rows['id']]['cert_id'] = $rows['id'];
            $cert_data[$rows['file_id']][$rows['id']]['cert_no'] = $rows['certificate_no'];
            $cert_data[$rows['file_id']][$rows['id']]['cert_date'] = $rows['certificate_date'];
            $cert_data[$rows['file_id']][$rows['id']]['status'] = $rows['certificate_type'];
        }
        //print_r($cert_data);exit;

        return @$cert_data;

    }

    public function addWQCertData($data){

        if($data['para1_check']==0) { $data['para1_title'] = '';$data['cert_para1'] = '';  }
        if($data['para2_check']==0) { $data['para2_title'] = '';$data['cert_para2'] = '';  }
        if($data['para3_check']==0) { $data['para3_title'] = '';$data['cert_para3'] = '';  }
        if($data['para4_check']==0) { $data['para4_title'] = '';$data['cert_para4'] = '';  }

        $invoice_curr_bal = $data['total_qty'];


        //@$data['certificate_type']
        $result = array('file_id'=>$data['file_id'],'file_no'=>$data['file_no'],'file_no_type'=>$data['file_no_type'],'file_date'=>$data['loading_date'],'client_id'=>@$data['invoice_date'],'certificate_type'=>'Draft','certificate_date'=>$data['cert_date'],'notify'=>$data['cert_notify'],'shipper'=>$data['cert_shipper'],'shipper1'=>$data['cert_shipper1'],'shipper2'=>$data['cert_shipper2'],'consignee'=>$data['cert_consignee'],'commodity'=>@$data['cert_goods'],'warehouse'=>@$data['voyage_no'],'vessel_name'=>@$data['cert_vessel'],'approx_qty'=>$data['approx_qty'],'load_port'=>$data['load_port'],'discharge_port'=>$data['discharge_port'],'stowage'=>$data['cert_stowage'],'declaration'=>$data['cert_decl'],'insurance'=>$data['cert_insurance'],'cb_regno'=>$data['cert_cbreg'],'bill_lading_qty'=>$data['bill_lading_qty'],'bill_lading_qty1'=>$data['bill_lading_qty1'],'bill_lading_qty2'=>$data['bill_lading_qty2'],'bill_lading_unit'=>$data['bill_lading_unit'],'bill_lading_unit1'=>$data['bill_lading_unit1'],'bill_lading_unit2'=>$data['bill_lading_unit2'],'bill_lading_numdt'=>$data['bill_lading_namedt'],'bill_lading_numdt1'=>$data['bill_lading_namedt1'],'bill_lading_numdt2'=>$data['bill_lading_namedt2'],'packaging'=>$data['packaging'],'total_net_weight'=>$data['total_net_weight'],'status'=>'Open','invoice_curr_bal'=>@$invoice_curr_bal,'check_specs'=>@$data['wt_specs'],'check_params'=>@$data['wt_params'],'para_check1'=>@$data['para1_check'],'para_title1'=>@$data['para1_title'],'para_text1'=>@$data['cert_para1'],'para_check2'=>@$data['para2_check'],'para_title2'=>@$data['para2_title'],'para_text2'=>@$data['cert_para2'],'para_check3'=>@$data['para3_check'],'para_title3'=>@$data['para3_title'],'para_text3'=>@$data['cert_para3'],'para_text4'=>@$data['cert_para4'],'para_check4'=>@$data['para4_check'],'para_title4'=>@$data['para4_title'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'op_year'=>@$_SESSION['operatingyear']);  
         //,'para_check4'=>@$data['para4_check'],'para_title4'=>@$data['para4_title']
        //print_r($result);exit;
        $this->db->insert('agrimin_weight_quality_certificate_master',$result);
        return $this->db->insert_id();

    }

public function addWQCertDetails($data){
          //print_r($data);exit;
          $j=0; 
          //$work_prefix_arr = array(); 
          for ($x =1; $x <= 3; $x++) {
          if (isset($data['wcert_params_'.$x])) {
            if (count(array_filter($data['wcert_params_'.$x]))>0) {
                #echo count(array_filter($data['qcert_spec_'.$x]));
                for ($j=0; $j < count(array_filter($data['wcert_params_'.$x])); $j++) {
                     #echo 'qcert_spec_'.'=='.$x."===".$j;

                     $result = array('certificate_no'=>$data['certificate_no'],'param_name'=>@$data['wcert_params_'.$x][$j],'specification'=>@$data['wcert_specs_'.$x][$j],'results'=>@$data['wcert_results_'.$x][$j],'prefix'=>$j+1); 

                     $this->db->insert('agrimin_weight_quality_certificate_details',$result); 
                }

            }
           } 
         }
        //print_r($result);exit;   
        return @$result;

    }

    function getWQCertificateEditdata($params){
        $querystring =  "SELECT * FROM agrimin_weight_quality_certificate_master where id = '".$params."'";
        #echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getWQCertificateDetailsdataBySpec($params){ 
            $querystring =  'SELECT * FROM agrimin_weight_quality_certificate_details WHERE certificate_no = '.$params.' order by prefix';
            $queryforpubid = $this->db->query($querystring);
            $result = $queryforpubid->result_array();
            //print_r($result);exit;

            return @$result;
     }

     public function updateEditWQCertData($data){
        //print_r($data);exit;

        $invoice_curr_bal = $data['invoice_curr_bal'] - @$data['invtotitems_quantity'];

        if($data['para1_check']==0) { $data['para1_title'] = '';$data['cert_para1'] = '';  }
        if($data['para2_check']==0) { $data['para2_title'] = '';$data['cert_para2'] = '';  }
        if($data['para3_check']==0) { $data['para3_title'] = '';$data['cert_para3'] = '';  }
        if($data['para4_check']==0) { $data['para4_title'] = '';$data['cert_para4'] = '';  }

        $result = array('file_date'=>$data['loading_date'],'client_id'=>@$data['invoice_date'],'certificate_type'=>@$data['certificate_type'],'certificate_date'=>$data['cert_date'],'notify'=>$data['cert_notify'],'shipper'=>$data['cert_shipper'],'consignee'=>$data['cert_consignee'],'scope_work'=>@$data['cert_goods'],'warehouse'=>@$data['voyage_no'],'vessel_name'=>@$data['cert_vessel'],'approx_qty'=>$data['approx_qty'],'load_port'=>$data['load_port'],'discharge_port'=>$data['discharge_port'],'stowage'=>$data['cert_stowage'],'declaration'=>$data['cert_decl'],'insurance'=>$data['cert_insurance'],'cb_regno'=>$data['cert_cbreg'],'bill_lading_qty'=>$data['bill_lading_qty'],'bill_lading_qty1'=>$data['bill_lading_qty1'],'bill_lading_qty2'=>$data['bill_lading_qty2'],'bill_lading_unit'=>$data['bill_lading_unit'],'bill_lading_unit1'=>$data['bill_lading_unit1'],'bill_lading_unit2'=>$data['bill_lading_unit2'],'bill_lading_numdt'=>$data['bill_lading_namedt'],'bill_lading_numdt1'=>$data['bill_lading_namedt1'],'bill_lading_numdt2'=>$data['bill_lading_namedt2'],'packaging'=>$data['packaging'],'total_net_weight'=>$data['total_net_weight'],'status'=>'Open','invoice_curr_bal'=>@$invoice_curr_bal,'check_specs'=>@$data['wt_specs'],'check_params'=>@$data['wt_params'],'para_check1'=>@$data['para1_check'],'para_title1'=>@$data['para1_title'],'para_text1'=>@$data['cert_para1'],'para_check2'=>@$data['para2_check'],'para_title2'=>@$data['para2_title'],'para_text2'=>@$data['cert_para2'],'para_check3'=>@$data['para3_check'],'para_title3'=>@$data['para3_title'],'para_text3'=>@$data['cert_para3'],'para_text4'=>@$data['cert_para4'],'para_check4'=>@$data['para4_check'],'para_title4'=>@$data['para4_title'],'ins_pg_break1'=>@$data['para_ins_pg_break1'],'ins_pg_break2'=>@$data['para_ins_pg_break2'],'ins_pg_break3'=>@$data['para_ins_pg_break3'],'ins_pg_break4'=>@$data['para_ins_pg_break4'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
        //,'para_check4'=>@$data['para4_check'],'para_title4'=>@$data['para4_title']
        //print_r($result);exit;
        $this->db->where('id', $data['certificate_no']);
        $this->db->limit(1);
        $this->db->update('agrimin_weight_quality_certificate_master',$result);
      
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    public function updateEditWQCertDetails($data){
          //print_r($data);exit;
          $params = $data['certificate_no'];
          #echo $querystring;exit;
          $querystring = "DELETE FROM agrimin_weight_quality_certificate_details where certificate_no = '".$params."'";
          #echo $querystring;exit;
          $queryforpubid = $this->db->query($querystring);

          $j=0; 
          //$work_prefix_arr = array(); 
          for ($x =1; $x <= 3; $x++) {
          if (isset($data['wcert_params_'.$x])) {
            if (count(array_filter($data['wcert_params_'.$x]))>0) {
                #echo count(array_filter($data['qcert_spec_'.$x]));
                for ($j=0; $j < count(array_filter($data['wcert_params_'.$x])); $j++) {
                     #echo 'qcert_spec_'.'=='.$x."===".$j;

                     $result = array('certificate_no'=>$data['certificate_no'],'param_name'=>@$data['wcert_params_'.$x][$j],'specification'=>@$data['wcert_specs_'.$x][$j],'results'=>@$data['wcert_results_'.$x][$j],'prefix'=>$j+1,'ins_pg_break'=>@$data['ins_pg_break']); 

                     $this->db->insert('agrimin_weight_quality_certificate_details',$result); 
                }

            }
           } 
         }
        //print_r($result);exit;   
        return @$result;

    }

    function getWQCertIdByBranch() { 

        $querystring = 'SELECT certificate_id,certificate_no FROM agrimin_weight_quality_certificate_master awqcm Where awqcm.user_comp_id = "'.$_SESSION['comp_id'].'" and awqcm.user_branch_id = "'.$_SESSION['branch_id'].'" and awqcm.op_year = "'.$_SESSION['operatingyear'].'" Order By certificate_id desc limit 1';

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function updateWQCertId($data){
      
      $result = array('certificate_no'=>$data['certificate_no'],'certificate_id'=>$data['certificate_id']);
      
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('agrimin_weight_quality_certificate_master',$result);

      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   function getCertificateIdMultiByBranch($cert_id) { 

        $querystring = 'SELECT certificate_id,certificate_no,invoice_curr_bal FROM agrimin_weight_quality_certificate_master awqcm Where awqcm.user_comp_id = "'.$_SESSION['comp_id'].'" and awqcm.user_branch_id = "'.$_SESSION['branch_id'].'" and awqcm.op_year = "'.$_SESSION['operatingyear'].'" and awqcm.certificate_id = "'.$cert_id.'" and awqcm.certificate_type = "Final"  Order By id desc limit 1';

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCertificateIdMultiByBranchNew($file_id) { 

        $querystring = 'SELECT certificate_id,certificate_no,invoice_curr_bal FROM agrimin_weight_quality_certificate_master awqcm Where awqcm.user_comp_id = "'.$_SESSION['comp_id'].'" and awqcm.user_branch_id = "'.$_SESSION['branch_id'].'" and awqcm.op_year = "'.$_SESSION['operatingyear'].'" and awqcm.file_id = "'.$file_id.'" and awqcm.certificate_type = "Final"  Order By id desc limit 1';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getWCertificateDetailsdataBySpec($params){ 
            $querystring =  'SELECT * FROM agrimin_weight_quality_certificate_details WHERE certificate_no = '.$params.' order by prefix';
            $queryforpubid = $this->db->query($querystring);
            $result = $queryforpubid->result_array();
            //print_r($result);exit;

            return @$result;
     } 


  
}

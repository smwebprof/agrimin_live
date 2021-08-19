<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_unit_master'; 
    } 

    function getAllQCertificatedata(){ 
        // aft.status = 'Completed' and 
        $querystring =  "SELECT aft.file_no,aft.id,aft.file_no_type,aqcm.certificate_no,aqcm.certificate_date FROM agrimin_fileregister_transaction aft left join agrimin_quality_certificate_master aqcm ON aqcm.file_id=aft.id WHERE aft.user_comp_id =  '".$_SESSION['comp_id']."' and aft.user_branch_id = '".$_SESSION['branch_id']."' and aft.is_active = 1 Order by aft.id desc";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getQCertificatedata($params){ 

        $querystring =  'SELECT aft.*,acm.id client_id,acm.client_name,acm.address,acm.vat_no,acm.zip_pin_code,acnt.name country,ast.name state,act.name city,acnt.id countryid,ast.id stateid,act.id cityid,aft.vessel_name,aft.voyage_no,acgm.name cargo_group_name,accm.commodity_name,apm.paking_name,aft.packing_desc,aft.approx_qty,aunm.unit_name,asi.description,aft.attendance_placed,aft.origin,aft.load_port,aft.discharge_port,afom.name options_name FROM agrimin_fileregister_transaction aft left join agrimin_client_master acm ON acm.id=aft.client_id left join agrimin_cargo_master accm ON accm.id=aft.cargo_id left join agrimin_cargo_group_master acgm ON acgm.id=aft.cargo_group_id left join agrimin_packing_master apm ON apm.id=aft.packing_id left join agrimin_unit_master aunm ON aunm.id=aft.approx_unit left join agrimin_special_instruction asi ON asi.id=aft.special_instruction left join agrimin_file_options_master afom ON afom.id=aft.file_sub_type_id left join agrimin_countries acnt ON acnt.id=acm.country_id left join agrimin_states ast ON ast.id=acm.state_id left join agrimin_cities act ON act.id=acm.city_id Where aft.is_active = 1 and aft.id = '.$params.' order by aft.id desc';
        #echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getQCertificateEditdata($params){
        $querystring =  "SELECT * FROM agrimin_quality_certificate_master where id = '".$params."'";
        #echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getQCertFileData($params){
        $querystring =  "SELECT * FROM agrimin_quality_certificate_master where file_id = '".$params."'";
        #echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        //print_r($result);exit;
        return @$result[0];
    }

    function getQCertificateHolds($params){
        $querystring =  "SELECT distinct(hold_no) FROM agrimin_quality_certificate_details where certificate_no = '".$params."'";
        #echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }  

    function getQCertificateViewdata($params){
        $querystring =  "SELECT aqcm.*,aeum1.first_name fname,aeum1.last_name lname,aeum2.first_name ename,aeum2.last_name elname FROM agrimin_quality_certificate_master aqcm left join agrimin_employee_users_master aeum1 ON aeum1.id=aqcm.entry_user_id left join agrimin_employee_users_master aeum2 ON aeum2.id=aqcm.modify_user_id where aqcm.id = '".$params."'";
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getQCertificateDetailsdata($params){ 

        $querystring =  'SELECT * FROM agrimin_quality_certificate_details WHERE certificate_no = '.$params.' order by id';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
     }

     function getQCertificateDetailsdataBySpec($params){ 
            $querystring =  'SELECT * FROM agrimin_quality_certificate_details WHERE certificate_no = '.$params['id'].' and hold_no != "" order by id limit 1';
            $queryforpubid = $this->db->query($querystring);
            $result = $queryforpubid->result_array();
            //print_r($result);exit;
            if (count($result)>0) {
                if ($params['hold_id']) {
                    $querystring =  'SELECT * FROM agrimin_quality_certificate_details WHERE certificate_no = '.$params['id'].' and hold_no = "'.$params['hold_id'].'" order by id';
                    $queryforpubid = $this->db->query($querystring);

                    $result = $queryforpubid->result_array();

                    foreach ($result as $rows) {
                        $hold_arr[$rows['spec_id']][$rows['prefix']] = $rows;
                    }
                    return @$hold_arr; 

                } else { 
                    $querystring =  'SELECT * FROM agrimin_quality_certificate_details WHERE certificate_no = '.$params['id'].' and hold_no = "Hold 1" order by id';
                    $queryforpubid = $this->db->query($querystring);

                    $result = $queryforpubid->result_array();

                    foreach ($result as $rows) {
                        $hold_arr[$rows['spec_id']][$rows['prefix']] = $rows;
                    } 
                    return @$hold_arr;
                }    
            } else { 
                $querystring1 =  'SELECT * FROM agrimin_quality_certificate_details WHERE certificate_no = '.$params['id'].' order by id';
                $queryforpubid1 = $this->db->query($querystring1);

                $result1 = $queryforpubid1->result_array();
                //print_r($result1);exit;
                foreach ($result1 as $rows) {
                    $hold_arr[$rows['spec_id']][$rows['prefix']] = $rows;
                } 

                return @$hold_arr;
            }    



     }   

     function getQCertificateDetailsdataBySpec123($params){ 

        if ($params['hold_id']) {
            $querystring =  'SELECT * FROM agrimin_quality_certificate_details WHERE certificate_no = '.$params['id'].' and hold_no = "'.$params['hold_id'].'" order by id';
            $queryforpubid = $this->db->query($querystring);

            $result = $queryforpubid->result_array();

            if (count($result)>0) {
                foreach ($result as $rows) {
                    $hold_arr[$rows['spec_id']][$rows['prefix']] = $rows;
                } 
                //print_r($hold_arr);exit;
            } else {
                $querystring1 =  'SELECT * FROM agrimin_quality_certificate_details WHERE certificate_no = '.$params['id'].' order by id';
                $queryforpubid1 = $this->db->query($querystring1);

                $result1 = $queryforpubid1->result_array();
                //print_r($result1);exit;
                foreach ($result1 as $rows) {
                    $hold_arr[$rows['spec_id']][$rows['prefix']] = $rows;
                } 
                //print_r($hold_arr);exit;
            }

            return @$hold_arr;

        } else {
                $querystring1 =  'SELECT * FROM agrimin_quality_certificate_details WHERE certificate_no = '.$params['id'].' order by id';
                $queryforpubid1 = $this->db->query($querystring1);

                $result1 = $queryforpubid1->result_array();
                //print_r($result1);exit;
                foreach ($result1 as $rows) {
                    $hold_arr[$rows['spec_id']][$rows['prefix']] = $rows;
                } 

                return @$hold_arr;

        }

            //print_r($result);exit;
            /*if (count($result)>0) {
                foreach ($result as $rows) {
                    $hold_arr[$rows['spec_id']][$rows['prefix']] = $rows;
                } 
                //print_r($hold_arr);exit;
            } else {
                $querystring1 =  'SELECT * FROM agrimin_quality_certificate_details WHERE certificate_no = '.$params['id'].' order by id';
                $queryforpubid1 = $this->db->query($querystring1);

                $result1 = $queryforpubid1->result_array();
                //print_r($result1);exit;
                foreach ($result1 as $rows) {
                    $hold_arr[$rows['spec_id']][$rows['prefix']] = $rows;
                } 
                //print_r($hold_arr);exit;
            }*/
        return $hold_arr;
     }


    function getQCertificateDetailsdataPdf($params){ 
            $querystring =  'SELECT * FROM agrimin_quality_certificate_details WHERE certificate_no = '.@$params.' and hold_no != "" order by id limit 1';
            $queryforpubid = $this->db->query($querystring);
            $result = $queryforpubid->result_array();
            if (count($result)>0) { 
                $querystring1 =  'SELECT aqcd.*,alsg.name spec_name,alm.method_name,aum.unit_name FROM agrimin_quality_certificate_details aqcd left join agrimin_lab_specification_group alsg ON aqcd.specification= alsg.id left join agrimin_lab_methods alm ON aqcd.method = alm.id left join agrimin_unit_master aum ON aqcd.units = aum.id WHERE aqcd.certificate_no = '.@$params.' order by aqcd.id'; //order by aqcd.id
                $queryforpubid1 = $this->db->query($querystring1);

                $result1 = $queryforpubid1->result_array();
                //print_r($result1);exit;
                foreach ($result1 as $rows) {
                    $hold_arr[$rows['hold_no']][$rows['spec_id']][$rows['prefix']] = $rows;
                } 

                return @$hold_arr;

            } else { 
               $querystring1 =  'SELECT aqcd.*,alsg.name spec_name,alm.method_name,aum.unit_name FROM agrimin_quality_certificate_details aqcd left join agrimin_lab_specification_group alsg ON aqcd.specification= alsg.id left join agrimin_lab_methods alm ON aqcd.method = alm.id left join agrimin_unit_master aum ON aqcd.units = aum.id WHERE aqcd.certificate_no = '.@$params.' order by spec_name'; //order by aqcd.id
                $queryforpubid1 = $this->db->query($querystring1);

                $result1 = $queryforpubid1->result_array();
                //print_r($result1);exit;
                foreach ($result1 as $rows) {
                    $hold_arr[$rows['spec_id']][$rows['prefix']] = $rows;
                } 

                return @$hold_arr; 
            }    

    }    

    function editQCertificateDetailsdataBySpec($params){
                $querystring1 =  'SELECT * FROM agrimin_quality_certificate_details WHERE certificate_no = '.$params['id'].' order by id';
                $queryforpubid1 = $this->db->query($querystring1);

                $result = $queryforpubid1->result_array();
                //print_r($result);exit;
                foreach ($result as $rows) {
                    if (empty($rows['hold_no'])) { $hold_no = 'hold_no'; } else { $hold_no = $rows['hold_no']; }
                    $hold_arr[$rows['certificate_no']][$hold_no][$rows['spec_id']][$rows['prefix']] = $rows;
                    #$hold_arr[$rows['spec_id']][$rows['prefix']] = $rows;
                }
                //print_r($hold_arr);exit;
                return $hold_arr;
    }

    function getlabspecificationgroup(){ 

        $querystring =  "SELECT * FROM agrimin_lab_specification_group WHERE status = 1 Order by id";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
    }

    function getlabminByBranchId(){ 

        $querystring =  "SELECT id,min FROM agrimin_lab_parameters WHERE is_active = 1 and branch_id = '".$_SESSION['branch_id']."' and min != '' group by min Order by id";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getlabmaxByBranchId(){ 

        $querystring =  "SELECT id,max FROM agrimin_lab_parameters WHERE is_active = 1 and branch_id = '".$_SESSION['branch_id']."' and max != '' group by max Order by id";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getlabmethodByBranchId(){ 

        $querystring =  "SELECT id,method_name FROM agrimin_lab_methods WHERE is_active = 1 and country_branch_id = '".$_SESSION['branch_id']."' and method_name != '' Order by id";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function addQCertData($data){

        if($data['para1_check']==0) { $data['para1_title'] = '';$data['cert_para1'] = '';  }
        if($data['para2_check']==0) { $data['para2_title'] = '';$data['cert_para2'] = '';  }
        if($data['para3_check']==0) { $data['para3_title'] = '';$data['cert_para3'] = '';  }
        if($data['para4_check']==0) { $data['para4_title'] = '';$data['cert_para4'] = '';  }

        $result = array('file_id'=>$data['file_id'],'file_no'=>$data['file_no'],'file_no_type'=>$data['file_no_type'],'file_date'=>$data['loading_date'],'client_id'=>@$data['invoice_date'],'certificate_type'=>@$data['certificate_type'],'certificate_date'=>$data['cert_date'],'notify'=>$data['cert_notify'],'shipper'=>$data['cert_shipper'],'consignee'=>$data['cert_consignee'],'commodity'=>@$data['cert_goods'],'warehouse'=>@$data['voyage_no'],'vessel_name'=>@$data['cert_vessel'],'approx_qty'=>$data['approx_qty'],'load_port'=>$data['load_port'],'discharge_port'=>$data['discharge_port'],'stowage'=>$data['cert_stowage'],'declaration'=>$data['cert_decl'],'insurance'=>$data['cert_insurance'],'cb_regno'=>$data['cert_cbreg'],'bill_lading_qty'=>$data['bill_lading_qty'],'status'=>'Open','check_min'=>@$data['check_min'],'check_max'=>@$data['check_max'],'check_specs'=>@$data['check_specs'],'para_check1'=>@$data['para1_check'],'para_title1'=>@$data['para1_title'],'para_text1'=>@$data['cert_para1'],'para_check2'=>@$data['para2_check'],'para_title2'=>@$data['para2_title'],'para_text2'=>@$data['cert_para2'],'para_check3'=>@$data['para3_check'],'para_title3'=>@$data['para3_title'],'para_text3'=>@$data['cert_para3'],'para_check4'=>@$data['para4_check'],'para_title4'=>@$data['para4_title'],'para_text4'=>@$data['cert_para4'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'op_year'=>@$_SESSION['operatingyear']);
        //print_r($result);exit;
        $this->db->insert('agrimin_quality_certificate_master',$result);
        return $this->db->insert_id();

    }

    public function addQCertDetails($data){
          //print_r($data);exit;
          $j=0; 
          //$work_prefix_arr = array(); 
          for ($x =1; $x <= 10; $x++) {
          if (isset($data['qcert_spec_'.$x])) {
            if (count(array_filter($data['qcert_spec_'.$x]))>0) {
                #echo count(array_filter($data['qcert_spec_'.$x]));
                for ($j=0; $j < count(array_filter($data['qcert_spec_'.$x])); $j++) {
                     #echo 'qcert_spec_'.'=='.$x."===".$j;
                    if (@$data['check_specs']==1) { $qcert_specs = ''; } else { $qcert_specs = @$data['qcert_spec_head_'.$x]; }

                     if (@$data['check_min']==1) { $qcert_labmin = ''; } else { $qcert_labmin = @$data['qcert_labmin_'.$x][$j]; }

                     if (@$data['check_max']==1) { $qcert_labmax = ''; } else { $qcert_labmax = @$data['qcert_labmax_'.$x][$j]; }


                     #$result = array('certificate_no'=>$data['certificate_no'],'hold_no'=>@$data['hold_type'],'spec_id'=>@$data['qcert_spec_id_'.$x],'specification_head'=>@$data['qcert_spec_head_'.$x],'specification'=>@$data['qcert_spec_'.$x][$j],'min_value'=>@$data['qcert_labmin_'.$x][$j],'max_value'=>@$data['qcert_labmax_'.$x][$j],'units'=>@$data['qcert_labunits_'.$x][$j],'method'=>@$data['qcert_labmethods_'.$x][$j],'results'=>@$data['qcert_results_'.$x][$j],'prefix'=>$j+1);  

                     $result = array('certificate_no'=>$data['certificate_no'],'hold_no'=>@$data['hold_type'],'spec_id'=>@$data['qcert_spec_id_'.$x],'specification_head'=>@$qcert_specs,'specification'=>@$data['qcert_spec_'.$x][$j],'min_value'=>@$qcert_labmin,'max_value'=>@$qcert_labmax,'units'=>@$data['qcert_labunits_'.$x][$j],'method'=>@$data['qcert_labmethods_'.$x][$j],'results'=>@$data['qcert_results_'.$x][$j],'prefix'=>$j+1); 

                     $this->db->insert('agrimin_quality_certificate_details',$result); 
                }

            }
           } 
         }
        //print_r($result);exit;   
        return $result;

    }

    function getQCertificatedetails($data){ 

        $querystring =  "SELECT * FROM agrimin_quality_certificate_master WHERE file_id in ($data)";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        foreach ($result as $rows) {
            $cert_data[$rows['file_id']]['cert_id'] = $rows['id'];
            $cert_data[$rows['file_id']]['cert_no'] = $rows['certificate_no'];
            $cert_data[$rows['file_id']]['cert_date'] = $rows['certificate_date'];
            $cert_data[$rows['file_id']]['status'] = $rows['certificate_type'];
        }
        //print_r($cert_data);exit;

        return @$cert_data;

    }

    public function updateEditQCertData($data){
        //print_r($data);exit;

        if($data['para1_check']==0) { $data['para1_title'] = '';$data['cert_para1'] = '';  }
        if($data['para2_check']==0) { $data['para2_title'] = '';$data['cert_para2'] = '';  }
        if($data['para3_check']==0) { $data['para3_title'] = '';$data['cert_para3'] = '';  }
        if($data['para4_check']==0) { $data['para4_title'] = '';$data['cert_para4'] = '';  }

        /*if (!empty(@$data['para_ins_pg_break1'])) { $ins_pg_break1 = str_replace("(", "<", @$data['para_ins_pg_break1']); }
        if (!empty(@$data['para_ins_pg_break1'])) { $ins_pg_break1 = str_replace(")", ">", $ins_pg_break1); }

        if (!empty(@$data['para_ins_pg_break2'])) { $ins_pg_break2 = str_replace("(", "<", @$data['para_ins_pg_break2']); }
        if (!empty(@$data['para_ins_pg_break2'])) { $ins_pg_break2 = str_replace(")", ">", $ins_pg_break2); }

        if (!empty(@$data['para_ins_pg_break3'])) { $ins_pg_break3 = str_replace("(", "<", @$data['para_ins_pg_break3']); }
        if (!empty(@$data['para_ins_pg_break3'])) { $ins_pg_break3 = str_replace(")", ">", $ins_pg_break3); }

        if (!empty(@$data['para_ins_pg_break4'])) { $ins_pg_break4 = str_replace("(", "<", @$data['para_ins_pg_break4']); }
        if (!empty(@$data['para_ins_pg_break4'])) { $ins_pg_break4 = str_replace(")", ">", $ins_pg_break4); }*/

        $result = array('file_date'=>$data['loading_date'],'client_id'=>@$data['invoice_date'],'certificate_type'=>@$data['certificate_type'],'certificate_date'=>$data['cert_date'],'notify'=>$data['cert_notify'],'shipper'=>$data['cert_shipper'],'consignee'=>$data['cert_consignee'],'scope_work'=>@$data['cert_goods'],'warehouse'=>@$data['voyage_no'],'vessel_name'=>@$data['cert_vessel'],'approx_qty'=>$data['approx_qty'],'load_port'=>$data['load_port'],'discharge_port'=>$data['discharge_port'],'stowage'=>$data['cert_stowage'],'declaration'=>$data['cert_decl'],'insurance'=>$data['cert_insurance'],'cb_regno'=>$data['cert_cbreg'],'bill_lading_qty'=>$data['bill_lading_qty'],'status'=>'Open','para_check1'=>@$data['para1_check'],'para_title1'=>@$data['para1_title'],'para_text1'=>@$data['cert_para1'],'para_check2'=>@$data['para2_check'],'para_title2'=>@$data['para2_title'],'para_text2'=>@$data['cert_para2'],'para_check3'=>@$data['para3_check'],'para_title3'=>@$data['para3_title'],'para_text3'=>@$data['cert_para3'],'para_check4'=>@$data['para4_check'],'para_title4'=>@$data['para4_title'],'para_text4'=>@$data['cert_para4'],'ins_pg_break1'=>@$data['para_ins_pg_break1'],'ins_pg_break2'=>@$data['para_ins_pg_break2'],'ins_pg_break3'=>@$data['para_ins_pg_break3'],'ins_pg_break4'=>@$data['para_ins_pg_break4'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
        //print_r($result);exit;
        $this->db->where('id', $data['certificate_no']);
        $this->db->limit(1);
        $this->db->update('agrimin_quality_certificate_master',$result);
      
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    public function updateEditQCertDetails($data){
          //print_r($data);exit;
          #echo $data['check_min'];exit;  
          $params = $data['certificate_no'];
          if (!empty($data['hold_type'])){
            $querystring = "DELETE FROM agrimin_quality_certificate_details where certificate_no = '".$params."' and hold_no = '".$data['hold_type']."'";
          } else {
            $querystring = "DELETE FROM agrimin_quality_certificate_details where certificate_no = '".$params."'";
          }
          #echo $querystring;exit;
          $queryforpubid = $this->db->query($querystring);

          $j=0; 
          //$work_prefix_arr = array(); 
          for ($x =1; $x <= 10; $x++) {

            if (isset($data['qcert_spec_'.$x])) {
            if (count(array_filter($data['qcert_spec_'.$x]))>0) {
                #echo count(array_filter($data['qcert_spec_'.$x]));
                for ($j=0; $j < count(array_filter($data['qcert_spec_'.$x])); $j++) {
                     #echo 'qcert_spec_'.'=='.$x."===".$j;

                    if (@$data['check_specs']==1) { $qcert_specs = 0; } else { $qcert_specs = @$data['qcert_spec_head_'.$x]; }

                     if (@$data['check_min']==1) { $qcert_labmin = 0; } else { $qcert_labmin = @$data['qcert_labmin_'.$x][$j]; }

                     if (@$data['check_max']==1) { $qcert_labmax = 0; } else { $qcert_labmax = @$data['qcert_labmax_'.$x][$j]; }

                     /*if (!empty(@$data['ins_pg_break'])) { $ins_pg_break = str_replace("(", "<", @$data['ins_pg_break']); }
                     if (!empty(@$data['ins_pg_break'])) { $ins_pg_break = str_replace(")", ">", $ins_pg_break); }*/

                     $result = array('certificate_no'=>@$data['certificate_no'],'hold_no'=>@$data['hold_type'],'spec_id'=>@$data['qcert_spec_id_'.$x],'specification_head'=>@$qcert_specs,'specification'=>@$data['qcert_spec_'.$x][$j],'min_value'=>@$qcert_labmin,'max_value'=>@$qcert_labmax,'units'=>@$data['qcert_labunits_'.$x][$j],'method'=>@$data['qcert_labmethods_'.$x][$j],'results'=>@$data['qcert_results_'.$x][$j],'prefix'=>$j+1,'ins_pg_break'=>@$data['ins_pg_break']);  
                     #print_r($result);exit;
                     $this->db->insert('agrimin_quality_certificate_details',$result); 
                }

            }
            }
         }
        //print_r($result);exit;   
        return $result;

    }

    function getQCertIdByBranch() { 

        $querystring = 'SELECT certificate_id FROM agrimin_quality_certificate_master aqcm Where aqcm.user_comp_id = "'.$_SESSION['comp_id'].'" and aqcm.user_branch_id = "'.$_SESSION['branch_id'].'" and aqcm.op_year = "'.$_SESSION['operatingyear'].'" Order By certificate_id desc limit 1';

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function updateQCertId($data){
      
      $result = array('certificate_no'=>$data['certificate_no'],'certificate_id'=>$data['certificate_id']);
      
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('agrimin_quality_certificate_master',$result);

      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   public function editFileCargoDetailsByIdMult($params){  //$id

        #$querystring = "SELECT * FROM agrimin_fileregister_transaction Where id =".$params." order by id";
        $querystring =  'SELECT acm.commodity_name,aum.unit_name,apm.paking_name,acgm.name cargo_group_name,aftcd.*,CONCAT(aftcd.approx_qty," ", aum.unit_name) approx_qty_unit  from agrimin_fileregister_transaction_cargo_details aftcd left join agrimin_cargo_master acm ON acm.id=aftcd.cargo_id left join agrimin_unit_master aum ON aum.id=aftcd.approx_unit left join agrimin_packing_master apm ON apm.id=aftcd.packing_id  left join agrimin_cargo_group_master acgm ON aftcd.cargo_group_id=acgm.id Where fileregister_transaction_id = '.$params.' order by aftcd.id';
        #echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

   
}

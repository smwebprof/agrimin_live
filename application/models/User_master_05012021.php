<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_user_master'; 
    } 

    function getRows($params){ 
        #print_r($params);exit;
  
        #$querystring = "SELECT * FROM agrimin_users_master WHERE email = '".$params['useremail']."' and password = '".$params['password']."'";

        $querystring = "SELECT * FROM agrimin_employee_users_master WHERE office_email = '".$params['useremail']."' and password = '".$params['password']."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getRowsByComp($params){ 

        $querystring = "SELECT * FROM agrimin_employee_users_master WHERE office_email = '".$params['useremail']."' and password = '".$params['password']."'  and company_id = '".$params['companyname']."'  and branch_id = '".$params['branchname']."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllrows(){ 
        #print_r($params);exit;
  
        #$querystring = "SELECT * FROM agrimin_users_master WHERE email = '".$params['useremail']."' and password = '".$params['password']."'";

        $querystring = "SELECT * FROM agrimin_employee_users_master Where is_active = 1 and id!= 11 order by id desc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getFilePass($params){ 
        #print_r($params);exit;
  
        #$querystring = "SELECT * FROM agrimin_users_master WHERE password = '".$params['filepassword']."'";
        $querystring = "SELECT * FROM agrimin_fileregister_transaction WHERE file_no = '".$params['userfileno']."' and file_password = '".$params['filepassword']."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function addUsers($data){
    if(empty($data))
      return FALSE;

    $result = array('company_id'=>$data['user_company'],'branch_id'=>$data['branch_name'],'first_name'=>$data['first_name'],'middle_name'=>$data['middle_name'],'last_name'=>$data['last_name'],'current_address'=>$data['curr_address'],'permanent_address'=>$data['perm_address'],'birth_date'=>$data['birth_date'],'office_email'=>$data['office_mail'],'personal_email'=>$data['person_mail'],'password'=>$data['user_pass'],'gender'=>$data['user_gender'],'moblie_no'=>$data['mobile_no'],'pan_no_tax_id'=>$data['pan_no'],'uidaino_aadhar_card'=>$data['uidaino'],'employee_staff'=>$data['employee_staff'],'city_id'=>$data['company_city'],'state_id'=>$data['company_state'],'country_id'=>$data['company_country'],'country_code'=>$data['country_code'],'emp_designation_id'=>$data['designation_id'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);
    //print_r($result);exit;
    $this->db->insert('agrimin_employee_users_master',$result);
    return $this->db->insert_id();

   }

   public function addUserdetails($data){
    if(empty($data))
      return FALSE;
    $effective_from = date('Y-m-d',strtotime($data['effective_from']));

    $result = array('emp_user_master_id'=>$data['user_data'],'qualification_type_id'=>$data['qualification_type_id'],'marital_status'=>$data['marital_status'],'nationality_id'=>$data['nationality_id'],'nominee_name'=>$data['nominee_name'],'department_id'=>$data['department_id'],'effective_from'=>$effective_from,'leave_approver_reporting_id'=>$data['leave_approver_reporting_id'],'company_bank_account_name'=>$data['company_bank_account_name'],'company_bank_account_no'=>$data['company_bank_account_no'],'company_bank_account_type'=>$data['company_bank_account_type'],'company_bank_account_address'=>$data['company_bank_account_address'],'personal_bank_account_name'=>$data['personal_bank_account_name'],'personal_bank_account_address'=>$data['personal_bank_account_address'],'personal_bank_account_no'=>$data['personal_bank_account_no'],'personal_bank_account_type'=>$data['personal_bank_account_type'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);
    #print_r($result);exit;
    $this->db->insert('agrimin_employee_users_detail',$result);
    return $this->db->insert_id();

   }

   function getUserbyId($params){ 
        
  
        $querystring = "SELECT * FROM agrimin_employee_users_master WHERE id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getUserInfobyId($params){ 
        
  
        $querystring = "SELECT aeum.*,acm.name company_name,abm.branch_name,acnt.name country,ast.name state,act.name city,asm.designation_name  FROM agrimin_employee_users_master aeum left join agrimin_company_master acm On aeum.company_id = acm.id left join agrimin_branch_master abm On aeum.branch_id = abm.id left join agrimin_countries acnt ON acnt.id=aeum.country_id left join agrimin_states ast ON ast.id=aeum.state_id left join agrimin_cities act ON act.id=aeum.city_id left join agrimin_designation_master asm ON asm.id=aeum.emp_designation_id WHERE aeum.id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getUserDetailsbyId($params){ 
        
  
        $querystring = "SELECT aeud.*,aeum.first_name FROM agrimin_employee_users_detail aeud left join agrimin_employee_users_master aeum On aeum.id = aeud.emp_user_master_id  WHERE aeud.emp_user_master_id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

     function getUserFullDetailsbyId($params){ 
        
  
        $querystring = "SELECT aeud.*,aeum.first_name,aqtm.name qname,acnt.name nationality,adm.name department,aeum1.first_name leave_appr_name FROM agrimin_employee_users_detail aeud left join agrimin_employee_users_master aeum On aeum.id = aeud.emp_user_master_id left join agrimin_qualification_type_master aqtm On aqtm.id = aeud.qualification_type_id left join agrimin_countries acnt ON acnt.id=aeud.nationality_id left join agrimin_department_master adm ON adm.id=aeud.department_id left join agrimin_employee_users_master aeum1 ON aeum1.id=aeud.leave_approver_reporting_id WHERE aeud.emp_user_master_id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    function fetch_users($params){ 
        
  
        $querystring = "SELECT id,first_name,last_name FROM agrimin_employee_users_master WHERE employee_staff = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        foreach($result as $row)
        {
            $output .= '<option value="'.$row['id'].'">'.$row['first_name'].' '.$row['last_name'].'</option>';
        };

        return $output;

    }

    function getUsers(){ 
        
  
        $querystring = "SELECT aeum.*,abm.branch_name FROM agrimin_employee_users_master aeum left join agrimin_branch_master abm On aeum.branch_id = abm.id Where aeum.is_active = 1 and aeum.id not in ('11','12') order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getUsersAll(){ 
        
  
        $querystring = "SELECT aeum.*,abm.branch_name FROM agrimin_employee_users_master aeum left join agrimin_branch_master abm On aeum.branch_id = abm.id Where aeum.is_active = 1 and aeum.id not in ('11','12') and  employee_staff != 'Admin' order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getUsersAllById($params){ 
        
        $params = "(".implode(',',$params).")";
        $querystring = "SELECT * FROM agrimin_employee_users_master WHERE id in  ".$params."";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    function getUsersByBranchid($params){ 
        
  
        $querystring = "SELECT * FROM agrimin_employee_users_master where branch_id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getDepartments(){ 
        
  
        $querystring = "SELECT * FROM agrimin_department_master";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getQualificationtype(){ 
        
  
        $querystring = "SELECT * FROM agrimin_qualification_type_master";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getMainmenus(){ 
        
  
        $querystring = "SELECT * FROM agrimin_menu_master where is_active = 1 and menu_name != 'Masters'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getBranchAccessByUserid($params){

        $querystring = "SELECT auba.*,abm.branch_name FROM agrimin_user_branch_access auba,agrimin_branch_master abm where auba.is_active = 1  and auba.branch_id = abm.id and auba.user_id = '".$params."' order by auba.id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        return $result;
    }    

    function getMainusermenus($params){ 
        
        // for Dashboard OR amm.id = 1 condition added by Shivaji
        #$querystring = "SELECT distinct(amm.id),amm.menu_name,amm.url FROM agrimin_menu_master amm,agrimin_user_access_master aum where amm.is_active = 1 and amm.id = aum.menu_master_id and aum.user_id = '".$params."' OR amm.id = 1 order by amm.id";
        $querystring = "SELECT distinct(amm.id),amm.menu_name,amm.url FROM agrimin_menu_master amm,agrimin_user_access_master aum where amm.is_active = 1  and amm.parent = 1 and amm.id = aum.menu_master_id and aum.user_id = '".$params."' OR amm.id = 1 order by amm.id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        return $result;

    }

     function getMainusermenusParent(){ 
        
        // for Dashboard OR amm.id = 1 condition added by Shivaji
        #$querystring = "SELECT * FROM agrimin_menu_master where is_active = 1 and user_id = '".$params."'";
        $querystring = "SELECT * FROM agrimin_menu_master where parent = '11'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();

        return $result;

    }

    function getSubusermenusParent($params){ 
        
  
        #$querystring = "SELECT * FROM agrimin_submenu_master where is_active = 1 and user_id = '".$params."'";
        $querystring = "SELECT * FROM agrimin_submenu_master asm, agrimin_user_access_master aum where asm.is_active = 1 and asm.id = aum.submenu_master_id and aum.user_id = '1' and aum.menu_master_id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    function getSubmenus(){ 
        
  
        $querystring = "SELECT * FROM agrimin_submenu_master where is_active = 1 order by id"; 
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getSubusermenus($params){ 
        
  
        #$querystring = "SELECT * FROM agrimin_submenu_master where is_active = 1 and user_id = '".$params."'";
        $querystring = "SELECT * FROM agrimin_submenu_master asm, agrimin_user_access_master aum where asm.is_active = 1 and asm.id = aum.submenu_master_id and aum.user_id = '".$params."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


    function getMenusubmenus(){ 
        
  
        $querystring = "SELECT amm.*,asm.* FROM agrimin_menu_master amm left join agrimin_submenu_master asm ON amm.id=asm.menu_master_id Where amm.is_active = 1 Order by amm.id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getSubmenusbyId($params){ 
        
  
        $querystring = "SELECT * FROM agrimin_submenu_master where is_active = 1 and menu_master_id = '".$params."' order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        $output = '';
        foreach($result as $row)
        {
            $id = $row['id'];
            #$output .= '<option value="'.$row['id'].'">'.$row['branch_name'].'</option>';
            /*$output .= '<input type="hidden" name="submenu_id[]" value="'.$id.'"><tr><td>'.$row['submenu_name'].'</td><td><input type="checkbox" id="viewcheckbox_'.$id.'" name="viewcheckbox_'.$id.'"></td><td><input type="checkbox" id="addcheckbox_'.$id.'" name="addcheckbox_'.$id.'"></td><td><input type="checkbox" id="editcheckbox_'.$id.'" name="editcheckbox_'.$id.'"></td><td><input type="checkbox" id="deletecheckbox_'.$id.'" name="deletecheckbox_'.$id.'"></td></tr>';*/

            $output .= '<input type="hidden" name="submenu_id[]" value="'.$id.'"><tr><td>'.$row['submenu_name'].'</td><td><input type="checkbox" id="viewcheckbox_'.$id.'" name="viewcheckbox[]" value="'.$id.'"></td><td><input type="checkbox" id="addcheckbox_'.$id.'" name="addcheckbox[]" value="'.$id.'"></td><td><input type="checkbox" id="editcheckbox_'.$id.'" name="editcheckbox[]" value="'.$id.'"></td><td><input type="checkbox" id="deletecheckbox_'.$id.'" name="deletecheckbox[]" value="'.$id.'"></td></tr>';
        };

        return $output;

    }

    function getSubmenusbyUserId($params){ 
        
  
        #$querystring = "SELECT * FROM agrimin_submenu_master where is_active = 1 and menu_master_id = '".$params['main_menus']."' order by id";
        $querystring = "SELECT asm.*,auam.add_rights,auam.edit_rights,auam.view_rights,auam.delete_rights FROM agrimin_submenu_master asm,agrimin_user_access_master auam where asm.is_active = 1 and asm.menu_master_id = '".$params['main_menus']."' and asm.id = auam.submenu_master_id and auam.user_id = '".$params['user_access_id']."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        $output = '';
        foreach($result as $row)
        {
            $id = $row['id'];
            $add_rights = $row['add_rights'];
            $edit_rights = $row['edit_rights'];
            $view_rights = $row['view_rights'];
            $delete_rights = $row['delete_rights'];

            #$output .= '<option value="'.$row['id'].'">'.$row['branch_name'].'</option>';
            /*$output .= '<input type="hidden" name="submenu_id[]" value="'.$id.'"><tr><td>'.$row['submenu_name'].'</td><td><input type="checkbox" id="viewcheckbox_'.$id.'" name="viewcheckbox_'.$id.'"></td><td><input type="checkbox" id="addcheckbox_'.$id.'" name="addcheckbox_'.$id.'"></td><td><input type="checkbox" id="editcheckbox_'.$id.'" name="editcheckbox_'.$id.'"></td><td><input type="checkbox" id="deletecheckbox_'.$id.'" name="deletecheckbox_'.$id.'"></td></tr>';*/

            if ($add_rights==1) { $addcheckbox = '<input type="checkbox" id="addcheckbox_'.$id.'" name="addcheckbox[]" value="'.$id.'" checked>';} else { $addcheckbox = '<input type="checkbox" id="addcheckbox_'.$id.'" name="addcheckbox[]" value="'.$id.'">'; } 
            if ($edit_rights==1) { $editcheckbox = '<input type="checkbox" id="editcheckbox_'.$id.'" name="editcheckbox[]" value="'.$id.'" checked>';} else { $editcheckbox = '<input type="checkbox" id="editcheckbox_'.$id.'" name="editcheckbox[]" value="'.$id.'">';; }
            if ($view_rights==1) { $viewcheckbox = '<input type="checkbox" id="viewcheckbox_'.$id.'" name="viewcheckbox[]" value="'.$id.'" checked>';} else {  $viewcheckbox = '<input type="checkbox" id="viewcheckbox_'.$id.'" name="viewcheckbox[]" value="'.$id.'">'; }
            if ($delete_rights==1) { $deletecheckbox = '<input type="checkbox" id="deletecheckbox_'.$id.'" name="deletecheckbox[]" value="'.$id.'" checked>';} else { $deletecheckbox = '<input type="checkbox" id="deletecheckbox_'.$id.'" name="deletecheckbox[]" value="'.$id.'">'; }

            #$addcheckbox = '<input type="checkbox" id="addcheckbox_'.$id.'" name="addcheckbox[]" value="'.$id.'">';
            #$viewcheckbox = '<input type="checkbox" id="viewcheckbox_'.$id.'" name="viewcheckbox[]" value="'.$id.'">';
            #$editcheckbox = '<input type="checkbox" id="editcheckbox_'.$id.'" name="editcheckbox[]" value="'.$id.'">';
            #$deletecheckbox = '<input type="checkbox" id="deletecheckbox_'.$id.'" name="deletecheckbox[]" value="'.$id.'">';



            /*$output .= '<input type="hidden" name="submenu_id[]" value="'.$id.'"><tr><td>'.$row['submenu_name'].'</td><td><input type="checkbox" id="viewcheckbox_'.$id.'" name="viewcheckbox[]" value="'.$id.'"></td><td><input type="checkbox" id="addcheckbox_'.$id.'" name="addcheckbox[]" value="'.$id.'"></td><td><input type="checkbox" id="editcheckbox_'.$id.'" name="editcheckbox[]" value="'.$id.'"></td><td><input type="checkbox" id="deletecheckbox_'.$id.'" name="deletecheckbox[]" value="'.$id.'"></td></tr>';*/

            $output .= '<input type="hidden" name="submenu_id[]" value="'.$id.'"><tr><td>'.$row['submenu_name'].'</td><td>'.$viewcheckbox.'</td><td>'.$addcheckbox.'</td><td>'.$editcheckbox.'</td><td>'.$deletecheckbox.'</td></tr>';


        };

        return $output;

    }

    function getAccessforUserId($params){ 
        #$querystring = "SELECT asm.*,auam.add_rights,auam.edit_rights,auam.view_rights,auam.delete_rights FROM agrimin_submenu_master asm,agrimin_user_access_master auam where asm.is_active = 1 and asm.menu_master_id = '".$params['main_menus']."' and asm.id = auam.submenu_master_id and auam.user_id = '".$params['user_access_id']."'";
       $querystring = "SELECT auam.add_rights,auam.edit_rights,auam.view_rights,auam.delete_rights from agrimin_user_access_master auam where menu_master_id = '".$params['main_menus']."' and submenu_master_id = '".$params['sub_menus']."' and user_id = '".$params['user_access_id']."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return @$result[0];

    }

    public function addUseraccessmaster($data){
    if(empty($data))
      return FALSE;

    $querystring = "SELECT auam.add_rights,auam.edit_rights,auam.view_rights,auam.delete_rights from agrimin_user_access_master auam where menu_master_id = '".$data['menu_master_id']."' and submenu_master_id = '".$data['submenu_master_id']."' and user_id = '".$data['user_id']."'";
    $queryforpubid = $this->db->query($querystring);
    $result_exists = $queryforpubid->result_array();

        if (empty($result_exists)) {
            $result = array('user_id'=>$data['user_id'],'menu_master_id'=>$data['menu_master_id'],'submenu_master_id'=>$data['submenu_master_id'],'add_rights'=>@$data['add_rights'],'edit_rights'=>@$data['edit_rights'],'view_rights'=>@$data['view_rights'],' delete_rights'=>@$data['delete_rights']);
            //print_r($result);exit;
            $this->db->insert('agrimin_user_access_master',$result);
            return $this->db->insert_id();
        } else {
            return false;
        }
        
   }

   public function updateUseraccessmaster($data){
    if(empty($data))
      return FALSE;

        $result = array('user_id'=>$data['user_id'],'menu_master_id'=>$data['menu_master_id'],'submenu_master_id'=>$data['submenu_master_id'],'add_rights'=>@$data['add_rights'],'edit_rights'=>@$data['edit_rights'],'view_rights'=>@$data['view_rights'],' delete_rights'=>@$data['delete_rights']);
       //print_r($result);exit;
        $this->db->where('user_id', $data['user_id']);
        $this->db->where('menu_master_id', $data['menu_master_id']);
        $this->db->where('submenu_master_id', $data['submenu_master_id']);
        $this->db->limit(1);
        $this->db->update('agrimin_user_access_master',$result);
        #echo $this->db->last_query();exit;
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);


   }

   public function deleteUseraccessmaster($data)
      {
        #print_r($data);exit;  
        $querystring = "DELETE FROM agrimin_user_access_master where menu_master_id = '".$data['menu_master_id']."' and submenu_master_id = '".$data['submenu_master_id']."' and user_id = '".$data['user_id']."'";
        $queryforpubid = $this->db->query($querystring);

        if ($queryforpubid) {
            return TRUE;
        }
        return FALSE;

    }



   public function viewUseraccessmaster(){

    //$querystring = "SELECT aeum.first_name,aeum.last_name,auam.submenu_master_id,auam.add_rights,auam.edit_rights,auam.view_rights,auam.delete_rights,asm.submenu_name,auam.user_id FROM agrimin_user_access_master auam,agrimin_employee_users_master aeum,agrimin_submenu_master asm WHERE auam.user_id != 1 and auam.user_id = aeum.id and asm.id = auam.submenu_master_id group by auam.submenu_master_id"; 

    /*$querystring = "SELECT aeum.first_name,aeum.last_name,auam.submenu_master_id,auam.add_rights,auam.edit_rights,auam.view_rights,auam.delete_rights,asm.submenu_name,auam.user_id,aeum.employee_staff FROM agrimin_user_access_master auam,agrimin_employee_users_master aeum,agrimin_submenu_master asm WHERE auam.user_id != 1 and auam.user_id = aeum.id and asm.id = auam.submenu_master_id group by auam.user_id"; */

       $querystring = "SELECT * from agrimin_employee_users_master";     


        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

   }


   function getUserPass($params){ 
        
  
        #$querystring = "SELECT * FROM agrimin_employee_users_master where id = '".$params['user_id']."' and password = '".$params['current_password']."'";
        $querystring = "SELECT * FROM agrimin_employee_users_master where id = '".$params['user_id']."'"; 
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return @$result[0];

    }

    public function updateUserPass($data){
    if(empty($data))
      return FALSE;

        $result = array('id'=>$data['user_id'],'password'=>$data['new_password']);
       //print_r($result);exit;
        $this->db->where('id', $data['user_id']);
        $this->db->update('agrimin_employee_users_master',$result);
        #echo $this->db->last_query();exit;
        return (($this->db->affected_rows() > 0)?TRUE:FALSE);


   }

   public function updateUserInfo($data)
      {
      
      $result = array('company_id'=>$data['user_company'],'branch_id'=>$data['branch_name'],'first_name'=>$data['first_name'],'middle_name'=>$data['middle_name'],'last_name'=>$data['last_name'],'current_address'=>$data['curr_address'],'permanent_address'=>$data['perm_address'],'birth_date'=>$data['birth_date'],'office_email'=>$data['office_mail'],'personal_email'=>$data['person_mail'],'password'=>@$data['user_pass'],'gender'=>@$data['user_gender'],'moblie_no'=>@$data['mobile_no'],'pan_no_tax_id'=>$data['pan_no'],'uidaino_aadhar_card'=>$data['uidaino'],'employee_staff'=>$data['employee_staff'],'city_id'=>$data['company_city'],'state_id'=>$data['company_state'],'country_id'=>$data['company_country'],'country_code'=>$data['client_tel_prefix'],'emp_designation_id'=>$data['designation_id'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>1);
      
      //print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('agrimin_employee_users_master',$result);
      //print_r($this->db->last_query());exit;  
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    public function addUserBranchAcess($data){
    if(empty($data))
      return FALSE;

    $result = array('user_id'=>$data['emp_id'],'comp_id'=>$data['user_company'],'branch_id'=>$data['branch_name'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);
    //print_r($result);exit;
    $this->db->insert('agrimin_user_branch_access',$result);
    return $this->db->insert_id();

   }

   public function updateUserDetails($data)
      {

      $effective_from = date('Y-m-d',strtotime($data['effective_from']));  
      
      $result = array('qualification_type_id'=>$data['qualification_type_id'],'marital_status'=>$data['marital_status'],'nationality_id'=>$data['nationality_id'],'nominee_name'=>$data['nominee_name'],'department_id'=>$data['department_id'],'effective_from'=>$effective_from,'leave_approver_reporting_id'=>$data['leave_approver_reporting_id'],'company_bank_account_name'=>$data['company_bank_account_name'],'company_bank_account_no'=>$data['company_bank_account_no'],'company_bank_account_type'=>$data['company_bank_account_type'],'company_bank_account_address'=>@$data['company_bank_account_address'],'personal_bank_account_name'=>@$data['personal_bank_account_name'],'personal_bank_account_address'=>@$data['personal_bank_account_address'],'personal_bank_account_no'=>$data['personal_bank_account_no'],'personal_bank_account_type'=>$data['personal_bank_account_type'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt'],'is_active'=>1);
      
      //print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('agrimin_employee_users_detail',$result);
      //print_r($this->db->last_query());exit;  
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }


    public function delusermaster($id)
      {

      $result = array('is_active'=>0);  
      $this->db->where('id', $id);
      $this->db->limit(1);
      $this->db->update('agrimin_employee_users_master',$result);

      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

    function fetch_op_year($comp_id)
    {
  
      $querystring = "SELECT * FROM agrimin_operation_year WHERE comp_id = '".$comp_id."' and is_active = 1 order by id desc";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      return $result;

    } 



    
    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lab_master extends CI_Model{ 

    function getlabMethods($params = array()){ 

        $querystring = "SELECT alm.*,abm.branch_name FROM agrimin_lab_methods alm left join agrimin_branch_master abm ON alm.country_branch_id=abm.id WHERE alm.is_active = 1 and alm.country_branch_id = '".$_SESSION['branch_id']."' order by alm.id desc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
    }

    public function addlabmethods($data){
    if(empty($data))
      return FALSE;

    $result = array('method_name'=>$data['lab_method'],'country_branch_id'=>$_SESSION['branch_id'],'status'=>$data['status'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);


    //print_r($result);exit;
    $this->db->insert('agrimin_lab_methods',$result);
    return $this->db->insert_id();

   }

   function geteditlabMethods($id){ 

        $querystring = "SELECT * FROM agrimin_lab_methods where id = '".$id."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getBylabMethods($data){ 

        $querystring = "SELECT * FROM agrimin_lab_methods where method_name = '".$data['lab_method']."' and country_branch_id = '".$_SESSION['branch_id']."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        if ($result) {
          return TRUE;
        }
        return FALSE;

    }

    public function updatelabmethods($data){
      
      $result = array('method_name'=>$data['lab_method'],'status'=>$data['status'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']);


      //print_r($result);exit;
      $this->db->where('id', $data['method_id']);
      $this->db->limit(1);
      $this->db->update('agrimin_lab_methods',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   
   public function dellabmethodmaster($id)
      {

      $result = array('is_active'=>0);
      
      $this->db->where('id', $id);
      $this->db->limit(1);
      $this->db->update('agrimin_lab_methods',$result);
      #echo $this->db->last_query();exit;
      return $rows = (($this->db->affected_rows() > 0)?TRUE:FALSE);
    
     }

     function getlabspecificationslist($params = array()){ 

        $querystring = "SELECT alsg.* FROM agrimin_lab_specification_group alsg order by alsg.id desc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
    }

     function getlabspecifications($params = array()){ 

        $querystring = "SELECT alsg.* FROM agrimin_lab_specification_group alsg WHERE alsg.status = 1 order by alsg.id desc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
    }

    function getlabspecificationsbylab(){ 

        $querystring = "SELECT distinct(alp.group_id) FROM agrimin_lab_parameters alp order by alp.group_id desc";

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
    }

    function getspecificationsids($params){ 

        $querystring = "SELECT alsg.* FROM agrimin_lab_specification_group alsg WHERE alsg.id not in ($params)";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
    }


    public function addlabspecifications($data){
    if(empty($data))
      return FALSE;

    $result = array('name'=>$data['spec_name'],'status'=>$data['status'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);


    //print_r($result);exit;
    $this->db->insert('agrimin_lab_specification_group',$result);
    return $this->db->insert_id();

   }

   function geteditlabSpecifications($id){ 

        $querystring = "SELECT * FROM agrimin_lab_specification_group where id = '".$id."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getBylabSpecifications($data){ 

        $querystring = "SELECT * FROM agrimin_lab_specification_group where name = '".$data['spec_name']."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        if ($result) {
          return TRUE;
        }
        return FALSE;

    }

    public function updatelabspecifications($data){
      
      $result1 = array('group_id'=>$data['spec_name'],'status'=>$data['status'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']);


      //print_r($result);exit;
      $this->db->where('id', $data['spec_name']);
      $this->db->limit(1);
      $this->db->update('agrimin_lab_parameters',$result1);


      $result = array('name'=>$data['spec_name'],'status'=>$data['status'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']);


      //print_r($result);exit;
      $this->db->where('id', $data['spec_id']);
      $this->db->limit(1);
      $this->db->update('agrimin_lab_specification_group',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   
   public function dellabspecifications($id)
      {

      $result = array('is_active'=>0);
      
      $this->db->where('id', $id);
      $this->db->limit(1);
      $this->db->update('agrimin_lab_specification_group',$result);
      #echo $this->db->last_query();exit;
      return $rows = (($this->db->affected_rows() > 0)?TRUE:FALSE);
    
     }

    function getlabParameters($params = array()){ 
         
        $querystring = "SELECT alp.*,abm.branch_name,alm.method_name,alsm.name group_name FROM agrimin_lab_parameters alp left join agrimin_branch_master abm ON alp.branch_id=abm.id left join agrimin_lab_methods alm ON alp.lab_method_id=alm.id left join agrimin_lab_specification_group alsm ON alp.group_id=alsm.id WHERE alp.is_active = 1 and alp.branch_id = '".$_SESSION['branch_id']."' order by alp.id desc"; //and alp.status = 1 
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;
    }

    function getlabParametersMethod($params = array()){ 
         
        $querystring = "SELECT alp.*,abm.branch_name,alm.method_name,alsm.name group_name FROM agrimin_lab_parameters alp left join agrimin_branch_master abm ON alp.branch_id=abm.id left join agrimin_lab_methods alm ON alp.lab_method_id=alm.id left join agrimin_lab_specification_group alsm ON alp.group_id=alsm.id WHERE alp.is_active = 1 and alp.status = 1 and alp.branch_id = '".$_SESSION['branch_id']."' order by alp.id desc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        $lab_params = $result;
        //print_r($result);exit;
        foreach($result as $row)
        {
            $lab_method_id = $row['lab_method_id'];
            $querystring1 = "SELECT alm.id,alm.method_name FROM agrimin_lab_methods alm Where alm.id in ($lab_method_id)";
            $queryforpubid1 = $this->db->query($querystring1);

            $result1 = $queryforpubid1->result_array();
            //print_r($result1);exit;
            $method_name = implode(', ', array_column($result1, 'method_name'));
            //echo $method_name."//";
            $lab_params[$row['id']]['method_name']=$method_name;
        } 
        #print_r($lab_params);
        #exit; 
        return @$lab_params;
    }

    public function addlabparameters($data){
    if(empty($data))
      return FALSE;

    if (is_array(@$data['method_name'])) {
      $data['method_name'] = @implode(",",$data['method_name']);
    } else {
      $data['method_name'] = @$data['method_name'][0];
    }

    #$result = array('lab_method_id'=>$data['method_name'],'min'=>$data['parameter_min'],'max'=>$data['parameter_max'],'group_id'=>$data['specification_name'],'branch_id'=>$_SESSION['branch_id'],'status'=>$data['status'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);
    $result = array('lab_method_id'=>$data['method_name'],'group_id'=>$data['specification_name'],'branch_id'=>$_SESSION['branch_id'],'status'=>$data['status'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>1);

    //print_r($result);exit;
    $this->db->insert('agrimin_lab_parameters',$result);
    return $this->db->insert_id();

   }

   function geteditlabParameters($id){ 

        $querystring = "SELECT * FROM agrimin_lab_parameters where id = '".$id."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getBylabParameters($data){ 

        if (is_array(@$data['method_name'])) {
          $data['method_name'] = @implode(",",$data['method_name']);
        } else {
          $data['method_name'] = @$data['method_name'][0];
        }

        $querystring = "SELECT * FROM agrimin_lab_parameters where lab_method_id = '".$data['method_name']."' and group_id = '".$data['specification_name']."' and branch_id = '".$_SESSION['branch_id']."'";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        //print_r($result);exit;
        if ($result) {
          return TRUE;
        }
        return FALSE;

    }

    public function updatelabparameters($data){
      //print_r($data);exit;
      if (is_array(@$data['method_name'])) {
          $data['method_name'] = @implode(",",$data['method_name']);
      } else {
          $data['method_name'] = @$data['method_name'][0];
      }

      #$result = array('lab_method_id'=>$data['method_name'],'min'=>$data['parameter_min'],'max'=>$data['parameter_max'],'group_id'=>$data['specification_name'],'status'=>$data['status'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']);
      $result1 = array('status'=>$data['status'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']);
      $this->db->where('id', $data['specification_name']);
      $this->db->limit(1);
      $this->db->update('agrimin_lab_specification_group',$result1);


      $result = array('lab_method_id'=>$data['method_name'],'group_id'=>$data['specification_name'],'status'=>$data['status'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']);


      //print_r($result);exit;
      $this->db->where('id', $data['parameter_id']);
      $this->db->limit(1);
      $this->db->update('agrimin_lab_parameters',$result);
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

   }

   
   public function dellabparameters($id)
      {

      $result = array('is_active'=>0);
      
      $this->db->where('id', $id);
      $this->db->limit(1);
      $this->db->update('agrimin_lab_parameters',$result);
      #echo $this->db->last_query();exit;
      return $rows = (($this->db->affected_rows() > 0)?TRUE:FALSE);
    
     }

    function fetch_labspecifications()
    {
  
      $querystring = "SELECT alsg.* FROM agrimin_lab_specification_group alsg WHERE alsg.is_active = 1";
        $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
      };

      return $output;
    }

    function fetch_labmethods(){ 

      $querystring = "SELECT alm.*,abm.branch_name FROM agrimin_lab_methods alm left join agrimin_branch_master abm ON alm.country_branch_id=abm.id WHERE alm.is_active = 1 and alm.country_branch_id = '".$_SESSION['branch_id']."' order by alm.id desc";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['method_name'].'</option>';
      };

      return $output;
    }

    function fetch_labmins(){ 

      $querystring =  "SELECT min FROM agrimin_lab_parameters WHERE is_active = 1 and branch_id = '".$_SESSION['branch_id']."' and min != '' group by min Order by id";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['min'].'</option>';
      };

      return $output;
    }


    function fetch_labmaxs(){ 

      $querystring =  "SELECT max FROM agrimin_lab_parameters WHERE is_active = 1 and branch_id = '".$_SESSION['branch_id']."' and max != '' group by max Order by id";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $output = '';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['id'].'">'.$row['max'].'</option>';
      };

      return $output;
    }


    function fetch_labparammin($params)
    {
  
      $querystring = "SELECT * FROM agrimin_lab_parameters WHERE group_id = '".$params."'";
      #$querystring = "SELECT alp.*,abm.branch_name,alm.method_name,alsm.name group_name FROM agrimin_lab_parameters alp left join agrimin_branch_master abm ON alp.branch_id=abm.id left join agrimin_lab_methods alm ON alp.  lab_method_id=alm.id left join agrimin_lab_specification_group alsm ON alp.group_id=alsm.id WHERE alp.id = '".$params."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      #$output = '<option value="">Select</option>';
      $output = '';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['min'].'">'.$row['min'].'</option>';
      };

      return $output;

    }

    function fetch_labparammax($params)
    {
  
      $querystring = "SELECT * FROM agrimin_lab_parameters WHERE group_id = '".$params."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      #$output = '<option value="">Select</option>';
      $output = '';
      foreach($result as $row)
      {
         $output .= '<option value="'.$row['max'].'">'.$row['max'].'</option>';
      };

      return $output;

    }

    function fetch_labparammethod($params)
    {
      $querystring = "SELECT alp.lab_method_id FROM agrimin_lab_parameters alp Where alp.group_id = '".$params."' and alp.branch_id = '".$_SESSION['branch_id']."'";
      $queryforpubid = $this->db->query($querystring);

      $result = $queryforpubid->result_array();
      $lab_method_id = implode(',', array_column($result, 'lab_method_id'));
      #$lab_method_id = $result[0]['lab_method_id'];

      $querystring1 = "SELECT alm.id,alm.method_name FROM agrimin_lab_methods alm Where alm.id in ($lab_method_id)";
      $queryforpubid1 = $this->db->query($querystring1);

      $result1 = $queryforpubid1->result_array();
      /*$lab_method_id = $result[0]['lab_method_id'];

      $querystring1 = "SELECT alm.*,abm.branch_name FROM agrimin_lab_methods alm left join agrimin_branch_master abm ON alm.country_branch_id=abm.id WHERE alm.is_active = 1 and alm.country_branch_id = '".$_SESSION['branch_id']."' order by alm.id desc";
      $queryforpubid1 = $this->db->query($querystring1);

      $result1 = $queryforpubid1->result_array();*/

      #$output = '<option value="">Select</option>';
      $output = '';
      foreach($result1 as $row)
      {
        /*if ($row['id']==$lab_method_id) {
            $output .= '<option value="'.$row['id'].'" selected>'.$row['method_name'].'</option>';
        } else {*/
            $output .= '<option value="'.$row['id'].'">'.$row['method_name'].'</option>';
        /*}*/
      };
      
      return $output;

    }




    

}

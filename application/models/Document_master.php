<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_document_type'; 
    } 

    function getDocumentTypedata(){ 

        $querystring = "SELECT * FROM agrimin_document_type Where is_active = 1 order by id asc";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getDocumentDetailsById($params){  //$id

        $querystring = "SELECT afo.*,adt.name FROM agrimin_fileregister_operations afo left join agrimin_document_type adt ON adt.id=afo.document_type_id Where file_no =".$params." order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getMailDocumentDetailsById($params){  //$id

        $querystring = "SELECT afmo.* FROM agrimin_fileregister_operations_maildocs afmo Where file_no =".$params." order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getDocumentDetailsByFileNo($params){  

        $querystring = "SELECT * FROM agrimin_fileregister_transaction Where file_no = '".$params."' order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function addFileDocsByMail($data){
    if(empty($data))
      return FALSE;

    $result = array('file_no'=>$data['file_no'],'document_name'=>$data['file_name'],'document_path'=>$data['file_path'],'from_address'=>$data['from_address'],'subject'=>$data['subject'],'email_number'=>$data['email_number'],'email_utc_date'=>$data['email_utc_date'],'entry_user_id'=>$data['entry_user_id'],'entry_date'=>$data['entry_date'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id']);
    //print_r($result);exit;
    $this->db->insert('agrimin_fileregister_operations_maildocs',$result);
    return $this->db->insert_id();

   }

   public function addMailDocsmaster($data){
    if(empty($data))
      return FALSE;

    $result = array('mail_name'=>$data['mail_name'],'entry_user_id'=>$data['user_id'],'entry_date'=>$data['dt'],'is_active'=>$data['mail_active'],'user_comp_id'=>$_SESSION['comp_id'],'user_branch_id'=>$_SESSION['branch_id']);
    //print_r($result);exit;
    $this->db->insert('agrimin_maildocs_master',$result);
    return $this->db->insert_id();

   }

   // This is added for Mail Cron by Shivaji Dalvi
   function addDocumentTypes($data){

      //if ($data['user_id'] == '') { $data['user_id'] = 13; }

      $result = array('file_no'=>$data['file_id'],'document_type_id'=>$data['doc_types'],'document_number'=>$data['document_no'],'document_path'=>@$data['upl_document_path'],'entry_user_id'=>$data['entry_user_id'],'entry_date'=>$data['entry_date'],'is_active'=>1,'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'from_address'=>$data['from_address'],'subject'=>$data['subject'],'email_number'=>$data['email_number'],'email_utc_date'=>$data['email_utc_date']);
      
      //print_r($result);exit;
      $this->db->insert('agrimin_fileregister_operations',$result);
      return $this->db->insert_id();

   }

   function getmaildocsdata(){  

        $querystring = "SELECT * FROM agrimin_maildocs_master order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getmaildocsactivedata(){  

        $querystring = "SELECT * FROM agrimin_maildocs_master where is_active = 1 order by id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getMailDocsmasterbyId($id){ 

        $querystring = "SELECT * FROM agrimin_maildocs_master Where id = $id";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getMailDocsmasterbyDate($no,$dt){ 

        //$querystring = "SELECT count(distinct(email_number)) email_count FROM agrimin_fileregister_operations_maildocs Where email_number = $no and email_utc_date = ('".$dt."')";
        $querystring = "SELECT count(distinct(email_number)) email_count FROM agrimin_fileregister_operations Where email_number = $no and email_utc_date = ('".$dt."')";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    public function updateMailDocsData($data)
      {
      
      $result = array('mail_name'=>$data['mail_name'],'is_active'=>$data['mail_active'],'user_comp_id'=>$data['user_comp_id'],'user_branch_id'=>$data['user_branch_id'],'modify_user_id'=>$data['user_id'],'modify_date'=>$data['dt']);
      
      //print_r($result);exit;
      $this->db->where('id', $data['id']);
      $this->db->limit(1);
      $this->db->update('agrimin_maildocs_master',$result);
      //print_r($this->db->last_query());exit;  
      return (($this->db->affected_rows() > 0)?TRUE:FALSE);

    }

 
}

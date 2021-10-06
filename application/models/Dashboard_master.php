<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_master extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'agrimin_fileregister_transactionr'; 
    } 

    function getAllFiledata(){ 

        $querystring = 'SELECT count(*) filecount FROM agrimin_fileregister_transaction aft Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$_SESSION['operatingyear'].'"';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFileCompletedata(){ 

        $querystring = 'SELECT count(*) filecount FROM agrimin_fileregister_transaction aft Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$_SESSION['operatingyear'].'" and aft.status = "Completed"';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFilePendingdata(){ 

        $querystring = 'SELECT count(*) filecount FROM agrimin_fileregister_transaction aft Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$_SESSION['operatingyear'].'" and aft.status = "Pending"';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFileInvoiceddata(){ 

        $querystring = 'SELECT count(*) filecount FROM agrimin_fileregister_transaction aft Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$_SESSION['operatingyear'].'" and aft.status = "Invoiced"';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFileCancelledddata(){ 

        $querystring = 'SELECT count(*) filecount FROM agrimin_fileregister_transaction aft Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$_SESSION['operatingyear'].'" and aft.status = "Cancelled"';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFileRunningdata(){ 

        $querystring = 'SELECT count(*) filecount FROM agrimin_fileregister_transaction aft Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$_SESSION['operatingyear'].'" and aft.status = "Running"';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllInvoicedata(){ 

        //$querystring = 'SELECT count(*) invoicecount FROM agrimin_invoice_master aim Where aim.user_comp_id = "'.$_SESSION['comp_id'].'" and aim.user_branch_id = "'.$_SESSION['branch_id'].'" and aim.op_year = "'.$_SESSION['operatingyear'].'"';
        $querystring = 'SELECT count(*) invoicecount FROM agrimin_invoice_master aim Where aim.user_comp_id = "'.$_SESSION['comp_id'].'" and aim.user_branch_id = "'.$_SESSION['branch_id'].'"';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllClientdata(){ 

        $querystring = 'SELECT count(*) clientcount FROM agrimin_client_master acm Where acm.user_comp_id = "'.$_SESSION['comp_id'].'" and acm.user_branch_id = "'.$_SESSION['branch_id'].'" and is_active = 1';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCargoClientReportdata(){ 

        $querystring = "select acm.commodity_name,acgm.name cargo_group_name,ac.client_name,aftcd.approx_qty,aum.unit_name,aftcd.load_port,aftcd.discharge_port,aft.id file_id from agrimin_fileregister_transaction_cargo_details aftcd left join agrimin_fileregister_transaction aft on aftcd.fileregister_transaction_id=aft.id left join agrimin_cargo_master acm on aftcd.cargo_id=acm.id left join  agrimin_cargo_group_master acgm on aftcd.cargo_group_id=acgm.id left join agrimin_client_master ac on aft.client_id=ac.id left join agrimin_unit_master aum on aftcd.approx_unit=aum.id Where aft.is_active = 1 and aft.user_comp_id = '".$_SESSION['comp_id']."' and aft.user_branch_id = '".$_SESSION['branch_id']."' limit 5";
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllAccountledger($data){ 

        $querystring = 'SELECT aal.*,avm.id vendor_id,avm.vendor_name vendor FROM agrimin_account_ledger aal left join agrimin_vendor_master avm ON aal.vendor_name=avm.id Where aal.is_active = 1 and date(aal.vendor_date) >= "'.date('Y-m-d',strtotime($data['fin_from_date'])).'" and date(aal.vendor_date) <= "'.date('Y-m-d',strtotime($data['fin_to_date'])).'" and aal.user_comp_id = "'.$_SESSION['comp_id'].'" and aal.user_branch_id = "'.$_SESSION['branch_id'].'" Order by aal.id desc'; //aal.id

        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getVendorDetails(){  //$id

        $querystring = 'SELECT count(*) vendors FROM agrimin_vendor_master Where is_active = 1 and user_comp_id = "'.$_SESSION['comp_id'].'" and user_branch_id = "'.$_SESSION['branch_id'].'"';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getCargoDetails(){  //$id

        $querystring = "SELECT count(*) cargos FROM agrimin_cargo_master Where is_active = 1";
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getClientInteractions(){  //$id

        $querystring = 'SELECT count(*) interactions FROM agrimin_client_interaction_report Where is_active = 1 and user_comp_id = "'.$_SESSION['comp_id'].'" and user_branch_id = "'.$_SESSION['branch_id'].'"';
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFileRecentPendingdata(){ 

        $querystring = 'SELECT aft.file_no,aeum.first_name,aeum.last_name,aft.entry_date FROM agrimin_fileregister_transaction aft,agrimin_employee_users_master aeum Where aft.status = "Pending" and aft.entry_user_id=aeum.id and aft.op_year = "'.$_SESSION['operatingyear'].'" order by aft.entry_date desc limit 5'; // aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$_SESSION['operatingyear'].'" 
        //echo $querystring;exit; 
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllFileRecentUserPendingdata(){ 

        $querystring = 'SELECT aft.id,aft.file_no,aeum.first_name,aeum.last_name,aft.entry_date,aft.file_creation_date FROM agrimin_fileregister_transaction aft,agrimin_employee_users_master aeum Where aft.user_comp_id = "'.$_SESSION['comp_id'].'" and aft.user_branch_id = "'.$_SESSION['branch_id'].'" and aft.op_year = "'.$_SESSION['operatingyear'].'" and aft.status = "Pending" and aft.entry_user_id=aeum.id order by aft.entry_date desc limit 5';
        //echo $querystring;exit;
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllInvoiceRecentPendingdata(){ 

        $querystring = 'SELECT aim.invoice_no,aeum.first_name,aeum.last_name,aim.file_creation_date FROM agrimin_invoice_master aim,agrimin_employee_users_master aeum Where aim.status = "Open" and aim.entry_user_id=aeum.id  and aim.op_year = "'.$_SESSION['operatingyear'].'" order by aim.entry_date desc limit 5'; // aim.user_comp_id = "'.$_SESSION['comp_id'].'" and aim.user_branch_id = "'.$_SESSION['branch_id'].'" and aim.op_year = "'.$_SESSION['operatingyear'].'" 
        //echo $querystring;exit; 
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }

    function getAllInvoiceRecentUserPendingdata(){ 

        $querystring = 'SELECT aim.id,aim.invoice_no,aim.invoice_info,aeum.first_name,aeum.last_name,aim.invoice_date FROM agrimin_invoice_master aim,agrimin_employee_users_master aeum Where aim.status = "Open" and aim.entry_user_id=aeum.id and aim.user_comp_id = "'.$_SESSION['comp_id'].'" and aim.user_branch_id = "'.$_SESSION['branch_id'].'" and aim.op_year = "'.$_SESSION['operatingyear'].'" order by aim.entry_date desc limit 5'; // aim.user_comp_id = "'.$_SESSION['comp_id'].'" and aim.user_branch_id = "'.$_SESSION['branch_id'].'" and aim.op_year = "'.$_SESSION['operatingyear'].'" 
        //echo $querystring;exit; 
        $queryforpubid = $this->db->query($querystring);

        $result = $queryforpubid->result_array();
        return $result;

    }


}

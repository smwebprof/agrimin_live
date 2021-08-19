<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filenew extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		#print_r($_SESSION);exit;
		

		$this->data['title'] = 'Login';
////////////////////////////////////////////////////////////////////////////
		$this->load->model('user_master');
		$menus = $this->user_master->getMainmenus();
		$this->data['menus']=$menus;	
		$submenus = $this->user_master->getSubmenus();
		$arr= array();
		$arr1= array();
		$i=0;
		foreach ($submenus as $key=>$value)
		{  
			$arr[$value['menu_master_id']][$i] = $value['submenu_name'];
			$arr1[$value['menu_master_id']][$i] = $value['url'];
			$i++;
        }
        #print_r($arr1);exit;
		$this->data['submenus']=$arr;
		$this->data['urlmenus']=$arr1;
///////////////////////////////////////////////////////////////////////////////
		$this->data['layout_body']='filenew';
 		$this->load->view('admin/layout/main_app', $this->data);

		#$this->load->view('file_register_new');
	}
}

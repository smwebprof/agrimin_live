 <?php
    $url_str = base_url().'pokkt_admin/';
    
    $urls = array(
    			  'listCampaigns'=>base_url().'pokkt_admin'.'/'.'manage_campaign/',
    			  'pokktmoney'=>base_url().'pokktmoney'.'/'.'dashboard/',
    			  'listlog'=>base_url().'pokkt_admin'.'/'.'user_activity_log/',
    			  'manage_user'=>base_url().'pokkt_admin'.'/'.'user_activity_log/',
    			  'backups'=>base_url().'pokkt_admin'.'/'.'user_activity_log/',
    			  'pub_create_app'=>base_url().'pub_admin/',
    			  'list_app'=>base_url().'pub_admin/',
    			  'pub_list_app'=>base_url().'pub_admin/',
    			  'pub_report'=>base_url().'pub_admin/',
    			  'vouchers_list'=>base_url().'pokkt_admin/manage_vouchers/',
    			  'blacklist'=>base_url().'pokkt_admin/manage_users/',
    			  'gratification_sms'=>base_url().'pokkt_admin/messengers/'
    			);
    
    $menus = array(
    			   'Reports'=>array('manager_report'=>'Overview Report Summary','new_manager_report'=>'Detailed Overview Report','os_report'=>'OS Report','publisher_success_report'=>'Publisher Summary','city_success_report'=>'City Summary','vidcampaign_report'=>'Video Campaign Report','deferred_campaign_data'=>'Deferred Campaign Data'),
    			   'App'=> array('pub_create_app'=>'Add App','list_app'=>'List & Aprove App','pub_list_app'=>'List & Edit App'),
    			   'Publisher Campaign'=> array('vouchers_list'=>'Manage Vouchers ','add_edit_template'=>'Add Template','list_template'=>'List Template','campaign_targeting'=>'Campaign Targeting',),
 				   'Advertiser'=>array('pub_campaign_sorting'=>'Publisher Campaign Sorting','manage_category'=>'Manage Advertiser Category','manage_advertiser'=>'Manage Advertiser','listCampaigns'=>'Manage Advertiser Campaign'),
    			   'User Management'=>array('find_user'=>'Find User','listlog'=>'User Activity Log','manage_user'=>'Manage User','backups'=>'Back Ups','blacklist'=>'Black List'),
    			   
    			   'Messenger'=>array('gratification_sms'=>'Send Gratification Sms', 'messenger'=>'Messenger','messenger_report'=>'Messenger Report','smslog_report'=>'SMS LOG Report'),
    			   'Accounting'=>array('publisher_report'=>'Publisher Report','campaign_report'=>'Campaign Report')
    			);
    			
    
    			
    $session = $this->session->userdata('admin_logged_in');
    $func_accees = !empty($session['func_access']) ? json_decode($session['func_access'],true) : '';
    
    if($session['user_type'] == 'publisher')
    	$menus['Reports']['pub_report'] =  'Publisher Report' ;
    
 ?>
    							
    							
	<!-- Aside (Left Column) -->
	<div id="aside" class="box">

		<div class="padding box">
			<!-- Logo (Max. width = 200px) -->
			<p id="logo"><a href="<?php echo base_url().'pokkt_admin'; ?>"><img src="<?php echo base_url(); ?>assets/admin/images/logo.png" alt="Our logo" title="Visit Site" /></a></p><br>
		</div> <!-- /padding -->
		
		<ul class="box">
			<li><strong><a href="<?php echo base_url().'pokkt_cms/pokkt_admin/index';?>"> Dashboard </a></strong></li>
			<li><strong><a href="<?php echo base_url().'pms/dashboard';?>"> Pokktmoney </a></strong></li>
			
			<?php  if(($session['user_type'] == 'admin') || ( !empty($func_accees)  && is_array($func_accees)) )
					{
						foreach ($menus as $key_main_menu=>$each_main_menu)
						{   
							if(isset($i) && $i >1)
							{?> </ul> <?php } 
							$i = 1;
							foreach ($each_main_menu as $link_sub_menu=>$each_sub_menu)
							{
								if($session['user_type'] == 'admin' || in_array($link_sub_menu, $func_accees) )
								{
									if($i == 1)
									{?>
									  <li><strong><a href="#" title="<?php echo $key_main_menu;?>"><?php echo $key_main_menu;?></a></strong></li>
									  <ul>	
									<?php $i++;
									}?>
					  					<li id="<?php echo $this->router->method == $link_sub_menu ? 'submenu-active' : '';?>">
					  						<a href="<?php echo array_key_exists($link_sub_menu, $urls) ? $urls[$link_sub_menu].$link_sub_menu : $url_str.$link_sub_menu;?>" title="<?php echo $each_sub_menu;?>">
					  							<?php echo $each_sub_menu;?>
					  						</a>
					  					</li>	
							     <?php 
								}
							 }
		  				 }
	  				 }?>
				
		   </ul>

	</div> <!-- /aside -->
							
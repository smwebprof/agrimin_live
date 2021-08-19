
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					User Management - Full View
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<!--<li class="btn-group">
							<button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
							<span>
								Actions
							</span>
							<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li>
									<a href="#">
										Action
									</a>
								</li>
								<li>
									<a href="#">
										Another action
									</a>
								</li>
								<li>
									<a href="#">
										Something else here
									</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">
										Separated link
									</a>
								</li>
							</ul>
						</li>-->
						<li>
							<i class="fa fa-home"></i>
							<a href="<?php echo BASE_PATH; ?>dashboard">
								Home
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="<?php echo BASE_PATH; ?>viewinteractionreport">
								Management Master
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								User Management
							</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom boxless tabbable-reversed">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_0" data-toggle="tab">
									 User Management
								</a>
							</li>
							<!--<li>
								<a href="#tab_1" data-toggle="tab">
									 2 Columns
								</a>
							</li>
							<li>
								<a href="#tab_2" data-toggle="tab">
									 2 Columns Horizontal
								</a>
							</li>
							<li>
								<a href="#tab_3" data-toggle="tab">
									 2 Columns View Only
								</a>
							</li>
							<li>
								<a href="#tab_4" data-toggle="tab">
									 Row Seperated
								</a>
							</li>
							<li>
								<a href="#tab_5" data-toggle="tab">
									 Bordered
								</a>
							</li>
							<li>
								<a href="#tab_6" data-toggle="tab">
									 Row Stripped
								</a>
							</li>
							<li>
								<a href="#tab_7" data-toggle="tab">
									 Label Stripped
								</a>
							</li>-->
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_0">
								<!-- Start PORTLET-->
								<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>User info - Full View
							</div>
							<div class="actions">
								<a href="<?php echo BASE_PATH; ?>Viewusermanagement" class="btn red">
								<i class="fa fa-pencil"></i> View User Management
								</a>
							</div>
							<!--<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>-->
							
						</div>
						<?php $rows = $this->data['user_data'];
											
						foreach($rows as $user_data){
						?>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td width="50%">
									 <strong>Company Name</strong>
								</td>
								<td>
									<?php echo $user_data['company_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Branch Name</strong>
								</td>
								<td>
									<?php echo $user_data['branch_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Name</strong>
								</td>
								<td>
									<?php echo $user_data['first_name']." ".$user_data['middle_name']." ".$user_data['last_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Current Address</strong>
								</td>
								<td>
									<?php echo $user_data['current_address'].",".$user_data['city'].",".$user_data['state'].",".$user_data['country']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Permanent Address</strong>
								</td>
								<td>
									<?php echo $user_data['permanent_address'].",".$user_data['city'].",".$user_data['state'].",".$user_data['country']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Birth Date</strong>
								</td>
								<td>
									<?php echo $user_data['birth_date']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Office Email</strong>
								</td>
								<td>
									<?php echo $user_data['office_email']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Personal Email</strong>
								</td>
								<td>
									<?php echo $user_data['personal_email']; ?>
								</td>
							</tr>
							<?php /*<tr>
								<td>
									 <strong>Password</strong>
								</td>
								<td>
									<?php echo $this->data['user_pass']; ?>
								</td>
							</tr> */ ?>
							<tr>
								<td>
									 <strong>Gender</strong>
								</td>
								<td>
									<?php echo $user_data['gender']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Mobile No</strong>
								</td>
								<td>
									<?php echo $user_data['country_code']." ".$user_data['moblie_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>PAN No \ Tax Id</strong>
								</td>
								<td>
									<?php echo $user_data['pan_no_tax_id']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Aadhar No</strong>
								</td>
								<td>
									<?php echo $user_data['uidaino_aadhar_card']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Employee Type</strong>
								</td>
								<td>
									<?php echo $user_data['employee_staff']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Designation</strong>
								</td>
								<td>
									<?php echo $user_data['designation_name']; ?>
								</td>
							</tr>
							</table>
						</div>
					</div>
					<!-- END PORTLET-->

					<!-- Start PORTLET-->
								<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>User Details
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>

						<?php $u_details = $this->data['user_details'];
											
						foreach($u_details as $user_details){
						?>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td width="50%">
									 <strong>Qualification Type</strong>
								</td>
								<td>
									<?php echo $user_details['qname']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Martial Status</strong>
								</td>
								<td>
									<?php echo $user_details['marital_status']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Nationality</strong>
								</td>
								<td>
									<?php echo $user_details['nationality']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Department</strong>
								</td>
								<td>
									<?php echo $user_details['department']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Effective From</strong>
								</td>
								<td>
									<?php echo date('d-m-Y',strtotime($user_details['effective_from'])); ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Leave Approval</strong>
								</td>
								<td>
									<?php echo $user_details['leave_appr_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Bank Account</strong>
								</td>
								<td>
									<?php echo $user_details['company_bank_account_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Bank Account No</strong>
								</td>
								<td>
									<?php echo $user_details['company_bank_account_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Bank Account Type</strong>
								</td>
								<td>
									<?php echo $user_details['company_bank_account_type']; ?>
								</td>
							</tr>

							<tr>
								<td>
									 <strong>Bank Account Address</strong>
								</td>
								<td>
									<?php echo $user_details['company_bank_account_address']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Personal Bank Account</strong>
								</td>
								<td>
									<?php echo $user_details['personal_bank_account_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Personal Bank Address</strong>
								</td>
								<td>
									<?php echo $user_details['personal_bank_account_address']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Personal Bank No</strong>
								</td>
								<td>
									<?php echo $user_details['personal_bank_account_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Personal Bank Account Type</strong>
								</td>
								<td>
									<?php echo $user_details['personal_bank_account_type']; ?>
								</td>
							</tr>
							</table>
						</div>
						<?php
						}
						?>
					</div>
					<!-- END PORTLET-->


					<!-- Start PORTLET-->
					<?php /*<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>User Details - Full View
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td width="50%">
									 <strong>Date</strong>
								</td>
								<td>
									<?php echo date("d-m-Y", strtotime($interaction_data['interaction_date'])); ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Location Interaction</strong>
								</td>
								<td>
									<?php #echo $interaction_data['location_interaction']; ?>
									<?php if ($interaction_data['location_interaction']=='on') { echo 'Yes';} else { echo 'No';} ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Phone Interaction</strong>
								</td>
								<td>
									<?php #echo $interaction_data['phone_interaction']; ?>
									<?php if ($interaction_data['phone_interaction']=='on') { echo 'Yes';} else { echo 'No';} ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Attendees (Clientside)</strong>
								</td>
								<td>
									<?php echo $interaction_data['attendees_client_side']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Attendees (ACI)</strong>
								</td>
								<td>
									<?php echo $interaction_data['attendees_agrimin']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Purpose Meeting</strong>
								</td>
								<td>
									<?php echo $interaction_data['purpose_of_meeting']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Sales Target</strong>
								</td>
								<td>
									<?php echo $interaction_data['sales_target']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Specific Issue</strong>
								</td>
								<td>
									<?php echo $interaction_data['specific_issue']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Client Complaint</strong>
								</td>
								<td>
									<?php echo $interaction_data['client_complant']; ?>
								</td>
							</tr>
							</table>
						</div>
					</div> */ ?>
					<!-- END PORTLET-->


					<?php
				    }
				    ?>


								</div>
		
								</div>
							</div>
							
							
							
							
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->


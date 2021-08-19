
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Client Interaction Details
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
							<a href="<?php echo BASE_PATH; ?>viewclientinteraction">
								Sales
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Client Interaction Form
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
									 Client Interaction
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
								<i class="fa fa-reorder"></i>Client Details
							</div>
							<!--<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>-->
							<div class="actions">
								<a href="<?php echo BASE_PATH; ?>viewclientinteraction" class="btn blue">
									<i class="fa fa-pencil"></i>View All Client Interactions
								</a>
								<a href="<?php echo BASE_PATH; ?>fullviewinteractionreportpdf?id=<?php echo $_GET['id'];?>" class="btn green" target="_blank">
									<i class="fa fa-pencil"></i>View PDF Reports
								</a>
								<!--<a href="#" class="btn red">
									<i class="fa fa-pencil"></i> Print To PDF 
								</a>-->
								<!--<div class="btn-group">
									<a class="btn green" href="#" data-toggle="dropdown">
										<i class="fa fa-cogs"></i> Tools <i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
												<i class="fa fa-pencil"></i> Edit
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-trash-o"></i> Delete
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-ban"></i> Ban
											</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">
												<i class="i"></i> Make admin
											</a>
										</li>
									</ul>
								</div>-->
							</div>
						</div>
						<?php $rows = $this->data['interaction_data'];
											
						foreach($rows as $interaction_data){
						?>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td width="50%">
									 <strong>Full Name</strong>
								</td>
								<td>
									<?php echo $interaction_data['full_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Job Title</strong>
								</td>
								<td>
									<?php echo $interaction_data['job_title']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Company</strong>
								</td>
								<td>
									<?php echo $interaction_data['client_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Office Address</strong>
								</td>
								<td>
									<?php echo $interaction_data['address'].",".$interaction_data['city'].",".$interaction_data['state'].",".$interaction_data['country']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Office Number</strong>
								</td>
								<td>
									<?php echo $interaction_data['country_code']." ".$interaction_data['tel_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Mobile Number</strong>
								</td>
								<td>
									<?php echo $interaction_data['country_code']." ".$interaction_data['mobile_office_number']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Email Address</strong>
								</td>
								<td>
									<?php echo $interaction_data['email_address']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Alternate Contact</strong>
								</td>
								<td>
									<?php echo  $interaction_data['alt_prefix']." ".$interaction_data['alternate_contact']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Company Web page</strong>
								</td>
								<td>
									<?php echo $interaction_data['company_web_page']; ?>
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
								<i class="fa fa-reorder"></i>Interaction Details
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
									<?php if ($interaction_data['location_interaction']=='on') { echo 'Yes';} ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Phone Interaction</strong>
								</td>
								<td>
									<?php #echo $interaction_data['phone_interaction']; ?>
									<?php if ($interaction_data['phone_interaction']=='on') { echo 'Yes';} ?>
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
					</div>
					<!-- END PORTLET-->


					<!-- Start PORTLET-->
								<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Summary Of Items Discussed
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
								<?php echo $interaction_data['summary_of_items_discussed']; ?>
							</td>
							<td>
									<a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['summary_of_items_discussed_path']; ?>"><?php echo $interaction_data['summary_of_items_discussed_path']; ?></a>
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
								<i class="fa fa-reorder"></i>Summary Of Action Points
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
									<?php echo $interaction_data['summary_of_action_points']; ?>
								</td>
								<td>
									<a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['summary_of_action_points_path']; ?>"><?php echo $interaction_data['summary_of_action_points_path']; ?></a>
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
								<i class="fa fa-reorder"></i>Outlook (ACI)
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
								<td width="30%">
									 <strong>Was the purpose of the meeting achieved?</strong>
								</td>
								<td>
									<?php echo $interaction_data['purpose_of_meeting_achieved']; ?>
								</td>
								<td>
									<a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['purpose_of_meeting_achieved_path']; ?>"><?php echo $interaction_data['purpose_of_meeting_achieved_path']; ?></a>
								</td>
							</tr>
							<tr>
								<td width="30%">
									 <strong>What action to be taken to achieve said purpose/target?</strong>
								</td>
								<td>
									<?php echo $interaction_data['action_tobe_taken_to_achieve_said_purpose']; ?>
								</td>
								<td>
									<a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['action_tobe_taken_to_achieve_said_purpose_path']; ?>"><?php echo $interaction_data['action_tobe_taken_to_achieve_said_purpose_path']; ?></a>
								</td>
							</tr>
							<tr>
								<td width="30%">
									 <strong>When will Team ACI follow up with client?</strong>
								</td>
								<td>
									<?php echo $interaction_data['team_aci_followup_with_client']; ?>
								</td>
								<td>
									<a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['team_aci_followup_with_client_path']; ?>"><?php echo $interaction_data['team_aci_followup_with_client_path']; ?></a>
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
								<i class="fa fa-reorder"></i>Report Generated  By :
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
									 <strong>Date of Report Filing  :</strong> <?php echo date("d-m-Y H:i:s", strtotime($this->data['report_date'])); ?>
								</td>  
								<td>
									 <strong>Report Filed By  :</strong>  <?php echo $this->data['report_user']; ?>
								</td>
							</tr>
						
							</table>
						</div>
					</div>
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


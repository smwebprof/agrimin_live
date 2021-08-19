
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Full View - Client Interaction Form
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
							<a href="#">
								Sales
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Full Client Ineraction Form
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
									 Form Actions
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
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Client Ineraction Form - Full View
										</div>
										<div class="actions">
										<a href="<?php echo BASE_PATH; ?>newclientinteraction" class="btn red">
											<i class="fa fa-pencil"></i> Add New Client Interaction
										</a>
										<a href="<?php echo BASE_PATH; ?>viewclientinteraction" class="btn yellow">
											<i class="fa fa-pencil"></i> View All Interactions
										</a>
									
								<!--<div class="btn-group">
									<a class="btn default yellow-stripe" href="#" data-toggle="dropdown">
										<i class="fa fa-share"></i>
										<span class="hidden-480">
											 Tools
										</span>
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
												 Export to Excel
											</a>
										</li>
										<li>
											<a href="#">
												 Export to CSV
											</a>
										</li>
										<li>
											<a href="#">
												 Export to XML
											</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">
												 Print Invoices
											</a>
										</li>
									</ul>
								</div>-->
							</div>
										<!--<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="#portlet-config" data-toggle="modal" class="config">
											</a>
											<a href="javascript:;" class="reload">
											</a>
											<a href="javascript:;" class="remove">
											</a>
										</div>-->
									</div>

									<div class="portlet-body form">
										<!-- BEGIN FORM-->

										<form action="" method="post" class="form-horizontal newclientinteraction-form" enctype="multipart/form-data">
											<?php
												   #print_r($this->data);
												   /*echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';	*/
											?>
											<?php $rows = $this->data['interaction_data'];
											
											foreach($rows as $interaction_data){
											?>
											<div class="form-body">
												<h3 class="form-section alert alert-info">Client Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Full Name</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['full_name']; ?></label>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Job Title</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['job_title']; ?></label>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Company</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['client_name']; ?></label>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Office Address</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['address']; ?></label>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Office Number</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['tel_no']; ?></label>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email Address</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['email_address']; ?></label>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mobile Number</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['mobile_office_number']; ?></label>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Alternate Contact</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['alternate_contact']; ?></label>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Company Web page</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['company_web_page']; ?></label>
															</div>
														</div>
													</div>
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Company Web page</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['company_web_page']; ?></label>
															</div>
														</div>
													</div>-->
													<!--/span-->

													<!--/span-->
												</div>


											</div>

											<h3 class="form-section alert alert-info">Interaction Details</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Date</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo date("d-m-Y", strtotime($interaction_data['interaction_date'])); ?></label>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Location Interaction</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['location_interaction']; ?></label>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Phone Interaction</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['phone_interaction']; ?></label>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Attendees (Clientside)</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['attendees_client_side']; ?></label>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Attendees (ACI)</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['attendees_agrimin']; ?></label>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Purpose Meeting</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['purpose_of_meeting']; ?></label>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Sales Target</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['sales_target']; ?></label>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Specific Issue</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['specific_issue']; ?></label>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Client Complaint</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['client_complant']; ?></label>
															</div>
														</div>
													</div>
													<!--/span-->
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Specific Issue</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="specific_issue" id="specific_issue">
																<span for="specific_issue" class="help-block"></span>
															</div>
														</div>
													</div>-->
													<!--/span-->
												</div>
												<!--/row-->
												<h3 class="form-section alert alert-info">Summary Of Items Discussed</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Items Discussed</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['summary_of_items_discussed']; ?></label>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label col-md-3">View Attachment</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['summary_of_items_discussed_path']; ?>" target='_blank'"><?php echo $interaction_data['summary_of_items_discussed_path']; ?></a></label>
															</div>
														</div>
													</div>
													<!--/span-->
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Specific Issue</label>
															<div class="col-md-9">
																<input type="text" class="form-control">
															</div>
														</div>
													</div>-->
													<!--/span-->
												</div>
												<!--/row-->
												<h3 class="form-section alert alert-info">Summary Of Action Points</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Action points</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $interaction_data['summary_of_action_points']; ?></label>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label col-md-3">View Attachment</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['summary_of_action_points_path']; ?>" target='_blank'"><?php echo $interaction_data['summary_of_action_points_path']; ?></a></label>
															</div>
														</div>
													</div>
													<!--/span-->
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Specific Issue</label>
															<div class="col-md-9">
																<input type="text" 								</div>
														</div>
													</div>-->
													<!--/span-->
												</div>
												<!--/row-->	

											<h3 class="form-section alert alert-info">Outlook (ACI)</h3>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															
														<label class="control-label col-md-3">Was the purpose of the meeting achieved?</label>	
							
															<div class="col-md-6">
																<label class="control-label col-md-6"><?php echo $interaction_data['purpose_of_meeting_achieved']; ?></label>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label col-md-6">View Attachment</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['purpose_of_meeting_achieved_path']; ?>" target='_blank'"><?php echo $interaction_data['purpose_of_meeting_achieved_path']; ?></a></label>
															</div>
														</div>
													</div>
													<hr>
													<!--/span-->
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Was action to be taken to achieve said purpose/target?</label>
															<div class="col-md-9">
																<input type="text" class="form-control">
															</div>
														</div>
													</div>-->
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															
														<label class="control-label col-md-3">What action to be taken to achieve said purpose/target?</label>	
							
															<div class="col-md-6">
																<label class="control-label col-md-6"><?php echo $interaction_data['action_tobe_taken_to_achieve_said_purpose']; ?></label>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label col-md-6">View Attachment</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['action_tobe_taken_to_achieve_said_purpose_path']; ?>"><?php echo $interaction_data['action_tobe_taken_to_achieve_said_purpose_path']; ?></a></label>
															</div>
														</div>
													</div>
													<!--/span-->
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Was action to be taken to achieve said purpose/target?</label>
															<div class="col-md-9">
																<input type="text" class="form-control">
															</div>
														</div>
													</div>-->
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															
														<label class="control-label col-md-3">When will Team ACI follow up with client?</label>	
							
															<div class="col-md-3">
																<label class="control-label col-md-6"><?php echo $interaction_data['team_aci_followup_with_client']; ?></label>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label class="control-label col-md-3">View Attachment</label>
															<div class="col-md-6">
																<label class="control-label col-md-6"><a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['team_aci_followup_with_client_path']; ?>"><?php echo $interaction_data['team_aci_followup_with_client_path']; ?></a></label>
															</div>
														</div>
													</div>
													<!--/span-->
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Was action to be taken to achieve said purpose/target?</label>
															<div class="col-md-9">
																<input type="text" class="form-control">
															</div>
														</div>
													</div>-->
													<!--/span-->
												</div>
												<!--/row-->


												<h3 class="form-section alert alert-info">Report Generation</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Date of Report Filing</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $this->data['report_date']; ?></label>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Report Filed By</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo $this->data['report_user']; ?></label>
															</div>
														</div>
													</div>
												</div>

												
											</div>
											<?php
										    }
										    ?>

											<!--<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-3 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<button type="button" class="btn default">Cancel</button>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>-->
										</form>
										<!-- END FORM-->
									</div>
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


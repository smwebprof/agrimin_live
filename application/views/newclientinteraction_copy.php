
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					New Client Interaction Form
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
								New Client Interaction Form
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
									 Client Interaction Form
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
											<i class="fa fa-reorder"></i>New Clients
										</div>
										
									<div class="actions">
										<a href="<?php echo BASE_PATH; ?>addclientinteraction" class="btn yellow">
											<i class="fa fa-pencil"></i> Add Existing Client Interaction
										</a>
										<a href="<?php echo BASE_PATH; ?>viewclientinteraction" class="btn red">
											<i class="fa fa-pencil"></i> View All Interactions
										</a>
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
												<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';
											?><br>
										*Fields are mandatory
										<form action="" method="post" class="form-horizontal newclientinteraction-form" enctype="multipart/form-data">
											<?php
												   #print_r($this->data);
												   /*echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';	*/
											?>
											<div class="form-body">
												<h3 class="form-section alert alert-info">Client Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Full Name*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="int_full_name" id="int_full_name">
																<span for="int_full_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Job Title</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="int_job_title" id="int_job_title">
																<span for="int_job_title" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Company*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="int_company" id="int_company">
																<span for="int_company" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Office Address*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="int_office_address" id="int_office_address"></textarea>
																<span for="int_office_address" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Country*</label>
															<div class="col-md-9">
																<select class="form-control" name="company_country" id="company_country">
																<option value="">Select Country</option>	
																	<?php
													                $rows = $this->data['countries'];

													                foreach($rows as $countries){ 
													                	echo '<option value='.$countries["id"].'>'.$countries["name"].'</option>';

													                }	
																	?>
																</select>
																<span for="company_country" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">State*</label>
															<div class="col-md-9">
																<select class="form-control" name="company_state" id="company_state">
																<option value="">Select State</option>
																</select>
																<span for="company_state" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">City*</label>
															<div class="col-md-9">
																<select class="form-control" name="company_city" id="company_city">
																<option value="">Select City</option>
																</select>
																<span for="company_city" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Office Number*</label>
															<div class="col-md-9">
																<input type="number" class="form-control" placeholder="" name="int_office_no" id="int_office_no">
																<span for="int_office_no" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>	
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email Address*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="int_email_address" id="int_email_address">
																<span for="int_email_address" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mobile No*</label>
															<div class="col-md-9">
																<input type="number" class="form-control" placeholder="" name="int_mobile_no" id="int_mobile_no" >
																<span for="int_mobile_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Alternate Contact</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="int_alt_no" id="int_alt_no">
																<span for="int_alt_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Company Web page</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="int_company_web" id="int_company_web">
																<span for="int_company_web" class="help-block"></span>
															</div>
														</div>
													</div>
													
												</div>
												
											</div>

											<h3 class="form-section alert alert-info">Interaction Details</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Date*</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-5d">
																<input type="text" class="form-control" name="interaction_date" id="interaction_date" value="<?php echo date('d-m-Y'); ?>" readonly>
																<span for="interaction_date" class="help-block"></span>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>

																</div>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Location Interaction*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="location_interaction" id="location_interaction">
																<span for="location_interaction" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Phone Interaction*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="phone_interaction" id="phone_interaction">
																<span for="phone_interaction" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Attendees (Clientside)*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="client_attendees" id="client_attendees">
																<span for="client_attendees" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Attendees (ACI)*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="aci_attendees" id="aci_attendees">
																<span for="aci_attendees" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Purpose Of Meeting*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="purpose_meeting" id="purpose_meeting">
																<span for="purpose_meeting" class="help-block"></span>
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
																<input type="text" class="form-control" name="sales_target" id="sales_target">
																<span for="sales_target" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Specific Issue</label>
															<div class="col-md-9">
																<input type="text" class="form-control" name="specific_issue" id="specific_issue">
																<span for="specific_issue" class="help-block"></span>
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
																<input type="text" class="form-control" name="client_complaint" id="client_complaint">
																<span for="client_complaint" class="help-block"></span>
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
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label col-md-3">Items Discussed</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="items_discussed" id="items_discussed"></textarea>
																<span for="items_discussed" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<!--<label class="control-label col-md-3">Upload Attachment</label>-->
															<div class="col-md-9">
																<!--<span class="btn green fileinput-button">
																	<i class="fa fa-plus"></i>
																<span>
																	 Add files...
																</span>
																<input id='upl_items_discussed' name="upl_items_discussed" type="file" multiple="" />
																</span>-->
																<label for="exampleInputFile" class="col-md-3 control-label">Upload...</label>
																<div class="col-md-9">
																<input type="file" id='upl_items_discussed' name="upl_items_discussed">
																</div>
															<br>
																<span>*Only pdf,doc,xls accepted</span>
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
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label col-md-3">Action points*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="action_points" id="action_points"></textarea>
																<span for="action_points" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<!--<label class="control-label col-md-3">Upload Attachment</label>-->
															<div class="col-md-9">
																<!--<span class="btn green fileinput-button">
																	<i class="fa fa-plus"></i>
																<span>
																	 Add files...
																</span>
																<input id='upl_action_points' name="upl_action_points" type="file" multiple="" />
																</span>-->
																<label for="exampleInputFile" class="col-md-3 control-label">Upload...</label>
																<div class="col-md-9">
																<input type="file" id='upl_action_points' name="upl_action_points">
																</div>
															<br>
																<span>*Only pdf,doc,xls accepted</span>
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
													<div class="col-md-9">
														<div class="form-group">
															
														<label class="control-label col-md-3">Was the purpose of the meeting achieved?*</label>	
							
															<div class="col-md-6">
																<textarea class="form-control" rows="3" name="purpose_acheived" id="purpose_acheived"></textarea>
																<span for="purpose_acheived" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<!--<label class="control-label col-md-3">Upload Attachment</label>-->
															<div class="col-md-9">
																<!--<span class="btn green fileinput-button">
																	<i class="fa fa-plus"></i>
																<span>
																	 Add files...
																</span>
																<input id='upl_purpose' name="upl_purpose" type="file" multiple="" />
															   </span>-->
															   <label for="exampleInputFile" class="col-md-3 control-label">Upload...</label>
																<div class="col-md-9">
																<input type="file" id='upl_purpose' name="upl_purpose">
																</div>
															   <br>
																<span>*Only pdf,doc,xls accepted</span>
																

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
													<div class="col-md-9">
														<div class="form-group">
															
														<label class="control-label col-md-3">What action to be taken to achieve said purpose/target?*</label>	
							
															<div class="col-md-6">
																<textarea class="form-control" rows="3" name="action_acheived" id="action_acheived"></textarea>
																<span for="action_acheived" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<!--<label class="control-label col-md-3">Upload Attachment</label>-->
															<div class="col-md-9">
																<!--<span class="btn green fileinput-button">
																	<i class="fa fa-plus"></i>
																<span>
																	 Add files...
																</span>
																<input id='upl_action' name="upl_action" type="file" multiple="" />
																</span>-->
																<label for="exampleInputFile" class="col-md-3 control-label">Upload...</label>
																<div class="col-md-9">
																<input type="file" id='upl_action' name="upl_action">
																</div>
															<br>
																<span>*Only pdf,doc,xls accepted</span>
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
													<div class="col-md-9">
														<div class="form-group">
															
														<label class="control-label col-md-3">When will Team ACI follow up with client?*</label>	
							
															<div class="col-md-6">
																<textarea class="form-control" rows="3" name="aci_followup" id="aci_followup"></textarea>
																<span for="aci_followup" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<!--<label class="control-label col-md-3">Upload Attachment</label>-->
															<div class="col-md-9">
																<!--<span class="btn green fileinput-button">
																	<i class="fa fa-plus"></i>
																<span>
																	 Add files...
																</span>
																<input id='upl_acifollow' name="upl_acifollow" type="file" multiple="" />
																</span>-->
																<label for="exampleInputFile" class="col-md-3 control-label">Upload...</label>
																<div class="col-md-9">
																<input type="file" id='upl_acifollow' name="upl_acifollow">
																</div>
															<br>
																<span>*Only pdf,doc,xls accepted</span>
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


												<h3 class="form-section alert alert-info">Report Generated By</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Date of Report Filing</label>
															<div class="col-md-9">
																<label class="control-label col-md-6"><?php echo date("d-m-Y H:i:s", strtotime($this->data['report_date'])); ?></label>
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
	

											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>&nbsp;&nbsp;&nbsp;
															<a href="<?php echo BASE_PATH; ?>viewclientinteraction"><button type="button" class="btn default">Cancel</button></a>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
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



			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Client Interaction Form - Edit mode
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
								Edit Client Interaction Form
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
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Edit Client Interaction Form
										</div>
										<div class="actions">
										<a href="<?php echo BASE_PATH; ?>newclientinteraction" class="btn red">
											<i class="fa fa-pencil"></i> Add New Client Interaction
										</a>
										<a href="<?php echo BASE_PATH; ?>viewclientinteraction" class="btn yellow">
											<i class="fa fa-pencil"></i> View All Interactions
										</a>
									    </div>
							        </div>
								</div>
									<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';
											?>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->

										<form action="" method="post" class="form-horizontal newclientinteraction-form" enctype="multipart/form-data">

											
											<?php $rows = $this->data['interaction_data'];
											
											foreach($rows as $interaction_data){
											?>
											<input type="hidden" name="id" id="id" value="<?php echo $interaction_data['id']; ?>">
											<input type="hidden" name="client_id" id="client_id" value="<?php echo $interaction_data['client_id']; ?>">
											<div class="form-body">
												<h3 class="form-section alert alert-info">Client Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Full Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="int_full_name" id="int_full_name" value="<?php echo $interaction_data['full_name']; ?>">
																<span for="int_full_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Job Title</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="int_job_title" id="int_job_title" value="<?php echo $interaction_data['job_title']; ?>">
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
															<label class="control-label col-md-3">Company</label>
															<div class="col-md-9">
															
																<input type="text" class="form-control" placeholder="" name="int_company" id="int_company" value="<?php echo $interaction_data['client_name']; ?>" readonly>
																<span for="int_company" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Office Address</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="int_office_address" id="int_office_address" readonly><?php echo $interaction_data['address']; ?></textarea>
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
																<select class="form-control" name="company_country" id="company_country" disabled>
																<option value="">Select Country</option>	
																	<?php
													                $rows = $this->data['countries'];

													                foreach($rows as $countries){ 
													                    if ($interaction_data['country_id']==$countries["id"]) {
													                    	echo '<option value='.$countries["id"].' selected>'.$countries["name"].'</option>';
													                    } else {
													                		echo '<option value='.$countries["id"].'>'.$countries["name"].'</option>';
													                    }

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
																<select class="form-control" name="company_state" id="company_state" disabled>
																<option value="">Select State</option>
																<?php
													                $rows = $this->data['states'];

													                foreach($rows as $states){ 
													                    if ($interaction_data['state_id']==$states["id"]) {
													                    	echo '<option value='.$states["id"].' selected>'.$states["name"].'</option>';
													                    } else {
													                		echo '<option value='.$states["id"].'>'.$states["name"].'</option>';
													                    }

													                }	
																?>
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
																<select class="form-control" name="company_city" id="company_city" disabled>
																<option value="">Select City</option>
																<?php
													                $rows = $this->data['cities'];

													                foreach($rows as $cities){ 
													                    if ($interaction_data['city_id']==$cities["id"]) {
													                    	echo '<option value='.$cities["id"].' selected>'.$cities["name"].'</option>';
													                    } else {
													                		echo '<option value='.$cities["id"].'>'.$cities["name"].'</option>';
													                    }

													                }	
																?>
																</select>
																<span for="company_city" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Office Number</label>
															<div class="col-md-9">
																<div class="checkbox-list">
																	<label class="checkbox-inline">
																	<input type="number" class="form-control" id="int_office_prefix" name="int_office_prefix" placeholder="Country Code" value="<?php echo $interaction_data['country_code']; ?>" readonly></label>
																	<label class="checkbox-inline">
																	<input type="number" class="form-control" name="int_office_no" id="int_office_no" placeholder="Mobile Number" value="<?php echo $interaction_data['tel_no']; ?>" readonly>
																	</label>
																</div>
																
																<span for="int_office_no" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mobile Number</label>
															<div class="col-md-9">
																<div class="checkbox-list">
																	<label class="checkbox-inline">
																	<input type="number" class="form-control" id="int_mobile_prefix" name="int_mobile_prefix" placeholder="Country Code" value="<?php echo $interaction_data['country_code']; ?>"></label>
																	<label class="checkbox-inline">
																	<input type="number" class="form-control" name="int_mobile_no" id="int_mobile_no" placeholder="Mobile Number" value="<?php echo $interaction_data['mobile_office_number']; ?>">
																	</label>
																</div>
																
																<span for="int_mobile_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email Address</label>
															<div class="col-md-9">
																
																<input type="text" class="form-control" placeholder="" name="int_email_address" id="int_email_address" value="<?php echo $interaction_data['email_address']; ?>">
																<span for="int_email_address" class="help-block"></span>
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
																<div class="checkbox-list">
																	<label class="checkbox-inline">
																	<input type="number" class="form-control" id="int_alt_prefix" name="int_alt_prefix" placeholder="Country Code" value="<?php echo $interaction_data['alt_prefix']; ?>"></label>
																	<label class="checkbox-inline">
																	<input type="number" class="form-control" name="int_alt_no" id="int_alt_no" placeholder="Mobile Number" value="<?php echo $interaction_data['alternate_contact']; ?>">
																	</label>
																</div>
																
																<span for="int_alt_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Company Web page</label>
															<div class="col-md-9">
																
																<input type="text" class="form-control" placeholder="" name="int_company_web" id="int_company_web" value="<?php echo $interaction_data['company_web_page']; ?>">
																<span for="int_company_web" class="help-block"></span>
															</div>
														</div>
													</div>
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
																
																<input type="text" class="form-control" placeholder="" name="interaction_date" id="interaction_date" value="<?php echo $interaction_data['interaction_date']; ?>">
																<span for="interaction_date" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"></label>
															<div class="col-md-9">
																<!--<input type="text" class="form-control" placeholder="" name="location_interaction" id="location_interaction">-->
																<label>
																<input type="checkbox" name="location_interaction" id="location_interaction" <?php if ($interaction_data['location_interaction'] == 'on') { echo 'checked';} ?>>Location Interaction</label>
																<label>
																<input type="checkbox" name="phone_interaction" id="phone_interaction" <?php if ($interaction_data['phone_interaction'] == 'on') { echo 'checked';} ?>>Phone Interaction</label>
																<label>
																<!--<span for="location_interaction" class="help-block"></span>-->
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Attendees (Clientside)</label>
															<div class="col-md-9">
																
																<input type="text" class="form-control" name="client_attendees" id="client_attendees" value="<?php echo $interaction_data['attendees_client_side']; ?>">
																<span for="client_attendees" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Attendees (ACI)</label>
															<div class="col-md-9">
																
																<input type="text" class="form-control" name="aci_attendees" id="aci_attendees" value="<?php echo $interaction_data['attendees_agrimin']; ?>">
																<span for="aci_attendees" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Purpose Meeting</label>
															<div class="col-md-9">
															
																<input type="text" class="form-control" name="purpose_meeting" id="purpose_meeting" value="<?php echo $interaction_data['purpose_of_meeting']; ?>">
																<span for="purpose_meeting" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Sales Target</label>
															<div class="col-md-9">
																
																<input type="text" class="form-control" name="sales_target" id="sales_target" value="<?php echo $interaction_data['sales_target']; ?>">
																<span for="sales_target" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Specific Issue</label>
															<div class="col-md-9">
																
																<input type="text" class="form-control" name="specific_issue" id="specific_issue" value="<?php echo $interaction_data['specific_issue']; ?>">
																<span for="specific_issue" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Client Complaint</label>
															<div class="col-md-9">
																
																<input type="text" class="form-control" name="client_complaint" id="client_complaint" value="<?php echo $interaction_data['client_complant']; ?>">
																<span for="client_complaint" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<!--/row-->
												<div class="row">
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Client Complaint</label>
															<div class="col-md-9">
																
																<input type="text" class="form-control" name="client_complaint" id="client_complaint" value="<?php echo $interaction_data['client_complant']; ?>">
																<span for="client_complaint" class="help-block"></span>
															</div>
														</div>
													</div>-->
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
																
																<textarea class="form-control" rows="3" name="items_discussed" id="items_discussed"><?php echo $interaction_data['summary_of_items_discussed']; ?></textarea>
																<span for="items_discussed" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="form-group">
															<label class="control-label col-md-3">View Attachment</label>
															<div class="col-md-6">
																<input type="hidden" name="hid_summary_of_items_discussed_path" id="hid_summary_of_items_discussed_path" value="<?php echo $interaction_data['summary_of_items_discussed_path']?>"?>
																<label class="control-label col-md-6"><a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['summary_of_items_discussed_path']; ?>"><?php echo $interaction_data['summary_of_items_discussed_path']; ?></a></label>
															</div>
														</div>
															<div class="col-md-9">
																<!--<span class="btn green fileinput-button">
																	<i class="fa fa-plus"></i>
																<span>
																	 Add files...
																</span>
																<input id='upl_items_discussed' name="upl_items_discussed" type="file" multiple="" />
																</span>-->
																<label for="exampleInputFile" class="col-md-3 control-label">Upload...</label>
																<div class="col-md-12">
																<input type="file" id='upl_items_discussed' name="upl_items_discussed">
																</div>
															<br>
																<span>*Only pdf,doc,xls files accepted.Files upto 2MB only accepted</span>
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
														
																<textarea class="form-control" rows="3" name="action_points" id="action_points"><?php echo $interaction_data['summary_of_action_points']; ?></textarea>
																<span for="action_points" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="form-group">
															<label class="control-label col-md-3">View Attachment</label>
															<div class="col-md-6">
																<input type="hidden" name="hid_summary_of_action_points_path" id="hid_summary_of_action_points_path" value="<?php echo $interaction_data['summary_of_action_points_path']?>"?>
																<label class="control-label col-md-6"><a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['summary_of_action_points_path']; ?>"><?php echo $interaction_data['summary_of_action_points_path']; ?></a></label>
															</div>
														</div>
															<div class="col-md-9">
																<!--<span class="btn green fileinput-button">
																	<i class="fa fa-plus"></i>
																<span>
																	 Add files...
																</span>
																<input id='upl_action_points' name="upl_action_points" type="file" multiple="" />
																</span>-->
																<label for="exampleInputFile" class="col-md-3 control-label">Upload...</label>
																<div class="col-md-12">
																<input type="file" id='upl_action_points' name="upl_action_points">
																</div>
															<br>
																<span>*Only pdf,doc,xls files accepted.Files upto 2MB only accepted</span>
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
													<div class="col-md-6">
														<div class="form-group">
															
														<label class="control-label col-md-3">Was the purpose of the meeting achieved?</label>	
							
															<div class="col-md-6">
																
																<textarea class="form-control" rows="3" name="purpose_acheived" id="purpose_acheived"><?php echo $interaction_data['purpose_of_meeting_achieved']; ?></textarea>
																<span for="purpose_acheived" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="form-group">
															<label class="control-label col-md-3">View Attachment</label>
															<div class="col-md-9">
																<input type="hidden" name="hid_purpose_of_meeting_achieved_path" id="hid_purpose_of_meeting_achieved_path" value="<?php echo $interaction_data['purpose_of_meeting_achieved_path']?>"?>
																<label class="control-label col-md-6"><a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['purpose_of_meeting_achieved_path']; ?>" target='_blank'"><?php echo $interaction_data['purpose_of_meeting_achieved_path']; ?></a></label>
															</div>
														</div>
															<div class="col-md-9">
																<!--<span class="btn green fileinput-button">
																	<i class="fa fa-plus"></i>
																<span>
																	 Add files...
																</span>
																<input id='upl_purpose' name="upl_purpose" type="file" multiple="" />
															    </span> -->
															    <label for="exampleInputFile" class="col-md-3 control-label">Upload...</label>
																<div class="col-md-12">
																<input type="file" id="upl_purpose" name="upl_purpose">
																</div>
															      
																<span>*Only pdf,doc,xls files accepted.Files upto 2MB only accepted</span>
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
													<div class="col-md-6">
														<div class="form-group">
															
														<label class="control-label col-md-3">What action to be taken to achieve said purpose/target?</label>	
							
															<div class="col-md-6">
																
																<textarea class="form-control" rows="3" name="action_acheived" id="action_acheived"><?php echo $interaction_data['action_tobe_taken_to_achieve_said_purpose']; ?></textarea>
																<span for="action_acheived" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="form-group">
															<label class="control-label col-md-3">View Attachment</label>
															<div class="col-md-9">
																<input type="hidden" name="hid_action_tobe_taken_to_achieve_said_purpose_path" id="hid_action_tobe_taken_to_achieve_said_purpose_path" value="<?php echo $interaction_data['action_tobe_taken_to_achieve_said_purpose_path']?>"?>
																
																<a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['action_tobe_taken_to_achieve_said_purpose_path']; ?>" target='_blank'"><?php echo $interaction_data['action_tobe_taken_to_achieve_said_purpose_path']; ?></a></label>
															</div>
														</div>
															<div class="col-md-9">
																<!--<span class="btn green fileinput-button">
																	<i class="fa fa-plus"></i>
																<span>
																	 Add files...
																</span>
																<input id='upl_action' name="upl_action" type="file" multiple="" />
																</span> -->
																<label for="exampleInputFile" class="col-md-3 control-label">Upload...</label>
																<div class="col-md-12">
																<input type="file" id="upl_action" name="upl_action">
																</div>
															<br>
																<span>*Only pdf,doc,xls files accepted.Files upto 2MB only accepted</span>
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
													<div class="col-md-6">
														<div class="form-group">
															
														<label class="control-label col-md-3">When will Team ACI follow up with client?</label>	
							
															<div class="col-md-6">
																
																<textarea class="form-control" rows="3" name="aci_followup" id="aci_followup"><?php echo $interaction_data['team_aci_followup_with_client']; ?></textarea>
																<span for="aci_followup" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="form-group">
															<label class="control-label col-md-3">View Attachment</label>
															<div class="col-md-6">
																<input type="hidden" name="hid_team_aci_followup_with_client_path" id="hid_team_aci_followup_with_client_path" value="<?php echo $interaction_data['team_aci_followup_with_client_path']?>"?>
																<label class="control-label col-md-6">

																<a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['team_aci_followup_with_client_path']; ?>" target='_blank'"><?php echo $interaction_data['team_aci_followup_with_client_path']; ?></a></label>
															</div>
														</div>
															<div class="col-md-9">
																<!--<span class="btn green fileinput-button">
																	<i class="fa fa-plus"></i>
																<span>
																	 Add files...
																</span>
																<input id='upl_acifollow' name="upl_acifollow" type="file" multiple="" />
																</span> -->
																<label for="exampleInputFile" class="col-md-3 control-label">Upload...</label>
																<div class="col-md-12">
																<input type="file" id="upl_acifollow" name="upl_acifollow">
																</div>
															<br>
																<span>*Only pdf,doc,xls files accepted.Files upto 2MB only accepted</span>
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
											<?php
										    }
										    ?>

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


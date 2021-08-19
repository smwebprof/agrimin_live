
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					User Info
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
							<a href="<?php echo BASE_PATH; ?>viewusermanagement">
								User Info
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Edit User Info
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
									 User Info
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
											<i class="fa fa-reorder"></i>User Info - Edit
										</div>
										<div class="actions">
								<a href="<?php echo BASE_PATH; ?>viewusermanagement" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View User Management
									</span>
								</a>
								<a href="<?php echo BASE_PATH; ?>edituserdetails?id=<?php echo base64_encode($this->data['user_data'][0]['id']); ?>" class="btn default blue-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 Edit Details
									</span>
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

										<form action="" method="post" class="form-horizontal useremployeemaster-form">
											<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';	
											?>
											<?php $rows = $this->data['user_data'];
											
											foreach($rows as $user_data){
											?>
											<input type="hidden" name="id" id="id" value="<?php echo $user_data['id']; ?>">
											<div class="form-body">
												<h3 class="form-section">User Info</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">For Company*</label>
															<div class="col-md-9">
																<select class="form-control" name="user_company" id="user_company">
																<option value="">Select Company</option>	
																	<?php
													                $rows = $this->data['company_data'];

													                foreach($rows as $company_data){ 
													                	if ($user_data['company_id']==$company_data["id"]) {
													                	echo '<option value='.$company_data["id"].' selected>'.$company_data["name"].'</option>';
													                	} else {
													                		echo '<option value='.$company_data["id"].'>'.$company_data["name"].'</option>';
													                	}

													                }	
																	?>
																</select>
																<span for="user_company" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Branch Name*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="branch_name" id="branch_name">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['branchs_data'];

													                foreach($rows as $branchs_data){ 
													                	if ($user_data['branch_id']==$branchs_data["id"]) {
													                    	echo '<option value='.$branchs_data["id"].' selected>'.$branchs_data["branch_name"].'</option>';
													                    } else {
													                		echo '<option value='.$branchs_data["id"].'>'.$branchs_data["branch_name"].'</option>';
													                    }

													                }	
																	?>


																</select>
																<span for="client_branch" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
							
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">First Name*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="first_name" id="first_name" value="<?php echo $user_data['first_name']; ?>">
																<span for="first_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Middle Name*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="middle_name" id="middle_name" value="<?php echo $user_data['middle_name']; ?>">
																<span for="middle_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Last Name*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="last_name" id="last_name" value="<?php echo $user_data['last_name']; ?>">
																<span for="last_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Current Address*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="curr_address" id="curr_address"><?php echo $user_data['current_address']; ?></textarea>
																<span for="curr_address" class="help-block"></span>
																<input type="checkbox" id="filladdress" name="filladdress"/>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Permanent Address*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="perm_address" id="perm_address"><?php echo $user_data['permanent_address']; ?></textarea>
																<span for="perm_address" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Country*</label>
															<div class="col-md-9">
																<select class="form-control" name="company_country" id="company_country">
																<option value="">Select Country</option>	
																	<?php
													                $rows = $this->data['countries'];

													                foreach($rows as $countries){ 
													                    if ($user_data['country_id']==$countries["id"]) {
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
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">State*</label>
															<div class="col-md-9">
																<select class="form-control" name="company_state" id="company_state">
																<option value="">Select State</option>
																<?php
													                $rows = $this->data['states'];

													                foreach($rows as $states){ 
													                    if ($user_data['state_id']==$states["id"]) {
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
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">City*</label>
															<div class="col-md-9">
																<select class="form-control" name="company_city" id="company_city">
																<option value="">Select City</option>
																<?php
													                $rows = $this->data['cities'];

													                foreach($rows as $cities){ 
													                    if ($user_data['city_id']==$cities["id"]) {
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
												</div>
												<!--/row-->
												<div class="row">	
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Birth Date*</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-70y">
																<input type="text" class="form-control" name="birth_date" id="birth_date" value="<?php echo date('d-m-Y',strtotime($user_data['birth_date'])); ?>" readonly>
																<span for="birth_date" class="help-block"></span>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
															</div>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Office Email*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="office_mail" id="office_mail" value="<?php echo $user_data['office_email']; ?>">
																<span for="office_mail" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">	
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Personal Email*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="person_mail" id="person_mail" value="<?php echo $user_data['personal_email']; ?>">
																<span for="person_mail" class="help-block"></span>
															</div>
														</div>
													</div>
													
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Password*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="user_pass" id="user_pass" value="<?php echo $this->data['user_pass']; ?>">
																<span for="user_pass" class="help-block"></span>
															</div>
														</div>
													</div>*/ ?>
												</div>
												<!--/row-->
												<div class="row">	
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Gender*</label>
															<div class="col-md-9">
																<select class="form-control" name="user_gender" id="user_gender">
																	<option value="">Please Select</option>
																	<option value="Male" <?php if ($user_data['gender']=='Male') { echo 'selected';  } ?>>Male</option>
																	<option value="Female" <?php if ($user_data['gender']=='Female') { echo 'selected';  } ?>>Female</option>
																</select>
																<span for="user_gender" class="help-block"></span>
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mobile No*</label>
															<div class="col-md-9">
																<label class="checkbox-inline">
																	<input type="number" class="form-control" id="client_tel_prefix" name="client_tel_prefix" placeholder="Country Code" style="width:70px;" value="<?php echo $user_data['country_code']; ?>" readonly>
																    </label>
																	<label class="checkbox-inline">
																	<input type="number" class="form-control" name="mobile_no" id="mobile_no" placeholder="Telephone No" value = "<?php echo $user_data['moblie_no']; ?>">
																	</label>
																	<span for="mobile_no" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->	
												<div class="row">	
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">PAN No \ Tax Id*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="pan_no" id="pan_no" value="<?php echo $user_data['pan_no_tax_id']; ?>">
																<span for="pan_no" class="help-block"></span>
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Aadhar No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="uidaino" id="uidaino" value="<?php echo $user_data['uidaino_aadhar_card']; ?>">
																<span for="uidaino" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->	
												<div class="row">	
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Employee Type*</label>
															<div class="col-md-9">
																<select class="form-control" name="employee_staff" id="employee_staff">
																	<option value="">Please Select</option>
																	<option value="Office Staff" <?php if ($user_data['employee_staff']=='Office Staff') { echo 'selected';  } ?>>Office Staff</option>
																	<option value="Dock Staff" <?php if ($user_data['employee_staff']=='Dock Staff') { echo 'selected';  } ?>>Dock Staff</option>
																	<option value="Admin" <?php if ($user_data['employee_staff']=='Admin') { echo 'selected';  } ?>>Admin</option>
																	<option value="Custom" <?php if ($user_data['employee_staff']=='Custom') { echo 'selected';  } ?>>Custom</option>
															</select>
															<span for="employee_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Designation*</label>
															<div class="col-md-9">
																<select class="form-control" name="designation_id" id="designation_id">
																<option value="">Select Designation</option>
																<?php
													                $rows = $this->data['designation_data'];

													                foreach($rows as $designation){ 
													                    if ($user_data['emp_designation_id']==$designation["id"]) {
													                    	echo '<option value='.$designation["id"].' selected>'.$designation["designation_name"].'</option>';
													                    } else {
													                		echo '<option value='.$designation["id"].'>'.$designation["designation_name"].'</option>';
													                    }

													                }	
																?>
																</select>
																<span for="designation_id" class="help-block"></span>
															</div>
														</div>
													</div>

													
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Password*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="user_pass" id="user_pass" value="<?php echo $user_data['password']; ?>">
																<span for="user_pass" class="help-block"></span>
															</div>
														</div>
													</div>*/ ?>
												</div>
												<!--/row-->		
													<!--/span-->
													
												</div>
												<?php
												}
												?>
												
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<a href="<?php echo BASE_PATH;?>viewusermanagement"><button type="button" class="btn default">Cancel</button></a>
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


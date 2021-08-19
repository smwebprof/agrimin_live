<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-6 ">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i> Add User
							</div>
							<div class="actions">
								<a href="<?php echo BASE_PATH; ?>Viewusermanagement" class="btn red">
								<i class="fa fa-pencil"></i> View User Management
								</a>
							</div>
							<!--<div class="tools">
								<a href="" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="" class="reload">
								</a>
								<a href="" class="remove">
								</a>
							</div>-->
						</div>
						<div class="portlet-body form">
							<form role="form" action="" method="post" class="useremployeemaster-form">
								<input type="hidden" name="addusers" id="addusers" value="addusers">
								<div class="form-body">
									<div class="form-group">
										<label class="control-label">Company Name</label>
															<select class="form-control" name="user_company" id="user_company">
																<option value="">Select Company</option>	
																	<?php
													                $rows = $this->data['company_data'];

													                foreach($rows as $company_data){ 
													                	echo '<option value='.$company_data["id"].'>'.$company_data["name"].'</option>';

													                }	
																	?>
																</select>
																<span for="user_company" class="help-block"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Branch Name</label>
															<select class="form-control" name="branch_name" id="branch_name">
															<option value="">Select Branch</option>
															</select>
															<span for="branch_name" class="help-block"></span>
									</div>
									<div class="form-group">
										<label class="control-label">First Name</label>
															<input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
															<span for="first_name" class="help-block"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Middle Name</label>
															<input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="">
															<span for="middle_name" class="help-block"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Last Name</label>
															<input type="text" name="last_name" id="last_name" class="form-control" placeholder="">
															<span for="last_name" class="help-block"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Current Address</label>
															<textarea class="form-control" rows="3" name="curr_address" id="curr_address"></textarea>
															<span for="curr_address" class="help-block"></span>
															<input type="checkbox" id="filladdress" name="filladdress"/>
									</div>
									<div class="form-group">
										<label class="control-label">Permanent Address</label>
															<textarea class="form-control" rows="3" name="perm_address" id="perm_address"></textarea>
															<span for="perm_address" class="help-block"></span>
									</div>
									<div class="form-group">
										<select class="form-control" name="company_country" id="company_country">
																<option value="">Select Country</option>	
																	<?php
													                $rows = $this->data['country_data'];

													                foreach($rows as $countries){ 
													                	echo '<option value='.$countries["id"].'>'.$countries["name"].'</option>';

													                }	
																	?>
																</select>
																<span for="company_country" class="help-block"></span>
									</div>

									<div class="form-group">
										<select class="form-control" name="company_state" id="company_state">
																<option value="">Select State</option>
																</select>
																<span for="company_state" class="help-block"></span>
									</div>

									<div class="form-group">
										<select class="form-control" name="company_city" id="company_city">
																<option value="">Select City</option>
																</select>
																<span for="company_city" class="help-block"></span>
									</div>
									
									<div class="form-group">
										<label class="control-label">Birth Date</label>
															<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-70y">
																<input type="text" class="form-control" name="birth_date" id="birth_date" value="" readonly>
																<span for="birth_date" class="help-block"></span>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
															</div>
									</div>
									<div class="form-group">
										<label class="control-label">Office Email</label>
															<input type="text" name="office_mail" id="office_mail" class="form-control" placeholder="">
															<span for="office_mail" class="help-block"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Personal Email</label>
															<input type="text" name="person_mail" id="person_mail" class="form-control" placeholder="">
															<span for="person_mail" class="help-block"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Password</label>
															<input type="text" name="user_pass" id="user_pass" minlength="6" maxlength="12" class="form-control" placeholder="" >
															<span>*Password should be 6 characters</span>
															<span for="user_pass" class="help-block"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Gender</label>
															<select class="form-control" name="user_gender" id="user_gender">
																	<option value="">Please Select</option>
																	<option value="Male">Male</option>
																	<option value="Female">Female</option>
															</select>
															<span for="user_gender" class="help-block"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Mobile No</label><br/>
																	<label class="checkbox-inline">
																	<!--<input type="number" class="form-control" id="country_code" name="country_code" placeholder="Country Code" style="width:200px;" value = "">-->
																	<select class="form-control" name="country_code" id="country_code">
																	</select>
																    </label>
																	<label class="checkbox-inline">
																	<input type="number" class="form-control" name="mobile_no" id="mobile_no" placeholder="Telephone No" value = "">
																	</label>
																	<span for="mobile_no" class="help-block"></span>
									</div>
									<div class="form-group">
										<label class="control-label">PAN No \ Tax Id</label>
															<input type="text" name="pan_no" id="pan_no" class="form-control" placeholder="">
															<span for="pan_no" class="help-block"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Aadhar No</label>
															<input type="text" name="uidaino" id="uidaino" class="form-control" placeholder="">
															<span for="uidaino" class="help-block"></span>
									</div>
									<div class="form-group">
															<label class="control-label">Employee Type</label>
															<select class="form-control" name="employee_staff" id="employee_staff">
																	<option value="">Please Select</option>
																	<option value="Office Staff">Office Staff</option>
																	<option value="Dock Staff">Dock Staff</option>
																	<option value="Admin">Admin</option>
																	<option value="Custom">Custom</option>
															</select>
															<span for="employee_staff" class="help-block"></span>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Designation</label>
										<select class="form-control" name="designation_id" id="designation_id">
																<option value="">Select Designation</option>	
																	<?php
													                $rows = $this->data['designation_data'];

													                foreach($rows as $designation){ 
													                	echo '<option value='.$designation["id"].'>'.$designation["designation_name"].'</option>';

													                }	
																	?>
																</select>
										<span for="designation_id" class="help-block"></span>
									</div>
									
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn blue">Submit</button>
										<a href="<?php echo BASE_PATH; ?>Viewusermanagement"><button type="button" class="btn default">Cancel</button></a>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
					
					
				</div>
				<div class="col-md-6 ">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box green ">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i> Add User Details
							</div>
							<!--<div class="tools">
								<a href="" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="" class="reload">
								</a>
								<a href="" class="remove">
								</a>
							</div>-->
						</div>
						<div class="portlet-body form">
							
							<form role="form" action="" method="post" class="form-horizontal useremployeedetails-form">
							<input type="hidden" name="adduserdetails" id="adduserdetails" value="adduserdetails">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Select User</label>
										<div class="col-md-9">
											<select class="form-control input-large select2me" data-placeholder="Select..." name="user_data" id="user_data">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['user_data'];

													                foreach($rows as $user_data){ 
													                	echo '<option value='.$user_data["id"].'>'.$user_data["first_name"] .'</option>';

													                }	
																	?>
																</select>
																<span for="user_data" class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Qualification Type</label>
										<div class="col-md-9">
											<select class="form-control input-large select2me" data-placeholder="Select..." name="qualification_type_id" id="qualification_type_id">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['qualifications_data'];

													                foreach($rows as $qualifications_data){ 
													                	echo '<option value='.$qualifications_data["id"].'>'.$qualifications_data["name"] .'</option>';

													                }	
																	?>
																</select>
											<span for="qualification_type_id" class="help-block"></span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Martial Status</label>
										<div class="col-md-9">
											<select class="form-control" name="marital_status" id="marital_status">
																	<option value="">Please Select</option>
																	<option value="Married">Married</option>
																	<option value="Unmarried">Unmarried</option>
																	<option value="Divorced">Divorced</option>
															</select>
											<span for="marital_status" class="help-block"></span>
										</div>									
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Nationality</label>
										<div class="col-md-9">
											<select class="form-control" name="nationality_id" id="nationality_id">
																<option value="">Select Country</option>	
																	<?php
													                $rows = $this->data['country_data'];

													                foreach($rows as $countries){ 
													                	echo '<option value='.$countries["id"].'>'.$countries["name"].'</option>';

													                }	
																	?>
																</select>
											<span for="nationality_id" class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Nomination Name</label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Enter text" name="nominee_name" id="nominee_name">
											<span for="nominee_name" class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Department</label>
										<div class="col-md-9">
											<select class="form-control" name="department_id" id="department_id">
																<option value="">Select Department</option>	
																	<?php
													                $rows = $this->data['departments_data'];

													                foreach($rows as $departments){ 
													                	echo '<option value='.$departments["id"].'>'.$departments["name"].'</option>';

													                }	
																	?>
																</select>
											<span for="department_id" class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Effective From</label>
										<div class="col-md-9">
											<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-12m">
											<input type="text" class="form-control" name="effective_from" id="effective_from" value="<?php echo date('d-m-Y'); ?>"readonly>
											<span for="interaction_date" class="help-block"></span>
											<span class="input-group-btn">
											<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
											<span for="effective_from" class="help-block"></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Leave Approval</label>
										<div class="col-md-9">
											<select class="form-control input-large select2me" data-placeholder="Select..." name="leave_approver_reporting_id" id="leave_approver_reporting_id">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['user_data'];

													                foreach($rows as $user_data){ 
													                	echo '<option value='.$user_data["id"].'>'.$user_data["first_name"] .'</option>';

													                }	
																	?>
																</select>
											<span for="leave_approver_reporting_id" class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Bank Account</label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Enter text" name="company_bank_account_name" id="company_bank_account_name">
											<span for="company_bank_account_name" class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Bank Account No</label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Enter text" name="company_bank_account_no" id="company_bank_account_no">
											<span for="company_bank_account_no" class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Bank Account Type</label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Enter text" name="company_bank_account_type" id="company_bank_account_type">
											<span for="company_bank_account_type" class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Bank Account Address</label>
										<div class="col-md-9">
											<textarea class="form-control" rows="3" name="company_bank_account_address" id="company_bank_account_address"></textarea>
											<span for="company_bank_account_address" class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Personal Bank Account</label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Enter text" name="personal_bank_account_name" id="personal_bank_account_name">
											<span for="personal_bank_account_name" class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Personal Bank Address</label>
										<div class="col-md-9">
											<textarea class="form-control" rows="3" name="personal_bank_account_address" id="personal_bank_account_address"></textarea>
											<span for="personal_bank_account_personal_bank_account_addressaddress" class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Personal Bank No</label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Enter text" name="personal_bank_account_no" id="personal_bank_account_no">
											<span for="personal_bank_account_no" class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Personal Bank Account Type</label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Enter text" name="personal_bank_account_type" id="personal_bank_account_type">
											<span for="personal_bank_account_type" class="help-block"></span>
										</div>
									</div>
									
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn green">Submit</button>
										<a href="<?php echo BASE_PATH; ?>Viewusermanagement"><button type="button" class="btn default">Cancel</button></a>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
					
					
					
					
					
					
				</div>
			</div>
			
			<!-- END PAGE CONTENT-->
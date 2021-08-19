
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					User Details
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
								User Details
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Edit User Details
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
									User Details
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
											<i class="fa fa-reorder"></i>User Details - Edit
										</div>
										<div class="actions">
								<a href="<?php echo BASE_PATH; ?>viewusermanagement" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View User Management
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

										<form action="" method="post" class="form-horizontal useremployeedetails-form">
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
												<h3 class="form-section">User Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">User Name*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="first_name" id="first_name" value="<?php echo $user_data['first_name']; ?>" readonly>
																<span for="first_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Qualification Type</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="qualification_type_id" id="qualification_type_id">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['qualifications_data'];

													                foreach($rows as $qualifications_data){
													                	if ($user_data['qualification_type_id']==$qualifications_data["id"]) { 
													                		echo '<option value='.$qualifications_data["id"].' selected>'.$qualifications_data["name"] .'</option>';
													                	} else {
													                		echo '<option value='.$qualifications_data["id"].'>'.$qualifications_data["name"] .'</option>';
													                	}  												                	

													                }	
																	?>
																</select>
																<span for="qualification_type_id" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
							
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Martial Status*</label>
															<div class="col-md-9">
																<select class="form-control" name="marital_status" id="marital_status">
																	<option value="">Please Select</option>
																	<option value="Married" <?php if ($user_data['marital_status']=='Married') { echo 'selected'; } ?>>Married</option>
																	<option value="Unmarried" <?php if ($user_data['marital_status']=='Unmarried') { echo 'selected'; } ?>>Unmarried</option>
																	<option value="Divorced" <?php if ($user_data['marital_status']=='Divorced') { echo 'selected'; } ?>>Divorced</option>
																</select>
																<span for="marital_status" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Nationality*</label>
															<div class="col-md-9">
																<select class="form-control" name="nationality_id" id="nationality_id">
																<option value="">Select Country</option>	
																	<?php
													                $rows = $this->data['countries'];

													                foreach($rows as $countries){ 
													                    if ($user_data['nationality_id']==$countries["id"]) {
													                    	echo '<option value='.$countries["id"].' selected>'.$countries["name"].'</option>';
													                    } else {
													                		echo '<option value='.$countries["id"].'>'.$countries["name"].'</option>';
													                    }

													                }	
																	?>
																</select>
																<span for="nationality_id" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Nomination Name*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Enter text" name="nominee_name" id="nominee_name" value="<?php echo $user_data['nominee_name']; ?>">
																<span for="nominee_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Department*</label>
															<div class="col-md-9">
																<select class="form-control" name="department_id" id="department_id">
																<option value="">Select Department</option>	
																	<?php
													                $rows = $this->data['departments_data'];

													                foreach($rows as $departments){
													                	if ($user_data['department_id']==$departments["id"]) {
													                		echo '<option value='.$departments["id"].' selected>'.$departments["name"].'</option>';
													                	} else { 
													                		echo '<option value='.$departments["id"].'>'.$departments["name"].'</option>';
													                	}	

													                }	
																	?>
																</select>
																<span for="department_id" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Effective From*</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-12m">
																<input type="text" class="form-control" name="effective_from" id="effective_from" value="<?php echo date('d-m-Y',strtotime($user_data['effective_from'])); ?>"readonly>
																<span for="interaction_date" class="help-block"></span>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
																<span for="effective_from" class="help-block"></span>
																</div>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Leave Approval</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="leave_approver_reporting_id" id="leave_approver_reporting_id">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['users'];

													                foreach($rows as $users){ 
													                	if ($users["id"]==$user_data['leave_approver_reporting_id']) {
													                		echo '<option value='.$users["id"].' selected>'.$users["first_name"] .'</option>';
													                	} else {
													                		echo '<option value='.$users["id"].'>'.$users["first_name"] .'</option>';
													                	}
													                	

													                }	
																	?>
																</select>
																<span for="leave_approver_reporting_id" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bank Account</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Enter text" name="company_bank_account_name" id="company_bank_account_name" value="<?php echo $user_data['company_bank_account_name']; ?>">
																<span for="company_bank_account_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bank Account No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Enter text" name="company_bank_account_no" id="company_bank_account_no" value="<?php echo $user_data['company_bank_account_no']; ?>">
																<span for="company_bank_account_no" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">	
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bank Account Type*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Enter text" name="company_bank_account_type" id="company_bank_account_type" value="<?php echo $user_data['company_bank_account_type']; ?>">
																<span for="company_bank_account_type" class="help-block"></span>
															</div>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bank Account Address*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="company_bank_account_address" id="company_bank_account_address"><?php echo $user_data['company_bank_account_address']; ?></textarea>
																<span for="company_bank_account_address" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">	
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Personal Bank Account*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Enter text" name="personal_bank_account_name" id="personal_bank_account_name" value="<?php echo $user_data['personal_bank_account_name']; ?>">
																<span for="personal_bank_account_name" class="help-block"></span>
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Personal Bank Address</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="personal_bank_account_address" id="personal_bank_account_address"><?php echo $user_data['personal_bank_account_address']; ?></textarea>
															<span for="personal_bank_account_personal_bank_account_addressaddress" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">	
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Personal Bank No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Enter text" name="personal_bank_account_no" id="personal_bank_account_no" value="<?php echo $user_data['personal_bank_account_no']; ?>">
																<span for="personal_bank_account_no" class="help-block"></span>
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Personal Bank Account Type*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Enter text" name="personal_bank_account_type" id="personal_bank_account_type" value="<?php echo $user_data['personal_bank_account_type']; ?>">
																<span for="personal_bank_account_type" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->	
												
													
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


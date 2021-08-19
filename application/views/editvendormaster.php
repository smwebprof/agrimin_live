
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Vendor Master
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
							<a href="<?php echo BASE_PATH; ?>viewvendormaster">
								Vendor Master
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Editvendormaster
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
									 Vendor Master
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
											<i class="fa fa-reorder"></i>Vendor Master - Edit
										</div>
										<div class="actions">
								<a href="<?php echo BASE_PATH; ?>Viewvendormaster" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Vendor Master
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

										<form action="" method="post" class="form-horizontal vendormaster-form">
											<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';	
											?>
											<?php $rows = $this->data['vendor_data'];
											
											foreach($rows as $vendor_data){
											?>
											<input type="hidden" name="id" id="id" value="<?php echo $vendor_data['id']; ?>">
											<div class="form-body">
												<h3 class="form-section">Client Details</h3>
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Vendor Name*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="vendor_name" id="vendor_name" value="<?php echo $vendor_data['vendor_name']; ?>">
																<span for="vendor_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Vendor Type*</label>
															<div class="col-md-9">

																<select class="form-control" name="vendor_type" id="vendor_type">
																	<option value="">Please Select</option>
																	<?php foreach ($vendor_type as $key => $value) { ?>
																		<option value="<?php echo $value['id']; ?>" <?php if ($vendor_data['vendor_type']==$value['id']) { echo 'selected';} ?>><?php echo $value['vendor_type']; ?></option>
																	<?php } ?>
																</select>
																<span for="vendor_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="vendor_address" id="vendor_address"><?php echo $vendor_data['address']; ?></textarea>
																<span for="vendor_address" class="help-block"></span>
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
													                    if ($vendor_data['country_id']==$countries["id"]) {
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
													                    if ($vendor_data['state_id']==$states["id"]) {
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
													                    if ($vendor_data['city_id']==$cities["id"]) {
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
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Postal Code*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="postal_code" id="postal_code" value="<?php echo $vendor_data['zip_pin_code']; ?>">
																<span for="postal_code" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">City*</label>
															<div class="col-md-9">
																<select class="form-control" name="company_city" id="company_city">
																<option value="">Select City</option>
																<?php
													                $rows = $this->data['cities'];

													                foreach($rows as $cities){ 
													                    if ($vendor_data['city_id']==$cities["id"]) {
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
													</div>*/ ?>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Telephone No*</label>
															<div class="col-md-9">
																<label class="checkbox-inline">
																	<input type="number" class="form-control" id="vendor_tel_prefix" name="vendor_tel_prefix" placeholder="Country Code" style="width:70px;" value="<?php echo $vendor_data['country_code']; ?>" readonly></label>
																	<label class="checkbox-inline">
																	<input type="text" class="form-control" name="vendor_tel" id="vendor_tel" placeholder="Telephone No" value="<?php echo $vendor_data['tel_no']; ?>">
																	</label>
																<span for="vendor_tel" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email Address*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="vendor_email" id="vendor_email" value="<?php echo $vendor_data['email_address']; ?>">
																<span for="vendor_email" class="help-block"></span>
															</div>
														</div>
													</div>
													<?php if ($_SESSION['branch_name'] == 'India') { ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">GST No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="vendor_gst" id="vendor_gst" value="<?php echo $vendor_data['gst_no']; ?>">
																<span for="vendor_gst" class="help-block"></span>
															</div>
														</div>
													</div>
													<?php } ?>
													<?php if ($_SESSION['branch_name'] != 'India') { ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">VAT No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="vendor_vat" id="vendor_vat" value="<?php echo $vendor_data['vat_no']; ?>">
																<span for="vendor_vat" class="help-block"></span>
															</div>
														</div>
													</div>
													<?php } ?>
													<?php if ($_SESSION['branch_name'] == 'India') { ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">TAN No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="vendor_tan" id="vendor_tan" value="<?php echo $vendor_data['tan_no']; ?>">
																<span for="vendor_tan" class="help-block"></span>
															</div>
														</div>
													</div>
													<?php } ?>
													<?php /*if ($_SESSION['branch_name'] == 'India') { ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">TAN No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_tan" id="client_tan" value="<?php echo $vendor_data['tan_no']; ?>">
																<span for="client_tan" class="help-block"></span>
															</div>
														</div>
													</div>
													<?php } */ ?>
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Client Of Branch*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="branch_name" id="branch_name">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['branchs_data'];

													                foreach($rows as $branchs_data){ 
													                	if ($vendor_data['client_of_branch']==$branchs_data["id"]) {
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
													</div> */ ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mobile No</label>
															<div class="col-md-9">
																<label class="checkbox-inline">
																	<input type="number" class="form-control" id="vendor_mobile_prefix" name="vendor_mobile_prefix" placeholder="Country Code" style="width:70px;" value="<?php echo $vendor_data['country_code']; ?>" readonly></label>
																	<label class="checkbox-inline">
																	<input type="text" class="form-control" name="vendor_mobile" id="vendor_mobile" placeholder="Telephone No" value="<?php echo $vendor_data['mobile_no']; ?>">
																	</label>
																<span for="vendor_mobile" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Firm Type*</label>
															<div class="col-md-9">
																
																<select class="form-control" name="vendor_firm" id="vendor_firm">
																	<option value="">Please Select</option>
																	<option value="Proprietor" <?php if ($vendor_data['firm_type']=='Proprietor') { echo 'selected';} ?>>Proprietor</option>
																	<option value="Private" <?php if ($vendor_data['firm_type']=='Private') { echo 'selected';} ?>>Private</option>
																	<option value="Public" <?php if ($vendor_data['firm_type']=='Public') { echo 'selected';} ?>>Public</option>
																	<option value="PrivateIndividual" <?php if ($vendor_data['firm_type']=='PrivateIndividual') { echo 'selected';} ?>>PrivateIndividual</option>
																	<option value="LLP" <?php if ($vendor_data['firm_type']=='LLP') { echo 'selected';} ?>>LLP</option>
																	<option value="Enterprises" <?php if ($vendor_data['firm_type']=='Enterprises') { echo 'selected';} ?>>Enterprises</option>
																	<option value="Government" <?php if ($vendor_data['firm_type']=='Government') { echo 'selected';} ?>>Government</option>
																	<option value="Trust" <?php if ($vendor_data['firm_type']=='Trust') { echo 'selected';} ?>>Trust</option>
																	<option value="Partnership" <?php if ($vendor_data['firm_type']=='Partnership') { echo 'selected';} ?>>Partnership</option>
																	<option value="Statutory Body" <?php if ($vendor_data['firm_type']=='Statutory Body') { echo 'selected';} ?>>Statutory Body</option>
																	<option value="Banking and Financial Services" <?php if ($vendor_data['firm_type']=='Banking and Financial Services') { echo 'selected';} ?>>Banking and Financial Services</option>
																	<option value="Hindu Undivided Family" <?php if ($vendor_data['firm_type']=='Hindu Undivided Family') { echo 'selected';} ?>>Hindu Undivided Family</option>
																	<option value="Co-operative Society" <?php if ($vendor_data['firm_type']=='Co-operative Society') { echo 'selected';} ?>>Co-operative Society</option>
																	<option value="Joint Ventures" <?php if ($vendor_data['firm_type']=='Joint Ventures') { echo 'selected';} ?>>Joint Ventures</option>
																	<option value="Others" <?php if ($vendor_data['firm_type']=='Others') { echo 'selected';} ?>>Others</option>
																</select>
																<span for="vendor_firm" class="help-block"></span>
															</div>
														</div>
													</div>
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
															<a href="<?php echo BASE_PATH;?>Viewvendormaster"><button type="button" class="btn default">Cancel</button></a>
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


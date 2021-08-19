
			
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
								AddVendormaster
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
									 Add Vendors
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
											<i class="fa fa-reorder"></i>Vendor Master Form
										</div>
										<div class="actions">
								<a href="<?php echo BASE_PATH; ?>viewvendormaster" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Vendors
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
											<div class="form-body">
												<h3 class="form-section">Vendor Details</h3>
												<?php /*<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"> For Company*</label>
															<div class="col-md-9">
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
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Branch Name*</label>
															<div class="col-md-9">
																<select class="form-control" name="branch_name" id="branch_name">
																<option value="">Select Branch Name</option>	
																</select>
																<span for="branch_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
													
												</div>*/ ?>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Vendor Name*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="vendor_name" id="vendor_name">
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
																		<option value="<?php echo $value['id']; ?>"><?php echo $value['vendor_type']; ?></option>
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
																<textarea class="form-control" rows="3" name="vendor_address" id="vendor_address"></textarea>
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
													                	echo '<option value='.$countries["id"].'>'.$countries["name"].'</option>';

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
																<input type="text" class="form-control" placeholder="" name="postal_code" id="postal_code">
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
																	<input type="number" class="form-control" id="client_tel_prefix" name="client_tel_prefix" placeholder="Country Code" style="width:70px;" readonly></label>
																	<label class="checkbox-inline">
																	<input type="text" class="form-control" name="client_tel" id="client_tel" placeholder="Telephone No">
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
																<input type="text" class="form-control" placeholder="" name="vendor_email" id="vendor_email">
																<span for="vendor_email" class="help-block"></span>
															</div>
														</div>
													</div>
													<?php if ($_SESSION['branch_name'] == 'India') { ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">GST No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="vendor_gst" id="vendor_gst">
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
																<input type="text" class="form-control" placeholder="" name="vendor_vat" id="vendor_vat">
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
																<input type="text" class="form-control" placeholder="" name="vendor_tan" id="vendor_tan">
																<span for="vendor_tan" class="help-block"></span>
															</div>
														</div>
													</div>
													<?php } ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mobile No</label>
															<div class="col-md-9">
																<label class="checkbox-inline">
																	<input type="number" class="form-control" id="client_mobile_prefix" name="client_mobile_prefix" placeholder="Country Code" style="width:70px;" readonly></label>
																	<label class="checkbox-inline">
																	<input type="text" class="form-control" name="client_mobile" id="client_mobile" placeholder="Telephone No" maxlength="10">
																	</label>
																<span for="vendor_mobile" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Client Of Branch*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="branch_name" id="branch_name">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['branchs_data'];

													                foreach($rows as $branchs_data){ 
													                	echo '<option value='.$branchs_data["id"].'>'.$branchs_data["branch_name"].'</option>';

													                }	
																	?>
																</select>
																<span for="client_branch" class="help-block"></span>
															</div>
														</div>
													</div> */ ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Firm Type*</label>
															<div class="col-md-9">
																
																<select class="form-control" name="vendor_firm" id="vendor_firm">
																	<option value="">Please Select</option>
																	<option value="Proprietor">Proprietor</option>
																	<option value="Private">Private</option>
																	<option value="Public">Public</option>
																	<option value="PrivateIndividual">PrivateIndividual</option>
																	<option value="LLP">LLP</option>
																	<option value="Enterprises">Enterprises</option>
																	<option value="Government">Government</option>
																	<option value="Trust">Trust</option>
																	<option value="Partnership">Partnership</option>
																	<option value="Statutory Body">Statutory Body</option>
																	<option value="Banking and Financial Services">Banking and Financial Services</option>
																	<!--<option value="Hindu Undivided Family">Hindu Undivided Family</option>-->
																	<option value="Co-operative Society">Co-operative Society</option>
																	<option value="Joint Ventures">Joint Ventures</option>
																	<option value="Others">Others</option>
																</select>
																<span for="vendor_firm" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Firm Type*</label>
															<div class="col-md-9">
																
																<select class="form-control" name="client_firm" id="client_firm">
																	<option value="">Please Select</option>
																	<option value="Propreiter">Propreiter</option>
																	<option value="Private">Private</option>
																	<option value="Public">Public</option>
																	<option value="PrivateIndividual">PrivateIndividual</option>
																	<option value="LLP">LLP</option>
																	<option value="Enterprises">Enterprises</option>
																	<option value="Government">Government</option>
																	<option value="Trust">Trust</option>
																	<option value="Partnership">Partnership</option>
																	<option value="Statutory Body">Statutory Body</option>
																	<option value="Banking and Financial Services">Banking and Financial Services</option>
																	<option value="Hindu Undivided Family">Hindu Undivided Family</option>
																	<option value="Co-operative Society">Co-operative Society</option>
																	<option value="Joint Ventures">Joint Ventures</option>
																	<option value="Others">Others</option>
																</select>
																<span for="client_firm" class="help-block"></span>
															</div>
														</div>
													</div> */ ?>
													<!--/span-->
												</div>

												
											</div>
                                            
                                            <?php /*
											<h3 class="form-section alert alert-info">Contact Details</h3>

												<!--/row-->
												<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
													
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover">
															<thead>
															<tr>
																<th>
																	 Prefix
																</th>
																<th>
																	 Contact Person Name
																</th>	
																<th>
																	 Mobile No
																</th>
																<th>
																	 Email Address
																</th>
																<th>
																	 Primary/Secondary
																</th>
															</tr>
															</thead>
															<tbody>
															<tr class="active">
																<td>
																	 <select class="form-control" name="div_contact_prefix[]" id="div1_contact_prefix">
																	 <option value="">Please Select</option>
																	 <option value="Mr">Mr</option>
																	 <option value="Miss">Miss</option>
																	 </select>
																</td>
																<td>
																	<input type="text" class="form-control input-medium" id="div1_contact_name" name="div_contact_name[]" value="">
																</td>		
																<td>
																	<input type="text" class="form-control input-medium" id="div1_contact_mobile" name="div_contact_mobile[]" value="">
																	<label class="checkbox-inline">
																</td>	
																<td>
																	 <input type="text" class="form-control input-medium" placeholder="" name="div_contact_email[]" id="div1_contact_email" value="" >
																</td>
																<td>
																	 <select class="form-control" name="div_contact_type[]" id="div1_contact_type">
																	 <option value="">Please Select</option>
																	 <option value="Primary">Primary</option>
																	 <option value="Secondary">Secondary</option>
																	 </select>
																</td>
															</tr>
															<tr class="active">
																<td>
																	 <select class="form-control" name="div_contact_prefix[]" id="div2_contact_prefix">
																	 <option value="">Please Select</option>
																	 <option value="Mr">Mr</option>
																	 <option value="Miss">Miss</option>
																	 </select>
																</td>
																<td>
																	<input type="text" class="form-control input-medium" id="div2_contact_name" name="div_contact_name[]" value="">
																</td>		
																<td>

																	<input type="text" class="form-control input-medium" id="div2_contact_mobile" name="div_contact_mobile[]" value="">
																</td>	
																<td>
																	 <input type="text" class="form-control input-medium" placeholder="" name="div_contact_email[]" id="div2_contact_email" value="" >
																</td>
																<td>
																	 <select class="form-control" name="div_contact_type[]" id="div2_contact_type">
																	 <option value="">Please Select</option>
																	 <option value="Primary">Primary</option>
																	 <option value="Secondary">Secondary</option>
																	 </select>
																</td>
															</tr>
															<tr class="active">
																<td>
																	 <select class="form-control" name="div_contact_prefix[]" id="div3_contact_prefix">
																	 <option value="">Please Select</option>
																	 <option value="Mr">Mr</option>
																	 <option value="Miss">Miss</option>
																	 </select>
																</td>
																<td>
																	<input type="text" class="form-control input-medium" id="div3_contact_name" name="div_contact_name[]" value="">
																</td>	
																<td>
																	<input type="text" class="form-control input-medium" id="div3_contact_mobile" name="div_contact_mobile[]" value="">
																</td>	
																<td>
																	 <input type="text" class="form-control input-medium" placeholder="" name="div_contact_email[]" id="div3_contact_email" value="" >
																</td>
																<td>
																	 <select class="form-control" name="div_contact_type[]" id="div3_contact_type">
																	 <option value="">Please Select</option>
																	 <option value="Primary">Primary</option>
																	 <option value="Secondary">Secondary</option>
																	 </select>
																</td>
															</tr>
															
															
															</tbody>
															</table>
															</div>
														</div>
													</div>
																				</div>
																			</div>
											*/ ?>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<a href="<?php echo BASE_PATH;?>viewvendormaster"><button type="button" class="btn default">Cancel</button></a>
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


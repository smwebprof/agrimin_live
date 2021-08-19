
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Tax Invoice
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
								File
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Tax Invoice
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
									 Tax Invoice
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
											<i class="fa fa-reorder"></i>Tax Invoice Form
										</div>
										<div class="actions">
							    <?php /*
								<a href="<?php echo BASE_PATH; ?>Viewfileregister" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View File Register
									</span>
								</a>
								*/ ?>
								<a href="<?php echo BASE_PATH; ?>Operationfileregister?id=<?php echo $_GET['id']; ?>" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Operations
									</span>
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
										<form action="" method="post" class="form-horizontal invoicefileregister-form">
											<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';	

												  
											?><br>
											<?php if (@$_GET['msg']==1) { echo '<font size="3" color="red">Inspection End Date Should Not Be Less Than Inspection Start Date</font>'; } ?>
											
											<?php $rows = $this->data['invoice_data'];

											if ($_SESSION['branch_id']!=$rows[0]['invoice_by_branch']) {
												 echo '<h3><p>You do not have access to create Invoice</p></h3>';exit;
											}
											if (@$this->data['draft_file_id']) {
												 echo '<h3><p>This Invoice for File No is Already in Draft Mode.</p></h3>';exit;
											}

											foreach($rows as $invoice_data){
											?>
											<input type="hidden" name="file_id" id="file_id" value="<?php echo $invoice_data['id']; ?>">
											<input type="hidden" name="file_no_type" id="file_no_type" value="<?php echo $invoice_data['file_no_type']; ?>">
											<input type="hidden" name="invoice_subtotal" id="invoice_subtotal" value="">
											<input type="hidden" name="invoice_tax_amt" id="invoice_tax_amt" value="">
											<div class="form-body">
												<h3 class="form-section">Invoice Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_no" id="file_no" value="<?php echo $invoice_data['file_no']; ?>" readonly>
																<span for="file_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Creation Date*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="<?php echo date('d-m-Y',strtotime($invoice_data['file_creation_date'])); ?>" readonly>
																<span for="file_date" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Client*</label>
															<div class="col-md-9">
																<input type="hidden" class="form-control" placeholder="" name="client_id" id="client_id" value="<?php echo $invoice_data['client_id']; ?>">
																<input type="text" class="form-control" placeholder="" name="client_name" id="client_name" value="<?php echo $invoice_data['client_name']; ?>" readonly>
																<span for="client_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Date*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_date" id="invoice_date" value="<?php echo date('d-m-Y'); ?>" readonly>			
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<?php if ($_SESSION['branch_name'] == 'India') { ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Billing Client*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_to" id="invoice_to" value="<?php echo $invoice_data['client_name']; ?>" readonly>
																<span for="invoice_to" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<?php } ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="client_address" id="client_address" readonly><?php echo $invoice_data['address']; ?></textarea>
																<span for="client_address1" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
                                              
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Postal Code</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="postal_code" id="postal_code" value="<?php echo $invoice_data['zip_pin_code']; ?>" readonly>
																<span for="postal_code" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address3</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="client_address3" id="client_address3"></textarea>
																<span for="client_address3" class="help-block"></span>
															</div>
														</div>
													</div>*/ ?>
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
													                    if ($invoice_data['countryid']==$countries["id"]) {
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
													                    if ($invoice_data['stateid']==$states["id"]) {
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
													                    if ($invoice_data['cityid']==$cities["id"]) {
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
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">VAT No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_vat" id="client_vat" value="<?php echo $invoice_data['vat_no']; ?>" readonly>
																<span for="client_vat" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Place Of Service*</label>
															<div class="col-md-9">
																<select class="form-control" name="invoice_city" id="invoice_city" readonly>
																<option value="">Select City</option>
																<?php
													                $rows = $this->data['cities'];

													                foreach($rows as $cities){ 
													                    if ($invoice_data['cityid']==$cities["id"]) {
													                    	echo '<option value='.$cities["id"].' selected>'.$cities["name"].'</option>';
													                    } else {
													                		echo '<option value='.$cities["id"].'>'.$cities["name"].'</option>';
													                    }

													                }
																?>
																</select>
																<span for="invoice_city" class="help-block"></span>
															</div>
														</div>
													</div>*/ ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Kind Attention*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_contact" id="client_contact" value="<?php echo @$this->data['contact']['contact_person_name']; ?>">
																<span for="client_contact" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Invoice Type</label>
															<div class="col-md-9">
																<select class="form-control" name="invoice_type" id="invoice_type">
																	<option value="Draft">Draft</option>
																	<!--<option value="Final">Final</option>-->
																</select>
																<span for="invoice_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<?php /*
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Place Of Service*</label>
															<div class="col-md-9">
																<select class="form-control" name="invoice_city" id="invoice_city">
																<option value="">Select City</option>
																<?php
													                $rows = $this->data['cities'];

													                foreach($rows as $cities){ 
													                    if ($invoice_data['city_id']==$cities["id"]) {
													                    	echo '<option value='.$cities["id"].' selected>'.$cities["name"].'</option>';
													                    } else {
													                		echo '<option value='.$cities["id"].'>'.$cities["name"].'</option>';
													                    }

													                }	
																?>
																</select>
																<span for="invoice_city" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													*/ ?>
												</div>
												<!--/row-->
												<?php if (@$_SESSION['country_code']!='SG') { ?>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Inspection Start Date*</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m" data-date-end-date="0d">
																<input type="text" class="form-control" name="inspection_start_date" id="inspection_start_date" value="<?php echo date('d-m-Y'); ?>" readonly>
																<span for="inspection_start_date" class="help-block"></span>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>

																</div>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Inspection End Date*</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m" data-date-end-date="0d">
																<input type="text" class="form-control" name="inspection_end_date" id="inspection_end_date" value="<?php echo date('d-m-Y'); ?>" readonly>
																<span for="inspection_end_date" class="help-block"></span>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>

																</div>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->	
											    <?php } ?>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bill Of Lading Number</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bill_lading_no" id="bill_lading_no" value="">
																<span for="bill_lading_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bill Of Lading Date</label>
															<div class="col-md-6">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m" data-date-end-date="0d">
																<input type="text" class="form-control" name="bill_lading_date" id="bill_lading_date" value="<?php echo date('d-m-Y'); ?>" readonly>
																<span for="bill_lading_date" class="help-block"></span>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>

																</div>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<?php if (@$_SESSION['country_code']=='SG') { ?>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Inspection Date</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m" data-date-end-date="0d">
																<input type="text" class="form-control" name="inspection_dt" id="inspection_dt" value="<?php echo date('d-m-Y'); ?>" readonly>
																<span for="inspection_dt" class="help-block"></span>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>

																</div>
															</div>
														</div>
													</div>
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bill Of Lading Date</label>
															<div class="col-md-6">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m" data-date-end-date="0d">
																<input type="text" class="form-control" name="bill_lading_date" id="bill_lading_date" value="<?php echo date('d-m-Y'); ?>" readonly>
																<span for="bill_lading_date" class="help-block"></span>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>

																</div>
															</div>
														</div>
													</div>*/ ?>
													<!--/span-->
												</div>
												<!--/row-->
											    <?php } ?>
												

											
											<?php /*<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Currency*</font></label>
															<div class="col-md-9">
																<select class="form-control" name="invoice_currency" id="invoice_currency">
																	<option value="">Please Select</option>
																	<option value="Rupees">Rupees</option>
																	<option value="Dollar">US Dollar</option>
																	<option value="Euro">Euro</option>
																	<option value="Yen">Yen</option>
																	<option value="Dirham">Arab Emirates Dirham</option>
																</select>	
																<span for="invoice_currency" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Exchange Rate*</font></label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_ex_rate" id="invoice_ex_rate">
																<span for="invoice_ex_rate" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

											<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Basic Exc Amt	*</font></label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_basic_ex_amt" id="invoice_basic_ex_amt">
																<span for="invoice_basic_ex_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Basic Amount*</font></label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_basic_amt" id="invoice_basic_amt">
																<span for="invoice_basic_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->	

											<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Total Taxable Amt*</font></label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_tax_amt" id="invoice_tax_amt">
																<span for="invoice_tax_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Total Invoice Amt*</font></label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_amt" id="invoice_amt">
																<span for="invoice_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div> */ ?>
												<!--/row-->

												<h3 class="form-section alert alert-info">File Parameters</h3>

												<!--row-->
												<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
															<div class="table-responsive">
																<div id="field_parameter_div">
																<table class="table table-bordered table-hover">
																<thead>
																<tr>
																	<th width="50%">
																		 Particulars
																	</th>
																	<th width="50%">
																		 Value
																	</th>
																</tr>
																</thead>
																<tbody>
																<tr class="active">
																	<td>
																		 Job No.
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="inv_file_no" id="inv_file_no" value="<?php echo $invoice_data['file_no']; ?>" readonly>
																	</td>
																</tr>
																<?php if ($invoice_data['file_no_type']=='Inspection') { ?>
																<tr class="active">
																	<td>
																		 Scope Of Work
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="scope_work" id="scope_work" value="<?php echo $invoice_data['scope_work']; ?>" readonly>
																	</td>
																</tr>
															   <?php } ?>
																<?php if ($invoice_data['file_no_type']=='Inspection') { ?>
																<tr class="active">
																	<td>
																		 Warehouse
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="warehouse" id="warehouse" value="<?php echo $invoice_data['warehouse']; ?>" readonly>
																	</td>
																</tr>
															   <?php } else { ?>
															   <tr class="active">
																	<td>
																		 Vessel Name
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="vessel_name" id="vessel_name" value="<?php echo $invoice_data['vessel_name']; ?>" readonly>
																	</td>
																</tr>
																<?php } ?>	
																<tr class="active">
																	<td>
																		 Voyage No
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="voyage_no" id="voyage_no" value="<?php echo $invoice_data['voyage_no']; ?>" readonly>
																	</td>
																</tr>
																<tr class="active">
																	<td>
																		 Cargo Group
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="cargo_group" id="cargo_group" value="<?php echo $this->data['cargo_group_name']; ?>" readonly>
																	</td>
																</tr>
																<tr class="active">
																	<td>
																		 Commodity
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="cargo_master" id="cargo_master" value="<?php echo $this->data['commodity_name']; ?>" readonly>
																	</td>
																</tr>
																<tr class="active">
																	<td>
																		 Quantity
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="inv_quantity" id="inv_quantity" value="<?php echo $this->data['tot_quantity']; ?>" readonly>
																	</td>
																</tr>
																<tr class="active">
																	<td>
																		 Loading Port
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="inv_load_port" id="inv_load_port" value="<?php echo $this->data['load_port']; ?>" readonly>
																	</td>
																</tr>
																<tr class="active">
																	<td>
																		 Discharge Port
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="inv_discharge_port" id="inv_discharge_port" value="<?php echo $this->data['discharge_port']; ?>" readonly>
																	</td>
																</tr>
																<?php /*<tr class="active">
																	<td>
																		 Inspection Date
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="inspection_date" id="inspection_date" value="<?php echo date('d-m-Y',strtotime($invoice_data['file_creation_date'])); ?>" readonly>
																	</td>
																</tr>*/ ?>
																<tr class="active">
																	<td>
																		 Remarks
																	</td>
																	<td>
																		 <textarea class="form-control" rows="3" name="invoice_remarks" id="invoice_remarks" maxlength="200"><?php echo @$invoice_data['invoice_remarks']; ?></textarea>
																	</td>
																</tr>
																<?php /*<tr class="active">
																	<td>
																		 Cargo
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="cargo_master" id="cargo_master" value="<?php echo $invoice_data['commodity_name']; ?>" readonly>
																	</td>
																</tr>
																<tr class="active">
																	<td>
																		 Packing
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="packing" id="packing" value="<?php echo $invoice_data['paking_name']; ?>" readonly>
																	</td>
																</tr>
																<tr class="active">
																	<td>
																		 Packing Desc
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="packing_desc" id="packing_desc" value="<?php echo $invoice_data['packing_desc']; ?>" readonly>
																	</td>
																</tr>
																<tr class="active">
																	<td>
																		 Quantity/Unit
																	</td>
																	<td>
																		 <div class="checkbox-list"><label class="checkbox-inline"><input type="text" class="form-control" id="approx_qty" name="approx_qty" value="<?php echo $invoice_data['approx_qty']; ?>" readonly></label><label class="checkbox-inline"><input type="text" class="form-control" id="approx_unit" name="approx_unit" value="<?php echo $invoice_data['unit_name']; ?>" readonly></label></div>
																	</td>
																</tr>
																<tr class="active">
																	<td>
																		 File Instructions
																	</td>
																	<td>
																		 <textarea class="form-control" rows="3" name="file_ins" id="file_ins" maxlength="200"><?php echo @$invoice_data['description']; ?></textarea>
																	</td>
																</tr>
																<tr class="active">
																	<td>
																		 Place Of Attendance
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="place" id="place" value="<?php echo $invoice_data['attendance_placed']; ?>" readonly>
																	</td>
																</tr>
																<tr class="active">
																	<td>
																		 Origin
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="origin" id="origin" value="<?php echo $invoice_data['origin']; ?>" readonly>
																	</td>
																</tr>
																<tr class="active">
																	<td>
																		 Load Port
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="load_port" id="load_port" value="<?php echo $invoice_data['load_port']; ?>" readonly>
																	</td>
																</tr>
																<tr class="active">
																	<td>
																		 Discharge Port
																	</td>
																	<td>
																		 <input type="text" class="form-control" placeholder="" name="discharge_port" id="discharge_port" value="<?php echo $invoice_data['discharge_port']; ?>" readonly>
																	</td>
																</tr>
																<tr class="active">
																	<td>
																		 Remarks
																	</td>
																	<td>
																		 <textarea class="form-control" rows="3" name="invoice_remarks" id="invoice_remarks" maxlength="200"><?php echo @$invoice_data['invoice_remarks']; ?></textarea>
																	</td>
																</tr>*/ ?>
																</tbody>
																</table>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
																								

												<h3 class="form-section alert alert-info">Invoice Details</h3>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Invoice Details</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="inv_desc_details" id="inv_desc_details" value="<?php echo $invoice_data['description']; ?>">
																<span for="inv_desc_details" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address3</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="client_address3" id="client_address3"></textarea>
																<span for="client_address3" class="help-block"></span>
															</div>
														</div>
													</div>*/ ?>
													<!--/span-->
												</div>
												<!--/row-->

												<?php
												}
												?>

												

											 <?php $cargorows = $this->data['cargo_details']; 
											 	   $i = 1;	
											 	   $j = 0;
											 	   foreach($cargorows as $cargo_details){
											 	   	#print_r($cargo_details);exit;
											 ?>

											 	<h3 class="form-section alert alert-info">Sr.No. <?php echo $i; ?> - Cargo Details for <?php echo $cargo_details['commodity_name']; ?> - Cargo Group : <?php echo $cargo_details['cargo_group_name']; ?></h3>

												<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<input type="hidden" name="invitems_cargo_prefix[]" id="invitems_cargo_prefix" value="<?php echo $i; ?>">
														<input type="hidden" name="invitems_cargo_group[]" id="invitems_cargo_group" value="<?php echo $cargo_details['cargo_group_name']; ?>">
														<input type="button" value="Add Cargo Particulars" id="invoice_cargo_item_<?php echo $i; ?>" class="invoice_cargo_item" OnClick="javascript:cargo_rows(<?php echo $i; ?>);">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover invoice_cargo_item_details" id="invoice_cargo_item_details_<?php echo $i; ?>">
															<thead>
															<tr>
																<th>
																	 Work Item
																</th>
																<th>
																	 QTY
																</th>
																<th>
																	 Unit
																</th>
																<th>
																	 Rate per Qty
																</th>
																<th>
																	 Amount
																</th>													
															</tr>
															</thead>
															<tbody>
															<tr class="active">
																<td>
																	<input type="text" class="form-control input-large" placeholder="" name="invitems_cargo_name[]" id="invitems_cargo_name" value="<?php echo $cargo_details['commodity_name']; ?>" required>
																	<input type="hidden" class="form-control input-large" placeholder="" name="invitems_cargo_details[]" id="invitems_cargo_details" value="<?php echo $cargo_details['commodity_name']."|".$i; ?>" >
																	<span for="invitems_cargo_name" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="invitems_quantity[]" id="invitems_quantity" value="<?php echo $cargo_details['approx_qty'];?>" onkeyup="cargo_amount2(this);" required readonly>
																	 <span for="invitems_quantity" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	 <select class="form-control input-small" data-placeholder="Select..." name="invitems_unit[]" id="invitems_unit" required>
																	<!--<option value=""></option>-->
																	<?php
													                $rows = $this->data['units'];

													                foreach($rows as $units){ 
													                	if ($cargo_details['approx_unit']==$units["id"]) {
													                	    echo '<option value="'.$units["unit_name"].'" selected>'.$units["unit_name"].'</option>';
													                	} /*else {
													                		echo '<option value="'.$units["unit_name"].'">'.$units["unit_name"].'</option>';
													                	}*/

													                }	
																	?>
																	</select>
																	<span for="invitems_unit" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="invitems_rate[]" id="invitems_rate" value="" onkeyup="cargo_amount3(this);" required>
																	 <span for="invitems_rate" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small invitems_amt" placeholder="" name="invitems_amt[]" id="invitems_amt" value="" required>
																	 <span for="invitems_amt" class="help-block" style="color:red"></span>
																</td>										
															</tr>															
															</tbody>
															</table>
															</div>
														</div>
													</div>
												</div>
											 </div>

											 <?php 
											    $i++;$j++;
											 	}
											 ?>

											 <h3 class="form-section alert alert-info">Other Details</h3>

											 <div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<input type="hidden" name="invitems_cargo_prefix[]" id="invitems_cargo_prefix" value="<?php echo $i; ?>">
														<input type="button" value="Add Other Details" id="invoice_cargo_item_<?php echo $i; ?>" class="invoice_cargo_item" OnClick="javascript:other_rows(<?php echo $i; ?>);">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover invoice_cargo_item_details" id="invoice_cargo_item_details_<?php echo $i; ?>">
															<thead>
															<tr>
																<th>
																	 Work Item
																</th>
																<th>
																	 QTY
																</th>
																<th>
																	 Unit
																</th>
																<th>
																	 Rate per Qty
																</th>
																<th>
																	 Amount
																</th>													
															</tr>
															</thead>
															<tbody>
															<tr class="active">
																<td>
																	<input type="text" class="form-control input-large" placeholder="" name="invitems_cargo_name[]" id="invitems_cargo_name" value="" required>
																	<input type="hidden" class="form-control input-large" placeholder="" name="invitems_cargo_details[]" id="invitems_cargo_details" value="invitems_cargo_details|<?php echo $i; ?>" >									<input type="hidden" name="invitems_cargo_group[]" id="invitems_cargo_group" value="Other">
																	<span for="invitems_cargo_name" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="invitems_quantity[]" id="invitems_quantity" value="" onkeyup="cargo_amount3(this);" required>
																	 <span for="invitems_quantity" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	<select class="form-control input-small" data-placeholder="Select..." name="invitems_unit[]" id="invitems_unit" required><option value=""></option><option value="%">%</option><option value="KG">KG</option><option value="LTRS">LTRS</option><option value="MT">MT</option><option value="MMT">MMT</option><option value="NOS">NOS</option><option value="PER BAG">PER BAG</option><option value="PER CONTAINER">PER CONTAINER</option><option value="PER DAY">PER DAY</option><option value="PER DAY/SURVEYOR">PER DAY/SURVEYOR</option><option value="PER HEAP">PER HEAP</option><option value="PER HOLD">PER HOLD</option><option value="PER LOT">PER LOT</option><option value="PER MAN">PER MAN</option><option value="PER MMT">PER MMT</option><option value="PER MONTH">PER MONTH</option><option value="PER MT">PER MT</option><option value="PER PERSON">PER PERSON</option><option value="PER PILE">PER PILE</option><option value="PER PLOTE">PER PLOTE</option><option value="PER RAKE">PER RAKE</option><option value="PER SAMPLE">PER SAMPLE</option><option value="PER SHIFT">PER SHIFT</option><option value="PER STACK">PER STACK</option><option value="PER SURVEY">PER SURVEY</option><option value="PER TANKER">PER TANKER</option><option value="PER UNIT">PER UNIT</option>
																	<option value="NONE">NONE</option></select>
																	<span for="invitems_unit" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="invitems_rate[]" id="invitems_rate" value="" onkeyup="cargo_amount3(this);" required>
																	 <span for="invitems_rate" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small invitems_amt" placeholder="" name="invitems_amt[]" id="invitems_amt" value="" required>
																	 <span for="invitems_amt" class="help-block" style="color:red"></span>
																</td>										
															</tr>															
															</tbody>
															</table>
															</div>
														</div>
													</div>
												</div>

											 <div class="form-actions top right">
												<button type="button" class="btn green" name="div_invoice_items_btn" id="div_invoice_items_btn">Calculate Invoice Amount</button>
											 </div>	

												<h3 class="form-section alert alert-info">Invoice Amount</h3>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Currency*</font></label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="invoice_currency" id="invoice_currency">
																	<!--<option value=""></option>-->
																	<?php
													                $rows = $this->data['currency'];

													                foreach($rows as $currency){ 
													                	#if ($_SESSION['currency']==$currency["currency"]) {
													                	if ($currency["currency"]=='USD') {
													                		echo '<option value='.$currency["id"].' selected>'.$currency["currency"].'</option>';
													                	} else {
													                		echo '<option value='.$currency["id"].'>'.$currency["currency"].'</option>';
													                	}
													                	

													                }	
																	?>
																	</select>
																<span for="invoice_currency" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Exchange Rate</font></label>
															<div class="col-md-9">
																<input type="number" class="form-control" placeholder="" name="invoice_ex_rate" id="invoice_ex_rate" value = "1">
																<span for="invoice_ex_rate" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Basic amount*</font></label>
															<div class="col-md-9">
																<input type="number" class="form-control" placeholder="" name="invoice_subtotal_amt" id="invoice_subtotal_amt" readonly>
																<span for="invoice_subtotal_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">VAT (%) </font></label>
															<div class="col-md-9">
																<?php if (@$invoice_data['tax_options']=='N/A') { ?>
																<input type="text" class="form-control" placeholder="" name="invoice_total_vat_percn2" id="invoice_total_vat_percn2" readonly>
																<span for="invoice_total_vat_percn2" class="help-block"></span>
																<?php } else { ?>
																	<input type="text" class="form-control" placeholder="" name="invoice_total_vat_percnt" id="invoice_total_vat_percnt">
																<span for="invoice_total_vat_percnt" class="help-block"></span>
																<?php } ?>	
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Total Tax Amount</font></label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_total_tax_amt" id="invoice_total_tax_amt" readonly>
																<span for="invoice_total_tax_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Total Invoice Amount*</font></label>
															<div class="col-md-9">
																<input type="number" class="form-control" placeholder="" name="invoice_total_full_amt" id="invoice_total_full_amt" readonly>
																<span for="invoice_total_full_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Tax Amount - GST/VAT*</font></label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_amt" id="invoice_amt">
																<span for="invoice_amt" class="help-block"></span>
															</div>
														</div>
													</div>*/ ?>
													<!--/span-->
												</div>
												<!--/row-->

											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<a href="<?php echo BASE_PATH;?>Viewinvoicefileregister"><button type="button" class="btn default">Cancel</button></a>
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


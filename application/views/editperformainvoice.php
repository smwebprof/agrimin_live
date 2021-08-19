
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Proforma Invoice
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
							<a href="<?php echo BASE_PATH; ?>Viewproformainvoice">
								Invoice
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Proforma Invoice
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
									 Proforma Invoice
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
											<i class="fa fa-reorder"></i>Proforma Invoice Form
										</div>
										<div class="actions">
										<a href="<?php echo BASE_PATH; ?>Viewproformainvoice" class="btn red">
										<i class="fa fa-pencil"></i>View Proforma Invoices
										</a>
										<?php if ($_SESSION['country_code']=='CH')  { ?>
										<a href="<?php echo BASE_PATH; ?>Fullviewperfinvoicefilereportpdf_CH?id=<?php echo base64_encode($this->data['id']); ?>" class="btn green" target="_blank">
											<i class="fa fa-pencil"></i>Proforma Invoice Report
										</a>
										<?php } else { ?>
										<a href="<?php echo BASE_PATH; ?>Fullviewperfinvoicefilereportpdf?id=<?php echo base64_encode($this->data['id']); ?>" class="btn green" target="_blank">
											<i class="fa fa-pencil"></i>Proforma Invoice Report
										</a>
										<?php } ?>	
								
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
										<form action="" method="post" class="form-horizontal proformainvoice-form">
											<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';	

												  
											?><br>
											<?php if (@$_GET['msg']==1) { echo '<font size="3" color="red">Inspection End Date Should Not Be Less Than Inspection Start Date</font>'; } ?>

											<?php if (@$_GET['msg']==2) { echo '<font size="3" color="red">Cargo Commodity Details is Required!!!</font>'; } ?>
											
											<?php $rows = $this->data['invoice_data'];

											foreach($rows as $invoice_data){
											?>
											<input type="hidden" name="profinvoice_no" id="profinvoice_no" value="<?php echo $invoice_data['id']; ?>">
											<input type="hidden" name="invoice_subtotal" id="invoice_subtotal" value="">
											<input type="hidden" name="invoice_tax_amt" id="invoice_tax_amt" value="">
											<div class="form-body">
												<h3 class="form-section">Invoice Details</h3>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Client*</label>
															<div class="col-md-9">
																<select class="form-control" name="clients_name" id="clients_name">
																<!--<option value="">Please Select</option>-->
																<?php
													                $rows = $this->data['clients_data'];
																	//print_r($rows);
													                foreach($rows as $clients_data){ 
													                	if ($invoice_data['client_id']==$clients_data["id"]) {
													                		echo '<option value='.$clients_data["id"].' selected>'.$clients_data["client_name"].'</option>';
													                	} else {
													                		echo '<option value='.$clients_data["id"].'>'.$clients_data["client_name"].'</option>';
													                	}	
													                }	
																	?>
																	</select>
																<span for="client_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Invoice Date*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_date" id="invoice_date" value="<?php echo date('d-m-Y'); ?>" readonly>			
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
																<textarea class="form-control" rows="3" name="client_address" id="client_address" readonly><?php echo $invoice_data['client_address']; ?></textarea>
																<span for="client_address" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Postal Code</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="postal_code" id="postal_code" value="<?php echo $invoice_data['client_postal_code']; ?>" readonly>
																<span for="postal_code" class="help-block"></span>
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
																<input type="text" class="form-control" placeholder="" name="company_country" id="company_country" value="<?php echo $invoice_data['client_country']; ?>" readonly>
																<span for="company_country" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">State*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="company_state" id="company_state" value="<?php echo $invoice_data['client_state']; ?>" readonly>
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
																<input type="text" class="form-control" placeholder="" name="company_city" id="company_city" value="<?php echo $invoice_data['client_city']; ?>" readonly>
																<span for="company_city" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">VAT No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_vat" id="client_vat" value="<?php echo $invoice_data['client_vat']; ?>" readonly>
																<span for="client_vat" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Kind Attention*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_contact" id="client_contact" value="<?php echo $invoice_data['kind_attention']; ?>">
																<span for="client_contact" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Invoice Status</label>
															<div class="col-md-9">
																<select class="form-control" name="status" id="status">
																	<option value="Open">Open</option>
																	<option value="Closed">Closed</option>
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

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Inspection Start Date</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m" data-date-end-date="0d">
																<input type="text" class="form-control" name="inspection_start_date" id="inspection_start_date" value="<?php echo $invoice_data['inspection_start_date']; ?>" readonly>
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
															<label class="control-label col-md-3">Inspection End Date</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m" data-date-end-date="0d">
																<input type="text" class="form-control" name="inspection_end_date" id="inspection_end_date" value="<?php echo $invoice_data['inspection_end_date']; ?>" readonly>
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

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bill Of Lading Number</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bill_lading_no" id="bill_lading_no" value="<?php echo $invoice_data['bill_lading_no']; ?>">
																<span for="bill_lading_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bill Of Lading Date</label>
															<div class="col-md-6">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m" data-date-end-date="0d">
																<input type="text" class="form-control" name="bill_lading_date" id="bill_lading_date" value="<?php echo $invoice_data['bill_lading_date']; ?>" readonly>
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


												<h3 class="form-section alert alert-info">File Parameters</h3>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Vessel Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="vessel_name" id="vessel_name" value="<?php echo $invoice_data['vessel_name']; ?>">
																<span for="vessel_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Voyage No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="voyage_no" id="voyage_no" value="<?php echo $invoice_data['voyage_no']; ?>">
																<span for="voyage_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Scope of Services</label>
															<div class="col-md-9">
																<select class="form-control" name="scope_services" id="scope_services">
																	<!--<option value="">Please Select</option>-->
																	<option value="Analysis" <?php if ($invoice_data['scope_of_services']=='Analysis') { echo 'selected'; } ?>>Analysis</option>
																	<option value="Dry Cargo" <?php if ($invoice_data['scope_of_services']=='Dry Cargo') { echo 'selected'; } ?>>Dry Cargo</option>
																	<option value="Fertilzer" <?php if ($invoice_data['scope_of_services']=='Fertilzer') { echo 'selected'; } ?>>Fertilzer</option>
																	<option value="Liquid" <?php if ($invoice_data['scope_of_services']=='Liquid') { echo 'selected'; } ?>>Liquid</option>
																	<option value="Minerals" <?php if ($invoice_data['scope_of_services']=='Minerals') { echo 'selected'; } ?>>Minerals</option>
																	<option value="Stock Management" <?php if ($invoice_data['scope_of_services']=='Stock Management') { echo 'selected'; } ?>>Stock Management</option>
																</select>
																<span for="scope_services" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Instructions</label>
															<div class="col-md-9">
																<select class="form-control" id="file_ins" name="file_ins">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['instructions'];

													                foreach($rows as $instructions){ 
													                	if ($invoice_data['file_instructions']==$instructions["id"]) {  
													                		echo '<option value='.$instructions["id"].' selected>'.$instructions["description"].'</option>';
													                	} else {
													                		echo '<option value='.$instructions["id"].'>'.$instructions["description"].'</option>';
													                	}
													                }	
																	?>
																</select>
																<span for="file_ins" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Remarks</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="invoice_remarks" id="invoice_remarks" maxlength="200"><?php echo $invoice_data['invoice_remarks']; ?></textarea>
															</div>
														</div>
													</div>
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Instructions</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bill_lading_no" id="bill_lading_no" value="">
																<span for="bill_lading_no" class="help-block"></span>
															</div>
														</div>
													</div>-->
													<!--/span-->
												</div>
												<!--/row-->


												<?php
												}
												?>

											<h3 class="form-section alert alert-info">Cargo Details</h3>
											<font style="color:red" size="3" >***Instructions : 1.Please check the Cargo entries before File Submissions.</font><br/>
											<font style="color:red" size="3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.Select Cargo Group and then Add No of Cargo Products As Required...</font><br/><br/>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Cargo Group*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="cargo_group" id="cargo_group">
																	<option value="">Select</option>
																	<?php
													                $cargo_group = $this->data['cargogroup'];

													                foreach($cargo_group as $cargogroup){ 
													                	if ($invoice_data['cargo_group']==$cargogroup["id"]) {
													                		echo '<option value='.$cargogroup["id"].' selected>'.$cargogroup["name"].'</option>';
													                	} else {
													                		echo '<option value='.$cargogroup["id"].'>'.$cargogroup["name"].'</option>';
													                	}

													                }	
																	?>
																</select>
																<span for="cargo_group" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Cargo*</label>
															<div class="col-md-9">
																<select class="form-control" name="cargo" id="cargo">
																<option value="">Select</option>
																</select>
																<span for="cargo" class="help-block"></span>
															</div>
														</div>
													</div> */ ?>
													<!--/span-->
												</div>
												<!--/row-->

												
											<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<input type="button" value="Add Cargo" id="cargo_row">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover" id="cargo_details">
															<thead>
															<tr>
																<th style="text-align-last: center">
																	 Cargo
																</th>
																<th  style="text-align-last: center">
																	 Packing
																</th>
																<th  style="text-align-last: center">
																	 Quantity
																</th>
																<th  style="text-align-last: center">
																	 Unit
																</th>
																<th  style="text-align-last: center">
																	 Origin
																</th>
																<th  style="text-align-last: center">
																	 Load Port
																</th>
																<th  style="text-align-last: center">
																	 Discharge Port
																</th>
																<th  style="text-align-last: center">
																	 Place Of Attendance
																</th>
																<th style="text-align-last: center">
																	 Rate per Qty
																</th>
																<th style="text-align-last: center">
																	 Amount
																</th>
																<th  style="text-align-last: center">
																	 Remove
																</th>																
															</tr>
															</thead>
															<tbody>
															<?php foreach ($this->data['cargo_details'] as $k => $v) { ?>	
															<tr class="active">
																<td>
																	 <select class="form-control input-small cargomaster" name="cargo[]" id="cargo" required>
																	 <?php 	foreach ($this->data['cargo'] as $p => $q) { 
																	 	    if ($q['id']==$v['cargo_id']) { 
																	 ?>
																	 <option value="<?php echo $q['id']; ?>" selected><?php echo $q['commodity_name']; ?></option>
																	 <?php } else { ?>
																	 <option value="<?php echo $q['id']; ?>"><?php echo $q['commodity_name']; ?></option>	
																	 <?php } } ?>
																	 </select>
																	 <span for="cargo" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <select class="form-control input-small packingmaster" name="cargo_packing[]" id="cargo_packing" required>
																	 <?php 	foreach ($this->data['packing'] as $p => $q) {
																	 	if ($q['id']==$v['packing_id']) { 
																	 ?>	
																	 <option value="<?php echo $q['id']; ?>" selected><?php echo $q['paking_name']; ?></option>
																	 <?php } else { ?>
																	 <option value="<?php echo $q['id']; ?>"><?php echo $q['paking_name']; ?></option>
																	 <?php } } ?>
																	 </select>
																	 <span for="cargo_packing" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="cargo_quantity[]" id="cargo_quantity" value="<?php echo $v['approx_qty']; ?>" onkeyup="cargo_amount2(this);" required>
																	 <span for="cargo_quantity" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <select class="form-control input-small unitmaster" name="cargo_unit[]" id="cargo_unit" required>
																	 <?php 	foreach ($this->data['units'] as $p => $q) {
																	 	if ($q['id']==$v['approx_unit']) { 
																	 ?>		
																	 <option value="<?php echo $q['id']; ?>" selected><?php echo $q['unit_name']; ?></option>
																	 <?php } else { ?>
																	 <option value="<?php echo $q['id'];; ?>"><?php echo $q['unit_name']; ?></option>	
																	 <?php } } ?>
																	 </select>
																	 <span for="cargo_unit" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small cargo_origin" id="cargo_origin" name="cargo_origin[]" value="<?php echo $v['origin']; ?>" required>
																	 <span for="cargo_origin" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small cargo_load_port" id="cargo_load_port" name="cargo_load_port[]" value="<?php echo $v['load_port']; ?>" required>
																	 <span for="cargo_load_port" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small cargo_discharge_port" id="cargo_discharge_port" name="cargo_discharge_port[]" value="<?php echo $v['discharge_port']; ?>" required>
																	 <span for="cargo_discharge_port" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small cargo_place_attendance" id="cargo_place_attendance" name="cargo_place_attendance[]" value="<?php echo $v['attendance_placed']; ?>" required>
																	 <span for="cargo_place_attendance" class="help-block" style="color:red"></span>
																</td>														
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="cargo_rate[]" id="cargo_rate" value="<?php echo $v['invoice_work_rate']; ?>" onkeyup="cargo_amount2(this);" required>
																	 <span for="cargo_rate" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small invitems_amt" placeholder="" name="cargo_amt[]" id="cargo_amt" value="<?php echo $v['invoice_work_amount']; ?>" required>
																	 <span for="cargo_amt" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <!--<input type="button" class="form-control input-small rmv" value="Delete Cargo" id="delete_cargo_row">-->
																	 <a class="btn btn-danger btn-xs rmv" title="Delete Row"><i class="fa fa-times fa-fw"></i></a>
																</td>																
															</tr>
															<?php } ?>															
															</tbody>
															</table>
															</div>
														</div>
													</div>
												</div>
											</div>


											 

											 <h3 class="form-section alert alert-info">Other Details</h3>

											 <div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<input type="hidden" name="invitems_cargo_prefix[]" id="invitems_cargo_prefix" value="">
														<input type="button" value="Add Other Details" id="" class="invoice_cargo_item" OnClick="javascript:cargo_rows();">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover invoice_cargo_item_details" id="invoice_cargo_item_details">
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
																<th>
																	 Remove
																</th>													
															</tr>
															</thead>
															<tbody>
															<?php foreach ($this->data['other_details'] as $k => $v) { ?>
															<tr class="active">
																<td>
																	<input type="text" class="form-control input-large" placeholder="" name="invitems_cargo_name[]" id="invitems_cargo_name" value="<?php echo $v['cargo_id']; ?>">
																	<input type="hidden" class="form-control input-large" placeholder="" name="invitems_cargo_details[]" id="invitems_cargo_details" value="" >
																	<span for="cargo" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="invitems_quantity[]" id="invitems_quantity" value="<?php echo $v['approx_qty']; ?>" onkeyup="cargo_amount3(this);" >
																	 <span for="invitems_quantity" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	<select class="form-control input-small unitmaster" name="invitems_unit[]" id="invitems_unit" >
																	 <?php 	foreach ($this->data['units'] as $p => $q) {
																	 	if ($q['id']==$v['approx_unit']) { 
																	 ?>		
																	 <option value="<?php echo $q['id']; ?>" selected><?php echo $q['unit_name']; ?></option>
																	 <?php } else { ?>
																	 <option value="<?php echo $q['id'];; ?>"><?php echo $q['unit_name']; ?></option>	
																	 <?php } } ?>
																	 </select>
																	<span for="invitems_unit" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="invitems_rate[]" id="invitems_rate" value="<?php echo $v['invoice_work_rate']; ?>" onkeyup="cargo_amount3(this);" >
																	 <span for="invitems_rate" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small invitems_amt" placeholder="" name="invitems_amt[]" id="invitems_amt" value="<?php echo $v['invoice_work_amount']; ?>" >
																	 <span for="invitems_amt" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <!--<input type="button" class="form-control input-small rmv" value="Delete Cargo" id="delete_cargo_row">-->
																	 <a class="btn btn-danger btn-xs rmv" title="Delete Row"><i class="fa fa-times fa-fw"></i></a>
																</td>										
															</tr>
															<?php } ?>														
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
													                	if ($currency["id"]==$invoice_data['invoice_currency']) {
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
																<input type="number" class="form-control" placeholder="" name="invoice_ex_rate" id="invoice_ex_rate" value = "<?php echo $invoice_data['invoice_ex_rate']; ?>">
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
																<input type="number" class="form-control" placeholder="" name="invoice_subtotal_amt" id="invoice_subtotal_amt" value= "<?php echo $invoice_data['invoice_basic_amt']; ?>" readonly>
																<span for="invoice_subtotal_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">VAT (%) </font></label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_total_vat_percnt" id="invoice_total_vat_percnt" value="<?php echo $invoice_data['invoice_vat_percent']; ?>">
																<span for="invoice_total_vat_percnt" class="help-block"></span>
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
																<input type="text" class="form-control" placeholder="" name="invoice_total_tax_amt" id="invoice_total_tax_amt" value="<?php echo $invoice_data['invoice_tax_amt']; ?>" readonly>
																<span for="invoice_total_tax_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Total Invoice Amount*</font></label>
															<div class="col-md-9">
																<input type="number" class="form-control" placeholder="" name="invoice_total_full_amt" id="invoice_total_full_amt" value="<?php echo $invoice_data['invoice_amt']; ?>" readonly>
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
															<a href="<?php echo BASE_PATH; ?>Viewproformainvoice"><button type="button" class="btn default">Cancel</button></a>
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



			
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
							<a href="index.html">
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
								<a href="<?php echo BASE_PATH; ?>Viewfileregister" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View File Register
									</span>
								</a>
								<a href="<?php echo BASE_PATH; ?>Viewinvoicefileregister" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Invoice
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
										<form action="" method="post" class="form-horizontal addinvoicefileregister-form">
											<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';	
											?>

											<div class="form-body">
												<h3 class="form-section">Invoice Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File No*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="file_no" id="file_no">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['file_data'];

													                foreach($rows as $file_data){ 
													                	echo '<option value='.$file_data["id"].'>'.$file_data["file_no"].'</option>';

													                }	
																	?>
																</select>
																<span for="inv_file_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Creation Date*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="" readonly>
																<span for="inv_file_date" class="help-block"></span>
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
																<input type="hidden" class="form-control" placeholder="" name="client_id" id="client_id" value="" readonly>
																<input type="text" class="form-control" placeholder="" name="client_name" id="client_name" value="" readonly>
																<span for="client_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Date*</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="0d">
																<input type="text" class="form-control" name="invoice_date" id="invoice_date" value="<?php echo date('d-m-Y'); ?>" readonly>
																<span for="invoice_date" class="help-block"></span>
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
															<label class="control-label col-md-3">Invoiced To*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_to" id="invoice_to" value="" readonly>
																<span for="invoice_to" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="client_address" id="client_address" readonly></textarea>
																<span for="client_address1" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
                                                <?php /*
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address2</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="client_address2" id="client_address2"></textarea>
																<span for="client_address2" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address3</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="client_address3" id="client_address3"></textarea>
																<span for="client_address3" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												*/ ?>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Country*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="country_name" id="country_name" readonly>
																<input type="hidden" class="form-control" placeholder="" name="company_country" id="company_country" readonly>
																<span for="company_country" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">State*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="state_name" id="state_name" readonly>
																<input type="hidden" class="form-control" placeholder="" name="company_state" id="company_state" readonly>
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
																<input type="text" class="form-control" placeholder="" name="city_name" id="city_name" readonly>
																<input type="hidden" class="form-control" placeholder="" name="company_city" id="company_city" readonly>
																<span for="company_city" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">VAT No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_vat" id="client_vat" value="">
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
															<label class="control-label col-md-3">Place Of Service*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_city" id="invoice_city" value="<?php echo $_SESSION['branch_name']; ?>" readonly>
																<span for="invoice_city" class="help-block"></span>
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
												</div>
												<!--/row-->

											<h3 class="form-section alert alert-info">File Parameters</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
							<div class="table-responsive">
								<div id="file_parameter_div">
								<table class="table table-bordered table-hover">
								<thead>
								<tr>
									<th width="50%">
										 File Type
									</th>
									<th width="50%">
										 Parameters
									</th>
								</tr>
								</thead>
								<tbody>
								<tr class="active">
									<td>
										 Vessel Name
									</td>
									<td>
										 <input type="text" class="form-control" placeholder="" name="vessel_name" id="vessel_name" value="" readonly>
									</td>
								</tr>
								<tr class="active">
									<td>
										 Voyage No
									</td>
									<td>
										 <input type="text" class="form-control" placeholder="" name="voyage_no" id="voyage_no" value="" readonly>
									</td>
								</tr>
								<tr class="active">
									<td>
										 Cargo Group
									</td>
									<td>
										 <input type="text" class="form-control" placeholder="" name="cargo_group" id="cargo_group" value="" readonly>
									</td>
								</tr>
								<tr class="active">
									<td>
										 Cargo
									</td>
									<td>
										 <input type="text" class="form-control" placeholder="" name="cargo_master" id="cargo_master" value="" readonly>
									</td>
								</tr>
								<tr class="active">
									<td>
										 Packing
									</td>
									<td>
										 <input type="text" class="form-control" placeholder="" name="packing" id="packing" value="" readonly>
									</td>
								</tr>
								<tr class="active">
									<td>
										 Packing Desc
									</td>
									<td>
										 <input type="text" class="form-control" placeholder="" name="packing_desc" id="packing_desc" value="" readonly>
									</td>
								</tr>
								<tr class="active">
									<td>
										 Approx.Qty/Unit
									</td>
									<td>
										 <div class="checkbox-list"><label class="checkbox-inline"><input type="text" class="form-control" id="approx_qty" name="approx_qty" readonly></label><label class="checkbox-inline"><input type="text" class="form-control" id="approx_unit" name="approx_unit" readonly></label></div>
									</td>
								</tr>
								<tr class="active">
									<td>
										 File Instructions
									</td>
									<td>
										 <input type="text" class="form-control" placeholder="" name="file_ins" id="file_ins" value="" readonly>
									</td>
								</tr>
								<tr class="active">
									<td>
										 Place Of Attendance
									</td>
									<td>
										 <input type="text" class="form-control" placeholder="" name="place" id="place" value="" readonly>
									</td>
								</tr>
								<tr class="active">
									<td>
										 Origin
									</td>
									<td>
										 <input type="text" class="form-control" placeholder="" name="origin" id="origin" value="" readonly>
									</td>
								</tr>
								<tr class="active">
									<td>
										 Load Port
									</td>
									<td>
										 <input type="text" class="form-control" placeholder="" name="load_port" id="load_port" value="" readonly>
									</td>
								</tr>
								<tr class="active">
									<td>
										 Discharge Port
									</td>
									<td>
										 <input type="text" class="form-control" placeholder="" name="discharge_port" id="discharge_port" value="" readonly>
									</td>
								</tr>
								</tbody>
								</table>
								</div>
							</div>
						</div>
													</div>
												</div>	


											<h3 class="form-section alert alert-info">Invoice Parameters</h3>	

											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-12">
														<div class="col-md-offset-3 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<button type="button" class="btn default">Cancel</button>
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


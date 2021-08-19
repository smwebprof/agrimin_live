
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Credit Note Register
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
								Masters
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Credit Note Register
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
									 Credit Note Register
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
											<i class="fa fa-reorder"></i>Credit Note Register Form
										</div>
										<div class="actions">
										<a href="<?php echo BASE_PATH; ?>Viewinvoicecreditnoteregister" class="btn default yellow-stripe">
										<i class="fa fa-plus"></i>
										<span class="hidden-480">
										 	View Credit Note
										</span>
										</a>	
								<?php /*<a href="<?php echo BASE_PATH; ?>viewunitmaster" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Units
									</span>
								</a>*/ ?>
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
											<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';

												   if (@$_GET['msg']==1) { echo '<font size="3" color="red">Data Saved Succesfully</font>'; }
												   if (@$_GET['msg']==2) { echo '<font size="3" color="red">Credit Note Amount is Greater than Invoice Amount</font>'; }		
											?>
											<div class="form-body">
												<?php
												if (isset($this->data['invoice_details'])) {?>
												<form action="" method="post" class="form-horizontal creditnoteregister-form" name="creditnote_details">
												<input type="hidden" name="invoice_id" value="<?php echo $this->data['invoice_details'][0]['id']; ?>">
												<input type="hidden" name="invoice_no" value="<?php echo $this->data['invoice_details'][0]['invoice_no']; ?>">
												<input type="hidden" name="invoice_add" value="Add">
												<input type="hidden" name="invoice_tax_amt" id="invoice_tax_amt" value="">

												<input type="hidden" name="invoice_currency" id="invoice_currency" value="<?php echo $this->data['invoice_details'][0]['invoice_currency']; ?>">
												<input type="hidden" name="invoice_ex_rate" id="invoice_ex_rate" value="<?php echo $this->data['invoice_details'][0]['invoice_ex_rate']; ?>">
												<input type="hidden" name="invoice_basic_ex_amt" id="invoice_basic_ex_amt" value="<?php echo $this->data['invoice_details'][0]['invoice_basic_ex_amt']; ?>">	
												<h3 class="form-section alert alert-info">Credit Note Info</h3>
												<?php $rows2 = @$this->data['invoice_details'];
 
												foreach($rows2 as $invoice_details){	
												?>
												<input type="hidden" name="client_id" value="<?php echo $invoice_details['client_id']; ?>">
												<input type="hidden" name="file_id" value="<?php echo $invoice_details['file_no']; ?>">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Job No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_no" id="file_no" value="<?php echo $invoice_details['fileno']; ?>" readonly>
																<span for="file_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Invoice Date</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_date" id="invoice_date" value="<?php echo $invoice_details['invoice_date']; ?>" readonly>
																<span for="invoice_date" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Vessel</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="vessel_name" id="vessel_name" value="<?php echo $invoice_details['vessel_name']; ?>" readonly>
																<span for="file_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Commodity</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="cargo_master" id="cargo_master" value="<?php echo $invoice_details['cargo_master']; ?>" readonly>
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
															<label class="control-label col-md-3">Quantity</label>
															<div class="col-md-9">
																<div class="checkbox-list"><label class="checkbox-inline"><input type="text" class="form-control" id="approx_qty" name="approx_qty" value="<?php echo $invoice_details['approx_qty']; ?>" readonly></label><label class="checkbox-inline"><input type="text" class="form-control" id="approx_unit" name="approx_unit" value="<?php if ($invoice_details['approx_unit']) { echo $invoice_details['approx_unit']; } else { echo $this->data['approx_unit1']; } ?><?php #echo $this->data['approx_unit']; ?>" readonly></label></div>
																<span for="file_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Loading Port</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="load_port" id="load_port" value="<?php echo $invoice_details['load_port']; ?>" readonly>
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
															<label class="control-label col-md-3">Discharge Port</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="discharge_port" id="discharge_port" value="<?php echo $invoice_details['discharge_port']; ?>" readonly>
																<span for="file_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Inspection Date</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="inspection_date" id="inspection_date" value="<?php echo $invoice_details['inspection_date']; ?>" readonly>
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
															<label class="control-label col-md-3">Invoice Amount</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_amt" id="invoice_amt" value="<?php echo $invoice_details['invoice_amt']; ?>" readonly>
																<span for="invoice_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Kind Attention*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_contact" id="client_contact" value="">
																<span for="client_contact" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Credit Note Remarks</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="credit_remarks" id="credit_remarks" maxlength="200"></textarea>
																<span for="credit_remarks" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Kind Attention</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_contact" id="client_contact" value="">
																<span for="client_contact" class="help-block"></span>
															</div>
														</div>
													</div>*/ ?>
													<!--/span-->
												</div>
												<!--/row-->
												<?php } ?>
												
												
												<h3 class="form-section alert alert-info">Credit Note Details</h3>
												<?php $i=1; ?>
												<div class="row">
													<div class="col-md-12">
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
															</tr>
															</thead>
															<tbody>
															<tr class="active">
																<td>
																	<input type="text" class="form-control input-large" placeholder="" name="invitems_cargo_name[]" id="invitems_cargo_name" value="" required>
																	<span for="invitems_cargo_name" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="invitems_quantity[]" id="invitems_quantity" value="" onkeyup="cargo_amount4(this);">
																	 <span for="invitems_quantity" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	 <select class="form-control input-small" data-placeholder="Select..." name="invitems_unit[]" id="invitems_unit">
																	<!--<option value=""></option>-->
																	<?php
													                $rows = $this->data['units'];

													                	echo '<option value="">Select</option>';

													                foreach($rows as $units){ 
													                	echo '<option value="'.$units["unit_name"].'">'.$units["unit_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="invitems_unit" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="invitems_rate[]" id="invitems_rate" value="0" onkeyup="cargo_amount4(this);">
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
													<!--/span-->
												</div>
											</div>
											<div class="form-actions top right">
												<button type="button" class="btn green" name="div_invoice_items_btn" id="div_invoice_items_btn">Calculate Credit Note</button>
											 </div>		
											<h3 class="form-section alert alert-info">Credit Note Details</h3>
											
											<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Basic Amount</font></label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_subtotal_amt" id="invoice_subtotal_amt" value = "" readonly>
																<span for="invoice_subtotal_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">VAT %</font></label>
															<div class="col-md-9">
																<input type="number" class="form-control" placeholder="" name="invoice_total_vat_percnt" id="invoice_total_vat_percnt" value = "">
																<span for="invoice_total_vat_percnt" class="help-block"></span>
															</div>
														</div>
													</div>
											</div>
											<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Tax Amount</font></label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_total_tax_amt" id="invoice_total_tax_amt" value = "" readonly>
																<span for="invoice_total_tax_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Total Amount</font></label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_total_full_amt" id="invoice_total_full_amt" value = "" readonly>
																<span for="invoice_total_full_amt" class="help-block"></span>
															</div>
														</div>
													</div>
											</div>


											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<a href="<?php echo BASE_PATH;?>Viewinvoicecreditnoteregister"><button type="button" class="btn default">Close</button></a>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										<!-- END FORM-->
										</form>
										<?php } ?>
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


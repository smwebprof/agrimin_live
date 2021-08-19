
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Invoice Report (Full View - Multiple) 
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
							<a href="<?php echo BASE_PATH; ?>viewinteractionreport">
								Reports
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Invoice Report - Full View - Multiple
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
									 Invoice Report
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
								<!-- Start PORTLET-->
								<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Invoice Report - Full View - Multiple
							</div>
							<!--<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>-->
							<div class="actions">
								<a href="<?php echo BASE_PATH; ?>Viewinvoicefileregister" class="btn blue">
									<i class="fa fa-pencil"></i>View Invoices
								</a>
								<?php /*if ($this->data['invoice_data'][0]['invoice_type'] == 'Draft') { ?>
								<?php if ($_SESSION['country_code']=='CH')  { ?>
								<a href="<?php echo BASE_PATH; ?>Fullviewperfinvoicefilereportpdf_CH?id=<?php echo base64_encode($this->data['id']); ?>" class="btn green" target="_blank">
									<i class="fa fa-pencil"></i>Proforma Invoice Report
								</a>
								<?php } else { ?>
								<a href="<?php echo BASE_PATH; ?>Fullviewperfinvoicefilereportpdf?id=<?php echo base64_encode($this->data['id']); ?>" class="btn green" target="_blank">
									<i class="fa fa-pencil"></i>Proforma Invoice Report
								</a>
								<?php } ?>
								<?php }*/ ?>
								<?php if ($this->data['invoice_data'][0]['invoice_type'] == 'Draft') { ?>
								<?php if ($_SESSION['country_code']=='CH')  { ?>
								<a href="<?php echo BASE_PATH; ?>Fullviewdraftmultinvoicefilereportpdf_CH?id=<?php echo $_GET['id']; ?>" class="btn default yellow-stripe" target="_blank">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Draft Invoice
									</span>
								</a>
								<?php } else { ?>
								<a href="<?php echo BASE_PATH; ?>Fullviewdraftmultinvoicefilereportpdf?id=<?php echo $_GET['id']; ?>" class="btn default yellow-stripe" target="_blank">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Draft Invoice
									</span>
								</a>
								<?php } ?>
								<?php } ?>
								<?php if ($this->data['invoice_data'][0]['invoice_type'] == 'Final') { ?>
								<?php if ($_SESSION['country_code']=='CH')  { ?>
								<a href="<?php echo BASE_PATH; ?>Fullviewinvoicemultifilereportpdf_CH?id=<?php echo base64_encode($this->data['id']); ?>" class="btn green" target="_blank">
									<i class="fa fa-pencil"></i>Final Invoice Report
								</a>
								<?php } else { ?>
								<a href="<?php echo BASE_PATH; ?>Fullviewinvoicemultifilereportpdf?id=<?php echo base64_encode($this->data['id']); ?>" class="btn green" target="_blank">
									<i class="fa fa-pencil"></i>Final Invoice Report
								</a>
								<?php } ?>
								<?php } ?>	
								<!--<a href="#" class="btn red">
									<i class="fa fa-pencil"></i> Print To PDF 
								</a>-->
								<!--<div class="btn-group">
									<a class="btn green" href="#" data-toggle="dropdown">
										<i class="fa fa-cogs"></i> Tools <i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
												<i class="fa fa-pencil"></i> Edit
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-trash-o"></i> Delete
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-ban"></i> Ban
											</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">
												<i class="i"></i> Make admin
											</a>
										</li>
									</ul>
								</div>-->
							</div>
						</div>
						<?php $rows = $this->data['invoice_data'];
											
						foreach($rows as $invoice_data){

						?>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<?php if ($invoice_data['invoice_type']=='Final') { ?>	
							<tr>
								<td width="50%">
									 <strong>Invoice No</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_no']; ?>
								</td>
							</tr>
							<?php } ?>
							<tr>
								<td width="50%">
									 <strong>File No</strong>
								</td>
								<td>
									<?php echo $invoice_data['file_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>File Creation Date</strong>
								</td>
								<td>
									<?php echo date('d-m-Y',strtotime($invoice_data['file_creation_date'])); ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Client</strong>
								</td>
								<td>
									<?php echo $invoice_data['client_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Date</strong>
								</td>
								<td>
									<?php echo date('d-m-Y'); ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Address</strong>
								</td>
								<td>
									<?php echo $invoice_data['address']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Postal Code</strong>
								</td>
								<td>
									<?php echo $invoice_data['zip_pin_code']; ?>
								</td>
							</tr>
							</table>
						</div>
					</div>
					<!-- END PORTLET-->


					<!-- Start PORTLET-->
								<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>File Parameters
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<?php if ($invoice_data['file_no_type']=='Inspection') { ?>
							<tr>
								<td width="50%">
									 <strong>Scope Of Work</strong>
								</td>
								<td>
									<?php echo $invoice_data['scope_work']; ?>
								</td>
							</tr>
							<?php } ?>	
							<?php if ($invoice_data['file_no_type']=='Inspection') { ?>
							<tr>
								<td width="50%">
									 <strong>Warehouse</strong>
								</td>
								<td>
									<?php echo $invoice_data['warehouse']; ?>
								</td>
							</tr>
							<?php } else { ?>	
							<tr>
								<td width="50%">
									 <strong>Vessel Name</strong>
								</td>
								<td>
									<?php echo $invoice_data['vessel_name']; ?>
								</td>
							</tr>
							<?php } ?>
							<tr>
								<td>
									 <strong>Voyage No</strong>
								</td>
								<td>
									<?php echo $invoice_data['voyage_no']; ?>
								</td>
							</tr>
							<?php if ($invoice_data['file_no_type']!='Inspection') { ?>
							<tr>
								<td>
									 <strong>Cargo Group</strong>
								</td>
								<td>
									<?php echo $invoice_data['cargo_group']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Commodity</strong>
								</td>
								<td>
									<?php echo $invoice_data['cargo_master']; ?>
								</td>
							</tr>							
							<?php /*<tr>
								<td>
									 <strong>File Instructions</strong>
								</td>
								<td>
									<?php echo $invoice_data['file_ins']; ?>
								</td>
							</tr>*/ ?>
							<tr>
								<td>
									 <strong>Quantity</strong>
								</td>
								<td>
									<?php echo $invoice_data['approx_qty']; ?> <?php echo @$invoice_data['approx_unit'];?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Balance Quantity</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_curr_bal']; ?> <?php echo @$invoice_data['approx_unit'];?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Loading Port</strong>
								</td>
								<td>
									<?php echo $invoice_data['load_port']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Discharge Port</strong>
								</td>
								<td>
									<?php echo $invoice_data['discharge_port']; ?>
								</td>
							</tr>
							<?php } ?>
							<?php if (@$_SESSION['country_code']=='SG') { ?>
							<tr>
								<td>
									 <strong>Inspection Date</strong>
								</td>
								<td>
									<?php echo $invoice_data['inspection_date']; ?>
								</td>
							</tr>
							<?php } ?>
							<?php if (@$_SESSION['country_code']!='SG') { ?>
							<tr>
								<td>
									 <strong>Inspection Start Date</strong>
								</td>
								<td>
									<?php echo $invoice_data['inspection_start_date']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Inspection End Date</strong>
								</td>
								<td>
									<?php echo $invoice_data['inspection_end_date']; ?>
								</td>
							</tr>
							<?php } ?>
							<tr>
								<td>
									 <strong>Bill of Lading Number</strong>
								</td>
								<td>
									<?php echo $invoice_data['bill_lading_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Bill of Lading Date</strong>
								</td>
								<td>
									<?php echo $invoice_data['bill_lading_date']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Remarks</strong>
								</td>
								<td>
									<?php echo @$invoice_data['invoice_remarks']; ?>
								</td>
							</tr>
							</table>
						</div>
					</div>
					<!-- END PORTLET-->

					<!-- Start PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Invoice Details
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-bordered table-hover">
								<tr>
								<td width="50%">
									 <strong>Invoice Details</strong>
								</td>
								<td>
								<?php
									/*$i=1;
									$rows = $this->data['invoice_details'];
										foreach($rows as $invoice_part){ 
											echo $invoice_part['work_type'];break;

										}*/
									echo @$invoice_data['invoice_desc'];		
								?>	
								</td>
								</tr>
							</table>
					</div>	

					<!-- Start PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Invoice Parameters
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-bordered table-hover">
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
																	 Discount (%)
																</th>
																<th>
																	 Amount
																</th>
															</tr>
															</thead>
															<tbody>
															<?php
															$i=1;
													        $rows = $this->data['invoice_details'];
													        foreach($rows as $invoice_details){ 
													        	#print_r($invoice_details);exit;
													        	#if ($i == 1) { $inv_display = "style='display:none;'"; } else { $inv_display = ""; }
													        ?>	
															<tr class="active" <?php #echo $inv_display; ?>>
																<td>																	
																	<input type="text" class="form-control input-large" placeholder="" name="div_work_type[]" id="div<?php echo $i; ?>_work_type" value="<?php echo $invoice_details['work_type']; ?>" readonly>
																</td>
																<td>
																	 <input type="number" class="form-control input-small" id="div<?php echo $i; ?>_approx_qty" name="div_approx_qty[]" value="<?php echo trim($invoice_details['approx_qty']);?>" readonly>
																</td>
																<td>																	
																	<input type="text" class="form-control input-large" placeholder="" name="div_approx_unit[]" id="div<?php echo $i; ?>_approx_unit" value="<?php echo $invoice_details['approx_unit']; ?>" readonly>
																</td>	
																<td>
																	 <input type="number" class="form-control input-small" placeholder="" name="div_invoice_rate[]" id="div<?php echo $i; ?>_invoice_rate" value="<?php echo $invoice_details['invoice_work_rate']; ?>" readonly>
																</td>
																<td>
																	 <input type="number" class="form-control input-small" placeholder="" name="div_invoice_discount[]" id="div<?php echo $i; ?>_invoice_discount" value="<?php echo $invoice_details['invoice_work_discount']; ?>" readonly>
																</td>
																<td>
																	 <input type="number" class="form-control input-small" placeholder="" name="div_invoice_amt[]" id="div<?php echo $i; ?>_invoice_amt" value="<?php if ($invoice_details['invoice_work_amount']) echo $invoice_details['invoice_work_amount']; ?>" readonly>
																</td>
															</tr>
															<?php 
															$i++;
															} ?>
															</tbody>
															</table>	
						</div>
					</div>
					<!-- END PORTLET-->

					<!-- Start PORTLET-->
								<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Invoice Amount
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td>
									 <strong>Currency</strong>
								</td>
								<td>
									<?php echo $invoice_data['currency']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Exchange Rate</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_ex_rate']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Basic amount</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_basic_amt']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Discount (%)</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_discount']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Discount Amount</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_discount_amt']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>VAT (%)</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_vat_percent']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Total Tax Amount</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_tax_amt']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Total Invoice Amount</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_amt']; ?>
								</td>
							</tr>
							</table>
						</div>
					</div>
					<!-- END PORTLET-->

					
					<!-- Start PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Invoice Generated By :
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td>
									 <strong>Created By :</strong>
								</td>
								<td>
									<?php echo $invoice_data['fname']." ".$invoice_data['lname'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Created On Date:</strong>
								</td>
								<td>
									<?php echo date('d-m-Y',strtotime($invoice_data['entry_date'])) ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Modified By :</strong>
								</td>
								<td>
									<?php echo $invoice_data['ename']." ".$invoice_data['elname'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Modified On Date:</strong>
								</td>
								<td>
									<?php echo date('d-m-Y',strtotime($invoice_data['modify_date'])) ?>
								</td>
							</tr>
						
							</table>
						</div>
					</div>
					<!-- END PORTLET-->

					<?php
				    }
				    ?>


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


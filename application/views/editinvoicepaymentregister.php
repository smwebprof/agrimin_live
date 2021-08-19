
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Payment Receipt Entry
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
								Payment Receipt
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
									 Payment Receipt
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
											<i class="fa fa-reorder"></i>Payment Receipt Form
										</div>
										<div class="actions">
								<a href="<?php echo BASE_PATH; ?>Viewfileinvoicepayment" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Payment Receipt
									</span>
								</a>
								<?php /*<a href="<?php echo BASE_PATH; ?>Operationfileregister?id=<?php echo $_GET['id']; ?>" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Operations
									</span>
								</a>*/ ?>
								
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
										<form action="" method="post" class="form-horizontal payinvfileregister-form">
											<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';	
											?>
											<?php $rows = $this->data['invoice_data'];
											
											foreach($rows as $invoice_data){
											?>
											<input type="hidden" name="invoice_file_no" id="invoice_file_no" value="<?php echo $invoice_data['file_no']; ?>">
											<input type="hidden" name="payment_id" id="payment_id" value="<?php echo $invoice_data['id']; ?>">
											<input type="hidden" name="invoice_id" id="invoice_id" value="<?php echo $invoice_data['invoice_no']; ?>">
											<div class="form-body">
												<h3 class="form-section">Invoice Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Invoice No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoiceid" id="invoiceid" value="<?php echo $invoice_data['invoiceno']; ?>" readonly>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Payment Date*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="payment_date" id="payment_date" value="<?php echo date('d-m-Y'); ?>" readonly>
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
															<label class="control-label col-md-3">Client Name*</label>
															<div class="col-md-9">
																<input type="hidden" class="form-control" placeholder="" name="client_id" id="client_id" value="<?php echo $invoice_data['client_id']; ?>">
																<input type="text" class="form-control" placeholder="" name="client_name" id="client_name" value="<?php echo $invoice_data['client_name']; ?>">
																<span for="client_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Pay Mode*</label>
															<div class="col-md-9">
																<select class="form-control" name="pay_mode" id="pay_mode">
																	<option value="">Please Select</option>
																	<option value="Bank Transfer" <?php if ($invoice_data['pay_mode']=='Bank Transfer') { echo 'selected';} ?>>Bank Transfer</option>
																	<option value="CASH" <?php if ($invoice_data['pay_mode']=='CASH') { echo 'selected';} ?>>CASH</option>
																	<option value="Cheque" <?php if ($invoice_data['pay_mode']=='Cheque') { echo 'selected';} ?>>Cheque</option>
																	<option value="Draft" <?php if ($invoice_data['pay_mode']=='Draft') { echo 'selected';} ?>>Draft</option>
																</select>	
																<span for="pay_mode" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Cheque/Draft No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="cheque_no" id="cheque_no" value="<?php echo $invoice_data['cheque_no']; ?>">
																<span for="cheque_no" class="help-cheque_no"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Cheque/Draft Date</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m">
																<input type="text" class="form-control" name="cheque_date" id="cheque_date" value="<?php echo $invoice_data['cheque_date']; ?>"readonly>
																<span for="cheque_date" class="help-block"></span>
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
															<label class="control-label col-md-3">Invoice Amount</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_amt" id="invoice_amt" value="<?php echo $invoice_data['invoice_amt']; ?>">
																<span for="invoice_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Basic Amt*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_basic_amt" id="invoice_basic_amt" value="<?php echo $invoice_data['invoice_basic_amt']; ?>">
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
															<label class="control-label col-md-3">Invoice Received Amount*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_rec_amt" id="invoice_rec_amt" value="<?php echo $invoice_data['invoice_rec_amt']; ?>">
																<span for="invoice_rec_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Balance Amt*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_balane_amt" id="invoice_balane_amt" value="<?php echo $invoice_data['invoice_balane_amt']; ?>" readonly>
																<span for="invoice_balane_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<?php /*<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Exchange Rate</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_ex_rate" id="invoice_ex_rate" value="">
																<span for="invoice_ex_rate" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Exchange Amt</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="invoice_ex_amt" id="invoice_ex_amt" value="">
																<span for="invoice_ex_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>*/ ?>
												<!--/row-->		
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Vat Percentage</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="vat_percent" id="vat_percent" value="<?php echo $invoice_data['vat_percent']; ?>">
																<span for="vat_percent" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Vat Amount</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="vat_amt" id="vat_amt" value="<?php echo $invoice_data['vat_amt']; ?>">
																<span for="vat_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Other Deductions</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="oth_dedcut" id="oth_dedcut" value="<?php echo $invoice_data['oth_dedcut']; ?>">
																<span for="oth_dedcut" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Remarks</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="remarks" id="remarks" value="<?php echo $invoice_data['remarks']; ?>">
																<span for="remarks" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<?php
												}
												?>

											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
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


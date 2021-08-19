
			
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
									 Payment Receipt Form
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
								<a href="<?php echo BASE_PATH; ?>Viewfileregister" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View File Register
									</span>
								</a>
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
											?>
											<?php $rows = $this->data['invoice_data'];
											
											foreach($rows as $invoice_data){
											?>
											<div class="form-body">
												<h3 class="form-section">Invoice Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_no" id="file_no" value="<?php echo $invoice_data['id']; ?>" readonly>
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
																<input type="text" class="form-control" placeholder="" name="client_name" id="client_name" value="<?php echo $invoice_data['client_name']; ?>">
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
																<input type="text" class="form-control" placeholder="" name="invoice_to" id="invoice_to" value="<?php echo $invoice_data['client_name']; ?>">
																<span for="invoice_to" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="client_address" id="client_address"><?php echo $invoice_data['address']; ?></textarea>
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
																<select class="form-control" name="company_country" id="company_country">
																<option value="">Select Country</option>	
																	<?php
													                $rows = $this->data['countries'];

													                foreach($rows as $countries){ 
													                    if ($invoice_data['country_id']==$countries["id"]) {
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
																<select class="form-control" name="company_state" id="company_state">
																<option value="">Select State</option>
																<?php
													                $rows = $this->data['states'];

													                foreach($rows as $states){ 
													                    if ($invoice_data['state_id']==$states["id"]) {
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
																<select class="form-control" name="company_city" id="company_city">
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
																<span for="company_city" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">VAT No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_vat" id="client_vat" value="<?php echo $invoice_data['vat_no']; ?>">
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

													
												<?php
												}
												?>

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


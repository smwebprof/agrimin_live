
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Account Ledger Form
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
							<a href="<?php echo BASE_PATH; ?>viewaccountledgerfileno">
								Accounts
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Account Ledger Form
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
									 Account Ledger Form
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
											<i class="fa fa-reorder"></i>Account Ledger Form Form
										</div>
										<div class="actions">
								<a href="<?php echo BASE_PATH; ?>viewaccountledgerfileno" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Account Ledger
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

										<form action="" method="post" class="form-horizontal accountledgerfileno-form">

											<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';	
											?>
											<?php if (@$_GET['msg']==1) { echo '<font size="3" color="red">Ledger Amount is Greater Than Balance Amount!!!</font>'; } ?>
											<div class="form-body">
												<h3 class="form-section">Ledger Details</h3>
												<?php $rows = $this->data['ledger_data'];
										
												foreach($rows as $ledger_data){

												?>
												<input type="hidden" class="form-control" placeholder="" name="ledger_id" id="ledger_id" value="<?php echo $ledger_data['id']; ?>">
												<input type="hidden" class="form-control" placeholder="" name="vendor_id" id="vendor_id" value="<?php echo $ledger_data['vendor_name']; ?>">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Vendor Name*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="vendor_name" id="vendor_name" value="<?php echo $this->data['vendor_details'][0]['vendor_name']; ?>" readonly>
																<span for="vendor_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Ledger Date*</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-2y">
																<input type="text" class="form-control" name="ledger_date" id="ledger_date" value="<?php echo date('d-m-Y'); ?>"readonly>
																<span for="cheque_date" class="help-block"></span>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
																</div>
																<span for="ledger_date" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">ACI-File No*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="ledger_file_no" id="ledger_file_no">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['files_data'];

													                foreach($rows as $files_data){ 													                	
													                	if ($ledger_data['file_no']==$files_data["file_no"]) {
													                    	echo '<option value='.$files_data["file_no"].' selected>'.$files_data["file_no"].'</option>';
													                    } else {
													                		echo '<option value='.$files_data["file_no"].'>'.$files_data["file_no"].'</option>';
													                    }

													                }	
																	?>
																</select>
																<span for="ledger_file_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">ACI-Invoice No</label>
															<div class="col-md-9">
																<!--<select class="form-control input-large select2me" data-placeholder="Select..." name="ledger_invoice_no" id="ledger_invoice_no">--->
																<select class="form-control input-medium" name="ledger_invoice_no" id="ledger_invoice_no">	
																<?php
													                $rows = $this->data['invoice_data'];

													                foreach($rows as $invoice_data){ 													                	
													                	if ($ledger_data['invoice_no']==$invoice_data["invoice_no"]) {
													                    	echo '<option value='.$invoice_data["invoice_no"].' selected>'.$invoice_data["invoice_no"].'</option>';
													                    }/* else {
													                		echo '<option value='.$invoice_data["invoice_no"].'>'.$invoice_data["invoice_no"].'</option>';
													                    }*/

													                }
													            ?>    
																</select>
																<span for="ledger_invoice_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->	

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">ACI-Invoice Amount</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="ledger_invoice_amt" id="ledger_invoice_amt" value="<?php echo $ledger_data['invoice_amt']; ?>" readonly>
																<span for="invoice_amt" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Narration*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="ledger_narration" id="ledger_narration"></textarea>
																<span for="ledger_narration" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Ledger Number*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="ledger_number" id="ledger_number" value="<?php echo $ledger_data['ledger_number']; ?>">
																<span for="ledger_number" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Ledger Type*</label>
															<div class="col-md-9">
																<select class="form-control" name="ledger_type" id="ledger_type">
																<?php /*<option value="">Select</option>
																<option value="Opening Balance">Opening Balance</option>
																<option value="Debit" <?php if ($ledger_data['ledger_type']=='Debit') { echo 'selected'; } ?>>Debit</option>
																<option value="Credit" <?php if ($ledger_data['ledger_type']=='Credit') { echo 'selected'; } ?>>Credit</option>*/ ?>
																<option value="Debit">Debit</option>
																</select>
																<span for="ledger_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Ledger Amount*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="ledger_amount" id="ledger_amount" value = "">
																<span for="ledger_amount" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Balance Amount</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="ledger_balance" id="ledger_balance" value = "<?php echo $ledger_data['balance_amount']; ?>" readonly>
																<span for="ledger_balance" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												
											</div>                                      
                                            <?php } ?>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<a href="<?php echo BASE_PATH;?>viewaccountledgerfileno"><button type="button" class="btn default">Cancel</button></a>
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



			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Upload Ledger Data
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
							<a href="<?php echo BASE_PATH; ?>viewaccountledger">
								Accounts
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Upload Ledger Data
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
									 Upload Ledger Data 
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
											<i class="fa fa-reorder"></i>Upload Ledger Data Form
										</div>
										<div class="actions">
								<a href="<?php echo BASE_PATH; ?>uploads/Ledger_Fileno_Data_Upload.csv" class="btn yellow">
									<i class="fa fa-pencil"></i> Sample Report
								</a>
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
										<form action="" method="post" class="form-horizontal unitmaster-form" enctype="multipart/form-data">
										<input type="hidden" name="load_ledger_csv" value="1">
											<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';												   	
											?>
											<?php if (@$_GET['msg']==1) { echo '<font size="3" color="red">No Data Found!!!</font>'; } ?>
											<?php if (@$_GET['msg']==2) { echo '<font size="3" color="red">Data Uploaded Successfully!!!</font>'; } ?>	
											<?php if (@$_GET['msg']==3) { echo '<font size="3" color="red">This File Type is not allowded!!!</font>'; } ?>
											<?php if (@$_GET['msg']==4) { echo '<font size="4" color="red">Vendor Name Not Found, File is not Uploaded!!!</font>'; } ?>
											<?php if (@$_GET['msg']==5) { echo '<font size="4" color="red">Ledger Date Not Found, File is not Uploaded!!!</font>'; } ?>
											<?php if (@$_GET['msg']==6) { echo '<font size="4" color="red">File No Not Found, File is not Uploaded!!!</font>'; } ?>
											<?php if (@$_GET['msg']==7) { echo '<font size="4" color="red">File No Is Not Correct, File is not Uploaded!!!</font>'; } ?>
											<?php if (@$_GET['msg']==8) { echo '<font size="4" color="red">Invoice No Not Specified, File is not Uploaded!!!</font>'; } ?>
											<?php if (@$_GET['msg']==9) { echo '<font size="4" color="red">Invoice Amount is not correct, File is not Uploaded!!!</font>'; } ?>
											<?php if (@$_GET['msg']==10) { echo '<font size="4" color="red">Ledger No Not Specified, File is not Uploaded!!!</font>'; } ?>
											<?php if (@$_GET['msg']==11) { echo '<font size="4" color="red">Ledger Amount Not Specified, File is not Uploaded!!!</font>'; } ?>
											<?php if (@$_GET['msg']==12) { echo '<font size="4" color="red">Ledger Type Credit or Debit is Not Specified, File is not Uploaded!!!</font>'; } ?>
											
											<?php if (@$_GET['msg']==13) { echo '<font size="4" color="red">No Credit Entry Exists, File is not Uploaded!!!</font>'; } ?>
											<?php if (@$_GET['msg']==14) { echo '<font size="4" color="red">Debit Amount is Greater than Credit Balance Amount, File is not Uploaded!!!</font>'; } ?>
											<?php if (@$_GET['msg']==15) { echo '<font size="4" color="red">There is some issue with the file!!!</font>'; } ?>
											<?php if (@$_GET['msg']==16) { echo '<font size="4" color="red">Ledger Narration is Not Specified, File is not Uploaded!!!</font>'; } ?>
											<div class="form-body">
												<u>Note : Download Sample Report To Fill Data!!!</u>
												<h3 class="form-section">Upload Ledger Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Upload Ledger File</label>
															<div class="col-md-9">
																<input type="file" id='ledger_csv_file' name="ledger_csv_file">
																<!--<span>*Only xls,csv accepted</span>-->
																</div>
																<span for="ledger_csv_file" class="help-block"></span>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<?php /*<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Description</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="description"></textarea>
																<span for="description" class="help-block"></span>
															</div>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>*/?>
												<!--/row-->
												
																								
											</div>
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



			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					View Reports/Forms
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
								View Reports/Forms
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
									 View Reports/Forms
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
											<i class="fa fa-reorder"></i>View Reports/Forms
										</div>
										<div class="actions">	
									<?php if (isset($_SESSION['branch_name'])) { ?>	
									<a href="<?php echo BASE_PATH; ?>Viewfileregister" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View File Register
									</span>
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
										<form action="" method="post" class="form-horizontal operationsmaster-form" enctype="multipart/form-data">
											<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';	
											?>
											<?php $rows = $this->data['operations_data'];
											
											foreach($rows as $operations_data){
											?>
											<input type="hidden" name="file_id" id="file_id"  value="<?php echo $operations_data['id']; ?>">
											<div class="form-body">
												<h3 class="form-section">File Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_no" id="file_no" value="<?php echo $operations_data['file_no']; ?>" readonly>
																<span for="file_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Creation Date*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="<?php echo date('d-m-Y',strtotime($operations_data['file_creation_date'])); ?>" readonly>
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
															<label class="control-label col-md-3">Client Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_name" id="client_name" value="<?php echo $operations_data['client_name']; ?>" readonly>
																<span for="client_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<?php if (@$_SESSION['branch_name'] == 'India') { ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Billing Client Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="billing_name" id="billing_name" value="<?php echo $operations_data['client_name']; ?>" readonly>
																<span for="billing_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<?php } ?>
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Scope of Services</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="work_type" id="work_type" value="<?php echo $operations_data['scope_of_services']; ?>" readonly>
																<span for="work_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Commodity</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="commodity_name" id="commodity_name" value="<?php echo $this->data['commodity_name']; ?>" readonly>
																<span for="commodity_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Vessel Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="vessel_name" id="vessel_name" value="<?php echo $operations_data['vessel_name']; ?>" readonly>
																<span for="vessel_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Voyage No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="voyage_no" id="voyage_no" value="<?php echo $operations_data['voyage_no']; ?>" readonly>
																<span for="voyage_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												

												<h3 class="form-section alert alert-info">Download Reports/Forms</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
							<div class="table-responsive">
								<div id="field_parameter_div">
								<table class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>
										 Forms Type
									</th>
									<th>
										 Download Forms
									</th>
								</tr>
								</thead>
								<tbody>
								<?php /*<tr class="active">
									<td>
										 FOSFA + NIOP DOCS AMI-ACI
									</td>
									<td>
										 <span><a href="<?php echo BASE_PATH.'Downloadformswithxls/form_type_fosfa_niop?fl_no='.base64_encode($this->data['operations_data'][0]['id']); ?>" target="_blank">FOSFA + NIOP DOCS AMI-ACI</a></span>
									</td>
								</tr>*/ ?>
								<tr class="active">
									<td>
										 FOSFA DOCS AMI ACI
									</td>
									<td>
										 <span><a href="<?php echo BASE_PATH.'Downloadformswithxls/form_type_fosfa?fl_no='.base64_encode($this->data['operations_data'][0]['id']); ?>" target="_blank">FOSFA DOCS AMI ACI</a></span>
									</td>
								</tr>
								<tr class="active">
									<td>
										 PME DOCUMENTS
									</td>
									<td>
										 <span><a href="<?php echo BASE_PATH.'Downloadformswithxls/form_type_pme_doc?fl_no='.base64_encode($this->data['operations_data'][0]['id']); ?>" target="_blank">PME DOCUMENTS</a></span>
									</td>
								</tr>
								<tr class="active">
									<td>
										 PME SHORE CALCULATION
									</td>
									<td>
										 <span><a href="<?php echo BASE_PATH.'Downloadformswithxls/form_type_pme_shore_calc?fl_no='.base64_encode($this->data['operations_data'][0]['id']); ?>" target="_blank">PME SHORE CALCULATION</a></span>
									</td>
								</tr>
								<tr class="active">
									<td>
										 SEALING REPORT AMI-ACI
									</td>
									<td>
										 <span><a href="<?php echo BASE_PATH.'Downloadformswithxls/form_type_sealing_report?fl_no='.base64_encode($this->data['operations_data'][0]['id']); ?>" target="_blank">SEALING REPORT AMI-ACI</a></span>
									</td>
								</tr>
								<tr class="active">
									<td>
										 PME ULLAGE REPORT
									</td>
									<td>
										 <span><a href="<?php echo BASE_PATH.'Downloadformswithxls/form_type_pme_ullage_report?fl_no='.base64_encode($this->data['operations_data'][0]['id']); ?>" target="_blank">PME ULLAGE REPORT</a></span>
									</td>
								</tr>
								<tr class="active">
									<td>
										 ULLAGE REPORT & SHORE CALCULATION AMI-ACI
									</td>
									<td>
										 <span><a href="<?php echo BASE_PATH.'Downloadformswithxls/form_type_ullage_report_shore?fl_no='.base64_encode($this->data['operations_data'][0]['id']); ?>" target="_blank">ULLAGE REPORT & SHORE CALCULATION AMI-ACI</a></span>
									</td>
								</tr>
								<tr class="active">
									<td>
										 VEF AMI-ACI
									</td>
									<td>
										 <span><a href="<?php echo BASE_PATH.'Downloadformswithxls/form_type_vfi_ami_aci?fl_no='.base64_encode($this->data['operations_data'][0]['id']); ?>" target="_blank">VEF AMI-ACI</a></span>
									</td>
								</tr>
								<tr class="active">
									<td>
										 Loading update Format
									</td>
									<td>
										 <span><a href="<?php echo BASE_PATH.'Downloadformswithdoc/form_type_loading_format?fl_no='.base64_encode($this->data['operations_data'][0]['id']); ?>" target="_blank">Loading update Format</a></span>
									</td>
								</tr>
								<tr class="active">
									<td>
										 Pre-shipment update Format
									</td>
									<td>
										 <span><a href="<?php echo BASE_PATH.'Downloadformswithdoc/form_type_pre_shipment_update?fl_no='.base64_encode($this->data['operations_data'][0]['id']); ?>" target="_blank">Pre-shipment update Format</a></span>
									</td>
								</tr>
								<tr class="active">
									<td>
										 PRESHIPMENT SAMPLING REPORT AMI-ACI
									</td>
									<td>
										 <span><a href="<?php echo BASE_PATH.'Downloadformswithdoc/form_type_pre_shipment_sampling_report?fl_no='.base64_encode($this->data['operations_data'][0]['id']); ?>" target="_blank">PRESHIPMENT SAMPLING REPORT AMI-ACI</a></span>
									</td>
								</tr>
								<tr class="active">
									<td>
										 LOP FOR NON VEF PROVIDED ON BOARD
									</td>
									<td>
										 <span><a href="<?php echo BASE_PATH.'Downloadformswithdoc/form_type_lop_non_vef?fl_no='.base64_encode($this->data['operations_data'][0]['id']); ?>" target="_blank">LOP FOR NON VEF PROVIDED ON BOARD</a></span>
									</td>
								</tr>
								</tbody>
								</table>
								</div>
							</div>
						</div>
													</div>
												</div>

												<h3 class="form-section alert alert-info">Uploaded Documents</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
							<div class="table-responsive">
								<div id="field_parameter_div">
								<table class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>
										 Document Type
									</th>
									<th>
										 Document No
									</th>
									<th>
										 View
									</th>
									<th>
										 Upload Date
									</th>
								</tr>
								</thead>
								<tbody>
								<?php /*<tr class="active">
									<td>
										 Nomination
									</td>
									<td>
										 
									</td>
									<td>
										<a href="<?php echo BASE_PATH.'file_uploads/'.$operations_data['upload_nomination_path']; ?>" target="_blank"><?php echo $operations_data['upload_nomination_path']; ?></a>
									</td>
									<td>
										 <?php echo date('d-m-Y',strtotime($operations_data['file_creation_date'])); ?>
									</td>
								</tr> */?>
								</tbody>
								</table>
								</div>
							</div>
						</div>
													</div>
												</div>	
												
																								
											</div>

											<?php
											}
											?>
											<?php /*<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<?php if (@$_SESSION['fname']!='Guest') { ?>
															<a href="<?php echo BASE_PATH;?>Viewfileregister"><button type="button" class="btn default">Cancel</button></a>
															<?php } ?>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div> */ ?>
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


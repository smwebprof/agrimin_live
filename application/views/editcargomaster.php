
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Cargo Master
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
								Cargo Master
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
									 Cargo Master
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
								<div class="portlet box red">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Cargo Master Form
										</div>
										<div class="actions">
								<a href="<?php echo BASE_PATH; ?>viewcargomaster" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Cargo Master
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
										<form action="" method="post" class="form-horizontal cargomaster-form">
											<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';	
											?>
											<?php $rows = $this->data['cargo_data'];
										
											foreach($rows as $cargo_data){
											?>
											<input type="hidden" name="id" id="id" value="<?php echo $cargo_data['id']; ?>">
											<div class="form-body">
												<h3 class="form-section">Cargo Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Cargo Group</label>
															<div class="col-md-9">				
																	<select class="form-control" name="cargo_group_id" id="cargo_group_id">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['cargo_group'];

													                foreach($rows as $cargo_group){ 
													                	if ($cargo_data['cargo_group_id']==$cargo_group["id"]) {
													                	echo '<option value='.$cargo_group["id"].' selected>'.$cargo_group["name"].'</option>';
													                	} else {
													                		echo '<option value='.$cargo_group["id"].'>'.$cargo_group["name"].'</option>';
													                	}

													                }	
																	?>
																	</select>				
																<span for="cargo_group_id" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Commodity Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="commodity_name" id="commodity_name" value="<?php echo $cargo_data['commodity_name']; ?>">
																<span for="commodity_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Parameter Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="parameter_name" id="parameter_name" value="<?php echo $cargo_data['parameter_name']; ?>">
																<span for="parameter_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Subparameter Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="subparameter_name" id="subparameter_name" value="<?php echo $cargo_data['subparameter_name']; ?>">
																<span for="subparameter_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Test Method</label>
															<div class="col-md-9">
																
																<select class="form-control" name="test_method" id="test_method">
																	<option value="">Please Select</option>
																	<option value="Method 1">Method 1</option>
																	<option value="Method 2">Method 2</option>
																	<option value="Method 3">Method 3</option>
																	<option value="Method 4">Method 4</option>
																	<option value="Method 5">Method 5</option>
																</select>
																<span for="test_method" class="help-block"></span>
															</div> 
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Unit Id</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="unit_id" id="unit_id">
																<span for="unit_id" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Fssai Applicable</label>
															<div class="col-md-9">
																<select class="form-control" name="fssai_applicable" id="fssai_applicable">
																	<option value="">Please Select</option>
																	<option value="Yes" <?php if ($cargo_data['fssai_applicable'] == 'Yes') { echo 'Selected';} ?>>Yes</option>
																	<option value="No" <?php if ($cargo_data['fssai_applicable'] == 'No') { echo 'Selected';} ?>>No</option>
																</select>
																<span for="fssai_applicable" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Fosfa Applicable</label>
															<div class="col-md-9">
															
																<select class="form-control" name="fosfa_applicable" id="fosfa_applicable">
																	<option value="">Please Select</option>
																	<option value="Yes" <?php if ($cargo_data['fosfa_applicable'] == 'Yes') { echo 'Selected';} ?>>Yes</option>
																	<option value="No" <?php if ($cargo_data['fosfa_applicable'] == 'No') { echo 'Selected';} ?>>No</option>
																</select>
																<span for="fosfa_applicable" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Gafta Applicable</label>
															<div class="col-md-9">
																
																<select class="form-control" name="gafta_applicable" id="gafta_applicable">
																	<option value="">Please Select</option>
																	<option value="Yes" <?php if ($cargo_data['gafta_applicable'] == 'Yes') { echo 'Selected';} ?>>Yes</option>
																	<option value="No" <?php if ($cargo_data['gafta_applicable'] == 'No') { echo 'Selected';} ?>>No</option>
																</select>
																<span for="gafta_applicable" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Parameter Category</label>
															<div class="col-md-9">
															
																<select class="form-control" name="parameter_category" id="parameter_category">
																	<option value="">Please Select</option>
																	<option value="Chemical" <?php if ($cargo_data['parameter_category'] == 'Chemical') { echo 'Selected';} ?>>Chemical</option>
																	<option value="Microbiology" <?php if ($cargo_data['parameter_category'] == 'Microbiology') { echo 'Selected';} ?>>Microbiology</option>
																	<option value="Residues and Tracemetal" <?php if ($cargo_data['parameter_category'] == 'Residues and Tracemetal') { echo 'Selected';} ?>>Residues and Tracemetal</option>
																</select>
																<span for="parameter_category" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Branch Id</label>
															<div class="col-md-9">
																<select class="form-control" name="branch_id" id="branch_id">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['branch_data'];

													                foreach($rows as $branch_data){ 
													                	if ($cargo_data['branch_id']==$branch_data["id"]) {
													                	echo '<option value='.$branch_data["id"].' selected>'.$branch_data["branch_name"].'</option>';
													                	} else {
													                		echo '<option value='.$branch_data["id"].'>'.$branch_data["branch_name"].'</option>';
													                	}

													                }
																	?>
																</select>
																<span for="branch_id" class="help-block"></span>
															</div>
														</div>
													</div>
												
												</div>
												<?php
												}
												?>
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<a href="<?php echo BASE_PATH;?>viewcargomaster"><button type="button" class="btn default">Cancel</button></a>
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


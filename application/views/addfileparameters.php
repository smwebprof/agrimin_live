
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Add File Parameters
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
								Add File Parameters
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
									 Add File Parameters
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
											<i class="fa fa-reorder"></i>File Parameter Form
										</div>
										<div class="actions">
								<a href="<?php echo BASE_PATH; ?>Viewfileregister_test" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View File Register
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
										<form action="" method="post" class="form-horizontal">
											<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';	
											?>
											<div class="form-body">
												<h3 class="form-section">File Parameter Details</h3>
												<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<?php /*<input type="button" value="Add Cargo Product" id="cargo_row">*/ ?>
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover" id="cargo_details">
															<thead>
															<tr>
																<th style="text-align-last: center">
																	 Cargo
																</th>
																<th  style="text-align-last: center">
																	 Parameters
																</th>
																<th  style="text-align-last: center">
																	 Min. Units
																</th>
																<th  style="text-align-last: center">
																	 Max. Units
																</th>
																<th  style="text-align-last: center">
																	 Method
																</th>										
															</tr>
															</thead>
															<tbody>
															<?php $rows = $this->data['cargo_data'];
										
															foreach($rows as $k=>$v){  
															?>		
															<tr class="active">
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="div_cargo_products[]" id="div_cargo_products" value="<?php echo $k; ?>" readonly><br/>
																	 <span for="cargo" class="help-block"></span>
																</td>
																<td>
																	 <div class="checkbox-list">
																	 	<?php foreach ($v as $p) { ?>
																	 	<label><input type="checkbox" value="<?php echo $p['id']; ?>" name="parameters_checkbox[]" class="checkbox_check">&nbsp;&nbsp;&nbsp;<?php echo $p['name']; ?> </label><br/>
																	 	<?php } ?>	
																	 </div>	
																	 <span for="div_packing" class="help-block"></span>
																</td>																	
																<td>
																	 <?php foreach ($v as $p) { ?>
																	 <input type="text" class="form-control input-small" placeholder="" name="div_min_units[]" id="div_min_units" value="" ><br/>
																	 <?php } ?>
																</td>
																<td>
																	 <?php foreach ($v as $p) { ?>
																	 <input type="text" class="form-control input-small" placeholder="" name="div_max_units[]" id="div_max_units" value="" ><br/>
																	 <?php } ?>
																</td>
																<td>
																	 <?php foreach ($v as $p) { ?>
																	 <select class="form-control" name="div_lab_methods[]" id="div_lab_methods<?php echo $p['id']; ?>">
																	 <option value="">Select Method</option>
																     </select><br/>
																	 <?php } ?>
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
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<?php /*<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<a href="<?php echo BASE_PATH;?>viewunitmaster"><button type="button" class="btn default">Cancel</button></a>
														</div>*/ ?>
														<div class="col-md-offset-9 col-md-9">
															<button type="button" class="btn green">Submit</button>
															<a href="#"><button type="button" class="btn default">Cancel</button></a>
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



			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Weight Quality Certificate
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
								Weight Quality Certificate
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
									 Weight Quality Certificate
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
											<i class="fa fa-reorder"></i>Weight Quality Certificate  Form
										</div>
										<div class="actions">
							    <?php /*
								<a href="<?php echo BASE_PATH; ?>Viewfileregister" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View File Register
									</span>
								</a>
								*/ ?>
								<a href="<?php echo BASE_PATH; ?>Viewweightqualitycertificate?id=<?php echo $_GET['id']; ?>" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Weight Quality Certificate
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
										<div class="row">
											<div class="col-md-12">
												<?php if (@$_GET['msg']==1) { echo '<font size="3" color="red">Bill Lading Quanity is Greater Than Total Quantity!!!</font>'; } ?>
											</div>
										</div>
										<form action="" method="post" class="form-horizontal wqcertificatemaster-form">
											<input type="hidden" name="certificate_no" id="certificate_no" value="<?php echo @$_GET['cert_no']; ?>">
											<input type="hidden" name="cert_check_min" id="cert_check_min" value="<?php echo @$_GET['check_min']; ?>">
											<input type="hidden" name="cert_check_max" id="cert_check_max" value="<?php echo @$_GET['check_max']; ?>">
											<input type="hidden" name="cert_check_specs" id="cert_check_specs" value="<?php echo @$_GET['check_specs']; ?>">
											<input type="hidden" name="cert_action" id="cert_action" value="<?php echo @$_GET['action']; ?>">	
											<input type="hidden" name="total_qty" id="total_qty" value="<?php echo @$this->data['total_qty']; ?>">
											<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';	

												  
											?>
										
											<?php $rows = $this->data['certificate_data'];

											/*if ($_SESSION['branch_id']!=$rows[0]['invoice_by_branch']) {
												 echo '<h3><p>You do not have access to create Invoice</p></h3>';exit;
											}*/
	
											foreach($rows as $certificate_data){
											?>
											<input type="hidden" name="file_id" id="file_id" value="<?php echo $certificate_data['id']; ?>">
											<input type="hidden" name="file_no_type" id="file_no_type" value="<?php echo $certificate_data['file_no_type']; ?>">
													
											
											<div class="form-body">
												<h3 class="form-section">Certificate Info</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_no" id="file_no" value="<?php echo $certificate_data['file_no']; ?>" readonly>
																<span for="file_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Loading Date*</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m" data-date-end-date="0d">
																<input type="text" class="form-control" name="loading_date" id="loading_date" value="<?php echo date('d-m-Y'); ?>" readonly>
																<span for="loading_date" class="help-block"></span>
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
												<?php if (@$_GET['action']!='update') { ?>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Notify</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_notify" id="cert_notify" maxlength="150"></textarea>
																*Maxlength is 150 characters.
																<span for="cert_notify" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Certificate Date*</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m" data-date-end-date="0d">
																<input type="text" class="form-control" name="cert_date" id="cert_date" value="<?php echo date('d-m-Y'); ?>" readonly>
																<span for="cert_date" class="help-block"></span>
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
															<label class="control-label col-md-3">Shipper1*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_shipper" id="cert_shipper" maxlength="150"></textarea>
																*Maxlength is 150 characters.
																<span for="cert_shipper" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Consignee</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_consignee" id="cert_consignee" maxlength="150"></textarea>	
																*Maxlength is 150 characters.
																<span for="cert_consignee" class="help-block"></span>	
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->	

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Shipper2</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_shipper1" id="cert_shipper1" maxlength="150"></textarea>
																*Maxlength is 150 characters.
																<span for="cert_shipper1" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Shipper3</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_shipper2" id="cert_shipper2" maxlength="150"></textarea>	
																*Maxlength is 150 characters.
																<span for="cert_shipper2" class="help-block"></span>	
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
																<input type="text" class="form-control" placeholder="" name="cert_vessel" id="cert_vessel" value="<?php echo $certificate_data['vessel_name']; ?>" readonly>
																<span for="cert_vessel" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Description Of Goods</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="cert_goods" id="cert_goods" value="<?php echo $this->data['commodity']; ?>" >
																<span for="cert_goods" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Load Port</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="load_port" id="load_port" value="<?php echo $this->data['load_port']; ?>" readonly>
																<span for="load_port" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Discharge Port</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="discharge_port" id="discharge_port" value="<?php echo $this->data['discharge_port']; ?>" readonly>
																<span for="discharge_port" class="help-block"></span>
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
																<input type="text" class="form-control" placeholder="" name="approx_qty" id="approx_qty" value="<?php echo $this->data['approx_qty_unit']; ?>" readonly>
																<span for="approx_qty" class="help-block"></span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Stowage</label>
															<div class="col-md-6">
																<input type="text" class="form-control" placeholder="" name="cert_stowage" id="cert_stowage" value="">
																<span for="approx_qty" class="help-cert_stowage"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Insurance</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_insurance" id="cert_insurance" maxlength="150"></textarea>
																*Maxlength is 150 characters
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">C.B.Registration No</label>
															<div class="col-md-6">
																<input type="text" class="form-control" placeholder="" name="cert_cbreg" id="cert_cbreg" value="">
																<span for="approx_qty" class="help-cert_cbreg"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bill of lading Quantity1*</label>
															<div class="col-md-9">
																<div class="checkbox-list">
																	<label class="checkbox-inline">
																	<input type="text" class="form-control" placeholder="" name="bill_lading_qty" id="bill_lading_qty" value="">
																	</label>
																	<label class="checkbox-inline">
																	<select class="form-control input-small" data-placeholder="Select..." name="bill_lading_unit" id="bill_lading_unit" required>
																	<!--<option value=""></option>-->
																	<?php
													                $rows = $this->data['units'];

													                foreach($rows as $units){ 
													                	echo '<option value="'.$units["unit_name"].'">'.$units["unit_name"].'</option>';
													                }	
																	?>
																	</select>
																	</label>
																</div>
																<span for="bill_lading_qty" class="help-cert_stowage"></span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bill of lading Number & Date1*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bill_lading_namedt" id="bill_lading_namedt" value="">
																<span for="bill_lading_namedt" class="help-cert_stowage"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bill of lading Quantity2</label>
															<div class="col-md-9">
																<div class="checkbox-list">
																	<label class="checkbox-inline">
																	<input type="text" class="form-control" placeholder="" name="bill_lading_qty1" id="bill_lading_qty1" value="">
																	</label>
																	<label class="checkbox-inline">
																	<select class="form-control input-small" data-placeholder="Select..." name="bill_lading_unit1" id="bill_lading_unit1" required>
																	<!--<option value=""></option>-->
																	<?php
													                $rows = $this->data['units'];

													                foreach($rows as $units){ 
													                	echo '<option value="'.$units["unit_name"].'">'.$units["unit_name"].'</option>';
													                }	
																	?>
																	</select>
																	</label>
																</div>	
																<span for="bill_lading_qty1" class="help-cert_stowage"></span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bill of lading Number & Date2</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bill_lading_namedt1" id="bill_lading_namedt1" value="">
																<span for="bill_lading_namedt1" class="help-cert_stowage"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bill of lading Quantity3</label>
															<div class="col-md-9">
																<div class="checkbox-list">
																	<label class="checkbox-inline">
																	<input type="text" class="form-control" placeholder="" name="bill_lading_qty2" id="bill_lading_qty2" value="">
																	</label>
																	<label class="checkbox-inline">
																	<select class="form-control input-small" data-placeholder="Select..." name="bill_lading_unit2" id="bill_lading_unit2" required>
																	<!--<option value=""></option>-->
																	<?php
													                $rows = $this->data['units'];

													                foreach($rows as $units){ 
													                	echo '<option value="'.$units["unit_name"].'">'.$units["unit_name"].'</option>';
													                }	
																	?>
																	</select>
																	</label>
																</div>
																<span for="bill_lading_qty2" class="help-cert_stowage"></span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Bill of lading Number & Date3</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="bill_lading_namedt2" id="bill_lading_namedt2" value="">
																<span for="bill_lading_namedt2" class="help-cert_stowage"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Packaging</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="packaging" id="packaging" value="">
																<span for="packaging" class="help-cert_stowage"></span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Total Net Weight</label>
															<div class="col-md-6">
																<input type="text" class="form-control" placeholder="" name="total_net_weight" id="total_net_weight" value="" readonly>
																<span for="total_net_weight" class="help-cert_stowage"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Additional, Information</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_decl" id="cert_decl" maxlength="150"></textarea>
															    *Maxlength is 150 characters.
															</div>
														</div>
													</div>
  													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Certificate Type</label>
															<div class="col-md-9">
																<select class="form-control" name="certificate_type" id="certificate_type">
																	<option value="Draft">Draft</option>
																	<!--<option value="Final">Final</option>-->
																</select>
																<span for="certificate_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<h3 class="form-section alert alert-info">Paragraphs</h3>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Paragraph 1</label>
															&nbsp;&nbsp;&nbsp;<input type="hidden" name="para1_check" value="0">
															&nbsp;&nbsp;&nbsp;<input type="checkbox" name="para1_check" id="para1_check" value="1">
															&nbsp;&nbsp;&nbsp;<input type="text" name="para1_title" id="para1_title" value="TITLE">
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_para1" id="cert_para1" maxlength="1200">WE AGRIMIN CONTROL INTERNATIONAL S.A. BEING A RECOGNIZED INTERNATIONAL INDEPENDENT SUPERVISION COMPANY AND MEMBER OF GAFTA THROUGH OUR ASSOCIATES IN ARGENTINA,DO HEREBY CERTIFY HAVING SAMPLED THE ABOVE PARCEL AT TIME AND PLACE OF LOADING.</textarea>
																<span for="cert_para1" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Paragraph 2</label>
															&nbsp;&nbsp;&nbsp;<input type="hidden" name="para2_check" value="0">
															&nbsp;&nbsp;&nbsp;<input type="checkbox" name="para2_check" id="para2_check" value="1">
															&nbsp;&nbsp;&nbsp;<input type="text" name="para2_title" id="para2_title" value="Loading">
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_para2" id="cert_para2" maxlength="1200">LOADING WAS PERFORMED ON <?php echo $certificate_data['vessel_name']; ?> AT <?php echo $this->data['load_port']; ?> ON <?php echo date('d-m-Y'); ?> AND WEIGHT CORRESPONDS TO THE SHORE FIGURE.</textarea>
																<span for="cert_para2" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->		
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Paragraph 3</label>
															&nbsp;&nbsp;&nbsp;<input type="hidden" name="para3_check" value="0">
															&nbsp;&nbsp;&nbsp;<input type="checkbox" name="para3_check" id="para3_check" value="1">
															&nbsp;&nbsp;&nbsp;<input type="text" name="para3_title" id="para3_title" value="CONTROL OF WEIGHT">
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_para3" id="cert_para3" maxlength="1200">THE WEIGHT WAS CONTROLLED BY US AND BEING ASCERTAINED BY OFFICIAL APPROVED AUTOMATIC SCALE,REFLECTING THE FOLLOWING RESULTS.</textarea>
																<span for="cert_para3" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Paragraph 4</label>
															&nbsp;&nbsp;&nbsp;<input type="hidden" name="para4_check" value="0">
															&nbsp;&nbsp;&nbsp;<input type="checkbox" name="para4_check" id="para4_check" value="1" checked>
															&nbsp;&nbsp;&nbsp;<input type="text" name="para4_title" id="para4_title" value="QUALITY">
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_para4" id="cert_para4" maxlength="1200">REPRESENTATIVE SAMPLES WERE DRAWN DURING LOADING OPERATIONS AND A COMPOSITE SAMPLE WAS SUBMITTED FOR ANALYSIS WITH THE FOLLOWING OVERALL AVERAGE RESULTS, ALL FINAL AT THE MOMENT OF SHIPMENT.</textarea>
																<span for="cert_para4" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->		
												</div>
												<!--/row-->

											

												<?php
												}
												}
												?>

											<h3 class="form-section alert alert-info">Select Following As Per Part Of Certificate</h3>

											<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"></label>
															<div class="checkbox-list">
																<?php /*<label class="checkbox-inline">
																<input type="hidden" name="wt_params" value="0">
																<input type="checkbox" id="wt_params" name="wt_params" value="1"> Remove Parameters </label>*/?>
																<label class="checkbox-inline">
																<input type="hidden" name="wt_specs" value="0">
																<input type="checkbox" id="wt_specs" name="wt_specs" value="1" onclick=""> Remove Specifications </label>														
															</div>
														</div>
													</div>
													<!--/span-->
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"></label>
															<div class="checkbox-list">
																<label class="checkbox-inline">
																<input type="hidden" name="check_min" value="0">
																<input type="checkbox" id="check_min" name="check_min"  value="1"> Remove Min </label>
																<label class="checkbox-inline">
																<input type="hidden" name="check_max" value="0">
																<input type="checkbox" id="check_max" name="check_max" value="1"> Remove Max </label>
																
															</div>
														</div>
													</div>*/ ?>
													<!--/span-->		
												</div>
												<!--/row-->

											<h3 class="form-section alert alert-info">Certificate Details</h3>

											<div class="row" id="div_hold_1">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<?php /*<input type="button" value="Add Particulars" id="cert_hold_1" class="cert_hold_1" OnClick="javascript:cargo_rows(1);">*/ ?>
														<input type="button" value="Add Particulars" id="cert_param_1" class="cert_param_1" OnClick="javascript:cert_rows(1);">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover cert_param_details" id="cert_param_details_1">
															<thead>
															<tr>
																<th>
																	 Parameters
																</th>					
																<th class="specrm">
																	 Specifications
																</th>
																<th>
																	 Actual Results
																</th>
																<th>
																	 Remove
																</th>
															</tr>
															</thead>
															<tbody>
															
															<tr class="active paramrm">
																<td>																	
																	<select class="form-control input-large" name="wcert_params_1[]" id="wcert_params_1"> 
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['specifications'];

													                foreach($rows as $specifications){ 
													                	echo '<option value='.$specifications["id"].'>'.$specifications["name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="wcert_params_1" class="help-block"></span>
																</td>		
																<td class="specrm">
																	<input type="text" class="form-control input-large" placeholder="" name="wcert_specs_1[]" id="wcert_specs_1" value="">
																	 <span for="wcert_specs_1" class="help-block" style="color:red"></span>
																	
																</td>
																<td>
																	 <input type="text" class="form-control input-large" placeholder="" name="wcert_results_1[]" id="wcert_results_1" value="" required>
																	 <span for="wcert_results_1" class="help-block" style="color:red"></span>
																</td>
																<td>
																	<a class="btn btn-danger btn-xs rmv" title="Delete Row"><i class="fa fa-times fa-fw"></i></a>
																</td>
																										
															</tr>															
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
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<a href="<?php echo BASE_PATH;?>Viewweightqualitycertificate"><button type="button" class="btn default">Close</button></a>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									<!--</div>-->
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


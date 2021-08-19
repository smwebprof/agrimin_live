
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Quality Certificate
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
								Quality Certificate
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
									 Quality Certificate
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
											<i class="fa fa-reorder"></i>Quality Certificate  Form
										</div>
										<div class="actions">
								<a href="<?php echo BASE_PATH; ?>editqualitycertificatedetails?id=<?php echo (@$_GET['id']); ?>" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 Edit Specification
									</span>
								</a>
								<a href="<?php echo BASE_PATH; ?>Viewqualitycertificate?id=<?php echo $_GET['id']; ?>" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Quality Certificate
									</span>
								</a>
								<a href="<?php echo BASE_PATH; ?>Downloadqualitycertificatedraft?id=<?php echo $_GET['id']; ?>" class="btn default yellow-stripe" target='_blank'>
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 Quality Certificate Draft
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
												<?php if (@$_GET['msg']==1) { echo '<font size="3" color="red">'.@$_GET['hold'].' Data Saved Successfully</font>'; } ?>
											</div>
										</div>
										<form action="" method="post" class="form-horizontal qcertificatemaster-form">
										<input type="hidden" name="certificate_no" id="certificate_no" value="<?php echo @$this->data['certificate_data'][0]['id']; ?>">
										<input type="hidden" name="cert_action" id="cert_action" value="<?php echo @$_GET['action']; ?>">	
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
											<?php if (@$_GET['action']!='update') { ?>
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
																<input type="text" class="form-control" name="loading_date" id="loading_date" value="<?php echo $certificate_data['file_date']; ?>" readonly>
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
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Notify*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_notify" id="cert_notify" maxlength="1200"><?php echo $certificate_data['notify']; ?></textarea>
																<span for="cert_notify" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Certificate Date*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="cert_date" id="cert_date" value="<?php echo $certificate_data['certificate_date']; ?>" readonly>			
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Shipper</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_shipper" id="cert_shipper" maxlength="1200"><?php echo $certificate_data['shipper']; ?></textarea>
																<span for="cert_shipper" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Consignee</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_consignee" id="cert_consignee" maxlength="1200"><?php echo $certificate_data['consignee']; ?></textarea>	
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
																<input type="text" class="form-control" placeholder="" name="cert_goods" id="cert_goods" value="<?php echo $certificate_data['commodity']; ?>">
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
																<input type="text" class="form-control" placeholder="" name="load_port" id="load_port" value="<?php echo $certificate_data['load_port']; ?>" readonly>
																<span for="load_port" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Discharge Port</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="discharge_port" id="discharge_port" value="<?php echo $certificate_data['discharge_port']; ?>" readonly>
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
																<input type="text" class="form-control" placeholder="" name="approx_qty" id="approx_qty" value="<?php echo $certificate_data['approx_qty']; ?>" readonly>
																<span for="approx_qty" class="help-block"></span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Stowage</label>
															<div class="col-md-6">
																<input type="text" class="form-control" placeholder="" name="cert_stowage" id="cert_stowage" value="<?php echo $certificate_data['stowage']; ?>">
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
																<textarea class="form-control" rows="3" name="cert_insurance" id="cert_insurance" maxlength="1200"><?php echo $certificate_data['insurance']; ?></textarea>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">C.B.Registration No.</label>
															<div class="col-md-6">
																<input type="text" class="form-control" placeholder="" name="cert_cbreg" id="cert_cbreg" value="<?php echo $certificate_data['cb_regno']; ?>">
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
															<label class="control-label col-md-3">Bill of lading Quantity</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="bill_lading_qty" id="bill_lading_qty" maxlength="1200"><?php echo $certificate_data['bill_lading_qty']; ?></textarea>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Additional, Declaration</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_decl" id="cert_decl" maxlength="1200"><?php echo $certificate_data['declaration']; ?></textarea>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Certificate Type</label>
															<div class="col-md-9">
																<select class="form-control" name="certificate_type" id="certificate_type">
																	<option value="Draft">Draft</option>
																	<option value="Final">Final</option>
																</select>
																<span for="certificate_type" class="help-block"></span>
															</div>
														</div>
													</div>
  													
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Certificate Type</label>
															<div class="col-md-9">
																<select class="form-control" name="certificate_type" id="certificate_type">
																	<option value="Draft">Draft</option>
																	<option value="Final">Final</option>
																</select>
																<span for="certificate_type" class="help-block"></span>
															</div>
														</div>
													</div>*/ ?>
													<!--/span-->
												</div>
												<!--/row-->

												<h3 class="form-section alert alert-info">Paragraphs</h3>
												<b>Select for Insert Page Break (e.g.Select 2 for 1 Line break):<br/><br/><br/>
												



												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Paragraph 1</label>
															&nbsp;&nbsp;&nbsp;<input type="hidden" name="para1_check" value="0">
															&nbsp;&nbsp;&nbsp;<input type="checkbox" name="para1_check" id="para1_check" value="1" <?php if($certificate_data['para_check1']==1) { echo 'checked';} ?>>
															&nbsp;&nbsp;&nbsp;<input type="text" name="para1_title" id="para1_title" value="TITLE">
															<select name="para_ins_pg_break1" id="para_ins_pg_break1">
																<option value="">Insert Page Break :</option>
																<option value="<br><br">2</option>
																<option value="<br><br><br><br>">4</option>
																<option value="<br><br><br><br><br><br>">6</option>
																<option value="<br><br><br><br><br><br><br><br>">8</option>
																<option value="<br><br><br><br><br><br><br><br><br><br>">10</option>
															</select>
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
															&nbsp;&nbsp;&nbsp;<input type="checkbox" name="para2_check" id="para2_check" value="1" <?php if($certificate_data['para_check2']==1) { echo 'checked';} ?>>
															&nbsp;&nbsp;&nbsp;<input type="text" name="para2_title" id="para2_title" value="SAMPLING AND ANALYSIS">
															<select name="para_ins_pg_break2" id="para_ins_pg_break2">
																<option value="">Insert Page Break :</option>
																<option value="<br><br">2</option>
																<option value="<br><br><br><br>">4</option>
																<option value="<br><br><br><br><br><br>">6</option>
																<option value="<br><br><br><br><br><br><br><br>">8</option>
																<option value="<br><br><br><br><br><br><br><br><br><br>">10</option>
															</select>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_para2" id="cert_para2" maxlength="1200">DURING LOADING SAMPLES WERE DRAWN FROM LOADING BELT AT NEAREST PRACTICABLE POINT TO THE VESSEL AS PER GAFTA RECOMMENDATIONS AND A SET OF COMPOSITE SAMPLES WERE COMPOSED AND SEALED REPRESENTING THE TOTAL CARGO.ONE SEALED SAMPLE WAS FORWARDED TO AN INDEPENDENT GAFTA LABORATORY, REFLECTING THE FOLLOWING RESULTS.</textarea>
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
															&nbsp;&nbsp;&nbsp;<input type="checkbox" name="para3_check" id="para3_check" value="1" <?php if($certificate_data['para_check3']==1) { echo 'checked';} ?>>
															&nbsp;&nbsp;&nbsp;<input type="text" name="para3_title" id="para3_title" value="QUALITY">
															<select name="para_ins_pg_break3" id="para_ins_pg_break3">
																<option value="">Insert Page Break :</option>
																<option value="<br><br">2</option>
																<option value="<br><br><br><br>">4</option>
																<option value="<br><br><br><br><br><br>">6</option>
																<option value="<br><br><br><br><br><br><br><br>">8</option>
																<option value="<br><br><br><br><br><br><br><br><br><br>">10</option>
															</select>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_para3" id="cert_para3" maxlength="1200">REPRESENTATIVE SAMPLES WERE DRAWN DURING LOADING OPERATIONS AND A COMPOSITE SAMPLES WAS SUBMITTED FOR ANALYSIS WITH THE FOLLOWING RESULTS,ALL FINAL AT THE MOMENT OF SHIPMENT.</textarea>
																<span for="cert_para3" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Paragraph 4</label>
															&nbsp;&nbsp;&nbsp;<input type="hidden" name="para4_check" value="0">
															&nbsp;&nbsp;&nbsp;<input type="checkbox" name="para4_check" id="para4_check" value="1" <?php if($certificate_data['para_check4']==1) { echo 'checked';} ?>>
															&nbsp;&nbsp;&nbsp;<input type="text" name="para4_title" id="para4_title" value="TITLE">
															<select name="para_ins_pg_break4" id="para_ins_pg_break4">
																<option value="">Insert Page Break :</option>
																<option value="<br><br">2</option>
																<option value="<br><br><br><br>">4</option>
																<option value="<br><br><br><br><br><br>">6</option>
																<option value="<br><br><br><br><br><br><br><br>">8</option>
																<option value="<br><br><br><br><br><br><br><br><br><br>">10</option>
															</select>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_para4" id="cert_para4" maxlength="1200">PRIOR TO LOADING THE CARGO COMPARTMENTS MENTIONED ABOVE WERE VISUALLY INSPECTED AS FAR AS ACCESSIBLE/POSSIBLE FOR CLEANLINESS ONLY, AND FOUND EMPTY, DRY, CLEAN AND FREE FROM ABNORMAL ODOURS AND THEREFORE FOUND SUITABLE/FIT TO REVECEVIED AND CARRY THE ABOVE MENTIONED CARGO.</textarea>
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

											
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<a href="<?php echo BASE_PATH; ?>editqualitycertificatedetails?id=<?php echo (@$_GET['id']); ?>"><button type="button" class="btn blue">Edit Specification</button></a>
															<a href="<?php echo BASE_PATH;?>Viewqualitycertificate"><button type="button" class="btn default">Close</button></a>
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


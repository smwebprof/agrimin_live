
			
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
							    <?php /*
								<a href="<?php echo BASE_PATH; ?>Viewfileregister" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View File Register
									</span>
								</a>
								*/ ?>
								<a href="<?php echo BASE_PATH; ?>Viewqualitycertificate?id=<?php echo $_GET['id']; ?>" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Quality Certificate
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
											<input type="hidden" name="certificate_no" id="certificate_no" value="<?php echo @$_GET['cert_no']; ?>">
											<input type="hidden" name="cert_check_min" id="cert_check_min" value="<?php echo @$_GET['check_min']; ?>">
											<input type="hidden" name="cert_check_max" id="cert_check_max" value="<?php echo @$_GET['check_max']; ?>">
											<input type="hidden" name="cert_check_specs" id="cert_check_specs" value="<?php echo @$_GET['check_specs']; ?>">
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
															<label class="control-label col-md-3">Notify*</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_notify" id="cert_notify" maxlength="1200"></textarea>
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
															<label class="control-label col-md-3">Shipper</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_shipper" id="cert_shipper" maxlength="1200"></textarea>
																<span for="cert_shipper" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Consignee</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_consignee" id="cert_consignee" maxlength="1200"></textarea>	
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
																<textarea class="form-control" rows="3" name="cert_insurance" id="cert_insurance" maxlength="1200"></textarea>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">C.B.Registration No.</label>
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
															<label class="control-label col-md-3">Bill of lading Quantity</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="bill_lading_qty" id="bill_lading_qty" maxlength="1200"></textarea>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Additional, Information</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="cert_decl" id="cert_decl" maxlength="1200"></textarea>
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
																	<!--<option value="Final">Final</option>-->
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
																	<!--<option value="Final">Final</option>-->
																</select>
																<span for="certificate_type" class="help-block"></span>
															</div>
														</div>
													</div>*/ ?>
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
															&nbsp;&nbsp;&nbsp;<input type="text" name="para2_title" id="para2_title" value="SAMPLING AND ANALYSIS">
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
															&nbsp;&nbsp;&nbsp;<input type="checkbox" name="para3_check" id="para3_check" value="1">
															&nbsp;&nbsp;&nbsp;<input type="text" name="para3_title" id="para3_title" value="QUALITY">
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
															&nbsp;&nbsp;&nbsp;<input type="checkbox" name="para4_check" id="para4_check" value="1">
															&nbsp;&nbsp;&nbsp;<input type="text" name="para4_title" id="para4_title" value="TITLE">
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

											<?php if (@$_GET['action']!='update') { ?> 	
											<h3 class="form-section alert alert-info">Select Following As Per Part Of Certificate</h3>
											
											<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"></label>
															<div class="checkbox-list">
																<label class="checkbox-inline">
																<input type="hidden" name="check_holds" value="0">
																<input type="checkbox" id="check_holds" name="check_holds" value="1"> Remove Holds </label>
																<label class="checkbox-inline">
																<input type="hidden" name="check_specs" value="0">
																<input type="checkbox" id="check_specs" name="check_specs" value="1" onclick=""> Remove Specifications </label>														
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
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
													</div>
													<!--/span-->		
												</div>
												<!--/row-->	
											 <?php } ?>
											 

											 <h3 class="form-section alert alert-info">Certificate Details</h3>
											 <?php
											 $hold_details = base64_decode(@$_GET['det']);
											 $hold_details1 = explode(',', $hold_details);
                                             //print_r($hold_details1);
											 ?>
											 <div class="row" id="hold_div">
													<div class="col-md-6">
														<div class="form-group">
		   													<label class="control-label col-md-3">Select Hold</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="hold_type" id="hold_type"><option value="">Select</option>
																	<?php if (!in_array('Hold 1', @$hold_details1)) { ?><option value="Hold 1">Hold 1</option><?php } ?>
																	<?php if (!in_array('Hold 2', @$hold_details1)) { ?><option value="Hold 2">Hold 2</option><?php } ?>
																	<?php if (!in_array('Hold 3', @$hold_details1)) { ?><option value="Hold 3">Hold 3</option><?php } ?>
																	<?php if (!in_array('Hold 4', @$hold_details1)) { ?><option value="Hold 4">Hold 4</option><?php } ?>
																	<?php if (!in_array('Hold 5', @$hold_details1)) { ?><option value="Hold 5">Hold 5</option><?php } ?>
																	<?php if (!in_array('Hold 6', @$hold_details1)) { ?><option value="Hold 6">Hold 6</option><?php } ?>
																	<?php if (!in_array('Hold 7', @$hold_details1)) { ?><option value="Hold 7">Hold 7</option><?php } ?>
																	<?php if (!in_array('Hold 8', @$hold_details1)) { ?><option value="Hold 8">Hold 8</option><?php } ?>
																	<?php if (!in_array('Hold 9', @$hold_details1)) { ?><option value="Hold 9">Hold 9</option><?php } ?>
																	<?php if (!in_array('Hold 10', @$hold_details1)) { ?><option value="Hold 10">Hold 10</option><?php } ?>
																	<?php if (!in_array('Hold 11', @$hold_details1)) { ?><option value="Hold 11">Hold 11</option><?php } ?>
																	<?php if (!in_array('Hold 12', @$hold_details1)) { ?><option value="Hold 12">Hold 12</option><?php } ?>
																	<?php if (!in_array('Hold 13', @$hold_details1)) { ?><option value="Hold 13">Hold 13</option><?php } ?>
																	<?php if (!in_array('Hold 14', @$hold_details1)) { ?><option value="Hold 14">Hold 14</option><?php } ?>
																	<?php if (!in_array('Hold 15', @$hold_details1)) { ?><option value="Hold 15">Hold 15</option><?php } ?>
																	<?php if (!in_array('Hold 16', @$hold_details1)) { ?><option value="Hold 16">Hold 16</option><?php } ?>
																	<?php if (!in_array('Hold 17', @$hold_details1)) { ?><option value="Hold 17">Hold 17</option><?php } ?>
																	<?php if (!in_array('Hold 18', @$hold_details1)) { ?><option value="Hold 18">Hold 18</option><?php } ?>
																	<?php if (!in_array('Hold 19', @$hold_details1)) { ?><option value="Hold 19">Hold 19</option><?php } ?>
																	<?php if (!in_array('Hold 20', @$hold_details1)) { ?><option value="Hold 20">Hold 20</option><?php } ?>
																	<?php if (!in_array('Hold 21', @$hold_details1)) { ?><option value="Hold 21">Hold 21</option><?php } ?>
																	<?php if (!in_array('Hold 22', @$hold_details1)) { ?><option value="Hold 22">Hold 22</option><?php } ?>
																	<?php if (!in_array('Hold 23', @$hold_details1)) { ?><option value="Hold 23">Hold 23</option><?php } ?>
																	<?php if (!in_array('Hold 24', @$hold_details1)) { ?><option value="Hold 24">Hold 24</option><?php } ?>
																	<?php if (!in_array('Hold 25', @$hold_details1)) { ?><option value="Hold 25">Hold 25</option><?php } ?>
																	<?php if (!in_array('Hold 26', @$hold_details1)) { ?><option value="Hold 26">Hold 26</option><?php } ?>
																	<?php if (!in_array('Hold 27', @$hold_details1)) { ?><option value="Hold 27">Hold 27</option><?php } ?>
																	<?php if (!in_array('Hold 28', @$hold_details1)) { ?><option value="Hold 28">Hold 28</option><?php } ?>
																	<?php if (!in_array('Hold 29', @$hold_details1)) { ?><option value="Hold 29">Hold 29</option><?php } ?>
																	<?php if (!in_array('Hold 30', @$hold_details1)) { ?><option value="Hold 30">Hold 30</option><?php } ?>
																	<?php if (!in_array('Hold 31', @$hold_details1)) { ?><option value="Hold 31">Hold 31</option><?php } ?>
																	<?php if (!in_array('Hold 32', @$hold_details1)) { ?><option value="Hold 32">Hold 32</option><?php } ?>
																	<?php if (!in_array('Hold 33', @$hold_details1)) { ?><option value="Hold 33">Hold 33</option><?php } ?>
																	<?php if (!in_array('Hold 34', @$hold_details1)) { ?><option value="Hold 34">Hold 34</option><?php } ?>
																	<?php if (!in_array('Hold 35', @$hold_details1)) { ?><option value="Hold 35">Hold 35</option><?php } ?>
																	<?php if (!in_array('Hold 36', @$hold_details1)) { ?><option value="Hold 36">Hold 36</option><?php } ?>
																	<?php if (!in_array('Hold 37', @$hold_details1)) { ?><option value="Hold 37">Hold 37</option><?php } ?>
																	<?php if (!in_array('Hold 38', @$hold_details1)) { ?><option value="Hold 38">Hold 38</option><?php } ?>
																	<?php if (!in_array('Hold 39', @$hold_details1)) { ?><option value="Hold 39">Hold 39</option><?php } ?>
																	<?php if (!in_array('Hold 40', @$hold_details1)) { ?><option value="Hold 40">Hold 40</option><?php } ?>
																	<?php if (!in_array('Hold 41', @$hold_details1)) { ?><option value="Hold 41">Hold 41</option><?php } ?>
																	<?php if (!in_array('Hold 42', @$hold_details1)) { ?><option value="Hold 42">Hold 42</option><?php } ?>
																	<?php if (!in_array('Hold 43', @$hold_details1)) { ?><option value="Hold 43">Hold 43</option><?php } ?>
																	<?php if (!in_array('Hold 44', @$hold_details1)) { ?><option value="Hold 44">Hold 44</option><?php } ?>
																	<?php if (!in_array('Hold 45', @$hold_details1)) { ?><option value="Hold 45">Hold 45</option><?php } ?>
																	<?php if (!in_array('Hold 46', @$hold_details1)) { ?><option value="Hold 46">Hold 46</option><?php } ?>
																	<?php if (!in_array('Hold 47', @$hold_details1)) { ?><option value="Hold 47">Hold 47</option><?php } ?>
																	<?php if (!in_array('Hold 48', @$hold_details1)) { ?><option value="Hold 48">Hold 48</option><?php } ?>
																	<?php if (!in_array('Hold 49', @$hold_details1)) { ?><option value="Hold 49">Hold 49</option><?php } ?>
																	<?php if (!in_array('Hold 50', @$hold_details1)) { ?><option value="Hold 50">Hold 50</option><?php } ?>
																</select>
																	<span for="invitems_unit" class="help-block" style="color:red"></span>
															</div>
														</div>
													</div>
													<!--/span-->		
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-12">
														<input type="button" value="Add Specifications" id="cert_specification" class="cert_specification" OnClick="javascript:add_specifications();">
													</div>
													<div class="col-md-12">&nbsp;&nbsp;&nbsp;
													</div>
												</div>	
												
												<div class="row" id="div_hold_1">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<?php /*<input type="button" value="Add Particulars" id="cert_hold_1" class="cert_hold_1" OnClick="javascript:cargo_rows(1);">*/ ?>
														<input type="button" value="Add Particulars" id="cert_hold_1" class="cert_hold_1" OnClick="javascript:cert_rows(1);">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover cert_hold_details" id="cert_hold_details_1">
															<thead>
															<tr>
																<th>
																	 Specification
																</th>
																<th class="minrm">
																	 Min
																</th>
																<th class="maxrm">
																	 Max 
																</th>
																<th>
																	 Unit
																</th>
																<th>
																	 Method
																</th>
																<th>
																	 Result
																</th>
																<th>
																	 Remove
																</th>
															</tr>
															</thead>
															<tbody>
															<tr class="active spec">
																<td>
																	<input type="hidden" name="qcert_spec_id_1" id="qcert_spec_id_1" value="1" >
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_spec_head_1" id="qcert_spec_head_1" value="" >
																	<span for="qcert_spec_head_1" class="help-block" style="color:red"></span>
																</td>
																<td class="minrm">
																	
																</td>																	
																<td class="maxrm">
																	
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>

															</tr>
															<tr class="active">
																<td>																	
																	<select class="form-control input-large" name="qcert_spec_1[]" id="qcert_spec_1"> 
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['specifications'];

													                foreach($rows as $specifications){ 
													                	echo '<option value='.$specifications["id"].'>'.$specifications["name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_spec_1" class="help-block"></span>
																</td>
																<td class="minrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmin_1[]" id="qcert_labmin_1">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["min"].'>'.$parameters["min"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmin_1[]" id="qcert_labmin_1" value="" required>
																	<span for="qcert_labmin_1" class="help-block"></span>
																	
																</td>
																<td class="maxrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmax_1[]" id="qcert_labmax_1">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["max"].'>'.$parameters["max"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmax_1[]" id="qcert_labmax_1" value="" required>
																	<span for="qcert_labmax_1" class="help-block" style="color:red"></span>
																	
																</td>
																<td>
																	<select class="form-control input-large" name="qcert_labunits_1[]" id="qcert_labunits_1">
																	<option value="">Please Select</option>
																	<?php
													                $unit_master = $this->data['units'];
													                
													                foreach($unit_master as $units){ 
													                	echo '<option value='.$units["id"].'>'.$units["unit_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labunits_1" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	
																	<select class="form-control input-large" name="qcert_labmethods_1[]" id="qcert_labmethods_1">
																	<option value="">Please Select</option>
																	<?php /*
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["method_name"].'>'.$parameters["method_name"].'</option>';

													                }	
																	*/ ?>
																	</select>
																	<span for="qcert_labmethods_1" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="qcert_results_1[]" id="qcert_results_1" value="" required>
																	 <span for="qcert_results_1" class="help-block" style="color:red"></span>
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

											 
												<div class="row" id="div_hold_2" style="display:none;">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<?php /*<input type="button" value="Add Particulars" id="cert_hold_1" class="cert_hold_2" OnClick="javascript:cargo_rows(2);">*/ ?>
														<input type="button" value="Add Particulars" id="cert_hold_2" class="cert_hold_2" OnClick="javascript:cert_rows(2);">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover cert_hold_details" id="cert_hold_details_2">
															<thead>
															<tr>
																<th>
																	 Specification
																</th>
																<th class="minrm">
																	 Min
																</th>
																<th class="maxrm">
																	 Max 
																</th>
																<th>
																	 Unit
																</th>
																<th>
																	 Method
																</th>
																<th>
																	 Result
																</th>
																<th>
																	 Remove
																</th>
											
															</tr>
															</thead>
															<tbody>
															<tr class="active spec">
																<td>
																	<input type="hidden" name="qcert_spec_id_2" id="qcert_spec_id_2" value="2" >
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_spec_head_2" id="qcert_spec_head_2" value="" >
																	<span for="qcert_spec_head_2" class="help-block" style="color:red"></span>
																</td>
																<td class="minrm">
																	
																</td>																	
																<td class="maxrm">
																	
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
										
															</tr>
															<tr class="active">
																<td>
																	<select class="form-control input-large" name="qcert_spec_2[]" id="qcert_spec_2">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['specifications'];

													                foreach($rows as $specifications){ 
													                	echo '<option value='.$specifications["id"].'>'.$specifications["name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_spec_2" class="help-block"></span>
																</td>
																<td class="minrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmin_2[]" id="qcert_labmin_2">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["min"].'>'.$parameters["min"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmin_2[]" id="qcert_labmin_2" value="" required>
																	<span for="qcert_labmin_2" class="help-block"></span>
																	
																</td>
																<td class="maxrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmax_2[]" id="qcert_labmax_2">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["max"].'>'.$parameters["max"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmax_2[]" id="qcert_labmax_2" value="" required>
																	<span for="qcert_labmax_2" class="help-block" style="color:red"></span>
																	
																</td>
																<td>
																	<select class="form-control input-large" name="qcert_labunits_2[]" id="qcert_labunits_2">
																	<option value="">Please Select</option>
																	<?php
													                $unit_master = $this->data['units'];
													                
													                foreach($unit_master as $units){ 
													                	echo '<option value='.$units["id"].'>'.$units["unit_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labunits_2" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	<select class="form-control input-large" name="qcert_labmethods_2[]" id="qcert_labmethods_2">
																	<option value="">Please Select</option>
																	<?php /*
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["method_name"].'>'.$parameters["method_name"].'</option>';

													                }	
																	*/ ?>
																	</select>
																	<span for="qcert_labmethods_2" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="qcert_results_2[]" id="qcert_results_2" value="" required>
																	 <span for="qcert_results_2" class="help-block" style="color:red"></span>
																</td>
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
											 
											 <div class="row" id="div_hold_3" style="display:none;">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<input type="button" value="Add Particulars" id="cert_hold_3" class="cert_hold_3" OnClick="javascript:cert_rows(3);">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover cert_hold_details" id="cert_hold_details_3">
															<thead>
															<tr>
																<th>
																	 Specification
																</th>
																<th class="minrm">
																	 Min
																</th>
																<th class="maxrm">
																	 Max 
																</th>
																<th>
																	 Unit
																</th>
																<th>
																	 Method
																</th>
																<th>
																	 Result
																</th>
																<th>
																	 Remove
																</th>
											
															</tr>
															</thead>
															<tbody>
															<tr class="active spec">
																<td>
																	<input type="hidden" name="qcert_spec_id_3" id="qcert_spec_id_3" value="3" >
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_spec_head_3" id="qcert_spec_head_3" value="" >
																	<span for="qcert_spec_head_3" class="help-block" style="color:red"></span>
																</td>
																<td class="minrm">
																	
																</td>																	
																<td class="maxrm">
																	
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
										
															</tr>
															<tr class="active">
																<td>
																	<select class="form-control input-large" name="qcert_spec_3[]" id="qcert_spec_3">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['specifications'];

													                foreach($rows as $specifications){ 
													                	echo '<option value='.$specifications["id"].'>'.$specifications["name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_spec_3" class="help-block"></span>
																</td>
																<td class="minrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmin_3[]" id="qcert_labmin_3">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["min"].'>'.$parameters["min"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmin_3[]" id="qcert_labmin_3" value="" required>
																	<span for="qcert_labmin_3" class="help-block"></span>
																	
																</td>
																<td class="maxrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmax_3[]" id="qcert_labmax_3">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["max"].'>'.$parameters["max"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmax_3[]" id="qcert_labmax_3" value="" required>
																	<span for="qcert_labmax_3" class="help-block" style="color:red"></span>
																	
																</td>
																<td>
																	<select class="form-control input-large" name="qcert_labunits_3[]" id="qcert_labunits_3">
																	<option value="">Please Select</option>
																	<?php
													                $unit_master = $this->data['units'];
													                
													                foreach($unit_master as $units){ 
													                	echo '<option value='.$units["id"].'>'.$units["unit_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labunits_3" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	<select class="form-control input-large" name="qcert_labmethods_3[]" id="qcert_labmethods_3">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["method_name"].'>'.$parameters["method_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labmethods_3" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="qcert_results_3[]" id="qcert_results_3" value="" required>
																	 <span for="qcert_results_3" class="help-block" style="color:red"></span>
																</td>
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

											 <div class="row" id="div_hold_4" style="display:none;">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<input type="button" value="Add Particulars" id="cert_hold_4" class="cert_hold_4" OnClick="javascript:cert_rows(4);">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover cert_hold_details" id="cert_hold_details_4">
															<thead>
															<tr>
																<th>
																	 Specification
																</th>
																<th class="minrm">
																	 Min
																</th>
																<th class="maxrm">
																	 Max 
																</th>
																<th>
																	 Unit
																</th>
																<th>
																	 Method
																</th>
																<th>
																	 Result
																</th>
																<th>
																	 Remove
																</th>
											
															</tr>
															</thead>
															<tbody>
															<tr class="active spec">
																<td>
																	<input type="hidden" name="qcert_spec_id_4" id="qcert_spec_id_4" value="4" >
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_spec_head_4" id="qcert_spec_head_4" value="" >
																	<span for="qcert_spec_head_4" class="help-block" style="color:red"></span>
																</td>
																<td class="minrm">
																	
																</td>																	
																<td class="maxrm">
																	
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
										
															</tr>
															<tr class="active">
																<td>
																	<select class="form-control input-large" name="qcert_spec_4[]" id="qcert_spec_4">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['specifications'];

													                foreach($rows as $specifications){ 
													                	echo '<option value='.$specifications["id"].'>'.$specifications["name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_spec_4" class="help-block"></span>
																</td>
																<td class="minrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmin_4[]" id="qcert_labmin_4">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["min"].'>'.$parameters["min"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmin_4[]" id="qcert_labmin_4" value="" required>
																	<span for="qcert_labmin_4" class="help-block"></span>
																	
																</td>
																<td class="maxrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmax_4[]" id="qcert_labmax_4">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["max"].'>'.$parameters["max"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmax_4[]" id="qcert_labmax_4" value="" required>
																	<span for="qcert_labmax_4" class="help-block" style="color:red"></span>
																	
																</td>
																<td>
																	<select class="form-control input-large" name="qcert_labunits_4[]" id="qcert_labunits_4">
																	<option value="">Please Select</option>
																	<?php
													                $unit_master = $this->data['units'];
													                
													                foreach($unit_master as $units){ 
													                	echo '<option value='.$units["id"].'>'.$units["unit_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labunits_4" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	<select class="form-control input-large" name="qcert_labmethods_4[]" id="qcert_labmethods_4">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["method_name"].'>'.$parameters["method_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labmethods_4" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="qcert_results_4[]" id="qcert_results_4" value="" required>
																	 <span for="qcert_results_4" class="help-block" style="color:red"></span>
																</td>
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

											 <div class="row" id="div_hold_5" style="display:none;">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<input type="button" value="Add Particulars" id="cert_hold_5" class="cert_hold_5" OnClick="javascript:cert_rows(5);">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover cert_hold_details" id="cert_hold_details_5">
															<thead>
															<tr>
																<th>
																	 Specification
																</th>
																<th class="minrm">
																	 Min
																</th>
																<th class="maxrm">
																	 Max 
																</th>
																<th>
																	 Unit
																</th>
																<th>
																	 Method
																</th>
																<th>
																	 Result
																</th>
																<th>
																	 Remove
																</th>
											
															</tr>
															</thead>
															<tbody>
															<tr class="active spec">
																<td>
																	<input type="hidden" name="qcert_spec_id_5" id="qcert_spec_id_5" value="5" >
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_spec_head_5" id="qcert_spec_head_5" value="" >
																	<span for="qcert_spec_head_5" class="help-block" style="color:red"></span>
																</td>
																<td class="minrm">
																	
																</td>																	
																<td class="maxrm">
																	
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
										
															</tr>
															<tr class="active">
																<td>
																	<select class="form-control input-large" name="qcert_spec_5[]" id="qcert_spec_5">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['specifications'];

													                foreach($rows as $specifications){ 
													                	echo '<option value='.$specifications["id"].'>'.$specifications["name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_spec_5" class="help-block"></span>
																</td>
																<td class="minrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmin_5[]" id="qcert_labmin_5">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["min"].'>'.$parameters["min"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmin_5[]" id="qcert_labmin_5" value="" required>
																	<span for="qcert_labmin_5" class="help-block"></span>
																	
																</td>
																<td class="maxrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmax_5[]" id="qcert_labmax_5">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["max"].'>'.$parameters["max"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmax_5[]" id="qcert_labmax_5" value="" required>
																	<span for="qcert_labmax_5" class="help-block" style="color:red"></span>
																	
																</td>
																<td>
																	<select class="form-control input-large" name="qcert_labunits_5[]" id="qcert_labunits_5">
																	<option value="">Please Select</option>
																	<?php
													                $unit_master = $this->data['units'];
													                
													                foreach($unit_master as $units){ 
													                	echo '<option value='.$units["id"].'>'.$units["unit_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labunits_5" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	<select class="form-control input-large" name="qcert_labmethods_5[]" id="qcert_labmethods_5">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["method_name"].'>'.$parameters["method_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labmethods_5" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="qcert_results_5[]" id="qcert_results_5" value="" required>
																	 <span for="qcert_results_5" class="help-block" style="color:red"></span>
																</td>
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

											 <div class="row" id="div_hold_6" style="display:none;">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<input type="button" value="Add Particulars" id="cert_hold_6" class="cert_hold_6" OnClick="javascript:cert_rows(6);">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover cert_hold_details" id="cert_hold_details_6">
															<thead>
															<tr>
																<th>
																	 Specification
																</th>
																<th class="minrm">
																	 Min
																</th>
																<th class="maxrm">
																	 Max 
																</th>
																<th>
																	 Unit
																</th>
																<th>
																	 Method
																</th>
																<th>
																	 Result
																</th>
																<th>
																	 Remove
																</th>
											
															</tr>
															</thead>
															<tbody>
															<tr class="active spec">
																<td>
																	<input type="hidden" name="qcert_spec_id_6" id="qcert_spec_id_6" value="6" >
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_spec_head_6" id="qcert_spec_head_6" value="" >
																	<span for="qcert_spec_head_6" class="help-block" style="color:red"></span>
																</td>
																<td class="minrm">
																	
																</td>																	
																<td class="maxrm">
																	
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
										
															</tr>
															<tr class="active">
																<td>
																	<select class="form-control input-large" name="qcert_spec_6[]" id="qcert_spec_6">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['specifications'];

													                foreach($rows as $specifications){ 
													                	echo '<option value='.$specifications["id"].'>'.$specifications["name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_spec_6" class="help-block"></span>
																</td>
																<td class="minrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmin_6[]" id="qcert_labmin_6">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["min"].'>'.$parameters["min"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmin_6[]" id="qcert_labmin_6" value="" required>
																	<span for="qcert_labmin_6" class="help-block"></span>
																	
																</td>
																<td class="maxrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmax_6[]" id="qcert_labmax_6">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["max"].'>'.$parameters["max"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmax_6[]" id="qcert_labmax_6" value="" required>
																	<span for="qcert_labmax_6" class="help-block" style="color:red"></span>
																	
																</td>
																<td>
																	<select class="form-control input-large" name="qcert_labunits_6[]" id="qcert_labunits_6">
																	<option value="">Please Select</option>
																	<?php
													                $unit_master = $this->data['units'];
													                
													                foreach($unit_master as $units){ 
													                	echo '<option value='.$units["id"].'>'.$units["unit_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labunits_6" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	<select class="form-control input-large" name="qcert_labmethods_6[]" id="qcert_labmethods_6">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["method_name"].'>'.$parameters["method_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labmethods_6" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="qcert_results_6[]" id="qcert_results_6" value="" required>
																	 <span for="qcert_results_6" class="help-block" style="color:red"></span>
																</td>
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

											 <div class="row" id="div_hold_7" style="display:none;">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<input type="button" value="Add Particulars" id="cert_hold_7" class="cert_hold_7" OnClick="javascript:cert_rows(7);">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover cert_hold_details" id="cert_hold_details_7">
															<thead>
															<tr>
																<th>
																	 Specification
																</th>
																<th class="minrm">
																	 Min
																</th>
																<th class="maxrm">
																	 Max
																</th>
																<th>
																	 Unit
																</th>
																<th>
																	 Method
																</th>
																<th>
																	 Result
																</th>
																<th>
																	 Remove
																</th>
											
															</tr>
															</thead>
															<tbody>
															<tr class="active spec">
																<td>
																	<input type="hidden" name="qcert_spec_id_7" id="qcert_spec_id_7" value="7" >
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_spec_head_7" id="qcert_spec_head_7" value="" >
																	<span for="qcert_spec_head_7" class="help-block" style="color:red"></span>
																</td>
																<td class="minrm">
																	
																</td>																	
																<td class="maxrm">
																	
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
										
															</tr>
															<tr class="active">
																<td>
																	<select class="form-control input-large" name="qcert_spec_7[]" id="qcert_spec_7">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['specifications'];

													                foreach($rows as $specifications){ 
													                	echo '<option value='.$specifications["id"].'>'.$specifications["name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_spec_7" class="help-block"></span>
																</td>
																<td class="minrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmin_7[]" id="qcert_labmin_7">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["min"].'>'.$parameters["min"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmin_7[]" id="qcert_labmin_7" value="" required>
																	<span for="qcert_labmin_7" class="help-block"></span>
																	
																</td>
																<td class="maxrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmax_7[]" id="qcert_labmax_7">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["max"].'>'.$parameters["max"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmax_7[]" id="qcert_labmax_7" value="" required>
																	<span for="qcert_labmax_7" class="help-block" style="color:red"></span>
																	
																</td>
																<td>
																	<select class="form-control input-large" name="qcert_labunits_7[]" id="qcert_labunits_72">
																	<option value="">Please Select</option>
																	<?php
													                $unit_master = $this->data['units'];
													                
													                foreach($unit_master as $units){ 
													                	echo '<option value='.$units["id"].'>'.$units["unit_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labunits_7" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	<select class="form-control input-large" name="qcert_labmethods_7[]" id="qcert_labmethods_7">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["method_name"].'>'.$parameters["method_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labmethods_7" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="qcert_results_7[]" id="qcert_results_7" value="" required>
																	 <span for="qcert_results_7" class="help-block" style="color:red"></span>
																</td>
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

											 <div class="row" id="div_hold_8" style="display:none;">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<input type="button" value="Add Particulars" id="cert_hold_8" class="cert_hold_8" OnClick="javascript:cert_rows(8);">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover cert_hold_details" id="cert_hold_details_8">
															<thead>
															<tr>
																<th>
																	 Specification
																</th>
																<th class="minrm">
																	 Min
																</th>
																<th class="maxrm">
																	 Max
																</th>
																<th>
																	 Unit
																</th>
																<th>
																	 Method
																</th>
																<th>
																	 Result
																</th>
																<th>
																	 Remove
																</th>
											
															</tr>
															</thead>
															<tbody>
															<tr class="active spec">
																<td>
																	<input type="hidden" name="qcert_spec_id_8" id="qcert_spec_id_8" value="8" >
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_spec_head_8" id="qcert_spec_head_8" value="" >
																	<span for="qcert_spec_head_8" class="help-block" style="color:red"></span>
																</td>
																<td class="minrm">
																	
																</td>																	
																<td class="maxrm">
																	
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
										
															</tr>
															<tr class="active">
																<td>
																	<select class="form-control input-large" name="qcert_spec_8[]" id="qcert_spec_8">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['specifications'];

													                foreach($rows as $specifications){ 
													                	echo '<option value='.$specifications["id"].'>'.$specifications["name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_spec_8" class="help-block"></span>
																</td>
																<td class="minrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmin_8[]" id="qcert_labmin_8">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["min"].'>'.$parameters["min"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmin_8[]" id="qcert_labmin_8" value="" required>
																	<span for="qcert_labmin_8" class="help-block"></span>
																	
																</td>
																<td class="maxrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmax_8[]" id="qcert_labmax_8">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["max"].'>'.$parameters["max"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmax_8[]" id="qcert_labmax_8" value="" required>
																	<span for="qcert_labmax_8" class="help-block" style="color:red"></span>
																	
																</td>
																<td>
																	<select class="form-control input-large" name="qcert_labunits_8[]" id="qcert_labunits_8">
																	<option value="">Please Select</option>
																	<?php
													                $unit_master = $this->data['units'];
													                
													                foreach($unit_master as $units){ 
													                	echo '<option value='.$units["id"].'>'.$units["unit_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labunits_8" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	<select class="form-control input-large" name="qcert_labmethods_8[]" id="qcert_labmethods_8">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["method_name"].'>'.$parameters["method_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labmethods_8" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="qcert_results_8[]" id="qcert_results_8" value="" required>
																	 <span for="qcert_results_8" class="help-block" style="color:red"></span>
																</td>
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

											 <div class="row" id="div_hold_9" style="display:none;">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<input type="button" value="Add Particulars" id="cert_hold_9" class="cert_hold_9" OnClick="javascript:cert_rows(9);">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover cert_hold_details" id="cert_hold_details_9">
															<thead>
															<tr>
																<th>
																	 Specification
																</th>
																<th class="minrm">
																	 Min
																</th>
																<th class="maxrm">
																	 Max
																</th>
																<th>
																	 Unit
																</th>
																<th>
																	 Method
																</th>
																<th>
																	 Result
																</th>
																<th>
																	 Remove
																</th>
											
															</tr>
															</thead>
															<tbody>
															<tr class="active spec">
																<td>
																	<input type="hidden" name="qcert_spec_id_9" id="qcert_spec_id_9" value="9" >
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_spec_head_9" id="qcert_spec_head_9" value="" >
																	<span for="qcert_spec_head_9" class="help-block" style="color:red"></span>
																</td>
																<td class="minrm">
																	
																</td>																	
																<td class="maxrm">
																	
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
										
															</tr>
															<tr class="active">
																<td>
																	<select class="form-control input-large" name="qcert_spec_9[]" id="qcert_spec_9">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['specifications'];

													                foreach($rows as $specifications){ 
													                	echo '<option value='.$specifications["id"].'>'.$specifications["name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_spec_9" class="help-block"></span>
																</td>
																<td class="minrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmin_9[]" id="qcert_labmin_9">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["min"].'>'.$parameters["min"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmin_9[]" id="qcert_labmin_9" value="" required>
																	<span for="qcert_labmin_9" class="help-block"></span>
																	
																</td>
																<td class="maxrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmax_9[]" id="qcert_labmax_9">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["max"].'>'.$parameters["max"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmax_9[]" id="qcert_labmax_9" value="" required>
																	<span for="qcert_labmax_9" class="help-block" style="color:red"></span>
																	
																</td>
																<td>
																	<select class="form-control input-large" name="qcert_labunits_9[]" id="qcert_labunits_9">
																	<option value="">Please Select</option>
																	<?php
													                $unit_master = $this->data['units'];
													                
													                foreach($unit_master as $units){ 
													                	echo '<option value='.$units["id"].'>'.$units["unit_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labunits_9" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	<select class="form-control input-large" name="qcert_labmethods_9[]" id="qcert_labmethods_9">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["method_name"].'>'.$parameters["method_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labmethods_9" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="qcert_results_9[]" id="qcert_results_9" value="" required>
																	 <span for="qcert_results_9" class="help-block" style="color:red"></span>
																</td>
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

											 <div class="row" id="div_hold_10" style="display:none;">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<input type="button" value="Add Particulars" id="cert_hold_10" class="cert_hold_10" OnClick="javascript:cert_rows(10);">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover cert_hold_details" id="cert_hold_details_10">
															<thead>
															<tr>
																<th>
																	 Specification
																</th>
																<th class="minrm">
																	 Min
																</th>
																<th class="maxrm">
																	 Max
																</th>
																<th>
																	 Unit
																</th>
																<th>
																	 Method
																</th>
																<th>
																	 Result
																</th>
																<th>
																	 Remove
																</th>
											
															</tr>
															</thead>
															<tbody>
															<tr class="active spec">
																<td>
																	<input type="hidden" name="qcert_spec_id_10" id="qcert_spec_id_10" value="10" >
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_spec_head_10" id="qcert_spec_head_10" value="" >
																	<span for="qcert_spec_head_10" class="help-block" style="color:red"></span>
																</td>
																<td class="minrm">
																	
																</td>																	
																<td class="maxrm">
																	
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
																<td>
																
																</td>
										
															</tr>
															<tr class="active">
																<td>
																	<select class="form-control input-large" name="qcert_spec_10[]" id="qcert_spec_10">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['specifications'];

													                foreach($rows as $specifications){ 
													                	echo '<option value='.$specifications["id"].'>'.$specifications["name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_spec_10" class="help-block"></span>
																</td>
																<td class="minrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmin_10[]" id="qcert_labmin_10">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["min"].'>'.$parameters["min"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmin_10[]" id="qcert_labmin_10" value="" required>
																	<span for="qcert_labmin_10" class="help-block"></span>
																	
																</td>
																<td class="maxrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmax_10[]" id="qcert_labmax_10">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["max"].'>'.$parameters["max"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmax_10[]" id="qcert_labmax_10" value="" required>
																	<span for="qcert_labmax_10" class="help-block" style="color:red"></span>
																	
																</td>
																<td>
																	<select class="form-control input-large" name="qcert_labunits_10[]" id="qcert_labunits_10">
																	<option value="">Please Select</option>
																	<?php
													                $unit_master = $this->data['units'];
													                
													                foreach($unit_master as $units){ 
													                	echo '<option value='.$units["id"].'>'.$units["unit_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labunits_10" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	<select class="form-control input-large" name="qcert_labmethods_10[]" id="qcert_labmethods_10">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["id"].'>'.$parameters["method_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labmethods_10" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="qcert_results_10[]" id="qcert_results_10" value="" required>
																	 <span for="qcert_results_10" class="help-block" style="color:red"></span>
																</td>
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


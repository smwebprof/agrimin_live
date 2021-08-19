
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Quality Certificate (Full View)
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
							<a href="<?php echo BASE_PATH; ?>viewinteractionreport">
								Reports
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Quality Certificate (Full View)
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
									 Quality Certificate (Full View)
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
								<!-- Start PORTLET-->
								<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Certificate Info
							</div>
							<!--<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>-->
							<div class="actions">
								<a href="<?php echo BASE_PATH; ?>Viewqualitycertificate" class="btn blue">
									<i class="fa fa-pencil"></i>View Quality Certificate
								</a>
									
								<!--<a href="#" class="btn red">
									<i class="fa fa-pencil"></i> Print To PDF 
								</a>-->
								<!--<div class="btn-group">
									<a class="btn green" href="#" data-toggle="dropdown">
										<i class="fa fa-cogs"></i> Tools <i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
												<i class="fa fa-pencil"></i> Edit
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-trash-o"></i> Delete
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-ban"></i> Ban
											</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">
												<i class="i"></i> Make admin
											</a>
										</li>
									</ul>
								</div>-->
							</div>
						</div>
						<?php $rows = $this->data['certificate_data'];
											
						foreach($rows as $certificate_data){

						?>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td width="50%">
									 <strong>No</strong>
								</td>
								<td>
									<?php echo $certificate_data['file_no']; ?>
								</td>
							</tr>
							<tr>
								<td width="50%">
									 <strong>Loading Date</strong>
								</td>
								<td>
									<?php echo $certificate_data['file_date']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Notify</strong>
								</td>
								<td>
									<?php echo $certificate_data['notify']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Certificate Date</strong>
								</td>
								<td>
									<?php echo $certificate_data['certificate_date']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Shipper</strong>
								</td>
								<td>
									<?php echo $certificate_data['shipper']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Consignee</strong>
								</td>
								<td>
									<?php echo $certificate_data['consignee']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Vessel Name</strong>
								</td>
								<td>
									<?php echo $certificate_data['vessel_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Description Of Goods</strong>
								</td>
								<td>
									<?php echo $certificate_data['commodity']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Load Port</strong>
								</td>
								<td>
									<?php echo $certificate_data['load_port']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Discharge Port</strong>
								</td>
								<td>
									<?php echo $certificate_data['discharge_port']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Quantity</strong>
								</td>
								<td>
									<?php echo $certificate_data['approx_qty']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Stowage</strong>
								</td>
								<td>
									<?php echo $certificate_data['stowage']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Additional, Declaration</strong>
								</td>
								<td>
									<?php echo $certificate_data['declaration']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Certificate Type</strong>
								</td>
								<td>
									<?php echo $certificate_data['certificate_type']; ?>
								</td>
							</tr>
							</table>
						</div>
					</div>
					<!-- END PORTLET-->


					<!-- Start PORTLET-->
								<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Paragraphs
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<?php if($certificate_data['para_check1']==1) { ?>			
							<tr>
								<td>
									 <strong>Title - Paragraph 1</strong>
								</td>
								<td>
									<?php echo $certificate_data['para_title1']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Paragraph 1</strong>
								</td>
								<td>
									<?php echo $certificate_data['para_text1']; ?>
								</td>
							</tr>
							<?php } ?>
							<?php if($certificate_data['para_check2']==1) { ?>			
							<tr>
								<td>
									 <strong>Title - Paragraph 2</strong>
								</td>
								<td>
									<?php echo $certificate_data['para_title2']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Paragraph 2</strong>
								</td>
								<td>
									<?php echo $certificate_data['para_text2']; ?>
								</td>
							</tr>
							<?php } ?>
							<?php if($certificate_data['para_check3']==1) { ?>			
							<tr>
								<td>
									 <strong>Title - Paragraph 3</strong>
								</td>
								<td>
									<?php echo $certificate_data['para_title3']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Paragraph 3</strong>
								</td>
								<td>
									<?php echo $certificate_data['para_text3']; ?>
								</td>
							</tr>
							<?php } ?>
							<?php if($certificate_data['para_check4']==1) { ?>			
							<tr>
								<td>
									 <strong>Title - Paragraph 4</strong>
								</td>
								<td>
									<?php echo $certificate_data['para_title4']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Paragraph 4</strong>
								</td>
								<td>
									<?php echo $certificate_data['para_text4']; ?>
								</td>
							</tr>
							<?php } ?>
							</table>
						</div>
					</div>
					<!-- END PORTLET-->

					<!-- Start PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Certificate Details
							</div>
						</div>
						<div class="portlet-body">
							<?php for($i=1;$i<=count($this->data['spec_details']);$i++) { ?>
							<?php if (count($this->data['spec_details'][$i])>0) { ?>
							<h3><?php echo @$this->data['spec_details'][$i][1]['hold_no']; ?></h3>
							<?php } ?>
							<table class="table table-bordered table-hover cert_hold_details">
								<thead>
								<tr>
									<th>
										Specification
									</th>
									<th class="minrm">
										Min (Keep Empty If Not Required)
									</th>
										<th class="maxrm">
											Max (Keep Empty If Not Required)
									</th>
									<th>
											Method
									</th>
									<th>
											Results
									</th>
									<th>
											Remove
									</th>
								</tr>
								</thead>
								<tbody>
								<tr class="active spec">
									<td>
										<input type="hidden" name="qcert_spec_id_<?php echo $i; ?>" id="qcert_spec_id_<?php echo $i; ?>" value="<?php echo $i; ?>" >
										<?php if (count($this->data['spec_details'][$i])>0) { ?>																	
										<input type="text" class="form-control input-large" placeholder="" name="qcert_spec_head_<?php echo $i; ?>" id="qcert_spec_head_<?php echo $i; ?>" value="<?php echo $this->data['spec_details'][$i][1]['specification_head']; ?>" >
										<span for="qcert_spec_head_<?php echo $i; ?>" class="help-block" style="color:red"></span>
										<?php } ?>						
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
								</tr>
								<?php if (count($this->data['spec_details'][$i])>0) { ?>
															<?php for($j=1;$j<=count($this->data['spec_details'][$i]);$j++) { $k = $j + 1; ?>
															<tr class="active">
																<td>
																	<select class="form-control input-large" name="qcert_spec_<?php echo $i; ?>[]" id="qcert_spec_<?php echo $i; ?>">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	if ($this->data['spec_details'][$i][$j]['specification']==$parameters["group_name"]) {  
													                		echo '<option value='.$parameters["group_name"].' selected>'.$parameters["group_name"].'</option>';
													                	} else {
													                		echo '<option value='.$parameters["group_name"].'>'.$parameters["group_name"].'</option>';
													                	}	

													                }	
																	?>
																	</select>
																	<span for="qcert_spec_<?php echo $i; ?>" class="help-block"></span>
																</td>
																<td class="minrm">
																	<select class="form-control input-large" name="qcert_labmin_<?php echo $i; ?>[]" id="qcert_labmin_<?php echo $i; ?>">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	if ($this->data['spec_details'][$i][$j]['min_value']==$parameters["min"]) {  
													                		echo '<option value='.$parameters["min"].' selected>'.$parameters["min"].'</option>';
													                	} else {
													                		echo '<option value='.$parameters["min"].'>'.$parameters["min"].'</option>';
													                	}

													                }	
																	?>
																	</select>
																	<span for="qcert_labmin_<?php echo $i; ?>" class="help-block"></span>
																</td>
																<td class="maxrm">
																	<select class="form-control input-large" name="qcert_labmax_<?php echo $i; ?>[]" id="qcert_labmax_<?php echo $i; ?>">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){
													                    if ($this->data['spec_details'][$i][$j]['max_value']==$parameters["max"]) { 
													                		echo '<option value='.$parameters["max"].' selected>'.$parameters["max"].'</option>';
													                	} else {
													                		echo '<option value='.$parameters["max"].'>'.$parameters["max"].'</option>';
													                	}

													                }	
																	?>
																	</select>
																	<span for="qcert_labmax_1" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	<select class="form-control input-large" name="qcert_labmethods_<?php echo $i; ?>[]" id="qcert_labmethods_<?php echo $i; ?>">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	if ($this->data['spec_details'][$i][$j]['method']==$parameters["method_name"]) { 
													                		echo '<option value='.$parameters["method_name"].' selected>'.$parameters["method_name"].'</option>';
													                	} else {
													                		echo '<option value='.$parameters["method_name"].'>'.$parameters["method_name"].'</option>';
													                	}

													                }	
																	?>
																	</select>
																	<span for="qcert_labmethods_1" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="qcert_results_<?php echo $i; ?>[]" id="qcert_results_<?php echo $i; ?>" value="<?php echo $this->data['spec_details'][$i][$j]['results']; ?>" required>
																	 <span for="qcert_results_1" class="help-block" style="color:red"></span>
																</td>
																																<td>
																	<a class="btn btn-danger btn-xs rmv" title="Delete Row"><i class="fa fa-times fa-fw"></i></a>
																</td>
																										
															</tr>
															<?php } ?>
															<?php } ?>	
								</tbody>	
								</table>
								<?php } ?>	
						</div>
					</div>							
					
					<!-- Start PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Certificate Generated By :
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td>
									 <strong>Created By :</strong>
								</td>
								<td>
									<?php echo $certificate_data['fname']." ".$certificate_data['lname'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Created On Date:</strong>
								</td>
								<td>
									<?php echo date('d-m-Y',strtotime($certificate_data['entry_date'])) ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Modified By :</strong>
								</td>
								<td>
									<?php echo $certificate_data['ename']." ".$certificate_data['elname'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Modified On Date:</strong>
								</td>
								<td>
									<?php echo date('d-m-Y',strtotime($certificate_data['modify_date'])) ?>
								</td>
							</tr>
						
							</table>
						</div>
					</div>
					<!-- END PORTLET-->

					<?php
				    }
				    ?>


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


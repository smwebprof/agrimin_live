
			
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

									<?php
									  if (!empty(@$this->data['hold_details'][1][1]['certificate_no'])) {
										$cert_no = @$this->data['hold_details'][1][1]['certificate_no'];	
									  } else {
										$cert_no = @$_GET['cert_no'];
									  }
									?>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<div class="row">
											<div class="col-md-12">
												<?php if (@$_GET['msg']==1) { echo '<font size="3" color="red">'.@$_GET['hold'].' Data Saved Successfully</font>'; } ?>
											</div>
										</div>
										<form action="" method="post" class="form-horizontal qcertificatemaster-form">
										<input type="hidden" name="certificate_no" id="certificate_no" value="<?php echo @$cert_no; ?>">
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
											</div>


											<h3 class="form-section alert alert-info">Select Following As Per Part Of Certificate</h3>
											
											<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"></label>
															<div class="checkbox-list">
																<?php #if (@$this->data['hold_details'][1][1]['hold_no']) { ?>
																<label class="checkbox-inline">
																<input type="hidden" name="check_holds" value="0">
																<input type="checkbox" name="check_holds" id="check_holds" value="1"> Remove Holds </label>
																<?php #} ?>
																<?php #if (@$this->data['hold_details'][1][1]['specification_head']) { ?>
																<label class="checkbox-inline">
																<input type="hidden" name="check_specs" value="0">
																<input type="checkbox" name="check_specs" id="check_specs" value="1" onclick="" <?php if (@$this->data['certificate_data'][0]['check_specs']==1) { echo 'checked'; } ?>> Remove Specifications </label>
																<?php #} ?>													
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"></label>
															<div class="checkbox-list">
																<?php #if (@$this->data['hold_details'][1][1]['min_value']) { ?>
																<label class="checkbox-inline">
																<input type="hidden" name="check_min" value="0">
																<input type="checkbox" name="check_min" id="check_min" value="1" onclick="" <?php if (@$this->data['certificate_data'][0]['check_min']==1) { echo 'checked'; } ?>> Remove Min </label>
																<?php #} ?>
																<?php #if (@$this->data['hold_details'][1][1]['max_value']) { ?>
																<label class="checkbox-inline">
																<input type="hidden" name="check_max" value="0">
																<input type="checkbox" name="check_max" id="check_max" value="1" onclick="" <?php if (@$this->data['certificate_data'][0]['check_max']==1) { echo 'checked'; } ?>> Remove Max </label>
																<?php #} ?>
															</div>
														</div>
													</div>
													<!--/span-->		
												</div>
												<!--/row-->	
											 <?php } } ?>

											 <h3 class="form-section alert alert-info">Certificate Details</h3>
                                             <?php #if (@$this->data['hold_details'][1][1]['hold_no']) { ?> 
											 <div c#lass="row" id="hold_div">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Select Hold</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="hold_type" id="hold_type" onchange="window.location = '<?php echo BASE_PATH; ?>editqualitycertificatedetails?id=<?php echo $_GET['id']; ?>&hold_id='+this.options[this.selectedIndex].value+'&cert_no=<?php echo @$cert_no; ?>'">
																	<option value="">Select</option>
																	<option value="Hold 1" <?php if (@$this->data['hold_details'][1][1]['hold_no']=='Hold 1') { echo 'selected'; } ?> <?php if (@$_GET['hold_id']=='Hold 1') { echo 'selected'; } ?>>Hold 1</option>
																	<option value="Hold 2" <?php if (@$_GET['hold_id']=='Hold 2') { echo 'selected'; } ?>>Hold 2</option>
																	<option value="Hold 3" <?php if (@$_GET['hold_id']=='Hold 3') { echo 'selected'; } ?>>Hold 3</option>
																	<option value="Hold 4" <?php if (@$_GET['hold_id']=='Hold 4') { echo 'selected'; } ?>>Hold 4</option>
																	<option value="Hold 5" <?php if (@$_GET['hold_id']=='Hold 5') { echo 'selected'; } ?>>Hold 5</option>
																	<option value="Hold 6" <?php if (@$_GET['hold_id']=='Hold 6') { echo 'selected'; } ?>>Hold 6</option>
																	<option value="Hold 7" <?php if (@$_GET['hold_id']=='Hold 7') { echo 'selected'; } ?>>Hold 7</option>
																	<option value="Hold 8" <?php if (@$_GET['hold_id']=='Hold 8') { echo 'selected'; } ?>>Hold 8</option>
																	<option value="Hold 9" <?php if (@$_GET['hold_id']=='Hold 9') { echo 'selected'; } ?>>Hold 9</option>
																	<option value="Hold 10" <?php if (@$_GET['hold_id']=='Hold 10') { echo 'selected'; } ?>>Hold 10</option>
																	<option value="Hold 11" <?php if (@$_GET['hold_id']=='Hold 11') { echo 'selected'; } ?>>Hold 11</option>
																	<option value="Hold 12" <?php if (@$_GET['hold_id']=='Hold 12') { echo 'selected'; } ?>>Hold 12</option>
																	<option value="Hold 13" <?php if (@$_GET['hold_id']=='Hold 13') { echo 'selected'; } ?>>Hold 13</option>
																	<option value="Hold 14" <?php if (@$_GET['hold_id']=='Hold 14') { echo 'selected'; } ?>>Hold 14</option>
																	<option value="Hold 15" <?php if (@$_GET['hold_id']=='Hold 15') { echo 'selected'; } ?>>Hold 15</option>
																	<option value="Hold 16" <?php if (@$_GET['hold_id']=='Hold 16') { echo 'selected'; } ?>>Hold 16</option>
																	<option value="Hold 17" <?php if (@$_GET['hold_id']=='Hold 17') { echo 'selected'; } ?>>Hold 1</option>
																	<option value="Hold 18" <?php if (@$_GET['hold_id']=='Hold 18') { echo 'selected'; } ?>>Hold 18</option>
																	<option value="Hold 19" <?php if (@$_GET['hold_id']=='Hold 19') { echo 'selected'; } ?>>Hold 19</option>
																	<option value="Hold 20" <?php if (@$_GET['hold_id']=='Hold 20') { echo 'selected'; } ?>>Hold 20</option>
																	<option value="Hold 21" <?php if (@$_GET['hold_id']=='Hold 21') { echo 'selected'; } ?>>Hold 21</option>
																	<option value="Hold 22" <?php if (@$_GET['hold_id']=='Hold 22') { echo 'selected'; } ?>>Hold 22</option>
																	<option value="Hold 23" <?php if (@$_GET['hold_id']=='Hold 23') { echo 'selected'; } ?>>Hold 23</option>
																	<option value="Hold 24" <?php if (@$_GET['hold_id']=='Hold 24') { echo 'selected'; } ?>>Hold 24</option>
																	<option value="Hold 25" <?php if (@$_GET['hold_id']=='Hold 25') { echo 'selected'; } ?>>Hold 25</option>
																	<option value="Hold 26" <?php if (@$_GET['hold_id']=='Hold 26') { echo 'selected'; } ?>>Hold 26</option>
																	<option value="Hold 27" <?php if (@$_GET['hold_id']=='Hold 27') { echo 'selected'; } ?>>Hold 27</option>
																	<option value="Hold 28" <?php if (@$_GET['hold_id']=='Hold 28') { echo 'selected'; } ?>>Hold 28</option>
																	<option value="Hold 29" <?php if (@$_GET['hold_id']=='Hold 29') { echo 'selected'; } ?>>Hold 29</option>
																	<option value="Hold 30" <?php if (@$_GET['hold_id']=='Hold 30') { echo 'selected'; } ?>>Hold 30</option>
																	<option value="Hold 31" <?php if (@$_GET['hold_id']=='Hold 31') { echo 'selected'; } ?>>Hold 31</option>
																	<option value="Hold 32" <?php if (@$_GET['hold_id']=='Hold 32') { echo 'selected'; } ?>>Hold 32</option>
																	<option value="Hold 33" <?php if (@$_GET['hold_id']=='Hold 33') { echo 'selected'; } ?>>Hold 33</option>
																	<option value="Hold 34" <?php if (@$_GET['hold_id']=='Hold 34') { echo 'selected'; } ?>>Hold 34</option>
																	<option value="Hold 35" <?php if (@$_GET['hold_id']=='Hold 35') { echo 'selected'; } ?>>Hold 35</option>
																	<option value="Hold 36" <?php if (@$_GET['hold_id']=='Hold 36') { echo 'selected'; } ?>>Hold 36</option>
																	<option value="Hold 37" <?php if (@$_GET['hold_id']=='Hold 37') { echo 'selected'; } ?>>Hold 37</option>
																	<option value="Hold 38" <?php if (@$_GET['hold_id']=='Hold 38') { echo 'selected'; } ?>>Hold 38</option>
																	<option value="Hold 39" <?php if (@$_GET['hold_id']=='Hold 39') { echo 'selected'; } ?>>Hold 39</option>
																	<option value="Hold 40" <?php if (@$_GET['hold_id']=='Hold 40') { echo 'selected'; } ?>>Hold 40</option>
																	<option value="Hold 41" <?php if (@$_GET['hold_id']=='Hold 41') { echo 'selected'; } ?>>Hold 41</option>
																	<option value="Hold 42" <?php if (@$_GET['hold_id']=='Hold 42') { echo 'selected'; } ?>>Hold 42</option>
																	<option value="Hold 43" <?php if (@$_GET['hold_id']=='Hold 43') { echo 'selected'; } ?>>Hold 43</option>
																	<option value="Hold 44" <?php if (@$_GET['hold_id']=='Hold 44') { echo 'selected'; } ?>>Hold 44</option>
																	<option value="Hold 45" <?php if (@$_GET['hold_id']=='Hold 45') { echo 'selected'; } ?>>Hold 45</option>
																	<option value="Hold 46" <?php if (@$_GET['hold_id']=='Hold 46') { echo 'selected'; } ?>>Hold 46</option>
																	<option value="Hold 47" <?php if (@$_GET['hold_id']=='Hold 47') { echo 'selected'; } ?>>Hold 47</option>
																	<option value="Hold 48" <?php if (@$_GET['hold_id']=='Hold 48') { echo 'selected'; } ?>>Hold 48</option>
																	<option value="Hold 49" <?php if (@$_GET['hold_id']=='Hold 49') { echo 'selected'; } ?>>Hold 49</option>
																	<option value="Hold 50" <?php if (@$_GET['hold_id']=='Hold 50') { echo 'selected'; } ?>>Hold 50</option>
																</select>
																	<span for="invitems_unit" class="help-block" style="color:red"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Insert Page Break</label>
															<div class="col-md-9">
																<?php /*<textarea class="form-control" rows="3" name="ins_pg_break" id="ins_pg_break" maxlength="2400"><?php echo @$this->data['hold_details'][1][1]['ins_pg_break']; ?></textarea>*/ ?>
																<select class="form-control input-medium select2me" data-placeholder="Select..." name="ins_pg_break" id="ins_pg_break">
																	<option value="">Please Select</option>
																	<option value="<br><br>">2</option>
																	<option value="<br><br><br><br>">4</option>
																	<option value="<br><br><br><br><br><br>">6</option>
																	<option value="<br><br><br><br><br><br><br><br>">8</option>
																	<option value="<br><br><br><br><br><br><br><br><br><br>">10</option>
																	<option value="<br><br><br><br><br><br><br><br><br><br><br><br>">12</option>
																	<option value="<br><br><br><br><br><br><br><br><br><br><br><br><br><br>">14</option>
																	<option value="<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>">16</option>
																	<option value="<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>">18</option>
																	<option value="<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>">20</option>
																</select>	
																<br><b>Select for Insert Page Break (e.g.Select 2 for 1 Line break):</b> <font color='red'><strong>&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;</strong></font>
																<span for="ins_pg_break" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->		
												</div>
												<!--/row-->
												<?php #} ?>
											<?php $spec_count = count($this->data['hold_details']); ?>	
											<div class="row">
													<div class="col-md-12">
														<input type="button" value="Add Specifications" id="cert_specification" class="cert_specification" OnClick="javascript:add_specifications();">
													</div>
													<div class="col-md-12">&nbsp;&nbsp;&nbsp;
													</div>
											</div>
										    
										    <?php if (!empty($spec_count)) { ?>
											<?php for($i=1;$i<=count($this->data['hold_details']);$i++) { ?>
											<div class="row" id="div_hold_<?php echo $i; ?>" <?php if ($this->data['hold_details'][$i]) {  } else { echo 'style="display:none;"'; } ?>>
													<div class="col-md-12">	
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<?php /*<input type="button" value="Add Particulars" id="cert_hold_1" class="cert_hold_1" OnClick="javascript:cargo_rows(1);">*/ ?>
														<input type="button" value="Add Particulars" id="cert_hold_<?php echo $i; ?>" class="cert_hold_<?php echo $i; ?>" OnClick="javascript:cert_rows(<?php echo $i; ?>);">
														<?php if (count(@$this->data['hold_details'][$i])>0) { ?>
															<h3><?php echo @$this->data['hold_details'][$i][1]['hold_no']; ?></h3>
														<?php } ?>	
														
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover cert_hold_details" id="cert_hold_details_<?php echo $i; ?>">
															<thead>
															<tr>
																<th>
																	 Specification
																</th>
																<?php if (@$this->data['hold_details'][$i][1]['min_value']) { ?>
																<th class="minrm">
																	 Min (Keep Empty If Not Required)
																</th>
															    <?php } ?>
															    <?php if (@$this->data['hold_details'][$i][1]['max_value']) { ?>
																<th class="maxrm">
																	 Max (Keep Empty If Not Required)
																</th>
																<?php } ?>
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
															<?php #if (!empty($this->data['hold_details'][$i][1]['specification_head'])) { ?>
															<tr class="active spec">
																<?php #if (@$this->data['hold_details'][$i][1]['specification_head']) { ?>
																<td>
																	<input type="hidden" name="qcert_spec_id_<?php echo $i; ?>" id="qcert_spec_id_<?php echo $i; ?>" value="<?php echo $i; ?>" >
																	<?php if (count($this->data['hold_details'][$i])>0) { ?>																	
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_spec_head_<?php echo $i; ?>" id="qcert_spec_head_<?php echo $i; ?>" value="<?php echo $this->data['hold_details'][$i][1]['specification_head']; ?>" >
																	<span for="qcert_spec_head_<?php echo $i; ?>" class="help-block" style="color:red"></span>
																    <?php } ?>
																</td>
																<?php #} ?>
																<?php if (@$this->data['hold_details'][$i][1]['min_value']) { ?>
																<td class="minrm">
																	
																</td>
																<?php } ?>
																<?php if (@$this->data['hold_details'][$i][1]['max_value']) { ?>																	
																<td class="maxrm">
																	
																</td>
																<?php } ?>
																<td>
																
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
															<?php #} ?>
															<?php if (count(@$this->data['hold_details'][$i])>0) { ?>
															<?php for($j=1;$j<=count($this->data['hold_details'][$i]);$j++) { $k = $j + 1; ?>
															<tr class="active">
																<td>
																	<select class="form-control input-large" name="qcert_spec_<?php echo $i; ?>[]" id="qcert_spec_<?php echo $i.$j; ?>">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['specifications'];

													                foreach($rows as $specifications){ 
													                	if ($this->data['hold_details'][$i][$j]['specification']==$specifications["id"]) {  
													                		echo '<option value='.$specifications["id"].' selected>'.$specifications["name"].'</option>';
													                	} else {
													                		echo '<option value='.$specifications["id"].'>'.$specifications["name"].'</option>';
													                	}	

													                }	
																	?>
																	</select>
																	<span for="qcert_spec_<?php echo $i; ?>" class="help-block"></span>
																</td>
																<?php if (@$this->data['hold_details'][$i][1]['min_value']) { ?>
																<td class="minrm">
																	<?php
																	/*
																	<select class="form-control input-large" name="qcert_labmin_<?php echo $i; ?>[]" id="qcert_labmin_<?php echo $i.$j; ?>">
																	<!--<option value="">Please Select</option>-->
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	if ($this->data['hold_details'][$i][$j]['min_value']==$parameters["min"]) {  
													                		echo '<option value='.$parameters["min"].' selected>'.$parameters["min"].'</option>';
													                	} /* else {
													                		echo '<option value='.$parameters["min"].'>'.$parameters["min"].'</option>';
													                	} */?>
													                <?php /*
													                }	

																	</select>
																	*/?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmin_<?php echo $i; ?>[]" id="qcert_labmin_<?php echo $i.$j; ?>" value="<?php echo $this->data['hold_details'][$i][$j]['min_value']; ?>">
																	<span for="qcert_labmin_<?php echo $i; ?>" class="help-block"></span>
																</td>
																<?php } ?>
																<?php if (@$this->data['hold_details'][$i][1]['max_value']) { ?>
																<td class="maxrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmax_<?php echo $i; ?>[]" id="qcert_labmax_<?php echo $i.$j; ?>">
																	<!--<option value="">Please Select</option>-->
																	<?php
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){
													                    if ($this->data['hold_details'][$i][$j]['max_value']==$parameters["max"]) { 
													                		echo '<option value='.$parameters["max"].' selected>'.$parameters["max"].'</option>';
													                	} /* else {
													                		echo '<option value='.$parameters["max"].'>'.$parameters["max"].'</option>';
													                	} */ ?>

													                <?php /*
													                }	
																	
																	</select>
																	*/?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmax_<?php echo $i; ?>[]" id="qcert_labmax_<?php echo $i.$j; ?>" value="<?php echo $this->data['hold_details'][$i][$j]['max_value']; ?>">
																	<span for="qcert_labmax_1" class="help-block" style="color:red"></span>
																</td>
																<?php } ?>
																<td>
																	<select class="form-control input-large" name="qcert_labunits_<?php echo $i; ?>[]" id="qcert_labunits_<?php echo $i.$j; ?>">
																	<!--<option value="">Please Select</option>-->
																	<?php
													                $rows = $this->data['units'];

													                foreach($rows as $units){
													                    if ($this->data['hold_details'][$i][$j]['units']==$units["id"]) { 
													                		echo '<option value='.$units["id"].' selected>'.$units["unit_name"].'</option>';
													                	} else {
													                		echo '<option value='.$units["id"].'>'.$units["unit_name"].'</option>';
													                	} 

													                }	
																	?>
																	</select>
																	<span for="qcert_labunits_1" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	<select class="form-control input-large" name="qcert_labmethods_<?php echo $i; ?>[]" id="qcert_labmethods_<?php echo $i.$j; ?>">
																	<!--<option value="">Please Select</option>-->
																	<?php
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	if ($this->data['hold_details'][$i][$j]['method']==$parameters["lab_method_id"]) { 
													                		echo '<option value='.$parameters["lab_method_id"].' selected>'.$parameters["method_name"].'</option>';
													                	} /* else {
													                	}  else {
													                		echo '<option value='.$parameters["lab_method_id"].'>'.$parameters["method_name"].'</option>';
													                	} */

													                }	
																	?>
																	</select>
																	<span for="qcert_labmethods_1" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="qcert_results_<?php echo $i; ?>[]" id="qcert_results_<?php echo $i; ?>" value="<?php echo $this->data['hold_details'][$i][$j]['results']; ?>" required>
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
															</div>
														</div>					
													</div>
												</div>
											 </div>
											 <?php } ?>

											<?php for($p=((count($this->data['hold_details']))+1);$p<=(10-count($this->data['hold_details']));$p++) { ?>
                                            <div class="row" id="div_hold_<?php echo $p; ?>" style="display:none;">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<?php /*<input type="button" value="Add Particulars" id="cert_hold_1" class="cert_hold_2" OnClick="javascript:cargo_rows(2);">*/ ?>
														<input type="button" value="Add Particulars" id="cert_hold_<?php echo $p; ?>" class="cert_hold_<?php echo $p; ?>" OnClick="javascript:cert_rows(<?php echo $p; ?>);">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover cert_hold_details" id="cert_hold_details_<?php echo $p; ?>">
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
																	<input type="hidden" name="qcert_spec_id_<?php echo $p; ?>" id="qcert_spec_id_<?php echo $p; ?>" value="<?php echo $p; ?>" >
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_spec_head_<?php echo $p; ?>" id="qcert_spec_head_<?php echo $p; ?>" value="" >
																	<span for="qcert_spec_head_<?php echo $p; ?>" class="help-block" style="color:red"></span>
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
																	<select class="form-control input-large" name="qcert_spec_<?php echo $p; ?>[]" id="qcert_spec_<?php echo $p; ?>">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['specifications'];

													                foreach($rows as $specifications){ 
													                	echo '<option value='.$specifications["id"].'>'.$specifications["name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_spec_<?php echo $p; ?>" class="help-block"></span>
																</td>
																<td class="minrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmin_<?php echo $p; ?>[]" id="qcert_labmin_<?php echo $p; ?>">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["min"].'>'.$parameters["min"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmin_<?php echo $p; ?>[]" id="qcert_labmin_<?php echo $p; ?>" value="">
																	<span for="qcert_labmin_<?php echo $p; ?>" class="help-block"></span>
																	
																</td>
																<td class="maxrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmax_<?php echo $p; ?>[]" id="qcert_labmax_<?php echo $p; ?>">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["max"].'>'.$parameters["max"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmax_<?php echo $p; ?>[]" id="qcert_labmax_<?php echo $p; ?>" value="">
																	<span for="qcert_labmax_<?php echo $p; ?>" class="help-block" style="color:red"></span>
																	
																</td>
																<td>
																	<select class="form-control input-large" name="qcert_labunits_<?php echo $p; ?>[]" id="qcert_labunits_<?php echo $p; ?>">
																	<option value="">Please Select</option>
																	<?php
													                $unit_master = $this->data['units'];
													                
													                foreach($unit_master as $units){ 
													                	echo '<option value='.$units["id"].'>'.$units["unit_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labunits_<?php echo $p; ?>" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	<select class="form-control input-large" name="qcert_labmethods_<?php echo $p; ?>[]" id="qcert_labmethods_<?php echo $p; ?>">
																	<option value="">Please Select</option>
																	<?php /*
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["method_name"].'>'.$parameters["method_name"].'</option>';

													                }	
																	*/ ?>
																	</select>
																	<span for="qcert_labmethods_<?php echo $p; ?>" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="qcert_results_<?php echo $p; ?>[]" id="qcert_results_<?php echo $p; ?>" value="" required>
																	 <span for="qcert_results_<?php echo $p; ?>" class="help-block" style="color:red"></span>
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
											 <?php } ?>
											 <?php } else { ?> 
											 <?php for($i=1;$i<=10;$i++) { ?>
											 <div class="row" id="div_hold_<?php echo $i; ?>" <?php if ($i==1) {  } else { echo 'style="display:none;"'; } ?>>
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<?php /*<input type="button" value="Add Particulars" id="cert_hold_1" class="cert_hold_1" OnClick="javascript:cargo_rows(1);">*/ ?>
														<input type="button" value="Add Particulars" id="cert_hold_<?php echo $i; ?>" class="cert_hold_<?php echo $i; ?>" OnClick="javascript:cert_rows(<?php echo $i; ?>);">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover cert_hold_details" id="cert_hold_details_<?php echo $i; ?>">
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
																	<input type="hidden" name="qcert_spec_id_<?php echo $i; ?>" id="qcert_spec_id_<?php echo $i; ?>" value="<?php echo $i; ?>" >
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_spec_head_<?php echo $i; ?>" id="qcert_spec_head_<?php echo $i; ?>" value="" >
																	<span for="qcert_spec_head_<?php echo $i; ?>" class="help-block" style="color:red"></span>
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
																	<select class="form-control input-large" name="qcert_spec_<?php echo $i; ?>[]" id="qcert_spec_<?php echo $i; ?>"> 
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
																	<select class="form-control input-large" name="qcert_labmin_<?php echo $i; ?>[]" id="qcert_labmin_<?php echo $i; ?>">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["min"].'>'.$parameters["min"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmin_<?php echo $i; ?>[]" id="qcert_labmin_<?php echo $i; ?>" value="">
																	<span for="qcert_labmin_<?php echo $i; ?>" class="help-block"></span>
																	
																</td>
																<td class="maxrm">
																	<?php /*
																	<select class="form-control input-large" name="qcert_labmax_<?php echo $i; ?>[]" id="qcert_labmax_<?php echo $i; ?>">
																	<option value="">Please Select</option>
																	
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["max"].'>'.$parameters["max"].'</option>';

													                }	
																	
																	</select>
																	*/ ?>
																	<input type="text" class="form-control input-large" placeholder="" name="qcert_labmax_<?php echo $i; ?>[]" id="qcert_labmax_<?php echo $i; ?>" value="">
																	<span for="qcert_labmax_<?php echo $i; ?>" class="help-block" style="color:red"></span>
																	
																</td>
																<td>
																	<select class="form-control input-large" name="qcert_labunits_<?php echo $i; ?>[]" id="qcert_labunits_<?php echo $i; ?>">
																	<option value="">Please Select</option>
																	<?php
													                $unit_master = $this->data['units'];
													                
													                foreach($unit_master as $units){ 
													                	echo '<option value='.$units["id"].'>'.$units["unit_name"].'</option>';

													                }	
																	?>
																	</select>
																	<span for="qcert_labunits_<?php echo $i; ?>" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	
																	<select class="form-control input-large" name="qcert_labmethods_<?php echo $i; ?>[]" id="qcert_labmethods_<?php echo $i; ?>">
																	<option value="">Please Select</option>
																	<?php /*
													                $rows = $this->data['parameters'];

													                foreach($rows as $parameters){ 
													                	echo '<option value='.$parameters["method_name"].'>'.$parameters["method_name"].'</option>';

													                }	
																	*/ ?>
																	</se*/ lect>
																	<span for="qcert_labmethods_<?php echo $i; ?>" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="qcert_results_<?php echo $i; ?>[]" id="qcert_results_<?php echo $i; ?>" value="" required>
																	 <span for="qcert_results_<?php echo $i; ?>" class="help-block" style="color:red"></span>
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
											 <?php } ?>
											 <?php } ?>

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


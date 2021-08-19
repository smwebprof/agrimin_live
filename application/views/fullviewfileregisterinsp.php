
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					File Register - Full View (Inspection)
					</h3>
					<?php if (!empty(@$_SESSION['userId'])) { ?>
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
							<a href="<?php echo BASE_PATH; ?>Viewfileregisterinsp">
								File
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Full View Register
							</a>
						</li>
					</ul>
				    <?php } ?>
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
									 File Register
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
								<i class="fa fa-reorder"></i>View File Register
							</div>
							<!--<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>-->
							<div class="actions">
								<?php /* if ($_SESSION['fname'] != 'Guest') { ?>
										<a href="<?php echo BASE_PATH; ?>Viewfileregisterinsp" class="btn red">
											<i class="fa fa-pencil"></i> View All Files
										</a>
										<?php } */ ?>
										<?php $file_status = array('Invoiced','Completed','Cancelled'); ?>
										<?php if (!in_array($this->data['file_data'][0]['status'], $file_status)) { ?>
										<a href="<?php echo BASE_PATH; ?>Operationfileregister?id=<?php echo $_GET['id'] ?>" class="btn blue">
											<i class="fa fa-pencil"></i> View Operations
										</a>
										<?php } ?>
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
						<?php $rows = $this->data['file_data'];
											
						foreach($rows as $file_data){
						?>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td width="50%">
									 <strong>File No</strong>
								</td>
								<td>
									<?php echo $file_data['file_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>File Creation Date</strong>
								</td>
								<td>
									<?php echo date('d-m-Y',strtotime($file_data['file_creation_date'])) ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>File Password</strong>
								</td>
								<td>
									<?php echo $file_data['file_password']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Company/Clients Name</strong>
								</td>
								<td>
									<?php echo $this->data['clients_data'][0]['client_name']?>
								</td>
							</tr>
							<?php if (@$_SESSION['branch_name'] == 'India') { ?>
							<tr>
								<td>
									 <strong>Branch Name</strong>
								</td>
								<td>
									<?php echo @$this->data['branchs_data']['branch_name']; ?>
								</td>
							</tr>
							<?php } ?>
							<?php if (@$_SESSION['branch_name'] == 'India') { ?>
							<tr>
								<td>
									 <strong>Billing Client Name</strong>
								</td>
								<td>
									<?php echo $this->data['clients_data'][0]['client_name']?>
								</td>
							</tr>
							<?php } ?>
							<tr>
								<td>
									 <strong>File ref no</strong>
								</td>
								<td>
									<?php echo $file_data['client_job_ref_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Scope of Services</strong>
								</td>
								<td>
									<?php echo $file_data['scope_of_services'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Scope of Work</strong>
								</td>
								<td>
									<?php echo $file_data['scope_work'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Tax Options</strong>
								</td>
								<td>
									<?php echo $file_data['tax_options'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Nomination Date</strong>
								</td>
								<td>
									<?php echo date('d-m-Y',strtotime($file_data['nomination_date'])); ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Type Of Job</strong>
								</td>
								<td>
									<?php echo $this->data['importexport'][0]['name']?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>File Type</strong>
								</td>
								<td>
									<?php echo $this->data['filetype'][0]['name']?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>File options</strong>
								</td>
								<td>
									<div class="checkbox-list scroll" style="width:10;height:10;overflow-y:scroll;">
																	<?php
		$options = $this->data['filesuboptions'];
		#echo "<fieldset>";
		$i=1;
		foreach ($options as $k => $v) {
			

			/*if ($i==1) {
				echo '<div id="div1"
				style="display:visible">';
			} else {
				echo '<div id="div2" style="display:none">';
			}
			echo "<fieldset>";	
			echo '<input type="checkbox" class="parentCheckBox" name="sub_type_'.$i.'" />'.$k.'<br />';
			foreach ($v as $p => $q) {
				echo '<input type="checkbox" class="childCheckBox"  name="option_type_'.$i.'[]" />'.$q.'<br />';
			}
			echo "</fieldset>";
			echo "</div>";*/
			#echo "<fieldset>";
			$file_sub_type_id = explode(',',$file_data['file_sub_type_id']);
			$other_file_sub_type_id = $this->data['other_file_sub_type'];
			$file_options_id = explode(',',$file_data['file_options_id']);
			$div = "<div".$i.">";
			if ($i == $file_data['file_type_id']) {
				echo '<div id="div'.$i.'"" style="display:visible;background-color: #d5f4e6;pointer-events: none;" >';
			} else {
				echo '<div id="div'.$i.'"" style="display:none" >';
			}
			#echo '<div id="div'.$i.'"" style="display:visible" >'; 
			foreach ($v as $p => $q) {
				echo "<fieldset>";
				#echo '<input type="checkbox" class="parentCheckBox" name="sub_type_'.$i.'" />'.$p.'<br />';
				####echo '<input type="checkbox" class="parentCheckBox" name="sub_type[]" />'.$p.'<br />';
				$sub_type = explode("|",$p);
				if ($sub_type[0] == $file_data['file_sub_type_id']) {
					echo '<input type="checkbox" class="parentCheckBox" name="sub_type[]" value = "'.$sub_type[0].'" checked/><b style = "background-color: #f18973;">'.$sub_type[1].'</b><br />';
				} else {
					if (in_array($sub_type[0], $file_sub_type_id)) {
						echo '<input type="checkbox" class="parentCheckBox" name="sub_type[]" value = "'.$sub_type[0].'" checked/><b style = "background-color: #f18973;">'.$sub_type[1].'</b><br />';
					} else {	
						if (in_array($sub_type[0],$other_file_sub_type_id)) {
						echo '<input type="checkbox" class="parentCheckBox" name="sub_type[]" value = "'.$sub_type[0].'"/><b style = "background-color: #f18973;">'.$sub_type[1].'</b><br />';
						}
					} 
				}
				#echo "</fieldset>";
				$j=1;	
				foreach ($q as $m => $n) {
					#echo '<input type="checkbox" class="childCheckBox"  name="option_type_'.$j.'[]" />'.$n.'<br />';
					if ($m == $file_data['file_options_id']) {
						echo '<input type="checkbox" class="childCheckBox"  name="option_type[]" value = "'.$m.'" checked/>'.$n.'<br />';
					} else {	
						if (in_array($m, $file_options_id)) {
							echo '<input type="checkbox" class="childCheckBox"  name="option_type[]" value = "'.$m.'" checked/>'.$n.'<br />';	
						} /*else {
						echo '<input type="checkbox" class="childCheckBox"  name="option_type[]" value = "'.$m.'"/>'.$n.'<br />';
						}*/
					}
					$j++;
				}	
				
				echo "</fieldset>";
			}
			echo '</div>'; 	
			#echo "</fieldset>";
			$i++;
		}	
		#echo "</fieldset>";
	?>
																</div>
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
								<i class="fa fa-reorder"></i>Other Details
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
							<tr>
								<td width="50%">
									 <strong>Warehouse</strong>
								</td>
								<td>
									<?php echo $file_data['warehouse'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Voyage No</strong>
								</td>
								<td>
									<?php echo $file_data['voyage_no'] ?>
								</td>
							</tr>
							<?php /*<tr>
								<td>
									 <strong>Cargo Group</strong>
								</td>
								<td>
									<?php echo $this->data['cargogroup'][0]['name']?>
								</td>
							</tr>*/ ?>
							<?php /*<tr>
								<td>
									 <strong>Cargo</strong>
								</td>
								<td>
									<?php echo $this->data['cargo'][0]['commodity_name']?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Packing</strong>
								</td>
								<td>
									<?php echo $this->data['packing'][0]['paking_name']?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Packing Desc</strong>
								</td>
								<td>
									<?php echo $file_data['packing_desc'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Approx.Qty/Unit</strong>
								</td>
								<td>
									<label class="control-label col-md-9"><?php echo @$file_data['approx_qty']." ".@$this->data['approx_unit'][0]['unit_name']; ?></label>
								</td>
							</tr>*/ ?>
							<tr>
								<td>
									 <strong>Invoice By</strong>
								</td>
								<td>
									<?php echo $this->data['invoice_by']['branch_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>File Instructions</strong>
								</td>
								<td>
									<?php echo $this->data['instructions'][0]['description']?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Status</strong>
								</td>
								<td>
									<?php echo $file_data['status'] ?>
								</td>
							</tr>
							<?php if ($file_data['status'] == 'Cancelled') { ?>
							<tr>
								<td>
									 <strong>Cancel Remarks</strong>
								</td>
								<td>
									<?php echo $file_data['cancel_remarks'] ?>
								</td>
							</tr>
							<?php } ?>
							<?php /*<tr>
								<td>
									 <strong>Place Of Attendance</strong>
								</td>
								<td>
									<?php echo $file_data['attendance_placed'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Origin</strong>
								</td>
								<td>
									<?php echo $file_data['origin'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Load Port</strong>
								</td>
								<td>
									<?php echo $file_data['load_port'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Discharge Port</strong>
								</td>
								<td>
									<?php echo $file_data['discharge_port'] ?>
								</td>*/ ?>
							</tr>
							</table>
						</div>
					</div>
					<!-- END PORTLET-->

					<?php /*<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Cargo Details
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
						<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<?php /*<input type="button" value="Add Cargo Product" id="cargo_row">*/ ?>
														<?php /*<<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover" id="cargo_details">
															<thead>
															<tr>
																<th style="text-align-last: center">
																	 Cargo
																</th>
																<th  style="text-align-last: center">
																	 Packing
																</th>
																<th  style="text-align-last: center">
																	 Quantity
																</th>
																<th  style="text-align-last: center">
																	 Unit
																</th>
																<th  style="text-align-last: center">
																	 Origin
																</th>
																<th  style="text-align-last: center">
																	 Load Port
																</th>
																<th  style="text-align-last: center">
																	 Discharge Port
																</th>
																<th  style="text-align-last: center">
																	 Place Of Attendance
																</th>																
															</tr>
															</thead>
															<tbody>
															<?php foreach ($this->data['cargo_details'] as $k => $v) { ?>	
															<tr class="active">
																<td>
																	 <select class="form-control input-small cargomaster" name="cargo[]" id="cargo" title="<?php echo $v['commodity_name']; ?>">
																	 <option value=""><?php echo $v['commodity_name']; ?></option>
																	 </select>
																	 <span for="cargo" class="help-block"></span>
																</td>
																<td>
																	 <select class="form-control input-small packingmaster" name="div_packing[]" id="div_packing" title="<?php echo $v['paking_name']; ?>">
																	 <option value=""><?php echo $v['paking_name']; ?></option>
																	 </select>
																	 <span for="div_packing" class="help-block"></span>
																</td>																	
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="div_quantity[]" id="div_quantity" title="<?php echo $v['approx_qty']; ?>" value="<?php echo $v['approx_qty']; ?>" readonly>
																</td>
																<td>
																	 <select class="form-control input-small unitmaster" name="div_unit[]" id="div_unit" title="<?php echo $v['unit_name']; ?>">
																	 <option value=""><?php echo $v['unit_name']; ?></option>
																	 </select>
																</td>
																<td>
																	 <input type="text" class="form-control input-small div_origin" id="div_origin" name="div_origin[]" title="<?php echo $v['origin']; ?>" value="<?php echo $v['origin']; ?>" readonly>
																</td>
																<td>
																	 <input type="text" class="form-control input-small div_container_wt" id="div_load_port" name="div_load_port[]" title="<?php echo $v['load_port']; ?>"  value="<?php echo $v['load_port']; ?> " readonly>
																</td>
																<td>
																	 <input type="text" class="form-control input-small div_net_wet" id="div_discharge_port" name="div_discharge_port[]" title="<?php echo $v['discharge_port']; ?>"  value="<?php echo $v['discharge_port']; ?>" readonly>
																</td>
																<td>
																	 <input type="text" class="form-control input-small div_net_wet" id="div_place_attendance" name="div_place_attendance[]" title="<?php echo $v['attendance_placed']; ?>" value="<?php echo $v['attendance_placed']; ?>" readonly>
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
					</div> */ ?>	

					<!-- Start PORTLET-->
								<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Upload Documents
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
							<tr>
							<td width="50%">
									 <strong>View Nomination Attachment</strong>
								</td>
								<td>
									<span><a href="<?php echo BASE_PATH.'file_uploads/'.$file_data['upload_nomination_path']; ?>"><?php echo $file_data['upload_nomination_path']; ?></a></span>
								</td>
							</tr>
							<?php if (@$_SESSION['employee_staff'] != 'Guest') { ?>
							<?php if (@$_SESSION['user_email'] == @$_SESSION['primary_email'] OR @$_SESSION['employee_staff'] == 'Admin') { ?>
							<tr>
							<td width="50%">
									 <strong>View Rate Attachement</strong>
								</td>
								<td>
									<span><a href="<?php echo BASE_PATH.'file_uploads/'.$file_data['upload_rate_path']; ?>"><?php echo $file_data['upload_rate_path']; ?></a></span>
								</td>
							</tr>							
							<tr>
							<td width="50%">
									 <strong>Rate Confirmation Remarks</strong>
								</td>
								<td>
									<span><?php echo $file_data['rate_remarks']; ?></span>
								</td>
							</tr>
							<?php } ?>
							<?php } ?>
							<tr>
							<td width="50%">
									 <strong>View Additional Document Attachment</strong>
								</td>
								<td>
									<span><a href="<?php echo BASE_PATH.'file_uploads/'.$file_data['upload_additional_docs_path']; ?>"><?php echo $file_data['upload_additional_docs_path']; ?></a></span>
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
								<i class="fa fa-reorder"></i>File Generated By :
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
							<tr>
								<td width="50%">
									 <strong>Created By :</strong> <?php echo $file_data['fname']." ".$file_data['lname'] ?>
								</td>  
								<td>
									 <strong>Created Date:</strong>  <?php echo date('d-m-Y',strtotime($file_data['entry_date'])) ?>
								</td>
							</tr>
							<tr>
								<td width="50%">
									 <strong>Modified By :</strong> <?php echo $file_data['ename']." ".$file_data['elname'] ?>
								</td>  
								<td>
									 <?php if (!empty($file_data['modify_date'])) {   
											 $modify_date = date('d-m-Y',strtotime($file_data['modify_date']));
										   } else {
										   	 $modify_date = '';	
										   }	 

									 	?>
									 <strong>Modified Date:</strong>  <?php echo $modify_date; ?>
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


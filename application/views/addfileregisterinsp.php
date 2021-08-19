<style> 
            h1 { 
                color:Green; 
            } 
            div.scroll { 
                margin:4px, 4px; 
                padding:4px; 
                background-color: #d5f4e6;
                width: 500px; 
                height: 170px; 
                overflow-y: auto;
            } 
        </style> 
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					File Register (New - Inspection)
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
							<a href="<?php echo BASE_PATH; ?>Viewfileregisterinsp">
								File
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								New File Register
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
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>New File Register
										</div>
										<div class="actions">
										<!--<a href="<?php echo BASE_PATH; ?>addclientinteraction" class="btn yellow">
											<i class="fa fa-pencil"></i> Add Existing Client Interaction
										</a>-->
										<a href="<?php echo BASE_PATH; ?>Viewfileregisterinsp" class="btn red">
											<i class="fa fa-pencil"></i> View All Files
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
									</div>
					
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
																			<?php
												   #print_r($this->data);
												   #echo validation_errors();
												   if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';
											?><br>
										<?php if (@$_GET['msg']==1) { echo '<font size="3" color="red">File Options is Required!!!</font>'; } ?>

										<?php if (@$_GET['msg']==2) { echo '<font size="3" color="red">Cargo Commodity Details is Required!!!</font>'; } ?>	

										<form action="" method="post" class="form-horizontal addfileregister-form" enctype="multipart/form-data" onsubmit="submitForm()">
											
											<div class="form-body">
												<h3 class="form-section alert alert-info">File Details</h3>
												* Marked fields are Mandatory <br/><br/>


												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Type*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="file_type" id="file_type">
																	<!--<option value=""></option>-->
																	<?php
													                $rows = $this->data['filetype'];

													                foreach($rows as $filetype){ 
													                	echo '<option value='.$filetype["id"].'>'.$filetype["name"].'</option>';

													                }	
																	?>
																</select>
																<span for="file_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File options*</label>
															<div class="col-md-9">
																<font color="red">*File  Options Are Required.Please select before submitting File.</font>
																<!-- <div class="checkbox-list">
																	<label>
																	<input type="checkbox" name="file_options" id="file_options"> Lot wise sampling & Analysis </label>
																	<label>
																	<input type="checkbox"  name="file_options" id="file_options"> Test weighment at Factory </label>
																	<label>
																	<input type="checkbox"  name="file_options" id="file_options"> Truck loading and dispatch </label>
																	<span for="file_options" class="help-block"></span>
																</div> -->
																<div class="checkbox-list scroll" style="width:10;height:10;overflow-y:scroll">
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
			$div = "<div".$i.">";
			echo '<div id="div'.$i.'"" style="display:visible;background-color: #d5f4e6;" >'; 
			foreach ($v as $p => $q) {
				echo "<fieldset>";
				#echo '<input type="checkbox" class="parentCheckBox" name="sub_type_'.$i.'" />'.$p.'<br />';
				####echo '<input type="checkbox" class="parentCheckBox" name="sub_type[]" />'.$p.'<br />';
				$sub_type = explode("|",$p);
				echo '<input type="checkbox" class="parentCheckBox" name="sub_type[]" id="sub_type[]" value = "'.$sub_type[0].'"/>&nbsp;&nbsp;<b style = "background-color: #f18973;">'.$sub_type[1].'</b><br />';
				#echo "</fieldset>";
				$j=1;	
				foreach ($q as $m => $n) {
					#echo '<input type="checkbox" class="childCheckBox"  name="option_type_'.$j.'[]" />'.$n.'<br />';
					echo '<input type="checkbox" class="childCheckBox"  name="option_type[]" id="option_type[]" value = "'.$m.'"/>&nbsp;&nbsp;'.$n.'<br />';
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
															</div> 
														</div>
														<?php /*<span for="for_sub_type" class="help-block"><font color="red">*File  Options Are Required.Please select before submitting File.</font></span>*/ ?>	
													</div>
													<!--/span-->
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Assigned To User</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="user_data[]" id="user_data" multiple>
																	<option value=""></option>
																	<?php
													                $rows = $this->data['user_data'];

													                foreach($rows as $user_data){ 
													                	echo '<option value='.$user_data["id"].'>'.$user_data["first_name"] .' '.$user_data["last_name"] .' - '.$user_data["branch_name"] .'</option>';

													                }	
																	?>
																</select>
																<span for="user_data" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Creation Date*</label>
															<div class="col-md-9">
																<?php /*<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="0d">
																<input type="text" class="form-control" name="file_date" id="file_date" value="<?php echo date('d-m-Y'); ?>"readonly>
																<span for="file_date" class="help-block"></span>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
																</div>*/?>
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="<?php echo date('d-m-Y'); ?>" style="width:25%" readonly>
															</div>
														</div>
													</div>
													<!--/span-->												
													
												</div>
												<!--/row-->												

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Company/Client Name*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="clients_name" id="clients_name">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['clients_data'];

													                foreach($rows as $clients_data){ 
													                	echo '<option value='.$clients_data["id"].'>'.$clients_data["client_name"].'</option>';

													                }	
																	?>
																</select>
																<span for="clients_name" class="help-block"></span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Ref No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_ref_no" id="client_ref_no" value="">
																<span for="client_ref_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->											
												</div>
												<!--/row-->
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Scope of Services*</label>
															<div class="col-md-9">
																<select class="form-control" name="scope_services" id="scope_services">
																	<!--<option value="">Please Select</option>-->
																	<option value="Analysis">Analysis</option>
																	<option value="Dry Cargo">Dry Cargo</option>
																	<option value="Fertilzer">Fertilzer</option>
																	<option value="Liquid">Liquid</option>
																	<option value="Minerals">Minerals</option>
																	<option value="Stock Management">Stock Management</option>
																	<option value="Discharge Supervision">Discharge Supervision</option>
																	<option value="Technical Inspection">Technical Inspection</option>
																</select>
																<span for="scope_services" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Scope Of Work</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="scope_work" id="scope_work" value="">
																<span for="scope_work" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Tax Options*</label>
															<div class="col-md-9">
																<select class="form-control" name="tax_options" id="tax_options">
																	<option value="">Please Select</option>
																	<?php if (@$_SESSION['branch_name']=='India') { ?>
																	<option value="GST">GST</option>
																	<?php } ?>
																	<?php if (@$_SESSION['branch_name']!='India') { ?>
																	<option value="VAT">VAT</option>
																	<?php } ?>
																	<option value="N/A">N/A</option>
																</select>
																<span for="tax_options" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Nomination Date*</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m" data-date-end-date="0d">
																<input type="text" class="form-control" name="nomination_date" id="nomination_date" value="<?php echo date('d-m-Y'); ?>" readonly>
																<span for="nomination_date" class="help-block"></span>
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
															<label class="control-label col-md-3">Type Of Job*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="import_export" id="import_export">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['importexport'];

													                foreach($rows as $importexport){ 
													                	echo '<option value='.$importexport["id"].'>'.$importexport["name"].'</option>';

													                }	
																	?>
																</select>
																<span for="import_export" class="help-block"></span>
															</div>
														</div>
													</div>
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Type Of Job*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="import_export" id="import_export">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['importexport'];

													                foreach($rows as $importexport){ 
													                	echo '<option value='.$importexport["id"].'>'.$importexport["name"].'</option>';

													                }	
																	?>
																</select>
																<span for="import_export" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->*/ ?>
													
												</div>
												
												<?php /*<h3 class="form-section alert alert-info">File Details</h3>*/ ?>
												<!--/row-->
												
												<?php if ($_SESSION['branch_name'] == 'India') { ?>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Billing Branch Name*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="branch_name" id="branch_name">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['branchs_data'];

													                foreach($rows as $branchs_data){ 
													                	echo '<option value='.$branchs_data["id"].'>'.$branchs_data["branch_name"].'</option>';

													                }	
																	?>
																</select>
																<span for="branch_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Billing Client Name</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="billing_name" id="billing_name">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['clients_data'];

													                foreach($rows as $clients_data){ 
													                	echo '<option value='.$clients_data["id"].'>'.$clients_data["client_name"].'</option>';

													                }	
																	?>
																</select>
																<span for="billing_name" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												<?php } ?>
												
												<h3 class="form-section alert alert-info">Other Details</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Warehouse</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id='warehouse' name="warehouse">
																<span for="warehouse" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Voyage No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id='voyage_no' name="voyage_no">
																<span for="voyage_no" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												<!--row -->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Instructions*</label>
															<div class="col-md-9">
																<select class="form-control" id="file_ins" name="file_ins">
																	<option value="">Please Select</option>
																	<?php
													                $rows = $this->data['instructions'];

													                foreach($rows as $instructions){ 
													                	echo '<option value='.$instructions["id"].'>'.$instructions["description"].'</option>';

													                }	
																	?>
																</select>
																<span for="file_ins" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Status*</label>
															<div class="col-md-9">
																<?php /* <select class="form-control" id="status" name="status">
																	<option value ="">Select</option>
																	<option value ="Pending">Pending</option>
																	<option value ="Running">Running</option>
																	<option value ="Completed">Completed</option>
																	<option value ="Invoiced">Invoiced</option>
																</select> */ ?>
																<input type="text" class="form-control" id="status" name="status" value="Pending" readonly>
																<span for="status" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Invoiced By*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="invoice_by" id="invoice_by">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['createinvoice'];

													                /*foreach($rows as $branchs_data){ 
													                	if ($_SESSION['branch_id'] == $branchs_data["id"]) {
													                		echo '<option value='.$branchs_data["id"].' selected>'.$branchs_data["branch_name"].'</option>';
													                	} else {
													                		echo '<option value='.$branchs_data["id"].'>'.$branchs_data["branch_name"].'</option>';
													                	}

													                }*/	

													                foreach($rows as $createinvoice){ 
													                	if ($_SESSION['branch_id'] == 14) {
													                		if ($createinvoice["id"]==9) {
													                			echo '<option value='.$createinvoice["id"].' selected>'.$createinvoice["branch_name"].'</option>';
													                		}
													                	} else if ($_SESSION['branch_id'] == 13) {	
													                		if ($createinvoice["id"]==1) {
													                			echo '<option value='.$createinvoice["id"].' selected>'.$createinvoice["branch_name"].'</option>';
													                		}
													                	} else if ($_SESSION['branch_id'] == 15) {	
													                		if ($createinvoice["id"]==1) {
													                			echo '<option value='.$createinvoice["id"].' selected>'.$createinvoice["branch_name"].'</option>';
													                		}
													                	} else if ($_SESSION['branch_id'] == 12) {	
													                		if ($createinvoice["id"]==9) {
													                			echo '<option value='.$createinvoice["id"].' selected>'.$createinvoice["branch_name"].'</option>';
													                		}
													                	} else if ($_SESSION['branch_id'] == 11) {	
													                		if ($createinvoice["id"]==9) {
													                			echo '<option value='.$createinvoice["id"].' selected>'.$createinvoice["branch_name"].'</option>';
													                		}		
													                	} else if ($_SESSION['branch_id'] == $createinvoice["id"]) {	echo '<option value='.$createinvoice["id"].' selected>'.$createinvoice["branch_name"].'</option>';
													                	} else {	
													                		echo '<option value='.$createinvoice["id"].'>'.$createinvoice["branch_name"].'</option>';
													                	}	
													                }	
																	?>
																</select>
																<span for="invoice_by" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Quantity/Unit*</label>
															<div class="col-md-9">
																<div class="checkbox-list">
																	<label class="checkbox-inline">
																	<input type="text" class="form-control" id="approx_unit" name="approx_unit"></label>
																	<label class="checkbox-inline">
																	<select class="form-control" data-placeholder="Select..." name="approx_unit_name" id="approx_unit_name">
																	<option value="">Select</option>
																	<?php
													                $unit_master = $this->data['units'];
													                
													                foreach($unit_master as $units){ 
													                	echo '<option value='.$units["id"].'>'.$units["unit_name"].'</option>';

													                }	
																	?>
																</select>
																	</label>
																</div>
																<span for="approx_unit" class="help-block"></span>
															</div>
															
														</div>
													</div>
													<!--/span-->*/ ?>
												</div>
												<!--/row-->
												<?php /*
												<h3 class="form-section alert alert-info">Cargo Details</h3>
												<font style="color:red" size="3" >***Instructions : 1.Please check the Cargo entries before File Submissions.</font><br/>
												<font style="color:red" size="3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.Select Cargo Group and then Add No of Cargo Products As Required...</font><br/><br/>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Cargo Group*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="cargo_group" id="cargo_group">
																	<option value="">Select</option>
																	<?php
													                $cargo_group = $this->data['cargogroup'];

													                foreach($cargo_group as $cargogroup){ 
													                	echo '<option value='.$cargogroup["id"].'>'.$cargogroup["name"].'</option>';

													                }	
																	?>
																</select>
																<span for="cargo_group" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Cargo*</label>
															<div class="col-md-9">
																<select class="form-control" name="cargo" id="cargo">
																<option value="">Select</option>
																</select>
																<span for="cargo" class="help-block"></span>
															</div>
														</div>
													</div> */ ?>
													<!--/span-->
												<?php /*</div> */ ?>
												<!--/row-->
												
												<?php /*
												<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<input type="button" value="Add Cargo" id="cargo_row">
														<div class="table-scrollable">
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
																<th  style="text-align-last: center">
																	 Remove
																</th>																
															</tr>
															</thead>
															<tbody>
															<tr class="active">
																<td>
																	 <select class="form-control input-small cargomaster" name="cargo[]" id="cargo" required>
																	 <option value="">Select</option>
																	 </select>
																	 <span for="cargo" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <select class="form-control input-small packingmaster" name="div_packing[]" id="div_packing" required>
																	 <option value="">Select</option>
																	 </select>
																	 <span for="div_packing" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="div_quantity[]" id="div_quantity" value="" required>
																	 <span for="div_quantity" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <select class="form-control input-small unitmaster" name="div_unit[]" id="div_unit" required>
																	 <option value="">Select</option>
																	 </select>
																	 <span for="div_unit" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small div_origin" id="div_origin" name="div_origin[]" value="" required>
																	 <span for="div_origin" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small div_container_wt" id="div_load_port" name="div_load_port[]" value="" required>
																	 <span for="div_load_port" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small div_net_wet" id="div_discharge_port" name="div_discharge_port[]" value="" required>
																	 <span for="div_discharge_port" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small div_net_wet" id="div_place_attendance" name="div_place_attendance[]" value="" required>
																	 <span for="div_place_attendance" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <!--<input type="button" class="form-control input-small rmv" value="Delete Cargo" id="delete_cargo_row">-->
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
											*/ ?>		

												<h3 class="form-section alert alert-info">Upload Documents</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Nomination*</label>
															<div class="col-md-9">
																<div class="col-md-9">
																<input type="file" id='upl_nomination' name="upl_nomination">
																<span>*Only pdf,doc,xls accepted</span>
																</div>
																<span for="upl_nomination" class="help-block"></span>
															</div>
														</div>
													</div>
													<?php if ($_SESSION['user_email'] == $_SESSION['primary_email']) { ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Rate Confirmation</label>
															<div class="col-md-9">
																<div class="col-md-9">
																<input type="file" id='upl_rate' name="upl_rate">
																<span>*Only pdf,doc,xls accepted</span>
																</div>
																<span for="upl_rate" class="help-block"></span>
															</div>
														</div>
													</div>
													<?php } ?>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Additional Document</label>
															<div class="col-md-9">
																<div class="col-md-9">
																<input type="file" id='upl_additional_docs' name="upl_additional_docs">
																<span>*Only pdf,doc,xls accepted</span>
																</div>
																<span for="upl_additional_docs" class="help-block"></span>
															</div>
														</div>
													</div>
													<?php if ($_SESSION['user_email'] == $_SESSION['primary_email']) { ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Rate Confirmation Remarks</label>
															<div class="col-md-9">
																<textarea class="form-control" rows="3" name="rate_remarks" id="rate_remarks"></textarea>
																<span for="rate_remarks" class="help-block" style="color:red"></span>
															</div>
														</div>
													</div>
													<?php } ?>
												</div>
												
											</div>

											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>&nbsp;&nbsp;&nbsp;
															<a href="<?php echo BASE_PATH; ?>Viewfileregisterinsp"><button type="button" class="btn default">Cancel</button></a>
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




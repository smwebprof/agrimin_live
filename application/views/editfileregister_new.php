<style> 
            h1 { 
                color:Green; 
            } 
            div.scroll { 
                margin:4px, 4px; 
                padding:4px; 
                background-color: #f18973;
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
					File Register (Edit)
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
							<a href="<?php echo BASE_PATH; ?>Viewfileregister">
								File
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Edit File Register
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
											<i class="fa fa-reorder"></i>Edit File Register
										</div>
										<div class="actions">
										<a href="<?php echo BASE_PATH; ?>Addfileregister" class="btn blue">
									<i class="fa fa-pencil"></i> Add New File
								</a>
										<a href="<?php echo BASE_PATH; ?>Viewfileregister" class="btn red">
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
					
										<form action="" method="post" class="form-horizontal editfileregister-form" enctype="multipart/form-data">
											<?php $rows = $this->data['file_data'];
											#print_r($rows);
											foreach($rows as $file_data){
											?>
											<input type="hidden" name="id" id="id" value="<?php echo $file_data['id']; ?>">
											<div class="form-body">
												<h3 class="form-section alert alert-info">File Details</h3>
												* Marked fields are Mandotary <br/><br/>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File No*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_no" id="file_no" value="<?php echo $file_data['id']; ?>" readonly>
																<span for="file_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Creation Date*</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-5d">
																<input type="text" class="form-control" name="file_date" id="file_date" value="<?php echo date('d-m-Y',strtotime($file_data["file_creation_date"])); ?>" readonly>
																<span for="file_date" class="help-block"></span>
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
															<label class="control-label col-md-3">Assigned To User</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="user_data" id="user_data" multiple>
																	<option value=""></option>
																	<?php
													                $rows = $this->data['user_data'];

													                foreach($rows as $user_data){ 
													                	if (in_array($user_data["id"], $this->data['user_details']))	{
													                	echo '<option value='.$user_data["id"].' selected>'.$user_data["first_name"] .'</option>';
													                    } else {
													                    echo '<option value='.$user_data["id"].'>'.$user_data["first_name"] .'</option>';	
													                    }

													                }	
																	?>
																</select>
																<span for="user_data" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Password</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_file_password" id="client_file_password" value="<?php echo $file_data['file_password']; ?>" readonly>
																<span for="client_file_password" class="help-block"></span>
															</div>
														</div>
													</div>
													
												</div>
												<!--/row-->
												

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Company/Clients Name*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="clients_name" id="clients_name">
																	<!--<option value=""></option>-->
																	<?php
													                $rows = $this->data['clients_data'];

													                foreach($rows as $clients_data){
													                	if ($file_data["client_id"] == $clients_data["id"]) {
													                	echo '<option value='.$clients_data["id"].' selected>'.$clients_data["client_name"].'</option>';
													                	} /*else {
													                	echo '<option value='.$clients_data["id"].'>'.$clients_data["client_name"].'</option>';	
													                	}*/

													                }	
																	?>
																</select>

																<span for="clients_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Billing Branch Name*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="branch_name" id="branch_name">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['branchs_data'];

													                foreach($rows as $branchs_data){ 

													                	if ($file_data["branch_id"] == $branchs_data["id"]) {
													                	echo '<option value='.$branchs_data["id"].' selected>'.$branchs_data["branch_name"].'</option>';
													                } /*else {
													                	echo '<option value='.$branchs_data["id"].'>'.$branchs_data["branch_name"].'</option>';
													                } */

													                }	
																	?>
																</select>
																<span for="branch_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>
												<!--/row-->
												<?php if ($_SESSION['branch_name'] == 'India') { ?>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Billing Client Name*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="billing_name" id="billing_name">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['clients_data'];

													                foreach($rows as $clients_data){ 
													                	if ($file_data["billing_client_id"] == $clients_data["id"]) {
													                	echo '<option value='.$clients_data["id"].' selected>'.$clients_data["client_name"].'</option>';
													                	} /*else {
													                		echo '<option value='.$clients_data["id"].'>'.$clients_data["client_name"].'</option>';
													                	}	*/
													                }	
																	?>
																</select>
																<span for="billing_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<?php } ?>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File ref no</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_ref_no" id="client_ref_no" value="<?php echo $file_data['client_job_ref_no']; ?>">
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
																	<option value="<?php echo $file_data['scope_of_services']; ?>"><?php echo $file_data['scope_of_services']; ?></option>
																	<?php /*<option value="Analysis" <?php if ($file_data['scope_of_services']=='Analysis') { echo 'selected'; } ?>>Analysis</option>
																	<option value="Dry Cargo" <?php if ($file_data['scope_of_services']=='Dry Cargo') { echo 'selected'; } ?>>Dry Cargo</option>
																	<option value="Liquid" <?php if ($file_data['scope_of_services']=='Liquid') { echo 'selected'; } ?>>Liquid</option>
																	<option value="Minerals" <?php if ($file_data['scope_of_services']=='Minerals') { echo 'selected'; } ?>>Minerals</option> */ ?>
																</select>
																<span for="scope_services" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Tax Options*</label>
															<div class="col-md-9">
																<select class="form-control" name="tax_options" id="tax_options">
																	<!--<option value="">Please Select</option>-->
																	<option value="<?php echo $file_data['tax_options']; ?>"><?php echo $file_data['tax_options']; ?></option>
																	<?php /* if (@$_SESSION['branch_name']=='India') { ?>
																	<option value="GST" <?php if ($file_data['tax_options']=='GST') { echo 'selected'; } ?>>GST</option>
																	<?php } ?>
																	<?php if (@$_SESSION['branch_name']!='India') { ?>
																	<option value="VAT" <?php if ($file_data['tax_options']=='VAT') { echo 'selected'; } ?>>VAT</option>
																	<?php } */?>
																</select>
																<span for="tax_options" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>
												
												<h3 class="form-section alert alert-info">File Details</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Nomination Date*</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m">
																<input type="text" class="form-control" name="nomination_date" id="nomination_date" value="<?php echo date('d-m-Y'); ?>"readonly>
																<span for="nomination_date" class="help-block"></span>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>

																</div>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Import/Export*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="import_export" id="import_export">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['importexport'];

													                foreach($rows as $importexport){ 
													                	if ($file_data["import_export"] == $importexport["id"]) {
													                	echo '<option value='.$importexport["id"].' selected>'.$importexport["name"].'</option>';
													                } else {
													                	echo '<option value='.$importexport["id"].'>'.$importexport["name"].'</option>';
													                }

													                }	
																	?>
																</select>
																<span for="import_export" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
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
													                	if ($file_data["file_type_id"] == $filetype["id"]) {
													                	echo '<option value='.$filetype["id"].' selected>'.$filetype["name"].'</option>';
													                } else {
													                	echo '<option value='.$filetype["id"].'>'.$filetype["name"].'</option>';
													                }
													                	#echo '<option value='.$filetype["id"].'>'.$filetype["name"].'</option>';

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
			$file_sub_type_id = explode(',',$file_data['file_sub_type_id']);
			$file_options_id = explode(',',$file_data['file_options_id']);
			$div = "<div".$i.">";
			if ($i == $file_data['file_type_id']) {
				echo '<div id="div'.$i.'"" style="display:visible;background-color: #d5f4e6;" >';
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
					echo '<input type="checkbox" class="parentCheckBox" name="sub_type[]" value = "'.$sub_type[0].'" checked/>&nbsp;&nbsp;<b style = "background-color: #f18973;">'.$sub_type[1].'</b><br />';
				} else {
					if (in_array($sub_type[0], $file_sub_type_id)) {
						echo '<input type="checkbox" class="parentCheckBox" name="sub_type[]" value = "'.$sub_type[0].'" checked/>&nbsp;&nbsp;<b style = "background-color: #f18973;">'.$sub_type[1].'</b><br />';
					} else {	
						echo '<input type="checkbox" class="parentCheckBox" name="sub_type[]" value = "'.$sub_type[0].'"/>&nbsp;&nbsp;<b style = "background-color: #f18973;">'.$sub_type[1].'</b><br />';
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
						} else {
						echo '<input type="checkbox" class="childCheckBox"  name="option_type[]" value = "'.$m.'"/>'.$n.'<br />';
						}
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
															</div> 
														</div>
													</div>
													<!--/span-->
												</div>
												
												
												<h3 class="form-section alert alert-info">Other Details</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Vessel Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id='vessel_name' name="vessel_name" value = "<?php echo $file_data['vessel_name'] ?>">
																<span for="vessel_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Voyage No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id='voyage_no' name="voyage_no" value = "<?php echo $file_data['voyage_no'] ?>">
																<span for="voyage_no" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												<!--row -->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Cargo Group</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="cargo_group" id="cargo_group">
																	<!--<option value="">Select</option>-->
																	<?php
													                $cargo_group = $this->data['cargogroup'];
			
													                foreach($cargo_group as $cargogroup){ 
													                	if ($file_data["cargo_group_id"] == $cargogroup["id"]) {
													                	echo '<option value='.$cargogroup["id"].' selected>'.$cargogroup["name"].'</option>';
													                } /* else {
													                	echo '<option value='.$cargogroup["id"].'>'.$cargogroup["name"].'</option>';
													                } */
													                }	
																	?>
																</select>
																<span for="cargo_group" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Cargo</label>
															<div class="col-md-9">
																<select class="form-control" name="cargo" id="cargo">
																<!--<option value="">Select</option>-->
																<?php
													                $rows = $this->data['cargo'];
			
													                foreach($rows as $cargo){ 
													                	if ($file_data["cargo_id"] == $cargo["id"]) {
													                	echo '<option value='.$cargo["id"].' selected>'.$cargo["commodity_name"].'</option>';
													                } 
													                /*else {
													                	echo '<option value='.$cargo["id"].'>'.$cargo["commodity_name"].'</option>';
													                }*/
													                }	
																	?>
																</select>
																<span for="cargo" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Packing</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="packing" id="packing">
																	<!--<option value=""></option>-->
																	<?php
													                $packing_master = $this->data['packing'];
													                
													                foreach($packing_master as $packing){ 
													                	echo '<option value='.$packing["id"].'>'.$packing["paking_name"].'</option>';

													                }	
																	?>
																</select>
																<span for="packing" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Packing Desc</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="packing_desc" name="packing_desc" value = "<?php echo $file_data['packing_desc'] ?>">
																<span for="packing_desc" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>

												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Approx.Qty/Unit</label>
															<div class="col-md-9">
																<div class="checkbox-list">
																	<label class="checkbox-inline">
																	<input type="text" class="form-control" id="approx_unit" name="approx_unit" value = "<?php echo $file_data['approx_qty'] ?>"></label>
																	<label class="checkbox-inline">
																	<select class="form-control" id="approx_unit_name" name="approx_unit_name">
																	<option value="">Select</option>
																	<option <?php if ($file_data["approx_unit"] == 'KG') {  echo 'selected'; }?>>KG</option>
																	<option <?php if ($file_data["approx_unit"] == 'LTRS') {  echo 'selected'; }?>>LTRS</option>
																	<option <?php if ($file_data["approx_unit"] == 'MMT') {  echo 'selected'; }?>>MMT</option>
																	<option <?php if ($file_data["approx_unit"] == 'MT') {  echo 'selected'; }?>>MT</option>
																	<option <?php if ($file_data["approx_unit"] == 'NOS') {  echo 'selected'; }?>>NOS</option>
																	</select>
																	</label>
																</div>
																<span for="approx_unit" class="help-block"></span>
															</div>
															
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Invoice By</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="invoice_by" id="invoice_by">
																	<!--<option value=""></option>-->
																	<?php
													                $rows = $this->data['branchs_data'];

													                foreach($rows as $branchs_data){ 
													                	if ($file_data["invoice_by_branch"] == $branchs_data["id"]) {
													                	echo '<option value='.$branchs_data["id"].' selected>'.$branchs_data["branch_name"].'</option>';
													                } /*else {
													                	echo '<option value='.$branchs_data["id"].'>'.$branchs_data["branch_name"].'</option>';
													                }*/

													                }	
																	?>
																</select>
																<span for="invoice_by" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Instructions</label>
															<div class="col-md-9">
																<select class="form-control" id="file_ins" name="file_ins">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['instructions'];

													                foreach($rows as $instructions){ 
													                	if ($file_data["special_instruction"] == $instructions["id"]) {
													                	echo '<option value='.$instructions["id"].' selected>'.$instructions["description"].'</option>';
													                } else {
													                	echo '<option value='.$instructions["id"].'>'.$instructions["description"].'</option>';
													                }

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
															<label class="control-label col-md-3">Status</label>
															<div class="col-md-9">
																<select class="form-control" id="status" name="status">
																	<option <?php if ($file_data["status"] == 'Pending') { echo 'selected'; } ?>>Pending</option>
																	<option <?php if ($file_data["status"] == 'Running') { echo 'selected'; } ?>>Running</option>
																	<option <?php if ($file_data["status"] == 'Completed') { echo 'selected'; } ?>>Completed</option>
																	<option <?php if ($file_data["status"] == 'Invoiced') { echo 'selected'; } ?>>Invoiced</option>
																</select>
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
															<label class="control-label col-md-3">Place Of Attendance</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="attendance" name="attendance" value="<?php echo $file_data['attendance_placed'] ?>">
																<span for="attendance" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Origin</label>
															<div class="col-md-9">
																<input type="text" class="form-control" id="origin" name="origin" value = "<?php echo $file_data['origin'] ?>">
																<span for="origin" class="help-block"></span>
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
																<input type="text" class="form-control" id="load_port" name="load_port" value = "<?php echo $file_data['load_port'] ?>">
																<span for="load_port" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Discharge Port</label>
															<div class="col-md-9">
																<input type="text" class="form-control"  id="discharge_port" name="discharge_port" value = "<?php echo $file_data['discharge_port'] ?>">
																<span for="discharge_port" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

												<h3 class="form-section alert alert-info">Field Parameters</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
															<div class="table-responsive">
															<div id="field_parameter_div">
																<?php echo $field_parameters; ?>
															</div>
															</div>
														</div>
													</div>
												</div>			

												<h3 class="form-section alert alert-info">Upload Documents</h3>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Nomination</label>
															<div class="col-md-9">
																<div class="col-md-9">
																<input type="file" id='upl_nomination' name="upl_nomination">
																<span>*Only pdf,doc,xls accepted</span>
																</div>
																<span for="upl_nomination" class="help-block"></span>
															</div>
														</div>
													</div>
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
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">View Nomination File</label>
															<div class="col-md-9">
																<div class="col-md-9">
																<input type="hidden" name="hid_upload_nomination_path" id="hid_upload_nomination_path" value="<?php echo $file_data['upload_nomination_path']?>"?>
																<span><a href="<?php echo BASE_PATH.'file_uploads/'.$file_data['upload_nomination_path']; ?>"><?php echo $file_data['upload_nomination_path']; ?></a></span>
																</div>
																</span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">View Rate File</label>
															<div class="col-md-9">
																<div class="col-md-9">
																<input type="hidden" name="hid_upload_rate_path" id="hid_upload_rate_path" value="<?php echo $file_data['upload_rate_path']?>"?>
																<span><a href="<?php echo BASE_PATH.'file_uploads/'.$file_data['upload_rate_path']; ?>"><?php echo $file_data['upload_rate_path']; ?></a></span>
																</div>
																<span for="upl_rate" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>&nbsp;&nbsp;&nbsp;
															<a href="<?php echo BASE_PATH; ?>viewclientinteraction"><button type="button" class="btn default">Cancel</button></a>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
											<?php
											}
											?>
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



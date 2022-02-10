			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					File Register (View - Multiple Cargo Group)
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
								View File Register
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
					<?php if (@$_GET['msg']==1) { echo '<font size="3" color="red">Data Saved Successfully!!!</font>'; } ?>
					<?php if (@$_GET['msg']==2) { echo '<font size="3" color="red">File Cannot Be Cancelled As Invoice is in Draft Mode!!!</font>'; } ?>
				</div>
			</div>
			<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
			<input type="hidden" name="viewfileregister" id="viewfileregister" value="viewfileregister">
			<input type="hidden" name="file_no_type" id="file_no_type" value="Multiple">	
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View File Register
							</div>
							<div class="actions">
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>Addfileregistermult" class="btn blue">
									<i class="fa fa-pencil"></i> Add New File
								</a>
								<?php } ?>
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

						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="btn-group">
									<label class="control-label col-md-3">From Date</label>
									<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m">
									<input type="text" class="form-control" name="file_from_date" id="file_from_date" value="<?php if (@$this->data['file_from_date']) { echo $this->data['file_from_date']; } /* else { echo date('d-m-Y'); }*/ ?>"readonly>
									<span for="file_date" class="help-block"></span>
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
									</div>
								</div>
								<div class="btn-group">
									<label class="control-label col-md-3">To Date</label>
									<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m">
									<input type="text" class="form-control" name="file_To_date" id="file_To_date" value="<?php if (@$this->data['file_To_date']) { echo $this->data['file_To_date']; } /* else { echo date('d-m-Y'); } */ ?>"readonly>
									<span for="file_date" class="help-block"></span>
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
									</div>
								</div>
								<div class="btn-group">
									<label class="control-label col-md-6">Status</label>
									<div class="input-group">
									<select class="form-control" id="status" name="status">
										<option value ="">Select</option>
										<option value ="Pending" <?php if (@$this->data['status'] == 'Pending') { echo 'selected'; } ?>>Pending</option>
										<option value ="Running" <?php if (@$this->data['status'] == 'Running') { echo 'selected'; } ?>>Running</option>
										<option value ="Invoiced" <?php if (@$this->data['status'] == 'Invoiced') { echo 'selected'; } ?>>Invoiced</option>
										<option value ="Completed" <?php if (@$this->data['status'] == 'Completed') { echo 'selected'; } ?>>Completed</option>
										<option value ="Cancelled" <?php if (@$this->data['status'] == 'Cancelled') { echo 'selected'; } ?>>Cancel</option>
									</select>
									</div>							
								</div>&nbsp;&nbsp;&nbsp;
								<div class="btn-group">
									<?php /*<label class="control-label col-md-6">Vessel Name</label>*/ ?>
									<div class="input-group">
									<select class="form-control input-medium select2me" data-placeholder="Select..." name="vessel_name" id="vessel_name">
										<option value ="">Select Vessel Name</option>
										<?php
										$rows = $this->data['vessel_name'];

										foreach($rows as $vessel_name){ 
											if ($_POST['vessel_name']==$vessel_name["vessel_name"]) {
												echo '<option value="'.$vessel_name["vessel_name"].'" selected>'.$vessel_name["vessel_name"].'</option>';
											} else {
												echo '<option value="'.$vessel_name["vessel_name"].'">'.$vessel_name["vessel_name"].'</option>';
											}
										}	
										?>
									</select>
									</div>							
								</div>
								<!--<div class="btn-group">
									<button type="submit" class="btn green">Submit</button>
								</div>-->
							</div>
							<div class="table-toolbar">
								<div class="btn-group">
									<table>
										<tr>
											<td><label class="control-label col-md-6">Clients Name</label>
											</td>	
											<td><select class="form-control input-large select2me" data-placeholder="Select..." name="clients_name" id="clients_name">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['clients_data'];

													                foreach($rows as $clients_data){ 
													                	/*echo '<option value='.$clients_data["id"].'>'.$clients_data["client_name"].'</option>';*/
													                	if ($this->data['clients_name']==$clients_data["id"]) {
													                    	echo '<option value='.$clients_data["id"].' selected>'.$clients_data["client_name"].'</option>';
													                    } else {
													                		echo '<option value='.$clients_data["id"].'>'.$clients_data["client_name"].'</option>';
													                    }

													                }	
																	?>
																</select>
											</td>
										</tr>

									</table>
								</div>
								<div class="btn-group">
									<table>
										<tr>
											<td><label class="control-label col-md-6">File nos</label>
											</td>	
											<td><select class="form-control input-large select2me" data-placeholder="Select..." name="file_nos" id="file_nos">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['file_nos'];

													                foreach($rows as $file_nos){ 

													                	echo '<option value='.$file_nos["file_no"].'>'.$file_nos["file_no"].'</option>';

													                	
							
													                }	
																	?>
																</select>
											</td>
										</tr>

									</table>
								</div>								
								<div class="btn-group">
									<button type="submit" class="btn green">Submit</button>
								</div>
								<div class="btn-group">
									<button type="submit" class="btn yellow" name="submit" value="excel">View Excel Report</button>
								</div>
							</div>



							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 Sr.No.
								</th>
								<th>
									 File No.
								</th>
								<th>
									 File Date
								</th>
								<th>
									 Client Name
								</th>
								<th>
									 Nomination Date
								</th>
								<th>
									 Type Of Job
								</th>
								<th>
									 Scope Of Service
								</th>
								<th>
									 Cargo Group
								</th>
								<th>
									 Vessel Name
								</th>
								<?php /*<th>
									 Cargo
								</th>
								<th>
									 Approx Qty
								</th>
								<th>
									 Approx Unit
								</th>*/ ?>
								<th>
									 Status
								</th>
								<?php if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<th>
									 Edit
								</th>
								<?php } ?>
								<?php /*if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<th>
									 Delete
								</th>
								<?php } */ ?>
								<?php /* if ($_SESSION['country_code']=='SG') { ?>
								<th>
									 Reports/Forms
								</th>
								<?php } */ ?>
							</tr>
							</thead>
							<tbody>
							<?php	
							$rows = $this->data['file_data'];
							$i=1;
							foreach($rows as $file_data){
							?>
						    <tr class="odd gradeX">
						    	<td>
									 <?php #echo $interaction_data['id']; ?>
									 <?php echo $i; ?>
								</td>
								<td>
									 <a href="<?php echo BASE_PATH; ?>fullviewfileregistermult?id=<?php echo base64_encode($file_data['id']); ?>"><?php echo $file_data['file_no']; ?></a>
								</td>
								<td>
									<?php echo date("d-m-Y", strtotime($file_data['file_creation_date'])); ?>
								</td>
								<td>
									<?php echo $file_data['client_name']; ?>
								</td>
								<td>
									<?php echo date("d-m-Y", strtotime($file_data['nomination_date'])); ?>
								</td>
								<td>
									<?php echo $file_data['import_export']; ?>
								</td>
								<td>
									<?php echo $file_data['scope_of_services']; ?>
								</td>
								<td>
									<?php echo $file_data['cargo_group']; ?>
								</td>
								<td>
									<?php echo $file_data['vessel_name']; ?>
								</td>
								<?php /*<td>
									<?php echo $file_data['commodity_name']; ?>
								</td>
								<td>
									<?php echo $file_data['approx_qty']; ?>
								</td>
								<td>
									<?php echo $file_data['unit_name']; ?>
								</td>*/ ?>
								<td class="center">
     								<?php echo $file_data['status']; ?>
								</td>
								<?php if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<td>
									<?php  $file_status = array('Invoiced','Completed','Cancelled'); ?>
									<?php  if (!in_array($file_data['status'], $file_status)) { ?>
									<span class="label label-sm label-success">
										 <a href="<?php echo BASE_PATH; ?>editfileregistermult?id=<?php echo base64_encode($file_data['id']); ?>"  style="color:#fff">Edit</a>
									</span><br/><br/>
									<?php } ?>
									<?php  $file_status = array('Cancelled'); ?> <?php // 'Invoiced','Completed', ?>
									<?php  if (!in_array($file_data['status'], $file_status)) { ?>
									<span class="label label-sm label-info">
										 <a href="<?php echo BASE_PATH; ?>Operationfileregister?id=<?php echo base64_encode($file_data['id']); ?>"  style="color:#fff">Operations</a>
									</span><br/><br/>
									<?php } ?>
									<?php  $branch_status = array('11','12','13','14','15'); ?>
									<?php  $file_status = array('Invoiced','Completed','Cancelled'); ?>
									<?php  if (!in_array($file_data['status'], $file_status)) { ?>
									<?php  if (!in_array($_SESSION['branch_id'], $branch_status)) { ?>
									<span class="label label-sm label-warning">
										 <a href="<?php echo BASE_PATH; ?>SelectInvoicefileregister?id=<?php echo base64_encode($file_data['id']); ?>"  style="color:#fff">Invoice</a>
									</span><br/><br/>
									<?php } ?>
									<?php } else { ?>
									<?php  if (!in_array($_SESSION['branch_id'], $branch_status)) { ?>
									<span class="label label-sm label-warning">
										 <a href="<?php echo BASE_PATH; ?>RedirectInvoicefileregister?id=<?php echo base64_encode($file_data['id']); ?>&type=<?php echo $file_data['file_no_type']; ?>"  style="color:#fff">Invoice</a>
									</span><br/><br/>
									<?php } ?>
									<?php } ?>
								</td>
								<?php } ?>
								<?php /* if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<td>
									<?php  $file_status = array('Invoiced','Completed'); ?>
									<?php  if (!in_array($file_data['status'], $file_status)) { ?>
									<span class="label label-sm label-danger">
										 <a href="<?php echo BASE_PATH; ?>delfileregister?id=<?php echo base64_encode($file_data['id']); ?>"  style="color:#fff">Delete</a>
									</span>
									<?php } ?>
								</td>
								<?php } */ ?>
								<?php /* if ($_SESSION['country_code']=='SG') { ?>
								<td class="center">
     								<span class="label label-sm label-success">
										 <a href="<?php echo BASE_PATH; ?>Viewreportformats?id=<?php echo base64_encode($file_data['id']); ?>"  style="color:#fff">Download/Upload Forms</a>
									</span>
								</td>
								<?php } */ ?>
							</tr>	

							<?php
							$i=$i+1;
						    }
							?>
							
							</tbody>
							</table>
						</div>
					</div>
			
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
				<div class="col-md-6 col-sm-12">
					
				</div>
			</div>
		</form>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

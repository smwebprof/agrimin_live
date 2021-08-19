<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					View Cargo/ClientWise Report
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
								Cargo/ClientWise
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								View Cargo/ClientWise Report
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
					
				</div>
			</div>
			<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View Cargo/ClientWise Report
							</div>
							<div class="actions">
								
							</div>
						</div>
						
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="btn-group">
									<table>
										<tr>
											<td><label class="control-label col-md-12">Cargo Group</label>
											</td>	
											<td>
												<select class="form-control input-medium select2me" data-placeholder="Select..."name="cargo_group_view" id="cargo_group_view" style="top:5px;">
												<option value="">Select</option>
												<?php
													$cargo_group = $this->data['cargogroup'];
						
													foreach($cargo_group as $cargogroup){ 
														if ($this->data["post_cargo_group"] == $cargogroup["id"]) {
															echo '<option value='.$cargogroup["id"].' selected>'.$cargogroup["name"].'</option>';
														} else {
															echo '<option value='.$cargogroup["id"].'>'.$cargogroup["name"].'</option>';
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
											<td><label class="control-label col-md-6">Cargo</label>
											</td>	
											<td>
												<select class="form-control input-medium cargomaster" name="commodity" id="commodity" style="top:5px;">
												<option value="">Select</option>
												<?php
												$rows = $this->data['commodity_data'];
												foreach($rows as $commodity_data){ 
													/*echo '<option value='.$clients_data["id"].'>'.$clients_data["client_name"].'</option>';*/
														if ($this->data['post_commodity']==$commodity_data["id"]) {
															echo '<option value='.$commodity_data["id"].' selected>'.$commodity_data["commodity_name"].'</option>';
														} else {
															echo '<option value='.$commodity_data["id"].'>'.$commodity_data["commodity_name"].'</option>';
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
											<td><label class="control-label col-md-6">Client Name</label>
											</td>	
											<td>
												<select class="form-control input-large select2me" data-placeholder="Select..." name="clients_name" id="clients_name">
												<option value=""></option>
												<?php
												$rows = $this->data['clients_data'];

													foreach($rows as $clients_data){ 
													/*echo '<option value='.$clients_data["id"].'>'.$clients_data["client_name"].'</option>';*/
														if ($this->data['post_clients_name']==$clients_data["id"]) {
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
								<!--<div class="btn-group">
									<button type="submit" class="btn green">Submit</button>
								</div>-->
							</div>
							<div class="table-toolbar">
								<div class="btn-group">
									<table>
										<tr>
											<td><label class="control-label col-md-12">Load Port</label>
											</td>	
											<td><select class="form-control input-large select2me" data-placeholder="Select..." name="load_port" id="load_port">
											<option value="">Select</option>
											<?php
											$rows = $this->data['load_port'];

												foreach($rows as $load_port){ 
												/*echo '<option value='.$clients_data["id"].'>'.$clients_data["client_name"].'</option>';*/
													if ($this->data['post_load_port']==$load_port["load_port"]) {
														echo '<option value="'.$load_port["load_port"].'" selected>'.$load_port["load_port"].'</option>';
													} else {
														echo '<option value="'.$load_port["load_port"].'">'.$load_port["load_port"].'</option>';
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
											<td><label class="control-label col-md-12">Discharge Port</label>
											</td>	
											<td><select class="form-control input-large select2me" data-placeholder="Select..." name="discharge_port" id="discharge_port">
											<option value="">Select</option>
											<?php
											$rows = $this->data['discharge_port'];

												foreach($rows as $discharge_port){ 
												/*echo '<option value='.$clients_data["id"].'>'.$clients_data["client_name"].'</option>';*/
													if ($this->data['post_discharge_port']==$discharge_port["discharge_port"]) {
														echo '<option value="'.$discharge_port["discharge_port"].'" selected>'.$discharge_port["discharge_port"].'</option>';
													} else {
														echo '<option value="'.$discharge_port["discharge_port"].'">'.$discharge_port["discharge_port"].'</option>';
													}

												}	
											?>
											</select>
											</td>
										</tr>

									</table>
								</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;								
								<div class="btn-group">
									<button type="submit" class="btn green">Submit</button>
								</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<div class="btn-group">
									<button type="submit" class="btn yellow" name="submit" value="excel">View Excel Report</button>
								</div>
							</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 Sr.No.
								</th>
								<th>
									 Cargo Group
								</th>
								<th>
									 Cargo
								</th>								
								<th>
									 Client Name
								</th>
								<th>
									 Quantity
								</th>
								<th>
									 Unit
								</th>
								<th>
									 Load Port
								</th>
								<th>
									 Discharge Port
								</th>
								<?php /* if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<th>
									 View
								</th>
								<?php } */ ?>
								
							</tr>
							</thead>
							<tbody>
							<?php	
							$rows = $this->data['invoice_data'];
							$i=1;
							foreach($rows as $invoice_data){
							?>
						    <tr class="odd gradeX">
						    	<td>
									 <?php echo $i; ?>
								</td>
								<td>
									<?php echo $invoice_data['cargo_group_name']; ?>
								</td>
								<td>
									<?php echo $invoice_data['commodity_name']; ?>
								</td>								
								<td>
									 <?php echo $invoice_data['client_name']; ?>
								</td>
								<td>
     								<?php echo $invoice_data['approx_qty']; ?>
								</td>
								<td>
									<?php echo $invoice_data['unit_name']; ?>
								</td>
								<td class="center">
     								<?php echo $invoice_data['load_port']; ?>
								</td>
								<td class="center">
     								<?php echo $invoice_data['discharge_port']; ?>
								</td>
								<?php /* if ($this->data['access_right']['add_rights'] == 1) {  label-success">
										 <a href="<?php echo BASE_PATH; ?>Fullviewinvoicereport?id=<?php echo base64_encode($invoice_data['file_id']); ?>"  style="color:#fff">View Reports</a>
									</span>
								</td>
								<?php } */ ?>
								
							</tr>	

							<?php
							$i++;
						    }
							?>
							
							</tbody>
							<tfoot>
					        <tr>
					            <th></th>
					            <th></th>
					            <th></th>
					            <th>Total Quantity : </th>
					            <th><?php echo $this->data['tot_approx_unit']; ?></th>
					            <th></th>
					            <th></th>
					            <th></th>
					         </tr>
					    	</tfoot>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
					</form>
				</div>
				<div class="col-md-6 col-sm-12">
					
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

	
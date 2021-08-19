<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Client Interaction (View)
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
							<a href="<?php echo BASE_PATH; ?>viewclientinteraction">
								Sales
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								View Client Interaction
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
								<i class="fa fa-user"></i>View Client Interaction Forms
							</div>
							<div class="actions">
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>newclientinteraction" class="btn blue">
									<i class="fa fa-pencil"></i> Add New Client Interaction
								</a>
								<?php } ?>
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>addclientinteraction" class="btn red">
									<i class="fa fa-pencil"></i> Add Existing Client Interaction
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
									<input type="text" class="form-control" name="file_from_date" id="file_from_date" value="<?php if (@$this->data['file_from_date']) { echo $this->data['file_from_date']; } else { echo date('d-m-Y'); } ?>"readonly>
									<span for="file_date" class="help-block"></span>
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
									</div>
								</div>
								<div class="btn-group">
									<label class="control-label col-md-3">To Date</label>
									<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m">
									<input type="text" class="form-control" name="file_To_date" id="file_To_date" value="<?php if (@$this->data['file_To_date']) { echo $this->data['file_To_date']; } else { echo date('d-m-Y'); } ?>"readonly>
									<span for="file_date" class="help-block"></span>
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
									</div>
								</div>
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
									<button type="submit" class="btn green">Submit</button>
								</div>
								
							</div>
							<?php /*<div class="table-toolbar">
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
													                	echo '<option value='.$clients_data["id"].'>'.$clients_data["client_name"].'</option>';

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
							</div>*/ ?>
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 Sr. No.
								</th>
								<th>
									 Client Name
								</th>
								<th>
									 Full Name
								</th>
								<th>
									 Address
								</th>
								<?php /*<th>
									 City
								</th>
								<th>
									 State
								</th>
								<th>
									 Country
								</th> */ ?>
								<th>
									 Office Number
								</th>
								<th>
									 Company Web Page
								</th>
								<th>
									 Interaction Date
								</th>
								<th>
									 Location Interaction
								</th>
								<th>
									 Phone Interaction
								</th>
								<?php if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<th>
									 Edit
								</th>
								<?php } ?>	
								<?php if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<th>
									 Delete
								</th>
								<?php } ?>
							</tr>
							</thead>
							<tbody>
							<?php	
							$rows = $this->data['interaction_data'];
							$i=1;
							foreach($rows as $interaction_data){
							?>
						    <tr class="odd gradeX">
								<td>
									 <?php #echo $interaction_data['id']; ?>
									 <?php echo $i; ?>
								</td>
								<td>
									<a href="<?php echo BASE_PATH; ?>fullviewclientinteraction?id=<?php echo base64_encode($interaction_data['id']); ?>"><?php echo $interaction_data['client_name']; ?></a>
								</td>
								<td>
									<?php echo $interaction_data['full_name']; ?>
								</td>
								<td>
									<?php #echo substr($interaction_data['address'],0,40)."..."; ?>
									<?php echo $interaction_data['address'].",".$interaction_data['city'].",".$interaction_data['state'].",".$interaction_data['country']; ?>
								</td>
								<?php /*<td>
									<?php echo $interaction_data['city']; ?>
								</td>
								<td>
									<?php echo $interaction_data['state']; ?>
								</td>
								<td>
									<?php echo $interaction_data['country']; ?>
								</td> */?>
								<td>
									<?php echo $interaction_data['country_code']."".$interaction_data['tel_no']; ?>
								</td>
								<td>
									<?php echo $interaction_data['company_web_page']; ?>
								</td>
								<td>
									<?php echo date('d-m-Y',strtotime($interaction_data['interaction_date'])); ?>
								</td>
								<td>
									<?php #echo substr($interaction_data['location_interaction'],0,40)."...";  ?>
									<?php if ($interaction_data['location_interaction']=='on') { echo 'Yes';} ?>
								</td>
								<td>
									<?php #echo substr($interaction_data['phone_interaction'],0,40)."..."; ?>
									<?php if ($interaction_data['phone_interaction']=='on') { echo 'Yes';} ?>
								</td>
								<?php if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<td>
									<span class="label label-sm label-success">
										 <a href="<?php echo BASE_PATH; ?>editclientinteraction?id=<?php echo base64_encode($interaction_data['id']); ?>"  style="color:#fff">Edit</a>
									</span>
								</td>
							    <?php } ?>
								<?php if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<td>
									<span class="label label-sm label-info">
										 <a href="<?php echo BASE_PATH; ?>delclientinteraction?id=<?php echo base64_encode($interaction_data['id']); ?>"  style="color:#fff">Delete</a>
									</span>
								</td>
								<?php } ?>
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

<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Lab Parameter Mapping
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
							<a href="<?php echo BASE_PATH; ?>Viewlabparametermaster">
								Lab Parameter Mapping
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								View Lab Parameter Mapping
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
					<?php if (@$_GET['msg']==2) { echo '<font size="3" color="red">Data Deleted Successfully!!!</font>'; } ?>  
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View Lab Parameter Mapping
							</div>
							<div class="actions">
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>Viewlabmethodmaster" class="btn blue" target="_blank">
									<i class="fa fa-pencil"></i> Add Methods
								</a>
								<?php } ?>
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>Viewspecificationmaster" class="btn blue" target="_blank">
									<i class="fa fa-pencil"></i> Add Specification
								</a>
								<?php } ?>
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>Addlabparametermaster" class="btn green">
									<i class="fa fa-pencil"></i> Parameter Mapping
								</a>
								<?php } ?>
								<!-- <div class="btn-group">
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
								</div> -->
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 Sr. No.
								</th>
								<th>
									 Specification
								</th>
								<th style="width:30%">
									 Method Name
								</th>
								<?php /*<th style="width:10%">
									 Min
								</th>
								<th style="width:10%">
									 Max
								</th>*/?>
								<th style="width:10%">
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
								<?php } */?>
							</tr>
							</thead>
							<tbody>
							<?php	
							$rows = @$this->data['parameters_data'];
							$i = 1;
							if (!empty($rows)) {
							foreach($rows as $parameters_data){
							?>
						    <tr class="odd gradeX">
						    	<td>
									 <?php echo $i; ?>
								</td>
								<td>
									 	<?php /*<a href="<?php echo BASE_PATH; ?>fullviewparametersmaster?id=<?php echo base64_encode($parameters_data['id']); ?>"><?php echo $parameters_data['group_name']; ?></a> */ ?>
									 	<?php echo $parameters_data['group_name']; ?>
								</td>
								<td>
									 <?php /*<a href="<?php echo BASE_PATH; ?>fullviewparametersmaster?id=<?php echo base64_encode($parameters_data['id']); ?>"><?php echo $parameters_data['method_name']; ?></a>*/ ?>
									 <?php echo @$parameters_data['method_name']; ?>
									 <?php #echo $this->data['lab_params'][$parameters_data['id']]['method_name']; ?>
								</td>
								<?php /*<td>
										<?php echo $parameters_data['min']; ?>
								</td>
								<td>
									    <?php echo $parameters_data['max']; ?>
								</td>*/?>
								<td>
									<?php if ($parameters_data['status']==1) { echo 'Active'; } else { echo 'Deactive';} ?>
								</td>								
								<?php if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<td>
									<span class="label label-sm label-success">
										 <a href="<?php echo BASE_PATH; ?>Editlabparametermaster?id=<?php echo base64_encode($parameters_data['id']); ?>"  style="color:#fff">Edit</a>
									</span>
								</td>
								<?php } ?>
								<?php /* if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<td>
									<span class="label label-sm label-danger">
										 <a href="<?php echo BASE_PATH; ?>Dellabparametermaster?id=<?php echo base64_encode($parameters_data['id']); ?>"  style="color:#fff">Delete</a>
									</span>
								</td>
								<?php } */ ?>
							</tr>	

							<?php
							$i++;
						    }
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
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

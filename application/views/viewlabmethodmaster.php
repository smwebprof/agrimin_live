<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Lab Method Master
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
							    Lab Parameter Master
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								View Lab Method Master
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
					<?php if (@$_GET['msg']==2) { echo '<font size="3" color="red">Data cannot be deleted as File is linked to it. !!!</font>'; } ?>
					<?php if (@$_GET['msg']==3) { echo '<font size="3" color="red">This Company has been deactivated!!!</font>'; } ?>  
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View Lab Method Master
							</div>
							<div class="actions">
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>Viewspecificationmaster" class="btn blue" target="_blank">
									<i class="fa fa-pencil"></i> Add Specifications
								</a>
								<?php } ?>
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>Viewlabparametermaster" class="btn blue" target="_blank">
									<i class="fa fa-pencil"></i> Add Parameter
								</a>
								<?php } ?>
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>addlabmethodmaster" class="btn green">
									<i class="fa fa-pencil"></i> Add New Method
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
									 Method Name
								</th>
								<th>
									 Status
								</th>
								<?php if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<th>
									 Edit
								</th>
								<?php } ?>
								<?php /* if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<th>
									 Delete
								</th>
								<?php } */ ?>
							</tr>
							</thead>
							<tbody>
							<?php	
							$rows = $this->data['method_data'];
							$i = 1;
							foreach($rows as $method_data){
							?>
						    <tr class="odd gradeX">
						    	<td>
									 <?php echo $i; ?>
								</td>
								<td>
									 <?php /*<a href="<?php echo BASE_PATH; ?>Fullvilewlabmethodmaster?id=<?php echo base64_encode($method_data['id']); ?>"><?php echo $method_data['method_name']; ?></a>*/ ?>
									 <?php echo $method_data['method_name']; ?>
								</td>
								<td>
									<?php if ($method_data['status']==1) { echo 'Active'; } else { echo 'Deactive';} ?>
								</td>
								<?php if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<td>
									<span class="label label-sm label-success">
										 <a href="<?php echo BASE_PATH; ?>Editlabmethodmaster?id=<?php echo base64_encode($method_data['id']); ?>"  style="color:#fff">Edit</a>
									</span>
								</td>
								<?php } ?>
								<?php /* if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<td>
									<span class="label label-sm label-danger">
										 <a href="<?php echo BASE_PATH; ?>Dellabmethodmaster?id=<?php echo base64_encode($method_data['id']); ?>"  style="color:#fff">Delete</a>
									</span>
								</td>
								<?php } */ ?>
							</tr>	

							<?php
							$i++;
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

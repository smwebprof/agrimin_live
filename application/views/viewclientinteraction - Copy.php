
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View Client Interaction Forms
							</div>
							<div class="actions">
								<a href="<?php echo BASE_PATH; ?>newclientinteraction" class="btn blue">
									<i class="fa fa-pencil"></i> Add New Client Interaction
								</a>
								<a href="<?php echo BASE_PATH; ?>addclientinteraction" class="btn red">
									<i class="fa fa-pencil"></i> Add Existing Client Interaction
								</a>
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
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 Interaction Date
								</th>
								<th>
									 Location Interaction
								</th>
								<th>
									 Phone Interaction
								</th>
								<th>
									 Edit
								</th>
							</tr>
							</thead>
							<tbody>
							<?php	
							$rows = $this->data['interaction_data'];

							foreach($rows as $interaction_data){
							?>
						    <tr class="odd gradeX">
								<td>
									 <?php echo $interaction_data['interaction_date']; ?>
								</td>
								<td>
									<a href="<?php echo BASE_PATH; ?>fullviewclientinteraction?id=<?php echo $interaction_data['id']; ?>"><?php echo $interaction_data['location_interaction']; ?></a>
								</td>
								<td>
									<?php echo $interaction_data['phone_interaction']; ?>
								</td>
								<td>
									<span class="label label-sm label-success">
										 <a href="<?php echo BASE_PATH; ?>editclientinteraction?id=<?php echo $interaction_data['id']; ?>">Edit</a>
									</span>
									&nbsp;&nbsp;/&nbsp;&nbsp;
									<span class="label label-sm label-info">
										 <a href="<?php echo BASE_PATH; ?>delclientinteraction?id=<?php echo $interaction_data['id']; ?>">Delete</a>
									</span>
								</td>

							</tr>	

							<?php
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

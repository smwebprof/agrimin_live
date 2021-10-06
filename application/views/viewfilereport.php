<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					View File Report
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
								View File Report
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
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View File Report
							</div>
							<div class="actions">
								<?php /*if ($this->data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>AddInvoicefileregister" class="btn blue">
									<i class="fa fa-pencil"></i> Add New Invoice
								</a>
								<?php } */?>
								
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
									 Sr.No.
								</th>
								<th>
									 File No
								</th>
								<th>
									 File Date
								</th>
								<th>
									 File Type
								</th>
								<th>
									 Client Name
								</th>
								<th>
									 Nomination Date
								</th>
								<th>
									 Type of Job
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
								<th>
									 Status
								</th>
								<?php if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<th>
									 View
								</th>
								<?php } ?>
								
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
									 <?php echo $i; ?>
								</td>
								<td>
									<?php echo $file_data['file_no']; ?>
								</td>								
								<td>
									 <?php echo date("d-m-Y", strtotime($file_data['file_creation_date'])); ?>
								</td>
								<td>
     								<?php echo $file_data['file_no_type']; ?>
								</td>
								<td>
     								<?php echo $file_data['client_name']; ?>
								</td>
								<td>
									<?php echo date("d-m-Y", strtotime($file_data['nomination_date'])); ?>
								</td>
								<td class="center">
     								<?php echo $file_data['import_export']; ?>
								</td>
								<td class="center">
     								<?php echo $file_data['scope_of_services']; ?>
								</td>
								<td class="center">
     								<?php echo $file_data['cargo_group']; ?>
								</td>
								<td class="center">
     								<?php echo $file_data['vessel_name']; ?>
								</td>
								<td class="center">
     								<?php echo $file_data['status']; ?>
								</td>
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<td>
									<span class="label label-sm label-success">
										 <?php if ($file_data['file_no_type']=='Single') { ?>
										 <a href="<?php echo BASE_PATH; ?>fullviewfileregister?id=<?php echo base64_encode($file_data['id']); ?>"  style="color:#fff">View Reports</a>
										<?php } ?>
										<?php if ($file_data['file_no_type']=='Multiple') { ?>
										 <a href="<?php echo BASE_PATH; ?>fullviewfileregistermult?id=<?php echo base64_encode($file_data['id']); ?>"  style="color:#fff">View Reports</a>
										<?php } ?>
										<?php if ($file_data['file_no_type']=='Inspection') { ?>
										 <a href="<?php echo BASE_PATH; ?>fullviewfileregisterinsp?id=<?php echo base64_encode($file_data['id']); ?>"  style="color:#fff">View Reports</a>
										<?php } ?>
									</span>
								</td>
								<?php } ?>
								
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

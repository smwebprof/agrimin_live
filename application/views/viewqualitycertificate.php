<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					View Certificates
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
								Certificates
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								View Certificates
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
					<?php if (@$_GET['msg']==1) { echo '<font size="3" color="red">Certificate Data Saved Successfully</font>'; } ?>
					<?php if (@$_GET['msg']==2) { echo '<font size="3" color="red">Certificate is Cancelled!!!</font>'; } ?>
					<?php if (@$_GET['msg']==3) { echo '<font size="3" color="red">Data Saved Successfully!!!</font>'; } ?>
					<?php if (@$_GET['msg']==4) { echo '<font size="3" color="red">Certificate in Draft mode Cannot be Cancelled!!!</font>'; } ?>
					<?php if (@$_GET['msg']==5) { echo '<font size="3" color="red">Certificate Data Already Exist!!!</font>'; } ?>
				</div>
			</div>
			<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View Certificates
							</div>
							<div class="actions">
								<?php /*
								if ($this->data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>AddInvoicefileregister" class="btn blue">
									<i class="fa fa-pencil"></i> Add New Certificate
								</a>
								<?php } */ ?>
								
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
									 File Type
								</th>
								<th>
									 Certificate No
								</th>
								<th>
									 Certificate Date
								</th>
								<th>
									 Status
								</th>
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<th>
									 Action
								</th>
								<th>
									 Download Certificate
								</th>
								<?php } ?>
								<?php /*if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<th>
									 Edit / Cancel
								</th>
								<?php } ?>
								<?php /*if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<th>
									 Cancel
								</th>
								<?php } */?>
							</tr>
							</thead>
							<tbody>
							<?php	
							$rows = $this->data['invoice_data'];
							$i=1;
							foreach($rows as $invoice_data){
							#if (@$this->data['invoice_details'][$invoice_data['file_no']] != 'Final') {	
							?>
						    <tr class="odd gradeX">
						    	<td>
									 <?php echo $i; ?>
								</td>
								<td>
									<?php /*if (!empty(base64_encode(@$this->data['cert_data'][$invoice_data['id']]['cert_id']))) {  ?>
									<a href="<?php echo BASE_PATH; ?>fullviewqualitycertificate?id=<?php echo base64_encode(@$this->data['cert_data'][$invoice_data['id']]['cert_id']); ?>"><?php echo $invoice_data['file_no']; ?></a>
								    <?php } else {  ?>
								    	<?php echo $invoice_data['file_no']; ?></a>
								    <?php }  */?>
								    <?php echo $invoice_data['file_no']; ?>	
								</td>
								<td>
									<?php echo $invoice_data['file_no_type']; ?>
								</td>
								<td>
									<?php echo $invoice_data['certificate_no']; ?> 
								</td>
								<td>
     								<?php echo $invoice_data['certificate_date']; ?>
								</td>
								<td class="center">
     								<?php echo @$this->data['cert_data'][$invoice_data['id']]['status']; ?>
								</td>				
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<td>
								<?php if (@$this->data['invoice_details'][$invoice_data['file_no']] != 'Final') { ?>    
									    <?php if (@$this->data['cert_data'][$invoice_data['id']]['status'] != 'Final') { ?>
									    <?php if (@$this->data['cert_data'][$invoice_data['id']]['status']=='Draft') { ?>
										<span class="label label-sm label-info">
											<a href="<?php echo BASE_PATH; ?>editqualitycertificate?id=<?php echo base64_encode(@$this->data['cert_data'][$invoice_data['id']]['cert_id']); ?>"  style="color:#fff">Edit</a>
										</span>
										<?php } else { ?>
											<span class="label label-sm label-success">
											<a href="<?php echo BASE_PATH; ?>addqualitycertificate?id=<?php echo base64_encode($invoice_data['id']); ?>"  style="color:#fff">Add New</a>
											</span>
										<?php } ?>
										<?php } ?>	
								<?php } ?>
								</td>
								<?php } ?>
								<td>
									 <?php if (@$this->data['cert_data'][$invoice_data['id']]['status'] == 'Final') { ?>
									 <span class="label label-sm label-success">
											<a href="<?php echo BASE_PATH; ?>Downloadqualitycertificate?id=<?php echo base64_encode(@$this->data['cert_data'][$invoice_data['id']]['cert_id']); ?>"  style="color:#fff" target="_blank"> Download</a>
											</span>
									 <?php } ?> 
								</td>
								<?php /*
								<?php if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<td>
									<?php if ($invoice_data['invoice_type'] != 'Final') { ?>
									<?php if ($invoice_data['status'] != 'Closed') { ?>
									<span class="label label-sm label-success">
										 <a href="<?php echo BASE_PATH; ?>EditInvoicefileregister?id=<?php echo base64_encode($invoice_data['id']); ?>"  style="color:#fff">Edit</a>
									</span>
									<?php echo '&nbsp;/';  } ?>
									<?php } ?>
									<?php if ($invoice_data['invoice_type'] != 'Final') { ?>
									<?php if ($invoice_data['status'] != 'Closed') { ?>
									<span class="label label-sm label-danger">
										 <a href="<?php echo BASE_PATH; ?>Delinvoicefileregister?id=<?php echo base64_encode($invoice_data['id']); ?>"  style="color:#fff">Cancel</a>
									</span>
									<?php } ?>
									<?php } ?>
								</td>
								<?php } ?>
								<?php /*if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<td>
									<?php if ($invoice_data['status'] != 'Closed') { ?>
									<span class="label label-sm label-danger">
										 <a href="<?php echo BASE_PATH; ?>DelInvoicefileregister?id=<?php echo base64_encode($invoice_data['id']); ?>"  style="color:#fff">Cancel</a>
									</span>
									<?php } ?>
								</td>
								<?php } */ ?>
							</tr>	
							<?php #} ?>
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
		</form>	
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					View Proforma Invoice
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
								Invoices
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								View Proforma Invoice
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
					<?php if (@$_GET['msg']==2) { echo '<font size="3" color="red">Invoice is Cancelled!!!</font>'; } ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View Invoices
							</div>
							<div class="actions">
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>Addproformainvoice" class="btn blue">
									<i class="fa fa-pencil"></i> Add Proforma Invoice
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
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 Sr.No.
								</th>
								<th>
									 Client Name
								</th>
								<th>
									 Invoice Date
								</th>
								<th>
									 Contact Name
								</th>
								<th>
									 Inspection Start Date
								</th>
								<th>
									 Inspection End Date
								</th>
								<th>
									 Vessel Name
								</th>
								<th>
									 Scope of Services
								</th>
								<th>
									 Cargo Group
								</th>
								<th>
									 Status
								</th>
								<?php if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<th>
									 Edit / Cancel
								</th>
								<?php } ?>
								<?php /* if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<th>
									 Edit Existing
								</th>
								<?php } */ ?>
								<?php /* if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<th>
									 Delete
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
									 <a href="<?php echo BASE_PATH; ?>Fullviewproformainvoice?id=<?php echo base64_encode($invoice_data['id']); ?>"><?php echo $invoice_data['client_name']; ?></a>
								</td>
								<td>
     								<?php echo $invoice_data['invoice_date']; ?>
								</td>
								<td>
     								<?php echo $invoice_data['kind_attention']; ?>
								</td>
								<td>
									<?php echo $invoice_data['inspection_start_date']; ?>
								</td>
								<td class="center">
     								<?php echo $invoice_data['inspection_end_date']; ?>
								</td>
								<td class="center">
     								<?php echo $invoice_data['vessel_name']; ?>
								</td>
								<td class="center">
     								<?php echo $invoice_data['scope_of_services']; ?>
								</td>
								<td class="center">
     								<?php echo $invoice_data['cargo_group_name']; ?>
								</td>
								<td class="center">
     								<?php echo $invoice_data['status']; ?>
								</td>
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<td>
									<?php if ($invoice_data['status'] != 'Closed') { ?>
									<span class="label label-sm label-success">
										 <a href="<?php echo BASE_PATH; ?>Editproformainvoice?id=<?php echo base64_encode($invoice_data['id']); ?>"  style="color:#fff">Edit</a>
									</span>
									<?php echo '&nbsp;/';  } ?>
									<?php if ($invoice_data['status'] != 'Closed') { ?>
									<span class="label label-sm label-danger">
										 <a href="<?php echo BASE_PATH; ?>Delproformainvoice?id=<?php echo base64_encode($invoice_data['id']); ?>"  style="color:#fff">Cancel</a>
									</span>
									<?php } ?>
								</td>
								<?php } ?>
								<?php /* if ($this->data['access_right']['edit_rights'] == 1) { ?>
								
								<td>
									<?php if ($invoice_data['status'] != 'Closed') { ?>
									<?php if (!empty($invoice_data['payment_id'])) { ?>
									<?php if (!isset($this->data['invoice_data'][0]['invoice_balane_amt'])) { ?>		
									<span class="label label-sm label-success">
										 <a href="<?php echo BASE_PATH; ?>Editinvoicepaymentregister?id=<?php echo base64_encode($invoice_data['payment_id']); ?>"  style="color:#fff">Edit Existing</a>
									</span>
									<?php } ?>
									<?php } ?>
									<?php } ?>
								</td>
								<?php } */ ?>
								<?php /* if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<td>
									<?php if ($invoice_data['status'] != 'Closed') { ?>
									<span class="label label-sm label-danger">
										 <a href="<?php echo BASE_PATH; ?>DelInvoicefileregister?id=<?php echo base64_encode($invoice_data['id']); ?>"  style="color:#fff">Cancel</a>
									</span>
									<?php } ?>
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

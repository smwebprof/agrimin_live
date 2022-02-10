<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					View Invoice Payment
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
								View Invoice Payment
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
					<?php if (@$_GET['msg']==1) { echo '<font size="3" color="red">Invoice Payment Updated Successfully!!!</font>'; } ?>
					<?php if (@$_GET['msg']==2) { echo '<font size="3" color="red">Invoice Payment Entry is Cancelled!!!</font>'; } ?>	
				</div>
			</div>
			<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View Invoices
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
							<div class="table-toolbar">
								<div class="btn-group">
									<label class="control-label col-md-3">From Invoice Date</label>
									<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-2y">
									<input type="text" class="form-control" name="invoice_from_date" id="invoice_from_date" value="<?php if (@$this->data['invoice_from_date']) { echo $this->data['invoice_from_date']; } /* else { echo date('d-m-Y'); }*/ ?>"readonly>
									<span for="invoice_from_date" class="help-block"></span>
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
									</div>
								</div>
								<div class="btn-group">
									<label class="control-label col-md-3">To Invoice Date</label>
									<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m">
									<input type="text" class="form-control" name="invoice_to_date" id="invoice_to_date" value="<?php if (@$this->data['invoice_to_date']) { echo $this->data['invoice_to_date']; } /* else { echo date('d-m-Y'); } */ ?>"readonly>
									<span for="invoice_to_date" class="help-block"></span>
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
									</div>
								</div>
								<div class="btn-group">
									<label class="control-label col-md-6">Invoice Type</label>
									<div class="input-group">
									<select class="form-control" id="invoice_type" name="invoice_type">
										<option value ="">Select</option>
										<?php /*<option value ="Draft" <?php if (@$this->data['invoice_type'] == 'Draft') { echo 'selected'; } ?>>Draft</option>*/?>
										<option value ="Final" <?php if (@$this->data['invoice_type'] == 'Final') { echo 'selected'; } ?>>Final</option>
									</select>
									</div>							
								</div>&nbsp;&nbsp;&nbsp;
								<div class="btn-group">
									<label class="control-label col-md-6">Invoice Status</label>
									<div class="input-group">
									<select class="form-control" id="status" name="status">
										<option value ="">Select</option>
										<option value ="Open" <?php if (@$this->data['status'] == 'Open') { echo 'selected'; } ?>>Open</option>
										<option value ="Closed" <?php if (@$this->data['status'] == 'Closed') { echo 'selected'; } ?>>Closed</option>
										<?php /*<option value ="Cancelled" <?php if (@$this->data['status'] == 'Cancelled') { echo 'Cancelled'; } ?>>Cancelled</option>*/?>
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
											<td><label class="control-label col-md-12">Client Name</label>
											</td>	
											<td><select class="form-control input-large select2me" data-placeholder="Select..." name="clients_name" id="clients_name">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['clients_data'];

													                foreach($rows as $clients_data){ 
													                	/*echo '<option value='.$clients_data["id"].'>'.$clients_data["client_name"].'</option>';*/
													                	if (@$this->data['clients_name']==$clients_data["id"]) {
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
											<td><label class="control-label col-md-12">File Type</label>
											</td>	
											<td><select class="form-control input-small select2me" data-placeholder="Select..." name="file_no_type" id="file_no_type">
											<option value ="">Select</option>
											<option value ="Single" <?php if (@$this->data['file_no_type'] == 'Single') { echo 'selected'; } ?>>Single</option>
											<option value ="Multiple" <?php if (@$this->data['file_no_type'] == 'Multiple') { echo 'selected'; } ?>>Multiple</option>
											<option value ="Inspection" <?php if (@$this->data['file_no_type'] == 'Inspection') { echo 'selected'; } ?>>Inspection</option>
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
									 Invoice No
								</th>
								<th>
									 Invoice Date
								</th>
								<th>
									 File Type
								</th>
								<th>
									 Payment Entry Date
								</th>
								<th>
									 Invoice Amount
								</th>
								<th>
									 Invoice Received Amount
								</th>
								<?php /*<th>
									 Balance Amount
								</th>*/?>
								<th>
									 Status
								</th>
								<?php if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<th>
									 Add New
								</th>
								<?php } ?>
								<?php /* if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<th>
									 Edit Existing
								</th>
								<?php } */ ?>
								<?php if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<th>
									 Delete
								</th>
								<?php } ?>
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
									 <?php if (!empty($invoice_data['payment_id'])) { ?>
									 <a href="<?php echo BASE_PATH; ?>fullviewinvoicepayment?id=<?php echo base64_encode($invoice_data['payment_id']); ?>"><?php echo $invoice_data['invoice_no']; ?></a>
									 <?php } else { ?>
									 	<?php echo $invoice_data['invoice_no']; ?>
									 <?php } ?>	
								</td>
								<td>
     								<?php echo $invoice_data['invoice_date']; ?>
								</td>
								<td>
     								<?php echo $invoice_data['file_no_type']; ?>
								</td>
								<td>
     								<?php echo $invoice_data['payment_date']; ?>
								</td>
								<td>
									<?php echo number_format((float)$invoice_data['invoice_amt'], 2, '.', ''); ?>
								</td>
								<td class="center">
     								<?php echo number_format((float)$invoice_data['invoice_rec_amt'], 2, '.', ''); ?>
								</td>
								<?php /*<td class="center">
     								<?php echo number_format((float)$invoice_data['invoice_balane_amt'], 2, '.', ''); ?>
								</td>*/ ?>
								<td class="center">
     								<?php echo $invoice_data['status']; ?>
								</td>
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<td>
									<?php if ($invoice_data['status'] != 'Closed') { ?>
									<?php #if (!isset($this->data['invoice_data'][0]['invoice_balane_amt'])) { ?>	
									<span class="label label-sm label-success">
										 <a href="<?php echo BASE_PATH; ?>Addinvoicepaymentregister?id=<?php echo base64_encode($invoice_data['id']); ?>"  style="color:#fff">Add New</a>
									</span>
									<?php #} ?>
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
								<td>
									<?php if ($invoice_data['id'] == @$invoice_data['payment_invoice_no']) { ?>
									<?php if ($this->data['access_right']['delete_rights'] == 1) { ?>
									<?php if ($invoice_data['status'] != 'Closed') { ?>
									<span class="label label-sm label-danger">
										 <a href="<?php echo BASE_PATH; ?>Delinvoicepaymentregister?id=<?php echo base64_encode($invoice_data['payment_id']); ?>"  style="color:#fff">Delete</a>
									</span>
									<?php } ?>
									<?php } ?>
									<?php } ?>
								</td>	
									
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
					            <th></th>
					            <th>Total Amount : </th>
					            <th><?php echo $this->data['total_inv_amt']; ?></th>
					            <th><?php echo $this->data['tot_inv_rec_amt']; ?></th>
					            <th></th>
					            <th></th>
					            <th></th>
					         </tr>
					    	</tfoot>
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

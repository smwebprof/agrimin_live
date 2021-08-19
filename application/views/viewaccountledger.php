<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Account Ledger List
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
								Accounts
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								View Account Ledger List
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
					<?php if (@$_GET['msg']==2) { echo '<font size="3" color="red">Account Ledger Deactivated!!!</font>'; } ?>
				</div>
			</div>
			<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View Account Ledger List
							</div>
							<div class="actions">
								<?php if ($this->data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>addaccountledger" class="btn blue">
									<i class="fa fa-pencil"></i> Add New
								</a>
								<?php } ?>
								<a href="<?php echo BASE_PATH; ?>uploads/Ledger_Data_Upload.csv" class="btn yellow">
									<i class="fa fa-pencil"></i> Sample Report
								</a>
								<a href="<?php echo BASE_PATH; ?>Uploadledgerdata" class="btn green">
									<i class="fa fa-pencil"></i> Upload Report
								</a>
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
							<div class="table-toolbar">
								<div class="btn-group">
									<label class="control-label col-md-3">From Date</label>
									<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-2y">
									<input type="text" class="form-control" name="ledger_from_date" id="ledger_from_date" value="<?php if (@$this->data['ledger_from_date']) { echo $this->data['ledger_from_date']; } /* else { echo date('d-m-Y'); }*/ ?>"readonly>
									<span for="ledger_from_date" class="help-block"></span>
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
									</div>
								</div>
								<div class="btn-group">
									<label class="control-label col-md-3">To Date</label>
									<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m">
									<input type="text" class="form-control" name="ledger_to_date" id="ledger_to_date" value="<?php if (@$this->data['ledger_to_date']) { echo $this->data['ledger_to_date']; } /* else { echo date('d-m-Y'); } */ ?>"readonly>
									<span for="ledger_to_date" class="help-block"></span>
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
									</div>
								</div>
								<div class="btn-group">
									<table>
										<tr>
											<td><label class="control-label col-md-12">Vendor Name</label>
											</td>	
											<td><select class="form-control input-large select2me" data-placeholder="Select..." name="vendor_name" id="vendor_name">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['vendor_data'];

													                foreach($rows as $vendor_data){ 
													                	if (@$this->data['vendor_name']==$vendor_data["id"]) {
													                		echo '<option value='.$vendor_data["id"].' selected>'.$vendor_data["vendor_name"].'</option>';
													                	} else {
													                		echo '<option value='.$vendor_data["id"].'>'.$vendor_data["vendor_name"].'</option>';
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
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 Sr. No
								</th>
								<th>
									 Vendor Name
								</th>
								<th>
									 Ledger Date
								</th>
								<th>
									 ACI-Invoice No
								</th>
								<th>
									 ACI-Invoice Amount
								</th>
								<th>
									 Narration
								</th>
								<th>
									 Ledger Number
								</th>
								<?php /*<th>
									 Ledger Type
								</th>
								<th>
									 Ledger Amount
								</th>*/ ?>
								<th>
									 Credit Amount
								</th>
								<th>
									 Debit Amount
								</th>
								<th>
									 Balance Amount
								</th>
								<?php if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<th>
									 Edit
								</th>
								<?php }  ?>
								<?php /*if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<th>
									 Delete
								</th>
								<?php }*/ ?>
							</tr>
							</thead>
							<tbody>
							<?php	
							$rows = $this->data['ledger_data'];
							$i = 1;
							foreach($rows as $ledger_data){
							?>
						    <tr class="odd gradeX">
						    	<td>
									 <?php echo $i; ?>
								</td>
								<td>
									 <?php echo $ledger_data['vendor']; ?>
								</td>
								<td>
									 <?php echo date('d-m-Y',strtotime($ledger_data['vendor_date']));?>
								</td>
								<td>
									 <?php echo $ledger_data['invoice_no']; ?>
								</td>
								<td>
									 <?php echo $ledger_data['invoice_amt']; ?>
								</td>
								<td>
									 <?php echo $ledger_data['narration']; ?>
								</td>
								<td>
									 <?php echo $ledger_data['ledger_number']; ?>
								</td>
								<?php /*<td>
									 <?php echo $ledger_data['ledger_type']; ?>
								</td>
								<td>
									 <?php echo $ledger_data['ledger_amount']; ?>
								</td>*/ ?>
								<td>
									 <?php echo $ledger_data['credit_amount']; ?>
								</td>
								<td>
									 <?php echo $ledger_data['debit_amount']; ?>
								</td>
								<td>
									 <?php echo $ledger_data['balance_amount']; ?>
								</td>
								<?php if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<td>
									<?php if ($ledger_data['status'] != 'Closed') { ?>
									<span class="label label-sm label-success">
										 <?php /*<a href="<?php echo BASE_PATH; ?>editaccountledger?id=<?php echo base64_encode($ledger_data['id']); ?>&t=<?php echo $ledger_data['ledger_type']; ?>"  style="color:#fff">Edit</a>*/?>
										 <a href="<?php echo BASE_PATH; ?>editaccountledger?id=<?php echo base64_encode($ledger_data['vendor_name']); ?>"  style="color:#fff">Edit</a>
									</span>
									<?php } ?>
								</td>
								<?php } ?>
								<?php /*if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<td>
									<span class="label label-sm label-danger">
										 <a href="<?php echo BASE_PATH; ?>Delaccountledger?id=<?php echo base64_encode($ledger_data['id']); ?>"  style="color:#fff">Delete</a>
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
			</form>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

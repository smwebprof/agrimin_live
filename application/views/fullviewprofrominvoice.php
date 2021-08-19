
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Invoice Report (Full View)
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
							<a href="<?php echo BASE_PATH; ?>viewinteractionreport">
								Reports
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Proforma Invoice - Full View
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
					<div class="tabbable tabbable-custom boxless tabbable-reversed">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_0" data-toggle="tab">
									 Proforma Invoice
								</a>
							</li>
							<!--<li>
								<a href="#tab_1" data-toggle="tab">
									 2 Columns
								</a>
							</li>
							<li>
								<a href="#tab_2" data-toggle="tab">
									 2 Columns Horizontal
								</a>
							</li>
							<li>
								<a href="#tab_3" data-toggle="tab">
									 2 Columns View Only
								</a>
							</li>
							<li>
								<a href="#tab_4" data-toggle="tab">
									 Row Seperated
								</a>
							</li>
							<li>
								<a href="#tab_5" data-toggle="tab">
									 Bordered
								</a>
							</li>
							<li>
								<a href="#tab_6" data-toggle="tab">
									 Row Stripped
								</a>
							</li>
							<li>
								<a href="#tab_7" data-toggle="tab">
									 Label Stripped
								</a>
							</li>-->
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_0">
								<!-- Start PORTLET-->
								<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Proforma Invoice - Full View
							</div>
							<!--<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>-->
							<div class="actions">								
								<a href="<?php echo BASE_PATH; ?>Viewproformainvoice" class="btn blue">
									<i class="fa fa-pencil"></i>View Proforma Invoices
								</a>
								<?php if ($_SESSION['country_code']=='CH')  { ?>
								<a href="<?php echo BASE_PATH; ?>Fullviewperfinvoicefilereportpdf_CH?id=<?php echo base64_encode($this->data['id']); ?>" class="btn green" target="_blank">
									<i class="fa fa-pencil"></i>Proforma Invoice Report
								</a>
								<?php } else { ?>
								<a href="<?php echo BASE_PATH; ?>Fullviewperfinvoicefilereportpdf?id=<?php echo base64_encode($this->data['id']); ?>" class="btn green" target="_blank">
									<i class="fa fa-pencil"></i>Proforma Invoice Report
								</a>
								<?php } ?>					
								<!--<a href="#" class="btn red">
									<i class="fa fa-pencil"></i> Print To PDF 
								</a>-->
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
						<?php $rows = $this->data['invoice_data'];
											
						foreach($rows as $invoice_data){

						?>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td width="50%">
									 <strong>Client</strong>
								</td>
								<td>
									<?php echo $invoice_data['client_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Invoice Date</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_date']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Address</strong>
								</td>
								<td>
									<?php echo $invoice_data['client_address']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Postal Code</strong>
								</td>
								<td>
									<?php echo $invoice_data['client_postal_code']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Country</strong>
								</td>
								<td>
									<?php echo $invoice_data['client_country']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>State</strong>
								</td>
								<td>
									<?php echo $invoice_data['client_state']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>City</strong>
								</td>
								<td>
									<?php echo $invoice_data['client_city']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>VAT No</strong>
								</td>
								<td>
									<?php echo $invoice_data['client_vat']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Kind Attention</strong>
								</td>
								<td>
									<?php echo $invoice_data['kind_attention']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Inspection Start Date</strong>
								</td>
								<td>
									<?php echo $invoice_data['inspection_start_date']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Inspection End Date</strong>
								</td>
								<td>
									<?php echo $invoice_data['inspection_end_date']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Bill Of Lading Number</strong>
								</td>
								<td>
									<?php echo $invoice_data['bill_lading_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Bill Of Lading Date</strong>
								</td>
								<td>
									<?php echo $invoice_data['bill_lading_date']; ?>
								</td>
							</tr>
							</table>
						</div>
					</div>
					<!-- END PORTLET-->


					<!-- Start PORTLET-->
								<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>File Parameters
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td width="50%">
									 <strong>Vessel Name</strong>
								</td>
								<td>
									<?php echo $invoice_data['vessel_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Voyage No</strong>
								</td>
								<td>
									<?php echo $invoice_data['voyage_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Scope of Services</strong>
								</td>
								<td>
									<?php echo $invoice_data['scope_of_services']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>File Instructions</strong>
								</td>
								<td>
									<?php
									$rows = $this->data['instructions'];
									foreach($rows as $instructions){ 
										if ($invoice_data['file_instructions']==$instructions["id"]) { 
											echo $instructions["description"];
										}
									}
									?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Remarks</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_remarks']; ?>
								</td>
							</tr>
							</table>
						</div>
					</div>
					<!-- END PORTLET-->

					<!-- Start PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Cargo Details
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-bordered table-hover">
								<tr>
								<td width="50%">
									 <strong>Cargo Details</strong>
								</td>
								<td>
								<?php
									$cargo_group = $this->data['cargogroup'];
									foreach($cargo_group as $cargogroup){ 
									if ($invoice_data['cargo_group']==$cargogroup["id"]) {	
										echo $cargogroup["name"];
									}
									}		
								?>	
								</td>
								</tr>
							</table>
					</div>	

					<!-- Start PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Cargo Parameters
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-bordered table-hover">
															<thead>
															<tr>
																<th>
																	 Cargo
																</th>
																<th >
																	 Packing
																</th>
																<th>
																	 Quantity
																</th>
																<th>
																	 Unit
																</th>
																<th>
																	 Origin
																</th>
																<th>
																	 Load Port
																</th>
																<th>
																	 Discharge Port
																</th>
																<th>
																	 Place Of Attendance
																</th>
																<th>
																	 Rate per Qty
																</th>
																<th>
																	 Amount
																</th>
															</tr>
															</thead>
															<tbody>
															<?php foreach ($this->data['cargo_details'] as $k => $v) { ?>	
															<tr class="active">
																<td>
																	 <?php 	foreach ($this->data['cargo'] as $p => $q) { 
																	 	    if ($q['id']==$v['cargo_id']) { 
																	 	    	echo $q['commodity_name'];
																	 } } ?>		 
																</td>
																<td>
																	<?php 	foreach ($this->data['packing'] as $p => $q) { 
																	 	    if ($q['id']==$v['packing_id']) { 
																	 	    	echo $q['paking_name'];
																	 } } ?>
																</td>																	
																<td>
																	 <?php echo $v['approx_qty']; ?>
																</td>
																<td>
																	<?php 	foreach ($this->data['units'] as $p => $q) { 
																	 	    if ($q['id']==$v['approx_unit']) { 
																	 	    	echo $q['unit_name'];
																	 } } ?>
																</td>
																<td>
																	 <?php echo $v['origin']; ?>
																</td>
																<td>
																	 <?php echo $v['load_port']; ?>
																</td>
																<td>
																	 <?php echo $v['discharge_port']; ?>
																</td>
																<td>
																	 <?php echo $v['attendance_placed']; ?>
																</td>														
																<td>
																	 <?php echo $v['invoice_work_rate']; ?>
																</td>
																<td>
																	 <?php echo $v['invoice_work_amount']; ?>
																</td>
															</tr>
															<?php } ?>
															</tbody>
															</table>	
						</div>
					</div>
					<!-- END PORTLET-->

					<!-- Start PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Other Details
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-bordered table-hover">
															<thead>
															<tr>
																<th>
																	 Work Item
																</th>
																<th>
																	 Quantity
																</th>
																<th>
																	 Unit
																</th>
																<th>
																	 Rate per Qty
																</th>
																<th>
																	 Amount
																</th>
															</tr>
															</thead>
															<tbody>
															<?php foreach ($this->data['other_details'] as $k => $v) { ?>	
															<tr class="active">
																<td>
																	 <?php echo $v['cargo_id']; ?>
																</td>
																<td>
																	 <?php echo $v['approx_qty']; ?>
																</td>
																<td>
																	<?php 	foreach ($this->data['units'] as $p => $q) {
																	 	if ($q['id']==$v['approx_unit']) {
																	 		echo $q['unit_name'];
																	 	}
																	 } 
																	 ?>
																</td>												
																<td>
																	 <?php echo $v['invoice_work_rate']; ?>
																</td>
																<td>
																	 <?php echo $v['invoice_work_amount']; ?>
																</td>
															</tr>
															<?php } ?>
															</tbody>
															</table>	
						</div>
					</div>
					<!-- END PORTLET-->



					<!-- Start PORTLET-->
								<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Invoice Amount
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td>
									 <strong>Currency</strong>
								</td>
								<td>
									<?php
									$rows = $this->data['currency'];

										foreach($rows as $currency){ 
										if ($currency["id"]==$invoice_data['invoice_currency']) {
											echo $currency["currency"];
										}
									}
									?>		
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Exchange Rate</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_ex_rate']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Basic amount</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_basic_amt']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>VAT (%)</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_vat_percent']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Total Tax Amount</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_tax_amt']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Total Invoice Amount</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_amt']; ?>
								</td>
							</tr>
							</table>
						</div>
					</div>
					<!-- END PORTLET-->

					
					<!-- Start PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Invoice Generated By :
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td>
									 <strong>Created By :</strong>
								</td>
								<td>
									<?php echo @$invoice_data['fname']." ".@$invoice_data['lname'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Created On Date:</strong>
								</td>
								<td>
									<?php echo @date('d-m-Y',strtotime($invoice_data['entry_date'])) ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Modified By :</strong>
								</td>
								<td>
									<?php echo @$invoice_data['ename']." ".$invoice_data['elname'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Modified On Date:</strong>
								</td>
								<td>
									<?php echo @date('d-m-Y',strtotime($invoice_data['modify_date'])) ?>
								</td>
							</tr>
						
							</table>
						</div>
					</div>
					<!-- END PORTLET-->

					<?php
				    }
				    ?>


								</div>
		
								</div>
							</div>
							
							
							
							
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->


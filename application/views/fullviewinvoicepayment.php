
			
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
								Payment Receipt - Full View
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
									 Payment Receipt
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
								<i class="fa fa-reorder"></i>Payment Receipt - Full View
							</div>
							<!--<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>-->
							<div class="actions">
								<a href="<?php echo BASE_PATH; ?>Viewfileinvoicepayment" class="btn blue">
									<i class="fa fa-pencil"></i>View Payment Receipt
								</a>
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
									 <strong>Invoice No</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoiceno']; ?>
								</td>
							</tr>	
							<tr>
								<td width="50%">
									 <strong>Payment Date</strong>
								</td>
								<td>
									<?php echo $invoice_data['payment_date']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Client Name</strong>
								</td>
								<td>
									<?php echo $invoice_data['client_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Pay Mode</strong>
								</td>
								<td>
									<?php echo $invoice_data['pay_mode']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Cheque/Draft No</strong>
								</td>
								<td>
									<?php echo $invoice_data['cheque_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Cheque/Draft Date</strong>
								</td>
								<td>
									<?php echo $invoice_data['cheque_date']; ?>
								</td>
							</tr>

							<tr>
								<td>
									 <strong>Invoice Amount</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_amt']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Basic Amt</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_basic_amt']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Invoice Received Amount</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_rec_amt']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Other Charges</strong>
								</td>
								<td>
									<?php echo $invoice_data['other_charges']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Balance Amt</strong>
								</td>
								<td>
									<?php echo $invoice_data['invoice_balane_amt']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Vat Percentage</strong>
								</td>
								<td>
									<?php echo $invoice_data['vat_percent']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Vat Amount</strong>
								</td>
								<td>
									<?php echo $invoice_data['vat_amt']; ?>
								</td>
							</tr>
							<?php /*<tr>
								<td>
									 <strong>Other Deductions</strong>
								</td>
								<td>
									<?php echo $invoice_data['oth_dedcut']; ?>
								</td>
							</tr>*/ ?>
							<tr>
								<td>
									 <strong>Remarks</strong>
								</td>
								<td>
									<?php echo $invoice_data['remarks']; ?>
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
								<i class="fa fa-reorder"></i>Payment Receipt Generated By :
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td>
									 <strong>Created By :</strong>
								</td>
								<td>
									<?php echo $invoice_data['fname']." ".$invoice_data['lname'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Created On Date:</strong>
								</td>
								<td>
									<?php echo date('d-m-Y',strtotime($invoice_data['entry_date'])) ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Modified By :</strong>
								</td>
								<td>
									<?php echo $invoice_data['ename']." ".$invoice_data['elname'] ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Modified On Date:</strong>
								</td>
								<td>
									<?php echo date('d-m-Y',strtotime($invoice_data['modify_date'])) ?>
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


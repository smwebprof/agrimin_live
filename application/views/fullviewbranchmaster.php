
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Full View Branch Master
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
							<a href="<?php echo BASE_PATH; ?>viewbranchmaster">
								Branch Master
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Full View Branch Master
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
									 Full View Branch Master
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
								<i class="fa fa-reorder"></i>Branch Details
							</div>
							<!--<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>-->
							<div class="actions">
								<a href="<?php echo BASE_PATH; ?>viewbranchmaster" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Branch
									</span>
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
						<?php $rows = $this->data['branch_data'];
											
						foreach($rows as $branch_data){
						?>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td width="50%">
									 <strong>Company Name</strong>
								</td>
								<td>
									<select class="form-control" name="branch_company_name" id="branch_company_name">
																	<?php
													                $rows = $this->data['company_data'];

													                foreach($rows as $company_data){ 
													                	if ($branch_data['comp_id']==$company_data["id"]) {
													                		echo '<option value='.$company_data["id"].' selected>'.$company_data["name"].'</option>';
													                	} /*else {	
													                		echo '<option value='.$company_data["id"].'>'.$company_data["name"].'</option>';
													                	} */
													                }	
																	?>
																</select>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Branch Name</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['branch_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Branch Email</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['branch_email']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Branch Type</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['branch_type']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Certificate Prefix</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['certificate_prefix']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Address</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['address']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Country</strong>
								</td>
								<td>
									<select class="form-control" name="company_country" id="company_country">

																	<?php
													                $rows = $this->data['countries'];

													                foreach($rows as $countries){ 
													                    if ($branch_data['countryid']==$countries["id"]) {
													                    	echo '<option value='.$countries["id"].' selected>'.$countries["name"].'</option>';
													                    } /*else {
													                		echo '<option value='.$countries["id"].'>'.$countries["name"].'</option>';
													                    }*/

													                }	
																	?>
																</select>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>State</strong>
								</td>
								<td>
									<select class="form-control" name="company_state" id="company_state">
																<?php
													                $rows = $this->data['states'];

													                foreach($rows as $states){ 
													                    if ($branch_data['stateid']==$states["id"]) {
													                    	echo '<option value='.$states["id"].' selected>'.$states["name"].'</option>';
													                    } /*else {
													                		echo '<option value='.$states["id"].'>'.$states["name"].'</option>';
													                    }*/

													                }	
																?>
																</select>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>City</strong>
								</td>
								<td>
									<select class="form-control" name="company_city" id="company_city">
																<?php
													                $rows = $this->data['cities'];

													                foreach($rows as $cities){ 
													                    if ($branch_data['cityid']==$cities["id"]) {
													                    	echo '<option value='.$cities["id"].' selected>'.$cities["name"].'</option>';
													                    } 
													                }	
																?>
																</select>
								</td>
							</tr>

							<tr>
								<td>
									 <strong>Bank Name</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['bank_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Bank Branch Name</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['bank_branch_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Bank Address</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['bank_address']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Bank Account No</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['bank_account_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>IFSC Code</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['ifsc_code']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Primary Email</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['primary_email_id']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Secondary Email</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['secondary_email_id']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Invoice InCharge</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['invoice_incharge']; ?>
								</td>
							</tr>
							<?php if ($_SESSION['branch_name'] == 'India') { ?>
							<tr>
								<td>
									 <strong>GST_no</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['gst_no']; ?>
								</td>
							</tr>
							<?php } ?>
							<?php if ($_SESSION['branch_name'] != 'India') { ?>
							<tr>
								<td>
									 <strong>VAT No</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['vat_no']; ?>
								</td>
							</tr>
							<?php } ?>
							<tr>
								<td>
									 <strong>Telephone No</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['country_code']; ?> <?php echo $branch_data['tel_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Mobile No</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['country_code']; ?> <?php echo $branch_data['mobile_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Fax No</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['fax_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>IBAN</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['iban']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>BIC</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['bic']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Bank Clearing Number</strong>
								</td>
								<td>
									&nbsp;&nbsp;<?php echo $branch_data['bank_cleaing_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Bank Beneficiary</strong>
								</td>
								<td>
									<select class="form-control" name="bank_beneficiary" id="bank_beneficiary">
																	<?php
													                $rows = $this->data['company_data'];

													                foreach($rows as $company_data){ 
													                	if ($branch_data['comp_id']==$company_data["id"]) {
													                	echo '<option value='.$company_data["id"].' selected>'.$company_data["name"].'</option>';
													                	} 
													                }	
																	?>
																</select>
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


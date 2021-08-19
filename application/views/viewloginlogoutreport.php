<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					View Login/Logout Report
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
								View Login/Logout Report
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
					<?php if (@$_GET['msg']==2) { echo '<font size="3" color="red">Login/Logout Deactivated!!!</font>'; } ?>
				</div>
			</div>
			<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View Login/Logout Report
							</div>
							<div class="actions">
								<?php /* if ($this->data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>addaccountledger" class="btn blue">
									<i class="fa fa-pencil"></i> Add New
								</a>
								<?php } */ ?>
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
									<input type="text" class="form-control" name="login_from_date" id="login_from_date" value="<?php if (@$this->data['login_from_date']) { echo $this->data['login_from_date']; } /* else { echo date('d-m-Y'); }*/ ?>"readonly>
									<span for="login_from_date" class="help-block"></span>
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
									</div>
								</div>
								<div class="btn-group">
									<label class="control-label col-md-3">To Date</label>
									<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m">
									<input type="text" class="form-control" name="login_to_date" id="login_to_date" value="<?php if (@$this->data['login_to_date']) { echo $this->data['login_to_date']; } /* else { echo date('d-m-Y'); } */ ?>"readonly>
									<span for="login_to_date" class="help-block"></span>
									<span class="input-group-btn">
									<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
									</div>
								</div>
								<div class="btn-group">
									<table>
										<tr>
											<td><label class="control-label col-md-12">User Name</label>
											</td>	
											<td><select class="form-control input-large select2me" data-placeholder="Select..." name="user_name" id="user_name">
																	<option value=""></option>
																	<?php
													                $rows = $this->data['User_details'];

													                foreach($rows as $User_details){ 
													                	if (@$this->data['user_name']==$User_details["id"]) {
													                		echo '<option value='.$User_details["id"].' selected>'.$User_details["first_name"].'  '.$User_details["last_name"].'</option>';
													                	} else {
													                		echo '<option value='.$User_details["id"].'>'.$User_details["first_name"].' '.$User_details["last_name"].'</option>';
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
								<?php /*<div class="btn-group">
									<button type="submit" class="btn blue" name="submit" value="pdf">View PDF Report</button>
								</div>*/?>
								<div class="btn-group">
									<button type="submit" class="btn yellow" name="submit" value="excel">View Excel Report</button>
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
									 User Name
								</th>
								<th>
									 Login Date&Time
								</th>
								<th>
									 Logout Date&Time
								</th>
								<th>
									 Branch
								</th>
								<?php /*<th>
									 Ledger Type
								</th>
								<th>
									 Ledger Amount
								</th>
								<th>
									 Credit Amount
								</th>
								<th>
									 Debit Amount
								</th>
								<th>
									 Balance Amount
								</th>*/ ?>
								<?php /*if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<th>
									 Action
								</th>
								<?php } */ ?>
								<?php /*if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<th>
									 Delete
								</th>
								<?php }*/ ?>
							</tr>
							</thead>
							<tbody>
							<?php	
							$rows = $this->data['user_data'];
							$i = 1;
							foreach($rows as $user_data){
							?>
						    <tr class="odd gradeX">
						    	<td>
									 <?php echo $i; ?>
								</td>
								<td>
									 <?php echo @$user_data['first_name'].' '.@$user_data['last_name']; ?>
								</td>
								<td>
									 <?php 
									 	echo date('d-m-Y H:i:s',strtotime(@$user_data['login_date']));
									 ?>
								</td>
								<td>
									 <?php 
									 /*if (!empty(strtotime(@$user_data['logout_date']))) {
									 	#echo date('d-m-Y',strtotime(@$user_data['logout_date']));
									 	echo date('d-m-Y',strtotime(@$user_data['logout_date']));
									 } else {
									 	echo 'N.A.';
									 }*/
									 if (@$user_data['logout_date']=='0000-00-00 00:00:00') { echo 'Session Expire'; }  else { echo date('d-m-Y H:i:s',strtotime(@$user_data['logout_date'])); }
									 ?>
								</td>
								<td>
									 <?php echo @$user_data['branch_name']; ?>
								</td>
								<?php /*<td>
									 <?php echo $user_data['ledger_type']; ?>
								</td>
								<td>
									 <?php echo $user_data['ledger_amount']; ?>
								</td>*/ ?>
								<?php /*<td>
									 <?php echo $user_data['credit_amount']; ?>
								</td>
								<td>
									 <?php echo $user_data['debit_amount']; ?>
								</td>
								<td>
									 <?php echo $user_data['balance_amount']; ?>
								</td>*/ ?>
								<?php /*if ($this->data['access_right']['edit_rights'] == 1) { ?>
								<td>
									<span class="label label-sm label-success">
										 <a href="<?php echo BASE_PATH; ?>editaccountledger?id="  style="color:#fff">View Report</a>
									</span>
								</td>
								<?php } */ ?>
								<?php /*if ($this->data['access_right']['delete_rights'] == 1) { ?>
								<td>
									<span class="label label-sm label-danger">
										 <a href="<?php echo BASE_PATH; ?>Delaccountledger?id=<?php echo base64_encode($user_data['id']); ?>"  style="color:#fff">Delete</a>
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


			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Dashboard <!--<small>statistics and more</small>-->
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="<?php echo BASE_PATH; ?>dashboard">
								Home
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Dashboard
							</a>
						</li>
						<?php /*<li class="pull-right">
							<div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
								<i class="fa fa-calendar"></i>
								<span>
								</span>
								<i class="fa fa-angle-down"></i>
							</div>
						</li> */ ?>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<?php /*<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								 1349
							</div>
							<div class="desc">
								 Incompleted Jobs
							</div>
						</div>
						<a class="more" href="#">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								 549
							</div>
							<div class="desc">
								 Total Invoices
							</div>
						</div>
						<a class="more" href="#">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								 +89%
							</div>
							<div class="desc">
								 Lab Invoices
							</div>
						</div>
						<a class="more" href="#">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number">
								 12,5M$
							</div>
							<div class="desc">
								 Work Schedule
							</div>
						</div>
						<a class="more" href="#">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div> */ ?>
			<!-- END DASHBOARD STATS -->
			<div class="row">
				<div class="col-md-12">
					<div class="note note-success">
						<!--<h4 class="block">Pace</h4>-->
						<p>
							 <u><h5>You now logged in to <b><?php echo $_SESSION['branch_name'];?></b>  Branch.Please continue...</h5></u>
						</p>
						<!--<p>
							 <font color='red'>***</font> Dashboard Data is displayed as per current financial year.
						</p>-->
						<p>
							 <font color='red'>***</font> Dashboard page is auto refresh every 10 mins.
						</p>
					</div>
				</div>
			</div>

			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-files-o"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $this->data['fileCount']; ?>
							</div>
							<div class="desc">
								 Total Files Created
							</div>
						</div>
						<a class="more" href="<?php echo BASE_PATH; ?>viewfilereport">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-file"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $this->data['invoiceCount']; ?>
							</div>
							<div class="desc">
								 Total Invoices Created
							</div>
						</div>
						<a class="more" href="<?php echo BASE_PATH; ?>viewinvoicefilereport">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="fa fa-usd"></i>
						</div>
						<div class="details">
							<div class="desc">
								 Total Invoice Amount
							</div>
							<div class="desc">
								 <?php echo $this->data['invoice_amt']; ?>$
							</div>
							<div class="desc">
								 Total Payment Received
							</div>
							<div class="desc">
								 <?php echo $this->data['invoice_rec_amt']; ?>$
							</div>
						</div>
						<a class="more" href="<?php echo BASE_PATH; ?>Viewfileinvoicepayment">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-group"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $this->data['clientCount']; ?>
							</div>
							<div class="desc">
								 Total Clients
							</div>
						</div>
						<a class="more" href="<?php echo BASE_PATH; ?>viewclientmaster">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="row ">
				<div class="col-md-6 col-sm-6">
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bell-o"></i>Recent Files Created
							</div>
							<?php /*<div class="actions">
								<div class="btn-group">
									<a class="btn btn-sm default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										 Filter By <i class="fa fa-angle-down"></i>
									</a>
									<div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
										<label><input type="checkbox"/> Finance</label>
										<label><input type="checkbox" checked=""/> Membership</label>
										<label><input type="checkbox"/> Customer Support</label>
										<label><input type="checkbox" checked=""/> HR</label>
										<label><input type="checkbox"/> System</label>
									</div>
								</div>
							</div>*/ ?>
						</div>
						<div class="portlet-body">
							<div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
								<ul class="feeds">
								    <?php
							        $rows = $this->data['recent_files']; 
							        foreach($rows as $recent_files){
						            ?>
									<li>
										<div class="col1">
											<div class="cont">
												<div class="cont-col1">
													<div class="label label-sm label-info">
														<i class="fa fa-check"></i>
													</div>
												</div>
												<div class="cont-col2">
													<div class="desc">
														 <?php echo $recent_files['first_name']." ".$recent_files['last_name']; ?> created File with File No <u><a href="<?php echo BASE_PATH; ?>fullviewfileregister?id=<?php echo base64_encode($recent_files['id']); ?>" target="_blank"><?php echo $recent_files['file_no']; ?></a></u>
														<!--<span class="label label-sm label-warning ">
															 View File <i class="fa fa-share"></i>
														</span>-->
													</div>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="desc">
												 <?php echo date('d-m-Y',strtotime($recent_files['file_creation_date'])); ?>
											</div>
										</div>
									</li>
									<?php
							        }
						            ?>
								</ul>
							</div>
						</div>										
					</div>		
				</div>

				<div class="col-md-6 col-sm-6">
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bell-o"></i>Recent Invoice Created
							</div>
							<?php /*<div class="actions">
								<div class="btn-group">
									<a class="btn btn-sm default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										 Filter By <i class="fa fa-angle-down"></i>
									</a>
									<div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
										<label><input type="checkbox"/> Finance</label>
										<label><input type="checkbox" checked=""/> Membership</label>
										<label><input type="checkbox"/> Customer Support</label>
										<label><input type="checkbox" checked=""/> HR</label>
										<label><input type="checkbox"/> System</label>
									</div>
								</div>
							</div>*/ ?>
						</div>
						<div class="portlet-body">
							<div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
								<ul class="feeds">
									<?php
							        $rows = $this->data['recent_invoices']; 
							        foreach($rows as $recent_invoices){
						            ?>
									<li>
										<div class="col1">
											<div class="cont">
												<div class="cont-col1">
													<div class="label label-sm label-info">
														<i class="fa fa-check"></i>
													</div>
												</div>
												<div class="cont-col2">
													<div class="desc">
														 <?php 
														 if (!empty($recent_invoices['invoice_no'])) {
															if ($recent_invoices['invoice_info']=='Single') {
														 			echo $recent_invoices['first_name']." ".$recent_invoices['last_name']." created Invoice with Invoice No <u><a href='".BASE_PATH."fullviewinvoiceregister?id=".base64_encode($recent_invoices['id'])."' target='_blank'>".$recent_invoices['invoice_no']."</a></u>";
														 		}
														 	if ($recent_invoices['invoice_info']=='Multiple') {
														 			echo $recent_invoices['first_name']." ".$recent_invoices['last_name']." created Invoice with Invoice No <u><a href='".BASE_PATH."fullviewmultinvoiceregister?id=".base64_encode($recent_invoices['id'])."' target='_blank'>".$recent_invoices['invoice_no']."</a></u>";
														 		}	

														 } else {
														 	echo $recent_invoices['first_name']." ".$recent_invoices['last_name']." created Draft Invoice";
														 } ?>											 
														<!--<span class="label label-sm label-warning ">
															 View File <i class="fa fa-share"></i>
														</span>-->
													</div>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="desc">
												 <?php echo date('d-m-Y',strtotime($recent_invoices['invoice_date'])); ?>
											</div>
										</div>
									</li>
									<?php
							        }
						            ?>									
								</ul>
							</div>
						</div>										
					</div>		
				</div>	
			</div>		
			<?php /*<div class="clearfix">
			</div>
			<div class="row">clearfix
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet solid bordered light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bar-chart-o"></i>Site Visits
							</div>
							<div class="tools">
								<div class="btn-group" data-toggle="buttons">
									<label class="btn default btn-sm active">
									<input type="radio" name="options" class="toggle" id="option1">Users </label>
									<label class="btn default btn-sm">
									<input type="radio" name="options" class="toggle" id="option2">Feedbacks </label>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_statistics_loading">
								<img src="assets/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_statistics_content" class="display-none">
								<div id="site_statistics" class="chart">
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet solid light-grey bordered">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bullhorn"></i>Activities
							</div>
							<div class="tools">
								<div class="btn-group pull-right" data-toggle="buttons">
									<a href="" class="btn blue btn-sm active">
										 Users
									</a>
									<a href="" class="btn blue btn-sm">
										 Orders
									</a>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_activities_loading">
								<img src="assets/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_activities_content" class="display-none">
								<div id="site_activities" style="height: 100px;">
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
					<!-- BEGIN PORTLET-->
					<div class="portlet solid bordered light-grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-signal"></i>Server Load
							</div>
							<div class="tools">
								<div class="btn-group pull-right" data-toggle="buttons">
									<a href="" class="btn red btn-sm active">
										 Database
									</a>
									<a href="" class="btn red btn-sm">
										 Web
									</a>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div id="load_statistics_loading">
								<img src="assets/img/loading.gif" alt="loading"/>
							</div>
							<div id="load_statistics_content" class="display-none">
								<div id="load_statistics" style="height: 108px;">
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div> 
			<div class="clearfix">
			</div>
			<div class="row ">
				<div class="col-md-6 col-sm-6">
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bell-o"></i>Recent Activities
							</div>
							<div class="actions">
								<div class="btn-group">
									<a class="btn btn-sm default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										 Filter By <i class="fa fa-angle-down"></i>
									</a>
									<div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
										<label><input type="checkbox"/> Finance</label>
										<label><input type="checkbox" checked=""/> Membership</label>
										<label><input type="checkbox"/> Customer Support</label>
										<label><input type="checkbox" checked=""/> HR</label>
										<label><input type="checkbox"/> System</label>
									</div>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
								<ul class="feeds">
									<li>
										<div class="col1">
											<div class="cont">
												<div class="cont-col1">
													<div class="label label-sm label-info">
														<i class="fa fa-check"></i>
													</div>
												</div>
												<div class="cont-col2">
													<div class="desc">
														 You have 4 pending tasks.
														<span class="label label-sm label-warning ">
															 Take action <i class="fa fa-share"></i>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date">
												 Just now
											</div>
										</div>
									</li>
									<li>
										<a href="#">
											<div class="col1">
												<div class="cont">
													<div class="cont-col1">
														<div class="label label-sm label-success">
															<i class="fa fa-bar-chart-o"></i>
														</div>
													</div>
													<div class="cont-col2">
														<div class="desc">
															 Finance Report for year 2013 has been released.
														</div>
													</div>
												</div>
											</div>
											<div class="col2">
												<div class="date">
													 20 mins
												</div>
											</div>
										</a>
									</li>
									<li>
										<div class="col1">
											<div class="cont">
												<div class="cont-col1">
													<div class="label label-sm label-danger">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="cont-col2">
													<div class="desc">
														 You have 5 pending membership that requires a quick review.
													</div>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date">
												 24 mins
											</div>
										</div>
									</li>
									<li>
										<div class="col1">
											<div class="cont">
												<div class="cont-col1">
													<div class="label label-sm label-info">
														<i class="fa fa-shopping-cart"></i>
													</div>
												</div>
												<div class="cont-col2">
													<div class="desc">
														 New order received with
														<span class="label label-sm label-success">
															 Reference Number: DR23923
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date">
												 30 mins
											</div>
										</div>
									</li>
									<li>
										<div class="col1">
											<div class="cont">
												<div class="cont-col1">
													<div class="label label-sm label-success">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="cont-col2">
													<div class="desc">
														 You have 5 pending membership that requires a quick review.
													</div>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date">
												 24 mins
											</div>
										</div>
									</li>
									<li>
										<div class="col1">
											<div class="cont">
												<div class="cont-col1">
													<div class="label label-sm label-default">
														<i class="fa fa-bell-o"></i>
													</div>
												</div>
												<div class="cont-col2">
													<div class="desc">
														 Web server hardware needs to be upgraded.
														<span class="label label-sm label-default ">
															 Overdue
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date">
												 2 hours
											</div>
										</div>
									</li>
									<li>
										<a href="#">
											<div class="col1">
												<div class="cont">
													<div class="cont-col1">
														<div class="label label-sm label-default">
															<i class="fa fa-briefcase"></i>
														</div>
													</div>
													<div class="cont-col2">
														<div class="desc">
															 IPO Report for year 2013 has been released.
														</div>
													</div>
												</div>
											</div>
											<div class="col2">
												<div class="date">
													 20 mins
												</div>
											</div>
										</a>
									</li>
									<li>
										<div class="col1">
											<div class="cont">
												<div class="cont-col1">
													<div class="label label-sm label-info">
														<i class="fa fa-check"></i>
													</div>
												</div>
												<div class="cont-col2">
													<div class="desc">
														 You have 4 pending tasks.
														<span class="label label-sm label-warning ">
															 Take action <i class="fa fa-share"></i>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date">
												 Just now
											</div>
										</div>
									</li>
									<li>
										<a href="#">
											<div class="col1">
												<div class="cont">
													<div class="cont-col1">
														<div class="label label-sm label-danger">
															<i class="fa fa-bar-chart-o"></i>
														</div>
													</div>
													<div class="cont-col2">
														<div class="desc">
															 Finance Report for year 2013 has been released.
														</div>
													</div>
												</div>
											</div>
											<div class="col2">
												<div class="date">
													 20 mins
												</div>
											</div>
										</a>
									</li>
									<li>
										<div class="col1">
											<div class="cont">
												<div class="cont-col1">
													<div class="label label-sm label-default">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="cont-col2">
													<div class="desc">
														 You have 5 pending membership that requires a quick review.
													</div>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date">
												 24 mins
											</div>
										</div>
									</li>
									<li>
										<div class="col1">
											<div class="cont">
												<div class="cont-col1">
													<div class="label label-sm label-info">
														<i class="fa fa-shopping-cart"></i>
													</div>
												</div>
												<div class="cont-col2">
													<div class="desc">
														 New order received with
														<span class="label label-sm label-success">
															 Reference Number: DR23923
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date">
												 30 mins
											</div>
										</div>
									</li>
									<li>
										<div class="col1">
											<div class="cont">
												<div class="cont-col1">
													<div class="label label-sm label-success">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="cont-col2">
													<div class="desc">
														 You have 5 pending membership that requires a quick review.
													</div>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date">
												 24 mins
											</div>
										</div>
									</li>
									<li>
										<div class="col1">
											<div class="cont">
												<div class="cont-col1">
													<div class="label label-sm label-warning">
														<i class="fa fa-bell-o"></i>
													</div>
												</div>
												<div class="cont-col2">
													<div class="desc">
														 Web server hardware needs to be upgraded.
														<span class="label label-sm label-default ">
															 Overdue
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date">
												 2 hours
											</div>
										</div>
									</li>
									<li>
										<a href="#">
											<div class="col1">
												<div class="cont">
													<div class="cont-col1">
														<div class="label label-sm label-info">
															<i class="fa fa-briefcase"></i>
														</div>
													</div>
													<div class="cont-col2">
														<div class="desc">
															 IPO Report for year 2013 has been released.
														</div>
													</div>
												</div>
											</div>
											<div class="col2">
												<div class="date">
													 20 mins
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="scroller-footer">
								<div class="pull-right">
									<a href="#">
										 See All Records <i class="m-icon-swapright m-icon-gray"></i>
									</a>
									 &nbsp;
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="portlet box green tasks-widget">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-check"></i>Tasks
							</div>
							<div class="tools">
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="" class="reload">
								</a>
							</div>
							<div class="actions">
								<div class="btn-group">
									<a class="btn default btn-xs" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										 More <i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
												<i class="i"></i> All Project
											</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">
												 AirAsia
											</a>
										</li>
										<li>
											<a href="#">
												 Cruise
											</a>
										</li>
										<li>
											<a href="#">
												 HSBC
											</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">
												 Pending
												<span class="badge badge-important">
													 4
												</span>
											</a>
										</li>
										<li>
											<a href="#">
												 Completed
												<span class="badge badge-success">
													 12
												</span>
											</a>
										</li>
										<li>
											<a href="#">
												 Overdue
												<span class="badge badge-warning">
													 9
												</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div class="task-content">
								<div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="1">
									<!-- START TASK LIST -->
									<ul class="task-list">
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value=""/>
											</div>
											<div class="task-title">
												<span class="task-title-sp">
													 Present 2013 Year IPO Statistics at Board Meeting
												</span>
												<span class="label label-sm label-success">
													 Company
												</span>
												<span class="task-bell">
													<i class="fa fa-bell-o"></i>
												</span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
														<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li>
															<a href="#">
																<i class="fa fa-check"></i> Complete
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-pencil"></i> Edit
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-trash-o"></i> Cancel
															</a>
														</li>
													</ul>
												</div>
											</div>
										</li>
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value=""/>
											</div>
											<div class="task-title">
												<span class="task-title-sp">
													 Hold An Interview for Marketing Manager Position
												</span>
												<span class="label label-sm label-danger">
													 Marketing
												</span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
														<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li>
															<a href="#">
																<i class="fa fa-check"></i> Complete
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-pencil"></i> Edit
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-trash-o"></i> Cancel
															</a>
														</li>
													</ul>
												</div>
											</div>
										</li>
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value=""/>
											</div>
											<div class="task-title">
												<span class="task-title-sp">
													 AirAsia Intranet System Project Internal Meeting
												</span>
												<span class="label label-sm label-success">
													 AirAsia
												</span>
												<span class="task-bell">
													<i class="fa fa-bell-o"></i>
												</span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
														<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li>
															<a href="#">
																<i class="fa fa-check"></i> Complete
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-pencil"></i> Edit
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-trash-o"></i> Cancel
															</a>
														</li>
													</ul>
												</div>
											</div>
										</li>
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value=""/>
											</div>
											<div class="task-title">
												<span class="task-title-sp">
													 Technical Management Meeting
												</span>
												<span class="label label-sm label-warning">
													 Company
												</span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
														<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li>
															<a href="#">
																<i class="fa fa-check"></i> Complete
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-pencil"></i> Edit
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-trash-o"></i> Cancel
															</a>
														</li>
													</ul>
												</div>
											</div>
										</li>
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value=""/>
											</div>
											<div class="task-title">
												<span class="task-title-sp">
													 Kick-off Company CRM Mobile App Development
												</span>
												<span class="label label-sm label-info">
													 Internal Products
												</span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
														<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li>
															<a href="#">
																<i class="fa fa-check"></i> Complete
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-pencil"></i> Edit
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-trash-o"></i> Cancel
															</a>
														</li>
													</ul>
												</div>
											</div>
										</li>
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value=""/>
											</div>
											<div class="task-title">
												<span class="task-title-sp">
													 Prepare Commercial Offer For SmartVision Website Rewamp
												</span>
												<span class="label label-sm label-danger">
													 SmartVision
												</span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
														<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li>
															<a href="#">
																<i class="fa fa-check"></i> Complete
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-pencil"></i> Edit
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-trash-o"></i> Cancel
															</a>
														</li>
													</ul>
												</div>
											</div>
										</li>
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value=""/>
											</div>
											<div class="task-title">
												<span class="task-title-sp">
													 Sign-Off The Comercial Agreement With AutoSmart
												</span>
												<span class="label label-sm label-default">
													 AutoSmart
												</span>
												<span class="task-bell">
													<i class="fa fa-bell-o"></i>
												</span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
														<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li>
															<a href="#">
																<i class="fa fa-check"></i> Complete
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-pencil"></i> Edit
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-trash-o"></i> Cancel
															</a>
														</li>
													</ul>
												</div>
											</div>
										</li>
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value=""/>
											</div>
											<div class="task-title">
												<span class="task-title-sp">
													 Company Staff Meeting
												</span>
												<span class="label label-sm label-success">
													 Cruise
												</span>
												<span class="task-bell">
													<i class="fa fa-bell-o"></i>
												</span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
														<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li>
															<a href="#">
																<i class="fa fa-check"></i> Complete
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-pencil"></i> Edit
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-trash-o"></i> Cancel
															</a>
														</li>
													</ul>
												</div>
											</div>
										</li>
										<li class="last-line">
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value=""/>
											</div>
											<div class="task-title">
												<span class="task-title-sp">
													 KeenThemes Investment Discussion
												</span>
												<span class="label label-sm label-warning">
													 KeenThemes
												</span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
														<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu pull-right">
														<li>
															<a href="#">
																<i class="fa fa-check"></i> Complete
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-pencil"></i> Edit
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-trash-o"></i> Cancel
															</a>
														</li>
													</ul>
												</div>
											</div>
										</li>
									</ul>
									<!-- END START TASK LIST -->
								</div>
							</div>
							<div class="task-footer">
								<span class="pull-right">
									<a href="#">
										 See All Tasks <i class="m-icon-swapright m-icon-gray"></i>
									</a>
									 &nbsp;
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix">
			</div>*/?>
			
			<div class="row">
				<div class="col-md-6">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-comments"></i>Cargo/Client Wise Data
							</div>
							<!--<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>-->
							<div class="actions">
								<a href="<?php echo BASE_PATH; ?>Viewcommodityfilereport" class="btn btn-sm yellow easy-pie-chart-reload" target="_blank">
									<i class="fa fa-repeat"></i> View Report
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>
										 #
									</th>
									<th>
										 Cargo Group
									</th>
									<th>
										 Cargo
									</th>
									<th>
										 Client Name
									</th>
									<th>
										 Quantity
									</th>
									<th>
										 Unit
									</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$rows = $this->data['cargos']; 
								$i=1;	
								foreach($rows as $invoice_data){
								?>
								<tr class="active">
									<td>
										 <?php echo $i; ?>
									</td>
									<td>
										 <?php echo $invoice_data['cargo_group_name']; ?>
									</td>
									<td>
										 <?php echo $invoice_data['commodity_name']; ?>
									<td>
										 <?php echo $invoice_data['client_name']; ?>
									</td>
									<td>
										 <?php echo $invoice_data['approx_qty']; ?>
									</td>
									<td>
										 <?php echo $invoice_data['unit_name']; ?>
									</td>
								</tr>
								<?php $i++; } ?>								
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
				<div class="col-md-6">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-comments"></i>Ledger Data
							</div>
							<!--<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>-->
							<div class="actions">
								<a href="<?php echo BASE_PATH; ?>viewledgerfilereport" class="btn btn-sm yellow easy-pie-chart-reload" target="_blank">
									<i class="fa fa-repeat"></i> View Report
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>
										 #
									</th>
									<th>
										 Vendor Name
									</th>
									<th>
										 Credit Amount
									</th>
									<th>
										 Debit Amount
									</th>
									<th>
										 Balance Amount
									</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$rows = $this->data['ledgerdata']; 
								$j=1;	
								foreach($rows as $ledgerdata){
								if ($j<=5) { 
								?>
								<tr class="active">
									<td>
										 <?php echo $j; ?>
									</td>
									<td>
										 <?php echo $ledgerdata['vendor_name']; ?>
									</td>
									<td>
										 <?php echo @$ledgerdata['credit_amount']; ?>
									<td>
										 <?php echo @$ledgerdata['debit_amount']; ?>
									</td>
									<td>
										 <?php echo @$ledgerdata['balance_amount']; ?>
									</td>
								</tr>
								<?php } $j++; } ?>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>	

			<div class="row ">
				<div class="col-md-6 col-sm-6">
					<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-calendar"></i>File Status Data
							</div>
							<!--<div class="actions">
								<a href="javascript:;" class="btn btn-sm yellow easy-pie-chart-reload">
									<i class="fa fa-repeat"></i> Reload
								</a>
							</div>-->
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-2">
									<div class="easy-pie-chart">
										<div class="number transactions" data-percent="55">
											<span>
												 <?php echo @$this->data['fileCount']; ?>
											</span>
											 <!--%-->
										</div>
										<a class="title" href="<?php echo BASE_PATH; ?>viewfilereport">
											 Total Files <i class="m-icon-swapright"></i>
										</a>
									</div>
								</div>
								<div class="margin-bottom-10 visible-sm">
								</div>
								<div class="col-md-2">
									<div class="easy-pie-chart">
										<div class="number visits" data-percent="85">
											<span>
												 <?php echo @$this->data['fileCompleteCount']; ?>
											</span>
											 <!--%-->
										</div>
										<a class="title" href="<?php echo BASE_PATH; ?>viewfilereport?st=Completed">
											 Completed <i class="m-icon-swapright"></i>
										</a>
									</div>
								</div>
								<div class="margin-bottom-10 visible-sm">
								</div>
								<div class="col-md-2">
									<div class="easy-pie-chart">
										<div class="number bounce" data-percent="46">
											<span>
												 <?php echo @$this->data['filePendingCount']; ?>
											</span>
											 
										</div>
										<a class="title" href="<?php echo BASE_PATH; ?>viewfilereport?st=Pending">
											 Pending <br/><i class="m-icon-swapright"></i>
										</a>
									</div>
								</div>
								<div class="col-md-2">
									<div class="easy-pie-chart">
										<div class="number bounce" data-percent="46">
											<span>
												 <?php echo @$this->data['fileInvoicedCount']; ?>
											</span>
											 
										</div>
										<a class="title" href="<?php echo BASE_PATH; ?>viewfilereport?st=Invoiced">
											 Invoiced <br/><i class="m-icon-swapright"></i>
										</a>
									</div>
								</div>
								<div class="col-md-2">
									<div class="easy-pie-chart">
										<div class="number bounce" data-percent="46">
											<span>
												 <font color="red"><?php echo @$this->data['fileCancelledCount']; ?></font>
											</span>
											 
										</div>
										<a class="title" href="<?php echo BASE_PATH; ?>viewfilereport?st=Cancelled">
											 <font color="red">Cancelled</font> <i class="m-icon-swapright"></i>
										</a>
									</div>
								</div>
								<div class="col-md-2">
									<div class="easy-pie-chart">
										<div class="number bounce" data-percent="46">
											<span>
												 <?php echo @$this->data['fileRunningCount']; ?>
											</span>
											 
										</div>
										<a class="title" href="<?php echo BASE_PATH; ?>viewfilereport?st=Running">
											 Running <br/><i class="m-icon-swapright"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-calendar"></i>Master Data
							</div>
							<!--<div class="actions">
								<a href="javascript:;" class="btn btn-sm yellow easy-pie-chart-reload">
									<i class="fa fa-repeat"></i> Reload
								</a>
							</div>-->
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-4">
									<div class="easy-pie-chart">
										<div class="number transactions" data-percent="55">
											<span>
												 <?php echo @$this->data['VendorCount']; ?>
											</span>
											 <!--%-->
										</div>
										<a class="title" href="<?php echo BASE_PATH; ?>Viewvendormaster">
											 Vendors <br/><i class="m-icon-swapright"></i>
										</a>
									</div>
								</div>
								<div class="margin-bottom-10 visible-sm">
								</div>
								<div class="col-md-4">
									<div class="easy-pie-chart">
										<div class="number visits" data-percent="85">
											<span>
												 <?php echo @$this->data['CargoCount']; ?>
											</span>
											 <!--%-->
										</div>
										<a class="title" href="<?php echo BASE_PATH; ?>viewcargomaster">
											 Commodities <br/><i class="m-icon-swapright"></i>
										</a>
									</div>
								</div>
								<div class="margin-bottom-10 visible-sm">
								</div>
								<div class="col-md-4">
									<div class="easy-pie-chart">
										<div class="number bounce" data-percent="46">
											<span>
												 <?php echo @$this->data['ClientInteractionCount']; ?>
											</span>
											 
										</div>
										<a class="title" href="<?php echo BASE_PATH; ?>viewinteractionreport">
											 Client Interactions <br/><i class="m-icon-swapright"></i>
										</a>
									</div>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix">
			</div>

			<?php /*<div class="row ">
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN REGIONAL STATS PORTLET-->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Regional Stats
							</div>
							<div class="tools">
								<a href="" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="" class="reload">
								</a>
								<a href="" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="region_statistics_loading">
								<img src="assets/img/loading.gif" alt="loading"/>
							</div>
							<div id="region_statistics_content" class="display-none">
								<div class="btn-toolbar margin-bottom-10">
									<div class="btn-group" data-toggle="buttons">
										<a href="" class="btn default btn-sm active">
											 Users
										</a>
										<a href="" class="btn default btn-sm">
											 Orders
										</a>
									</div>
									<div class="btn-group pull-right">
										<a href="" class="btn default btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
											 Select Region
											<span class="fa fa-angle-down">
											</span>
										</a>
										<ul class="dropdown-menu pull-right">
											<li>
												<a href="javascript:;" id="regional_stat_world">
													 World
												</a>
											</li>
											<li>
												<a href="javascript:;" id="regional_stat_usa">
													 USA
												</a>
											</li>
											<li>
												<a href="javascript:;" id="regional_stat_europe">
													 Europe
												</a>
											</li>
											<li>
												<a href="javascript:;" id="regional_stat_russia">
													 Russia
												</a>
											</li>
											<li>
												<a href="javascript:;" id="regional_stat_germany">
													 Germany
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div id="vmap_world" class="vmaps display-none">
								</div>
								<div id="vmap_usa" class="vmaps display-none">
								</div>
								<div id="vmap_europe" class="vmaps display-none">
								</div>
								<div id="vmap_russia" class="vmaps display-none">
								</div>
								<div id="vmap_germany" class="vmaps display-none">
								</div>
							</div>
						</div>
					</div>
					<!-- END REGIONAL STATS PORTLET-->
				</div>
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet paddingless">
						<div class="portlet-title line">
							<div class="caption">
								<i class="fa fa-bell-o"></i>Feeds
							</div>
							<div class="tools">
								<a href="" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="" class="reload">
								</a>
								<a href="" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<!--BEGIN TABS-->
							<div class="tabbable tabbable-custom">
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#tab_1_1" data-toggle="tab">
											 System
										</a>
									</li>
									<li>
										<a href="#tab_1_2" data-toggle="tab">
											 Activities
										</a>
									</li>
									<li>
										<a href="#tab_1_3" data-toggle="tab">
											 Recent Users
										</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1_1">
										<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible="0">
											<ul class="feeds">
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-success">
																	<i class="fa fa-bell-o"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 You have 4 pending tasks.
																	<span class="label label-sm label-danger ">
																		 Take action <i class="fa fa-share"></i>
																	</span>
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 Just now
														</div>
													</div>
												</li>
												<li>
													<a href="#">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc">
																		 New version v1.4 just lunched!
																	</div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date">
																 20 mins
															</div>
														</div>
													</a>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-danger">
																	<i class="fa fa-bolt"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 Database server #12 overloaded. Please fix the issue.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 24 mins
														</div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 New order received. Please take care of it.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 30 mins
														</div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-success">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 New order received. Please take care of it.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 40 mins
														</div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-warning">
																	<i class="fa fa-plus"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 New user registered.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 1.5 hours
														</div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-success">
																	<i class="fa fa-bell-o"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 Web server hardware needs to be upgraded.
																	<span class="label label-sm label-default ">
																		 Overdue
																	</span>
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 2 hours
														</div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-default">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 New order received. Please take care of it.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 3 hours
														</div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-warning">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 New order received. Please take care of it.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 5 hours
														</div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 New order received. Please take care of it.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 18 hours
														</div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-default">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 New order received. Please take care of it.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 21 hours
														</div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 New order received. Please take care of it.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 22 hours
														</div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-default">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 New order received. Please take care of it.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 21 hours
														</div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 New order received. Please take care of it.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 22 hours
														</div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-default">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 New order received. Please take care of it.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 21 hours
														</div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 New order received. Please take care of it.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 22 hours
														</div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-default">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 New order received. Please take care of it.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 21 hours
														</div>
													</div>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-info">
																	<i class="fa fa-bullhorn"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 New order received. Please take care of it.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 22 hours
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="tab-pane" id="tab_1_2">
										<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">
											<ul class="feeds">
												<li>
													<a href="#">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc">
																		 New user registered
																	</div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date">
																 Just now
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="#">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc">
																		 New order received
																	</div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date">
																 10 mins
															</div>
														</div>
													</a>
												</li>
												<li>
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-danger">
																	<i class="fa fa-bolt"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	 Order #24DOP4 has been rejected.
																	<span class="label label-sm label-danger ">
																		 Take action <i class="fa fa-share"></i>
																	</span>
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															 24 mins
														</div>
													</div>
												</li>
												<li>
													<a href="#">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc">
																		 New user registered
																	</div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date">
																 Just now
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="#">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc">
																		 New user registered
																	</div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date">
																 Just now
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="#">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc">
																		 New user registered
																	</div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date">
																 Just now
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="#">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc">
																		 New user registered
																	</div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date">
																 Just now
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="#">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc">
																		 New user registered
																	</div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date">
																 Just now
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="#">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc">
																		 New user registered
																	</div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date">
																 Just now
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="#">
														<div class="col1">
															<div class="cont">
																<div class="cont-col1">
																	<div class="label label-sm label-success">
																		<i class="fa fa-bell-o"></i>
																	</div>
																</div>
																<div class="cont-col2">
																	<div class="desc">
																		 New user registered
																	</div>
																</div>
															</div>
														</div>
														<div class="col2">
															<div class="date">
																 Just now
															</div>
														</div>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="tab-pane" id="tab_1_3">
										<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">
											<div class="row">
												<div class="col-md-6 user-info">
													<img alt="" src="assets/img/avatar.png" class="img-responsive"/>
													<div class="details">
														<div>
															<a href="#">
																 Robert Nilson
															</a>
															<span class="label label-sm label-success label-mini">
																 Approved
															</span>
														</div>
														<div>
															 29 Jan 2013 10:45AM
														</div>
													</div>
												</div>
												<div class="col-md-6 user-info">
													<img alt="" src="assets/img/avatar.png" class="img-responsive"/>
													<div class="details">
														<div>
															<a href="#">
																 Lisa Miller
															</a>
															<span class="label label-sm label-info">
																 Pending
															</span>
														</div>
														<div>
															 19 Jan 2013 10:45AM
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 user-info">
													<img alt="" src="assets/img/avatar.png" class="img-responsive"/>
													<div class="details">
														<div>
															<a href="#">
																 Eric Kim
															</a>
															<span class="label label-sm label-info">
																 Pending
															</span>
														</div>
														<div>
															 19 Jan 2013 12:45PM
														</div>
													</div>
												</div>
												<div class="col-md-6 user-info">
													<img alt="" src="assets/img/avatar.png" class="img-responsive"/>
													<div class="details">
														<div>
															<a href="#">
																 Lisa Miller
															</a>
															<span class="label label-sm label-danger">
																 In progress
															</span>
														</div>
														<div>
															 19 Jan 2013 11:55PM
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 user-info">
													<img alt="" src="assets/img/avatar.png" class="img-responsive"/>
													<div class="details">
														<div>
															<a href="#">
																 Eric Kim
															</a>
															<span class="label label-sm label-info">
																 Pending
															</span>
														</div>
														<div>
															 19 Jan 2013 12:45PM
														</div>
													</div>
												</div>
												<div class="col-md-6 user-info">
													<img alt="" src="assets/img/avatar.png" class="img-responsive"/>
													<div class="details">
														<div>
															<a href="#">
																 Lisa Miller
															</a>
															<span class="label label-sm label-danger">
																 In progress
															</span>
														</div>
														<div>
															 19 Jan 2013 11:55PM
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 user-info">
													<img alt="" src="assets/img/avatar.png" class="img-responsive"/>
													<div class="details">
														<div>
															<a href="#">
																 Eric Kim
															</a>
															<span class="label label-sm label-info">
																 Pending
															</span>
														</div>
														<div>
															 19 Jan 2013 12:45PM
														</div>
													</div>
												</div>
												<div class="col-md-6 user-info">
													<img alt="" src="assets/img/avatar.png" class="img-responsive"/>
													<div class="details">
														<div>
															<a href="#">
																 Lisa Miller
															</a>
															<span class="label label-sm label-danger">
																 In progress
															</span>
														</div>
														<div>
															 19 Jan 2013 11:55PM
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 user-info">
													<img alt="" src="assets/img/avatar.png" class="img-responsive"/>
													<div class="details">
														<div>
															<a href="#">
																 Eric Kim
															</a>
															<span class="label label-sm label-info">
																 Pending
															</span>
														</div>
														<div>
															 19 Jan 2013 12:45PM
														</div>
													</div>
												</div>
												<div class="col-md-6 user-info">
													<img alt="" src="assets/img/avatar.png" class="img-responsive"/>
													<div class="details">
														<div>
															<a href="#">
																 Lisa Miller
															</a>
															<span class="label label-sm label-danger">
																 In progress
															</span>
														</div>
														<div>
															 19 Jan 2013 11:55PM
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 user-info">
													<img alt="" src="assets/img/avatar.png" class="img-responsive"/>
													<div class="details">
														<div>
															<a href="#">
																 Eric Kim
															</a>
															<span class="label label-sm label-info">
																 Pending
															</span>
														</div>
														<div>
															 19 Jan 2013 12:45PM
														</div>
													</div>
												</div>
												<div class="col-md-6 user-info">
													<img alt="" src="assets/img/avatar.png" class="img-responsive"/>
													<div class="details">
														<div>
															<a href="#">
																 Lisa Miller
															</a>
															<span class="label label-sm label-danger">
																 In progress
															</span>
														</div>
														<div>
															 19 Jan 2013 11:55PM
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--END TABS-->
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div> 
			<div class="clearfix">
			</div>*/?>
			<?php /*<div class="row ">
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet box blue calendar">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-calendar"></i>Calendar
							</div>
						</div>
						<div class="portlet-body light-grey">
							<div id="calendar">
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet">
						<div class="portlet-title line">
							<div class="caption">
								<i class="fa fa-comments"></i>Chats
							</div>
							<div class="tools">
								<a href="" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="" class="reload">
								</a>
								<a href="" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body" id="chats">
							<div class="scroller" style="height: 435px;" data-always-visible="1" data-rail-visible1="1">
								<ul class="chats">
									<li class="in">
										<img class="avatar img-responsive" alt="" src="assets/img/avatar1.jpg"/>
										<div class="message">
											<span class="arrow">
											</span>
											<a href="#" class="name">
												 Bob Nilson
											</a>
											<span class="datetime">
												 at Jul 25, 2012 11:09
											</span>
											<span class="body">
												 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
											</span>
										</div>
									</li>
									<li class="out">
										<img class="avatar img-responsive" alt="" src="assets/img/avatar2.jpg"/>
										<div class="message">
											<span class="arrow">
											</span>
											<a href="#" class="name">
												 Lisa Wong
											</a>
											<span class="datetime">
												 at Jul 25, 2012 11:09
											</span>
											<span class="body">
												 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
											</span>
										</div>
									</li>
									<li class="in">
										<img class="avatar img-responsive" alt="" src="assets/img/avatar1.jpg"/>
										<div class="message">
											<span class="arrow">
											</span>
											<a href="#" class="name">
												 Bob Nilson
											</a>
											<span class="datetime">
												 at Jul 25, 2012 11:09
											</span>
											<span class="body">
												 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
											</span>
										</div>
									</li>
									<li class="out">
										<img class="avatar img-responsive" alt="" src="assets/img/avatar3.jpg"/>
										<div class="message">
											<span class="arrow">
											</span>
											<a href="#" class="name">
												 Richard Doe
											</a>
											<span class="datetime">
												 at Jul 25, 2012 11:09
											</span>
											<span class="body">
												 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
											</span>
										</div>
									</li>
									<li class="in">
										<img class="avatar img-responsive" alt="" src="assets/img/avatar3.jpg"/>
										<div class="message">
											<span class="arrow">
											</span>
											<a href="#" class="name">
												 Richard Doe
											</a>
											<span class="datetime">
												 at Jul 25, 2012 11:09
											</span>
											<span class="body">
												 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
											</span>
										</div>
									</li>
									<li class="out">
										<img class="avatar img-responsive" alt="" src="assets/img/avatar1.jpg"/>
										<div class="message">
											<span class="arrow">
											</span>
											<a href="#" class="name">
												 Bob Nilson
											</a>
											<span class="datetime">
												 at Jul 25, 2012 11:09
											</span>
											<span class="body">
												 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
											</span>
										</div>
									</li>
									<li class="in">
										<img class="avatar img-responsive" alt="" src="assets/img/avatar3.jpg"/>
										<div class="message">
											<span class="arrow">
											</span>
											<a href="#" class="name">
												 Richard Doe
											</a>
											<span class="datetime">
												 at Jul 25, 2012 11:09
											</span>
											<span class="body">
												 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
											</span>
										</div>
									</li>
									<li class="out">
										<img class="avatar img-responsive" alt="" src="assets/img/avatar1.jpg"/>
										<div class="message">
											<span class="arrow">
											</span>
											<a href="#" class="name">
												 Bob Nilson
											</a>
											<span class="datetime">
												 at Jul 25, 2012 11:09
											</span>
											<span class="body">
												 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod tincidunt ut laoreet.
											</span>
										</div>
									</li>
								</ul>
							</div>
							<div class="chat-form">
								<div class="input-cont">
									<input class="form-control" type="text" placeholder="Type a message here..."/>
								</div>
								<div class="btn-cont">
									<span class="arrow">
									</span>
									<a href="" class="btn blue icn-only">
										<i class="fa fa-check icon-white"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div> */ ?>
			<?php /*<center><img src="<?php echo ASSETS_PATH; ?>img/logo-big.png" alt=""></center>
			<br>
			<center><h1>You now logged in to <b><?php echo $_SESSION['branch_name'];?></b>  Branch.Please continue...</h1></center>
			*/ ?>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

</body>
<!-- END BODY -->
</html>
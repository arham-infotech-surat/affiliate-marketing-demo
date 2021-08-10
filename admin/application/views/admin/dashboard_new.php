<?php

defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting(0);
ini_set('display_errors', 0);
?>

<!DOCTYPE html>

<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

		<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Dashboard</title>



	<!-- Global stylesheets -->

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/colors.min.css" rel="stylesheet" type="text/css">
	

	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo base_url();?>global_assets/js/main/jquery.min.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
    
	<!-- Theme JS files -->
	
	<script src="<?php echo base_url();?>global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/plugins/pickers/daterangepicker.js"></script>
    
	<script src="<?php echo base_url();?>assets/js/app.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/demo_pages/dashboard.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/demo_charts/pages/dashboard/light/sparklines.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/demo_charts/pages/dashboard/light/lines.js"></script>	
	<script src="<?php echo base_url();?>global_assets/js/demo_charts/pages/dashboard/light/areas.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/demo_charts/pages/dashboard/light/donuts.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/demo_charts/pages/dashboard/light/bars.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/demo_charts/pages/dashboard/light/progress.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/demo_charts/pages/dashboard/light/pies.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/demo_charts/pages/dashboard/light/bullets.js"></script>




	

	<!-- /theme JS files -->

	

</head>



<body class="navbar-top" id="body_bg">



	<!-- Main navbar -->

	<?php  include_once 'header.php'; ?>

	<!-- /main navbar -->





	<!-- Page content -->

	<div class="page-content">



		<!-- Main sidebar -->

		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">



			<!-- Sidebar mobile toggler -->

			<div class="sidebar-mobile-toggler text-center">

				<a href="#" class="sidebar-mobile-main-toggle">

					<i class="icon-arrow-left8"></i>

				</a>

				Navigation

				<a href="#" class="sidebar-mobile-expand">

					<i class="icon-screen-full"></i>

					<i class="icon-screen-normal"></i>

				</a>

			</div>

			<!-- /sidebar mobile toggler -->





			<!-- Sidebar content -->

			<?php  include_once 'sidebar.php';  ?>

			<!-- /sidebar content -->

			

		</div>

		<!-- /main sidebar -->





		<!-- Main content -->

		<div class="content-wrapper">





			<!-- Content area -->

			<div class="content" style="margin-bottom: 50px;">
		    	<div class="row">
    				<div class="col-xl-3">
                        <div class="card bg-teal-400" style="background-image: linear-gradient(to bottom,#20A576 0,#4EDDAA 100%);background-repeat: repeat-x;border:none;">
    						<div class="card-body">
    							<div class="d-flex">
    								<h3 class="font-weight-semibold mb-0">System</h3>
    		                	</div>
    		                	
    		                	<div>
    								Total System Users
    								<div class="font-size-sm opacity-75" style="font-weight:bold;font-size:15px;opacity:1;"><?php echo $userresults[0]['total'];?></div>
    							</div>
    							<i class="icon-cogs" style="position: absolute;right: 10%;top: 25%;font-size: 55px;"></i>
    						</div>
    
    						<!--<div class="container-fluid">-->
    						<!--	<div id="members-online"></div>-->
    						<!--</div>-->
    					</div>
    				</div>
    				<div class="col-lg-3">
								<!-- Current server load -->
						<div class="card bg-pink-400" style="background-image: linear-gradient(#4DD0E1,#00BCD4 50%,#80DEEA);background-repeat: no-repeat;border:none;">
							<div class="card-body">
								<div class="d-flex">
									<h3 class="font-weight-semibold mb-0"><?php echo ucfirst($userresults[1]['oauth_provider']);?></h3>
			                	</div>
			                	
			                	<div>
								    <?php echo Total." ".ucfirst($userresults[1]['oauth_provider']." ".Users);?>
									<div class="font-size-sm opacity-75" style="font-weight:bold;font-size:15px;opacity:1;"><?php echo $userresults[1]['total'];?></div>
								</div>
								<i class="icon-google" style="position: absolute;right: 10%;top: 25%;font-size: 55px;"></i>
							</div>

							<!--<div id="server-load"></div>-->
						</div>
						<!-- /current server load -->
                        
					</div>

					<div class="col-lg-3">

						<!-- Today's revenue -->
						<div class="card bg-blue-400" style="background-image: linear-gradient(to left,#3A44E1 0,#9298EF 100%);background-repeat: repeat-x;border:none;">
							<div class="card-body">
								<div class="d-flex">
									<h3 class="font-weight-semibold mb-0"><?php echo ucfirst($userresults[2]['oauth_provider']);?></h3>
			                	</div>
			                	
			                	<div>
									<?php echo Total." ".ucfirst($userresults[2]['oauth_provider']." ".Users);?>
									<div class="font-size-sm opacity-75" style="font-weight:bold;font-size:15px;opacity:1;"><?php echo $userresults[2]['total'];?></div>
								</div>
								<i class="icon-facebook2" style="position: absolute;right: 10%;top: 25%;font-size: 55px;"></i>
							</div>

							<!--<div id="today-revenue"></div>-->
						</div>
						<!-- /today's revenue -->
					</div>
				    
				    <div class="col-xl-3">
                        <div class="card bg-indigo-400" style="background-image: linear-gradient(to left,#F06292,#E91E63 50%,#F48FB1);background-repeat: no-repeat;border:none;">
                            <a href="<?php echo base_url();?>Blog/viewblog" style="color:#ffffff;">
    						<div class="card-body">
    							<div class="d-flex">
    								<h3 class="font-weight-semibold mb-0">Blogs</h3>
    							
    		                	</div>
    		                	
    		                	<div>
    								Total Blogs
    								<div class="font-size-sm opacity-75" style="font-weight:bold;font-size:15px;opacity:1;"><?php echo $blogs[0]['total'];?></div>
    							</div>
    							<i class="icon-images3" style="position: absolute;right: 10%;top: 25%;font-size: 55px;"></i>
    						</div>
                            </a>
    						<!--<div class="container-fluid">-->
    						<!--	<div id="members-online"></div>-->
    						<!--</div>-->
    					</div>
    				</div>
    			</div>
    			
    			<div class="row">
    			     <div class="col-xl-3">
                        <div class="card bg-indigo-400"  style="background-image: linear-gradient(to left,#3A44E1 0,#9298EF 100%);background-repeat: repeat-x;border:none;">
    						<div class="card-body">
    							<div class="d-flex">
    								<h3 class="font-weight-semibold mb-0"><?php //echo $inq[0]['service_title'];?>Inquiries</h3>
    							
    		                	</div>
    		                	
    		                	<div>
    							    Total Inquiries
    								<div class="font-size-sm opacity-75" style="font-weight:bold;font-size:15px;opacity:1;"><?php echo $inq[0]['total'];?></div>
    							</div>
    							<i class="icon-question4" style="position: absolute;right: 10%;top: 25%;font-size: 55px;"></i>
    						</div>
    
    						<!--<div class="container-fluid">-->
    						<!--	<div id="members-online"></div>-->
    						<!--</div>-->
    					</div>
    				</div>
    				<div class="col-lg-3">

						<!-- Today's revenue -->
						<div class="card bg-blue-400"  style="background-image: linear-gradient(to left,#F06292,#E91E63 50%,#F48FB1);background-repeat: no-repeat;border:none;">
						    <a href="<?php echo base_url();?>Order/vieworder" style="color:#ffffff;">
							<div class="card-body">
								<div class="d-flex">
									<h3 class="font-weight-semibold mb-0">Orders</h3>
									
			                	</div>
			                	
			                	<div>
			                	    Total Orders
									<div class="font-size-sm opacity-75" style="font-weight:bold;font-size:15px;opacity:1;"><?php echo $Order[0]['total'];?></div>
								</div>
								<i class="icon-list-ordered" style="position: absolute;right: 10%;top: 25%;font-size: 55px;"></i>
							</div>
                            </a>
							<!--<div id="today-revenue"></div>-->
						</div>
						<!-- /today's revenue -->
					</div>
					
    				<div class="col-xl-3">
                        <div class="card bg-pink-400" style="background-image: linear-gradient(#4DD0E1,#00BCD4 50%,#80DEEA);background-repeat: no-repeat;border:none;">
    						<div class="card-body">
    							<div class="d-flex">
    								<h3 class="font-weight-semibold mb-0">Income</h3>
    		                	</div>
    		                	<div>
    								Total Income
    								<div class="font-size-sm opacity-75" style="font-weight:bold;font-size:15px;opacity:1;"><i class="fas fa-rupee-sign"></i><?php setlocale(LC_MONETARY, 'en_IN'); $amount = money_format('%!i', $payment[0]['total']); echo $amount; ?>
    								</div>
    							</div>
    							<i class="icon-piggy-bank" style="position: absolute;right: 10%;top: 25%;font-size: 55px;"></i>
    						</div>
    					</div>
    				</div>
    				<div class="col-xl-3">
                        <div class="card bg-teal-400" style="background-image: linear-gradient(to bottom,#20A576 0,#4EDDAA 100%);background-repeat: repeat-x;border:none;">
    						<div class="card-body">
    							<div class="d-flex">
    								<h3 class="font-weight-semibold mb-0">Visits</h3>
    		                	</div>
    		                	<div>
    								Total Visits
    								<div class="font-size-sm opacity-75" style="font-weight:bold;font-size:15px;opacity:1;">1052
    								</div>
    							</div>
    							<i class="icon-enter3" style="position: absolute;right: 10%;top: 25%;font-size: 55px;"></i>
    						</div>
    					</div>
    				</div>
    			</div>
				
				<!--<div class="row">-->
    				<!--<div class="col-xl-6">
    					<div class="card text-center">
    						<div class="card-body">
    
    		                	<!-- Progress counter
    							<!--<div class="svg-center position-relative" id="hours-available-progress"></div>-->
    							<!-- /progress counter
    
    
    							<!-- Bars
    							<!--<div id="hours-available-bars"></div>-->
    							<!-- /bars 
    
    						</div>
    					</div>  
    				</div>-->
    				<!--<div class="col-xl-6">
						<div class="card text-center">
							<div class="card-body">

								<!-- Progress counter -->
								<!--<div class="svg-center position-relative" id="goal-progress"></div>-->
								<!-- /progress counter -->

								<!-- Bars 
								<div id="goal-bars"></div>
								<!-- /bars

							</div>
						</div>
    				</div>-->
    			<!--</div>-->
    			
    <!--			<div class="row">-->
    <!--				<div class="col-xl-12">-->
				<!--	    <div class="card">-->
				<!--			<div class="card-header header-elements-inline">-->
				<!--				<h6 class="card-title">Recent Orders</h6>-->
				<!--			</div>-->

						

				<!--			<div class="table-responsive">-->
				<!--				<table class="table text-nowrap">-->
				<!--					<thead>-->
				<!--						<tr>-->
				<!--							<th>Order ID</th>-->
				<!--							<th>Customer Name</th>-->
				<!--							<th>Billing ID</th>-->
				<!--							<th>Grand Total</th>-->
				<!--							<th>Payment Date-Time</th> -->
				<!--						</tr>-->
				<!--					</thead>-->
				<!--					<tbody>-->
				<!--					<?php foreach($orderdata as $ordersrow):?>-->
				<!--						<tr>-->
				<!--							<td><?php echo $ordersrow['order_id'];?></td>-->
				<!--							<td><?php echo $ordersrow['first_name']." ".$ordersrow['last_name'] ;?></td>-->
				<!--							<td><?php echo $ordersrow['billing_id'];?></td>-->
				<!--							<td><?php echo $ordersrow['grand_total'];?></td>-->
				<!--							<td><?php echo $ordersrow['order_date_time'];?></td>-->
				<!--						</tr>-->
				<!--					<?php endforeach ?>-->
				<!--					</tbody>-->
				<!--				</table>-->
				<!--			</div>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
				
				
				<div class="row">
    				<div class="col-xl-12">
					    <div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Recent Payments</h6>
							</div>


							<div class="table-responsive">
								<table class="table text-nowrap">
									<thead>
										<tr>
											<th>Payment ID(#)</th>
											<!--<th>Customer Name</th>-->
											<th>Amount(&#x20b9)</th>
											<th>Payment Method</th> 
											<th>Payment Type</th> 
											<th>Payment Date-Time</th> 
										</tr>
									</thead>
									<tbody>
									<?php foreach($paydata as $payrow):?>
										<tr>
											<td><?php echo $payrow['payment_id'];?></td>
											<!--<td><?php //echo $payrow['service_ask_order_id'];?></td>-->
											<td><?php echo $payrow['payment_amount'];?></td>
											<td><?php echo $payrow['payment_method'];?></td>
											<td><?php echo $payrow['payment_type'];?></td>
											<td><?php echo date("d-m-Y h:i:s", strtotime($payrow['payment_date_time']));?></td>
										</tr>
									<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
    				<div class="col-xl-12">
					    <div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Recent Inquirys</h6>
							</div>

							<div class="table-responsive">
								<table class="table text-nowrap">
									<thead>
										<tr>
											<th>Inquiry ID(#)</th>
											<th>Customer Name</th>
											<th>Service Name</th>
											<th>Inquiry Details</th>
											<th>Inquiry Date</th> 
										</tr>
									</thead>
									<tbody>
									<?php foreach($inqdata as $inqsrow):?>
										<tr>
											<td><?php echo $inqsrow['inquiry_id'];?></td>
											<td><?php echo $inqsrow['first_name']." ".$inqsrow['last_name'] ;?></td>
											<td><?php echo $inqsrow['service_title'];?></td>
											<td><?php echo $inqsrow['inquiry_details'];?></td>
											<td><?php echo date("d-m-Y h:i:s", strtotime($inqsrow['inquiry_date']));?></td>
											
										</tr>
									<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<!--<div class="row">
    				<div class="col-xl-12">
    				    	<div class="card">
							<div class="card-header header-elements-sm-inline">
								<h6 class="card-title">Marketing campaigns</h6>
								<div class="header-elements">
									<span class="badge bg-success badge-pill">28 active</span>
									<div class="list-icons ml-3">
				                		<div class="dropdown">
				                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
											<div class="dropdown-menu">
												<a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
												<a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
												<a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
												<div class="dropdown-divider"></div>
												<a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
											</div>
				                		</div>
				                	</div>
			                	</div>
							</div>

							<div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
								<div class="d-flex align-items-center mb-3 mb-sm-0">
									<div id="campaigns-donut"></div>
									<div class="ml-3">
										<h5 class="font-weight-semibold mb-0">38,289 <span class="text-success font-size-sm font-weight-normal"><i class="icon-arrow-up12"></i> (+16.2%)</span></h5>
										<span class="badge badge-mark border-success mr-1"></span> <span class="text-muted">May 12, 12:30 am</span>
									</div>
								</div>

								<div class="d-flex align-items-center mb-3 mb-sm-0">
									<div id="campaign-status-pie"></div>
									<div class="ml-3">
										<h5 class="font-weight-semibold mb-0">2,458 <span class="text-danger font-size-sm font-weight-normal"><i class="icon-arrow-down12"></i> (-4.9%)</span></h5>
										<span class="badge badge-mark border-danger mr-1"></span> <span class="text-muted">Jun 4, 4:00 am</span>
									</div>
								</div>

								<div>
									<a href="#" class="btn bg-indigo-300"><i class="icon-statistics mr-2"></i> View report</a>
								</div>
							</div>

							<div class="table-responsive">
								<table class="table text-nowrap">
									<thead>
										<tr>
											<th>Campaign</th>
											<th>Client</th>
											<th>Changes</th>
											<th>Budget</th>
											<th>Status</th>
											<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
										</tr>
									</thead>
									<tbody>
										<tr class="table-active table-border-double">
											<td colspan="5">Today</td>
											<td class="text-right">
												<span class="progress-meter" id="today-progress" data-progress="30"></span>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<a href="#">
															<img src="../../../../global_assets/images/brands/facebook.png" class="rounded-circle" width="32" height="32" alt="">
														</a>
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">Facebook</a>
														<div class="text-muted font-size-sm">
															<span class="badge badge-mark border-blue mr-1"></span>
															02:00 - 03:00
														</div>
													</div>
												</div>
											</td>
											<td><span class="text-muted">Mintlime</span></td>
											<td><span class="text-success-600"><i class="icon-stats-growth2 mr-2"></i> 2.43%</span></td>
											<td><h6 class="font-weight-semibold mb-0">$5,489</h6></td>
											<td><span class="badge bg-blue">Active</span></td>
											<td class="text-center">
												<div class="list-icons">
													<div class="dropdown">
														<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
															<a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
															<a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
															<div class="dropdown-divider"></div>
															<a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<a href="#">
															<img src="../../../../global_assets/images/brands/youtube.png" class="rounded-circle" width="32" height="32" alt="">
														</a>
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">Youtube videos</a>
														<div class="text-muted font-size-sm">
															<span class="badge badge-mark border-danger mr-1"></span>
															13:00 - 14:00
														</div>
													</div>
												</div>
											</td>
											<td><span class="text-muted">CDsoft</span></td>
											<td><span class="text-success-600"><i class="icon-stats-growth2 mr-2"></i> 3.12%</span></td>
											<td><h6 class="font-weight-semibold mb-0">$2,592</h6></td>
											<td><span class="badge bg-danger">Closed</span></td>
											<td class="text-center">
												<div class="list-icons">
													<div class="dropdown">
														<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
															<a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
															<a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
															<div class="dropdown-divider"></div>
															<a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<a href="#">
															<img src="../../../../global_assets/images/brands/spotify.png" class="rounded-circle" width="32" height="32" alt="">
														</a>
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">Spotify ads</a>
														<div class="text-muted font-size-sm">
															<span class="badge badge-mark border-grey-400 mr-1"></span>
															10:00 - 11:00
														</div>
													</div>
												</div>
											</td>
											<td><span class="text-muted">Diligence</span></td>
											<td><span class="text-danger"><i class="icon-stats-decline2 mr-2"></i> - 8.02%</span></td>
											<td><h6 class="font-weight-semibold mb-0">$1,268</h6></td>
											<td><span class="badge bg-grey-400">On hold</span></td>
											<td class="text-center">
												<div class="list-icons">
													<div class="dropdown">
														<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
															<a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
															<a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
															<div class="dropdown-divider"></div>
															<a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<a href="#">
															<img src="../../../../global_assets/images/brands/twitter.png" class="rounded-circle" width="32" height="32" alt="">
														</a>
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">Twitter ads</a>
														<div class="text-muted font-size-sm">
															<span class="badge badge-mark border-grey-400 mr-1"></span>
															04:00 - 05:00
														</div>
													</div>
												</div>
											</td>
											<td><span class="text-muted">Deluxe</span></td>
											<td><span class="text-success-600"><i class="icon-stats-growth2 mr-2"></i> 2.78%</span></td>
											<td><h6 class="font-weight-semibold mb-0">$7,467</h6></td>
											<td><span class="badge bg-grey-400">On hold</span></td>
											<td class="text-center">
												<div class="list-icons">
													<div class="dropdown">
														<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
															<a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
															<a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
															<div class="dropdown-divider"></div>
															<a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
														</div>
													</div>
												</div>
											</td>
										</tr>

										<tr class="table-active table-border-double">
											<td colspan="5">Yesterday</td>
											<td class="text-right">
												<span class="progress-meter" id="yesterday-progress" data-progress="65"></span>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<a href="#">
															<img src="../../../../global_assets/images/brands/bing.png" class="rounded-circle" width="32" height="32" alt="">
														</a>
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">Bing campaign</a>
														<div class="text-muted font-size-sm">
															<span class="badge badge-mark border-success mr-1"></span>
															15:00 - 16:00
														</div>
													</div>
												</div>
											</td>
											<td><span class="text-muted">Metrics</span></td>
											<td><span class="text-danger"><i class="icon-stats-decline2 mr-2"></i> - 5.78%</span></td>
											<td><h6 class="font-weight-semibold mb-0">$970</h6></td>
											<td><span class="badge bg-success-400">Pending</span></td>
											<td class="text-center">
												<div class="list-icons">
													<div class="dropdown">
														<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
															<a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
															<a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
															<div class="dropdown-divider"></div>
															<a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<a href="#">
															<img src="../../../../global_assets/images/brands/amazon.png" class="rounded-circle" width="32" height="32" alt="">
														</a>
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">Amazon ads</a>
														<div class="text-muted font-size-sm">
															<span class="badge badge-mark border-danger mr-1"></span>
															18:00 - 19:00
														</div>
													</div>
												</div>
											</td>
											<td><span class="text-muted">Blueish</span></td>
											<td><span class="text-success-600"><i class="icon-stats-growth2 mr-2"></i> 6.79%</span></td>
											<td><h6 class="font-weight-semibold mb-0">$1,540</h6></td>
											<td><span class="badge bg-blue">Active</span></td>
											<td class="text-center">
												<div class="list-icons">
													<div class="dropdown">
														<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
															<a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
															<a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
															<div class="dropdown-divider"></div>
															<a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<a href="#">
															<img src="../../../../global_assets/images/brands/dribbble.png" class="rounded-circle" width="32" height="32" alt="">
														</a>
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">Dribbble ads</a>
														<div class="text-muted font-size-sm">
															<span class="badge badge-mark border-blue mr-1"></span>
															20:00 - 21:00
														</div>
													</div>
												</div>
											</td>
											<td><span class="text-muted">Teamable</span></td>
											<td><span class="text-danger"><i class="icon-stats-decline2 mr-2"></i> 9.83%</span></td>
											<td><h6 class="font-weight-semibold mb-0">$8,350</h6></td>
											<td><span class="badge bg-danger">Closed</span></td>
											<td class="text-center">
												<div class="list-icons">
													<div class="dropdown">
														<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
															<a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
															<a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
															<div class="dropdown-divider"></div>
															<a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
														</div>
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
				    </div>
				</div>-->
				


			<!-- /content area -->





			<!-- Footer -->

			<?php include_once 'footer.php'; ?>

			<!-- /footer -->



		</div>

		<!-- /main content -->

 		

	</div>

<!-- /page content -->





</body>


</html>


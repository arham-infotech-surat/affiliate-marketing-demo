<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>

<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Statuses Orders's List</title>
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
	<script src="<?php echo base_url();?>global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/app.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/demo_pages/datatables_basic.js"></script>

	<!-- /theme JS files -->
</head>



<body class="navbar-top" id="body_bg">
	<!-- Main navbar -->
	<?php  include_once 'header.php'; ?>
	<!-- /main navbar -->
	
	<!-- Page content -->
	<div class="page-content" style="margin-bottom:50px;">
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



			<!-- Page header -->

			<div class="page-header page-header-light">

				<div class="page-header-content header-elements-md-inline">

					<div class="page-title d-flex">

						<p style="font-family: gabriola;font-size: 30px;"><i class="icon-list"></i> <span class="font-weight-bold">Orders's Status list</span></p>

						

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>

					</div>



					<div class="header-elements d-none">

						<div class="d-flex justify-content-center">

							<a href="<?php echo base_url();?>Slider/add_slider" class="btn btn-link btn-float text-default"><i class="icon-diff-added text-primary"></i><span>Add Order</span></a>

							<!-- <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>

							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a> -->

						</div>

					</div>

				</div>



			

			</div>

			<!-- /page header -->





			<!-- Content area -->

			<form method="POST" action="<?php echo base_url();?>Service/Service_MultipleDelete">

			<div class="content">



				<!-- Scrollable datatable -->

				<div class="card">

					<div class="card-header header-elements-inline">

						<h6 class="card-title">Order Status View</h6>
						
						<div class="header-elements">

							<div class="list-icons">

		                		<a class="list-icons-item" data-action="collapse"></a>

		                		<a class="list-icons-item" data-action="reload"></a>

		                		<a class="list-icons-item" data-action="remove"></a>

		                	</div>

	                	</div>

					</div>



					<table class="table datatable-pagination" id="myTable" width="100%">

						<thead>

							<tr>
								<th>Order ID</th>
								<th>Status ID</th>
								<th>Comment</th>
								<th>Added By</th>
								<th>Date Added</th>
							</tr>

						</thead>

						<tbody>

							

							<?php foreach($result as $row) :?>

							<tr>
								<td>#<?php echo $row['order_id'];?></td>
								<td><?php echo $row['status_id '];?></td>
								<td><?php echo $row['comment'];?></td>
								<td><?php echo $row['added_by'];?></td>
								
								<td><?php echo date('m-d-Y',strtotime($row['date_added']));?></td>
								
										
						</tr>

						<?php endforeach ?>

							<tfoot>
								<tr>
									<th>Order ID</th>
									<th>Status ID</th>
									<th>Comment</th>
									<th>Added By</th>
									<th>Date Added</th>
								</tr>


						</tfoot>

							

						</tbody>

					</table>

					</form>

				</div>

				<!-- /scrollable datatable -->



			</div>

			<!-- /content area -->




			<!-- Footer -->

			<?php include_once 'footer.php'; ?>

			<!-- /footer -->



		</div>

		<!-- /main content -->

	

	</div>

<!-- /page content -->



<script>

    function toggle(source) {

      var checkboxes = document.querySelectorAll('input[type="checkbox"]');

      for (var i = 0; i < checkboxes.length; i++){

        if (checkboxes[i] != source)

          checkboxes[i].checked = source.checked;

    }

  }

</script>

<script type="text/javascript">

  $(document).ready( function () {

    $('#myTable').DataTable();

} );

</script>



</body>


</html>


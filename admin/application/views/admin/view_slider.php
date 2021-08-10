<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Slider's List</title>
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
	<script src="<?php echo base_url();?>global_assets/js/plugins/forms/selects/select2.min.js"></script>
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
							<p style="font-family: gabriola;font-size: 30px;"><i class="icon-list"></i> <span class="font-weight-bold">Slider's list</span></p>
							<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
						</div>

						<div class="header-elements d-none">
							<div class="d-flex justify-content-center">
								<a href="<?php echo base_url();?>Slider/add_slider" class="btn btn-link btn-float text-default"><i class="icon-diff-added text-primary"></i><span>Add Slider</span></a>
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
					<!---------------------Alert------------------------------------>
									<?php if ($this->session->flashdata('success')) { ?>
									  <div class="alert alert-success">
									  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									  <?php echo $this->session->flashdata('success') ?> </div>
									  <?php $this->session->unset_userdata('success'); ?>
									<?php } ?>
									
									<?php if($this->session->flashdata('error')) { ?>
									  <div class="alert alert-danger">
									  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									  <?php echo $this->session->flashdata('error') ?> </div>
									  <?php $this->session->unset_userdata('error'); ?>
									<?php } ?>
									
					<!---------------------Alert End------------------------------------>
				<!-- Scrollable datatable -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h6 class="card-title">Slider View</h6>
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
								<th>Slider Image</th>
								<th>Slider Title</th>
								<th>Active/Deactive</th>
								<th>Date Added</th>
								<th>Date Updated</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>

						</thead>

						<tbody>

							

							<?php foreach($result as $row) :?>
							<tr>
								<td>
									
									<?php if(isset($row['slider_img']) && !empty($row['slider_img'])){?>
	  								<image src="<?php echo base_url()."assets/Uploads/Images/Slider/".$row['slider_img'];?>" height="150px" width="400px">
	  								<?php } else {?>
	  								<image src="<?php echo base_url();?>assets/Uploads/Images/Slider/default.png" height="150px" width="400px">
	  								<?php } ?>
									
								</td>
								<td><?php echo $row['slider_title']; ?></td>
								<td><?php if ($row['slider_status']==0) { echo "<h6><span class='badge badge-danger'>Not Publish</span></h6>"; } else { echo "<h6><span class='badge badge-success'>Publish</span></h6>";}?></td>
								<td><?php echo date('m-d-Y',strtotime($row['date_added']));?></td>
								<td><?php echo date('m-d-Y',strtotime($row['date_updated']));?></td>
					          	<td>
									<a href="<?php echo base_url();?>Slider/edit_slider/<?php echo $row['slider_id'];?>" name="project_edit"><i class="icon-database-edit2 text-success"></i></a>
								</td>	
								<td>
									<a href="<?php echo base_url();?>Slider/delete_slider/<?php echo $row['slider_id'];?>" onclick="return confirm('Are you sure you want to Delete this Sub-Admin?')"><i class="icon-trash text-danger"></i></a>

								</td>									
							</tr>

						<?php endforeach ?>

							<tfoot>
								<tr>
								<th>Slider Image</th>
								<th>Slider Title</th>
								<th>Active/Deactive</th>
								<th>Date Added</th>
								<th>Date Updated</th>
								<th>Edit</th>
								<th>Delete</th>
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



<!-- <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script> -->
<script>
$(document).ready(function() {
    $(".alert-success").fadeTo(1000, 500).slideUp(200, function(){
    $(".alert-success").slideUp(800);
  });
  });
</script>

<script>
$(document).ready(function() {
    $(".alert-danger").fadeTo(1000, 500).slideUp(200, function(){
    $(".alert-danger").slideUp(800);
  });
  });
</script>

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

<!-- <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> -->





</body>



<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/datatable_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Jan 2021 06:11:28 GMT -->

</html>


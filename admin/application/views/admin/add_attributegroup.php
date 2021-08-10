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

	<title>Add Attribute | <?php echo $this->config->item('web_title'); ?></title>



	<!-- Global stylesheets -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

	<link href="<?php echo base_url();?>global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">

	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<link href="<?php echo base_url();?>assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">

	<link href="<?php echo base_url();?>assets/css/layout.min.css" rel="stylesheet" type="text/css">

	<link href="<?php echo base_url();?>assets/css/components.min.css" rel="stylesheet" type="text/css">

	<link href="<?php echo base_url();?>assets/css/colors.min.css" rel="stylesheet" type="text/css">

	<!-- /global stylesheets -->

	<!-- dropify -->

    <link href="<?php echo base_url();?>assets/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

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

	<script src="<?php echo base_url();?>global_assets/js/plugins/ui/perfect_scrollbar.min.js"></script>

	<script src="<?php echo base_url();?>global_assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/demo_pages/form_validation.js"></script>
	<script src="<?php echo base_url();?>global_assets/js/plugins/forms/styling/uniform.min.js"></script>



	<script src="<?php echo base_url();?>assets/js/app.js"></script>

	<script src="<?php echo base_url();?>global_assets/js/demo_pages/login_validation.js"></script>

	<script src="<?php echo base_url();?>global_assets/js/demo_pages/form_inputs.js"></script>



	

	

	<!-- /theme JS files -->

	 <!-- dropify js -->

    <script src="<?php echo base_url();?>assets/dropify/dropify.min.js"></script>

	<!-- form-upload init -->

    <script src="<?php echo base_url();?>assets/dropify/form-fileupload.init.js"></script>

	<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>

	



	<style type="text/css">

		#error{

			color:red;

			font-size: 11px;

			margin-top: 5px;

			margin-left: 2px;

		}

	</style>

</head>



<body class="navbar-top">



	<!-- Main navbar -->

	

	<!-- /main navbar -->



<?php include_once 'header.php'; ?>

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

			<?php include_once 'sidebar.php'; ?>

			<!-- /sidebar content -->

			

		</div>

		<!-- /main sidebar -->

			<div class="content-wrapper">

			<div class="page-header page-header-light">

				<div class="page-header-content header-elements-md-inline">

					<div class="page-title d-flex" >

						<p style="font-family: gabriola;font-size: 30px;"><i class="icon-file-plus2"></i> <span class="font-weight-bold">Add Attribute Group</span></p>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>

					</div>



					<div class="header-elements d-none">

						<div class="d-flex justify-content-center">

							<a href="<?php echo base_url();?>Attribute" class="btn btn-link btn-float text-default"><i class="icon-eye text-primary"></i><span>View Attributes Group</span></a>


						</div>

					</div>

				</div>



			</div>



		<!-- Main content -->

		<div class="content" style="margin-bottom: 50px;">



			<!-- Content area -->

			<!-- <div class="content justify-content-center align-items-center"> -->



				<!-- Registration form -->



				

						<div class="card">

							<div class="card-header header-elements-inline">

								<h5 class="card-title"></h5>

								<div class="header-elements">

									<div class="list-icons">

				                		<a class="list-icons-item" data-action="collapse"></a>

				                		<a class="list-icons-item" data-action="reload"></a>

				                		<a class="list-icons-item" data-action="remove"></a>

				                	</div>

			                	</div>

							</div>



							<div class="card-body">

								<!---------------------Alert------------------------------------>

							    <?php if ($this->session->flashdata('error')) { ?>

							      <div class="alert alert-danger">

							      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

							      <?php echo $this->session->flashdata('success') ?> </div>

							    <?php } ?>

							    <!---------------------Alert End------------------------------------>

								<div class="text-center mb-3">

									<i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>

									<h5 class="mb-0">Add Attribute Group</h5>

									<span class="d-block text-muted">All fields are required</span>

								</div>

								<form action="<?php echo base_url();?>AttributeGroup/add" method="POST" enctype="multipart/form-data" class="form-validate-jquery">
                                
                                <div class="row">
								
        							<div class="col-md-6">
        								<div class="form-group">
        									<label>Attribute Group Name:</label>
        									<input type="text" class="form-control" name="attribute_group_name" required>
        								</div>
        							</div>
							

    								
								</div>


									<div class="text-left">
										<input type="submit" name="add" class="btn" value="Add"  style="background-color: #39cccc;color:white;">

										<a href="<?php echo base_url();?>Attribute" type="submit" name="Cancel"  class="btn" style="margin-left: 10px;background-color: rgba(0,0,0,.5);color:white;">Cancel</a>

										

									</div>



								</form>



							</div>

						</div>

				

				<!-- /registration form -->



			<!-- </div> -->

			<?php include_once 'footer.php'; ?>

			<!-- /content area -->

		</div>

		<!-- /main content -->

	</div>

</div>

<!--------------------- Alert Script ------------------->

<script>

$(document).ready(function() {

    $(".alert-success").fadeTo(1000, 500).slideUp(200, function(){

    $(".alert-success").slideUp(800);

  });

  });





</script>

<script type="text/javascript">

	function readURL(input) {

		if (input.files && input.files[0]) {

			var reader = new FileReader();

			

			reader.onload = function (e) {

				$('#profile-img-tag').attr('src', e.target.result);

			}

			reader.readAsDataURL(input.files[0]);

		}

	}

	$("#profile-img").change(function(){

		readURL(this);

	});

</script>





<!--------------------- Alert Script End------------------->

	<!-- /page content -->



</body>



<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Jan 2021 06:03:24 GMT -->

</html>


<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>



<!DOCTYPE html>

<html lang="en">



<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/login_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Jan 2021 06:18:04 GMT -->

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Master Admin</title>



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

	<script src="<?php echo base_url();?>global_assets/js/plugins/forms/validation/validate.min.js"></script>

	<script src="<?php echo base_url();?>global_assets/js/plugins/forms/styling/uniform.min.js"></script>



	<script src="<?php echo base_url();?>assets/js/app.js"></script>

	<script src="<?php echo base_url();?>global_assets/js/demo_pages/login_validation.js"></script>

	<!-- /theme JS files -->
    <style>
        .header__fixed {
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        z-index: 100;
    }
    .background-gradent{
        background: #0F2027;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #2C5364, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    </style>


</head>



<body class="background-gradent">

<?php //include_once "header_1.php"; ?>

	



	<!-- Page content -->

	<div class="page-content">



		<!-- Main content -->

		<div class="content-wrapper">



			<!-- Content area -->

			<div class="content d-flex justify-content-center align-items-center">



				<!-- Login card -->

				<form class="login-form form-validate" method="POST" action="<?php echo base_url();?>Login/login_admin" enctype="multipart/form-data">

					<div class="card mb-0">

						<div class="card-body">

							<div class="text-center mb-3"><br>

								<!-- <img src="<?php //echo base_url()?>/assets/Uploads/Images/Sky International.png" style="height:35px; width:200px; "><br><br> -->
								<h2 style="font-family: emoji;"><b>MASTER ADMIN</b></h2>
								<!--<img src="<?php //echo base_url();?>assets/Uploads/Images/aadri2.png" style="height:50px;width:200px;"><br><br>-->
								<h5 class="mb-0">Login to your account</h5>

								<span class="d-block text-muted">Your credentials</span>

							</div>



							<div class="form-group form-group-feedback">

								<input type="text" class="form-control" name="uname" placeholder="Enter User Name" required>

								

							</div>



							<div class="form-group form-group-feedback">

								<input type="password" class="form-control" name="password" placeholder="Enter Password" required>

								

							</div>

							

							<div class="form-group">

								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>

							</div>



					

						</div>

					</div>

				</form>

				<!-- /login card -->



			</div>

			<!-- /content area -->





		</div>

		<!-- /main content -->



	</div>

	<!-- /page content -->



</body>



<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/login_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Jan 2021 06:18:04 GMT -->

</html>


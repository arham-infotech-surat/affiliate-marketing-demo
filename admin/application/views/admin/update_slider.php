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
	<title>Update Sliders | <?php echo $this->config->item('web_title'); ?></title>



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
		<?php include_once 'header.php'; ?>
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
				<?php include_once 'sidebar.php'; ?>
			<!-- /sidebar content -->
		</div>

		<!-- /main sidebar -->
			<div class="content-wrapper">
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex" >
						<p style="font-family: gabriola;font-size: 30px;"><i class="icon-file-plus2"></i> <span class="font-weight-bold">Update Slider</span></p>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a href="<?php echo base_url();?>Slider" class="btn btn-link btn-float text-default"><i class="icon-eye text-primary"></i><span>View Slider</span></a>
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
								<div class="text-center mb-3">
									<i class="icon-pencil7 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
									<h5 class="mb-0">Update Slider</h5>
									<span class="d-block text-muted">All fields are required</span>
								</div>
							
							<?php foreach($slider as $row):?>
								<form action="<?php echo base_url();?>Slider/update_slider/<?php echo $row['slider_id'];?>" method="POST" enctype="multipart/form-data" class="form-validate-jquery">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Slider Title:</label>
												<input type="text" class="form-control" name="slider_title" value="<?php echo $row['slider_title'];?>" placeholder="Enter Slider Title">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Slider Name:</label>
												<input type="text" class="form-control" name="slider_name" value="<?php echo $row['slider_name'];?>" placeholder="Enter Slider Name">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Slider Link:</label>
												<input type="text" class="form-control" name="slider_link" value="<?php echo $row['slider_link'];?>" placeholder="Enter Slider Link">
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Slider Image:</label>
												<input type="file" id="slider-img" class="form-control-uniform-custom" name="slider_img"><br>
												<input type="hidden" id="slider-img" class="form-control-uniform-custom" name="oldimg" value="<?php echo $row['slider_img'];?>"><br>
												<img src="<?php echo base_url();?>assets/Uploads/Images/Slider/<?php echo $row['slider_img'];?>" id="slider-img-tag" height="150px" width="400px"><br><br>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-12">
											<label class="control-label" for="product_img">Slider Description	:</label>
											<textarea type="text" class="ckeditor" name="slider_desc" required><?php echo $row['slider_desc'];?></textarea>
										</div>
									</div><br>
									
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>Slider Status:</label>
												<select class="form-control" name="slider_status">
													<option Value="0" <?php if($row['slider_status']=='0') {echo 'selected';}?>>Not Publish</option>
													<option Value="1" <?php if($row['slider_status']=='1') {echo 'selected';}?>>Publish</option>
												</select>
											</div>
										</div>
									</div>

									<div class="text-left">
										<input type="submit" name="btn_update_slider" class="btn" value="Update"  style="background-color: #39cccc;color:white;">
										<a href="<?php echo base_url();?>Slider" type="submit" name="Cancel"  class="btn" style="margin-left: 10px;background-color: rgba(0,0,0,.5);color:white;">Cancel</a>
									</div>
								</form>
							<?php endforeach ?>
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

<!--Alert Script-->

<script type="text/javascript">
	$(document).ready(function() {
    $("input[name$='show_select']").click(function() {
        var test = $(this).val();

        $("div.desc").hide();
        $("#Show" + test).show();
    });
});
</script>

<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#slider-img-tag').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	
	$("#slider-img").change(function(){
		readURL(this);
	});
</script>


<!--End Alert Script-->
	<!-- /page content -->

</body>
</html>


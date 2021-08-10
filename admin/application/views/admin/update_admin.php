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
	<title>Update Admin | <?php echo $this->config->item('web_title'); ?></title>

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
        .adjust_btns{
            margin-top: 10px;
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
						<p style="font-family: gabriola;font-size: 30px;"><i class="icon-file-plus2"></i> <span class="font-weight-bold">Update Admin</span></p>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>



					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a href="<?php echo base_url();?>Admin" class="btn btn-link btn-float text-default"><i class="icon-eye text-primary"></i><span>View Admin's</span></a>
							<!-- <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>

							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a> -->
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
									<h5 class="mb-0">Update Admin</h5>
									<span class="d-block text-muted">All fields are required</span>
								</div>
							<?php foreach($result as $row):?>
								<form action="<?php echo base_url();?>Admin/update_admin/<?php echo $row['id'];?>" method="POST" enctype="multipart/form-data" class="form-validate-jquery">
									<div class="row">
										<div class="col-sm-4">
											<label class="control-label" for="admin_name">Admin Name:</label>
											<input type="text" class="form-control" placeholder="Enter Admin Name" name="admin_name" value="<?php echo $row['admin_name'];?>" autocomplete="off" required>
										</div>
										
										<div class="col-sm-4">
											<label class="control-label" for="admin_email">Admin Email:</label>
											<input type="email" class="form-control" placeholder="Enter Admin Email" name="admin_email" value="<?php echo $row['admin_email'];?>" autocomplete="off" required>
										</div> 
										<div class="col-sm-4">
											<label class="control-label" for="admin_pwd">Admin Password:</label>
											<input type="text" class="form-control" placeholder="Enter Admin Password" name="admin_pwd" value="<?php echo $row['admin_pwd'];?>" autocomplete="off" required>
										</div>
									</div><br>
								
										<div class="row">
											<div class="col-sm-4">
												<label class="control-label" for="admin_phno">Admin Phno:</label>
												<input type="number" class="form-control" placeholder="Enter Admin Phno" name="admin_phno" value="<?php echo $row['admin_phno'];?>" autocomplete="off" required>
											</div>
											
											<!--<div class="col-sm-4">
												<label class="control-label" for="admin_phno">Admin Status:</label>
												<select class="form-control">
													<option selected hidden>Select</option>
													<option value="0" <?php //if($row['admin_status']=="0") {echo 'selected';}?>>Block</option>
													<option value="1" <?php //if($row['admin_status']=="1") {echo 'selected';}?>>Unblock</option>
												</select>
											</div>-->
											
											<div class="col-sm-4">
												<label class="control-label" for="admin_email">Permission's:</label><br>
												Create  : <input type="radio" value="1" name="is_create" <?php if($row['is_create']=='1') {echo 'checked';}?>>  Yes
														  <input type="radio" value="0" name="is_create" <?php if($row['is_create']=='0') {echo 'checked';}?>>  No<br>
												Read    : <input type="radio" value="1" name="is_read"   <?php if($row['is_read']=='1')   {echo 'checked';}?>>  Yes
														  <input type="radio" value="0" name="is_read"   <?php if($row['is_read']=='0')   {echo 'checked';}?>>  No<br>
												Delete  : <input type="radio" value="1" name="is_delete" <?php if($row['is_delete']=='1') {echo 'checked';}?>>  Yes
														  <input type="radio" value="0" name="is_delete" <?php if($row['is_delete']=='0') {echo 'checked';}?>>  No<br>
												Edit    : <input type="radio" value="1" name="is_edit"   <?php if($row['is_edit']=='1')   {echo 'checked';}?>>  Yes
														  <input type="radio" value="0" name="is_edit"   <?php if($row['is_edit']=='0')   {echo 'checked';}?>>  No<br>
											</div> 
									</div>
									
									
									
	                                <div class="adjust_btns">
	                                    <input type="submit" name="update" id="submit" class="btn btn-info" value="Update"/>
										<a href="<?php echo base_url();?>Admin" class="btn" style="margin-left: 10px;background-color: rgba(0,0,0,.5);color:white;">Cancel</a>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity=<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />


<!--------------------- Alert Script ------------------->
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

<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#product-img-tag').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	
	$("#product_img").change(function(){
		readURL(this);
	});
</script>

	<script>
		function getsubatt(val){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>Attributes/getattribute",
				data: 'attribute_group_id='+val,
				success: function(data){
					$("#attri_id").html(data);
				}
			});
		}
	</script>

<!--------------------- Alert Script End------------------->

	<!-- /page content -->
</body>
</html>


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
	<title>Add Products | <?php echo $this->config->item('web_title'); ?></title>

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
						<p style="font-family: gabriola;font-size: 30px;"><i class="icon-file-plus2"></i> <span class="font-weight-bold">Add Product's</span></p>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>



					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a href="<?php echo base_url();?>Products" class="btn btn-link btn-float text-default"><i class="icon-eye text-primary"></i><span>View Products</span></a>
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
								<!---------------------Alert------------------------------------>
							    <?php if ($this->session->flashdata('success')) { ?>
							      <div class="alert alert-success">
							      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							      <?php echo $this->session->flashdata('success') ?> </div>
								 <?php $this->session->unset_userdata('success'); ?>
							    <?php } ?>
							    <!---------------------Alert End------------------------------------>
								
								<div class="text-center mb-3">
									<i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
									<h5 class="mb-0">Add Product</h5>
									<span class="d-block text-muted">All fields are required</span>
								</div>

								<form action="<?php echo base_url();?>Products/add_products" method="POST" enctype="multipart/form-data" class="form-validate-jquery">
									<div class="row">
										<div class="col-sm-4">
											<label class="control-label" for="product_name">Product Name:</label>
											<input type="text" class="form-control" id="product_name" placeholder="Enter Product Name" name="product_name" autocomplete="off" required>
										</div>
										
										<div class="col-sm-4">
											<label class="control-label" for="product_current_price">Product Current Price:</label>
											<input type="number" class="form-control" placeholder="Enter Product Current Price" name="product_current_price" autocomplete="off" required>
										</div> 
										<div class="col-sm-4">
											<label class="control-label" for="product_previous_price">Product Previous Price:</label>
											<input type="number" class="form-control" placeholder="Enter Product Previous Price" name="product_previous_price" autocomplete="off" required>
										</div>
									</div><br>
										
									<div class="row">
										<div class="col-sm-6">
											<label class="control-label" for="category">Category:</label>
											<select class="form-control" name="cat_id" required>
												<option selected hidden value="">Select Category</option>
												<?php foreach($cat_result as $row): ?>
													<option value="<?php echo $row['cat_id']?>"><?php echo $row['cat_name'];?></option>
												<?php endforeach ?>
											</select>
										</div>
										
										<div class="col-sm-6">
											<label class="control-label" for="description">Brand:</label>
											<select class="form-control" name="brand_id" required>
												<option selected hidden value="">Select Brand</option>
												<?php foreach($brand as $brandrow): ?>
													<option value="<?php echo $brandrow['brand_id']?>"><?php echo $brandrow['brand_name'];?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div><br>
									
									<div class="row">
										<div class="col-sm-6">
											<label class="control-label" for="product_img">Product Image:</label>
											<input type="file" id="product_img" multiple class="form-control-uniform-custom" name="product_img" required><br>
											<img src="<?php echo base_url();?>assets/Uploads/Images/Slider/default.png" id="product-img-tag" height="150"  width="250"><br><br>
										</div>
										<div class="col-sm-6">
											<label class="control-label" for="product_img">Product Affiliate Link:</label>
											<input type="url" class="form-control" name="product_affiliate_link" placeholder="Enter Affiliate Link" required><br>
										</div>
									</div><br>
									
									<div class="row">
										<div class="col-sm-12">
											<label class="control-label" for="product_img">Product Description	:</label>
											<textarea type="text" class="ckeditor" name="product_desc" placeholder="Enter Product Description" col="150" required></textarea>
										</div>
									</div>
	        
	                                <div class="adjust_btns">
	                                    <input type="submit" name="btn_add" id="submit" class="btn btn-info" value="Submit" />
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity=<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />


<!--------------------- Alert Script ------------------->

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


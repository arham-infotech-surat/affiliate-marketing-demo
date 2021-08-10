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

	<title>Add Orders | <?php echo $this->config->item('web_title'); ?></title>



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

						<p style="font-family: gabriola;font-size: 30px;"><i class="icon-file-plus2"></i> <span class="font-weight-bold">Add Orders</span></p>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>

					</div>



					<div class="header-elements d-none">

						<div class="d-flex justify-content-center">

							<a href="<?php echo base_url();?>Orders" class="btn btn-link btn-float text-default"><i class="icon-eye text-primary"></i><span>View Orders</span></a>

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
									<h5 class="mb-0">Add Data</h5>
									<span class="d-block text-muted">All fields are required</span>
								</div>

								<form action="<?php echo base_url();?>Orders/add_orders" method="POST" enctype="multipart/form-data">
	                                <div id="dynamic_field">	
	                                    <div class="row" style="margin-left:0px; margin-right:0px;background-color: #f9f9f9;padding: 10px 0px;border-radius: 5px;border: 1px dashed #c5c5c5;">
	                                        <div class="col-sm-3">
	                                            <label class="control-label" for="customer_id">Customers:</label>
	                                    		<select class="form-control" name="customer_id"  onChange="get_cust_att(this.value);" id="select-state">
												 <option value="">Select Customers</option>
	    											
    												<?php foreach($cust_data as $row):?>
	    												<option value="<?php echo $row['customer_id'];?>"><?php echo $row['name'];?></option>
	    											<?php endforeach ?>
    											</select>
	                                        </div>
	                                        <div class="col-sm-3">
	                                            <label class="control-label" for="cust_add">Customer Billing & Shipping Address:</label>
	                                            <p id="cust_address" name="cust_address" style="background-color: #ffffff;border: 1px solid #ddd; border-radius: .1875rem;width:100%; padding: .4375rem .875rem;height: calc(1.5385em + .875rem + 2px);"> <o style="color:#999;">No Data Yet..</o> </p>
	                                        </div>
	                                        <div class="col-sm-3">
	                                    		<label class="control-label" for="notes">Order Notes:</label>
	                                    		 <input type="text" class="form-control" id="notes" placeholder="Enter Note" name="order_note" autocomplete="off">
	                                    	</div>
	                                    	 <div class="col-sm-3">
	                                            <label class="control-label" for="prod_img[]">Audio File:</label>
	                                            <input  type="file" id="prod_img[]" multiple class="form-control-uniform-custom" name="order_audio_file" required>
	                                        </div>
	                                    </div>
	                                     <div class="row"  style="margin-left:0px; margin-right:0px;margin-top:10px;background-color: #f9f9f9;padding: 10px 0px;border-radius: 5px;border: 1px dashed #c5c5c5;">
											<div class="col-sm-6">
	                                    		<label class="control-label" for="comment">Comment:</label>
	                                    		<input type="text" class="form-control" id="comment" placeholder="Enter Comment" name="comment" autocomplete="off">
	                                    	</div>
											
	                                    	<div class="col-sm-6">
	                                    		<label class="control-label" for="attribute_group_id">Added By:</label>
	                                    		<input type="text" class="form-control" id="addedby" placeholder="Added By" name="added_by" autocomplete="off">
	                                    	</div>
	                                    </div>
	                                    <div class="row" style="margin-left:0px; margin-right:0px;margin-top:10px;background-color: #f9f9f9;padding: 10px 0px;border-radius: 5px;border: 1px dashed #c5c5c5;">
											<div class="col-sm-2">
	                                    		<label class="control-label" for="attribute_group_id">Product:</label>
	                                    		<select class="form-control" name="product_id[]" value="">
												 <option value="">Select Product </option>
	    											<?php foreach($prod_data as $row):?>
	    												<option value="<?php echo $row['product_id'];?>"><?php echo $row['name'];?></option>
	    											<?php endforeach ?>
    											</select>
	                                    	</div>
											
	                                    	<div class="col-sm-2">
	                                    		<label class="control-label" for="attribute_group_id">Product Colour:</label>
	                                    		<select class="form-control" name="colour_id[]" value="">
												<option value="">Select Product Colour</option>
	    										
    												<?php foreach($colour_data as $row):?>
	    												<option value="<?php echo $row['colour_id'];?>"><?php echo $row['name'];?></option>
	    											<?php endforeach ?>
    											</select>
	                                    	</div>
	                                    	<div class="col-sm-1">
	                                    		<label class="control-label" for="quantity">Quantity:</label>
	                                    		 <input type="number" class="form-control" id="quantity" placeholder="Qty" name="quantity[]" autocomplete="off">
	                                    	</div>
	                                    	<div class="col-sm-2">
	                                    		<label class="control-label" for="price_per_meter">Price Per Meter:</label>
	                                    		 <input type="number" class="form-control" id="price_per_meter" placeholder="Price Per Meter" name="price_per_meter[]" autocomplete="off">
	                                    	</div> 
	                                    	<div class="col-sm-1">
	                                    		<label class="control-label" for="notes">Notes:</label>
	                                    		 <input type="text" class="form-control" id="notes" placeholder="Enter Note" name="notes[]" autocomplete="off">
	                                    	</div> 
	                                    	<div class="col-sm-3">
	                                            <label class="control-label" for="audio_file">Order Audio File:</label>
	                                            <input  type="file" id="audio_file" multiple class="form-control-uniform-custom" name="audio_file[]" required>
	                                        </div>
	                                         <div class="col-sm-1">
	                                    		<label class="control-label" style="color:#ffffff;">----------</label>
	                                    		<a type="button" name="btn_add_more" id="add" class="btn btn-success" style="float:right;"><i class="icon-plus2" style="color:#ffffff;"></i></a> 
	                                    	</div> 
	                                    </div> 
	                                    
	                                </div> 
	                                <div class="adjust_btns">
	                                    <input type="submit" name="btn_orders_add" id="submit" class="btn btn-info" value="Submit" />
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

<!--------------------- Alert Script ------------------->

<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;             
           $('#dynamic_field').append('<div id="row'+i+'"><hr style="margin-top: 10px;margin-bottom: 10px;"><div class="row"  style="margin-left:0px; margin-right:0px;margin-top:10px;background-color: #f9f9f9;padding: 10px 0px;border-radius: 5px;border: 1px dashed #c5c5c5;"><div class="col-sm-2"><label class="control-label" for="attribute_group_id">Product:</label><select class="form-control" name="product_id[]" value=""><option value="">Select Product</option><?php foreach($prod_data as $row):?><option value="<?php echo $row['product_id'];?>"><?php echo $row['name'];?></option><?php endforeach ?></select></div><div class="col-sm-2"><label class="control-label" for="attribute_group_id">Product Colour:</label><select class="form-control" name="colour_id[]" value=""><option value="">Select Product Colour</option><?php foreach($colour_data as $row):?><option value="<?php echo $row['colour_id'];?>"><?php echo $row['name'];?></option><?php endforeach ?></select></div><div class="col-sm-1"><label class="control-label" for="quantity">Quantity:</label><input type="number" class="form-control" id="quantity" placeholder="Qty" name="quantity[]" autocomplete="off"></div><div class="col-sm-2"><label class="control-label" for="price_per_meter">Price Per Meter:</label><input type="number" class="form-control" id="price_per_meter" placeholder="Price Per Meter" name="price_per_meter[]" autocomplete="off"></div> <div class="col-sm-2"><label class="control-label" for="notes">Notes:</label> <input type="text" class="form-control" id="notes" placeholder="Enter Note" name="notes[]" autocomplete="off"></div> <div class="col-sm-2"> <label class="control-label" for="prod_img[]">Order Audio File:</label><input  type="file" id="audio_file" multiple class="form-control-uniform-custom" name="audio_file[]" required></div><div class="col-sm-1"><label class="control-label" style="color:#ffffff;">----------</label><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="float:right;"><i class="icon-cross2" style="color:#ffffff;"></i></button> </div> </div></div>');
     });
     
     $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id"); 
           var res = confirm('Are You Sure You Want To Delete This?');
           if(res==true){
           $('#row'+button_id+'').remove();  
           $('#'+button_id+'').remove();  
           }
      });  
  
    });  
</script>

<script>
	function get_cust_att(val){
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>Customer/get_cust_address",
			data: 'customer_id='+val,
			success: function(data){
				$("#cust_address").html(data);
			}
		});
	}
	
	  $(document).ready(function () {
				  $('select').selectize({
					  sortField: 'text'
				  });
	    });
</script>
<!--------------------- Alert Script End------------------->

	<!-- /page content -->



</body>



</html>


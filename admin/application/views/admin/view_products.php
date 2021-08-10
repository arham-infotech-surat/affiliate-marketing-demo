<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_data=$this->session->userdata('newdata');
?>

<!DOCTYPE html>

<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Product's List</title>
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
	 <div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog" style="max-width: 70%;">
						  <!-- Modal content-->
						  <div class="modal-content">
							<div class="modal-header">
							  <h4>Product Details</h4>
							</div>
							<div class="modal-body" style="padding: 0px 20px 20px;">
							  <p>Some text in the modal.</p>
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#00000080;color:#fff;">Close</button>
							</div>
						  </div>
						  
						</div>
					  </div>
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

						<p style="font-family: gabriola;font-size: 30px;"><i class="icon-list"></i> <span class="font-weight-bold">Product's list</span></p>

						

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>

					</div>



					<div class="header-elements d-none">

						<div class="d-flex justify-content-center">
							<?php if($user_data['is_create']=="1") { ?>
							<a href="<?php echo base_url();?>Products/add_products" class="btn btn-link btn-float text-default"><i class="icon-diff-added text-primary"></i><span>Add Products</span></a>
							<?php } ?>

						</div>

					</div>

				</div>



			

			</div>

			<!-- /page header -->





			<!-- Content area -->


			<div class="content">
					<?php if($this->session->flashdata('error')) { ?>
					  <div class="alert alert-danger">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <?php echo $this->session->flashdata('error') ?> </div>
					  <?php $this->session->unset_userdata('error'); ?>
					<?php } ?>
						
						<?php if ($this->session->flashdata('success')) { ?>
							  <div class="alert alert-success">
							  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <?php echo $this->session->flashdata('success') ?> </div>
							 <?php $this->session->unset_userdata('success'); ?>
						<?php } ?>

				<!-- Scrollable datatable -->

				<div class="card">

					<div class="card-header header-elements-inline">

						<h6 class="card-title">Product View</h6>
						
						<div class="header-elements">

							<div class="list-icons">

		                		<a class="list-icons-item" data-action="collapse"></a>

		                		<a class="list-icons-item" data-action="reload"></a>

		                		<a class="list-icons-item" data-action="remove"></a>

		                	</div>

	                	</div>

					</div>


				<?php if($user_data['is_read']=="1") { ?>
					<table class="table datatable-pagination" id="myTable" width="100%">

						<thead>

							<tr>
								<th>Image</th>
								<th>Name</th>
								<th>Product Previous Price</th>
								<th>Product Current Price</th>
								<th>Active/Deactive</th>
								<th>View Description</th>
								<th>Date Added</th>
								<th>Date Updated</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>

						</thead>

						<tbody>

						
							<?php foreach($products as $row) :?>
							<tr>
								<td>
									<?php if(isset($row['product_img']) && !empty($row['product_img'])){?>
	  								<image src="<?php echo base_url()."assets/Uploads/Images/Products/".$row['product_img'];?>" height="150px" width="150px">
	  								<?php } else {?>
	  								<image src="<?php echo base_url();?>assets/Uploads/Images/Products/default.png" height="150px" width="150px">
	  								<?php } ?>
								</td>
								<td><?php echo $row['product_name'];?></td>
								<td style="text-decoration-line:line-through;"><?php echo "₹ ".$row['product_previous_price'];?></td>
								<td><?php echo "₹ ".$row['product_current_price'];?></td>
								<td><?php if ($row['product_status']==0) { echo "<h6><span class='badge badge-danger'>Not Publish</span></h6>"; } else { echo "<h6><span class='badge badge-success'>Publish</span></h6>";}?></td>
								<td>
								    <button type="button" id="def" class="btn" data-id="<?php echo $row['product_id'];?>" data-toggle="modal" data-target="#myModal" style="background-color: #dfdfdf;padding: 0px 5px 0px 5px;"><i class="icon-eye"></i></button>
								</td>
								<td><?php echo date('m-d-Y',strtotime($row['product_date_added']));?></td>
								<td><?php echo date('m-d-Y',strtotime($row['product_updated_date']));?></td>
					          	<td>
								<?php if($user_data['is_edit']=="1") { ?>
									<a href="<?php echo base_url();?>Products/edit_product/<?php echo $row['product_id'];?>"><i class="icon-database-edit2 text-success"></i></a>
								<?php } else {echo '<span class="badge badge-danger">No Permission</span>';} ?>
								</td>	
								<td>
								<?php if($user_data['is_delete']=="1") { ?>
									<a href="<?php echo base_url();?>Products/delete_product/<?php echo $row['product_id'];?>" onclick="return confirm('Are you sure you want to Delete this Product?')"><i class="icon-trash text-danger"></i></a>
								<?php } else {echo '<span class="badge badge-danger">No Permission</span>';} ?>
								</td>									
							</tr>
							<?php endforeach ?>
						

							<tfoot>
								<th>Image</th>
								<th>Name</th>
								<th>Product Previous Price</th>
								<th>Product Current Price</th>
								<th>Active/Deactive</th>
								<th>View Description</th>
								<th>Date Added</th>
								<th>Date Updated</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>


						</tfoot>

							

						</tbody>

					</table>
					<?php } else { ?>

							<div class="container alert alert-warning" style="align:center">
								No Permission To view
							</div>
					<?php } ?>


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

  $(document).ready( function () {

    $('#myTable').DataTable();

} );

</script>

<!-- <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> -->
<script>
	$(document).on("click", "#def", function () {
		 var product_id = $(this).data('id');
		 //alert(product_id);
		  $.ajax({
					   type: "POST",
					   url: "<?php echo base_url();?>"+"Products/view_product_details/"+product_id,
					   data: { product_id:product_id  },
					   success: function(response){ 
					       //  if (response == 'success') 
                                    $('.modal-body').html(response);
                                // else 
                                //     $('.modal-body').html("<p>No Data Found</p>");
                            					        
								  // Add response in Modal body
								  
								  // Display Modal
								//  $('#campModal').modal('show'); 
						}
					
				});
	});

</script>




</body>




</html>


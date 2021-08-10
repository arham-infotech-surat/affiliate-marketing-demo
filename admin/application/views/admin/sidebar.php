<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_data=$this->session->userdata('newdata');
?>
	<div class="sidebar-content">
	<!-- Main navigation -->
		<div class="card card-sidebar-mobile">
			<ul class="nav nav-sidebar" data-nav-type="accordion">
				<li class="nav-item">
					<a href="<?php echo base_url();?>Home/dashboard" class="nav-link">
						<i class="icon-home4"></i>
						<span>
							Dashboard
						</span>
					</a>
				</li>
				
			<?php if($user_data['admin_status']=="0") { ?>
				<li class="nav-item">
					<a href="<?php echo base_url();?>Admin" class="nav-link"><i class="icon-users4"></i> <span>Sub-Admins</span></a>
				</li>
			<?php } ?>
				
				<li class="nav-item">
					<a href="<?php echo base_url();?>Brand" class="nav-link"><i class="icon-make-group"></i> <span>Brand</span></a>
				</li>
				
				<li class="nav-item">
					<a href="<?php echo base_url();?>Categories" class="nav-link"><i class="icon-folder-open"></i> <span>Categories</span></a>
				</li>
				
				<li class="nav-item">
					<a href="<?php echo base_url();?>Logo" class="nav-link"><i class="icon-images3"></i> <span>Logo</span></a>
				</li>
				
				<li class="nav-item">
					<a href="<?php echo base_url();?>Slider" class="nav-link"><i class="icon-stack4"></i> <span>Slider</span></a>
				</li>
				
				<!--<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link"><i class="icon-users4"></i> <span>Customers</span></a>
					<ul class="nav nav-group-sub" data-submenu-title="Layouts">
						<li class="nav-item"><a href="<?php //echo base_url();?>Customer" class="nav-link active">View Customers</a></li>
					</ul>
				</li>-->
				
				<!--<li class="nav-item">
					<a href="<?php //echo base_url();?>Products" class="nav-link"><i class="icon-bag"></i> <span>Products</span></a>
					<!--<ul class="nav nav-group-sub" data-submenu-title="Layouts">
						<li class="nav-item"><a href="<?php //echo base_url();?>Products" class="nav-link active">View Products</a></li>
					</ul>
				</li>-->
				
				<!--<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link"><i class="icon-list-ordered"></i> <span>Orders</span></a>
					<ul class="nav nav-group-sub" data-submenu-title="Layouts">
						<li class="nav-item"><a href="<?php //echo base_url();?>Orders/" class="nav-link active">View Orders</a></li>
						<li class="nav-item"><a href="<?php //echo base_url();?>Orders/Product_order" class="nav-link active">View Order Products</a></li>
						<li class="nav-item"><a href="<?php //echo base_url();?>Orders/Status_order" class="nav-link active">View Order Statuses</a></li>
					</ul>
				</li>-->
				<!--<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Colours</span></a>
					<ul class="nav nav-group-sub" data-submenu-title="Layouts">
						<li class="nav-item"><a href="<?php //echo base_url();?>Colour" class="nav-link active">View Colours</a></li>
					</ul>
				</li>-->
			</ul>
		</div>
	<!-- /main navigation -->
	</div>
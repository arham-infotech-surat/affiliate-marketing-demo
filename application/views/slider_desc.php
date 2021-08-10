<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Client | Cashkaro</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Client - Cashkaro">
    <meta name="keywords" content="[2200+ Sites] Top deals, latest Coupons, Discount Codes &amp; Offers. Get Extra Cashback on every online order on Fashion, Travel, Food, Medicine &amp; other exciting categories. Earn Unlimited Cashback and transfer it to your bank account.">
    <meta name="author" content="Rokaux">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>assets/img/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/img/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="<?php echo base_url(); ?>assets/img/touch-icon-ipad-retina.png">
    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/css/vendor.min.css">
    <!-- Main Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/css/styles.min.css">
    <!-- Customizer Styles-->
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/customizer/customizer.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/mediaqueries/mediaqueries.css">
    <!-- Google Tag Manager-->
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '<?php echo base_url(); ?>assets/www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-T4DJFPZ');
      
    </script>
    <!-- Modernizr-->
    <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
    <style>
	  .body_bg_new{
		 background-color: azure;
	  }
      .site-header .toolbar .toolbar-item>a:hover{
        color: #000000!important;
      }
      .bg-purple{
        background-color: #2f3c97;
      }
      .top-banner-carousel{
        height: 250px;
        width:  604px;
      }
      .top-categories-carousel{
        max-height: 56px;
        max-width: calc(100% - 10px);
      }
      .dy_topcat_sec {
        background: #ffffff;
        border: 1px solid #dedede;
        float: left;
        width: 100%;
        height: 113px;
        border-radius: 4px;
        text-align: center;
    }
    .dy_topcat_img {
        width: 100%;
        max-height: 66px;
        height: 66px;
        position: relative;
    }
    .dy_topcat_sec a{
      text-decoration: none;
    }
    .dy_topcat_sec a span {
        height: 46px;
        min-height: 46px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 16px;
        color: #333333;
        word-break: break-word;
        font-weight: 700;
        padding-bottom: 5px;
    }
    </style>
  </head>
  <!-- Body-->
  <body class="body_bg_new">
    <!-- Google Tag Manager (noscript)-->
    <noscript>
      <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-T4DJFPZ" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
    </noscript>
    <!-- Template Customizer--> 
 
    <!-- Header-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <?php include_once 'header.php'; ?>

    <!-- Page Content-->
    <!-- Main Slider-->
   
	
  <!--- Slider Section --->
	<div class="container top_padder">
    <div class="column">
        <ul class="breadcrumbs">
        <li><a href="<?php echo base_url();?>">Home</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li><?php echo $slider_desc[0]['slider_name']; ?></li>
        </ul>
      </div>
		<div class="my-4 card">
			<div class="card-body border-0">
				<img src="<?php echo base_url();?>admin/assets/Uploads/Images/Slider/<?php echo $slider_desc[0]['slider_img']; ?>" class="mx-auto d-block"/>
			<div class="my-4 d-flex justify-content-center">
				<a href="<?php echo $slider_desc[0]['slider_link'];?>" class="badge badge-success"><?php echo $slider_desc[0]['slider_title'];?></a>
			</div>
			</div>
		</div>
		
		<div class="my-4 card">
			<div class="card-body">
				<?php echo $slider_desc[0]['slider_desc']; ?>
			</div>
		</div>
    </div>
  <!--- Slider Section End --->

    <!-- Site Footer-->
    <?php include_once 'footer.php'; ?>
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-chevron-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="<?php echo base_url();?>assets/js/vendor.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/scripts.min.js"></script>
    <!-- Customizer scripts-->
    <script src="<?php echo base_url();?>assets/customizer/customizer.min.js"></script>
  </body>

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Aug 2021 17:22:31 GMT -->
</html>
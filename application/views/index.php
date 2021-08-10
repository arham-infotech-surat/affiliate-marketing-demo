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
		 background-color: whitesmoke;
	  }
      .site-header .toolbar .toolbar-item>a:hover{
        color: #000000!important;
      }
      .bg-purple{
        background-color: #2f3c97;
      }
      .top-banner-carousel{
        height: 250px;
        width: 600px;
      }
      .top-categories-carousel{
        max-height: 56px;
        max-width: calc(100% - 10px);
      }
      .dy_topcat_sec {
      	margin-top: 20px;
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

	.store_card {
		     background: #ffffff;
		    text-align: center;
		    width: 100%;
		    border-radius: 4px;
		    float: left;
		    height: auto;
		    padding: 15px;
		    margin: 10px 0px;
      }
      .store_card_img {
        padding: 20px 0 20px 0;
        display: inline-block;
        width: 120px;
        font-size: 13px;
      }

      .store_card .button {
        background: #f07431;
        color: #ffffff;
        border-bottom: 0;
        text-decoration: none;
        max-width: 200px;
        width: 100%;
        line-height: 40px;
        font-size: 13px;
        border-radius: 4px;
        height: 40px;
        padding: 0;
        font-weight: 700;
        white-space: nowrap;
        display: block;
        margin: 0 auto;
      }
      .store_card_rts_trms{
        margin-top: 18px;
        text-decoration: none;
        padding: 0px 20px;
      }
      .slick-slide {
      	display: block;
    	  outline: none;
    	  float: left;
		    padding: 0 10px;
			}
			.tag_name{
				margin:10px 0px;
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
	<div class="container-fluid top_padder">
		  <div class="my-4 owl-carousel" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: false, &quot;margin&quot;: 15, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;630&quot;:{&quot;items&quot;:2},&quot;991&quot;:{&quot;items&quot;:3},&quot;1200&quot;:{&quot;items&quot;:3}} }">
			<?php foreach($slider as $srow):?>
			<div>
				<a href="<?php echo base_url();?>Deals/Offers-exclusive/<?php echo $srow['slider_id'];?>">
				<!--<a href="<?php //echo base_url()."Home/Deals_Offers/do"?><?php //echo $srow['slider_id'];?>"> -->
				<?php if(isset($srow['slider_img']) && !empty($srow['slider_img'])){?>
					<img src="<?php echo base_url(); ?>admin/assets/Uploads/Images/Slider/<?php echo $srow['slider_img'];?>" alt="<?php echo $srow['slider_title'];?>" class="top-banner-carousel" title="<?php echo $srow['slider_title'];?>">
				<?php } else {?>
				  <img src="<?php echo base_url()."admin/assets/Uploads/Images/Slider/default.png"?>" alt="<?php echo $crow['slider_title'];?>" class="mt-2" height="70px" width="70px">
					<?php } ?>
				</a>
			</div>
			<?php endforeach ?>
			<!--<div>
				<a href="/products/home-categories-exclusive/independence-day-offer"> 
					<img src="<?php //echo base_url(); ?>assets/img/components/img05.jpg" alt="Image" class="top-banner-carousel">
				</a>
			</div>
			<div>
				<a href="/products/home-categories-exclusive/independence-day-offer"> 
					<img src="<?php //echo base_url(); ?>assets/img/components/img06.jpg" alt="Image" class="top-banner-carousel">
				</a>
			</div>
			<div>
				<a href="/products/home-categories-exclusive/independence-day-offer"> 
					<img src="<?php //echo base_url(); ?>assets/img/components/img10.jpg" alt="Image" class="top-banner-carousel">
				</a>
			</div>
			<div>
				<a href="/products/home-categories-exclusive/independence-day-offer"> 
					<img src="<?php //echo base_url(); ?>assets/img/components/img11.jpg" alt="Image" class="top-banner-carousel">
				</a>
			</div>
			<div>
				<a href="/products/home-categories-exclusive/independence-day-offer"> 
					<img src="<?php //echo base_url(); ?>assets/img/components/img12.jpg" alt="Image" class="top-banner-carousel">
				</a>
			</div>-->
			<!--<img src="<?php //echo base_url(); ?>assets/img/components/img05.jpg" alt="Image" class="top-banner-carousel">
			<img src="<?php //echo base_url(); ?>assets/img/components/img06.jpg" alt="Image" class="top-banner-carousel">
			<img src="<?php //echo base_url(); ?>assets/img/components/img10.jpg" alt="Image" class="top-banner-carousel">
			<img src="<?php //echo base_url(); ?>assets/img/components/img11.jpg" alt="Image" class="top-banner-carousel">
			<img src="<?php //echo base_url(); ?>assets/img/components/img12.jpg" alt="Image" class="top-banner-carousel">-->
		  </div>
    </div>
  <!--- Slider Section End --->
   

  <!--- Category Section --->
  <div class="container-fluid">
    <div class="d-inline-block bg-purple text-white text-lg py-2 px-3 w-100 rounded">TOP CATEGORIES</div>
      <div class="my-4 owl-carousel" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: false, &quot;loop&quot;: false, &quot;margin&quot;: 10, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;630&quot;:{&quot;items&quot;:2},&quot;991&quot;:{&quot;items&quot;:3},&quot;1200&quot;:{&quot;items&quot;:6}} }">
		<?php foreach($categories as $crow):?>
		   <div class="dy_topcat_sec"> 
			  <a href="/products/home-categories-exclusive/independence-day-offer"> 
				<div class="dy_topcat_img"> 
				<?php if(isset($crow['cat_img']) && !empty($crow['cat_img'])){?>
				  <img src="<?php echo base_url(); ?>admin/assets/Uploads/Images/categories/<?php echo $crow['cat_img'];?>" class="" alt="<?php echo $crow['cat_name'];?>"> 
				<?php } else {?>
				  <img src="<?php echo base_url()."admin/assets/Uploads/Images/Categories/default.png"?>" alt="<?php echo $crow['cat_name'];?>" class="mt-2" height="70px" width="70px">
					<?php } ?>
				</div> 
				<span><?php echo $crow['cat_name'];?></span> 
			  </a>
			</div>
		<?php endforeach ?>
        <!--<div class="dy_topcat_sec"> 
          <a href="/products/home-categories-exclusive/independence-day-offer"> 
            <div class="dy_topcat_img"> 
              <img src="<?php //echo base_url(); ?>assets/img/categories/img2.png" class="" data-src="https://asset20.ckassets.com/resources/image/category/independence-day-offer-4746-1628071801.jpg" alt="INDEPENDENCE DAY OFFERS"> 
            </div> 
            <span>INDEPENDENCE DAY OFFERS</span> 
          </a>
        </div>
        <div class="dy_topcat_sec"> 
          <a href="/products/home-categories-exclusive/independence-day-offer"> 
            <div class="dy_topcat_img"> 
              <img src="<?php //echo base_url(); ?>assets/img/categories/img3.png" class="" data-src="https://asset20.ckassets.com/resources/image/category/independence-day-offer-4746-1628071801.jpg" alt="BEAUTY & PERSONAL CARE"> 
            </div> 
            <span>BEAUTY & PERSONAL CARE</span> 
          </a>
        </div>
        <div class="dy_topcat_sec"> 
          <a href="/products/home-categories-exclusive/independence-day-offer"> 
            <div class="dy_topcat_img"> 
              <img src="<?php //echo base_url(); ?>assets/img/categories/img4.png" class="" data-src="https://asset20.ckassets.com/resources/image/category/independence-day-offer-4746-1628071801.jpg" alt="GROCERY"> 
            </div> 
            <span>GROCERY</span> 
          </a>
        </div>
        <div class="dy_topcat_sec"> 
          <a href="/products/home-categories-exclusive/independence-day-offer"> 
            <div class="dy_topcat_img"> 
              <img src="<?php //echo base_url(); ?>assets/img/categories/img5.png" class="" data-src="https://asset20.ckassets.com/resources/image/category/independence-day-offer-4746-1628071801.jpg" alt="HEALTH & MEDICINE"> 
            </div> 
            <span>HEALTH & MEDICINE</span> 
          </a>
        </div>
        <div class="dy_topcat_sec"> 
          <a href="/products/home-categories-exclusive/independence-day-offer"> 
            <div class="dy_topcat_img"> 
              <img src="<?php //echo base_url(); ?>assets/img/categories/img6.png" class="" data-src="https://asset20.ckassets.com/resources/image/category/independence-day-offer-4746-1628071801.jpg" alt="RECHARGE & BILLS"> 
            </div> 
            <span>RECHARGE & BILLS</span> 
          </a>
        </div>
        <div class="dy_topcat_sec"> 
          <a href="/products/home-categories-exclusive/independence-day-offer" tabindex="0"> 
            <div class="dy_topcat_img"> 
              <img src="<?php //echo base_url(); ?>assets/img/categories/img7.png" class="" data-src="https://asset20.ckassets.com/resources/image/category/independence-day-offer-4746-1628071801.jpg" alt="INDEPENDENCE DAY OFFERS"> 
            </div> 
            <span>RECHARGE & BILLS</span> 
          </a>
        </div>-->
		<!--<img src="<?php //echo base_url(); ?>assets/img/categories/img1.png" alt="Image" class="top-categories-carousel">
            <img src="<?php //echo base_url(); ?>assets/img/categories/img2.png" alt="Image" class="top-categories-carousel">
            <img src="<?php //echo base_url(); ?>assets/img/categories/img3.png" alt="Image" class="top-categories-carousel">
            <img src="<?php //echo base_url(); ?>assets/img/categories/img4.png" alt="Image" class="top-categories-carousel">
            <img src="<?php //echo base_url(); ?>assets/img/categories/img5.png" alt="Image" class="top-categories-carousel">
            <img src="<?php //echo base_url(); ?>assets/img/categories/img6.png" alt="Image" class="top-categories-carousel">
            <img src="<?php //echo base_url(); ?>assets/img/categories/img7.png" alt="Image" class="top-categories-carousel"> -->
      </div>
    </div>
  <!--- Category Section End --->

   <!--- MINIMUM 30% Saveing Section --->
	<div class="container-fluid">
		<div class="d-inline-block bg-purple text-white text-lg py-2 px-3 w-100 rounded">MINIMUM 30% SAVINGS</div>
		  <div class="my-4 owl-carousel" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;margin&quot;: 10, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;630&quot;:{&quot;items&quot;:2},&quot;991&quot;:{&quot;items&quot;:3},&quot;1200&quot;:{&quot;items&quot;:6}} }">
		  	<div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide20" >
          <div class="store_card">
              <a id="" data-redirect="" data-sid="15450" href="javascript:void(0);" data-offer-type="Cashback + Coupons" class="store_card_img gotoCTA" tabindex="0">
                  <img src="<?php echo base_url(); ?>assets/img/brands/vedix.png" alt="Vedix">
              </a>
              <a id="" data-redirect="" data-sid="15450" href="javascript:void(0);" data-offer-type="Cashback + Coupons" class="button gotoCTA " tabindex="0">EARN 20% CASHBACK NOW ▶</a>
              <p class="tag_name"><a id="" href="javascript:void(0)" class="store_card_rts_trms" data-sid="15450" tabindex="0">Cashback Rates &amp; Terms</a></p>
          </div>
          <div class="store_card">
              <a id="" data-redirect="" data-sid="15450" href="javascript:void(0);" data-offer-type="Cashback + Coupons" class="store_card_img gotoCTA" tabindex="0">
                  <img src="<?php echo base_url(); ?>assets/img/brands/mensxp.png" alt="Vedix">
              </a>
              <a id="" data-redirect="" data-sid="15450" href="javascript:void(0);" data-offer-type="Cashback + Coupons" class="button gotoCTA " tabindex="0">EARN 20% CASHBACK NOW ▶</a>
              <p class="tag_name"><a id="" href="javascript:void(0)" class="store_card_rts_trms" data-sid="15450" tabindex="0">Cashback Rates &amp; Terms</a></p>
          </div>
      	</div>
		  </div>
    </div>

  <!--- MINIMUM 30% Saveing Section End --->

  <!--- Amazon GREAT FREEDOM FESTIVAL Section --->
	<section class="container-fluid">
		<div class="d-inline-block bg-purple text-white text-lg py-2 px-3 w-100 rounded">AMAZON GREAT FREEDOM FESTIVAL</div>
		  <div class="my-4 owl-carousel" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: false, &quot;loop&quot;: false, &quot;margin&quot;: 30, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;630&quot;:{&quot;items&quot;:2},&quot;991&quot;:{&quot;items&quot;:3},&quot;1200&quot;:{&quot;items&quot;:7}} }">
			<section class="container padding-bottom-2x">
			  <div class="row m-auto">
				<div class="col-lg-3 col-md-4 col-sm-6">
				  <div class="product-card mb-30">
					<!--<div class=""> 
						<img src="<?php echo base_url(); ?>assets/img/shop/products/01.jpg" class="" alt="HEALTH & MEDICINE" style="height:60px;width:80px;"> 
					</div>
					<hr>-->
					<a class="product-thumb" href="<?php base_url();?>Home/product_single"><img src="<?php echo base_url(); ?>assets/img/shop/products/01.jpg" alt="Product"></a>
					<div class="product-card-body">
					  <h5 class="product-title">Brand Name : Amazon</h5>
					  <hr>
					  <h3 class="my-3 product-title">Echo Dot (2nd Generation)</h3>
					  <h4 class="product-price">
						GRAB DEALS
					  </h4>
					</div>
				  </div>
				</div>
			  </div>
			</section>
		  </div>
    </section>
	
   <!--- Amazon GREAT FREEDOM FESTIVAL Section End --->

    <!-- <section class="hero-slider" style="background-image: url(<?php //echo base_url(); ?>assets/img/hero-slider/main-bg.jpg);">
      <div class="owl-carousel large-controls dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">
        <div class="item">
          <div class="container padding-top-3x">
            <div class="row justify-content-center align-items-center">
              <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                <div class="from-bottom"><img class="d-inline-block w-150 mb-4" src="<?php echo base_url(); ?>assets/img/hero-slider/logo02.png" alt="Puma">
                  <div class="h2 text-body mb-2 pt-1">Google Home - Smart Speaker</div>
                  <div class="h2 text-body mb-4 pb-1">starting at <span class="text-medium">$129.00</span></div>
                </div><a class="btn btn-primary scale-up delay-1" href="shop-grid-ls.html">View Offers&nbsp;<i class="icon-arrow-right"></i></a>
              </div>
              <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto" src="<?php echo base_url(); ?>assets/img/hero-slider/02.png" alt="Puma Backpack"></div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="container padding-top-3x">
            <div class="row justify-content-center align-items-center">
              <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                <div class="from-bottom"><img class="d-inline-block w-150 mb-3" src="<?php echo base_url(); ?>assets/img/hero-slider/logo01.png" alt="Sony">
                  <div class="h2 text-body mb-2 pt-1">Modern Powerful Laptop</div>
                  <div class="h2 text-body mb-4 pb-1">for only <span class="text-medium">$1,459.99</span></div>
                </div><a class="btn btn-primary scale-up delay-1" href="shop-single.html">Shop Now&nbsp;<i class="icon-arrow-right"></i></a>
              </div>
              <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto" src="<?php echo base_url(); ?>assets/img/hero-slider/01.png" alt="Chuck Taylor All Star II"></div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="container padding-top-3x">
            <div class="row justify-content-center align-items-center">
              <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                <div class="from-bottom"><img class="d-inline-block w-150 mb-3" src="<?php echo base_url(); ?>assets/img/hero-slider/logo03.png" alt="Motorola">
                  <div class="h2 text-body mb-2 pt-1">Beats Studio by Dr.Dre</div>
                  <div class="h2 text-body mb-4 pb-1">for only <span class="text-medium">$349.50</span></div>
                </div><a class="btn btn-primary scale-up delay-1" href="shop-single.html">Shop Now&nbsp;<i class="icon-arrow-right"></i></a>
              </div>
              <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto" src="<?php echo base_url(); ?>assets/img/hero-slider/03.png" alt="Moto 360"></div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- Top Categories/Deals-->
    <!--<section class="container padding-top-3x padding-bottom-2x">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="card border-0 bg-secondary mb-30">
            <div class="card-body d-table w-100">
              <div class="d-table-cell align-middle"><img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/shop/categories/29.png" alt="Image" class="top-banner-carousel"></div>
              <div class="d-table-cell align-middle pl-2">
                <h3 class="h6 text-thin">Tablets, Smartphones <br><strong>And more...</strong></h3>
                <h4 class="h6 d-table w-100 text-thin"><span class="d-table-cell align-bottom" style="line-height: 1.2;">UP<br>TO&nbsp;</span><span class="d-table-cell align-bottom h1 text-medium">50%</span><span class="d-table-cell align-bottom">&nbsp;off</span></h4><a class="text-decoration-none" href="shop-grid-ls.html">Shop now&nbsp;<i class="icon-chevron-right d-inline-block align-middle text-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="card border-0 bg-secondary mb-30">
            <div class="card-body d-table w-100">
              <div class="d-table-cell align-middle"><img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/shop/categories/30.png" alt="Image" class="top-banner-carousel"></div>
              <div class="d-table-cell align-middle pl-2">
                <h3 class="h6 text-thin">DJ Phantom <span style='white-space: nowrap;'>HD Video Drone</span> <br><strong>Arrives</strong></h3>
                <h4 class="h6 d-table w-100 text-thin"><span class="d-table-cell align-top text-right" style="line-height: 1.2;">From&nbsp;<br><strong>$&nbsp;</strong></span><span class="d-table-cell align-top h1 text-medium">990</span></h4><a class="text-decoration-none" href="shop-grid-ls.html">Shop now&nbsp;<i class="icon-chevron-right d-inline-block align-middle text-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="card border-0 bg-secondary mb-30">
            <div class="card-body d-table w-100">
              <div class="d-table-cell align-middle"><img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/shop/categories/31.png" alt="Image" class="top-banner-carousel"></div>
              <div class="d-table-cell align-middle pl-2">
                <h3 class="h6 text-thin">Watches, Fitness Bands <br><strong>And more...</strong></h3>
                <h4 class="h6 d-table w-100 text-thin"><span class="d-table-cell align-bottom" style="line-height: 1.2;">UP<br>TO&nbsp;</span><span class="d-table-cell align-bottom h1 text-medium">39%</span><span class="d-table-cell align-bottom">&nbsp;off</span></h4><a class="text-decoration-none" href="shop-grid-ls.html">Shop now&nbsp;<i class="icon-chevron-right d-inline-block align-middle text-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>-->
    <!-- Featured Products-->
    <!--<section class="container padding-bottom-2x mb-2">
      <h2 class="h3 pb-3 text-center">Featured Products</h2>
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product-card mb-30">
            <div class="product-badge bg-danger">Sale</div><a class="product-thumb" href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/products/01.jpg" alt="Product"></a>
            <div class="product-card-body">
              <div class="product-category"><a href="#">Smart home</a></div>
              <h3 class="product-title"><a href="shop-single.html">Echo Dot (2nd Generation)</a></h3>
              <h4 class="product-price">
                <del>$62.00</del>$49.99
              </h4>
            </div>
            <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-shopping-cart"></i><span>To Cart</span></a></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product-card mb-30">
              <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
              </div><a class="product-thumb" href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/products/02.jpg" alt="Product"></a>
            <div class="product-card-body">
              <div class="product-category"><a href="#">Photo cameras</a></div>
              <h3 class="product-title"><a href="shop-single.html">Aberg Best 21 Mega Pixels</a></h3>
              <h4 class="product-price">$35.00</h4>
            </div>
            <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-shopping-cart"></i><span>To Cart</span></a></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product-card mb-30"><a class="product-thumb" href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/products/05.jpg" alt="Product"></a>
            <div class="product-card-body">
              <div class="product-category"><a href="#">Headphones</a></div>
              <h3 class="product-title"><a href="shop-single.html">Zeus Bluetooth Headphones</a></h3>
              <h4 class="product-price">$28.99</h4>
            </div>
            <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-shopping-cart"></i><span>To Cart</span></a></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product-card mb-30"><a class="product-thumb" href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/products/07.jpg" alt="Product"></a>
            <div class="product-card-body">
              <div class="product-category"><a href="#">Smartphones</a></div>
              <h3 class="product-title"><a href="shop-single.html">Samsung Galaxy S9+</a></h3>
              <h4 class="product-price">$839.99</h4>
            </div>
            <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-shopping-cart"></i><span>To Cart</span></a></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product-card mb-30">
              <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i><i class="icon-star"></i>
              </div><a class="product-thumb" href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/products/11.jpg" alt="Product"></a>
            <div class="product-card-body">
              <div class="product-category"><a href="#">Headphones</a></div>
              <h3 class="product-title"><a href="shop-single.html">Edifier W855BT Bluetooth</a></h3>
              <h4 class="product-price">$99.75</h4>
            </div>
            <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-shopping-cart"></i><span>To Cart</span></a></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product-card mb-30">
            <div class="product-badge bg-secondary border-default text-body">Out of stock</div><a class="product-thumb" href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/products/03.jpg" alt="Product"></a>
            <div class="product-card-body">
              <div class="product-category"><a href="#">Computers, laptops</a></div>
              <h3 class="product-title"><a href="shop-single.html">Microsoft Surface Pro 4</a></h3>
              <h4 class="product-price">$1,049.10</h4>
            </div>
            <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="shop-single.html"><i class="icon-arrow-right"></i><span>Details</span></a></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product-card mb-30"><a class="product-thumb" href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/products/12.jpg" alt="Product"></a>
            <div class="product-card-body">
              <div class="product-category"><a href="#">Wearable electornics</a></div>
              <h3 class="product-title"><a href="shop-single.html">Apple Watch Series 3</a></h3>
              <h4 class="product-price">$329.10</h4>
            </div>
            <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-shopping-cart"></i><span>To Cart</span></a></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">     
          <div class="product-card mb-30">
            <div class="product-badge bg-danger">Sale</div><a class="product-thumb" href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/products/09.jpg" alt="Product"></a>
            <div class="product-card-body">
              <div class="product-category"><a href="#">Action cameras</a></div>
              <h3 class="product-title"><a href="shop-single.html">Samsung Gear 360 Camera</a></h3>
              <h4 class="product-price">
                <del>$74.00</del>$68.00
              </h4>
            </div>
            <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-shopping-cart"></i><span>To Cart</span></a></div>
          </div>
        </div>
      </div>
      <div class="text-center"><a class="btn btn-outline-secondary" href="shop-grid-ls.html">View All Products</a></div>
    </section>-->
    <!-- CTA-->
    <!--<section class="fw-section padding-top-4x padding-bottom-8x" style="background-image: url(<?php echo base_url(); ?>assets/img/banners/shop-banner-bg-02.jpg);"><span class="overlay" style="opacity: .7;"></span>
      <div class="container text-center">
        <div class="d-inline-block bg-danger text-white text-lg py-2 px-3 rounded">Limited Time Offer</div>
        <div class="display-4 text-white py-4">Ultimate Printing Solution From</div>
        <div class="d-inline-block w-200 pt-2"><img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/banners/shop-banner-logo.png" alt="Canon"></div>
        <div class="pt-5"></div>
        <div class="countdown countdown-inverse" data-date-time="12/30/2019 12:00:00">
          <div class="item">
            <div class="days">00</div><span class="days_ref">Days</span>
          </div>
          <div class="item">
            <div class="hours">00</div><span class="hours_ref">Hours</span>
          </div>
          <div class="item">
            <div class="minutes">00</div><span class="minutes_ref">Mins</span>
          </div>
          <div class="item">
            <div class="seconds">00</div><span class="seconds_ref">Secs</span>
          </div>
        </div>
      </div>
    </section><a class="d-block position-relative mx-auto" href="shop-grid-ls.html" style="max-width: 682px; margin-top: -130px; z-index: 10;"><img class="d-block w-100" src="<?php echo base_url(); ?>assets/img/banners/shop-banner-02.png" alt="Printers"></a>-->
    <!-- Staff Picks (Widgets)-->
    <!--<section class="container padding-top-3x padding-bottom-2x">
      <h2 class="h3 pb-3 text-center">Staff Picks</h2>
      <div class="row pt-1">
        <div class="col-md-4 col-sm-6">
          <div class="widget widget-featured-products">
            <h3 class="widget-title">Best Sellers</h3>
          
            <div class="entry">
              <div class="entry-thumb"><a href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/widget/01.jpg" alt="Product"></a></div>
              <div class="entry-content">
                <h4 class="entry-title"><a href="shop-single.html">GoPro Hero4 Silver</a></h4><span class="entry-meta">$287.99</span>
              </div>
            </div>
           
            <div class="entry">
              <div class="entry-thumb"><a href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/widget/02.jpg" alt="Product"></a></div>
              <div class="entry-content">
                <h4 class="entry-title"><a href="shop-single.html">Puro Sound Labs BT2200</a></h4><span class="entry-meta">$95.99</span>
              </div>
            </div>
           
            <div class="entry">
              <div class="entry-thumb"><a href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/widget/03.jpg" alt="Product"></a></div>
              <div class="entry-content">
                <h4 class="entry-title"><a href="shop-single.html">HP OfficeJet Pro 8710</a></h4><span class="entry-meta">$89.70</span>
              </div>
            </div><a class="btn btn-outline-secondary btn-sm mb-0" href="shop-grid-ls.html">View More</a>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="widget widget-featured-products">
            <h3 class="widget-title">New Arrivals</h3>
           
            <div class="entry pb-2">
              <div class="entry-thumb"><a href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/widget/05.jpg" alt="Product"></a></div>
              <div class="entry-content">
                <h4 class="entry-title"><a href="shop-single.html">iPhone X 256 GB Space Gray</a></h4><span class="entry-meta">$1,450.00</span>
              </div>
            </div>
           
            <div class="entry">
              <div class="entry-thumb"><a href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/widget/04.jpg" alt="Product"></a></div>
              <div class="entry-content">
                <h4 class="entry-title"><a href="shop-single.html">Canon EOS M50 Mirrorless Camera</a></h4><span class="entry-meta">$910.00</span>
              </div>
            </div>
           
            <div class="entry">
              <div class="entry-thumb"><a href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/widget/07.jpg" alt="Product"></a></div>
              <div class="entry-content">
                <h4 class="entry-title"><a href="shop-single.html">Microsoft Xbox One S</a></h4><span class="entry-meta">$298.99</span>
              </div>
            </div><a class="btn btn-outline-secondary btn-sm mb-0" href="shop-grid-ls.html">View More</a>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="widget widget-featured-products">
            <h3 class="widget-title">Top Rated</h3>
            
            <div class="entry pb-2">
              <div class="entry-thumb"><a href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/widget/08.jpg" alt="Product"></a></div>
              <div class="entry-content">
                <h4 class="entry-title"><a href="shop-single.html">Samsung Gear 360 VR Camera</a></h4><span class="entry-meta">$68.00</span>
              </div>
            </div>
          
            <div class="entry">
              <div class="entry-thumb"><a href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/widget/09.jpg" alt="Product"></a></div>
              <div class="entry-content">
                <h4 class="entry-title"><a href="shop-single.html">Samsung Galaxy S9+ 64 GB</a></h4><span class="entry-meta">$839.99</span>
              </div>
            </div>
            
            <div class="entry">
              <div class="entry-thumb"><a href="shop-single.html"><img src="<?php echo base_url(); ?>assets/img/shop/widget/10.jpg" alt="Product"></a></div>
              <div class="entry-content">
                <h4 class="entry-title"><a href="shop-single.html">Zeus Bluetooth Headphones</a></h4><span class="entry-meta">$28.99</span>
              </div>
            </div><a class="btn btn-outline-secondary btn-sm mb-0" href="shop-grid-ls.html">View More</a>
          </div>
        </div>
      </div>
    </section>-->
    <!-- Popular Brands Carousel-->
    <!--<section class="bg-secondary padding-top-3x padding-bottom-3x">
      <div class="container">
        <h2 class="h3 text-center mb-30 pb-3">Popular Brands</h2>
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}, &quot;470&quot;:{&quot;items&quot;:3},&quot;630&quot;:{&quot;items&quot;:4},&quot;991&quot;:{&quot;items&quot;:5},&quot;1200&quot;:{&quot;items&quot;:6}} }"><img class="d-block w-110 opacity-75 m-auto" src="<?php echo base_url(); ?>assets/img/brands/01.png" alt="IBM"><img class="d-block w-110 opacity-75 m-auto" src="<?php echo base_url(); ?>assets/img/brands/02.png" alt="Sony"><img class="d-block w-110 opacity-75 m-auto" src="<?php echo base_url(); ?>assets/img/brands/03.png" alt="HP"><img class="d-block w-110 opacity-75 m-auto" src="<?php echo base_url(); ?>assets/img/brands/04.png" alt="Canon"><img class="d-block w-110 opacity-75 m-auto" src="<?php echo base_url(); ?>assets/img/brands/05.png" alt="Bosh"><img class="d-block w-110 opacity-75 m-auto" src="<?php echo base_url(); ?>assets/img/brands/06.png" alt="Dell"><img class="d-block w-110 opacity-75 m-auto" src="<?php echo base_url(); ?>assets/img/brands/07.png" alt="Samsung"></div>
      </div>
    </section>-->
    <!-- Services-->
    <!--<section class="container padding-top-3x padding-bottom-2x">
      <div class="row">
        <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="<?php echo base_url(); ?>assets/img/services/01.png" alt="Shipping">
          <h6 class="mb-2">Free Worldwide Shipping</h6>
          <p class="text-sm text-muted mb-0">Free shipping for all orders over $100</p>
        </div>
        <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="<?php echo base_url(); ?>assets/img/services/02.png" alt="Money Back">
          <h6 class="mb-2">Money Back Guarantee</h6>
          <p class="text-sm text-muted mb-0">We return money within 30 days</p>
        </div>
        <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="<?php echo base_url(); ?>assets/img/services/03.png" alt="Support">
          <h6 class="mb-2">24/7 Customer Support</h6>
          <p class="text-sm text-muted mb-0">Friendly 24/7 customer support</p>
        </div>
        <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="<?php echo base_url(); ?>assets/img/services/04.png" alt="Payment">
          <h6 class="mb-2">Secure Online Payment</h6>
          <p class="text-sm text-muted mb-0">We posess SSL / Secure Certificate</p>
        </div>
      </div>
    </section>-->
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
<html>
  <head>
  <title>My Now Amazing Webpage</title>
  <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
  </head>
  <body>

  <div class="your-class">
    <div>your content</div>
    <div>your content</div>
    <div>your content</div>
  </div>

  <script type="text/javascript" src="<?php echo base_url();?>/assets/js/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>/assets/js/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>/assets/js/slick/slick.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.your-class').slick({
        setting-name: setting-value
      });
    });
  </script>

  </body>
</html>
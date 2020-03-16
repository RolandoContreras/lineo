<head>
  <title>U-Linex | <?php echo $title;?></title>
  <meta charset=UTF-8>
  <meta name=viewport content="width=device-width, initial-scale=1">
  <meta name="description" content="Somos una comunidad de desarrollo personal y emprendimiento. Estudia">
  <meta name="author" content="U-linex">
  <meta name="keyword" content="U-linex, plataforma de cursos, cursos de arquitectura, aprende arquitectura">
  <meta name="robots" content="Index, Follow">
  <link type="text/css" media="all" href="<?php echo site_url().'static/page_front/css/autoptimize_c71.css';?>" rel="stylesheet">
  <link type="text/css" media="screen" href="<?php echo site_url().'static/page_front/css/autoptimize_c3e.css';?>" rel="stylesheet">
  <link type="text/css" media="only screen and (max-width: 768px)" href="<?php echo site_url().'static/page_front/css/autoptimize_dcb.css';?>" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo site_url().'static/page_front/css/autoptimize_single_5cd.css';?>" type=text/css media=all>
  <!--[if lt IE 9]><linkrel=stylesheet id=vc_lte_ie9-css href=http://c2a2v9c8.stackpathcdn.com/wp-content/plugins/js_composer/assets/css/vc_lte_ie9.min.css type=text/css media=screen><![endif]-->
  <link rel="stylesheet" href="<?php echo site_url().'static/page_front/css/mystyle.css';?>" type=text/css media=all>
  <script src="<?php echo site_url().'static/page_front/js/jquery.js';?>"></script>
  <!--start favicon-->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-touch-icon.png';?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-32x32.png';?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-16x16.png';?>">
  <link rel="manifest" href="<?php echo site_url().'static/page_front/images/logo/favico/site.webmanifest';?>">
<script>
    var lpGlobalSettings = {"localize":{"button_ok":"OK","button_cancel":"Cancel","button_yes":"Yes","button_no":"No"}};
  </script>
  <script>
    var lpCourseSettings = [];
  </script>
  <script>
    function tc_insert_internal_css(css) { var tc_style = document.createElement("style"); tc_style.type = "text/css"; tc_style.setAttribute('data-type', 'tc-internal-css'); var tc_style_content = document.createTextNode(css); tc_style.appendChild(tc_style_content); document.head.appendChild(tc_style); }
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <script>
    var site = '<?php echo site_url();?>';
  </script>
  <?php 
   if(isset($meta_description_og)){ ?>
        <meta property="og:type" content="article"/>
        <meta property="og:title" content="<?php echo $title;?>"/>
        <meta property="og:description" content="<?php echo $meta_description_og;?>" />
        <meta property="og:image" content="<?php echo $meta_img_og;?>" />
   <?php  } ?>
        <link rel="stylesheet" href="<?php echo site_url().'static/page_front/css/md-modal.css';?>">
</head>
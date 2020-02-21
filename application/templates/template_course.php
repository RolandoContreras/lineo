<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset=UTF-8>
  <meta name=viewport content="width=device-width, initial-scale=1">
  <title>U-linex | Plataforma de Cursos</title>
   <!--start favicon-->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-touch-icon.png';?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-32x32.png';?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-16x16.png';?>">
  <link rel="manifest" href="<?php echo site_url().'static/page_front/images/logo/favico/site.webmanifest';?>">
  <link type="text/css" media="all" href="<?php echo site_url().'static/course/css/autoptimize_d8.css';?>" rel="stylesheet">
  <link type="text/css" media="screen" href="<?php echo site_url().'static/course/css/autoptimize_fc6.css';?>" rel="stylesheet">
  <link type="text/css" media="only screen and (max-width: 768px)" href="<?php echo site_url().'static/course/css/autoptimize_dcb.css';?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo site_url().'static/course/css/dashicons.min.css';?>" type="text/css" media="all">
  <link rel="stylesheet" href="<?php echo site_url().'static/course/css/autoptimize_single_cf7.css';?>" type=text/css media="all">
  <link rel="stylesheet" href="<?php echo site_url().'static/course/css/style.css';?>" type=text/css media="all">
  <script src="<?php echo site_url().'static/course/js/jquery.js';?>"></script>
  <script>
    var lpGlobalSettings = {"localize":{}};
  </script>
  <script src="https://use.fontawesome.com/bd71157fab.js"></script>
</head>
<body class="lp_course-template-default single single-lp_course postid-486 wp-embed-responsive theme-wordpress-lms wordpress-lms learnpress learnpress-page pmpro-body-has-access woocommerce-no-js pagetitle-show bg-type-color thim-body-visual-composer responsive lp_login_popup box-shadow auto-login ltr learnpress-v3 course-free header-template-overlay thim-lp-layout-2 lp-landing wpb-js-composer js-comp-ver-6.0.5 vc_responsive course-item-popup viewing-course-item viewing-course-item-489 course-item-lp_lesson">
  <div id=thim-preloading>
    <div class=thim-loading-icon>
      <div class=sk-folding-cube>
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
      </div>
    </div>
  </div>
  <div id=wrapper-container class="content-pusher line-topbar creative-left bg-type-color">
    <div class=overlay-close-menu></div>
  <div id=main-content>
    <section class=content-area>
      <div class="container site-content ">
        <div class=row>
          <main id=main class="site-main col-sm-12 full-width">
            <article id=post-486 class="sidebar-right post-486 lp_course type-lp_course status-publish has-post-thumbnail hentry course_category-business course_tag-business course_tag-theme course_tag-wordpress pmpro-has-access course">
              <div class=entry-content>
                <div id=lp-single-course class=lp-single-course>
                  <div id=learn-press-course class=course-summary>
                    <div id=tab-curriculum style="height: 68px;"></div>
                    <div class=course-curriculum id=learn-press-course-curriculum>
                      <nav class="thim-font-heading learn-press-breadcrumb">
                          <a href="<?php echo site_url().'course';?>">Inicio</a> 
                          <span class=delimiter>/</span> 
                          <a href="javascript:void(0);">Mi Curso</a> 
                         <span class="item-name">
                             Plataforma U-Linex
                         </span>
                      </nav>
                      <ul class="curriculum-sections">
                                <li class="section">
                                  <h4 class="section-header"><span class=collapse></span>Curso &nbsp;<span class=section-description><?php echo $obj_courses->name;?></span></h4>
                                      <ul class=section-content>
                                          <?php foreach ($obj_videos as $key => $value) { 
                                                $key += 1;
                                                     if($obj_courses_overview->video_id == $value->video_id){
                                                          $style = "current";
                                                     }else{
                                                         $style = "";
                                                     }?> 
                                                    <li class="course-item course-item-lp_lesson course-item-487 item-preview has-status <?php echo $style?>">
                                                      <span class=course-format-icon><i class="fa fa-play"></i></span>
                                                      <a class=section-item-link href="<?php echo site_url()."plataforma/$slug/$value->courses_slug/$value->slug";?>">
                                                            <span  class=item-name><?php echo "$key".".0 ". $value->name;?></span>
                                                            <span class=course-item-meta>
                                                                <span class="lp-label lp-label-preview">Ver Vídeo</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                               <?php } ?>
                                      </ul>
                                </li>
                      </ul>
                    </div>
                    <div id="learn-press-content-item">
                      <div class=content-item-scrollable>
                        <div id=course-item-content-header class=thim-course-item-header>
                          <div class=thim-course-item-popup-logo>
                              <a class=lesson-logo href="<?php echo site_url().'plataforma';?>" title="logo">
                                <img class=logo src="<?php echo site_url().'static/page_front/images/logo/logo-h.png';?>" alt="logo" width="130">
                            </a>
                          </div>
                          <a href="<?php echo site_url().'backoffice';?>" class=back_course><i class="fa fa-close"></i></a>
                          <a class=toggle-content-item href></a>
                        </div>
                        <?php echo $body;?>  
                        <div id=course-item-content-footer></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </article>
          </main>
        </div>
      </div>
    </section>
  </div>
  </div>
  <div id=back-to-top><i class="fa fa-angle-up" aria-hidden=true></i></div>
  <div id=tp_style_selector>
    <div class="style-toggle close"></div>
    <div class="style-toggle open"></div>
  </div>
  <script src=https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js></script>
  <script>
    WebFont.load({google:{families:['Roboto:400,300']}});
  </script>
  <script defer src="<?php echo site_url().'static/course/js/autoptimize_ff6.js';?>"></script>
</body>
</html>
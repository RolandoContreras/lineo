<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("head");?>
<body class="home-page bp-legacy home page-template page-template-templates page-template-home-page page-template-templateshome-page-php page page-id-36 wp-embed-responsive theme-wordpress-lms pmpro-body-has-access woocommerce-no-js pagetitle-show bg-type-color thim-body-visual-composer responsive box-shadow auto-login ltr home1-section learnpress-v3 header-template-default wpb-js-composer js-comp-ver-6.0.5 vc_responsive no-js">
  <div id=thim-preloading>
    <div class=thim-loading-icon>
      <div class=sk-chasing-dots>
        <div class="sk-child sk-dot1"></div>
        <div class="sk-child sk-dot2"></div>
      </div>
    </div>
  </div>
  <div id=wrapper-container class="content-pusher creative-left bg-type-color">
    <div class=overlay-close-menu></div>
   <?php $this->load->view("header");?> 
   <?php $this->load->view("nav");?>
    
    <div id=main-content>
      <section class=content-area>
        <div class="page-title layout-1">
            <div class="main-top parallax" style="background-image:url(<?php echo site_url().'static/page_front/images/bg_header.jpg';?>);">
              <span class=overlay-top-header style="background-color: rgba(0,0,0,0.5);"></span>
            <div class="content container">
                <div class=vc_empty_space style="height: 75px"><span class=vc_empty_space_inner></span></div>
              <div class=row>
                <div class="text-title col-md-6">
                  <h1>Cursos</h1>
                </div>
                <div class="text-description col-md-6">
                  <div class=banner-description>
                    <p><strong class="br">La mejor educación en un solo lugar </strong> U-LINEX creado especialmente para ti</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="breadcrumb-content ">
            <div class="breadcrumbs-wrapper container">
              <ul id="breadcrumbs" class="breadcrumbs">
                <li>
                    <a href="<?php echo site_url();?>" title="Inicio">
                        <span>Inicio</span>
                    </a>
                    <span class=breadcrum-icon><i class="fa fa-angle-right" aria-hidden=true></i></span>
                </li>
                <li>
                    <span title="Todos los Cursos">Todos los Cursos</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div id=top-sidebar-courses>
          <div class=container>
              <div data-vc-full-width=true data-vc-full-width-init=false data-vc-stretch-content=true class="vc_row wpb_row vc_row-fluid overflow top-courses-overflow vc_custom_1501224314823 vc_row-has-fill vc_row-no-padding" style="background-color: #18c1f0 !important;">
              <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class=vc_column-inner>
                  <div class=wpb_wrapper>
                    <div class="thim-sc-heading text-center layout-2 ">
                      <div class=heading-content>
                        <h3 class="primary-heading">Nuestros Cursos</h3>
                      </div>
                      <p class=secondary-heading>Potencializa tus conocimientos y dentro de las seis semanas serás un maestro con experiencia en el mundo real. ¡Obtén un 75% de descuento en todos tus cursos!</p><span class="underline"></span></div>
                    <div class="thim-sc-courses-carousel top-courses">
            </div>
          </div>
        </div>
    </div>
  </div>
  <div class="vc_row-full-width vc_clearfix"></div>
  </div>
  </div>
  <div class="container site-content ">
    <div class=row>
      <div id=main class="site-main col-sm-12 col-md-9 flex-first">
        <article id=post-0 class="post-0 post type-post status-publish format-standard hentry pmpro-has-access page type-page">
          <div class=entry-content>
            <div id=lp-archive-courses class=lp-archive-courses>
            <div class=thim-course-top>
              <div class="display grid-list-switch lpr_course-switch " data-cookie=lpr_course-switch data-layout=grid><a href=javascript:; class="grid switchToGrid switcher-active"><i class="fa fa-th"></i></a>
                <a href=javascript:; class="list switchToList"><i class="fa fa-th-list"></i></a>
              </div>
              <div class=course-index><span>Showing 1-9 of <?php echo $total;?> resultado</span></div>
              <div class=courses-searching>
                  <form method="get" action="<?php echo site_url()."cursos"?>">
                    <input type="text" name="search" placeholder="Busca tu curso" class="form-control course-search-filter" autocomplete="off">
                    <button type=submit><i class="fas fa-search"></i></button>
                    <span class=widget-search-close></span>
                </form>
                  <ul class="courses-list-search list-unstyled"></ul>
              </div>
            </div>
            <div class="archive-courses course-grid archive_switch">
              <div class="learn-press-courses row">
                  <?php
                  foreach ($obj_courses as $value) { ?>
                        <div class="col-md-4 col-12 col-sm-6 col-xs-6 lpr-course post-486 lp_course type-lp_course status-publish has-post-thumbnail hentry course_category-busines-course course_tag-business-tag course_tag-theme course_tag-wordpress course">
                              <div class="content">
                                <div class="thumbnail">
                                    <a href="<?php echo site_url()."cursos/$value->category_slug/$value->slug";?>" class="img_thumbnail">
                                      <img width=365 height=405 src="<?php echo site_url()."static/cms/img/cursos/$value->img";?>" alt="<?php echo $value->name;?>"> 
                                  </a>
                                    <span class="price">
                                        <span class="course-origin-price">S/.<?php echo $value->price;?></span><span class="course-price">S/.<?php echo $value->price_del;?></span>
                                    </span>
                                  <div class="button-when-logged has-wishlist"></div>
                                </div>
                                <div class=sub-content>
                                  <h2 class="title">
                                      <a href="<?php echo site_url()."cursos/$value->category_slug/$value->slug";?>"><?php echo $value->name;?></a>
                                  </h2>
                                  <div class="date-comment">
                                      <span class="date-meta"><?php echo formato_fecha_dia_mes_ano($value->date);?></span></div>
                                  <div class="content-list">
                                    <div class="course-description">
                                      <?php echo $value->description;?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                  <?php } ?>
            </div>
  <nav class=learn-press-pagination>
    <ul class="page-numbers">
        <?php  echo $obj_pagination; ?>
      </ul>
  </nav>
  <div class=thim-loading-icon>
    <div class=sk-chasing-dots>
      <div class="sk-child sk-dot1"></div>
      <div class="sk-child sk-dot2"></div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </article>
  </div>
  <aside id=secondary class="sidebar-courses widget-area col-md-3 sticky-sidebar flex-last">
    <aside id=thim-courses-categories-2 class="widget widget_thim-courses-categories">
      <h4 class="widget-title">Categorías</h4>
      <ul class=courses-categories>
          <?php foreach ($obj_category as $value) { ?>
                <li class="cat-item">
                    <a href="<?php echo site_url()."cursos/$value->slug";?>" class="tc-menu-inner tc-megamenu-title"><?php echo $value->name;?></a>
                </li>
        <?php } ?>
      </ul>
    </aside>
    <aside id=thim-recent-courses-3 class="widget widget_thim-recent-courses">
      <h4 class="widget-title">Vídeos Top</h4>
      <div class=thim-recent-courses-widget>
        <ul class=recent-courses-wrapper>
           <?php 
            foreach ($obj_courses_top as $value) { ?>
                 <li class=course-item>
                    <div class=feature-img>
                        <img width="109" height="109" src="<?php echo site_url()."static/cms/img/cursos/$value->img";?>" alt="<?php echo $value->name;?>">
                        <a href="<?php echo site_url()."cursos/$value->category_slug/$value->slug";?>" class="img-link"></a>
                    </div>
                    <div class=content>
                      <h4 class="title">
                          <a href="<?php echo site_url()."cursos/$value->category_slug/$value->slug";?>"><?php echo $value->name;?></a>
                      </h4>
                      <div class="price">
                          <span class="course-origin-price">S/.<?php echo $value->price_del;?></span><span class="course-price">S/.<?php echo $value->price;?></span>
                      </div>
                    </div>
                  </li>
            <?php  } ?> 
        </ul>
      </div>
    </aside>
  </aside>
  </div>
  </div>
  </section>
  </div>
  <!--START FOOTER-->
  <?php $this->load->view("footer");?>  
  <!--END FOOTER-->
  </div>
  <div id="back-to-top"><i class="fa fa-angle-up" aria-hidden=true></i></div>
    <div class="gallery-slider-content"></div>
      <script src=https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js></script>
      <script>
        WebFont.load({google:{families:['Roboto:400,300']}});
      </script>
      <script defer src="<?php echo site_url().'static/page_front/js/autoptimize_282.js';?>"></script>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script src="<?php echo site_url().'static/page_front/js/modalEffects.js';?>"></script>
        <script src="<?php echo site_url().'static/page_front/js/classie.js';?>"></script>
</body>
</html>
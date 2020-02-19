<!DOCTYPE html>
<html lang="es">
<?php $this->load->view("head");?> 
<body class="bp-legacy lp_course-template-default single single-lp_course postid-458 wp-embed-responsive theme-wordpress-lms wordpress-lms learnpress learnpress-page pmpro-body-has-access woocommerce-no-js pagetitle-show bg-type-color thim-body-visual-composer responsive lp_login_popup box-shadow auto-login ltr learnpress-v3 course-no-free header-template-default thim-lp-layout-1 lp-landing wpb-js-composer js-comp-ver-6.0.5 vc_responsive no-js">
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
   <?php $this->load->view("header_2");?> 
  <?php $this->load->view("nav");?> 
  <div id=main-content>
    <section class=content-area>
      <div class="page-title layout-2">
        <div class="main-top parallax" style="background-image:url(<?php echo site_url().'static/page_front/images/bg_header.jpg';?>);">
            <div class="breadcrumb-content ">
                <div class="breadcrumbs-wrapper container">
                    <div class="learn-press-course-buttons lp-course-buttons">
                        <!--<form enctype="multipart/form-data" action="javascript:void(0);">-->
                            <button onclick="add_cart('<?php echo $obj_courses->course_id;?>','<?php echo $obj_courses->price;?>','<?php echo $obj_courses->name;?>');" class="button"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp; Comprar el Curso </button>
                            <!--<input onclick="add_cart('<?php echo $obj_courses->course_id;?>','<?php echo $obj_courses->price;?>','<?php echo $obj_courses->name;?>');" type="text" value="Enviar" class="button" />-->
                        <!--</form>-->
                    </div>
                </div>
            </div>
            <span class=overlay-top-header style="background-color: rgba(0,0,0,0.5);"></span>
          <div class="content container">
            <div class=text-title>
              <h1><?php echo $obj_courses->name;?></h1>
            </div>
            <div class=text-description>
                <div class=banner-description>La mejor educación en un solo lugar, provecha y mejora tus conocimientos. <br/>Este el momento para empezar a cambiar tu vida. U-linex creado especialmente para ti
                <div class=price><span class=course-origin-price>S/.<?php echo $obj_courses->price_del;?></span><span class=course-price>S/.<?php echo $obj_courses->price;?></span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container site-content ">
        <div class=row>
          <main id=main class="site-main col-sm-12 full-width">
            <article id=post-458 class="sidebar-right post-458 lp_course type-lp_course status-publish has-post-thumbnail hentry course_category-busines-course course_category-design course_tag-business-tag course_tag-theme course_tag-wordpress pmpro-has-access course">
              <div class=entry-content>
                <div id=lp-single-course class=lp-single-course>
                  <div id=learn-press-course>
                    <div class=course-summary>
                      <div class=landing-1>
                        <div class=course-info>
                          <ul class="list-inline clearfix">
                                <li class="list-inline-item item-categories">
                                    <label>Categoría</label>
                                    <span class=cat-links>
                                        <a href="<?php echo site_url()."cursos/$obj_courses->category_slug";?>" rel=tag><?php echo $obj_courses->category_name;?></a>
                                    </span>
                                </li>
                                <li class="list-inline-item item-author">
                                    <label>Resumen</label>
                                    <span class="cat-links">
                                        <a>Resumen del Curso</a>
                                    </span>
                                </li>
                          </ul>
                      </div>
                      <div class="course-thumbnail">
                          <img src="<?php echo site_url()."static/cms/img/cursos/$obj_courses->img2";?>" alt="<?php echo $obj_courses->name;?>" title="<?php echo $obj_courses->name;?>"> 
                          <a href="<?php echo $obj_courses_overview->video;?>" class="play-button video-thumbnail">
                              <span class="video-thumbnail hvr-push"></span>
                          </a>
                        <div class="time">
                            <div class="date-start"><?php echo formato_fecha_dia($obj_courses->date);?></div>
                            <div class="month-start"><?php echo formato_fecha_mes($obj_courses->date);?></div>
                      </div>
                    </div>
                    <div class="course-landing-summary has-social">
                      <div class="share sticky-sidebar">
                        <div class="text share-text">Compartir</div>
                        <div class="thim-social-share popup" data-link="<?php echo site_url()."cursos/$obj_courses->category_slug/$obj_courses->slug";?>">
                        <ul class=links>
                          <?php $url_social = site_url()."cursos/$obj_courses->category_slug/$obj_courses->slug";
                                $url = convert_url_social($url_social);?>
                          <li>
                              <a class="link facebook" title="Facebook2" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url;?>" rel=nofollow onclick="window.open(this.href,this.title,'width=600,height=600,top=200px,left=200px'); return false;" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class=content-landing-1>
                      <div class=course-meta></div>
                      <div id=thim-landing-course-menu-tab>
                        <div class="container wrapper clearfix">
                          <ul class=course-landing-tab>
                            <li role="presentation" class="course-nav-tab-overview active">
                                <a href=#tab-overview>Visión General</a>
                            </li>
                          </ul>
                          <div class="course-purchase-info has-wishlist">
                              <span class=course-origin-price>S/.<?php echo $obj_courses->price_del;?></span>
                              <span class=course-price>S/.<?php echo $obj_courses->price;?></span>
                            <div class="learn-press-course-buttons lp-course-buttons">
                              <form name=purchase-course class="purchase-course guest_checkout" method=post enctype=multipart/form-data>
                                <button class="lp-button button button-purchase-course">Comprar el Curso </button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class=course-description id=learn-press-course-description>
                        <div id=tab-overview>
                          <h4>Descripción</h4>
                          <?php echo $obj_courses->description;?>
                        </div>
                      </div>
                      <div class=course-curriculum id=learn-press-course-curriculum>
                        <div class=curriculum-heading>
                          <div class=title>
                            <h2 class="course-curriculum-title">Contenido</h2>
                          </div>
                          <span class=total-lessons>Aprendizaje total: <span class=text><?php echo $total_videos;?> lecciones</span></span>
                        </div>
                        <ul class=curriculum-sections>
                          <li class=section id=section-257 data-id=257>
                            <ul class=section-content>
                               <?php 
                               
                               foreach ($obj_videos as $key => $value) { ?>
                                <?php $key += 1;?>
                                   <li class="course-item course-item-lp_lesson course-item-459 item-preview has-status" data-type=lp_lesson>
                                      <span class=course-format-icon><i class="fa fa-play"></i></span>
                                        <div class="meta-rank">
                                          <div class="rank">
                                              <span class="label">Vídeo <?php echo $key.".0";?></span>
                                          </div>
                                        </div>
                                      <a class="section-item-link">
                                                <span class=item-name><?php echo $value->name;?></span>
                                                <span class=course-item-meta>
                                                    <span class="item-meta duration"><?php echo $value->time;?> min</span>
                                                </span>
                                      </a>
                                    </li> 
                               <?php } ?> 
                            </ul>
                          </li>
                        </ul>
                          
                          
                          
                    <div class=thim-related-course>
                      <h3 class="related-title">Cursos Relacionados</h3>
                      <div class="courses-carousel archive-courses course-grid owl-carousel owl-theme" data-cols=3>
                        <?php 
                        foreach ($obj_courses_related as $value) { ?>
                          <div class="inner-course ">
                              <div class=wrapper-course-thumbnail>
                                  <a href="<?php echo site_url()."cursos/$value->category_slug/$value->slug";?>" class=img_thumbnail>
                                    <img width=277 height=310 src="<?php echo site_url()."static/cms/img/cursos/$value->img";?>" alt="<?php echo $value->name;?>">
                                </a>
                                <div class="course-price">
                                    <span class="course-origin-price">S/.<?php echo $value->price_del;?></span>
                                    <span class="price">S/.<?php echo $value->price;?></span>
                                </div>
                                <div class=course-rating>
                                  <div class=review-stars-rated title="0 out of 5 stars">
                                    <div class="review-stars empty"></div>
                                    <div class="review-stars filled" style=width:100%;></div>
                                  </div>
                                </div>
                              </div>
                              <div class=item-list-center>
                                <div class=course-title>
                                  <h2 class="title">
                                      <a href="<?php echo site_url()."cursos/$value->slug";?>"><?php echo $value->name;?></a>
                                  </h2>
                                </div>
                                  <span class="date-comment">
                                    <span class="date"><?php echo formato_fecha_dia_mes_ano($value->date);?></span>
                                </span>
                              </div>
                        </div>
                        <?php } ?>  
                      </div>
                    </div>
                  </div>
                </div>
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
  <?php $this->load->view("footer");?>  
  </div>
  <div id="back-to-top"><i class="fa fa-angle-up" aria-hidden=true></i></div>
    <div class="gallery-slider-content"></div>
      <script src=https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js></script>
      <script>
        WebFont.load({google:{families:['Roboto:400,300']}});
      </script>
      <script defer src="<?php echo site_url().'static/page_front/js/autoptimize_282.js';?>"></script>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script src="<?php echo site_url().'static/backoffice/js/script/pay_order.js';?>"></script>
</body>
</html>
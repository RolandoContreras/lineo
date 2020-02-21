<div class=content-item-wrap>
    <div class="wpb_column vc_column_container vc_col-sm-12">
      <div class="vc_column-inner">
        <div class="wpb_wrapper">
          <div class="thim-block-1">
            <div class="main-course">
                <div class="vc_empty_space" style="height: 10px"><span class="vc_empty_space_inner"></span></div>
                <div class="feature-img">
                    <div class=wrapper>
                        <iframe width=980 height=550 src="https://www.youtube.com/embed/<?php echo $video_link;?>" frameborder allowfullscreen></iframe>
                    </div>
                </div>
                <div class="vc_empty_space" style="height: 50px"><span class="vc_empty_space_inner"></span></div>
                <div class=content-item-summary>
                    <h3 class="course-item-title question-title"><?php echo $obj_courses_overview->name;?></h3>
                    <div class="content-item-description lesson-description">
                        <a class="section-item-link" href="#">
                            <span class="item-name">Fecha: <?php echo formato_fecha_dia_mes($obj_courses_overview->date);?></span>
                        </a><br/>
                        <p>
                            <?php echo $obj_courses_overview->description;?>
                        </p>
                    </div>
                  </div>
            </div>
              <div class="vc_empty_space" style="height: 10px"><span class="vc_empty_space_inner"></span></div>
              <?php foreach ($obj_videos as $value) { ?>
                  <div class="course-item" style="margin-bottom: 10px !important;">
                      <a href="<?php echo site_url()."plataforma/$slug/$value->courses_slug/$value->slug";?>">
                          <div class="feature-img">
                              <img src="<?php echo site_url()."static/cms/img/cursos/$course_img";?>" alt="<?php echo $value->name;?>" width="100" >
                            <div class="wrap-author">
                              <div class="sc-review-stars">
                                <div class="review-stars-rated">
                                  <i class="fa fa-play-circle fa-4x"></i>
                                </div>
                            </div>
                          </div>
                        </div>
                     </a>
                <div class="course-detail">
                    <h3 class="title" style="margin-top: 10px !important;">
                        <a href="<?php echo site_url()."plataforma/$slug/$value->courses_slug/$value->slug";?>"><?php echo $value->name;?></a>
                    </h3>
                  <div class="meta" style="margin-top: 10px !important;">
                      <span><i class="fa fa-history"></i> <?php echo $value->time." min";?></span>
                  </div>
                    <a href="<?php echo site_url()."plataforma/$slug/$value->courses_slug/$value->slug";?>"><span class="lp-label lp-label-preview lp-landing" style="background: green !important;">Ver Vídeo</span></a>
                </div>
              </div>
              <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
</div>



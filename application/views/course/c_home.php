<div class=content-item-wrap>
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner">
            <div class="wpb_wrapper">
                <div class="thim-block-1">
                    <div class="main-course">
                        <div class="vc_empty_space" style="height: 10px"><span class="vc_empty_space_inner"></span></div>
                        <div class="feature-img">
                            <div class=wrapper>
                                <div class="row justify-content-center">
                                    <div class="col-md-11">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/<?php echo $video_link; ?>" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_empty_space" style="height: 50px"><span class="vc_empty_space_inner"></span></div>
                        <div class=content-item-summary>
                            <h3><?php echo $obj_courses_overview->name; ?></h3>
                            <br/>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Descripción del Curso</a></li>
                                <li><a data-toggle="tab" href="#menu1">Preguntas y Respuestas</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <div class="content-item-description lesson-description">
                                        <div class="section-item-link">
                                            <span class="item-name">Fecha: <?php echo formato_fecha_dia_mes($obj_courses_overview->date); ?></span>
                                        </div>
                                        <p style="color:#888 !important">
                                            <?php echo $obj_courses_overview->description; ?>
                                        </p>
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <div class="chat-sanders">
                                        <div class="card-block m-t-30 p-0">
                                            <div class="ps ps--active-y">
                                                <?php foreach ($obj_video_message as $value) { ?>
                                                    <div style="padding:0 30px 35px 30px;">
                                                        <div class="row m-b-20 received-chat align-items-end">
                                                            <div class="media">
                                                                <div class="mr-3 photo-table">
                                                                    <i class="fa fa-circle text-c-green f-10 m-r-10"></i>
                                                                    <a href="#!"><img class="rounded-circle" style="width:40px;" src="<?php echo site_url() . 'static/course/img/avatar.jpg'; ?>" alt="chat-user"></a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="d-inline-block"><?php echo $value->name; ?></h6><br/>
                                                                    <span class="d-block text-c-grey"><?php echo formato_fecha_barras($value->date); ?></span>
                                                                    <p class="m-b-0 text-muted"><?php echo $value->message; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php if ($value->respose != "") { ?>
                                                            <div class="row m-b-20 send-chat align-items-end">
                                                                <div class="col text-right">
                                                                    <div class="msg">
                                                                        <h6 class="m-b-0 text-white"><?php echo $value->respose ?></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto p-l-0">
                                                                    <h5 class="text-white d-flex align-items-center">
                                                                        <a href="#!"><img class="rounded-circle" style="width:40px;" src="<?php echo site_url() . 'static/page_front/images/logo/favico/android-chrome-192x192.png'; ?>" alt="chat-user"></a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                                <div class="ps__rail-x" style="left: 0px; bottom: -1px;">
                                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                                </div>
                                                <div class="ps__rail-y" style="top: 1px; height: 280px; right: 0px;">
                                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 232px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-icon-control border-top">
                                            <div class="input-group input-group-button p-10">
                                                <input type="text" name="comment" id="comment" class="form-control border-0 text-muted" placeholder="Escribe tu pregunta"/>
                                                <div class="input-group-append">
                                                    <button class="btn" onclick="write_message('<?php echo $obj_courses_overview->video_id; ?>');" type="button"><i class="fa f-20 fa-paper-plane"></i></button>
                                                </div>
                                                <br/>
                                                <div id="message"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vc_empty_space" style="height: 10px"><span class="vc_empty_space_inner"></span></div>
                    <?php
                    foreach ($obj_videos as $value) {
                        if ($value->video_id == $obj_courses_overview->video_id) {
                            $style = "style_rep";
                            $link = "javascript:void(0)";
                        } else {
                            $style = "";
                            $link = site_url() . "plataforma/$slug/$obj_courses->slug/$value->slug";
                        }
                        ?>
                        <div class="course-item" style="margin-bottom: 10px !important;" style_play>
                            <a href="<?php echo $link; ?>">
                                <div class="feature-img">
                                    <img src="<?php echo site_url() . "static/cms/img/cursos/$course_img"; ?>" alt="<?php echo $value->name; ?>" width="100" >
                                    <div class="wrap-author <?php echo $style; ?>">
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
                                    <a href="<?php echo site_url() . "plataforma/$slug/$obj_courses->slug/$value->slug"; ?>"><?php echo $value->name; ?></a>
                                </h3>
                                <div class="meta" style="margin-top: 10px !important;">
                                    <span><i class="fa fa-history"></i> <?php echo $value->time . " min"; ?></span>
                                </div>
                                <a href="<?php echo site_url() . "plataforma/$slug/$obj_courses->slug/$value->slug"; ?>"><span class="lp-label lp-label-preview lp-landing" style="background: green !important;">Ver Vídeo</span></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo site_url() . 'static/course/js/script/c_home.js'; ?>"></script>  



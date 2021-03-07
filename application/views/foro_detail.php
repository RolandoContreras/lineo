<!DOCTYPE html>
<html lang="es-PE" class="no-js">
    <?php $this->load->view("head") ?>
    <body class="stm_lms_button skin_custom_color online-light vc_responsive"> 
        <div id="wrapper">
            <?php $this->load->view("header") ?>
            <div id="main">
                <div class="stm_lms_breadcrumbs stm_lms_breadcrumbs__header_2">
                    <div class="stm_breadcrumbs_unit">
                        <div class="container">
                            <div class="navxtBreads"> 
                                <span property="itemListElement">
                                    <a property="item" title="Inicio" href="<?php echo site_url(); ?>" class="main-home">
                                        <span property="name">Inicio</span>
                                    </a>
                                </span> &gt; <span property="itemListElement">
                                    <a href="<?php echo site_url() . "foro"; ?>">
                                        <span property="name" title="Foro">Foro</span>
                                    </a>
                                </span> &gt; <span property="itemListElement">
                                    <a href="<?php echo site_url() . "foro/$obj_foro->course_slug"; ?>">
                                        <span property="name" title="Foro"><?php echo $obj_foro->course_name; ?></span>
                                    </a>
                                </span>&gt; <span property="itemListElement">
                                    <span property="name" title="Foro"><?php echo $obj_foro->title; ?></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <article id="post-4193" class="post-4193 events type-events status-publish has-post-thumbnail hentry tag-is-coming tag-surfing-car pmpro-has-access">
                    <div class="container">
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="vc_sidebar_position_right wpb_column vc_column_container vc_col-lg-9 vc_col-md-9 vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="stm_event_unit_vc">
                                            <div class="stm_post_info">
                                                <h1 class="h2 event_title"><?php echo $obj_foro->title; ?></h1>
                                                <div class="event_thumbnail"> 
                                                    <img src="<?php echo site_url() . "static/backoffice/images/foro/$obj_foro->foro_id/$obj_foro->img"; ?>" class="img-responsive wp-post-image" alt="<?php echo $obj_foro->title; ?>" srcset="<?php echo site_url() . "static/backoffice/images/foro/$obj_foro->foro_id/$obj_foro->img"; ?> 1000w" sizes="(max-width: 999px) 100vw, 999px" width="999" height="499"></div>
                                                <table class="event_date_info_table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="event_info">
                                                                <div class="event_date_info">
                                                                    <div class="event_date_info_unit event_start">
                                                                        <div class="event_labels heading_font"><i class="far fa-clock"></i>Fecha:</div> <?php echo formato_fecha_dia_de_mes_de_ano($obj_foro->date); ?></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1435906073173">
                                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                                <?php echo $obj_foro->description; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="multiseparator vc_custom_1435906305578"></div>
                                        <div class="stm-lms-wrapper">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <div class="stm_lms_user_side">
                                                            <div class="stm-lms-user_avatar">
                                                                <?php if (!empty($obj_foro->customer_img)) {
                                                                    ?>
                                                                    <img class="img-radius" src='<?php echo site_url() . "static/backoffice/images/profile/$obj_foro->customer_id/$obj_foro->customer_img"; ?>' class='avatar avatar-215 photo' height='215' width='215' alt=''/> 
                                                                <?php } else { ?>
                                                                    <img alt='avatar' src='<?php echo site_url() . 'static/backoffice/images/avatar.png'; ?>' class='avatar avatar-215 photo' height='215' width='215' style="cursor: pointer;"/> 
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                        <div class="stm_lms_user_bio">
                                                            <h3><?php echo $obj_foro->name . " " . $obj_foro->last_name; ?></h3>
                                                            <div class="stm_lms_user_info_top">
                                                                <aside id="socials-2" class="widget widget_socials">
                                                                    <div class="socials_widget_wrapper">
                                                                        <ul class="widget_socials list-unstyled clearfix">
                                                                            <li class="simple_flip_container">
                                                                                <div class="simple_flipper">
                                                                                    <div class="front "> 
                                                                                        <a href="<?php echo $obj_foro->facebook; ?>" target="_blank" class="facebook color-white"><i class="fab fa-facebook"></i></a>
                                                                                    </div>
                                                                                    <div class="back">
                                                                                        <a href="<?php echo $obj_foro->facebook; ?>" target="_blank"><i class="fab fa-facebook color-white"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="simple_flip_container">
                                                                                <div class="simple_flipper">
                                                                                    <div class="front"> 
                                                                                        <a href="<?php echo $obj_foro->instagram; ?>" target="_blank" class="instagram color-white"><i class="fab fa-instagram"></i></a>
                                                                                    </div>
                                                                                    <div class="back">
                                                                                        <a href="<?php echo $obj_foro->instagram; ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="simple_flip_container">
                                                                                <div class="simple_flipper">
                                                                                    <div class="front"> 
                                                                                        <a href="<?php echo $obj_foro->twitter; ?>" target="_blank" class="twitter color-white"><i class="fab fa-twitter"></i></a>
                                                                                    </div>
                                                                                    <div class="back"> 
                                                                                        <a href="<?php echo $obj_foro->twitter; ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="simple_flip_container">
                                                                                <div class="simple_flipper">
                                                                                    <div class="front"> 
                                                                                        <a href="<?php echo $obj_foro->google; ?>" target="_blank" class="google-plus color-white"><i class="fab fa-linkedin-in"></i></a>
                                                                                    </div>
                                                                                    <div class="back"> 
                                                                                        <a href="<?php echo $obj_foro->google; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </li>

                                                                    </div>
                                                                </aside>
                                                            </div>

                                                            <div class="stm_lms_update_field__description"><?php echo $obj_foro->bio; ?></div>
                                                        </div>
                                                        <div class="space-30"></div>
                                                    </div>
                                                </div>
                                                <div class="space-30"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-3 vc_hidden-sm vc_hidden-xs">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_widgetised_column wpb_content_element sidebar-area-right sidebar-area">
                                            <div class="wpb_wrapper">
                                                <aside id="stm_recent_posts-3" class="widget widget_stm_recent_posts">
                                                    <div class="widget_title">
                                                        <h3>Trabajos relacionados</h3>
                                                    </div>
                                                    <?php foreach ($obj_foro_related as $value) { ?>
                                                        <div class="widget_media clearfix widget_media_style_1">
                                                            <a href="<?php echo site_url()."foro/$value->course_slug/$value->slug"?>"> 
                                                                <img src="<?php echo site_url()."static/backoffice/images/foro/$value->foro_id/$value->img"?>" class="img-responsive wp-post-image" alt="" srcset="<?php echo site_url()."static/backoffice/images/foro/$value->foro_id/$value->img"?> 63w, <?php echo site_url()."static/backoffice/images/foro/$value->foro_id/$value->img"?> 480w" sizes="(max-width: 63px) 100vw, 63px" width="63" height="50"> 
                                                                <span class="h6"><?php echo $value->title;?></span>                      
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                </aside>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <?php $this->load->view("footer_2"); ?>
        <script src="<?php echo site_url() . 'static/page_front/js/autoptimize_54ab.js'; ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/header_2.js?ver=3.2'; ?>'></script>
        <link rel='stylesheet' id='stm-lms-lesson-css' href='<?php echo site_url() . 'static/backoffice/css/footer/lesson.css?ver=75'; ?>' type='text/css' media="none" onload="if (media != 'all')
                    media = 'all'"/>
        <script src='<?php echo site_url() . 'static/backoffice/js/jquery.fancybox.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/custom.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/bootstrap.min.js?ver=3.2'; ?>'></script>
    </body>
</html>








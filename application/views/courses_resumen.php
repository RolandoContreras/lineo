<!DOCTYPE html>
<html lang="en-US" class="no-js stm_lms_type_video">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title;?></title>
        <link rel='stylesheet' href='<?php echo site_url().'static/page_front/css/lesson_video.css?ver=29';?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo site_url().'static/page_front/css/bootstrap.min.css?ver=3.2';?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo site_url().'static/page_front/css/styles.css?ver=3.2';?>' type='text/css' media='all' />
        <script type='text/javascript' src='<?php echo site_url().'static/page_front/js/jquery/jquery.js?ver=1.12.4-wp';?>'></script>
        <!-- favicon-->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-touch-icon.png';?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-32x32.png';?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-16x16.png';?>">
        <link rel="manifest" href="<?php echo site_url().'static/page_front/images/logo/favico/site.webmanifest';?>">
    </head>
    <body class="logged-in stm_lms_button skin_custom_color classic_lms stm_preloader_1 wpb-js-composer js-comp-ver-5.6 vc_responsive">
        <div class="stm_lms_lesson_header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-4">
                        <div class="stm_lms_lesson_header__left">
                            <div class="logo-unit">
                                <a href="<?php echo site_url();?>"> 
                                    <img class="img-responsive logo_transparent_static visible logo" src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" alt="Logo" width="200"/> 
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-8">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-md-push-2">
                                        <div class="stm_lms_lesson_header__center">
                                            <h5><a href="<?php echo site_url() . "cursos/$obj_courses->category_slug/$obj_courses->slug";?>"><?php echo $obj_courses->name;?></a> </h5>
                                            <a href="<?php echo site_url() . "cursos/$obj_courses->category_slug/$obj_courses->slug";?>"> <i class="lnr lnr-arrow-left"></i> Regresar al Curso</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <div class="stm_lms_lesson_header__right">
                            <div class="stm_lms_account_dropdown">
                                <div class="dropdown"> 
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="lnr lnr-user"></i> <span class="login_name">Hola , Bienvenido</span> <span class="caret"></span> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="stm-lms-course__overlay"></div>
        <div class="stm-lms-wrapper stm-lessons">
            <div id="stm-lms-lessons">
                <div class="stm-lms-course__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="stm-lms-course__lesson-content__top">
                                    <h3>Vídeo Resumen del Curso</h3>
                                    <h1><?php echo $obj_courses->name;?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="stm-lms-course__content_wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                                            <div class="wpb_wrapper">
                                                <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/<?php echo $video_link; ?>" frameborder="0" allow="autoplay; fullscreen" width="940" height="589" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    <div class="stm-lms-course__lesson-content">
                                        <div class="vc_row wpb_row vc_row-fluid">
                                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="vc_separator wpb_content_element vc_sep_width_100 type_1 vc_separator_no_text"><span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
                                                        </div>
                                                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                                                <div class="vc_column-inner">
                                                                    <div class="wpb_wrapper">
                                                                            <div class="wpb_wrapper">
                                                                                <p><?php echo $obj_courses->description;?></p>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <link rel='stylesheet' id='stm-lms-lesson-css' href='<?php echo site_url().'static/page_front/css/lesson.css?ver=29';?>' type='text/css' media='all' />
        <script type='text/javascript' src='<?php echo site_url().'static/page_front/js/custom.js?ver=3.2';?>'></script>
    </body>
</html>
<!DOCTYPE html>
<html lang="en-US" class="no-js">
    <?php $this->view("backoffice/head"); ?>
    <body class="page-template-default page page-id-2 logged-in stm_lms_button pmpro-body-has-access skin_custom_color online-light stm_preloader_1 wpb-js-composer js-comp-ver-5.6 vc_responsive"
          ontouchstart="">
        <div id="wrapper">
            <?php $this->load->view("header"); ?>
            <!-- id header -->
            <div id="main">
                <!-- Breads -->
                <div class="stm_lms_breadcrumbs stm_lms_breadcrumbs__header_2">
                    <div class="stm_breadcrumbs_unit">
                        <div class="container">
                            <div class="navxtBreads">
                                <span property="itemListElement" typeof="ListItem">
                                    <a property="item" typeof="WebPage" title="Ir al Inicio" href="<?php echo site_url() . 'backoffice'; ?>" class="main-home">
                                        <span property="name">Inicio</span>
                                    </a>
                                    <meta property="position" content="1">
                                </span> &gt; 
                                <span property="itemListElement" typeof="ListItem">
                                    <a property="item" typeof="WebPage" title="Todos los Cursos" class="home">
                                        <span property="name">Todos los Cursos</span>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="post_type_exist clearfix">
                        <div class="stm_lms_courses_wrapper">
                            <div class="courses_filters">
                                <div class="courses_filters__title">
                                    <h1>Cursos</h1>
                                </div>
                            </div>
                            <div class="stm_lms_courses__archive_wrapper">
                                <div class="stm_lms_courses__archive_filter"> 
                                    <form action="<?php echo site_url().'backoffice/cursos/categorias';?>" method="get">
                                        <div class="stm_lms_courses__archive_filters">
                                            <div class="stm_lms_courses__filter stm_lms_courses__category">
                                                <div class="stm_lms_courses__filter_heading">
                                                    <h3>Categorías</h3>
                                                    <div class="toggler"></div>
                                                </div>
                                                <div class="stm_lms_courses__filter_content">
                                                    <?php foreach ($obj_category as $value) { ?>
                                                        <div class="stm_lms_courses__filter_category"> 
                                                            <label class="stm_lms_styled_checkbox"> 
                                                                <span class="stm_lms_styled_checkbox__inner"> 
                                                                    <input type="checkbox" value="<?php echo $value->category_id;?>" name="category[]"/> 
                                                                    <span><i class="fa fa-check"></i> </span> 
                                                                </span> 
                                                                <span><?php echo $value->name; ?> </span> 
                                                            </label>                          
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="stm_lms_courses__filter stm_lms_courses__search">
                                                <div class="stm_lms_courses__filter_heading">
                                                    <h3>Buscar</h3>
                                                    <div class="toggler"></div>
                                                </div>
                                                <div class="stm_lms_courses__filter_content" style="display: none;"> 
                                                    <input type="text" name="search" value="" placeholder="Palabra" /> 
                                                </div>
                                            </div>
                                            <div class="stm_lms_courses__filter_actions"> 
                                                <input type="submit" class="heading_font" value="Buscar">
                                                <a href="<?php echo site_url() . 'backoffice/cursos'; ?>" class="stm_lms_courses__filter_reset"> 
                                                    <i class="lnr lnr-undo"></i> <span>Borrar todo</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="stm_lms_courses stm_lms_courses__archive">
                                    <div class="stm_lms_courses__grid stm_lms_courses__grid_3 stm_lms_courses__grid_center archive_grid stm_lms_courses__grid_found_31" data-pages="3">
                                        <?php foreach ($obj_courses as $value) { ?>
                                            <div class="stm_lms_courses__single stm_lms_courses__single_animation has-sale style_1 ">
                                                <div class="stm_lms_courses__single__inner">
                                                    <div class="stm_lms_courses__single--image">
                                                        <div class="stm_lms_post_status heading_font new"> Nuevo</div>
                                                        <a href="<?php echo site_url() . "cursos/$value->category_slug/$value->slug"; ?>" class="heading_font" data-preview="Vista Previa del Curso">
                                                            <div>
                                                                <div class="stm_lms_lazy_image stm_lms_lazyloaded stm_lms_lazy_image__lazyloaded">
                                                                    <img data-srcset="<?php echo site_url() . "static/cms/img/cursos/$value->img"; ?> 2x" class="lazyload " data-src="<?php echo site_url() . "static/cms/img/cursos/$value->img"; ?>" width="272" height="161" alt="<?php echo $value->name; ?>" title="<?php echo $value->name; ?>"/>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="stm_lms_courses__single--inner">
                                                        <div class="stm_lms_courses__single--terms">
                                                            <div class="stm_lms_courses__single--term"> <?php echo $value->category_name; ?></div>
                                                        </div>
                                                        <div class="stm_lms_courses__single--title">
                                                            <a href="<?php echo site_url() . "cursos/$value->category_slug/$value->slug"; ?>">
                                                                <h5><?php echo str_to_mayusculas($value->name); ?></h5>
                                                            </a>
                                                        </div>
                                                        <div class="stm_lms_courses__single--meta">
                                                            <div class="stm_lms_courses__hours"> <i class="stmlms-lms-clocks"></i> <span><?php echo $value->time;?> horas</span></div>
                                                            <div class="stm_lms_courses__single--price heading_font"> 
                                                                <span><?php echo $value->price_del; ?></span><strong><?php echo $value->price; ?></strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="stm_lms_courses__single--info">
                                                        <div class="stm_lms_courses__single--info_author">
                                                            <div class="stm_lms_courses__single--info_author__avatar"> 
                                                                <img alt="profesor" src="<?php echo site_url() . 'static/page_front/images/profesor.png'; ?>" class="avatar avatar-215 photo" width="215" height="215">
                                                            </div>
                                                            <div class="stm_lms_courses__single--info_author__login">Instructor: U-linex</div>
                                                        </div>
                                                        <div class="stm_lms_courses__single--info_title">
                                                            <a href="<?php echo site_url() . "cursos/$value->category_slug/$value->slug"; ?>">
                                                                <h4><?php echo strtoupper($value->name); ?></h4>
                                                            </a>
                                                        </div>
                                                        <div class="stm_lms_courses__single--info_excerpt"> 
                                                            <?php echo corta_texto($value->description, 300); ?>
                                                        </div>
                                                        <div class="stm_lms_courses__single--info_meta">
                                                            <!--<div class="stm_lms_course__meta"> <i class="stmlms-cats"></i> 10 Materiales</div>-->
                                                            <div class="stm_lms_course__meta"> <i class="stmlms-lms-clocks"></i> <span><?php echo $value->time;?> horas</div>
                                                        </div>
                                                        <div class="stm_lms_courses__single--info_preview"> 
                                                            <a href="<?php echo site_url() . "cursos/$value->category_slug/$value->slug"; ?>" title="<?php echo $value->name; ?>" class="heading_font"> Vista previa de este curso</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <!--#main-->
        </div>
        <!--#wrapper-->
        <?php $this->load->view("footer"); ?>
        <link rel='stylesheet' id='stm-lms-courses-css' href='<?php echo site_url() . 'static/backoffice/css/footer/courses.css?ver=81'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' id='stm-lms-courses_filter-css' href='<?php echo site_url() . 'static/backoffice/css/footer/courses_filter.css?ver=81'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' id='stm-lms-user-css' href='<?php echo site_url() . 'static/backoffice/css/footer/user.css?ver=75'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' id='stm-lms-lesson-css' href='<?php echo site_url() . 'static/backoffice/css/footer/lesson.css?ver=75'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' id='stm-header_mobile-account-css' href='<?php echo site_url() . 'static/backoffice/css/footer/account.css?ver=3.2'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' id='stm-lms_categories_megamenu-style_1-css' href='<?php echo site_url() . 'static/backoffice/css/footer/lms_categories_megamenu.css?ver=3.2'; ?>' type='text/css' media='all' />
        <script src='<?php echo site_url() . 'static/backoffice/js/bootstrap.min.js?ver=3.2'; ?>'></script>

        <script src='<?php echo site_url() . 'static/backoffice/js/courses_filter.js?ver=81'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/custom.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/select2.full.min.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/jquery.fancybox.js?ver=3.2'; ?>'></script>
    </body>
</html>
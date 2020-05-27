<!DOCTYPE html>
<html lang="en-US" class="no-js">
    <?php $this->load->view("head") ?>
    <body class="page-template-default page page-id-2 stm_lms_button pmpro-body-has-access skin_custom_color online-light stm_preloader_1 wpb-js-composer js-comp-ver-5.6 vc_responsive" ontouchstart=""> 
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NTCN84F"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
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
                                    <span property="name" title="Cursos">Cursos</span>
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
                                <div class="courses_filters__activities">
                                    <div class="stm_lms_courses_grid__sort"> 
                                        <span class="sort_label heading_font">Ordenar por:</span> 
                                        <select class="no-search">
                                            <option value="date_high">Fecha (Lo más nuevo)</option>
                                            <option value="date_low">Fecha (Lo mas antiguo)</option>
                                            <option value="price_high">Precio alto</option>
                                            <option value="price_low">Precio bajo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="stm_lms_courses stm_lms_courses__archive">
                                <div class="stm_lms_courses__grid stm_lms_courses__grid_4 stm_lms_courses__grid_center">
                                    <?php
                                    if (count($obj_courses) > 0) {
                                        foreach ($obj_courses as $value) {
                                            ?>
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
                                                                <h5><?php echo $value->name; ?></h5>
                                                            </a>
                                                        </div>
                                                        <div class="stm_lms_courses__single--meta">
                                                            <div class="stm_lms_courses__hours"> <i class="stmlms-lms-clocks"></i> <span><?php echo $value->time; ?> horas</span></div>
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
                                                            <div class="stm_lms_courses__single--info_author__login">Instructor: U-Linex</div>
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
                                                            <!--<div class="stm_lms_course__meta"> <i class="stmlms-cats"></i> 3 Lecturas</div>-->
                                                            <div class="stm_lms_course__meta"> <i class="stmlms-lms-clocks"></i> <?php echo $value->time; ?> horas</div>
                                                        </div>
                                                        <div class="stm_lms_courses__single--info_preview"> 
                                                            <a href="<?php echo site_url() . "cursos/$value->category_slug/$value->slug"; ?>" title="<?php echo $value->name; ?>" class="heading_font"> Vista previa de este curso</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="stm_lms_courses__single stm_lms_courses__single_animation has-sale style_1 ">
                                            <h2>No hay Resultados</h2>
                                        </div>
<?php } ?>

                                </div>
                                <div class="text-center">
                                    <a href="#" class="btn btn-default stm_lms_load_more_courses" data-offset="1" data-template="courses/grid" data-args='{"image_d":"img-480-380","per_row":"4","posts_per_page":"8","class":"archive_grid"}'>
                                        <span>Cargar Más</span> 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
<?php $this->load->view("footer"); ?>
        <script defer src="<?php echo site_url() . 'static/page_front/js/autoptimize_775c.js'; ?>"></script>
    </body>
</html>
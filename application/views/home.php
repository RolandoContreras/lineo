<!DOCTYPE html>
<html lang="es-PE" class="no-js">
    <?php $this->load->view("head") ?>
    <body class="page-template-default page page-id-2 stm_lms_button pmpro-body-has-access skin_custom_color online-light wpb-js-composer js-comp-ver-5.6 vc_responsive" ontouchstart="">
        <div id="wrapper">
            <?php $this->load->view("header") ?>
            <div id="main">
                <div class="stm_lms_breadcrumbs stm_lms_breadcrumbs__header_2">
                    <div class="breadcrumbs_holder"></div>
                </div>
                <div class="container">
                    <div class="post_type_exist clearfix">
                        <div data-vc-full-width="true" data-vc-full-width-init="true" class="vc_row wpb_row vc_row-fluid vc_custom_1536053689227 aa5c78e661a071cc8ef558ce0a5313b4c vc_row-has-fill header_banner margin-bottom-0">
                            <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-7 vc_col-md-7 vc_col-xs-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="space-30"></div>
                                        <h4 class="text-title-banner capacitacion-title">U-LINEX<br/>TU UNIVERSALIDAD EN LÍNEA 
                                            <div class="vc_custom_heading margin-bottom-20">
                                                <h3 class="color-celeste header-plataforma">Un sistema probado a nivel internacional. Es tu oportunidad de avanzar como profesional</h3>
                                            </div>
                                            <a class="btn btn-warning lg" href="<?php echo site_url() . 'iniciar-sesion'; ?>" title="Comenzar ahora">
                                                <h4 class="font-size-18 color-white">COMIENZA A ESTUDIAR</h4>
                                            </a>
                                        </h4>
                                        <div class="space-30"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row-full-width vc_clearfix"></div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="icon_box vc_custom_1535366761423 stm_icon_box_hover_top standart module__f3eac30ffcdce927d15c39838e8e910f clearfix">
                                            <div class="icon_alignment_center">
                                                <div class="icon"> <i class="stmlms-world"></i></div>
                                                <div class="icon_text">
                                                    <h4 style="color:#273044">Reconocido a nivel mundial</h4>
                                                    <p>Las plataformas de educación virtual hoy en día son usadas por institutos y universidades de prestigios.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="icon_box vc_custom_1535366769840 stm_icon_box_hover_top standart module__df9ceca0e8527971a2077ab928c0fe8f clearfix">
                                            <div class="icon_alignment_center">
                                                <div class="icon"> <i class="stmlms-screen"></i></div>
                                                <div class="icon_text">
                                                    <h4 style="color:#273044"> Aprendizaje desde tu casa</h4>
                                                    <p>No necesitas salir de tu comodidad, tendrás acceso a todos tus cursos desde tu hogar todos los días del año.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="icon_box vc_custom_1535366786219 stm_icon_box_hover_top standart module__8c3033ebf56b4b964392037df86f8ff0 clearfix">
                                            <div class="icon_alignment_center">
                                                <div class="icon"> <i class="stmlms-calendar"></i></div>
                                                <div class="icon_text">
                                                    <h4 style="color:#273044"> Sé un experto en pocos meses</h4>
                                                    <p>La metodología usada garantiza un aprendizaje rápido. Los cursos se quedan grabados para seguir estudiándolos.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row-full-width vc_clearfix"></div>
                            <div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid" style="position: relative; left: -74.5px; box-sizing: border-box; width: 1349px; max-width: 1349px;">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="container">
                                            <div class="padding-bottom-44 padding-top-20">
                                                <div class="col-md-offset-2 col-sm-8 col-md-offset-2">
                                                    <div class="vc_custom_heading">
                                                        <h2 class="text-master-mind">CURSOS POLULARES</h2>
                                                    </div>
                                                    <div class="vc_custom_heading fwl">
                                                        <h4 style="font-size: 18px;line-height: 28px;text-align: center">Estos son los cursos más consumidos por nuestros alumnos. Adquiere uno si aún no lo tienes.</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space-30"></div>
                                        <div class="stm_lms_recent_courses">
                                            <div class="stm_lms_courses__grid stm_lms_courses__grid_12 stm_lms_courses__grid_center">
                                                <?php
                                                foreach ($obj_courses as $key => $value) {
                                                    if ($value->popular == 1 && $key <= 5) {
                                                        ?>
                                                        <div class="stm_lms_courses__single">
                                                            <div class="stm_lms_courses__single__inner">
                                                                <div class="stm_lms_courses__single--image">
                                                                    <div class="stm_lms_post_status new"> Nuevo</div>
                                                                    <a href="<?php echo site_url() . "cursos/$value->category_slug/$value->slug"; ?>" class="heading_font" data-preview="Vista Previa del Programa">
                                                                        <div>
                                                                            <div class="stm_lms_lazy_image stm_lms_lazy_image__lazyloaded">
                                                                                <?php
                                                                                // Define aquí la URL de tu imagen por defecto alojada en la web
                                                                                $default_image_url = site_url() . 'static/page_front/images/no_image.png';
                                                                                ?>
                                                                                <img data-src="<?php echo site_url() . "static/cms/img/cursos/$value->img"; ?>" class="lazyload" width="272" height="161" alt="<?php echo $value->name; ?>" title="<?php echo $value->name; ?>" onerror="this.onerror=null; this.src='<?php echo $default_image_url; ?>';"/>
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
                                                                            <?php if ($value->free == 1) { ?>
                                                                                <b>Libre</b>
                                                                            <?php } else { ?>
                                                                                <span>s/. <?php echo $value->price_del; ?></span><strong>s/. <?php echo $value->price; ?></strong>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="stm_lms_courses__single--info">
                                                                    <div class="stm_lms_courses__single--info_author">
                                                                        <div class="stm_lms_courses__single--info_author__avatar"> 
                                                                                <img alt="profesor" data-src="<?php echo site_url() . 'static/page_front/images/profesor.png'; ?>" class="avatar avatar-215 photo lazyload" width="215" height="215">
                                                                        </div>
                                                                        <div class="stm_lms_courses__single--info_author__login">Instructor: U-Linex</div>
                                                                    </div>
                                                                    <div class="stm_lms_courses__single--info_title">
                                                                        <a href="<?php echo site_url() . "cursos/$value->category_slug/$value->slug"; ?>">
                                                                            <h4><?php echo $value->name; ?></h4>
                                                                        </a>
                                                                    </div>
                                                                    <div class="stm_lms_courses__single--info_excerpt"> 
                                                                        <?php echo corta_texto($value->description, 300); ?>
                                                                    </div>
                                                                    <div class="stm_lms_courses__single--info_meta">
                                                                        <div class="stm_lms_course__meta"><i class="stmlms-lms-clocks"></i><?php echo $value->time; ?> Horas</div>
                                                                    </div>
                                                                    <div class="stm_lms_courses__single--info_preview"> 
                                                                        <a href="<?php echo site_url() . "cursos/$value->category_slug/$value->slug"; ?>" title="<?php echo $value->name; ?>" class="heading_font"> Vista previa de este curso</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row-full-width vc_clearfix"></div>
                        <div class="aa3e9b2585d5e7d5f6c929d0beab1846e vc_empty_space" style="height: 75px"><span class="vc_empty_space_inner"></span></div>
                        <div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid" style="position: relative; left: -351.5px; box-sizing: border-box; width: 1903px;">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="vc_custom_heading vc_custom_1531998219169">
                                            <h2 class="text-master-mind">TODOS LOS CURSOS</h2>
                                        </div>
                                        <div class="stm_lms_recent_courses" data-offset="1" data-template="courses/grid" data-args="{&quot;per_row&quot;:&quot;6&quot;,&quot;include_link&quot;:true,&quot;posts_per_page&quot;:&quot;12&quot;}">
                                            <div class="stm_lms_courses__grid stm_lms_courses__grid_6 stm_lms_courses__grid_center">
                                                <?php foreach ($obj_courses as $value) { ?>
                                                    <div class="stm_lms_courses__single stm_lms_courses__single_animation has-sale style_1 ">
                                                        <div class="stm_lms_courses__single__inner">
                                                            <div class="stm_lms_courses__single--image">
                                                                <div class="stm_lms_post_status heading_font new"> Nuevo</div>
                                                                <a href="<?php echo site_url() . "cursos/$value->category_slug/$value->slug"; ?>" class="heading_font" data-preview="Vista Previa del Curso">
                                                                    <div>
                                                                        <div class="stm_lms_lazy_image stm_lms_lazy_image__lazyloaded">
                                                                            <?php
                                                                            // Define aquí la URL de tu imagen por defecto alojada en la web
                                                                            $default_image_url = site_url() . 'static/page_front/images/no_image.png';
                                                                            ?>
                                                                            <img class="lazyload" data-src="<?php echo site_url() . "static/cms/img/cursos/$value->img"; ?>" width="272" height="161" alt="<?php echo $value->name; ?>" title="<?php echo $value->name; ?>" onerror="this.onerror=null;this.src='<?php echo $default_image_url; ?>';"/>
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
                                                                    <div class="stm_lms_courses__hours"> <i class="stmlms-lms-clocks"></i> <span><?php echo $value->time; ?> horas</span></div>
                                                                    <div class="stm_lms_courses__single--price heading_font"> 
                                                                        <span>s/.<?php echo $value->price_del; ?></span><strong>s/.<?php echo $value->price; ?></strong>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="stm_lms_courses__single--info">
                                                                <div class="stm_lms_courses__single--info_author">
                                                                    <div class="stm_lms_courses__single--info_author__avatar"> 
                                                                        <img alt="profesor" data-src="<?php echo site_url() . 'static/page_front/images/profesor.png'; ?>" class="lazyload avatar avatar-215 photo" width="215" height="215">
                                                                    </div>
                                                                    <div class="stm_lms_courses__single--info_author__login">Instructor: U-linex</div>
                                                                </div>
                                                                <div class="stm_lms_courses__single--info_title">
                                                                    <a href="<?php echo site_url() . "cursos/$value->category_slug/$value->slug"; ?>">
                                                                        <h4><?php echo $value->name; ?></h4>
                                                                    </a>
                                                                </div>
                                                                <div class="stm_lms_courses__single--info_excerpt"> 
                                                                    <?php echo corta_texto($value->description, 300); ?>
                                                                </div>
                                                                <div class="stm_lms_courses__single--info_meta">
                                                                    <div class="stm_lms_course__meta"> <i class="stmlms-lms-clocks"></i> <?php echo $value->time; ?> horas</div>
                                                                </div>
                                                                <div class="stm_lms_courses__single--info_preview"> 
                                                                    <a href="<?php echo site_url() . "cursos/$value->category_slug/$value->slug"; ?>" title="<?php echo $value->name; ?>" class="heading_font"> Vista previa de este curso</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="stm_lms_recent_courses__all text-center"> 
                                                <a href="<?php echo site_url() . 'cursos'; ?>" class="btn btn-default"> Ver todo los cursos </a>
                                            </div>
                                        </div>
                                        <div class="space-70"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row-full-width vc_clearfix"></div>
                        <div data-vc-full-width="true" data-vc-full-width-init="true" class="vc_row wpb_row vc_row-fluid vc_custom_1531998548740 vc_row-has-fill" style="background-position: 50% 100% !important; position: relative; left: -351.5px; box-sizing: border-box; width: 1903px; padding-left: 351.5px; padding-right: 351.5px;">
                            <div class="wpb_column vc_column_container vc_col-sm-2">
                                <div class="vc_column-inner vc_custom_1534239815041">
                                    <div class="wpb_wrapper"></div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-8">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="a3b8602d12208927a4a9a27379b1014ff vc_empty_space" style="height: 62px"> <span class="vc_empty_space_inner"></span></div>
                                        <div class="vc_custom_heading">
                                            <h2 style="font-size: 50px;line-height: 50px;text-align: center">Estamos orgulloso</h2>
                                        </div>
                                        <div class="vc_custom_heading fwl">
                                            <h4 style="font-size: 18px;line-height: 28px;text-align: center">Los cursos son impartidos por instructores altamente educados y calificados que poseen títulos profesionales y maestrías.</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-2">
                                <div class="vc_column-inner vc_custom_1534239801946">
                                    <div class="wpb_wrapper"></div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row-full-width vc_clearfix"></div>
                        <div data-vc-full-width="true" data-vc-full-width-init="true" class="vc_row wpb_row vc_row-fluid vc_custom_1534239338510 a9ff1d1a9908abebc8fc1ee6b5f2d9096 vc_row-has-fill"
                             style="background-position: 50% 100% !important; position: relative; left: -351.5px; box-sizing: border-box; width: 1903px; padding-left: 351.5px; padding-right: 351.5px;">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                            <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="stats_counter with_border_right text-center" style="color:#273044" data-id="counter_module__5e9779c42e2f984b61a845f0de5702c3" data-value="200" data-duration="2.5">
                                                            <div class="h1" id="counter_module__5e9779c42e2f984b61a845f0de5702c3" style="color:#273044;font-size: 70px; line-height: 70px; margin-bottom: 20px;"><?php echo $obj_total->total_customer;?></div>
                                                            <div class="stats_counter_title h5" style="color:#273044;font-size: 20px; line-height: 20px"> Estudiantes</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="stats_counter with_border_right text-center" style="color:#273044" data-id="counter_module__0f3e8d0ecdf201ac2e8336727581db72" data-value="10" data-duration="2.5"> 
                                                            <div class="h1" id="counter_module__0f3e8d0ecdf201ac2e8336727581db72" style="color:#273044;font-size: 70px; line-height: 70px; margin-bottom: 20px;"><?php echo $obj_total->total_courses;?></div>
                                                            <div class="stats_counter_title h5" style="color:#273044;font-size: 20px; line-height: 20px">Cursos</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="stats_counter with_border_right text-center" style="color:#273044" data-id="counter_module__f9e0d4866502e66e96fc1543bd71128d" data-value="1000" data-duration="2.5">
                                                            <div class="h1" id="counter_module__f9e0d4866502e66e96fc1543bd71128d" style="color:#273044;font-size: 70px; line-height: 70px; margin-bottom: 20px;">1000</div>
                                                            <div class="stats_counter_title h5" style="color:#273044;font-size: 20px; line-height: 20px">Horas de Vídeo</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row-full-width vc_clearfix"></div>
                        <div data-vc-full-width="true" data-vc-full-width-init="true" class="vc_row wpb_row vc_row-fluid primary_bg_color vc_custom_1532328330193" style="position: relative; left: -351.5px; box-sizing: border-box; width: 1903px; padding-left: 351.5px; padding-right: 351.5px;">
                            <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-7 vc_col-md-7">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="af4bcee4c7548ab3e42ac0d89c720578a vc_empty_space" style="height: 27px"> <span class="vc_empty_space_inner"></span></div>
                                        <div class="vc_custom_heading vc_custom_1535368966565">
                                            <h4 style="font-size: 19px;color: #ffffff;line-height: 22px;text-align: left">Suscríbase a nuestro boletín</h4>
                                        </div>
                                        <div class="vc_custom_heading fwl">
                                            <h5 style="font-size: 15px;color: #ffffff;line-height: 22px;text-align: left">Mantente informado de los beneficios que tenemos en Edukate Pro, para que seas el próximo emprendedor y tengas tu colegio virtual</h5>
                                        </div>
                                        <div class="a0904c47a8fdb55bdbffdfe58e40ff2d1 vc_empty_space" style="height: 45px"> <span class="vc_empty_space_inner"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-5 vc_col-md-5">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="ad69f92af9df44a962a8cc4e75b2af998 vc_empty_space" style="height: 18px"> <span class="vc_empty_space_inner"></span></div>
                                        <div class="stm_subscribe aed8f1be467e74ab7798b72bc1c0ec271">
                                            <div class="widget widget_mailchimp">
                                                <h5 class="stm_subscribe_title" style="color: #ffffff;">Ingrese su E-mail</h5>
                                                <form action="javascript:void(0);" onsubmit="boletin();">
                                                    <div class="stm_mailchimp_unit">
                                                        <div class="form-group">
                                                            <input type="email" name="email" id="email" class="form-control stm_subscribe_email" placeholder="Ingrese su E-mail" required="">
                                                        </div>
                                                        <button type="submit" class="button"><span class="h5">Suscribirse</span></button>
                                                        <div class="stm_subscribe_preloader">Por favor espera...</div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row-full-width vc_clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view("footer_2"); ?>
        <script defer src="<?php echo site_url() . 'static/page_front/seo/lazysizes.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/autoptimize_54ab.js'; ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script defer src="<?php echo site_url() . 'static/page_front/js/script/home.js'; ?>"></script>
        <script defer src='<?php echo site_url() . 'static/backoffice/js/header_2.js?ver=3.2'; ?>'></script>
        <link rel='stylesheet' id='stm-lms-lesson-css' href='<?php echo site_url() . 'static/backoffice/css/footer/lesson.css?ver=75'; ?>' type='text/css' media="none" onload="if (media != 'all') media = 'all'"/>
        <script defer src='<?php echo site_url() . 'static/backoffice/js/jquery.fancybox.js?ver=3.2'; ?>'></script>
        <script defer src='<?php echo site_url() . 'static/backoffice/js/custom.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/bootstrap.min.js?ver=3.2'; ?>'></script>
</html>
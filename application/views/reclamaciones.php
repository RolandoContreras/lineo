<!DOCTYPE html>
<html lang="es-PE" class="no-js">
    <?php $this->load->view("head") ?>
    <body class="stm_lms_button skin_custom_color online-light vc_responsive"> 
        <div id="wrapper">
            <?php $this->load->view("header"); ?>
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
                                    <span property="name" title="Libro de Reclamaciones">Libro de Reclamaciones</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="post_type_exist clearfix">
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="multiseparator vc_custom_1435665826984"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="custom-border wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner vc_custom_1437478190523">
                                    <div class="wpb_wrapper">
                                        <div class="vc_custom_heading vc_custom_1532608711151">
                                            <h3 style="text-align: left">Libro de Reclamaciones</h3>
                                        </div>
                                        <div role="form" class="wpcf7" id="wpcf7-f403-p413-o1" lang="en-US" dir="ltr">
                                            <div class="screen-reader-response"></div>
                                            <form action="javascript:void(0);" method="post" class="wpcf7-form" onsubmit="send_reclamacion();">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group"> 
                                                            <span class="wpcf7-form-control-wrap name">
                                                                <input type="text" name="name" id="name" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" placeholder="Ingresa tus Nombres" required/>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group"> 
                                                            <span class="wpcf7-form-control-wrap email">
                                                                <input type="text" name="last_name" id="last_name" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control"placeholder="Ingresa tus Apellidos" required/>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group"> 
                                                            <span class="wpcf7-form-control-wrap email">
                                                                <input type="text" name="dni" id="dni" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control"placeholder="Ingresa DNI" required/>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group"> 
                                                            <span class="wpcf7-form-control-wrap message">
                                                                <textarea name="message" id="message" cols="40" rows="9" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control" placeholder="Ingresa Reclamación" required></textarea>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                                                        <button type="submit" class="wpcf7-form-control wpcf7-submit btn btn-default"> Enviar Reclamación</button>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div id="respose"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <?php $this->load->view("footer_2"); ?>
        <script defer src="<?php echo site_url() . 'static/page_front/js/script/reclamaciones.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/autoptimize_54ab.js'; ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/header_2.js?ver=3.2'; ?>'></script>
        <link rel='stylesheet' id='stm-lms-lesson-css' href='<?php echo site_url() . 'static/backoffice/css/footer/lesson.css?ver=75'; ?>' type='text/css' media="none" onload="if (media != 'all') media = 'all'"/>
        <script src='<?php echo site_url() . 'static/backoffice/js/jquery.fancybox.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/custom.js?ver=3.2'; ?>'></script>
    </body>
</html>
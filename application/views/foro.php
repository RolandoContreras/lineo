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
                                    <span property="name" title="Foro">Foro</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="sidebar_position_none">
                        <div class="row">
                            <?php
                            if (!empty($obj_foro)) {
                                foreach ($obj_foro as $value) {
                                    ?>
                                    <div class="col-md-3 col-sm-4 col-xs-6 teacher-col event-col">
                                        <div class="event_archive_item">
                                            <a href="https://stylemixthemes.com/masterstudy/white-lms/events/conscious-discipline-summer-institute/" title="View full">
                                                <div class="event_img"> <img src="https://stylemixthemes.com/masterstudy/white-lms/wp-content/uploads/sites/7/2015/07/Center-for-Digital-Education-Market-Briefing-1000x500-1-1-270x153.jpg"
                                                                             class="attachment-img-270-153 size-img-270-153 wp-post-image" alt="" width="270" height="153"></div>
                                                <div class="h4 title">Conscious Discipline Summer Institute</div>
                                            </a>
                                            <div class="event_start"> <i class="far fa-clock"></i> February 10, 2016</div>
                                            <div class="event_location"> <i class="fa fa-map-marker"></i> Chicago, WY82601, US</div>
                                            <div class="multiseparator"></div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                ?>
                                <p>No hay resultados</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="sidebar-area sidebar-area-none"></div>
                </div>
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
    </body>
</html>








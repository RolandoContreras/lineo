<!DOCTYPE html>
<html lang="en-US" class="no-js">
    <?php $this->load->view("head") ?>
    <body class="stm_lms_button skin_custom_color online-light vc_responsive"> 
        <div id="wrapper">
            <?php $this->load->view("header"); ?>
            <div id="main">
                <div class="error_page">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="heading_font">
                                    <div class="error_404">404</div>
                                    <div class="h2">La página que estas buscando no existe.</div>
                                </div> <a href="<?php echo site_url();?>" class="btn btn-default">IR A INICIO</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view("footer_2"); ?>
        <script src="<?php echo site_url() . 'static/page_front/js/autoptimize_54ab.js'; ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/header_2.js?ver=3.2'; ?>'></script>
        <link rel='stylesheet' id='stm-lms-lesson-css' href='<?php echo site_url() . 'static/backoffice/css/footer/lesson.css?ver=75'; ?>' type='text/css' media="none" onload="if (media != 'all') media = 'all'"/>
        <script src='<?php echo site_url() . 'static/backoffice/js/jquery.fancybox.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/custom.js?ver=3.2'; ?>'></script>
    </body>
</html>
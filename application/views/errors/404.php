<!DOCTYPE html>
<html lang="en-US" class="no-js">
    <?php $this->load->view("head") ?>
    <body class="page-template-default page page-id-413 stm_lms_button pmpro-body-has-access skin_custom_color online-light stm_preloader_1 wpb-js-composer js-comp-ver-5.6 vc_responsive" ontouchstart=""> 
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
        <?php $this->load->view("footer"); ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/autoptimize_667d.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/script/contact.js'; ?>"></script>
    </body>
</html>
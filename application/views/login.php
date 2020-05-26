<!DOCTYPE html>
<html lang="en-US" class="no-js">
    <?php $this->load->view("head"); ?>
    <body class="stm_lms_button skin_custom_color online-light stm_preloader_1 wpb-js-composer js-comp-ver-5.6 vc_responsive" ontouchstart="">
        <div id="wrapper">
            <?php $this->load->view("header"); ?>
            <!-- id header -->
            <div id="main">

                <div class="stm-lms-wrapper stm-lms-wrapper__login">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="stm_lms_row_animation"> 
                                    <img src="<?php echo site_url() . 'static/page_front/images/animation/base.png';?>">              
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="stm-lms-login" class="stm-lms-login active">
                                    <div class="stm-lms-login__top">
                                        <h3>Iniciar Sesión</h3>
                                    </div>
                                    <form onsubmit="login();" action="javascript:void(0);" method="post">
                                        <div class="stm_lms_login_wrapper">
                                            <div class="form-group"> 
                                                <label class="heading_font"> E-mail </label> 
                                                <input class="form-control" type="text" name="username" id="username" placeholder="Ingrese Usuario" required/> 
                                            </div>
                                            <div class="form-group"> 
                                                <label class="heading_font"> Password </label> 
                                                <input class="form-control" type="password" name="password" id="password" placeholder="Ingrese Contraseña" required/> 
                                            </div>
                                            <div class="stm_lms_login_wrapper__actions">
                                                <label class="stm_lms_styled_checkbox"> 
                                                    <a href="<?php echo site_url().'registro';?>">
                                                        <span class="lostpassword" title="¿Olvidaste tu contraseña?"> ¿Aún no tienes cuenta? </span>
                                                    </a>
                                                </label>                  
                                                <a href="<?php echo site_url().'recuperar-contrasena';?>">
                                                    <span class="lostpassword" title="¿Olvidaste tu contraseña?"> ¿Olvidaste tu contraseña? </span>
                                                </a>
                                                <button class="btn btn-default"> 
                                                    Iniciar Sesión
                                                </button>
                                                <div id="respose"></div>
                                            </div>
                                        </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--#main-->
        </div>
        <!--#wrapper-->
        <?php $this->load->view("footer"); ?>
        <script src="<?php echo site_url() . 'static/page_front/js/autoptimize_667d.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/script/login.js'; ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </body>
</html>
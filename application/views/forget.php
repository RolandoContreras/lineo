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
                                        <h3>Recuperar Contraseña</h3>
                                    </div>
                                    <form onsubmit="recuperar();" action="javascript:void(0);" method="post">
                                        <div class="stm_lms_login_wrapper">
                                            <div class="form-group"> 
                                                <label class="heading_font"> E-mail </label> 
                                                <input class="form-control" type="text" name="email" id="email" placeholder="Ingrese tu e-mail registrado" required/> 
                                            </div>
                                            <div class="stm_lms_login_wrapper__actions">
                                                
                                                <label class="stm_lms_styled_checkbox"> 
                                                    <span> 
                                                        <a href="<?php echo site_url().'iniciar-sesion';?>">
                                                            <span class="lostpassword" title="Iniciar Sesión"> Iniciar Sesión </span>
                                                        </a>
                                                    </span> 
                                                </label>                  
                                                
                                                <button class="btn btn-default"> 
                                                    Recuperar
                                                </button>
                                                <br/>
                                                <div id="mensaje"></div>
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
        <script src="<?php echo site_url() . 'static/page_front/js/script/forget.js'; ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </body>
</html>
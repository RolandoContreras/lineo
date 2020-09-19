<!DOCTYPE html>
<html lang="es-PE" class="no-js">
    <?php $this->load->view("head"); ?>
    <body class="stm_lms_button skin_custom_color online-light vc_responsive">
        <div id="wrapper">
            <?php $this->load->view("header"); ?>
            <!-- id header -->
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
                                    <span property="name" title="Recuperar Contraseña">Recuperar Contraseña</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stm-lms-wrapper stm-lms-wrapper__login">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-login" src="<?php echo site_url() . 'static/page_front/images/inicio-sesion.jpg'; ?>" alt="inicio-de-sesion" width="500"/>          
                            </div>
                            <div class="col-md-6">
                                <div id="stm-lms-login" class="stm-lms-login active">
                                    <div class="stm-lms-login__top">
                                        <h3>Recuperar Contraseña</h3>
                                    </div>
                                    <form onsubmit="recuperar();" action="javascript:void(0);" method="post" id="forgetForm">
                                        <div class="stm_lms_login_wrapper">
                                            <div class="form-group"> 
                                                <label class="heading_font"> E-mail </label> 
                                                <input class="form-control" type="text" name="email" id="email" placeholder="Ingrese tu e-mail registrado" required/> 
                                            </div>
                                            <div class="stm_lms_login_wrapper__actions">

                                                <label class="stm_lms_styled_checkbox"> 
                                                    <span> 
                                                        <a href="<?php echo site_url() . 'iniciar-sesion'; ?>">
                                                            <span class="lostpassword" title="Iniciar Sesión"> Iniciar Sesión </span>
                                                        </a>
                                                    </span> 
                                                </label>                  
                                                <input type="hidden" name="google-response-token" id="google-response-token">
                                                <button class="btn btn-default" id="forget_boton" type="submit"> 
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
        <?php $this->load->view("footer_2"); ?>
        <script src='https://www.google.com/recaptcha/api.js?render=6LcXCc4ZAAAAAEFwa5tEfoYarwD2I06jY65FSHj6'></script>
        <script type="text/javascript">
                                        grecaptcha.ready(function () {
                                            grecaptcha.execute('6LcXCc4ZAAAAAEFwa5tEfoYarwD2I06jY65FSHj6', {action: 'homepage'})
                                                    .then(function (token) {
                                                        $('#google-response-token').val(token);
                                                    });
                                        });
        </script>
        <script src="<?php echo site_url() . 'static/page_front/js/script/forget.js'; ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/autoptimize_54ab.js'; ?>"></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/header_2.js?ver=3.2'; ?>'></script>
        <link rel='stylesheet' id='stm-lms-lesson-css' href='<?php echo site_url() . 'static/backoffice/css/footer/lesson.css?ver=75'; ?>' type='text/css' media="none" onload="if (media != 'all') media = 'all'"/>
        <script src='<?php echo site_url() . 'static/backoffice/js/jquery.fancybox.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/custom.js?ver=3.2'; ?>'></script>
        <script src="<?php echo site_url() . 'static/page_front/js/script/login.js'; ?>"></script>
    </body>
</html>
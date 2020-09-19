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
                                    <span property="name" title="Registro">Registro</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stm-lms-wrapper stm-lms-wrapper__login">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="stm_lms_row_animation"> 
                                    <img src="<?php echo site_url() . 'static/page_front/images/registro_img.jpg'; ?>" alt="registro"/>                 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="stm-lms-register" class="vue_is_disabled is_vue_loaded">
                                    <h3>Regístrate</h3>
                                    <form onsubmit="register();" action="javascript:void(0);" method="post" id="register-form">
                                        <div class="stm_lms_register_wrapper">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="heading_font">Nombres</label> <input type="text" name="name" id="name" placeholder="Ingresa tus nombres" class="form-control" required></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="heading_font">Apellidos</label> <input type="text" name="last_name" id="last_name" placeholder="Ingresa tus apellidos" class="form-control" required></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group"><label class="heading_font">E-mail</label> <input type="email" name="email" id="email" placeholder="Ingresa tu E-mail" class="form-control" required></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="heading_font">Contraseña</label> <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña" class="form-control" required></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="heading_font">Teléfono</label> <input type="text" name="phone" id="phone" placeholder="Ingresa tu teléfono" class="form-control" required></div>
                                                </div>
                                            </div>
                                            <!---->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="stm_lms_register_wrapper__actions">
                                                        <div class="form-group"><label class="heading_font">Seleccionar tu País</label> 
                                                            <select class="disable-select form-control" name="country" id="country" required="">
                                                                <option  selected value="">País *</option>
                                                                <?php foreach ($obj_paises as $key => $value) { ?>
                                                                    <option style="border-style: solid !important" value="<?php echo $value->id; ?>"><?php echo $value->nombre; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="stm_lms_register_wrapper__actions">
                                                        <label class="stm_lms_styled_checkbox"> 
                                                            <a href="<?php echo site_url() . 'iniciar-sesion'; ?>">
                                                                <span class="lostpassword" title="iniciar-sesion"> ¿Tienes una cuenta? </span>
                                                            </a>
                                                        </label>
                                                        <input type="hidden" name="google-response-token" id="google-response-token">
                                                        <button class="btn btn-default" type="submit" id="register_boton"> 
                                                            Registrar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="mensaje">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!---->
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
        <script src="<?php echo site_url() . 'static/page_front/js/script/register.js'; ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/autoptimize_54ab.js'; ?>"></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/header_2.js?ver=3.2'; ?>'></script>
        <link rel='stylesheet' id='stm-lms-lesson-css' href='<?php echo site_url() . 'static/backoffice/css/footer/lesson.css?ver=75'; ?>' type='text/css' media="none" onload="if (media != 'all') media = 'all'"/>
        <script src='<?php echo site_url() . 'static/backoffice/js/jquery.fancybox.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/custom.js?ver=3.2'; ?>'></script>
        <script src="<?php echo site_url() . 'static/page_front/js/script/login.js'; ?>"></script>
    </body>
</html>
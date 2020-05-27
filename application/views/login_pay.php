<!DOCTYPE html>
<html lang="en-US" class="no-js">
    <?php $this->load->view("head"); ?>
    <body class="stm_lms_button skin_custom_color online-light stm_preloader_1 wpb-js-composer js-comp-ver-5.6 vc_responsive" ontouchstart="">
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NTCN84F"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <div id="wrapper">
            <?php $this->load->view("header"); ?>
            <!-- id header -->
            <div id="main">

                <div class="stm-lms-wrapper stm-lms-wrapper__login">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="stm-lms-register" class="vue_is_disabled is_vue_loaded">
                                    <h3>Regístrate</h3>
                                    <form onsubmit="register();" action="javascript:void(0);" method="post">
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
                                                        <button class="btn btn-default"> 
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
                            <div class="col-md-6">
                                <div id="stm-lms-login" class="stm-lms-login active">
                                    <div class="stm-lms-login__top">
                                        <h3>Iniciar Sesión</h3>
                                    </div>
                                    <form onsubmit="login();" action="javascript:void(0);" method="post">
                                        <div class="stm_lms_login_wrapper">
                                            <div class="form-group"> 
                                                <label class="heading_font"> E-mail </label> 
                                                <input class="form-control" type="text" name="username" id="username2" placeholder="Ingrese Usuario" required/> 
                                            </div>
                                            <div class="form-group"> 
                                                <label class="heading_font"> Password </label> 
                                                <input class="form-control" type="password" name="password" id="password2" placeholder="Ingrese Contraseña" required/> 
                                            </div>
                                            <div class="stm_lms_login_wrapper__actions">
                                                <label class="stm_lms_styled_checkbox"> 
                                                    <span class="stm_lms_styled_checkbox__inner"> 
                                                        <input type="checkbox" name="Recuérdame"/> <span><i class="fa fa-check"></i> </span> 
                                                    </span> 
                                                    <span>Recuérdame</span> 
                                                </label>                  
                                                <span class="lostpassword" title="¿Olvidaste tu contraseña?"> ¿Olvidaste tu contraseña? </span>
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
        <script src="<?php echo site_url() . 'static/page_front/js/script/login_register.js'; ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </body>
</html>
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
                                    <img src="<?php echo site_url() . 'static/page_front/images/animation/base.png'; ?>">              
                                </div>
                            </div>
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
                                                        <label class="stm_lms_styled_checkbox"> 
                                                        <a href="<?php echo site_url().'iniciar-sesion';?>">
                                                            <span class="lostpassword" title="iniciar-sesion"> ¿Tienes una cuenta? </span>
                                                        </a>
                                                </label>   
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
                        </div>
                    </div>
                </div>
            </div>
            <!--#main-->
        </div>
        <!--#wrapper-->
        <?php $this->load->view("footer"); ?>
        <script src="<?php echo site_url() . 'static/page_front/js/autoptimize_667d.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/script/register.js'; ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </body>
</html>
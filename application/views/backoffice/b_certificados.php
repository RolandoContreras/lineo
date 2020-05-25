<div class="col-md-9 col-sm-12">
    <div class="stm_lms_private_information" data-container-open=".stm_lms_private_information">
        <h2>Mis Certificados</h2>
        <h4 class="no-certificates-notice">Usted no tiene certificados aún.</h4>
        <h4 class="no-certificates-notice">Comience fácilmente, seleccione un curso aquí, páselo y obtenga su primer certificado</h4>
    </div>
    <div data-container-open=".stm_lms_edit_account">
        <div class="stm_lms_edit_account" id="stm_lms_edit_account">
            <div class="stm_lms_user_info_top">
                <h1>Editar Perfil</h1>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="heading_font">Nombre</label>
                        <input class="form-control" id="name" name="name" placeholder="Ingresa tu nombre" value="<?php echo $obj_profile->name; ?>" required/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="heading_font">Apellidos</label>
                        <input id="last_name" name="last_name" class="form-control" placeholder="Ingresa tus apellidos" value="<?php echo $obj_profile->last_name; ?>" required/>
                    </div>
                </div>
            </div>
            <form method="post" action="javascript:void(0);" onsubmit="save_information();">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"> 
                            <label class="heading_font">Biografía</label> 
                            <textarea id="bio" name="bio" placeholder="Ingresa tu descripción"><?php echo $obj_profile->bio; ?></textarea> 
                        </div>
                    </div>
                </div>
                <div class="stm_lms_edit_socials">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Sociales</h3>
                            <p>Agregue sus enlaces de sus redes sociales, estos se mostrarán en su perfil público.</p>
                        </div>
                    </div>
                    <div class="stm_lms_edit_socials_list">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <label class="heading_font">Facebook</label>
                                    <div class="form-group-social"> 
                                        <input id="facebook" name="facebook" class="form-control" placeholder="Ingresa tu enlace de Facebook" value="<?php echo $obj_profile->facebook; ?>"/> <i class="fab fa-facebook-f"></i>                      
                                    </div>
                                </div>
                                <div class="form-group"> <label class="heading_font">Google Plus</label>
                                    <div class="form-group-social"> 
                                        <input id="google" name="google" class="form-control" placeholder="Ingresa tu enlace de Google Plus" value="<?php echo $obj_profile->google; ?>" /> <i class="fab fa-google-plus-g"></i>                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> <label class="heading_font">Twitter</label>
                                    <div class="form-group-social"> 
                                        <input id="twitter" name="twitter" class="form-control" placeholder="Ingresa tu enlace de Twitter" value="<?php echo $obj_profile->twitter; ?>"/> <i class="fab fa-twitter"></i> 
                                    </div>
                                </div>
                                <div class="form-group"> <label class="heading_font">Instagram</label>
                                    <div class="form-group-social"> 
                                        <input id="instagram" name="instagram" class="form-control" placeholder="Ingresa tu enlace de Instagram" value="<?php echo $obj_profile->instagram; ?>"/> <i class="fab fa-instagram"></i>                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> 
                            <button type="submit" class="btn btn-default">Guardar Información</button> 
                        </div>
                    </div>
                </div>
            </form>
            <form method="post" action="javascript:void(0);" onsubmit="change_pass();">
                <div class="stm_lms_edit_socials">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Cambiar Contraseña</h3>
                        </div>
                    </div>
                    <div class="stm_lms_edit_socials_list">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> 
                                    <label class="heading_font">Nueva contraseña</label>
                                    <div class="form-group-social"> 
                                        <input type="password" id="pass" name="pass" class="form-control" placeholder="Ingrese su nueva contraseña" required="" /> <i class="fa fa-key"></i> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> 
                                    <label class="heading_font">Confirme nueva contraseña</label>
                                    <div class="form-group-social"> 
                                        <input type="password" id="new_pass" name="new_pass" class="form-control" placeholder="Ingrese su nueva contraseña" required=""/> <i class="fa fa-key"></i> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12"> 
                        <button type="submit" class="btn btn-default">Cambiar Contraseña</button> 
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo site_url() . 'assets/backoffice/js/script/profile.js'; ?>"></script>
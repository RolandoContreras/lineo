<div class="col-md-9 col-sm-12">
    <div class="stm_lms_private_information" data-container-open=".stm_lms_private_information">
        <h2>Mis Certificados</h2>
        <?php if (!empty($obj_courses_by_customer)) { ?>
            <div class="stm-lms-user-quizzes stm-lms-user-certificates">
                <div class="stm-lms-user-quiz__head heading_font">
                    <div class="stm-lms-user-quiz__head_title">Curso</div>
                    <div class="stm-lms-user-quiz__head_status">Certificado</div>
                </div>
                <?php foreach ($obj_courses_by_customer as $value) { ?>
                    <div class="stm-lms-user-quiz">
                        <div class="stm-lms-user-quiz__title">
                            <?php echo $value->name; ?>
                        </div>
                        <?php if ($value->complete == 1) { ?>
                                <a href="<?php echo site_url()."backoffice/certificados/download/$value->customer_course_id"?>" target="_blank" class="stm-lms-user-quiz__name" target="_blank">Descargar</a>
                            <div class="affiliate_points heading_font">
                                <span class="affiliate_points__btn">
                                    <input type="text" id="<?php echo $value->certificate; ?>" value="<?php echo $value->certificate; ?>"/>
                                    <span class="text" onclick="copy('<?php echo $value->certificate; ?>')" style="cursor: pointer;">Copiar Código</span>
                                    <i id="fa_<?php echo $value->certificate; ?>" class="fa fa-link"></i>
                                </span>
                            </div>
                        <?php } else { ?>
                            <a onclick="" class="stm-lms-user-quiz__name"></a>
                            <div class="affiliate_points heading_font" data-copy="lmsx30x1001">
                                <span class="affiliate_points__btn">
                                    <i class="fa fa-clock"></i>
                                    <span class="text">En Proceso</span>
                                </span>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div class="space-15"></div>
            <h5 class="stm_lms_update_field__first_name">Copia el código de tu certificado y verifícalo <a href="<?php echo site_url() . 'certificados'; ?>">¡Clic aquí!</a></h5>
        <?php } else { ?>
            <h4 class="no-certificates-notice">Usted no tiene certificados aún.</h4>
            <h4 class="no-certificates-notice">Comience fácilmente, seleccione un curso aquí, páselo y obtenga su primer certificado</h4>
        <?php } ?>
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
            <div class="stm_lms_edit_socials">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Cambiar Imagen de Perfil</h3>
                        <p>Tamaño de la imagen recomendada (215 x 215)</p>
                    </div>
                </div>
                <div class="stm_lms_edit_socials_list">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"> 
                                <form id="dropzone" action="<?php echo site_url() . 'backoffice/upload_perfil'; ?>" class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" id="archivos"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo site_url() . 'static/backoffice/js/script/profile.js'; ?>"></script>
<script src="<?php echo site_url() . 'static/backoffice/js/script/certificado.js'; ?>"></script>
<script>
                Dropzone.options.dropzone = {
                    paramName: "file", // The name that will be used to transfer the file
                    maxFiles: 1,
                    maxFilesize: 2,
                    acceptedFiles: "image/*"// MB
                };
                var myDropzone = new Dropzone("#archivos", {url: site + "backoffice/backoffice/upload_perfil"});
</script>
<link rel='stylesheet' id='stm-lms-manage_course-css'  href='<?php echo site_url() . 'static/page_front/css/manage_course.css?ver=88'; ?>' type='text/css' media='all' />
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo site_url() . 'static/page_front/dropzone/css/dropzone.css'; ?>" media="all">
<script defer src="<?php echo site_url() . 'static/page_front/dropzone/js/dropzone.js'; ?>"></script>
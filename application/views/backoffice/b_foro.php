<div class="col-md-9 col-sm-12">
    <div class="stm_lms_private_information" data-container-open=".stm_lms_private_information">
            <h2>Subir Proyecto</h2>
            <p>Ingrese la información del nuevo blog.</p>
    </div>
    <div class="row">
        <form name="new_foro" action="javascript:void(0);" method="post" onsubmit="crear_foro();">
            <div class="col-md-12">
                <div class="form-group"> <label class="heading_font">Título</label>
                    <div class="form-group-social"> 
                        <input id="title" name="title" class="form-control" placeholder="Ingresa el Título" value="<?php echo isset($obj_blog) ? $obj_blog->title : ""; ?>" required=""/>                      
                        <input type="hidden" name="foro_id" value="<?php echo isset($obj_foro) ? $obj_foro->foro_id : ""; ?>" />
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group"> 
                    <label class="heading_font">Curso</label>
                    <select class="disable-select form-control" name="course_id" id="course_id" required="">
                        <option  selected value="">Seleccionar *</option>
                        <?php foreach ($obj_courses as $value) { ?>
                            <option value="<?php echo $value->course_id; ?>"
                            <?php
                            if (isset($obj_course->course_id)) {
                                if ($obj_course->course_id == $value->course_id) {
                                    echo "selected";
                                }
                            }
                            ?>><?php echo $value->name; ?></option>    
                                <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group"> <label class="heading_font">Descripción</label>
                    <div class="form-group-social"> 
                        <textarea id="description" name="description" required=""><?php echo isset($obj_blog) ? $obj_blog->description : null; ?></textarea>
                        <script>
                            CKEDITOR.replace('description');
                        </script>
                    </div>
                </div>
                <div class="form-group"> 
                    <?php if (isset($obj_blog)) { ?>
                        <div class="form-group">
                            <img src='<?php echo site_url() . "assets/cms/img/blog/$obj_blog->blog_id/$obj_blog->img"; ?>' width="100" />
                            <input class="form-control" type="hidden" name="img2" id="img2" value="<?php echo isset($obj_blog) ? $obj_blog->img : ""; ?>">
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group"> <label class="heading_font">Imagen - Tamaño recomendado (870 x 434) </label>
                    <div class="form-group-social"> 
                        <input type="file" name="file" class="form-control" placeholder="Ingrese Archivo" <?php echo isset($obj_blog) ? "" : "required"; ?>>
                    </div>
                </div>
                <div class="col-md-12"> 
                    <button type="submit" id="save_foro" class="btn btn-default">Guardar Blog</button> 
                    <button onclick="back();" class="btn btn-info">REGRESAR</button> 
                </div>
            </div>
        </form>
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
<script src="<?php echo site_url() . 'static/backoffice/js/script/foro.js'; ?>"></script>
<script>
    Dropzone.options.dropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 1,
        maxFilesize: 2,
        acceptedFiles: "image/*"// MB
    };
    var myDropzone = new Dropzone("#archivos", {url: site + "backoffice/backoffice/upload_perfil"});
</script>
<script src="<?php echo site_url() . 'static/backoffice/js/sweetalert.min.js'; ?>"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo site_url() . 'static/page_front/dropzone/css/dropzone.css'; ?>" media="all">
<script defer src="<?php echo site_url() . 'static/page_front/dropzone/js/dropzone.js'; ?>"></script>
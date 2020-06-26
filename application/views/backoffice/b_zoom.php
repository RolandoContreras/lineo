<div class="col-md-9 col-sm-12">
    <div class="stm_lms_private_information" data-container-open=".stm_lms_private_information">
        <h2>Soporte</h2>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">            
            <div class="blog_layout_grid sidebar_position_right">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 blog-cols-sidebar sticky plugin_style">
                        <div class="post_list_content_unit">
                            <div>
                                <div class="post_list_featured_image">
                                    <img src="<?php echo site_url().'static/backoffice/images/zoom.jpg';?>" class="img-responsive wp-post-image" width="370" height="193">
                                </div>
                            </div>
                                <div class="h3">Comunícate con nosotros a través de ZOOM</div>
                                <p>Líder en comunicaciones de video empresariales modernas, con una plataforma en la nube fácil y confiable para video y audio ... Zoom Rooms es la solución de sala de conferencias original basada en software utilizada en todo el mundo</p>
                                <p>Clic al siguiente enlace para unirte a nuestra sala <a href="https://zoom.us/j/7609009840" target="_blank">¡Clic Aquí!</a></p>
                                
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 blog-cols-sidebar plugin_style">
                        <div class="post_list_content_unit">
                            <div>
                                <div class="post_list_featured_image">
                                        <img src="<?php echo site_url().'static/backoffice/images/teamweaver.jpg';?>" class="img-responsive wp-post-image" width="370" height="193">
                                </div>
                            </div>
                                <div class="h3">Programa una cita en TeamViewer</div>
                                <p>TeamViewer es una solución integral de acceso, control y soporte remoto que trabaja con casi todos los escritorios y plataformas móviles, incluyendo Windows, macOS, Android, y con iOS. TeamViewer te permite entrar en ordenadores y dispositivos móviles en remoto.</p>
                                <p>Clic al siguiente enlace para unirte a nuestra sala <a href="https://zoom.us/j/7609009840" target="_blank">¡Clic Aquí!</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 blog-cols-sidebar plugin_style">
                        <div class="post_list_content_unit">
                            <div>
                                <div class="post_list_featured_image">
                                        <img src="<?php echo site_url().'static/backoffice/images/chat.jpg';?>" class="img-responsive wp-post-image" width="370" height="193">
                                </div>
                            </div>
                                <div class="h3">Chat de soporte</div>
                                <p>Estamos atento a todas tus necesidades, no dudes en escribirnos para solucionar los inconvenientes que logren surgir, si necesitas programar una reunión con zoom o TeamViewer realízalo por el chat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<script src="<?php echo site_url() . 'assets/backoffice/js/script/profile.js'; ?>"></script>
<script>
                    Dropzone.options.dropzone = {
                        paramName: "file", // The name that will be used to transfer the file
                        maxFiles: 1,
                        maxFilesize: 2,
                        acceptedFiles: "image/*"// MB
                    };
                    var myDropzone = new Dropzone("#archivos", {url: site + "backoffice/backoffice/upload_perfil"});
    </script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo site_url() . 'static/page_front/dropzone/css/dropzone.css'; ?>" media="all">
<script defer src="<?php echo site_url() . 'static/page_front/dropzone/js/dropzone.js'; ?>"></script>
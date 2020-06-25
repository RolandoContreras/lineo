<div class="col-md-9 col-sm-12">
    <div class="stm_lms_private_information" data-container-open=".stm_lms_private_information">
        <div class="stm_lms_user_info_top">
            <h1><?php echo $_SESSION['customer']['name']; ?></h1>
            <div class="stm_lms_user_info_top__socials">
                <a href="<?php echo $obj_profile->facebook; ?>" target="_blank" class="facebook stm_lms_update_field__facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="<?php echo $obj_profile->instagram; ?>" target="_blank" class="instagram stm_lms_update_field__instagram"><i class="fab fa-instagram"></i></a>
                <a href="<?php echo $obj_profile->twitter; ?>" target="_blank" class="twitter twitter stm_lms_update_field__twitter"><i class="fab fa-twitter"></i></a>
                <a href="<?php echo $obj_profile->google; ?>" target="_blank" class="google-plus stm_lms_update_field__google-plus"><i class="fab fa-google-plus-g"></i></a>
            </div>
        </div>
        <div class="stm_lms_user_bio">
            <h3>Biografía</h3>
            <div class="stm_lms_update_field__description">
                <?php echo $obj_profile->bio; ?>
                Complete su información en <b>Editar Perfil</b>
            </div>
        </div>
        <div class="stm_lms_instructor_courses__top">
            <a href="<?php echo site_url() . 'cursos' ?>" class="btn btn-default"> <i class="fa fa-plus"></i>Adquirir Nuevo Curso </a>
        </div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"> <a href="#my-courses" data-toggle="tab">Mis Cursos </a> </li>
            <li role="presentation" class=""><a href="#my-quizzes" data-toggle="tab" aria-expanded="true">Mis Examenes</a></li>
            <li role="presentation" class=""> <a href="#my-memberships" data-toggle="tab">Mis Compras </a> </li>
        </ul>
        <div class="tab-content">
            <!--Mis Cursos-->
            <div role="tabpanel" class="tab-pane vue_is_disabled active" v-bind:class="{'is_vue_loaded' : vue_loaded}" id="my-courses">
                <div class="stm-lms-user-courses">
                    <div class="stm_lms_instructor_courses__grid">
                        <?php
                        if (count($obj_courses_by_customer) != null) {
                            foreach ($obj_courses_by_customer as $value) {
                                ?>
                                <div class="stm_lms_instructor_courses__single">
                                    <div class="stm_lms_instructor_courses__single__inner">
                                        <div class="stm_lms_instructor_courses__single--image">
                                            <div>
                                                <img srcset="<?php echo site_url() . "static/cms/img/cursos/$value->img" ?> 2x" src="<?php echo site_url() . "static/cms/img/cursos/$value->img" ?>" alt="<?php echo $value->name; ?>" title="<?php echo $value->name; ?>" width="272" height="161">
                                            </div>
                                        </div>
                                        <div class="stm_lms_instructor_courses__single--inner">
                                            <div class="stm_lms_instructor_courses__single--terms">
                                                <div class="stm_lms_instructor_courses__single--term">
                                                    <a href="<?php echo site_url() . "cursos/$value->category_slug"; ?>" title="<?php echo $value->name; ?>"><?php echo $value->category_name; ?></a>
                                                </div>
                                            </div>
                                            <div class="stm_lms_instructor_courses__single--title">
                                                <a href="<?php echo site_url() . "plataforma/$value->category_slug/$value->slug"; ?>">
                                                    <h5><?php echo $value->name; ?></h5>
                                                </a>
                                            </div>
                                            <div class="stm_lms_instructor_courses__single--progress">
                                                <div class="stm_lms_instructor_courses__single--progress_top">
                                                    <div class="stm_lms_instructor_courses__single--duration"><i class="far fa-clock"></i> <?php echo $value->time; ?> horas </div>
                                                    <div class="stm_lms_instructor_courses__single--completed"> 
                                                        <?php
                                                        if ($value->total == null || $value->total == 0) {
                                                            echo "0% Completado";
                                                            $percent = 0;
                                                        } else {
                                                            $percent = ($value->total_video / $value->total) * 100;
                                                            echo ceil($percent) . "% Completado";
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                                <div class="stm_lms_instructor_courses__single--progress_bar">
                                                    <div class="stm_lms_instructor_courses__single--progress_filled" style="width: <?php echo $percent; ?>%;"></div>
                                                </div>
                                            </div>
                                            <div class="stm_lms_instructor_courses__single--enroll">
                                                <a href="<?php echo site_url() . "plataforma/$value->category_slug/$value->slug"; ?>" class="btn btn-default">
                                                    <span>Iniciar Curso</span>
                                                </a>
                                            </div>
                                            <div class="stm_lms_instructor_courses__single--started">Inicio <?php echo formato_fecha($value->date_start) ?></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            ?>
                            <div class="stm_lms_instructor_courses__single">
                                <div class="stm_lms_instructor_courses__single__inner no-border">
                                    No tiene cursos, <b><a href="<?php echo site_url() . 'backoffice/cursos'; ?>"> &nbsp;¡Compre uno ahora!</a></b>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!--Mis Examenes-->
            <div role="tabpanel" id="my-quizzes" v-bind:class="{'is_vue_loaded' : vue_loaded}" class="tab-pane vue_is_disabled is_vue_loaded">
                <div class="stm-lms-user-quizzes">
                    <h3>Mis Examenes</h3>
<!--                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <th>Curso</th>
                                        <th>Quiz</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($obj_orders) != null) {
                                        foreach ($obj_orders as $value) {
                                            ?>
                                            <tr id="pmpro_account-invoice-3B9914E266">
                                                <td><?php echo formato_fecha_dia_de_mes_de_ano($value->date); ?></td>
                                                <td><?php echo $value->course_name; ?></td>
                                                <td><sup>&#8364;</sup><?php echo $value->total; ?></td>
                                                <td><?php echo $value->active == 2 ? "Pagado" : "Pendiente"; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="4">No hay registros</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>-->
                    <h4>No hay examenes.</h4>
                </div>
                <!---->
            </div>
            <!--Mis pedidos-->
            <div role="tabpanel" class="tab-pane vue_is_disabled " v-bind:class="{'is_vue_loaded' : vue_loaded}" id="my-memberships">
                <div class="stm-lms-user-memberships">
                    <div id="pmpro_account">
                        <div id="pmpro_account-invoices" class="pmpro_box">
                            <h3>Facturas</h3>
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Curso</th>
                                        <th>Importe</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($obj_orders) != null) {
                                        foreach ($obj_orders as $value) {
                                            ?>
                                            <tr id="pmpro_account-invoice-3B9914E266">
                                                <td><?php echo formato_fecha_dia_de_mes_de_ano($value->date); ?></td>
                                                <td><?php echo $value->course_name; ?></td>
                                                <td><sup>s/.</sup><?php echo $value->total; ?></td>
                                                <td><?php echo $value->active == 2 ? "Pagado" : "Pendiente"; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="4">No hay registros</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
<script src="<?php echo site_url() . 'static/backoffice/js/script/profile.js'; ?>"></script>
<script>
                $(document).ready(function () {
                    swal("Recibe hasta un 75% de descuento", "Mira todos los cursos que tenemos para ti. Apúrate que el momento de aprender es ahora.", "success");
                });
</script>
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




    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <link rel="stylesheet" href="<?php echo site_url() . 'static/page_front/dropzone/css/dropzone.css'; ?>" media="all">
    <script defer src="<?php echo site_url() . 'static/page_front/dropzone/js/dropzone.js'; ?>"></script>
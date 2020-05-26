<!DOCTYPE html>
<html lang="es" class="no-js">
    <?php $this->load->view("backoffice/head"); ?>
    <body class="logged-in stm_lms_button skin_custom_color online-light stm_preloader_1 wpb-js-composer js-comp-ver-5.6 vc_responsive" ontouchstart="">
        <div id="wrapper">
            <?php $this->load->view("header"); ?>
            <!-- id header -->
            <div id="main">
                <div class="stm-lms-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="stm_lms_user_side">
                                    <div class="stm-lms-user-avatar-edit "> 
                                        <div class=""> 
                                            <?php if (!empty($_SESSION['customer']['img'])) { ?>
                                                <img class="img-radius" alt='avatar' src='<?php echo site_url() . 'static/backoffice/images/profile/' . $_SESSION['customer']['img']; ?>' class='avatar avatar-215 photo' height='215' width='215'/> 
                                            <?php } else { ?>
                                                <img alt='avatar' src='<?php echo site_url() . 'static/backoffice/images/avatar.png'; ?>' class='avatar avatar-215 photo' height='215' width='215'/> 
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <h3 class="stm_lms_update_field__first_name"><?php echo $_SESSION['customer']['name']; ?></h3>
                                    <div class="stm_lms_profile_buttons_set 22">
                                        <div class="stm_lms_profile_buttons_set__inner">
                                            <div class="stm-lms-user_message_btn"> <i class="stm-lms-user_message_btn__counter">1</i> 
                                                <a href="#" class="btn btn-default">Mis Mensajes</a>
                                            </div>
                                            <div class="stm-lms-user_create_announcement_btn">
                                                <a href="<?php echo site_url() . 'backoffice'; ?>"><i class="fa fa-home"></i><span>Inicio</span></a>
                                            </div>
                                            <div class="stm-lms-user_create_announcement_btn">
                                                <a href="<?php echo site_url() . 'backoffice/certificados'; ?>">
                                                    <i class="fa fa-medal"></i>
                                                    <span>Mis Certificados</span>
                                                </a>
                                            </div>
                                            <div class="stm-lms-user_create_announcement_btn">
                                                <a href="<?php echo site_url() . 'cursos'; ?>"><i class="fa fa-shopping-cart"></i><span>Comprar Curso</span></a>
                                            </div>
                                            <div class="stm-lms-user_edit_profile_btn" data-container=".stm_lms_edit_account">
                                                <a href="<?php echo site_url() . 'backoffice#settings'; ?>"> <i class="fa fa-cog"></i> <span>Editar Perfil</span> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo $body; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--#main-->
        </div>
        <!--#wrapper-->
        <?php $this->load->view("footer"); ?>
        <link rel='stylesheet' id='stm-lms-cart-css' href='https://stylemixthemes.com/masterstudy/white-lms/wp-content/plugins/masterstudy-lms-learning-management-system/assets/css/parts/cart.css?ver=75' type='text/css' media='all' />
        <link rel='stylesheet' id='stm-lms-lesson-css' href='<?php echo site_url() . 'static/backoffice/css/footer/lesson.css?ver=75'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' id='stm-lms-user-css' href='<?php echo site_url() . 'static/backoffice/css/footer/user.css?ver=75'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' id='stm-lms_categories_megamenu-style_1-css' href='<?php echo site_url() . 'static/backoffice/css/footer/lms_categories_megamenu.css?ver=3.2'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' id='stm-header_mobile-account-css' href='<?php echo site_url() . 'static/backoffice/css/footer/account.css?ver=3.2'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' id='stm-lms-user-courses-css' href='<?php echo site_url() . 'static/backoffice/css/footer/user-courses.css?ver=75'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' id='stm-lms-edit_account-css' href='<?php echo site_url() . 'static/backoffice/css/footer/edit_account.css?ver=75'; ?>' type='text/css' media='all' />
        <script src='<?php echo site_url() . 'static/backoffice/js/bootstrap.min.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/jquery.fancybox.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/select2.full.min.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/custom.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/edit_account.js?ver=75'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/header_2.js?ver=3.2'; ?>'></script>
        <script type='text/javascript'>
            var stm_lms_edit_account_info = {"id": "", "avatar": "", "avatar_url": "", "email": "", "url": "", "meta": {}}
        </script>
    </body>
</html>
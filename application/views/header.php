<?php
$url = explode("/", uri_string());
if (isset($url[0])) {
    $nav = $url[0];
} else {
    $nav = "";
}
$inicio_syle = "";
$cursos_syle = "";
$iniciar_sesion_syle = "";
$registro_syle = "";
$contacto_syle = "";
switch ($nav) {
    case "cursos":
        $cursos_syle = "active_nav";
        break;
    case "iniciar-sesion":
        $iniciar_sesion_syle = "active_nav";
        break;
    case "registro":
        $registro_syle = "active_nav";
        break;
    case "contacto":
        $contacto_syle = "active_nav";
        break;
    default:
        $inicio_syle = "active_nav";
        break;
}
?>
<div id="header" class="transparent_header_off" data-color="">
    <div class="header_default header_2">
        <div class="header_top_bar header_2_top_bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header_2_top_bar__inner">
                            <div class="top_bar_right_part">
                                <div class="stm_menu_toggler" data-text="Menu"></div>
                                <div class="header_main_menu_wrapper clearfix" style="margin-top:5px;">
                                    <div class="pull-right hidden-xs right_buttons">
                                        <div class="search-toggler-unit">
                                            <div class="search-toggler" data-toggle="modal" data-target="#searchModal"><i class="fa fa-search"></i></div>
                                        </div>
                                        <div class="pull-right">
                                            <div class="header_top_bar_socs">
                                                <ul class="clearfix">
                                                    <li><a href='#'><i class='fab fa-instagram'></i></a></li>
                                                    <li><a href='https://www.facebook.com/U-linex-103662281176014/'><i class='fab fa-facebook'></i></a></li>
                                                    <li><a href='#'><i class='fab fa-youtube'></i></a></li>
                                                    <li>
                                                        <a class="wsp" href="https://api.whatsapp.com/send?phone=51998878636" title="Whatsapp U-Linex" target="_blank" rel="noopener">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35" height="35" viewBox="0 0 90 90"><defs><circle id="b" cx="30" cy="30" r="30"></circle><filter id="a" width="153.3%" height="153.3%" x="-26.7%" y="-23.3%" filterUnits="objectBoundingBox"><feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset><feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="5"></feGaussianBlur><feColorMatrix in="shadowBlurOuter1" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"></feColorMatrix></filter></defs><g fill="none" fill-rule="evenodd"><g transform="translate(10 8)"><use fill="#000" filter="url(#a)" xlink:href="#b"></use><use fill="#7ED321" xlink:href="#b"></use></g><path fill="#FFF" d="M56.705 37.57c0 8.988-7.343 16.274-16.401 16.274-2.876 0-5.578-.735-7.928-2.025l-9.08 2.886 2.96-8.732a16.103 16.103 0 0 1-2.354-8.403c0-8.988 7.343-16.275 16.402-16.275 9.06 0 16.4 7.287 16.4 16.275zM40.17 24.023c-7.613 0-13.806 6.117-13.806 13.636 0 2.984.977 5.747 2.63 7.995l-1.725 5.064 5.306-1.678a13.844 13.844 0 0 0 7.596 2.255c7.612 0 13.806-6.116 13.806-13.635 0-7.52-6.193-13.637-13.807-13.637zm8.295 17.233c-.102-.165-.37-.264-.772-.462-.403-.198-2.383-1.157-2.751-1.288-.37-.132-.638-.198-.906.198s-1.04 1.288-1.276 1.552c-.234.265-.469.298-.872.1-.402-.198-1.7-.617-3.237-1.966-1.197-1.05-2.005-2.345-2.24-2.742-.234-.396-.024-.61.177-.807.181-.178.403-.463.604-.694.202-.231.269-.396.402-.66.135-.265.068-.496-.033-.695-.1-.197-.907-2.146-1.242-2.94-.335-.792-.67-.66-.906-.66-.234 0-.503-.033-.771-.033-.269 0-.705.1-1.074.495-.37.397-1.409 1.355-1.409 3.304 0 1.948 1.442 3.831 1.644 4.095.201.264 2.784 4.393 6.877 5.979 4.093 1.585 4.093 1.056 4.832.99.737-.066 2.381-.958 2.718-1.882.335-.926.335-1.719.235-1.884z"></path></g></svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapse navbar-collapse pull-right">
                                        <ul class="header-menu clearfix">
                                            <li class="menu-item">
                                                <a href="<?php echo site_url(); ?>" class="<?php echo $inicio_syle; ?>">Inicio</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="<?php echo site_url() . 'cursos'; ?>" class="<?php echo $cursos_syle; ?>">Cursos</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="<?php echo site_url() . 'registro'; ?>" class="<?php echo $registro_syle; ?>">Registro</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="<?php echo site_url() . 'iniciar-sesion'; ?>" class="<?php echo $iniciar_sesion_syle; ?>">Iniciar Sesión</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="<?php echo site_url() . 'contacto'; ?>" class="<?php echo $contacto_syle; ?>">Contacto</a>
                                            </li>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <div class="header_top_bar_socs">
                                        <ul class="clearfix">
                                            <li><a href='#'><i class='fab fa-instagram'></i></a></li>
                                            <li><a href='https://www.facebook.com/U-linex-103662281176014/'><i class='fab fa-facebook'></i></a></li>
                                            <li><a href='#'><i class='fab fa-youtube'></i></a></li>
                                            <li><a href="https://api.whatsapp.com/send?phone=51998878636" title="Whatsapp u-Linex" target="_blank" rel="noopener"><i class='fab fa-whatsapp'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header_top">
                        <div class="logo-unit">
                            <a href="<?php echo site_url(); ?>"> 
                                <img class="img-responsive logo_transparent_static visible logo" src="<?php echo site_url() . 'static/page_front/images/logo/logo-a.jpg'; ?>" alt="U-linex Logo"/> 
                            </a>
                        </div>
                        <div class="center-unit">
                            <div class="stm_courses_search">
                                <div class="stm_lms_categories"> <i class="stmlms-hamburger"></i> <span class="heading_font">Categorías</span>
                                    <div class="stm_lms_categories_dropdown">
                                        <div class="stm_lms_categories_dropdown__parents">
                                            <?php foreach ($obj_category as $value) { ?>
                                                <div class="stm_lms_categories_dropdown__parent"> 
                                                    <a href="<?php echo site_url() . "cursos/$value->slug"; ?>" class="sbc_h"><?php echo $value->name; ?></a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="stm_lms_courses_search" id="stm_lms_courses_search" v-bind:class="{'is_vue_loaded' : vue_loaded}">
                                    <form method="get" action="<?php echo site_url() . 'cursos' ?>">
                                        <input type="text"  name="search" placeholder="Buscar Curso">
                                        <button type="submit" class="stm_lms_courses_search__button sbc style_search">
                                            <i class="lnr lnr-magnifier"></i> 
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="right-unit">
                            <?php if (isset($_SESSION['customer'])) { ?>
                                <div class="stm_lms_account_dropdown">
                                    <div class="dropdown">
                                        <div class="stm-lms-user_message_btn__counter"> 1 </div> 
                                        <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                            <i class="lnr lnr-user"></i> <span class="login_name">Hola, <?php echo corta_texto($_SESSION['customer']['name'], 4); ?></span> <span class="caret"></span> 
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li> 
                                                <a href="<?php echo site_url() . 'backoffice';?>">Mi Cuenta</a>                      
                                                <a href="<?php echo site_url() . 'salir';?>">Salir</a>                      
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="stm_lms_settings_button">
                                    <a href="<?php echo site_url() . 'backoffice/' ?>#settings"><i class="lnr lnr-cog"></i></a>
                                </div>
                            <?php } else { ?>
                                <a href="<?php echo site_url() . 'iniciar-sesion' ?>" class="btn btn-default" data-text="Iniciar Sesión"> <span>Iniciar Sesión</span> </a>
                                <div class="stm_lms_wishlist_button">
                                    <a href="#" data-text="Favorites"> <i class="lnr lnr-bookmark "></i> </a>
                                </div>
                            <?php } ?>
                        </div>
                        <a href="<?php echo site_url() . 'iniciar-sesion'; ?>"><div class="stm_header_top_toggler mbc"><i class="lnr lnr-user"></i></div></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="stm_lms_menu_popup">
            <div class="stm_lms_menu_popup__close"> <i class="lnr lnr-cross"></i></div>
            <div class="inner">
                <h2>Menu</h2>
                <div class="stm_menu_toggler" data-text="Menu"></div>
                <div class="header_main_menu_wrapper clearfix" style="margin-top:5px;">
                    <div class="pull-right hidden-xs right_buttons">
                        <div class="stm_lms_wishlist_button">
                            <a href="#" data-text="Favorites"> <i class="far fa-bookmark mtc_h"></i> </a>
                        </div>
                        <div class="pull-right">
                            <div class="header_top_bar_socs">
                                <ul class="clearfix">
                                    <li><a href='#'><i class='fab fa-instagram'></i></a></li>
                                    <li><a href='https://www.facebook.com/U-linex-103662281176014/'><i class='fab fa-facebook'></i></a></li>
                                    <li><a href='#'><i class='fab fa-youtube'></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse pull-right">
                        <ul class="header-menu clearfix">
                            <li class="menu-item">
                                <a href="<?php echo site_url(); ?>" class="<?php echo $inicio_syle; ?>">Inicio</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url() . 'cursos'; ?>" class="<?php echo $cursos_syle; ?>">Cursos</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url() . 'registro'; ?>" class="<?php echo $registro_syle; ?>">Registro</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url() . 'iniciar-sesion'; ?>" class="<?php echo $iniciar_sesion_syle; ?>">Iniciar Sesión</a>
                            </li>
                            <li class="menu-item">
                                <a href="<?php echo site_url() . 'contacto'; ?>" class="<?php echo $contacto_syle; ?>">Contacto</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
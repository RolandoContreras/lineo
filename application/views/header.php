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
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapse navbar-collapse pull-right">
                                        <ul class="header-menu clearfix">
                                            <li id="menu-item-5" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item menu-item-5">
                                                <a href="<?php echo site_url(); ?>" aria-current="page">Inicio</a>
                                            </li>
                                            <li id="menu-item-5" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item menu-item-5">
                                                <a href="<?php echo site_url() . 'cursos'; ?>">Cursos</a>
                                            </li>
                                            <li id="menu-item-5" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item menu-item-5">
                                                <a href="<?php echo site_url() . 'iniciar-sesion'; ?>">Iniciar Sesión</a>
                                            </li>
                                            <li id="menu-item-5" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item menu-item-5">
                                                <a href="<?php echo site_url() . 'registro'; ?>">Registro</a>
                                            </li>
                                            <li class="stm_lms_badge_menu menu-item menu-item-type-custom menu-item-object-custom menu-item-3363">
                                                <a href="<?php echo site_url();?>">Contacto</a>
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
                            <img class="img-responsive logo_transparent_static visible logo" src="<?php echo site_url().'static/page_front/images/logo/logo-a.jpg';?>" alt="Edukate Pro"/> 
                        </a>
                    </div>
                    <div class="center-unit">
                        <div class="stm_courses_search">
                            <div class="stm_lms_categories"> <i class="stmlms-hamburger"></i> <span class="heading_font">Categorías</span>
                                <div class="stm_lms_categories_dropdown">
                                    <div class="stm_lms_categories_dropdown__parents">
                                        <?php 
                                        foreach ($obj_category as $value) { ?>
                                            <div class="stm_lms_categories_dropdown__parent"> 
                                                <a href="<?php echo site_url()."cursos/$value->slug";?>" class="sbc_h"><?php echo $value->name;?></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="stm_lms_courses_search" id="stm_lms_courses_search" v-bind:class="{'is_vue_loaded' : vue_loaded}">
                                <form method="get" action="<?php echo site_url().'cursos'?>">
                                    <input type="text"  name="search" placeholder="Buscar Curso">
                                    <button type="submit" class="stm_lms_courses_search__button sbc style_search">
                                        <i class="lnr lnr-magnifier"></i> 
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="right-unit">
                        <a href="<?php echo site_url().'iniciar-sesion'?>" class="btn btn-default" data-text="Iniciar Sesión"> <span>Iniciar Sesión</span> </a>
                        <div class="stm_lms_wishlist_button">
                            <a href="#" data-text="Favorites"> <i class="lnr lnr-bookmark "></i> </a>
                        </div>
                    </div>
                    <a href="<?php echo site_url().'iniciar-sesion';?>"><div class="stm_header_top_toggler mbc"><i class="lnr lnr-user"></i></div></a>
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
                        <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item menu-item-5">
                            <a href="<?php echo site_url();?>" aria-current="page">Inicio</a>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item menu-item-5">
                            <a href="<?php echo site_url().'cursos';?>">Cursos</a>
                        </li>
                        <li class="stm_lms_badge_menu menu-item menu-item-type-custom menu-item-object-custom menu-item-3363">
                            <a href="<?php echo site_url().'iniciar-sesion';?>">Iniciar Sesión</a>
                        </li>
                        <li class="stm_lms_badge_menu menu-item menu-item-type-custom menu-item-object-custom menu-item-3363">
                            <a href="<?php echo site_url().'registro';?>">Registro</a>
                        </li>
                        <li class="stm_lms_badge_menu menu-item menu-item-type-custom menu-item-object-custom menu-item-3363">
                            <a href="<?php echo site_url().'contacto';?>">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
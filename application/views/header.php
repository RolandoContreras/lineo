    <header id=masthead class="site-header affix-top template-layout-2 sticky-header has-retina-logo has-retina-logo-sticky palette-transparent header-overlay">
      <div class="header-wrapper header-v2 style2">
        <div class="main-header container">
          <div class="menu-mobile-effect navbar-toggle" data-effect=mobile-effect>
            <div class=icon-wrap><span class=icon-bar></span><span class=icon-bar></span><span class=icon-bar></span></div>
          </div>
          <div class="width-logo">
              <a class=no-sticky-logo href="<?php echo site_url();?>" title="Bievenido a U-Linex">
                <img class=logo src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" alt="logo" width="150">
                <img class=retina-logo src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" alt="logo" width="150">
                <img class=mobile-logo src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" alt="logo" width="150">
              </a>
            <a href="<?php echo site_url();?>"  class="sticky-logo">
                <img src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" alt="Logo" width="100">
                <img class=retina-logo-sticky src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" alt="Logo" width="695" height="100"></a>
          </div>
          <div class="thim-search-wrapper hidden-md-down">
              <form role="search" method="get" class="search-form active" action="<?php echo site_url().'cursos'?>">
                <input type="search" class="search-field" placeholder="Buscar tu Curso" name="search">
                <button type="submit" class="search-submit"><span class=ion-android-search></span></button>
            </form>
          </div>
          <?php
          $url = explode("/",uri_string());
            if(isset($url[0])){
                $nav = $url[0];
            }else{
                $nav = "";
            }
            $home_syle = "";
            $contact_syle = "";
            $courses_syle = "";
            $register_syle = "";
            $login_syle = "";
            switch ($nav) {
                case "contacto":
                    $contact_syle = "current-menu-parent";
                    break;
                case "cursos":
                    $courses_syle = "current-menu-parent";
                    break;
                case "registro":
                    $register_syle = "widget_thim-login-2";
                    break;
                case "login":
                    $login_syle = "widget_thim-login-2";
                    break;
                default:
                    $home_syle = "current-menu-parent";
                    break;
            }
          ?>  
          <div class=width-navigation>
            <ul id=primary-menu class=main-menu>
<!--                <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor <?php echo $home_syle;?> menu-item-22 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                    <a class="md-trigger" data-modal="modal-1" href="javascript:void(0);"><span class="button_cuentas">Números de cuenta</span></a>
                </li>-->
                <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor <?php echo $home_syle;?> menu-item-22 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                    <a href="<?php echo site_url();?>" class=tc-menu-inner>Inicio</a> 
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-48 <?php echo $courses_syle;?> tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-builder">
                    <a class=tc-menu-inner>Cursos</a>
                    <ul class="sub-menu">
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-3815 tc-menu-item tc-menu-depth-1 tc-menu-align-left">
                            <a href="<?php echo site_url().'cursos';?>" class="tc-menu-inner tc-megamenu-title">Todos</a>
                        </li>
                        <?php foreach ($obj_category as $value) { ?>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-3815 tc-menu-item tc-menu-depth-1 tc-menu-align-left">
                                    <a href="<?php echo site_url()."cursos/$value->slug";?>" class="tc-menu-inner tc-megamenu-title"><?php echo $value->name;?></a>
                                </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-48 <?php echo $contact_syle;?> tc-menu-item tc-menu-depth-0 tc-menu-align-left">
                    <a class=tc-menu-inner href="<?php echo site_url().'contacto';?>">Contacto</a>
                </li>
            </ul>
            <div class="header-right">
              <div class="widget widget_thim-login">
                <div class="thim-link-login">
                    <a href="<?php echo site_url().'registro';?>" class="register <?php echo $register_syle;?>">Registro</a><span class=slash>/</span>
                    <a href="<?php echo site_url().'login';?>" class="login <?php echo $login_syle;?>">Ingresar</a>
                </div>
              </div>
            <a href="https://api.whatsapp.com/send?phone=51969811373" title="Whatssapp U-LINEX" target="_blank" rel="noopener">
                <svg style="margin-top: 10px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" viewBox="0 0 80 80"><defs><circle id="b" cx="30" cy="30" r="30"></circle><filter id="a" width="153.3%" height="153.3%" x="-26.7%" y="-23.3%" filterUnits="objectBoundingBox"><feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset><feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="5"></feGaussianBlur><feColorMatrix in="shadowBlurOuter1" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"></feColorMatrix></filter></defs><g fill="none" fill-rule="evenodd"><g transform="translate(10 8)"><use fill="#000" filter="url(#a)" xlink:href="#b"></use><use fill="#7ED321" xlink:href="#b"></use></g><path fill="#FFF" d="M56.705 37.57c0 8.988-7.343 16.274-16.401 16.274-2.876 0-5.578-.735-7.928-2.025l-9.08 2.886 2.96-8.732a16.103 16.103 0 0 1-2.354-8.403c0-8.988 7.343-16.275 16.402-16.275 9.06 0 16.4 7.287 16.4 16.275zM40.17 24.023c-7.613 0-13.806 6.117-13.806 13.636 0 2.984.977 5.747 2.63 7.995l-1.725 5.064 5.306-1.678a13.844 13.844 0 0 0 7.596 2.255c7.612 0 13.806-6.116 13.806-13.635 0-7.52-6.193-13.637-13.807-13.637zm8.295 17.233c-.102-.165-.37-.264-.772-.462-.403-.198-2.383-1.157-2.751-1.288-.37-.132-.638-.198-.906.198s-1.04 1.288-1.276 1.552c-.234.265-.469.298-.872.1-.402-.198-1.7-.617-3.237-1.966-1.197-1.05-2.005-2.345-2.24-2.742-.234-.396-.024-.61.177-.807.181-.178.403-.463.604-.694.202-.231.269-.396.402-.66.135-.265.068-.496-.033-.695-.1-.197-.907-2.146-1.242-2.94-.335-.792-.67-.66-.906-.66-.234 0-.503-.033-.771-.033-.269 0-.705.1-1.074.495-.37.397-1.409 1.355-1.409 3.304 0 1.948 1.442 3.831 1.644 4.095.201.264 2.784 4.393 6.877 5.979 4.093 1.585 4.093 1.056 4.832.99.737-.066 2.381-.958 2.718-1.882.335-.926.335-1.719.235-1.884z"></path></g></svg>
            </a>
                <?php $this->load->view("header_cart");?>
            </div>
          </div>
        </div>
      </div>
    </header>
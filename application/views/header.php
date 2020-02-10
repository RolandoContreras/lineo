    <header id=masthead class="site-header affix-top template-layout-2 sticky-header has-retina-logo has-retina-logo-sticky palette-transparent header-overlay">
      <div class="header-wrapper header-v2 style2">
        <div class="main-header container">
          <div class="menu-mobile-effect navbar-toggle" data-effect=mobile-effect>
            <div class=icon-wrap><span class=icon-bar></span><span class=icon-bar></span><span class=icon-bar></span></div>
          </div>
          <div class="width-logo">
              <a class=no-sticky-logo href="<?php echo site_url();?>" title="Bievenido a U-Linex">
                <img class=logo src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" alt="logo" width="100" height="51">
                <img class=retina-logo src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" alt="logo" width="100" height="102">
                <img class=mobile-logo src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" alt="logo" width=100 height=51></a>
            <a href="<?php echo site_url();?>"  class="sticky-logo">
                <img src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" alt="Logo" width="78" height="60">
                <img class=retina-logo-sticky src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" alt="Logo" width="695" height="100"></a>
          </div>
          <div class="thim-search-wrapper hidden-md-down">
            <form role="search" method="get" class="search-form active" action="">
                <input type="search" class="search-field" placeholder="Buscar tu Curso" value name="search" autofocus="">
                <button type="submit" class="search-submit"><span class=ion-android-search></span></button>
            </form>
          </div>
          <div class=width-navigation>
            <ul id=primary-menu class=main-menu>
                <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-22 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                    <a href="<?php echo site_url();?>" class=tc-menu-inner>Inicio</a> 
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-48 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-builder">
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
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-48 tc-menu-item tc-menu-depth-0 tc-menu-align-left">
                    <a class=tc-menu-inner href="<?php echo site_url().'contact';?>">Contacto</a>
                </li>
            </ul>
            <div class="header-right">
              <div class="widget widget_thim-login">
                <div class="thim-link-login">
                    <a class="register" href="<?php echo site_url().'register';?>">Registro</a><span class=slash>/</span>
                    <a href="<?php echo site_url().'login';?>" class="login">Ingresar</a>
                </div>
              </div>
              <div class="hide-number widget woocommerce widget_shopping_cart">
                <div class=minicart_hover id=header-mini-cart><span class=cart-items-number><span class=text>My Cart</span> <i class="ion ion-android-cart"></i><span class="wrapper-items-number "><span class=items-number>0</span></span>
                  </span>
                  <div class=clear></div>
                </div>
                <div class=widget_shopping_cart_content style="display: none;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <nav class="visible-xs mobile-menu-container mobile-effect">
      <div class=inner-off-canvas>
        <div class="menu-mobile-effect navbar-toggle" data-effect=mobile-effect>Cerrar <i class="fa fa-times" aria-hidden=true></i></div>
        <div class="thim-mobile-search-cart ">
          <div class="thim-search-wrapper hidden-lg-up">
            <form role=search method=get class=search-form action="">
                <input type=search class=search-field placeholder="Busca tu Curso?" value name="search" title="Buscar Cursos:">
                <button type=submit class=search-submit>
                    <span class="ion-android-search"></span>
                </button>
            </form>
          </div>
          <div class="thim-mini-cart hidden-lg-up">
            <div class="widget woocommerce widget_shopping_cart">
              <div class=minicart_hover id=header-mini-cart>
                  <span class=cart-items-number>
                      <span class=text>Mi Carrito</span> 
                      <i class="ion ion-android-cart"></i>
                      <span class="wrapper-items-number ">
                          <span class=items-number>0</span>
                      </span>
                </span>
                <div class="clear"></div>
              </div>
              <div class=widget_shopping_cart_content style="display: none;"></div>
            </div>
          </div>
        </div>
        <ul class="nav navbar-nav">
          <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-22 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
              <a href="<?php echo site_url();?>" class=tc-menu-inner>Inicio</a>
          </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-48 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-builder">
                <a class=tc-menu-inner>Cursos</a>
              <div class='tc-megamenu-wrapper tc-megamenu-holder mega-sub-menu sub-menu'>
                <p>
                  <div class="vc_row wpb_row vc_row-fluid">
                    <div class="wpb_column vc_column_container vc_col-sm-4">
                      <div class=vc_column-inner>
                        <div class=wpb_wrapper>
                          <div class="vc_wp_custommenu wpb_content_element">
                            <div class="widget widget_nav_menu">
                              <h2 class="widgettitle">Todos los Cursos</h2>
                              <div class=menu-mega-menu-container>
                                <ul id=menu-mega-menu-1 class=menu>
                                  <?php foreach ($obj_category as $value) { ?>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-3815 tc-menu-item tc-menu-depth-1 tc-menu-align-left">
                                            <a href="<?php echo site_url()."cursos/$value->slug";?>" class="tc-menu-inner tc-megamenu-title"><?php echo $value->name;?></a>
                                        </li>
                                <?php } ?>
                                </ul>
                               </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
              </p>
              </div>
              </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-22 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
              <a href="<?php echo site_url().'contacto';?>" class=tc-menu-inner>Contacto</a>
            </li>                
            <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-22 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
              <a href="<?php echo site_url().'login';?>" class=tc-menu-inner>Iniciar Sesión</a>
            </li>                
            <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-22 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
              <a href="<?php echo site_url().'registro';?>" class=tc-menu-inner>Registro</a>
            </li>                

        </ul>
        <div class=off-canvas-widgetarea>
          <div class="widget widget_text">
            <div class=textwidget>
              <ul>
                <li><i class="fa fa-phone" aria-hidden=true></i> <a>+(51) 998 878 636</a></li>
                <li><i class="fa fa-envelope-o" aria-hidden=true></i> <a><span class="__cf_email__">contacto@u-linex.com</span></a></li>
              </ul>
            </div>
          </div>
          <div class="widget widget_thim_layout_builder">
            <div class="vc_row wpb_row vc_row-fluid">
              <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class=vc_column-inner>
                  <div class=wpb_wrapper>
                    <div class="thim-sc-social-links ">
                      <ul class=socials>
                        <li><a target=_blank href="https://facebook.com">facebook</a></li>
                        <li><a target=_blank href="https://youtube.com">youtube</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
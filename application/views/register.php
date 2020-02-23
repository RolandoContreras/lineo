<!DOCTYPE html>
<html lang="es">
<?php $this->load->view("head");?>
<body class="home-page bp-legacy home page-template page-template-templates page-template-home-page page-template-templateshome-page-php page page-id-36 wp-embed-responsive theme-wordpress-lms pmpro-body-has-access woocommerce-no-js pagetitle-show bg-type-color thim-body-visual-composer responsive box-shadow auto-login ltr home1-section learnpress-v3 header-template-default wpb-js-composer js-comp-ver-6.0.5 vc_responsive no-js">
  <div id=thim-preloading>
    <div class=thim-loading-icon>
      <div class=sk-chasing-dots>
        <div class="sk-child sk-dot1"></div>
        <div class="sk-child sk-dot2"></div>
      </div>
    </div>
  </div>
  <div id=wrapper-container class="content-pusher creative-left bg-type-color">
    <div class=overlay-close-menu></div>
   <?php $this->load->view("header");?> 
   <?php $this->load->view("nav");?>
    <div id="main-content">
  <section class="content-area">
    <div class="page-title layout-1">
      <div class="main-top parallax" style="background-image:url(<?php echo site_url().'static/page_front/images/bg_header.jpg';?>);">
          <span class="overlay-top-header" style="background-color: rgba(0,0,0,0.5);"></span>
        <div class="content container">
          <div class="row">
            <div class="text-title col-md-6">
              <h1>Registro</h1>
            </div>
            <div class="text-description col-md-6">
              <p><strong class="br">La mejor educación en un solo lugar </strong> U-LINEX creado especialmente para ti</p>
            </div>
          </div>
        </div>
      </div>
      <div class="breadcrumb-content ">
            <div class="breadcrumbs-wrapper container">
              <ul id="breadcrumbs" class="breadcrumbs">
                <li>
                    <a href="<?php echo site_url();?>" title="Inicio">
                        <span>Inicio</span>
                    </a>
                    <span class=breadcrum-icon><i class="fa fa-angle-right" aria-hidden=true></i></span>
                </li>
                <li>
                    <span title="Nuevo Registro">Registro</span>
                </li>
              </ul>
            </div>
          </div>
    </div>
    <div class="container site-content no-padding">
      <div class="row">
       <div id=main class="site-main col-sm-12 full-width">
           <div class="vc_empty_space" style="height: 92px"><span class="vc_empty_space_inner"></span></div>
              <article id=post-522 class="post-522 page type-page status-publish hentry pmpro-has-access">
                <div class=entry-content>
                  <div class="vc_row wpb_row vc_row-fluid account-login-page">
                    <div class="social-login-form wpb_column vc_column_container vc_col-sm-6">
                      <div class=vc_column-inner>
                        <div class=wpb_wrapper>
                          <div class="wpb_text_column wpb_content_element ">
                            <div class=wpb_wrapper>
                              <h4 class="subtitle">Bienvenido</h4>
                              <div class=wp-social-login-widget>
                                <div class=wp-social-login-connect-with>Nuevo Registro</div>
                                <div class=wp-social-login-provider-list>
                                    <img src="<?php echo site_url().'static/page_front/images/logo/logo-h.png';?>" alt="logo">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="thim-form-login wpb_column vc_column_container vc_col-sm-6">
                      <div class="vc_column-inner vc_custom_1503993250187">
                        <div class=wpb_wrapper>
                          <div class=thim-login>
                            <h4 class="subtitle">Ingresa tus datos</h4>
                            <h2 class="title">Registro</h2>
                            <form name="loginform" id="loginform" action="javascript:void(0);">
                              <p class="login-username">
                                  <input required type="text" name="name" placeholder="Nombre *" id="name" class="input required" size="20">
                              </p>
                              <p class="login-username">
                                  <input required type="text" name="email" placeholder="E-mail *" id="email" class="input required" size="20">
                              </p>
                              <p class="login-password">
                                  <input required type="password" name="pwd" placeholder="Contraseña *" id="user_pass" class="input required" size="20">
                                  <span id="show_pass"><i class="fa fa-eye"></i></span>
                              </p>
                              <p class="login-username">
                                  <input type="text" name="phone" id="phone" class="input required" placeholder="Teléfono *">
                              </p>
                              <p class="login-username">
                                  <select required="" class="input required" name="country" id="country">
                                    <option  selected value="">País *</option>
                                    <?php  foreach ($obj_paises as $key => $value) { ?>
                                           <option style="border-style: solid !important" value="<?php echo $value->id;?>"><?php echo $value->nombre;?></option>
                                    <?php } ?>
                                </select>
                              </p>
                              <div class="row">
                                  <div class="col">
                                      <div class="g-recaptcha" data-sitekey="6LcXgNcUAAAAANCfGha0FezqnYAFGIWYV4gNbHou"></div>
                                  </div>
                                </div>
                              <div class="vc_empty_space" style="height: 20px"><span class="vc_empty_space_inner"></span></div>
                              <p class="submit login-submit">
                                  <input type="submit" onclick="register();" id="wp-submit" class="button button-primary button-large" value="Crear Registro">
                              </p>
                            </form>
                            <p class=link-bottom>¿Ya tienes una cuenta? <a href="<?php echo site_url().'login';?>">Iniciar Sesión</a></p>
                            <div class="vc_empty_space" style="height: 20px"><span class="vc_empty_space_inner"></span></div>
                            <div id="mensaje"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
          </article>
           <div class="vc_empty_space" style="height: 92px"><span class="vc_empty_space_inner"></span></div>
          </div>
          
</div>
</div>
</section>
</div>

  <!--START FOOTER-->
  <?php $this->load->view("footer");?>  
  <!--END FOOTER-->
  </div>
  <div id="back-to-top"><i class="fa fa-angle-up" aria-hidden=true></i></div>
    <div class="gallery-slider-content"></div>
      <script src=https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js></script>
      <script>
        WebFont.load({google:{families:['Roboto:400,300']}});
      </script>
      <script defer src="<?php echo site_url().'static/page_front/js/autoptimize_282.js';?>"></script>
      <script src='https://www.google.com/recaptcha/api.js'></script>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script src='<?php echo site_url().'static/page_front/js/script/register.js';?>'></script>
</body>
</html>


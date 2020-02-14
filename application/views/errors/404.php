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
  <div id=main-content>
    <section class=content-area>
      <div class="page-title layout-1">
        <div class="main-top parallax" style="background-image:url(<?php echo site_url().'static/page_front/images/bg_header.jpg';?>);">
          <span class=overlay-top-header style="background-color: rgba(0,0,0,0.1);"></span>
          <div class="content container">
            <div class=row>
              <div class="text-title col-md-6">
                <h1>404 Page</h1>
              </div>
              <div class="text-description col-md-6">
                <div class=banner-description>
                  <p><strong class=br>El mejor sistema de educación </strong> Sé parte de nuestra comunidad</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="breadcrumb-content ">
          <div class="breadcrumbs-wrapper container">
            <ul id=breadcrumbs class=breadcrumbs>
              <li>
                  <a href="<?php echo site_url();?>" title="Inicio">
                      <span >Inicio</span></a><span class=breadcrum-icon>
                          <i class="fa fa-angle-right" aria-hidden=true></i>
                      </span>
              </li>
              <li><span title="404 Page">Pagina 404</span></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="container site-content ">
        <div class=row>
          <main id=main class="site-main col-sm-12 full-width">
            <section class="error-404 not-found">
              <div class=page-content>
                <h3
                    class="intro" style="color:black">Página no encontrada!</h3>
                    <p class="404-message" style="color:black">Lo sentimos, no podemos encontrar la página que estás buscando. Por favor ve al <a href="<?php echo site_url();?>" style="color:black"/>Inicio.</a>
                  </p>
              </div>
            </section>
          </main>
        </div>
      </div>
    </section>
  </div>
   <?php $this->load->view("footer");?>
  </div>
    <div id="back-to-top"><i class="fa fa-angle-up" aria-hidden=true></i></div>
    <div class="gallery-slider-content"></div>
      <script src=https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js></script>
      <script>
        WebFont.load({google:{families:['Roboto:400,300']}});
      </script>
      <script defer src="<?php echo site_url().'static/page_front/js/autoptimize_282.js';?>"></script>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</body>
</html>
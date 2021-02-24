<footer id="footer">
    <div class="footer_wrapper">
        <div id="footer_bottom" class="bg-footer">
            <div class="footer_widgets_wrapper kek text-upper">
                <div class="container">
                    <div class="widgets cols_4 clearfix">
                        <aside id="stm_text-2" class="widget stm_wp_widget_text">
                            <div class="widget_title">
                                <h3 class="color-white">Nosotros</h3>
                            </div>
                            <div class="textwidget">
                                <p class="color-white">U-Linex plataforma de aprendizaje, somo el destino del mundo para cursos en línea. Descubre un curso en línea en u-linex.com y empieza ya a aprender una nueva habilidad.</p>
                            </div>
                            <div class="textwidget">
                                <div class="space-18"></div>
                                <a class="color-white" href="<?php echo site_url().'terminos-condiciones';?>"><i class="fa fa-check"></i> Términos y Condiciones</a><br/>
                                <a class="color-white" href="<?php echo site_url().'politica-privacidad';?>"><i class="fa fa-check"></i> Política de Privacidad & Cookies</a><br/>
                                <a class="color-white" href="<?php echo site_url().'libro-de-reclamaciones';?>"><i class="fa fa-check"></i> Libro de Reclamaciones</a><br/>
                                <a class="color-white" href="<?php echo site_url().'dashboard';?>"><i class="fa fa-check"></i> Administrador</a>
                            </div>
                        </aside>
                        <aside id="contacts-2" class="widget widget_contacts">
                            <div class="widget_title">
                                <h3 class="color-white">Contacto</h3>
                            </div>
                            <ul class="widget_contacts_style_2">
                                <li class="widget_contacts_phone">
                                    <div class="text color-white">Tel.: +51 923 313 490</div>
                                </li>
                                <li class="widget_contacts_email">
                                    <div class="text color-white">ulinex.corp@gmail.com</div>
                                </li>
                                
                            </ul>
                        </aside>
                        <aside id="socials-2" class="widget widget_socials">
                            <div class="widget_title">
                                <h3 class="color-white">Redes Sociales</h3>
                            </div>
                            <div class="socials_widget_wrapper">
                                <ul class="widget_socials list-unstyled clearfix">
                                    <li class="simple_flip_container">
                                        <div class="simple_flipper">
                                            <div class="front "> 
                                                <a href="https://www.facebook.com/U-linex-103662281176014/" target="_blank" class="facebook color-white"><i class="fab fa-facebook"></i></a>
                                            </div>
                                            <div class="back">
                                                <a href="https://www.facebook.com/U-linex-103662281176014/" target="_blank"><i class="fab fa-facebook color-white"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="simple_flip_container">
                                        <div class="simple_flipper">
                                            <div class="front"> 
                                                <a href="#" target="_blank" class="instagram color-white"><i class="fab fa-instagram"></i></a>
                                            </div>
                                            <div class="back">
                                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="simple_flip_container">
                                        <div class="simple_flipper">
                                            <div class="front"> 
                                                <a href="#" target="_blank" class="skype color-white"><i class="fab fa-skype"></i></a>
                                            </div>
                                            <div class="back"> 
                                                <a href="#" target="_blank"><i class="fab fa-skype"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="simple_flip_container">
                                        <div class="simple_flipper">
                                            <div class="front"> 
                                                <a href=https://api.whatsapp.com/send?phone=51980995253" target="_blank" class="whatsapp color-white" style="background-color: green;"><i class="fab fa-whatsapp"></i></a>
                                            </div>
                                            <div class="back"> 
                                                <a href="https://api.whatsapp.com/send?phone=51980995253" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                
                            </div>
                        </aside>
                        <aside id="custom_html-2" class="widget_text widget widget_custom_html">
                            <div class="textwidget custom-html-widget">
                                <img class="lazyload" alt="Obten hasta 75% de descuentos" data-src="<?php echo site_url().'static/page_front/images/descuento.jpg';?>">
                            </div>
                            
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer_copyright" class="bg-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-8">
                        <div class="clearfix">
                            <div class="pull-left"> 
                                <img class="lazyload footer_logo" data-src="<?php echo site_url().'static/page_front/images/logo/evolucion_logo.png';?>" alt="Footer logo">
                            </div>
                            <div class="copyright_text">Copyright © 2020. desarrollado por <a target="_blank" href="https://evolucionweb.online/">Evolución Web</a></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-4">
                        <div class="clearfix">
                            <div class="pull-right xs-pull-left">
                                <div class="pull-right">
                                    <div class="copyright_socials">
                                        <ul class="clearfix"></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right xs-pull-left hidden-sm hidden-xs">
                                <ul class="footer_menu heading_font clearfix"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_ES/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="103662281176014"
  theme_color="#0084ff"
  logged_in_greeting="Gracias por comunicarte con nosotros, ¿en qué podemos ayudarte?"
  logged_out_greeting="Gracias por comunicarte con nosotros, ¿en qué podemos ayudarte?">
      </div>
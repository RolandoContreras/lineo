    <footer id="footer">
            <div class="footer_wrapper">
                <div id="footer_bottom">
                    <div class="footer_widgets_wrapper kek text-normal">
                        <div class="container">
                            <div class="widgets cols_4 clearfix">
                                <aside id="stm_text-2" class="widget stm_wp_widget_text">
                                    <div class="widget_title">
                                        <h3>Nosotros</h3>
                                    </div>
                                    <div class="textwidget">
                                        <p><a href="<?php echo site_url();?>"> U-linex.</a> Únete a cientos de personas que están haciendo sus vidas diferentes. Aprovecha de todos los beneficios que tenemos para ti..<br /><br /> desarrollado por <a href="https://evolucionweb.tech">Evolucion Web</a>.</p>
                                    </div>
                                    <div class="socials_widget_wrapper socials_widget_wrapper__text"> 
                                        <a href='https://www.facebook.com/U-linex-103662281176014/' target='_blank'><i class='fab fa-facebook'></i></a>
                                        <a href='javascript:void(0);'><i class='fab fa-twitter'></i></a> 
                                        <a href='javascript:void(0);'><i class='fab fa-instagram'></i></a>
                                        <a href='javascript:void(0);'><i class='fab fa-youtube'></i></a>
                                    </div>
                                        
                                </aside>
                                
                                <aside id="stm_pages-2" class="widget widget_pages">
                                    <div class="widget_title">
                                        <h3>Páginas</h3>
                                    </div>
                                    <ul class="style_2">
                                        <li class="page_item page-item-664">
                                            <a href="<?php echo site_url();?>"><span class="h6">Inicio</span></a>
                                        </li>
                                        <li class="page_item page-item-2 current_page_item">
                                            <a href="<?php echo site_url().'cursos';?>" aria-current="page"><span class="h6">Cursos</span></a>
                                        </li>
                                        <li class="page_item page-item-667">
                                            <a href="<?php echo site_url().'registro';?>"><span class="h6">Registro</span></a>
                                        </li>
                                        <li class="page_item page-item-667">
                                            <a href="<?php echo site_url().'iniciar-sesion';?>"><span class="h6">Iniciar Sesión</span></a>
                                        </li>
                                        <li class="page_item page-item-669">
                                            <a href="<?php echo site_url();?>"><span class="h6">Contacto</span></a>
                                        </li>
                                    </ul>
                                </aside>
                                <aside id="stm_pages-2" class="widget widget_pages">
                                    <div class="widget_title">
                                        <h3>Categórias</h3>
                                    </div>
                                    <ul class="style_2">
                                        <?php 
                                        foreach ($obj_category as $value) { ?>
                                            <li class="page_item page-item-664">
                                                <a href="<?php echo site_url()."cursos/$value->slug";?>"><span class="h6"><?php echo $value->name;?></span></a>
                                            </li>
                                        <?php } ?>
                                        
                                    </ul>
                                </aside>
                                <aside id="contacts-2" class="widget widget_contacts">
                                    <div class="widget_title">
                                        <h3>Contrato</h3>
                                    </div>
                                    <ul class="style_2">
                                        <li class="page_item page-item-664">
                                                <a href="<?php echo site_url().'terminos-condiciones';?>"><span class="h6">Términos y condiciones</span></a>
                                        </li>
                                        <li class="page_item page-item-2 current_page_item">
                                            <a href="<?php echo site_url().'politica-privacidad';?>"><span class="h6">Política De Privacidad Y Cookies</span></a>
                                        </li>
                                    </ul>
                                </aside>
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
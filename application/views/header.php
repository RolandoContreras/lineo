   <header id=masthead class="site-header affix-top template-layout-1 sticky-header has-retina-logo has-retina-logo-sticky palette-white header-default">
      <div class="header-v1 header-wrapper">
        <div class="main-header row">
          <div class="header-left col-lg-3">
            <div class="menu-mobile-effect navbar-toggle" data-effect=mobile-effect>
              <div class=icon-wrap><span class=icon-bar></span><span class=icon-bar></span><span class=icon-bar></span></div>
              <div class=text-menu>Menu</div>
            </div>
          </div>
          <div class="header-center col-lg-6">
            <div class="width-logo">
              <a class="no-sticky-logo" href="<?php echo site_url();?>" title="Logo FK" rel="home">
                <img alt="Logo FK" width="70" height="45" data-src="<?php echo site_url().'static/page_front/images/logo/logo_negro.png';?>" class="logo lazyload">
                <img  alt="Logo FK" width="291" height="100" data-src="<?php echo site_url().'static/page_front/images/logo/logo_negro.png';?>" class="retina-logo lazyload">
                <img alt="Logo FK" width="131" height="45" data-src="<?php echo site_url().'static/page_front/images/logo/logo_negro.png';?>" class="mobile-logo lazyload">
              </a>
            <a href="<?php echo site_url();?>" title="Logo FK" rel="home" class="sticky-logo">
                <img alt="Logo FK" width="70" height="30" data-src="<?php echo site_url().'static/page_front/images/logo/logo_negro.png';?>" class="lazyload">
                <img alt="Logo FK" width="695" height="100" data-src="<?php echo site_url().'static/page_front/images/logo/logo_negro.png';?>" class="retina-logo-sticky lazyload">
            </a>
          </div>
          </div>
          <div class="header-right col-lg-3">
            <div class="widget widget_thim-login">
              <div class="thim-link-login thim-login-popup">
                  <a href="javascript:void(0);" class=register>Registro</a><span class=slash>/</span>
                  <a href="javascript:void(0);" class=login>Login</a>
              </div>
              <div id=thim-popup-login>
                <div class=thim-login-container>
                  <div class=login-html>
                      <div class=login-banner style="background-image: url(<?php echo site_url().'static/page_front/images/cursos-online.jpg';?>)">
                    </div>
                    <div class=link-to-form>
                      <p class="content-register wrapper">¿Aún no eres miembro? <a href="javascript:void(0);" class=register-link>Regístrate Ahora</a></p>
                      <p
                        class="content-login wrapper">Already a member? <a href="javascript:void(0);" class=login-link>Iniciar Sesión</a></p>
                    </div>
                    <div class=login-form>
                      <div class=sign-in-htm>
                        <h3 class="title">Login to your account</h3>
                        <form name=loginform id=popupLoginForm action=http://wordpresslms.thimpress.com/wp-login.php method=post>
                          <p class=login-username><input type=text name=user_login id=popupLoginUser class="input required" value size=20 placeholder="Username or Email..."></p>
                          <p
                            class=login-password><input type=password name=user_password id=popupLoginPassword class="input required" value size=20 placeholder=Password...>
                            <span
                              id=show_pass><i class="fa fa-eye"></i></span>
                              </p>
                              <div class=login-extra-options>
                                <p class=login-remember><input name=rememberme type=checkbox id=popupRememberme checked><label for=popupRememberme><span class=icon-check></span>Remember Me</label></p>
                                <a
                                  class=lost-pass-link href="http://wordpresslms.thimpress.com/account/?action=lostpassword" title="Lost Password">Lost your password?</a>
                              </div>
                              <p class=login-submit><input type=submit name=wp-submit id=popupLoginSubmit class="button button-primary button-large" value=Login><input type=hidden
                                  name=redirect_to value=http://wordpresslms.thimpress.com/></p>
                              <div class=popup-message></div>
                        </form>
                      </div>
                      <div class=shortcode>
                        <div class=wp-social-login-widget>
                          <div class=wp-social-login-connect-with>Login with social networks</div>
                          <div class=wp-social-login-provider-list><a rel=nofollow href=javascript:void(0); title="Connect with Facebook" class="wp-social-login-provider wp-social-login-provider-facebook"
                              data-provider=Facebook>Facebook</a><a rel=nofollow href=javascript:void(0); title="Connect with Google" class="wp-social-login-provider wp-social-login-provider-google"
                              data-provider=Google>Google</a><a rel=nofollow href=javascript:void(0); title="Connect with Twitter" class="wp-social-login-provider wp-social-login-provider-twitter"
                              data-provider=Twitter>Twitter</a><a rel=nofollow href=javascript:void(0); title="Connect with LinkedIn" class="wp-social-login-provider wp-social-login-provider-linkedin"
                              data-provider=LinkedIn>LinkedIn</a></div>
                          <div class=wp-social-login-widget-clearing></div>
                        </div><input type=hidden id=wsl_popup_base_url value="http://wordpresslms.thimpress.com/wp-login.php?action=wordpress_social_authenticate&#038;mode=login&#038;">
                        <input
                          type=hidden id=wsl_login_form_uri value=http://wordpresslms.thimpress.com/wp-login.php></div>
                    </div>
                    <div class=register-form>
                      <div class=sign-in-htm>
                        <h3 class="title">Register to start learning</h3>
                        <form name=loginform class=auto_login id=popupRegisterForm action="http://wordpresslms.thimpress.com/wp-login.php?action=register"
                          method=post><input type=hidden id=register_security name=register_security value=ca5739fff3><input type=hidden name=_wp_http_referer value=/>
                          <p><input id=popupRegisterName placeholder=Username type=text name=user_login class="input required"></p>
                          <p><input id=popupRegisterEmail placeholder="Email Address" type=email name=user_email class="input required"></p>
                          <p><input id=popupRegisterPassword placeholder=Password type=password name=password class="input required"></p>
                          <p><input id=popupRegisterCPassword placeholder="Confirm Password" type=password name=repeat_password class="input required"></p>
                          <p><label for=become_teacher><input type=checkbox name=become_teacher id=become_teacher>Want to become an instructor? </label></p>
                          <p
                            class=login-submit><input type=submit name=wp-submit id=popupRegisterSubmit class="button button-primary button-large" value="Sign Up"><input type=hidden
                              name=redirect_to value=http://wordpresslms.thimpress.com/></p>
                            <div class=popup-message></div>
                        </form>
                      </div>
                      <div class=shortcode>
                        <div class=wp-social-login-widget>
                          <div class=wp-social-login-connect-with>Login with social networks</div>
                          <div class=wp-social-login-provider-list><a rel=nofollow href=javascript:void(0); title="Connect with Facebook" class="wp-social-login-provider wp-social-login-provider-facebook"
                              data-provider=Facebook>Facebook</a><a rel=nofollow href=javascript:void(0); title="Connect with Google" class="wp-social-login-provider wp-social-login-provider-google"
                              data-provider=Google>Google</a><a rel=nofollow href=javascript:void(0); title="Connect with Twitter" class="wp-social-login-provider wp-social-login-provider-twitter"
                              data-provider=Twitter>Twitter</a><a rel=nofollow href=javascript:void(0); title="Connect with LinkedIn" class="wp-social-login-provider wp-social-login-provider-linkedin"
                              data-provider=LinkedIn>LinkedIn</a></div>
                          <div class=wp-social-login-widget-clearing></div>
                        </div><input type=hidden id=wsl_popup_base_url value="http://wordpresslms.thimpress.com/wp-login.php?action=wordpress_social_authenticate&#038;mode=login&#038;">
                        <input
                          type=hidden id=wsl_login_form_uri value=http://wordpresslms.thimpress.com/wp-login.php></div>
                    </div><span class=close-popup><i class="fa fa-times" aria-hidden=true></i></span></div>
                  <div class=thim-loading-icon>
                    <div class=sk-chasing-dots>
                      <div class="sk-child sk-dot1"></div>
                      <div class="sk-child sk-dot2"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
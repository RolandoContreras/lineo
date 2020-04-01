<!DOCTYPE html>
<html lang="es">
    <?php $this->load->view("head"); ?>
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
            <?php $this->load->view("header"); ?> 
            <?php $this->load->view("nav"); ?>
            <div id="main-content">
                <section class="content-area">
                    <div class="page-title layout-1">
                        <div class="main-top parallax" style="background-image:url(<?php echo site_url() . 'static/page_front/images/bg_header.jpg'; ?>);">
                            <span class="overlay-top-header" style="background-color: rgba(0,0,0,0.5);"></span>
                            <div class="content container">
                                <div class=vc_empty_space style="height: 75px"><span class=vc_empty_space_inner></span></div>
                                <div class=row>
                                    <div class="text-title col-md-6">
                                        <h1>Comprar</h1>
                                    </div>
                                    <div class="text-description col-md-6">
                                        <div class=banner-description>
                                            <p><strong class="br">La mejor educación en un solo lugar </strong> U-LINEX creado especialmente para ti</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="breadcrumb-content ">
                            <div class="breadcrumbs-wrapper container">
                                <ul id="breadcrumbs" class="breadcrumbs">
                                    <li>
                                        <a href="<?php echo site_url(); ?>" title="Inicio">
                                            <span>Inicio</span>
                                        </a>
                                        <span class=breadcrum-icon><i class="fa fa-angle-right" aria-hidden=true></i></span>
                                    </li>
                                    <li>
                                        <span title="Iniciar Sesión">Iniciar Sesión</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div id=main class="site-main col-sm-9 full-width">
                                <div class="vc_empty_space" style="height: 92px"><span class="vc_empty_space_inner"></span></div>
                                <article id=post-522 class="post-522 page type-page status-publish hentry pmpro-has-access">
                                    <div class=entry-content>
                                        <div class="vc_row wpb_row vc_row-fluid account-login-page">
                                            <div id="mensaje"></div>
                                            <div class="col-sm-12">
                                                <div id="smartwizard" class="sw-main sw-theme-dots">
                                                    <ul class="nav nav-tabs step-anchor">
                                                        <li class="nav-item active">
                                                            <a href="#step-1" class="nav-link">
                                                                <h6>Paso 1</h6>
                                                                <p class="m-0">Crea tu cuenta</p>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item done">
                                                            <a href="#step-2" class="nav-link">
                                                                <h6>Paso 2</h6>
                                                                <p class="m-0">Curso seleccionado</p>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item done">
                                                            <a href="#step-3" class="nav-link">
                                                                <h6>Paso 3</h6>
                                                                <p class="m-0"> Método de pago</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="sw-container tab-content">
                                                        <div id="step-1" class="tab-pane step-content" style="display: block;">
                                                            <h5>Detalle de facturación</h5> 
                                                            <hr>
                                                            <div class="col-md-12">
                                                                <form action="javascript:void(0);" enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Nombres *</label>
                                                                        <input type="text" class="form-control" id="name" placeholder="Ingrese Nombres">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Apellidos *</label>
                                                                        <input type="text" class="form-control" id="last_name" placeholder="Ingrese Apellidos">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">E-mail *</label>
                                                                        <input type="email" class="form-control" id="email" placeholder="Ingrese email">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Teléfono *</label>
                                                                        <input type="text" class="form-control" id="phone" placeholder="Ingrese Teléfono">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Contraseña *</label>
                                                                        <input type="password" class="form-control" id="password" placeholder="Ingrese una contraseña">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">País *</label>
                                                                        <select name="pais" id="pais" class="form-control">
                                                                            <option value="">Seleccionar País</option>
                                                                            <?php foreach ($obj_paises as $value) { ?>
                                                                                <option value="<?php echo $value->id ?>"><?php echo $value->nombre; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div id="step-2" class="tab-pane step-content" style="display: none;">
                                                            <h5>Tu pedido | Cursos</h5>
                                                            <hr>
                                                            <div class="col-sm-12">
                                                                <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid"
                                                                       aria-describedby="zero-configuration_info">
                                                                    <thead>
                                                                        <tr role="row">
                                                                            <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 197px;"
                                                                                aria-label="Office: activate to sort column ascending">Curso</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 197px;"
                                                                                aria-label="Office: activate to sort column ascending">Cantidad</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                                                                aria-label="Age: activate to sort column ascending">Precio</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                                                                aria-label="Age: activate to sort column ascending">Acciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i = 1; ?>
                                                                        <?php foreach ($this->cart->contents() as $items): ?>
                                                                            <tr>
                                                                                <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                                                                <td>Curso  <?php echo $items['name']; ?></td>
                                                                                <td>
                                                                                    <?php echo format_number_miles($this->cart->format_number($items['qty'])); ?>
                                                                                </td>
                                                                                <td>S/. <?php echo $this->cart->format_number($items['price']); ?></td>
                                                                                <td>
                                                                                    <button type="button" onclick="delete_order('<?php echo $items['rowid']; ?>');" class="btn btn-icon btn-rounded btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th class="text-c-black"><b>TOTAL</b></th>
                                                                            <th class="text-c-purple">
                                                                                <span class="badge badge-pill badge-success" style="font-size: 100%;">
                                                                                    S/. <?php echo $this->cart->format_number($this->cart->total()); ?>
                                                                                </span>
                                                                            </th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                                <br/>
                                                                <div id="message"></div>
                                                            </div>
                                                        </div>
                                                        <div id="step-3" class="tab-pane step-content" style="display: none;">
                                                            <h5>Pagar con tarjeta</h5>
                                                            <hr>
                                                            <div class="">
                                                                <p class="mp-subtitle-basic-checkout">
                                                                    Tarjetas de crédito
                                                                </p>
                                                                <img src="<?php echo site_url().'static/page_front/images/visa.gif';?>" alt="visa">
                                                                <img src="<?php echo site_url().'static/page_front/images/amex.gif';?>" alt="amex">
                                                                <img src="<?php echo site_url().'static/page_front/images/master.gif';?>" alt="master">
                                                            </div>
                                                            <div class=vc_empty_space style="height: 35px"><span class=vc_empty_space_inner></span></div>
                                                            <div class="frame-tarjetas">
                                                                <p class="submp-title-checkout">Tarjetas de débito</p>
                                                                <img src="<?php echo site_url().'static/page_front/images/debvisa.gif';?>" alt="visa débito">
                                                                <img src="<?php echo site_url().'static/page_front/images/debmaster.gif';?>" alt="mastercard débito">
                                                            </div>
                                                            <div style=" text-align: center;">
                                                                <div class="col-sm-12">
                                                                      <div class="card-block text-center">
                                                                          <button type="button" class="btn shadow-2 btn-success btn-lg" id="buyButton" data-price="<?php echo quitar_punto_number($this->cart->format_number($this->cart->total())); ?>"><i class="fas fa-shopping-cart"></i>&nbsp; Pagar</button>
                                                                            <button class="btn btn shadow-2 btn-success btn-lg" type="button" style="display: none;" id="spinner">
                                                                              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                              Verificando ...
                                                                            </button>
                                                                      </div>
                                                                  </div>
                                                            </div>
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
            <?php $this->load->view("footer"); ?>  
            <!--END FOOTER-->
        </div>
        <div id="back-to-top"><i class="fa fa-angle-up" aria-hidden=true></i></div>
        <div class="gallery-slider-content"></div>
        <script src=https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js></script>
        <script>WebFont.load({google: {families: ['Roboto:400,300']}});</script>
        <script defer src="<?php echo site_url() . 'static/page_front/js/autoptimize_282.js'; ?>"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <script src="<?php echo site_url().'static/page_front/js/modalEffects.js';?>"></script>
        <script src="<?php echo site_url().'static/page_front/js/classie.js';?>"></script>
        <script src="<?php echo site_url().'static/page_front/js/plugins/jquery.smartWizard.min.js';?>"></script>
        <script src="<?php echo site_url().'static/page_front/js/plugins/wizard-custom.js';?>"></script>
        <link rel="stylesheet" href="<?php echo site_url().'static/page_front/css/plugins/smart_wizard.min.css';?>">
        <link rel="stylesheet" href="<?php echo site_url().'static/page_front/css/plugins/smart_wizard_theme_dots.min.css';?>">
        <link rel="stylesheet" href="<?php echo site_url().'static/page_front/css/style.css';?>">
        <script src="<?php echo site_url().'static/page_front/js/script/pay_home.js';?>"></script>
        <script>
   $("#buyButton").click(function(){
      $("#spinner").show();
      $("#buyButton").hide();
    });
</script>
    </body>
</html>


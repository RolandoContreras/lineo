<!DOCTYPE html>
<html lang="es">
<head>
  <title>U-linex - Oficina Virtual</title>
  <!--[if lt IE 10]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Somos una comunidad de desarrollo personal y emprendimiento. Estudia">
  <meta name="author" content="U-linex">
  <meta name="keyword" content="U-linex, plataforma de cursos, cursos de arquitectura, aprende arquitectura">
  <meta name="robots" content="Index, Follow">
   <!--//STAR FAVICON-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-touch-icon.png';?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-32x32.png';?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-16x16.png';?>">
    <link rel="manifest" href="<?php echo site_url().'static/page_front/images/logo/favico/site.webmanifest';?>">
    <!--//END FAVICON-->
  <link rel="stylesheet" href="<?php echo site_url().'static/course/css/style.css';?>">
  <link rel="stylesheet" href="<?php echo site_url().'static/course/css/gallery.css';?>">
  <link rel="stylesheet" href="<?php echo site_url().'static/backoffice/css/mystyle.css';?>">
  <link rel="stylesheet" href="http://html.codedthemes.com/datta-able/bootstrap/assets/css/pages/fileupload.css">
  
  <script src="https://unpkg.com/feather-icons"></script>
  <script type="text/javascript">
    var site = '<?php echo site_url();?>';
  </script>
  <script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>
  <script src="<?php echo site_url().'static/cms/js/core/bootstrap.min.js';?>"></script>
  <!--culqi-->
  <script src="https://checkout.culqi.com/js/v3"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body class="layout-6" style="background-image: url('<?php echo site_url().'static/page_front/images/bg_header.jpg';?>'); background-size: cover;">
  <nav class="pcoded-navbar menu-light brand-lightblue menupos-static">
    <div class="navbar-wrapper">
      <div class="navbar-brand header-logo">
          <a href="<?php echo site_url().'course';?>" class="b-brand">
              <img src="<?php echo site_url().'static/page_front/images/logo/logo-h-b.png';?>" alt="Logo" width="180"/>
          </a>
          <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a></div>
      <div class="navbar-content scroll-div">
        <div class="card-block text-center">
            <a href="<?php echo site_url().'backoffice/profile';?>">
                <br/>
                <?php 
                if($_SESSION['customer']['img'] != null){ ?>
                <img  data-toggle="tooltip" data-placement="right" data-original-title="Cambiar imagen" src="<?php echo site_url()."static/backoffice/images/profile/".$_SESSION['customer']['img'];?>" class="img-radius" alt="Perfil" width="100" height="100">
                <?php }else{ ?> 
                        <img src="<?php echo site_url()."static/backoffice/images/avatar.jpg";?>" class="img-radius" alt="Perfil">
                <?php  } ?>
            </a>
            <div class="nav-item pcoded-menu-caption"><b>¡Hola!,</b><?php echo $_SESSION['customer']['name']?></div>
        </div>
        <hr/>
        <ul class="nav pcoded-inner-navbar">
          <li class="nav-item pcoded-menu-caption"><label>Navegación</label></li>
          <?php
          $url = explode("/",uri_string());
            if(isset($url[1])){
                $nav = "$url[1]";
            }else{
                $nav = "home";
            }
            
            $course_syle = "";
            $home_syle = "";
            $profile_syle = "";
            $shopping_syle = "";
            $mis_cursos_syle = "";
            
            switch ($nav) {
                case "profile":
                    $profile_syle = "active";
                    break;
                case "miscursos":
                    $mis_cursos_syle = "active";
                    break;
                case "home":
                    $home_syle = "active";
                    break;
                case "shopping":
                    $shopping_syle = "active";
                    break;
                default:
                    $course_syle = "active";
                    break;
            }
          ?>
          
          
          <li class="nav-item">
              <a href="<?php echo site_url().'backoffice';?>" class="nav-link <?php echo $home_syle;?>">
                  <span class="pcoded-micon">
                       <i data-feather="home"></i>
                  </span>
                  <span class="pcoded-mtext">Inicio</span>
              </a>
        </li>
        <li class="nav-item">
              <a href="<?php echo site_url().'backoffice/profile';?>" class="nav-link <?php echo $profile_syle;?>">
                  <span class="pcoded-micon">
                       <i data-feather="users"></i>
                  </span>
                  <span class="pcoded-mtext">Perfil</span>
              </a>
        </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="<?php echo site_url().'backoffice/miscursos';?>" class="nav-link <?php echo $mis_cursos_syle;?>">
                        <span class="pcoded-micon text-c-green">
                            <b><i data-feather="star"></i></b>
                        </span>
                        <span class="pcoded-mtext text-c-green"><b>Mis Cursos</b></span>
                    </a>
                                    </li>
        <li class="nav-item">
              <a href="<?php echo site_url().'backoffice/shopping';?>" class="nav-link <?php echo $shopping_syle;?>">
                  <span class="pcoded-micon">
                       <i data-feather="shopping-cart"></i>
                  </span>
                  <span class="pcoded-mtext">Mis Compras</span>
              </a>
        </li>
        <li class="nav-item">
              <a href="<?php echo site_url().'backoffice/certificados';?>" class="nav-link <?php echo $profile_syle;?>">
                  <span class="pcoded-micon">
                       <i data-feather="layers"></i>
                  </span>
                  <span class="pcoded-mtext">Certificados</span>
              </a>
        </li>
        <li class="nav-item">
              <a href="<?php echo site_url().'salir';?>" class="nav-link">
                  <span class="pcoded-micon">
                       <i data-feather="log-out"></i>
                  </span>
                  <span class="pcoded-mtext">Salir</span>
              </a>
        </li>
    </ul>
    </div>
    </div>
  </nav>
  <header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header"><a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
        <a href="<?php echo site_url().'course';?>" class="b-brand">
            <img src="<?php echo site_url().'static/page_front/images/logo/logo-h-b.png';?>" alt="Logo" width="180"/>
        </a>
    </div>
      <a class="mobile-menu" id="mobile-header" href="#!">
          <i class="feather icon-more-horizontal"></i>
      </a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li>
            <a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()">
                <i data-feather="maximize"></i>
            </a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse">
       <?php 
        //count data cart
        $cart = count($this->cart->contents());
       if($cart > 0){ ?>
            <ul class="navbar-nav ml-auto">
                <li>
                  <div class="dropdown drp-user">
                      <a href="<?php echo site_url().'backoffice/pay_order';?>">
                          <span title="Pagar Compra" data-toggle="tooltip" data-placement="bottom" data-original-title="Pagar Compra" style="padding: 10px;border-radius: 10px;">
                              <i data-feather="shopping-cart" style="color: #00a78e;"></i>  
                              <span class="wrapper-items-number">
                                        <span class="items-number"></span>
                                        <button type="button" class="btn btn-icon btn-rounded btn-danger"> <?php echo $cart;?> </button>
                              </span>
                          </span>
                      </a>
                  </div>
                </li>
              </ul>
       <?php } ?>   
    </div>
  </header>
  <?php echo $body;?>
  <script src="<?php echo site_url().'static/course/js/vendor-all.min.js';?>"></script>
  <script src="<?php echo site_url().'static/cms/js/core/datatables.min.js';?>"></script>
  <script src="<?php echo site_url().'static/cms/js/core/tbl-datatable-custom.js';?>"></script>
  <script src="<?php echo site_url().'static/course/js/bootstrap.min.js';?>"></script>
  <script src="<?php echo site_url().'static/course/js/pcoded.min.js';?>"></script>
  <script src="<?php echo site_url().'static/course/js/ekko-lightbox.min.js';?>"></script>
  <script src="<?php echo site_url().'static/course/js/ac-lightbox.js';?>"></script>
      <script src=https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js></script>
      <script>
        WebFont.load({google:{families:['Roboto:400,300']}});
      </script>
      <script defer src="<?php echo site_url().'static/page_front/js/autoptimize_282.js';?>"></script>
  <script>
      feather.replace()
  </script>
</body>
</html>
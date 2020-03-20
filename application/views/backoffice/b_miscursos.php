  <section class="pcoded-main-container">
    <div class="pcoded-wrapper">
      <div class="pcoded-content">
        <div class="pcoded-inner-content">
          <div class="page-header">
            <div class="page-block">
              <div class="row align-items-center">
                <div class="col-md-12">
                  <div class="page-header-title">
                    <h5 class="m-b-10">Listado</h5>
                  </div>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo site_url().'backoffice';?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a>Mis Cursos</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="main-body">
            <div class="page-wrapper">
              <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h5><?php echo $category_name;?></h5>
                      </div>
                      <div class="card-block">
                          <?php 
                          if(count($obj_courses_by_customer) > 0){?>
                                <div class="grid">
                                <?php
                                foreach ($obj_courses_by_customer as $value) { ?>
                                  <figure class="effect-apollo">
                                      <img src="<?php echo site_url()."static/cms/img/cursos/$value->img";?>" alt="advance-3">
                                    <figcaption>
                                      <p><?php echo corta_texto($value->description, 100);?></p>
                                      <a href="<?php echo site_url()."backoffice/$value->category_slug/$value->slug";?>">Ver Más</a>
                                    </figcaption>
                                  </figure>
                                <?php } ?>
                                </div>
                         <?php }else{ ?>
                                    <div class="alert alert-secondary" role="alert">
                                        No tiene cursos comprados <a href="<?php echo site_url().'backoffice';?>" class="alert-link"><b> ¡Obtenga uno ahora!</b></a>
                                    </div>
                          <?php } ?>
                      </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    
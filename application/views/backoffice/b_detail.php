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
                      <li class="breadcrumb-item"><a href="<?php echo site_url().'bacoffice';?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a>Videos Todos</a></li>
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
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-8">
                              <div class="card">
                                <div class="card-header">
                                  <h5>Título: <?php echo $obj_courses->name;?></h5>
                                </div>
                                <div class="card-body">
                                  <div class="row justify-content-center">
                                    <div class="col-md-12">
                                      <div class="embed-responsive embed-responsive-16by9">
                                          <?php
                                                foreach ($obj_videos as $value) {
                                                    if($value->type == 1){
                                                        $link_video = explode("/", $value->video);
                                                    }
                                                }
                                          ?>
                                          <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/<?php echo $link_video[3]; ?>" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-header">
                                  <h5>Contenido</h5>
                                </div>
                               <div class="card-block">
                                   <h3 class="f-w-300 d-flex align-items-center  m-b-0"><?php echo $obj_courses->name; ?></h3>
                                   <h3 class="f-w-300 d-flex align-items-center  m-b-0"><span class="pcoded-micon text-c-green"><i data-feather="tag"></i></span>&nbsp; S/.<?php echo $obj_courses->price;?></h3>
                                   <br/>
                                        <h6>Descripción</h6>
                                        <?php echo $obj_courses->description;?>
                                        <h6 class="mt-3">Categoría</h6>
                                        <p class="text-primary mb-1">
                                            <a href="<?php echo site_url()."backoffice/$obj_courses->category_slug";?>"><span class="badge badge-pill badge-success" style="font-size: 100%;"><?php echo $obj_courses->category_name;?></span></a>
                                        </p>
                                        <br/>
                                        <center>
                                            <button onclick="add_cart('<?php echo $obj_courses->course_id;?>','<?php echo $obj_courses->price;?>','<?php echo $obj_courses->name;?>');" type="button" class="btn btn-success btn-lg"><span class="pcoded-micon text-c-white"><i data-feather="shopping-cart"></i></span>&nbsp; Comprar</button>
                                        </center>
                                </div>
                                <div id="message"></div>
                            </div>
                            <div class="col-xl-12 col-md-12">
                                  <div class="card Recent-Users">
                                    <div class="card-header">
                                      <h5>Contenido</h5>
                                    </div>
                                    <div class="card-block px-0 py-3">
                                      <div class="table-responsive">
                                        <table class="table table-hover">
                                          <tbody>
                                              <?php 
                                            foreach ($obj_modules as $value) { ?>
                                              <tr class="unread" style="background: linear-gradient(-135deg,#3f4d67 0%,#3f4d67 100%);">
                                                  <td>
                                                      <span class="pcoded-micon text-c-purple"><i data-feather="check"></i></span>
                                                  </td>
                                                  <td colspan="4">
                                                        <h6 class="mb-1 aaa">Módulo</h6>
                                                        <p class="m-0 white"><?php echo $value->name;?></p>
                                                      </td>
                                                </tr>
                                                <?php 
                                                    foreach ($obj_videos as $videos) { 
                                                        if($videos->module_id == $value->module_id){ ?>
                                                            <tr class="unread">
                                                              <td>
                                                                  <span class="pcoded-micon text-c-purple"><i data-feather="video"></i></span>
                                                              </td>
                                                              <td>
                                                                <h6 class="mb-1">Vídeo</h6>
                                                                <p class="m-0"><?php echo $videos->name;?></p>
                                                              </td>
                                                              <td>
                                                                  <h6 class="text-muted"><span class="pcoded-micon text-c-grey"><i data-feather="calendar"></i></span><?php echo formato_fecha_dia_mes_ano($videos->date);?></h6>
                                                              </td>
                                                              <td>
                                                                  <h6 class="text-muted"><span class="pcoded-micon text-c-grey"><i data-feather="watch"></i></span><?php echo $videos->time."min";?></h6>
                                                              </td>
                                                              <td>
                                                                  <a href="#!" class="label theme-bg text-white f-12">
                                                                      <span class="pcoded-micon text-c-black"><i data-feather="check"></i></span>
                                                                  </a>
                                                              </td>
                                                        </tr>
                                                       <?php }  ?>
                                                    <?php } ?> 
                                             <?php } ?>  
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>  
                              <div class="col-sm-12">
                                  <div class="card-header">
                                      <h5>Cursos Relacionados</h5>
                                    </div>
                                      <div class="card-block">
                                        <div class="grid">
                                            <?php
                                            foreach ($obj_courses_related as $value) { ?>
                                              <figure class="effect-apollo">
                                                  <img src="<?php echo site_url()."static/cms/img/cursos/$value->img";?>" alt="<?php echo $value->name?>">
                                                <figcaption>
                                                  <p><?php echo corta_texto($value->description, 100);?></p>
                                                  <a href="<?php echo site_url()."backoffice/$value->category_slug/$value->slug";?>">Ver Más</a>
                                                </figcaption>
                                              </figure>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                          </div>
                        </div>
                      </div>
                    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<script src="<?php echo site_url().'static/backoffice/js/script/pay_order.js';?>"></script>
<script src="<?php echo site_url().'static/backoffice/js/sweetalert.min.js';?>"></script>      
    
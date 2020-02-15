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
                      <li class="breadcrumb-item"><a href="<?php echo site_url().'course';?>"><i data-feather="home"></i></a></li>
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
                                          <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=Z6aMDXV1BCI" allowfullscreen=""></iframe>
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
                                   <!--<h5 class="mt-3"><?php echo $obj_courses->name;?></h5>-->
                                   <h3 class="f-w-300 d-flex align-items-center  m-b-0"><?php echo $obj_courses->name; ?></h3>
                                   <i class="feather icon-shopping-cart f-30 text-c-green"></i>
                                   <h3 class="f-w-300 d-flex align-items-center  m-b-0"><span class="pcoded-micon text-c-green"><i data-feather="tag"></i></span>&nbsp; S/.<?php echo $obj_courses->price;?></h3>
                                   <br/>
                                        <h6>Descripción</h6>
                                        <p><?php echo $obj_courses->description;?></p>
                                        <h6 class="mt-3">Categoría</h6>
                                        <p class="text-primary mb-1">
                                            <a href="<?php echo site_url()."backoffice/$obj_courses->category_slug";?>"><span class="badge badge-pill badge-success" style="font-size: 100%;"><?php echo $obj_courses->category_name;?></span></a></p>
                                </div>
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
                                            foreach ($obj_videos as $value) { ?>
                                                  <tr class="unread">
                                                      <td>
                                                          <span class="pcoded-micon text-c-purple"><i data-feather="video"></i></span>
                                                      </td>
                                                      <td>
                                                        <h6 class="mb-1">Vídeo</h6>
                                                        <p class="m-0"><?php echo $value->name;?></p>
                                                      </td>
                                                      <td>
                                                          <h6 class="text-muted"><span class="pcoded-micon text-c-grey"><i data-feather="calendar"></i></span><?php echo formato_fecha_dia_mes_ano($value->date);?></h6>
                                                      </td>
                                                      <td>
                                                          <h6 class="text-muted"><span class="pcoded-micon text-c-grey"><i data-feather="watch"></i></span><?php echo $value->time."min";?></h6>
                                                      </td>
                                                      <td>
                                                          <a href="#!" class="label theme-bg text-white f-12">
                                                              <span class="pcoded-micon text-c-black"><i data-feather="check"></i></span>
                                                          </a>
                                                      </td>
                                                </tr>
                                            <?php } ?>  
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>  
                              
                              
                              
                              
                              <div class="col-sm-12">
                                  <div class="card-header">
                                      <h5>Videos Relacionados</h5>
                                    </div>
                                      <div class="card-block">
                                        <div class="grid">
                                            <?php
                                            foreach ($obj_videos_all as $value) { ?>
                                              <figure class="effect-apollo">
                                                  <img width="365" height="340" src="<?php echo site_url()."static/course/img/$obj_courses->img2";?>" alt="advance-3">
                                                <figcaption>
                                                    <h2><span style="font-size: 32px !important;font-weight: 300 !important;"><?php echo $obj_courses->name;?></span></h2>
                                                  <p><?php echo corta_texto($value->summary, 100);?></p>
                                                  <a href="<?php echo site_url()."course/$value->category_slug/$value->slug";?>">Ver Más</a>
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
    
<script src="<?php echo site_url().'static/cms/js/core/bootbox.locales.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/bootbox.min.js';?>"></script>
<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Mantenimientos de Archivos</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/';?>">Panel</a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/videos';?>">Videos</a></li>
                  <li class="breadcrumb-item"><a>Archivos</a></li>
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
                    <h5>Listado de Archivos</h5>
                    <button class="btn btn-secondary" type="button" onclick="new_archivos('<?php echo $course_id;?>','<?php echo $video_id;?>');"><span><span class="pcoded-micon"><i data-feather="plus"></i></span> Nuevo</span></button>
                    <button class="btn btn-primary" type="button" onclick="back_videos('<?php echo $course_id;?>');"><span><span class="pcoded-micon"><i data-feather="arrow-left"></i></span> Regresar Videos</span></button>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                            <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid"
                              aria-describedby="zero-configuration_info">
                              <thead>
                                <tr role="row">
                                  <th class="sorting_asc" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">ID</th>
                                  <th class="sorting_asc" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 150px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">VÍDEO</th>
                                  <th class="sorting_asc" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 150px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">NOMBRE</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 200px;"
                                    aria-label="Position: activate to sort column ascending">ENLACE</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 150px;"
                                    aria-label="Salary: activate to sort column ascending">ACCIONES</th>
                                </tr>
                              </thead>
                              <tbody>
                                  
                                  <?php foreach ($obj_archives as $value): ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?php echo $value->archive_id;?></td>
                                    <td><span class="badge badge-pill badge-secondary" style="font-size: 100%;"><?php echo $value->video_name;?></span></td>
                                    <td><?php echo $value->name;?></td>
                                    <td><?php echo $value->link;?></td>
                                    <td>
                                        <div class="operation">
                                                <div class="btn-group">
                                                    <button class="btn btn-secondary" type="button" onclick="edit_archivos('<?php echo $course_id;?>','<?php echo $value->video_id;?>','<?php echo $value->archive_id;?>');"><span><span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                                    <button class="btn btn-secondary" type="button" onclick="delete_archivos('<?php echo $value->archive_id;?>');"><span><span class="pcoded-micon"><i data-feather="trash-2"></i></span> Eliminar</span></button>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?> 
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th rowspan="1" colspan="1">ID</th>
                                  <th rowspan="1" colspan="1">VIDEO</th>
                                  <th rowspan="1" colspan="1">NOMBRE</th>
                                  <th rowspan="1" colspan="1">ENLACE</th>
                                  <th rowspan="1" colspan="1">ACCIONES</th>
                                </tr>
                              </tfoot>
                            </table>
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
        </div>
</section>
<script src="<?php echo site_url();?>static/cms/js/archivos.js"></script>

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
                  <h5 class="m-b-10">Mantenimientos de Solicitud de Información</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/';?>">Panel</a></li>
                  <li class="breadcrumb-item"><a>Solicitud de Información</a></li>
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
                    <h5>Listado de Solicitud de Información</h5>
                    <button class="btn btn-success" type="button" onclick="export_info();"><span><span class="pcoded-micon"><i data-feather="external-link"></i></span> Exportar</span></button>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                            <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                              <thead>
                                <tr role="row">
                                  <th class="sorting_asc" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 80px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">ID</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 150px;"
                                    aria-label="Office: activate to sort column ascending">Fecha</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 150px;"
                                    aria-label="Position: activate to sort column ascending">Nombres</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 150px;"
                                    aria-label="Position: activate to sort column ascending">Apellidso</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 150px;"
                                    aria-label="Office: activate to sort column ascending">E-mail</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 150px;"
                                    aria-label="Office: activate to sort column ascending">Teléfono</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 150px;"
                                    aria-label="Office: activate to sort column ascending">Curso</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 150px;"
                                    aria-label="Age: activate to sort column ascending">Estado</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 150px;"
                                    aria-label="Start date: activate to sort column ascending">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                   <?php foreach ($obj_info as $value): ?>
                                <tr>
                                <th><?php echo $value->info_id;?></th>
                                <td><?php echo formato_fecha_barras($value->date);?></td>
                                <td><?php echo $value->name;?></td>
                                <td><?php echo $value->last_name;?></td>
                                <td><?php echo $value->email;?></td>
                                <td><span class="badge badge-pill badge-info" style="font-size: 100%;"><?php echo $value->phone;?></span></td>
                                <td><span class="badge badge-pill badge-secondary" style="font-size: 100%;"><?php echo $value->course;?></span></td>
                                <td>
                                    <?php if ($value->status_value == 1) {
                                        $valor = "Pendiente";
                                        $stilo = "label label-warning";
                                    }else{
                                        $valor = "Contestado";
                                        $stilo = "label label-success";
                                    } ?>
                                    <span class="<?php echo $stilo;?>"><?php echo $valor;?></span>
                                </td>
                                <td>
                                    <div class="operation">
                                            <div class="btn-group">
                                                
                                            <?php 
                                            if($value->status_value == 1){ ?>
                                                    <button class="btn btn-secondary buttons-copy buttons-html5" onclick="contestado('<?php echo $value->info_id;?>');" tabindex="0" aria-controls="key-act-button" type="button"><span>Marcar como Contestado</span></button>
                                            <?php }else{ ?>
                                                    <button class="btn btn-secondary buttons-copy buttons-html5" onclick="no_contestado('<?php echo $value->info_id;?>');" tabindex="0" aria-controls="key-act-button" type="button"><span>Marcar como no Contestado</span></button>
                                            <?php } ?>
                                            </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th rowspan="1" colspan="1">ID</th>
                                  <th rowspan="1" colspan="1">Fecha</th>
                                  <th rowspan="1" colspan="1">Nombres</th>
                                  <th rowspan="1" colspan="1">Apellidos</th>
                                  <th rowspan="1" colspan="1">E-mail</th>
                                  <th rowspan="1" colspan="1">Teléfono</th>
                                  <th rowspan="1" colspan="1">Curso</th>
                                  <th rowspan="1" colspan="1">Estado</th>
                                  <th rowspan="1" colspan="1">Acciones</th>
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
<script src="<?php echo site_url();?>static/cms/js/info.js"></script>

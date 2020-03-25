<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Vídeos</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/panel';?>">
                          <span class="pcoded-micon"><i data-feather="home"></i></span>
                          </a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/videos';?>">Listado de Vídeos</a></li>
                  <li class="breadcrumb-item"><a href="#!">Videos</a></li>
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
                    <h5>Datos</h5>
                  </div>
                  <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/videos/$course_id/validate";?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php 
                                if(isset($obj_videos)){ ?>
                                  <div class="form-group">
                                        <label>ID</label>
                                        <input class="form-control" type="text" value="<?php echo isset($obj_videos->video_id)?$obj_videos->video_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                        <input type="hidden" id="video_id" name="video_id" value="<?php echo isset($obj_videos->video_id)?$obj_videos->video_id:"";?>">
                                  </div>
                            <?php } ?>
                            </div>
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                <label>Título</label>
                                <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_videos->name)?$obj_videos->name:"";?>" class="input-xlarge-fluid" placeholder="Titulo">
                              </div>
                              <div class="form-group">
                                    <label>Enlace (https://vimeo.com/81399537)</label>
                                    <input class="form-control" type="text" id="video" name="video" value="<?php echo isset($obj_videos->video)?$obj_videos->video:"";?>" class="input-xlarge-fluid" placeholder="Video">
                              </div>
                              <div class="form-group">
                              <label for="inputState">Tipo</label>
                                <select name="type" id="type" class="form-control">
                                          <option value="">[ Seleccionar ]</option>
                                          <option value="1" <?php if(isset($obj_videos)){
                                              if($obj_videos->type == 1){ echo "selected";}
                                          }else{echo "";} ?>>Resumen</option>
                                          <option value="2" <?php if(isset($obj_videos)){
                                              if($obj_videos->type == 2){ echo "selected";}
                                          }else{echo "";} ?>>Normal</option>
                                </select>
                              </div>
<!--                              <div class="form-group">
                                  <label>Descripción</label>
                                  <textarea class="form-control" name="description" id="description" placeholder="Descripción"><?php echo isset($obj_videos->description)?$obj_videos->description:"";?></textarea>
                                  <script>
                                        CKEDITOR.replace('description');
                                </script>
                              </div>-->
                              <div class="form-group">
                                    <label for="inputState">Estado</label>
                                    <select name="active" id="active" class="form-control">
                                     <option value="">[ Seleccionar ]</option>
                                      <option value="1" <?php if(isset($obj_videos)){
                                          if($obj_videos->active == 1){ echo "selected";}
                                      }else{echo "";} ?>>Activo</option>
                                      <option value="0" <?php if(isset($obj_videos)){
                                          if($obj_videos->active == 0){ echo "selected";}
                                      }else{echo "";} ?>>Inactivo</option>
                                    </select>
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                              
                              <div class="form-group">
                                  <label for="inputState">Curso</label>
                                  <select name="course_id" id="course_id" class="form-control" disabled="">
                                        <option value="<?php echo $obj_courses->course_id;?>"><?php  echo $obj_courses->name;?></option>
                                </select>
                              </div>
                              <div class="form-group">
                                  <label for="inputState">Módulos</label>
                                  <select name="module_id" id="module_id" class="form-control">
                                      <option value="">Seleccionar Módulo</option>
                                      <?php
                                       foreach ($obj_modules as $value) { ?>
                                            <option  <?php if(isset($obj_videos)){
                                              if($obj_videos->module_id == $value->module_id){ echo "selected";}
                                          }else{echo "";} ?> value="<?php echo $value->module_id;?>"><?php echo $value->name;?></option>
                                       <?php } ?>
                                  </select>
                              </div>
                              <div class="form-group">
                                <label>Tiempo (minutos)</label>
                                <input class="form-control" type="text" id="time" name="time" value="<?php echo isset($obj_videos->time)?$obj_videos->time:"";?>" class="input-xlarge-fluid" placeholder="Duración del vídeo">
                              </div>
                               <?php 
                              if(isset($obj_archives)){ ?>
                                    <div class="form-group">
                                        <?php  foreach ($obj_archives as $key => $value) { $key =$key + 1;?> 
                                            <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                  <span class="input-group-text" id="basic-addon3">Archivo <?php echo $key;?></span>
                                                  </div>
                                                  <input type="text" class="form-control" aria-describedby="basic-addon3" value="<?php echo $value->name;?>" disabled="">
                                            </div>
                                        <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                  <span class="input-group-text" id="basic-addon3"><i class="fa fa-file f-28 text-muted" aria-hidden="true"></i></span>
                                                  </div>
                                                  <input type="text" class="form-control" aria-describedby="basic-addon3" value="<?php echo $value->link;?>" disabled="">
                                            </div>
                                        <br/><hr/>
                                        <?php } ?>
                                    </div> 
                              <?php }else{ ?>
                                <div class="form-group">
                                    <label for="inputState">Ingrese cantidad de archivos</label>
                                    <select onclick="crear_archivos();" name="archive" id="archive" class="form-control">
                                         <option value="0" selected=""> Seleccionar cantidad de archivos </option>
                                         <option value="1"> 1 </option>
                                         <option value="2"> 2 </option>
                                         <option value="3"> 3 </option>
                                         <option value="4"> 4 </option>
                                         <option value="5"> 5 </option>
                                         <option value="6"> 6 </option>
                                         <option value="7"> 7 </option>
                                         <option value="8"> 8 </option>
                                         <option value="9"> 9 </option>
                                         <option value="10"> 10 </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                      <div id="respose_archive"></div>
                                </div>
                              <?php } ?>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancel_video('<?php echo $course_id;?>');">Cancelar</button>                    
                    </form>
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
<script src="<?php echo site_url().'static/cms/js/videos.js'?>"></script>

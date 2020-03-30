<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Cursos</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                      <a href="<?php echo site_url().'dashboard/panel';?>">
                          <span class="pcoded-micon"><i data-feather="home"></i></span>
                      </a>
                  </li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/cursos';?>">Listado de Cursos</a></li>
                  <li class="breadcrumb-item"><a href="#!">Cursos</a></li>
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
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/cursos/validate";?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php 
                                if(isset($obj_courses)){ ?>
                                  <div class="form-group">
                                        <label>ID</label>
                                        <input class="form-control" type="text" value="<?php echo isset($obj_courses->course_id)?$obj_courses->course_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                        <input type="hidden" id="course_id" name="course_id" value="<?php echo isset($obj_courses->course_id)?$obj_courses->course_id:"";?>">
                                  </div>
                            <?php } ?>
                            </div>
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_courses->name)?$obj_courses->name:"";?>" class="input-xlarge-fluid" placeholder="Nombre">
                              </div>
                              <div class="form-group">
                               <label>Descripción</label>
                                   <textarea name="description" id="description" placeholder="Descripción"><?php echo isset($obj_courses->description)?$obj_courses->description:"";?></textarea>
                                    <script>
                                            CKEDITOR.replace('description');
                                    </script>
                              </div>
                              <div class="form-group">
                                <label for="inputState">Categoría</label>
                                <select name="category_id" id="category_id" class="form-control">
                                <option value="">[ Seleccionar ]</option>
                                    <?php foreach ($obj_category as $value ): ?>
                                <option value="<?php echo $value->category_id;?>"
                                    <?php 
                                            if(isset($obj_courses->category_id)){
                                                    if($obj_courses->category_id==$value->category_id){
                                                        echo "selected";
                                                    }
                                            }else{
                                                      echo "";
                                            }

                                    ?>><?php echo $value->name;?>
                                </option>
                                    <?php endforeach; ?>
                            </select>
                              </div>
                            <div class="form-group">
                                <label for="inputState">Duración</label>
                                <select name="duration" id="duration" class="form-control">
                                <option value="">[ Seleccionar ]</option>
                                <option value="1" <?php echo isset($obj_courses) && $obj_courses->duration == 1?"selected":"";?>>1 día</option>
                                <option value="15" <?php echo isset($obj_courses) && $obj_courses->duration == 15?"selected":"";?>>15 días</option>
                                <option value="30" <?php echo isset($obj_courses) && $obj_courses->duration == 30?"selected":"";?>>30 días (1 mes)</option>
                                <option value="90" <?php echo isset($obj_courses) && $obj_courses->duration == 90?"selected":"";?>>90 días (3 meses)</option>
                                <option value="180" <?php echo isset($obj_courses) && $obj_courses->duration == 180?"selected":"";?>>180 días (6 meses)</option>
                                <option value="365" <?php echo isset($obj_courses) && $obj_courses->duration == 365?"selected":"";?>>365 (1 año)</option>
                                </select>
                             </div>
                              
                          </div>
                          <div class="form-group col-md-6">
                              <?php 
                                  if(isset($obj_courses)){ ?>
                                      <div class="form-group">
                                          <label>Imagen 1</label><br/>
                                          <img src='<?php echo site_url()."static/cms/img/cursos/$obj_courses->img";?>' width="100" />
                                          <input class="form-control" type="hidden" name="img2" id="img2" value="<?php echo isset($obj_courses)?$obj_courses->img:"";?>">
                                      </div>
                            <?php } ?>
                              <div class="form-group">
                                    <label>Imagen 1 (Tamaño 480 x 360)</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" value="Upload Imagen de Envio" name="image_file" id="image_file">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    </div>
                              </div>
                              <?php 
                                  if(isset($obj_courses->img2)){ ?>
                                      <div class="form-group">
                                          <label>Imagen 2</label><br/>
                                          <img src='<?php echo site_url()."static/cms/img/cursos/$obj_courses->img2";?>' width="100"/>
                                          <input class="form-control" type="hidden" name="img3" id="img3" value="<?php echo isset($obj_courses)?$obj_courses->img2:"";?>">
                                      </div>
                            <?php } ?>
                              <div class="form-group">
                                    <label>Imagen 2 (Tamaño 1000 x 500)</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" value="Upload Imagen de Envio" name="image_file2" id="image_file2">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    </div>
                              </div>
                              
                           <div class="form-group">
                                <label>Precio Actual</label>
                                <input class="form-control" type="text" id="price" name="price" value="<?php echo isset($obj_courses->price)?$obj_courses->price:"";?>" class="input-xlarge-fluid" placeholder="Precio Actual">
                          </div>
                          <div class="form-group">
                                <label>Precio Eliminado</label>
                                <input class="form-control" type="text" id="price_del" name="price_del" value="<?php echo isset($obj_courses->price_del)?$obj_courses->price_del:"";?>" class="input-xlarge-fluid" placeholder="Precio Eliminado">
                          </div>
                              <div class="form-group">
                                <label for="inputState">Estado</label>
                                    <select name="active" id="active" class="form-control">
                                     <option value="">[ Seleccionar ]</option>
                                      <option value="1" <?php if(isset($obj_courses)){
                                          if($obj_courses->active == 1){ echo "selected";}
                                      }else{echo "";} ?>>Activo</option>
                                      <option value="0" <?php if(isset($obj_courses)){
                                          if($obj_courses->active == 0){ echo "selected";}
                                      }else{echo "";} ?>>Inactivo</option>
                                </select>
                            </div>
                            <?php 
                              if(isset($obj_modules)){ ?>
                                    <div class="form-group">
                                        <?php  foreach ($obj_modules as $key => $value) { $key =$key + 1;?> 
                                            <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                  <span class="input-group-text" id="basic-addon3">Módulo <?php echo $key;?></span>
                                                  </div>
                                                <input type="text" class="form-control" aria-describedby="basic-addon3" value="<?php echo $value->name;?>" disabled="">
                                            </div>
                                        <?php } ?>
                                    </div> 
                                  
                              <?php }else{ ?>
                                   <div class="form-group">
                                        <label for="inputState">Ingrese cantidad de módulos</label>
                                        <select onclick="crear_modulo();" name="modulo" id="modulo" class="form-control">
                                             <option value="1" selected=""> 1 </option>
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
                                          <div id="respose">
                                              <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon3">Módulo 1</span>
                                                    </div>
                                                    <input type="text" id="module_1" name="module_1" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="Ingrese Nombre del Módulo">
                                                </div>
                                          </div>
                                    </div>
                              <?php } ?>  
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancel_course();">Cancelar</button>                    
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
<script src="<?php echo site_url().'static/cms/js/cursos.js'?>"></script>
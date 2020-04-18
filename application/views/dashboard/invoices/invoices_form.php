<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Facturas</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/videos';?>">Listado de Facturas</a></li>
                  <li class="breadcrumb-item"><a>Facturas</a></li>
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
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/facturas/validate";?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php 
                                if(isset($obj_invoices)){ ?>
                                  <div class="form-group">
                                        <label>ID</label>
                                        <input class="form-control" type="text" id="invoice_id" name="invoice_id" value="<?php echo isset($obj_invoices->invoice_id)?$obj_invoices->invoice_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                        <input type="hidden" id="invoice_id" name="invoice_id" value="<?php echo isset($obj_invoices->invoice_id)?$obj_invoices->invoice_id:"";?>">
                                  </div>
                            <?php } ?>
                            </div>
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                <label>Usuario / E-mail</label>
                                <input class="form-control" type="text" id="username" name="username" value="<?php echo isset($obj_invoices->email)?$obj_invoices->email:"";?>" class="input-xlarge-fluid" placeholder="Username" disabled="" required>
                              </div>
                              <div class="form-group">
                                  <label>Cliente</label>
                                  <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_invoices->name)?$obj_invoices->name.' '.$obj_invoices->last_name:"";?>" class="input-xlarge-fluid" placeholder="Cliente" disabled="" required>
                              </div>
                              <div class="form-group">
                                  <label>Fecha</label>
                                  <input class="form-control" type="text" id="date" name="date"  placeholder="YYYY/mm/dd" value="<?php echo isset($obj_invoices->date)?$obj_invoices->date:"";?>" class="input-xlarge-fluid" placeholder="Fecha" disabled="" required>
                              </div>
                              
                          </div>
                          <div class="form-group col-md-6">
                              <div class="form-group">
                              <label for="inputState">Curso</label>
                                <select name="course_id" id="course_id" class="form-control" required>
                                <option value="">[ Seleccionar ]</option>
                                    <?php foreach ($obj_courses as $value ): ?>
                                <option value="<?php echo $value->course_id;?>"
                                    <?php 
                                            if(isset($obj_invoices->course_id)){
                                                    if($obj_invoices->course_id==$value->course_id){
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
                                  <label>Importe</label>
                                    <input class="form-control" type="text" name="total" id="total" value="<?php echo isset($obj_invoices->total)?($obj_invoices->total):"";?>" class="input-xlarge-fluid" placeholder="Precio" required>
                              </div>
                              <div class="form-group">
                                  <label for="inputState">Estado</label>
                                    <select name="active" id="active" class="form-control" required>
                                        <option value="">[ Seleccionar ]</option>
                                        <option value="0" <?php if(isset($obj_invoices)){
                                            if($obj_invoices->active == 0){ echo "selected";}
                                        }else{echo "";} ?>>Sin Acción</option>
                                        <option value="1" <?php if(isset($obj_invoices)){
                                            if($obj_invoices->active == 1){ echo "selected";}
                                        }else{echo "";} ?>>Esperando Activación</option>
                                        <option value="2" <?php if(isset($obj_invoices)){
                                            if($obj_invoices->active == 2){ echo "selected";}
                                        }else{echo "";} ?>>Procesado</option>
                                        <option value="3" <?php if(isset($obj_invoices)){
                                            if($obj_invoices->active == 3){ echo "selected";}
                                        }else{echo "";} ?>>Cancelado</option>
                                </select>
                              </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancelar_invoice();">Cancelar</button>                    
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
<script src="<?php echo site_url().'static/cms/js/facturas.js'?>"></script>
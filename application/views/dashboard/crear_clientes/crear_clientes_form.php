<script src="<?php echo site_url().'static/cms/js/core/bootbox.locales.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/bootbox.min.js';?>"></script>
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Formulario Crear Clientes</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo site_url() . 'dashboard/panel'; ?>">
                                            <span class="pcoded-micon"><i data-feather="home"></i></span>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Crear Nuevo Cliente</a></li>
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
                                        <form enctype="multipart/form-data" method="post" action="javascript:void(0);" onsubmit="crear_cliente();">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <?php if (isset($obj_courses)) { ?>
                                                        <div class="form-group">
                                                            <label>ID</label>
                                                            <input class="form-control" type="text" value="<?php echo isset($obj_courses->course_id) ? $obj_courses->course_id : ""; ?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                                            <input type="hidden" id="course_id" name="course_id" value="<?php echo isset($obj_courses->course_id) ? $obj_courses->course_id : ""; ?>">
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label>Nombres</label>
                                                        <input class="form-control" type="text" id="name" name="name" class="input-xlarge-fluid" placeholder="Nombre" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Apellidos</label>
                                                        <input class="form-control" type="text" id="last_name" name="last_name" class="input-xlarge-fluid" placeholder="Apellidos" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>E-mail</label>
                                                        <input class="form-control" type="email" id="email" name="email" class="input-xlarge-fluid" placeholder="Correo" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label>Contraseña</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="validationTooltipUsernamePrepend" style="cursor: pointer;" onclick="show_pass();"><i class="fa fa-eye"></i></span>
                                                            </div>
                                                            <input class="form-control" type="password" id="password" name="password" value="<?php echo isset($obj_customer->password) ? $obj_customer->password : ""; ?>" class="input-xlarge-fluid" placeholder="Password" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Teléfono</label>
                                                        <input class="form-control" type="text" id="phone" name="phone" class="input-xlarge-fluid" placeholder="Teléfono" required>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="inputState">País</label>
                                                        <select name="country" id="country" class="form-control" required>
                                                            <option value="">[ Seleccionar ]</option>
                                                            <?php foreach ($obj_paises as $value): ?>
                                                                <option value="<?php echo $value->id; ?>"><?php echo $value->nombre; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>  
                                                </div>
                                            </div>
                                            <div id="respose"></div>
                                            <button type="submit" class="btn btn-primary">Crear Cliente</button>
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
<script src="<?php echo site_url() . 'static/cms/js/crear_cliente.js' ?>"></script>
<script>
  function show_pass(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
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
                    <li class="breadcrumb-item"><a>Mi Perfil</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="main-body">
            <div class="page-wrapper">
              <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Perfil
                        </div>
                        <div class="card-body">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email / Usuario</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" readonly="" value="<?php echo $obj_customer->email;?>"></div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Nombre</label>
                                    <input type="text" class="form-control" id="name" value="<?php echo $obj_customer->name;?>" readonly="">
                                </div>
                              </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Teléfono</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" readonly="" value="<?php echo $obj_customer->email;?>"></div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Fecha</label>
                                    <input type="text" class="form-control" id="name" value="<?php echo formato_fecha_dia_mes_ano($obj_customer->date);?>" readonly="">
                                </div>
                              </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">País</label>
                                    <select id="inputState" class="form-control">
                                        <option selected=""><?php echo $obj_customer->pais;?></option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Estado</label>
                                    <input type="text" class="form-control" id="name" value="Activo" readonly="">
                                </div>
                              </div>
                        </div>
                        <hr>
                        <div class="card-header">
                            Contraseña
                        </div>
                        <div class="card-body">
                            <form method="post" action="javascript:void(0);">
                              <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Contraseña Actual</label>
                                    <input type="password" class="form-control" id="pass" name="pass" readonly="" value="<?php echo $obj_customer->password;?>"></div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Nueva Contraseña</label>
                                    <input type="password" class="form-control" id="new_pass" name="new_pass">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Confirme nueva contraseña</label>
                                    <input type="password" class="form-control" id="new_pass_confirm" name="new_pass_confirm">
                                </div>
                              </div>
                                <button onclick="change_pass();" class="btn btn-primary">Cambiar Contraseña</button>
                            </form>
                            <div id="message"></div>
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
<script src='<?php echo site_url().'static/backoffice/js/script/profile.js';?>'></script>
    
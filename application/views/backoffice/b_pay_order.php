<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Mis Pedido</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a>Compras</a></li>
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
                    <h5>Mi compra actual</h5>
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
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 197px;"
                                    aria-label="Office: activate to sort column ascending">Nombre</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 197px;"
                                    aria-label="Office: activate to sort column ascending">Cantidad</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Precio</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                               <?php $i = 1; ?>
                               <?php foreach ($this->cart->contents() as $items): ?>
                                <tr>
                                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                                    <td>Curso  <?php echo $items['name'];?></td>
                                    <td>
                                        <?php echo format_number_miles($this->cart->format_number($items['qty'])); ?>
                                    </td>
                                    <td>S/. <?php echo $this->cart->format_number($items['price']); ?></td>
                                    <td>
                                        <button type="button" onclick="delete_order('<?php echo $items['rowid'];?>');" class="btn btn-icon btn-rounded btn-outline-danger"><i data-feather="trash-2"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                <th></th>
                                <th class="text-c-black"><b>TOTAL</b></th>
                                <th class="text-c-purple">
                                        <span class="badge badge-pill badge-success" style="font-size: 100%;">
                                            S/. <?php echo $this->cart->format_number($this->cart->total());?>
                                        </span>
                                </th>
                                <th></th>
                                </tr>
                              </tfoot>
                            </table>
                              <br/>
                              <div id="message"></div>
                          </div>
                        </div>
                            <div class="row">
                                  <div class="col-sm-12">
                                    <div class="card">
                                      <div class="card-header">
                                        <h5>Pago</h5>
                                      </div>
                                    </div>
                                  </div>
                                <div class="col-sm-12">
                                      <div class="card-block text-center">
                                          <button type="button" class="btn shadow-2 btn-success btn-lg" id="buyButton" data-price="<?php echo quitar_punto_number($this->cart->format_number($this->cart->total())); ?>"><i data-feather="credit-card"></i>&nbsp; Pagar</button>
                                            <button class="btn btn shadow-2 btn-success btn-lg" type="button" style="display: none;" id="spinner">
                                              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                              Verificando ...
                                            </button>
                                      </div>
                                  </div>
                            </div>
                          <div id="pay_info"></div>
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
<script src="<?php echo site_url();?>static/backoffice/js/script/pay_order.js"></script>
<script>
   $("#buyButton").click(function(){
      $("#spinner").show();
      $("#buyButton").hide();
    });
  Culqi.publicKey = 'pk_test_afc652f5ee5883c7';
  var  price = "";
  $('#buyButton').on('click', function(e) {
      price = $(this).attr('data-price');
      Culqi.options({
        lang: 'auto',
        modal: true,
        style: {
          logo: '<?php echo site_url().'static/page_front/images/logo/logo-black.png';?>',
          maincolor: '#0ec1c1',
          buttontext: '#ffffff',
          maintext: '#4A4A4A',
          desctext: '#4A4A4A'
        }
    });
      Culqi.settings({
        title: 'U-Linex',
        currency: 'PEN',
        description: 'Venta de Cursos',
        amount: price
      });
    Culqi.open();
    e.preventDefault();
    });
    
    function culqi() {
      if (Culqi.token) { // ¡Objeto Token creado exitosamente!
          var token = Culqi.token.id;
          var email = Culqi.token.email;
          var url = site + "backoffice/active_course";
          $.ajax({
             url: url,
             method : 'post',
             data: {
                 price:price,
                 email:email,
                 token:token
             },
             dataType: 'JSON',  
             success: function(data){
                 if(data.object == "charge"){
                    swal("Pago realizado", "Gracias por confiar en U-linex, ingresar a MIS CURSOS y disfruta de tu nuevo curso.", "success");             
                    location.href = site + "backoffice/shopping";
                }else {
                    $("#pay_info").html();
                    swal("Pago no realizado", "Hubo un error, verifique los datos de la tarjeta", "error");             
                    $("#spinner").hide();
                    $("#buyButton").show();
                 } 
             },
             error : function(data){
                 alert(data.user_message);
             }
          });
      } else { 
          console.log(Culqi.error);
          alert(Culqi.error.user_message);
      }
    };

</script>
<script src="<?php echo site_url() . 'static/backoffice/js/sweetalert.min.js'; ?>"></script>      


function update_order(id){
    var qty = document.getElementById("qty").value;
    if(qty > 0){
        $.ajax({
            type: "post",
            url: site + "catalogo/pay_order/update_cart",
            dataType: "json",
            data: {id: id,
                   qty: qty},

            success:function(data){            
                if(data.status == "true"){
                    document.getElementById("quantity_error").style.display = "none";
                    document.getElementById("quantity_success").style.display = "block";
                    location.reload();
                }
            }            
        });
    }else{
        document.getElementById("quantity_error").style.display = "block";
    }
}
function delete_order(id){
        $.ajax({
            type: "post",
            url: site + "backoffice/order/delete_cart",
            dataType: "json",
            data: {id: id},
            success:function(data){            
                if(data.status == "true"){
                    location.reload();
                }
            }            
        });
}
function process_pay_invoice(){
        $.ajax({
            type: "post",
            url: site + "catalogo/pay_order/process_pay_invoice",
            dataType: "json",
            data: {},
            success:function(data){            
                if(data.status == "true"){
                    document.getElementById("pay_success_2").style.display = "block";
                    document.getElementById("exampleModal").showModal();
                }
            }            
        });
}
function add_cart(course_id,price,name){
        $.ajax({
            type: "post",
            url: site + "backoffice/order/add_cart",
            dataType: "json",
            data: {course_id: course_id,
                   price: price,
                   name: name},

            success:function(data){            
                if(data.status == "true"){
                    $("#message").html();
                     var texto = "";
                     texto = texto+'<center>';
                     texto = texto+'<div class="alert alert-success">';
                     texto = texto+'<p>Producto Agregado</p>';
                     texto = texto+'</div>';                 
                     texto = texto+'</center>';
                     $("#message").html(texto);
                     location.reload();
                }else{
                    $("#message").html();
                     var texto = "";
                     texto = texto+'<center>';
                     texto = texto+'<div class="alert alert-danger">';
                     texto = texto+'<p>Hubo un error</p>';
                     texto = texto+'</div>';                 
                     texto = texto+'</center>';
                     $("#message").html(texto);
                }
            }            
        });
}
function add_cart_home(course_id,price,name){
        $.ajax({
            type: "post",
            url: site + "backoffice/order/add_cart",
            dataType: "json",
            data: {course_id: course_id,
                   price: price,
                   name: name},

            success:function(data){            
                if(data.status == "true"){
                    $("#message").html();
                    $("#message2").html();
                     var texto = "";
                     texto = texto+'<center>';
                     texto = texto+'<div class="alert alert-success">';
                     texto = texto+'<p>Producto Agregado</p>';
                     texto = texto+'</div>';                 
                     texto = texto+'</center>';
                     $("#message").html(texto);
                     $("#message2").html(texto);
                     location.reload();
                }else{
                    $("#message").html();
                    $("#message2").html();
                     var texto = "";
                     texto = texto+'<center>';
                     texto = texto+'<div class="alert alert-danger">';
                     texto = texto+'<p>Hubo un error</p>';
                     texto = texto+'</div>';                 
                     texto = texto+'</center>';
                     $("#message").html(texto);
                     $("#message").html(texto);
                     $("#message2").html();
                     var texto = "";
                     texto = texto+'<center>';
                     texto = texto+'<div class="alert alert-danger">';
                     texto = texto+'<p>Hubo un error</p>';
                     texto = texto+'</div>';                 
                     texto = texto+'</center>';
                     $("#message2").html(texto);
                }
            }            
        });
}


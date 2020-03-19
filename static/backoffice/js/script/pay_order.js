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
                    swal("Producto Agregado", "", "success");
                    window.setTimeout(function(){location.reload()},1000);
                }else{
                    swal("Hubo un error!", "No se pudo agregar el producto!", "error");
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
                   swal("Producto Agregado", "", "success");
                    window.setTimeout(function(){location.reload()},1000)
                }else{
                    swal("Hubo un error!", "No se pudo agregar el producto!", "error");
                }
            }            
        });
}


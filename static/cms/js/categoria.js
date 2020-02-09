function new_category(){    
     var url = 'dashboard/categorias/load';
     location.href = site+url;   
}
function edit_category(category_id){    
     var url = 'dashboard/categorias/load/'+category_id;
     location.href = site+url;   
}
function cancel_category(){
	var url= 'dashboard/categorias';
	location.href = site+url;
}
function delete_category(category_id){
    bootbox.confirm({
    message: "¿Confirma que desea eliminar la categoría?",
    buttons: {
        confirm: {
            label: 'Confirmar',
            className: 'btn-success'
        },
        cancel: {
            label: 'Cerrar',
            className: 'btn-danger'
        }
    },
    callback: function () {
         $.ajax({
                   type: "post",
                   url: site+"dashboard/categorias/delete",
                   dataType: "json",
                   data: {category_id : category_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
    }
    });
}

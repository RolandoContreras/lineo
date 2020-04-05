function delete_order(id){
        $.ajax({
            type: "post",
            url: site + "delete_cart",
            dataType: "json",
            data: {id: id},
            success:function(data){            
                if(data.status == "true"){
                    swal("Curso Eliminado", "", "success");             
                    location.reload();
                }
            }            
        });
}
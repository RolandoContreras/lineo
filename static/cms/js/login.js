function login(){
    email = document.getElementById("email").value;
    password = document.getElementById("password").value;
    
        $.ajax({
        type: "post",
        url: "dashboard/validate",
        dataType: "json",
        data: {email: email,
               password: password},
        success:function(data){            
            if (data.message == "false"){                         
                $("#mensaje").html();
                 var texto = "";
                 texto = texto+'<div class="alert alert-danger">';
                 texto = texto+'<p>'+data.print+'</p>';
                 texto = texto+'</div>';                 
                 $("#mensaje").html(texto);
            }else{
                $("#mensaje").html();
                 var texto = "";
                 texto = texto+'<div class="alert alert-success">';
                 texto = texto+'<p>'+data.print+'</p>';
                 texto = texto+'</div>';                 
                 $("#mensaje").html(texto);                     
                 $(location).attr('href',data.url);  
            }
        }            
    });
}
    
    
    
//$(".btn-primary").on("click",function(){
//     email = $("#email").val();
//     password = $("#password").val();     
//     
//    $.ajax({
//        type: "Post",
//        url: "dashboard/validate",
//        dataType: "json",
//        data: {email : email, password:password},
//        success:function(data){            
//            if (data.message == "false"){                         
//                $("#mensaje").html();
//                 var texto = "";
//                 texto = texto+'<div class="alert alert-danger">';
//                 texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
//                 texto = texto+'<p>'+data.print+'</p>';
//                 texto = texto+'</div>';                 
//                 $("#mensaje").html(texto);
//            }else{
//                $("#mensaje").html();
//                 var texto = "";
//                 texto = texto+'<div class="alert alert-success">';
//                 texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
//                 texto = texto+'<p>'+data.print+'</p>';
//                 texto = texto+'</div>';                 
//                 $("#mensaje").html(texto);                     
//                 $(location).attr('href',data.url);  
//            }
//        }            
//    });
//});
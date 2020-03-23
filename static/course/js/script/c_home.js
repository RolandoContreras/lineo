function write_message(video_id){
    var comment = document.getElementById("comment").value;
    if(comment != ""){
        $.ajax({
            type: "post",
            url: site + "plataforma/send_message",
            dataType: "json",
            data: {comment: comment,
                   video_id: video_id},

            success:function(data){            
                if(data.status == "true"){
                    swal("Pregunta Realizado", "Es unos momentos será respodida por el profesor.", "success");
                    location.reload();
                }
            }            
        });
    }else{
       swal("Hubo un error", "No se realizo la pregunta, vuelva a intentar", "error");
    }
}
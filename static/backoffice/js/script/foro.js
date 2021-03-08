function crear_foro() {
    document.getElementById("save_foro").innerHTML = "Procesando..";
    var description = CKEDITOR.instances.description.getData();
    oData = new FormData(document.forms.namedItem("new_foro"));
    oData.append("description", description);
    $.ajax({
        url: site + "backoffice/b_foro/validate",
        method: "POST",
        data: oData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            var res = JSON.parse(data);
            if (res.status == true) {
                //send message
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Cambios Guardados',
                    showConfirmButton: false,
                    timer: 1500
                });
                //reload
                window.setTimeout(function () {
                    window.location = site + "backoffice";
                }, 1500);
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Ups! Sucedio un error ',
                    footer: "Comunicarse con soport"
                });
                document.getElementById("save_blog").innerHTML = "GUARDAR BLOG";
            }
        }
    });
}
function update_description(foro_id) {
    var description = CKEDITOR.instances.description.getData();
    $.ajax({
        type: "post",
        url: site + "backoffice/b_foro/update_description",
        dataType: "json",
        data: {foro_id: foro_id,
               description: description},
        success: function (data) {
            if (data.status == true) {
                return true;
            }
        }
    });
}
function back() {
    var url = 'backoffice';
    location.href = site + url;
}

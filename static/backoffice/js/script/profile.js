function save_information() {
    document.getElementById("profile_buttton").disabled = true;
    document.getElementById("profile_buttton").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    var name = document.getElementById("name").value;
    var last_name = document.getElementById("last_name").value;
    var bio = document.getElementById("bio").value;
    var facebook = document.getElementById("facebook").value;
    var google = document.getElementById("google").value;
    var twitter = document.getElementById("twitter").value;
    var instagram = document.getElementById("instagram").value;
    $.ajax({
        type: "post",
        url: site + "backoffice/perfil/update_data",
        dataType: "json",
        data: {bio: bio,
            name: name,
            last_name: last_name,
            facebook: facebook,
            google: google,
            twitter: twitter,
            instagram: instagram},
        success: function (data) {
            if (data.status == true) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Información Guardada',
                    showConfirmButton: false,
                    timer: 1500
                });
                document.getElementById("profile_buttton").disabled = false;
                document.getElementById("profile_buttton").innerHTML = "GUARDAR INFORMACIÓN";
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Hubo un error',
                    footer: 'Vuelva a intentarlo',
                });
                document.getElementById("profile_buttton").disabled = false;
                document.getElementById("profile_buttton").innerHTML = "GUARDAR INFORMACIÓN";
            }
        }
    });

}

function change_pass() {
    var pass = document.getElementById("pass").value;
    var new_pass = document.getElementById("new_pass").value;
    if (pass == new_pass) {
        $.ajax({
            type: "post",
            url: site + "backoffice/perfil/change_pass",
            dataType: "json",
            data: {pass: pass},
            success: function (data) {
                if (data.status == true) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Contraseña Cambiada',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Hubo un error',
                        footer: 'Consulte al administrador',
                    });
                }
            }
        });
    } else {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Las contraseñas no coinciden',
            footer: 'Ingrese la misma contraseña'
        });
        $("#new_pass").focus();
    }
}
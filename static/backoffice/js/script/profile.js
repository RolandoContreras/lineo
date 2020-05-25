function save_information() {
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
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Hubo un error',
                    footer: 'Vuelva a intentarlo',
                });
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
function crear_cliente() {
    bootbox.confirm({
        message: "¿Confirma que desea crear al nuevo cliente?",
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
        callback: function (result) {
            if (result == true) {
                var email = document.getElementById("email").value;
                var pass = document.getElementById("password").value;
                var name = document.getElementById("name").value;
                var last_name = document.getElementById("last_name").value;
                var phone = document.getElementById("phone").value;
                var country = document.getElementById("country").value;
                if (name == "") {
                    $("#respose").html();
                    var texto = "";
                    texto = texto + '<center>';
                    texto = texto + '<div class="alert alert-danger">';
                    texto = texto + '<p>Ingrese Nombre</p>';
                    texto = texto + '</div>';
                    texto = texto + '</center>';
                    $("#respose").html(texto);
                    $("#name").focus();
                } else if (last_name == "") {
                    $("#respose").html();
                    var texto = "";
                    texto = texto + '<center>';
                    texto = texto + '<div class="alert alert-danger">';
                    texto = texto + '<p>Ingrese Apellidos</p>';
                    texto = texto + '</div>';
                    texto = texto + '</center>';
                    $("#respose").html(texto);
                    $("#last_name").focus();
                } else if (email == "") {
                    $("#respose").html();
                    var texto = "";
                    texto = texto + '<center>';
                    texto = texto + '<div class="alert alert-danger">';
                    texto = texto + '<p>Ingrese E-mail</p>';
                    texto = texto + '</div>';
                    texto = texto + '</center>';
                    $("#respose").html(texto);
                    $("#email").focus();
                } else if (pass == "") {
                    $("#respose").html();
                    var texto = "";
                    texto = texto + '<center>';
                    texto = texto + '<div class="alert alert-danger">';
                    texto = texto + '<p>Ingrese Contraseña</p>';
                    texto = texto + '</div>';
                    texto = texto + '</center>';
                    $("#respose").html(texto);
                    $("#password").focus();
                } else if (phone == "") {
                    $("#respose").html();
                    var texto = "";
                    texto = texto + '<center>';
                    texto = texto + '<div class="alert alert-danger">';
                    texto = texto + '<p>Ingrese Teléfono</p>';
                    texto = texto + '</div>';
                    texto = texto + '</center>';
                    $("#respose").html(texto);
                    $("#phone").focus();
                } else if (country == "") {
                    $("#respose").html();
                    var texto = "";
                    texto = texto + '<center>';
                    texto = texto + '<div class="alert alert-danger">';
                    texto = texto + '<p>Ingrese País</p>';
                    texto = texto + '</div>';
                    texto = texto + '</center>';
                    $("#respose").html(texto);
                    $("#country").focus();
                } else {

                    var email_2 = validar_email(email);
                    if (email_2 == true) {
                        $.ajax({
                            type: "post",
                            url: site + "dashboard/crear_clientes/validate",
                            dataType: "json",
                            data: {name: name,
                                last_name: last_name,
                                email: email,
                                phone: phone,
                                pass: pass,
                                country: country},
                            success: function (data) {
                                if (data.status == "email") {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'El Email ya fue registrado',
                                        footer: 'Ingrese otro Email'
                                    });
                                    $("#email").focus();
                                } else if (data.status == "success") {
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Cliente Creado',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    window.setTimeout(function () {
                                        window.location = site + "dashboard/crear_clientes";
                                    }, 1500);
                                } else {
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Registro Creado',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });

                                }
                            }
                        });
                    } else {
                        $("#respose").html();
                        var texto = "";
                        texto = texto + '<center>';
                        texto = texto + '<div class="alert alert-danger">';
                        texto = texto + '<p>E-mail no es valido</p>';
                        texto = texto + '</div>';
                        texto = texto + '</center>';
                        $("#respose").html(texto);
                        $("#email").focus();
                    }
                }
            }
        }
    });
}

function validar_email(email) {
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}
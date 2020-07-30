$(document).ready(function () {
    
});

$('#atras').on('click', function(e){
    e.preventDefault();
    window.location = '../';
});

$('#perfilForm').submit(function (e) {
    e.preventDefault();
    $.post("../../controller/docente_updateCtrl.php", $(this).serialize())
        .done(function (datos) {
            console.log(datos)
        });
});

$('#perfil').on('click', function (e) {
    e.preventDefault();
    window.location = 'perfil.php';
});

$('#logout').on('click', function (e) {
    e.preventDefault();
    $.post("../../controller/usuario_logoutCtrl.php")
        .done(function () {
            window.location = '../index.php'
        });
});


function cargarMensaje(alumno,docente){
    var memori = "";
    var correo = "";
    $.ajax({
        type: "POST",
        url: "../../controller/solicitud_mensajeCtrl.php",
        data: {alu: alumno, doc: docente}
    }).done(function(datos){
        console.log(datos);
        var datosJSON = datos["datos"];
        var html = '';
        $.each(datosJSON, function(i,value){
            if(value["nombre"] != memori){
                memori = value["nombre"];
                $("#tituloM").append(value["nombre"]);
            }
            if(value["correo"] != correo){
                correo = value["correo"];
                $("#correoAlumno").append(value["correo"]);
            }
            html += '<p class="card-text">'+ value["mensaje"] +'</p>';
        });
        $("#contenidoM").html(html);
    });
}
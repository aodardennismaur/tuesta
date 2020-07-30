$(document).ready(function () {
    cargarDocentes();
});

$('#logout').on('click', function(e){
    e.preventDefault();
    $.post("../../controller/usuario_logoutCtrl.php")
        .done(function(){
            window.location = '../index.php'
        });
});

function cargarDocentes() {
    $.post("../../controller/docente_listarCtrl.php")
        .done(function (rpta) {
            var dataJSON = rpta['datos'];
            var html = "";
            $.each(dataJSON, function (i, item) {
                html += '<div class="col-lg-3 col-xs-6"><div class="small-box bg-aqua"><div class="inner">';
                html += '<h4>' + item.nombre + ' ' + item.apePaterno + ' ' + item.apeMaterno + '</h4>';
                html += '<p>'+ item.correo +'</p>';
                html += '</div><button type="button" class="btn btn-block btn-primary" onclick="detalleDocente('+ item.id +')">Solicitar Asesoria</button></div></div>';
            });
            $('#lista').html(html);
        });
}

function detalleDocente(id){
    window.location = 'docente-detalle.php?id='+ id +'';
}
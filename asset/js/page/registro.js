$(document).ready(function () {
    cargaTipoUsuario();

    $('#FormDataUsuario').submit(function(e){
        e.preventDefault();
        $.post("controller/usuario_registroCtrl.php", $(this).serialize())
            .done(function(rpta){
                var dataJSON = rpta['datos'];
                if (dataJSON['estado'] == '0'){
                    limpiar();
                    window.location = 'index.php';
                }else if(dataJSON['estado'] == '-1'){
                    alert('Usuario existente');
                }
            });
    });

    $('#atras').on('click', function(){
        window.location = 'index.php';
    });
});

function cargaTipoUsuario() {
    $.post("controller/tipoUsuarioCtrl.php")
        .done(function ($resultado) {
            var data = $resultado['datos'];
            var html = "";
            html += '<option value="0">Seleccionar</option>';
            $.each(data, function(i,item){
                html += '<option value="' + item.id +'">'+ item.nombre +'</option>'
            });
            $('#tipo').html(html);
        });
}

function limpiar(){
    $('#tipo').val("0");
    $('#nombre').val("");
    $('#apePaterno').val("");
    $('#apeMaterno').val("");
    $('#usuario').val("");
    $('#clave').val("");
}
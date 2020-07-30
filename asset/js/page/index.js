$(document).ready(function(){

});

$("#registro").on('click', function(){
    window.location = 'registro.html';
});

$('#loginForm').submit(function(e){
    e.preventDefault();
    var usuario = $('#usuario').val();
    var clave = $('#clave').val();

    if(usuario == "" || clave == ""){
        alert('Campos Vacios');
        return;
    }

    $.post("controller/usuario_loginCtrl.php",{
        usu: usuario,
        cla: clave
    }).done(function(data){
        if(data == 1){
            window.location = 'sistema/index.php'
        }else{
            alert('Usuario no se encuentra registrado');
        }
    });

});
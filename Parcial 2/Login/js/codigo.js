$(document).ready(function () {
    
//$('.container h1').html('cambio de texto');
//$('.container h1:first').html('cambio de texto');
//$('.container h1:last').html('cambio de texto');



$('.btn-primary').click(function (e) { 
    e.preventDefault();
    var resultado = $('#mnj a')
    var usuario=$('#usuario').val();
    var pass=$('#password').val();
   
    console.log(usuario,pass)
    if(usuario=='usuario' && pass=='1234')
    {
        resultado.html('Haga click aqui y ¡Gracias, pase usted!')
        resultado.attr("href", "https://www.leagueofgraphs.com/es/summoner/lan/HexAztka");
    }
    else{
        alert('No esta registrado');
    }

    
});

});
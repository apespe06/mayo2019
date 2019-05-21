<!DOCTYPE html>
<html>
<meta charset="utf-8">
<?php
include('header.php');

?>


<script src="js/jquery.min.js"></script>
    
<script>




$(document).ready(function() {
    $("#resultadoBusqueda").html('');
    });



function buscar() {
    var textoBusqueda = $("input#busqueda").val();
    console.log(textoBusqueda);
        if (textoBusqueda != "") {
        $.post("buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            if(mensaje.length > 317){
                $("#resultadoBusqueda").append(mensaje);
            }
            else{
                $("#resultadoBusqueda").html("AFILIACION NO ENCONTRADA");
            }  
        }); 
    } else { 
        $("#resultadoBusqueda").html('INGRESAR AFILIACION');
	};
};

function buscar2() {
    var nombre = $("input#nom").val();
     var paterno = $("input#pate").val();
      var materno = $("input#mate").val();
    console.log(nombre);
    console.log(paterno);
    console.log(materno);
        if (nombre != "" || paterno !="" || materno!="") {
        $.post("buscar2.php", {nom: nombre.toUpperCase(), pater: paterno.toUpperCase(), mater: materno.toUpperCase()}, function(mensaje) {
            if(mensaje.length > 317){
                $("#resultadoBusqueda").html(mensaje);
            }
            else{
                $("#resultadoBusqueda").html("NO VIGENTE, REPORTARLO AL DEPARTAMENTO DE VIGENCIA");
            }            
        }); 
    } else { 
        $("#resultadoBusqueda").html('LLENAR AL MENOS UN CAMPO');
	};
};

function valor_celda(celda){
    var variable = celda.innerHTML;
    console.log(variable);
}

window.onload = function(){
    var tags_td = new Array();
    var tags_td=document.getElementsByTagName('td');
    for(i=0; i<tags_td.length; i++){
        if(tags_td[i].addEventListener){
            tags_td[i].addEventListener("click",function (){valor_celda(this)},false);

        }
        else{
            if(tags_td[i].attachEvent){
                tags_td[i].attachEvent('onclick',function(){valor_celda(this)},false);
            }
        }
    }
}

$(".botonVer").click(function() {
        console.log("1");

});
</script>

<body>  



<div id = "cuadrop">
<form accept-charset="utf-8" method="POST">
<h2>Educandos</h2>


<br><label>Buscar</label><input type="text" name="busqueda" id="busqueda" value="" placeholder="Buscar por afiliacion" maxlength="30"/>
<input type="button	" class="button2" onclick="buscar();" value="Buscar">

<br><br><h3>Para buscar por el nombre de un participante llene por lo menos uno de los campos de abajo.</h3>

<br><label>Buscar</label><input type="text" name="nom" id="nom" value="" placeholder="Nombre" maxlength="30" autocomplete="off"/>
<input type="text" name="pate" id="pate" value="" placeholder="Paterno" maxlength="30" autocomplete="off"/>
<input type="text" name="mate" id="mate" value="" placeholder="Materno" maxlength="30" autocomplete="off"/>
<input type="button " class="button2" onclick="buscar2();" value="Buscar">
</form>
</div>




<div id="resultadoBusqueda"></div>

<footer></footer>

</body>
</html>
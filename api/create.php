<?php
 
//include("../Modales/prueba1.php");
//require_once 'conexion.php';
//$db = Conectar();

$db = mysqli_connect("localhost","root","");
mysqli_select_db($db,"preliminar");

$nombre = $_POST['nom'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$rfc = $_POST['rfc'];
$fech = $_POST['datepick'];
$micro = $_POST['micro'];
$etapa = $_POST['etapa'];


 if ($_FILES['fot1']['error']===4) {
	die('Es necesario establecer una imagen');
 }else if ($_FILES['fot1']['error']===0) {

$imagenBinaria1 = addslashes(file_get_contents($_FILES['fot1']['tmp_name']));
$imagenBinaria2 = addslashes(file_get_contents($_FILES['fot2']['tmp_name']));
$imagenBinaria3 = addslashes(file_get_contents($_FILES['fot3']['tmp_name']));
$imagenBinaria4 = addslashes(file_get_contents($_FILES['fot4']['tmp_name']));



$res1  =mysqli_query($db ,"INSERT INTO EDUCANDO(RFC, NOMBRE, PATERNO, MATERNO, fechaRegistro, MICROREGION, ETAPA) VALUES(
	'".$rfc."','".$nombre."','".$paterno."','".$materno."','".$fech."','".$micro."','".$etapa."')");

$res2  =mysqli_query($db ,"INSERT INTO expediente(RFC, FOTO, REGISTROA, REGISTROR, ACTA) VALUES(
	'".$rfc."','".$imagenBinaria1."','".$imagenBinaria2."','".$imagenBinaria3."','".$imagenBinaria4."')");

//$result = mysqli_query($res);
//$var =  mysqli_affected_rows($conex);
	if($res1 == "1")
	{
		//$data = mysqli_fetch_array($result);
		echo "1";

	}else{
		echo "2";
	}



 }


 

?>



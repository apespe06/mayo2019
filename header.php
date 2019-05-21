<?php
session_start();

if(!isset($_SESSION['user'])){
header("location:index.php");}
else
{
	//echo $_SESSION['user'];
}
?>

<!DOCTYPE html>
<html>

<title>Digitaliza Documentos</title>
<link rel="stylesheet" href="css/estilo.css">
<link rel="stylesheet" type="text/css" href="css/fontello.css">
<body>


<header>
	<div id = "contenedor">
	<img src="imgs/imagen2.jpg" align="left">

	<?php
	echo '<h3 > Bienvenido:  ' .$_SESSION["user"].'<a href="index.php"> Salir </a></h3>';

	?>	
	</div>
	
	
	
</header>

<div id="menu">
<ul>
	<li><a class="icon-upload contenedor" href="nexpediente.php">Nuevo Expediente</a></li>
	<li><a class="icon-search-1 contenedor" href="bexpediente.php">Buscar Expediente</a></li>

</ul>
</div>
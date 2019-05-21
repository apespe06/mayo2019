<style type="text/css">
.table table, td, th {
    border: 1px solid #39555E;
    text-align: left;
    width: 95px;
    height: 5px;
}

table {

  background: #C9E9F3;
  border-collapse: collapse;
  margin-left: 25px;
  width: 75%;
  margin-top: 110px;
}

.table th, td {
    padding: 10px;
}
</style>	
<?php		
	$ap=$_POST['valorBusqueda'];	
	$mensaje="";	

	$db = mysqli_connect("localhost","root","");
    mysqli_select_db($db,"preliminar");

	$resultado = mysqli_query($db,"select RFC, NOMBRE, PATERNO, MATERNO from EDUCANDO where RFC ='$ap' ");

	if($resultado != false){
	//no es necesario
	//$resultado=mysqli_query($link,"select nombre,paterno from paciente where nombre like '%$ap%'");
		while($row=mysqli_fetch_array($resultado))
		{

			$nombre = $row['NOMBRE'];
				$paterno = $row['PATERNO'];
				$materno = $row['MATERNO'];

			//$afil=trim($afiliacion);
      			$nom=trim($nombre);
      			$pa=trim($paterno);
      			$ma=trim($materno);

      			//$bot="botonVer";
      			//$but="button";
      			//$btn="btn btn-primary btn-md";
      			//$myb="myBtnV";<td class='$bot'> <button type='$but' class='$btn' id='$myb'>Ver</button> </td>
			//Output
			$mensaje="<table>
						<tr>
						<td><a href='educando.php?var={$ap}'>$ap</a></td>
						<td>$nom</td>
						<td>$pa</td>
						<td>$ma</td>
						
						</table>";
		   }
		
	}
	else
		{
			$mensaje="No se encontro Afiliacion. Reportar a vigencias de Derecho";
		}
	//Devolvemos el mensaje que tomará jQuery
	echo $mensaje;
?>
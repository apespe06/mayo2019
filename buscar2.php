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
}

.table th, td {
    padding: 10px;
}
</style>	
<?php	
	$n=$_POST['nom'];
	$p=$_POST['pater'];	
	$m=$_POST['mater'];		
	$mensaje="";

	require_once 'conexion.php';
	$db = Conectar();

	if($n != "" && $p == "" && $m ==""){
		$resultado = mysqli_query($db,"select RFC, NOMBRE, PATERNO, MATERNO from EDUCANDO where NOMBRE like '%$n%'");
	}

	if($n == "" && $p != "" && $m ==""){
		$resultado= mysqli_query($db,"select RFC, NOMBRE, PATERNO, MATERNO from EDUCANDO where PATERNO = '$p'");
	}

	if($n == "" && $p == "" && $m !=""){
		$resultado= mysqli_query($db,"select RFC, NOMBRE, PATERNO, MATERNO from EDUCANDO where MATERNO = '$m'");
	}

	if($n != "" && $p != "" && $m ==""){
		$resultado= mysqli_query($db,"select RFC, NOMBRE, PATERNO, MATERNO from EDUCANDO where NOMBRE like '%$n%' AND PATERNO = '$p'");
	}

	if($n != "" && $p == "" && $m !=""){
		$resultado= mysqli_query($db,"select RFC, NOMBRE, PATERNO, MATERNO from EDUCANDO where NOMBRE like '%$n%' AND MATERNO = '$m'");
	}

	if($n == "" && $p != "" && $m !=""){
		$resultado= mysqli_query($db,"select RFC, NOMBRE, PATERNO, MATERNO from EDUCANDO where PATERNO ='$p' AND MATERNO = '$m'");
	}

	if($n != "" && $p != "" && $m !=""){
		$resultado= mysqli_query($db,"select RFC, NOMBRE, PATERNO, MATERNO from EDUCANDO where NOMBRE like '%$n%' AND PATERNO = '$p' AND MATERNO = '$m'");
	}

	//oci_execute($resultado);

	//$filas = oci_num_rows($resultado);
	//echo "$filas";
	if($resultado != false){
	//no es necesario
	//$resultado=mysql_query($link,"select nombre,PATERNO from paciente where nombre like '%$ap%'");
	
	    while($row = mysqli_fetch_array($resultado))
			{
				$rfc = $row['RFC'];			
				$nombre = $row['NOMBRE'];
				$paterno = $row['PATERNO'];
				$materno = $row['MATERNO'];

				//$afil=trim($afiliacion);
      			//$nom=trim($nombre);
      			//$pa=trim($paterno);
      			//$ma=trim($materno);
			//Output
			$mensaje.="<table>
						<tr>
						<td><a href='educando.php?var={$rfc}'>$rfc</a></td>
						<td>$nombre</td>
						<td>$paterno</td>
						<td>$materno</td>
						</tr>
						</table>";
		   }
		}
		else
			{$mensaje="Sin resultados de Busqueda";}
	
//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>
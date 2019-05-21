<?php 
session_start();
$login=$_POST['usuario'];
$clavemedico =$_POST['passwd'];

echo "Usuario $login<br>";
echo "Contraseña $clavemedico<br>";

require_once 'conexion.php';
$db = Conectar();

    $resultado =  mysqli_query ($db,"select LOGIN, PASSWD, NOMBRE from USUARIO where LOGIN = '$login'");
    if($row = mysqli_fetch_array($resultado)) {   
		if($row['PASSWD'] == $clavemedico)
		{
			echo "Medico Logeado Correctamente";
			$_SESSION['user'] = $row['NOMBRE'];
			$_SESSION['clave'] = $clavemedico;
			header("Location:principal.php?clavemedico=$clavemedico");
    	}
    else
   		header("Location:errorP.php");
   		
   	}
	    else{
		    	header("Location:errorL.php");
		    } 

?>


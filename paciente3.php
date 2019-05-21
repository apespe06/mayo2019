<?php  
/*ARCHIVO QUE LLENA EL MODAL DE CLIENTES*/
include('header.php');
$db = mysqli_connect("localhost","root","");
mysqli_select_db($db,"preliminar");

$var = 'aape930117331';

if($var!="")
{


//$query = "SELECT * FROM expediente where rfc = '".$var."' ";
//SELECT * FROM cliente WHERE id_cli = 1 -> id_cli,nombre,apellidos,nick,direccion,celular,correo,rfc,fechaInicio,foto

$resultado = mysqli_query($db,"select RFC, FOTO    
        FROM EXPEDIENTE
      WHERE RFC = '$var' ");

$response = array();

if($resultado) {
//     $formulario = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
  $response = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
}
  
//CODIGO DE PRUEBA PARA AGREGAR CAMPOS AL OBJETO JSON 
//$response['query'] = $query;
$response['FOTO'] = base64_encode($response['FOTO']);


echo json_encode($response);
//foreach ($formulario as $key ) {
//
  //echo "<br> $key";
//}
}else{
  $response['status'] = 200;
  $response['message'] = "Invalid Request!";
  echo json_encode($response);
  }
//echo "$response";


?>
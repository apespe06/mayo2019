<?php
include('header.php');
include('menu.php');
require_once 'conexion.php';
$var=$_SESSION['paciente'];
$med=$_SESSION['clave'];
$db = Conectar();
?>
<section class="recuadro">
	<h3>SOLICITUD DE REFERENCIA</h3>
	<!--<form action="greferencia.php" method="post">-->
	<form action=" " method="post">
		
	<div class="cuadro1">
	<h2>Paciente</h2>
	<?php
	

		$resultado = oci_parse($db,"SELECT A.AFILIACIONANTERIOR, 
			A.NOAFILIACION,
		    A.NOMBRE, 
		    A.PATERNO, 
		    A.MATERNO, 		    
		    A.CLAVETIPOPACIENTE, 
			B.CLAVETIPOPACIENTE,
			B.DESCRIPCION
			FROM medidba.v_pacientefor A, medidba.v_ktipopaciente B
			WHERE A.AFILIACIONANTERIOR = '$var' OR A.NOAFILIACION = '$var'
			AND B.CLAVETIPOPACIENTE = A.CLAVETIPOPACIENTE");
		oci_execute($resultado);

		if($row=oci_fetch_array($resultado, OCI_BOTH + OCI_ASSOC))
		{
			$nafil=$row['NOAFILIACION'];
			$afila=$row['AFILIACIONANTERIOR'];
			$nom= $row['NOMBRE'];
			$p= $row['PATERNO'];
			$m= $row['MATERNO'];
			$tpaciente = $row['DESCRIPCION'];
			echo "<label>Afiliacion Nueva: $nafil</label>";
			echo "<br><label>Afiliacion Anterior: $afila</label>";
			echo "<br><label>Paciente: $nom$p$m</label>";
			echo "<br><label>Tipo Paciente: $tpaciente</label>";
					
		}
	?>
	
	</div>

	<!--<div class="cuadro2">
		<h2>Resumen Clinico</h2>

	<?php
	//$id = oci_parse($db,"select * from nmedica");
	//oci_execute($id);
	//$filas = mysqli_num_rows($id);

	//$resultado = $db->query("select DIAGNOSTICO, NOTA from nmedica where id_nmedica = '$filas' ");
	//if($row = mysqli_fetch_array($resultado)){
	//	$diagnostico = $row['DIAGNOSTICO'];
	//	$nota = $row['NOTA'];

	//	echo"<label>Diagnostico: $diagnostico</label>";
	//	echo "<br><label>Nota Medica: $nota</label>";
	//}

	?>
	</div>-->



	<div class="datos">
	<h3>Datos de la referencia programada al hospital de especialidades</h3>

	<?php
	$resultado= oci_parse($db,"select A.CLAVEUNIDADMEDICA, B.DESCRIPCION AS DES1, C.DESCRIPCION AS DES2, C.CLAVETIPOUNIDAD, D.DESCRIPCION AS DES3
		from medidba.v_trabajador A, medidba.v_kservicio B, medidba.v_kunidadmedicafor C, medidba.v_ktipounidadmedica D
		where A.CLAVEMEDICO = '$med'
		AND B.CLAVESERVICIO = A.CLAVESERVICIO
		AND C.CLAVEUNIDADMEDICA = A.CLAVEUNIDADMEDICA
		AND D.CLAVETIPOUNIDAD = C.CLAVETIPOUNIDAD");

		oci_execute($resultado);

		while($row=oci_fetch_array($resultado, OCI_BOTH))
		{						
			$d3 = $row['DES3'];
			echo "<br><label>De Unidad Medica: $d3</label>";
		}		
	?>
	<br>
	<label>Para: </label>
	<SELECT NAME="destino">
   	<OPTION VALUE="he" SELECTED><label>HOSPITAL DE ESPECIALIDADES</label>
   	<OPTION VALUE="umf"><label>UNIDAD MEDICA FAMILIAR</label>   
	</SELECT>

	<br>
	<label>Servicio</label>
	<select name = "servicio">
    <?PHP
		$resultado = oci_parse($db,"select CLAVESERVICIO, DESCRIPCION  from medidba.v_kservicio");
		oci_execute($resultado);
		while($row=oci_fetch_array($resultado, OCI_BOTH))
		{
		echo '<option value="<label>'.$row[CLAVESERVICIO].'">'.$row[DESCRIPCION].'</label></option>';
		}
		
	?>
</select>


	</div>

	<input type="submit" class="boton" value="Registrar">

</form>
</section>

<?php
include('footer.php');
?>
<?php
include('header.php');

$db = mysqli_connect("localhost","root","");
mysqli_select_db($db,"preliminar");
?>
  <meta charset="utf-8">
  
<div id = "cuadrop">
<h2>Datos Educando</h2><hr>

<?php	
	
		$ap=$_GET['var'];
		$_SESSION['paciente'] = $ap;
		date_default_timezone_set('UTC');

			$resultado = mysqli_query($db,"select A.*, B.*    
		   	FROM EDUCANDO as A, EXPEDIENTE AS B
			WHERE A.RFC = '$ap' && B.RFC ='$ap' ");

		if($resultado != false){			
			while($row=$resultado->fetch_array(MYSQLI_ASSOC))
			{	
		
			$rfc=$row['RFC'];
			$nom= $row['NOMBRE'];
			$p= $row['PATERNO'];
			$m= $row['MATERNO'];
			$fecha =$row['fechaRegistro'];
			$mr = $row['MICROREGION'];
			$etapa = $row['ETAPA'];

			$img1 = base64_encode($row['FOTO']);
			$img2 = base64_encode($row['REGISTROA']);
			$img3 = base64_encode($row['REGISTROR']);
			$img4 = base64_encode($row['ACTA']);
			$img5 = base64_encode($row['CURP']);

			//echo "rfc: $rfc";
			//echo "<br>EDUCANDO: $nom $p $m <br>";
			
			}
		}
		else
			echo "<br>Paciente nada:";
	?>
		
		<br><label>RFC: </label><input type="text" name="RFC" value= "<?php echo "$rfc"; ?> " />

		<br><label>NOMBRE EDUCANDO: </label><input type="text" name="NAME" value= "<?php echo "$nom $p $m"; ?> " />

		<br><label>FECHA REGISTRO: </label><input type="text" name="FECHA" value= "<?php echo "$fecha" ?> " />

		<br><label>MICROREGION: </label><input type="text" name="MR" value= "<?php echo "$mr" ?> " />

		<br><label>ETAPA: </label><input type="text" name="ETAPA" value= "<?php echo "$etapa" ?> " /><br><br><br>


	  <?php
		   echo "<img width=170 height=220 src='data:image/png;base64, $img1'/>" ; 
		   echo ".....";

			echo "<img width=170 height=220 src='data:image/png;base64, $img2'/>" ;
			echo ".....";
			echo "<img width=170 height=220 src='data:image/png;base64, $img3'/>" ;
			echo ".....";
			echo "<img width=170 height=220 src='data:image/png;base64, $img4'/>" ;
			echo ".....";
			echo "<img width=170 height=220 alt='SIN DOCUMENTO CURP' src='data:image/png;base64, $img5'/>" ;

		  ?>

</div>




</body>
</html>

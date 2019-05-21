<?php
include('header.php');
?>
  
<div id = "contenido">
	<!DOCTYPE html>
	<html>
	<head>
  		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">

  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  		<!-- PRUEBAS TOAST  -->
  		<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

		<!-- PRUEBAS TOAST  -->
    	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  	<style type="text/css">
    #GContent{
      margin-top: 2em;
    }
  	</style>

	</head>

<body>

  <p id="demo"></p>	
    <div id="GContent" class="container">
      
        <form accept-charset="utf-8" id="enviaDatos" enctype="multipart/form-data">
          <fieldset>
            <legend> Ingrese datos del educando </legend>
        <br>
        
        <div class="form-group col-md-4">
           <label for="nom"> Nombre(s):</label>
           <input type="text" name="nom" id="nom" placeholder="Nombre" class="form-control">      
        </div>
        

        <div class="form-group col-md-4">
           <label for="paterno"> Apellido Paterno :</label>
           <input type="text" name="paterno" id="paterno" placeholder="Apellidos" class="form-control">
        </div> 
        

        <div class="form-group col-md-4">
           <label for="materno"> Apellido Materno: </label>
           <input type="text" name="materno" id="materno" placeholder="Ingrese NickName" class="form-control">
        </div>
                
        <br>
    	<div class="form-group col-md-4">
           <label for="rfc"> RFC:</label>
           <input type="text" name="rfc" id="rfc" placeholder="Ingrese RFC" class="form-control">
        </div>
    	  
        <div class="form-group col-md-4">
           <label for="datepick"> Fecha de Registro </label>
            <input type="date" name="datepick" id="datepick" value="<?php echo date('Y-m-d'); ?>" class="form-control">
        </div>
        

        <div class="form-group col-md-2">
           <label for="micro"> MicroRegion: </label>
          	<br>
          	<SELECT NAME="micro" class="form-control">
   			<OPTION VALUE="14.01 Amalucan">14.01 Amalucan
   			<OPTION VALUE="14.02 Barrio El Alto ">14.02 Barrio El Alto  		
   			<OPTION VALUE="14.03 La Libertad">14.03 La Libertad
   			<OPTION VALUE="14.04 San Miguel">14.04 San Miguel
   			<OPTION VALUE="14.05 Santiago">14.05 Santiago

			</SELECT>
        </div>
        

        <div class="form-group col-md-2">
           <label for="etapa"> Etapa: </label>
          	<br>
          	<SELECT NAME="etapa" class="form-control">
   			<OPTION VALUE="inicial">INICIAL
   			<OPTION VALUE="intermedio">INTERMEDIO  		
   			<OPTION VALUE="avanzado">AVANZADO
   			</SELECT>
        </div>
        <br>    
       
        <div class="form-group col-md-3">
            <label for="fot1"> Foto</label>
            <input type="file" name="fot1" id="fot" class="btn-info">
        </div>
         
        <div class="form-group col-md-3">
            <label for="fot2"> Registro Anverso:</label>
            <input type="file" name="fot2" id="fot" class="btn-info">
        </div>
                  
        <div class="form-group col-md-3">
            <label for="fot3"> Registro Reverso:</label>
            <input type="file" name="fot3" id="fot" class="btn-info">
        </div>
                    
         <div class="form-group col-md-3">
            <label for="fot4"> ACTA DE NACIMIENTO:</label>
            <input type="file" name="fot4" id="fot" class="btn-info">
        </div>

        <div class="form-group">
            <button type="submit"> ENVIAR </button>          
        </div>
      
        </fieldset>
        </form>
      </div>
  
 <script type="text/javascript">

  $('#enviaDatos').on("submit",function(e){
    e.preventDefault();

    var formData = new FormData(document.getElementById("enviaDatos"));

    console.log(formData);

    $.ajax({
      url: "api/create.php",
      type: "POST",
      datatype: "HTML",
      data: formData,
      cache: false,
      contentType: false,
      processData: false
    }).done(function(data){
      $("#resultadoBusqueda").html(data);
        if (data ==1 ) {
          toastr.success(' (y)', 'DATOS INSERTADOS', {timeOut: 5000});
        }else{
          $('#res').html("Ha ocurrido un error.");
          $('#res').css('color','red');
        }
    })
  });  

</script>
</body>
</html>
</div>

<?php include('footer.php');?>


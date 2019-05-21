<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="utf-8">
    <title>Digitaliza tus documentos</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Acme|Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <style type="text/css">

        header {
            /*background: red;
            width: auto;
            height: 150px;  
            margin: 5px 150px 5px 150px;
            padding: 10px;*/
            position: fixed;
    width: 100%;
    background: #FF5729;/*#558391  #1195A8 #AA1611 */ 
    z-index: 1;
    margin:1;
    top: 0;
    left: 0;
        }

        /*img {
            width: auto;
            float: left;
        }*/

        img{
display:block;
margin:auto;
}

        h1{
            text-align: center;
            color: white;
            font-family: 'Raleway', sans-serif;
            font-size: 32px;
        }      

        div.derecho{
            background: rgba(228,239,241,0.5);
            float: left;
            height: 310px;
            margin-left: 50px;
            margin-top: 100px;
            width: 50%;
        }

        div.izquiero{
            background: rgba(228,239,241,0.5);
            float: left;
            height: 310px;
            margin-top: 100px;
            padding: 30px 100px;
            width: 35%;
        }

  label{
    color:red;
}

.form-input {
    display: block;
    width: 150px;
    height: 15px;
    margin-bottom: 15px;
    color: #000;
    background-color: #f8f6d4;
    border: 1px solid #999;
    box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.7), 0 1px 0 rgba(255, 255, 255, 0.1);
    -moz-transition: all 0.4s ease-in-out;
    -webkit-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out;
    -ms-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
    behavior: url(PIE.htc);
    font-family: "Century Gothic";
    font-size: 14px;
    padding-top: 5px;
    padding-right: 5px;
    padding-bottom: 5px;
    padding-left: 1px;
}


h2{
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    padding: 5px 5px;

    }

    h2.center{
  text-align: center;
}

    </style>
</head>
<body>
    <header>
     
       
        <h1>
            Digitalización de Documentos
        </h1>
    </header>

    <div class="derecho">
    <h2 class="center"> Inicie sesion para almacenar documentos digitales</h2>
     <img width=400 height=230 src="imgs/imagen1.jpg "/>
    </div>

    <div class="izquiero">
        <form action = "valida2.php" method = "post">

        <div class="form-group">
        <label for ="usuario">Usuario :</label>
        <input type = "text" name = "usuario" class="form-control" required />
        </div>


        <div class="form-group">
        <label for="passwd">Contraseña : </label>
        <input type = "password" name = "passwd" class="form-control" required />
        
        </div>
        <label>El nombre de usuario es incorrecto</label><br><br>
        <!--<input type = "submit" name = "Aceptar" value = "Enviar" />-->
        <div class="form-group">
                            <input type="submit" name="aceptar"  value="Enviar" class="btn btn-success">
                        </div>
        </form>
    </div>
       
</body>
</html>
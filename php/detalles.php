<?php 
include("conexion.php");
error_reporting(E_ALL ^ E_NOTICE);
$id = $_POST["id"];
$email = $_POST["email"];
 ?>
 <!doctype html>
 <html lang="es-ES">
 <head>
 	<meta charset="UTF-8">
 	<title></title>
 	  <link rel="stylesheet" href="../css/Style.css">
       <link rel="stylesheet" href="../css/StyleForm.css">
 </head>
 <body>
 	<header>
        <img src="../img/administrador.png" id="img"/>
    </header>
     <nav>
     	<center>
     		<form action="eliminar.php" method="post" id="eliminar">
     			<input type="hidden" value="<?php echo $id; ?>" name="id">
                <input type="hidden" value="<?php echo $email; ?>" name="email">
     			<input class="button" value="Eliminar" name="eliminar" type="submit">
     		</form>
     	</center>
     </nav>
     <section id="contenedor">
     	<center>
     		<div class="contenedor">
     			<?php 
                  //Consulta a la base de datos a la tabla datos
     			$consulta = mysql_query("SELECT * FROM datos WHERE id='$id' || email = '$email'");
     			//while que recore todos los datos de la tabla datos
     			while ($filas=mysql_fetch_array($consulta)) {
     				$id =$filas["id"];
     				$imagen=$filas['imagen'];
     				$nombre =$filas["nombre"];
     				$apellido =$filas["apellido"];
     				$sexo =$filas["sexo"];
     				$telcel =$filas["telcel"];
     				$email =$filas["email"];
     				$fecha =$filas["fecha"];
     				$profesion =$filas["profecion"];
     			}
                
     			 ?>
     			 <center>
     			 	<div class="cajaSola">
     			 		<h4><?php echo $nombre; ?></h4>
     			 		<img src="<?php echo "../fotos/".$imagen; ?>" width="280" height="250" alt="">
     			 	</div>

     			 	<div class="cajaDes">
     			 		<h3>Descripción</h3>
     			 		<h4><?php echo "Nombre: ".$nombre; ?></h4>
     			 		<h4><?php echo "Apellido: ".$apellido; ?></h4>
     			 		<h4><?php echo "Sexo: ".$sexo; ?></h4>
     			 		<h4><?php echo "Tel/Cel: ".$telcel; ?></h4>
     			 		<h4><?php echo "Email: ".$email; ?></h4>
     			 		<h4><?php echo "Fecha: ".$fecha; ?></h4>
     			 		<h4><?php echo "Profesion: ".$profesion; ?></h4>

     			 		<form action="edicion.php" method="post">
     			 			<input value ="<?php echo $id; ?>" name= "id" type="hidden">
     			 			<input value ="<?php echo $imagen; ?>" name= "imagen" type="hidden">
     			 			<input value ="<?php echo $nombre; ?>" name= "nombre" type="hidden">
     			 			<input value ="<?php echo $apellido; ?>" name= "apellido" type="hidden">
     			 			<input value ="<?php echo $sexo; ?>" name= "sexo" type="hidden">
     			 			<input value ="<?php echo $telcel; ?>" name= "telcel" type="hidden">
     			 			<input value ="<?php echo $email; ?>" name= "email" type="hidden">
     			 			<input value ="<?php echo $fecha; ?>" name= "fecha" type="hidden">
     			 			<input value ="<?php echo $profesion; ?>" name= "profesion" type="hidden">
     			 			<center>
                                <input class="button" value="Editar" name="editar" type="submit">
                            </center>

     			 		</form>
     			 	</div>
     			 </center>
     		</div>
               <a href="javascript:window.history.back();">&laquo; Volver atrás</a>
             </center>
     </section>
     <footer>
        <p>&copy;Programadores HN</p>
     </footer>
 </body>
 </html>
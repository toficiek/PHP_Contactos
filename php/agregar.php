<!DOCTYPE HTML>
<html lang="es-ES">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/Style.css">
	<link rel="stylesheet" href="../css/StyleForm.css">
	<title></title>
</head>
<body>
	<header>
		<img src="../img/administrador.png" id="img"/>
	</header>
	<section id="contenedor">
		<form action="insertar.php" id="form"method="post" enctype="multipart/form-data">
			<center>
				
     <fieldset>
		<div class="archivo">
			<label for="imagen"><h4>+ Nueva Foto </h4></label>
			<input type="file" id="imagen" name="imagen" />
		</div>
		<div>
		    <label for="nombre">Nombre:</label>
		    <input type="text" id="nombre" class="text" name="nombre"  required/>
		</div>
		<div>
		    <label for="apellido">Apellido:</label>
		    <input type="text" id="apellido" class="text" name="apellido" required/>
		</div>
		<div>
		    <label for="telcel">Tel/Cel:</label>&nbsp;&nbsp;
		    <input type="text" id="telcel" class="text" name="telcel"  required/>
		</div>
		<div>
		    <label for="email">Email:</label>&nbsp;&nbsp;&nbsp;&nbsp;
		    <input type="email" id="email" class="text" name="email"  required/>
		</div> 
		<div>
		    <label for="profecion">Profecion:</label>
		    <input type="text" id="profesion" class="text" name="profesion"  required/>
		</div>
		<div>
		    <label for="m">Sexo:</label>&nbsp;&nbsp;
		    <input type="radio" id="m" class="cambio" name="sexo"  title="Tu sexo" value="Masculino" required/>&nbsp;<label for="m">Masculino</label>
		    &nbsp;
		    <input type="radio" id="f" class="cambio" name="sexo"  title="Tu sexo" value="Femenino" required/>&nbsp;<label for="f">Femenino</label>
		</div>
		<div>
		    <label for="fecha">Fecha:</label>
		    <input type="date" id="fecha" class="text" name="fecha"  />
		</div>
		
		<div>
			<input type="submit" id="enviar-alta" class="button" name="enviar" value="Agregar"/>
		</div>
	    <?php
        if (isset($_GET["mensaje"])) {
 	        $mensaje = $_GET["mensaje"];
 	        echo "<br/><span class='mensaje'>$mensaje</span><br/>";
        } 
        ?>
	</fieldset>
	<a href="javascript:window.history.back();">&laquo; Volver atrás</a>  
</center>
</form>
		   
	</section>
	<footer>
	 <p>&copy;AJ Programer</p>
	</footer>
</body>
</html>

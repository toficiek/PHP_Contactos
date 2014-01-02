
<?php
include ('conexion.php');

$usuarioIng=$_POST['user'];
$passIng=$_POST['pass'];

$consulta=mysql_query("SELECT * FROM login");
 //El mysql_fetch_array () devuelve los registros de la tabla usuarios
 $filas=mysql_fetch_array($consulta);
	 
	//$id=$filas['id'];
     $nombre=$filas['nombre'];
     $usuario=$filas['usuario'];
     $pass=$filas['pass'];
  

if ($_POST['user']==$usuario && $_POST['pass']==$pass) {
	# code...
	//Inicio la Seción
	session_start();
	//Declaro mis variables de sesión
	$_SESSION["autentificado"] = true;
	$_SESSION["usuario"] = $_POST['user'];

	header("Location: buscardatos.php");
}else{
	header("Location: ../index.php?error=no");

}

 ?>
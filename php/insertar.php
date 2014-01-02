
<?php 
/*Capturamos los valores que vienen del formulario que esta en el archivo agragar.php*/
    $imagen=$_POST['imagen'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $sexo=$_POST["sexo"];
    $telcel=$_POST['telcel'];
    $email=$_POST['email'];
    $fecha=$_POST['fecha'];
    $profesion = $_POST["profesion"];
echo $apellido;
//Dependiendo el sexo que se elija colocamos una imagen predeterminada 
$imagen_default = ($sexo=="Masculino")?"masculino.png":"femenina.png";

/* Comprobamos que no exista el email del nuevo usuario que se va agregar en la base de datos */
include("conexion.php");
$consulta = mysql_query ("SELECT * FROM datos WHERE email='$email'");
//Condicion que evalua la variable $consulta
if (mysql_num_rows ($consulta) == 0) {

    //Funcion que carga la imagen
    include("funciones-img.php");
    $tipo = $_FILES["imagen"]["type"];
    $archivo = $_FILES["imagen"]["tmp_name"];
    $se_cargo_imagen= cargar_imagen($tipo,$archivo,$email);

    /*Si en el formulario no viene la imagen entonces le asignamos el 
    valor de la imagen predeterminada */
    $imagen = empty($archivo)?$imagen_default:$se_cargo_imagen;
    //Consulta que inserta los valores que vienen por POST
    $consulta = "INSERT INTO datos (imagen,nombre,apellido,sexo,telcel,email,fecha,profecion) VALUES ('$imagen','$nombre','$apellido','$sexo','$telcel','$email','$fecha','$profesion')";
    $ejecutar_consulta = mysql_query(utf8_decode($consulta));

    //Consulta que evalua la variable $ejecutar_consulta
    
   if ($ejecutar_consulta) {
        //$mensaje = "Se ha dado de alta al contacto con el email <b>$email</b> :)";
        $mensaje = "Se agrego el contacto $email con existo<br>   
        <img src='../img/carita1.png' id='img2'/>";
    } 
    
    
} else {
    #Mensaje de error ya existe el rigirtro
    $mensaje = "Ya existe el contacto con el email: $email<br>  
     <img src='../img/carita2.png' id='img2'/>";
}
//Serrar la conexion
//$conexion->close();
header("Location: agregar.php?op=alta&mensaje=$mensaje");



 ?>


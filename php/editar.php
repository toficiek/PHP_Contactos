
<?php 
/*Capturamos los valores que vienen del formulario que esta en el archivo edicion.php*/
    $id=$_POST['id'];
    $imagen=$_POST['imagen'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $sexo=$_POST["sexo"];
    $telcel=$_POST['telcel'];
    $email=$_POST['email'];
    $fecha=$_POST['fecha'];
    $profesion = $_POST["profesion"];

 
$imagen_default = $imagen;


include("conexion.php");


    //Funcion que carga la imagen
    include("funciones-img.php");
    $tipo = $_FILES["imagen"]["type"];
    $archivo = $_FILES["imagen"]["tmp_name"];
    $se_cargo_imagen= cargar_imagen($tipo,$archivo,$email);

    /*Si en el formulario no viene la imagen entonces le asignamos el 
    valor de la imagen predeterminada */
    $imagen = empty($archivo)?$imagen_default:$se_cargo_imagen;

    $consulta = "UPDATE datos SET imagen='".$imagen."',nombre ='".$nombre."',apellido='".$apellido."',sexo='".$sexo."',telcel='".$telcel."',email='".$email."',fecha='".$fecha."',profecion='".$profesion."'WHERE id='".$id."'";
    $ejecutar_consulta = mysql_query(utf8_decode($consulta));

    //Consulta que evalua la variable $ejecutar_consulta
    
   if ($ejecutar_consulta) {
        //$mensaje = "Se ha dado de alta al contacto con el email <b>$email</b> :)";
        $mensaje = "Se actualizó el contacto $email con existo<br>   
        <img src='../img/carita1.png' id='img2'/>";
    } 
    

//Serrar la conexion
//$conexion->close();
header("Location: edicion.php?op=alta&mensaje=$mensaje");



 ?>


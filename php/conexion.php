<?php


	$conexion=mysql_connect('localhost','root','contraseña')or die('No hay conexion a l abase de datos');
    $db=mysql_select_db('contactos',$conexion)or die('No existe la base de datos');


 ?>


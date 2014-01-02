<?php 
include("conexion.php");
//llamamos al archivo de sesion.php
include("Sesion.php");

$consulta=mysql_query("SELECT * FROM datos ORDER BY nombre");
 /* La variable numero de registro almacena la cantidad de
 de registros almacenados en la tabla datos */                     
 $numRegistros=mysql_num_rows($consulta);
/*Condicion que evalua l vraiable numero de registros si es igual a 0 si la 
variable no tiene registros desplegara un mensaje */
 if ($numRegistros==0) {
   echo "No sean encontrado registos para mostrar";

 }
 /* A la variable registro por página se le asignara un valor que el valor que
 le asignemos sera la cantidad de registrospor página que mostrara */
 $reg_por_pagina=12;

 //Condicion que evalua la variable que viene por GET
if (isset($_GET['num'])) {
  //si la variable que viene por GET existe 
  $num_pagina=$_GET['num'];
}else{
  //si la variable que viene por GET no existe
  $num_pagina = 1;
}
//Condicion que evalua la variable numero de pagina si es numerico
 if(is_numeric($num_pagina))
  /*Si la variable numero de pagina es numerico a la variable $inicio se le 
    asignara una multiplicacion*/

    /*A la variable numero por pagina se restara 1 por los motivos que 
    comenzamos en la pagina 1 no en la pagina 0 para igualar los registros
    ya que los registros comieszan a contar desde 0 por ejemplo la variable
    numero por pagina es igual 2 se restara 1 y quedaria con le valor de 1 y se
    multiplicara 1 x registro por pagina que equivale a 12 y el resultado seria
    12 */
  $inicio=($num_pagina-1)* $reg_por_pagina;
else
  //Si la variable numerop por pagina no es numerico
  $inicio=0;
//Consulta a la base de datos que limita los datos a mostrar
 $consulta2=mysql_query("SELECT * FROM datos ORDER BY nombre LIMIT $inicio, $reg_por_pagina");
 //A la variable catidad por pagina se le asignara la division
$can_paginas=ceil($numRegistros/$reg_por_pagina);

?>
<!doctype html>
<html lang="es-ES">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="../css/Style.css">
  <link rel="stylesheet" href="../css/Stylebuscar.css">
  <link rel="stylesheet" href="../css/jquery-ui-1.10.3.custom.css">

  <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../js/jquery-ui-1.10.3.custom.min.js"></script>

  <?php 
      //consulta para seleccionar las palabras a buscar email
  $con = "SELECT * FROM datos";
  $query = mysql_query($con);

  while ($row=mysql_fetch_array($query)) {
     //arreglo que recibe el valor email 
    $elemento[] = '"'.$row['email'].'"';
  }
  //Se juntan los valores del array en una sola cadena de texto
  $arreglo = implode(",",$elemento);

   ?>
   <script>
   $(function(){
     //imprime el arreglo dentro de un array de javascript
     var imprime=new Array(<?php echo$arreglo; ?>);

     $('#buscar').autocomplete({
      source:imprime
     })

   })

   </script>
</head>
<body>
  <header>
      <img src="../img/administrador.png" id="img"/>
      <!--creamos un enlñace hasia el archivo salir.php -->
      <a href="Salir.php" id="salir">Salir</a>
      
  </header>
  <nav>
    <center>
      <!--Formulario para la busqueda de autocompletado -->
     <form  name="forml"  method="post" action="detalles.php" id="forml">
          <tr>
            <td><input type="email" name="email" id="buscar" placeholder="Buscar" required/></td>
            <td><input class="button" id="boton" type="submit" name="aceptar" value="Buscar"/></td>
          </tr>
        </form> 
        <!--Formulario para mostrar el boton que agragara datos a la base dedatos -->
        <form action="agregar.php" method="post" >
          <input class="button" type="submit" id="boton" value="Agregar"/>
        </form>
        </center>
  </nav>
  <section id="contenedor">    
    <center>
        <div class="contenedor">
            <?php 
              //while que recore las filas id, imgen , nombre de la tabla datos
              while($filas=mysql_fetch_array($consulta2)){
                  $id=$filas['id'];
                  $imagen=$filas['imagen'];
                  $nombre=$filas['nombre'];

                ?>
                <!--caja que muestra el nombre y la imagen de la base de datos -->
                <div class="caja">
                  <h5><?php echo $nombre ?></h5> <!--"../fotos/".$imagen=$filas['imagen'] -->
                    <img src="<?php echo "../fotos/".$imagen ?>" width="280" height="250">
                    <form action="detalles.php" method="post" name="detalles">
                       <input name="id" type="hidden" value="<?php echo $id ?>"/>
                       <input type="submit" class="button" value="Detalles"/>
                    </form>
                </div>
         <?php } ?>
        </div>
          <div id="paginador">
        <?php 
        /* condicion que evalua la variable numero por pagina para crear los 
        botones */
        if ($num_pagina>1) {
          //Enlaces para los botones primero y anterior
          echo "<a id='paginas1' href='buscardatos.php?num=1'>Primero</a>";
          echo "<a id='paginas1' href='buscardatos.php?num=".($num_pagina-1)."'>Anterior</a>";
        }
        for ($i=1; $i <=$can_paginas; $i++) {
          if ($i==$num_pagina) {
               echo $i."";
          } else {
            if ($num_pagina < $i) {
              $can_paginas--;
     
            echo "<a id='paginas' href='buscardatos.php?num=$i'>$i</a>";
         
              # code...
            }
            
          
          
        }

      }
        /*Mensaje que muestra las paginas en la que estamos navegando y 
        cantidad de pagina que hay*/
       // echo"<strong id='paginas2'>".($num_pagina)."de".($can_paginas)."</strong>";

        /* condicion que evalua la variable numero por pagina para crear los 
        botones */
        if ($num_pagina<$can_paginas) {
          //Enlaces para los botones siguiente y ultimo
          echo "<a id='paginas1' href='buscardatos.php?num=".($num_pagina +1)."'>Siguiente</a>";
          echo "<a id='paginas1' href='buscardatos.php?num=".($can_paginas)."'>Ultimo</a>";
        }
         ?>
         </div>
         </center>
    </section>
  <footer>
   <p>&copy;AJ Programer</p>
  </footer>
</body>
</html>


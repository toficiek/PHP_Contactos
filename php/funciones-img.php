<?php 

/*Funcion una funcion que nos permita eliminar la emagenes que tengamos
en la carpetas de fotos para no tener imagenes duplicadas */
function eliminar_imagenes($url,$extension_img){
//switch que evalua la extension de las imagenes
  switch ($extension_img) {
    case ".jpg":
      if (file_exists($url.".png")) 
           unlink($url.".png");
      if (file_exists($url.".gif")) 
           unlink($url.".gif");
      break;

       case ".png":
      if (file_exists($url.".jpg")) 
           unlink($url.".jpg");
      if (file_exists($url.".gif")) 
           unlink($url.".gif");
      break;

       case ".gif":
      if (file_exists($url.".png")) 
           unlink($url.".png");
      if (file_exists($url.".jpg")) 
           unlink($url.".jpg");
      break;
    
  }

}

//Funcion para subir la imagen que se eligio
function cargar_imagen($tipo,$imagen,$email){

  // Condiciones que evaluan la extension de la imagen que hemes suvido
    if (strstr($tipo,"image")) {
    	if (strstr($tipo,"jpeg")) 
    		$extension_img = ".jpg";
    	else 
        if (strstr($tipo,"gif")) 
    		$extension_img = ".gif";
    	else 
        if (strstr($tipo,"png")) 
    		$extension_img = ".png";
    	
        /*Metodos para saber si la imagen tiene el ancho que nostros 
          requerimos que tengan que es 600px*/
        $tam_img = getimagesize($imagen);
        $ancho_img = $tam_img[0];
        $alto_img = $tam_img[1];
        $ancho_img_requerido = 600;

        /*Codicion que evalua si la imagen que se suvio es mayor a 600px ajustamos su tamaño a 600px*/
        if ($ancho_img > $ancho_img_requerido) {

            /*Metodos para ajuastar la imagen al tamaño requerido  */
              $ancho_nuevo_img = $ancho_img_requerido;
              $alto_nuevo_img = ($alto_img/$ancho_img)*$ancho_nuevo_img;

              /*Metodo para crear una imagen con las nuevas dimenciones
                requeridas */
              $img_ajustar = imagecreatetruecolor($ancho_nuevo_img, $alto_nuevo_img);

              /*switch crear una imgen basadose en la original, dependiendo de la extension de la imagen */
              switch ($extension_img) {
                  case ".jpg":
                      $img_original = imagecreatefromjpeg($imagen);
                      //ajustamos la imagen nueva basada en la original
                      imagecopyresampled($img_ajustar, $img_original, 0, 0, 0, 0, $ancho_nuevo_img, $alto_nuevo_img, $ancho_img, $alto_img);
                      //Guardamos la imagen ajustada en el servidor
                      $nom_img_extension = "../fotos/".$email.$extension_img;
                      $nombre_img = "../fotos/".$email;
                      imagejpeg($img_ajustar,$nom_img_extension,100);
                      
                      /*Funcion para borrar las imagenes dobles que
                       tengamos en la carpeta de fotos osea imagenes quetengan el mismo nombre en este caso seria el 
                       nombre del email de contacto*/
                      eliminar_imagenes($nombre_img,".jpg");
                      break;

                      case ".gif":
                      $img_original = imagecreatefromgif($imagen);
                      //Reajusto la imagen nueva con respecto a la original
                      imagecopyresampled($img_ajustar, $img_original, 0, 0, 0, 0, $ancho_nuevo_img, $alto_nuevo_img, $ancho_img, $alto_img);
                      //Guardo la imagen rescalada en el servidor
                      $nom_img_extension = "../fotos/".$email.$extension_img;
                      $nombre_img = "../fotos/".$email;
                      imagegif($img_ajustar,$nom_img_extension,100);

                      //Ejecuto la funcion para borrar posibles imagenes dobles para el perfil
                      eliminar_imagenes($nombre_img,".gif");
                      break;

                      case ".png":
                      $img_original = imagecreatefrompng($imagen);
                      //Reajusto la imagen nueva con respecto a la original
                      imagecopyresampled($img_ajustar, $img_original, 0, 0, 0, 0, $ancho_nuevo_img, $alto_nuevo_img, $ancho_img, $alto_img);
                      //Guardo la imagen rescalada en el servidor
                      $nom_img_extension = "../fotos/".$email.$extension_img;
                      $nombre_img = "../fotos/".$email;
                      imagepng($img_ajustar,$nom_img_extension,100);

                      //Ejecuto la funcion para borrar posibles imagenes dobles para el perfil
                      eliminar_imagenes($nombre_img,".png");
                      break;

              }
              
        } else {
            //Guardamos la url que tendra la imagen en el servidor
            $destino ="../fotos/".$email.$extension_img;

            //Movemos la imagen a su destino
            move_uploaded_file($imagen, $destino);

                //Ejecutamos la funcion para borrar la imagenes dobles 
                $nombre_img = "../fotos/".$email;
                eliminar_imagenes($nombre_img, $extension_img);
        }

        //Asignamos el nombre de la imagen que se guarda en la base de datos como una cadena de texto
        $imagen = $email.$extension_img;
        return $imagen;
        
    	
  } else {
    	return false;
    }
    
}
 ?>
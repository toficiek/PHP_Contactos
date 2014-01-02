<!DOCTYPE HTML>
<html lang="es-ES">
<head>
	<meta charset="UTF-8">
	<title></title>

    <link rel="stylesheet" href="css/stylelogin.css">

    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/animacionlogin.js"></script>
   
</head>
<body>
	<div id="content">

        <img src="img/administrador.png" id="img1"/>
            <div id="login">
                <a href="#" id="showlogin">
                    Usuario
                    <span id="triangle_down">&#9660;</span>
                    <span id="triangle_up" style="display:none;">&#9650;</span> 
                </a>        
                <div id="loginpanel" style="display:none">
                    <?php 
                    error_reporting(E_ALL ^ E_NOTICE);
                        if ($_GET["error"]=="no") {
           
                            echo "<img src='img/carita2.png' id='img2' />";
                        }else {
                      
                             echo "<img src='img/carita1.png' id='img2'/>";
                        }
                    ?>
                 
                    <form id="frm" name="frm" action="php/Control.php" method="post" enctype="application/x-www-form-urlencoded">
                        
                        <input type="text" name="user" id="user" placeholder="Usuario" />   
                        
                        <input type="password" name="pass" id="pass" placeholder="Contraseña"/>  
                        <button type="submit" id="submit">Entrar</button>                   
                    </form>
                </div>
            </div>
        </div>
</body>
</html>
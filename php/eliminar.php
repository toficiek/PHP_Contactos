
<?php
 require_once('conexion.php');
 
    $email=$_POST['email'];
    $id=$_POST['id'];
    

$sql="DELETE FROM datos WHERE id='".$id."' || email='".$email."'";


 
$res=mysql_query($sql);
if (!$res) {
    echo"
    <script>
        window.location='buscardatos.php';
    </script>
    ";
} else {
    ?>
    <meta http-equiv="refresh" content="0;url= buscardatos.php">
    <?php  
}

?>
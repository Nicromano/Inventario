<?php 
 include('BaseDatos.php');

if($base == null){
    exit;
}
global $usuario;
global $pass;
$usuario = $_POST['user'];
$pass = $_POST['contra'];

if(!isset($usuario, $pass)){
    echo"no definidas";
    
}

$sql = "SELECT * FROM personal WHERE usuario = '".$usuario."' AND contrasenia = '".$pass."'";
if(!$sentencia = $base->query($sql)){
    echo "Error: ". $base->error;
}

//$sentencia->bindParam(":user", $usuario, PDO::PARAM_STR);
//$sentencia->bindParam(":contra", $pass, PDO::PARAM_STR);
//echo $sql;

//$sentencia->execute();
if($sentencia){
   //No hay error
   $fila = $sentencia->num_rows;
   if($fila != 0){
       echo "Usuario registrado ";
    session_start();
    $_SESSION['usuario'] = $fila['usuario'];
    $_SESSION['codigo'] = $fila['id'];
    $_SESSION['cargo'] = $fila['cargo'];
    //header('Location: ../sistema.html');
   }
}


/*while ($fila = $sentencia->fetch_assoc()) {
        echo $fila['usuario'];
        echo "-----";
        echo $fila['contrasenia'];
    }
*/

/*echo "<br> ".$fila['usuario']."---- ".$fila['codigo'];

if($fila['usuario']== $usuario && $fila['contraseña']== $pass){
    
}
else{
    //header('Location: ../index.html');
    echo"Usuario sin registrar";
}*/


?>
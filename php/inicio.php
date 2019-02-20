<?php 
 include('BaseDatos.php');

if($base == null){
    exit;
}

global $usuario =  $_POST['user'];
global $pass = $_POST['contra'];

/*if(isset($_POST['user'], $_POST['contra'])){
    echo"no definidas";
    exit;
}*/
echo $usuario.$pass;
$sql = "SELECT * FROM personal WHERE usuario = ".$usuario." AND contraseña = ".$pass;
if(!$sentencia = $base->query($sql)){
    echo "Error: ". $base->error;
}

//$sentencia->bindParam(":user", $usuario, PDO::PARAM_STR);
//$sentencia->bindParam(":contra", $pass, PDO::PARAM_STR);
//echo $sql;

//$sentencia->execute();
if(!$sentencia){
   
}else{
$fila = $sentencia->fetch_assoc();

echo $fila['usuario']. $fila['contraseña'];
}


/*
while ($fila = $sentencia->fetch_assoc()) {
echo $fila['usuario'];
echo "-----";
echo $fila['contraseña'];
}*/

/*echo "<br> ".$fila['usuario']."---- ".$fila['codigo'];

if($fila['usuario']== $usuario && $fila['contraseña']== $pass){
    echo "Usuario registrado ";
    session_start();
    $_SESSION['usuario'] = $fila['usuario'];
    $_SESSION['codigo'] = $fila['codigo'];
    $_SESSION['cargo'] = $fila['cargo'];
    //header('Location: ../sistema.html');
}
else{
    //header('Location: ../index.html');
    echo"Usuario sin registrar";
}*/


?>
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

$sql = "SELECT * FROM personal WHERE usuario = :user AND contrasenia = :contra";
if(!$sentencia = $base->prepare($sql)){
    echo "Error: ". $base->error;
}
$sentencia->bindValue(":user", $usuario, PDO::PARAM_STR);
$sentencia->bindValue(":contra",$pass, PDO::PARAM_STR);
$sentencia->execute();

//No hay error
$fila = $sentencia->num_rows;
if($fila != 0){
    echo "Usuario registrado ";
session_start();
$_SESSION['usuario'] = $fila['usuario'];
$_SESSION['codigo'] = $fila['id'];
$_SESSION['cargo'] = $fila['cargo'];
header('Location: ../sistema.html');
}

?>
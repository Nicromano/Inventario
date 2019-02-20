<?php 
 include('BaseDatos.php');

if($base == null){
    exit;
}
$usuario = $_POST['user'];
$pass = $_POST['contra'];

if(!isset($usuario, $pass)){
    echo"no definidas"; 
}

$sql = "SELECT * FROM personal WHERE usuario = '".$usuario."' AND contrasenia = '".$pass."'";
//$sql = "SELECT * FROM personal WHERE usuario = ' ? ' AND contrasenia = ' ? ' ";
if(!$sentencia = $base->query($sql)){
    echo "Error: ". $base->error;
}
//No hay error
$fila = $sentencia->num_rows;
if($fila != 0){
    echo "Usuario registrado ";
session_start();
$_SESSION['usuario'] = $fila['usuario'];
$_SESSION['codigo'] = $fila['id'];
$_SESSION['cargo'] = $fila['cargo'];
header('Location: ../sistema.html');
}else{
    $doc = new DOMDocument;
    $doc->loadHTML('index.html');
    $hijo = $doc->createTextNode("Usuario o contraseña incorrecta");
    $elemento = $doc->getElementById("campos-invalidos");
    echo $elemento;
    $elemento->appendChild($hijo);
    header('Location: ../index.html'); 
}

?>
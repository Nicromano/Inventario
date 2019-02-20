<?php 
 include('BaseDatos.php');

if($base == null){
    exit;
}
$usuario =real_escape_string( $_POST['usuario']);
$pass = real_escape_string($_POST['pass']);

$base->query("SELECT * FROM personal WHERE usuario = $usuario AND contraseña = $pass");
$sentencia= $base->use_result();
//$sentencia->bindParam(":user", $usuario, PDO::PARAM_STR);
//$sentencia->bindParam(":contra", $pass, PDO::PARAM_STR);
//echo $sql;

//$sentencia->execute();
if(!$sentencia){
    echo "no almacena";
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
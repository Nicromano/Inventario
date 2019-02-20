<?php 
$base = null;
try{
$base = new mysqli("127.0.0.1", "root", "Jose12345", "inventario");
}catch(Exception $e){
    print_r('Error '.$e->getMessage());
}


?>
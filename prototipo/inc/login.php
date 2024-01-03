<?php 
require_once('global.php');
require_once('usuario.php');

$email = $_POST['email'];
$password = $_POST['pwd'];

echo ($usuario->logaUsuario($email, $password)) ? "true" : $usuario->erro;
?>
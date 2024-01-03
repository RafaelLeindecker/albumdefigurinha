<?php
require_once('global.php');
require_once('usuario.php');

$nome 		= $_POST['user_nome'];
$sobrenome 	= $_POST['user_sobrenome'];
$email 		= $_POST['user_email'];
$idade 		= $_POST['user_idade'];
$sexo 		= $_POST['user_sexo'];
$senha 		= $_POST['user_senha'];

//realiza o cadastro + login
$retorno = $usuario->cadastrar($nome, $sobrenome, $email, $idade, $sexo, $senha);

//retorno para ajax
echo ($retorno) ? 'true' : 'false';

?>
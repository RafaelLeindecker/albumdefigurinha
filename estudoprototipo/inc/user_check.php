<?php 
require_once('global.php');
require_once('connection.php');

session_start();
$email = $_POST['user_email'];

//conectando com a tabela do banco de dados
$db = $database;
$db_table = "usuario";
$banco = mysql_select_db($db, $conexao); //nome da tabela onde os dados serão armazenados
$query = "SELECT * FROM $db_table WHERE email='$email'";
$result = mysql_query($query, $conexao) or die (mysql_error());
$num_row = mysql_num_rows($result);
$row=mysql_fetch_assoc($result);

if( $num_row >=1 ) { //se houver usuario, retorna falso
	echo 'false';
}
else{
	echo 'true';
}
?>
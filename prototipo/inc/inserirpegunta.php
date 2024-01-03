<?php
	require_once('connection.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>Formulário de entrada de perguntada</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
</head>
<body>

	<form action="./inserirpegunta.php" method="POST"> 

		Pergunta <input type="text" name="pergunta"/><br/>
		1º Resposta <input type="text"  name="resposta1"/><br/>
		2º Resposta <input type="text" name="resposta2"/><br/>
		3º Resposta <input type="text"  name="resposta3"/><br/>
		4º Resposta <input type="text"  name="resposta4"/><br/>
		Reposta Certa <input type="text"  name="correta"/><br/>
		<input type="submit" value="OK" />
	</form>


<?php 

	if (!empty($_POST['pergunta'])){
		
		$conn = new Conexao();
		
		$conn->Connect();
								
		$pergunta = $_POST['pergunta'] ;
		$resposta = serialize(array($_POST['resposta1'],$_POST['resposta2'],$_POST['resposta3'],$_POST['resposta4']));
		$correta = $_POST['correta']; 
	
		$result=mysql_query("INSERT INTO perguntas_respostas (pergunta, respostas,resposta_certa) VALUES ('$pergunta','$resposta','$correta');");
		
		
		$conn->disconnect();
	}

?>

</body>
</html>




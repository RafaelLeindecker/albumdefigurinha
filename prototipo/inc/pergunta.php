<?php
	require_once('global.php');
	require_once('connection.php');
	

	Class Pergunta{
		
		
		public function Pergunta(){
			$this->conn=new Conexao();
		}
		
		/**
		* 
		* @param ID do usuario logado $id_usuario
		* 
		* @return
		*/
		public function fazerPergunta($id_usuario){
			 
			$this->conn->Connect();	
			$result = mysql_query(" SELECT * FROM resposta WHERE id_usuario=$id_usuario") or die ('a busca deu o seguinte erro'.mysql_error());		
			
			$num_row = mysql_num_rows($result);
			
			
			//testar se o usuario existe na pergunta senгo cadastrar  
			 if($num_row!=NULL){
			  	//checar a data da pergunta da ultima pergunta do usuario 
			 	$query = "SELECT data FROM resposta";
			 	$result=mysql_query($query) or die("Problema para trazer a data da tabela pergunta".mysql_error());
			 	
				$row = mysql_fetch_assoc($result);	 
				$dataBusca = new DateTime($row['data']);
				$dataAgora = new DateTime('NOW');
				$dataResultado = $dataBusca->diff($dataAgora);
				
				
				//Se a diferenзa entre o dia da ъltima pergunta for de 2 
				if($dataResultado->days>=2){
					
					//trazer as perguntas 
					
					
				}
					
			 }
			 //inserir o usuario na tabela pergunta
			 else{
			 	
			 	//inserir 
			 	$insert = "INSERT INTO resposta (`id_usuario`) VALUES ($id_usuario)";
			 	//processar
			 	$result = mysql_query($insert) or die ("erro na inserзгo de dados".msql_erro());
			 				 	
			 }
			 $this->conn->disconnect();
			
		}//FIM fazerPergunta
		
		
	}

	$pergunta = new Pergunta();
	$pergunta->fazerPergunta(1); 
	
?>
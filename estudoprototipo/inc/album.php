<?php
require_once('global.php');
require_once('connection.php');
require_once('figurinha.php');

	
Class Album {

	var $conn = NULL;

	/**
	*	Construtor
	*
	*	cria a instacia de conexao com o banco de dados
	*	
	*	@param none
	*/
	
	public function Album(){
		
		$this->conn = new Conexao();
	
	}

/** 
* Retona a coleção de figurinhas de um usuário
*
* @param integer $id_
* 
* @return array uma lista com a coleção
*/
	public function obterColecao ($id_){
		
		$colecao= array();
		
		$this->conn->Connect();
		
		$result = mysql_query("SELECT figurinha.* FROM album 
							   INNER JOIN figurinha ON album.id_figurinha = figurinha.id 
							   WHERE album.id_usuario={$id_};") or die ('Busca de o seguinte erro'.mysql_error());
			
		;
				
		while($row = mysql_fetch_row($result,MYSQL_ASSOC)) {
			array_push($colecao, new Figurinha($row['id'],$row['label'],$row['img_url'],$row['posicao'],$row['id_time']));
		}

		// libera memoria
		mysql_free_result($result);

		return $colecao;
	}
	
}

?>
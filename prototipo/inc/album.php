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
	*/
	public function Album()
	{	
		$this->conn = new Conexao();
	}


	/**
	*
	*	
	* @param string $nomeTime
	* @return integer
	*/
	public function getIDTime($nomeTime) 
	{
		$this->conn->Connect();	
		$result = mysql_query("SELECT id FROM times WHERE nome='{$nomeTime}';");
		$row = mysql_fetch_array($result) or die ('Busca de o seguinte erro'. mysql_error());

		return ($row) ? $row[0] : false;
	}

	/**
	*
	*	
	* @param integer $id_
	* @return array
	*/
	public function getTimesUsuario($id_) 
	{
		$this->conn->Connect();	
		$result = mysql_query(" SELECT times.* FROM album
								INNER JOIN figurinha ON album.id_figurinha = figurinha.id
								INNER JOIN times ON figurinha.id_time = times.id
								WHERE album.id_usuario={$id_}
								GROUP BY times.nome;");		
		
		$num_row = mysql_num_rows($result);

		if ($num_row) {
			//guarda todos os resultados da query em um array associativo
			while($row = mysql_fetch_assoc($result)){
			     $rows[] = $row;
			}
			mysql_free_result($result);

			return $rows;
		} 
		else {
			return false;
		}
	}


	/** 
	* @param undefined $id_
	* 
	* @return mixed Retorna um Array com uma lista com a coleção, ou uma mensagem de erro 
	*/
	public function obterColecao ($id_)
	{		
		$rows = [];
		$fig = new Figurinha();

		$this->conn->Connect();
		
		$result = mysql_query("SELECT figurinha.* FROM album 
			                   INNER join figurinha ON album.id_figurinha = figurinha.id 
			                   WHERE album.id_usuario=$id_
			                   GROUP BY figurinha.id_time;") or die ('Busca de o seguinte erro'.mysql_error());		

		$num_row = mysql_num_rows($result);

		if ($num_row) {
			//guarda todos os resultados da query em um array associativo
			while($row = mysql_fetch_assoc($result)){
			     $rows[] = $row;
			}
			mysql_free_result($result);

			return $rows;
		} 
		else {
			return false;
		}					
	}

	/** 
	* Retorna um Array com uma lista com a coleção, ou uma mensagem de erro 
	*
	* @param undefined $id_
	* @param string $time
	* 
	* @return mixed 
	*
	* @example obterColecaoTime(1, 'Brasil') ou obterColecaoTime(1, 0);
	*/
	public function obterColecaoTime ($id_, $time_)
	{
		$i = 0;
		$colecao = [];
		$fig = new Figurinha();

		if ( gettype($time_) == 'string' ) {
			$id_time = $this->getIDTime($time_);
		} 
		else if ( gettype($time_) == 'integer' ) {
			$id_time = $time_;	
		}

		if (isset($id_time) && isset($id_)) 
		{

			$times_colecao_usuario = $this->getTimesUsuario( $id_ );

			if ($times_colecao_usuario) {

				foreach ($times_colecao_usuario as $time) {
				
					/*$rows = new array();*/
					$id_time = (integer)$time['id'];
					$nome_time = $time['nome'];

					$this->conn->Connect();			
					$result = mysql_query("SELECT figurinha.* FROM album 
						                   INNER join figurinha ON album.id_figurinha = figurinha.id 
						                   WHERE album.id_usuario={$id_} AND figurinha.id_time = {$id_time};") or die ('Busca de o seguinte erro'.mysql_error());		

					$num_row = mysql_num_rows($result);

					if ($num_row) {
						// popula o rows com as figurinhas do time
						while($row = mysql_fetch_assoc($result)){
							$rows[] = $row;
						}			

						$colecao[$i]['time'] = $id_time;
						$colecao[$i]['time_nome'] = $nome_time;
						$colecao[$i]['figurinhas'] = $rows;
					} 
					else {
						return false;
					}	
					
					// zera o rows pra ser usado novamente	
					unset($rows);
					$i++;	
				}	
				return $colecao;
			}
			else {
				return false;
			}
		} 
		else {
			return false;
		}
	}
	
}
?>
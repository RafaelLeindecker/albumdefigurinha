<?php 
Class Conexao {
				
	private $db_host = 'localhost'; // servidor
	private $db_user = 'root'; // usuario do banco
	private $db_pass = 'root'; // senha do usuario do banco
	private $dbname  = "albumdacopa";
	private $con     = NULL;	
	
	public function Connect() { // estabelece conexao 
    	if(!$this->con) {
        	$myconn = @mysql_connect($this->db_host,$this->db_user,$this->db_pass);
        	if($myconn) {
            	$seldb = @mysql_select_db($this->dbname,$myconn);
            	
            	if($seldb) {
                	$this->con = true;
                	return true;
            	} else {
                	return false;
            	}
        	}
        	else { // falha na conexão
        		echo ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
            	return false;
        	}
        }
        else {
            return true;
        }
    }

    public function disconnect() { // fecha conexao
	    if($this->con) {
	        if(@mysql_close()) {
				$this->con = false;
	            return true;
	        }
	        else {
	            return false;
	        }
	    }
    }

}
?>
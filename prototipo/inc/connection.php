<?php
class Conexao {
    private $db_host = 'localhost'; // servidor
    private $db_user = 'root'; // usuario do banco
    private $db_pass = 'root'; // senha do usuario do banco
    private $dbname = 'albumdacopa';
    private $con = NULL;

    public function Connect() { // estabelece conexao
        if (!$this->con) {
            $this->con = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->dbname);

            if ($this->con->connect_error) {
                die("Erro de conexão com localhost: " . $this->con->connect_error);
            }

            return true;
        } else {
            return true;
        }
    }

    public function disconnect() { // fecha conexao
        if ($this->con) {
            $this->con->close();
            $this->con = NULL;
            return true;
        }
    }
}



?>

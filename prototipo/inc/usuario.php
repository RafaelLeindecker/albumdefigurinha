<?php 
require_once('global.php');
require_once('connection.php');

Class Usuario {

	private $id;
	private $nome = '';
	private $sobrenome = '';
	private $email = '';
	private $db_table = 'usuario';

	var $conn = NULL;	
	var $prefixoChaves = 'usuario_'; //Prefixo das chaves usadas na sessão
	var $erro = '';	

	/**
	*	Construtor
	*
	*	cria a instacia de conexao com o banco de dados
	*	
	*/
	public function Usuario() {
		$this->conn=new Conexao();
	}

	/**
	*	Retorna o ID do usuário logado
	*	
	*	@param none
	*	@return integer 
	*/
	public function getID() {
		$loggedUserId = $_SESSION[ $this->prefixoChaves . 'id' ];
		return $loggedUserId;
	}


	/**
	*	Checa se o usuario é valido
	*	
	*	@param string $login
	*	@param string $senha
	*	@return boolean - se o usuario logou com sucesso ou não
	*/
	public function logaUsuario($login, $senha) {

		if ($this->validaUsuario($login, $senha)) 
		{
			$_SESSION[ $this->prefixoChaves . 'id'] = $this->id;
			$_SESSION[ $this->prefixoChaves . 'name']= $this->nome;
			$_SESSION[ $this->prefixoChaves . 'surname']= $this->sobrenome;
			$_SESSION[ $this->prefixoChaves . 'email']= $this->email;

			$this->atualizaAcessoLoginUsuario($this->id);

			return $this->id;
		} 
		else {
			$this->erro = 'Usuario invalido';
			return false;
		}
	}

	/**
	*	Atualiza data o login do usuario
	*	
	*	@param none
	*	@return none
	*/
	private function atualizaAcessoLoginUsuario($userid) 
	{
		$this->conn->Connect();
		$sql = "UPDATE $this->db_table SET acesso = now() WHERE id='{$userid}'";
		$query = mysql_query($sql) or die (mysql_error());		
		$this->conn->disconnect();
	}

	/**
	*	Checa se o usuario é valido
	*	
	*	@param string $login
	*	@param string $usuario
	*	@return boolean - se o usuario é valido ou não
	*/
	function validaUsuario($login, $pass) {

		$email = $login;
		$password = md5($pass);

		$this->conn->Connect();
		$sql = "SELECT * FROM $this->db_table WHERE email='{$email}' AND senha='{$password}'";
		$query = mysql_query($sql) or die (mysql_error());		
		$row = mysql_fetch_assoc($query);

		if ($query) {
			$total = mysql_num_rows($query);
			// configura as variaveis da classe a partir de dados do banco
			$this->id = $row['id'];
			$this->nome = $row['nome']; 
			$this->sobrenome = $row['sobrenome']; 
			$this->email = $row['email'];
		} 
		else {
			return false;			
		}

		$this->conn->disconnect(); //encerra conexao com o bd

		return ($total == 1) ? true : false;
	}

	/**
	*	Verifica se há um usuario logado
	*	
	*	@return boolean - se tem um usuario logado ou não
	*/
	function usuarioLogado() {
		if (isset($_SESSION[ $this->prefixoChaves . 'id' ])) {
			return true;
		} else {
			return false;
		}
	}

	/**
	*	Faz o logout do usuario limpando as variaveis de sessao
	*	
	*	@return boolean - se tem um usuario logado ou não
	*/
	function logoutUsuario() {
		unset($_SESSION[ $this->prefixoChaves . 'id' ]);
		unset($_SESSION[ $this->prefixoChaves . 'email' ]);
		unset($_SESSION[ $this->prefixoChaves . 'name' ]);
		unset($_SESSION[ $this->prefixoChaves . 'surname' ]);	

		//direciona pra index
		header('Location: ../index.php');
	}

	/**
	*	Processa o cadastro de usuário (INSERT)
	*	
	*	@param string $nome
	*	@param string $sobrenome
	*	@param string $email
	*	@param string $idade
	*	@param string $sexo
	*	@param string $senha
	*	@return boolean - se tem um usuario logado ou não
	*/
	function cadastrar($nome, $sobrenome, $email, $idade, $sexo, $senha) {

		// verifica se o email já foi cadastrado
		if ( $this->emailUsuarioCheck($email) ) 
		{
			$senha_md5 = md5($senha); //converte senha para md5
			$this->conn->Connect();

			//Query que realiza a inserção dos dados no banco de dados na tabela indicada acima
			$sql = "INSERT INTO `$this->db_table` ( `nome`, `sobrenome` ,`email` ,`idade` ,`sexo` ,`senha`, `acesso` ) 
			VALUES ( '$nome', '$sobrenome', '$email', '$idade', '$sexo', '$senha_md5', now() )";

			//processa a query
			$query = mysql_query($sql) or die (mysql_error());	

			//realiza o login
			$this->logaUsuario($email, $senha);
			
			//desconecta do banco
			$this->conn->disconnect();	

			return true;
		} 
		else {
			return false;
		}

	}

	/**
	*	Verifica se o email já foi cadastrado
	*	
	*	@return boolean
	*/
	function emailUsuarioCheck($email) 
	{
		$this->conn->Connect();
		$sql = "SELECT * FROM $this->db_table WHERE email='{$email}'";
		$query = mysql_query($sql) or die (mysql_error());	
		$num_row = mysql_num_rows($query);
		$this->conn->disconnect();	
		return ( $num_row >=1 ) ? false : true;
	}


}

// cria instancia da classe usuario para uso
$usuario = new Usuario();
?>
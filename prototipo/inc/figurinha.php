<?php


Class Figurinha  {
	
	public function Figurinha(){
		
	}
		
	private $id;
	private $label;
	private $url;
	private $position;
	private $idTime;
	
	public function setId($id){
	
		$this->id=$id;
	
	}
	public function setLabel($label){
	
		$this->label=$label;
	
	}
	public function setUrl($url){
	
		$this->url=$url;
	
	}
	public function setPosition($position){
	
		$this->position=$position;
	
	}
	
	public function setTeam ($time){
		
		$this->idTime=$time;
		
	}
	
	public function getId(){
	
		return $id;
	
	}
	public function getLabel(){
	
		return $label;
	
	}
	public function getUrl(){
	
		return $url;
	
	}
	public function getPosition(){
	
		return $position;
	
	}
	
	public function getTeam (){
		
		return $idTime;
		
	}
		
		
		
}


		
		
		
//	public $conn=NULL;
//		
//	public function FigurinhaDAO() {
//		$this->conn=new Conexao();
//	}	
//
//	public function getQuantidade(){
//		
//		$this->conn->Connect();
//		$query = mysql_query("SELECT * FROM figurinha") or die (mysql_error());
//		$num_row = mysql_num_rows($query);
//       	        
//        for($i = 0; $i < $num_row; $i++){		
//			print("<div>figurinha</div>");
//		}	
//
//        $this->conn->disconnect();
//	}  	
//}			  	
// 
//$daoteste = new FigurinhaDAO();
//$daoteste->getQuantidade();



 
 	
 ?>
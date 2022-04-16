<?php
require_once 'Conexao.php';

class CallsDao{
    
    private $con;
	public function __construct()
	{
		$this->con = Conexao::getConexao();
	}
	public function searchPrice(Calls $c)
	{                
        $data=array();
        $query = $this->con->prepare('select * from calls where CallsTo='.$c->getTo().' and CallFrom='.$c->getFrom() );
		$query->execute();
		$data = $query->fetchall();
		return $data ;        
	}    
    public function searchCity()
	{                
        $datas=array();
        $query = $this->con->prepare("select * from city");
		$query->execute();
		$datas = $query->fetchall();
		return ($datas) ;        
	}
    public function saerchPlan()
	{                
        $data=array();
        $query = $this->con->prepare("select * from speakmore");
		$query->execute();
		$data = $query->fetchall();
		return ($data);
	}
}
?>
<?php
	class Time{
	private $idTime; 
	private $nome;
	private $emailTime;
	private $cidade;
	
	public function __construct(){ }
	
	public function __destruct(){
		unset($this->nome);
		unset($this->emailTime);
		unset($this->cidade);
		unset($this);
	}
	
	public function __get($a){
		return $this->$a;
	}
	
	public function __set($a, $b){
		$this->$a = $b;
	}
	
	public function __toString(){
		return nl2br("  Nome: $this->nome
							Contato: $this->emailTime
							Cidade: $this->cidade");
	}
	
}//fecha time
<?php
	class Usuario{
		private $idUsuario;
		private $login;
		private $senha;
		private $email;
		private $posicao;
		
		public function __construct(){}
		
		public function __destruct(){
			unset($this->login);
			unset($this->senha);
			unset($this->email);
			unset($this->posicao);
			unset($this);
		}
		
		public function __get($a){
			return $this->$a;
		}
		
		public function __set($a, $b){
			$this->$a = $b;
		}
		
		public function __toString(){
			return nl2br("  Login: $this->login
							Senha: $this->senha
							E-mail: $this->email
							Posição: $this->posicao");
		}
	}//fecha usuario
<?php
class ConexaoBanco extends PDO{
	
   private static $instancia=null;
	
   public function ConexaoBanco($dsn,$usuario,$senha){
		//Construtor da classe pai PDO
		parent::__construct($dsn,$usuario,$senha);
   }
	
   public static function getInstancia(){
   	if(!isset(self::$instancia)){
		try{
			/* Cria e retorna uma nova conexão*/

self::$instancia = new ConexaoBanco("mysql:dbname=bks;host=localhost","root","");

//self::$instancia = new ConexaoBanco("mysql:dbname=;host=mysql.hostinger.com.br","","");

		}catch(Exception $e){
			echo 'Erro ao conectar';
		    exit();				
		}//fecha catch
	}//fecha if
	return self::$instancia;
   }//fecha método
}//fecha classe
<?php
	class validar{
	public static function validarNome($n){

		$exp ='/^[0-9a-zA-ZéÉóÓáÁíÍúÚüÜôÔõÕãÃ_-]{2,50}$/';
		return preg_match($exp, $n);
	}

	public static function validarSenha($s){
		$exp ='/^[A-z0-9&*@#$]{6,30}$/';
		return preg_match($exp, $s);
	}

	public static function validarEmail($e){
		$exp ='/^[A-z0-9]{2,50}[@]{1}(outlook|gmail|yahoo|hotmail)[.]{1}(com|br|com.br)$/';
		return preg_match($exp, $e);
	}

	public static function validarNomeTime($t){

		$exp ='/^[0-9a-zA-ZéÉóÓáÁíÍúÚüÜôÔõÕãÃ_-]{2,50}$/';
		return preg_match($exp, $t);
	}

}//fecha validar
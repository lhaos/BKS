<?php
	require '../persistencia/conexaobanco.php';
	class timeDAO{
		private $conexao = null;

		public function __construct(){
			$this->conexao = conexaobanco::getInstancia();
		}

		public function __destruct(){
			$this->conexao = null;
		}

		public function cadastrarTime($t){
			try {
				$stat = $this->conexao->prepare("insert into time(idTime, nome, email, cidade) values(null, ?, ?, ?)");

				$stat->bindValue(1, $t->nome);
				$stat->bindValue(2, $t->email);
				$stat->bindValue(3, $t->cidade);

				$stat->execute();

			} catch (Exception $e) {
				echo "Erro ao cadastrar time".$e;
			}//fecha catch
		}//fecha cadastrar time

		public function buscarTime(){
			try {
				$stat = $this->conexao->query("select nome, email, cidade from time");
				$array = $stat->fetchAll(PDO::FETCH_CLASS, 'Time');

				return $array;

			} catch (Exception $e) {
				echo "Erro ao buscar".$e;
			}
		}//fecha buscarTime

	}//fecha timeDAO
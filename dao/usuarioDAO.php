<?php
	require '../persistencia/conexaobanco.php';
	class UsuarioDAO{

		private $conexao = null;

		public function __construct(){
			$this->conexao = conexaobanco::getInstancia();
		}

		public function __destruct(){
			$this->conexao = null;
		}

		public function cadastrarUsuario($u){
			try {
				$stat = $this->conexao->prepare("insert into usuario(idUsuario, login, senha, email, posicao) values(null, ?, ?, ?, ?)");

				$stat->bindValue(1, $u->login);
				$stat->bindValue(2, $u->senha);
				$stat->bindValue(3, $u->email);
				$stat->bindValue(4, $u->posicao);

				$stat->execute();

			} catch (Exception $e) {
				echo 'Erro ao conectar '.$e;
			}//fecha catch
		}//fecha cadastrarUsuario

		public function buscarUsuario(){
			try {

				$stat = $this->conexao->query("select login, email, posicao from usuario");
				$array = $stat->fetchAll(PDO::FETCH_CLASS, 'Usuario');

				return $array;
			} catch (Exception $e) {
				echo 'Erro ao buscar'.$e;
			}//fecha catch
		}//fecha buscarUsuarios

		public function deletarUsuario($id){
			try {
				$stat = $this->conexao->prepare("delete from usuario where idUsuario=?");
				$stat->bindValue(1, $id);
				$stat->execute();
			} catch (Exception $e) {
				echo "Erro ao deletar".$e;
			}//fecha catch
		}//fecha deletarusuario

		public function buscarId($id){
			try {

				$stat = $this->conexao->prepare("select * from usuario where idUsuario=?");
				$stat->bindValue(1, $id);
				$stat->execute();
				
				$array = $stat->fetchAll(PDO::FETCH_CLASS, 'Usuario');

				return $array;
			} catch (Exception $e) {
				echo 'Erro ao buscar'.$e;
			}//fecha catch
		}//fecha buscarId

		public function login($login, $senha){
			try {
				$stat = $this->conexao->prepare("select * from usuario where (login=? or email=?) and senha=?");
				$stat->bindValue(1, $login);
				$stat->bindValue(2, $login);
				$stat->bindValue(3, $senha);

				$stat->execute();

				$array = $stat->fetchAll(PDO::FETCH_CLASS, 'Usuario');

				return $array;
			} catch (Exception $e) {
				echo "Erro ao logar".$e;
			}
		}//fecha login
		
	}//fecha usuariodao
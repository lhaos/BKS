<?php session_start(); ?>
<?php if(!isset($_SESSION['usuarioId']) || intval($_SESSION['usuarioId']) == 0){header("location:../visao/index.php");} ?>

<?php include 'inc/header.php'; ?>
	<div>
		<?php 
		$_GET['op'] = 5;
		include '../controle/usuario-controle.php';
		if (isset($_SESSION['user'])) {
			echo "<h1>Bem vindo ".$_SESSION['user']->login."</h1>";
		}  ?>

		<form name="excluir" id="excluir" method="post" action="../controle/usuario-controle.php?op=6">
			<input type="submit" name="btnexcluir" id="btnexcluir" value="Excluir conta" />
		</form>
	</div>
<?php include 'inc/footer.php'; ?>
		
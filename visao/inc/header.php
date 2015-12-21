<!DOCTYPE html>
<html>
<head>
	<title>BKStreet</title>
	<meta charset="utf-8">
	<link href="../estilo/estilo.css" rel="stylesheet" type="text/css">
</head>
<body>
	<section class="troca">
		<header>
			<div class="imagem">
				<img src="../imagens/logo2.png" alt="Basket Street" title="Basket Street" class="imagem">
			</div>
			<div>
				<nav id="menu">
					<ul>
						<li><a href="../visao/index.php">Noticias</a></li>
						<li><a href="../visao/sobre.php">Sobre</a></li>
						<?php if (isset($_SESSION['usuarioId']) && intval($_SESSION['usuarioId']) > 0) { ?>
							<li><a href="../controle/usuario-controle.php?op=3">Usuarios</a></li> 
						<?php }//fecha if ?>
						<?php if (isset($_SESSION['usuarioId']) && intval($_SESSION['usuarioId']) > 0) { ?>
						<li><a href="../controle/time-controle.php?op=2">Times</a></li>
						<?php }//fecha if ?>
						<?php if (isset($_SESSION['usuarioId']) && intval($_SESSION['usuarioId']) > 0) { ?>
						<li><a href="../visao/cadastrarTime.php">Criar time</a></li>
						<?php }//fecha if ?>
						<?php if (isset($_SESSION['usuarioId']) && intval($_SESSION['usuarioId']) > 0) { ?>
						<li><a href="../visao/perfil.php">Perfil</a></li>
						<?php }//fecha if ?>
						<?php if(!isset($_SESSION['usuarioId']) || intval($_SESSION['usuarioId']) == 0){ ?>
						<li><a href="../visao/login.php">Login</a></li>
						<?php }else{ ?>
						<li><a href="../controle/usuario-controle.php?op=4">Logout</a></li>
						<?php }//fecha else ?>
					</ul>
				</nav>
			</div>
		</header>
		<hr>
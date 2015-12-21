<?php session_start(); ?>
<?php include 'inc/header.php'; ?>
		<div class="d">
			<fieldset id="login"><legend>Login</legend>
			<?php
                    if(isset($_SESSION['msgLogin'])){
                        echo '<br>'.$_SESSION['msgLogin'];
                        unset($_SESSION['msgLogin']);
                    }//fecha if
                ?>
				<form name="logUsuario" id="logUsuario" method="post" action="../controle/usuario-controle.php?op=1">
					<input type="text" name="testaLogin" id="testaLogin" placeholder="úsuario" required class="q" />
					<input type="password" name="testaSenha" id="testaSenha" placeholder="senha" required class="q" />
					<input type="submit" name="btnLogin" id="btnLogin" value="Logar" class="q2">
				</form>
			</fieldset>
		</div>
		<div class="d">
			<fieldset id="cadastro"><legend>Cadastro</legend>
				<?php
                    if(isset($_SESSION['msg'])){
                        echo '<br>'.$_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }//fecha if
                ?>
				<form name="cadUsuario" id="cadUsuario" method="post" action="../controle/usuario-controle.php?op=2">
					<input type="text" name="txtlogin" placeholder="Nome de úsuario" required class="q" pattern="^[a-zA-ZéÉóÓáÁíÍúÚüÜôÔõÕãÃ_-]{2,50}$" />
					<input type="password" name="txtsenha" placeholder="Senha" required class="q" pattern="^[A-z0-9&*@#$]{6,30}$" />
					<input type="password" name="txtconfirmarSenha" placeholder="Confirmar senha" required class="q" pattern="^[A-z0-9&*@#$]{6,30}$" />
					<input type="email" name="txtemail" placeholder="E-mail para contato" required pattern="^[a-z]{2,50}@(outlook|gmail|yahoo|hotmail).(com|br|com.br)$" class="q" />
					<select name="posicao">
						<option value="">Posição preferida</option>
						<option value="Treinador">Treinador</option>
						<option value="Armador">Armador</option>
						<option value="Ala">Ala</option>
						<option value="Ala-Armador">Ala-Armador</option>
						<option value="Pivo">Pivô</option>
						<option value="Ala-Pivo">Ala-Pivô</option>
					</select>
					<input type="submit" name="btnCadastrar" value="cadastrar">
				</form>
			</fieldset>
		</div>
<?php include 'inc/footer.php'; ?>
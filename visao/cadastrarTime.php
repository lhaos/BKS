<?php session_start(); ?>
<?php include 'inc/header.php'; ?>
		<div>
			<fieldset class="time"><legend>Criar Time</legend>
			<?php
                    if(isset($_SESSION['msgTime'])){
                        echo '<br>'.$_SESSION['msgTime'];
                        unset($_SESSION['msgTime']);
                    }//fecha if
                ?>
				<form name="cadtime" id="cadtime" method="post" action="../controle/time-controle.php?op=1">
					<input type="text" name="txtnometime" id="txtnometime" placeholder="Nome do time" required class="q" pattern="^[0-9a-zA-ZéÉóÓáÁíÍúÚüÜôÔõÕãÃ_- ]{2,50}$" />
					<input type="email" name="txtemailtime" id="txtemailtime" placeholder="E-mail do time" required class="q" pattern="^[a-z]{2,50}@(outlook|gmail|yahoo|hotmail).(com|br|com.br)$" />
					<input type="text" name="txtcidade" id="txtcidade" placeholder="Cidade" required class="q" pattern="^[a-zA-ZéÉóÓáÁíÍúÚüÜôÔõÕãÃ_- ]{2,50}$" />
					<input type="submit" name="btncadastrar" id="btncadastrar" value="Criar" />
				</form>
			</fieldset>
		</div>
<?php include 'inc/footer.php'; ?>
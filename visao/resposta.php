<?php if(!isset($_SESSION['usuarioId']) || intval($_SESSION['usuarioId']) == 0){header("location:../visao/index.php");} ?>
	 <?php
                        include '../modelo/usuario.class.php';
                        if (isset($_SESSION['msgPerfil'])) {

                            //recebendo variável via session
                            //Obs.: não esquecer de abrir session_start();
                            echo '<br>' . $_SESSION['msgPerfil'];

                            $u = unserialize($_SESSION['u']);

                            echo '<p>';
                            echo $u;
                            echo '</p>';

                            unset($_SESSION['msgPerfil']);
                            unset($_SESSION['u']);
                        } else if (isset($_SESSION['users'])) {
                            $array = unserialize($_SESSION['users']);
                            foreach ($array as $a) {
                                echo '<br>' . $a;
                            }
                        } 
                        ?>
<?php include 'inc/footer.php'; ?>
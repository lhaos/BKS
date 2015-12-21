<?php session_start(); ?>
<?php include 'inc/header.php'; ?>
		<div>
			<?php
                if (isset($_SESSION['users'])) {
                    ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Login</th>
                                <th>email</th>
                                <th>Posição</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Login</th>
                                <th>email</th>
                                <th>Posição</th>
                            </tr>
                        </tfoot>                    
                        <?php
                    }//fecha if
                    include '../modelo/usuario.class.php';
                    if (isset($_SESSION['users'])) {
                        $array = unserialize($_SESSION['users']);
                        echo '<tbody>';
                        foreach ($array as $a) {
                            //echo '<br>' . $a;
                            echo '<tr>';
                            echo '<td>' . $a->login . '</td>';
                            echo '<td>' . $a->email . '</td>';
                            echo '<td>' . $a->posicao . '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                        unset($_SESSION['users']);
                    }//fecha if
                    ?>
		</div>
<?php include 'inc/footer.php'; ?>
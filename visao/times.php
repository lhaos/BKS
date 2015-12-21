<?php session_start(); ?>
<?php include 'inc/header.php'; ?>
		<div>
		<?php
            if (isset($_SESSION['users'])) {
         ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Contato</th>
                                <th>Cidade</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                               <th>Nome</th>
                                <th>Contato</th>
                                <th>Cidade</th>
                            </tr>
                        </tfoot>                    
                        <?php
                    }//fecha if
                    include '../modelo/time.class.php';
                    if (isset($_SESSION['users'])) {
                        $array = unserialize($_SESSION['users']);
                        echo '<tbody>';
                        foreach ($array as $a) {
                            //echo '<br>' . $a;
                            echo '<tr>';
                            echo '<td>' . $a->nome . '</td>';
                            echo '<td>' . $a->email . '</td>';
                            echo '<td>' . $a->cidade . '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                        unset($_SESSION['users']);
                    }//fecha if
                    ?>	
		</div>
<?php include 'inc/footer.php'; ?>
<?php
	session_start();
	require '../modelo/time.class.php';
	require '../dao/timeDAO.php';
	require '../util/validacao.php';

	if (isset($_GET['op'])) {
    switch ($_GET['op']) {
        case '1': //cadastrar

        	   if (validar::validarNomeTime($_POST['txtnometime']) && validar::validarEmail($_POST['txtemailtime']) && validar::validarNome($_POST['txtcidade'])) {
               
                    $u = new Time();
        	
        			$u->nome = $_POST['txtnometime'];
        			$u->email = $_POST['txtemailtime'];
        			$u->cidade = $_POST['txtcidade'];

                    $uDAO = new timeDAO();
                    $uDAO->cadastrarTime($u);

                    $_SESSION['msgTime'] = 'Time cadastrado com sucesso!';
                    $_SESSION['u'] = serialize($u);
                    
                    header("location:../visao/cadastrarTime.php");
                }else{
                    $_SESSION['msgTime'] = 'Erro ao cadastrar! Por favor verifique e cadastre novamente, conforme as exigências';
                     header("location:../visao/cadastrarTime.php");
                }//fecha else

        break;

        case '2': //buscar
            $uDAO = new timeDAO();
            $array = $uDAO->buscarTime();

            if ($array != null) {
                $_SESSION['users'] = serialize($array);
                header("location:../visao/times.php");
            }else{
                $_SESSION['users'] = 'Não existe dados';
                header("location:../visao/resposta.php");
            }//fecha else
           
        break;

            default: echo 'erro';
            break;
        }//fecja switch
    } else {
    header("location:../index.php");
}//fecha else
<?php
	require '../modelo/usuario.class.php';
	require '../dao/usuarioDAO.php';
	require '../util/padronizacao.php';
    require '../util/validacao.php';

	if (isset($_GET['op'])) {
    switch ($_GET['op']) {
        case '1':
        session_start();
            if (validar::validarNome($_POST['testaLogin']) && validar::validarSenha($_POST['testaSenha'])){

                $login = $_POST['testaLogin'];
                $senha = padronizacao::criptografar($_POST['testaSenha']);

                $uDAO = new UsuarioDAO();
                $array = $uDAO->login($login, $senha);

                if (!is_array($array) || count($array) != 1) {
                    $_SESSION['msgLogin'] = 'Login ou senha incorreto';
                    header("location:../visao/login.php");
                }//fecha if

                $_SESSION['usuarioId'] = $array[0]->idUsuario;
                $_SESSION['usuarioLogin'] = $array[0]->login;
                $_SESSION['usuarioEmail'] = $array[0]->email;

                header("location:../visao/perfil.php");

            }else{
                $_SESSION['msgLogin'] = 'Preencha corretamente os campos';
                header("location:../visao/login.php");
            }//fecha else

        break;

        case '2': //cadastrar
        session_start();
        	if ($_POST['txtsenha'] == $_POST['txtconfirmarSenha'] && $_POST['posicao'] != null){
        	   if (validar::validarNome($_POST['txtlogin']) && validar::validarSenha($_POST['txtsenha']) && validar::validarEmail($_POST['txtemail'])) {
               
                    $u = new Usuario();
        	
        			$u->login = $_POST['txtlogin'];
        			$u->senha = padronizacao::criptografar($_POST['txtsenha']);
        			$u->email = $_POST['txtemail'];
        			$u->posicao = $_POST['posicao'];

                    $uDAO = new UsuarioDAO();
                    $uDAO->cadastrarUsuario($u);

                    $_SESSION['msg'] = 'usuário cadastrado com sucesso!';
                    $_SESSION['u'] = serialize($u);
                    
                    header("location:../visao/login.php");
                }else{
                    $_SESSION['msg'] = 'Erro ao cadastrar! Por favor verifique e cadastre novamente, conforme as exigências';
                     header("location:../visao/login.php");
                }//fecha else
            } else{  $_SESSION['msg'] = 'Erro ao cadastrar! Por favor verifique e cadastre novamente, conforme as exigências';
                     header("location:../visao/login.php");
                }//fecha else

        break;
        case '3': //buscar
        session_start();
            $uDAO = new UsuarioDAO();
            $array = $uDAO->buscarUsuario();

            if ($array != null) {
                $_SESSION['users'] = serialize($array);
                header("location:../visao/usuarios.php");
            }else{
                $_SESSION['users'] = 'Não existe dados';
                header("location:../visao/resposta.php");
            }//fecha else
           
        break;
        case '4':
        session_start();
                $_SESSION['usuarioId'] = 0;
                $_SESSION['usuarioLogin'] = '';
                $_SESSION['usuarioEmail'] = '';

                unset($_SESSION['usuarioId']);
                unset($_SESSION['usuarioLogin']);
                unset($_SESSION['usuarioEmail']);

                header("location:../visao/index.php");
        break;
        case '5':
            $id = $_SESSION['usuarioId'];

            $uDAO = new UsuarioDAO();
            $array = $uDAO->buscarId($id);

            if (!is_array($array) || count($array) != 1) {
                    $_SESSION['msgPerfil'] = 'Erro ao carregar perfil';
                    header("location:../visao/resposta.php");
                }//fecha if

            $_SESSION['user'] = $array[0];
            
            
        break;
        case '6':
            session_start();

            $id = $_SESSION['usuarioId'];
            $uDAO = new UsuarioDAO();
            $uDAO->deletarUsuario($id);

            unset($_SESSION['usuarioId']);
            unset($_SESSION['usuarioLogin']);
            unset($_SESSION['usuarioEmail']);

            header("location:../visao/index.php");
        break;

            default: echo 'erro';
            break;
        }//fecja switch
    } else {
    //header("location:../index.php");
        echo "Demonio";
}//fecha else
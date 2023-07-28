<?php
use models\Usuario;
use models\Livro;

class AutenticacaoController {

    function index(){
        #variáveis que serao passados para a view
        $send = [];
        #chama a view
        render("login", $send);
    }

    function logar(){

        $model = new Usuario();
        #busca o usuario pelo email e senha
        $user = $model->findByEmailAndSenha($_POST["email"],  $_POST["senha"]);
    
        if ($user != null){
            $_SESSION['user'] = $user;
            redirect("autores");
        }else {
            #caso contrario, manda para o login novamente
            $send = ["msg"=>"Login ou senha inválida"];
            render("login", $send);
        }
    }   
    
    function logout(){
        session_destroy();
        redirect("autenticacao");
    }
} 
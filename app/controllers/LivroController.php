<?php

use models\AutoresLivro;
use models\EmprestimoLivros;
use models\Livro;
use models\Usuario;

class LivroController {

	#construtor, é iniciado sempre que a classe é chamada

	function __construct() {
    #se nao existir é porque nao está logado
    	if (!isset($_SESSION["user"])){
       		redirect("autenticacao");
        die();
    	}
	}

	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Livro();
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
			$send['usuarios_emprestimo'] = $model->getEmprestimo_livros($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		#$send['tipos'] = [0=>"Escolha uma opção", 1=>"Usuário comum", 2=>"Admin"];

		#recupera a lista com todos os autores
        $autoresModel = new AutoresLivro();
        $send['autores_livro'] = $autoresModel->all();

		#recupera a lista com todos os usuarios
        $usuModel = new Usuario();
        $send['usuarios'] = $usuModel->all();

		#chama a view
		render("livro", $send);
	}

	
	function salvar($id=null){

		$model = new Livro();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}

		#se a id de um usuario tiver sido enviada
		if (_v($_POST,'usuario_id')){
			$modelEmprestimo = new EmprestimoLivros();
			$dados = ["usuario_id"=> $_POST['usuario_id'], "livro_id"=>$id];
			$modelEmprestimo->save($dados);
		}

		
		redirect("livro/index/$id");
	}

	function deletarUsuario(int $idDoRelacionamento){
       
        $model = new EmprestimoLivros();
        $rel = $model->findById($idDoRelacionamento);
        $model->delete($idDoRelacionamento);

        redirect("livro/index/{$rel['usuario_id']}");
    }


	function deletar(int $id){
		
		$model = new Livro();
		$model->delete($id);

		redirect("livro/index/");
	}


}

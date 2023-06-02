<?php

namespace models;

class Livro extends Model {
    
    protected $table = "livros";
    #nao esqueça da ID
    protected $fields = ["id","titulo", "genero","autor_id","anopublicacao"];

    public function findById($id){
        $sql = "SELECT livros.*, autores_livros.autor AS autor FROM {$this->table} "
                ." LEFT JOIN autores_livros ON autores_livros.id = livros.autor_id "
                ." WHERE livros.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $data = [':id' => $id];
        $stmt->execute($data);
        if ($stmt == false){
            $this->showError($sql,$data);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all(){
        $sql = "SELECT livros.*, autores_livros.autor as autor FROM {$this->table} "
                ." LEFT JOIN autores_livros ON autores_livros.id = livros.autor_id ";
        
        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute();
        $list = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }
        return $list;
    }

    public function getEmprestimo_livros($idLivro){
        $sql = "SELECT * FROM usuarios
            INNER JOIN emprestimo_livros ON
                usuarios.id = emprestimo_livros.usuario_id
            WHERE emprestimo_livros.livro_id = :idLivro ";

        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute([':idLivro' => $idLivro]);

        $list = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }
        return $list;
}

    
}

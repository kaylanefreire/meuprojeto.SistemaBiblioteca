<?php

namespace models;

class EmprestimoLivros extends Model {

    protected $table = "emprestimo_livros";
    #nao esqueça da ID
    protected $fields = ["id","usuario_id","livro_id"];
   
}

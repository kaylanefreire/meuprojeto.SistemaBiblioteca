<?php

namespace models;

class AutoresLivro extends Model {

     protected $table = "autores_livros";
     #nao esqueça da ID
     protected $fields = ["id","autor", "dataNascimento","email"];

}
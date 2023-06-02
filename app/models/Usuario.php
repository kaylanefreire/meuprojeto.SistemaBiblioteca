<?php

namespace models;

class Usuario extends Model {

    protected $table = "usuarios";
    #nao esqueça da ID
    protected $fields = ["id","nome","dataNascimento","email"];
 
}
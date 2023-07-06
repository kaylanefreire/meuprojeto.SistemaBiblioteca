<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Simples</title>

    <link rel="stylesheet" href="<?=assets('bootstrap/css/bootstrap.min.css')?>" />
    <script src="<?=assets('bootstrap/js/bootstrap.bundle.min.js')?>" ></script>

    <link rel="stylesheet" href="<?=assets('css/estilo.css')?>" />
</head>
<body>

<!-- MENU -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">

  <div class="container-fluid">
    <a class="navbar-brand" href="<?=route('')?>">Documentação</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php
    #só exibirá o menu caso esteja logado
      if (isset($_SESSION['user'])):
    ?>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="<?=route('usuarios')?>">Usuários</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?=route('autores')?>">Autores</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?=route('livro')?>">Livros</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?=route('autenticacao/logout')?>">Logout</a>
        </li>
      </ul>
    </div>
  </div>
  <?php endif; ?>
</nav>

<div class="container">
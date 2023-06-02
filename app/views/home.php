<html>
<head>
    <meta charset="utf8"/>
    <title>Documentação do framework</title>
    <link rel="stylesheet" href="<?=assets('bootstrap/css/bootstrap.min.css')?>" />
</head>
<body>

<div class="container">

    <h2 class='mt-3'>"Framework" MVC simples</h2>


    <div class="card mb-3 mt-3">
        <div class="card-body">
        <h3 class="card-title">Exemplo de CRUD</h3>

        <p>Este projeto contém um exemplo de um CRUD de usuários: <a href="<?=route("usuarios")?>"><?=route("usuarios")?></a> </p>
        </div>
    </div>

    <div class="card mb-3 mt-3">
        <div class="card-body">
        <h3 class="card-title">Criando um CRUD novo</h3>

        Digamos que você vá criar um CRUD para veículos:

        <ol>
            <li>Defina o esquema da tabela no banco de dados em <b>app/database/tables.sql</b></li>
            <li>Migre/crie as tabelas para o banco acessando <a href="<?=$server_url ?>migrate.php"><?=$server_url ?>migrate.php</a>.
                <span style='color:red;'>Atenção: Toda vez que esse endereço for acessado ele irá executar todos os SQLs do tables.sql, isso pode apagar todo o seu banco. </span>
            </li>
            <li>Crie o model Veiculo em <b>app/models/Veiculo.php</b> </li>
            <li>Crie o controller VeiculosController em <b>app/controllers/VeiculosControllers.php</b> </li>
            <li>Crie a view veiculos em <b>app/views/veiculos.php</b> </li>

        </ol>
        </div>
    </div>



    <div class="card mb-3 mt-3">
        <div class="card-body">
        <h3 class="card-title">Observações</h3>

        <p>Você terá disponível a qualquer momento algumas funções e variáveis:</p>

        <table class="table">
            <tr>
                <th>dd($array)</th>
                <td>
                    Imprime o que existe dentro da variável e interrompe a execução do código.
                </td>
            </tr>
            
            <tr>
                <th>_v($_POST,"nome")</th>
                <td>
                    Essa função primeiro verifica se a chave existe no array, se existir entregará o valor, se não existir ela entregará um valor em branco.
                    Caso você tente puxar um valor que não existe, o PHP irá dar erro, use essa função para evitar erros.
                </td>
            </tr>

            <tr>
                <th>$server_url</th>
                <td>
                    Entrega para você o endereço root do seu projeto: <?=$server_url?>.
                    Essa função está disponível nas views, caso queira usar em um controller, primeiramente é preciso usar global $server_url;
                </td>
            </tr>
            <tr>
                <th>route('usuarios')</th>
                <td>
                    Entrega para você o endereço para algum controle: <?=route('usuarios')?>
                    Evite criar qualquer tipo de link sem essa função.
                </td>
            </tr>
            <tr>
                <th>assets('arquivo.js')</th>
                <td>
                    Entrega para você o endereço para algum arquivo dentro da pasta public: <?=assets('arquivo.js')?>
                    Evite incluir qualquer arquivo sem essa função.
                </td>
            </tr>
        </table>

        <p>Por fim, caso você precise de novas funções globais, inclua-as em <b>app/sys/util.php<b></p>
        </div>
    </div>
</div>
</body>
</html>

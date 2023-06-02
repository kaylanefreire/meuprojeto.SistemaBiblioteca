<?php include 'layout-top.php' ?>



<form method='POST' action='<?=route('autores/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Autor
    <input type="text" class="form-control" name="autor" value="<?=_v($data,"autor")?>" >
</label>

<label class='col-md-2'>
    Data Nascimento:
    <input type="text" class="form-control" name="dataNascimento" value="<?=_v($data,"dataNascimento")?>" >
</label>

<label class='col-md-2'>
    E-mail
    <input type="text" class="form-control" name="email" value="<?=_v($data,"email")?>" >
</label>


<!-- <label class='col-md-6'>
    Tipo
    <select name="tipo" class="form-control">
        <?php
        /*foreach($tipos as $k=>$tipo){
            _v($data,"tipo") == 1 ? $selected='selected' : $selected='';
            print "<option value='$k' $selected>$tipo</option>";
        }*/
        ?>
    </select>
</label> -->

<button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("autores")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Autor</th>
        <th>Data Nascimento</th>
        <th>E-mail</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("autores/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['autor']?></td>
            <td><?=$item['dataNascimento']?></td>
            <td><?=$item['email']?></td>
            <td>
                <a href='<?=route("autores/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>
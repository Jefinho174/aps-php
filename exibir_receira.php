
<?php
require "actions.php";

$receitaBusca = null;
foreach($listaReceitas as $struct) {
    if (intval($_GET['idreceita']) == $struct->idreceitas) {
        $receitaBusca = $struct;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <header class="main-header">
        <p>Entity: aps_lpw</p>
    </header>
    <article class="main-content">
        <div class="col-md-3">
            <ul class="lnav">
            <li><a href='ingrediente_view.php'>Cadastrar Ingredientes</a></li>
                <li><a href='receita_view.php'>Cadastrar Receita</a></li>
                <li><a href='receita_lista.php'>Exibir Receitas</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row">
            <div class="col-md-12">
                    <div class="col-sm-12 form-group">
                        <label for="grid-input-16">Nome:</label>
                        <input type="text" name="nome"  id="nome" class="form-control" value="<?= $receitaBusca->nome ?>" disabled>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label for="grid-input-16">Modo preparo:</label>
                        <textarea class="form-control" min='0' max='255' name="preparo" id="preparo" cols="30" rows="10" disabled>
                        <?= $receitaBusca->preparo ?>
                        </textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table text-center table-hover table-bordered table-blank">
                                <thead>
                                    <tr class="blue">
                                        <th>Ingrediente</th>
                                        <th>Quantidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($receitaBusca->ingredientes as $key) {
                                            foreach ($key as $ig) {
                                    ?>
                                    <tr>
                                        <td><?=$ig->ingrediente->nome?></td>
                                        <td>
                                            <?=$ig->quantidade?>
                                            <?php 
                                            if($ig->quantidade > $ig->ingrediente->estoque){
                                                $valor = $ig->quantidade - $ig->ingrediente->estoque;
                                                echo "<span class='text-danger'>Falta {$valor} para completar está recita</span>" ;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</body>
</html>

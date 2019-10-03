
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
                    <form method="POST">
                        <input type="hidden" name="idreceita" value="<?= $_GET['idreceita'] ?>"/>
                        <input type="hidden" name="action" value="cadastrar_receita_ingrediente"/>
                        <div class="col-sm-6 form-group">
                            <label for="grid-input-16">Ingrediente:</label>
                            <select class="form-control" name="idingrediente"  id="idingrediente">
                                <?php
                                    foreach ($listaIngrediente as $key) {
                                ?>
                                <option value="<?= $key->idingredientes ?>"><?= $key->nome ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="grid-input-16">Quantidade:</label>
                            <input type="number" name="quantidade"  id="quantidade" class="form-control" required>
                        </div>
                        <div class="col-sm-12 form-group">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table text-center table-hover table-bordered table-blank">
                                <thead>
                                    <tr class="blue">
                                        <th>Ingrediente</th>
                                        <th>Quantidade</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($receitaBusca->ingredientes as $key) {
                                            foreach ($key as $ig) {
                                    ?>
                                    <tr>
                                        <td><?=$ig->ingrediente->nome?></td>
                                        <td><?=$ig->quantidade?></td>
                                        <td><a class="btn btn-danger" href="?action=excluir_receita_ingrediente&id=<?=$ig->idreceitas_ingredientes?>&idreceita=<?=$_GET['idreceita']?>">Excluir</a></td>
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


<?php 
    require("actions.php");
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
                        <input type="hidden" name="action" value="cadastrar_ingrediente"/>
                        <div class="col-sm-6 form-group">
                            <label for="grid-input-16">Nome:</label>
                            <input type="text" name="nome"  id="nome" class="form-control" min='0' max='255' required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="grid-input-16">Descricao</label>
                            <input type="text" name="descricao"  id="descricao" class="form-control" min='0' max='255' required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="grid-input-16">Quantidade:</label>
                            <input type="number" name="quantidade"  id="quantidade" class="form-control" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="grid-input-16">Unidade:</label>
                            <input type="text" name="unidade" class="form-control" id="unidade" min='0' max='10' required>
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
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Unidade</th>
                                    <th>Quantidade</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($listaIngrediente as $key) {
                                ?>
                                <tr>
                                    <td><?= $key->idingredientes ?></td>
                                    <td><?= $key->nome ?></td>
                                    <td><?= $key->unidade ?></td>
                                    <td><?= $key->estoque ?></td>
                                    <td><a class="btn btn-danger" href="?action=excluir_ingrediente&id=<?= $key->idingredientes ?>">Excluir</a></td>
                                </tr>
                                    <?php } ?>
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


<?php
require "actions.php";
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
                        <input type="hidden" name="action" value="cadastrar_receita"/>
                        <input type="hidden" name="id" value="<?= (count($listaReceitas) + 1) ?>"/>
                        <div class="col-sm-12 form-group">
                            <label for="grid-input-16">Nome:</label>
                            <input type="text" name="nome"  id="nome" class="form-control" min='0' max='255' required>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="grid-input-16">Modo preparo:</label>
                            <textarea class="form-control" min='0' max='255' name="preparo" id="preparo" cols="30" rows="10" required></textarea>
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
                                    <th>Preparo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($listaReceitas as $key) {
                                ?>
                                    <tr>
                                        <td><?= $key->idreceitas?></td>
                                        <td><?= $key->nome ?></td>
                                        <td><?= $key->preparo ?></td>
                                        <td>
                                            <a class="btn btn-primary" href="receita_add_ingrediente_view.php?idreceita=<?=$key->idreceitas?>">Visualizar</a>
                                            <a class="btn btn-danger" href="?action=excluir_receita&id=<?=$key->idreceitas?>">Excluir</a>
                                        </td>
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

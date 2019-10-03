
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
                                            <a class="btn btn-primary" href="exibir_receira.php?idreceita=<?=$key->idreceitas?>">Visualizar</a>
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

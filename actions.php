<?php
spl_autoload_register(function ($class) {
    if (file_exists("$class.php")) {
        require_once ("$class.php");
        return true;
    }
});

use Config\Connection;
use Entidades\Ingrediente;
use Entidades\Receita;
use Entidades\ReceitaIngrediente;

$connection = Connection::GetConnection();

if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    switch ($action) {
        case "cadastrar_ingrediente":
            $ig = new Ingrediente($_REQUEST['nome'], $_REQUEST['descricao'], $_REQUEST['unidade'], intval($_REQUEST['quantidade']));
            $stmt = $connection->prepare('INSERT INTO ingredientes (nome, descricao, unidade, estoque) VALUES (:nome, :descricao, :unidade, :estoque)');
            $stmt->bindParam(':nome',$ig->nome, PDO::PARAM_STR);
            $stmt->bindParam(':descricao',$ig->descricao, PDO::PARAM_STR);
            $stmt->bindParam(':unidade',$ig->unidade, PDO::PARAM_STR);
            $stmt->bindParam(':estoque',$ig->estoque, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header("Refresh:0");
            }
            break;
        case "excluir_ingrediente":
            $idAction = intval($_GET['id']);
            $stmt = $connection->prepare('DELETE FROM ingredientes WHERE idingredientes = :id');
            $stmt->bindParam(':id',$idAction, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header("Refresh:0; url=ingrediente_view.php");
            }
            break;
        case "cadastrar_receita":
            $rc = new Receita($_REQUEST['nome'], $_REQUEST['preparo']);
            $rc->idreceitas = intval($_REQUEST['id']);
            $stmt = $connection->prepare('INSERT INTO receitas (idreceitas,nome,preparo) VALUES (:id,:nome,:preparo)');
            $stmt->bindParam(':id',$rc->idreceitas, PDO::PARAM_INT);
            $stmt->bindParam(':nome',$rc->nome, PDO::PARAM_STR);
            $stmt->bindParam(':preparo',$rc->preparo, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header("Refresh:0");
            }
            break;
        case "excluir_receita":
            $idAction = intval($_GET['id']);
            $stmt = $connection->prepare('DELETE FROM receitas WHERE idreceitas = :id');
            $stmt->bindParam(':id',$idAction, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header("Refresh:0; url=receita_view.php");
            }
            break;
        case "cadastrar_receita_ingrediente":
            $rc = new ReceitaIngrediente(intval($_POST['idreceita']), intval($_POST['idingrediente']),intval($_POST['quantidade']));
            $stmt = $connection->prepare('INSERT INTO receitas_ingredientes (id_receitas,id_ingredientes,quantidade) VALUES (:id_receitas,:id_ingredientes,:quantidade)');
            $stmt->bindParam(':id_receitas',$rc->id_receitas, PDO::PARAM_INT);
            $stmt->bindParam(':id_ingredientes',$rc->id_ingredientes, PDO::PARAM_INT);
            $stmt->bindParam(':quantidade',$rc->quantidade, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header("Refresh:0 url=receita_add_ingrediente_view.php?idreceita={$rc->id_receitas}");
            }
            break;
        case "excluir_receita_ingrediente":
            $idAction = intval($_GET['id']);
            $idreceita = intval($_GET['idreceita']);
            $stmt = $connection->prepare('DELETE FROM receitas_ingredientes WHERE idreceitas_ingredientes = :id');
            $stmt->bindParam(':id',$idAction, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header("Refresh:0 url=receita_add_ingrediente_view.php?idreceita={$idreceita}");
            }
            break;
    }
}

// LISTAR SEMPRE OS INGREDINTES
$stmt = $connection->prepare('SELECT * FROM ingredientes');
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_CLASS, 'Entidades\Ingrediente');
$listaIngrediente = $stmt->fetchAll();

// LISTAR SEMPRE OS RECEITA
$stmt = $connection->prepare('SELECT * FROM receitas');
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_CLASS, 'Entidades\Receita');
$listaReceitas = $stmt->fetchAll();
foreach ($listaReceitas as $receitas) {
    $stmt = $connection->prepare('SELECT * FROM receitas_ingredientes WHERE id_receitas = :id_receitas');
    $stmt->bindParam(':id_receitas',$receitas->idreceitas, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Entidades\ReceitaIngrediente');
    $listaReceitasIngredientes = $stmt->fetchAll();
    foreach ($listaReceitasIngredientes as $receitasIngredientes) {
        $stmt = $connection->prepare('SELECT * FROM ingredientes WHERE idingredientes = :idingredientes');
        $stmt->bindParam(':idingredientes',$receitasIngredientes->id_ingredientes, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Entidades\Ingrediente');
        $receitasIngredientes->setIngrediente($stmt->fetch());
    }
    array_push($receitas->ingredientes,$listaReceitasIngredientes);
}

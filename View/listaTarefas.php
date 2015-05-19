<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=GBK">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="Resources/css/style.css">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="Resources/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="Resources/css/bootstrap-theme.min.css" />

    <!-- Latest compiled and minified JavaScript -->
    <script src="Resources/js/bootstrap.min.js"></script>
    <title>Lista Tarefa</title>
</head>
<body>

<h2>Lista tarefas</h2>
<?php
require_once '../Model/tarefa.php';
require_once '../DAO/tarefaDao.php';

$tarefaDao = new tarefaDao();
$tarefas = $tarefaDao->selectAll();

/*
echo "<pre>";
print_r($tarefas);
exit();*/

?>
<a href="menuTarefas.php">Menu tarefas</a>
<table class="table  table-striped table-bordered table-condensed">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Ativo</th>
        <th>Editar</th>
        <th>Remover</th>
    </tr>
    <?php
    foreach ( $tarefas as $tarefa ) {
        ?>
        <tr>
            <td><?=$tarefa->getID();?></td>
            <td ><?=$tarefa->getNome();?></td>
            <td><?=$tarefa->getAtivo();?></td>
            <td><a href="editaTarefa.php?id=<?=$tarefa->getID()?>" >Editar</a></td>
            <td><a href="deletaTarefa.php?id=<?=$tarefa->getID()?>" >Remover</a></td>
        </tr>
    <?php
    }
    ?>
</table>
</body>
</html>
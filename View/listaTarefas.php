<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=GBK">
    <link rel="stylesheet" type="text/css" href="Resources/style.css">
    <title>Lista Tarefa</title>
</head>
<body>

<h2>Lista tarefas</h2>
<?php
require_once '../Model/Tarefa.php';
require_once '../DAO/tarefaDao.php';

$tarefaDao = new tarefaDao();
$tarefas = $tarefaDao->selectAll();

/*
echo "<pre>";
print_r($tarefas);
exit();*/

?>
<a href="AdminTarefas.php">Menu tarefas</a>
<table>
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
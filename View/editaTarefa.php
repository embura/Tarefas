<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>Edita Tarefa</title>
</head>
<body>
<h2>Edita Tarefa</h2>
<a href="adminTarefas.php">Menu tarefas</a>
<?php
require_once '../Model/Tarefa.php';
require_once '../DAO/tarefaDao.php';

session_start ();

$tarefa = new Tarefa();
$tarefaDao = new tarefaDao ();


if ($_REQUEST ['id']) {
    $id = $_REQUEST ['id'];
    $tarefa = $tarefaDao->getTarefa ( $id );
    $_SESSION ['id'] = $id;
    $checked = ($tarefa->getAtivo () == '1') ? 'checked' : '';
}



if ($_REQUEST ['gravar']) {
    $arrayForm = $_REQUEST;
    $id = $_SESSION['id'];
    $ativo = ($arrayForm ['ativo'] == 'true') ? 1 : 0;

    $tarefa->setID ( $id );
    $tarefa->setNome ( $arrayForm ['nome'] );
    $tarefa->setDescricao ( $arrayForm ['descricao'] );
    $tarefa->setAtivo ( $ativo );

    if ($tarefaDao->update ( $tarefa )) {
        header("location:listaTarefas.php");
    }
}

$checked = ($tarefa->getAtivo () == '1') ? 'checked' : '';
unset ( $_SESSION );

?>
<form method="post" action="editaTarefa.php">
    ID: <input type="text" name="nome" id="nome" value="<?=$tarefa->getID();?>" disabled ><br />
    Nome <input type="text" name="nome" id="nome" value="<?=$tarefa->getNome();?>" /><br >
    Descricao <textarea name="descricao" rows="4" cols="50"><?=$tarefa->getDescricao();?></textarea><br />
    Ativo <input type="checkbox" name="ativo" value='true' <?=$checked?> > <br />
    <input type="submit" name="gravar" value="gravar "  ><br />
</form>
</body>
</html>
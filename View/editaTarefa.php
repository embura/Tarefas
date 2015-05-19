<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>Edita Tarefa</title>

    <script type="text/javascript" src="Resources/js/jquery-1.11.3.min.js" ></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="Resources/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="Resources/css/bootstrap-theme.min.css" />

    <!-- Latest compiled and minified JavaScript -->
    <script src="Resources/js/bootstrap.min.js"></script>
</head>
<body>

<?php
require_once '../Model/tarefa.php';
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



if (isset($_REQUEST ['gravar'])) {

    $arrayForm = $_REQUEST;
    $id = $_SESSION['id'];
    $ativo = ($arrayForm ['ativo'] == 'true') ? 1 : 0;

    $tarefa->setID ( $id );
    $tarefa->setNome ( $arrayForm ['nome'] );
    $tarefa->setDescricao ( $arrayForm ['descricao'] );
    $tarefa->setAtivo ( $ativo );

    if ($tarefaDao->update ( $tarefa )) {
        header("location:listaTarefas.php");
    }else{
        echo '<p class="alert alert-danger" role="alert">Tarefa não inserrida</p>';
    }

}

$checked = ($tarefa->getAtivo () == '1') ? 'checked' : '';
unset ( $_SESSION );

?>

<div class="page-header">
    <h1>Edita Tarefa</h1>
</div>

<a href="menuTarefas.php"><span class="glyphicon glyphicon-arrow-left" ></span>Menu tarefas</a>
<div class="container">
    <form method="post" action="editaTarefa.php">

        <div class="form-group">
            <label for="nome">ID :</label>
            <input type="text" name="nome" id="nome" value="<?=$tarefa->getID();?>"  disabled><br />
        </div>
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="<?=$tarefa->getNome();?>"/>
        </div>
        <div class="form-group">
            <label>Descricao </label>
            <textarea name="descricao" class="form-control" rows="4" placeholder="Descrição da Tarefa"><?=$tarefa->getDescricao();?></textarea>
        </div>
        <div class="form-group">
            <label>Ativo </label>
            <input type="checkbox" class="" name="ativo" value="true" <?=$checked?> />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-default" name="gravar" value="gravar " />
        </div>

    </form>
</div>
</body>
</html>
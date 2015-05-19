<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=GBK">
    <title>Adiciona Tarefa</title>
    <script type="text/javascript" src="Resources/js/adicinaTarefa.js" ></script>
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

if (isset($_REQUEST ['gravar'])) {
    $tarefa = new Tarefa ();

    require_once '../DAO/tarefaDao.php';
    $tarefaDao = new tarefaDao ();

    $arrayForm = $_REQUEST;

    $ativo = ($arrayForm['ativo'] == 'true')?'1':'0';

    $tarefa->setNome ( $arrayForm ['nome'] );
    $tarefa->setDescricao ( $arrayForm ['descricao'] );
    $tarefa->setAtivo ( $ativo );


    if ($tarefaDao->insert ( $tarefa )) {

        echo '<p class="alert alert-success" role="alert">Tarefa adicionada com sucesso</p>';
    }else{
        echo '<p class="alert alert-danger" role="alert">Tarefa não adicionada</inser>ida</p>';
    }

}
?>

<div class="page-header">
    <h1>Adiciona Tarefa</h1>
</div>

<a href="menuTarefas.php"><span class="glyphicon glyphicon-arrow-left" ></span>Menu tarefas</a>

<div class="adicionaTarefa">
    <div class="container adicionaTarefa">
        <form method="post" class="form-group" action="adicionaTarefa.php" id="adicionaTarefa">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome da Tarefa" required autofocus/>
            </div>
            <div class="form-group">
                <label for="descricao">Descricao </label>
                <textarea name="descricao" class="form-control" rows="4" placeholder="Descrição da Tarefa" required></textarea>
            </div>
            <div class="form-group">
                <label for="ativo">Ativo </label>
                <input type="checkbox" class="" name="ativo" value="true" checked />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg btn-block" name="gravar" value="gravar " />
            </div>
        </form>
    </div>
<div>

</body>

</html>
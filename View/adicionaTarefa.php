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

<h2>Adiciona tarefas</h2>
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
        echo '<p class="alert-success">Tarefa inserida com sucesso</p>';

    }
}
?>
<p>
    <a href="adminTarefas.php">Menu tarefas</a>
</p>

<div class="panel-group" sytle="width:300px">
    <form method="post" class="form-horizontal" action="adicionaTarefa.php" id="adicionaTarefa">
        <div>
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome da Tarefa"/>
        </div>
        <div>
            <label>Descricao </label>
            <textarea name="descricao" class="form-control" rows="4" cols="50" placeholder="Descrição da Tarefa"></textarea>
        </div>
        <div>
            <label>Ativo </label>
            <input type="checkbox" class="" name="ativo" value="true" checked />
        </div>
        <input type="submit" class="btn btn-default" name="gravar" value="gravar " />
    </form>
</div>

</body>

</html>
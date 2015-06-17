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


    <script type="text/javascript" src="Resources/js/tarefa.js" ></script>
    <link rel="stylesheet" href="Resources/css/style.css">
</head>
<body>
<?php
if(!defined('ROOT_DIR'))
    define('ROOT_DIR',$_SERVER['DOCUMENT_ROOT'].'/Tarefas/');

require_once ROOT_DIR.'/Model/tarefa.php';
require_once ROOT_DIR.'/DAO/tarefaDao.php';

session_start ();


$tarefaDao = new tarefaDao ();

$id = $_REQUEST ['id'];
$tarefa = $tarefaDao->find ( $id );
$_SESSION ['id'] = $id;
$checked = ($tarefa->getAtivo () == '1') ? 'checked' : '';

?>

<div class="page-header">
    <h1>Edita Tarefa</h1>
</div>

<a href="menuTarefas.php"><span class="glyphicon glyphicon-arrow-left" ></span>Menu tarefas</a>
<div class="adicionaTarefa">
    <div class="container">
        <form method="post" class="form-group" action="actions/edita.php">

            <div class="form-group">
                <label for="id">ID :</label>
                <input type="text" name="id" id="id" value="<?=$tarefa->getID();?>"  ><br />
            </div>
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="<?=$tarefa->getNome();?>" required>
            </div>
            <div class="form-group">
                <label>Descrição </label>
                <textarea name="descricao" class="form-control" rows="4" placeholder="Descrição da Tarefa" required><?=$tarefa->getDescricao();?></textarea>
            </div>



            <div class="form-group form-inline" >
                <label for="ativo">Ativo </label>
                <input type="checkbox" class="" name="ativo" value="true" <?=$checked?> >
                <span class="col-md-offset-1"></span>
                <label for="dataFinalizacao">Data Finalização</label>
                <input type="date" class="form-control" name="dataFinalizacao" value="<?=$tarefa->getDataFinalizacao();?>" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default" name="gravar" value="gravar " >Gravar</button>
            </div>

        </form>
    </div>
</div>
</body>
</html>
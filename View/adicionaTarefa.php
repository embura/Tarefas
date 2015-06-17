<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=GBK">
    <title>Adiciona Tarefa</title>


    <script type="text/javascript" src="Resources/js/jquery-1.11.3.min.js" ></script>
    <script type="text/javascript" src="Resources/js/tarefa.js" ></script>
    <link rel="stylesheet" href="Resources/css/style.css">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="Resources/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="Resources/css/bootstrap-theme.min.css" />

    <!-- Latest compiled and minified JavaScript -->
    <script src="Resources/js/bootstrap.min.js"></script>

    <script>
    </script>

    <style>
        :invalid {
            outline: 1px solid #cc0000;
        }

    </style>

</head>
<body>


<div class="page-header">
    <h1>Adiciona Tarefa</h1>
</div>
<div id="resultAjax"></div>

<p>
    <a href="listaTarefas.php">
        <span class="glyphicon glyphicon-arrow-left" ></span>Lista Tarefas
    </a>
</p>

<div class="col-md-10 col-md-offset-1">
    <div class="container">
        <form role="form" method="POST" class="form-group"  data-async action="actions/adiciona.php" id="adicionaTarefa">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome da Tarefa" required autofocus/>
            </div>

            <div class="form-group">
                <label for="descricao">Descricao </label>
                <textarea name="descricao" class="form-control" rows="4" placeholder="Descrição da Tarefa" required></textarea>
            </div>

            <div class="form-group form-inline" >
                <label for="ativo">Ativo </label>
                <input type="checkbox" class="checkbox" name="ativo" value="true" checked />
                <span class="col-md-offset-1"></span>
                <label for="dataFinalizacao">Data Finalização</label>
                <input type="date" class="form-control" name="dataFinalizacao" required>
            </div>


            <div class="form-group" >
                <input type="button" class="btn bg-primary " value="gravar " id="btn-submit"/>
            </div>
        </form>
    </div>
    <div>

</body>

</html>
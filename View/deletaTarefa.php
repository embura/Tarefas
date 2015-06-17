<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title>Delete Tarefa</title>
</head>
<body>

	<h2>Remove tarefas</h2>
<?php

require_once '../DAO/tarefaDao.php';
$tarefaDao = new tarefaDao ();

if($_REQUEST['id']){
    $id = $_REQUEST['id'];

	if($tarefaDao->delete($id)){
        header("location:listaTarefas.php");
    }
}

?>
<a href="listaTarefas.php">Menu tarefas</a>
</body>
</html>



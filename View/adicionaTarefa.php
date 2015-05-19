<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title>Adiciona Tarefa</title>
</head>
<body>

	<h2>Adiciona tarefas</h2>
<?php
require_once '../Model/tarefa.php';
$gravar = $_REQUEST ['gravar'];

if ($_REQUEST ['gravar']) {
	$tarefa = new tarefa ();
	
	require_once '../DAO/tarefaDao.php';
	$tarefaDao = new tarefaDao ();
	
	$arrayForm = $_REQUEST;
	
	$ativo = ($arrayForm['ativo'] == 'true')?'1':'0';
	
	$tarefa->setNome ( $arrayForm ['nome'] );
	$tarefa->setDescricao ( $arrayForm ['descricao'] );
	$tarefa->setAtivo ( $ativo );
	

	if ($tarefaDao->insert ( $tarefa )) {
		echo "Tarefa adicionada";
	}
}
?>
<a href="AdminTarefas.php">Menu tarefas</a>
	<form method="post" action="adicionaTarefa.php">
		Nome <input type="text" name="nome" id="nome" /><br /> Descricao
		<textarea name="descricao" rows="4" cols="50"></textarea>
		<br /> Ativo <input type="checkbox" name="ativo" value="true"
			checked="checked" /><br /> Gravar <input type="submit" name="gravar"
			value="gravar " /><br />
	</form>

</body>

</html>
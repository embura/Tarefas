<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title>Tabela</title>
<style>
table,th,td {
	border: 1px solid black;
	border-collapse: collapse;
}

td {
	padding: 10px;
	width: 10px;
}

.fundoPreto {
	background-color: black;
}
</style>
</head>
<body>
<?php
$linhas = 9;
$colunas = 9;
$tmp = $linhas;

echo "<table >";
for($l = 0; $l < $linhas; $l ++) {
	$tmp --;
	echo "<tr>";
	for($c = 0; $c < $colunas; $c ++) {
		if ($l == $c) {
			echo "<td class='fundoPreto'> &nbsp; &nbsp; </td>";
		} elseif ($c == $tmp) {
			echo "<td class='fundoPreto'> &nbsp; &nbsp; </td>";
		} else {
			echo "<td> &nbsp;&nbsp;&nbsp;&nbsp; </td>";
		}
	}
	echo "</tr>";
}
echo "</table>";
?>
</body>
</html>
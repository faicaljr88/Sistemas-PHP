<?php 

$id = filter_input(INPUT_GET, "id");
$nome = filter_input(INPUT_GET, "nome");
$telefone = filter_input(INPUT_GET, "telefone");

$link = mysql_connect("localhost", "root", "1234");
mysql_select_db("agenda");

if($link){
	$query = mysql_query("UPDATE contato SET nome ='$nome', telefone = '$telefone' WHERE id = '$id';");
	if($query){
		header("Location: index.php");
	}else{
		var_dump("Erro $query");
		mysql_error($link);		//die("erro:" mysql_error($link));	
	}
}else{
	var_dump("Erro $link");
	//die("erro:" mysql_error($link));
}

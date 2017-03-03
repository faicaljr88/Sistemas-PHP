<?php
$id = filter_input(INPUT_GET, "id");

$link = mysql_connect("localhost", "root", "1234");
mysql_select_db("agenda");

if($link){
	$query = mysql_query("DELETE FROM contato WHERE id = '$id';");
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
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<?php 
		$parametro = filter_input(INPUT_GET, "parametro");
		$mysqlLink = mysql_connect('localhost', 'root', '1234');
		mysql_select_db("agenda");

		if($parametro){
			$dados = mysql_query("SELECT * FROM contato WHERE nome LIKE '$parametro%' ORDER BY nome");
		}else{
			$dados = mysql_query("SELECT * FROM contato ORDER BY nome");
		} 

		$linha = mysql_fetch_assoc($dados);
		$total = mysql_num_rows($dados);

		?>
		<title>Agenda</title>		
	</head>
	<body>
		<div class="container">
    		<div class="row">
    			<h3>PHP CRUD</h3>
    		</div>
			<div class="row">
				<table class="table table-striped table-bordered">
		              <thead>
		              	<div class="form-group">
			              	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>">
			              		<div class="row col-lg-10">
			              			<input class="form-control" type="text" name="parametro">
			              			<input class="form-control btn btn-success" type="submit" value="Buscar">
			              		</div>
			              	</form>
		              	</div>
		                <tr>
		                  <th>ID</th>
		                  <th>Nome</th>
		                  <th>Telefone</th>
		                </tr>
		                <?php
			                 if($total){ 
			                 	do{     	
				                	echo '<tr>';
									echo '<td>'. $linha['id'] . '</td>';
									echo '<td>'. $linha['nome'] . '</td>';
									echo '<td>'. $linha['telefone'] . '</td>';
									echo '<td width=250>';
									echo '<a class="btn btn-default" href="read.php?id='.$linha['id']. '&nome='.$linha['nome'].'&telefone='.$linha['telefone'].'">Ler</a>';
									echo '&nbsp;';
									echo '<a class="btn btn-success" href="alterar.php?id='.$linha['id'].'&nome='.$linha['nome'].'&telefone='.$linha['telefone'].'">Alterar</a>';
									echo '&nbsp;';
									echo '<a class="btn btn-danger" href="delete.php?id='.$linha['id'].'">Excluir</a>';
									echo '</td>';
									echo '</tr>';
								}
								while($linha = mysql_fetch_array($dados));
								mysql_close("mysqlLink");
							}
		                ?>
		              </thead>
	            </table>
    		</div>
    	</div>
	</body>
</html>
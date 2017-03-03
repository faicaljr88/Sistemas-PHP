<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<?php 
		$id = filter_input(INPUT_GET, "id");
		$nome = filter_input(INPUT_GET, "nome");
		$telefone = filter_input(INPUT_GET, "telefone");

		$link = mysql_connect("localhost", "root", "1234");
		mysql_select_db("agenda");

		$query = mysql_query("SELECT * FROM contato WHERE id='$id'");

		$linha = mysql_fetch_assoc($query);
		$total = mysql_num_rows($query);
		?>
		<title>Contato</title>		
	</head>
	<body>
		<div class="container">
    		<div class="row">
    			<h3>Contato - <?php echo $nome?></h3>
    		</div>
			<div class="row">
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>ID</th>
		                  <th>Nome</th>
		                  <th>Telefone</th>
		                </tr>
		                <?php
			                 if($total){ 
			                 	     	
				                	echo '<tr>';
									echo '<td>'. $linha['id'] . '</td>';
									echo '<td>'. $linha['nome'] . '</td>';
									echo '<td>'. $linha['telefone'] . '</td>';
									echo '</tr>';
								
								mysql_close("mysqlLink");
							}
		                ?>
		              </thead>
	            </table>
    		</div>
    	</div>
	</body>
</html>
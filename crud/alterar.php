<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Alterar Contato</title>
	<?php  
		$id = filter_input(INPUT_GET, "id");
		$nome = filter_input(INPUT_GET, "nome");
		$telefone = filter_input(INPUT_GET, "telefone");
	?>
</head>
<body>
	<div class="container">
		<div class="row">
			<h3>Agenda - Alterar contato</h3>
		</div>
		<div class="form-group">
			<form action="update.php">
				<div>
					<input type="hidden" name="id" value="<?php echo $id ?>">
				</div>
				<div class="row col-lg-10">
					<label for="nome">Nome</label>
					<input class="form-control" type="text" name="nome" id="nome" value="<?php echo $nome ?>">
				</div>
				<div class="row col-lg-10">
					<label for="telefone">Telefone</label>
					<input class="form-control" type="text" name="telefone" id="telefone" value="<?php echo $telefone ?>">
				</div>
				<div class="row col-lg-10">
					<input class="btn btn-success" type="submit" value="Alterar">
				</div>	
			</form>
		</div>
	</div>
</body>
</html>
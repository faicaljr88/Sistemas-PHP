<?php
	// header("Content-type: text/html; charset=utf-8");
	spl_autoload_register(function($class_name){
		require_once 'classes/' . $class_name . '.php';
	});
?>
<!DOCTYPE HTML>
<html land="pt-BR">
<head>
   <title>PHP OO</title>
<meta name="description" content="PHP OO" />
<meta name="robots" content="index, follow" />
<meta charset="UTF-8"/>
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" />
  <!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
</head>
<body>
	<div class="container">
	<?php
	$usuario = new Usuarios();

	if(isset($_POST['cadastrar'])){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$idade = $_POST['idade'];

		if($nome == ''){
			echo "Nome vazio";
			return false;
		}
		if($idade == ''){
			echo "Idade vazio";
			return false;
		}
		if($email == ''){
			echo "E-mail vazio";
			return false;
		}

		$usuario->setNome($nome);
		$usuario->setEmail($email);
		$usuario->setIdade($idade);
		$usuario->insert();

	}

	?>
	<header class="masthead">
			<h1 class="muted">PHP OO - Cadastro de Usuários</h1>
			<nav class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<ul class="nav">
							<li><a href="index.php">Página inicial</a></li>
						</ul>
					</div>
				</div>
			</nav>
	</header>

	<?php
	if(isset($_POST['atualizar'])){
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$idade = $_POST['idade'];


		$usuario->setNome($nome);
		$usuario->setEmail($email);
		$usuario->setIdade($idade);
		$usuario->update($id);
		header("Location: index.php");
	}

	if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'){
		$id = (int)$_GET['id'];

		$usuario->delete($id);
	}

	?>

	<?php 
	if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
		$id = (int)$_GET['id'];
		$resultado = $usuario->find($id);
	?>
	<form method="post" action="">
		<input type="hidden" name="id" value="<?php echo $resultado->id; ?>"/>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-user"></i></span>
			<input type="text" name="nome" value="<?php echo $resultado->nome; ?>" />
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-envelope"></i></span>
			<input type="text" name="email" value="<?php echo $resultado->email; ?>" />
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-flag"></i></span>
			<input type="text" name="idade" value="<?php echo $resultado->idade; ?>" />
		</div>
		<br />
			<input type="submit" name="atualizar" class="btn btn-success" value="Atualizar dados">
			<a href="index.php" class="btn btn-danger">Cancelar</a>					
	</form>
	<?php }else{ ?>

	<form method="post" action="">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-user"></i></span>
			<input type="text" name="nome" placeholder="Nome:" />
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-envelope"></i></span>
			<input type="text" name="email" placeholder="E-mail:" />
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-flag"></i></span>
			<input type="text" name="idade" placeholder="Idade:" />
		</div>
		<br />
			<input type="submit" name="cadastrar" class="btn btn-success" value="Cadastrar dados">					
	</form>
	<?php } ?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome:</th>
				<th>E-mail:</th>
				<th>Idade:</th>
				<th>Ações:</th>
			</tr>
		</thead>
		<?php foreach($usuario->findAll() as $key => $value){ ?>
		<tbody>
			<tr>
				<td><?php echo $value->id; ?></td>
				<td><?php echo $value->nome; ?></td>
				<td><?php echo $value->email; ?></td>
				<td><?php echo $value->idade; ?></td>
				<td><?php echo "<a href='index.php?acao=editar&id=". $value->id ."' class='btn btn-warning'> Editar</a>"; ?> - 
					<?php echo "<a href='index.php?acao=deletar&id=". $value->id ."' onclick='return confirm(\"Gostaria de deletar o Usuário ". $value->nome ."?\");' class='btn btn-danger'> Deletar</a>"; ?>
					
				</td>
			</tr>
		</tbody>
		<?php } ?>
	</table>
	<script src="js/jQuery.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>
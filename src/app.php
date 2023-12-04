<?php

$acao = 'recuperar';
require 'tarefa_controller.php';

session_start();

require_once('conexao.php');
require_once('obterUsername.php');


?>

<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>App Lista Tarefas</title>

	<link rel="stylesheet" href="..\css\estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


	<script>
		function editar(id, txt_tarefa) {

			//criar um form de edição
			let form = document.createElement('form')
			form.action = 'tarefa_controller.php?acao=atualizar'
			form.method = 'post'
			form.className = 'row'

			//criar um input para entrada do texto
			let inputTarefa = document.createElement('input')
			inputTarefa.type = 'text'
			inputTarefa.name = 'tarefa'
			inputTarefa.className = 'col-9 form-control'
			inputTarefa.value = txt_tarefa

			//criar um input hidden para guardar o id da tarefa
			let inputId = document.createElement('input')
			inputId.type = 'hidden'
			inputId.name = 'id'
			inputId.value = id

			//criar um button para envio de form
			let button = document.createElement('button')
			button.type = 'submit'
			button.className = 'col-3 btn btn-info'
			button.innerHTML = 'Atualizar'

			//incluir inputTarefa no form
			form.appendChild(inputTarefa)

			//incluir inputId no form
			form.appendChild(inputId)

			//incluir o button no form
			form.appendChild(button)

			//teste
			//console.log(form)

			//alert(txt_tarefa)

			let tarefa = document.getElementById('tarefa_' + id)

			//limpar o texto da tarefa para a inclusão do form
			tarefa.innerHTML = ''

			//incluir form na pagina
			tarefa.insertBefore(form, tarefa[0])
		}

		function remover(id) {
			location.href = 'todas_tarefas.php?acao=remover&id=' + id;
		}

		function marcarRealizada(id) {
			location.href = 'todas_tarefas.php?acao=marcarRealizada&id=' + id;
		}
	</script>
</head>

<body>
	<header>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="Home.php">
					<img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas

					<?php
					if (isset($_SESSION['username'])) {
						// Se o usuário estiver logado, exibe o nome de usuário
						$conexao = new Conexao();
						$username = obterUsername($conexao, $_SESSION['username']);
						echo '<a style="text-decoration: none; color: #222; font-weight: bold;">' . $username . '</a>';
					} else {
						// Caso contrário, exibe um link para o login
						echo '<a href="login.php">Login</a>';
					}
					?>
				</a>
			</div>
		</nav>
	</header>

	<div class="container app">
		<div class="row">
			<div class="col-md-3 menu">
				<ul class="list-group">
					<li class="list-group-item active"><a href="app.php">Tarefas pendentes</a></li>
					<li class="list-group-item"><a href="NovaTarefa.php">Nova tarefa</a></li>
					<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
				</ul>
			</div>

			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Tarefas pendentes</h4>
							<hr />

							<?php foreach ($tarefas as $indice => $tarefa) { ?>
								<?php if ($tarefa->status == 'pendente') { ?>
									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
											<?= $tarefa->tarefa ?> (<?= $tarefa->status ?>)
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>)"></i>
											<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
											<i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?= $tarefa->id ?>)"></i>

										</div>
									</div>
								<?php } ?>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
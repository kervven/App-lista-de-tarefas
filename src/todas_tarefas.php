<?php

$acao = 'recuperar';
require 'tarefa_controller.php';

session_start();



require_once('conexao.php');
require_once('obterUsername.php');


?>




<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>App Lista Tarefas</title>

	<link rel="stylesheet" href="..\css\estilo.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-/rXcKAW8UmN5dSNOZZu6RvSiaAqd3EXyt2bEGi7fiq0jI2lnQ+Ay+5H/wIqE5KZJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoWjFIm5zXpV" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="Home.php">
                <img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
              TaskMaster
            </a>
            <?php
            if (isset($_SESSION['username'])) {
        
                $conexao = new Conexao();
                $username = obterUsername($conexao, $_SESSION['username']);
                echo '<div class="dropdown">';
                echo '<a style="text-decoration: none; color: #222; font-weight: bold;" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bem-vindo, ';
                echo $username;
                echo '</a>';
                echo '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
                echo '<a style="text-decoration: none; color: #222; font-weight: bold;" class="dropdown-item" href="#" onclick="logout()">Logout</a>';
                echo '</div>';
                echo '</div>';
            } else {
				header("Location: 404.php");
				exit();
            }
            ?>
        </div>
    </nav>
</header>


	<div class="container app">

		<div class="row">
			<div class="col-sm-3 menu">
				<ul class="list-group">
					<li class="list-group-item"><a href="app.php">Tarefas pendentes</a></li>
					<li class="list-group-item"><a href="NovaTarefa.php">Nova tarefa</a></li>
					<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
				</ul>
			</div>

			<div class="col-sm-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Todas tarefas</h4>
							<hr />

							<?php foreach ($tarefas as $indice => $tarefa) { ?>
								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
										<?= $tarefa->tarefa ?> (
										<?= $tarefa->status ?>)
									</div>
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>)"></i>


										<?php if ($tarefa->status == 'pendente') { ?>
											<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
											<i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?= $tarefa->id ?>)"></i>
										<?php } ?>
									</div>
								</div>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script>
		function logout() {
			Swal.fire({
				title: 'Deseja realmente sair?',
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: 'Sim',
				cancelButtonText: 'Não'
			}).then((result) => {
				if (result.isConfirmed) {
					// Faça o logout e redirecione para home.php
					window.location.href = 'Home.php';
				}
			});
		}
	</script>

</body>

</html>
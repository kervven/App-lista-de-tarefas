<html>
<?php

session_start();


require_once('conexao.php');
require_once('obterUsername.php');


?>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>App Lista Tarefas</title>

	<link rel="stylesheet" href="..\css\estilo.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoWjFIm5zXpV" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
				
            }
            ?>
        </div>
    </nav>
</header>

	<?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
		<div class="bg-success pt-2 text-white d-flex justify-content-center">
			<h5>Tarefa inserida com sucesso</h5>
		</div>
		<?php } ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="app.php">Tarefas pendentes</a></li>
						<li class="list-group-item active"><a href="NovaTarefa.php">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Nova tarefa</h4>
								<hr />

								<form method="post" action="tarefa_controller.php?acao=inserir">
									<div class="form-group">
										<label>Descrição da tarefa:</label>
										<input type="text" class="form-control" name="tarefa" placeholder="Exemplo: Lavar o carro">
									</div>

									<button class="btn btn-success">Cadastrar</button>
								</form>
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
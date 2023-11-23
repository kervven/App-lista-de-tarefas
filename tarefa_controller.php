<?php

    require "tarefa.model.php";
    require "tarefa.service.php";
    require "conexao.php";

    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->inserir();

?>
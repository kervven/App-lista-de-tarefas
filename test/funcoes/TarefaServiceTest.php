<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Tarefa.php';
require_once __DIR__ . '/../../src/TarefaService.php';
require_once __DIR__ . '/../../src/Conexao.php';

class TarefaServiceTest extends TestCase
{
    public function testInserir()
    {
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', 'Tarefa de Teste'); 
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $this->assertNull($tarefaService->inserir());
    }

    public function testAtualizar()
    {
        //Ajustar o id e a tarefa conforme necessário para o seu ambiente de teste. Aqui eu quis atualizar o ID 18.
        $tarefa = new Tarefa();
        $tarefa->__set('id', 18);
        $tarefa->__set('tarefa', 'Tarefa Atualizada');
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $this->assertTrue($tarefaService->atualizar());
    }
    
    public function testMarcarRealizada()
    {
      //Ajustar o id e a tarefa conforme necessário para o seu ambiente de teste.
        $tarefa = new Tarefa();
        $tarefa->__set('id', 20);
        $tarefa->__set('id_status', 2); //  2 é o ID para o status "Realizada"
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $this->assertTrue($tarefaService->marcarRealizada());
    }

    public function testRemover()
    {   

        $tarefa = new Tarefa();
        $tarefa->__set('id', 21);
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $retorno = $tarefaService->remover();

        $this->assertNull($retorno);
    }


}


  






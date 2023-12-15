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
        //Ajustar o id e a tarefa conforme necessário para o seu ambiente de teste. Aqui eu quis atualizar o ID 7
        $tarefa = new Tarefa();
        $tarefa->__set('id', 7);
        $tarefa->__set('tarefa', 'Tarefa Atualizada');
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $this->assertTrue($tarefaService->atualizar());
    }

  
}






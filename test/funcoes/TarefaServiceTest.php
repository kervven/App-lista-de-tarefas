<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Tarefa.php';
require_once __DIR__ . '/../../src/TarefaService.php';
require_once __DIR__ . '/../../src/Conexao.php';

class TarefaServiceTest extends TestCase
{
    public function testInserir()
    {
        // Crie uma instância de Tarefa
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', 'Tarefa de Teste'); // Fornecer um valor válido

        // Simule uma instância de Conexao
        $conexao = new Conexao();

        // Crie uma instância do TarefaService
        $tarefaService = new TarefaService($conexao, $tarefa);

        // Execute o método inserir e verifique se retorna null (sem exceções)
        $this->assertNull($tarefaService->inserir());
    }

    // ... Outros métodos de teste
}





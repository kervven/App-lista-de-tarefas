<?php


use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/TarefaService.php';
require_once __DIR__ . '/../../src/Conexao.php';

class TarefaServiceTest extends TestCase
{
    // ...

    public function testInserir()
    {
        $conexaoMock = $this->createMock(Conexao::class);
        $tarefaMock = $this->createMock(Tarefa::class);

        $tarefaMock->expects($this->once())
            ->method('__get')
            ->with('tarefa')
            ->willReturn('Tarefa de teste');

        $conexaoMock->expects($this->once())
            ->method('conectar')
            ->willReturn(new PDO('sqlite::memory:'));

        $tarefaService = new TarefaService($conexaoMock, $tarefaMock);

        $this->assertTrue($tarefaService->inserir());
    }

    // ...

    public function testRecuperar()
    {
        $conexaoMock = $this->createMock(Conexao::class);
        $tarefaMock = $this->createMock(Tarefa::class);

        $conexaoMock->expects($this->once())
            ->method('prepare')
            ->willReturn($this->createMock(PDOStatement::class));

        // Aqui você precisará simular um conjunto de resultados para a execução de fetchAll.

        $tarefaService = new TarefaService($conexaoMock, $tarefaMock);

        $result = $tarefaService->recuperar();
        $this->assertIsArray($result);
        // Faça outras asserções conforme necessário.
    }

   

    public function testAtualizar()
    {
        $conexaoMock = $this->createMock(Conexao::class);
        $tarefaMock = $this->createMock(Tarefa::class);

        $tarefaMock->expects($this->exactly(2))
            ->method('__get')
            ->withConsecutive(['tarefa'], ['id'])
            ->will($this->onConsecutiveCalls('Nova tarefa', 1));

        $conexaoMock->expects($this->once())
            ->method('prepare')
            ->willReturn($this->createMock(PDOStatement::class));

        $tarefaService = new TarefaService($conexaoMock, $tarefaMock);

        $this->assertTrue($tarefaService->atualizar());
    }

    // ...

    public function testRemover()
    {
        $conexaoMock = $this->createMock(Conexao::class);
        $tarefaMock = $this->createMock(Tarefa::class);

        $tarefaMock->expects($this->once())
            ->method('__get')
            ->with('id')
            ->willReturn(1);

        $conexaoMock->expects($this->once())
            ->method('prepare')
            ->willReturn($this->createMock(PDOStatement::class));

        $tarefaService = new TarefaService($conexaoMock, $tarefaMock);

        $this->assertTrue($tarefaService->remover());
    }

    // ...

    public function testMarcarRealizada()
    {
        $conexaoMock = $this->createMock(Conexao::class);
        $tarefaMock = $this->createMock(Tarefa::class);

        $tarefaMock->expects($this->exactly(2))
            ->method('__get')
            ->withConsecutive(['id_status'], ['id'])
            ->will($this->onConsecutiveCalls(2, 1));

        $conexaoMock->expects($this->once())
            ->method('prepare')
            ->willReturn($this->createMock(PDOStatement::class));

        $tarefaService = new TarefaService($conexaoMock, $tarefaMock);

        $this->assertTrue($tarefaService->marcarRealizada());
    }
}


?>

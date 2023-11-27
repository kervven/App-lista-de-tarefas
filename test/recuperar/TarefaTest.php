<?php


use PHPUnit\Framework\TestCase;

class TarefaTest extends TestCase {
    public function testConstrutor() {
        // Arrange (preparação)
        $id = 1;
        $id_status = 2;
        $tarefa = 'Exemplo de Tarefa';
        $data_cadastro = '2023-01-01'; 

        // Act (ação)
        $tarefaObj = new Tarefa();
        $tarefaObj->__set('id', $id);
        $tarefaObj->__set('id_status', $id_status);
        $tarefaObj->__set('tarefa', $tarefa);
        $tarefaObj->__set('data_cadastro', $data_cadastro);

        // Assert (verificação)
        $this->assertEquals($id, $tarefaObj->__get('id'));
        $this->assertEquals($id_status, $tarefaObj->__get('id_status'));
        $this->assertEquals($tarefa, $tarefaObj->__get('tarefa'));
        $this->assertEquals($data_cadastro, $tarefaObj->__get('data_cadastro'));

        $conteudoEsperado = '<tarefaObj>
        <id>1</id>
        <id_status>2</id_status>
        <tarefa>Exemplo de Tarefa</tarefa>
        <data_cadastro>2023-01-01</data_cadastro>
        
        </tarefaObj>';

        if($conteudoEsperado === $tarefaObj) {
            echo 'TESTE OK' . PHP_EOL;
        } else {
            echo 'TESTE FALHOU' . PHP_EOL;
        }
    }
}

?>

<?php

use PHPUnit\Framework\TestCase;

class NovaTarefaTest extends TestCase
{
    public function testInsercaoDeTarefa()
    {
       
        $_POST['tarefa'] = 'Tarefa de teste';

      
        ob_start();
        include 'Tarefa_controller.php?acao=inserir';
        $output = ob_get_clean();

        
        $this->assertStringContainsString('Location: NovaTarefa.php?inclusao=1', $output);
    }

    public function testMensagemDeInclusao()
    {
       
        $_POST['tarefa'] = 'Tarefa de teste';

        ob_start();
        include 'Tarefa_controller.php?acao=inserir';
        $output = ob_get_clean();

     
        $this->assertStringContainsString('<div> class="bg-success</div>', $output);
        $this->assertStringContainsString('<h5>Tarefa inserida com sucesso</h5>', $output);
    }

    public function testInterfaceDeNovaTarefa()
    {
       
        ob_start();
        include 'NovaTarefa.php';
        $output = ob_get_clean();

      
        $this->assertStringContainsString('<h4>Nova tarefa</h4>', $output);
        $this->assertStringContainsString('<form method="post" action="Tarefa_controller.php?acao=inserir">', $output);
    }
}

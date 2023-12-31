<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/cadastro.php';

class CadastroUsuarioTest extends TestCase
{
    public function testCadastroUsuarioSucesso()
    {
        $cadastro = new CadastroUsuario();
        $resultado = $cadastro->cadastrarUsuario('NovoUsuario', 'Senha123', 'novoemail@example.com');
        $this->assertEquals("Cadastro realizado com sucesso!", $resultado);
    }

    public function testCadastroUsuarioExistente()
    {
        $cadastro = new CadastroUsuario();
        $resultado = $cadastro->cadastrarUsuario('NovoUsuario', 'Senha123', 'novoemail@example.com');
        $this->assertEquals("Usuário ou e-mail já existe.", $resultado);
    }
}
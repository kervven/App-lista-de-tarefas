<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/login.php';

class LoginUsuarioTest extends TestCase
{
    public function testAutenticacaoCamposVazios()
    {
        $loginUsuario = new LoginUsuario();
        $resultado = $loginUsuario->autenticarUsuario('', '');
        $this->assertEquals("Por favor, preencha todos os campos.", $resultado);
    }

    public function testAutenticacaoSucesso()
    {
        $loginUsuario = new LoginUsuario();
        $resultado = $loginUsuario->autenticarUsuario('NovoUsuario', 'Senha123');
        $this->assertEquals("Login realizado com sucesso!", $resultado);
    }

    public function testAutenticacaoFalha()
    {
        $loginUsuario = new LoginUsuario();
        $resultado = $loginUsuario->autenticarUsuario('UsuarioInexistente', 'SenhaIncorreta');
        $this->assertEquals("Login falhou. Verifique suas credenciais.", $resultado);
    }
}

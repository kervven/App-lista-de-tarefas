<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Conexao.php';

class ConexaoTest extends TestCase
{
    public function testConexaoBemSucedida()
    {
        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        $this->assertInstanceOf(PDO::class, $pdo);
    }

    public function testConexaoComParametrosIncorretos()
    {
        // Modifique as credenciais para serem incorretas
        $conexao = new Conexao();
        $conexao->setUser('usuario_incorreto');
        $conexao->setPass('senha_incorreta');

        $this->expectException(PDOException::class);
        $conexao->conectar();
    }

    public function testConexaoComBancoDeDadosInexistente()
    {
        // Modifique o nome do banco de dados para ser inexistente
        $conexao = new Conexao();
        $conexao->setDbname('banco_de_dados_inexistente');

        $this->expectException(PDOException::class);
        $conexao->conectar();
    }
}

?>
<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/conexao.php';


class ConexaoTest extends TestCase
{
    public function testConexaoBemSucedida()
    {
        $conexao = new Conexao();
        $conexaoObj = $conexao->conectar();

        $this->assertInstanceOf(PDO::class, $conexaoObj);
    }
}

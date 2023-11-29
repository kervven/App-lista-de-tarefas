<?php


use PHPUnit\Framework\TestCase;

require_once 'login.php'; 

class LoginTest extends TestCase
{
    public function testLoginComCredenciaisCorretas()
    {
        $_POST["username"] = "seu_usuario";
        $_POST["password"] = "sua_senha";

        $_SESSION = [];

        $login = new login();

        $resultado = $login->verificarLogin();

        $this->assertEquals("seu_usuario", $_SESSION["username"]);
        $this->assertTrue($resultado);
    }

    public function testLoginComCredenciaisIncorretas()
    {
        $_POST["username"] = "usuario_incorreto";
        $_POST["password"] = "senha_incorreta";

        $_SESSION = [];

        $login = new login();

        $resultado = $login->verificarLogin();

        $this->assertArrayNotHasKey("username", $_SESSION);
        $this->assertFalse($resultado);
    }
}
?>
<?php
use PHPUnit\Framework\TestCase;

require_once('conexao.php');

class AutenticacaoTest extends TestCase
{
    public function testAutenticacaoComCredenciaisValidas()
    {
        // Configuração
        $_POST["username"] = "usuario_valido";
        $_POST["password"] = "senha_valida";

        // Execução
        $autenticacao = new Autenticacao();
        $resultado = $autenticacao->autenticar();

        // Verificação
        $this->assertTrue($resultado);
        $this->assertArrayHasKey("username", $_SESSION);
        $this->assertEquals($_SESSION["username"], "usuario_valido");
    }

    public function testAutenticacaoComCredenciaisInvalidas()
    {
        
        $_POST["username"] = "usuario_invalido";
        $_POST["password"] = "senha_invalida";

        // Execução
        $autenticacao = new Autenticacao();
        $resultado = $autenticacao->autenticar();

        // Verificação
        $this->assertFalse($resultado);
        $this->assertArrayNotHasKey("username", $_SESSION);
    }
}

class Autenticacao
{
    public function autenticar()
    {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $senha = $_POST["password"];

            if (empty($username) || empty($senha)) {
                echo "Por favor, preencha todos os campos.";
            } else {
                try {
                    $conexao = (new Conexao())->conectar();

                    // Consulta SQL para verificar o login
                    $sql = "SELECT * FROM usuarios WHERE username = :username AND password = :password";
                    $stmt = $conexao->prepare($sql);
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":password", $senha);
                    $stmt->execute();

                    if ($stmt->rowCount() == 1) {
                        $_SESSION["username"] = $username;
                        header("Location: app.php");
                        exit();
                    } else {
                        echo "Login falhou. Verifique suas credenciais.";
                        return false;
                    }
                } catch (PDOException $e) {
                    echo "Erro de banco de dados: " . $e->getMessage();
                    return false;
                }
            }
        } else {
            header("Location: Home.php");
            return false;
        }
    }
}

// Executar os testes
$result = (new AutenticacaoTest())->run();

?>
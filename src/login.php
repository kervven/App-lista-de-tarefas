<?php
require_once('conexao.php');

class LoginUsuario
{
    public function autenticarUsuario($username, $senha)
    {
        try {
            $conexao = (new Conexao())->conectar();

            // Consulta SQL para verificar o login
            $sql = "SELECT * FROM usuarios WHERE username = :username AND password = :password";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $senha);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                return "Login realizado com sucesso!";
            } else {
                return "Login falhou. Verifique suas credenciais.";
            }
        } catch (PDOException $e) {
            return "Erro de banco de dados: " . $e->getMessage();
        }
    }
}

// Uso do código para autenticar um usuário
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $senha = $_POST["password"];

    if (empty($username) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        $loginUsuario = new LoginUsuario();
        $resultado = $loginUsuario->autenticarUsuario($username, $senha);

        echo $resultado;

        if ($resultado === "Login realizado com sucesso!") {
            $_SESSION["username"] = $username;
            header("Location: app.php");
            exit();
        }
    }
} else {
    header("Location: 404.php");
}
?>

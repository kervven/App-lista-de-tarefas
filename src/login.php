<?php
require_once('conexao.php');

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
            }
        } catch (PDOException $e) {
            echo "Erro de banco de dados: " . $e->getMessage();
        }
    }
} else {
    header("Location: Home.php");
}
?>

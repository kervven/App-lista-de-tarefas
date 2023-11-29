<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        try {
            $conexao = (new Conexao())->conectar();

            // Consulta SQL para verificar o login
            $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                $_SESSION["username"] = $username;
                header("Location: tarefa.php");
                exit();
            } else {
                echo "Login falhou. Verifique suas credenciais.";
            }
        } catch (PDOException $e) {
            echo "Erro de banco de dados: " . $e->getMessage();
        }
    }
} else {
    header("Location: login.html");
}
?>

<?php
require_once('conexao.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $senha = $_POST["password"];

    if (empty($username) || empty($senha) || empty($email)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        try {
            $conexao = (new Conexao())->conectar(); 
            // Verifica se o usuário já existe
            $sql = "SELECT id FROM usuarios WHERE username = :username OR email = :email";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Usuário ou e-mail já existe.";
            } else {
                
                $sql = "INSERT INTO usuarios (username, password, email) VALUES (:username, :password, :email)";
                $stmt = $conexao->prepare($sql);

                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $senha);
                $stmt->bindParam(":email", $email);

                $stmt->execute();

                echo '<script>';
                echo 'alert("Cadastro realizado com sucesso!");';
                echo 'setTimeout(function(){ window.location.href = "Home.php"; }, 150);';  
                echo '</script>';
            }
        } catch (PDOException $e) {
            echo "Erro de banco de dados: " . $e->getMessage();
        }
    }
} else {
    header("Location: 404.html");
}
?>

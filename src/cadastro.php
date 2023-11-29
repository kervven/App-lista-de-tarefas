<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $senha = $_POST["senha"]; 

    if (empty($username) || empty($senha) || empty($email)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        try {
            $conexao = (new Conexao())->conectar(); 
            // Verifica se o usuário já existe
            $sql = "SELECT id FROM users WHERE username = :username OR email = :email";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Usuário ou e-mail já existe.";
            } else {
                
                $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
                $stmt = $conexao->prepare($sql);

                // Usando password_hash para armazenar a senha de forma segura
                $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);

                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $hashedPassword);
                $stmt->bindParam(":email", $email);

                $stmt->execute();

                echo "Cadastro realizado com sucesso!";
            }
        } catch (PDOException $e) {
            echo "Erro de banco de dados: " . $e->getMessage();
        }
    }
} else {
    
    header("Location: Home.html");
}
?>

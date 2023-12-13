<?php

require_once('conexao.php');

class CadastroUsuario
{
    public function cadastrarUsuario($username, $senha, $email)
    {
        try {
            $conexao = (new Conexao())->conectar();

            // Verifica se o usuário já existe
            $sql = "SELECT id FROM usuarios WHERE username = :username OR email = :email";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return "Usuário ou e-mail já existe.";
            } else {
                $sql = "INSERT INTO usuarios (username, password, email) VALUES (:username, :password, :email)";
                $stmt = $conexao->prepare($sql);

                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $senha);
                $stmt->bindParam(":email", $email);

                $stmt->execute();

                return "Cadastro realizado com sucesso!";
            }
        } catch (PDOException $e) {
            return "Erro de banco de dados: " . $e->getMessage();
        }
    }
}

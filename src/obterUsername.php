<?php
require_once('conexao.php');

function obterUsername($conexao, $username) {
    $sql = "SELECT username FROM usuarios WHERE username = :username";
    $stmt = $conexao->conectar()->prepare($sql);
    $stmt->bindParam(":username", $username);
    
    if ($stmt->execute()) {
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            return $resultado['username'];
        } else {
      
            header("Location: 404.php");
            exit();
        }
    } else {
        // Exibir mensagem de erro
        die('Erro na execução da consulta SQL: ' . print_r($stmt->errorInfo(), true));
    }
}
?>

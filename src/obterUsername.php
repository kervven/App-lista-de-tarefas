<?php
require_once('conexao.php');

function obterUsername($conexao, $username) {
    $sql = "SELECT username FROM usuarios WHERE username = :username";
    $stmt = $conexao->conectar()->prepare($sql);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        return $resultado['username'];
    } else {
        return 'Usuário Desconhecido';
    }
}
?>

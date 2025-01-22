<?php
// Incluir o arquivo de conexão com o banco de dados
include '../bd/conexao.php';

session_start();
$user_id = $_SESSION['user_id'];

// Verificar se o usuário está logado
if (isset($user_id)) {
    // Consultar o banco de dados para obter os dados do usuário
    $sql = "SELECT nome, email FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Retornar os dados em JSON
        echo json_encode([
            'nome' => $usuario['nome'],
            'email' => $usuario['email']
        ]);
    } else {
        // Usuário não encontrado
        echo json_encode(['erro' => 'Usuário não encontrado']);
    }
} else {
    // Caso o usuário não esteja logado, retorna um erro
    echo json_encode(['erro' => 'Usuário não autenticado']);
}
?>

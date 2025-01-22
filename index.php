<?php 
session_start();
include 'bd/conexao.php'; // Arquivo de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirma-login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificar se o e-mail e a senha foram preenchidos
    if (!empty($email) && !empty($senha)) {
        // Verificar se o usuário existe no banco de dados
        $sql = "SELECT id, senha, tipo_investidor FROM usuarios WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Autenticar o usuário e salvar na sessão
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['tipo_investidor'] = $usuario['tipo_investidor']; // Armazena o tipo de investidor

            // Redirecionar para o painel adequado com base no tipo de investidor
            if ($usuario['tipo_investidor'] === 'conservador') {
                header('Location: painel/painel_conservador.php');
            } elseif ($usuario['tipo_investidor'] === 'moderado') {
                header('Location: painel/painel_moderado.php');
            } elseif ($usuario['tipo_investidor'] === 'arrojado') {
                header('Location: painel/painel_arrojado.php');
            } else {
                header('Location: painel_default.php');
            }
            exit;
        } else {
            $erro = "E-mail ou senha inválidos!";
        }
    } else {
        $erro = "Por favor, preencha todos os campos!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão Financeira</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body>

    <section class="fundo-geral">
        <div class="container">
            <div class="formulario-login">
                <h1 class="text-center text-white"><i class="fa fa-lock"></i> Login</h1>
                <p class="text-white text-center">Seja bem-vindo, agradecemos por utilizar nossa ferramenta <br> faça o login para acessar a ferramenta.</p>
                <form action="" method="POST">
                    <div class="form-group">
                        <label><i class="fa fa-envelope"></i> E-mail:</label>
                        <input type="text" class="form-control" name="email" placeholder="Insira seu e-mail de acesso">
                    </div>
                    <div class="form-group">
                        <label><i class="fa-solid fa-key"></i> Senha:</label>
                        <input type="password" class="form-control" name="senha" placeholder="Insira sua senha">
                    </div>
                    <input type="submit" value="Entrar" name="confirma-login" class="btn btn-outline-light">
                    <a class="text-white" style="float: right" href="">Esqueceu a senha</a>
                </form>
            </div>
            <p class="text-white text-center">Ainda não se cadastrou? <a href="cadastro/cadastro.php" class="text-white">Cadastre-se já!</a></p>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include_once "db.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $data_nascimento = $_POST['data_nascimento'];
    $novaData = date('Y-m-d', strtotime(str_replace('/', '-', $data_nascimento)));
    $telefone = $_POST['telefone'];
    
    // Chama a função de atualização do usuário
    if (editarUsuario($id, $nome, $email, $senha, $novaData, $telefone)) {
        $_SESSION['mensagem'] = "Usuário atualizado com sucesso.";
    } else {
        $_SESSION['mensagem'] = "Ocorreu um erro ao atualizar o usuário.";
    }
    
    // Redireciona o usuário de volta para a página de detalhes do usuário
    header("Location: home.php?id=$id");
    exit();
}

// Exibe a mensagem de erro, se existir
if (isset($_SESSION['mensagem'])) {
    echo "<p>{$_SESSION['mensagem']}</p>";
    unset($_SESSION['mensagem']);
}
?>

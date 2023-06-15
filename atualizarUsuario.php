<?php
include_once "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $data_nascimento = $_POST['data_nascimento'];
    $novaData = DateTime::createFromFormat('d/m/Y', $data_nascimento)->format('Y-m-d');
    $telefone = $_POST['telefone'];
    
    // Chama a função de atualização do usuário
    if (editarUsuario($id, $nome, $email, $senha, $novaData, $telefone)) {
        echo "Usuário atualizado com sucesso.";
    } else {
        echo "Ocorreu um erro ao atualizar o usuário.";
    }
}
?>

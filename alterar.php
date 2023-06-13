<?php
include_once "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se os campos do formulário foram preenchidos
    if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        // Obtém os valores dos campos do formulário
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['password'];

        // Chama a função para atualizar o usuário no banco de dados

        atualizaUser($id, $nome, $email, $senha);

        // Redireciona o usuário de volta para a página de detalhes do usuário

        header("Location: user.php");
 
    } else {
        echo "<script> alert(Preencha todos os campos do formulário.) </script>";
    }
} else {
    echo "<script> alert(Método de requisição inválido.) </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    include_once "db.php";

    // Definir variáveis iniciais
    $id = '';
    $nome = '';
    $email = '';
    $senha = '';

    // Verifica se o parâmetro de ID foi fornecido na URL
    if (isset($_GET['id'])) {
        // Obtém o ID do usuário da URL
        $id = $_GET['id'];

        // Chama o método recuperaUser para obter os detalhes do usuário
        $user = recuperaUser($id);

        if (!empty($user)) {
                // Exibe os detalhes do usuário
                
                // Captura os valores dos campos de formulário
            $nome = $user['nome'];
            $email = $user['login'];
            $senha = $user['senha'];
                
            echo " 
            <div class='page'>
            <form class='formCad' action='alterar.php' method='POST'>

            <h1>Alterando Cadastro</h1>
            <p>Digite os seus dados para se cadastrar.</p>

                    <label for='nome'>Nome</label>
                    <input type='text' name='id' value='$id' readonly> 

                    <label for='nome'>Nome</label>
                    <input type='text' placeholder='Digite seu Nome' autofocus='true' name='nome' class='text' value='$nome'><br>

                    <label for='email'>E-mail</label>
                    <input type='email' placeholder='Digite seu e-mail' autofocus='true' name='email' class='text' value='$email'><br>

                    <label for='password'>Senha</label>
                    <input type='password' placeholder='Digite sua senha' name='password' class='text' value='$senha'><br> 

                    <input type='submit' value='Confirmar' class='btn' formtarget='_blank' />

                </form>
                </div>";
            } else {
                echo "<p>Usuário não encontrado.</p>";
            }
        } else {
            echo "<p>Nenhum ID de usuário fornecido.</p>";
           
        }
        ?>

</body>
</html>
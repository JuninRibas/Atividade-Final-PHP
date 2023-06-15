<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EditarUsuario</title>
</head>

<body>
    <?php
    include_once "db.php";

    $id = $_GET['id'];

    // Chame a função para obter os dados do usuário por ID
    $usuario = recuperaUsuarioID($id);

    // Verifique se o usuário foi encontrado
    if ($usuario && count($usuario) > 0) {
        // Atribua os valores dos campos de input às variáveis correspondentes
        $id = $usuario[0]['id'];
        $nome = $usuario[0]['nome'];
        $email = $usuario[0]['email'];
        $senha = $usuario[0]['senha'];
        $data_nascimento = $usuario[0]['data_nascimento'];
        $telefone = $usuario[0]['telefone'];
    } else {
        // Usuário não encontrado, faça o tratamento adequado
        // ...
    }
    ?>

    <div class="page">
        <form action="atualizarUsuario.php" class="formCad" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <h1>Cadastro</h1>
            <p>Digite os seus dados para se CADASTRAR.</p>
            <label for="nome">Nome</label>
            <input type="text" placeholder="Digite seu Nome" autofocus="true" name="nome" class="text"
                value="<?php echo $nome; ?>" required>
            <label for="email">E-mail</label>
            <input type="email" placeholder="Digite seu e-mail" autofocus="true" name="email" class="text"
                value="<?php echo $email; ?>" required>
            <label for="password">Senha</label>
            <input type="password" placeholder="Digite sua senha" name="password" class="text"
                value="<?php echo $senha; ?>" required>

            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="text" value="<?php echo $data_nascimento; ?>" required>

            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" class="text" value="<?php echo $telefone; ?>" required>

            <input type="hidden" name="isBoolean" value="0">

            <input type="submit" value="Confirmar" class="btn">
        </form>
    </div>

</body>

</html>

<?php
include_once "db.php";


if (isset($_GET['id'])) {
    // Obtém o ID do usuário da URL
    $id = $_GET['id'];

        // Chama a função para deletar o usuário no banco de dados

        deletaUser($id);

        header("location: user.php");
 
    } else {
        echo "<p>Preencha todos os campos do formulário.</p>";
    }


?>
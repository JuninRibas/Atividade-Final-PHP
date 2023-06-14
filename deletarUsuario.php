<?php
include_once "db.php";

$id = $_GET['id'];
var_dump($id);

if (isset($_GET['id'])) {
    // Obtém o ID do usuário da URL
   

        // Chama a função para deletar o usuário no banco de dados

        deletarUsuario($id);

        // Redireciona o usuário de volta para a página de detalhes do usuário

        header("Location: home.php");

 
    } else {
      
    
    }


?>

<?php 
    include_once "db.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(verificaLoginSenha($email, $senha)){
        echo "Login efetuado com sucesso!";
        session_start();
        $_SESSION['email'] = $email;

        echo"<script>setTimeout(function(){  window.location.href='home.php'  },3000); </script>";

    }else{
        echo "Login ou senha inválidos!";
     
    }
    
    ?> 
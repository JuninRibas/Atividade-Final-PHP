<?php 
    $login = $_POST['email'];
    $senha = $_POST['senha'];

    if( $login == "junior@gmail.com" && $senha =="12345"){
        echo "Login efetuado com sucesso!";
        session_start();
        $_SESSION['login'] = $login;
        echo"<script>setTimeout(function(){  window.location.href='home.php'  },5000); </script>";

    }else{
        echo "Login ou senha inválidos!";
    }
    ?> 
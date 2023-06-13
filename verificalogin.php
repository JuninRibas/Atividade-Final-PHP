<?php
    include_once "db.php";

    
    $login = $_POST['email'];
    $senha = $_POST['password'];

    if (verificaLoginSenha($login, $senha)){
      session_start();
      $_SESSION['login'] = $login;
      header('Location: home.php'); 
    }else {
      header('Location: login.html');
    }
?>
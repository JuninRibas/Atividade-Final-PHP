<?php

include_once "db.php";

$nome = $_POST['nome'];
$login = $_POST['email'];
$senha = $_POST['password'];
$vemCad = $_POST['isBoolean'];

if (conectaBD()) {

  echo insert($nome, $login, $senha);

  if($vemCad != 1){
    header('Location: index.html');
  }else{
    header('Location: cadastro.html');
  }

  
  
} else {
  echo "Erro ao conectar";
}

?>
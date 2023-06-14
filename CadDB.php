<?php

include_once "db.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['password'];
$data_nascimento = $_POST['data_nascimento'];
$telefone = $_POST['telefone'];
$vemCad = $_POST['isBoolean'];

if (conectaBD()) {

  echo insereUsuario($nome, $email, $senha,$data_nascimento,$telefone);

  if($vemCad != 1){
    header('Location: index.html');
  
  }else{
    header('Location: cadastro.html');
  }
} else {
  echo "Erro ao conectar";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="home.css">
    <title>Users</title>

    <style>
        button {
            margin-left: 40px;
            padding: 5px;
            font-size: 14px;
            cursor: pointer;
            border: 1px solid black;
            border-radius: 10px;
        }

        button:hover{
            background-color: rgb(165, 31, 165);
        }

        ul {
            display : flex;
            align-items: center;
            flex-direction: column;
            margin-top: 20px;
            padding-left: 0;
            list-style-type: none;
        }
        li {
            background-color: rgb(223, 204, 36);
            margin-bottom: 10px;
            border: 2px solid black;
            border-radius: 10px;
            height: 60px;
            width: 350px;
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 10px;
        }


    </style>
</head>
<body>

<header>

    <h1>Triste Vida de um Veterano do IFSC</h1>

</header>
<nav>
   
   <div>
   <a href="home.php">Home</a>
     <a href="sobre.php">Sobre</a>
     <a href="cadastro.html">Cadastrar Usuario</a>
     <a href="Logout.php">Logout</a>
   </div>

   <div>
     <?php
       session_start();
       if (!isset($_SESSION['login'])) {
         header('location: login.html');
       }
       echo "<p> $_SESSION[login] </p>";
       ?>
   </div>
 </nav>


<?php
    include_once "db.php";
    $users = recuperaAll();

    // Verifica se existem registros retornados
    if (!empty($users)) {
        echo "<ul>";
        foreach ($users as $user) {
            echo "<li>
                    Nome: {$user['nome']} <br> Email: {$user['login']} 
                    <button onclick=\"deleteUser({$user['id']})\">Excluir</button>
                    <button onclick=\"alterarUser({$user['id']})\">Alterar</button>
                </li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nenhum usuário cadastrado.</p>";
    }
?>

<script>
    function deleteUser(id) {
        if (confirm("Deseja confirmar esta ação?")) {
            window.location.href = 'delete.php?id=' + id;
        } else {
            alert("Ação cancelada.");
        }
        
    }

    function alterarUser(id) {
        window.location.href = 'alterar.php?id=' + id;
    }
</script>

</body>
</html>
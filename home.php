<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="home.css">
    <title>Document</title>

</head>
<body>
   
    <nav>
    <ul>
        <li> <a href="home.php"> Home </a> </li>
        <li> <a href="sobre.php"> sobre </a> </li>
        <li> <a href="cadastro.html">Cadastrar Usuario</a></li>
        <li class="right"><a href="logout.php">Logout</a></li>
    </ul>
    </nav>

    <div class="search-bar">
    <form action="" method="GET">
      <input type="text" name="search" placeholder="Pesquisar..." autofocus>
      <input type="submit" value="Buscar">
    </form>
  </div>

    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Telefone</th>
        </tr>
        <?php
    include_once "db.php";

    session_start();
    if(!isset($_SESSION['email'])){
        header('Location: login.php');
    }

    echo "<p class='bemvindo'>Bem-vindo, <strong>".$_SESSION['email']."</strong></p>";
    $result = recuperaAll();
    
    if (!empty($result)) {
        echo "<table>";
        echo "<tr>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Data de Nascimento</th>
                  <th>Telefone</th>
                  <th>Ações</th>
              </tr>";
        
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>".$row["nome"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["data_nascimento"]."</td>";
            echo "<td>".$row["telefone"]."</td>";
            
            echo "<td>
            <a class='linkF U' href='editarUsuario.php?id=" . $row['id'] . "'><button>Edit</button></a>
            <a class='linkF D' href='deletarUsuario.php?id=" . $row['id'] . "'><button>Delete</button></a>
             </td>";                  
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<p>Nenhum usuário encontrado.</p>";
    }
?>
    </table>
</body>
</html>

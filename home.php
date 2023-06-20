<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="home.css">
  <title>Document</title>

  <style>
    /* Estilos da barra de pesquisa */
    .search-bar {
      margin-bottom: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .search-bar input[type="text"] {
      padding: 10px;
      width: 300px;
      border: 1px solid #ccc;
      border-radius: 3px;
      font-size: 16px;
    }

    .search-bar input[type="submit"] {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 3px;
      font-size: 16px;
      cursor: pointer;
      margin-left: 10px;
    }

    /* Estilos adicionais */
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    th {
      background-color: #007bff;
      color: #fff;
    }

    .bemvindo {
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <nav>
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="sobre.php">Sobre</a></li>
      <li><a href="cadastro.html">Cadastrar Usuário</a></li>
      <li class="right"><a href="logout.php">Logout</a></li>
    </ul>
  </nav>

  <div class="search-bar">
    <form action="pesquisar.php" method="GET">
      <input type="text" name="search" placeholder="Pesquisar..." autofocus>
      <input type="submit" value="Buscar">
    </form>
  </div>

  <?php
  include_once "db.php";
  session_start();
  if (!isset($_SESSION['email'])) {
    header('Location: login.php');
  }

  echo "<p class='bemvindo'>Bem-vindo, <strong>" . $_SESSION['email'] . "</strong></p>";

  // Verifica se foi feita uma pesquisa
  if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];

    // Chame a função para recuperar os usuários que correspondem à pesquisa
    $result = recuperaUsuariosPorNome($search);

    if (isset($_SESSION['resultado']) && !empty($_SESSION['resultado'])) {
        $result = $_SESSION['resultado'];
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
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["data_nascimento"] . "</td>";
        echo "<td>" . $row["telefone"] . "</td>";

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
  } else {
    // Se não houver pesquisa, exiba todos os usuários
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
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["data_nascimento"] . "</td>";
        echo "<td>" . $row["telefone"] . "</td>";

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
  }
  ?>
</body>

</html>

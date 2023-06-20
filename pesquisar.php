<?php 
include_once "db.php";

// Verifique se há resultados da pesquisa na sessão
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
?>

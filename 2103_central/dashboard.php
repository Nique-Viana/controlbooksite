<?php

// Inclua o arquivo de conexão com o banco de dados
require 'db_connection.php';

// Inicie a sessão, verifique se o usuário está logado
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirecione para a página de login se o usuário não estiver logado
    header("Location: login.php");
    exit;
}

// Inclua a conexão com o banco de dados (certifique-se de configurar sua conexão corretamente)
include("db_connection.php");

// Consulta SQL para recuperar informações sobre notebooks
$user_id = $_SESSION['user_id']; // Recupere o ID do usuário da sessão
$sql = "SELECT * FROM notebooks WHERE user_id = $user_id";
$result = $conn->query($sql);

// Exiba as informações na página
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard - CIMA</title>
    <!-- Adicione seus estilos CSS e scripts JavaScript aqui -->
</head>

<body>
    <h1>Dashboard</h1>
    <p>Bem-vindo à sua área de controle de patrimônio.</p>

    <h2>Informações sobre Notebooks</h2>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["marca"] . "</td>";
                    echo "<td>" . $row["modelo"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Nenhum notebook cadastrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="logout.php">Sair</a> <!-- Um link para a página de logout -->

    <!-- Adicione qualquer outro conteúdo ou funcionalidade desejada -->
</body>

</html>

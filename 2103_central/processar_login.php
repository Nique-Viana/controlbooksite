<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados
    $servername = "localhost";  // Nome ou endereço do servidor do seu banco de dados
$username = "root"; // Nome de usuário do seu banco de dados
$password = ""; // Deixe a senha em branco, pois não há senha
$dbname = "cadastro_notebooks"; // Nome do seu banco de dados

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão ao banco de dados falhou: " . $conn->connect_error);
    }

    // Obter dados do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para verificar as credenciais
    $sql = "SELECT id, username, senha FROM usuarios WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['senha'];

        // Verificar a senha com hash e salt
        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            header("Location: pagina_restrita.php"); // Redirecionar para a página restrita
        } else {
            echo "Credenciais inválidas.";
        }
    } else {
        echo "Credenciais inválidas.";
    }

    $conn->close();
}
?>

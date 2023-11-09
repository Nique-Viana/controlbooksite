<?php
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
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$senha_admin = $_POST['senha'];

// Verificar se a senha do administrador está correta (apenas para fins de demonstração)
$admin_password = "9171"; // Senha real do administrador

if ($senha_admin !== $admin_password) {
    echo "Senha do administrador incorreta.";
    exit;
}

// Inserir os dados na tabela 'notebooks'
$sql = "INSERT INTO notebooks (marca, modelo) VALUES ('$marca', '$modelo')";

if ($conn->query($sql) === TRUE) {
    echo "Notebook cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o notebook: " . $conn->error;
}

$conn->close();
?>

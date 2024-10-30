<?php
$localhost = "127.0.0.1";
$username = "root";
$password = "";
$database = "oscar_contact";

// Criando a conexão
$conn = new mysqli($localhost, $username, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificando se os dados foram enviados pelo formulário
if (isset($_GET['enviar'])) {
    $nome = $_GET['name'];
    $sobrenome = $_GET['Sobrenome'];
    $email = $_GET['email'];
    $genero = $_GET['Gender'];

    // Inserindo dados na tabela
    $sql = "INSERT INTO contatos (nome, sobrenome, email, genero) VALUES ('$nome', '$sobrenome', '$email', '$genero')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}

// Fechando a conexão
$conn->close();
?>
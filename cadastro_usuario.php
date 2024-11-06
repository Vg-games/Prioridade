<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";  // Endereço do servidor MySQL
$username = "root";         // Nome de usuário do MySQL
$password = "";             // Senha do MySQL (se houver)
$dbname = "vitor_tarefas";  // Nome do banco de dados

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = $_POST['Nome'];
    $email = $_POST['Email'];

    // Prepara a consulta SQL para inserir os dados
    $sql = "INSERT INTO Usuarios (Usu_Nome, Usu_email) VALUES ('$nome', '$email')";

    // Executa a consulta
    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!<br><br>";
        echo "<a href='cadastro_usuario.html'>Voltar ao cadastro</a>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
}
?>

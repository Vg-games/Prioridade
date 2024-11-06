<?php
// Defina as variáveis de conexão
$servername = "localhost";  // ou o endereço IP do seu servidor MySQL
$username = "root";         // seu nome de usuário do MySQL
$password = "";             // sua senha do MySQL (se houver)
$dbname = "vitor_tarefas";  // nome do banco de dados

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!";
?>

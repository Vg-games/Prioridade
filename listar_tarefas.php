<?php
// Inclui o arquivo de conexão
include 'db_connect.php';

// Consulta SQL para buscar todas as tarefas com seus responsáveis
$sql = "SELECT t.tar_codigo, t.tar_descricao, t.tar_prioridade, t.tar_status, u.Usu_Nome 
        FROM Tarefas t
        JOIN Usuarios u ON t.Usu_codigo = u.Usu_codigo";

// Executa a consulta
$result = $conn->query($sql);

// Verifica se há resultados
if ($result->num_rows > 0) {
    // Exibe os resultados
    echo "<h2>Tarefas:</h2>";
    while($row = $result->fetch_assoc()) {
        echo "Código: " . $row["tar_codigo"] . "<br>";
        echo "Descrição: " . $row["tar_descricao"] . "<br>";
        echo "Prioridade: " . $row["tar_prioridade"] . "<br>";
        echo "Status: " . $row["tar_status"] . "<br>";
        echo "Responsável: " . $row["Usu_Nome"] . "<br><br>";
    }
} else {
    echo "Nenhuma tarefa encontrada.";
}

// Fecha a conexão
$conn->close();
?>

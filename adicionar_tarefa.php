<?php
// Inclui o arquivo de conexão
include 'db_connect.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $setor = $_POST['tar_setor'];
    $prioridade = $_POST['tar_prioridade'];
    $descricao = $_POST['tar_descricao'];
    $usuario_id = $_POST['Usu_codigo'];

    // Prepara a consulta SQL para inserção
    $sql = "INSERT INTO Tarefas (tar_setor, tar_prioridade, tar_descricao, Usu_codigo) 
            VALUES ('$setor', '$prioridade', '$descricao', '$usuario_id')";

    // Executa a consulta
    if ($conn->query($sql) === TRUE) {
        echo "Nova tarefa adicionada com sucesso!<br><br>";
        echo "<a href='listar_tarefas.php'>Ver tarefas</a>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
}
?>

<!-- Formulário HTML para adicionar uma nova tarefa -->
<h2>Adicionar Nova Tarefa</h2>
<form method="POST" action="adicionar_tarefa.php">
    <label for="tar_setor">Setor:</label>
    <input type="text" id="tar_setor" name="tar_setor" required><br><br>

    <label for="tar_prioridade">Prioridade:</label>
    <input type="text" id="tar_prioridade" name="tar_prioridade" required><br><br>

    <label for="tar_descricao">Descrição:</label>
    <textarea id="tar_descricao" name="tar_descricao" required></textarea><br><br>

    <label for="Usu_codigo">Responsável (Usuário):</label>
    <input type="number" id="Usu_codigo" name="Usu_codigo" required><br><br>

    <input type="submit" value="Adicionar Tarefa">
</form>

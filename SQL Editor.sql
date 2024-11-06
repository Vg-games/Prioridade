-- 1. Criação do banco de dados
CREATE DATABASE vitor_tarefas;

-- 2. Seleção do banco de dados para uso
USE vitor_tarefas;

-- 3. Criação da tabela de usuários
CREATE TABLE Usuarios (
    Usu_codigo INT AUTO_INCREMENT PRIMARY KEY,  -- Código do usuário (chave primária)
    Usu_Nome VARCHAR(30) NOT NULL,              -- Nome do usuário
    Usu_email VARCHAR(30) NOT NULL UNIQUE       -- E-mail do usuário (único)
);

-- 4. Criação da tabela de tarefas
CREATE TABLE Tarefas (
    tar_codigo INT AUTO_INCREMENT PRIMARY KEY,  -- Código da tarefa (chave primária)
    tar_setor VARCHAR(30) NOT NULL,              -- Setor responsável pela tarefa
    tar_prioridade VARCHAR(30) NOT NULL,        -- Prioridade da tarefa
    tar_descricao TEXT,                         -- Descrição detalhada da tarefa
    tar_status ENUM('Pendente', 'Em andamento', 'Concluída') DEFAULT 'Pendente',  -- Status da tarefa
    tar_data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Data de criação da tarefa
    tar_data_conclusao TIMESTAMP NULL,          -- Data de conclusão da tarefa (opcional)
    Usu_codigo INT,                             -- Chave estrangeira (usuário responsável pela tarefa)
    FOREIGN KEY (Usu_codigo) REFERENCES Usuarios(Usu_codigo)  -- Relacionamento com a tabela de usuários
);

-- 5. Criação da tabela de histórico de tarefas
CREATE TABLE HistoricoTarefas (
    hist_codigo INT AUTO_INCREMENT PRIMARY KEY,  -- Código do histórico (chave primária)
    tar_codigo INT,                              -- Relacionamento com a tarefa
    hist_data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Data da alteração
    hist_status VARCHAR(30),                     -- Status da tarefa antes ou após a alteração
    hist_comentario TEXT,                        -- Comentário sobre a alteração
    FOREIGN KEY (tar_codigo) REFERENCES Tarefas(tar_codigo)  -- Relacionamento com a tabela de tarefas
);

-- 6. Inserir usuários de exemplo
INSERT INTO Usuarios (Usu_Nome, Usu_email) 
VALUES 
('Vitor', 'vitor@example.com'),
('Maria', 'maria@example.com');

-- 7. Inserir tarefas de exemplo
INSERT INTO Tarefas (tar_setor, tar_prioridade, tar_descricao, Usu_codigo) 
VALUES 
('Financeiro', 'Alta', 'Analisar relatório de receitas', 1), 
('TI', 'Média', 'Corrigir erro no sistema', 2);

-- 8. Inserir histórico de tarefas de exemplo
INSERT INTO HistoricoTarefas (tar_codigo, hist_status, hist_comentario) 
VALUES 
(1, 'Pendente', 'Tarefa criada e aguardando início'), 
(1, 'Em andamento', 'Início do trabalho'), 
(2, 'Pendente', 'Tarefa criada');

-- 9. Consultas úteis

-- 9.1. Listar todas as tarefas com seus responsáveis
SELECT t.tar_codigo, t.tar_descricao, t.tar_prioridade, t.tar_status, u.Usu_Nome 
FROM Tarefas t
JOIN Usuarios u ON t.Usu_codigo = u.Usu_codigo;

-- 9.2. Buscar histórico de uma tarefa específica (por exemplo, tarefa com código 1)
SELECT h.hist_data, h.hist_status, h.hist_comentario
FROM HistoricoTarefas h
WHERE h.tar_codigo = 1;

-- 9.3. Listar todas as tarefas de um setor específico (por exemplo, setor 'Financeiro')
SELECT * FROM Tarefas
WHERE tar_setor = 'Financeiro';

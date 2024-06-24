<?php
include "includes/database.php";

class Categoria
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function cadastrarCategoria($nome_categoria)
    {
        if (empty($nome_categoria)) {
            http_response_code(400);
            return "Erro ao cadastrar categoria no campo Nome!&warning";
        }

        $nome_categoria = $this->db->escapeString($nome_categoria);
        $query_categoria_existente = "SELECT COUNT(*) as existe FROM categorias WHERE nome = ?";
        $stmt = $this->db->prepare($query_categoria_existente);

        if (!$stmt) {
            http_response_code(500);
            return "Erro ao preparar a consulta SQL!&warning";
        }

        $stmt->bind_param("s", $nome_categoria);
        $stmt->execute();
        $result_categoria_existente = $stmt->get_result();
        $dados_categoria_existente = $result_categoria_existente->fetch_assoc();

        if ($dados_categoria_existente['existe'] != 0) {
            http_response_code(409);
            return 'Categoria já cadastrada!&warning';
        }

        $query_insere_categoria = "INSERT INTO categorias (nome) VALUES (?)";
        $stmt = $this->db->prepare($query_insere_categoria);

        if (!$stmt) {
            http_response_code(500);
            return "Erro ao preparar a consulta SQL!&warning";
        }

        $stmt->bind_param("s", $nome_categoria);
        $stmt->execute();

        $query_verifica_categoria = "SELECT COUNT(*) as count FROM categorias WHERE nome = ?";
        $stmt = $this->db->prepare($query_verifica_categoria);

        if (!$stmt) {
            http_response_code(500);
            return "Erro ao preparar a consulta SQL!&warning";
        }

        $stmt->bind_param("s", $nome_categoria);
        $stmt->execute();
        $result_verifica_categoria = $stmt->get_result();
        $dados_verifica_categoria = $result_verifica_categoria->fetch_assoc();

        if ($dados_verifica_categoria['count'] >= 1) {
            return 'Categoria cadastrada com sucesso!&success';
        } else {
            http_response_code(500);
            return 'Erro ao cadastrar categoria!&warning';
        }
    }


    public function atualizarCategoria($id_categoria, $nome_categoria)
    {
        if (empty($id_categoria)) {
            http_response_code(400);
            return "Erro ao atualizar categoria: ID da categoria é obrigatório!&warning";
        }
        if (empty($nome_categoria)) {
            http_response_code(400);
            return "Erro ao atualizar categoria no campo Nome!&warning";
        }

        $nome_categoria = $this->db->escapeString($nome_categoria);
        $query_atualiza_categoria = "UPDATE categorias SET nome = ? WHERE id = ?";
        $stmt = $this->db->prepare($query_atualiza_categoria);
        $stmt->bind_param("si", $nome_categoria, $id_categoria);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return 'Categoria atualizada com sucesso!&success';
        } else {
            http_response_code(500);
            return 'Erro ao atualizar categoria!&warning';
        }
    }

    public function deletarCategoria($id_categoria)
    {
        if (empty($id_categoria)) {
            http_response_code(400);
            return "Erro ao deletar categoria: ID da categoria é obrigatório!&warning";
        }

        $query_deleta_categoria = "DELETE FROM categorias WHERE id = ?";
        $stmt = $this->db->prepare($query_deleta_categoria);
        $stmt->bind_param("i", $id_categoria);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return 'Categoria deletada com sucesso!&success';
        } else {
            http_response_code(500);
            return 'Erro ao deletar categoria!&warning';
        }
    }
}

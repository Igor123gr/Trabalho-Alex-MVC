<?php

class UsuarioModel {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function buscarTodos() {
        $sql = "SELECT * FROM despesas";
        $stmt = $this->db->prepare($sql);
        $stmt->execute( );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function criar($dados) {
        $sql = "INSERT INTO despesas (nome, quantia, prazo) VALUES (:nome, :quantia, :prazo)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'nome' => $dados['nome'] ,
            'quantia' => $dados['quantia'] ,
            'prazo' => $dados['prazo'], 
            ]);
        return $this->db->lastInsertId();
    }

    public function atualizar($id, $dados) {
        $sql = "UPDATE despesas SET nome = :nome, quantia = :quantia, prazo = :prazo WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['nome' => $dados['nome'], 'quantia' => $dados['quantia'], 'prazo' => $dados['prazo'], 'id' => $id]);
    }

    public function excluir($id) {
        $sql = "DELETE FROM despesas WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public function buscarPorId($id) {
    $sql = "SELECT * FROM despesas WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}
?>

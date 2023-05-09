<?php
require_once 'Database.php';

class Tax {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function findAll() {
        $query = 'SELECT * FROM impostos';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($taxData) {
        $query = 'INSERT INTO impostos (tipo_produto_id, porcentagem) VALUES (:tipo_produto_id, :porcentagem)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tipo_produto_id', $taxData['tipo_produto_id']);
        $stmt->bindParam(':porcentagem', $taxData['porcentagem']);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function update($taxData) {
        $query = 'UPDATE impostos SET tipo_produto_id = :tipo_produto_id, porcentagem = :porcentagem WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $taxData['id']);
        $stmt->bindParam(':tipo_produto_id', $taxData['tipo_produto_id']);
        $stmt->bindParam(':porcentagem', $taxData['porcentagem']);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = 'DELETE FROM impostos WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

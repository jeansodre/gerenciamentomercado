<?php
require_once 'Database.php';

class Sale {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function findAll() {
        $query = 'SELECT * FROM vendas';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function insert($saleData) {
        $query = 'INSERT INTO vendas (data, total, total_impostos) VALUES (now(), :total, :total_impostos)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':total', $saleData['total']);
        $stmt->bindParam(':total_impostos', $saleData['total_impostos']);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function update($saleData) {
        $query = 'UPDATE vendas SET total = :total, total_impostos = :total_impostos WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $saleData['id']);
        $stmt->bindParam(':total', $saleData['total']);
        $stmt->bindParam(':total_impostos', $saleData['total_impostos']);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = 'DELETE FROM vendas WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

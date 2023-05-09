<?php
require_once 'Database.php';

class SaleItem {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }


    public function findAll() {
        $query = 'SELECT * FROM itens_venda';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($saleItemData) {
        $query = 'INSERT INTO itens_venda (venda_id, produto_id, quantidade, valor_unitario, valor_total, valor_imposto) VALUES (:venda_id, :produto_id, :quantidade, :valor_unitario, :valor_total, :valor_imposto)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':venda_id', $saleItemData['venda_id']);
        $stmt->bindParam(':produto_id', $saleItemData['produto_id']);
        $stmt->bindParam(':quantidade', $saleItemData['quantidade']);
        $stmt->bindParam(':valor_unitario', $saleItemData['valor_unitario']);
        $stmt->bindParam(':valor_total', $saleItemData['valor_total']);
        $stmt->bindParam(':valor_imposto', $saleItemData['valor_imposto']);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function update($saleItemData) {
        $query = 'UPDATE itens_venda SET venda_id = :venda_id, produto_id = :produto_id, quantidade = :quantidade, valor_unitario = :valor_unitario, valor_total = :valor_total, valor_imposto = :valor_imposto WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $saleItemData['id']);
        $stmt->bindParam(':venda_id', $saleItemData['venda_id']);
        $stmt->bindParam(':produto_id', $saleItemData['produto_id']);
        $stmt->bindParam(':quantidade', $saleItemData['quantidade']);
        $stmt->bindParam(':valor_unitario', $saleItemData['valor_unitario']);
        $stmt->bindParam(':valor_total', $saleItemData['valor_total']);
        $stmt->bindParam(':valor_imposto', $saleItemData['valor_imposto']);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = 'DELETE FROM itens_venda WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

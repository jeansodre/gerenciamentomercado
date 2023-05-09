<?php
require_once 'Database.php';

class Product {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function findAll() {
        $query = 'SELECT p.*, i.porcentagem as taxrate FROM produtos p INNER JOIN impostos i ON p.tipo_produto_id = i.id';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($productData) {
        $query = 'INSERT INTO produtos (nome, tipo_produto_id, preco) VALUES (:nome, :tipo_produto_id, :preco)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nome', $productData['nome']);
        $stmt->bindParam(':tipo_produto_id', $productData['tipo_produto_id']);
        $stmt->bindParam(':preco', $productData['preco']);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function update($productData) {
        $query = 'UPDATE produtos SET nome = :nome, tipo_produto_id = :tipo_produto_id, preco = :preco WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $productData['id']);
        $stmt->bindParam(':nome', $productData['nome']);
        $stmt->bindParam(':tipo_produto_id', $productData['tipo_produto_id']);
        $stmt->bindParam(':preco', $productData['preco']);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = 'DELETE FROM produtos WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

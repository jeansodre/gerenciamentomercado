<?php
require_once 'Database.php';

class ProductType {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function findAll() {
        $query = 'SELECT * FROM tipos_de_produtos';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function insert($productTypeData) {
        error_log('ProductType::insert() called');
        $query = 'INSERT INTO tipos_de_produtos (nome) VALUES (:nome)';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nome', $productTypeData['nome']);
    
        if (!$stmt->execute()) {
            error_log('Error executing insert query: ' . json_encode($stmt->errorInfo()));
            return false;
        }
    
        $id = $this->db->lastInsertId();
        error_log("Inserted record ID: {$id}");
    
        // Buscar e retornar o registro completo inserido
        $query = 'SELECT * FROM tipos_de_produtos WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
    
        if (!$stmt->execute()) {
            error_log('Error executing select query: ' . json_encode($stmt->errorInfo()));
            return false;
        }
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        error_log('Selected record: ' . json_encode($result));
        return $result;
    }
    
    public function update($productTypeData) {
        $query = 'UPDATE tipos_de_produtos SET nome = :nome, imposto_id = :imposto_id WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $productTypeData['id']);
        $stmt->bindParam(':nome', $productTypeData['nome']);
        $stmt->bindParam(':imposto_id', $productTypeData['imposto_id']);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = 'DELETE FROM tipos_de_produtos WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

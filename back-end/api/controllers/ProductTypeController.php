<?php
require_once 'BaseController.php';
require_once 'models/ProductType.php';

class ProductTypeController extends BaseController {
    private $productType;

    public function __construct($requestMethod) {
        parent::__construct($requestMethod);
        $this->productType = new ProductType();
    }

    public function getAll() {
        $result = $this->productType->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    public function create() {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        $result = $this->productType->insert($input);
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = json_encode($result);
        return $response;
    }

    public function update() {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        $result = $this->productType->update($input);
        $response['status_code_header'] = $result ? 'HTTP/1.1 200 OK' : 'HTTP/1.1 400 Bad Request';
        $response['body'] = json_encode($result);
        return $response;
    }

    public function delete() {
        $id = (int) $_GET['id'];
        $result = $this->productType->delete($id);
        $response['status_code_header'] = $result ? 'HTTP/1.1 200 OK' : 'HTTP/1.1 400 Bad Request';
        $response['body'] = json_encode($result);
        return $response;
    }
}

<?php
require_once 'BaseController.php';
require_once 'models/Sale.php';

class SaleController extends BaseController {
    private $sale;

    public function __construct($requestMethod) {
        parent::__construct($requestMethod);
        $this->sale = new Sale();
    }

    public function getAll() {
        $result = $this->sale->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    public function create() {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        $result = $this->sale->insert($input);
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = json_encode($result);
        return $response;
    }


    public function update() {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        $result = $this->sale->update($input);
        $response['status_code_header'] = $result ? 'HTTP/1.1 200 OK' : 'HTTP/1.1 400 Bad Request';
        $response['body'] = json_encode($result);
        return $response;
    }

    public function delete() {
        $id = (int) $_GET['id'];
        $result = $this->sale->delete($id);
        $response['status_code_header'] = $result ? 'HTTP/1.1 200 OK' : 'HTTP/1.1 400 Bad Request';
        $response['body'] = json_encode($result);
        return $response;
    }
}

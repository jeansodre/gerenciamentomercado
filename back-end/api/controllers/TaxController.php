<?php
require_once 'BaseController.php';
require_once 'models/Tax.php';

class TaxController extends BaseController {
    private $tax;

    public function __construct($requestMethod) {
        parent::__construct($requestMethod);
        $this->tax = new Tax();
    }

    public function getAll() {
        $result = $this->tax->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    public function create() {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        $result = $this->tax->insert($input);
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = json_encode($result);
        return $response;
    }

    public function update() {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        $result = $this->tax->update($input);
        $response['status_code_header'] = $result ? 'HTTP/1.1 200 OK' : 'HTTP/1.1 400 Bad Request';
        $response['body'] = json_encode($result);
        return $response;
    }

    public function delete() {
        $id = (int) $_GET['id'];
        $result = $this->tax->delete($id);
        $response['status_code_header'] = $result ? 'HTTP/1.1 200 OK' : 'HTTP/1.1 400 Bad Request';
        $response['body'] = json_encode($result);
        return $response;
    }
}

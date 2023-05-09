<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

abstract class BaseController {
    protected $requestMethod;

    public function __construct($requestMethod) {
        $this->requestMethod = $requestMethod;
    }

    public function processRequest() {
        if ($this->requestMethod == 'OPTIONS') {
            header('HTTP/1.1 200 OK');
            exit();
        }
    
        switch ($this->requestMethod) {
            case 'GET':
                $response = $this->getAll();
                break;
            case 'POST':
                $response = $this->create();
                break;
            case 'PUT':
                $response = $this->update();
                break;
            case 'DELETE':
                $response = $this->delete();
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }
    

    protected function notFoundResponse() {
        return [
            'status_code_header' => 'HTTP/1.1 404 Not Found',
            'body' => json_encode(['error' => 'Endpoint not found'])
        ];
    }
}

<?php
require_once 'BaseController.php';
require_once 'models/SaleItem.php';

class SaleItemController extends BaseController {
    private $saleItem;

    public function __construct($requestMethod) {
        parent::__construct($requestMethod);
        $this->saleItem = new SaleItem();
    }

    public function getAll() {
        $result = $this->saleItem->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    public function create() {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        $saleId = $input['saleId'];
        $items = $input['items'];
        $results = [];
        
        foreach ($items as $item) {
            $itemData = [
                'venda_id' => $saleId,
                'produto_id' => $item['productId'],
                'quantidade' => $item['quantity'],
                'valor_unitario' => $item['total'] / $item['quantity'],
                'valor_total' => $item['total'],
                'valor_imposto' => $item['taxAmount']
            ];
            $results[] = $this->saleItem->insert($itemData);
        }
    
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = json_encode($results);
        return $response;
    }    

    public function update() {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        $result = $this->saleItem->update($input);
        $response['status_code_header'] = $result ? 'HTTP/1.1 200 OK' : 'HTTP/1.1 400 Bad Request';
        $response['body'] = json_encode($result);
        return $response;
    }

    public function delete() {
        $id = (int) $_GET['id'];
        $result = $this->saleItem->delete($id);
        $response['status_code_header'] = $result ? 'HTTP/1.1 200 OK' : 'HTTP/1.1 400 Bad Request';
        $response['body'] = json_encode($result);
        return $response;
    }
}

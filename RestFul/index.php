<?php
include_once 'config.php';
$con = new DB_con();
$api = new API_Data();
$api->validateToken(); 
class API_Data{

    private $token; 
    private $order; 

    function __construct(){ }

    public function validateToken(){
        $this->token = $_REQUEST['token'];
        $this->order = $_REQUEST['order'];
        if($this->token){
            $this->getOrder($this->order);
        }
    }
    public function getOrder($order){
        $orderDetails = Mage::getModel('sales/order');
        if($order == 'all'){
            $allOrders = $orderDetails->getCollection()->getData();
            $data['status'] = '200';
            $data['order'] = $allOrders;
            prstyle($data);
        }else if(is_numeric($order)){
            $specificOrder = $orderDetails->load($order)->getData();
            $data['status'] = '200';
            $data['order'] = $specificOrder;
            prstyle($data);
        }
    }
}

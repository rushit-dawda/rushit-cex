<?php
include_once 'config.php';
$con = new DB_con();
$api = new API_Data();

if(isset($_REQUEST['token'])){
    $api->validateToken(); 
}
class API_Data{

    private $token; 
    private $order; 
    private $mainToken; 

    function __construct(){ }
    
    public function validateToken(){
        $this->mainToken = '113328592302739';
        $this->token = $_REQUEST['token'];
        $this->order = $_REQUEST['order'];
        if($this->mainToken == $this->token){
            $this->getOrder($this->order);
        }else{
            $data['status'] = '201';
            $data['msg'] = 'Invalid Token';
            apiResponse($data); 
        }
    }
    
    public function getOrder($order){
        $orderDetails = Mage::getModel('sales/order');
        if($order == 'all'){
            $allOrders = $orderDetails->getCollection()->getData();
            $data['status'] = '200';
            $data['order'] = $allOrders;
        }else if(is_numeric($order)){
            $specificOrder = $orderDetails->load($order)->getData();
            if($specificOrder){
                $data['status'] = '200';
                $data['order'] = $specificOrder;
            }else{
                $data['status'] = '201';
                $data['msg'] = 'Invalid OrderID';
            }
        }else{
            $data['status'] = '201';
            $data['msg'] = 'Invalid Params';
        }
        apiResponse($data);
    }

}

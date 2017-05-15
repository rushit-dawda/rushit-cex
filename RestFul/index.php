<?php
include_once 'config.php';
$con = new DB_con();
$api = new API_Data();
$api->validateToken(); 
class API_Data{

    private $token; 
    private $order; 

    public function validateToken(){
        $this->token = $_REQUEST['token'];
        $this->order = $_REQUEST['order'];
        if($this->token){
            $this->getOrder($this->order);
        }
    }

    public function getOrder($order){
        echo $order;
    }
}

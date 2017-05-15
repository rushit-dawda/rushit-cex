<?php


require_once('../app/Mage.php'); //Path to Magento

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'root@123');
define('DB_NAME', 'rushit-cex');

class DB_con{
    
    function __construct(){
        $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }else{
            $mageConnect = $this->connectMagento();
            // if ($mageConnect){
            //     $this->verifyToken($token);
            // }
        } 
    }

    function connectMagento(){
        umask(0);
        Mage::app();
        return true; 
    }
}

function prstyle($data){
    echo '<pre>'; 
    print_r($data); 
}
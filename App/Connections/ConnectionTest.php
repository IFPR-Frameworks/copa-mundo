<?php 

namespace App\Connections;

//include __DIR__ . "/../../vendor/autoload.php";


use Exception;
use App\Connections\ConnectionFactory;

class ConnectionTest{

    public function test(){

        try {
            $connectionFactory = new ConnectionFactory();
            $connection = $connectionFactory->getConnection();

            print "###Tudo certo com sua conexão!!!";
        
        } catch(Exception $e){
            print "###Erro: " . $e->getMessage();
        }

    }

}

//$conn = new ConnectionTest();
//$conn->test();

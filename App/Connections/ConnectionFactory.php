<?php 

namespace App\Connections;

use PDO;

class ConnectionFactory {

    public $user = "root";
    public $password = "bancodedados";
    public $database = "copa_mundo";

    public function getConnection(){

        $pdo = new PDO (
            "mysql:host=localhost;dbname={$this->database}",
            $this->user,
            $this->password
        );

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
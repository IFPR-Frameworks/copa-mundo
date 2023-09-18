<?php 

namespace App\Connections;

use PDO;

class ConnectionFactory {

    public $user = "???"; //informe o usuário para acesso ao banco de dados
    public $password = "???"; //informe a senha
    public $database = "???"; //informe o nome da base de dados criada por você

    public function getConnection(){

        $pdo = new PDO ("mysql:host=localhost;dbname={$this->database}", $this->user, $this->password );

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}

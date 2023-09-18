<?php 

namespace App\Repositories;

use App\Connections\ConnectionFactory;
use PDO;

class TeamRepository {

    public $connection;

    public function __construct()
    {
        $factory = new ConnectionFactory();
        $this->connection = $factory->getConnection();
    }

    public function getAll(){
        $sql = "SELECT * FROM tb_selecoes";

        $table = $this->connection->query($sql); 
        $resultados = $table->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function getById(int $id){

        //substitua TODAS as interrogações do método por id 


        $sql = "SELECT * FROM tb_selecoes WHERE id = :???";

        $table = $this->connection->prepare($sql); 
        $table->bindParam(":???", $???);

        $table->execute();

        $resultados = $table->fetch(PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function getByAbrev(string $abrev){
        $sql = "SELECT * FROM tb_selecoes WHERE abrev = :abrev";

        $table = $this->connection->prepare($sql); 
        $table->bindParam(":abrev", $abrev);

        $table->execute();

        $resultados = $table->fetch(PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function getByName(string $team_name){
        $sql = "SELECT * FROM tb_selecoes WHERE team_name = :team_name";

        $table = $this->connection->prepare($sql); 
        $table->bindParam(":team_name", $team_name);

        $table->execute();

        return $table->fetch(PDO::FETCH_ASSOC);
    }

    public function getByGroup(string $group){
        $sql = "SELECT * FROM tb_selecoes WHERE tb_selecoes.group = :team_group";
        
        $table = $this->connection->prepare($sql); 
        $table->bindParam(":team_group", $group);

        $table->execute();

        return $table->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(string $texto){

        $sql = "INSERT INTO tb_selecoes (???) VALUES('$texto')";

        $statement = $this->connection->exec($sql);

        $id = $this->connection->lastInsertId();

        return $id;
    }
}
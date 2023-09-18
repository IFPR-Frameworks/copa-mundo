<?php 

namespace App\Repositories;

use App\Connections\ConnectionFactory;
use PDO;

class PlayersRepository {

    public PDO $connection;

    public function __construct()
    {
        $factory = new ConnectionFactory();
        $this->connection = $factory->getConnection();
    }

    public function getAll(){
        //$sql = "SELECT * FROM tb_jogadores";
        $sql = "SELECT * FROM tb_jogadores as j INNER JOIN tb_selecoes as s ON j.selecao = s.id ORDER BY RAND() LIMIT 11";

        $table = $this->connection->query($sql);
        return $table->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id){
        $sql = "SELECT * FROM tb_jogadores WHERE id = :id";

        $table = $this->connection->prepare($sql); 
        $table->bindParam(":id", $id);

        $table->execute();

        $resultados = $table->fetch(PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function getByName(string $team_name){
        $sql = "SELECT * FROM tb_teams WHERE team_name = :team_name";

        $table = $this->connection->prepare($sql); 
        $table->bindParam(":team_name", $team_name);

        $table->execute();

        return $table->fetch(PDO::FETCH_ASSOC);
    }

    public function getByGroup(string $group){
        $sql = "SELECT * FROM tb_teams WHERE tb_teams.group = :team_group";
        
        $table = $this->connection->prepare($sql); 
        $table->bindParam(":team_group", $group);

        $table->execute();

        return $table->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByTeamId(int $id){
        $sql = "SELECT * FROM tb_jogadores WHERE tb_jogadores.selecao = :id";
        
        $table = $this->connection->prepare($sql); 
        $table->bindParam(":id", $id);

        $table->execute();

        return $table->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(string $texto){

        $sql = "INSERT INTO tb_teams (???) VALUES('$texto')";

        $statement = $this->connection->exec($sql);

        $id = $this->connection->lastInsertId();

        return $id;
    }
}

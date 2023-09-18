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

    public function getRandomPlayers(int $numberOfPlayers){

        $sql = "SELECT * FROM tb_jogadores as j INNER JOIN tb_selecoes as s ON j.selecao = s.id ORDER BY RAND() LIMIT $numberOfPlayers";

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

    public function getByName(string $nome){
        $sql = "SELECT * FROM tb_jogadores WHERE nome = :nome";

        $table = $this->connection->prepare($sql); 
        $table->bindParam(":nome", $nome);

        $table->execute();

        return $table->fetch(PDO::FETCH_ASSOC);
    }
}

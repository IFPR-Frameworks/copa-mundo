<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Repositories\PlayersRepository;

class PlayerController {

    private mixed $container;
    private PlayersRepository $repository;

    public function __construct($container)
    {
        $this->container = $container;
        $this->repository = new PlayersRepository();
    }

    public function getById(Request $request, Response $response, array $params){

        //para obter os parâmetros da URL substitua as interrogações por "$params['id']"
        //Após realida as alterações, teste a rota acessando: localhost:8080/players/274 
        $id = ???;
        
        //Substitua as interrogações por "getById"
        $data['player'] = $this->repository->???($id);

        print "<h1>Essa rota não possui uma tela associada</h1><br/>";

        print_r($data);
        exit;

        return $this->container->view->render($response, '???.php', $data);
    }

    public function getByName(Request $request, Response $response, array $params){

        //para obter os parâmetros da URL substitua as interrogações por "$params['name']"
        //Após realida as alterações, teste a rota acessando: localhost:8080/players/name/Alisson 
        $name = ???;

        //Substitua as interrogações por "getByName"
        $data['players'] = $this->repository->???($name);

        print "<h1>Essa rota não possui uma tela associada</h1><br/>";
        print_r($data);
        exit;

        return $this->container->view->render($response, '???.php', $data);
    }

}
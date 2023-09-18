<?php

namespace App\Controllers;

use App\Repositories\PlayersRepository;
use Slim\Http\Request;
use Slim\Http\Response;

class PlayerController {

    private mixed $container;
    private PlayersRepository $repository;

    public function __construct($container)
    {
        $this->container = $container;
        $this->repository = new PlayersRepository();
    }

    public function getAll(Request $request, Response $response, array $params){

        $data['players'] = $this->repository->getAll();

        return $this->container->view->render($response, 'home.php', $data);
    }

}
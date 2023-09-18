<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Repositories\TeamRepository;

class TeamController {

    private mixed $container;
    private TeamRepository $teamRepository;

    public function __construct($container)
    {
        $this->container = $container;

        //Substitua as interrogações por TeamRepository
        //Use esse objeto ($this->teamRepository) para acessar todas as operações com bancos de dados
        $this->teamRepository = new ???;
    }

    /**
     * function getAll
     * 
     * Obtem uma lista de todos as seleções que participaram da copa do mundo de 2022
     *
     * @param Request $request
     * @param Response $response
     * @param array $params
     * @return void
     */
    public function getAll(Request $request, Response $response, array $params){

        //Procure uma arquivo TeamRepository um método que retorne uma lista de todoas as seleções;
        //Normalmente a operação se parece com algo do tipo: SELECT * FROM ...
        $data['teams'] = $this->teamRepository->???();

        //Substitua as interrogações por "teams.php"
        //Os dados buscados aqui estarão disponíveis nesse template para uso
        return $this->container->view->render($response, 'teams.php', $data);
    }

    public function getById(Request $request, Response $response, array $params){

        $teamId = $params['id'];

        $data['team'] = $this->teamRepository->getById($teamId);
        $data['players'] = $this->playerRepository->getByTeamId($teamId);

        return $this->container->view->render($response, 'team.php', $data);
    }

    public function getByAbrev(Request $request, Response $response, array $params){

        $data['team'] = $this->teamRepository->getAll();

        return $this->container->view->render($response, 'team.php', $data);
    }

}
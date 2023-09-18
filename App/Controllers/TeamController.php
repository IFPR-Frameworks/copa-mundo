<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Repositories\TeamRepository;
use App\Repositories\PlayersRepository;


class TeamController {

    private mixed $container;
    private TeamRepository $teamRepository;
    private PlayersRepository $playerRepository;

    public function __construct($container)
    {
        $this->container = $container;
        $this->teamRepository = new TeamRepository();
        $this->playerRepository = new PlayersRepository();
    }

    public function getAll(Request $request, Response $response, array $params){

        $data['teams'] = $this->teamRepository->getAll();

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
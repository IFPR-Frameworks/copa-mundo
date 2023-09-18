<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Repositories\PlayersRepository;

class HomeController {

    private mixed $container;
    private PlayersRepository $repository;

    public function __construct($container)
    {
        $this->container = $container;
        $this->repository = new PlayersRepository();
    }

    /**
     *  function home
     *
     * Obtem uma lista de N jogadores para exibir na página inicial do site
     * 
     * @param Request $request
     * @param Response $response
     * @param array $params
     * @return void
     */
    public function home(Request $request, Response $response, array $params){

        //Substitua as interrogações pelo número de jogadores que você deseja que seja exibido na home page
        $numberOfPlayers = ???;

        $data['players'] = $this->repository->getRandomPlayers($numberOfPlayers);

        //Substitua as interrogaçõe pela variável $data. Os valores dessa variável estarão disponíveis no template "home.php"
        //Neste exemplo, haverá disponível no template uma variável chamada $players 
        return $this->container->view->render($response, 'home.php', ???);
    }
}
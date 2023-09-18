<?php

namespace App\Routes;

use Slim\App;
use Slim\Views\PhpRenderer;

use App\Controllers\PlayerController;
use App\Controllers\TeamController;
use App\Connections\ConnectionTest;

$settings = [
    'settings' => ['displayErrorDetails' => true]
];

$app = new App($settings);

 // Get container
 $container = $app->getContainer();

 // Register component on container
 $container['view'] = new PhpRenderer(__DIR__ . "/../Views/");

//Adicione suas rotas aqui!
$app->get('/', HomeController::class . ":home");
$app->get('/teams', TeamController::class . ":getAll");
$app->get('/teams/{id}', TeamController::class . ":getById");

$app->get('/players/{id}', PlayerController::class . ":getById");
$app->get('/players/name/{name}', PlayerController::class . ":getByName");

$app->get('/players/search/{search}', PlayerController::class . ":getBySearchParam");

$app->run();

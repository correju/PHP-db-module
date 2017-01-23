<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/autoload.php';
require '../src/conf/settings.php';

$app = new \Slim\App(["settings" => $config]);

require '../src/dbConecction.php';


$app->get('/conf', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');

    $myClass = new MyClass($this->db);
    $t = $myClass->getData();
    $arr["api_key"] = '627f5aa49c72d956816a42be38b338cd';
    $arr["images"]["base_url"] = 'http://image.tmdb.org/t/p/';
    $arr["images"]["small"] = 'w45';
    $arr["images"]["big"] = 'w300';

    $response->withHeader('Content-Type', 'application/json');
    $response->write(json_encode($t));
    return $response;
});

$app->run();

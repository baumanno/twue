<?php declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Exception\MethodNotAllowedException;
use Slim\Exception\NotFoundException;
use Twue\Controller\ApiController;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new App();

$container = $app->getContainer();

$app->get('/', function(ServerRequestInterface $req, ResponseInterface $res) {
    $res->getBody()->write("Just a test");

    return $res;
});

$app->group('/api/v1', function () {
    $this
        ->get('/render', \Twue\Controller\ApiController::class . ':renderAction')
        ->setName('render');
});

try {
    $app->run();
} catch (MethodNotAllowedException $e) {
    echo $e->getMessage();
} catch (NotFoundException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}

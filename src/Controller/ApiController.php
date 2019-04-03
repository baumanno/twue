<?php declare(strict_types=1);

namespace Twue\Controller;

use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class ApiController
{

    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function renderAction(Request $request, Response $response, array $params): Response
    {
        return $response->withStatus(200)->withJson(['OK']);
    }
}
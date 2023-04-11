<?php

declare(strict_types=1);

namespace App\Application;

class Router
{
    protected array $routes = [];

    public function __construct(public Request $request, public Response $response)
    {
    }


    public function get(string $path, $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post(string $path, callable $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve(): Response
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if (!$callback) {
//            throw new \Exception('Not found', 404);
            trigger_error('', E_USER_ERROR);
//            $this->response->setStatusCode(404);
//            echo 'Not found'; die;
        }

        return $callback();
    }

}

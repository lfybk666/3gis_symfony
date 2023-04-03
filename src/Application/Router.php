<?php

namespace App\Application;

//use \Exception;

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

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if (!$callback) {
            // TODO сделать throw ,Когда стану чуть умнее ,ибо ща чет не получается(
//            throw new \Exception('not found', 404);
            $this->response->setStatusCode(404);
            echo 'Not found'; die;
        }
        return $callback();
    }

}

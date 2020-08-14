<?php

namespace app\core;

use app\core\Application;
use app\core\middlewares\BaseMiddleware;

class Controller
{
    public string $layout = 'main';
    public string $action = '';

    /**
     * @var BaseMiddleware[]
     */
    protected array $middlewares = [];

    public function setLayout(string $layout):void
    {
        $this->layout = $layout;
    }

    public function render(string $view, array $params = [], string $component = '')
    {
        return Application::$app->view->renderView($view, $params, $component);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares():array
    {
        return $this->middlewares;
    }
}

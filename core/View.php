<?php

namespace app\core;

use app\core\Application;


class View
{
    public string $title = '';

    public function renderView($view, array $params, $component)
    {
        $layoutName = Application::$app->layout;
        if(Application::$app->controller){
            $layoutName = Application::$app->controller->layout;
        }
        $viewContent = $this->renderViewOnly($view, $params);
        if($component != ''){
            $viewComponent = $this->renderComponent($component, $params);
            ob_start();
            include_once Application::$ROOT_DIR."/views/pages/$view.php";
            $viewContent = str_replace('{{component}}', $viewComponent, $viewContent);
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/$layoutName.php";
        $layoutContent = ob_get_clean();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderViewOnly($view, array $params)
    {
        foreach ($params as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/pages/$view.php";
        return ob_get_clean();
    }

    public function renderComponent($component, array $params)
    {
        foreach ($params as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/components/$component.php";
        return ob_get_clean();
    }

}

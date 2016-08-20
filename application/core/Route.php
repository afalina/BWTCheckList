<?php
namespace App;

class Route
{
    static public function start()
    {
        $controllerName = 'Main';
        $actionName = 'Index';
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if (!empty($routes[1])) {
            $controllerName = $routes[1];
        }
        if (!empty($routes[2]) ) {
            $actionName = $routes[2];
        }
        \App\Route::includeModelFile($controllerName);
        \App\Route::includeControllerFile($controllerName);
        \App\Route::addAction($actionName, $controllerName);
    }

    public function includeModelFile($controllerName) 
    {
        $modelPath = 'application/models/Model'.$controllerName.'.php';
        if(file_exists($modelPath)) {
            include $modelPath;
        }
    }

    public function includeControllerFile($controllerName)
    {
        $controllerPath = 'application/controllers/Controller'.$controllerName.'.php';
        if(file_exists($controllerPath)) {
            include $controllerPath;
        } else {
            \App\Route::ErrorPage404();
        }
    }

    public function addAction($actionName, $controllerName) 
    {
        $controllerName = '\App\Controller'.$controllerName;
        $controller = new $controllerName;
        $action = 'action'.$actionName;
        if(method_exists($controller, $action)) {
            $controller->$action();
        } else {
            \App\Route::ErrorPage404();
        }
    }

    public function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}
<?php
class Route
{
    static function start() 
    {
        // контроллер и действие по умолчанию
        $controllerName = 'cards';
        $actionName = 'main';
        
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if (isset($routes[1]) && ctype_alnum($routes[1])) {   
            $controllerName = $routes[1];
        }
        
        // получаем имя экшена
        if (isset($routes[2]) && ctype_alnum($routes[2])) {
            $actionName = $routes[2];
        }
        
        // добавляем префиксы
        $modelName = 'Model'.ucfirst($controllerName);
        $controllerName = 'Controller'.ucfirst($controllerName);

        // подцепляем файл с классом модели (файла модели может и не быть)
        $modelFile = substr_replace(strtolower($modelName).'.php', '_', 5, 0);
        $modelPath = "application/models/".$modelFile;
        if (file_exists($modelPath)) {
            include "application/models/".$modelFile;
        }

        // подцепляем файл с классом контроллера
        $controllerFile = substr_replace(strtolower($controllerName).'.php', '_', 10, 0);
        $controllerPath = "application/controllers/".$controllerFile;
        try {
        	if (file_exists($controllerPath)) {
        		include "application/controllers/".$controllerFile;
        	}
        	else {
        		throw new Exception();
            }
        }
        catch (Exception $e) {
            exit('Вы не туда попали!');
        }
                
        // создаем объект контроллера
        $controller = new $controllerName;
        $action = $actionName;
        
        try {
        	if (method_exists($controller, $action)) {
        		// вызываем действие контроллера
        		$controller->$action();
        	}
        	else {
        		throw new Exception();
        	}
        }
        catch (Exception $e) {
            exit('Вы не туда попали!');
        }
    }
}
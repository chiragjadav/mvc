<?php
namespace Controller\Core;
//Mage::loadFileByClassName('Model_Core_Request');

class Front {
    public static function init(){
        $request = \Mage::getModel('Model\Core\Request');
        
        $controllerName = ucfirst($request->getControllerName());
        $actionName = $request->getActionName()."Action";

        $controllerClassName = \Mage::prepareClassName('Controller', $controllerName);
       $controller = \Mage::getController($controllerClassName);
       $controller->$actionName();

        /* require_once "Controller/{$controllerName}.php";
        $className = 'Controller_'.$controllerName;
        $controller = new $className(); */

    }
}

?>
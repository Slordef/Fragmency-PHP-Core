<?php


namespace Fragmency\Core;


use Dotenv\Dotenv;

class Application
{
    private static $routingParams;

    public static function getRoutingParam($param){ return self::$routingParams[$param] ?? null; }
    public static function setRoutingParam($params){ self::$routingParams = $params; }

    private $Fragmency;

    public function __construct($Fragmency){
        $this->Fragmency = $Fragmency;
        $this->environnement();
    }

    private function environnement(){
        $path = $this->getRootProjectFolder();
        if(file_exists($path.'.env')) {
            $dotenv = Dotenv::createImmutable($path);
            $dotenv->load();
        }
    }
    
    public function getRootProjectFolder(){ return dirname(__FILE__,5); }
    public function getAppFolder(){ return $this->getRootProjectFolder().getenv('APP_FOLDER'); }
    public function getConfigFolder(){ return $this->getAppFolder().getenv('CONFIG_FOLDER'); }
    public function getControllersFolder(){ return $this->getAppFolder().getenv('CONTROLLERS_FOLDER'); }
    public function getViewsFolder(){ return $this->getAppFolder().getenv('VIEWS_FOLDER'); }
    public static function STATIC_getRootProjectFolder(){ return dirname(__FILE__,5); }
    public static function STATIC_getAppFolder(){ return self::STATIC_getRootProjectFolder().getenv('APP_FOLDER'); }
    public static function STATIC_getViewsFolder(){ return self::STATIC_getAppFolder().getenv('VIEWS_FOLDER'); }
    
    public function useController($ControllerManager,$do,$view){
        $controller = $ControllerManager->call($do,$view);
        if(!$controller) return false;
        $method = $view.'_METHOD';
        Response::page($controller->$method());
    }
    
    public function useRouterController($Router,$ControllerManager){
        if(!($route = $Router->getRoute())) return false;
        if($route->isFunction()){
            $data = $route->runFunction();
        }else{
            if(!$ControllerManager) throw new \Exception("Module Fragmency Controller not installed ! Routes can't be follow");
            $controller = $ControllerManager->call($route->getController(),$route->getView());
            if(!$controller) return false;
            $method = $route->getView().'_METHOD';
            $data = $controller->$method();
        }
        if(is_a($data,'Page')) Response::page($data);
        else $this->Fragmency->file($data);
    }
}
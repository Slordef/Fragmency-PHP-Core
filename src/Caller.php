<?php


namespace Fragmency\Core;


class Caller
{
    private $app;
    private $db;
    private $router;
    private $files;
    private $controller;

    public function __construct(Application $app){
        $this->app = $app;
        $this->db = $this->Database();
        $this->router = $this->Router();
        $this->files = $this->Files();
        $this->controller = $this->Controller();
    }
    public function getAll(){
        return [
            $this->db,
            $this->router,
            $this->files,
            $this->controller
        ];
    }
    public function Database(){
        $class = "Fragmency\\Database\\DB";
        return class_exists($class) ? new $class($this->app) : false;
    }
    public function Router(){
        $class = "Fragmency\\Routing\\Router";
        return class_exists($class) ? new $class($this->app) : false;
    }
    public function Files(){
        $class = "Fragmency\\Files\\Files";
        return class_exists($class) ? new $class($this->app) : false;
    }
    public function Controller(){
        $class = "Fragmency\\Control\\ControllerManager";
        return class_exists($class) ? new $class($this->app) : false;
    }
}
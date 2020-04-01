<?php


namespace Fragmency\Core;

require_once __DIR__."/Errors/errors_constantes.php";
require_once __DIR__."/helper.php";

/**
 * Class Fragmency
 * @package Fragmency\Core
 */
class Fragmency
{
    private $Application;
    private $Caller;
    private $DB;
    private $Router;
    private $Files;
    private $Controller;

    public function __construct(){

        set_error_handler('Fragmency_Func_Error_Handler',E_ALL|E_PARSE|E_STRICT);
        set_exception_handler('Fragmency_Func_Exception_Handler');
        register_shutdown_function('shutdownHandler');
        $this->Application = new Application($this);
        $this->Caller = new Caller($this->Application);
        [
            $this->DB,
            $this->Router,
            $this->Files,
            $this->Controller
        ] = $this->Caller->getAll();
    }

    /**
     * Fragmency Launcher
     * Search for compose in order
     * Router? | Controller? | file use
     * @param mixed|null $do (null for Router|Controller class|String 'file')
     * @param string|null $view (null for Router|method for Controller|path to file)
     * @return null
     * @throws \Exception
     */
    public function launch($do = null, string $view = null){
        if ($this->Router !== null) $this->routingAndControl();
        if ($this->Controller !== null && $view !== null) $this->control($do,$view);
        if($do === "file" && $view !== null) $this->file($view);
        
        throw new \Exception("Fragmency Launcher ending without any solution");
        return null;
    }
    
    private function file($file){
        if(!file_exists($file)) return false;
        $page = new Page();
        $page->setContent('layout', $file);
        Response::page($page);
    }
    private function control($do,$view){
        return $this->Application->useController($this->Controller,$do,$view);
    }
    private function routingAndControl(){
        return $this->Application->useRouterController($this->Router,$this->Controller);
    }

    public function __call($name, $arguments)
    {
        $backtrace = debug_backtrace();
        if($backtrace[1]['class'] === 'Fragmency\Core\Application' && $name === 'file'){
            return call_user_func_array([$this,$name],$arguments);
        }
    }
}
<?php

use Fragmency\Core\FragmencyError;

function view(string $view){
    $backtrace = debug_backtrace();
    $classe = $backtrace[1]['object'];
    if(substr(get_class($classe),0,strpos(get_class($classe),'\\')) === 'Controller'){
        $classe->page->setContent('view',$view);
        return $classe->page;
    }
    if(get_class($classe) === 'Fragmency\Routing\Router') {
        $page = new \Fragmency\Core\Page();
        $page->setContent('view',$view);
        return $page;
    }
}

function layout(string $layout){
    $backtrace = debug_backtrace();
    $controller = $backtrace[1]['object'];
    $controller->page->setContent('layout',$layout);
    return $controller->page;
}

function param(string $param){
    return \Fragmency\Core\Application::getRoutingParam($param);
}

function json($data){
    \Fragmency\Core\Response::json($data);
}

function root($path = ""){
    if(substr($path,0,1) === '/' || substr($path,0,1) === '\\')
        return \Fragmency\Core\Application::STATIC_getRootProjectFolder().$path;
    return \Fragmency\Core\Application::STATIC_getRootProjectFolder().'/'.$path;
}

function dd(){
    $debug = func_get_args();
    if(!is_array($debug)) exit('<pre>'.print_r($debug,true).'</pre>');
    foreach ($debug as $d){
        echo '<pre>'.print_r($d,true).'</pre>';
    }
    // FragmencyError::addDebug(print_r($debug,true));
    // (var_dump($debug,true));
    exit();
}
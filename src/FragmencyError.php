<?php


namespace Fragmency\Core;


class FragmencyError
{
    private static $exceptions = [];

    public static function addException($e){
        self::returnPage($e);
    }

    public static function addWarning($errno, $errstr, $errfile, $errline){
        self::returnPage([$errno, $errstr, $errfile, $errline]);
    }

    public static function addDebug($debug){
        self::returnPage(["", $debug, "", ""]);
    }

    public static function returnPage($e){
        if(Request::getXRequest()) Response::json($e);
        $page = new Page();
        $method = is_a($e,"Throwable")?true:false;
        $page->setVar('method',$method);
        $page->setVar('e',$e);
        $page->setContent('content', __DIR__."/Errors/errors_content.php");
        $page->setContent('layout', __DIR__."/Errors/errors_layout.php");
        Response::page($page);
    }

    public static function getExceptions(){
        return self::$exceptions;
    }

    public static function hasException(){ return !!count(self::$exceptions); }
}
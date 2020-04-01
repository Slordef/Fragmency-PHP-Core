<?php

const FRAGMENCY_ERROR = 1;

function Fragmency_Func_Error_Handler($errno, $errstr, $errfile, $errline){
    \Fragmency\Core\FragmencyError::addWarning($errno, $errstr, $errfile, $errline);
}

function Fragmency_Func_Exception_Handler($e){
    \Fragmency\Core\FragmencyError::addException($e);
}

function shutdownHandler() //will be called when php script ends.
{
    $lasterror = error_get_last();
    if(!isset($lasterror)) return false;
    switch ($lasterror['type'])
    {
        case E_ERROR:
        case E_CORE_ERROR:
        case E_COMPILE_ERROR:
        case E_USER_ERROR:
        case E_RECOVERABLE_ERROR:
        case E_CORE_WARNING:
        case E_COMPILE_WARNING:
        case E_PARSE:
            $error = "[SHUTDOWN] lvl:" . $lasterror['type'] . " | msg:" . $lasterror['message'] . " | file:" . $lasterror['file'] . " | ln:" . $lasterror['line'];
            \Fragmency\Core\FragmencyError::addWarning($lasterror['type'], $lasterror['message'], $lasterror['file'], $lasterror['line']);
    }
}
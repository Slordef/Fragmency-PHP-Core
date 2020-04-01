<?php


namespace Fragmency\Core;


class Request
{
    public static function GET($value = null){ return $value === null ? $_GET : $_GET[$value]; }
    public static function POST($value = null){ return $value === null ? $_POST : $_POST[$value]; }
    public static function FILES(){ return $_FILES; }
    public static function COOKIE($value = null){ return $value === null ? $_COOKIE : $_COOKIE[$value]; }

    public static function getXRequest(){ return $_SERVER['HTTP_X_REQUESTED_WITH'] ?? false; }
    public static function getURI(){ return $_SERVER['REQUEST_URI']; }
    public static function getMethod(){ return $_SERVER['REQUEST_METHOD']; }
    public static function getTime(){ return $_SERVER['REQUEST_TIME']; }
    public static function getQuery(){ return $_SERVER['QUERY_STRING'] ?? false; }
    public static function getHost(){ return $_SERVER['HTTP_HOST']; }
    public static function getLanguage(){ return $_SERVER['HTTP_ACCEPT_LANGUAGE']; }
    public static function getAccept(){ return $_SERVER['HTTP_ACCEPT']; }
    public static function getCharset(){ return $_SERVER['HTTP_ACCEPT_CHARSET'] ?? false; }
    public static function getEncoding(){ return $_SERVER['HTTP_ACCEPT_ENCODING']; }
    public static function getConnection(){ return $_SERVER['HTTP_CONNECTION']; }
    public static function getUserAgent(){ return $_SERVER['HTTP_USER_AGENT']; }
    public static function getReferer(){ return $_SERVER['HTTP_REFERER']; }
    public static function getHTTPS(){ return $_SERVER['HTTPS'] ?? false; }
    public static function getRemoteAddr(){ return $_SERVER['REMOTE_ADDR']; }
    public static function getRemotePort(){ return $_SERVER['REMOTE_PORT']; }
    public static function getRemoteHost(){ return $_SERVER['REMOTE_HOST'] ?? false; }
}
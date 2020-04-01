<?php


namespace Fragmency\Core;


class Response
{
    public static function json($data){
        header("Content-Type:application/json");
        exit(json_encode($data));
    }
    public static function page(Page $page){
        header("Content-Type:text/html");
        exit($page->generate());
    }
}
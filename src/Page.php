<?php


namespace Fragmency\Core;


class Page
{
    private static $accept_extention = [
        '.php',
        '.html'
    ];

    private static function ExistsFileView($view){
        $grouped_patterns = [];
        foreach (self::$accept_extention as $pattern) {
            $grouped_patterns[] = "(" . $pattern . ")";
        }
        $master_pattern = '/.*('.join('|',$grouped_patterns).')$/';
        if(preg_match($master_pattern,$view)) return file_exists($view) ? $view : false;
        foreach (self::$accept_extention as $ext){
            $file = $view.$ext;
            if(file_exists($file)) return $file;
            $file = Application::STATIC_getViewsFolder().'/'.$file;
            if(file_exists($file)) return $file;
        }
        return false;
    }
    
    private $vars = [];
    private $contents = [];

    public function __construct(){
    }

    public function setVar($name,$var){
        $this->vars[$name] = $var;
    }

    public function setContent ($label,$content) {
        $this->contents[$label] = $content;
    }

    private function convert(){
        extract($this->vars);
        extract($this->contents);
        $_last;
        foreach ($this->contents as $k => $v){
            if($v = self::ExistsFileView($v)) {
                ob_start();
                require $v;
                $$k = ob_get_clean();
                $_last = $$k;
            }
        }
        if(!isset($_last)) throw new \Exception("No Data to send to page ! Wrong layout or view ?");
        return $_last;
    }
    
    public function generate(){
        return $this->convert();
    }
}
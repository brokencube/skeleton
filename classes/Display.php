<?php
namespace classes;

use HodgePodge\Core\Scribe;

class Display
{
    static public $extra = [];
    
    static public function get()
    {
        static $scribe;
        if ($scribe) return $scribe;
        return $scribe = new Scribe();
    }
    
    static public function page($template, $data)
    {
        $scribe = static::get();
        $scribe->extra = static::$extra;
        echo $scribe->render($template, $data);
    }
    
    static public function add($var, $array)
    {
        $scribe = static::get();
        $scribe->add($var,$array);
    }
}


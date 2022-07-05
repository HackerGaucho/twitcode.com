<?php

require 'cfg.php';
if (MAINTENANCE_MODE) {
    die('maintenance mode 🤖');
}
$str=segment(1);
if ($str=='/') {
    $str='home';
}
$class=ucfirst($str).'Controller';
$className='controller\\'.$class;
if (ctype_alpha($str) and class_exists($className)) {
    $obj=new $className();
    $str=$_SERVER['REQUEST_METHOD'];
    if ($str=='POST') {
        $str='post';
    } else {
        $str='get';
    }
    if (method_exists($obj, $str)) {
        $obj->$str();
    }
}

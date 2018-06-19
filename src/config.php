<?php
/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 6/12/2018
 * Time: 4:25 PM
 */
//sharing all the shared functionality. Create an autoload function that gets triggered

function autoloader($class_name){
    foreach(glob(__DIR__ . '/*', GLOB_ONLYDIR) as $dir){
        if(file_exists("$dir/" . $class_name . '.php')){
            require_once "$dir/" . $class_name . '.php';
            break;
        }
    }
}

spl_autoload_register('autoloader');

$repo = new jsonRepository(__DIR__ . '/database.json');
<?php

declare(encoding='UTF-8');

class Autoloader{
    const namespaceSeparator = '\\';
    const phpFileExt = '.php';
    static function init(){
        spl_autoload_register(array('Autoloader','autoload'));
    }
    static function autoload($className){
        $pos = strrpos($className,self::namespaceSeparator)+1;
        $fileName = substr($className,$pos);
        $path = substr($className,0,$pos);
        $includePath = strtolower(str_replace(
            self::namespaceSeparator,DIRECTORY_SEPARATOR,$path));
        $includeFile = $includePath.$fileName.self::phpFileExt;
        include_once $includeFile;
    }
}

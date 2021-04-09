<?php

spl_autoload_register(__NAMESPACE__."Mage::loadFileByClassName");
class Mage {
    public static function init(){
      //  self::loadFileByClassName('Controller\Core\Front');
        \Controller\Core\Front::init();
    }
    
    public static function loadFileByClassName($className)
    {
        $className = str_replace('\\', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '/', $className);
        $className  = $className.".php";
        require_once($className);
    }

    public static function getBlock($className, $ton = false)
    {
        if(!$ton)
        {
           // self::loadFileByClassName($className);
            return new $className;
        }
        $value = self::getReistry($className);
        if($value)
        {
            return $value;
        }
      //  self::loadFileByClassName($className);
        $value = new $className;
        self::setRegistry($className,$value);
        return new $value;
    }

    public static function getModel($className)
    {
       // self::loadFileByClassName($className);
        return new $className;
    }

    public static function getController($className)
    {
       // self::loadFileByClassName($className);
        return new $className;
    }

    public static function prepareClassName($key, $nameSpace)
    {
        if($key){
            $nameSpace = $key.' '.$nameSpace;
        }
        $className = $nameSpace;
        $className = str_replace('\\', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '\\', $className);
        return $className;
    }
    public static function setRegistry($key, $value)
    {
        $GLOBAL[$key] = $value;
    }
    public static function getReistry($key, $optional = null)
    {
        if(!array_key_exists($key,$GLOBAL))
        {
            return $optional;
        }
        return $GLOBAL[$key];
    }

}
//echo "<div class='container-outer'>";
Mage::init();
//echo "</div>";

?>
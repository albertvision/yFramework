<?php

namespace System;
class Core extends \Config {
    private static $instance = null, $finished = null;
    public static $modules = array(), $instances = array();

    private function __construct() { }
    
    public function __set($name, $value) {
        $this->variables[$name]=$value;
    }
    public function __get($name) {
        return $this->variables[$name];
    }
    
    /**
     * Прави инстанция на този клас /ако все още няма/
     */
    public static function load() {
        if(self::$instance==null) {
            self::$instance = new Core();
        }
        return self::$instance;
    }
    /**
     * Правим преглед на масив
     * @param $name
     */
    public static function dump_var($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
    
    /**
     * Служи за показване на системни грешки
     * @param string $code номер на системната грешка
     */
    public static function getError($code) {
        require \Config::$DocumentRoot.\Config::$DS.\Config::$ErrorPath.  \Config::$DS.$code.'.php';
        die();
    }
    /**
     * Отваря файл
     * @param string $path Файлът, който искате да се отвори
     * @param string $type Допълнителен тип на файла /не е задължително/
     */
    public static function includeFile($path,$type='',$data=NULL) {
        $file = \Config::$DocumentRoot.\Config::$DS.  self::FixPath($path);
        if(file_exists($file)) {
            if($type == 'view' && $data!=NULL) {
                foreach($data as $key=>$value) {
                    if($key!='file') {
                        $$key = $value;
                    } else {
                        ?><b>Фатална грешка</b>: Заявката не може да се обработи, защото сте предали данни с неразрешен ключ <i>file</i>!<?php
                        die();
                    }
                }
            }
            require $file;
            return true;
        } else {
            if($type=='SystemClass') {
                return false;
            } else {
                self::getError('404');
            }
        }
    }
    /**
     * Зарежда системен файл
     * @param string $filename име на файл
     * @example /System/Core::loadSystem('Mysqli'); така ще отвори файлът /System/Mysqli.php
     * @example /System/Core::loadSystem('Mysqli','instance'); така ще отвори файлът /System/Mysqli.php и ще му направи инстанция
     */
    public static function loadSystem($filename,$additional='') {
        if(!self::search('.php',$filename)) {
            $filename = $filename.'.php';
        }
        $file = \Config::$SystemPath.\Config::$DS.  self::FixPath($filename);
        self::includeFile($file);
        if($additional=='instance') {
            $class = str_replace('.php', '', $filename);
            return self::getInstance('\System\\'.$class);
        }
    }
    
    /**
     * Прави инстанция на даден клас
     * @param string $obj име на клас
     */
    public static function getInstance($obj) {
        self::$instances[$obj] = new $obj();
        return self::$instances[$obj];
    }
    
    /**
     * Търси в дадена дума
     * @param string $word коя дума да търси
     * @param string $string къде да търси
     * @return boolean
     */
    public static function search($word,$string) {
        $pos = strpos($string,$word);
        if ($pos !== false) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Оправя проблемите с пътища при Linux/Windows/Mac
     * @param string $path
     */
    public static function FixPath($path) {
        return str_replace('\\', \Config::$DS, str_replace('/', \Config::$DS, $path));
    }
    
    /* public static function RelativePath($path) {
        return str_replace(str_replace("\\", "/", self::$DocumentRoot), "", str_replace("\\", "/", $path));
    } 
     */
}

?>

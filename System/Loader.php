<?php

namespace System;
class Loader extends \System\Core {
    public $load, $db, $email;
    
    /**
     * Слага в свойства дадени инстанции
     */
    public function __construct() { 
        $this->load = \System\Core::$instances['\System\Loader'];
        $this->db = \System\Core::$instances['\System\Mysqli'];
        $this->email = \System\Core::$instances['\System\Email'];
    }
    /**
     * Отваря контолер, и му прави инстанция
     * @param string $name име на контролер
     * @return boolean
     */
    public function controller($name) {
        if(!\System\Core::search('.php', $name)) {
            $class = $name;
            $name .= '.php';
        } else {
            $class = str_replace('.php', '', $name);
        }
        //Core::dump_var(\System\Core::includeFile(\Config::$DS.  \Config::$ControllerPath.  \Config::$DS.$name));
        if(\System\Core::includeFile(\Config::$DS.  \Config::$ControllerPath.  \Config::$DS.$name,'SystemClass')) {
            $instance = \System\Core::getInstance($class);
            if($instance) {
                return $instance;
            } else {
                return FALSE;
            }
        } else {
            return false;
        }
    }
    /**
     * Отваря модел и му прави инстанция
     * @param string $name име на модела
     * @return boolean
     */
    public function model($name) {
        
        if(!Core::search('.php', $name)) {
            
            $class = $name;
            $name .= '.php';
        } else {
            $class = str_replace('.php', '', $name);
        }
        if(Core::includeFile(\Config::$DS . \Config::$ModelPath . \Config::$DS . $name)) {
            $instance = \System\Core::getInstance($class);
            if($instance) {
                return $instance;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    /**
     * Отваря дадено View
     * @param string $name име на view
     * @param array $data
     */
    public function view($name,$data=NULL) {
        if(!Core::search('.php', $name)) {
            $name .= '.php';
        }
        Core::includeFile(\Config::$DS . \Config::$ViewPath . \Config::$DS . $name, 'view', $data);
    }
}
?>

<?php

namespace System;
class VirtualPaths extends Core {
    private $requestUri, $siteParts = array();
    public function __construct() {
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->siteParts = explode('/',  $this->requestUri);
        unset($this->siteParts[0], $this->siteParts[1]);
        $this->getBootController();
        $this->checkController();
        $this->checkMethod();
    }
    
    /**
     * Взима началния конролер, който е зададен в /System/Config.php
     */
    protected function getBootController() {
        if(!strlen($this->siteParts[2])) {
            if(Core::$instances['\System\Loader']->controller(\Config::$bootController)) {
                if(!$this->siteParts[2]) {
                    Core::$instances[\Config::$bootController]->index();
                }
            } else {
                Core::getError('601');
            }
        }
    }
    
    /**
     * Проверя кой контролер е отворен
     */
    private function checkController() {
        if(strlen($this->siteParts[2])) {
            if(!file_exists($this->siteParts[2])) {
                if(Core::$instances['\System\Loader']->controller($this->siteParts[2])) {
                    if(!$this->siteParts[3]) {
                        Core::$instances[$this->siteParts[2]]->index();
                    }
                } else {
                    Core::getError('404');
                }
            } else {
                if(count($this->siteParts)==1 || $this->siteParts[3]=='') {
                    Core::getError('403');
                }
            }
        }
    }
    
    /**
     * Проверява кой метод е отворен
     */
    private function checkMethod() {
        if(strlen($this->siteParts[3])) {
            if(!file_exists($this->siteParts[2].\Config::$DS.$this->siteParts[3])) {
                $method = $this->siteParts[3];
                if(Core::$instances[$this->siteParts[2]]!=NULL) {
                    foreach($this->siteParts as $key=>$value) {
                        $value = "'".$value."'";
                        if($key>3) {
                            $i++;
                            if($i > 1) {
                                $properties .= ', '.$value;
                            } else {
                                $properties .= $value;
                            }                            
                        }
                    }
                    $properties = htmlspecialchars(urldecode($properties));
                    eval('\System\Core::$instances[$this->siteParts[2]]->$method('.$properties.');');
                } else {
                    Core::getError('404');
                }
            } else {
                Core::getError('403');
            }
        }
    }
}

?>

<?php

namespace System;
class YF_Controller extends \System\Loader {
    
    public function __call($name, $arguments) {
        if($name=='index') {
            Core::getError('403');
        } else {
            Core::getError('404');   
        }
    }
}

?>

<?php

class HomePage extends \System\YF_Controller {
    public function index() {
        $data['version'] = Config::$version;
        $data['config_path'] = Config::$DocumentRoot.Config::$DS.Config::$SystemPath.Config::$DS.'Config.php';
        $data['controller_path'] = Config::$DocumentRoot.Config::$DS.Config::$ControllerPath.'HomePage.php';
        $data['view_path'] = Config::$DocumentRoot.Config::$DS.Config::$ViewPath.'HomePage.php';
        
        $this->load->view('HomePage',$data);
    }
}
?>

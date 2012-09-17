<?php

error_reporting(E_ERROR | E_DEPRECATED | E_WARNING | E_PARSE); //Нагласяме показването на грешките спрямо вкуса ни
class Config {
    public static $DS,$DocumentRoot, $DocumentPath, $AppPath, $ModelPath, $ControllerPath, $ViewPath, $SystemPath, $ErrorPath, $dbHost, $bootController, $dbUser, $dbPass, $dbName, $smtpServer, $smtpPort, $emailUsername, $emailPassword, $version;
    private static $instance=null;
    private function __construct() {
        self::$bootController = 'HomePage'; // Буутващ контолер
        self::$version = '0.1';
        $this->pathsConfig();
        $this->mysqliConfig();
        $this->mailConfig();
    }
    
    /**
     * Прави инстанция на класа /System/Config()
     * 
     */
    public static function load() {
        if(self::$instance==NULL) {
            self::$instance = new Config();
        }
        return self::$instance;
    }
    
    /**
     * Задават се основните системни пътища
     */
    private function pathsConfig() {
        self::$DS = DIRECTORY_SEPARATOR;
        self::$DocumentRoot = str_replace(self::$DS.'System','',dirname(__FILE__));
        self::$DocumentPath = str_replace('/index.php','',$_SERVER['SCRIPT_NAME']);
        self::$AppPath = 'App';
        self::$SystemPath = 'System';
        self::$ModelPath = self::$AppPath.self::$DS.'Model';
        self::$ControllerPath = self::$AppPath.self::$DS.'Controller';
        self::$ViewPath = self::$AppPath.self::$DS.'View';
        self::$ErrorPath = self::$ViewPath.self::$DS.'Errors';
    }
    /**
     * Mysqli конфигурация
     */
    private function mysqliConfig() {
        self::$dbHost = 'localhost'; //В 98% от случаите, най-често е localhost
        self::$dbUser = 'username'; // Вашето Mysqli потребителско име
        self::$dbPass = 'password'; // Вашата Mysqli парола на горепосоченото потребителско име
        self::$dbName = 'database'; // Базата с данни на проекта
    }
    
    /**
     * Настройки на мейл сървъра
     */
    private function mailConfig() {
        self::$smtpServer = 'localhost'; //Default localhost; Google SMTP Server: smtp.google.com
        self::$smtpPort = 25; //Default: 25; Google SMTP Port: 465 или 587
        self::$emailUsername = 'name@domain.com'; //Потребителското Ви име в горепосочения SMTP сървър
        self::$emailPassword = 'MyPassword'; //Паролата за достъп до акаунта Ви
    }
}

?>

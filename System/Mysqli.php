<?php

namespace System;
class Mysqli extends \System\Core {
    private $connection;
    
    /**
     * Прави връзка с Mysqli
     */
    public function connect() {
        $this->connection = mysqli_connect(\Config::$dbHost, \Config::$dbUser, \Config::$dbPass, \Config::$dbName) or die($this->error('Свързването към Mysqli базата с данни е неуспешно! Моля, проверете конфигурацията!'));
    }
    
    /**
     * Изпълнява заявка към Mysqli сървъра
     * @param string $query заявка
     */
    public function query($query) {
        $query = $this->connection->query($query) or die($this->error('При изпълнението на Mysqli заявката <i>'.$query.'</i> възникна следната грешка: <br />'.mysqli_error($this->connection)));
        return $query;
    }
    
    /**
     * Взима данните от дадена таблица
     * @param string $query Mysqli заявка
     */
    public function getRows($query) {
        return $query->fetch_assoc();
    }
    
    /**
     * Взима броя на редовете в дадена таблица
     * @param string $query Mysqli заявка
     */
    public function getNumRows($query) {
        return $query->num_rows;
    }
    /**
     * Затваря Mysqli връзката
     */
    public function close() {
        return mysqli_close($this->connection);
    }
    /**
     * Връща грешка
     * @param string съобщение
     */
    private function error($message) {
        return '<p><b>Фатална грешка </b>: '.$message.'</p>';
        die();
    }
    
}

?>
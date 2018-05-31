<?php

class DBConexion extends PDO {
    private static $USER = "user";
    private static $PASSWORD = "123";   
    private static $DSN='mysql:host=localhost;dbname=clinica;charset=utf8';    
    
    public function __construct() {
        parent::__construct(static::$DSN,
                            static::$USER,
                            static::$PASSWORD);
    }

    public static function getInstance() {
        return new DBConexion();        
    }

}

<?php

class Connection {
   
   private static $instance;

   public static function getConnection() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=localhost;port=3306;dbname=comunicaSenac;charset=utf8mb4', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
   }

}


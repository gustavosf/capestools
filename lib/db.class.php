<?php

class DB {
    
	static function &handler() {
		static $instance;
		
		if (!is_object($instance)) {
			$dsn = DB_DRIVER.':host='.DB_HOST.';dbname='.DB_NAME;
			$instance = new PDO($dsn, DB_USER, DB_PASSWORD, array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
			));
		}
		return $instance;
    }

}

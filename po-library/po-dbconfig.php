<?php

include_once "po-config.php";

class PoConnect {

	protected static $_connection;

	public static function getConnection(){
		if(!self::$_connection){
			$dbhost = DATABASE_HOST;
			$dbuser = DATABASE_USER;
			$dbpassword = DATABASE_PASS;
			$dbname = DATABASE_NAME;
			self::$_connection = @mysqli_connect($dbhost, $dbuser, $dbpassword,$dbname);
			if(!self::$_connection){
				throw new Exception('Gagal melalukan koneksi ke database. '.mysqli_connect_error());
			}
			$result = @mysqli_connect($dbhost, $dbuser, $dbpassword,$dbname);
			if(!$result){
				throw new Exception('Koneksi gagal: '.mysqli_connect_error());
			}
		}
		return self::$_connection;
	}

	public static function close(){
		if(self::$_connection){
			mysqli_close(self::$_connection);
		}
	}
} 

?>
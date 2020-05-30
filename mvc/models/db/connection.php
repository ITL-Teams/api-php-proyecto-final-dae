<?php

class DataBase
{
	private static $connection; 

	private function __construct() {}

	private function newConnection() {
		$DB_HOST     = 'localhost';
		$DB_NAME     = 'netws';
		$DB_USER     = 'root';
		$DB_PASSWORD = '';	

		self::$connection = new PDO(
			"mysql:host=$DB_HOST;dbname=$DB_NAME",
			$DB_USER,
			$DB_PASSWORD);
	}

	public static function getConnection() {
		if(self::$connection == null)
			self::newConnection();

		return self::$connection;
	}
}
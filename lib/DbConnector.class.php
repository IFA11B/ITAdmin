<?php

/**
 * Class for database connection.
 * 
 * @author Thunraz
 */

class DbConnector
{
	private $db;

	private function __construct()
	{
		$DbHost = "192.168.111.1:3306";
		$DbName = "itv_v1";
		$DbUser = "entwickler";
		$DbPass = "entwickler12";

		// Open connection to mysql database (using PDO)
		$this->db = new PDO(
			sprintf("mysql:host=%s;dbname=%s;charset=utf8", $DbHost, $DbName),
			$DbUser,
			$DbPass,
			array(
				// Do not emulate prepared statements
				// (see: http://stackoverflow.com/questions/10113562/pdo-mysql-use-pdoattr-emulate-prepares-or-not)
				PDO::ATTR_EMULATE_PREPARES => false,

				// If an error occurs, throw an exception.
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			)
		);
	}

	public static function getInstance()
	{
		static $instance = null;
		if($instance === null)
		{
			$instance = new DbConnect();
		}

		return $instance;
	}
}

?>
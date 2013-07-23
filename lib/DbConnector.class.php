<?php

/**
 * Class for database connection.
 * 
 * @author Thunraz <julian.dinges@gmail.com>
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
	
	/**
	 * Fetches all users from the database.
	 * 
	 * @return an array of users or false if an error occured.
	 */
	public function getUsers()
	{
		$query = "...";
		$statement = $this->db->query($query);
	
		$result = array();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if($result == false)
			return false;
	
		return $result;
	}
	
	/**
	 * Updates an user's password.
	 * 
	 * @param string $user
	 * @param string $password
	 * @return false if an error occurs, otherwise true.
	 */
	public function setUserPassword(string $user, string $password)
	{
		if($user == null || $password == null)
		{
			return false;
		}
	
		$query =  "UPDATE ";
		$query .= "  Benutzer (ben_pwdhash) ";
		$query .= "VALUES (:password) ";
		$query .= "WHERE ben_name = :user";
	
		$statement = $this->db->prepare($query);
		$statement->bindparam(':user', $user);
		$statement->bindparam(':password', $password);
		$statement->execute();
	}
}

?>
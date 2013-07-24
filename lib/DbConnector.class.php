<?php

/**
 * Class for database connection.
 * 
 * @author Thunraz <julian.dinges@gmail.com>
 */
require_once ('Supplier.class.php');

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
		$query = "SELECT ";
		$query .= "benutzer.ben_name ";
		$query .= "FROM benutzer ";
		$query .= "WHERE benutzer.vwi_valid = 1";
				
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
	
		$query = "UPDATE ";
		$query .= "  Benutzer ";
		$query .= "SET (benutzer.pwd_hash = :password ";
		$query .= ", benutzer.vwi_lastupdated = sysdate()) ";
		$query .= "WHERE ben_name = :user ";
		$query .= "AND benutzer.vwi_valid = 1";
	
		$statement = $this->db->prepare($query);
		$statement->bindparam(':user', $user);
		$statement->bindparam(':password', $password);
		$statement->execute();
	}


	/**
 	* Gets an user's password.
 	*
 	* @param string $user
 	* @return false if an error occurs, otherwise true.
 	*/
	public function getUserPassword($user)
	{
		if($user == null)
		{
			return false;
		}
	
	$query = "SELECT ";
	$query .= "	(benutzer.ben_pwdhash) ";
	$query .= "FROM benutzer ";
	$query .= "WHERE benutzer.ben_name = :user ";
	$query .= "AND benutzer.vwi_valid = 1";
	
	$statement = $this->db->prepare($query);
	$statement->bindparam(':user', $user);
	$statement->execute();
	
	$result = array();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	if($result == false)
		return false;
	
	return $result;
	
	}
	
	/**
	* Updates Supplier informations.
	*
	* @param ???
	* @return false if an error occurs, otherwise true.
	*/
	public function updateSupplier(Supplier $Supplier)
	{
		$query = "UPDATE lieferant ";
		$query .= "SET l.firmenname = :Companyname ";
		$query .= ", l_strasse = :Street ";
		$query .= ", l_plz = :Zipcode ";
		$query .= ", l_ort = :City ";
		$query .= ", l_tel = :Phone ";
		$query .= ", l_mobil = :Mobile ";
		$query .= ", l_fax = :Fax ";
		$query .= ", l_email = :Email ";
		$query .= ", vwi_lastupdated = sysdate() ";
		$query .= "WHERE pk_l_id = :Id ";
		$query .= "AND vwi_valid = 1";
		
		$statement = $this->db->prepare($query);
		$statement->bindparam(':Companyname', $Supplier->companyname);
		$statement->bindparam(':Street', $Supplier->street);
		$statement->bindparam(':Zipcode', $Supplier->zipcode);
		$statement->bindparam(':City', $Supplier->city);
		$statement->bindparam(':Phone', $Supplier->phone);
		$statement->bindparam(':Mobile', $Supplier->mobile);
		$statement->bindparam(':Fax', $Supplier->fax);
		$statement->bindparam(':Email', $Supplier->email);
		$statement->bindparam(':Id', $Supplier->id);
		$statement->execute();
		
		if ($query == false)
			return false;
	}
	
	
	/**
	 * Deletes Supplier informations.
	 *
	 * @param ???
	 * @return false if an error occurs, otherwise true.
	 */
	public function deleteSupplier(Supplier $Supplier)
	{
		$query = "UPDATE lieferant ";
		$query .= "SET vwi_valid = 0";
		$query .= ", vwi_lastupdated = sysdate() ";
		$query .= "WHERE pk_l_id = :Id ";
		$query .= "AND vwi_valid = 1";
	
		$statement = $this->db->prepare($query);
		$statement->bindparam(':Id', $Supplier->id);
		$statement->execute();
	
		if ($query == false)
			return false;
	}
	
	/**
	 * Creates Supplier informations.
	 *
	 * @param ???
	 * @return false if an error occurs, otherwise true.
	 */
	public function createSupplier(Supplier $Supplier)
	{
		$query = "INSERT INTO lieferant ";
		$query .= "(l_firmenname ";
		$query .= "l_strasse ";
		$query .= "l_plz ";
		$query .= "l_ort ";
		$query .= "l_tel ";
		$query .= "l_mobil ";
		$query .= "l_fax ";
		$query .= "l_email ";
		$query .= "l_created) ";
		$query .= "VALUES (:Companyname ";
		$query .= ", :Street ";
		$query .= ", :Zipcode ";
		$query .= ", :City ";
		$query .= ", :Phone ";
		$query .= ", :Mobile ";
		$query .= ", :Fax ";
		$query .= ", :Email ";
		$query .= ", sysdate()) ";
		$query .= "WHERE pk_l_id = :Id ";
		$query .= "AND vwi_valid = 1";
	
		$statement = $this->db->prepare($query);
		$statement->bindparam(':Companyname', $Supplier->companyname);
		$statement->bindparam(':Street', $Supplier->street);
		$statement->bindparam(':Zipcode', $Supplier->zipcode);
		$statement->bindparam(':City', $Supplier->city);
		$statement->bindparam(':Phone', $Supplier->phone);
		$statement->bindparam(':Mobile', $Supplier->mobile);
		$statement->bindparam(':Fax', $Supplier->fax);
		$statement->bindparam(':Email', $Supplier->email);
		$statement->bindparam(':Id', $Supplier->id);
		$statement->execute();
	
		if ($query == false)
			return false;
	}
	
	
}
?>
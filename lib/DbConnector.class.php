<?php

/**
 * Class for database connection.
 * 
 * @author Thunraz <julian.dinges@gmail.com>
 */

//define table names for DB
define('DB_KOMPONENT2KOMPONENT', 'komponente_hat_komponente');

// define management information attributes for DB
define ('DB_MANAGE_VALID', 'vwi_valid');
define ('DB_MANAGE_CREATED', 'vwi_created');
define ('DB_MANAGE_LASTUPDATED', 'vwi_lastupdated');

// define user attributes for DB
define('DB_USER_ID', 'pk_ben_id');
define('DB_USER_NAME', 'ben_name');
define('DB_USER_PWD', 'ben_pwdhash');
define('DB_USER_CREATE_DATE', 'ben_erstellungsdatum');

// define supplier attributes for DB
define ('DB_SUPPLIER_ID', 'pk_l_id');
define ('DB_SUPPLIER_COMPANYNAME', 'l_firmenname');
define ('DB_SUPPLIER_STREET', 'l_strasse');
define ('DB_SUPPLIER_ZIPCODE', 'l_plz');
define ('DB_SUPPLIER_CITY', 'l_ort');
define ('DB_SUPPLIER_PHONE', 'l_tel');
define ('DB_SUPPLIER_MOBILE', 'l_mobil');
define ('DB_SUPPLIER_FAX', 'l_fax');
define ('DB_SUPPLIER_EMAIL', 'l_email');

// define room attributes for DB
define ('DB_ROOM_ID', 'pk_r_id');
define ('DB_ROOM_NUMBER', 'r_nr');
define ('DB_ROOM_NAME', 'r_bezeichnung');
define ('DB_ROOM_NOTE', 'r_notiz');

// define component attributes for DB
define ('DB_COMPONENT_ID', 'pk_k_id');
define ('DB_COMPONENT_SUPPLIER', 'fk_l_k_lieferid');
define ('DB_COMPONENT_ROOM', 'fk_r_komp_kompraum');
define ('DB_COMPONENT_PURCHASE_DATE', 'k_einkaufsdatum');
define ('DB_COMPONENT_WARRANTY_PERIOD', 'k_gewaehrleistungsdatum');
define ('DB_COMPONENT_NOTICE', 'k_notiz');
define ('DB_COMPONENT_MANUFACTURER', 'k_hersteller');

// define module attributes for DB
define ('DB_MODULE_ID', 'pk_mod_id');
define ('DB_MODULE_NAME', 'mod_name');

// define subcomponent attributes for DB
define ('DB_SUBCOMPONENT_AGGREGAT', 'pk_komponeten_pk_k_id_aggregat');
define ('DB_SUBCOMPONENT_UNIT', 'pk_komponenten_pk_k_id_teil');
define ('DB_SUBCOMPONENT_ID', 'pk_khpk_k_id');
define ('DB_SUBCOMPONENT_ACTION', 'vorgangsarten_pk_v_id');
define ('DB_SUBCOMPONENT_DATE', 'khk_datum');

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
	public function getAllUsers()
	{
		$query = "SELECT ";
		$query .= DB_USER_ID . " ";
		$query .= DB_USER_NAME . " ";
		$query .= DB_USER_PWD . " ";
		$query .= DB_USER_CREATE_DATE . " ";
		$query .= "FROM benutzer ";
		$query .= "WHERE " . DB_MANAGE_VALID . " = 1";
				
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
	
		$query = "UPDATE Benutzer ";
		$query .= "SET (" . DB_USER_PWD . " = :password ";
		$query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate()) ";
		$query .= "WHERE " .DB_USER_NAME . " = :user ";
		$query .= "AND " . DB_MANAGE_VALID . " = 1";
	
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
	$query .= "	(" . DB_USER_PWD . ") ";
	$query .= "FROM benutzer ";
	$query .= "WHERE " . DB_USER_NAME . " = :user ";
	$query .= "AND " . DB_MANAGE_VALID . " = 1";
	
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
		$query .= "SET " . DB_SUPPLIER_COMPANYNAME . " = :companyname ";
		$query .= ", " . DB_SUPPLIER_STREET . " = :street ";
		$query .= ", " . DB_SUPPLIER_ZIPCODE . "= :zipcode ";
		$query .= ", " . DB_SUPPLIER_CITY . " = :city ";
		$query .= ", " . DB_SUPPLIER_PHONE . " = :phone ";
		$query .= ", " . DB_SUPPLIER_MOBILE . " = :mobile ";
		$query .= ", " . DB_SUPPLIER_FAX . " = :fax ";
		$query .= ", " . DB_SUPPLIER_EMAIL . " = :email ";
		$query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate() ";
		$query .= "WHERE " . DB_SUPPLIER_ID . " = :id ";
		$query .= "AND " . DB_MANAGE_VALID . " = 1";
		
		$statement = $this->db->prepare($query);
		$statement->bindparam(':companyname', $Supplier->getCompanyname());
		$statement->bindparam(':street', $Supplier->getStreet());
		$statement->bindparam(':zipcode', $Supplier->getZipcode());
		$statement->bindparam(':city', $Supplier->getCity());
		$statement->bindparam(':phone', $Supplier->getPhone());
		$statement->bindparam(':mobile', $Supplier->getMobile());
		$statement->bindparam(':fax', $Supplier->getFax());
		$statement->bindparam(':email', $Supplier->getEmail());
		$statement->bindparam(':id', $Supplier->getId());
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
		$query .= "SET " . DB_MANAGE_VALID . " = 0";
		$query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate() ";
		$query .= "WHERE " . DB_SUPPLIER_ID . " = :id ";
		$query .= "AND " . DB_MANAGE_VALID . " = 1";
	
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
		$query .= "(" .DB_SUPPLIER_COMPANYNAME . " ";
		$query .= "" . DB_SUPPLIER_STREET . " ";
		$query .= "" . DB_SUPPLIER_ZIPCODE . " ";
		$query .= "" . DB_SUPPLIER_CITY . " ";
		$query .= "" . DB_SUPPLIER_PHONE . " ";
		$query .= "" . DB_SUPPLIER_MOBILE . " ";
		$query .= "" . DB_SUPPLIER_FAX . " ";
		$query .= "" . DB_SUPPLIER_EMAIL . " ";
		$query .= "" . DB_MANAGE_CREATED . ") ";
		$query .= "VALUES (:Companyname ";
		$query .= ", :Street ";
		$query .= ", :Zipcode ";
		$query .= ", :City ";
		$query .= ", :Phone ";
		$query .= ", :Mobile ";
		$query .= ", :Fax ";
		$query .= ", :Email ";
		$query .= ", sysdate()) ";
		$query .= "WHERE " . DB_SUPPLIER_ID . " = :id ";
		$query .= "AND vwi_valid = 1";
	
		$statement = $this->db->prepare($query);
		$statement->bindparam(':companyname', $Supplier->getCompanyname());
		$statement->bindparam(':street', $Supplier->getStreet());
		$statement->bindparam(':zipcode', $Supplier->getZipcode());
		$statement->bindparam(':city', $Supplier->getCity());
		$statement->bindparam(':phone', $Supplier->getPhone());
		$statement->bindparam(':mobile', $Supplier->getMobile());
		$statement->bindparam(':fax', $Supplier->getFax());
		$statement->bindparam(':email', $Supplier->getEmail());
		$statement->bindparam(':id', $Supplier->getId());
		$statement->execute();
	
		if ($query == false)
			return false;
	}
	
	/**
	 * gets nodule id.
	 *
	 * @param string $name
	 * @return false if an error occurs, otherwise true.
	 */
	public function getModuleId(string $name)
	{
		if ($name == null)
		{
			return false;
		}
		
		$query = "SELECT ";
		$query .= "" . DB_MODULE_ID . " ";
		$query .= "FROM module ";
		$query .= "WHERE " . DB_MODULE_NAME . " = :name";
		
		$statement = $this->db->prepare($query);
		$statement->bindparam(':name', $name);
		$statement->execute();
		
		$result = array();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if($result == false)
			return false;
		
		return $result;
		
	}
	
	/**
	 * Updates Component informations.
	 *
	 * @param ???
	 * @return false if an error occurs, otherwise true.
	 */
	public function updateComponent(Component $Component)
	{
		$query = "UPDATE komponenten ";
		$query .= "SET " . DB_COMPONENT_SUPPLIER. " = :supplier ";
		$query .= ", " . DB_COMPONENT_ROOM . " = :room ";
		$query .= ", " . DB_COMPONENT_PURCHASE_DATE . "= :purchaseDate ";
		$query .= ", " . DB_COMPONENT_WARRANTY_PERIOD . " = :warrantyPeriod ";
		$query .= ", " . DB_COMPONENT_NOTICE . " = :notice ";
		$query .= ", " . DB_COMPONENT_MANUFACTURER. " = :manufacturer ";
		$query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate() ";
		$query .= "WHERE " . DB_SUPPLIER_ID . " = :id ";
		$query .= "AND " . DB_MANAGE_VALID . " = 1";
	
		$statement = $this->db->prepare($query);
		$statement->bindparam(':companyname', $Component->getCompanyname());
		$statement->bindparam(':street', $Component->getStreet());
		$statement->bindparam(':zipcode', $Component->getZipcode());
		$statement->bindparam(':city', $Component->getCity());
		$statement->bindparam(':phone', $Component->getPhone());
		$statement->bindparam(':mobile', $Component->getMobile());
		$statement->bindparam(':fax', $Component->getFax());
		$statement->bindparam(':email', $Component->getEmail());
		$statement->bindparam(':id', $Component->getId());
		$statement->execute();
	
		if ($query == false)
			return false;
	}
	
	/**
	 * Creates Component informations.
	 *
	 * @param ???
	 * @return false if an error occurs, otherwise true.
	 */
	public function createComponent(Component $Component)
	{
		$query = "INSERT INTO komponenten ";
		$query .= "" . DB_COMPONENT_SUPPLIER . " ";
		$query .= ", " . DB_COMPONENT_ROOM . " ";
		$query .= ", " . DB_COMPONENT_PURCHASE_DATE . " ";
		$query .= ", " . DB_COMPONENT_WARRANTY_PERIOD . " ";
		$query .= ", " . DB_COMPONENT_NOTICE . " ";
		$query .= ", " . DB_COMPONENT_MANUFACTURER . " ";
		$query .= ", " . DB_MANAGE_CREATED . " ";
		$query .= "VALUES (:supplier ";
		$query .= ", :room ";
		$query .= ", :purchaseDate ";
		$query .= ", :warrantyPeriod ";
		$query .= ", :notice ";
		$query .= ", :manufacturer ";
		$query .= ", sysdate() ";
	
		$statement = $this->db->prepare($query);
		$statement->bindparam(':companyname', $Component->getCompanyname());
		$statement->bindparam(':street', $Component->getStreet());
		$statement->bindparam(':zipcode', $Component->getZipcode());
		$statement->bindparam(':city', $Component->getCity());
		$statement->bindparam(':phone', $Component->getPhone());
		$statement->bindparam(':mobile', $Component->getMobile());
		$statement->bindparam(':fax', $Component->getFax());
		$statement->bindparam(':email', $Component->getEmail());
		$statement->bindparam(':id', $Component->getId());
		$statement->execute();
	
		if ($query == false)
			return false;
	}
	
	
	/**
	 * Deletes Component informations.
	 *
	 * @param ???
	 * @return false if an error occurs, otherwise true.
	 */
	public function deleteComponent(Component $Component)
	{
		$query = "UPDATE komponent ";
		$query .= "SET " . DB_MANAGE_VALID . " = 0";
		$query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate() ";
		$query .= "WHERE " . DB_COMPONENT_ID . " = :id ";
		$query .= "AND " . DB_MANAGE_VALID . " = 1";
	
		$statement = $this->db->prepare($query);
		$statement->bindparam(':id', $Component->getId());
		$statement->execute();
	
		if ($query == false)
			return false;
	}
	
	/**
	 * Updates Room informations.
	 *
	 * @param ???
	 * @return false if an error occurs, otherwise true.
	 */
	public function updateRoom(Room $Room)
	{
		$query = "UPDATE raeume ";
		$query .= "SET " . DB_ROOM_NAME . " = :name ";
		$query .= ", " . DB_ROOM_NOTE . " = :note ";
		$query .= ", " . DB_ROOM_NUMBER . "= :number ";
		$query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate() ";
		$query .= "WHERE " . DB_ROOM_ID . " = :id ";
		$query .= "AND " . DB_MANAGE_VALID . " = 1";
	
		$statement = $this->db->prepare($query);
		$statement->bindparam(':name', $Room->getName());
		$statement->bindparam(':note', $Room->getNote());
		$statement->bindparam(':id', $Room->getId());
		$statement->execute();
	
		if ($query == false)
			return false;
	}
	
	/**
	 * Creates Room informations.
	 *
	 * @param ???
	 * @return false if an error occurs, otherwise true.
	 */
	public function createRoom(Room $Room)
	{
		$query = "INSERT INTO raeume ";
		$query .= "" . DB_ROOM_NAME . " ";
		$query .= ", " . DB_ROOM_NOTE . " ";
		$query .= ", " . DB_MANAGE_CREATED . " ";
		$query .= "VALUES (:name ";
		$query .= ", :note ";
		$query .= ", sysdate() ";
	
		$statement = $this->db->prepare($query);
		$statement->bindparam(':name', $Room->getName());
		$statement->bindparam(':note', $Room->getNote());
		$statement->bindparam(':id', $Room->getId());
		$statement->execute();
	
		if ($query == false)
			return false;
	}
	
	/**
	 * Deletes Room informations.
	 *
	 * @param ???
	 * @return false if an error occurs, otherwise true.
	 */
	public function deleteRoom(Room $Room)
	{
		$query = "UPDATE raeume ";
		$query .= "SET " . DB_MANAGE_VALID . " = 0";
		$query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate() ";
		$query .= "WHERE " . DB_ROOM_ID . " = :id ";
		$query .= "AND " . DB_MANAGE_VALID . " = 1";
	
		$statement = $this->db->prepare($query);
		$statement->bindparam(':id', $Room->getId());
		$statement->execute();
	
		if ($query == false)
			return false;
	}
	
	/**
	 * Updates User informations.
	 *
	 * @param ???
	 * @return false if an error occurs, otherwise true.
	 */
	public function updateUser(User $User)
	{
		$query = "UPDATE benutzer ";
		$query .= "SET " . DB_USER_NAME . " = :name ";
		$query .= ", " . DB_USER_PWD . " = :password ";
		$query .= ", " . DB_USER_CREATE_DATE . "= :createDate ";
		$query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate() ";
		$query .= "WHERE " . DB_USER_ID . " = :id ";
		$query .= "AND " . DB_MANAGE_VALID . " = 1";
	
		$statement = $this->db->prepare($query);
		$statement->bindparam(':name', $User->getName());
		$statement->bindparam(':password', $User->getPassword());
		$statement->bindparam(':createDate', $User->getCreateDate());
		$statement->bindparam(':id', $User->getId());
		$statement->execute();
	
		if ($query == false)
			return false;
	}
	
	/**
	 * Creates User informations.
	 *
	 * @param ???
	 * @return false if an error occurs, otherwise true.
	 */
	public function createUser(User $User)
	{
		$query = "INSERT INTO benutzer ";
		$query .= "" . DB_USER_NAME . " ";
		$query .= ", " . DB_USER_PWD . " ";
		$query .= ", " . DB_USER_CREATE_DATE . " ";
		$query .= ", " . DB_MANAGE_CREATED . " ";
		$query .= "VALUES (:name ";
		$query .= ", :password ";
		$query .= ", :createDate ";
		$query .= ", sysdate() ";
	
		$statement = $this->db->prepare($query);
		$statement->bindparam(':name', $User->getName());
		$statement->bindparam(':password', $User->getPassword());
		$statement->bindparam(':createDate', $User->getCreateDate());
		$statement->bindparam(':id', $User->getId());
		$statement->execute();
	
		if ($query == false)
			return false;
	}
	
	/**
	 * Deletes Room informations.
	 *
	 * @param ???
	 * @return false if an error occurs, otherwise true.
	 */
	public function deleteUser(User $User)
	{
		$query = "UPDATE benutzer ";
		$query .= "SET " . DB_MANAGE_VALID . " = 0";
		$query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate() ";
		$query .= "WHERE " . DB_USER_ID . " = :id ";
		$query .= "AND " . DB_MANAGE_VALID . " = 1";
	
		$statement = $this->db->prepare($query);
		$statement->bindparam(':id', $User->getId());
		$statement->execute();
	
		if ($query == false)
			return false;
	}
	
	/**
	 * Fetches all room information.
	 *
	 * @param ???
	 * @return false if an error occurs, otherwise true.
	 */
	public function getAllRooms(Room $Room)
	{
		$query = "SELECT ";
		$query .= "" . DB_ROOM_ID . " ";
		$query .= ", " . DB_ROOM_NAME . " ";
		$query .= ", " . DB_ROOM_NOTE . " ";
		$query .= ", " . DB_ROOM_NUMBER . " ";
		$query .= "FROM benutzer ";
		$query .= "WHERE " . DB_MANAGE_VALID . " = 1";
	
		$statement = $this->db->query($query);
	
		$result = array();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if($result == false)
			return false;
	
		return $result;
	}
	
	/**
	 * Fetches all Supplier informations.
	 *
	 *
	 * @return false if an error occurs, otherwise true.
	 */
	public function getAllSupplier(Supplier $Supplier)
	{
		$query = "SELECT  ";
		$query .= " "  . DB_SUPPLIER_COMPANYNAME . " ";
		$query .= ", " . DB_SUPPLIER_STREET . " ";
		$query .= ", " . DB_SUPPLIER_ZIPCODE . " ";
		$query .= ", " . DB_SUPPLIER_CITY . " ";
		$query .= ", " . DB_SUPPLIER_PHONE . " ";
		$query .= ", " . DB_SUPPLIER_MOBILE . " ";
		$query .= ", " . DB_SUPPLIER_FAX . " ";
		$query .= ", " . DB_SUPPLIER_EMAIL . " ";
		$query .= ", " . DB_MANAGE_CREATED . " ";
		$query .= "FROM lieferant ";
		$query .= "WHERE " . DB_MANAGE_VALID . " = 1";
	
		$statement = $this->db->query($query);
	
		$result = array();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	
		if($result == false)
			return false;
	
		return $result;
	}
	
	/**
	 * Fetches all SubcomponentsOfComponent informations.
	 *
	 *
	 * @return false if an error occurs, otherwise true.
	 */
	public function getSubcomponentsOfComponent(Component $Component)
	{
		$query = "SELECT  ";
		$query .= " "  . DB_SUBCOMPONENT_AGGREGAT . " ";
		$query .= ", " . DB_SUBCOMPONENT_UNIT . " ";
		$query .= ", " . DB_SUBCOMPONENT_ID . " ";
		$query .= ", " . DB_SUBCOMPONENT_ACTION . " ";
		$query .= ", " . DB_SUBCOMPONENT_DATE . " ";
		$query .= "FROM " . DB_KOMPONENT2KOMPONENT . " ";
		$query .= "WHERE " . DB_MANAGE_VALID . " = 1 ";
		$query .= "AND " . DB_SUBCOMPONENT_AGGREGAT . " = :id";
	
		$statement = $this->db->query($query);
		$statement->bindparam(':id', $Component->getId());
		$statement->execute();
	
		$result = array();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	
		if($result == false)
		return false;
	
		return $result;
	}
	
	
}
?>

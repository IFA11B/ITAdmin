<?php

/**
 * Class for database connection.
 * 
 * @author Thunraz <julian.dinges@gmail.com>
 */

//define table names for DB
define('DB_KOMPONENT2KOMPONENT', 'komponente_hat_komponente');
define('DB_MODULE', 'module');
define('DB_USER_PRIVILEGES', 'benutzer_rechte');
define('DB_USER', 'benutzer');
define('DB_SUPPLIER', 'lieferant');
define('DB_KOMPONENT', 'komponenten');
define('DB_ROOM', 'raeume');

// define management information attributes for DB
define ('DB_MANAGE_VALID', 'vwi_valid');
define ('DB_MANAGE_CREATED', 'vwi_created');
define ('DB_MANAGE_LASTUPDATED', 'vwi_lastupdated');

// define user attributes for DB
define('DB_USER_ID', 'pk_ben_id');
define('DB_USER_NAME', 'ben_name');
define('DB_USER_PWD', 'ben_pwdhash');
define('DB_USER_CREATE_DATE', 'ben_erstellungsdatum');

// define user privileges attributes for DB
define('DB_USER_PRIV_ID', 'pk_bpk_r_id');
define('DB_USER_PRIV_USER', 'fk_benutzepk_r_id');
define('DB_USER_PRIV_MODULE', 'fk_modupk_l_id');
define('DB_USER_PRIV_READ', 'br_read');
define('DB_USER_PRIV_WRITE', 'br_write');

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

// define component_types attributes for DB
define ('DB_COMPONENT_TYPE', 'ka_komponentenart');
define ('DB_COMPONENT_TYPE_ACCESS_POINT', 'pk_ap_id');
define ('DB_COMPONENT_TYPE_CPU', 'pk_cpu_id');
define ('DB_COMPONENT_TYPE_DISK_CONTROLLER', 'pk_ol_id');
define ('DB_COMPONENT_TYPE_GRAPHICS_CARD', 'pk_gk_id');
define ('DB_COMPONENT_TYPE_HARD_DRIVE', 'pk_fp_id');
define ('DB_COMPONENT_TYPE_HUB', 'pk_hub_id');
define ('DB_COMPONENT_TYPE_MAINBOARD', 'pk_mb_id');
define ('DB_COMPONENT_TYPE_NETWORK_CARD', 'pk_nk_id');
define ('DB_COMPONENT_TYPE_PRINTER', 'pk_dr_id');
define ('DB_COMPONENT_TYPE_RAID_CONTROLLER', 'pk_rc_id');
define ('DB_COMPONENT_TYPE_RAM', 'pk_ram_id');
define ('DB_COMPONENT_TYPE_ROUTER', 'pk_rout_id');
define ('DB_COMPONENT_TYPE_SOFTWARE', 'pk_sw_id');
define ('DB_COMPONENT_TYPE_SWITCH_COMPONENT', 'pk_s_id');
define ('DB_COMPONENT_TYPE_VLAN', 'pk_vlan_id');

// define Access Point attributes for DB
define ('DB_COMPONENT_AP_IP', 'ap_ip');
define ('DB_COMPONENT_AP_CONFIGFILE', 'ap_konfigdatei');

// define PC attributes for DB
define ('DB_COMPONENT_PC_ID', 'pk_pc_id');
define ('DB_COMPONENT_PC_IP', 'pc_ip');
define ('DB_COMPONENT_PC_SUBNET', 'pc_subnetzklasse');
define ('DB_COMPONENT_PC_GATEWAY', 'pc_gateway');
define ('DB_COMPONENT_PC_NAME', 'pc_pcname');

// define CPU attributes for DB
define ('DB_COMPONENT_CPU_ID', 'pk_cpu_id');
define ('DB_COMPONENT_CPU_NAME', 'cpu_name');
define ('DB_COMPONENT_CPU_SOCKEL', 'cpu_sockel');
define ('DB_COMPONENT_CPU_NAME', 'cpu_name');

// define disk controller attributes for DB
define ('DB_COMPONENT_DC_ID', 'pk_ka_id');
define ('DB_COMPONENT_DC_DISKTYPE', 'ka_komponentenart');

// define graphics Card attributes for DB
define ('DB_COMPONENT_GC_ID', 'pk_gk_id');
define ('DB_COMPONENT_GC_NAME', 'gk_name');
define ('DB_COMPONENT_GC_INTERFACETYPE', 'gk_interneschnittestelle');
define ('DB_COMPONENT_GC_SPACEMBYTE', 'gk_speicher');
define ('DB_CPMPONENT_GC_NAME', 'gk_name');

// define hard drive attributes for DB
define ('DB_COMPONENT_HDD_ID', 'pk_fp_id');
define ('DB_COMPONENT_HDD_NAME', 'fp_name');
define ('DB_COMPONENT_HDD_INTERFACETYPE', 'fp_schnittstellenart');
define ('DB_COMPONENT_HDD_PURPOSE', 'fp_einsatzzweck');
define ('DB_COMPONENT_HDD_SPACEMBYTE', 'fp_groesse');
define ('DB_COMPONENT_HDD_DRIVETYPE', 'fp_speicherart');
define ('DB_COMPONENT_HDD_NAME', 'fp_name');

// define HUB attributes for DB
define ('DB_COMPONENT_HUB_ID', 'pk_hub_id');
define ('DB_COMPONENT_HUB_NAME', 'hub_name');
define ('DB_COMPONENT_HUB_PORTSCOUNT', 'hub_anzahlport');
define ('DB_COMPONENT_HUB_SPEEDMBIT', 'hub_geschwindigkeit');

// define mainboard attributes for DB
define ('DB_COMPONENT_MB_ID', 'pk_mb_id');
define ('DB_COMPONENT_MB_NAME', 'mb_name');
define ('DB_COMPONENT_MB_SOCKEL', 'mb_sockel');
define ('DB_COMPONENT_MB_RAMTYPE', 'mb_ramtyp');
define ('DB_COMPONENT_MB_RAMMAXSPACE', 'mb_rammax');
define ('DB_COMPONENT_MB_RAMSLOTSCOUNT', 'mb_bankanzahl');
define ('DB_COMPONENT_MB_CONNECTORTYPEPOWERSUPPLY', 'mb_netzteilsteckertyp');
define ('DB_COMPONENT_MB_CONNECTORTYPECPU', 'mb_cpusteckertyp');
define ('DB_COMPONENT_MB_ONBOARD', 'mb_onboardfunktion');
define ('DB_COMPONENT_MB_INTERFACESINTERN', 'mb_internschnittstelle');
define ('DB_COMPONENT_MB_INTERFACESEXTERN', 'mb_externschnittstelle');
define ('DB_COMPONENT_MB_NAME', 'mb_name');

// define network card attributes for DB
define ('DB_COMPONENT_NC_ID', 'pk_nk_id');
define ('DB_COMPONENT_NC_NAME', 'nk_name');
define ('DB_COMPONENT_NC_SPEEDMBIT', 'nk_bandbreitegeschwindigkeit');
define ('DB_COMPONENT_NC_INTERFACEINTERN', 'nk_internschnittstelle');
define ('DB_COMPONENT_NC_INTERFACEEXTERN', 'nk_externschnittstelle');
define ('DB_COMPONENT_NC_PORTSCOUNT', 'nk_anzahlexternports');
define ('DB_COMPONENT_NC_NAME', 'nk_name');

// define printer attributes for DB
define ('DB_COMPONENT_P_ID', 'pk_dr_id');
define ('DB_COMPONENT_P_IP', 'dr_ip');
define ('DB_COMPONENT_P_PRINTERTYPE', 'dr_typ');
define ('DB_COMPONENT_P_COLORMODE', 'dr_druckerart');
define ('DB_COMPONENT_P_CONNECTIONTYPE', 'dr_anschlussart');

// define raid controller attributes for DB
define ('DB_COMPONENT_RC_ID', 'pk_rc_id');
define ('DB_COMPONENT_RC_NAME', 'rc_name');
define ('DB_COMPONENT_RC_RAIDLEVEL', 'rc_raidlvl');
define ('DB_COMPONENT_RC_NAME', 'rc_name');

// define RAM attributes for DB
define ('DB_COMPONENT_RAM_ID', 'pk_ram_id');
define ('DB_COMPONENT_RAM_SPACEMBYTE', 'ram_groesse');
define ('DB_COMPONENT_RAM_CLOCKSPEEDMHZ', 'ram_taktfrequenz');
define ('DB_COMPONENT_RAM_NAME', 'ram_name');

// define router attributes for DB
define ('DB_COMPONENT_R_ID', 'pk_rout_id');
define ('DB_COMPONENT_R_NAME', 'rout_name');
define ('DB_COMPONENT_R_IPCONFIG1', 'rout_ip1');
define ('DB_COMPONENT_R_IPCONFIG2', 'rout_ip2');
define ('DB_COMPONENT_R_IPCONFIG3', 'rout_ip3');
define ('DB_COMPONENT_R_IPCONFIG4', 'rout_ip4');
define ('DB_COMPONENT_R_CONFIGFILE', 'rout_konfigdatei');

// define software attributes for DB
define ('DB_COMPONENT_S_ID', 'pk_sw_id');
define ('DB_COMPONENT_S_NAME', 'sw_name');
define ('DB_COMPONENT_S_VERSION', 'sw_versionsnummer');
define ('DB_COMPONENT_S_LICENSETYPE', 'sw_lizenztyp');
define ('DB_COMPONENT_S_LICENSECOUNT', 'sw_lizenzanzahl');
define ('DB_COMPONENT_S_LICENSEDURATION', 'sw_lizenzlaufzeit');
define ('DB_COMPONENT_S_LICENSEINFORMATION', 'sw_lizenzinformationen');
define ('DB_COMPONENT_S_INSTALLHINT', 'sw_lizenzhinweis');

// define switch attributes for DB
define ('DB_COMPONENT_SC_ID', 'pk_s_id');
define ('DB_COMPONENT_SC_NAME', 's_name');
define ('DB_COMPONENT_SC_IP', 's_ip');
define ('DB_COMPONENT_SC_PORTSCOUNT', 's_anzahlports');
define ('DB_COMPONENT_SC_UPLINKTYPE', 's_uplinktyp');
define ('DB_COMPONENT_SC_SPEEDMBIT', 's_geschwindigkeit');
define ('DB_COMPONENT_SC_CONFIGFILE', 's_konfigdateipfad');

// define VLAN attributes for DB
define ('DB_COMPONENT_VLAN_TAG', 'vlan_id');
define ('DB_COMPONENT_VLAN_PORT', 'vlan_port');
define ('DB_COMPONENT_VLAN_NAME', 'vlan_name');
define ('DB_COMPONENT_VLAN_ID', 'pk_vlan_id');




// define subcomponent attributes for DB
define ('DB_COMPONENT_CHILDS_ID', 'pk_khpk_k_id');
define ('DB_COMPONENT_PARENT_ID', 'pk_komponenten_ok_k_id_aggregat');

// define optical disk drive for DB
define ('DB_COMPONENT_ODD_ID', 'pk_ol_id');

// define Power Supply for DB
define ('DB_COMPONENT_PS_COUNT', 'nt_anzahlanschluss');
define ('DB_COMPONENT_PS_CPUTYPE', 'nt_cpusteckertyp');
define ('DB_COMPONENT_PS_POWER', 'nt_leistung');
define ('DB_COMPONENT_PS_MAINBOARDTYPE', 'nt_mainboardsteckertyp');

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
		$query .= "FROM " . DB_USER;
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
	
		$query = "UPDATE " . DB_USER;
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
	$query .= "FROM " . DB_USER;
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
		$query = "UPDATE " . DB_SUPPLIER;
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
		$query = "UPDATE " . DB_SUPPLIER;
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
		$query = "INSERT INTO " . DB_SUPPLIER;
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
		$query .= "FROM " . DB_MODULE;
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
		$query = "UPDATE " . DB_KOMPONENT;
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
		$query = "INSERT INTO " . DB_KOMPONENT;
		$query .= "(" . DB_COMPONENT_SUPPLIER . " ";
		$query .= ", " . DB_COMPONENT_ROOM . " ";
		$query .= ", " . DB_COMPONENT_PURCHASE_DATE . " ";
		$query .= ", " . DB_COMPONENT_WARRANTY_PERIOD . " ";
		$query .= ", " . DB_COMPONENT_NOTICE . " ";
		$query .= ", " . DB_COMPONENT_MANUFACTURER . " ";
		$query .= ", " . DB_MANAGE_CREATED . ") ";
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
		$query = "UPDATE " . DB_KOMPONENT;
		$query .= " SET " . DB_MANAGE_VALID . " = 0";
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
		$query = "UPDATE " . DB_ROOM;
		$query .= " SET " . DB_ROOM_NAME . " = :name ";
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
		$query = "INSERT INTO " . DB_ROOM;
		$query .= " (" . DB_ROOM_NAME . " ";
		$query .= ", " . DB_ROOM_NOTE . " ";
		$query .= ", " . DB_MANAGE_CREATED . ") ";
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
		$query = "UPDATE " . DB_ROOM;
		$query .= " SET " . DB_MANAGE_VALID . " = 0";
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
		$query = "UPDATE " . DB_USER;
		$query .= " SET " . DB_USER_NAME . " = :name ";
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
		$query = "INSERT INTO " . DB_USER;
		$query .= " " . DB_USER_NAME . " ";
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
		$query = "UPDATE " . DB_USER;
		$query .= " SET " . DB_MANAGE_VALID . " = 0";
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
		$query .= "FROM " . DB_USER;
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
		$query .= "FROM " . DB_SUPPLIER;
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
		$query = "SELECT ";
		$query .= ""  . DB_SUBCOMPONENT_AGGREGAT . " ";
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
	
	/**
	 * Fetches the read privileges for specified user/module.
	 *
	 *
	 * @return false if an error occurs, otherwise true.
	 */
	public function userModuleRead(User $User, Module $Module)
	{
		$query = "SELECT ";
		$query .= "" . DB_USER_PRIV_READ . " ";
		$query .= "FROM " . DB_USER_PRIVILEGES . " ";
		$query .= "INNER JOIN " . DB_USER . " ON " . DB_USER_ID . " = " . DB_USER_PRIV_USER . " ";
		$query .= "INNER JOIN " . DB_MODULE . " ON " . DB_MODULE_ID . " = " . DB_USER_PRIV_MODULE . " ";
		$query .= "WHERE " . DB_MANAGE_VALID . " = 1 ";
		$query .= "AND " . DB_MODULE_ID . " = :module_id ";
		$query .= "AND " . DB_USER_ID . " = :user_id";
	
		$statement = $this->db->query($query);
		$statement->bindparam(':user_id', $User->getId());
		$statement->bindparam(':module_id', $Module->getId());
		$statement->execute();
	
		$result = array();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	
		if($result == false)
		return false;
	
		return $result;
	}
	
	/**
	 * Fetches the write privileges for specified user/module.
	 *
	 *
	 * @return false if an error occurs, otherwise true.
	 */
	public function userModuleWrite(User $User, Module $Module)
	{
		$query = "SELECT ";
		$query .= "" . DB_USER_PRIV_WRITE . " ";
		$query .= "FROM " . DB_USER_PRIVILEGES . " ";
		$query .= "INNER JOIN " . DB_USER . " ON " . DB_USER_ID . " = " . DB_USER_PRIV_USER . " ";
		$query .= "INNER JOIN " . DB_MODULE . " ON " . DB_MODULE_ID . " = " . DB_USER_PRIV_MODULE . " ";
		$query .= "WHERE " . DB_MANAGE_VALID . " = 1 ";
		$query .= "AND " . DB_MODULE_ID . " = :module_id ";
		$query .= "AND " . DB_USER_ID . " = :user_id";
	
		$statement = $this->db->query($query);
		$statement->bindparam(':user_id', $User->getId());
		$statement->bindparam(':module_id', $Module->getId());
		$statement->execute();
	
		$result = array();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	
		if($result == false)
			return false;
	
		return $result;
	}
	
	
}
?>

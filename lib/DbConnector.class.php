<?php

/**
 * Class for database connection.
 *
 * @author Thunraz <julian.dinges@gmail.com>
 */
require ('db_defines.php');
require ('db_module_to_module_class_mapper.php');
class DbConnector {
    private $db;

    /**
     * Constructs a new instance of DbConnector.
     */
    private function __construct() {
        $DbHost = "192.168.1.113";
        $DbName = "itv_v1";
        $DbUser = "entwickler";
        $DbPass = "entwickler12";
        
        try {
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
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    
                    // Set timeout to 3 seconds
                    PDO::ATTR_TIMEOUT => "3"));
        } catch (Exception $e) {
            die("Fehler bei der Verbindung zur Datenbank: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        static $instance = null;
        if ($instance === null) {
            $instance = new DbConnector();
        }
        
        return $instance;
    }

    /**
     * Fetches all users from the database.
     *
     * @return an array of users or false if an error occured.
     */
    public function getAllUsers() {
        $query = "SELECT ";
        $query .= DB_USER_ID . ", ";
        $query .= DB_USER_NAME . ", ";
        $query .= DB_USER_PWD . ", ";
        $query .= DB_USER_CREATE_DATE . " ";
        $query .= "FROM " . DB_USER . " ";
        $query .= "WHERE " . DB_MANAGE_VALID . " = 1";
        
        $statement = $this->db->query($query);
        
        $result = array();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result == false)
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
    public function setUserPassword(string $user, string $password) {
        if ($user == null || $password == null) {
            return false;
        }
        
        $query = "UPDATE " . DB_USER . " ";
        $query .= "SET (" . DB_USER_PWD . " = :password ";
        $query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate()) ";
        $query .= "WHERE " . DB_USER_NAME . " = :user ";
        $query .= "AND " . DB_MANAGE_VALID . " = 1";
        
        $statement = $this->db->prepare($query);
        $statement->bindparam(':user', $user);
        $statement->bindparam(':password', $password);
        $statement->execute();
        
        if ($query == false)
            return false;
        else {
            return true;
        }
    }

    /**
     * Gets an user's password.
     *
     * @param string $user
     * @return false if an error occurs, otherwise true.
     */
    public function getUserPassword($user) {
        if ($user == null) {
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
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($result == false)
            return false;
        
        return $result;
    }

    public function getUserByName($userName) {
        if (null == $userName) {
            return false;
        }
        
        $query = "SELECT ";
        $query .= DB_USER_ID . ", ";
        $query .= DB_USER_NAME . ", ";
        $query .= DB_USER_PWD . ", ";
        $query .= DB_USER_CREATE_DATE . " ";
        $query .= "FROM " . DB_USER . " ";
        $query .= " WHERE " . DB_USER_NAME . " = :userName ";
        $query .= " AND " . DB_MANAGE_VALID . " = 1";
        
        $statement = $this->db->prepare($query);
        $statement->bindparam(':userName', $userName);
        
        $statement->execute();
        
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($result == false)
            return false;
        
        return new User($result);
    }

    /**
     * Updates Supplier informations.
     *
     * @param ???
     * @return false if an error occurs, otherwise true.
     */
    public function updateSupplier(Supplier $Supplier) {
        $query = "UPDATE " . DB_SUPPLIER . " ";
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
        $success = $statement->execute();
        
        if ($success == false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Deletes Supplier informations.
     *
     * @param ???
     * @return false if an error occurs, otherwise true.
     */
    public function deleteSupplier(Supplier $Supplier) {
        $query = "UPDATE " . DB_SUPPLIER . " ";
        $query .= "SET " . DB_MANAGE_VALID . " = 0";
        $query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate() ";
        $query .= "WHERE " . DB_SUPPLIER_ID . " = :id ";
        $query .= "AND " . DB_MANAGE_VALID . " = 1";
        
        $statement = $this->db->prepare($query);
        $statement->bindparam(':id', $Supplier->getId());
        $statement->execute();
        
        if ($query == false)
            return false;
        else {
            return true;
        }
    }

    /**
     * Creates Supplier informations.
     *
     * @param ???
     * @return false if an error occurs, otherwise true.
     */
    public function createSupplier(Supplier $Supplier) {
        $query = "INSERT INTO " . DB_SUPPLIER . " ";
        $query .= "( " . DB_SUPPLIER_COMPANYNAME . " ";
        $query .= ", " . DB_SUPPLIER_STREET . " ";
        $query .= ", " . DB_SUPPLIER_ZIPCODE . " ";
        $query .= ", " . DB_SUPPLIER_CITY . " ";
        $query .= ", " . DB_SUPPLIER_PHONE . " ";
        $query .= ", " . DB_SUPPLIER_MOBILE . " ";
        $query .= ", " . DB_SUPPLIER_FAX . " ";
        $query .= ", " . DB_SUPPLIER_EMAIL . " ";
        $query .= ", " . DB_MANAGE_CREATED . ") ";
        $query .= "VALUES (";
        $query .= "    :companyname ";
        $query .= ",   :street ";
        $query .= ",   :zipcode ";
        $query .= ",   :city ";
        $query .= ",   :phone ";
        $query .= ",   :mobile ";
        $query .= ",   :fax ";
        $query .= ",   :email ";
        $query .= ",   sysdate() ";
        $query .= ") ";
        
        $statement = $this->db->prepare($query);
        $statement->bindparam(':companyname', $Supplier->getCompanyname());
        $statement->bindparam(':street', $Supplier->getStreet());
        $statement->bindparam(':zipcode', $Supplier->getZipcode());
        $statement->bindparam(':city', $Supplier->getCity());
        $statement->bindparam(':phone', $Supplier->getPhone());
        $statement->bindparam(':mobile', $Supplier->getMobile());
        $statement->bindparam(':fax', $Supplier->getFax());
        $statement->bindparam(':email', $Supplier->getEmail());
        $success = $statement->execute();
        
        if ($success == false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * gets nodule id.
     *
     * @param string $name
     * @return false if an error occurs, otherwise true.
     */
    public function getModuleId($name) {
        if ($name == null) {
            return false;
        }
        
        $query = "SELECT ";
        $query .= "" . DB_MODULE_ID . " ";
        $query .= "FROM " . DB_MODULE . " ";
        $query .= "WHERE " . DB_MODULE_NAME . " = :name";
        
        $statement = $this->db->prepare($query);
        $statement->bindparam(':name', $name);
        $statement->execute();
        
        $result = array();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($result == false)
            return false;
        
        return $result;
    }

    public function getModules() {
        $query = "SELECT ";
        $query .= "" . DB_MODULE_ID . ", ";
        $query .= "" . DB_MODULE_NAME . " ";
        $query .= "FROM " . DB_MODULE;
        
        $statement = $this->db->prepare($query);
        
        $statement->execute();
        
        $result = array();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result == false)
            return false;
        
        $modules = array();
        
        foreach ($result as $raw_module) {
            $module_class_instance = map_db_module_to_module_class($raw_module);
            if ($module_class_instance) {
                $modules[] = $module_class_instance;
            }
        }
        
        return $modules;
    }

    /**
     * Updates Component informations.
     *
     * @param ???
     * @return false if an error occurs, otherwise true.
     */
    public function updateComponent(Component $Component) {
        $query = "UPDATE " . DB_KOMPONENT . " ";
        $query .= "SET " . DB_COMPONENT_SUPPLIER . " = :supplier ";
        $query .= ", " . DB_COMPONENT_ROOM . " = :room ";
        $query .= ", " . DB_COMPONENT_PURCHASE_DATE . "= :purchaseDate ";
        $query .= ", " . DB_COMPONENT_WARRANTY_PERIOD . " = :warrantyPeriod ";
        $query .= ", " . DB_COMPONENT_NOTICE . " = :notice ";
        $query .= ", " . DB_COMPONENT_MANUFACTURER . " = :manufacturer ";
        $query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate() ";
        $query .= "WHERE " . DB_SUPPLIER_ID . " = :id ";
        $query .= "AND " . DB_MANAGE_VALID . " = 1";
        
        $statement = $this->db->prepare($query);
        $statement->bindparam(':supplier', $Component->getSupplier());
        $statement->bindparam(':room', $Component->getRoom());
        $statement->bindparam(':purchaseDate', $Component->getPurchaseDate());
        $statement->bindparam(':warrantyPeriod', $Component->getWarrantyDuration());
        $statement->bindparam(':notice', $Component->getNote());
        $statement->bindparam(':manufacturer', $Component->getManufacturer());
        $success = $statement->execute();
        
        if ($success == false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Creates Component informations.
     *
     * @param ???
     * @return false if an error occurs, otherwise true.
     */
    public function createComponent(Component $Component) {
        $query = "INSERT INTO " . DB_KOMPONENT . " ";
        $query .= "(" . DB_COMPONENT_SUPPLIER . " ";
        $query .= ", " . DB_COMPONENT_ROOM . " ";
        $query .= ", " . DB_COMPONENT_PURCHASE_DATE . " ";
        $query .= ", " . DB_COMPONENT_WARRANTY_PERIOD . " ";
        $query .= ", " . DB_COMPONENT_NOTICE . " ";
        $query .= ", " . DB_COMPONENT_MANUFACTURER . " ";
        $query .= ", " . DB_MANAGE_CREATED . ") ";
        $query .= "VALUES (";
        $query .= "    :supplier ";
        $query .= ",   :room ";
        $query .= ",   :purchaseDate ";
        $query .= ",   :warrantyPeriod ";
        $query .= ",   :notice ";
        $query .= ",   :manufacturer ";
        $query .= ",   sysdate()";
        $query .= ")";
        
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
        $success = $statement->execute();
        
        if ($success == false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Deletes Component informations.
     *
     * @param ???
     * @return false if an error occurs, otherwise true.
     */
    public function deleteComponent(Component $Component) {
        $query = "UPDATE " . DB_KOMPONENT . " ";
        $query .= " SET " . DB_MANAGE_VALID . " = 0";
        $query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate() ";
        $query .= "WHERE " . DB_COMPONENT_ID . " = :id ";
        $query .= "AND " . DB_MANAGE_VALID . " = 1";
        
        $statement = $this->db->prepare($query);
        $statement->bindparam(':id', $Component->getId());
        $success = $statement->execute();
        
        if ($success == false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Updates Room informations.
     *
     * @param ???
     * @return false if an error occurs, otherwise true.
     */
    public function updateRoom(Room $Room) {
        $query = "UPDATE " . DB_ROOM . " ";
        $query .= "SET " . DB_ROOM_NAME . " = :name ";
        $query .= ", " . DB_ROOM_NOTE . " = :note ";
        $query .= ", " . DB_ROOM_NUMBER . "= :number ";
        $query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate() ";
        $query .= "WHERE " . DB_ROOM_ID . " = :id ";
        $query .= "AND " . DB_MANAGE_VALID . " = 1";
        
        $statement = $this->db->prepare($query);
        $statement->bindparam(':name', $Room->getName());
        $statement->bindparam(':note', $Room->getNote());
        $statement->bindparam(':number', $Room->getNumber());
        $statement->bindparam(':id', $Room->getId());
        $success = $statement->execute();
        
        if ($success == false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Creates Room informations.
     *
     * @param ???
     * @return false if an error occurs, otherwise true.
     */
    public function createRoom(Room $Room) {
        $query = "INSERT INTO " . DB_ROOM . " ";
        $query .= " (" . DB_ROOM_NAME . " ";
        $query .= ", " . DB_ROOM_NOTE . " ";
        $query .= ", " . DB_ROOM_NUMBER . " ";
        $query .= ", " . DB_MANAGE_CREATED . ") ";
        $query .= "VALUES (";
        $query .= "    :name ";
        $query .= ",   :note ";
        $query .= ",   :number ";
        $query .= ",   sysdate()";
        $query .= ")";
        
        $statement = $this->db->prepare($query);
        $statement->bindparam(':name', $Room->getName());
        $statement->bindparam(':note', $Room->getNote());
        $statement->bindparam(':number', $Room->getNumber());
        $statement->bindparam(':id', $Room->getId());
        $success = $statement->execute();
        
        if ($success == false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Deletes Room informations.
     *
     * @param ???
     * @return false if an error occurs, otherwise true.
     */
    public function deleteRoom(Room $Room) {
        $query = "UPDATE " . DB_ROOM . " ";
        $query .= " SET " . DB_MANAGE_VALID . " = 0 ";
        $query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate() ";
        $query .= "WHERE " . DB_ROOM_ID . " = :id ";
        $query .= "AND " . DB_MANAGE_VALID . " = 1";
        
        $statement = $this->db->prepare($query);
        $statement->bindparam(':id', $Room->getId());
        $success = $statement->execute();
        
        if ($success == false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Updates User informations.
     *
     * @param ???
     * @return false if an error occurs, otherwise true.
     */
    public function updateUser(User $User) {
        $query = "UPDATE " . DB_USER . " ";
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
        $success = $statement->execute();
        
        if ($success == false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Creates User informations.
     *
     * @param ???
     * @return false if an error occurs, otherwise true.
     */
    public function createUser(User $User) {
        $query = "INSERT INTO " . DB_USER . " ";
        $query .= "( " . DB_USER_NAME . " ";
        $query .= ", " . DB_USER_PWD . " ";
        $query .= ", " . DB_USER_CREATE_DATE . " ";
        $query .= ", " . DB_MANAGE_CREATED . ") ";
        $query .= "VALUES (";
        $query .= "    :name ";
        $query .= ",   :password ";
        $query .= ",   :createDate ";
        $query .= ",   sysdate() ";
        $query .= ")";
        
        $statement = $this->db->prepare($query);
        $statement->bindparam(':name', $User->getName());
        $statement->bindparam(':password', $User->getPassword());
        $statement->bindparam(':createDate', $User->getCreateDate());
        $statement->bindparam(':id', $User->getId());
        $success = $statement->execute();
        
        if ($success == false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Deletes Room informations.
     *
     * @param ???
     * @return false if an error occurs, otherwise true.
     */
    public function deleteUser(User $User) {
        $query = "UPDATE " . DB_USER;
        $query .= " SET " . DB_MANAGE_VALID . " = 0 ";
        $query .= ", " . DB_MANAGE_LASTUPDATED . " = sysdate() ";
        $query .= "WHERE " . DB_USER_ID . " = :id ";
        $query .= "AND " . DB_MANAGE_VALID . " = 1";
        
        $statement = $this->db->prepare($query);
        $statement->bindparam(':id', $User->getId());
        $success = $statement->execute();
        
        if ($success == false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Fetches all room information.
     *
     * @param ???
     * @return false if an error occurs, otherwise true.
     */
    public function getAllRooms() {
        $query = "SELECT ";
        $query .= "  " . DB_ROOM_ID . " ";
        $query .= ", " . DB_ROOM_NAME . " ";
        $query .= ", " . DB_ROOM_NOTE . " ";
        $query .= ", " . DB_ROOM_NUMBER . " ";
        $query .= "FROM " . DB_ROOM . " ";
        $query .= "WHERE " . DB_MANAGE_VALID . " = 1";
        
        $statement = $this->db->query($query);
        $result = array();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result == false)
            return false;
        
        return $result;
    }

    /**
     * Fetches all Supplier informations.
     *
     *
     * @return false if an error occurs, otherwise true.
     */
    public function getAllSuppliers() {
        $query = "SELECT  ";
        $query .= "  " . DB_SUPPLIER_ID . " ";
        $query .= ", " . DB_SUPPLIER_COMPANYNAME . " ";
        $query .= ", " . DB_SUPPLIER_STREET . " ";
        $query .= ", " . DB_SUPPLIER_ZIPCODE . " ";
        $query .= ", " . DB_SUPPLIER_CITY . " ";
        $query .= ", " . DB_SUPPLIER_PHONE . " ";
        $query .= ", " . DB_SUPPLIER_MOBILE . " ";
        $query .= ", " . DB_SUPPLIER_FAX . " ";
        $query .= ", " . DB_SUPPLIER_EMAIL . " ";
        $query .= ", " . DB_MANAGE_CREATED . " ";
        $query .= "FROM " . DB_SUPPLIER . " ";
        $query .= "WHERE " . DB_MANAGE_VALID . " = 1";
        
        $statement = $this->db->query($query);
        $result = array();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result == false)
            return false;
        
        return $result;
    }

    public function getAllComponents() {
        $query = "SELECT";
        $query .= "    * ";
        $query .= "FROM ";
        $query .= "    komponenten k ";
        $query .= "    LEFT JOIN komponente_hat_attribute kha ";
        $query .= "        ON k.pk_k_id = kha.pk_komponenten_pk_k_id ";
        $query .= "    LEFT JOIN v_alle_komp_attribute ka ";
        $query .= "        ON kha.pk_komponentenattribute_pk_kat_id = ka.pk_kat_id ";
        $query .= "    LEFT JOIN komponentenarten kar ";
        $query .= "        ON k.fk_ka_k_kompart = kar.pk_ka_id;";
        
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Fetches all SubcomponentsOfComponent informations.
     *
     *
     * @return false if an error occurs, otherwise true.
     */
    public function getSubcomponentsOfComponent(Component $Component) {
        $query = "SELECT ";
        $query .= "  " . DB_SUBCOMPONENT_AGGREGAT . " ";
        $query .= ", " . DB_SUBCOMPONENT_UNIT . " ";
        $query .= ", " . DB_SUBCOMPONENT_ID . " ";
        $query .= ", " . DB_SUBCOMPONENT_ACTION . " ";
        $query .= ", " . DB_SUBCOMPONENT_DATE . " ";
        $query .= "FROM " . DB_KOMPONENT2KOMPONENT . " ";
        $query .= "WHERE " . DB_MANAGE_VALID . " = 1 ";
        $query .= "AND " . DB_SUBCOMPONENT_AGGREGAT . " = :id";
        
        $statement = $this->db->prepare($query);
        
        $id = $Component->getId();
        $statement->bindparam(':id', $id);
        
        $statement->execute();
        
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result === false) {
            return false;
        }
        
        return $result;
    }

    /**
     * Fetches the read privileges for specified user/module.
     *
     *
     * @return false if an error occurs, otherwise true.
     */
    public function userModuleRead(User $User, Module $Module) {
        
        //Note: user is logged in thus user DB_MANAGE_VALID is 1
        //also Note: module's DB_MANAGE_VALID is 1 because we got it's id
        $module_id = $Module->getId()[DB_MODULE_ID];
        $user_id = $User->getId();
        
        $query = "SELECT ";
        $query .= "  " . DB_USER_PRIV_READ . " ";
        $query .= "FROM " . DB_USER_PRIVILEGES . " ";
        $query .= "INNER JOIN " . DB_USER . " ON " . DB_USER_ID . " = " . DB_USER_PRIV_USER . " ";
        $query .= "INNER JOIN " . DB_MODULE . " ON " . DB_MODULE_ID . " = " . DB_USER_PRIV_MODULE . " ";
        $query .= "WHERE " . DB_USER_PRIVILEGES . "." . DB_MANAGE_VALID . " = 1 ";
        $query .= "AND " . DB_MODULE_ID . " = :module_id ";
        $query .= "AND " . DB_USER_ID . " = :user_id";
        
        $statement = $this->db->prepare($query);
        $statement->bindparam(':user_id', $user_id);
        $statement->bindparam(':module_id', $module_id);
        $statement->execute();
        
        $result = array();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($result == false)
            return false;
        
        return $result;
    }

    /**
     * Fetches the write privileges for specified user/module.
     *
     *
     * @return false if an error occurs, otherwise true.
     */
    public function userModuleWrite(User $User, Module $Module) {
        $query = "SELECT ";
        $query .= "  " . DB_USER_PRIV_WRITE . " ";
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
        
        if ($result == false)
            return false;
        
        return $result;
    }
}
?>

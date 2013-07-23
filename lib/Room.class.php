<?php
require_once('Entity.iface.php');
require_once('DbConnector.class.php');

class Supplier implements Entity
{
	private $id;
	private $name;
	
	/**
	 * Sets the room's id.
	 * @param string $id
	 */
	public function setId(int $id)
	{
		$this->id = $id;
	}
	
	/**
	 * Gets the room's id.
	 * @see Entity::getId()
	 */
	public function getId()
	{
		return $this->id;		
	}
	
	/**
	 * Sets the room's name.
	 * @param string $name
	 */
	public function setName(string $name)
	{
		$this->name = $name;
	}

	/**
	 * Gets the room's name.
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * Creates a new room optionally with pre-set values.
	 * @param array $row
	 */
	public function __construct(array $row = null)
	{
    	if ($row != null)
    	{
    		setId($row["DB_ROOM_ID"]);
    		setName($row["DB_ROOM_NAME"]);
    	}
	}
	
	/**
	 * Saves the current values to the database.
	 * @see Entity::update()
	 */
	public function update()
	{
		$db = DbConnector::getInstance();
		$db->updateRoom($this);
	}
	
	/**
	 * Removes the current object from the database.
	 * @see Entity::delete()
	 */
	public function delete()
	{
		$db = DbConnector::getInstance();
		$db->deleteRoom($this);
	}
	
	/**
	 * Creates a new room in the database with the current values.
	 * @see Entity::create()
	 */
	public function create()
	{
		$db = DbConnector::getInstance();
		$db->createRoom($this);
	}
	
	/**
	 * Deep-clones the current room. 
	 * @see Entity::copy()
	 */
	public function copy()
	{
		$clone = new Room();
		$clone->setId($this->id);
		$clone->setName($this->name);
		
		$clone->create();
		
		return $clone;
	}
	
	
}

?>
<?php

class Room implements Entity
{
	private $id;
	private $number;
	private $name;
	private $note;
	
	/**
	 * Sets the room's number.
	 * @param string $number
	 */
	public function setNumber($number)
	{
		$this->number = $number;
	}
	
	/**
	 * Gets the room's number.
	 * @return string
	 */
	public function getNumber()
	{
		return $this->number;
	}
	
	/**
	 * Sets the room's note.
	 * @param string $note
	 */
	public function setNote($note)
	{
		$this->note = $note;
	}
	
	/**
	 * Gets the room's note.
	 * @return string
	 */
	public function getNote()
	{
		return $this->note;
	}
	
	/**
	 * Sets the room's id.
	 * @param string $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}
	
	/**
	 * Gets the room's id.
	 * @see Entity::getId()
	 * @return int
	 */
	public function getId()
	{
		return $this->id;		
	}
	
	/**
	 * Sets the room's name.
	 * @param string $name
	 */
	public function setName($name)
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
    		$this->setId($row[DB_ROOM_ID]);
    		$this->setNumber($row[DB_ROOM_NUMBER]);
    		$this->setName($row[DB_ROOM_NAME]);
    		$this->setNote($row[DB_ROOM_NOTE]);
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
		$clone->setNumber($this->number);
		$clone->setName($this->name);
		$clone->setNote($this->note);
		
		$clone->create();
		
		return $clone;
	}
	
	
}

?>
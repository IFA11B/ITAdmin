<?php
/**
 * Entities are rows of tables in our database.
 *
 * @author Lukas Bagaric <lukas.bagaric@gmail.com>
 *
 */
interface Entity
{

    /**
     * Returns the primary key for the entity this Entity instance represents.
     *
     * @return integer the primary key of this entity
     */
    public function getId();

    /**
     * Constructor for Entity objects.
     * Expects an associative database row to be passed to it (or nothing if youre creating a new entity).
     *
     * @param array $row (optional) the database row to parse from.
     */
    public function __construct(array $row = null);
    
    /**
     * Updates this instance in the database with the current values for all columns.
     */
    public function update();

    /**
     * Deletes this instance from the database
     */
    public function delete();
    
    /**
     * Inserts this instance as new into the database.
     */
    public function create();

    /**
     * @return (Entity) A deep-copy of this instance.
     */
    public function copy();
}
?>
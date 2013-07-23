<?php
interface Entity
{
    public function __construct(array $row = null);
    
    public function update();
    
    public function delete();
    
    public function create();
    
    public function copy();
    
    public function getId();
}
?>
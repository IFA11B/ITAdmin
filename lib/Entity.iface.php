<?php
interface Entity
{
    public function __construct($row = null);
    
    public function update();
    
    public function delete();
    
    public function create();
}
?>
<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class HardDrive extends Component
{
	private $interfaceType;
	private $purpose;
	private $spaceMbyte;
	private $driveType;
	
	public function __construct(array $row = null)
	{
	    parent::__construct($row);
	
	    if ($row != null)
	    {
	        $this->setInterfaceType($row[DB_COMPONENT_HDD_INTERFACETYPE]);
    		$this->setPurpose($row[DB_COMPONENT_HDD_PURPOSE]);
    		$this->setSpaceMbyte($row[DB_COMPONENT_HDD_SPACEMBYTE]);
    		$this->setDriverType($row[DB_COMPONENT_HDD_DRIVETYPE]);
	    }
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new HardDrive();
	    }
	     
	    parent::copy($copy);
	
	    $copy->setInterfaceType($this->getInterfaceType());
		$copy->setPurpose($this->getPurpose());
		$copy->setSpaceMbyte($this->getSpaceMbyte());
		$copy->setDriverType($this->getDriverType());
	
	    return $copy;
	}
	
	public function getFields() {
	    $result = parent::getFields();
	     
	    $result[] = array(
	        'name' => 'Anschlussart',
	        'type' => 'enum',
	        'value' => $this->getInterfaceType(),
	        'values' => null);
	     
	    $result[] = array(
	        'name' => 'Einsatzbereich',
	        'type' => 'enum',
	        'value' => $this->getConfigurationFilePath(),
	        'values' => null);
	    
	    $result[] = array(
	        'name' => 'Gr&ouml;&szlig;e',
	        'type' => 'number',
	        'value' => $this->getSpaceMbyte());
	    
	    $result[] = array(
	        'name' => 'Laufwerkart',
	        'type' => 'enum',
	        'value' => $this->getDriveType(),
	        'values' => null);
	     
	    return $result;
	}
	
	public function getInterfaceType()
	{
		return $this->interfaceType;
	}
	
	public function setInterfaceType($interfaceType)
	{
		$this->interfaceType=$interfaceType;
	}
	
	public function getPurpose()
	{
		return $this->purpose;
	}
	
	public function setPurpose($purpose)
	{
		$this->purpose=$purpose;
	}
	
	public function getSpaceMbyte()
	{
		return $this->spaceMbyte;
	}
	
	public function setSpaceMbyte($spaceMbyte)
	{
		$this->spaceMbyte=$spaceMbyte;
	}
	
	public function getDriveType()
	{
		return $this->driveType;
	}
	
	public function setDriverType($driveType)
	{
		$this->driveType=$driveType;
	}
	
}

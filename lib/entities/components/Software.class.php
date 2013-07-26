<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class Software extends Component
{
	private $version;
	private $licenseType;
	private $licenseCount;
	private $licenseDuration;
	private $licenseInformation;
	private $installHint;
	
	public function __construct(array $row = null)
	{
	    parent::__construct($row);
	
	    if ($row != null)
	    {
	        $this->setVersion($row[DB_COMPONENT_S_VERSION]);
    		$this->setLicenseType($row[DB_COMPONENT_S_LICENSETYPE]);
    		$this->setLicenseCount($row[DB_COMPONENT_S_LICENSECOUNT]);
    		$this->setLicenseDuration($row[DB_COMPONENT_S_LICENSEDURATION]);
    		$this->setLicenseInformation($row[DB_COMPONENT_S_LICENSEINFORMATION]);
    		$this->setInstallHint($row[DB_COMPONENT_S_INSTALLHINT]);
	    }
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new Software();
	    }
	     
	    parent::copy($copy);
	
	    $copy->setVersion($this->getVersion());
		$copy->setLicenseType($this->getLicenseType());
		$copy->setLicenseCount($this->getLicenseCount());
		$copy->setLicenseDuration($this->getLicenseDuration());
		$copy->setLicenseInformation($this->getLicenseInformation());
		$copy->setInstallHint($this->getInstallHint());
	
	    return $copy;
	}
	
	public function getVersion()
	{
		return $this->version;
	}
	
	public function setVersion($version)
	{
		$this->version=$version;
	}
	
	public function getLicenseType()
	{
		return $this->licenseType;
	}
	
	public function setLicenseType($licenseType)
	{
		$this->licenseType=$licenseType;
	}
	
	public function getLicenseCount()
	{
		return $this->licenseCount;
	}
	
	public function setLicenseCount($licenseCount)
	{
		$this->licenseCount=$licenseCount;
	}
	
	public function getLicenseDuration()
	{
		return $this->licenseDuration;
	}
	
	public function setLicenseDuration($licenseDuration)
	{
		$this->licenseDuration=$licenseDuration;
	}
	
	public function getLicenseInformation()
	{
		return $this->licenseInformation;
	}
	
	public function setLicenseInformation($licenseInformation)
	{
		$this->licenseInformation=$licenseInformation;
	}
	
	
	public function getInstallHint()
	{
		return $this->installHint;
	}
	
	public function setInstallHint($installHint)
	{
		$this->installHint=$installHint;
	}
}

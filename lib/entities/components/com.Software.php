<?php
class Software extends Component
{
	private $Version;
	private $LicenseType;
	private $LicenseCount;
	private $LicenseDuration;
	private $LicenseInformation;
	private $InstallHint;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
		$this->setVersion($row[DB_COMPONENT_S_VERSION]);
		$this->setLicenseType($row[DB_COMPONENT_S_LICENSETYPE]);
		$this->setLicenseCount($row[DB_COMPONENT_S_LICENSECOUNT]);
		$this->setLicenseDuration($row[DB_COMPONENT_S_LICENSEDURATION]);
		$this->setLicenseInformation($row[DB_COMPONENT_S_LICENSEINFORMATION]);
		$this->setInstallHint($row[DB_COMPONENT_S_INSTALLHINT]);
	}
	
	public function getVersion()
	{
		return $this->Version;
	}
	
	public function setVersion($Version)
	{
		$this->Version=$Version;
	}
	
	public function getLicenseType()
	{
		return $this->LicenseType;
	}
	
	public function setLicenseType($LicenseType)
	{
		$this->LicenseType=$LicenseType;
	}
	
	public function getLicenseCount()
	{
		return $this->LicenseCount;
	}
	
	public function setLicenseCount($LicenseCount)
	{
		$this->LicenseCount=$LicenseCount;
	}
	
	public function getLicenseDuration()
	{
		return $this->LicenseDuration;
	}
	
	public function setLicenseDuration($LicenseDuration)
	{
		$this->LicenseDuration=$LicenseDuration;
	}
	
	public function getLicenseInformation()
	{
		return $this->LicenseInformation;
	}
	
	public function setLicenseInformation($LicenseInformation)
	{
		$this->LicenseInformation=$LicenseInformation;
	}
	
	
	public function getInstallHint()
	{
		return $this->InstallHint;
	}
	
	public function setInstallHint($InstallHint)
	{
		$this->InstallHint=$InstallHint;
	}
}
?>
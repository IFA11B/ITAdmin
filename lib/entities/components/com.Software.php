<?php
require_once ('com.Component.php');
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
	}
	
	public function getVersion()
	{
		return $this->Version;
	}
	
	public function setVersion(string $Version)
	{
		$this->Version=$Version;
	}
	
	public function getLicenseType()
	{
		return $this->LicenseType;
	}
	
	public function setLicenseType(string $LicenseType)
	{
		$this->LicenseType=$LicenseType;
	}
	
	public function getLicenseCount()
	{
		return $this->LicenseCount;
	}
	
	public function setLicenseCount(int $LicenseCount)
	{
		$this->LicenseCount=$LicenseCount;
	}
	
	public function getLicenseDuration()
	{
		return $this->LicenseDuration;
	}
	
	public function set(int $LicenseDuration)
	{
		$this->LicenseDuration=$LicenseDuration;
	}
	
	public function getLicenseInformation()
	{
		return $this->LicenseInformation;
	}
	
	public function setLicenseInformation(string $LicenseInformation)
	{
		$this->LicenseInformation=$LicenseInformation;
	}
	
	
	public function getInstallHint()
	{
		return $this->InstallHint;
	}
	
	public function setInstallHint(string $InstallHint)
	{
		$this->InstallHint=$InstallHint;
	}
}
?>
<?php
class Software extends Component
{
	private $Version;
	private $LicenseType;
	private $LicenseCount;
	private $LicenseDuration;
	private $LicenseInformation;
	private $InstallHint;
	
	public function __construct($parent)
	{
		parent::__construct($parent->Room,$parent);
	}
	
	public function getVersion()
	{
		if ($this->Version) {
			return '';
		}
		return $this->Version;
	}
	
	public function setVersion($Version)
	{
		$this->Version=$Version;
	}
	
	public function getLicenseType()
	{
		if ($this->LicenseType) {
			return '';
		}
		return $this->LicenseType;
	}
	
	public function setLicenseType($LicenseType)
	{
		$this->LicenseType=$LicenseType;
	}
	
	public function getLicenseCount()
	{
		if ($this->LicenseCount) {
			return 0;
		}
		return $this->LicenseCount;
	}
	
	public function setLicenseCount($LicenseCount)
	{
		$this->LicenseCount=$LicenseCount;
	}
	
	public function getLicenseDuration()
	{
		if ($this->LicenseDuration) {
			return '';
		}
		return $this->LicenseDuration;
	}
	
	public function set($LicenseDuration)
	{
		$this->LicenseDuration=$LicenseDuration;
	}
	
	public function getLicenseInformation()
	{
		if ($this->LicenseInformation) {
			return '';
		}
		return $this->LicenseInformation;
	}
	
	public function setLicenseInformation($LicenseInformation)
	{
		$this->LicenseInformation=$LicenseInformation;
	}
	
	
	public function getInstallHint()
	{
		if ($this->InstallHint) {
			return '';
		}
		return $this->InstallHint;
	}
	
	public function set($InstallHint)
	{
		$this->InstallHint=$InstallHint;
	}
}
?>
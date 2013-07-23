<?php
require_once('Entity.iface.php');
require_once('DbConnector.class.php');

class Supplier implements Entity
{
	private $id;
    private $companyname;
    private $street;
    private $zipcode;
    private $city;
    private $phone;
    private $mobile;
    private $fax;
    private $email;
    
    public function getId()
    {
    	return $this->id;
    }
    
    public function setId($id)
    {
    	$this->id = $id;
    }
    
    public function getCompanyname()
    {
    	return $this->companyname;
    }
    
    public function setCompanyname($companyname)
    {
    	$this->companyname = $companyname;
    }
    
    public function getStreet()
    {
    	return $this->street;
    }

    public function setStreet($street)
    {
    	$this->street = $street;
    }
    
    public function getZipcode()
    {
    	return $this->zipcode;
    }
    
    public function setZipcode($zipcode)
    {
    	$this->zipcode = $zipcode;
    }
    
    public function getCity()
    {
    	return $this->city;
    }
    
    public function set($city)
    {
    	$this->city = $city;
    }
    
    public function getPhone()
    {
    	return $this->phone;
    }
    
    public function setPhone($phone)
    {
    	$this->phone = $phone;
    }
    
    public function getMobile()
    {
    	return $this->mobile;
    }
    
    public function setMobile($mobile)
    {
    	$this->mobile = $mobile;
    }
    
    public function getFax()
    {
    	return $this->fax;
    }
    
    public function setFax($fax)
    {
    	$this->fax = $fax;
    }
    
    public function getEmail()
    {
		return $this->email;
    }
    
    public function setEmail($email)
    {
    	$this->email = $email;
    }
    
    public function __construct(array $row = null)
    {
    	if ($row != null)
    	{
    		setId($row[DB_SUPPLIER_ID]);
    		setCompanyame($row[DB_SUPPLIER_COMPANYNAME]);
    		setStreet($row[DB_SUPPLIER_STREET]);
    		setZipcode($row[DB_SUPPLIER_ZIPCODE]);
    		setCity($row[DB_SUPPLIER_CITY]);
    		setPhone($row[DB_SUPPLIER_PHONE]);
    		setMobile($row[DB_SUPPLIER_MOBILE]);
    		setFax($row[DB_SUPPLIER_FAX]);
    		setEmail($row[DB_SUPPLIER_FAX]);
    	}
    }
    
    public function update();
    
    public function delete();
    
    public function create();
    
    public function copy();
}
<?php
class MaintenanceMain implements Page
{
	function getTemplate()
	{
		return 'maintenanceMain.tpl';
	}
	
	function getContent()
	{
		return array(
				pageTitle => 'Wartung'
		);
	}

	static function getName()
	{
		return 'Main'; 
	}
}
?>
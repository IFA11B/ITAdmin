<?php
class MaintenanceRemove implements Page
{
	function getTemplate()
	{
		return 'maintenanceRemove.tpl';
	}

	function getContent()
	{
		return array(
				pageTitle => 'Ausbauen'
		);
	}

	static function getName()
	{
		return 'Ausbauen';
	}
}
?>
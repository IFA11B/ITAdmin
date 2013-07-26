<?php
class MaintenanceChange implements Page
{
	function getTemplate()
	{
		return 'maintenanceChange.tpl';
	}

	function getContent()
	{
		return array(
				pageTitle => 'Austauschen'
		);
	}

	static function getName()
	{
		return 'Austauschen';
	}
}
?>
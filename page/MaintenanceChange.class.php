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
				pageTitle => 'Austausch'
		);
	}

	static function getName()
	{
		return 'Austausch';
	}
}
?>
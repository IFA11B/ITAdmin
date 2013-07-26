<?php
class MaintenanceChange implements Page
{
	function getTemplate()
	{
		return 'maintenanceRemove.tpl';
	}

	function getContent()
	{
		return array(
				pageTitle => 'Ausbau'
		);
	}

	static function getName()
	{
		return 'Ausbau';
	}
}
?>
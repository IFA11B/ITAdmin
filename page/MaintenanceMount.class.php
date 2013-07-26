<?php
class MaintenanceChange implements Page
{
	function getTemplate()
	{
		return 'maintenanceMount.tpl';
	}

	function getContent()
	{
		return array(
				pageTitle => 'Einbau'
		);
	}

	static function getName()
	{
		return 'Einbau';
	}
}
?>
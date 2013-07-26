<?php

/**
 * Class for Viewing Maintenance.
 *
 * @author SeiresS <keckchris@web.de>
 */

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
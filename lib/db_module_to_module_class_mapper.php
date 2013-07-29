<?php

function  map_db_module_to_module_class($raw_module)
{
	switch ($raw_module[DB_MODULE_NAME])
	{
		case "Reporting":
			return new Reporting();
			break;
		case "Bestellung":
			return new Order();
		default:
			return false;
	}
}

?>
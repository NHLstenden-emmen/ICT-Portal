<?php
/**
* Dit bestand heeft tot doel om verschillende sql statements makkelijk te kunnen aanroepen vanuit andere bestanden.
*
*/
class MySQL
{
	private $link;

	function __construct()
	{
		$hostname = 'localhost';
		$username = 'root';
		$password = '';
		$database = 'ictportal';

		$this->link = new MySQLi($hostname, $username, $password, $database);
	}

	function Get($query)
	{
		return $this->link->query($query);
	}

	function LastID(){
		return $this->link->insert_id;
	}
}
?>
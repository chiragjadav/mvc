<?php 
namespace Model;

class Configration extends Core\Table
{
	public function __construct()
	{
		$this->setTableName('config')->setPrimaryKey('configId');		
	}

}
?>
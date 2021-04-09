<?php
namespace Block\Core;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{

	protected $collection = []; 
	protected $columns = [];
	protected $actions = [];
	protected $button = [];
	public function __construct()
	{
		$this->setTemplate('View/Core/grid.php');
		$this->prepareColumns();
		$this->prepareActions();
		$this->prepareButton();
	}

	public function prepareCollection()
	{
		return $this;
	}
	public function setCollection($collection)
	{
		$this->collection = $collection;
		return $this;
	}
	public function getCollection() 
	{
		if(!$this->collection) 
		{
			$this->prepareCollection();
		}
		return $this->collection;
	}

	public function getColumns()
	{
		return $this->columns;
	}
	public function addColumns($key,$value)
	{
		$this->columns[$key] = $value;
		return $this;
	}
	public function prepareColumns()
	{
		return $this;
	}
	public function getFieldValue($row,$field)
	{
		return $row->$field;
	}
	public function addActions($key,$value)
	{
		$this->actions[$key] = $value;
		return $this;
	}
	public function getActions()
	{
		return $this->actions;
	}
	public function prepareActions()
	{
		return $this;
	}
	public function getMethodUrl($row,$methodName)
	{
		return $this->$methodName($row);
	}
	
	public function getTitle()
	{
		return 'Manage Module';	
	}
	public function addButton($key,$value)
	{
		$this->button[$key] = $value;
		return $this;
	}
	public function getButton()
	{
		return $this->button;
	}
	public function prepareButton()
	{
		return $this;
	}
	public function getButtonUrl($methodName)
	{
		return $this->$methodName();
	}
}

?>
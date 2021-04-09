<?php
namespace Block\Admin\Attribute;
\Mage::loadFileByClassName('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{
	// protected $attribute = [];
	protected $filter = null;
	public function __construct()
	{
		$this->setTemplate('View/Admin/Attribute/grid.php');
		$this->prepareColumns();
		$this->prepareActions();
		$this->prepareButton();
		
	}
	
	public function prepareCollection()
	{
		$attribute = \Mage::getModel('Model\Attribute');
		$query = "SELECT * FROM {$attribute->getTableName()}";
		if($this->getFilter()->hasFilters())
		{
			$query.=" WHERE 1 = 1";
			foreach ($this->getFilter()->getFilters() as $type => $filters) {
				if($type == 'text')
				{
					foreach ($filters as $key => $value) {
						$query.=" AND (`{$key}` LIKE '%{$value}%')";
					}
				}
			}
		}
		$collection = $attribute->fetchAll($query);
		$this->setCollection($collection);
		return $this;
	}

	public function getFilter()
	{
		if(!$this->filter)
		{
			$this->filter = \Mage::getModel('Model\Admin\Filter');
		}
		return $this->filter;
	}
	public function prepareColumns()
	{
		$this->addColumns('attributeId',[
			'field' => 'attributeId',
			'label' => 'Atribute Id',
			'type' => 'number'
		]);
		$this->addColumns('name',[
			'field' => 'name',
			'label' => 'Atribute Name',
			'type' => 'text'
		]);
		$this->addColumns('entityTypeId',[
			'field' => 'entityTypeId',
			'label' => 'Entity Type',
			'type' => 'text'
		]);
		$this->addColumns('code',[
			'field' => 'code',
			'label' => 'Atribute Code',
			'type' => 'text'
		]);
		$this->addColumns('inputType',[
			'field' => 'inputType',
			'label' => 'Input Type',
			'type' => 'text'
		]);
		$this->addColumns('sortOrder',[
			'field' => 'sortOrder',
			'label' => 'Sort Order',
			'type' => 'number'
		]);
	}

	public function prepareActions()
	{
		$this->addActions('edit',[
			'label' => 'Update',
			'method' => 'getEditUrl',
			'class' => 'btn-warning',
			'ajax' => true
		]);
		$this->addActions('delete',[
			'label' => 'Delete',
			'method' => 'getDeleteUrl',
			'class' => 'btn-danger',
			'ajax' =>true
		]);
	}
	public function getEditUrl($row)
	{
		$url = $this->getUrl('form',null,['attributeId' => $row->attributeId]);
		return "object.setUrl('{$url}').resetParams().load()";
	}
	public function getDeleteUrl($row)
	{
		$url = $this->getUrl('delete',null,['attributeId' => $row->attributeId]);
		return "object.setUrl('{$url}').resetParams().load()";
	}
	public function getTitle()
	{
		return 'Manage Attribute';
	}
	public function prepareButton()
	{
		$this->addButton('Add new',[
			'label' => 'Add New',
			'method' => 'getAddNewUrl',
			'ajax' => true
		]);
		
	}
	public function getAddNewUrl()
	{
		$url = $this->getUrl('form',null,null,true);
		return "object.setUrl('{$url}').resetParams().load()";
	}
	public function getAddFilterUrl()
	{
		$url = $this->getUrl('grid',null,null,true);
		return "object.setForm(this).load()";
	}


}
?>
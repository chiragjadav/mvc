<?php
namespace Block\Admin\Attribute;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
	protected $attribute = [];
	public function __construct()
	{
		$this->setTemplate('View/Admin/Attribute/grid.php');
	}
	public function setAttribute($attribute = null) 
	{
		try {
			if(!$this->attribute)
			{
				$attribute = \Mage::getModel('Model\Attribute');
				$this->attribute = $attribute->fetchAll();	
			}
			return $this;	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function getAttribute() 
	{
		if(!$this->attribute)
		{
			$this->setAttribute();
		}
		return $this->attribute;
	}

}
?>
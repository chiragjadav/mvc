<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
class Category extends Core\Table
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	function __construct()
	{
		$this->setPrimaryKey('categoryId');
		$this->setTableName('category');
	}
	public function getStatusOption() 
	{
		return [
			self::STATUS_ENABLED => 'Enable',
			self::STATUS_DISABLED => 'Disable'
		];
	}

	public function updatePathId()
	{
		if(!$this->parentId){
				$pathId = $this->categoryId;
		} else {
			$parent = \Mage::getModel('Model\Category')->load($this->parentId);

			$pathId = $parent->pathId."=>".$this->categoryId;
		}
		$this->pathId = $pathId;
		return $this->save();
	}

	public function updateChildrenPathIds($categoryPathId,$parentId = null,$categoryId = null)
	{
				$categoryPathId = $categoryPathId."=>"; 
				$query = "SELECT * FROM `{$this->getTableName()}` WHERE `pathId` LIKE '{$categoryPathId}%' ORDER BY `pathId` ASC;";
			
				$categories = $this->fetchAll($query);
		
				if($categories)
				{
					foreach ($categories->getData() as $key => $row) {
						if($parentId != null)
						{
							if ($row->parentId == $categoryId) {
                    		    $row->parentId = $parentId;
                    		}
						}
						$row->updatePathId();
					}
				}
	}
}
?>
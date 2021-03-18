<?php
namespace Block\Admin\Category;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{

	protected $categories = [];
	protected $categoryOptions = [];
	public function __construct()
	{
		$this->setTemplate('View/Admin/category/grid.php');
	}

	public function setCategories($categories=null) 
	{
		try {
			if(!$this->categories)
			{
				$categories = \Mage::getModel('Model\Category');
				$this->categories = $categories->fetchAll();
				// $categories->getData();
		
			}
			return $this;	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function getCategories() 
	{
		if(!$this->categories)
		{
			$this->setCategories();
		}
		return $this->categories;
	}
	public function getName($category)
	{
		// print_r($category);
		$categoryModel = \Mage::getModel('Model\Category');
		if(!$this->categoryOptions) {
			$query = "SELECT `{$categoryModel->getPrimaryKey()}`,`name` FROM `{$categoryModel->getTableName()}` ;";
			$this->categoryOptions = $categoryModel->fetchParis($query);
		}

		$pathId = explode('=>',$category->pathId);
		foreach ($pathId as $key => $id) {
			$pathId[$key] = $this->categoryOptions[$id];
		}
		
		return implode('=>',$pathId);
	}

}
?>
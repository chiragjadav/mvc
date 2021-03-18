<?php
namespace Block\Admin\Category\Edit\Tabs;
\Mage::loadFileByClassName('Block\Admin\Category\Edit');

class Form extends \Block\Admin\Category\Edit
{
	protected $category = null;
	protected $categoryOptions = [];	
	protected $categoryPath = [];	

	/*protected $categories = [];
	protected $idNameArray = [];
	protected $parentPath = null;*/
	function __construct()
	{
		$this->setTemplate('View/Admin/category/edit/tabs/form.php');		
	}

/*	public function setCategory($category = null) 
	{
		if(!$category)
		{
			$category =  \Mage::getModel('Model\Category');
		}
		if($id = $this->getRequest()->getGet('categoryId')) 
		{
			$category = $category->load($id);
		}
		$this->category = $category;
		return $this;
	}
	public function getCategory() 
	{
		if(!$this->category) 
		{
			$this->setCategory();
		}
		return $this->category;
	}*/

	public function getCategoryOption()
	{
	
		$query = "SELECT `{$this->getTableRow()->getPrimaryKey()}`,`name` FROM `{$this->getTableRow()->getTableName()}`;";
		$options = $this->getTableRow()->fetchParis($query);

		$pathId = '';
            if ($this->getTableRow()->pathId) {
                $pathId = $this->getTableRow()->pathId.'=>%';
            }
            $query = "SELECT `categoryId`, `pathId` FROM `{$this->getTableRow()->getTableName()}` WHERE NOT `pathId` = '{$this->getTableRow()->pathId}' AND `pathId` NOT LIKE '{$pathId}' ORDER BY `pathId` ASC;";
		$this->categoryOptions = $this->getTableRow()->fetchParis($query);

		if(!$this->categoryOptions)
		{
				$this->categoryOptions = [];
		}

		if($this->categoryOptions)
		{
			foreach ($this->categoryOptions as $categoryId => $pathId) {
			$pathIds = explode('=>',$pathId);
				foreach ($pathIds as $key => $id) {
					if(array_key_exists($id, $options))
					{
						$pathIds[$key] = $options[$id];
					}
				}
			$this->categoryOptions[$categoryId] = implode('=>',$pathIds);
			}


		}
		return $this->categoryOptions = ["0"=>"Root Category"] + $this->categoryOptions;
	}

	public function getName()
	{
		$categoryOptions = $this->getCategoryOption();
	}










	/*public function setCategories($categories=null) 
	{
		try {
			if(!$this->categories)
			{
				$categories = Mage::getModel('Model_Category');
				$this->categories = $categories->fetchAll();
				// $categories->getData();
		
				if(!$this->categories)
				{
					throw new Exception('No Record Found');
				}
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
	public function getIdNameArray()
	{
		$categories = $this->getCategories()->getData();
		
			foreach ($categories as $key => $value) {
			$this->idNameArray[$value->categoryId] = $value->name; 
			}
		return $this->idNameArray;
		
	}

	public function getPath($path = null)
	{
		
		$categories = $this->getCategories()->getData();
		$idName = $this->getIdNameArray();
		if(!$path){
			foreach ($categories as $key1 => $value1) {
				$path = $value1->parentPath;
				$pathArray = explode('=>', $path);
				foreach ($pathArray as $key2 => $value2) {
					$pathArray[$key2] = $idName[$value2];
				}
				$pathArray = implode('=>' , $pathArray);
				$this->parentPath[$value1->parentPath] = $pathArray;
			}	
		}
		else {
			$pathArray = explode('=>',$path);
			foreach ($pathArray as $key => $value) {
				$pathArray[$key] = $idName[$value];
			}
			$pathArray = implode('=>', $pathArray);
			$this->parentPath = $pathArray;
		}
		return $this->parentPath;
	}
*/
	/*public function getPath2($path = null)
    {
        $categories = $this->getCategories();
        $categoryName = $this->getIdNameArray();
        if(!$path){
            foreach ($categories as $key1 => $category) {
                $path = explode("=>",$category->parentPath);
                foreach ($path as $key2 => $value) {
                    $path[$key2] = $categoryName[$value];
                }
                $path = implode('=>', $path);
                $this->parentPath[] = $path;
            }
        }
        else{
            $path = explode("=>",$path);
            foreach ($path as $key2 => $value) {
                $path[$key2] = $categoryName[$value];
            }
            $path = implode('=>', $path);
            $this->parentPath = $path;
        }
        return $this->parentPath;
	}*/


}

?>
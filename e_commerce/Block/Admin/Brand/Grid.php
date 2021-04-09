<?php
namespace Block\Admin\Brand;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
	protected $brand = null;
	protected $brands = [];
	public function __construct()
	{
		$this->setTemplate('View/Admin/Brand/grid.php');
	}
	
	public function setBrands($brands = null) 
	{
		if(!$this->brands) 
		{
			$brand = \Mage::getModel('Model\Brand');
			$this->brands = $brand->fetchAll();
		
		}	
		return $this;
	}
	public function getBrands() 
	{
		if(!$this->brands) 
		{
			$this->setBrands();
		}
		return $this->brands;
	}
	public function setBrand($brand = null) 
	{
		if($brand)
		{
			$this->brand = $brand;
		}
		$brand =  \Mage::getModel('Model\Brand');

		$this->brand = $brand;
		return $this;
	}
	public function getBrand() 
	{
		if(!$this->brand) 
		{
			$this->setImage();
		}
		return $this->brand;
	}

}
?>
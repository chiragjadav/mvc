<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Admin\Product\Edit');

class Media extends \Block\Admin\Product\Edit
{
	protected $image = null;
	protected $images = [];
	function __construct()
	{
		$this->setTemplate('View/Admin/product/edit/tabs/media.php');		
	}

	public function setImages($images = null) 
	{
		if(!$this->images) 
		{
			$image = \Mage::getModel('Model\ProductImage');
			$this->images = $image->fetchAll();
		
		}	
		return $this;
	}
	public function getImages() 
	{
		if(!$this->images) 
		{
			$this->setImages();
		}
		return $this->images;
	}
	public function setImage($image = null) 
	{
		if($image)
		{
			$this->image = $image;
		}
		$image =  \Mage::getModel('Model\ProductImage');

		$this->image = $image;
		return $this;
	}
	public function getImage() 
	{
		if(!$this->image) 
		{
			$this->setImage();
		}
		return $this->image;
	}
}

?>
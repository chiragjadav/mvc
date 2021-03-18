<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');

class ProductImage extends Core\Table{
	
	public function __construct() {

		$this->setPrimaryKey('imageId');
		$this->setTableName('product_image');
	}

	
}
	
?>
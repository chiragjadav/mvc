<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Admin\Product\Edit');

class GroupPrice extends \Block\Admin\Product\Edit
{
	protected $product = null;
	protected $customerGroups = [];
	function __construct()
	{
		$this->setTemplate('View/Admin/product/edit/tabs/groupPrice.php');		
	}
/*	public function setProduct(\Model\Product $product)		
	{
		$this->product = $product;
		return $this;
	}*/
/*	public function setProduct($product = null)
	{
		if(!$product)
		{
		 $productId = $this->getRequest()->getGet('productId');
		 $product = \Mage::getModel('Model\Product')->load($productId);
		}
	    $this->product = $product;
	    return $this;
	}
	public function getProduct()
	{
		if(!$this->product)
		{
			$this->setProduct();
		}
		return $this->product;
	}*/
	public function getCustomerGroup()
	{
		$query = "SELECT cg.*,pgp.productId,pgp.entityId,pgp.price as groupPrice,
		if(p.price IS NULL,'{$this->getTableRow()->price}',p.price) as price
		FROM customer_group cg
		LEFT JOIN product_group_price pgp
			ON pgp.customerGroupId = cg.groupId 
				AND pgp.productId = '{$this->getTableRow()->productId}' 
		LEFT JOIN product p 
			ON pgp.productId = p.productId
		";
		$customerGroups = \Mage::getModel('Model\CustomerGroup');
		$this->customerGroups = $customerGroups->fetchAll($query);

		return $this->customerGroups;
	}
}
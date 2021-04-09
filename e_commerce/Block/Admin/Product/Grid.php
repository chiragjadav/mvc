<?php
namespace Block\Admin\Product;
\Mage::loadFileByClassName('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{

	public function prepareCollection()
	{
		$product = \Mage::getModel('Model\Product');
		$collection = $product->fetchAll();
		$this->setCollection($collection);
		return $this;
	}
	public function prepareColumns()
	{
		$this->addColumns('productId',[
			'field' => 'productId',
			'label' => 'Product Id',
			'type' => 'number'
		]);
		$this->addColumns('sku',[
			'field' => 'sku',
			'label' => 'SKU',
			'type' => 'text'
		]);
		$this->addColumns('name',[
			'field' => 'name',
			'label' => 'Product Name',
			'type' => 'text'
		]);
		$this->addColumns('discount',[
			'field' => 'discount',
			'label' => 'Discount',
			'type' => 'number'
		]);
		$this->addColumns('quantity',[
			'field' => 'quantity',
			'label' => 'Quantity',
			'type' => 'number'
		]);
		$this->addColumns('price',[
			'field' => 'price',
			'label' => 'Product Price',
			'type' => 'decimal'
		]);
		$this->addColumns('status',[
			'field' => 'status',
			'label' => 'Status',
			'type' => 'number'
		]);
		$this->addColumns('createdDate',[
			'field' => 'createdDate',
			'label' => 'Created Date',
			'type' => 'number'
		]);
		$this->addColumns('updateddDate',[
			'field' => 'updatedDate',
			'label' => 'Updated Date',
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
			'ajax' => true

		]);
		$this->addActions('cart',[
			'label' => 'ADD Cart',
			'method' => 'getAddToCartUrl',
			'class' => 'btn-primary',
			'ajax' => false

		]);
	}
	public function getEditUrl($row)
	{
		//return $this->getUrl('form',null,['productId' => $row->productId]);
		$url = $this->getUrl('form',null,['productId' => $row->productId]);
		return "object.setUrl('{$url}').resetParams().load()";
	}
	public function getDeleteUrl($row)
	{
		//return $this->getUrl('delete',null,['productId' => $row->productId]);
		$url = $this->getUrl('delete',null,['productId' => $row->productId]);
		return "object.setUrl('{$url}').resetParams().load()";
	}
	public function getAddToCartUrl($row)
	{
		//return $this->getUrl('delete',null,['productId' => $row->productId]);
		$url = $this->getUrl('addToCart','Admin\Cart',['productId' => $row->productId]);
		return $url;
		//return "object.setUrl('{$url}').resetParams().load()";
	}
	public function getTitle()
	{
		return 'Manage Product';	
	}
	public function prepareButton()
	{
		$this->addButton('addnew',[
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
}

?>
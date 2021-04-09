<?php
namespace Model;
//\Mage::loadFileByClassName('Model\Core\Table');
class Cart extends Core\Table
{
	protected $customer = null;
	protected $items = null;
	protected $billingAddress = null;
	protected $shippingAddress = null;
	protected $paymentMethod = null;
	protected $shippingMethod = null;
	protected $total = null;
	public function __construct()
	{
		$this->setPrimaryKey('cartId');
		$this->setTableName('cart');
	}
	public function setCustomer(\Model\Customer $customer)
	{
		$this->customer = $customer;
		return $this;
	}
	public function getCustomer()
	{
		if($this->customer)
		{
			return $this->customer;
		}
		if(!$this->customerId)
		{
			return false;
		}
		$customer = \Mage::getModel('Model\Customer')->load($this->customerId);
		$this->setCustomer($customer);
		return $this->customer;
	}
	public function setItems(\Model\Cart\Item\Collection $items)
	{
		$this->items = $items;
		return $this;
	}
	public function getItems()
	{
		if(!$this->cartId)
		{
			return false;
		}
		$query = "SELECT * FROM `cart_item` WHERE `cartId` = '{$this->cartId}'";
		$items = \Mage::getModel('Model\Cart\Item')->fetchAll($query);
		if(!$items)
		{
			return false;
		}
		$this->setItems($items);
		return $this->items;
	}
	public function getTotal()
	{	
		
		$items = $this->getItems();
		if(!$items)
		{
			return null;
		}
		foreach ($items->getData() as $key => $item) {
			$totalPrice = $item->price * $item->quantity;
			$totalDiscount = $item->discount * $item->quantity;  
			$total += $totalPrice - $totalDiscount;	
		}
		return $total;

	}
	public function setBillingAddress(\Model\Cart\Address $address)
	{
		$this->billingAddress = $address;
		return $this;
	}
	public function getBillingAddress()
	{
		if($this->billingAddress)
		{
			return $this->billingAddress;
		}
		if(!$this->cartId)
		{
			return false;
		}

		$addressType = \Model\Cart\Address::ADDRESS_TYPE_BILLING;
		$query = "SELECT * FROM `cart_address` WHERE `cartId` = '{$this->cartId}' AND addressType = '$addressType'";
		$billingAddress = \Mage::getModel('Model\Cart\Address')->fetchRow($query);

		if(!$billingAddress)
		{
			return false;
		}
		$this->setBillingAddress($billingAddress);
		return $this->billingAddress;
	}
	public function setShippingAddress(\Model\Cart\Address $address)
	{
		$this->shippingAddress = $address;
		return $this;
	}
	public function getShippingAddress()
	{
		if($this->shippingAddress)
		{
			return $this->shippingAddress;
		}
		if(!$this->cartId)
		{
			return false;
		}
		$addressType = \Model\Cart\Address::ADDRESS_TYPE_SHIPPING;
		$query = "SELECT * FROM `cart_address` WHERE `cartId` = '{$this->cartId}' AND addressType = '$addressType'";
		$shippingAddress = \Mage::getModel('Model\Cart\Address')->fetchRow($query);
		if(!$shippingAddress)
		{
			return false;
		}
		$this->setShippingAddress($shippingAddress);
		return $this->shippingAddress;
	}
	public function setPaymentMethod(\Model\Payment $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    public function getpaymentMethod()
    {
        if ($this->paymentMethod) {
            return $this->paymentMethod;
        }
        if (!$this->cartId) {
            return false;
        }
        $paymentMethod = \Mage::getModel('Model\Payment');
        $query = "SELECT * FROM {$paymentMethod->getTableName()} WHERE `methodId` = '{$this->paymentMethodId}';";
        if(!$paymentMethod->fetchRow($query)){
            return false;
        }
        $this->setPaymentMethod($paymentMethod);
        return $this->paymentMethod;
    }

    public function setShippingMethod(\Model\Shipping $shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;
        return $this;
    }

    public function getShippingMethod()
    {
        if ($this->shippingMethod) {
            return $this->shippingMethod;
        }
        if (!$this->cartId) {
            return false;
        }
        $shippingMethod = \Mage::getModel('Model\Shipping');
        $query = "SELECT * FROM {$shippingMethod->getTableName()} WHERE `methodId` = '{$this->shippingMethodId}';";
        if(!$shippingMethod->fetchRow($query)){
            return false;
        }
        $this->setShippingMethod($shippingMethod);
        return $this->shippingMethod;
    }

	public function addItemToCart($product, $quantity = 1, $addMode = false)
	{

		$cartItem = \Mage::getModel('Model\Cart\Item');
		$query = "SELECT * FROM `{$cartItem->getTableName()}` WHERE `cartId` = '$this->cartId' AND `productId` = '{$product->productId}'";
		$cartItem = $cartItem->fetchRow($query);
		if($cartItem)
		{
			$cartItem->quantity += $quantity;

			$cartItem->save();
			return true;
		}
		$cartItem = \Mage::getModel('Model\Cart\Item');
		$cartItem->cartId = $this->cartId;
		$cartItem->productId = $product->productId;
		$cartItem->price = $product->price;
		$cartItem->basePrice = $product->price;
		$cartItem->quantity = $quantity;
		$cartItem->discount = $product->discount;
		$cartItem->createdDate = date("Y-m-d H:i:s");
		// echo "<pre>";
		// print_r($cartItem);die;
		$cartItem->save();
		
		return true;
	}
}
?>
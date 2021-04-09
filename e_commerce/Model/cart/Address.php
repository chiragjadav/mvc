<?php
namespace Model\Cart;
//\Mage::loadFileByClassName('Model\Core\Table');
class Address extends \Model\Core\Table
{
	protected $cart = null;
	protected $customerBillingAddress = null;
	protected $customerShippingAddress = null;
	const ADDRESS_TYPE_BILLING = 'Billing';
	const ADDRESS_TYPE_SHIPPING = 'Shipping';
	public function __construct()
	{
		$this->setPrimaryKey('cartAddressId');
		$this->setTableName('cart_address');
	}
	public function setCart(\Model\Cart $cart)
	{
		$this->cart = $cart;
		return $this;
	}
	public function getCart()
	{
		if(!$this->cart)
		{
			return false;
		}
		$cart = \Mage::getModel('Model\Cart')->load($this->cartId);
		if(!$cart)
		{
			return false;
		}
		$this->setCart($cart);

		return $this->cart;
	}
	public function setCustomerBillingAddress(\Model\CustomerAddress $address)
	{
		$this->customerBillingAddress = $address;
		return $this;
	}
	public function getCustomerBillingAddress()
	{
		if(!$this->addressId)
		{
			return false;
		}
		$customerBillingAddress = \Mage::getModel('Model\CustomerAddress')->load($this->addressId);
		$this->setCustomerBillingAddress($customerBillingAddress);
		return $this->customerBillingAddress;
	}
	public function setCustomerShippingAddress(\Model\CustomerAddress $address)
	{
		$this->customerShippingAddress = $address;
		return $this;
	}
	public function getCustomerShippingAddress()
	{
		if(!$this->addressId)
		{
			return false;
		}
		$customerShippingAddress = \Mage::getModel('Model\CustomerAddress')->load($this->addressId);
		$this->setCustomerShippingAddress($customerShippingAddress);
		return $this->customerShippingAddress;
	}
	public function saveCustomerBillingAddress($customerBillingAddress,$cart)
	{
			$cartAddress = $this;
			$cartAddress->cartId = $cart->cartId;
			$cartAddress->addressId = $customerBillingAddress->addressId;
			$cartAddress->city = $customerBillingAddress->city;
			$cartAddress->state = $customerBillingAddress->state;
			$cartAddress->country = $customerBillingAddress->country;
			$cartAddress->zip = $customerBillingAddress->zipcode;
			$cartAddress->addressType = $customerBillingAddress->addressType;

			$cartAddress->save();
			return true;
	}
	public function saveCustomerShippingAddress($customerShippingAddress,$cart)
	{
			$cartAddress = $this;
			$cartAddress->cartId = $cart->cartId;
			$cartAddress->addressId = $customerShippingAddress->addressId;
			$cartAddress->city = $customerShippingAddress->city;
			$cartAddress->state = $customerShippingAddress->state;
			$cartAddress->country = $customerShippingAddress->country;
			$cartAddress->zip = $customerShippingAddress->zipcode;
			$cartAddress->addressType = $customerShippingAddress->addressType;

			$cartAddress->save();
			return true;
	}
}
?>
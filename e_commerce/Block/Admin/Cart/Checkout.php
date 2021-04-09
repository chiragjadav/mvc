<?php 
namespace Block\Admin\Cart;

class Checkout extends \Block\Core\Template
{
	protected $cart = null;
	protected $paymentMethods = null;
	protected $shippingMethods = null;
	public function __construct()
	{
		$this->setTemplate('View\Admin\Cart\checkout.php');
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
			throw new Exception("Cart is not set", 1);
		}
		return $this->cart;
	}
	public function getBillingAddress()
	{
		if(!$this->getCart()->customerId)
		{
			return \Mage::getModel('Model\Cart\Address');
		}
		$billingAddress = $this->getCart()->getBillingAddress();
		if($billingAddress)
		{
			return $this->billingAddress = $billingAddress;
		}
		 
		$customerBillingAddress = $this->getCart()->getCustomer()->getBillingAddress();
		if($customerBillingAddress)
		{
			$cartAddress = \Mage::getModel('Model\Cart\Address');
			$cartAddress->saveCustomerBillingAddress($customerBillingAddress,$this->getCart());
			
			return $this->getCart()->getBillingAddress();
		}
		return \Mage::getModel('Model\Cart\Address');
		
	}
	public function getShippingAddress()
	{
		if(!$this->getCart()->customerId)
		{
			return \Mage::getModel('Model\Cart\Address');
		}
		$shippingAddress = $this->getCart()->getShippingAddress();
		if($shippingAddress)
		{
			return $this->ShippingAddress = $shippingAddress;
		}
		 
		$customerShippingAddress = $this->getCart()->getCustomer()->getShippingAddress();
		if($customerShippingAddress)
		{
			$cartAddress = \Mage::getModel('Model\Cart\Address');
			$cartAddress->saveCustomerShippingAddress($customerShippingAddress,$this->getCart());
			
			return $this->getCart()->getShippingAddress();
		}
		return \Mage::getModel('Model\Cart\Address');
		
	}
	public function getCustomerName($customerId)
	{
		if(!$this->getCart()->customerId)
		{
			return null;
		}
		return \Mage::getModel('Model\Customer')->load($customerId)->fname;
	}

	public function setPaymentMethods(\Model\Payment\Collection $paymentMethods)
	{
		$this->paymentMethods = $paymentMethods;
		return $this;
	}
	public function getPaymentMethods()
	{
		if($this->paymentMethods)
		{
			return $this->paymentMethods;
		}
		$paymentMethods = \Mage::getModel('Model\Payment')->fetchAll();
		
		if(!$paymentMethods)
		{
			return false;
		}
		$this->setPaymentMethods($paymentMethods);
		return $this->paymentMethods;
	}
	public function setShippingMethods(\Model\Shipping\Collection $shippingMethods)
	{
		$this->shippingMethods = $shippingMethods;
		return $this;
	}
	public function getShippingMethods()
	{
		if($this->shippingMethods)
		{
			return $this->shippingMethods;
		}
		$shippingMethods = \Mage::getModel('Model\Shipping')->fetchAll();
		if(!$shippingMethods)
		{
			return false;
		}
		$this->setShippingMethods($shippingMethods);
		return $this->shippingMethods;
	}
}
?>
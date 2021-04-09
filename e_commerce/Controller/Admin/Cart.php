<?php 
namespace Controller\Admin;

class Cart extends \Controller\Core\Admin
{
	public function indexAction()
	{
		try {
			$cart = $this->getCart();
			$grid = \Mage::getBlock('Block\Admin\Cart\Grid')->setCart($cart);
			$layout = $this->getLayout();
			$content = $layout->getContent()->addChild($grid);
			$this->renderLayout();
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
	}
	public function addToCartAction()
	{
		try {
			$productId = (int)$this->getRequest()->getGet('productId');
			$product = \Mage::getModel('Model\Product')->load($productId);
			if(!$product)
			{
				throw new \Exception("Product is not valid... :(", 1);
			}
			$cart = $this->getCart();
			
			$cart->addItemToCart($product,1,true);
			$cart->total = $cart->getTotal();
			$cart->save();
			$this->getMessage()->setSuccess("Item added to cart :)");
			$this->redirect('index');

		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		
	}	
	public function getCart($customerId = null)
	{
		$session = \Mage::getModel('Model\Admin\Session');
		if($customerId)
		{
			$session->customerId = $customerId;		
		}
		$cart = \Mage::getModel('Model\Cart');
		$query = "SELECT * FROM `{$cart->getTableName()}` WHERE customerId = '{$session->customerId}'";
		$cart = $cart->fetchRow($query);

		if($cart)
		{
			return $cart;
		}
		$cart = \Mage::getModel('Model\Cart');
		$cart->customerId = $session->customerId;
		date_default_timezone_set("Asia/Calcutta");
		$cart->createdDate = date('Y-m-d H:i:s');
		$cart->save();
		return $cart;

		/*$sessionId = \Mage::getModel('Model\Admin\Session')->getId();
		$cart = \Mage::getModel('Model\Cart');
		$query = "SELECT * FROM `{$cart->getTableName()}` WHERE sessionId = '{$sessionId}'";
		$cart = $cart->fetchRow($query);

		if($cart)
		{
			return $cart;
		}
		$cart = \Mage::getModel('Model\Cart');
		$cart->sessionId = $sessionId;
		date_default_timezone_set("Asia/Calcutta");
		$cart->createdDate = date('Y-m-d H:i:s');
		$cart->save();
		return $cart;
*/
	}
	public function updateAction()
	{
		$cart = $this->getCart();
		$quantities = $this->getRequest()->getPost('quantity');
		$prices = $this->getRequest()->getPost('price');
		/*echo "<pre>";
		print_r($prices);die;*/
		foreach ($quantities as $cartItemId => $quantity) {
			$cartItem = \Mage::getModel('Model\Cart\Item')->load($cartItemId);
			if(!$cartItem)
			{
				throw new \Exception("Product Not Available", 1);

				
			}
			if($quantity == 0)
			{
				$cartItem->delete();
				continue;
			}
			$cartItem->quantity = $quantity;
			$cartItem->save();
		}
		foreach ($prices as $cartItemId => $price) {
			$cartItem = \Mage::getModel('Model\Cart\Item')->load($cartItemId);
			if(!$cartItem)
			{
				throw new \Exception("Product Not Available", 1);
				
			}
			$cartItem->price = $price;
			$cartItem->save();
		}
		$cart->total = $cart->getTotal();
		$cart->save();
		$this->getMessage()->setSuccess("Cart updated successfully..:)");
		$this->redirect('index');
	}

	public function deleteAction()
	{

		$cartItemId = $this->getRequest()->getGet('cartItemId');
		$cartItem = \Mage::getModel('Model\Cart\Item')->load($cartItemId);
		if(!$cartItem)
		{
			throw new Exception("Requested Item is not Available", 1);
		}
		if(!$cartItem->delete())
		{
			throw new Exception("Error Processing Request", 1);
			
		}
		$cart = $this->getCart();
		$cart->total = $cart->getTotal();
		$cart->save();
		$this->getMessage()->setFailure('Item deleted successfully');
		$this->redirect('index');
	}
	public function selectCustomerAction()
	{
		$customerId = $this->getRequest()->getPost('customer');
		$cart = $this->getCart($customerId);
		$this->redirect('index',null,null,true);
	}
	public function checkoutAction()
	{
		try {
			$cart = $this->getCart();
			$grid = \Mage::getBlock('Block\Admin\Cart\Checkout')->setCart($cart);
			$layout = $this->getLayout();
			$content = $layout->getContent()->addChild($grid);
			$this->renderLayout();
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}	
	}
	public function saveBillingAction()
	{
		try {
			$billing = $this->getRequest()->getPost('billing');
			$cartAddress = $this->getCart()->getBillingAddress(); 
			$cartAddress->setData($billing);
			$cartAddress->save();
			if($addressBook = $this->getRequest()->getPost('billingCheckbox'))
			{
				$customerBillingAddress = $this->getCart()->getCustomer()->getBillingAddress();
				$cartBillingAddress = $this->getRequest()->getPost('billing');
				$customerBillingAddress->setData($cartBillingAddress);
				$customerBillingAddress->save();
			}	
			$this->getMessage()->setSuccess('Billing Address Updated successfully :)');
			$this->redirect('checkout');
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
	}
	public function saveShippingAction()
	{
		try {
			echo "<pre>";
			$cartAddress = \Mage::getModel('Model\Cart\Address');
			if($sameAsBilling = $this->getRequest()->getPost('checkbox'))
			{
				$cartBillingAddress = $this->getCart()->getBillingAddress();
				$cartShippingAddress = $this->getCart()->getShippingAddress();
				$cartAddressId = $cartShippingAddress->cartAddressId;
				$addressId = $cartShippingAddress->addressId;
				$cartShippingAddress->setData($cartBillingAddress->getData());
				$cartShippingAddress->cartAddressId = $cartAddressId;
				$cartShippingAddress->addressId = $addressId;
				$cartShippingAddress->addressType = 'Shipping';
				$cartShippingAddress->sameAsBilling = '1';
				$cartShippingAddress->save();
			} else {
				$shipping = $this->getRequest()->getPost('shipping');
				$cartAddress = $this->getCart()->getShippingAddress();
				$cartAddress->setData($shipping);
				$cartAddress->sameAsBilling = '0';
				$cartAddress->save();		
			}
			if($addressBook = $this->getRequest()->getPost('shippingCheckbox'))
			{
				$customerShippingAddress = $this->getCart()->getCustomer()->getShippingAddress();
				$cartShippingAddress = $this->getRequest()->getPost('shipping');
				$customerShippingAddress->setData($cartShippingAddress);
				$customerShippingAddress->save();
			}
			$this->getMessage()->setSuccess('Shipping Address Updated successfully :)');
			$this->redirect('checkout');
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
	}
	public function savePaymentMethodAction()
	{
		try {
		//	echo "<pre>";
			$paymentMethodId = $this->getRequest()->getPost('paymentMethod');
			$paymentModel = \Mage::getModel('Model\Payment');
			$cart = $this->getCart();
		//	print_r($paymentMethodId); die();
			$paymentModel->load($paymentMethodId);
			$cart->paymentMethod = $paymentModel->name;
			$cart->paymentMethodId = $paymentModel->paymentId;
			$cart->save();	
			$this->getMessage()->setSuccess('PaymentMethod added to cart  :)');
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$this->redirect('checkout');
		
	}
	public function saveShippingMethodAction()
	{
		try {
			$shippingMethodId = $this->getRequest()->getPost('shippingMethod');
			$shippingModel = \Mage::getModel('Model\Shipping');
			$cart = $this->getCart();
			$shippingModel->load($shippingMethodId);
			$cart->shippingMethod = $shippingModel->name;
			$cart->shippingMethodId = $shippingModel->shippingId;
			$cart->shippingAmount = $shippingModel->amount;
			// echo "<pre>"; print_r($cart);die();
			$cart->save();	
			$this->getMessage()->setSuccess('ShippingMethod added to cart  :)');
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$this->redirect('checkout');
		
	}
}
 ?>
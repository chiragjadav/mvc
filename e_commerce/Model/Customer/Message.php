<?php 
namespace Model\Customer;
\Mage::loadFileByClassName('Model\Customer\Session');

class Message extends Session
{	
	public function __construct()
	{
		parent::__construct();
		$this->setNameSpace('Customer');
	}
	public function setSuccess($message)
	{
		$this->success = $message;
		return $this;
	}
	public function getSuccess()
	{
		return $this->success;
	}
	public function setFailure($message)
	{
		$this->failure = $message;
	}
	public function getFailure()
	{
		return $this->failure;
	}
	public function unset($key)
	{
		unset($_SESSION[$this->getNameSpace()][$key]);
	}
}
?>
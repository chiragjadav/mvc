<?php 
namespace Model\Admin;
\Mage::loadFileByClassName('Model\Admin\Session');

class Message extends Session
{	
	public function __construct()
	{
		parent::__construct();
		$this->setNameSpace('Admin');
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
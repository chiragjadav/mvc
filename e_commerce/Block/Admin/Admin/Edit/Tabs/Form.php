<?php
namespace Block\Admin\Admin\Edit\Tabs;
\Mage::loadFileByClassName('Block\Admin\Admin\Edit');

class Form extends \Block\Admin\Admin\Edit
{
	protected $admin = null;
	function __construct()
	{
		$this->setTemplate('View/Admin/admin/edit/tabs/form.php');		
	}

/*	public function setAdmin($admin = null) 
	{
		if($admin)
		{
			$this->admin = $admin;
		}
		$admin =  \Mage::getModel('Model\Admin');
		if($id = $this->getRequest()->getGet('adminId')) 
		{
			$admin = $admin->load($id);
		}
		$this->admin = $admin;
		return $t();
		}
		return $this->admin;his;
	}
	public function getAdmin() 
	{
		if(!$this->admin) 
		{
			$this->setAdmin
	}*/
}

?>
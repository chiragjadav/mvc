<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Brand extends \Controller\Core\Admin 
{
	public function gridAction() {
		try{	
			// $brands = \Mage::getModel('Model\Brand')->fetchAll();

			$grid = \Mage::getBlock('Block\Admin\Brand\Grid')->toHtml();
			$this->responseGrid($grid);
		}catch(Exception $e) {
			echo $e->getMessage();
		}
	}

	public function saveAction()
	{
		try {
				$brand = \Mage::getModel('Model\Brand');
				if($brandData = $this->getRequest()->getPost('brand'))
				{
					foreach ($brandData as $key => $value) {
						$brand = $brand->load($key);
						$brand->feature = 0;
						$brand->save();
						if(array_key_exists('feature', $value))
						{
							// echo "1";
							$brand->feature = 1 ;
						}
						$brand->name = $value['name'];
						$brand->save();
					}
					// print_r($brand);
					$this->getMessage()->setSuccess('Record Updated Successfully..!! :)');
					$this->gridAction();
				} 
				else{
					$name = $_FILES['imageFile']['name'];

					if($name == null)
					{
						$this->redirect('grid',null,null,true);			
					}
					$tmp_name = $_FILES['imageFile']['tmp_name'];
 					$url = 'C:\xampp\htdocs\e_commerce\View\Admin\Brand\uploads/'.$name;
					move_uploaded_file($tmp_name, $url);
					$imagename = [
						'imageName' => $name
					];
					$brand->setData($imagename);
					$brand->save();
					$this->getMessage()->setSuccess('Record Inserted Successfully..!! :)');
				}
				$this->gridAction();
				
		} catch (Exception $e) {
			$session->setFailure($e->getMessage());
		}
	}
	public function deleteAction(){
		try {

				$brand = \Mage::getModel('Model\brand');
				$brandDataremove = $this->getRequest()->getPost('brandremove');
				foreach ($brandDataremove as  $value) {
					$brand->load($value);
					$brand->delete();						
				}
				$this->getMessage()->setFailure("Request Deleted Successfully..!! :)");
				$this->gridAction();			
		} catch (Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
				// $this->redirect('grid',null,null,true);
		}
	} 	  	

}
?>
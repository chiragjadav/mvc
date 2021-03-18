<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Product extends \Controller\Core\Admin {

	public function gridAction() {
		try{	
			$grid = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
			$this->responseGrid($grid);
		}catch(Exception $e) {
			echo $e->getMessage();
		}
	}	  	

	public function formAction() {
		try{
			$product = \Mage::getModel('Model\Product');

			if($id = $this->getRequest()->getGet('productId'))
			{
				$product = $product->load($id);
				if(!$product)
				{
					throw new Exception("Record not found", 1);
					
				}
			}
			$form = \Mage::getBlock('Block\Admin\Product\Edit')->setTableRow($product)->toHtml();
			//$leftSide = \Mage::getBlock('Block\Admin\Product\Edit\Tabs')->toHtml();
			$this->responseGrid($form);
	
		}catch(Exception $e) {	
			echo $e->getMessage();
		}
	}
	public function saveAction() {
		try{
			$session = \Mage::getModel('Model\Admin\Message');
			$product = \Mage::getModel('Model\Product');
			if(!$this->getRequest()->isPost()) {
				throw new Exception("Invalid Request..!!  :(", 1);	
			}
			date_default_timezone_set("Asia/Calcutta");
			
			if($productId = $this->getRequest()->getGet('productId')){

				$product->load($productId);
				if(!$product) {
					throw new Exception("Record Not Found..!!  :(", 1);	
				}
				$session->setSuccess('Record Updated Successfully..!! :)');
				$product->updatedDate = Date("Y-m-d H:i:s");
				
			} else {
				$product->createdDate = Date("Y-m-d H:i:s");
				$product->updatedDate = Date("Y-m-d H:i:s");
				$session->setSuccess('Record Inserted Successfully..!! :)');
			}
			$productData = $this->getRequest()->getPost("product");
			$product->setData($productData);
			$product->save();
			
		}catch(Exception $e) {
			$session->setFailure($e->getMessage());
		}
		$this->gridAction();
	}

	public function deleteAction() {
		try{
			$session = \Mage::getModel('Model\Admin\Message');
			$product = \Mage::getModel('Model\Product');
			$productId = (int) $this->getRequest()->getGet('productId');
			 if (!$productId) {
                throw new Exception("Invalid Request..!! :(");
            }	

			$product->load($productId);	

			if(!$product->delete()){
				throw new Exception("Record Not Found..!! :(");	
			}
			$session->setFailure("Request Deleted Successfully..!! :)");
		} catch(Exception $e) {
			$session->setFailure($e->getMessage());
		}
		$this->gridAction();
	}

	public function saveMediaAction()
	{
		try {
			$session = \Mage::getModel('Model\Admin\Message');
			$tab = $this->getRequest()->getGet('tab');
			
				if($tab == 'media')
				{
					$img = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\Media');
					if($imageData = $this->getRequest()->getPost('image'))
					{
						$images = $img->getImages();
						foreach ($images->getData() as $key => $value) {
							$img->getImage()->load($value->imageId);
					
							$img->getImage()->small = 0;
							$img->getImage()->base = 0;
							$img->getImage()->thumb = 0;
							$img->getImage()->gallery = 0;
							$img->getImage()->save();
						}
						foreach ($imageData as $key => $data) {
							if($key!='data'){
								continue;	
							}
							foreach ($data as $key1 => $value) {
								$img->getImage()->load($key1);
								foreach ($value as $key2 => &$value2) {
									if($key2 != 'gallery')
									{
										continue;
									}
									$value2 = 1;
								}
								$img->getImage()->setData($value);
								$img->getImage()->save();
							}
						}
						foreach ($imageData as $key => $value) {
							
							if($key == 'small'){
								$img->getImage()->load($value);
								$img->getImage()->small = 1;
								$img->getImage()->save();
							}
							if($key == 'thumb'){
								$img->getImage()->load($value);
								$img->getImage()->thumb = 1;
								$img->getImage()->save();
							}
							if($key == 'base'){
								$img->getImage()->load($value);
								$img->getImage()->base = 1;
								$img->getImage()->save();
							}
						}
						$productId = $this->getRequest()->getGet('productId');
						$img->productId = $productId;
						$this->redirect('form',null,$productId,false);	
					} else {
						$name = $_FILES['productFile']['name'];
						if($name == null)
						{
							$this->redirect('form',null,null,true);			
						}
						$tmp_name = $_FILES['productFile']['tmp_name'];
	 					$url = 'C:\xampp\htdocs\e_commerce\View\Admin\Product\edit\tabs\uploads/'.$name;
						move_uploaded_file($tmp_name, $url);
						$imagename = [
							'name' => $name
						];
						echo "<pre>";
						$productId = $this->getRequest()->getGet('productId');
						$img->getImage()->productId = $productId;
						$img->getImage()->setData($imagename);
						
						$img->getImage()->save();
						$session->setSuccess('Record Inserted Successfully..!! :)');
					}
					$form = \Mage::getBlock('Block\Admin\Product\Edit')->toHtml();
					$leftSide = \Mage::getBlock('Block\Admin\Product\Edit\Tabs')->toHtml();
					$this->responseGrid($form,$leftSide);
				}
		} catch (Exception $e) {
			$session->setFailure($e->getMessage());
		}
	}
	public function deleteMediaAction(){
		try {
			$session = \Mage::getModel('Model\Admin\Message');

			$tab = $this->getRequest()->getGet('tab');
		
			if($tab == 'media')
			{
				$img = \Mage::getModel('Model\ProductImage');
				$imgDataremove = $this->getRequest()->getPost('imageremove');
					foreach ($imgDataremove as  $value) {
						$img->load($value);
						$img->delete();						
					}
				$session->setFailure("Request Deleted Successfully..!! :)");
				$productId = $this->getRequest()->getGet('productId');
				$img->productId = $productId;
				// $this->redirect('form',null,$productId,false);
				// $this->gridAction();
				$form = \Mage::getBlock('Block\Admin\Product\Edit')->toHtml();
				$leftSide = \Mage::getBlock('Block\Admin\Product\Edit\Tabs')->toHtml();
				$this->responseGrid($form,$leftSide);
			}
		} catch (Exception $e) {
			$session->setFailure($e->getMessage());
				// $this->redirect('grid',null,null,true);
		}
	} 
}
?>
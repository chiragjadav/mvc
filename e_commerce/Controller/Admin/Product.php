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
				$this->getMessage()->setSuccess('Record Updated Successfully..!! :)');
				$product->updatedDate = Date("Y-m-d H:i:s");
				
			} else {
				$product->createdDate = Date("Y-m-d H:i:s");
				$product->updatedDate = Date("Y-m-d H:i:s");
				$this->getMessage()->setSuccess('Record Inserted Successfully..!! :)');
			}
			$productData = $this->getRequest()->getPost("product");
			$product->setData($productData);
			$product->save();
			
		}catch(Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$this->gridAction();
	}

	public function deleteAction() {
		try{
			
			$product = \Mage::getModel('Model\Product');
			$productId = (int) $this->getRequest()->getGet('productId');
			 if (!$productId) {
                throw new Exception("Invalid Request..!! :(");
            }	

			$product->load($productId);	

			if(!$product->delete()){
				throw new Exception("Record Not Found..!! :(");	
			}
			$this->getMessage()->setFailure("Request Deleted Successfully..!! :)");
		} catch(Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$this->gridAction();
	}

	public function saveMediaAction()
	{
		try {
			
			$tab = $this->getRequest()->getGet('tab');
			
				if($tab == 'media')
				{
					$productImage = \Mage::getModel('Model\ProductImage');
					if($imageData = $this->getRequest()->getPost('image'))
					{
						$images = $productImage->fetchAll();
						if(!$images)
						{
							throw new Exception("No Record", 1);
							
						}
						foreach ($images->getData() as $key => $value) {
							$productImage->load($value->imageId);
							$productImage->small = 0;
							$productImage->base = 0;
							$productImage->thumb = 0;
							$productImage->gallery = 0;
							$productImage->save();
						}
						foreach ($imageData as $key => $data) {
							if($key!='data'){
								continue;	
							}
							foreach ($data as $key1 => $value) {
								$productImage->load($key1);
								foreach ($value as $key2 => &$value2) {
									if($key2 != 'gallery')
									{
										continue;
									}
									$value2 = 1;
								}
								$productImage->setData($value);
								$productImage->save();
							}
						}
						foreach ($imageData as $key => $value) {
							
							if($key == 'small'){
								$productImage->load($value);
								$productImage->small = 1;
								$productImage->save();
							}
							if($key == 'thumb'){
								$productImage->load($value);
								$productImage->thumb = 1;
								$productImage->save();
							}
							if($key == 'base'){
								$productImage->load($value);
								$productImage->base = 1;
								$productImage->save();
							}
						}
						$productId = $this->getRequest()->getGet('productId');
						$productImage->productId = $productId;
						//$this->redirect('form',null,$productId,false);	
					} else {
						$name = $_FILES['imageFile']['name'];
						if($name == null)
						{
							$this->redirect('form',null,null,true);			
						}
						$tmp_name = $_FILES['imageFile']['tmp_name'];
	 					$url = 'C:\xampp\htdocs\e_commerce\View\Admin\Product\edit\tabs\uploads/'.$name;
						move_uploaded_file($tmp_name, $url);
						$imagename = [
							'name' => $name
						];
						
						
						$productId = (int) $this->getRequest()->getGet('productId');
						 if (!$productId) {
			                throw new Exception("Invalid Request..!! :(");
			            }
						$productImage->productId = $productId;
						$productImage = $productImage->setData($imagename);
						
						$productImage->save();
						$this->getMessage()->setSuccess('Record Inserted Successfully..!! :)');
					}
					$form = \Mage::getBlock('Block\Admin\Product\Edit')->setTableRow($productImage)->toHtml();
					// $leftSide = \Mage::getBlock('Block\Admin\Product\Edit\Tabs')->toHtml();
					$this->responseGrid($form);
				}
		} catch (Exception $e) {
			$session->setFailure($e->getMessage());
		}
	}
	public function deleteMediaAction(){
		try {

			$tab = $this->getRequest()->getGet('tab');
		
			if($tab == 'media')
			{
				$img = \Mage::getModel('Model\ProductImage');
				$imgDataremove = $this->getRequest()->getPost('imageremove');
					foreach ($imgDataremove as  $value) {
						$img->load($value);
						$img->delete();						
					}
				$this->getMessage()->setFailure("Request Deleted Successfully..!! :)");
				$productId = $this->getRequest()->getGet('productId');
				$img->productId = $productId;
				// $this->redirect('form',null,$productId,false);
				// $this->gridAction();
				$form = \Mage::getBlock('Block\Admin\Product\Edit')->setTableRow($img)->toHtml();
				
				$this->responseGrid($form);
			}
		} catch (Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
				// $this->redirect('grid',null,null,true);
		}
	} 
}
?>
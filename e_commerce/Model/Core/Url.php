<?php 
namespace Model\Core;
 class Url
 {
 	protected $request = null;
 	function __construct()
 	{
 		$this->setRequest();
 	}

 	public function setRequest()
 	{
 		// Mage::loadFileByClassName('Model_Core_Request');
 		$this->request = \Mage::getModel('Model\Core\Request');
 	}

 	public function getRequest()
 	{
 		if(!$this->request)
 		{
 			$this->setRequest();
 		}
 		return $this->request;
 	}

 	public function getUrl($actionName = null, $controllerName = null, $param=null, $resetParams = false){
        $final = $this->getRequest()->getGet();
        if($resetParams) {
            $final = [];
        }
        if($actionName == null){
            $actionName = $_GET['a'];
        }
        if($controllerName == null){
            $controllerName = $_GET['c'];
        }
        $final['c'] = $controllerName;
        $final['a'] = $actionName;

        if(is_array($param)) {
            $final = array_merge($final,$param);    
        }   
        $queryString = http_build_query($final);
        unset($final);
        return "http://localhost/e_commerce/index.php?{$queryString}";
    }
    /*public function redirect($actionName = null, $controllerName = null, $param=null, $resetParams = false){
        $url = $this->getUrl($actionName, $controllerName,$param, $resetParams);
        header("location: {$url}");
        exit(0);
    }*/

    public function baseUrl($subUrl = null)
    {
        $url = "http://localhost/e_commerce/";
        if($subUrl)
        {
            $url.=$subUrl;
        }
        return $url;
    }
 } 

 ?>
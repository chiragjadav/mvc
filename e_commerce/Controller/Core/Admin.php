<?php
namespace Controller\Core;

\Mage::loadFileByClassName('Block\Core\Layout');
class Admin {
    protected $request = null;
    protected $layout = null;
    public function __construct()
    {
        $this->setRequest();
    }
    public function setRequest()
    {
        $this->request = \Mage::getModel('Model\Core\Request');
        return $this;
    }
    public function getRequest()
    {
        return $this->request;
    }
    public function setLayout()
    {
        $this->layout = new \Block\Core\Layout($this);
        //$this->layout = Mage::getBlock('Block_Core_Layout');
        return $this;
    }
    public function getLayout()
    {
        if(!$this->layout)
        {
            $this->setLayout();
        }
        return $this->layout;
    }
    public function renderLayout()
    {
        echo $this->getLayout()->toHtml();
    }
    public function getUrl($actionName = null, $controllerName = null, $param=null, $resetParams = false){
        $final = $_GET;
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
    public function redirect($actionName = null, $controllerName = null, $param=null, $resetParams = false){
        $url = $this->getUrl($actionName, $controllerName,$param, $resetParams);
        header("location: {$url}");
        exit(0);
    }

    public function responseGrid($grid = '',$leftside = '' )
    {
        $response = [
                'status' => 'Success',
                'message' => 'u are excellent',
                'element' => [
                    [
                        'selector' => '#gridHtml',
                        'html' => $grid
                    ],
                    /*[
                        'selector' => '#messageHtml',
                        'html' => Mage::getModel('Model_Admin_Message')->toHtml();  
                    ],*/
                    [
                        'selector' => '#left',
                        'html' => $leftside 
                    ]
                ]
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
    }
}


?>
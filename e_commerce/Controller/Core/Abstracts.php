<?php 
namespace Controller\Core;

\Mage::loadFileByClassName('Block\Core\Layout');

class Abstracts 
{
	protected $request = null;
    protected $layout = null;
    protected $message = null;
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
    public function setLayout(\Block\Core\Layout $layout = null)
    {
        if (!$layout) {
            $layout = new \Block\Core\Layout();
        }
        $this->layout = $layout;
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
 /*   public function setMessage()
    {
        $this->message = \Mage::getModel('Model\Admin\Message');
        return $this;
    }
*/
    public function getMessage()
    {
        if(!$this->message) {
            $this->setMessage();
        }
        return $this->message;
    }
    public function responseGrid($grid = '' )
    {
        $response = [
               
                'element' => [
                    [
                        'selector' => '#gridHtml',
                        'html' => $grid
                    ],
                    [
                        'selector' => '#messageHtml',
                        'html' => \Mage::getBlock('Block\Core\Layout\Message')->toHtml()
                    ]
                ]
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
    }
	
}

 ?>
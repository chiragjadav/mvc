<?php
namespace Block\Core;
class Template
{
	protected $template = Null;
	protected $controller = Null;
	protected $children = [];
    protected $request = null;
    protected $url = null;
    protected $tabs = [];
	public function setTemplate($template) 
	{
		$this->template = $template;

		return $this;
	}
	public function getTemplate() 
	{
		return $this->template;
	}
	public function toHtml() 
	{
        ob_start();
		require $this->getTemplate();
        $content = ob_get_contents();
        ob_end_clean();
        return $content;

	}
	public function setController(\Controller\Core\Admin $controller) 
	{
		$this->controller = $controller;
		return $this;
	}
	public function getController() 
	{
		return $this->controller;
	}
    public function setRequest()
    {
        $this->request = \Mage::getModel('Model\Core\Request');
        return $this;
    }
    public function getRequest()
    {
        if(!$this->request)
        {
            $this->setRequest();
        }
        return $this->request;
    }
    public function setModelUrl()
    {
        $this->url = \Mage::getModel('Model\Core\Url');
        return $this;
    }
    public function getModelUrl()
    {
        if(!$this->url)
        {
            $this->setModelUrl();
        }
       return $this->url;
    }
    public function getUrl($actionName = null, $controllerName = null, $param=[], $resetParams = false)
     {
  		return $this->getModelUrl()->getUrl($actionName, $controllerName, $param,$resetParams);
    }
    public function setChildren(array $children = [])
    {
    	$this->children = $children;
    	return $this;
    }
    public function getChildren()
    {
    	return $this->children;
    }
    public function addChild(\Block\Core\Template $child, $key = Null)
    {
    	if(!$key)
    	{
    		$key = get_class($child);
    	}
    	$this->children[$key] = $child;
    	return $this;
    }
    public function getChild($key)
    {
    	if(!array_key_exists($key, $this->children))
    	{
    		return null;
    	}
    	return $this->children[$key];
    }
    public function removeChild($key)
    {
    	if(array_key_exists($key, $this->children))
    	{
    		unset($this->children[$key]);
    	}
    	return $this;
    }
    public function baseUrl($subUrl = null)
    {
        return $this->getModelUrl()->baseUrl($subUrl);
    }

    public function setDefaultTab($defaultTab)
    {
        $this->defaultTab = $defaultTab;

        return $this;
    }

    public function getDefaultTab()
    {
        return $this->defaultTab;
    }

    public function setTabs(array $tabs = [])
    {
        $this->tabs = $tabs;
        return $this;
    }

    public function getTabs()
    {
        return $this->tabs;
    }

    public function addTabs($key, $tab = [])
    {
        $this->tabs[$key] = $tab;
        return $this;
    }
}
?>
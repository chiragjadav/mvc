<?php
namespace Model\Core;
class Table {
	protected $primaryKey = null;
	protected $tableName = null;
	protected $adapter = null;
	protected $data = [];

	public function setPrimaryKey($primaryKey) {
		$this->primaryKey = $primaryKey;
		return $this;
	}
	public function setTableName($tableName) {
		$this->tableName = $tableName;
		return $this;
	}
	public function getPrimaryKey() {
		if(!$this->primaryKey){
			$this->setPrimaryKey();
		}
		return $this->primaryKey;
	}
	public function getTableName() {

		return $this->tableName;
	}
	public function setData(array $data) {
		$this->data = array_merge($this->data,$data);
		return $this;
	}
	public function getData() {
		return $this->data;
	}
	public function __set($key,$value) {
		$this->data[$key] = $value;
	}
	public function __get($key) {
		if(!array_key_exists($key, $this->data)) {
			return null;
		}
		return $this->data[$key];
	}
	public function setAdapter() {
		$this->adapter = \Mage::getModel('Model\Core\Adapter');
		return $this;
	}
	public function getAdapter() {
		if(!$this->adapter){
            $this->setAdapter();
        }
		return $this->adapter;
	}
	public function save($query=null) {

		
				
		if(!array_key_exists($this->getPrimaryKey(), $this->getData())){
			
			
            $query = "INSERT INTO {$this->getTableName()} (`{$this->getPrimaryKey()}`, `".implode("`, `",array_keys($this->getData()))."`) VALUES ('', '".implode("', '",$this->getData())."')";
         
            return $this->getAdapter()->insert($query);
        }
        $strData = null;
        foreach ($this->getData() as $key => $value) {
            if($key != $this->getPrimaryKey()){
                $strData .= "`{$key}` = '{$value}', ";
            }
        }
        $id = $this->getData()[$this->getPrimaryKey()];
        $strData = substr_replace($strData, "", -2);
        $query = "UPDATE `{$this->getTableName()}` SET {$strData} WHERE `{$this->getPrimaryKey()}` = '{$id}'";
   
        return $this->getAdapter()->update($query);
	}
	public function delete() {

		if(!array_key_exists($this->getPrimaryKey(),$this->getData())){
			return false;
		}
		$id = $this->getData()[$this->getPrimaryKey()];
	    $query = "DELETE FROM {$this->getTableName()} WHERE {$this->getPrimaryKey()}={$id}";
	
		return $this->getAdapter()->delete($query);

	}
	public function load($id) {
		$id = (int)$id;
		
	    $query = "SELECT * FROM {$this->getTableName()} WHERE {$this->getPrimaryKey()}={$id}";
		
		return $this->fetchRow($query);
	}
	public function fetchRow($query) {
		$row = $this->getAdapter()->fetchRow($query);
		if(!$row) {
			return false;
		}
		$this->setData($row);
		return $this;
	}
	public function fetchAll($query = null) {

		if(!$query)
		{
		$query = "SELECT * FROM {$this->getTableName()}";
		}
		$rows = $this->getAdapter()->fetchAll($query);
		if(!$rows) {
			return false;
		}
		foreach ($rows as $key => &$value) {
			$row = new $this;
			$value = $row->setData($value);
		}

	
		$this->setData($rows);
	
		$collectionClassName = get_class($this).'\Collection';
		$collection = \Mage::getModel($collectionClassName);
		
		$collection->setData($rows);

		
		return $collection;
	}
	public function fetchParis($query)
	{
		$row = $this->getAdapter()->fetchParis($query);
		if(!$row)
		{
			return false;
		}
		return $row;
	}
}


?>
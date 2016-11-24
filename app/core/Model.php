<?php

class Model extends Table
{
	protected $tableName;

	public function find($where = [], $limit = [], $order = [])
	{
		if(empty($where)) {
			return $this->getAll($this->tableName);
		} else {
			return $this->get($this->tableName, $where, $limit = [], $order = []);
		}
	}
	
	public function save($data, $where = [])
	{
		if(empty($where)) {
			return $this->insert($this->tableName, $data);
		} else {
			return $this->update($this->tableName, $data, $where);
		}
	}
	
	public function deleteRecord($where)
	{
		return $this->delete($this->tableName, $where);
	}
}
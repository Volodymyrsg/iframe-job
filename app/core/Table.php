<?php

class Table
{
	protected $db;

	public function __construct()
	{
		$driverName = Config::get('database/driver') . 'Driver';
		$this->db = new $driverName();
	}

	public function get($table, $where, $limit = [], $order = [])
	{
		$result = [];
		if($this->action("SELECT *", $table, $where, $limit, $order)){
			$result = $this->db->getResults();
		}
		return $result;
	}

	public function getAll($table)
	{
		$result = [];
		$sql = "SELECT * FROM $table";
		if($this->db->executeQuery($sql)){
			$result = $this->db->getResults();
		}
		return $result;
	}

	public function delete($table, $where)
	{
		return $this->action("DELETE", $table, $where);
	}

	public function insert($table, $data)
	{	
		if(empty($data)) {
			return false;	
		}	
		$value = '';
		
		foreach($data as $val)
		{
			$value .= '?, ';
		}
		$sql = "INSERT INTO $table (" . implode(', ', array_keys($data)) . ") VALUES (" . rtrim($value, ', ') . ")";

		return $this->db->executeQuery($sql, $data);
	}

	public function update($table, $data, $where)
	{
		if(empty($data) || empty($where)) {
			return false;	
		}
		$condition = $this->conditions($where);	
		list($conditions, $values) = $condition;
	
		$set = '';
		foreach($data as $key => $val)
		{
			$set .= $key . '= ?, ';
		}
		
		$data = array_merge($data, $values);
		$sql = "UPDATE $table SET " . rtrim($set, ', ') . " WHERE " . "$conditions";
		return $this->db->executeQuery($sql, $data);
	}

	private function action($action, $table, $where, $limit = [], $order = [])
	{
		$condition = $this->conditions($where);
		$limitStr = '';
		$orderStr = '';		
		list($conditions, $values) = $condition;
		
		if(in_array(count($limit), [1, 2])){
			$limitStr = 'LIMIT ' . implode(', ', $limit);
		}

		if(!empty($order)){
			$orderStr = 'ORDER BY ' . implode(', ', $order);
		}
		$sql = "$action FROM $table WHERE $conditions $orderStr $limitStr";
		return $this->db->executeQuery($sql, $values);
	}

	private function conditions($where)
	{
		if(empty($where)) {
			return [$conditions = '', $values = []];
		}
		$operations = ['=', '>', '<', '>=', '<='];
		$conditions = [];
		$values = [];
		
		foreach ($where as $key => $value){
			if(count($value) !== 2){
				return false;
			}
			if(in_array($value[0], $operations)){
				$conditions[] = $key . $value[0] . "?";
				$values[] = $value[1];
			}
		}
		$conditions = implode(' AND ', $conditions);
		
		return [$conditions, $values];
	}
	
	public function getFirstResult()
	{
		return $this->db->getFirstResult();
	}
}
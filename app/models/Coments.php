<?php

class Coments extends Model
{
	protected $tableName = 'coments';
	private $users = [
		'Anton',
		'Yaro',
		'Max',
		'Igor'
	];
	
	public function findComents($url)
	{
		if($url && $this->getCookie()) {
			return $this->find(['user_name' => ['=', $this->getCookie()], 'url' => ['=', url]]);
		}
		return $this->find();
	}
	
	public function isUserComents($id)
	{
		if($this->getCookie()) {
			return $this->find(['user_name' => ['=', $this->getCookie()], 'id' => ['=', $id]]);
		}
		return false;
	}
	
	public function deleteComents($id)
	{		
		if($this->getCookie()) {
			return $this->deleteRecord(['user_name' => ['=', $this->getCookie()], 'id' => ['=', $id]]);
		}
		return false;
	}

	public function saveComents($url, $text)
	{
		return $this->save([
				'user_name' => $this->getCookie(),
				'url' => $url,
				'coment' => $text
			]);
	}
	
	public function updateRating($id, $rating)
	{
		$this->save([
			'rating' => $rating + 1
		], 
		['id' => ['=', $id]]);
	}
	
	public function setCookie()
	{
		$name = $this->users[array_rand($this->users)] . time();
		setcookie('user', $name, strtotime("24 hours"), '/');
	}
	
	public function getCookie()
	{
		if(isset($_COOKIE['user']))	{
			return $_COOKIE['user'];
		}
		return false;
	}
}
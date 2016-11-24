<?php

class ComentsController extends Controller
{	
	public $uses = [
		'Coments'
	];
	
	public function actionIndex()
	{
		if(!$this->Coments->getCookie()) {
			$this->Coments->setCookie();
		}
		$this->set('coments', $this->Coments->find(['url' => ['=', $this->params[0]]]));
		$this->set('url', $this->params[0]);
	}
	
	public function actionCreate()
	{
		if(isset($_POST['text'])) {
			if($this->Coments->saveComents($this->params[0], $_POST['text'])) {
				$this->ReturnComents();
				return;
			}
			echo 'error';
		}
	}

	public function actionDelete()
	{
		if(isset($_POST['id'])) {
			if($this->Coments->isUserComents($_POST['id'])) {
				$this->Coments->deleteComents($_POST['id']);
				$this->ReturnComents();
				return;
			}
			echo 'error';
		}
	}
	
	public function actionAdd()
	{
		if(isset($_POST['data'])) {
			$data = explode(',', $_POST['data']);
			
			if(!$this->Coments->isUserComents($data[1])) {
				$this->Coments->updateRating($data[1], $data[0]);
				$this->ReturnComents();
				return;
			}
			echo 'error';
		}
	}
	
	private function ReturnComents()
	{
		$this->set('coments', $this->Coments->find(['url' => ['=', $this->params[0]]]));
		$this->set('url', $this->params[0]);
		$this->display('coments');
	}

	public function actionError($error = '404')
	{

	}
}
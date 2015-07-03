<?php

App::uses('AppController', 'Controller');

class TaskController extends AppController{

	public function index () {

		// セッション取得
		$account_id = CakeSession::read('user_id');
		$account_name = CakeSession::read('user_name');

		// モデルロード
		$this->loadModel('project_tbs');
		$this->loadModel('label_tbs');
		$this->loadModel('task_tbs');

		// サイドエリアーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
		// ログインしているアカウント名の表示
		$this->set('account_name', $account_name);

		// プロジェクト一覧取得
		$where = array(
			'conditions' => array(
				'account_id' => $account_id
			)
		);
		$res = $this->project_tbs->find('all', $where);
		$this->set('projects', $res);

		// ラベル一覧取得
		$where = array(
			'conditions' => array(
				'account_id' => $account_id
			)
		);
		$res = $this->label_tbs->find('all', $where);
		$this->set('labels', $res);

		// メインエリアーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
		// タスク一覧取得
		$where = array(
			'conditions' => array(
				'account_id' => $account_id
			)
		);
		$res = $this->task_tbs->find('all', $where);
		$this->set('tasks', $res);

	}

}

 ?>

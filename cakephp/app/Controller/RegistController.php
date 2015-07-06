<?php

App::uses('AppController', 'Controller');

class RegistController extends AppController{

	// ページ描画系ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

	public function task() {
		// セッション取得
		$account_id = CakeSession::read('user_id');
		$account_name = CakeSession::read('user_name');
		$account_pass = CakeSession::read('user_pass');

		if (isset($account_id) && isset($account_pass) && isset($account_name)) {

		} else {
			$this->redirect('/login');
		}


		// プロジェクト一覧取得
		$this->loadModel('project_tbs');
		$where = array(
			'conditions' => array(
				'account_id' => $account_id
			)
		);
		$res = $this->project_tbs->find('all', $where);
		$this->set('projects', $res);

		// ラベル一覧取得
		$this->loadModel('label_tbs');
		$where = array(
			'conditions' => array(
				'account_id' => $account_id
			)
		);
		$res = $this->label_tbs->find('all', $where);
		$this->set('labels', $res);

	}

	public function project() {
		// セッション取得
		$account_id = CakeSession::read('user_id');
		$account_name = CakeSession::read('user_name');
		$account_pass = CakeSession::read('user_pass');

		if (isset($account_id) && isset($account_pass) && isset($account_name)) {

		} else {
			$this->redirect('/login');
		}

		// プロジェクト一覧取得
		$this->loadModel('project_tbs');
		$where = array(
			'conditions' => array(
				'account_id' => $account_id
			)
		);
		$res = $this->project_tbs->find('all', $where);
		$this->set('projects', $res);
	}

	public function label() {
		// セッション取得
		$account_id = CakeSession::read('user_id');
		$account_name = CakeSession::read('user_name');
		$account_pass = CakeSession::read('user_pass');

		if (isset($account_id) && isset($account_pass) && isset($account_name)) {

		} else {
			$this->redirect('/login');
		}

		// ラベル一覧取得
		$this->loadModel('label_tbs');
		$where = array(
			'conditions' => array(
				'account_id' => $account_id
			)
		);
		$res = $this->label_tbs->find('all', $where);
		$this->set('labels', $res);
	}

	// 登録系ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

	public function run_regist_task() {
		// POSTデータ＆アカウント取得
		$input_data = $this->request->data;
		$account_id = CakeSession::read('user_id');

		// INSERT
		$this->loadModel('task_tbs');
		$this->task_tbs->set(
			array(
				'name' => $input_data['regist_task_name'],
				'memo' => $input_data['regist_task_memo'],
				'date' => $input_data['regist_task_date'],
				'completed' => 0,
				'project_id' => $input_data['regist_task_project'],
				'label_id' => $input_data['regist_task_label'],
				'account_id' => $account_id,
			)
		);
		$this->task_tbs->save();

		$this->redirect('/task');
	}

	public function run_regist_project() {
		// POSTデータ&アカウント取得
		$input_data = $this->request->data;
		$account_id = CakeSession::read('user_id');
		// INSERT
		$this->loadModel('project_tbs');
		$this->project_tbs->set(
			array(
				'name' => $input_data['regist_project_name'],
				'account_id' => $account_id
			)
		);
		$this->project_tbs->save();

		$this->redirect('/regist/project');
	}

	public function run_regist_label() {
		// POSTデータ&アカウント取得
		$input_data = $this->request->data;
		$account_id = CakeSession::read('user_id');
		// INSERT
		$this->loadModel('label_tbs');
		$this->label_tbs->set(
			array(
				'name' => $input_data['regist_label_name'],
				'account_id' => $account_id
			)
		);
		$this->label_tbs->save();

		$this->redirect('/regist/label');
	}

	// 削除系ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

	public function run_delete_project() {
		// POSTデータ取得
		$input_data = $this->request->data;
		// DLETE
		$this->loadModel('project_tbs');
		$this->project_tbs->deleteAll(
			array(
				'id' => $input_data['delete_project_id']
			)
		);

		$this->redirect('/regist/project');
	}

	public function run_delete_label() {
		// POSTデータ取得
		$input_data = $this->request->data;
		// DLETE
		$this->loadModel('label_tbs');
		$this->label_tbs->deleteAll(
			array(
				'id' => $input_data['delete_label_id']
			)
		);

		$this->redirect('/regist/label');
	}

}

 ?>

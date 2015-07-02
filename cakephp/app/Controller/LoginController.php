<?php

App::uses('AppController', 'Controller');

class LoginController extends AppController{

	public function index() {
		// セッションチェック
		$user_id = CakeSession::read('user_id');
		$user_pass = CakeSession::read('user_pass');

		if (isset($user_id)&&isset($user_pass)) {
			$this->redirect('/task');
		}

		// 処理後メッセージ
		if (isset($this->request->query)) {
			$res = $this->request->query;
			if ($res == null) {

			}elseif ($res['login'] == 'failed') {
				// ログイン失敗時
				$this->set('msg', 'ログインに失敗しました。');
			}elseif ($res['login'] == 'logout') {
				// ログアウト時
				$this->set('msg', 'ログアウトしました。');
			}
		}
	}

	public function run_login() {

		$input_data = $this->request->data;
		$this->loadModel('account_tbs');

		// ログインチェック
		if (isset($input_data['login_btn'])) {

			$where = array(
				'conditions' => array(
					'id' => $input_data['account_id'],
					'pass' => $input_data['account_pass']
				)
			);

			$res = $this->account_tbs->find('count', $where);

			if ($res > 0) {
				// 成功
				// セッション保存
				CakeSession::write('user_id', $input_data['account_id']);
				CakeSession::write('user_pass', $input_data['account_pass']);

				$this->redirect('/task');
			}else {
				// 失敗
				$this->redirect('/login?login=failed');
			}
		}

	}

	public function run_logout() {

		CakeSession::delete('user_id');
		CakeSession::delete('user_pass');

		$this->redirect('/login?login=logout');

	}

}

 ?>

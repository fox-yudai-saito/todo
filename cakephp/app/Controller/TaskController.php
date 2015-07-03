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

		// カレンダー
		// 現在の年月
		$year = date('Y');
		$month = date('n');
		// 現在の年月の月末
		$last_day = date('d', mktime(0, 0, 0, $month + 1, 0, $year));

		$calendar = array();
		$j = 0;

		// for文で月末まで回して$calendarに格納
		for ($i=1; $i <= $last_day; $i++) {
			//曜日取得
			$day_of_week = date('w', mktime(0, 0, 0, $month, $i, $year));

			// 1日の場合1日目の曜日まで空文字を入れる
			if ($i ==1) {
				for ($a=1; $a <= $day_of_week ; $a++) {
					$calendar[$j]['day'] = '';
					$j++;
				}
			}
			$calendar[$j]['day'] = $i;
			$j++;

			// 月末の場合残りの文に空文字をセット
			if ($i == $last_day) {
				for ($b=0; $b <= 6; $b++) {
					$calendar[$j]['day'] = '';
					$j++;
				}
			}
		}

		$this->set('calendar', $calendar);


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

<style>
	div#side_area{
		width: 200px;
		float: left;
		background-color: skyblue;
	}
	div#main_area{
		width: 800px;
		float: left;
	}
</style>


<div id="side_area">
	<div>
		<p><?php echo $account_name; ?></p>
		<form action="/todo/cakephp/login/run_logout" method="POST">
			<input type="submit" name="logout_btn" value="ログアウト">
		</form>
	</div>
	<div>
		<form action="/todo/cakephp/regist/task" method="POST">
			<input type="submit" name="task_btn" value="新規追加">
		</form>
	</div>
	<div>
		<p>プロジェクト</p>
		<form class="" action="/todo/cakephp/regist/project" method="POST">
			<input type="submit" name="project_btn" value="追加">
		</form>
		<ul>
			<?php foreach ($projects as $project): ?>
				<li><?php echo $project['project_tbs']['name']; ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div>
		<p>ラベル</p>
		<form class="" action="/todo/cakephp/regist/label" method="POST">
			<input type="submit" name="label_btn" value="追加">
		</form>
		<ul>
			<?php foreach ($labels as $label): ?>
				<li><?php echo $label['label_tbs']['name']; ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div>
		<!-- カレンダー表示 -->
	</div>
</div>

<div id="main_area">
	<table>
		<?php for ($i=0; $i < 7; $i++): ?>
		<tr>
			<td colspan="2">
				<?php echo date("m月d 日(D)", strtotime("+{$i} day")); ?>
			</td>
		</tr>
		<?php foreach ($tasks as $task): ?>
		<?php if ($task['task_tbs']['date'] == date("Y-m-d", strtotime("+{$i} day"))): ?>
		<tr>
			<td>
				チェックボックス
			</td>
			<td>
				<?php echo $task['task_tbs']['name']; ?>
			</td>
		</tr>
		<?php endif; ?>
		<?php endforeach; ?>
		<?php endfor; ?>
	</table>
</div>

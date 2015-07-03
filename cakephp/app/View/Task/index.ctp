<style>
	div#side_area{
		width: 150px;
		float: left;
		background-color: skyblue;
	}
	div#main_area{
		width: 600px;
		float: left;
	}
	div#side_area div{
		margin-top: 20px;
	}
</style>


<div id="side_area">
	<div>
		<p><?php echo $account_name; ?></p>
	</div>
	<div>
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
		プロジェクト
		<ul>
			<?php foreach ($projects as $project): ?>
				<li><?php echo $project['project_tbs']['name']; ?></li>
			<?php endforeach; ?>
		</ul>
		<form class="" action="/todo/cakephp/regist/project" method="POST">
			<input type="submit" name="project_btn" value="追加">
		</form>
	</div>
	<div>
		ラベル
		<ul>
			<?php foreach ($labels as $label): ?>
				<li><?php echo $label['label_tbs']['name']; ?></li>
			<?php endforeach; ?>
		</ul>
		<form class="" action="/todo/cakephp/regist/label" method="POST">
			<input type="submit" name="label_btn" value="追加">
		</form>
	</div>
	<div>
		<!-- カレンダー表示 -->
		<table>
			<thead>
				<tr>
					<th>日</th>
					<th>月</th>
					<th>火</th>
					<th>水</th>
					<th>木</th>
					<th>金</th>
					<th>土</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php $count = 0; ?>
					<?php foreach ($calendar as $day): ?>
						<td>
							<?php $count++; ?>
							<?php echo $day['day']; ?>
						</td>
						<?php if ($count == 7): ?>
						</tr>
						<tr>
						<?php $count = 0; ?>
						<?php endif; ?>
					<?php endforeach; ?>
				</tr>
			</tbody>
		</table>
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

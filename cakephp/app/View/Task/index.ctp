<style>
	div#side_area{
		width: 200px;
		float: left;
		background-color: skyblue;
	}
		div#acc_name_area{
			width: 200px;
			margin: 10px 0px;
			text-align: center;
			font-size: 16px;
		}
		div#logout_btn_area{
			width: 200px;
			margin: 10px 0px;
			font-size: 12px;
			text-align: right;
		}
		div#task_btn_area{
			width: 200px;
			margin: 10px 0px;
			text-align: center;
		}
		div#project_area{
			width: 200px;
			margin: 10px 0px;
		}
		div#label_area{
			width: 200px;
			margin: 10px 0px;
		}
		div#calendar_area{
			width: 190px;
			margin: 20px auto;
		}
			div#calendar_area table{
				border: solid 2px;
				border-collapse: collapse;
			}
			div#calendar_area th{
				font-size: 8px;
				text-align: center;
				border: solid 2px;
			}
			div#calendar_area td{
				font-size: 8px;
				text-align: center;
				border: solid 2px;
			}
	div#main_area{
		width: 300px;
		float: left;
	}
</style>


<div id="side_area">
	<div id="acc_name_area">
		<p><?php echo $account_name; ?></p>
	</div>
	<div id="logout_btn_area">
		<form action="/todo/cakephp/login/run_logout" method="POST">
			<input type="submit" name="logout_btn" value="ログアウト">
		</form>
	</div>
	<hr>
	<div id="task_btn_area">
		<form action="/todo/cakephp/regist/task" method="POST">
			<input type="submit" name="task_btn" value="新規追加">
		</form>
	</div>
	<div id="project_area">
		プロジェクト
		<ul>
			<?php foreach ($projects as $project): ?>
				<li><?php echo $project['project_tbs']['name']; ?></li>
			<?php endforeach; ?>
		</ul>
		<form class="" action="/todo/cakephp/regist/project" method="POST">
			<input type="submit" name="project_btn" value="追加">
		</form>
	</div id="label_area">
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
	<div id="calendar_area">
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
	<?php for ($i=0; $i < 7; $i++): ?>
	<table>
		<thead>
			<tr>
				<td colspan="2" style="text-align:center;">
					<?php echo date("m月d 日(D)", strtotime("+{$i} day")); ?>
				</td>
			</tr>
		</thead>
	<?php foreach ($tasks as $task): ?>
	<?php if ($task['task_tbs']['date'] == date("Y-m-d", strtotime("+{$i} day"))): ?>
		<tbody>
			<tr>
				<td>
					ボタン
				</td>
				<td>
					<?php echo $task['task_tbs']['name']; ?>
				</td>
			</tr>
		</tbody>
	<?php endif; ?>
	<?php endforeach; ?>
	</table>
	<?php endfor; ?>
</div>

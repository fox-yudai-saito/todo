<style>
	div#side_area{
		width: 210px;
		float: left;
		background-color: skyblue;
	}
		div#acc_name_area{
			width: 210px;
			margin: 10px 0px;
			text-align: center;
			font-size: 16px;
		}
		div#logout_btn_area{
			width: 210px;
			margin: 10px 0px;
			font-size: 12px;
			text-align: right;
		}
		div#task_btn_area{
			width: 210px;
			margin: 10px 0px;
			text-align: center;
		}
		div#project_area{
			width: 210px;
			margin: 10px 0px;
		}
		div#label_area{
			width: 210px;
			margin: 10px 0px;
		}
		div#calendar_area{
			width: 200px;
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
		overflow: hidden;
		float: left;
	}
	div#reset_btn_area{
		width: 60px;
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
				<li>
					<a href="task?label=<?php echo $project['project_tbs']['id']; ?>">
						<?php echo $project['project_tbs']['name']; ?>
					</a>
				</li>
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
				<li>
					<a href="task?label=<?php echo $label['label_tbs']['id']; ?>">
						<?php echo $label['label_tbs']['name']; ?>
					</a>
				</li>
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
					<th colspan="7">
						<?php echo date('Y年m月'); ?>
					</th>
				</tr>
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
							<a href="task?date=<?php echo $day['day']; ?>">
								<?php echo $day['day']; ?>
							</a>
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
	<div id="task_area">
		<?php if (isset($_GET['date'])): ?>
			<table>
				<thead>
					<tr>
						<th colspan="2">
							<?php echo date('Y-m-d(D)', mktime(0, 0, 0, date('m'), $_GET['date'], date('Y'))); ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tasks as $task): ?>
					<tr>
						<td style="width:40px;text-align:center;">
							<form action="/todo/cakephp/task/completed_task" method="POST">
								<input type="hidden" name="completed_task_id" value="<?php echo $task['task_tbs']['id']; ?>">
								<input type="submit" name="completed_btn" value="" style="width:30px;">
							</form>
						</td>
						<td style="font-size:16px;line-height:30px;">
							<?php echo $task['task_tbs']['name']; ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<?php for ($i=0; $i < 7; $i++):?>
			<table>
				<thead>
					<tr>
						<th colspan="2">
							<?php echo date('Y-m-d(D)', strtotime('+'.$i.' day')); ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tasks[$i] as $task): ?>
					<tr>
						<td style="width:40px;text-align:center;">
							<form action="/todo/cakephp/task/completed_task" method="POST">
								<input type="hidden" name="completed_task_id" value="<?php echo $task['task_tbs']['id']; ?>">
								<input type="submit" name="completed_btn" value="" style="width:30px;">
							</form>
						</td>
						<td style="font-size:16px;line-height:30px;">
							<?php echo $task['task_tbs']['name']; ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php endfor; ?>
		<?php endif; ?>
	</div>
</div>
<div id="reset_btn_area">
	<input type="button" name="reset_btn" value="リセット" onclick="location.href='task'" style="font-size:16px;">
</div>

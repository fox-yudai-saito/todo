
<style>
	div#page_area{
		width: 700px;
		margin: auto;
	}
	div#header_area{
		width: 700px;
	}
	div#header_area h1{
		text-align: left;
		font-size: 20px;
	}
	div#main_area{
		width: 700px;
	}
	div#form_area{
		width: 700px;
		padding-top: 100px;
		margin-bottom: 50px;
	}

</style>

<div id="page_area">

	<div id="header_area">
		<div style="float:left;"><h1>タスク追加</h1></div>
		<div style="float:right;">
			<form class="" action="/todo/cakephp/task" method="POST">
				<input type="submit" name="return_btn" value="戻る">
			</form>
		</div>
	</div>

	<div id="main_area">
		<div id="form_area">
			<form class="" action="/todo/cakephp/regist/run_regist_project" method="POST">
				<table>
					<tr>
						<td>タイトル：</td><td><input type="text" name="regist_task_name"></td>
					</tr>
					<tr>
						<td>メモ：</td><td><input type="textarea" name="regist_task_memo"></td>
					</tr>
					<tr>
						<td>プロジェクト：</td>
						<td>
							<select name="regist_task_project">

							</select>
						</td>
					</tr>
					<tr>
						<td>ラベル：</td>
						<td>
							<select name="regist_task_label">

							</select>
						</td>
					</tr>
					<tr>
						<td>日付：</td><td><input type="datetime" name="regist_task_date" value=""></td>
					</tr>
				</table>
					<input type="submit" name="run_regist_task_btn" value="登録">
			</form>
		</div>
	</div>

</div>

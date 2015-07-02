<style>
	div#side_area{
		width: 200px;
		float: left;
		background-color: skyblue;
	}
	div#main_area{
		width: 1000px;
		float: left;
		background-color: green;
	}
</style>

<div id="side_area">
	<div>
		<p>ユーザー名表示</p>
		<form action="/todo/cakephp/login/run_logout" method="POST">
			<input type="submit" name="logout_btn" value="ログアウト">
		</form>
	</div>
	<div>
		<form action="/todo/cakephp/regist/task" method="POST">
			<input type="submit" name="task_btn" value="新規追加">
		</form>
		<p>プロジェクト</p>
		<!-- プロジェクト一覧 -->
		<form class="" action="/todo/cakephp/regist/project" method="POST">
			<input type="submit" name="project_btn" value="追加">
		</form>
	</div>
	<div>
		<p>ラベル</p>
		<!-- ラベル一覧 -->
		<form class="" action="/todo/cakephp/regist/label" method="POST">
			<input type="submit" name="label_btn" value="追加">
		</form>
	</div>
	<div>
		<!-- カレンダー表示 -->
	</div>
</div>

<div id="main_area">
	<!-- todoリスト表示 -->
</div>


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
		<div style="float:left;"><h1>プロジェクト追加</h1></div>
		<div style="float:right;">
			<form class="" action="/todo/cakephp/task" method="POST">
				<input type="submit" name="return_btn" value="戻る">
			</form>
		</div>
	</div>

	<div id="main_area">
		<div id="form_area">
			<form class="" action="/todo/cakephp/regist/run_regist_project" method="POST">
				<input type="text" name="regist_project_name" style="width:300px;">
				<input type="submit" name="run_regist_project_btn" value="追加">
			</form>
		</div>

		<hr>

		<div id="project_area">
			プロジェクト一覧
		</div>
	</div>

</div>

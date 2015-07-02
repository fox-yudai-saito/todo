
<style>
	div#main_area{
		width: 300px;
		margin: 50px auto;
	}
	div#main_area{
		width: 300px;
	}
	div#main_area h1{
		text-align: center;
		font-size: 18px;
		color: #ff0000;
	}
</style>

<div id="main_area">
	<div id="msg_area">
		<h1><?php echo isset($msg)? $msg: '' ?></h1>
	</div>

	<div id="login_form_area">
		<form class="login_form" action="login/run_login" method="POST">
			<table>
				<tr>
					<td style="text-align:right;">ID:</td><td><input type="text" name="account_id" value="" required></td>
				</tr>
				<tr>
					<td style="text-align:right;">PASS:</td><td><input type="text" name="account_pass" value="" required></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align:center;"><input type="submit" name="login_btn" value="ログイン"></td>
				</tr>
			</table>
		</form>
	</div>
</div>

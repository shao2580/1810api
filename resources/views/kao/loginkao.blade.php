<!DOCTYPE html>
<html>
<head>
	<title>登录</title>
</head>
<body>
	<div class="container" align="center">
		<form action="{{url('loginkao')}}" method="post">
			<h3>登录考试</h3>
			@csrf
			<table border="1">
				<tr>
					<td>邮箱：</td>
					<td><input type="text" name="email" placeholder="邮箱"></td>
				</tr>
				<tr>
					<td>密码：</td>
					<td><input type="password" name="password" placeholder="密码"></td>
				</tr>
				<tr>
					<td colspan="2" align="conter">
						<input type="submit" name="" value="登录">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
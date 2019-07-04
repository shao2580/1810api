<!DOCTYPE html>
<html>
<head>
	<title>注册</title>
</head>
<body>
	<div class="container" align="center">
		<h3>注测考试</h3>
		<form method="post" action="{{url('/regkao')}}" enctype="multipart/form-data">
			<table border="1">
				<!-- {{csrf_field()}} -->
				@csrf
				<tr>
					<td>邮箱：</td>
					<td><input type="email" name="email" placeholder="邮箱"></td>
				</tr>
				<tr>
					<td>密码：</td>
					<td><input type="password" name="password" placeholder="密码"></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" name="" value="提交">
						
					</td>
				</tr>

			</table>
		</form>
	</div>
	
</body>
</html>
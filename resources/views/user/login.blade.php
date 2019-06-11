<!DOCTYPE html>
<html>
<head>
	<title>测试-登录</title>
</head>
<body>
	<div align="center">
		<form action="{{url('login')}}" method="post">
			用户名：<input type="text" name="name"><br/>
			密码:<input type="password" name="pass"><br/>
			<input type="submit" name="" value="登录">
		</form>
	</div>
	
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>注册</title>
</head>
<body>
	<div align="center">

		<form>
			<h3>修改学生</h3>
			<table border="1">
				<tr>
					<td>姓名：</td>
					<td><input class="username" type="text" name="username" value="{{$data->username}}"></td>
				</tr>
				<tr>
					<td>密码：</td>
					<td><input class="password" type="password" name="password" value="{{$data->password}}"></td>
				</tr>
				<tr>
					<td>性别：</td>
					<td>
						<input type="radio" name="sex" value="1" checked="">男
						<input type="radio" name="sex" value="0" >女	
					</td>
				</tr>
				<tr>
					<td>班级：</td>
					<td>
						<select name="grade" class="grade" value="{{$data->grade}}">
					    	<option value="1">一班</option>
					    	<option value="2">二班</option>
					    	<option value="3">三班</option>
					    	<option value="4">四班</option>
					    	<option value="5">五班</option>  
					    </select>	
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input class="btn" type="button" name="" value="提交">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
<script src="../../js/jquery.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('.btn').click(function(){
			var username = $('.username').val();
			var password = $('.password').val();
			var sex = $("input[type='radio']:checked").val();
			var grade = $('.grade').val();

			$.ajax({
				url:"{{url('students')}}/{{$data->id}}",
				method:'put',
				dataType:'json',
				data:{username:username,password:password,sex:sex,grade:grade}
				}).done(function(res){
					if (res.code == 20001) {
						alert(res.msg);
        				location.href="{{url('/students')}}";
					}else{
						alert(res.msg);
					}
				})
			
		})
	})

</script>
</html>
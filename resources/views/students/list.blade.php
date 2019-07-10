<!DOCTYPE html>
<html>
<head>
	<title>列表</title>
</head>
<body>
	<div align="center">
		<h3>学生列表&nbsp;&nbsp;&nbsp;<a href="{{url('students/create')}}">添加</a></h3>
		<table border="1" width="400" style='text-align:center'>
			<tr >
				<th>ID</th>
				<th>姓名</th>
				<th>性别</th>
				<th>班级</th>
				<th>操作</th>
			</tr>
			@foreach ($data as $k => $v)
				<tr>
					<td>{{$v->id}}</td>
					<td>{{$v->username}}</td>
					<td>@if($v->sex==1) 男 @else 女 @endif</td>
					<td>
						{{$v->grade}}
					</td>
					<td>
						<a href="{{url('students',['id'=>$v->id])}}/edit">编辑</a>
						<a href="javescript:;" class="del">删除</a>
					</td>
				</tr>
			@endforeach
			

		</table>
	</div>
</body>
<script src="../js/jquery.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('.del').click(function(){
			$.ajax({
				url:"{{url('students')}}/{{$v->id}}",
				method:'delete',
				dataType:'json'
				}).done(function(res){
					if (res.code == 20002) {
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
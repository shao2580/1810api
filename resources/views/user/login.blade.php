@extends('public.public')
@section('title', '登录')
@section('content')
	
<!-- login -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>登录</h3>
			</div>
			<div class="login">
				<div class="row">
					<form class="col s12">
						<div class="input-field">
							<input type="text" class="name validate" placeholder="用户名" required>
						</div>
						<div class="input-field">
							<input type="password" class="password validate" placeholder="密码" required>
						</div>
						<a href=""><h6>忘记密码，找回密码?</h6></a>
						<div class="btn button-default">登录</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end login -->

<script type="text/javascript">
	
		$('.btn').click(function(){
			var name = $('.name').val();
			$('.name').next().remove();
			if (name == '') {
				$('.name').after("<span style='color:red'>用户名不能为空</span>");
				 return false;
			}

			var password = $('.password').val();
			$('.password').next().remove();
			if (password == '') {
				$('.password').after("<span style='color:red'>密码不能为空</span>");
				 return false;
			}

			 $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

			$.ajax({
				url:"{{url('/login')}}",
				method:'post',
				dataType:'json',
				data:{name:name,password:password}
			}).done(function(res){
				if (res.code == 1000) {
					alert(res.msg);
					location.href="{{url('/')}}";
				}else{
					alert(res.msg);
				}
			})

		})


	
</script>

@endsection
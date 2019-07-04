@extends('public.public')
@section('title', '注册')
@section('content')

<!-- register -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>注册用户</h3>
			</div>
			<div class="register">
				<div class="row">
					<form class="col s12">
						
						<div class="input-field">
							<input type="text" name='name' class="name validate" placeholder="用户名" required>
						</div>
						<div class="input-field">
							<input type="email"  name='email' placeholder="邮箱" class="email validate" required>
						</div>
						<div class="input-field">
							<input type="password" name='password' placeholder="密码" class="password validate" required>
						</div>
						<div class="btn button-default">提交注册</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end register -->
<script type="text/javascript">
	$('.btn').click(function(){
		var name = $('.name').val();
		$('.name').next().remove();
        if (name=='') {
            $('.name').after("<span style='color:red'>用户名不能为空</span>");
            return false;
        }

        var email = $('.email').val();
		$('.email').next().remove();
        if (email=='') {
            $('.email').after("<span style='color:red'>邮箱不能为空</span>");
            return false;
        }

        var password = $('.password').val();
		$('.password').next().remove();
        if (password=='') {
            $('.password').after("<span style='color:red'>密码不能为空</span>");
            return false;
        }

         $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

        $.ajax({
        	url:"{{url('/reg')}}",
        	method:'post',
        	dataType:'json',
        	data:{name:name,email:email,password:password}
        	 }).done(function( res ){
        		if (res.code == 1000) {
        			alert(res.msg);
        			location.href="{{url('/login')}}";
        		}else{
        			alert(res.msg);
        		}	
        	})

	})
</script>

@endsection
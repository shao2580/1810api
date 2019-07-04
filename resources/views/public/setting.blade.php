@extends('public.public')
@section('title', '设置')
@section('content')


<!-- register -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>SETTINGS</h3>
			</div>
			<div class="register">
				<div class="row">
					<form class="col s12">
						<div class="input-field">
							<input type="text" class="validate" placeholder="First Name" required>
						</div>
						<div class="input-field">
							<input type="text" class="validate" placeholder="Last Name" required>
						</div>
						<div class="input-field">
							<input type="text" class="validate" placeholder="Username" required>
						</div>
						<div class="input-field">
							<input type="email" placeholder="Email" class="validate" required>
						</div>
						<div class="input-field">
							<input type="password" placeholder="Password" class="validate" required>
						</div>
						<div class="btn button-default">SAVE CANGES</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end register -->
	
@endsection
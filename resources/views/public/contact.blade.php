@extends('public.public')
@section('title', '邮件')
@section('content')

	
	<!-- contact us -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>CONTACT US</h3>
			</div>
			<div class="contact-us">
				<div class="row">
					<div class="col s12">
						<form action="send-mail.php" class="contact-form" id="contact-form" method="post">
							<div class="form-group" id="name-field">
								<input type="text" class="validate" id="form-name" name="form-name" placeholder="NAME" required>
							</div>
							<div class="form-group" id="email-field">
								<input type="email" class="validate" id="form-email" name="form-email" placeholder="EMAIL" required>
							</div>
							<div class="form-group" id="subject-field">
								<input type="text" class="validate" id="form-subject" name="form-subject" placeholder="SUBJECT" required>
							</div>
							<div class="form-group" id="message-field">
								<textarea name="form-message" id="form-message" cols="30" rows="10" class="materialize-textarea" placeholder="YOUR MESSAGE" required></textarea>
							</div>
							<div class="form-group">
								<button class="btn button-default" type="submit" id="submit" name="submit">SEND MESSAGE</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact us -->

@endsection

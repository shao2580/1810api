@extends('public.public')
@section('title', '博客单')
@section('content')

	<!-- single post -->
	<div class="pages section">
		<div class="container">
			<div class="blog-single">
				<img src="img/blog1.png" alt="">
				<div class="blog-single-content">
					<h5>Fashion Men's</h5>
					<div class="date">
						<span><i class="fa fa-calendar"></i> Dec 22, 2018</span>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi error quibusdam culpa assumenda maiores ea dicta fuga a itaque rerum deserunt, incidunt, nulla, vero amet sapiente reiciendis. Perspiciatis debitis, accusamus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus eligendi porro deleniti quisquam omnis rem quibusdam corporis alias, et quae, assumenda unde pariatur vitae placeat veritatis nam quia, velit delectus.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ut vitae recusandae perferendis, temporibus, ullam, tenetur eius necessitatibus aliquam sequi, eum atque ratione ipsam in aliquid vero numquam id minus!</p>	
					<div class="share-post">	
						<ul>
							<li><a href=""><i class="fa fa-facebook"></i></a></li>
							<li><a href=""><i class="fa fa-twitter"></i></a></li>
							<li><a href=""><i class="fa fa-google"></i></a></li>
							<li><a href=""><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>	
				<div class="comment">
					<h5>1 Comments</h5>
					<div class="comment-details">
						<div class="row">
							<div class="col s3">
								<img src="img/user-comment.jpg" alt="">
							</div>
							<div class="col s9">
								<div class="comment-title">
									<span><strong>John Doe</strong> | Juni 5, 2016 at 9:24 am | <a href="">Reply</a></span>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis accusantium corrupti asperiores et praesentium dolore.</p>
							</div>
						</div>
					</div>
				</div>	
				<div class="comment-form">
					<div class="comment-head">
						<h5>Post Comment in Below</h5>
						<p>Lorem ipsum dolor sit amet consectetur*</p>
					</div>
					<div class="row">
						<form class="col s12 form-details">
							<div class="input-field">
								<input type="text" required class="validate" placeholder="NAME">
							</div>
							<div class="input-field">
								<input type="email" class="validate" placeholder="EMAIL" required>
							</div>
							<div class="input-field">
								<input type="text" class="validate" placeholder="SUBJECT" required>
							</div>
							<div class="input-field">
								<textarea name="textarea-message" id="textarea1" cols="30" rows="10" class="materialize-textarea" class="validate" placeholder="YOUR COMMENT"></textarea>
							</div>
							<div class="form-button">
								<div class="btn button-default">POST COMMENTS</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<!-- end single post -->

@endsection